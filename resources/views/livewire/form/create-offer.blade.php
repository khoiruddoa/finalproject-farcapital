<section class="pt-[90px] bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff]">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="bg-white p-10 rounded-md">
            <form wire:submit.prevent="submit">
                <div class="flex flex-row gap-5">
                    <div>
                        <div class="mb-6">
                            <label for="offer_price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                Penawaran</label>
                            <input type="number" id="offer_price" wire:model="offer_price"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            @error('offer_price')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="comment"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                            <textarea id="comment" rows="4" wire:model="comment"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                            @error('comment')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajukan
                    Penawaran</button>
            </form>
        </div>

    </div>
</section>
