@extends('layouts.app')

@section('header', 'Tambah Pemilu')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('pemilu.store') }}">
            @csrf
            <div class="mb-4 -mx-2">
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                        Nama Pemilu
                    </label>

                    <input id="name" type="text"
                           class="form-input w-full @error('name') border-red-500 @enderror"
                           name="name" value="{{ old('name') }}" placeholder="Pemilihan ... " required autofocus>
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full sm:w-1/2 px-2 mb-6">
                        <label for="start" class="block text-gray-700 text-sm font-bold mb-2">
                            Awal Periode
                        </label>
                        <div class="relative w-full">
                            <select
                                class="block form-input appearance-none w-full pr-8 @error('start') border-red-500 @enderror"
                                id="grid-state" name="start" autofocus>
                                <option value="">Pilih Periode</option>
                                @foreach($mPeroids as $mPeroid)
                                    <option
                                        value="{{ $mPeroid->id }}" {{ old('start') == $mPeroid->id ? "selected" : ""}}>{{ $mPeroid->name }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                        @error('start')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 px-2 mb-6">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                            Akhir Periode
                        </label>
                        <div class="relative w-full">
                            <select
                                class="block form-input appearance-none w-full pr-8 @error('end') border-red-500 @enderror"
                                id="grid-state" name="end" autofocus>
                                <option value="">Pilih Periode</option>
                                @foreach($mPeroids as $mPeroid)
                                    <option
                                        value="{{ $mPeroid->id }}" {{ old('end') == $mPeroid->id ? "selected" : ""}}>{{ $mPeroid->name }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                        @error('end')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap mb-6 px-2 Container_position">
                    <label for="position_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Jabatan
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 Field_position_id @error('position_id') border-red-500 @enderror"
                            id="grid-state" name="position_id" autofocus>
                            <option value="">Pilih Jabatan</option>
                            @foreach($mPositions as $mPosition)
                                <option
                                    value="{{ $mPosition->id }}" {{ old('position_id') == $mPosition->id ? "selected" : ""}}>{{ $mPosition->name }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    @error('position_id')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2 Container_province hidden">
                    <label for="province_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Provinsi
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 Field_province_id @error('province_id') border-red-500 @enderror"
                            id="grid-state" name="province_id" autofocus>

                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    @error('province_id')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2 Container_district hidden">
                    <label for="district_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Kabupaten
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 Field_district_id @error('district_id') border-red-500 @enderror"
                            id="grid-state" name="district_id" autofocus>

                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    @error('district_id')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-end">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Simpan') }}
                </button>
            </div>
        </form>
    </div>
@endsection


@push('script')
    <script>
        const positionPresident = '{{ \App\Position::POSSITION_PRESIDENT_ID }}';
        const positionGubernur = '{{ \App\Position::POSSITION_GUBERNUR_ID }}';
        const positionBupati = '{{ \App\Position::POSSITION_BUPATI_ID }}';
        const positionWalikota = '{{ \App\Position::POSSITION_WALIKOTA_ID }}';

        var cPosition = $('.Container_position');
        var cProvince = $('.Container_province');
        var cDistrict = $('.Container_district');

        var jPosition = $('.Field_position_id');
        var jProvince = $('.Field_province_id');
        var jDistrict = $('.Field_district_id');

        var oldProvince = '{{ old('province_id') }}';
        var oldDistrict = '{{ old('district_id') }}';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            changepostition(true)
            jPosition.change(function () {
                changepostition()
            });

            jProvince.change(function () {
                chengeprovince()
            });
        })

        function changepostition(old = false) {
            if (old){
                getprovinces(true, getdistricts)
            }else{
                getprovinces()
                getdistricts()
            }
            switch (jPosition.val()) {
                case positionPresident:
                    cProvince.addClass('hidden');
                    cDistrict.addClass('hidden');
                    break;
                case positionGubernur:
                    cProvince.removeClass('hidden');
                    cDistrict.addClass('hidden');
                    break;
                case positionBupati:
                    cProvince.removeClass('hidden');
                    cDistrict.removeClass('hidden');
                    break;
                case positionWalikota:
                    cProvince.removeClass('hidden');
                    cDistrict.removeClass('hidden');
                    break;
                default:
                    cProvince.addClass('hidden');
                    cDistrict.addClass('hidden');
            }
        }

        function chengeprovince(){
            getdistricts()
        }

        function getprovinces(old = false, callback) {
            var tProvinceOption = `<option value="">Pilih Provinsi</option>`;
            var data = {}
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{ route('ajax.getprovinces') }}',
                data: data,
                success: function (res) {
                    res.forEach(function (province) {
                        tProvinceOption += `<option value="${province.id}">${province.name}</option>`;
                    });
                }
            }).done(function () {
                jProvince.html(tProvinceOption);
                if (old){
                    jProvince.find(`[value="${oldProvince}"]`).attr('selected', 'selected');
                }
                if (callback){
                    callback(true);
                }
            });
        }

        function getdistricts(old = false, callback) {
            var tDistrictOption = `<option value="">Pilih Kabupaten</option>`;
            let province_id = jProvince.val()
            if (province_id) {
                var data = {
                    province_id: province_id
                }
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '{{ route('ajax.getdistricts') }}',
                    data: data,
                    success: function (res) {
                        res.forEach(function (district) {
                            tDistrictOption += `<option value="${district.id}">${district.name}</option>`;
                        });
                    }
                }).done(function () {
                    jDistrict.html(tDistrictOption);
                    if (old){
                        jDistrict.find(`[value="${oldDistrict}"]`).attr('selected', 'selected');
                    }
                });
            } else {
                jDistrict.html(tDistrictOption);

            }
        }

    </script>
@endpush
