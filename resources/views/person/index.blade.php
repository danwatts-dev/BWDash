<x-layout>
    <section class="h-screen">
        <h1 class="text-3xl py-6">{{ ucfirst($person_type) }}</h1>
        <x-element.action-button class="mb-6" href="/{{ $person_type }}/create"><i class="mr-2 text-green-500 fa fa-plus fa-xs"></i>Add</x-element.action-button>

        <div x-data="table('{{ $person_type }}')" x-init="fetch" class="h-full">
            {{-- <div class="py-4">
                <span>Filter by status:</span> --}}
                {{-- <button class="rounded border py-0.5 px-2" :class="active==$el && 'border-indigo-500 bg-indigo-50 text-indigo-800'" x-on:click="url='/api/person?is_tenant=1&is_pending'; fetch(); active=$el;">All</button> --}}
                {{-- <x-field.alpine-button
                    color="indigo"
                    url="/api/person"
                    label="All"
                />
                <x-field.alpine-button
                    color="green"
                    url="/api/person?is_tenant=1"
                    label="Tenant"
                />
                <x-field.alpine-button
                    color="blue"
                    url="/api/person?is_pending"
                    label="Pending"
                />
            </div>
            <div class="py-4">
                <span>Smart search:</span>
                <input class="border p-4" x-on:keydown.debounce="search" x-model="this.searchTerm" type="text">

            </div> --}}
            <x-table.basic>
                <x-table.row dot="" class="sticky top-0 bg-gray-50 z-10 border-b">
                    <x-table.cell.basic class="w-full">Name</x-table.cell.basic>
                    <x-table.cell.basic class="w-full">Phone</x-table.cell.basic>
                    <x-table.cell.basic class="w-full">Mobile</x-table.cell.basic>
                    <x-table.cell.basic class="w-full">Email</x-table.cell.basic>
                </x-table.row>
                <x-slot name="body">
                    <template x-for="item in data">
                        <x-table.row dot="item.dot_color ?? 'text-transparent'">
                            <x-table.cell.name
                                first="item.first_name"
                                last="item.last_name"
                            />
                            <x-table.cell.basic x-text="item.home_phone" class="w-full"></x-table.cell.basic>
                            <x-table.cell.basic x-text="item.mobile_phone" class="w-full"></x-table.cell.basic>
                            <x-table.cell.basic x-text="item.email" class="w-full"></x-table.cell.basic>
                        </x-table.row>
                    </template>
                </x-slot>
            </x-table.basic>
        </div>
    </section>
</x-layout>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('table', (model) => ({
            url: '/api/'+model,
            active: '',
            model: model,
            data: {},
            fetch() {
                fetch(this.url, {
                })
                .then(response => response.json())
                .then((data) => {
                    this.data = data;
                    console.log(data);
                })
                .catch(() => {
                    this.data = 'Ooops! Something went wrong!'
                });
            },
        }))
    })

    </script>
