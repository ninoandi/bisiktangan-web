<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Bisik Tangan</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo bisik tangan.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #c5d4e4, #f5f7f8);
            background: linear-gradient(135deg, );
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: #fff;
            display: flex;
            flex-direction: row;
            width: 100%;
            max-width: 900px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .left {
            flex: 1;
            background: #f9fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .left img {
            max-width: 400px;
        }

        .right {
            flex: 1.5;
            padding: 40px;
            background-color: #ffffff;
        }

        .right h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .right p {
            margin-bottom: 30px;
            color: #777;
            font-size: 0.95em;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #0077FF;
            outline: none;
        }

        button {
            background-color: #0077FF;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #005edc;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 4px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left, .right {
                padding: 30px 20px;
                text-align: center;
            }

            .left img {
                max-width: 150px;
            }

            .right {
                padding-top: 0;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Left Logo Area -->
        <div class="left">
            <img src="{{ asset('assets/img/logo bisik tangan.png') }}" alt="Bisik Tangan Logo">
        </div>

        <!-- Right Reset Form -->
        <div class="right">
            <h2>Reset Password</h2>
            <p>Masukkan email dan password baru kamu untuk mengatur ulang kata sandi.</p>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit">Reset Password</button>
            </form>
        </div>
    </div>

</body>
</html>
