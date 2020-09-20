@extends('layouts.app')

@section('header', 'Perhitungan Cepat')

@section('content')
    <div class="py-6 px-4 max-w-3xl mx-auto">
        @include('layouts.flash')
        <div class="flex flex-wrap">
            <div class="text-lg font-bold mb-4 w-full">
                {{ $mElection->name }}
            </div>
            <canvas id="myChart"></canvas>
            <div class="flex flex-wrap mt-4 w-full">
                <div class="text-lg font-bold w-full">Kandidat</div>
                @forelse($mCandidates as $candidate)
                    <div class="flex flex-wrap w-full">
                        <div class="flex flex-wrap w-full font-bold">{{ 'No. Urut : ' . $candidate->nourut }}</div>
                        <div class="flex flex-wrap w-full ">{{ 'Ketua : ' . $candidate->ketua }}</div>
                        <div class="flex flex-wrap w-full ">{{ 'Wakil : ' . $candidate->wakil }}</div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var election_id = '{{ $mElection->id }}';
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
                        console.log(res)
                        let candidates = res.candidates;
                        let vote = res.vote;

                        let dataCandidate = candidates.map(function (candidate) {
                            return candidate['ketua'] + ' - ' + candidate['wakil'];
                        })
                        dataCandidate.push('Golput');

                        let dataColor = candidates.map(function (candidate) {
                            return candidate['color'];
                        })

                        let dataVote = candidates.map(function (candidate) {
                            return candidate['vote'];
                        })
                        dataVote.push(vote.suara_tidak_sah)

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
            }).done(function () {

            });
        }
    </script>
@endpush
