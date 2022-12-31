<section class="pt-[110px] pb-10 bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff]">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto min-h-screen lg:py-0">
        <div><input class="form-control mb-3" type="text" wire:model="search" placeholder="Search" aria-label="search">
        </div>
        <div wire:loading>
            <button disabled type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                <svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="#E5E7EB" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentColor" />
                </svg>
                Loading...
            </button>
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
                    class="w-full h-full max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                    <a href="#">
                        <img class="p-8 rounded-xl h-[200px] w-[300px] overflow-hidden"
                            @if ($submission->photo) src="{{ asset('storage/photo/' . $submission->photo) }}" alt="product image" />

    @else
    src="https://source.unsplash.com/200x300?{{ $submission->title }}"> @endif
                            </a>
                        <div class="px-5 pb-5 flex-col">
                            <div>
                                <a href="#">
                                    <h5
                                        class="text-xl text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                                        {{ $submission->title }}</h5>

                                </a>
                                <p>
                                </p>
                            </div>

                            <div class="flex flex-col items-start justify-between gap-5">
                                <div><span class="text-2xl font-bold text-gray-900 dark:text-white">
                                        @currency($submission->price)</span></div>
                                <div>
                                    <a href="{{ route('createOffer', ['submission_id' => $submission->id]) }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get
                                        A-Deal</a>
                                </div>
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
