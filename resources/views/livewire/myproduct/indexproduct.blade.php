<section class="pt-[100px] pb-10 bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff] min-h-screen">
    <div class="flex flex-col items-center justify-start px-6 py-8 mx-auto  lg:py-0">

        <div class="flex flex-col justify-center items-center mt-4">
            @if ($submissions->count())
                <a href="{{ route('productCreate') }}"><button type="button"
                        class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tambah
                        Product</button></a>
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($submissions as $submission)
                        <div
                            class="w-full h-[330px] max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                            <a href="#">
                                <img class="p-8 rounded-xl h-[200px] w-[300px] overflow-hidden"
                                    src="{{ asset('storage/photo/' . $submission->photo) }}" alt="product image" />
                            </a>
                            <div class="px-5 pb-5">
                                <a href="#">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        {{ $submission->title }}</h5>
                                </a>

                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-gray-900 dark:text-white">Rp.
                                        @currency($submission->price)</span>
                                </div>
                                <div class="flex flex-row gap-4 my-4"><a
                                        href="{{ route('myshowproduct', ['submission_id' => $submission->id]) }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="pt-3 flex flex-col gap-1">
                    {{ $submissions->links() }}
                </div>
                @if ($submissions_2->count())
                    <div class="mt-20 text-lg text-white bg-slate-400 p-2 rounded-md ">Produk Yang sudah Terjual</div>
                    <div class="grid grid-cols-4 gap-4">

                        @foreach ($submissions_2 as $submission)
                            <div
                                class="w-full h-[330px] max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                                <a href="#">
                                    <img class="p-8 rounded-xl h-[200px] w-[300px] overflow-hidden"
                                        src="{{ asset('storage/photo/' . $submission->photo) }}" alt="product image" />
                                </a>
                                <div class="px-5 pb-5">
                                    <a href="#">
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                            {{ $submission->title }}</h5>
                                    </a>

                                    <div class="flex items-center justify-between">
                                        <span class="text-2xl font-bold text-gray-900 dark:text-white">
                                            @currency($submission->price)</span>
                                    </div>
                                    <div class="flex flex-row gap-4 my-4"><a
                                            href="{{ route('myshowproduct', ['submission_id' => $submission->id]) }}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="pt-3 flex flex-col gap-1">
                        {{ $submissions_2->links() }}
                    </div>
                @else
                @endif
            @else
                <div class="flex flex-col gap-8 justify-center items-center">
                    <div class="font-extrabold text-2xl text-center">Anda belum Memiliki Produk yang akan ditawarkan,

                    </div>
                    <div><a href="{{ route('productCreate') }}"><button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                                Produk Baru</button></a></div>
                </div>
            @endif
        </div>
    </div>
    </div>
</section>
