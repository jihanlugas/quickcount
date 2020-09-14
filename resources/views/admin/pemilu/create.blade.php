@extends('layouts.app')

@section('header', 'Tambah Pemilu')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('pemilu.store') }}">
            @csrf
            <div class="mb-4 -mx-2">
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                        Nama Pemilu
                    </label>

                    <input id="name" type="text"
                           class="form-input w-full @error('name') border-red-500 @enderror"
                           name="name" value="{{ old('name') }}" placeholder="Pemilihan ... " required autofocus>
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="position_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Jabatan
                    </label>
                    <div class="relative w-full">
                        <select class="block form-input appearance-none w-full pr-8 @error('position_id') border-red-500 @enderror" id="grid-state" name="position_id" autofocus>
                            <option value="">Pilih Jabatan</option>
                            @foreach($mPositions as $mPosition)
                                <option value="{{ $mPosition->id }}" {{ old('position_id') == $mPosition->id ? "selected" : ""}}>{{ $mPosition->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    @error('position_id')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full sm:w-1/2 px-2 mb-6">
                        <label for="start" class="block text-gray-700 text-sm font-bold mb-2">
                            Awal Periode
                        </label>
                        <div class="relative w-full">
                            <select class="block form-input appearance-none w-full pr-8 @error('start') border-red-500 @enderror" id="grid-state" name="start" autofocus>
                                <option value="">Pilih Periode</option>
                                @foreach($mPeroids as $mPeroid)
                                    <option value="{{ $mPeroid->id }}" {{ old('start') == $mPeroid->id ? "selected" : ""}}>{{ $mPeroid->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                        @error('start')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 px-2 mb-6">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                            Akhir Periode
                        </label>
                        <div class="relative w-full">
                            <select class="block form-input appearance-none w-full pr-8 @error('end') border-red-500 @enderror" id="grid-state" name="end" autofocus>
                                <option value="">Pilih Periode</option>
                                @foreach($mPeroids as $mPeroid)
                                    <option value="{{ $mPeroid->id }}" {{ old('end') == $mPeroid->id ? "selected" : ""}}>{{ $mPeroid->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                        @error('end')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
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
