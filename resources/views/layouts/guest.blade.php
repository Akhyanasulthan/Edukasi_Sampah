<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EduSampah Admin') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: #dcfce7; 
            background-image: radial-gradient(#111827 1px, transparent 1px);
            background-size: 20px 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .auth-card {
            background: #ffffff;
            border: 3px solid #111827;
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 1;
            box-shadow: 8px 8px 0px #111827;
        }

        .auth-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
            justify-content: center;
        }

        .auth-logo-icon {
            width: 56px; height: 56px;
            border-radius: 12px;
            background: #ffffff;
            display: flex; align-items: center; justify-content: center;
            border: 3px solid #111827;
            box-shadow: 4px 4px 0px #4ade80;
            overflow: hidden;
            padding: 4px;
        }

        .auth-logo-name {
            font-family: 'Nunito', sans-serif;
            font-size: 28px;
            font-weight: 900;
            color: #111827;
        }

        /* Form elements */
        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            background: #ffffff;
            border: 3px solid #111827;
            border-radius: 12px;
            color: #111827;
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            transition: all 0.2s;
            outline: none;
            box-shadow: 3px 3px 0px rgba(17,24,39,0.2);
        }

        .form-input::placeholder { color: #9ca3af; font-weight: 500; }

        .form-input:focus {
            box-shadow: 4px 4px 0px #111827;
            transform: translate(-2px, -2px);
        }

        .form-input.is-error {
            border-color: #ef4444;
            box-shadow: 4px 4px 0px #ef4444;
        }

        .form-error {
            font-size: 13px;
            font-weight: 700;
            color: #ef4444;
            margin-top: 8px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 700;
            color: #111827;
            cursor: pointer;
        }

        .form-check input[type="checkbox"] {
            width: 20px; height: 20px;
            border: 2px solid #111827;
            border-radius: 4px;
            appearance: none;
            background: #fff;
            cursor: pointer;
            position: relative;
        }
        
        .form-check input[type="checkbox"]:checked {
            background: #4ade80;
        }
        .form-check input[type="checkbox"]:checked::after {
            content: '✔';
            position: absolute;
            color: #111827;
            font-size: 14px;
            top: -2px; left: 3px;
        }

        .btn-primary {
            width: 100%;
            padding: 14px;
            background: #a7f3d0;
            border: 3px solid #111827;
            border-radius: 100px;
            color: #111827;
            font-size: 16px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 8px;
            box-shadow: 5px 5px 0px #111827;
        }

        .btn-primary:hover {
            background: #fef08a;
            transform: translate(2px, 2px);
            box-shadow: 3px 3px 0px #111827;
        }

        .btn-primary:active { transform: translate(5px, 5px); box-shadow: 0px 0px 0px #111827; }

        .auth-link {
            color: #16a34a;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            transition: all 0.2s;
        }

        .auth-link:hover { color: #111827; text-decoration: underline; }

        .auth-footer {
            margin-top: 24px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            color: #4b5563;
        }

        /* Status message */
        .status-msg {
            background: #fef08a;
            border: 3px solid #111827;
            border-radius: 12px;
            padding: 12px 14px;
            color: #111827;
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 20px;
            box-shadow: 4px 4px 0px #111827;
        }

        .auth-title {
            font-family: 'Nunito', sans-serif;
            font-size: 28px;
            font-weight: 900;
            color: #111827;
            margin-bottom: 6px;
            text-align: center;
        }

        .auth-subtitle {
            font-size: 14px;
            font-weight: 600;
            color: #4b5563;
            text-align: center;
            margin-bottom: 28px;
        }

        /* Input Group with Icon */
        .input-group-icon {
            position: relative;
            display: flex;
            align-items: center;
        }
        .input-group-icon .form-input {
            padding-left: 44px;
            padding-right: 44px;
        }
        .input-group-icon .input-icon-left {
            position: absolute;
            left: 14px;
            color: #111827;
            display: flex;
            align-items: center;
            pointer-events: none;
        }
        .input-group-icon .input-icon-right {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            cursor: pointer;
            color: #111827;
            display: flex;
            align-items: center;
            padding: 0;
            transition: transform 0.2s;
        }
        .input-group-icon .input-icon-right:hover {
            transform: scale(1.1);
        }
        
        .back-btn {
            position: absolute;
            top: 24px;
            left: 24px;
            color: #111827;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            padding: 8px 16px;
            border: 3px solid #111827;
            border-radius: 100px;
            box-shadow: 4px 4px 0px #111827;
            transition: all 0.2s;
        }
        .back-btn:hover {
            background: #fef08a;
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0px #111827;
        }
    </style>
</head>
<body>
    <a href="{{ route('beranda') }}" class="back-btn">
        ← Kembali ke Beranda
    </a>

    <div class="auth-card">
        <div class="auth-logo">
            <div class="auth-logo-icon">
                <img src="{{ asset('images/logo_edusampah.png') }}" alt="Logo" style="width:100%; height:100%; object-fit:contain;">
            </div>
            <div class="auth-logo-name">EduSampah</div>
        </div>
        {{ $slot }}
    </div>
</body>
</html>
