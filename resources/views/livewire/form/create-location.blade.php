<div class="bg-white p-10 rounded-md">
    <form wire:submit.prevent="submit">
        <div class="flex flex-row gap-5">


            <div>
                <div x-data="{
                    provinsi: [],
                    id: 0
                }" x-init="fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi')
                    .then(response => response.json())
                    .then(data => provinsi = data.provinsi)">
                    <select x-on:change="id = $el.value" wire:model="provinsi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Pilih Provinsi</option>
                        <template x-for="prov in provinsi">
                            <option :value="prov.id">
                                <p x-text="prov.nama"></p>
                            </option>
                        </template>
                    </select>
                    @error('provinsi')
                        <span class="error">{{ $message }}</span>
                    @enderror


                    <div>

                        <div x-data="{
                            kabupaten: [],
                            idkab: 0
                        }"
                            x-effect="fetch('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='+id)
                  .then(response => response.json())
                  .then(data => kabupaten = data.kota_kabupaten)">
                            <select x-on:change="idkab = $el.value" wire:model="kabupaten"
                                class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="">Pilih Kabupaten</option>
                                <template x-for="kab in kabupaten">
                                    <option :value="kab.id">
                                        <p x-text="kab.nama"></p>
                                    </option>
                                </template>
                            </select>
                            @error('kabupaten')
                                <span class="error">{{ $message }}</span>
                            @enderror

                            <div>

                                <div x-data="{
                                    kecamatan: [],
                                    idkec: 0
                                }"
                                    x-effect="fetch('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota='+idkab)
                        .then(response => response.json())
                        .then(data => kecamatan = data.kecamatan)">
                                    <select x-on:change="idkec = $el.value" wire:model="kecamatan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                                        <option value="">Pilih kecamatan</option>
                                        <template x-for="kec in kecamatan">
                                            <option :value="kec.id">
                                                <p x-text="kec.nama"></p>
                                            </option>
                                        </template>
                                    </select>
                                    @error('kecamatan')
                                        <span class="error">{{ $message }}</span>
                                    @enderror


                                    <div>

                                        <div x-data="{ kelurahan: [] }"
                                            x-effect="fetch('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan='+idkec)
                              .then(response => response.json())
                              .then(data => kelurahan = data.kelurahan)">
                                            <select wire:model="kelurahan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                                                <option value="">Pilih kelurahan</option>
                                                <template x-for="kel in kelurahan">
                                                    <option :value="kel.id">
                                                        <p x-text="kel.nama"></p>
                                                    </option>
                                                </template>
                                            </select>
                                            @error('kelurahan')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    </template>
                                </div>
                            </div>
                            </template>
                        </div>
                    </div>
                    </template>
                </div>
            </div>







            <div class="mb-6">
                <label for="address"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <textarea id="address" rows="4" wire:model="address"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                @error('address')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
            Alamat</button>
    </form>
</div>
