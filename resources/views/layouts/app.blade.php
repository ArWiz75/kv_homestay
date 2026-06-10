<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'KV Homestay') }} — Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* ============================================
               KV HOMESTAY ADMIN PANEL — MODERN DESIGN
               ============================================ */
            :root {
                --admin-primary: #6B8F71;
                --admin-primary-dark: #567358;
                --admin-primary-light: #a3c4a8;
                --admin-primary-ultra-light: #e8f0e9;
                --admin-accent: #E07A5F;
                --admin-bg: #f4f6f4;
                --admin-surface: #ffffff;
                --admin-text: #1a2e1a;
                --admin-text-secondary: #5a6b5a;
                --admin-text-muted: #8a9b8a;
                --admin-border: #e2e8e2;
                --admin-border-light: #f0f4f0;
                --admin-radius: 12px;
                --admin-radius-lg: 16px;
                --admin-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 4px 12px rgba(0,0,0,0.04);
                --admin-shadow-lg: 0 4px 20px rgba(0,0,0,0.08);
                --admin-transition: 0.25s ease;
            }

            body {
                font-family: 'Inter', sans-serif !important;
                background: var(--admin-bg) !important;
                -webkit-font-smoothing: antialiased;
            }

            /* --- Top Navigation Bar --- */
            nav.admin-nav {
                background: var(--admin-surface);
                border-bottom: 1px solid var(--admin-border);
                box-shadow: 0 1px 8px rgba(0,0,0,0.03);
            }

            /* --- Page Header --- */
            .admin-page-header {
                background: linear-gradient(135deg, #6B8F71 0%, #8FB996 100%);
                box-shadow: 0 4px 15px rgba(107, 143, 113, 0.2);
            }

            .admin-page-header h2 {
                color: white !important;
                font-weight: 600;
            }

            .admin-page-header a {
                background: rgba(255,255,255,0.2);
                border: 1px solid rgba(255,255,255,0.3);
                color: white;
                border-radius: 10px;
                font-size: 0.82rem;
                font-weight: 600;
                padding: 0.5rem 1.2rem;
                transition: var(--admin-transition);
                backdrop-filter: blur(10px);
            }

            .admin-page-header a:hover {
                background: rgba(255,255,255,0.35);
            }

            /* --- Card Panel --- */
            .admin-card {
                background: var(--admin-surface);
                border-radius: var(--admin-radius-lg);
                border: 1px solid var(--admin-border-light);
                box-shadow: var(--admin-shadow);
                overflow: hidden;
                transition: var(--admin-transition);
            }

            .admin-card:hover {
                box-shadow: var(--admin-shadow-lg);
            }

            .admin-card-body {
                padding: 1.5rem;
            }

            /* --- Table Styles --- */
            .admin-table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
            }

            .admin-table thead th {
                background: var(--admin-bg);
                padding: 0.85rem 1rem;
                text-align: left;
                font-size: 0.75rem;
                font-weight: 600;
                color: var(--admin-text-muted);
                text-transform: uppercase;
                letter-spacing: 0.06em;
                border-bottom: 1px solid var(--admin-border);
            }

            .admin-table thead th:first-child { border-radius: 10px 0 0 0; }
            .admin-table thead th:last-child { border-radius: 0 10px 0 0; }

            .admin-table tbody tr {
                transition: var(--admin-transition);
            }

            .admin-table tbody tr:hover {
                background: var(--admin-primary-ultra-light);
            }

            .admin-table tbody td {
                padding: 0.85rem 1rem;
                border-bottom: 1px solid var(--admin-border-light);
                font-size: 0.9rem;
                color: var(--admin-text);
                vertical-align: middle;
            }

            .admin-table tbody tr:last-child td {
                border-bottom: none;
            }

            /* --- Badge --- */
            .admin-badge {
                display: inline-flex;
                align-items: center;
                padding: 0.25rem 0.7rem;
                border-radius: 20px;
                font-size: 0.75rem;
                font-weight: 600;
                letter-spacing: 0.02em;
            }

            .admin-badge-success { background: #dcfce7; color: #166534; }
            .admin-badge-warning { background: #fef9c3; color: #854d0e; }
            .admin-badge-danger  { background: #fee2e2; color: #991b1b; }
            .admin-badge-gray    { background: #f3f4f6; color: #6b7280; }
            .admin-badge-primary { background: var(--admin-primary-ultra-light); color: var(--admin-primary-dark); }

            /* --- Action Buttons --- */
            .admin-btn {
                display: inline-flex;
                align-items: center;
                gap: 0.4rem;
                padding: 0.45rem 0.9rem;
                border-radius: 8px;
                font-size: 0.82rem;
                font-weight: 500;
                transition: var(--admin-transition);
                cursor: pointer;
                border: none;
                text-decoration: none;
            }

            .admin-btn-edit {
                background: #eef2ff;
                color: #4338ca;
            }
            .admin-btn-edit:hover {
                background: #e0e7ff;
                color: #3730a3;
            }

            .admin-btn-delete {
                background: #fef2f2;
                color: #dc2626;
            }
            .admin-btn-delete:hover {
                background: #fee2e2;
                color: #b91c1c;
            }

            .admin-btn-primary {
                background: linear-gradient(135deg, #6B8F71, #8FB996);
                color: white;
                padding: 0.6rem 1.5rem;
                border-radius: 10px;
                font-weight: 600;
                box-shadow: 0 2px 8px rgba(107, 143, 113, 0.25);
            }
            .admin-btn-primary:hover {
                box-shadow: 0 4px 16px rgba(107, 143, 113, 0.35);
                transform: translateY(-1px);
            }

            /* --- Stat Cards --- */
            .admin-stat-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 1.2rem;
                margin-bottom: 1.5rem;
            }

            .admin-stat-card {
                background: var(--admin-surface);
                border-radius: var(--admin-radius-lg);
                padding: 1.5rem;
                border: 1px solid var(--admin-border-light);
                box-shadow: var(--admin-shadow);
                display: flex;
                align-items: center;
                gap: 1rem;
                transition: var(--admin-transition);
            }

            .admin-stat-card:hover {
                transform: translateY(-2px);
                box-shadow: var(--admin-shadow-lg);
            }

            .admin-stat-icon {
                width: 50px;
                height: 50px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }

            .admin-stat-icon svg {
                width: 24px;
                height: 24px;
                stroke-width: 1.8;
            }

            .admin-stat-icon.green  { background: #dcfce7; }
            .admin-stat-icon.green svg  { stroke: #16a34a; }
            .admin-stat-icon.blue   { background: #dbeafe; }
            .admin-stat-icon.blue svg   { stroke: #2563eb; }
            .admin-stat-icon.amber  { background: #fef3c7; }
            .admin-stat-icon.amber svg  { stroke: #d97706; }
            .admin-stat-icon.rose   { background: #ffe4e6; }
            .admin-stat-icon.rose svg   { stroke: #e11d48; }

            .admin-stat-info h3 {
                font-size: 1.6rem;
                font-weight: 700;
                color: var(--admin-text);
                line-height: 1;
                margin-bottom: 0.2rem;
            }

            .admin-stat-info p {
                font-size: 0.82rem;
                color: var(--admin-text-muted);
                font-weight: 500;
            }

            /* --- Form Sections --- */
            .admin-form-section {
                background: var(--admin-surface);
                border-radius: var(--admin-radius-lg);
                border: 1px solid var(--admin-border-light);
                box-shadow: var(--admin-shadow);
                padding: 1.5rem;
                margin-bottom: 1.2rem;
            }

            .admin-form-section-title {
                display: flex;
                align-items: center;
                gap: 0.6rem;
                font-size: 1rem;
                font-weight: 600;
                color: var(--admin-text);
                margin-bottom: 1.2rem;
                padding-bottom: 0.8rem;
                border-bottom: 1px solid var(--admin-border-light);
            }

            .admin-form-section-title svg {
                width: 20px;
                height: 20px;
                stroke: var(--admin-primary);
                fill: none;
                stroke-width: 2;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            .admin-form-group {
                margin-bottom: 1.2rem;
            }

            .admin-form-group label {
                display: block;
                font-size: 0.82rem;
                font-weight: 600;
                color: var(--admin-text-secondary);
                margin-bottom: 0.4rem;
            }

            .admin-form-group input[type="text"],
            .admin-form-group input[type="number"],
            .admin-form-group input[type="email"],
            .admin-form-group input[type="url"],
            .admin-form-group textarea,
            .admin-form-group select {
                width: 100%;
                padding: 0.7rem 0.9rem;
                border: 1.5px solid var(--admin-border);
                border-radius: 10px;
                font-family: 'Inter', sans-serif;
                font-size: 0.9rem;
                color: var(--admin-text);
                transition: var(--admin-transition);
                background: var(--admin-surface);
            }

            .admin-form-group input:focus,
            .admin-form-group textarea:focus,
            .admin-form-group select:focus {
                outline: none;
                border-color: var(--admin-primary);
                box-shadow: 0 0 0 3px rgba(107, 143, 113, 0.12);
            }

            .admin-form-row {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
            }

            /* --- Quick Actions --- */
            .admin-quick-actions {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }

            .admin-quick-action {
                display: flex;
                align-items: center;
                gap: 0.8rem;
                padding: 1rem;
                background: var(--admin-surface);
                border: 1px solid var(--admin-border-light);
                border-radius: var(--admin-radius);
                transition: var(--admin-transition);
                text-decoration: none;
                color: var(--admin-text);
            }

            .admin-quick-action:hover {
                border-color: var(--admin-primary-light);
                background: var(--admin-primary-ultra-light);
                transform: translateY(-2px);
                box-shadow: var(--admin-shadow);
            }

            .admin-quick-action-icon {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                background: var(--admin-primary-ultra-light);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }

            .admin-quick-action-icon svg {
                width: 20px;
                height: 20px;
                stroke: var(--admin-primary);
                fill: none;
                stroke-width: 2;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            .admin-quick-action span {
                font-size: 0.85rem;
                font-weight: 600;
            }

            /* --- Alert / Success Message (Floating Toast) --- */
            .admin-alert-success {
                position: fixed;
                top: 24px;
                right: 24px;
                z-index: 9999;
                background: #dcfce7;
                border: 1px solid #86efac;
                color: #166534;
                padding: 1rem 1.5rem;
                border-radius: var(--admin-radius);
                font-size: 0.95rem;
                font-weight: 600;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                display: flex;
                align-items: center;
                gap: 0.7rem;
                animation: slideInRight 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            }

            @keyframes slideInRight {
                from { transform: translateX(120%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes fadeOutRight {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(120%); opacity: 0; }
            }

            /* --- Image Thumbnail --- */
            .admin-thumb {
                width: 56px;
                height: 42px;
                object-fit: cover;
                border-radius: 8px;
                border: 1px solid var(--admin-border-light);
            }

            /* --- Mobile Card Layout for Tables --- */
            .admin-mobile-cards {
                display: none;
            }

            @media (max-width: 768px) {
                .admin-desktop-table {
                    display: none !important;
                }

                .admin-mobile-cards {
                    display: flex;
                    flex-direction: column;
                    gap: 0.8rem;
                }

                .admin-mobile-card {
                    background: var(--admin-surface);
                    border: 1px solid var(--admin-border-light);
                    border-radius: var(--admin-radius);
                    padding: 1rem;
                    box-shadow: var(--admin-shadow);
                }

                .admin-mobile-card-header {
                    display: flex;
                    align-items: center;
                    gap: 0.8rem;
                    margin-bottom: 0.8rem;
                    padding-bottom: 0.8rem;
                    border-bottom: 1px solid var(--admin-border-light);
                }

                .admin-mobile-card-body {
                    display: grid;
                    gap: 0.4rem;
                }

                .admin-mobile-card-row {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    font-size: 0.85rem;
                }

                .admin-mobile-card-label {
                    color: var(--admin-text-muted);
                    font-weight: 500;
                }

                .admin-mobile-card-value {
                    font-weight: 600;
                    color: var(--admin-text);
                }

                .admin-mobile-card-actions {
                    display: flex;
                    gap: 0.5rem;
                    margin-top: 0.8rem;
                    padding-top: 0.8rem;
                    border-top: 1px solid var(--admin-border-light);
                }

                .admin-mobile-card-actions > * {
                    flex: 1;
                    text-align: center;
                    justify-content: center;
                }

                .admin-stat-grid {
                    grid-template-columns: 1fr 1fr;
                }

                .admin-form-row {
                    grid-template-columns: 1fr;
                }

                .admin-card-body {
                    padding: 1rem;
                }

                .admin-page-header .flex {
                    flex-direction: column;
                    gap: 0.8rem;
                    align-items: flex-start !important;
                }
            }

            @media (max-width: 480px) {
                .admin-stat-grid {
                    grid-template-columns: 1fr;
                }
            }

            /* --- File Upload --- */
            .admin-file-upload {
                border: 2px dashed var(--admin-border);
                border-radius: var(--admin-radius);
                padding: 1.5rem;
                text-align: center;
                cursor: pointer;
                transition: var(--admin-transition);
                background: var(--admin-bg);
            }

            .admin-file-upload:hover {
                border-color: var(--admin-primary-light);
                background: var(--admin-primary-ultra-light);
            }

            .admin-file-upload input[type="file"] {
                display: none;
            }

            .admin-file-upload-text {
                font-size: 0.85rem;
                color: var(--admin-text-muted);
            }

            .admin-file-upload-text svg {
                width: 32px;
                height: 32px;
                stroke: var(--admin-text-muted);
                margin: 0 auto 0.5rem;
                display: block;
            }

            /* Image Preview */
            .admin-image-preview {
                margin-top: 0.8rem;
                border-radius: var(--admin-radius);
                overflow: hidden;
                max-width: 200px;
            }

            .admin-image-preview img {
                width: 100%;
                height: auto;
                display: block;
                border-radius: var(--admin-radius);
                border: 1px solid var(--admin-border-light);
            /* --- Toggle Switch --- */
            .admin-toggle-wrapper {
                position: relative;
                width: 44px;
                height: 24px;
                display: inline-block;
                flex-shrink: 0;
            }
            .admin-toggle-input {
                opacity: 0;
                width: 0;
                height: 0;
                position: absolute;
            }
            .admin-toggle-bg {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #d1d5db;
                border-radius: 24px;
                transition: 0.3s;
                box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
            }
            .admin-toggle-dot {
                position: absolute;
                height: 18px;
                width: 18px;
                left: 3px;
                bottom: 3px;
                background-color: white;
                border-radius: 50%;
                transition: 0.3s;
                box-shadow: 0 1px 3px rgba(0,0,0,0.3);
            }
            .admin-toggle-input:checked + .admin-toggle-bg {
                background-color: var(--admin-primary);
            }
            .admin-toggle-input:checked + .admin-toggle-bg .admin-toggle-dot {
                transform: translateX(20px);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen" style="background: var(--admin-bg);">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="admin-page-header">
                    <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main style="padding-bottom: 2rem;">
                @if(session('success'))
                    <div class="admin-alert-success" id="admin-toast-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>

        <!-- Toast Animation Script -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const toast = document.getElementById('admin-toast-success');
                if (toast) {
                    setTimeout(() => {
                        toast.style.animation = 'fadeOutRight 0.4s ease-in forwards';
                        setTimeout(() => toast.remove(), 400);
                    }, 3500); // Tampil selama 3.5 detik
                }
            });
        </script>
    </body>
</html>
