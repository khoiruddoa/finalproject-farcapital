<section class="pt-[90px] bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff]">
    <div class="flex flex-row items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 gap-6">
        <div class="bg-white w-6/12 rounded-md flex flex-col gap-8 justify-center items-center py-4">
            <div class="space-y-8 md:space-y-0 md:space-x-8 md:flex md:items-center">
                <div class="flex justify-center items-center w-full h-48 bg-gray-300 rounded sm:w-96 dark:bg-gray-700">
                    <img src="{{ asset('storage/photo/' . $submission->photo) }}">
                </div>
                <div class="w-full p-4">

                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        {{ $submission->title }}</h5>
                    <p><span class="font-bold">Kategori :</span> {{ $submission->category->category_name }}</p>
                    <p class=" w-[200px] mb-3 font-normal text-gray-500 dark:text-gray-400">Deskripsi produk :
                        {{ $submission->description }}</p>
                    <p class="font-bold">{{ $submission->user->name }}</p>
                    <time
                        class="mb-1 text-sm font-normal text-gray-400 ">{{ $submission->created_at->diffForHumans() }}</time>
                </div>

            </div>


            <div class=" w-10/12 h-[300px] flex justify-center overflow-auto p-4">

                <ol class="relative border-gray-200 dark:border-gray-700 rounded-sm p-2">
                    @foreach ($offers as $offer)
                        <li class="mb-10 ml-6 flex flex-row gap-2">
                            <div><img src="https://source.unsplash.com/40x40?man" class="rounded-full"></div>
                            <div
                                class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-700 dark:border-gray-600">
                                <div class="justify-between items-center mb-3 sm:flex">
                                    <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">
                                        <p class="font-bold">{{ $offer->user->name }}</p> Membuat penawaran senilai :<p>
                                            Rp.
                                            {{ $offer->offer_price }}</p>
                                    </div>
                                </div>
                                <div
                                    class="p-3 text-xs italic font-normal text-gray-500 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                    {{ $offer->comment }}</div>
                                <time
                                    class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ $offer->created_at->diffForHumans() }}</time>
                            </div>
                            <div>
                                @if ($offer->user->id == Auth::user()->id)
                                    <button type="button"
                                        class="text-white  bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-[10px] px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Hapus
                                        Penawaran</button>
                                @endif

                            </div>

                        </li>
                    @endforeach


                </ol>

            </div>




        </div>
        <div class="bg-white p-10 w-3/12 rounded-md">
            <form wire:submit.prevent="submit">
                <div class="flex flex-row gap-5">
                    <div>
                        <div class="mb-6">
                            <label for="offer_price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Penawaran</label>
                            <input type="number" id="offer_price" wire:model="offer_price"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            @error('offer_price')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="comment"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan</label>
                            <textarea id="comment" rows="4" wire:model="comment"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                            @error('comment')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                @if ($cek)
                    <button type="submit" disabled
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Penawaran
                        Sudah diajukan</button>
                @else
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajukan
                        Penawaran</button>
                @endif
            </form>
        </div>

    </div>
</section>
