<nav id="header" class="w-full fixed">
    <div
        class="container bg-white flex flex-wrap lg:flex-nowrap justify-between items-center pt-[22px] pb-[26px] gap-[22px]">
        <div class="img-box">
            <img src="images/logo.png" alt="logo" class="py-4" />
        </div>
        <button data-collapse-toggle="navbar-defaults" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-defaults" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div id="navbar-defaults" class="hidden lg:block w-full lg:pt-5 lg:pb-5">
            <div class="flex flex-col items-center justify-between gap-[5px] md:flex-row">
                <!-- left -->
                <div class="menu-navigation flex items-center gap-[70px]">
                    <ul class="flex flex-col md:flex-row items-center gap-8">
                        <li><a href="{{ route('home') }}" class="active">Home</a></li>
                        <li>
                            <div class="item-dropdown flex gap-[5px]">
                                <a href="{{ route('product') }}" class="">Produk</a><img
                                    src="./assets/images/Carret-down.png" alt="" class="object-contain" />
                            </div>
                        </li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Events</a></li>
                    </ul>
                </div>

                <!-- right -->
                <div class="menu-action flex justify-between flex-col md:flex-row items-center gap-[47px]">
                    <div class="search-box flex items-center md:flex-row gap-[8px] border-b-[1px] pb-[18px]">


                    </div>

                    <div class="flex flex-row justify-center items-center gap-5">
                        @guest
                            <div class="button-box">
                                <a href="{{ route('register') }}"><button
                                        class="lg:mb-0 mb-[20px] bg-blue-600 rounded-[14px] pl-11 pr-[43px] pt-[18px] pb-[18px] text-white leading-3 text-[12px] font-semibold hover:bg-blue-800">
                                        <h1>Daftar</h1>
                                    </button></a>
                            </div>
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
</nav>
