@extends('layouts.app')

@section('header', $mElection->name .' ' . $mElection->peroidstart->name . '-'. $mElection->peroidend->name)

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="w-full flex justify-between items-center mb-4">
            <div class="font-bold text-xl">
                {{ "Data Kandidat"}}
            </div>
            <a href="{{ route('candidate.create', ['pemilu' => $mElection->id]) }}"
               class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah Kandidat
            </a>
        </div>
        <div class="w-full overflow-auto">
            <table class="table-auto text-left w-full">
                <thead>
                <tr class="">
                    <th class="truncate border-b border-t p-4">{{ "No Urut" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Nama Kandidat" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Nama Wakil Kandidat" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Action" }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($mCandidates as $i => $mCandidate)
                    <tr class="<?= $i % 2 == 0 ? 'bg-gray-200' : '' ?>">
                        <td class="px-4 py-2">{{ $mCandidate->nourut }}</td>
                        <td class="px-4 py-2">{{ $mCandidate->ketua }}</td>
                        <td class="px-4 py-2">{{ $mCandidate->wakil }}</td>
                        <td class="px-4 py-2 flex justify-around items-center">
                            <a href="{{ route('candidate.edit', ['pemilu' => $mElection->id ,'candidate' => $mCandidate->id]) }}"
                               class="text-gray-100 bg-yellow-500 hover:bg-yellow-700 mx-2 p-4 rounded-lg focus:outline-none focus:shadow-outline">
                                <i class="fas fa-pencil-alt"></i></a>
                            <form
                                action="{{ route('candidate.destroy', ['pemilu' => $mElection->id ,'candidate' => $mCandidate->id]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                        class="text-gray-100 bg-red-500 hover:bg-red-700 mx-2 p-4 rounded-lg focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
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
