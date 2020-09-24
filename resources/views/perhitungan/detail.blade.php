@extends('layouts.app')

@section('header', 'Perhitungan Cepat')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="flex flex-wrap container_data">
            <div class="text-lg font-bold mb-4 w-full">
                {{ $mElection->name }}
            </div>
            <canvas id="myChart"></canvas>
            <div class="flex flex-wrap w-full -mx-2 mt-4">
                <div class="flex justify-center items-center px-2 w-full">
                    <span class="mx-1 ">Data Masuk</span>
                    <span class="mx-1 font-bold has_vote">0</span>
                    <span class="mx-1 ">Dari</span>
                    <span class="mx-1 font-bold total_tps">0</span>
                    <span class="mx-1 ">TPS</span>
                </div>
            </div>
            <div class="flex flex-wrap mt-4 w-full">
                <div class="text-lg font-bold w-full">Kandidat</div>
                <div class="flex flex-wrap w-full -mx-2">
                    @forelse($mCandidates as $index => $candidate)
                        <div class="flex flex-wrap flex-col px-2 w-full sm:w-1/2">
                            <div class="font-bold">{{ 'No. Urut : ' . $candidate->nourut }}</div>
                            <div class="">{{ 'Ketua : ' . $candidate->ketua }}</div>
                            <div class="">{{ 'Wakil : ' . $candidate->wakil }}</div>
                            <div class="candidate_{{ $index }}"></div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="flex flex-wrap mt-4 w-full">
                <div class="text-lg font-bold w-full">Data Suara</div>
                <div class="flex flex-wrap w-full -mx-2 mb-4">
                    <div class="flex justify-start items-center px-2 w-full sm:w-1/3">
                        <span class="mr-4">Suara Sah :</span>
                        <span class="font-bold suara_sah">0</span>
                    </div>
                    <div class="flex justify-start items-center px-2 w-full sm:w-1/3">
                        <span class="mr-4">Suara Tidak Sah :</span>
                        <span class="font-bold suara_tidak_sah">0</span>
                    </div>
                    <div class="flex justify-start items-center px-2 w-full sm:w-1/3">
                        <span class="mr-4">Total Suara :</span>
                        <span class="font-bold total_suara">0</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('script')
    <script>

        var election_id = '{{ $mElection->id }}';
        var jContainer = $('.container_data');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            generatechart()
        })

        function generatechart() {
            var data = {
                election_id: election_id
            }
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{ route('ajax.getperhitungandata') }}',
                data: data,
                success: function (res) {
                    if (res) {
                        let candidates = res.candidates;
                        let vote = res.vote;

                        if(candidates && vote) {
                            let dataCandidate = candidates.map(function (candidate) {
                                return candidate['ketua'] + ' - ' + candidate['wakil'];
                            })
                            dataCandidate.push('Golput');

                            let dataColor = candidates.map(function (candidate) {
                                return candidate['color'];
                            })

                            let dataVote = candidates.map(function (candidate, index) {
                                jContainer.find(`.candidate_${index}`).text('Total Suara : ' + candidate['vote'])
                                return candidate['vote'];
                            })
                            dataVote.push(vote.suara_tidak_sah)

                            jContainer.find('.suara_sah').text(vote.suara_sah);
                            jContainer.find('.suara_tidak_sah').text(vote.suara_tidak_sah);
                            jContainer.find('.total_suara').text(vote.total_suara);
                            jContainer.find('.has_vote').text(vote.has_vote);
                            jContainer.find('.total_tps').text(vote.total_tps);


                            var ctx = document.getElementById('myChart').getContext('2d');
                            var chart = new Chart(ctx, {
                                type: 'doughnut',

                                data: {
                                    labels: dataCandidate,
                                    datasets: [{
                                        backgroundColor: dataColor,
                                        borderColor: '#2d3748',
                                        data: dataVote
                                    }]
                                },

                                options: {}
                            });
                        }
                    }
                }
            }).done(function () {

            });
        }
    </script>
@endpush
