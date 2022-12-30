<section class="pt-[110px] pb-10 bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff]">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto min-h-screen lg:py-0">
        <div><input class="form-control mb-3" type="text" wire:model="search" placeholder="Search" aria-label="search">
        </div>
        <div class="flex items-center  mb-10">
            <input checked id="checked-checkbox" type="checkbox" value="true" wire:model="cheapest"
                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checked-checkbox"
                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Termurah</label>
        </div>


        <div class="grid grid-cols-4 gap-4">
            @foreach ($submissions as $submission)
                <div
                    class="w-full h-[300px] max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                    <a href="#">
                        <img class="p-8 rounded-xl h-[200px] w-[300px] overflow-hidden"
                            @if ($submission->photo) src="{{ asset('storage/photo/' . $submission->photo) }}" alt="product image" />

    @else
    src="https://source.unsplash.com/200x300?{{ $submission->title }}"> @endif
                            </a>
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $submission->title }}</h5>

                            </a>
                            <p>
                            </p>


                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-gray-900 dark:text-white">Rp.
                                    {{ $submission->price }}</span>
                                <a href="{{ route('createOffer', ['submission_id' => $submission->id]) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get
                                    A-Deal</a>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
        <div class="pt-3 flex flex-col gap-1">
            {{ $submissions->links() }}
        </div>
    </div>
</section>
