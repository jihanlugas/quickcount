@extends('layouts.app')

@section('header', 'Ganti Password')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('user.changepassstore') }}">
            @csrf
            <div class="mb-4 -mx-2">
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                        Password Lama
                    </label>
                    <input id="old_password" type="password"
                           class="form-input w-full @error('old_password') border-red-500 @enderror"
                           name="old_password" placeholder="Password Lama ... " required autofocus>
                    @error('old_password')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                        Password Baru
                    </label>
                    <input id="password" type="password"
                           class="form-input w-full @error('password') border-red-500 @enderror"
                           name="password" placeholder="Password Baru ... " required autofocus>
                    @error('password')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">
                        Konfirmasi Password Baru
                    </label>
                    <input id="password_confirmation" type="password"
                           class="form-input w-full @error('password_confirmation') border-red-500 @enderror"
                           name="password_confirmation" placeholder="Konfirmasi Password Baru ... " required autofocus>
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-end">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Simpan') }}
                </button>
            </div>
        </form>
    </div>
@endsection
