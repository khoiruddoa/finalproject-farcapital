<section class="pt-[120px] pb-10 bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff] min-h-screen ">
    <div x-data="{
        open: false,
        open2: false
    }" class="flex flex-col items-center justify-start px-6 py-8 mx-auto lg:py-0">
        <div
            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center items-start px-4 pt-4">



            </div>
            <div class="flex flex-col items-center pb-10">
                <div class="my-4 ">
                    @if (Auth::user()->photo)
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="{{ asset('storage/photo/' . Auth::user()->photo) }}" alt="" />
                    @else
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="{{ asset('storage/photo/nophoto.png') }}" alt="" />
                    @endif
                    <h5 class="mb-1 text-2xl font-medium text-gray-900 dark:text-white">{{ Auth::user()->name }}</h5>
                </div>

                <div x-show="open2" @click.outside="open2 = false">
                    <livewire:changephoto />
                </div>
                @if ($location)
                    <div class="flex flex-col items-start justify-start">
                        <span x-data="{
                            provinsi: [],
                        }" x-init="fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi/{{ $location->provinsi }}')
                            .then(response => response.json())
                            .then(data => provinsi = data)" x-text="provinsi.nama"
                            class="text-sm text-gray-500 dark:text-gray-400"></span>

                        <span x-data="{
                            kota: [],
                        }" x-init="fetch('https://dev.farizdotid.com/api/daerahindonesia/kota/{{ $location->kabupaten }}')
                            .then(response => response.json())
                            .then(data => kota = data)" x-text="kota.nama"
                            class="text-sm text-gray-500 dark:text-gray-400"></span>


                        <span x-data="{
                            kecamatan: [],
                        }" x-init="fetch('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/{{ $location->kecamatan }}')
                            .then(response => response.json())
                            .then(data => kecamatan = data)" x-text="kecamatan.nama"
                            class="text-sm text-gray-500 dark:text-gray-400"></span>

                        <span x-data="{
                            kelurahan: [],
                        }" x-init="fetch('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/{{ $location->kelurahan }}')
                            .then(response => response.json())
                            .then(data => kelurahan = data)" x-text="kelurahan.nama"
                            class="text-sm text-gray-500 dark:text-gray-400"></span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $location->address }}</span>
                    </div>
                @endif
                <div class="my-4">

                    <button @click="open2 = true"
                        class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Ganti
                        Photo</button>

                    <button @click="open = true"
                        class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tambah
                        Alamat</button>

                </div>

            </div>
        </div>

        <div x-show="open" @click.outside="open = false">
            <livewire:form.create-location />
        </div>
    </div>
</section>
