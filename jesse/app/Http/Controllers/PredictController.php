<?php

namespace App\Http\Controllers;

use App\Models\Prediction;
use App\Services\Predictor\Exceptions\PredictorException;
use App\Services\Predictor\PredictorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PredictController extends Controller
{
    public function __construct(private readonly PredictorService $predictor)
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(): View
    {
        $predictions = Prediction::query()
            ->when(Auth::check(), function ($query): void {
                $query->where('user_id', Auth::id());
            })
            ->latest()
            ->take(10)
            ->get();

        return view('predict', compact('predictions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,bmp', 'max:5120'],
        ]);

        $disk = config('predict.upload_disk');
        $directory = trim(config('predict.upload_directory'), '/');

        $path = $request->file('image')->store($directory, $disk);

        $absolutePath = Storage::disk($disk)->path($path);

        $prediction = Prediction::create([
            'user_id' => Auth::id(),
            'original_filename' => $request->file('image')->getClientOriginalName(),
            'stored_path' => $path,
            'status' => 'processing',
        ]);

        try {
            $result = $this->predictor->predict($absolutePath);

            $prediction->forceFill([
                'diagnosis' => $result['diagnosis'] ?? null,
                'confidence' => $result['confidence'] ?? null,
                'raw_output' => $result['raw'] ?? null,
                'status' => 'completed',
                'processed_at' => now(),
            ])->save();

            return back()->with('status', __('Prediction completed successfully.'));
        } catch (PredictorException $exception) {
            $prediction->forceFill([
                'status' => 'failed',
                'processed_at' => now(),
                'error_message' => $exception->getMessage(),
            ])->save();

            return back()->withErrors([
                'predict' => __('Prediction failed: :message', ['message' => $exception->getMessage()]),
            ]);
        }
    }
}

