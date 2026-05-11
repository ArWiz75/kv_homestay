<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kamar | KV Homestay</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .booking-container {
            max-width: 600px;
            margin: 120px auto 50px;
            padding: 2.5rem;
            background: var(--clr-white);
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--clr-text-main);
        }
        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: inherit;
            transition: var(--transition-fast);
        }
        .form-control:focus {
            outline: none;
            border-color: var(--clr-primary);
            box-shadow: 0 0 0 2px rgba(143, 151, 121, 0.2);
        }
        .room-summary {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
            align-items: center;
        }
        .room-summary img {
            width: 120px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <nav class="navbar" style="box-shadow: var(--shadow-sm); background: var(--clr-white);">
        <div class="container nav-container">
            <a href="{{ route('welcome') }}" class="logo">KV Homestay.</a>
            <a href="{{ route('welcome') }}" class="btn-primary-outline btn-sm">Kembali</a>
        </div>
    </nav>

    <div class="container">
        <div class="booking-container fade-in">
            <h2 class="section-title" style="font-size: 2rem; margin-bottom: 1rem;">Formulir Pemesanan</h2>
            
            <div class="room-summary">
                @if($room->image)
                    <img src="{{ asset($room->image) }}" alt="{{ $room->name }}">
                @else
                    <div style="width:120px; height:90px; background:#eee; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#999;">No Image</div>
                @endif
                <div>
                    <h3 style="font-family: var(--font-body); font-size: 1.3rem; margin-bottom: 0.5rem; font-weight:600;">{{ $room->name }}</h3>
                    <p style="color: var(--clr-text-light); font-weight: 500; font-size:1.1rem;">Rp {{ number_format($room->price, 0, ',', '.') }} <span style="font-size:0.9rem;">/ malam</span></p>
                </div>
            </div>

            <form action="{{ route('booking.store', $room) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="guest_name">Nama Lengkap</label>
                    <input type="text" id="guest_name" name="guest_name" class="form-control" value="{{ old('guest_name') }}" placeholder="Masukkan nama Anda" required>
                    @error('guest_name') <span style="color: red; font-size: 0.8rem; display:block; margin-top:0.3rem;">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="guest_email">Email</label>
                        <input type="email" id="guest_email" name="guest_email" class="form-control" value="{{ old('guest_email') }}" placeholder="email@contoh.com" required>
                        @error('guest_email') <span style="color: red; font-size: 0.8rem; display:block; margin-top:0.3rem;">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="guest_phone">No. WhatsApp/Telepon</label>
                        <input type="text" id="guest_phone" name="guest_phone" class="form-control" value="{{ old('guest_phone') }}" placeholder="0812xxxxxx" required>
                        @error('guest_phone') <span style="color: red; font-size: 0.8rem; display:block; margin-top:0.3rem;">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="check_in">Tanggal Check-In</label>
                        <input type="date" id="check_in" name="check_in" class="form-control" min="{{ date('Y-m-d') }}" value="{{ old('check_in') }}" required>
                        @error('check_in') <span style="color: red; font-size: 0.8rem; display:block; margin-top:0.3rem;">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="check_out">Tanggal Check-Out</label>
                        <input type="date" id="check_out" name="check_out" class="form-control" min="{{ date('Y-m-d', strtotime('+1 day')) }}" value="{{ old('check_out') }}" required>
                        @error('check_out') <span style="color: red; font-size: 0.8rem; display:block; margin-top:0.3rem;">{{ $message }}</span> @enderror
                    </div>
                </div>

                <button type="submit" class="btn-primary" style="width: 100%; margin-top: 1rem; padding: 1rem; font-size: 1.1rem;">Kirim Pesanan (Booking)</button>
            </form>
        </div>
    </div>
    
    <script>
        // Simple script to auto-update checkout min date based on check-in
        document.getElementById('check_in').addEventListener('change', function() {
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
