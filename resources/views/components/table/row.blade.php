<li {{ $attributes->merge(['class' => 'px-4 py-2 border-t border-gray-300 flex items-center space-x-2 justify-between text-gray-700']) }} >
    @if ($alpine)
        @if ($dot)
        <div x-data="{ show: false }" class="relative flex items-center">
            <i class="mr-4 fas fa-circle relative" :class="'text-'+{{$dot}}+'-500'" x-on:mouseover="show = true" @mouseover.away = "show = false"></i>
            <div x-show="show" class="absolute flex items-center left-0 ml-5">
                <div class="w-0 h-0 border-4 border-transparent" style="border-right:6px solid black;"></div>
                <small class="p-2 bg-black text-white  w-max z-50" x-text="{{ $dotTooltip }}"></small>

            </div>
        </div>
        @else
            <i class="mr-4 fas fa-circle text-transparent"></i>
        @endif
        {{ $slot }}
    @else
        @if ($dot)
        <div x-data="{ show: false }" class="relative flex items-center">
            <i class="mr-4 fas fa-circle relative text-{{$dot}}-500" x-on:mouseover="show = true" @mouseover.away = "show = false"></i>
            <div x-show="show" class="absolute flex items-center left-0 ml-5">
                <div class="w-0 h-0 border-4 border-transparent" style="border-right:6px solid black;"></div>
                <small class="p-2 bg-black text-white  w-max z-50">{{ $dotTooltip }}</small>
            </div>
        </div>
        @else
            <i class="mr-4 fas fa-circle text-transparent"></i>
        @endif
        {{ $slot }}
    @endif
</li>