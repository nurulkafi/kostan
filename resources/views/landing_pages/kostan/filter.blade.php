<div class="dis-none panel-filter w-full p-t-10">
    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
        <div class="filter-col1 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Sort By
            </div>

            <ul>
                <li class="p-b-6">
                    <a href="{{ url('kostan') }}" class="filter-link stext-106 trans-04 @yield('filter_default')">
                        Default
                    </a>
                </li>


                <li class="p-b-6">
                    <a href="{{ url('kostan/terbaru') }}" class="filter-link stext-106 trans-04 @yield('filter_terbaru')">
                        Terbaru
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ url('kostan/harga/rendah-tinggi') }}" class="filter-link stext-106 trans-04 @yield('filter_low_high')">
                        Harga: Terendah ke Tertinggi
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ url('kostan/harga/tinggi-rendah') }}" class="filter-link stext-106 trans-04 @yield('filter_high_low')">
                        Harga: Tertinggi ke Terendah
                    </a>
                </li>
            </ul>
        </div>

        <div class="filter-col2 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Price
            </div>

            <ul>
                <li class="p-b-6">
                    <a href="{{ url('kostan') }}" class="filter-link stext-106 trans-04 @yield('filter_default_price')">
                        All
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ url('kostan/harga/0/500000') }}" class="filter-link stext-106 trans-04 @yield('filter_price_0_500000')">
                        Rp. 0 - Rp. 500.000
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ url('kostan/harga/500000/1000000') }}" class="filter-link stext-106 trans-04 @yield('filter_price_500000_1000000')">
                        Rp. 500.000 - Rp. 1.000.000
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ url('kostan/harga/1000000/2000000') }}" class="filter-link stext-106 trans-04 @yield('filter_price_1000000_2000000')">
                        Rp. 1.000.000 - Rp. 2.000.000
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ url('kostan/harga/1000000/2000000') }}" class="filter-link stext-106 trans-04 @yield('filter_price_2000000_5000000')">
                        Rp. 2.000.000 - Rp. 5.000.000
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="{{ url('kostan/harga/5000000/plus') }}" class="filter-link stext-106 trans-04 @yield('filter_price_5000000_plus')">
                        Rp. 5.000.000 ++
                    </a>
                </li>
            </ul>
        </div>
        <div class="filter-col4 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Gender
            </div>

            <div class="flex-w p-t-4 m-r--5">
                <a href="{{ url('kostan/gender/laki-laki') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5 ">
                    Laki Laki
                </a>
                <a href="{{ url('kostan/gender/perempuan') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Perempuan
                </a>
                <a href="{{ url('kostan/gender/campuran') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Campuran
                </a>
            </div>
        </div>
    </div>
</div>
</div>
