<x-layout>
    <a class="cursor-pointer text-gray-500 hover:text-gray-800 mb-6"><i class="fas fa-caret-left mr-2"></i>Back to unit</a>
    <header class="flex flex-col items-baseline mb-6 relative">
            <h1 class="text-3xl mr-4">Tenancy for {{ $tenancy->unit->unit_name }}</h1>
            <span class="text-gray-500">{{ $tenancy->property->reference }}</span>
            <span class="absolute top-0 right-0 px-4 py-2 border rounded border-{{$tenancy->status->color()}}-500 text-{{$tenancy->status->color()}}-600">{{ ucfirst($tenancy->status->name()) }}</span>
    </header>
    <section class="p-4 rounded bg-white border mb-6">
        <div class="flex justify-between"><span class="text-lg">Checklist</span></div>
        <ul class="px-6 py-2 list-disc">
            @foreach ($tenancy->steps as $step)
                <li><span class="mr-2">{{ $step['name']}}</span><i class="text-green-500 fas fa-check"></i></li>
            @endforeach
        </ul>
        <x-element.action-button>Confirm</x-element.action-button>
    </section>
    <section class="p-4 rounded bg-white border mb-6">
        <div class="text-lg">Tenants</div>
        <article class="py-2">
            <x-table.basic>
                <x-table.row>
                    <x-table.cell.basic>Name</x-table.cell.basic>
                    <x-table.cell.basic>Home Phone</x-table.cell.basic>
                    <x-table.cell.basic>Mobile</x-table.cell.basic>
                    <x-table.cell.basic>Email</x-table.cell.basic>
                </x-table.row>
                <x-slot name="body">
                    @foreach ($tenancy->tenants as $tenant)
                        <x-table.row>
                            <x-table.cell.basic>{{ $tenant->person->name }}</x-table.cell.basic>
                            <x-table.cell.basic>{{ $tenant->person->home_phone }}</x-table.cell.basic>
                            <x-table.cell.basic>{{ $tenant->person->mobile_phone }}</x-table.cell.basic>
                            <x-table.cell.basic>{{ $tenant->person->email }}</x-table.cell.basic>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table.basic>
        </article>
    </section>
</x-layout>
