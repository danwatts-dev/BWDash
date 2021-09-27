<div x-cloak x-data="addUnit('{{$property->id}}')" init="init">
    <x-element.action-button x-on:click="open=true">Add Unit</x-element.action-button>
    <x-modal-basic x-show="open">
        <header class="text-xl">
            <span>Add Unit</span>
        </header>
            <form method="POST" id="property-add-unit">
            @csrf
            {{-- @method('PATCH') --}}
            <input type="hidden" name="property_id" x-model="unit.property_id"/>
            <div class="flex flex-col space-y-1">
                <h2>Unit name</h2>
                <x-field.input
                    name="unit_name"
                    x-model="unit.unit_name"
                    ::value="unit.unit_name"
                />
                <h2>Details</h2>
                    <x-field.input
                        name="bedrooms"
                        placeholder="Bedrooms"
                        x-model="unit.bedrooms"
                        ::value="unit.bedrooms"
                    />
                    <x-field.input
                        name="bathroooms"
                        placeholder="Bathrooms"
                        x-model="unit.bathrooms"
                        ::value="unit.bathrooms"
                    />
                    <x-field.input
                        name="size"
                        placeholder="Size"
                        x-model="unit.size"
                        ::value="unit.size"
                    />
                    <x-field.select
                        name="type"
                        x-model="unit.type"
                        label="type"
                        ::value="unit.type"
                    >
                        <template x-for="type in ['studio', 'flat']">
                            <option :value="type" x-text="type"></option>
                        </template>
                    </x-field.select>
                    <x-field.input
                        name="deposit_amount"
                        placeholder="Deposit"
                        x-model="unit.deposit_amount"
                        ::value="unit.deposit_amount"
                    />
                    <x-field.input
                        name="rend"
                        placeholder="Rent"
                        x-model="unit.rent"
                        ::value="unit.rent"
                    />
            </div>
            <button type="button" x-on:click="submit()" class="w-full mt-4 rounded py-1 px-2 bg-green-500 text-white">Submit</button>
        </form>
    </x-modal-basic>
</div>