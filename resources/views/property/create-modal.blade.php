<div x-cloak x-data="create()" init="init">
    <x-element.action-button x-on:click="open=true">Create</x-element.action-button>
    <x-modal-basic x-show="open">
        <header class="text-xl">
            <span>Create</span>
        </header>
            <form action="" method="post">
            @csrf
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
                <x-field.input
                    name="council_tax_band"
                    placeholder="Council Tax Band"
                    x-model="property.council_tax_band"
                    ::value="property.council_tax_band"
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
                 <label class="mr-3 w-full flex justify-between items-center text-gray-800">Status
                    <select class="px-2 py-1 border rounded bg-white" x-model="property.status" name="property_status">
                        <template x-for="(status , index) in data.propertyStatuses" :key="index">
                            <option :selected="property.status == status" :value="status" x-text="status"></option>
                        </template>
                    </select>
                </label>
            </div>
            <button type="button" x-on:click="submit()" class="w-full mt-4 rounded py-1 px-2 bg-green-500 text-white">Submit</button>
        </form>
    </x-modal-basic>
</div>