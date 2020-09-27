@extends('layouts.app')

@section('header', 'Edit Relawan')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('user.update', ['user' => $mUser->id ]) }}">
            @method('PUT')
            @csrf
            <div class="mb-4 -mx-2">
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                        Nama Relawan
                    </label>
                    <input id="name" type="text"
                           class="form-input w-full @error('name') border-red-500 @enderror"
                           name="name" value="{{ $mUser->name }}" placeholder="Nama Relawan ... " required autofocus>
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                        Email
                    </label>
                    <input id="email" type="email"
                           class="form-input w-full @error('email') border-red-500 @enderror"
                           name="email" value="{{ $mUser->email }}" placeholder="Email ... " required autofocus>
                    @error('email')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">
                        No. Handphone
                    </label>
                    <input id="phone" type="text"
                           class="form-input w-full @error('phone') border-red-500 @enderror"
                           name="phone" value="{{ $mUser->phone }}" placeholder="No. Handphone ... " required autofocus>
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
                              name="address" placeholder="Alamat ... " required autofocus>{{ $mUser->address }}</textarea>
                    @error('address')
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
