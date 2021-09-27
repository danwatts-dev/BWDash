<div x-cloak x-data="edit({{$property->id}})" init="init">
    <x-element.action-button x-on:click="open=true">Edit</x-element.action-button>
    <x-modal-basic x-show="open">
        <header class="text-xl">
            <span>Edit</span>
        </header>
            <form method="POST" id="property-edit">
            @csrf
            {{-- @method('PATCH') --}}
            <input type="hidden" value="{{$property->id}}" name="id">
            <div class="flex flex-col space-y-1 w-max">
                <h2>Address</h2>
                <x-field.input
                    name="address_line_1"
                    placeholder="Line 1"
                    x-model="property.address_line_1"
                    ::value="property.address_line_1"
                />
                <x-field.input
                    name="address_line_2"
                    placeholder="Line 2"
                    x-model="property.address_line_2"
                    ::value="property.address_line_2"
                />
                <x-field.input
                    name="address_city"
                    placeholder="City"
                    x-model="property.address_city"
                    ::value="property.address_city"
                />
                <x-field.input
                    name="address_postcode"
                    placeholder="Postcode"
                    x-model="property.address_postcode"
                    ::value="property.address_postcode"
                />
                <x-field.select
                    name="property_type_id"
                    x-model="property.property_type_id"
                    label="type"
                    ::value="property.address_postcode"
                >
                    <template x-for="type in Object.values(propertyTypes)" :key="type.id">
                        <option :value="type.id" x-text="type.name"></option>
                    </template>
                </x-field.select>
                <x-field.select
                    name="status"
                    x-model="property.status"
                    label="Status"
                    ::value="property.status"
                >
                    <template x-for="(status , index) in data.propertyStatuses.status" :key="index">
                        <option :selected="property.status == status" :value="status" x-text="status.charAt(0).toUpperCase() + status.slice(1);"></option>
                    </template>
                </x-field.select>
            </div>
            <button type="button" x-on:click="submit()" class="w-full mt-4 rounded py-1 px-2 bg-green-500 text-white">Submit</button>
        </form>
    </x-modal-basic>
</div>
