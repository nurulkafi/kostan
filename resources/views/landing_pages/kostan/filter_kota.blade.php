@extends('landing_pages.layouts.master')
@section('content')
@section('header','header-v4')
<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="{{ url('/kostan') }}" class="stext-109 cl8 hov-cl1 trans-04">
				Kostan
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Kota
			</span>
		</div>
	</div>
<!-- Product Detail -->
	<section class="sec-product-detail m-5">
        <div class="row">
        @foreach ($provinsi as $item)
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-header">
                    {{ $item->title }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($item->kabupaten($item->code) as $kabupaten)
                    <li class="list-group-item"><a href="{{ url('kostan/kota/'.$kabupaten->title) }}">{{ $kabupaten->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
        </div>
	</section>
@endsection
