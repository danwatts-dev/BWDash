<label class="flex-1 flex flex-col">
    <span class="text-gry-800">{{ $label }}</span>
    <input name="{{ $name }}" {{ $attributes->class(['border-red-500' => $errors->has($name)])->merge(['class' => "py-1 px-2 rounded border bg-white"]) }}/>
    <span class="error-container text-red-500" data-for="{{$name}}"></span>
    @error($name)
         <small class="error-container text-red-500">{{ $message }}</small>
    @enderror
</label>
