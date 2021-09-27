<div {{ $attributes }} class="z-50 fixed h-screen w-screen inset-0">
    <div class="h-full w-full opacity-60  bg-black"></div>
    <section class="absolute inset-0 z-10 flex justify-center items-center">
        <div class="relative bg-white rounded max-h-5/6 overflow-y-scroll p-8">
            <button x-on:click="open=false" class="absolute top-0 right-0 p-2"><i class="text-red-500 fas fa-times"></i></button>
            <div class="px-8 w-96">{{ $slot }}</div>
        </div>
    </section>
</div>