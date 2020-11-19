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
        <div class="flex flex-wrap -mx-3">
            @forelse($mCandidates as $i => $mCandidate)
                <div class="flex flex-wrap mb-4 w-full sm:w-1/2 md:w-1/3 Photo_container px-3">
                    <div class="w-full bg-white shadow-xl rounded-lg overflow-hidden">
                        <img class="w-full btnInputimage" data-candidateid="{{ $mCandidate->id }}"
                             src="{{ $mCandidate->photo_id ? \App\Photoupload::getFilepathOrigin($mCandidate->photo_id) : asset('img/default-user.png') }}"
                             alt="">
                        <input type="file" name="photo_id" class="hidden inputImage" data-candidateid="{{ $mCandidate->id }}">
                        <div class="w-full p-3">
                            <div class="flex justify-between">
                                <div class="">No Urut</div>
                                <div class="">{{ $mCandidate->nourut }}</div>
                            </div>
                            <div class="flex justify-between">
                                <div class="">Ketua</div>
                                <div class="">{{ $mCandidate->ketua }}</div>
                            </div>
                            <div class="flex justify-between">
                                <div class="">Wakil</div>
                                <div class="">{{ $mCandidate->wakil }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    @include('layouts.modal.uploadphoto')
@endsection

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        var inputImage = $('.inputImage');
        var btnInputimage = $('.btnInputimage');

        $(document).ready(function () {
            btnInputimage.click(function () {
                $(this).closest('.Photo_container').find('.inputImage').click();
            });

            $('.inputImage').change(function () {
                let candidateId = $(this).data('candidateid');
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        resize.croppie('bind', {
                            url: e.target.result
                        })
                        uploadPhoto.data('candidateid', candidateId)
                        uploadPhoto.modal('show');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            })

            uploadPhoto.data("onsave", function (img) {
                var formData = new FormData();
                let candidateId = uploadPhoto.data('candidateid')
                formData.append('photo_id', img, "tmpcropp.png");
                formData.append('candidate_id', candidateId);

                $.ajax({
                    url: "{{ route('ajax.uploadphotocandidate') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (res) {
                        if (res.status){
                            btnInputimage.each(function (index, image){
                                if ($(image).data('candidateid') == res.candidate_id){
                                    $(image).attr('src', res.photo);
                                }
                            });
                        }
                    }
                }).done(function (){
                    uploadPhoto.modal('hide');
                });

            })
        });
    </script>
@endpush
