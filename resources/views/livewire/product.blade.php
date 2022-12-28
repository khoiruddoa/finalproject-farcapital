<section class="bg-gray-50 dark:bg-gray-900 pt-24">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex flex-row items-start justify-center px-6 py-8 mx-auto  lg:py-0">

        <div class="w-2/6">@livewire('sidebar')</div>
        <div class="w-4/6 bg-white mr-[280px] rounded-md p-10 flex flex-col gap-5">

            INI AUTHOR < @livewire('product.index') </div>
        </div>
</section>
