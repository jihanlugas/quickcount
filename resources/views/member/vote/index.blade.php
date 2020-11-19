@extends('layouts.app')

@section('header', 'Input Suara')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="w-full flex justify-between items-center mb-4">
            <div class="font-bold text-xl">
                {{ "Data Input Suara"}}
            </div>
            <a href="{{ route('vote.create') }}"
               class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah Input Suara
            </a>
        </div>
        <div class="w-full overflow-auto">
            <table class="table-auto text-left w-full">
                <thead>
                <tr class="whitespace-no-wrap">
                    <th class="truncate border-b border-t p-4">{{ "Pemilu" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Provinsi" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Kabupaten" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Kecamatan" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Desa / Kelurahan" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Tps" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Status" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Input Suara" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Action" }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($mVotes as $i => $mVote)
                    <tr class="whitespace-no-wrap <?= $i % 2 == 0 ? 'bg-gray-200' : '' ?>">
                        <td class="px-4 py-2">{{ $mVote->election->name }}</td>
                        <td class="px-4 py-2">{{ $mVote->province->name }}</td>
                        <td class="px-4 py-2">{{ $mVote->district->name }}</td>
                        <td class="px-4 py-2">{{ $mVote->subdistrict->name }}</td>
                        <td class="px-4 py-2">{{ $mVote->village->name }}</td>
                        <td class="px-4 py-2">{{ $mVote->tps->name }}</td>
                        <td class="px-4 py-2">{{ \App\Vote::STATUS_NAME[$mVote->status] }}</td>
                        <td class="px-4 py-2">{{ $mVote->has_vote ? "Selesai" : "Belum Selesai" }}</td>
                        <td class="px-4 py-2 flex justify-around items-center">
                            @if($mVote->status == \App\Vote::VOTE_STATUS_APPROVE_ID && !$mVote->has_vote)
                            <a href="{{ route('vote.voting', ['vote' => $mVote->id]) }}"
                               class="text-gray-100 bg-blue-500 hover:bg-blue-700 mx-2 px-3 py-2  rounded-lg focus:outline-none focus:shadow-outline">
                                <i class="fas fa-vote-yea"></i></a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="bg-gray-100 text-center">
                        <td class="border-b px-4 py-2" colspan="8">Nodata</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
