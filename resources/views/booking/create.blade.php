<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kamar | KV Homestay</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, var(--clr-bg-alt) 0%, var(--clr-primary-ultra-light) 100%);
            min-height: 100vh;
        }

        .booking-wrapper {
            padding: 120px 1.5rem 50px;
            display: flex;
            justify-content: center;
        }

        .booking-container {
            width: 100%;
            max-width: 650px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.5);
            overflow: hidden;
            position: relative;
        }

        .booking-header {
            background: var(--gradient-primary);
            padding: 2.5rem 2.5rem 1.5rem;
            color: white;
            text-align: center;
        }

        .booking-header h2 {
            color: white;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .booking-header p {
            opacity: 0.9;
            font-size: 1rem;
        }

        .booking-body {
            padding: 2.5rem;
        }

        .room-summary {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
            padding: 1.5rem;
            background: var(--clr-bg-main);
            border-radius: var(--radius-lg);
            border: 1px solid var(--clr-border-light);
            align-items: center;
        }

        .room-summary img {
            width: 130px;
            height: 95px;
            object-fit: cover;
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-sm);
        }

        .room-summary-placeholder {
            width: 130px;
            height: 95px;
            background: var(--clr-primary-ultra-light);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--clr-primary);
        }

        .room-summary-info h3 {
            font-family: var(--font-heading);
            font-size: 1.4rem;
            margin-bottom: 0.3rem;
            font-weight: 700;
            color: var(--clr-text-main);
        }

        .room-summary-info p {
            color: var(--clr-primary-dark);
            font-weight: 600;
            font-size: 1.15rem;
        }

        .room-summary-info p span {
            font-size: 0.85rem;
            color: var(--clr-text-light);
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 600;
            color: var(--clr-text-secondary);
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border: 2px solid var(--clr-border);
            border-radius: var(--radius-md);
            font-family: inherit;
            font-size: 0.95rem;
            transition: var(--transition-fast);
            background: white;
            color: var(--clr-text-main);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--clr-primary-light);
            box-shadow: 0 0 0 4px rgba(107, 143, 113, 0.1);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .btn-submit {
            width: 100%;
            margin-top: 2rem;
            padding: 1.1rem;
            font-size: 1.1rem;
            border-radius: var(--radius-md);
        }

        @media (max-width: 640px) {
            .booking-wrapper {
                padding-top: 100px;
                padding-bottom: 30px;
            }
            .booking-header {
                padding: 2rem 1.5rem 1.5rem;
            }
            .booking-header h2 {
                font-size: 1.8rem;
            }
            .booking-body {
                padding: 1.5rem;
            }
            .form-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }
            .room-summary {
                flex-direction: column;
                text-align: center;
                padding: 1.2rem;
                gap: 1rem;
            }
            .room-summary img, .room-summary-placeholder {
                width: 100%;
                height: 180px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar--solid">
        <div class="container nav-container" style="justify-content: space-between;">
            <a href="{{ route('welcome') }}" class="logo">KV Homestay.</a>
            <a href="{{ route('welcome') }}" class="btn-primary-outline btn-sm" style="display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 600;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali
            </a>
        </div>
    </nav>

    <div class="booking-wrapper">
        <div class="booking-container fade-in">
            <div class="booking-header">
                <h2>Formulir Pemesanan</h2>
                <p>Lengkapi data di bawah ini untuk mengonfirmasi pesanan Anda.</p>
            </div>
            
            <div class="booking-body">
                <div class="room-summary">
                    @if($room->image)
                        <img src="{{ asset($room->image) }}" alt="{{ $room->name }}">
                    @else
                        <div class="room-summary-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        </div>
                    @endif
                    <div class="room-summary-info">
                        <h3>{{ $room->name }}</h3>
                        <p>Rp {{ number_format($room->price, 0, ',', '.') }} <span>/ malam</span></p>
                    </div>
                </div>

                <form action="{{ route('booking.store', $room) }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="guest_name">Nama Lengkap</label>
                        <input type="text" id="guest_name" name="guest_name" class="form-control" value="{{ old('guest_name') }}" placeholder="Contoh: Budi Santoso" required autofocus>
                        @error('guest_name') <span style="color: #dc2626; font-size: 0.85rem; display:block; margin-top:0.4rem; font-weight: 500;">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="guest_email">Alamat Email</label>
                            <input type="email" id="guest_email" name="guest_email" class="form-control" value="{{ old('guest_email') }}" placeholder="budi@contoh.com" required>
                            @error('guest_email') <span style="color: #dc2626; font-size: 0.85rem; display:block; margin-top:0.4rem; font-weight: 500;">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="guest_phone">No. WhatsApp</label>
                            <input type="text" id="guest_phone" name="guest_phone" class="form-control" value="{{ old('guest_phone') }}" placeholder="081234567890" required>
                            @error('guest_phone') <span style="color: #dc2626; font-size: 0.85rem; display:block; margin-top:0.4rem; font-weight: 500;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="check_in">Tanggal Check-In</label>
                            <input type="date" id="check_in" name="check_in" class="form-control" min="{{ date('Y-m-d') }}" value="{{ old('check_in') }}" required>
                            @error('check_in') <span style="color: #dc2626; font-size: 0.85rem; display:block; margin-top:0.4rem; font-weight: 500;">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="check_out">Tanggal Check-Out</label>
                            <input type="date" id="check_out" name="check_out" class="form-control" min="{{ date('Y-m-d', strtotime('+1 day')) }}" value="{{ old('check_out') }}" required>
                            @error('check_out') <span style="color: #dc2626; font-size: 0.85rem; display:block; margin-top:0.4rem; font-weight: 500;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn-primary btn-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        Konfirmasi Pesanan
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        // Simple script to auto-update checkout min date based on check-in
        document.getElementById('check_in').addEventListener('change', function() {
            if(!this.value) return;
            let checkInDate = new Date(this.value);
            checkInDate.setDate(checkInDate.getDate() + 1);
            let checkOutDate = checkInDate.toISOString().split('T')[0];
            let checkOutInput = document.getElementById('check_out');
            checkOutInput.min = checkOutDate;
            if (checkOutInput.value && checkOutInput.value < checkOutDate) {
                checkOutInput.value = checkOutDate;
            }
        });
    </script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
