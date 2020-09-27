@extends('layouts.app')

@section('header', 'TPS')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        {{--        <form action="" method="">--}}
        {{--            @include('layouts.flash')--}}
        {{--            @csrf--}}
        {{--            <div class="flex flex-wrap mb-4 -mx-2">--}}
        {{--                <div class="flex flex-wrap mb-6 px-2 Container_election w-full sm:w-1/3">--}}
        {{--                    <label for="election_id" class="block text-gray-700 text-sm font-bold mb-2">--}}
        {{--                        Pemilu--}}
        {{--                    </label>--}}
        {{--                    <div class="relative w-full">--}}
        {{--                        <select--}}
        {{--                            class="block form-input appearance-none w-full pr-8 Field_election_id @error('election_id') border-red-500 @enderror"--}}
        {{--                            name="election_id" autofocus>--}}

        {{--                        </select>--}}
        {{--                        <div--}}
        {{--                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
        {{--                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
        {{--                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>--}}
        {{--                            </svg>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    @error('election_id')--}}
        {{--                    <p class="text-red-500 text-xs italic mt-4">--}}
        {{--                        {{ $message }}--}}
        {{--                    </p>--}}
        {{--                    @enderror--}}
        {{--                </div>--}}
        {{--                <div class="flex flex-wrap mb-6 px-2 Container_province w-full sm:w-1/3">--}}
        {{--                    <label for="province_id" class="block text-gray-700 text-sm font-bold mb-2">--}}
        {{--                        Provinsi--}}
        {{--                    </label>--}}
        {{--                    <div class="relative w-full">--}}
        {{--                        <select--}}
        {{--                            class="block form-input appearance-none w-full pr-8 Field_province_id @error('province_id') border-red-500 @enderror"--}}
        {{--                            name="province_id" autofocus>--}}

        {{--                        </select>--}}
        {{--                        <div--}}
        {{--                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
        {{--                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
        {{--                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>--}}
        {{--                            </svg>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    @error('province_id')--}}
        {{--                    <p class="text-red-500 text-xs italic mt-4">--}}
        {{--                        {{ $message }}--}}
        {{--                    </p>--}}
        {{--                    @enderror--}}
        {{--                </div>--}}
        {{--                <div class="flex flex-wrap mb-6 px-2 Container_district w-full sm:w-1/3">--}}
        {{--                    <label for="district_id" class="block text-gray-700 text-sm font-bold mb-2">--}}
        {{--                        Kabupaten--}}
        {{--                    </label>--}}
        {{--                    <div class="relative w-full">--}}
        {{--                        <select--}}
        {{--                            class="block form-input appearance-none w-full pr-8 Field_district_id @error('district_id') border-red-500 @enderror"--}}
        {{--                            name="district_id" autofocus>--}}

        {{--                        </select>--}}
        {{--                        <div--}}
        {{--                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
        {{--                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
        {{--                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>--}}
        {{--                            </svg>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    @error('district_id')--}}
        {{--                    <p class="text-red-500 text-xs italic mt-4">--}}
        {{--                        {{ $message }}--}}
        {{--                    </p>--}}
        {{--                    @enderror--}}
        {{--                </div>--}}
        {{--                <div class="flex flex-wrap mb-6 px-2 Container_subdistrict w-full sm:w-1/3">--}}
        {{--                    <label for="subdistrict_id" class="block text-gray-700 text-sm font-bold mb-2">--}}
        {{--                        Kecamatan--}}
        {{--                    </label>--}}
        {{--                    <div class="relative w-full">--}}
        {{--                        <select--}}
        {{--                            class="block form-input appearance-none w-full pr-8 Field_subdistrict_id @error('subdistrict_id') border-red-500 @enderror"--}}
        {{--                            name="subdistrict_id" autofocus>--}}

        {{--                        </select>--}}
        {{--                        <div--}}
        {{--                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
        {{--                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
        {{--                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>--}}
        {{--                            </svg>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    @error('subdistrict_id')--}}
        {{--                    <p class="text-red-500 text-xs italic mt-4">--}}
        {{--                        {{ $message }}--}}
        {{--                    </p>--}}
        {{--                    @enderror--}}
        {{--                </div>--}}
        {{--                <div class="flex flex-wrap mb-6 px-2 Container_village w-full sm:w-1/3">--}}
        {{--                    <label for="village_id" class="block text-gray-700 text-sm font-bold mb-2">--}}
        {{--                        Desa / Kelurahan--}}
        {{--                    </label>--}}
        {{--                    <div class="relative w-full">--}}
        {{--                        <select--}}
        {{--                            class="block form-input appearance-none w-full pr-8 Field_village_id @error('village_id') border-red-500 @enderror"--}}
        {{--                            name="village_id" autofocus>--}}

        {{--                        </select>--}}
        {{--                        <div--}}
        {{--                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
        {{--                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
        {{--                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>--}}
        {{--                            </svg>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    @error('village_id')--}}
        {{--                    <p class="text-red-500 text-xs italic mt-4">--}}
        {{--                        {{ $message }}--}}
        {{--                    </p>--}}
        {{--                    @enderror--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </form>--}}
        <div class="w-full overflow-auto">
            <table class="table-auto text-left w-full">
                <thead>
                <tr class="whitespace-no-wrap">
                    <th class="truncate border-b border-t p-4">{{ "Nama" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Pemilu" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Periode" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Provinsi" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Kabupaten" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Kecamatan" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Desa / Kelurahan" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Alamat" }}</th>
                    <th class="truncate border-b border-t p-4">{{ "Action" }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($mTpss as $i => $mTps)
                    <tr class="whitespace-no-wrap <?= $i % 2 == 0 ? 'bg-gray-200' : '' ?>">
                        <td class="px-4 py-2">{{ $mTps->name }}</td>
                        <td class="px-4 py-2">{{ $mTps->election->name }}</td>
                        <td class="px-4 py-2">{{ $mTps->election->peroidstart->name . '-' . $mTps->election->peroidend->name}}</td>
                        <td class="px-4 py-2">{{ $mTps->province->name }}</td>
                        <td class="px-4 py-2">{{ $mTps->district->name }}</td>
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
                        <td class="border-b px-4 py-2" colspan="9">Tidak Ada TPS</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
{{--        <div class="flex bg-gray-200 border-b">--}}
{{--            <div class="px-2">--}}
{{--                Page 2 of 6--}}
{{--            </div>--}}
{{--            <div class="-mx-2">--}}
{{--                @if($mTpss->currentPage != 1)--}}
{{--                    <a href="{{ url('asd') }}"><span class="px-2"><i class="fas fa-chevron-left"></i></span></a>--}}
{{--                @endif--}}
{{--                @if($mTpss->currentPage != $mTpss->lastPage)--}}
{{--                    <a href="{{ url('sd') }}"><span class="px-2"><i class="fas fa-chevron-right"></i></span></a>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            {{ $mTpss->links('layouts.partial.pagination') }}--}}
{{--        </div>--}}
        {{ $mTpss->links('vendor.pagination.tailwind') }}
    </div>
@endsection

{{--@push('script')--}}
{{--    <script>--}}
{{--        var jElection = $('.Field_election_id');--}}
{{--        var jProvince = $('.Field_province_id');--}}
{{--        var jDistrict = $('.Field_district_id');--}}
{{--        var jSubdistrict = $('.Field_subdistrict_id');--}}
{{--        var jVillage = $('.Field_village_id');--}}
{{--        var jTps = $('.Tps_container');--}}

{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}

{{--        $(document).ready(function () {--}}
{{--            getelection()--}}
{{--            jElection.change(function () {--}}
{{--                getprovince()--}}
{{--            });--}}

{{--            jProvince.change(function () {--}}
{{--                getdistricts()--}}
{{--            });--}}

{{--            jDistrict.change(function () {--}}
{{--                getsubdistricts()--}}
{{--            });--}}

{{--            jSubdistrict.change(function () {--}}
{{--                getvillages()--}}
{{--            });--}}

{{--            jVillage.change(function () {--}}
{{--                gettpss()--}}
{{--            });--}}
{{--        })--}}

{{--        function getelection() {--}}
{{--            var tElectionOption = `<option value="">Pilih Pemilu</option>`;--}}
{{--            var data = {}--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                dataType: 'json',--}}
{{--                url: '{{ route('ajax.getelections') }}',--}}
{{--                data: data,--}}
{{--                success: function (res) {--}}
{{--                    res.forEach(function (election) {--}}
{{--                        tElectionOption += `<option value="${election.id}">${election.name}</option>`;--}}
{{--                    });--}}
{{--                }--}}
{{--            }).done(function () {--}}
{{--                jElection.html(tElectionOption);--}}
{{--                getprovince()--}}
{{--            });--}}
{{--        }--}}

{{--        function getprovince() {--}}
{{--            var tProvinceOption = `<option value="">Pilih Provinsi</option>`;--}}
{{--            var data = {}--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                dataType: 'json',--}}
{{--                url: '{{ route('ajax.getprovinces') }}',--}}
{{--                data: data,--}}
{{--                success: function (res) {--}}
{{--                    res.forEach(function (province) {--}}
{{--                        tProvinceOption += `<option value="${province.id}">${province.name}</option>`;--}}
{{--                    });--}}
{{--                }--}}
{{--            }).done(function () {--}}
{{--                jProvince.html(tProvinceOption);--}}
{{--                getdistricts()--}}
{{--            });--}}
{{--        }--}}

{{--        function getdistricts() {--}}
{{--            var tDistrictOption = `<option value="">Pilih Kabupaten</option>`;--}}
{{--            let province_id = jProvince.val()--}}
{{--            if (province_id) {--}}
{{--                var data = {--}}
{{--                    province_id: province_id,--}}
{{--                }--}}
{{--                $.ajax({--}}
{{--                    type: 'POST',--}}
{{--                    dataType: 'json',--}}
{{--                    url: '{{ route('ajax.getdistricts') }}',--}}
{{--                    data: data,--}}
{{--                    success: function (res) {--}}
{{--                        res.forEach(function (district) {--}}
{{--                            tDistrictOption += `<option value="${district.id}">${district.name}</option>`;--}}
{{--                        });--}}
{{--                    }--}}
{{--                }).done(function () {--}}
{{--                    jDistrict.html(tDistrictOption);--}}
{{--                    getsubdistricts()--}}
{{--                });--}}
{{--            } else {--}}
{{--                jDistrict.html(tDistrictOption);--}}
{{--                getsubdistricts()--}}
{{--            }--}}

{{--        }--}}

{{--        function getsubdistricts() {--}}
{{--            var tSubdistrictOption = `<option value="">Pilih Kecamatan</option>`;--}}
{{--            let district_id = jDistrict.val()--}}
{{--            if (district_id) {--}}
{{--                var data = {--}}
{{--                    district_id: district_id,--}}
{{--                }--}}
{{--                $.ajax({--}}
{{--                    type: 'POST',--}}
{{--                    dataType: 'json',--}}
{{--                    url: '{{ route('ajax.getsubdistricts') }}',--}}
{{--                    data: data,--}}
{{--                    success: function (res) {--}}
{{--                        res.forEach(function (subdistrict) {--}}
{{--                            tSubdistrictOption += `<option value="${subdistrict.id}">${subdistrict.name}</option>`;--}}
{{--                        });--}}
{{--                    }--}}
{{--                }).done(function () {--}}
{{--                    jSubdistrict.html(tSubdistrictOption);--}}
{{--                    getvillages()--}}
{{--                });--}}
{{--            } else {--}}
{{--                jSubdistrict.html(tSubdistrictOption);--}}
{{--                getvillages()--}}
{{--            }--}}
{{--        }--}}

{{--        function getvillages() {--}}
{{--            var tVillageOption = `<option value="">Pilih Kecamatan</option>`;--}}
{{--            let subdistrict_id = jSubdistrict.val()--}}
{{--            if (subdistrict_id) {--}}
{{--                var data = {--}}
{{--                    subdistrict_id: subdistrict_id,--}}
{{--                }--}}
{{--                $.ajax({--}}
{{--                    type: 'POST',--}}
{{--                    dataType: 'json',--}}
{{--                    url: '{{ route('ajax.getvillages') }}',--}}
{{--                    data: data,--}}
{{--                    success: function (res) {--}}
{{--                        res.forEach(function (village) {--}}
{{--                            tVillageOption += `<option value="${village.id}">${village.name}</option>`;--}}
{{--                        });--}}
{{--                    }--}}
{{--                }).done(function () {--}}
{{--                    jVillage.html(tVillageOption);--}}
{{--                    gettpss()--}}
{{--                });--}}
{{--            } else {--}}
{{--                jVillage.html(tVillageOption);--}}
{{--                gettpss()--}}
{{--            }--}}
{{--        }--}}

{{--        --}}{{--function gettpss(){--}}
{{--        --}}{{--    var tTpsdata = `<tr class="bg-gray-200"><td colspan="4" class="text-center p-4">Tidak ada TPS terdaftar</td></tr>`;--}}
{{--        --}}{{--    let village_id = jVillage.val()--}}
{{--        --}}{{--    let election_id = jElection.val()--}}
{{--        --}}{{--    if (village_id){--}}
{{--        --}}{{--        var data = {--}}
{{--        --}}{{--            village_id: village_id,--}}
{{--        --}}{{--            election_id: election_id,--}}
{{--        --}}{{--        }--}}
{{--        --}}{{--        $.ajax({--}}
{{--        --}}{{--            type: 'POST',--}}
{{--        --}}{{--            dataType: 'json',--}}
{{--        --}}{{--            url: '{{ route('ajax.getusertps') }}',--}}
{{--        --}}{{--            data: data,--}}
{{--        --}}{{--            success: function (res) {--}}
{{--        --}}{{--                if (res.length > 0){--}}
{{--        --}}{{--                    tTpsdata = ``;--}}
{{--        --}}{{--                    res.forEach(function (tps, index) {--}}
{{--        --}}{{--                        tTpsdata += `<tr class="${index%2==0 ? 'bg-gray-200' : ''}">--}}
{{--        --}}{{--                                        <td></td>--}}
{{--        --}}{{--                                    </tr>`;--}}
{{--        --}}{{--                    });--}}
{{--        --}}{{--                }--}}
{{--        --}}{{--            }--}}
{{--        --}}{{--        }).done(function () {--}}
{{--        --}}{{--            jTps.html(tTpsdata);--}}
{{--        --}}{{--        });--}}
{{--        --}}{{--    }else{--}}
{{--        --}}{{--        jTps.html(tTpsdata);--}}
{{--        --}}{{--    }--}}
{{--        --}}{{--}--}}


{{--    </script>--}}
{{--@endpush--}}
