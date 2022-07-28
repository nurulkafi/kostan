@extends('landing_pages.layouts.master')
@section('content')
{{-- Slider --}}
@include('landing_pages.home.slider')
<!-- rekomendasi -->
@include('landing_pages.home.kostan_list')
@include('landing_pages.home.kota_list')
<!-- Banner -->
@endsection
