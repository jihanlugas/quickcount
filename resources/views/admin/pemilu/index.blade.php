@extends('layouts.app')

@section('header', 'Pemilu')

@section('content')

    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="w-full flex justify-end items-center mb-4">
            <a href="{{ url("pilkada/create") }}"
               class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah Pemilu
            </a>
        </div>
        <div class="flex flex-wrap -mx-4">
            @forelse($mElections as $i => $mElection)
                <div class="px-4 mb-4 flex w-full sm:w-1/2">
                    <div class="w-full p-4 border rounded-lg">
                        <div class="text-lg font-bold mb-2">
                            <span>{{ $mElection->name }}</a>
                        </div>
                        <div class="w-full flex justify-between items-center">
                            <span>Jabatan</span>
                            <span>{{ $mElection->position }}</span>
                        </div>
                        <div class="w-full flex justify-between items-center">
                            <span>Periode</span>
                            <span>{{ $mElection->start . '-' . $mElection->end }}</span>
                        </div>
                        <div class="w-full flex flex-col text-center mt-4">
                            <a href="" class="font-bold py-2 px-4 mb-2 border rounded text-blue-500 border-blue-500 hover:text-gray-100 hover:bg-blue-500 focus:outline-none focus:shadow-outline">Data Calon</a>
                            <a href="" class="font-bold py-2 px-4 mb-2 border rounded text-green-500 border-green-500 hover:text-gray-100 hover:bg-green-500 focus:outline-none focus:shadow-outline">Data TPS</a>
                            <a href="" class="font-bold py-2 px-4 mb-2 border rounded text-red-500 border-red-500 hover:text-gray-100 hover:bg-red-500 focus:outline-none focus:shadow-outline">Hapus Pemilu</a>
                        </div>
                    </div>
                </div>


                {{--                <tr class="<?= $i%2==0 ? 'bg-gray-200' : '' ?>">--}}
                {{--                    <td class="px-4 py-2">{{ $mElection->name }}</td>--}}
                {{--                    <td class="px-4 py-2 text-right">{{ $mElection->start }}</td>--}}
                {{--                    <td class="px-4 py-2 text-right">{{ $mElection->position }}</td>--}}
                {{--                    <td class="px-4 py-2 text-right">{{ $mElection->end }}</td>--}}
                {{--                    <td class="px-4 py-2 flex justify-around items-center">--}}
                {{--                        <a href="{{ route('pilkada.show', ['pilkada' => $mElection->id]) }}" class="bg-blue-400 mx-2 p-4 rounded-lg "><i class="fas fa-user-friends"></i></a>--}}
                {{--                        <a href="{{ route('pilkada.edit', ['pilkada' => $mElection->id]) }}" class="bg-yellow-400 mx-2 p-4 rounded-lg "><i class="fas fa-user-edit"></i></a>--}}
                {{--                        <a href="{{ route('pilkada.destroy', ['pilkada' => $mElection->id]) }}" class="bg-red-400 mx-2 p-4 rounded-lg "><i class="fas fa-trash"></i></a>--}}
                {{--                    </td>--}}
                {{--                </tr>--}}
            @empty
                <div class="w-full flex justify-center items-center h-16 font-bold text-2xl">
                    <span>Tidak Ada Data</span>
                </div>
            @endforelse
        </div>
        {{--        <div class="overflow-auto">--}}
        {{--            <table class="table-auto text-left w-full">--}}
        {{--                <thead>--}}
        {{--                <tr class="">--}}
        {{--                    <th class="truncate border-b border-t p-4">Nama Pemilu</th>--}}
        {{--                    <th class="truncate border-b border-t p-4">Jabatan</th>--}}
        {{--                    <th class="truncate border-b border-t p-4">Awal Periode</th>--}}
        {{--                    <th class="truncate border-b border-t p-4">Akhir Periode</th>--}}
        {{--                    <th class="truncate border-b border-t p-4">Action</th>--}}
        {{--                </tr>--}}
        {{--                </thead>--}}
        {{--                <tbody>--}}
        {{--                @forelse($mElections as $i => $mElection)--}}
        {{--                    <tr class="<?= $i%2==0 ? 'bg-gray-200' : '' ?>">--}}
        {{--                        <td class="px-4 py-2">{{ $mElection->name }}</td>--}}
        {{--                        <td class="px-4 py-2 text-right">{{ $mElection->start }}</td>--}}
        {{--                        <td class="px-4 py-2 text-right">{{ $mElection->position }}</td>--}}
        {{--                        <td class="px-4 py-2 text-right">{{ $mElection->end }}</td>--}}
        {{--                        <td class="px-4 py-2 flex justify-around items-center">--}}
        {{--                            <a href="{{ route('pilkada.show', ['pilkada' => $mElection->id]) }}" class="bg-blue-400 mx-2 p-4 rounded-lg "><i class="fas fa-user-friends"></i></a>--}}
        {{--                            <a href="{{ route('pilkada.edit', ['pilkada' => $mElection->id]) }}" class="bg-yellow-400 mx-2 p-4 rounded-lg "><i class="fas fa-user-edit"></i></a>--}}
        {{--                            <a href="{{ route('pilkada.destroy', ['pilkada' => $mElection->id]) }}" class="bg-red-400 mx-2 p-4 rounded-lg "><i class="fas fa-trash"></i></a>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                @empty--}}
        {{--                    <tr class="bg-gray-100 text-center">--}}
        {{--                        <td class="p-4" colspan="5">Nodata</td>--}}
        {{--                    </tr>--}}
        {{--                @endforelse--}}
        {{--                </tbody>--}}
        {{--            </table>--}}
        {{--        </div>--}}

    </div>
@endsection
