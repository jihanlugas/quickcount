@extends('layouts.app')
@section('header', 'Register Relawan')
@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        <form class="" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex flex-wrap mb-6">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Nama') }}:
                </label>
                <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                       name="name" value="{{ old('name') }}" placeholder="Name ..." required autofocus>
                @error('name')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap mb-6">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Email') }}:
                </label>
                <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror"
                       name="email" value="{{ old('email') }}" placeholder="Email ..." required autofocus>
                @error('email')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Password') }}:
                </label>
                <input id="password" type="password"
                       class="form-input w-full @error('password') border-red-500 @enderror" name="password" placeholder="Password ..." required
                       autofocus>
                @error('password')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap mb-6">
                <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Konfirmasi Password') }}:
                </label>
                <input id="password-confirm" type="password" class="form-input w-full" name="password_confirmation"
                       placeholder="Konfirmasi Password ..." required autofocus>
            </div>

            <div class="flex flex-wrap mb-6 px-2">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">
                    No. Handphone
                </label>
                <input id="phone" type="text"
                       class="form-input w-full @error('phone') border-red-500 @enderror"
                       name="phone" value="{{ old('phone') }}" placeholder="No. Handphone ... " required autofocus>
                @error('phone')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="flex flex-wrap mb-6 px-2">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">
                    Alamat
                </label>
                <textarea id="address" type="text"
                          class="form-input w-full @error('address') border-red-500 @enderror"
                          name="address" placeholder="Alamat ... " required autofocus>{{ old('address') }}</textarea>
                @error('address')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap justify-end">
                <button type="submit"
                        class="inline-block align-middle text-ri select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                    {{ __('Register') }}
                </button>
            </div>
            <p class="w-full text-xs text-center text-gray-700 mt-8">
                {{ __('Sudah punya akun?') }}
                <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            </p>
        </form>
    </div>
@endsection
