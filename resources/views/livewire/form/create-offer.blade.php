<section class="pt-[90px] bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff]">
    <div class="flex flex-row items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 gap-6">
        <div class="bg-white w-8/12 rounded-md flex flex-col gap-4 justify-center items-center py-4">

            <div class="space-y-8 md:space-y-0 md:space-x-8 md:flex md:items-center">
                <div class="flex justify-center items-center w-full h-48 bg-gray-300 rounded sm:w-96 dark:bg-gray-700">
                    <img src="{{ asset('storage/photo/' . $submission->photo) }}">
                </div>
                <div class="w-full">
                    lorem ipsum
                </div>

            </div>


            <div class=" w-8/12 flex justify-center">

                <ol class="relative border-l border-gray-200 dark:border-gray-700">
                    <li class="mb-10 ml-6">
                        <span
                            class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <img class="rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg"
                                alt="Bonnie image" />
                        </span>
                        <div
                            class="justify-between items-center p-4 bg-white rounded-lg border border-gray-200 shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                            <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">just now</time>
                            <div class="text-sm font-normal text-gray-500 dark:text-gray-300">Bonnie moved <a
                                    href="#"
                                    class="font-semibold text-blue-600 dark:text-blue-500 hover:underline">Jese Leos</a>
                                to <span
                                    class="bg-gray-100 text-gray-800 text-xs font-normal mr-2 px-2.5 py-0.5 rounded dark:bg-gray-600 dark:text-gray-300">Funny
                                    Group</span></div>
                        </div>
                    </li>
                    <li class="mb-10 ml-6">
                        <span
                            class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <img class="rounded-full shadow-lg" src="/docs/images/people/profile-picture-5.jpg"
                                alt="Thomas Lean image" />
                        </span>
                        <div
                            class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-700 dark:border-gray-600">
                            <div class="justify-between items-center mb-3 sm:flex">
                                <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">2 hours
                                    ago</time>
                                <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">Thomas Lean
                                    commented on <a href="#"
                                        class="font-semibold text-gray-900 dark:text-white hover:underline">Flowbite
                                        Pro</a></div>
                            </div>
                            <div
                                class="p-3 text-xs italic font-normal text-gray-500 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                Hi ya'll! I wanted to share a webinar zeroheight is having regarding how to best measure
                                your design system! This is the second session of our new webinar series on
                                #DesignSystems discussions where we'll be speaking about Measurement.</div>
                        </div>
                    </li>
                    <li class="ml-6">
                        <span
                            class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <img class="rounded-full shadow-lg" src="/docs/images/people/profile-picture-1.jpg"
                                alt="Jese Leos image" />
                        </span>
                        <div
                            class="justify-between items-center p-4 bg-white rounded-lg border border-gray-200 shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                            <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">1 day ago</time>
                            <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">Jese Leos has changed
                                <a href="#"
                                    class="font-semibold text-blue-600 dark:text-blue-500 hover:underline">Pricing
                                    page</a> task status to <span
                                    class="font-semibold text-gray-900 dark:text-white">Finished</span>
                            </div>
                        </div>
                    </li>
                </ol>

            </div>




        </div>
        <div class="bg-white p-10 w-4/12 rounded-md">
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
