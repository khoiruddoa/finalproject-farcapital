<section
    class="min-h-screen pt-[110px] pb-8 bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff] flex flex-col justify-center items-center">

    <livewire:iklan />


    <div><input class="form-control mb-3 rounded-xl" type="text" wire:model="search" placeholder="Cari..."
            aria-label="search">
    </div>
    <div class="flex flex-col justify-center items-center   gap-4">
        <div class="flex flex-row justify-center items-center bg-white rounded-lg p-2 gap-8">
            <div>
                <select id="small" class="w-full p-2  text-sm text-gray-900 border-0" wire:model="category">
                    <option selected>Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="flex items-center">
                <input checked id="checked-checkbox" type="checkbox" value="true" wire:model="cheapest"
                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox"
                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Termurah</label>
            </div>
        </div>

        <div x-data="{
            open: false,
            open2: false
        }" class="flex flex-row justify-center items-center gap-4 mb-4">

            <button class="flex flex-row justify-center items-center bg-white rounded-lg p-2 font-bold"
                @click=" open = !open ">Cari
                Berdasar Daerah
            </button>
            <div x-show="open" class="flex flex-row">
                <div x-data="{
                    provinsi: [],
                    id: 0,
                    namaprovinsi: '',
                }" x-init="fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi')
                    .then(response => response.json())
                    .then(data => provinsi = data.provinsi)">


                    <select x-on:change="id = $el.value, open2 = true" wire:model="provinsi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Provinsi</option>
                        <template x-for="prov in provinsi">
                            <option :value="prov.id">
                                <p x-text="prov.nama"></p>
                            </option>
                        </template>
                    </select>




                    <div>

                        <div x-data="{
                            kabupaten: [],
                            idkab: 0
                        }"
                            x-effect="fetch('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='+id)
                                                                                .then(response => response.json())
                                                                                .then(data => kabupaten = data.kota_kabupaten)">
                            <select x-show="open2" x-on:change="idkab = $el.value" wire:model="kabupaten"
                                class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="">Kabupaten</option>
                                <template x-for="kab in kabupaten">
                                    <option :value="kab.id">
                                        <p x-text="kab.nama"></p>
                                    </option>
                                </template>
                            </select>
                            <div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center justify-start px-6 pt-2 mx-auto  lg:py-0">
        <div wire:loading>
            <button disabled type="button"
                class="mb-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
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
        @if ($submissions->count())
            <div class="grid grid-cols-4 gap-4 items-center">
                @foreach ($submissions as $submission)
                    <div
                        class="w-full h-full max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                        <a href="#">
                            <img class="p-8 rounded-lg h-[200px] w-[300px] overflow-hidden"
                                src="{{ asset('storage/photo/' . $submission->photo) }}" alt="product image" />

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
                                <div class="flex flex-col gap-3">
                                    <div>
                                        <a href="{{ route('createOffer', ['submission_id' => $submission->id]) }}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get
                                            A-Deal</a>
                                    </div>
                                    <div> <span x-data="{
                                        provinsi: [],
                                    }" x-init="fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi/{{ $submission->location->provinsi }}')
                                        .then(response => response.json())
                                        .then(data => provinsi = data)" x-text="provinsi.nama"
                                            class="text-sm text-gray-500 dark:text-gray-400"></span><br>

                                        <span x-data="{
                                            kota: [],
                                        }" x-init="fetch('https://dev.farizdotid.com/api/daerahindonesia/kota/{{ $submission->location->kabupaten }}')
                                            .then(response => response.json())
                                            .then(data => kota = data)" x-text="kota.nama"
                                            class="text-sm text-gray-500 dark:text-gray-400"></span>,


                                        <span x-data="{
                                            kecamatan: [],
                                        }" x-init="fetch('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/{{ $submission->location->kecamatan }}')
                                            .then(response => response.json())
                                            .then(data => kecamatan = data)" x-text="kecamatan.nama"
                                            class="text-sm text-gray-500 dark:text-gray-400"></span>, <br>

                                        <span x-data="{
                                            kelurahan: [],
                                        }" x-init="fetch('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/{{ $submission->location->kelurahan }}')
                                            .then(response => response.json())
                                            .then(data => kelurahan = data)" x-text="kelurahan.nama"
                                            class="text-sm text-gray-500 dark:text-gray-400"></span>
                                        <span
                                            class="text-sm text-gray-500 dark:text-gray-400">{{ $submission->location->address }}</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="mt-4 font-bold">{{ $submission->user->name }}</p>
                                <time
                                    class="mb-1 text-sm font-normal text-gray-400 ">{{ $submission->created_at->diffForHumans() }}</time>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pt-3 flex flex-col gap-1">
                {{ $submissions->links() }}
            </div>
        @else
            <div>
                <div class="flex p-4 mb-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                    role="alert">
                    <span class="font-medium text-center"></span> Produk Yang anda cari tidak ditemukan.
                </div>
            </div>
        @endif

    </div>
</section>
