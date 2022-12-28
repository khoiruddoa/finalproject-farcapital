<section class="pt-[110px] pb-10 bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff]">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto min-h-screen lg:py-0">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        <div class="grid grid-cols-4 gap-4">
            @foreach ($submissions as $submission)
                <div
                    class="w-full h-[300px] max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
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
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">Rp.
                                {{ $submission->price }}</span>
                            <a href="#"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get
                                A-Deal</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
