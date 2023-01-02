<section x-data="{
    datauser: false,
    datapengaju: false,
    datapenawar: false,
    tambahkategori: false
}"
    class="flex flex-row pt-[120px] bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff] min-h-screen">

    <aside class="w-64" aria-label="Sidebar">
        <div class="overflow-y-auto py-4 px-3 bg-gray-300 rounded dark:bg-gray-800">
            <ul class="space-y-2">
                <li>
                    <button @click="datauser = true"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

                        <span class="ml-3">Daftar user</span>
                    </button>
                </li>
                <li>
                    <button @click="datapengaju = true"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

                        <span class="ml-3">Daftar Pengaju</span>
                    </button>
                </li>
                <li>
                    <button @click="datapenawar = true"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

                        <span class="ml-3">Daftar penawar</span>
                    </button>
                </li>
                <li>
                    <button @click="tambahkategori = true"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

                        <span class="ml-3">Tambah Kategori</span>
                        </a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="flex flex-col items-start justify-start px-6 py-8 mx-auto  lg:py-0 gap-6">


        <div x-show="datauser" @click.outside="datauser = false"
            class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Daftar User
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nama
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Email
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Telepon
                        </th>
                        <th scope="col" class="py-3 px-6">
                            tanggal daftar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="py-4 px-6">
                                {{ $user->name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $user->email }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $user->telephone }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $user->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div x-show="datapengaju" @click.outside="datapengaju = false"
            class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Daftar pengajuan
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nama pengaju
                        </th>

                        <th scope="col" class="py-3 px-6">
                            Barang yang dijual
                        </th>
                        <th scope="col" class="py-3 px-6">
                            harga
                        </th>
                        <th scope="col" class="py-3 px-6">
                            tanggal pengajuan
                        </th>
                        <th scope="col" class="py-3 px-6">
                            status barang
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissions as $submission)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="py-4 px-6">
                                {{ $submission->user->name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $submission->title }}
                            </td>
                            <td class="py-4 px-6">
                                @currency($submission->price)
                            </td>
                            <td class="py-4 px-6">
                                {{ $submission->created_at->diffForHumans() }}
                            </td>
                            <td class="py-4 px-6">
                                @if ($submission->status == true)
                                    laku
                                @else
                                    tersedia
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div x-show="datapenawar" @click.outside="datapenawar = false"
            class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Daftar penawar
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nama penawar
                        </th>

                        <th scope="col" class="py-3 px-6">
                            Barang yang ditawar
                        </th>
                        <th scope="col" class="py-3 px-6">
                            harga barang
                        </th>
                        <th scope="col" class="py-3 px-6">
                            harga penawar
                        </th>
                        <th scope="col" class="py-3 px-6">
                            tanggal penawaran
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="py-4 px-6">
                                {{ $offer->user->name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $offer->submission->title }}
                            </td>
                            <td class="py-4 px-6">
                                @currency($offer->submission->price)
                            </td>
                            <td class="py-4 px-6">
                                @currency($offer->offer_price)
                            </td>
                            <td class="py-4 px-6">
                                {{ $offer->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div x-show="tambahkategori" @click.outside="tambahkategori= false">
            <livewire:form.create-category />
        </div>
</section>
