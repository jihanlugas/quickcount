@extends('layouts.app')

@section('header', 'Relawan')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="w-full flex justify-between items-center mb-4">
            <div class="font-bold text-xl">
                {{ "Data Relawan"}}
            </div>
            <a href="{{ route('user.create') }}"
               class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah Relawan
            </a>
        </div>
        <div class="w-full overflow-auto">
            <table class="table-auto text-left w-full">
                <thead>
                <tr class="whitespace-no-wrap">
                    <th class="truncate border-b border-t p-4">{{ "Nama" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Email" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "No. Handphone" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Alamat" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Action" }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($mUsers as $i => $mUser)
                    <tr class="whitespace-no-wrap <?= $i % 2 == 0 ? 'bg-gray-200' : '' ?>">
                        <td class="px-4 py-2">{{ $mUser->name }}</td>
                        <td class="px-4 py-2">{{ $mUser->email }}</td>
                        <td class="px-4 py-2">{{ $mUser->phone }}</td>
                        <td class="px-4 py-2">{{ $mUser->address }}</td>
                        <td class="px-4 py-2 flex justify-around items-center">
                            <a href="{{ route('user.tps', ['user' => $mUser->id]) }}"
                               class="text-gray-100 bg-blue-500 hover:bg-blue-700 mx-2 px-3 py-2  rounded-lg focus:outline-none focus:shadow-outline">
                                <i class="fas fa-vote-yea"></i></a>
                            <a href="{{ route('user.edit', ['user' => $mUser->id]) }}"
                               class="text-gray-100 bg-yellow-500 hover:bg-yellow-700 mx-2 px-3 py-2  rounded-lg focus:outline-none focus:shadow-outline">
                                <i class="fas fa-pencil-alt"></i></a>
                            <form
                                action="{{ route('user.destroy', ['user' => $mUser->id]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                        class="text-gray-100 bg-red-500 hover:bg-red-700 mx-2 px-3 py-2  rounded-lg focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
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
