@extends('layouts.app')

@section('header', 'Pilkada')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        <div class="w-full flex justify-end items-center mb-4">
            <a href="{{ route("createpilkada") }}"
               class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah Data
            </a>
        </div>
        <div class="w-full overflow-auto">
            <table class="table-auto text-left w-full">
                <thead>
                <tr class="">
                    <th class="truncate border-b border-t p-4">Nama Pilkada</th>
                    <th class="truncate border-b border-t p-4">Awal Periode</th>
                    <th class="truncate border-b border-t p-4">Akhir Periode</th>
                    <th class="truncate border-b border-t p-4">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($mElections as $i => $mElection)
                    <tr class="<?= $i%2==0 ? 'bg-gray-200' : '' ?>">
                        <td class="px-4 py-2">{{ $mElection->name }}</td>
                        <td class="px-4 py-2 text-right">{{ $mElection->start }}</td>
                        <td class="px-4 py-2 text-right">{{ $mElection->end }}</td>
                        <td class="px-4 py-2 flex justify-around items-center">
                            <button type="button" class="bg-yellow-400 mx-2 p-4 rounded-lg "><i class="fas fa-user-friends"></i></button>
                            <button type="button" class="bg-yellow-400 mx-2 p-4 rounded-lg "><i class="far fa-edit"></i></button>
                            <button type="button" class="bg-yellow-400 mx-2 p-4 rounded-lg "><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-gray-100 text-center">
                        <td class="border px-4 py-2" colspan="4">Nodata</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
