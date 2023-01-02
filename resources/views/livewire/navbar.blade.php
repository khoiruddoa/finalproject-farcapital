<nav
    class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900 w-full fixed flex flex-row gap-[100px] z-50">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('storage/photo/logo.png') }}" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
        </a>
        <div class="flex items-center md:order-2">
            @auth
                <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    @if (Auth::user()->photo)
                        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/photo/' . Auth::user()->photo) }}"
                            alt="user photo" />
                    @else
                        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/photo/nophoto.png') }}" alt="user photo" />
                    @endif
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>


                    </div>
                    <ul class="py-1" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profil</a>
                        </li>
                        @if (Auth::user()->role == 1)
                            <li>
                                <a href="{{ route('dataadmin') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Admin</a>
                            </li>
                        @endif
                        <li>

                            <livewire:logout />

                        </li>
                    </ul>
                </div>

            @endauth
            @guest
                <div class="button-box">
                    <a href="{{ route('login') }}"><button
                            class="lg:mb-0 mb-[20px] bg-blue-600 rounded-[14px] pl-11 pr-[43px] pt-[18px] pb-[18px] text-white leading-3 text-[12px] font-semibold hover:bg-blue-800">
                            <h1>Masuk</h1>
                        </button></a>
                </div>
            @endguest
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('product') }}"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Produk</a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('myproduct') }}"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">ProdukKU</a>
                    </li>
                    <li>
                        <a href="{{ route('myoffers') }}"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">PenawaranKU</a>
                    </li>
                @endauth
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Tentang
                        A-deal</a>
                </li>
            </ul>
        </div>
    </div>

</nav>
