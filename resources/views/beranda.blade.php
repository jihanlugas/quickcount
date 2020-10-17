@extends('layouts.app')

@section('header', 'Beranda')

@section('content')
    {{--    <div class="py-6 px-4 max-w-3xl mx-auto">--}}
    {{--        <div class="flex mb-8">--}}
    {{--            <div class="w-full flex flex-col justify-center items-center">--}}
    {{--                <span class="text-3xl font-bold mb-2">Selamat Datang</span>--}}
    {{--                <span class="text-1xl font-bold mb-6">Program Peduli Sesama</span>--}}
    {{--                <p class="text-base" align="center">Sebuah Program Solusi Keuangan Tanpa Kerja Tanpa Ribet Semua--}}
    {{--                    Transparan & Amanah</p>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="flex flex-wrap">--}}
    {{--            Beranda--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="w-screen p-4 flex flex-wrap justify-center items-center text-2xl">
        <div class="max-w-3xl mt-20 flex justify-center items-center flex-wrap">
            <img src="{{ asset('img/logo.jpeg') }}" alt="">
{{--            <img src="{{ asset('img/logo-background.jpeg') }}" alt="">--}}
        </div>
    </div>

{{--    <div class="w-screen p-4 flex flex-wrap justify-center items-center text-2xl">--}}
{{--        <div class="max-w-3xl flex justify-center items-center flex-wrap">--}}
{{--            <span class="mx-4">أهلاً و سهلاً</span>--}}
{{--            <span class="mx-4">ကြိုဆိုပါတယ် </span>--}}
{{--            <span class="mx-4">歡迎</span>--}}
{{--            <span class="mx-4">Vítej</span>--}}
{{--            <span class="mx-4">Welkom</span>--}}
{{--            <span class="mx-4">Welcome</span>--}}
{{--            <span class="mx-4">Bienvenue</span>--}}
{{--            <span class="mx-4">Aloha</span>--}}
{{--            <span class="mx-4">स्वागत</span>--}}
{{--            <span class="mx-4">Selamat Datang</span>--}}
{{--            <span class="mx-4">ようこそ </span>--}}
{{--            <span class="mx-4">ಸುಸ್ವಾಗತ</span>--}}
{{--            <span class="mx-4">Mauri</span>--}}
{{--            <span class="mx-4">Salve</span>--}}
{{--            <span class="mx-4">Bem-vindo</span>--}}
{{--            <span class="mx-4">Bainvegni</span>--}}
{{--            <span class="mx-4">Добродошли</span>--}}
{{--            <span class="mx-4">Bienvenido </span>--}}
{{--            <span class="mx-4">Wilkomme</span>--}}
{{--            <span class="mx-4">ยินดีต้อนรับ</span>--}}
{{--            <span class="mx-4">Hoş geldin</span>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
