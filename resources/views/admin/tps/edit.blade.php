@extends('layouts.app')

@section('header', 'Edit TPS')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('tps.update', ['tps' => $mTps->id ]) }}">
            @method('PUT')
            @csrf
            <div class="mb-4 -mx-2">
                <div class="flex flex-wrap mb-6">
                    <div class="px-2 w-1/3">{{ 'Pemilu' }}</div>
                    <div class="px-2 w-1/3">{{ $mTps->election->name }}</div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <div class="px-2 w-1/3">{{ 'Periode' }}</div>
                    <div class="px-2 w-1/3">{{ $mTps->election->peroidstart->name . '-' . $mTps->election->peroidend->name }}</div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <div class="px-2 w-1/3">{{ 'Provinsi' }}</div>
                    <div class="px-2 w-1/3">{{ $mTps->province->name }}</div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <div class="px-2 w-1/3">{{ 'Kabupaten' }}</div>
                    <div class="px-2 w-1/3">{{ $mTps->district->name }}</div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <div class="px-2 w-1/3">{{ 'Kecamatan' }}</div>
                    <div class="px-2 w-1/3">{{ $mTps->subdistrict->name }}</div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <div class="px-2 w-1/3">{{ 'Desa / Kelurahan' }}</div>
                    <div class="px-2 w-1/3">{{ $mTps->village->name }}</div>
                </div>
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                        Nama TPS
                    </label>
                    <input id="name" type="text"
                           class="form-input w-full @error('name') border-red-500 @enderror"
                           name="name" value="{{ $mTps->name }}" placeholder="Nama TPS ... " required autofocus>
                    @error('name')
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
                           name="address" placeholder="Alamat ... " autofocus>{{ $mTps->address }}</textarea>
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
