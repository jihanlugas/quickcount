@extends('layouts.app')

@section('header', 'Relawan - TPS')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="w-full flex justify-between items-center mb-4">
            <div class="font-bold text-xl">
                {{ $mUser->name }}
            </div>
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
                    <th class="truncate border-b border-t p-4">{{ "TPS" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Status" }}</th>
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
                        <td class="px-4 py-2 flex justify-around items-center">
                            @if($mVote->status == \App\Vote::VOTE_STATUS_WAITING_ID)
                                <form
                                    action="{{ route('user.approve', ['user' => $mUser->id]) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="vote_id" value="{{$mVote->id}}">
                                    <button type="submit"
                                            class="text-gray-100 bg-blue-500 hover:bg-blue-700 mx-2 px-3 py-2  rounded-lg focus:outline-none focus:shadow-outline">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form
                                    action="{{ route('user.reject', ['user' => $mUser->id]) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="vote_id" value="{{$mVote->id}}">
                                    <button type="submit"
                                            class="text-gray-100 bg-red-500 hover:bg-red-700 mx-2 px-3 py-2  rounded-lg focus:outline-none focus:shadow-outline">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="bg-gray-100 text-center">
                        <td class="border-b px-4 py-2" colspan="4">Nodata</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
