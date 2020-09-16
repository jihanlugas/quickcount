@extends('layouts.app')

@section('header', 'TPS')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="w-full flex justify-between items-center mb-4">
            <div class="font-bold text-xl">
                {{ "Data TPS"}}
            </div>
            <a href="{{ route('tps.create') }}"
               class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah TPS
            </a>
        </div>
        <div class="w-full overflow-auto">
            <table class="table-auto text-left w-full">
                <thead>
                <tr class="">
                    <th class="truncate border-b border-t p-4">{{ "Nama" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Kecamatan" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Kelurahan / Desa" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Alamat" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Action" }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($mTpss as $i => $mTps)
                    <tr class="<?= $i % 2 == 0 ? 'bg-gray-200' : '' ?>">
                        <td class="px-4 py-2">{{ $mTps->name }}</td>
                        <td class="px-4 py-2">{{ $mTps->subdistrict->name }}</td>
                        <td class="px-4 py-2">{{ $mTps->village->name }}</td>
                        <td class="px-4 py-2">{{ $mTps->address }}</td>
                        <td class="px-4 py-2 flex justify-around items-center">
                            <a href="{{ route('tps.edit', ['tps' => $mTps->id]) }}"
                               class="text-gray-100 bg-yellow-500 hover:bg-yellow-700 mx-2 px-3 py-2  rounded-lg focus:outline-none focus:shadow-outline">
                                <i class="fas fa-pencil-alt"></i></a>
                            <form
                                action="{{ route('tps.destroy', ['tps' => $mTps->id]) }}"
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
