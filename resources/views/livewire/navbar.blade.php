<nav id="header" class="w-full fixed flex flex-row gap-[100px]">
    <div
        class=" rounded-md container bg-white flex flex-wrap lg:flex-nowrap justify-between items-center pt-[22px] pb-[26px] gap-[22px]">


        <div id="navbar-defaults" class="hidden lg:block w-full lg:pt-5 lg:pb-5">
            <div class="flex  items-center justify-between gap-[5px] md:flex-row">
                <div class="img-box">
                    <img src="{{ asset('storage/photo/logo.png') }}" alt="logo" class="w-[120px]" />
                </div>
                <!-- left -->
                <div class="menu-navigation flex items-center gap-[70px]">
                    <ul class="flex flex-col md:flex-row items-center gap-8">
                        <li><a href="{{ route('home') }}" class="active">Beranda</a></li>
                        <li>
                            <div class="item-dropdown flex gap-[5px]">
                                <a href="{{ route('product') }}" class="">Produk</a>
                            </div>
                        </li>
                        @auth
                            <li><a href="{{ route('myproduct') }}">Produk saya</a></li>
                        @endauth
                        <li><a href="#">Tentang A-deal</a></li>
                    </ul>
                </div>

                <!-- right -->
                <div class="menu-action flex justify-between flex-col md:flex-row items-center gap-[47px]">
                    <div class="search-box flex items-center md:flex-row gap-[8px] border-b-[1px] pb-[18px]">
                    </div>

                    <div class="flex flex-row justify-center items-center gap-5">
                        @guest
                            <div class="button-box">
                                <a href="{{ route('login') }}"><button
                                        class="lg:mb-0 mb-[20px] bg-blue-600 rounded-[14px] pl-11 pr-[43px] pt-[18px] pb-[18px] text-white leading-3 text-[12px] font-semibold hover:bg-blue-800">
                                        <h1>Masuk</h1>
                                    </button></a>
                            </div>
                        @endguest

                        @auth
                            <livewire:logout />
                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
