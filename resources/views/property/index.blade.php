<x-layout>
    <section class="h-screen">
        <header class="flex"><h1 class="text-3xl py-6">Properties</h1></header>
             <x-element.action-button class="mb-6" href="/property/create"><i class="mr-2 text-green-500 fa fa-plus fa-xs"></i>Add</x-element.action-button>
            {{-- @include('property.create-modal') --}}

         <div class="flex space-x-4 h-screen">
            <div class="w-full">
                <div x-data="table()" x-init="fetch" class="">
                    {{-- <div class="py-4">
                        <button class="rounded border py-0.5 px-2" :class="active==$el && 'border-indigo-500 bg-indigo-50 text-indigo-800'" x-on:click="url='/api/property?'; fetch(); active=$el;">All</button>
                        <button class="rounded border py-0.5 px-2" :class="active==$el && 'border-gray-500 bg-gray-50 text-gray-800'" x-on:click="url='/api/property?is_visible=0&is_occupied=0'; fetch(); active=$el">Draft</button>
                        <button class="rounded border py-0.5 px-2" :class="active==$el && 'border-red-500 bg-red-50 text-red-800'" x-on:click="url='/api/property?is_active=0'; fetch(); active=$el">Disabled</button>
                        <button class="rounded border py-0.5 px-2" :class="active==$el && 'border-green-500 bg-green-50 text-green-800'" x-on:click="url='/api/property?is_occupied=1'; fetch(); active=$el">Occupied</button>
                        <button class="rounded border py-0.5 px-2" :class="active==$el && 'border-blue-500 bg-blue-50 text-blue-800'" x-on:click="url='/api/property?is_occupied=0&is_active=1&is_visible=1'; fetch(); active=$el">Available</button>
                    </div> --}}
                    <x-table.basic>
                        <x-table.row dot="" class="sticky top-0 bg-gray-50 z-10 border-b">
                            @foreach ([
                                'address',
                                'type',
                                'units',
                                'tasks',
                                // 'actions',
                            ] as $heading)
                                <div class="w-full">{{ UCfirst($heading) }}</div>
                            @endforeach
                        </x-table.row>
                        <x-slot name="body">
                            <template x-for="item in data">
                                <x-table.row alpine="true" dot="item.status_color" dot-tooltip="'This property is '+item.status_name">
                                    <x-table.cell.address
                                        line1="item.address_line_1"
                                        line2="item.address_line_2"
                                        postcode="item.address_postcode"
                                    />
                                    <x-table.cell.basic>
                                        <div class="flex space-x-2"><i :class="item.type.icon"></i><span x-text="item.type.name"></span></div>
                                    </x-table.cell.basic>
                                    <x-table.cell.basic>
                                        <span class="" x-text="item.units ? item.units.length : 0"></span>
                                    </x-table.cell.basic>
                                    <x-table.cell.basic>
                                        <span class="" x-text="item.tasks ? item.tasks.length : 0"></span>
                                    </x-table.cell.basic>
                                    {{-- <x-model.actions-dropdown model="item.id"/> --}}
                                </x-table.row>
                            </template>
                        </x-slot>
                    </x-table.basic>
                </div>
            </div>
        </div>
    </section>
</x-layout>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('actionDropdown', () => ({
            open: false,
            trigger: {
                ['@click']() {
                    this.open = ! this.open
                },
                 ['@click.away']() {
                    this.open = false
                },
            },
        }));

        Alpine.data('table', () => ({
            url: '/api/property',
            active: '',
            data: {},
            async fetch() {
                fetch(this.url, {
                })
                .then(response => response.json())
                .then((data) => {
                    this.data = data;
                })
                .catch(() => {
                    this.message = 'Ooops! Something went wrong!'
                });
            },
            search() {
                this.active = '';
                const data = {'search_term': searchTerm}
                fetch('/api/property/search', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then((data) => {
                    this.data = data;
                });
            },
            searchTerm: '',
        }))
        Alpine.data('row', () => ({
        }))
    })


    </script>