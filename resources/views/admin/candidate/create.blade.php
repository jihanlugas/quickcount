@extends('layouts.app')

@section('header', 'Tambah Kandidat')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('candidate.store', ['pemilu' => $mElection->id]) }}"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="election_id" value="{{ $mElection->id }}">
            <div class="mb-4 -mx-2">
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="nourut" class="block text-gray-700 text-sm font-bold mb-2">
                        No Urut
                    </label>
                    <div class="relative w-full">
                        <select
                            class="block form-input appearance-none w-full pr-8 @error('nourut') border-red-500 @enderror"
                            id="grid-state" name="nourut" autofocus>
                            <option value="">Pilih No Urut</option>
                            @foreach(['1', '2', '3', '4', '5'] as $noUrut)
                                <option
                                    value="{{ $noUrut }}" {{ old('nourut') == $noUrut ? "selected" : ""}}>{{ $noUrut }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    @error('nourut')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2">
                    <label for="ketua" class="block text-gray-700 text-sm font-bold mb-2">
                        Nama Kandidat
                    </label>

                    <input id="ketua" type="text"
                           class="form-input w-full @error('ketua') border-red-500 @enderror"
                           name="ketua" value="{{ old('ketua') }}" placeholder="Nama Kandidat ... " required autofocus>
                    @error('ketua')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>


                <div class="flex flex-wrap mb-6 px-2">
                    <label for="wakil" class="block text-gray-700 text-sm font-bold mb-2">
                        Nama Wakil Kandidat
                    </label>

                    <input id="wakil" type="text"
                           class="form-input w-full @error('wakil') border-red-500 @enderror"
                           name="wakil" value="{{ old('wakil') }}" placeholder="Nama Wakil Kandidat ... " required
                           autofocus>
                    @error('wakil')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
{{--                <div class="flex flex-wrap mb-6 px-2 ">--}}
{{--                    <label for="ketua" class="block text-gray-700 text-sm font-bold mb-2 ">--}}
{{--                        Foto Kandidat--}}
{{--                    </label>--}}
{{--                    <div class="w-full Photo_container">--}}
{{--                        <img class="w-full max-w-xs shadow-lg btnInputimage"--}}
{{--                             src="{{ asset('img/default-user.png') }}"--}}
{{--                             alt="">--}}
{{--                        <input type="file" name="photo_id" class="inputImage">--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col mt-4">--}}
{{--                        @error('photo_id')--}}
{{--                        <p class="text-red-500 text-xs italic w-full">--}}
{{--                            {{ $message }}--}}
{{--                        </p>--}}
{{--                        @enderror--}}
{{--                        <p class="text-red-500 text-xs italic w-full">--}}
{{--                            * Ukuran Maksimal {{ \App\Photoupload::FILE_SIZE_MAX / 1024 }} MB--}}
{{--                        </p>--}}

{{--                        <p class="text-red-500 text-xs italic w-full">--}}
{{--                            ** Tipe File jpeg,png,jpg--}}
{{--                        </p>--}}

{{--                    </div>--}}
{{--                </div>--}}
                <div class="flex flex-wrap items-center justify-end">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Simpan') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    @include('layouts.modal.uploadphoto')
@endsection


@push('script')
    <script>
        // var uploadPhotoModal = new Modal('#uploadPhoto');
        // var uploadPhoto = $('#uploadPhoto');
        // var inputImage = $('.inputImage');
        // var btnInputimage = $('.btnInputimage');
        // $(document).ready(function () {
        //     btnInputimage.click(function () {
        //         $(this).closest('.Photo_container').find('input').click();
        //     });
        //
        //     $('.inputImage').change(function () {
        //         if (this.files && this.files[0]) {
        //             var reader = new FileReader();
        //             reader.onload = function (e) {
        //                 resize.croppie('bind', {
        //                     url: e.target.result
        //                 })
        //                 uploadPhotoModal.show()
        //             }
        //             reader.readAsDataURL(this.files[0]);
        //         }
        //     })
        //
        //     var resize = $('#upload-photo').croppie({
        //         enableExif: true,
        //         enableOrientation: true,
        //         viewport: { // Default { width: 100, height: 100, type: 'square' }
        //             width: 250,
        //             height: 250,
        //             type: 'square' //circle
        //         },
        //         boundary: {
        //             width: 300,
        //             height: 300
        //         }
        //     });
        //
        //     uploadPhoto.find('.save').on('click', function (ev) {
        //         resize.croppie('result', {
        //             type: 'base64',
        //             size: 'viewport'
        //         }).then(function (img) {
        //             img.filename
        //             urltoFile(img, 'tmp.png', 'image/png')
        //                 .then(function (img) {
        //                     console.log(img);
        //                     inputImage.files(img)
        //                     uploadPhotoModal.hide();
        //                 });
        //
        //             // btnInputimage.attr('src', img)
        //
        //             // var uploadImage = b64toBlob(realData, contentType);
        //             // console.log(uploadImage)
        //
        //         });
        //     });
        //
        //     function urltoFile(url, filename, mimeType) {
        //         return (fetch(url)
        //             .then(function (res) {
        //                 return res.arrayBuffer();
        //             })
        //             .then(function (buf) {
        //                 return new File([buf], filename, {type: mimeType});
        //             })
        //         );
        //     }
        // })

        //Usage example:


    </script>
@endpush
