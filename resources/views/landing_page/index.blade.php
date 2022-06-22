@extends('layout.index')

@section('title', 'Halaman Utama')
    
@section('content')
    @include('landing_page.main')
    @include('landing_page.promo')
    @include('landing_page.populer')
@endsection