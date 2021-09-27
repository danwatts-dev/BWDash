<a {{ $attributes->merge(['class' => 'cursor-pointer px-4 py-2 border bg-white hover:border-'.$color.'-500 hover:bg-'.$color.'-50']) }} type="button">{{ $slot }}</a>
