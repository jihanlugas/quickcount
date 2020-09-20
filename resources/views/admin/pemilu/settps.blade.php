@extends('layouts.app')

@section('header', 'TPS')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('pemilu.storetps', ['pemilu' => $mElection->id]) }}">
            @csrf
            <div class="flex flex-wrap mb-4 -mx-2">
                <div class="flex flex-wrap mb-6 px-2 Container_province w-1/3">
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
                <div class="flex flex-wrap mb-6 px-2 Container_district w-1/3">
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
                <div class="flex flex-wrap mb-6 px-2 Container_subdistrict w-1/3">
                    <label for="subdistrict_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Kecamatan
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 Field_subdistrict_id @error('subdistrict_id') border-red-500 @enderror"
                            id="grid-state" name="subdistrict_id" autofocus>

                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    @error('subdistrict_id')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap mb-4 -mx-2 Container_villages">

            </div>
            <div class="flex flex-wrap items-center justify-end Container_submit">
            </div>
        </form>
    </div>
@endsection



@push('script')
    <script>
        var jPosition = $('.Field_position_id');
        var jProvince = $('.Field_province_id');
        var jDistrict = $('.Field_district_id');
        var jSubdistrict = $('.Field_subdistrict_id');

        var cVIllages = $('.Container_villages');
        var cSubmit = $('.Container_submit');
        var tVillageField = $(`<div>
                                <div class="flex flex-wrap mb-6 px-2 w-1/2">
                                    <label class="block text-gray-700 text-sm font-bold mb-2 Label_Village">Nama Kelurahan</label>
                                    <input type="text" class="form-input w-full Field_village_id" placeholder="Jumlah TPS " required autofocus>
                                </div>
                                </div>`);

        var tSubmit = `<button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan
                        </button>`;

        var mPosition = '{{ $mElection->position_id }}';
        var mProvince = '{{ $mElection->province_id }}';
        var mDistrict = '{{ $mElection->district_id }}';

        {{--var oldProvince = '{{ $mElection->province_id }}';--}}
        {{--var oldDistrict = '{{ $mElection->district_id }}';--}}



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            getprovinces()
            jProvince.change(function () {
                getdistricts()
            });

            jDistrict.change(function () {
                getsubdistricts()
            });

            jSubdistrict.change(function () {
                generatevillages()
            });
        })

        function onload() {
            switch (mPosition) {
                case positionGubernur:

                    break;
                case positionBupati:

                    break;
                default:
            }

        }

        function getprovinces(value = '') {
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
                if (mProvince) {
                    jProvince.attr('disabled', 'disabled');
                    jProvince.find(`[value="${mProvince}"]`).attr('selected', 'selected');
                }
                getdistricts()
            });
        }

        function getdistricts(value = '') {
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
                    if (mDistrict) {
                        jDistrict.attr('disabled', 'disabled');
                        jDistrict.find(`[value="${mDistrict}"]`).attr('selected', 'selected');
                    }
                    getsubdistricts()
                });
            } else {
                jDistrict.html(tDistrictOption);
                getsubdistricts()
            }
        }

        function getsubdistricts(value = '') {
            var tSubdistrictOption = `<option value="">Pilih Kecamatan</option>`;
            let district_id = jDistrict.val();
            if (district_id) {
                var data = {
                    district_id: district_id
                }
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '{{ route('ajax.getsubdistricts') }}',
                    data: data,
                    success: function (res) {
                        res.forEach(function (subdistrict) {
                            tSubdistrictOption += `<option value="${subdistrict.id}">${subdistrict.name}</option>`;
                        });
                    }
                }).done(function () {
                    jSubdistrict.html(tSubdistrictOption);
                    generatevillages()
                });
            } else {
                jSubdistrict.html(tSubdistrictOption);
                generatevillages()
            }
        }

        function generatevillages() {
            let pushVilageFields = '';
            let subdistrict_id = jSubdistrict.val();
            if (subdistrict_id) {
                var data = {
                    subdistrict_id: subdistrict_id
                }
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '{{ route('ajax.getvillagetpss') }}',
                    data: data,
                    success: function (res) {
                        res.forEach(function (village) {
                            let pushVillageField = tVillageField;
                            pushVillageField.find('.Label_Village').text(village.name)
                            pushVillageField.find('.Field_village_id').attr('name', `villages[${village.id}]`).attr('value', village.tpss.length)
                            pushVilageFields += pushVillageField.html();
                        });
                    }
                }).done(function () {
                    cVIllages.html(pushVilageFields);
                    cSubmit.html(tSubmit);
                });
            } else {
                cVIllages.html(pushVilageFields);
                cSubmit.html('');
            }
        }

    </script>
@endpush
