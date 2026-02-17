<?php

namespace App\Services\Predictor;

use App\Services\Predictor\Exceptions\PredictorException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;

class PredictorService
{
    /**
     * Run the prediction pipeline for the provided image.
     *
     * @param  string  $imagePath  Absolute path to the uploaded image on disk.
     * @return array{
     *     diagnosis: string|null,
     *     confidence: float|null,
     *     raw: array|null
     * }
     */
    public function predict(string $imagePath): array
    {
        $scriptPath = config(
            'predict.script_path',
            base_path('../backend/predict/scripts/run_inference.py'),
        );

        if (! file_exists($scriptPath)) {
            Log::warning('Prediction script not found.', ['path' => $scriptPath]);

            throw new PredictorException('Prediction backend is not yet configured.');
        }

        $process = new Process([
            config('predict.python_binary', 'python3'),
            $scriptPath,
            $imagePath,
        ], timeout: config('predict.timeout', 60));

        $process->run();

        if (! $process->isSuccessful()) {
            Log::error('Prediction process failed', [
                'output' => $process->getErrorOutput(),
            ]);

            throw new PredictorException('Unable to complete prediction.');
        }

        $decoded = json_decode($process->getOutput(), true);

        if (! is_array($decoded)) {
            throw new PredictorException('Prediction output is invalid.');
        }

        return [
            'diagnosis' => $decoded['diagnosis'] ?? null,
            'confidence' => isset($decoded['confidence']) ? (float) $decoded['confidence'] : null,
            'raw' => $decoded,
        ];
    }
}
