<?php

return [
    'python_binary' => env('PREDICT_PYTHON_BINARY', 'python3'),
    'timeout' => env('PREDICT_TIMEOUT', 60),
    'upload_disk' => env('PREDICT_UPLOAD_DISK', 'local'),
    'upload_directory' => env('PREDICT_UPLOAD_DIR', 'predictions/uploads'),
    'script_path' => env('PREDICT_SCRIPT_PATH', base_path('../backend/predict/scripts/run_inference.py')),
];
