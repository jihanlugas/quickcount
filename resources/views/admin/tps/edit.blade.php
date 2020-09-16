@extends('layouts.app')

@section('header', 'Tambah TPS')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('tps.store') }}">
            @csrf
            <div class="mb-4 -mx-2">
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                        Nama TPS
                    </label>
                    <input id="name" type="text"
                           class="form-input w-full @error('name') border-red-500 @enderror"
                           name="name" value="{{ old('name') }}" placeholder="Nama TPS ... " required autofocus>
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="subdistrict_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Kecamatan
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 Tps_subdistrict_id @error('subdistrict_id') border-red-500 @enderror"
                            id="grid-state" name="subdistrict_id" autofocus>
                            <option value="">Pilih Kecamatan</option>
                            @foreach($mSubdistricts as $mSubdistrict)
                                <option value="{{ $mSubdistrict->id }}" {{ old('subdistrict_id') == $mSubdistrict->id ? "selected" : ""}}>{{ $mSubdistrict->name }}</option>
                            @endforeach
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
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="village_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Kelurahan / Desa
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 Tps_village_id @error('village_id') border-red-500 @enderror"
                            id="grid-state" name="village_id" autofocus>
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
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">
                        Alamat
                    </label>
                    <textarea id="address" type="text"
                           class="form-input w-full @error('address') border-red-500 @enderror"
                           name="address" placeholder="Alamat ... " autofocus>{{ old('address') }}</textarea>
                    @error('address')
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        var jSubdistrict = $('.Tps_subdistrict_id');
        var jVillage = $('.Tps_village_id');
        var oldVillage = '{{ old('subdistrict_id') }}';


        $(document).ready(function (){
            getVillages(oldVillage)
            $('.Tps_subdistrict_id').change(function (){
                getVillages()
            })
        })

        function getVillages(oldVillage = ""){
            var tVillageOption = `<option value="">Pilih Desa / Kelurahan</option>`;
            let subdistrict_id = jSubdistrict.val();
            if (subdistrict_id){
                var data = {
                    subdistrict_id: subdistrict_id
                }
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url: '{{ route('ajax.getvillages') }}',
                    data: data,
                    success:function(res) {
                        res.forEach(function (village){
                            tVillageOption += `<option value="${village.id}">${village.name}</option>`;
                        });
                    }
                }).done(function (){
                    jVillage.html(tVillageOption);
                    if (oldVillage){
                        jVillage.find(`[value="${oldVillage}"]`).attr('selected', 'selected');
                    }
                });
            }else{
                jVillage.html(tVillageOption);
            }
        }
    </script>
@endpush
