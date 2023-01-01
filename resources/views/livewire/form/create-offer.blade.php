<section class="pt-[120px] bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff] min-h-screen">
    <div class="flex flex-row items-start justify-center px-6 py-8 mx-auto  lg:py-0 gap-6">
        <div
            class="bg-white w-6/12 rounded-xl flex flex-col gap-14 justify-center items-center px-[30px] py-[40px] mb-10">
            <div class="flex flex-col justify-center items-start">

                <div class="flex flex-row justify-start items-start gap-4">
                    <div class="w-1/2 flex flex-col gap-10">
                        <div><img src="{{ asset('storage/photo/' . $submission->photo) }}"
                                class="h-[300px] w-full rounded-xl object-cover"></div>
                        <div
                            class=" w-full h-[500px] flex justify-center items-center overflow-auto p-4 bg-slate-200 rounded-xl">

                            <ol class="relative border-gray-200 dark:border-gray-700 rounded-sm p-2">
                                @foreach ($offers as $offer)
                                    <li class="mb-10 ml-6 flex flex-row gap-2">
                                        @if ($offer->user->photo)
                                            <div>
                                                <img src="{{ asset('storage/photo/' . $offer->user->photo) }}"
                                                    class="rounded-full w-8 h-8">
                                            </div>
                                        @else
                                            <div>
                                                <img src="{{ asset('storage/photo/nophoto.png') }}"
                                                    class="rounded-full w-8 h-8">
                                            </div>
                                        @endif
                                        <div
                                            class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-700 dark:border-gray-600 w-[200px]">
                                            <div class="justify-between items-center mb-3 sm:flex">
                                                <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">
                                                    <p class="font-bold">{{ $offer->user->name }}</p> Membuat penawaran
                                                    senilai :<p>
                                                        @currency($offer->offer_price)</p>
                                                </div>
                                            </div>
                                            <div
                                                class="p-3 text-xs italic font-normal text-gray-500 bg-gray-50 rounded-sm border border-gray-200 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                                {{ $offer->comment }}</div>
                                            <time
                                                class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ $offer->created_at->diffForHumans() }}</time>
                                        </div>
                                        <div>
                                            @if ($offer->user->id == Auth::user()->id)
                                                <button wire:click="deleteId({{ $offer->id }})"
                                                    class="text-white
                                                    bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4
                                                    focus:ring-blue-300 font-medium rounded-xl text-[10px] px-2 py-2
                                                    text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700
                                                    dark:focus:ring-blue-800">Hapus
                                                    Penawaran</button>
                                            @endif

                                        </div>

                                    </li>
                                @endforeach


                            </ol>

                        </div>

                    </div>
                    <div class="w-1/2">
                        <h5 class=" text-center mb-2 text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $submission->title }}</h5>
                        <h5 class="mb-2 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        </h5>
                        <p><span class="font-bold">Kategori :</span></p>
                        <h4 class="text-2xl font-semibold">{{ $submission->category->category_name }}</h4>
                        <h4 class="text-4xl font-semibold">@currency($submission->price)</h4>
                        <p class=" w-[200px] mb-3 font-normal text-gray-500 dark:text-gray-400">
                        <div x-data="{ open: false }">
                            <button @click="open = true"
                                class="mt-3 w-[300px] text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Deskripsi
                                Produk</button>
                            </button><br>

                            <span x-show="open" @click.outside="open = false">
                                <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400 ">
                                    {{ $submission->description }}
                                </p>
                            </span>
                        </div>
                        <div class="w-8/12">
                            <p class="mt-4 font-bold">{{ $submission->user->name }}</p>
                            <time
                                class="mb-1 text-md font-normal text-gray-400 ">{{ $submission->created_at->diffForHumans() }}</time>

                            @if ($submission->user->id == Auth::user()->id)
                                <p class="mt-4 text-md font-bold text-red-600
                            ">Anda tidak
                                    bisa
                                    membuat penawaran di Produkmu sendiri</p>
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>





        @if ($submission->user->id !== Auth::user()->id)
            @if (!$cek)
                <div class="bg-white p-10 w-/12 rounded-md justify-center items-center">
                    <div>
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

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajukan
                                Penawaran</button>

                        </form>
                    </div>
                </div>
            @else
                <div class="bg-white p-10 w-/12 rounded-md justify-center items-center">
                    <div>
                        <div class="bg-green-600 rounded-xl font-semibold px-10 py-10 text-white">
                            <p>Penawaran Sedang
                                diajukan</p>

                        </div>
                    </div>
                </div>
            @endif
        @endif

    </div>
</section>
