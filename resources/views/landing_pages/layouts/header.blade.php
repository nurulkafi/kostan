    <header class="@yield('header')">
		<!-- Header desktop -->
		<div class="container-menu-desktop">

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="{{ url('/') }}" class="logo">
						<img src="{{ asset('landing_page/images/logo_kostan_id.png')}}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="{{ url('/') }}">Home</a>
							</li>
							<li>
								<a href="{{ url('/kostan') }}">Kostan</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
                        @if (Auth::guest() || \App\Models\Wishlist::getCountWishlist() == 0 )
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </div>
                        @else

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ \App\Models\Wishlist::getCountWishlist() }}">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </div>
                        @endif
                        <ul class="nav nav-pills">
                            <li class="nav-item dropdown">
                                <a class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-account-o"></i></a>
                                <div class="dropdown-menu">
                                @if (Auth::guest())
                                <a class="dropdown-item" href="{{ url('/masuk-pencari') }}">Login Pencari Kostan</a>
                                <a class="dropdown-item" href="{{ url('/masuk-pemilik') }}">Login Pemilik Kostan</a>
                                @else
                                {{-- <a class="dropdown-item" href="#">Akun</a> --}}
                                <a class="dropdown-item" href="{{ url('transaksi') }}">Transaksi</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                                </div>
                                @endif
                            </li>
                        </ul>
                        {{-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <i class="zmdi zmdi-account"></i>
                        </div> --}}
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
					</div>
				</nav>

			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="{{ url('/') }}"><img src="{{ asset('landing_page/images/logo_kostan_id.png')}}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
                @if (Auth::guest())
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 js-show-cart">
					<i class="zmdi zmdi-favorite-outline"></i>
				</div>
                @else
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ \App\Models\Wishlist::getCountWishlist() }}">
					<i class="zmdi zmdi-favorite-outline"></i>
				</div>
                @endif
				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
					<i class="zmdi zmdi-account"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li class="active-menu">
					<a href="{{ url('/') }}">Home</a>
				</li>
				<li>
					<a href="{{ url('/kostan') }}">Kostan</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{ asset('landing_page/images/icons/icon-close2.png')}}" alt="CLOSE">
				</button>

				<form method="post" action="{{ url('kostan/search') }}" class="wrap-search-header flex-w p-l-15">
					@csrf
                    <button type="submit" class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Cari Kostan...">
				</form>
			</div>
		</div>

	</header>

	{{-- <!-- Cart --> --}}
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Wishlist
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
                    @if (!Auth::guest())
                    @forelse (\App\Models\Wishlist::wishlist()  as $item)
					<li class="header-cart-item flex-w flex-t m-b-12">
                        <form action="{{ url('wishlist/delete/'.$item->id) }}" method="post">
                        @csrf
                        <button type="submit">
						<div class="header-cart-item-img">
                                <img src="{{  asset($item->kost($item->kostan_id)->foto->first()->path)}}" alt="IMG">
                            </div>
                        </button>
                        </form>
						<div class="header-cart-item-txt p-t-8">
							<a href="{{ url('kostan/detail/'.$item->slug) }}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{ $item->kost($item->kostan_id)->nama }} Tipe {{ $item->nama }}
							</a>

							<span class="header-cart-item-info">
								Rp. {{ number_format($item->harga,0,'','.') }} / Bulan
							</span>
						</div>
					</li>
                    @empty
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        Wishlist Masih Kosong
                    </li>
                    @endforelse
                    @else
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        Silahkan Login Dan Tambahkan Kostan Favoritmu disini.
                    </li>
                    @endif
				</ul>

				{{-- <div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
