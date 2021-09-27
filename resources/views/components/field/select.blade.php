@if ($labelPosition == 'top')
    <label class="flex flex-col">
@else
    <label class="flex items-center">
@endif
    <span class="mr-4 w-32 text-gray-700">{{ $label }}</span>
    <select {{ $disabled ? 'disabled' : '' }} name="{{ $name }}" class="@error($name) border-red-500 @enderror py-1 px-2 rounded border bg-white" {{ $attributes }}>
        {{ $slot }}
    </select>
    <span class="error-container text-red-500" data-for="{{$name}}"></span>
</label>
 @error($name)
    <small class="blockerror-container text-red-500">{{ $message }}</small>
@enderror

