@extends('landing_pages.layouts.master')
@section('content')
@section('header','header-v4')
@section('filter_high_low','filter-link-active')
@section('filter_default_price','filter-link-active')
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span class="stext-109 cl4">
			Kostan
		</span>
	</div>
</div>
<div class="bg0 m-t-23 p-b-140">
	<div class="container">
        <div class="flex-w flex-sb-m p-b-52">
        	<div class="flex-w flex-l-m filter-tope-group m-tb-10">
        	</div>

        	<div class="flex-w flex-c-m m-tb-10">
        		<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                	<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                	<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                	 Filter
                </div>
			</div>

			<!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
            	<div class="bor8 dis-flex p-l-15">
            		<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
            			<i class="zmdi zmdi-search"></i>
            		</button>
            		<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
            	</div>
            </div>
            <!-- Filter -->
            @include('landing_pages.kostan.filter')

			<div class="row isotope-grid">
                @forelse ($kostan as $item)
				<div class="col-sm-6 col-md-4 col-lg-4 p-b-35 isotope-item women">
					<!-- Block2 -->
                    <div class="block2">
						<div class="block2-pic hov-img0">
							<img height="400px" src="{{ asset($item->kost($item->kostan_id)->foto->first()->path)}}" alt="IMG-PRODUCT">

							<a href="{{ url('kostan/detail/'.$item->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Lihat Selengkapnya
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{ url('kostan/detail/'.$item->slug) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $item->kost($item->kostan_id)->nama }} Tipe {{ $item->nama }}
								</a>
								<span class="stext-105 cl3 mb-1">
									<i class="fa fa-map-marker" aria-hidden="true"></i> {{ $item->kabupaten($item->kostan_id)->title }}
								</span>
                                <span class="stext-105 cl3 mb-1">
									<i class="fa fa-user" aria-hidden="true"></i> {{ $item->kost($item->kostan_id)->gender }}
								</span>
								<span class="stext-105 cl3">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
									Rp. {{ number_format($item->harga,0,'','.') }} / Bulan
								</span>
                                <span class="stext-105 cl3">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
									Tersedia {{ $item->jumlah_kamar }} Kamar
								</span>
								@if ($item->sumReview($item->id) != 0)
								<span class="fs-18 cl11">
									<i class="zmdi zmdi-star">  {{ $item->sumReview($item->id) }}</i>
                                </span>
                                @endif
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
                                @if (!Auth::guest())
                                    @if (count(\App\Models\Wishlist::is_wishlist($item->id)) > 0)
                                    <form action="{{ url('wishlist/deletes/'.$item->id) }}" method="post">
                                        @csrf
                                        <button type="submit">
                                            <img class="icon-heart2 dis-block trans-04 " src="{{ asset('landing_page/images/icons/icon-heart-02.png')}}" alt="ICON">
                                        </button>
                                    </form>
                                    @else
                                    <div href="#" class="btn-addwish-b2 dis-block pos-relative">
                                        <form action="{{ url('wishlist/'.$item->id) }}" method="post">
                                            @csrf
                                            <button>
                                                <img class="icon-heart2 dis-block trans-04 " src="{{ asset('landing_page/images/icons/icon-heart-02.png')}}" alt="ICON">
                                                <img class="icon-heart1 dis-block trans-04 ab-t-l" src="{{ asset('landing_page/images/icons/icon-heart-01.png')}}" alt="ICON">
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                @else
                                    <div href="#" class="btn-addwish-b2 dis-block pos-relative">
                                        <form action="{{ url('wishlist/'.$item->id) }}" method="post">
                                            @csrf
                                            <button>
                                                <img class="icon-heart2 dis-block trans-04 " src="{{ asset('landing_page/images/icons/icon-heart-02.png')}}" alt="ICON">
                                                <img class="icon-heart1 dis-block trans-04 ab-t-l" src="{{ asset('landing_page/images/icons/icon-heart-01.png')}}" alt="ICON">
                                            </button>
                                        </form>
                                    </div>
                                @endif
							</div>
						</div>
					</div>
				</div>
                @empty
                <div class="col-sm-6 col-md-4 col-lg-4 p-b-35 isotope-item women">
                    Kostan Belum Tersedia!
                </div>
                @endforelse
			</div>
            <div class="flex-c-m flex-w w-full p-t-45">
                {{ $kostan->links('vendor.pagination.custom') }}
			</div>
	</div>
</div>
@endsection
