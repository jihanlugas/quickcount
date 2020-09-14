@extends('layouts.app')

@section('header', $mElection->name .' ' . $mElection->start . '-'. $mElection->end)

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="w-full flex justify-between items-center mb-4">
            <div class="font-bold text-xl">
                {{ "Data Calon " . $mElection->position }}
            </div>
            <a href="{{ url("pilkada/create") }}"
               class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah Data
            </a>
        </div>
        <div class="w-full overflow-auto">
            <table class="table-auto text-left w-full">
                <thead>
                <tr class="">
                    <th class="truncate border-b border-t p-4">{{ "No Urut" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Nama Calon " . $mElection->position }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Nama Calon Wakil " . $mElection->position }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Action" }}</th>
                </tr>
                </thead>
                <tbody>
{{--                @forelse($mElections as $i => $mElection)--}}
{{--                    <tr class="<?= $i%2==0 ? 'bg-gray-200' : '' ?>">--}}
{{--                        <td class="px-4 py-2">{{ $mElection->name }}</td>--}}
{{--                        <td class="px-4 py-2 text-right">{{ $mElection->start }}</td>--}}
{{--                        <td class="px-4 py-2 text-right">{{ $mElection->end }}</td>--}}
{{--                        <td class="px-4 py-2 flex justify-around items-center">--}}
{{--                            <a href="{{ route('pilkada.show', ['pilkada' => $mElection->id]) }}" class="bg-blue-400 mx-2 p-4 rounded-lg "><i class="fas fa-user-friends"></i></a>--}}
{{--                            <a href="{{ route('pilkada.edit', ['pilkada' => $mElection->id]) }}" class="bg-yellow-400 mx-2 p-4 rounded-lg "><i class="fas fa-user-edit"></i></a>--}}
{{--                            <a href="{{ route('pilkada.destroy', ['pilkada' => $mElection->id]) }}" class="bg-red-400 mx-2 p-4 rounded-lg "><i class="fas fa-trash"></i></a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @empty--}}
{{--                    <tr class="bg-gray-100 text-center">--}}
{{--                        <td class="border px-4 py-2" colspan="4">Nodata</td>--}}
{{--                    </tr>--}}
{{--                @endforelse--}}
                </tbody>
            </table>
        </div>

    </div>
@endsection
