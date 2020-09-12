@extends('layouts.app')

@section('header', 'Home')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
        })
    </script>
@endpush
