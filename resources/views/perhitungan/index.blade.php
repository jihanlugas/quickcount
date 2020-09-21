@extends('layouts.app')

@section('header', 'Perhitungan Cepat')

@section('content')

    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="flex flex-wrap -mx-4">
            @forelse($mElections as $i => $mElection)
                <div class="px-4 mb-4 flex w-full sm:w-1/2">
                    <div class="w-full p-4 border rounded-lg shadow">
                        <div class="text-lg font-bold mb-2">
                            <span>{{ $mElection->name }}</span>
                        </div>
                        <div class="w-full flex justify-between items-center">
                            <span>Jabatan</span>
                            <span>{{ $mElection->position->name }}</span>
                        </div>
                        <div class="w-full flex justify-between items-center">
                            <span>Periode</span>
                            <span>{{ $mElection->peroidstart->name . '-' . $mElection->peroidend->name }}</span>
                        </div>
                        @if($mElection->candidates)
                            <div class="w-full flex justify-between items-center mt-4 font-bold">
                                <span>Kandidat</span>
                            </div>
                            @foreach($mElection->candidates as $mCandidate)
                                <div class="flex flex-wrap mb-4">
                                    <div class="w-full flex justify-between items-center">
                                        <span>No Urut</span>
                                        <span>{{ $mCandidate->nourut }}</span>
                                    </div>
                                    <div class="w-full flex justify-between items-center">
                                        <span>Ketua</span>
                                        <span>{{ $mCandidate->ketua }}</span>
                                    </div>
                                    <div class="w-full flex justify-between items-center">
                                        <span>Wakil</span>
                                        <span>{{ $mCandidate->wakil }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        @endif
                        <div class="w-full flex flex-col mt-4">
                            @if(count($mElection->candidates) > 1)
                                <div class="flex flex-wrap justify-center items-center -mx-2">
                                    <div class="w-full flex justify-center items-center px-2 mb-2">
                                        <a href="{{ route('perhitungan.detail', ['perhitungan' => $mElection->id]) }}"
                                           class="w-full text-center font-bold p-2 border rounded text-gray-100 bg-blue-500 hover:bg-blue-700 focus:outline-none focus:shadow-outline">Detail</a>
                                    </div>
                                </div>
                            @else
                                <div class="flex flex-wrap justify-center items-center -mx-2">
                                    <div class="w-full flex justify-center items-center px-2 mb-2 font-bold">
                                        <span>Perhitungan Belum Tersedia</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-full flex justify-center items-center h-16 font-bold text-2xl">
                    <span>Tidak Ada Data</span>
                </div>
            @endforelse
        </div>

    </div>
@endsection
