@extends('layouts.app')

@section('header', 'Input Suara')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('vote.store') }}">
            @csrf
            <div class="flex flex-wrap mb-4 -mx-2">
                <div class="flex flex-wrap mb-6 px-2 Container_election w-1/3">
                    <label for="election_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Pemilu
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 Field_election_id @error('election_id') border-red-500 @enderror" name="election_id" autofocus>

                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    @error('election_id')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2 Container_province w-1/3">
                    <label for="province_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Provinsi
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 Field_province_id @error('province_id') border-red-500 @enderror" name="province_id" autofocus>

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
                            class="block form-input appearance-none w-full pr-8 Field_district_id @error('district_id') border-red-500 @enderror" name="district_id" autofocus>

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
                            class="block form-input appearance-none w-full pr-8 Field_subdistrict_id @error('subdistrict_id') border-red-500 @enderror" name="subdistrict_id" autofocus>

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
                <div class="flex flex-wrap mb-6 px-2 Container_village w-1/3">
                    <label for="village_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Desa / Kelurahan
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 Field_village_id @error('village_id') border-red-500 @enderror" name="village_id" autofocus>

                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    @error('village_id')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2 Container_tps w-1/3">
                    <label for="tps_id" class="block text-gray-700 text-sm font-bold mb-2">
                        TPS
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 Field_tps_id @error('tps_id') border-red-500 @enderror" name="tps_id" autofocus>

                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    @error('tps_id')
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
        var jElection = $('.Field_election_id');
        var jProvince = $('.Field_province_id');
        var jDistrict = $('.Field_district_id');
        var jSubdistrict = $('.Field_subdistrict_id');
        var jVillage = $('.Field_village_id');
        var jTps = $('.Field_tps_id');

        var old = '';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            getelection()
            jElection.change(function () {
                getprovince()
            });

            jProvince.change(function () {
                getdistricts()
            });

            jDistrict.change(function () {
                getsubdistricts()
            });

            jSubdistrict.change(function () {
                getvillages()
            });

            jVillage.change(function () {
                gettpss()
            });
        })

        function getelection(){
            var tElectionOption = `<option value="">Pilih Pemilu</option>`;
            var data = {}
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{ route('ajax.getelections') }}',
                data: data,
                success: function (res) {
                    res.forEach(function (election) {
                        tElectionOption += `<option value="${election.id}">${election.name}</option>`;
                    });
                }
            }).done(function () {
                jElection.html(tElectionOption);
                if (old){
                    jElection.find(`[value="${oldElection}"]`).attr('selected', 'selected');
                }
                getprovince()
            });
        }

        function getprovince(){
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
                getdistricts()
            });
        }

        function getdistricts(){
            var tDistrictOption = `<option value="">Pilih Kabupaten</option>`;
            let province_id = jProvince.val()
            if (province_id){
                var data = {
                    province_id: province_id,
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
                    getsubdistricts()
                });
            }else{
                jDistrict.html(tDistrictOption);
                getsubdistricts()
            }

        }

        function getsubdistricts(){
            var tSubdistrictOption = `<option value="">Pilih Kecamatan</option>`;
            let district_id = jDistrict.val()
            if (district_id){
                var data = {
                    district_id: district_id,
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
                    if (old){
                        jSubdistrict.find(`[value="${oldSubdistrict}"]`).attr('selected', 'selected');
                    }
                    getvillages()
                });
            }else{
                jSubdistrict.html(tSubdistrictOption);
                getvillages()
            }
        }

        function getvillages(){
            var tVillageOption = `<option value="">Pilih Kecamatan</option>`;
            let subdistrict_id = jSubdistrict.val()
            if (subdistrict_id){
                var data = {
                    subdistrict_id: subdistrict_id,
                }
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '{{ route('ajax.getvillages') }}',
                    data: data,
                    success: function (res) {
                        res.forEach(function (village) {
                            tVillageOption += `<option value="${village.id}">${village.name}</option>`;
                        });
                    }
                }).done(function () {
                    jVillage.html(tVillageOption);
                    if (old){
                        jVillage.find(`[value="${oldVillage}"]`).attr('selected', 'selected');
                    }
                    gettpss()
                });
            }else{
                jVillage.html(tVillageOption);
                gettpss()
            }
        }

        function gettpss(){
            var tTpsOption = `<option value="">Pilih Kecamatan</option>`;
            let village_id = jVillage.val()
            let election_id = jElection.val()
            if (village_id){
                var data = {
                    village_id: village_id,
                    election_id: election_id,
                }
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '{{ route('ajax.getavailabletpss') }}',
                    data: data,
                    success: function (res) {
                        console.log(res)
                        res.forEach(function (tps) {
                            tTpsOption += `<option value="${tps.id}">${tps.name}</option>`;
                        });
                    }
                }).done(function () {
                    jTps.html(tTpsOption);
                    if (old){
                        jTps.find(`[value="${oldTps}"]`).attr('selected', 'selected');
                    }
                });
            }else{
                jTps.html(tTpsOption);
            }
        }


    </script>
@endpush
