# RetinaCare Prediction Pipeline

This directory is reserved for the AI assets that power image predictions.

## Expected layout

```
predict/
├── README.md
└── scripts/
    └── run_inference.py        # Entry point called by PredictorService
```

- Place your trained model weights alongside `run_inference.py` or in a subdirectory you manage inside the script.
- The script **must** accept the uploaded image path as the first CLI argument and print a JSON payload to STDOUT, for example:

```json
{
  "diagnosis": "DR Stage 2",
  "confidence": 0.92,
  "heatmap_path": "optional/path/to/visualisation.png"
}
```

You can include any additional fields; they will be stored inside the `raw_output` column for later inspection.

> Tip: leverage virtual environments or Docker to bundle your Python dependencies. Update the `PREDICT_PYTHON_BINARY` ENV variable when using a non-default interpreter.

