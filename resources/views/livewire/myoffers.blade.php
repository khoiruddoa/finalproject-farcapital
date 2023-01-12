<section class="pt-[120px] bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff] min-h-screen">
    <div class="flex flex-row items-start justify-center px-6 py-8 mx-auto  lg:py-0 gap-6">


        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Produk yang kamu ajukan

                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nama Produk
                        </th>
                        <th scope="col" class="py-3 px-6">
                            tanggal
                        </th>
                        <th scope="col" class="py-3 px-6">
                            harga Barang
                        </th>
                        <th scope="col" class="py-3 px-6">
                            penawaran
                        </th>
                        <th scope="col" class="py-3 px-6">
                            status barang
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myoffers as $offer)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="py-4 px-6">
                                {{ $offer->submission->title }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $offer->created_at->diffForHumans() }}
                            </td>
                            <td class="py-4 px-6">
                                @currency($offer->submission->price)
                            </td>
                            <td class="py-4 px-6">
                                @currency($offer->offer_price)
                            </td>
                            <td class="py-4 px-6">
                                @if ($offer->submission->status)
                                    Belum Terjual
                                @else
                                    Sudah terbeli
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
