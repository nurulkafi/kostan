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
				Detail
			</span>
		</div>
	</div>
<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
        <form action="{{ url('sewa_kost') }}" method="POST">
        <input type="hidden" name="tipe_kamar_id" value="{{ $kostan->id }}">
        <input type="hidden" name="harga" value="{{ $kostan->harga }}">
        @csrf
        <div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
                                @foreach ($kostan->kost($kostan->kostan_id)->foto as $item)
								<div class="item-slick3" data-thumb="{{ asset($item->path)}}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset($item->path)}}" alt="IMG-KOST">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset($item->path) }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{ $kostan->kost($kostan->kostan_id)->nama }} Tipe {{ $kostan->nama }}
                            @if ($kostan->sumReview($kostan->id) != 0)
								<span class="fs-18 cl11">
									<i class="zmdi zmdi-star">  {{ $kostan->sumReview($kostan->id) }}</i>
                                </span>
                                @endif
						</h4>

						<span class="mtext-106 cl2">
							Rp. {{ number_format($kostan->harga,0,'','.') }} / Bulan
						</span>
                        <br><br>
                        <span class="mtext-101 cl2 p-b-14">
							Tersedia {{ $kostan->jumlah_kamar }} Kamar
                        </span>
						<p class="mtext-102 cl3 p-t-23">
							{!! $kostan->kost($kostan->kostan_id)->deskripsi !!}
						</p>
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Lama Sewa
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="lama_sewa">
											<option>Choose an option</option>
											@for ($i = 1; $i <= 12; $i++)
											<option value="{{ $i }}">{{ $i }} Bulan</option>
											@endfor
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>
						</div>
						<!--  -->
						<div class="p-t-33">
							<div class="row">
                                @if (!Auth::guest() && count(\App\Models\Wishlist::is_wishlist($kostan->id)) > 0)
                                <div class="col-12">
                                    <button type="submit" href="{{ url('sewa_kost') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Sewa Kostan
                                    </button>
                                </div>
                                @else
                                <div class="col-6">
                                    <form action="{{ url('wishlist/'.$kostan->id) }}" method="post">
                                        <button type="submit" class="flex-c-m stext-101 cl0 size-101 btn btn-outline-secondary bor1 p-lr-15 trans-04 text-black" style="color: black">
                                            Wishlist
                                        </button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <button type="submit" href="{{ url('sewa_kost') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Sewa Kostan
                                    </button>
                                </div>
                                @endif
                            </div>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Fasilitas</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Peraturan</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews ({{ count($kostan->review($kostan->id)) }})</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ol class="p-lr-28 p-lr-15-sm">
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($kostan->fasilitas as $fasilitas)
                                        <li class="flex-w flex-t p-b-7">{{ $no++ }} . <a href="{{ asset($fasilitas->fasilitas->foto) }}" target="_blank">{{ $fasilitas->fasilitas->nama }}</a></li>
                                    @endforeach
									</ol>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl6 size-206">
												{!! $kostan->peraturan !!}
											</span>
										</li>


									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div>
										<!-- Review -->
                                        @forelse ($kostan->review($kostan->id) as $review)
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="{{ asset($review->foto)}}" alt="AVATAR">
											</div>
											<div class="size-207">
												<div class="row">
													<span class="mtext-107 cl2 p-r-20 col-6">
														{{ $review->nama }}
													</span>

													<span class="fs-18 cl11 col-6">
                                                        @for ($i = 1; $i <= $review->rating; $i++)
														<i class="zmdi zmdi-star"></i>
                                                        @endfor
													</span>
												</div>

												<p class="stext-102 cl6">
													{{ $review->review }}
												</p>
											</div>
                                        </div>
                                            @empty
                                            <p class="stext-102 cl6">
													Belum Ada Review
											</p>
                                        @endforelse

										<!-- Add review -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        </form>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					KOSTAN LAINNYA
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                    @foreach ($kostan->kostan_terkait($kostan->kost($kostan->kostan_id)->pemilik_kost_id,$kostan->id) as $items)
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset($items->kost($items->kostan_id)->foto->first()->path)}}" alt="IMG-PRODUCT">

							<a href="{{ url('kostan/detail/'.$items->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Lihat Selengkapnya
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{ url('kostan/detail/'.$items->slug) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $items->kost($items->kostan_id)->nama }} Tipe {{ $items->nama }}
								</a>
								<span class="stext-105 cl3 mb-1">
									<i class="fa fa-map-marker" aria-hidden="true"></i> {{ $items->kabupaten($items->kostan_id)->title }}
								</span>
                                <span class="stext-105 cl3 mb-1">
									<i class="fa fa-user" aria-hidden="true"></i> {{ $items->kost($items->kostan_id)->gender }}
								</span>
								<span class="stext-105 cl3">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
									Rp. {{ number_format($items->harga,0,'','.') }} / Bulan
								</span>
                                <span class="stext-105 cl3">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
									Tersedia {{ $items->jumlah_kamar }} Kamar
								</span>
								@if ($items->sumReview($items->id) != 0)
								<span class="fs-18 cl11">
									<i class="zmdi zmdi-star">  {{ $items->sumReview($items->id) }}</i>
                                </span>
                                @endif
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
                                @if (!Auth::guest())
                                    @if (count(\App\Models\Wishlist::is_wishlist($items->id)) > 0)
                                    <form action="{{ url('wishlist/deletes/'.$items->id) }}" method="post">
                                        @csrf
                                        <button type="submit">
                                            <img class="icon-heart2 dis-block trans-04 " src="{{ asset('landing_page/images/icons/icon-heart-02.png')}}" alt="ICON">
                                        </button>
                                    </form>
                                    @else
                                    <div href="#" class="btn-addwish-b2 dis-block pos-relative">
                                        <form action="{{ url('wishlist/'.$items->id) }}" method="post">
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
                                        <form action="{{ url('wishlist/'.$items->id) }}" method="post">
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
                    @endforeach
				</div>
			</div>
		</div>
	</section>
@endsection
