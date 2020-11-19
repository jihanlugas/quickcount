@extends('layouts.app')

@section('header', 'Input Suara')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <form method="POST" action="{{ route('vote.votingstore', ['vote' => $mVote->id]) }}">
            @csrf
            <div class="flex flex-wrap mb-4 -mx-2">
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Pemilu</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mElection->name }}</div>
                </div>
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Jabatan</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mElection->position->name }}</div>
                </div>
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Provinsi</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mVote->province->name }}</div>
                </div>
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Kabupaten</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mVote->district->name }}</div>
                </div>
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Kecamatan</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mVote->subdistrict->name }}</div>
                </div>
                <div class="flex flex-wrap mb-4 w-full">
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3 font-bold">Desa / Kabupaten</div>
                    <div class="flex flex-wrap px-2 w-full sm:w-1/3">{{ $mVote->village->name }}</div>
                </div>

                <div class="flex flex-col flex-wrap mb-6 px-2 w-full">
                    <label for="suara_sah" class="block text-gray-700 text-sm font-bold mb-2">
                        Form C1
                    </label>
                    <div class="flex flex-wrap mb-6 w-full sm:w-1/2 Photo_container">
                        <img class="w-full btnInputimage" data-voteid="{{ $mVote->id }}"
                             src="{{ $mVote->photo_id ? \App\Photoupload::getFilepathOrigin($mVote->photo_id) : asset('img/default-photo.jpg') }}"
                             alt="">
                        <input type="file" name="photo_id" class="hidden inputImage"
                               data-voteid="{{ $mVote->id }}">
                    </div>
                </div>

                <div class="flex flex-wrap mb-6 px-2 w-full sm:w-1/2">
                    <label for="suara_sah" class="block text-gray-700 text-sm font-bold mb-2">
                        Jumlah Suara Sah
                    </label>

                    <input id="suara_sah" type="text"
                           class="form-input w-full @error('suara_sah') border-red-500 @enderror"
                           name="suara_sah"
                           value="{{ $mVote->suara_sah }}"
                           placeholder="Jumlah Suara Sah ... "
                           required autofocus>
                    @error('suara_sah')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6 px-2 w-full sm:w-1/2">
                    <label for="suara_tidak_sah" class="block text-gray-700 text-sm font-bold mb-2">
                        Jumlah Tidak Suara Sah
                    </label>

                    <input id="suara_tidak_sah" type="text"
                           class="form-input w-full @error('suara_tidak_sah') border-red-500 @enderror"
                           name="suara_tidak_sah"
                           placeholder="Jumlah Tidak Suara Sah ... "
                           value="{{ $mVote->suara_tidak_sah }}"
                           required autofocus>
                    @error('suara_tidak_sah')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                @forelse($mElectionvotes as $i => $mElectionvote)
                    <div class="flex flex-wrap mb-6 px-2 w-full sm:w-1/2">
                        <label for="vote" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ $mElectionvote->candidate->nourut. '. ' . $mElectionvote->candidate->ketua . ' - ' . $mElectionvote->candidate->wakil}}
                        </label>
                        <input
                            id="vote"
                            type="text"
                            name="electionvotes[{{ $mElectionvote->id }}]"
                            value="{{ $mElectionvote->vote }}"
                            class="form-input w-full"
                            placeholder="Jumlah Suara ... "
                            required autofocus>
                    </div>
                @empty
                    kosong
                @endforelse
            </div>
            <div class="flex flex-wrap items-center justify-end">
                @if($mElectionvotes)
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Simpan') }}
                    </button>
                @endif
            </div>
        </form>
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
                let candidateId = $(this).data('voteid');
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        resize.croppie('bind', {
                            url: e.target.result
                        })
                        uploadPhoto.data('voteid', candidateId)
                        uploadPhoto.modal('show');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            })

            uploadPhoto.data("onsave", function (img) {
                var formData = new FormData();
                let candidateId = uploadPhoto.data('voteid')
                formData.append('photo_id', img, "tmpcropp.png");
                formData.append('vote_id', candidateId);

                $.ajax({
                    url: "{{ route('ajax.uploadphotovote') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (res) {
                        if (res.status) {
                            btnInputimage.each(function (index, image) {
                                $(image).attr('src', res.photo);
                            });
                        }
                    }
                }).done(function () {
                    uploadPhoto.modal('hide');
                });
            })
        })
    </script>
@endpush
