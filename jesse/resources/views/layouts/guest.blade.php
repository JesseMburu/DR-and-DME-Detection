<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'RetinaCare')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
      body {
        background: linear-gradient(to bottom, #0a0a0f, #0f0c29, #302b63, #24243e);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-family: 'Poppins', sans-serif;
      }
      .auth-card {
        background: rgba(255, 255, 255, 0.08);
        padding: 2.5rem;
        border-radius: 16px;
        width: 100%;
        max-width: 420px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
      }
      .auth-card h2 {
        color: #fff;
        margin-bottom: 1.5rem;
        text-align: center;
      }
      .btn-retina {
        background-color: #0b6b5b;
        border: none;
        color: #fff;
        width: 100%;
        padding: 0.75rem;
        border-radius: 6px;
        font-weight: 600;
      }
      .btn-retina:hover {
        background-color: #095048;
      }
    </style>
  </head>
  <body>
    <div class="auth-card">
      @yield('content')
    </div>
  </body>
</html>
