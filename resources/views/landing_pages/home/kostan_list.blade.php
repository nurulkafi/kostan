<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Rekomendasi Kostan
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">

			</div>

			<div class="row isotope-grid">
                @foreach ($kostan as $item)
				<div class="col-sm-6 col-md-4 col-lg-4 p-b-35 isotope-item women">
                    <div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset($item->kost($item->kostan_id)->foto->first()->path)}}" alt="IMG-PRODUCT" height="400px">

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
                @endforeach


			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="{{ url('kostan') }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>
