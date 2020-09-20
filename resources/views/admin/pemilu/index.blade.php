@extends('layouts.app')

@section('header', 'Pemilu')

@section('content')

    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="w-full flex justify-end items-center mb-4">
            <a href="{{ route("pemilu.create") }}"
               class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah Pemilu
            </a>
        </div>
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
                        <div class="w-full flex flex-col mt-4">
                            <div class="flex flex-wrap justify-center items-center -mx-2">
                                <div class="w-full flex justify-center items-center px-2 mb-2">
                                    <a href="{{ route('candidate.index', ['pemilu' => $mElection->id]) }}"
                                       class="w-full text-center font-bold p-2 border rounded text-gray-100 bg-blue-500 hover:bg-blue-700 focus:outline-none focus:shadow-outline">Kandidat</a>
                                </div>
                                <div class="w-full flex justify-center items-center px-2 mb-2">
                                    <a href="{{ route('pemilu.settps', ['pemilu' => $mElection->id]) }}"
                                       class="w-full text-center font-bold p-2 border rounded text-gray-100 bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline">TPS</a>
                                </div>
                                <div class="w-1/2 flex justify-center items-center px-2 mb-2">
                                    <a href="{{ route('pemilu.edit', ['pemilu' => $mElection->id]) }}"
                                       class="w-full text-center font-bold p-2 border rounded text-gray-100 bg-yellow-500 hover:bg-yellow-700 focus:outline-none focus:shadow-outline">
                                        <i class="fas fa-pencil-alt"></i> Edit</a>
                                </div>
                                <form action="{{ route('pemilu.destroy', ['pemilu' => $mElection->id]) }}"
                                      method="post"
                                      class="w-1/2 flex justify-center items-center px-2 mb-2">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                            class="w-full text-center font-bold p-2 border rounded text-gray-100 bg-red-500 hover:bg-red-700 focus:outline-none focus:shadow-outline">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
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
