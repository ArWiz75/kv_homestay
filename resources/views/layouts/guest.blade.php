<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'KV Homestay') }} - Admin Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .auth-wrapper {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                background: linear-gradient(135deg, rgba(26, 46, 26, 0.85), rgba(107, 143, 113, 0.9)),
                            url('{{ asset("assets/images/hero.png") }}') center/cover fixed;
                padding: 1.5rem;
            }
            .auth-card {
                width: 100%;
                max-width: 420px;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(20px);
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.2);
                padding: 2.5rem;
                margin-top: 1.5rem;
                border: 1px solid rgba(255,255,255,0.5);
            }
            .auth-logo {
                text-align: center;
                margin-bottom: 2rem;
            }
            .auth-logo-icon {
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, #6B8F71, #8FB996);
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1rem;
                box-shadow: 0 8px 20px rgba(107, 143, 113, 0.3);
            }
            .auth-logo-text {
                font-family: 'Playfair Display', serif;
                font-size: 1.8rem;
                font-weight: 700;
                color: #1a2e1a;
                letter-spacing: -0.02em;
            }
            .auth-btn {
                background: linear-gradient(135deg, #6B8F71, #8FB996);
                color: white;
                width: 100%;
                padding: 0.8rem;
                border-radius: 10px;
                font-weight: 600;
                display: flex;
                justify-content: center;
                transition: 0.3s ease;
            }
            .auth-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(107, 143, 113, 0.3);
            }
            .auth-input:focus {
                border-color: #6B8F71 !important;
                box-shadow: 0 0 0 3px rgba(107, 143, 113, 0.2) !important;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="auth-wrapper">
            <div class="auth-logo">
                <a href="{{ route('welcome') }}">
                    <div class="auth-logo-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    </div>
                    <div class="auth-logo-text">KV Homestay.</div>
                </a>
                <p class="text-sm text-gray-500 mt-2 font-medium">Administrator Login Panel</p>
            </div>

            <div class="auth-card">
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-white/60 text-sm font-medium text-center">
                &copy; {{ date('Y') }} KV Homestay. All rights reserved.
            </div>
        </div>
    </body>
</html>
