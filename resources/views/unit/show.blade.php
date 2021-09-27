
<x-layout>
    <section class="">
        <header class="flex items-baseline">
            <h1 class="text-3xl mr-4">{{ $unit->unit_name }}</h1>
        </header>
        <div class="w-full py-4 flex space-x-1">
            @if ($unit->current_tenancy)
                <x-element.action-button href="/tenancy/{{ $unit->current_tenancy->id}}">View Tenancy</x-element.action-button>
            @else
                <x-element.action-button href="/tenancy/create?unit_id={{ $unit->id }}">Create Tenancy</x-element.action-button>
            @endif
                <x-element.action-button href="/task/create">Add Task</x-element.action-button>

        </div>
    </section>
    @if ($unit->current_tenancy)
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
                    @foreach ($unit->current_tenancy->tenants as $tenant)
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
    @endif
    @if (!$unit->tasks->isEmpty())
    <section class="p-4 rounded bg-white border mb-6">
        <div class="text-lg">Tasks</div>
        <article class="py-2">
            <x-table.basic>
                <x-table.row>
                    <x-table.cell.basic>Title</x-table.cell.basic>
                    <x-table.cell.basic>Date added</x-table.cell.basic>
                </x-table.row>
                <x-slot name="body">
                    @foreach ($unit->tasks as $task)
                        <x-table.row :dot="$task->color" :dot-tooltip="'Urgency level is '.$task->urgency">
                            <x-table.cell.basic>{{ $task->title }}</x-table.cell.basic>
                            <x-table.cell.basic>{{ $task->created_at->format('d M y') }}</x-table.cell.basic>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table.basic>
        </article>
    </section>
    @endif
</x-layout>
<