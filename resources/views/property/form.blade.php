<x-layout>
@if ($property->exists)
<header class="my-4 flex items-center justify-between max-w-4xl"><h1 class="text-2xl">Edit a property</h1>
    <x-element.action-button>Cancel</x-element.action-button>
</header>
    <form action="{{ route('property.update', ['property' => $property]) }}" method="POST" class="max-w-2xl">
        @method('PATCH')
@else
<header class="my-4 flex items-center justify-between max-w-4xl"><h1 class="text-2xl">Create a new property</h1>
    <x-element.action-button href="{{ route('property.index') }}" color="red">Cancel</x-element.action-button>
</header>
    <form action="{{ route('property.store') }}" method="POST" class="max-w-4xl flex flex-col space-y-6 px-24">
@endif
    @csrf
    <div class="flex flex-col space-y-2 mb-4 bg-white p-4 rounded">
        <span class="text-lg text-gray-700">Address</span>
        <small class="block text-gray-400">Line 1 and postcode are reqd. At some point this will automatically save geo data through the google api, or we could add an address auto complete.</small>
        <x-field.input name="address_line_1" value="{{  old('address_line_1', $property->address_line_1) }}" placeholder="Line 1" errors="true"/>
        <x-field.input name="address_line_2" value="{{  old('address_line_2', $property->address_line_2) }}" placeholder="Line 2" errors="true"/>
            <div class="flex w-full space-x-2">
                <x-field.input name="address_city" value="{{  old('address_city', $property->address_city) }}" placeholder="City" errors="true"/>
                <x-field.input name="address_postcode" value="{{  old('address_postcode', $property->address_postcode) }}" placeholder="Postcode" errors="true"/>
            </div>
    </div>
    <div x-data="unique('{{ old('reference') ?? null }}')" class="bg-white p-4 rounded">
        <span class="text-lg text-gray-700">Reference</span>
        <small class="block text-gray-400">A unique reference for this property</small>
        <x-field.input x-model="formData.reference" x-on:focusout="matches = []" x-on:focusout="submit" name="reference" value="{{  old('reference', $property->reference) }}" placeholder="18a Mossdale Drive"/>
        <small class="text-red-500" x-show="matches.length !== 0">Already taken</small>
    </div>
    <div class="bg-white p-4 rounded">
        <span class="text-lg text-gray-700">Details</span>
        <small class="block text-gray-400">&nbsp;</small>
        <div class="mb-4 space-y-2">
            <x-field.select  name="council_tax_band_id" label="Council Tax Band" label-position="left" errors="true">
                @foreach ($council_tax_bands as $band)
                    <x-field.option value="{{ $band->id }}">{{ $band->name }}</x-field.option>
                @endforeach
            </x-field.select>
            <x-field.select name="property_type_id" label="Type" label-position="left">
                @foreach ($propertyTypes as $type)
                    <x-field.option value="{{ $type->id }}">{{ ucfirst($type->name) }}</x-field.option>
                @endforeach
        </x-field.select>
        </div>
    </div>
    <x-field.input type="submit" name="submit" class="bg-green-500 text-white hover:bg-green-600 cursor-pointer"/>
    @if ($errors->any())
    <div>{{ $errors }}</div>
    @endif
</form>
</x-layout>