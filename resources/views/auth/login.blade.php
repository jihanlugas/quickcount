@extends('layouts.app')
@section('header', 'Login')
@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-wrap mb-6">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Alamat E-Mail') }}
                </label>

                <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Password') }}
                </label>

                <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror"
                       name="password" required>

                @error('password')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{--        <div class="flex mb-6">--}}
            {{--            <label class="inline-flex items-center text-sm text-gray-700" for="remember">--}}
            {{--                <input type="checkbox" name="remember" id="remember"--}}
            {{--                       class="form-checkbox" {{ old('remember') ? 'checked' : '' }}>--}}
            {{--                <span class="ml-2">{{ __('Remember Me') }}</span>--}}
            {{--            </label>--}}
            {{--        </div>--}}

            <div class="flex flex-wrap justify-end">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Login') }}
                </button>

                {{--            @if (Route::has('password.request'))--}}
                {{--                <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline ml-auto"--}}
                {{--                   href="{{ route('password.request') }}">--}}
                {{--                    {{ __('Forgot Your Password?') }}--}}
                {{--                </a>--}}
                {{--            @endif--}}

{{--                @if (Route::has('register'))--}}
{{--                    <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">--}}
{{--                        {{ __("Tidak punya akun? ") }}--}}
{{--                        <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('register') }}">--}}
{{--                            {{ __('Register') }}--}}
{{--                        </a>--}}
{{--                    </p>--}}
{{--                @endif--}}
            </div>
        </form>
    </div>


@endsection
