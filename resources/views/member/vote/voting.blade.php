@extends('layouts.app')

@section('header', 'Input Suara')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('vote.votingstore', ['vote' => $mVote->id]) }}">
            @csrf
            <div class="flex flex-wrap mb-4 -mx-2">
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Pemilu</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mElection->name }}</div>
                </div>
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Jabatan</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mElection->position->name }}</div>
                </div>
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Provinsi</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mVote->province->name }}</div>
                </div>
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Kabupaten</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mVote->district->name }}</div>
                </div>
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Kecamatan</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mVote->subdistrict->name }}</div>
                </div>
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Desa / Kabupaten</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mVote->village->name }}</div>
                </div>

                <div class="flex flex-wrap mb-6 px-2 w-full sm:w-1/2">
                    <label for="suara_sah" class="block text-gray-700 text-sm font-bold mb-2">
                        Jumlah Suara Sah
                    </label>

                    <input id="suara_sah" type="text"
                           class="form-input w-full @error('suara_sah') border-red-500 @enderror"
                           name="suara_sah" placeholder="Jumlah Suara Sah ... "
                           required autofocus>
                    @error('suara_sah')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2 w-full sm:w-1/2">
                    <label for="suara_tidak_sah" class="block text-gray-700 text-sm font-bold mb-2">
                        Jumlah Tidak Suara Sah
                    </label>

                    <input id="suara_tidak_sah" type="text"
                           class="form-input w-full @error('suara_tidak_sah') border-red-500 @enderror"
                           name="suara_tidak_sah"
                           placeholder="Jumlah Tidak Suara Sah ... "
                           required autofocus>
                    @error('suara_tidak_sah')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                @forelse($mCandidates as $i => $mCandidate)
                    <div class="flex flex-wrap mb-6 px-2 w-full sm:w-1/2">
                        <label for="vote" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ $mCandidate->nourut. '. ' . $mCandidate->ketua . ' - ' . $mCandidate->wakil}}
                        </label>
                        <input id="vote" type="text" name="candidates[{{$mCandidate->id}}]" class="form-input w-full" placeholder="Jumlah Suara ... " required autofocus>
                    </div>
                @empty
                    kosong
                @endforelse
            </div>
            <div class="flex flex-wrap items-center justify-end">
                @if($mCandidates)
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Simpan') }}
                    </button>
                @endif
            </div>
        </form>
    </div>
@endsection
