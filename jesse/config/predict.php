<?php

return [
    'python_binary' => env('PREDICT_PYTHON_BINARY', 'python3'),
    'timeout' => env('PREDICT_TIMEOUT', 60),
    'upload_disk' => env('PREDICT_UPLOAD_DISK', 'local'),
    'upload_directory' => env('PREDICT_UPLOAD_DIR', 'predictions/uploads'),
];

