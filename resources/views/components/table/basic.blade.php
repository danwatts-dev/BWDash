 <div class="w-full bg-white h-1/2">
    <ul class="border border-gray-700 h-full rounded-lg overflow-scroll">
        {{ $slot }}
        <div x-data="">
           {{ $body }}
        </div>
    </ul>
</div>