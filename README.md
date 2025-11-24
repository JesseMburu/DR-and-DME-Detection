# DR & DME Predictor Backend

This folder packages the TensorFlow models trained in `C:\Users\munga\CS_PROJECT\DR-and-DME-Detection` so the Laravel app can execute them locally or via a lightweight HTTP service.

## Layout

```
backend/predict
|-- models/                # Copied DR/DME artifacts (best + final checkpoints + metrics)
|-- scripts/
|   |-- predictor.py       # Shared loader + ensemble logic
|   |-- run_inference.py   # CLI invoked by Laravel's PredictorService
|   `-- flask_app.py       # Optional Flask API (PredictorService can auto-bootstrap)
`-- requirements.txt       # Python dependencies (TensorFlow + Pillow + Flask)
```

## 1. Environment setup

```powershell
cd C:\Users\munga\CS_PROJECT\DR-and-DME-Detection-1
python -m venv venv
.\venv\Scripts\activate
pip install --upgrade pip
pip install -r backend\predict\requirements.txt
```

TensorFlow 2.14.0 works with the exported `.keras` models; if you already have a GPU build installed you can skip reinstalling it.

## 2. Running predictions from Laravel (CLI fallback)

Laravel calls the CLI entrypoint whenever `PREDICT_ENDPOINT` is empty or unreachable:

```powershell
python backend\predict\scripts\run_inference.py ^
    C:\absolute\path\to\uploaded.jpg ^
    --dataset fundus ^
    --use-best ^
    --pretty
```

Environment variables (already wired in `config/predict.php`) that you can override in `jesse/.env`:

- `PREDICT_SCRIPT_PATH=../backend/predict/scripts/run_inference.py`
- `PREDICT_PYTHON_BINARY` (defaults to `python3` / `python`)
- `PREDICT_RESULTS_DIR=../backend/predict/scripts/results` (JSON dumps for debugging)

The script prints a JSON payload with `diagnosis`, `confidence`, `analysis`, `models`, and `overlay_base64`. Laravel stores this directly through `PredictorService`.

## 3. Optional HTTP microservice

If you prefer to keep the predictor running in the background, start the Flask app:

```powershell
set PREDICT_HOST=127.0.0.1
set PREDICT_PORT=5000
python backend\predict\scripts\flask_app.py
```

Then point Laravel to it by setting in `jesse/.env`:

```
PREDICT_ENDPOINT=http://127.0.0.1:5000/predict
```

`PredictorService` already attempts to auto-bootstrap this server by executing `backend/predict/scripts/flask_app.py` if the endpoint is unreachable, so no extra wiring is required.

## 4. Notes & troubleshooting

- Model directories (`backend/predict/models/*`) are straight copies of the training repo's `artifacts` tree, including metrics and logs for traceability.
- `predictor.py` generates lightweight attention overlays as base64 PNGs so the Laravel UI can attach them without temporary files.
- All confidences inside the `analysis` block are percentages; the top-level `confidence` remains 0-1 so Blade templates continue to format it correctly.
- Logs are sent to stderr (PowerShell console) using `PREDICT_LOG_LEVEL` if you need more verbosity.
- The predictor rejects uploads that do not resemble fundus/OCT captures (aspect ratio, circular brightness, dark borders). Users will see a friendly error instead of running the heavy models on unsuitable content.

