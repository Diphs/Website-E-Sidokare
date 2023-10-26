<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- link awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- Link file CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/login.css') }}">
</head>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <body>
        <div class="contanier">
            
            <div class="text">
                
                <img src="{{ asset('frontend/assets/img/kisspng-nganjuk-regency-logo-sedudo-waterfall-5b3b9825ec1874.8963461115306322299671.png') }}" alt="">
            </div>
    
            <div class="box-login">
                <div class="login">
                    <div class="header">
                        <h2>Selamat Datang Kembali</h2>
                        <p>Mari mulai aktivitasmu kembali, selamat bekerja!</p>
                    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="inp">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            required autocomplete="email" oninvalid="this.setCustomValidity('Harap lengkapi email anda')" 
            oninput="this.setCustomValidity('')"
            placeholder="example@gmail.com" value="{{ old('email')}}"/>
            
          </div>

        <!-- Password -->
        <div class="inp">
            <x-input-label for="password" :value="__('Password')" placeholder="***********"/>

            {{-- <x-text-input 
                            required autocomplete="current-password"  /> --}}
                            
            <input id="password" class="block mt-1 w-full"
            type="password"
            name="password" class="form-control @error('password') is-invalid @enderror"
            required autocomplete="password" oninvalid="this.setCustomValidity('Harap mengisi password terlebih dahulu')" 
            oninput="this.setCustomValidity('')"
            placeholder="*************"/>

        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a> --}}
            @endif
            <div class="inp">  @error('email')
                <div class="invalid-feedback">
                  {{ 'EMAIL ATAU PASSWORD YANG ANDA MASUKAN SALAH!' }}
                </div> @enderror</div>

            <x-primary-button class="ml-3">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
    </html>