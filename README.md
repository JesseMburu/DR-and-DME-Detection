# RetinaCare Frontend (`jesse/`)

The `jesse/` directory contains the Laravel 11 frontend that clinicians and patients use to interact with the diabetic retinopathy (DR) and diabetic macular edema (DME) detection workflow. It renders every experience—from the marketing hero page and onboarding screens to the multi-role dashboards that trigger TensorFlow predictions through the backend scripts in `../backend/predict/`.

## Tech stack at a glance

- **Laravel 11 + Blade** for routing, server-rendered UI, authentication scaffolding, and role-based middleware.
- **Tailwind CSS 3 + Vite 7** for utility-first styling, tree-shaken builds, and hot module reloading.
- **Alpine.js 3 & Vanilla JS** for lightweight interactivity (theme switching, prediction uploads, toast notifications).
- **Bootstrap 5** components layered on top of Tailwind for form controls.
- **Axios** (already imported in `resources/js/bootstrap.js`) for AJAX calls from Blade or Alpine components.

## Project layout

```text
jesse/
├── app/                  # Controllers, policies, Blade components
├── public/               # Compiled assets + static images (logo, favicons, etc.)
├── resources/
│   ├── css/app.css       # Tailwind entry point
│   ├── js/app.js         # Vite entry + theme toggle bootstrap
│   ├── js/predict-page.js# Prediction upload helpers (preview, loader)
│   └── views/            # Blade templates (welcome page, dashboards, layouts)
├── routes/web.php        # Public + role-based route definitions
├── package.json          # Frontend scripts (Vite dev/build)
├── vite.config.js        # Vite + Laravel plugin wiring
└── tailwind.config.js    # Tailwind layers + theme tokens
```

Refer to `backend/predict/README.md` if you need the TensorFlow inference service that powers the `/predict` screen.

## Prerequisites

| Tool | Minimum version | Notes |
| ---- | --------------- | ----- |
| PHP | 8.2 | Enable `fileinfo`, `openssl`, `pdo_sqlite` or `pdo_mysql`. |
| Composer | 2.6 | Manages Laravel + PHP dependencies. |
| Node.js / npm | Node 20.x LTS / npm 10 | Required for Vite/Tailwind builds. |
| SQLite/MySQL | optional | Any database that Laravel supports will work. SQLite is pre-configured in `.env.example`. |
| Python 3.10+ | optional | Only needed when invoking the local predictor scripts described in `backend/predict`. |

## 1. Bootstrap the environment

```powershell
cd C:\Users\munga\CS_PROJECT\DR-and-DME-Detection-1\jesse
copy .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed        # optional: loads default roles/accounts
npm install
```

> Tip: keep the `.env` file in sync with whichever backend option you deploy (CLI or Flask API). See the table below for the keys the frontend relies on.

## 2. Configure environment variables

| Key | Purpose |
| --- | ------- |
| `APP_URL`, `APP_NAME` | Used in Blade templates, email links, and SEO metadata. |
| `APP_ENV`, `APP_DEBUG` | Toggles Laravel debug tooling; leave `APP_DEBUG=true` for local dev. |
| `SESSION_DRIVER=database` | Already set in `.env.example`; `php artisan session:table` creates the backing table. |
| `VITE_APP_NAME` | Surfaced inside `resources/js/app.js` for document titles; matches `APP_NAME` by default. |
| `GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET`, `GOOGLE_REDIRECT_URL` | Required for OAuth login buttons rendered on the welcome page. |
| `PREDICT_ENDPOINT` | Points to the Flask microservice (`http://127.0.0.1:5000/predict`). Leave blank to fall back to the CLI runner. |
| `PREDICT_SCRIPT_PATH`, `PREDICT_PYTHON_BINARY`, `PREDICT_UPLOAD_DIR` | Consumed by `App\Services\PredictorService` when executing local inference scripts. |
| `MAIL_*` | Needed if you plan to email verification links; defaults to log driver for local dev. |

After editing `.env`, run `php artisan config:clear` to ensure Laravel reads the new values.

## 3. Run the frontend locally

You need two processes—one for Laravel and one for Vite. `concurrently` is already installed as a dev dependency if you prefer a single terminal.

```powershell
# Terminal 1 — PHP backend that serves Blade + API routes
php artisan serve --host=127.0.0.1 --port=8000

# Terminal 2 — Vite dev server with hot reload + Tailwind JIT
npm run dev
# or: npx concurrently "php artisan serve" "npm run dev"
```

The welcome page lives at `http://127.0.0.1:8000/`. The Vite dev server proxies asset requests from Blade automatically via the `@vite()` directive inside `resources/views/layouts`.

### Building for production

```powershell
npm run build       # Emits hashed assets into public/build
php artisan config:cache route:cache view:cache
php artisan serve --env=production   # or deploy under nginx/apache
```

Upload the entire `public/` directory (including `build/manifest.json`) to your web server. Laravel will automatically swap to the built assets because `APP_ENV=production` disables the Vite dev server handshake.

## UI/UX features you should know about

- **Welcome hero (`resources/views/welcome.blade.php`)**: Gradient hero with CTA buttons. Tailwind classes are co-located in the markup for quick tweaks.
- **Theme toggle (`resources/js/app.js` + `<x-theme-toggle />`)**: Persists light/dark preference in `localStorage` and syncs any element annotated with `data-theme-toggle`.
- **Prediction form helpers (`resources/js/predict-page.js`)**: Shows inline previews, file sizes, and a loading overlay whenever users submit images.
- **Toast + theme prefetch partials (`resources/views/layouts/partials/`)**: Centralized includes so every page inherits the same UX primitives without duplicating markup.
- **Role-aware dashboards (`routes/web.php`)**: Middleware groups keep Patient, Doctor, and Admin sections isolated. Before building new UI, drop controllers/views into the matching namespace and reuse existing layouts.

## Working with assets & styling

1. **Tailwind** — Extend the palette or add custom utilities inside `tailwind.config.js`. Every time you edit it, restart `npm run dev`.
2. **Global CSS** — Use `resources/css/app.css` for base layers (`@tailwind base; @tailwind components; @tailwind utilities`) and custom component classes.
3. **Alpine components** — Define inline via `x-data` in Blade templates. Alpine is initialized in `resources/js/app.js` after the theme bootstrap runs.
4. **Blade layouts** — `resources/views/layouts/app.blade.php` holds the shell used by authenticated pages. Slots/components (`x-theme-toggle`, `x-nav-link`, etc.) live under `app/View/Components`.
5. **Static images** — Drop new logos or favicons into `public/images/` and reference them with `asset('images/...')` so Vite can version them.

## Predictor integration checklist

1. Decide whether you are calling the CLI runner or the Flask API (see `backend/predict/README.md`).
2. Populate the `PREDICT_*` variables in `.env`.
3. Ensure the `storage/` directory is writable: `php artisan storage:link` creates the `public/storage` symlink used by previews and downloadable overlays.
4. Visit `/predict` while logged in; the upload preview and progress overlay should appear before the request hits the predictor service.

## Testing & linting

- `php artisan test` — Runs Laravel feature + unit tests.
- `npm run build` — Doubles as the lint step because Vite will fail on invalid imports/Tailwind config issues.
- `php artisan pint` — (optional) Run if you install Laravel Pint for code style.

## Troubleshooting

- **White page / Vite error overlay**: Ensure `npm run dev` is running and that `APP_URL` matches the host passed to `php artisan serve`.
- **Google login button hidden**: The button only appears when `GOOGLE_CLIENT_ID` and `GOOGLE_CLIENT_SECRET` are set.
- **Uploads stuck on “Processing…”**: Confirm the predictor scripts are reachable and that the queue worker (`php artisan queue:work`) is running if you moved prediction jobs off the default sync driver.
- **Dark mode not sticking**: Check browser dev tools for `localStorage['retinacare.theme']`; removing it resets the chooser to OS preference.

With these steps you can clone the repository, boot the Laravel frontend, customize Blade/Tailwind assets, and keep the UI connected to whichever prediction backend you deploy. Happy building!



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

