<section class="pt-[90px] bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff]">
    <div class="flex flex-row items-center justify-center px-6 py-8 mx-auto min-h-screen lg:py-0 gap-6">
        <div class="bg-white w-7/12 rounded-md flex flex-col gap-8 justify-center items-center py-8 my-4">
            <div class="space-y-8 md:space-y-0 md:space-x-8 md:flex md:items-center">
                <div class="flex flex-col justify-center items-center w-[600px]">
                    <div><img src="{{ asset('storage/photo/' . $submission->photo) }}" class="h-[200] w-[200]"></div>

                    <div class="w-[500px] px-8">
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
                                class="mt-3 mr-2 text-white bg-yellow-600 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Deskripsi
                                Produk
                            </button>
                            <a href="{{ route('productedit', ['submission_id' => $submission->id]) }}"><button
                                    class="mt-3 mr-2 text-white bg-yellow-600 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Edit
                                    Produk
                                </button></a>
                            </button>
                            <button wire:click="destroy({{ $submission->id }})"
                                class="mt-3 text-white bg-yellow-600 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Hapus
                                Produk
                            </button><br>

                            <span x-show="open" @click.outside="open = false">
                                <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">
                                    {{ $submission->description }}
                                </p>
                            </span>
                        </div>
                        </p>
                        <p class="mt-4 font-bold">{{ $submission->user->name }}</p>
                        <time
                            class="mb-1 text-sm font-normal text-gray-400 ">{{ $submission->created_at->diffForHumans() }}</time>
                    </div>
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 m-4">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Nama Penawar
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        No.handphone
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Harga Penawaran
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Komentar
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $offer->user->name }}
                                        </th>
                                        <td class="py-4 px-6">
                                            <a
                                                href="https://api.whatsapp.com/send?phone={{ $offer->user->telephone }}&text=Hai%20pesan{{ $offer->submission->title }}"><button
                                                    type="button"
                                                    class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Hubungi</button></a>

                                        </td>
                                        <td class="py-4 px-6">
                                            @currency($offer->offer_price)
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $offer->comment }}
                                        </td>
                                        <td class="py-4 px-6">
                                            @if ($offer->status !== true && $offer->submission->status == true)
                                                <button wire:click="update({{ $offer->id }})"
                                                    class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Pilih
                                                    Pembeli</button>
                                            @elseif($offer->status !== true && $offer->submission->status !== true)
                                                <div class="bg-red-500 rounded-md text-white text-sm p-2">
                                                    pembeli ditolak</div>
                                            @else($offer->status == true && $offer->submission->status !== true)
                                                <div class="bg-blue-800 rounded-md  text-white text-sm p-2">
                                                    pembeli terpilih</div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>



                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
