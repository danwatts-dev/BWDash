<x-layout>
    <section class="h-screen">
        <header class="flex items-baseline">
            <h1 class="text-3xl mr-4">{{ $property->address_line_1 }}</h1>
            @if ($property->status == 'disabled')
                <span class="text-red-500">Disabled</span>
            @endif
        </header>
        <div class="w-full py-4 flex space-x-1">
            @include('property.edit-modal')
            @include('property.add-unit-modal')
            <x-element.action-button x-on:click="open=true">Delete</x-element.action-button>
        </div>
        <div class="w-full flex">
            {{-- START detail --}}
            <div class="flex flex-col space-y-2 bg-white rounded p-4 border w-full">
                <x-element.detail-item icon="fa-map-marked-alt">
                    <div class="flex flex-col">
                        <span>{{ $property->address_line_1 }}</span>
                        <span>{{ $property->address_line_2 }}</span>
                        <span>{{ $property->address_postcode }}</span>
                        <span>{{ $property->address_city }}</span>
                    </div>
                </x-element.detail-item>
                {{-- <x-element.detail-item icon="fa-map-marker-alt">
                    <div class="flex">
                        <span class="mr-2">Lat: {{ $property->latitude }}</span>
                        <span>Lng: {{ $property->longitude }}</span>
                    </div>
                </x-element.detail-item> --}}
                <x-element.detail-item icon="fa-home">
                    <div class="flex">{{ $property->type->name }}</div>
                </x-element.detail-item>
            </div>
            {{-- END detail --}}
            {{-- START img --}}
            {{-- <div class="ml-auto relative shadow-2xl w-80 h-60">
                <img src="{{ asset('/storage/placeholder.jpg') }}" class="object-contain">
                <div class="opacity-0 transition duration-300 hover:opacity-100 flex flex-col absolute bg-gradient-to-b from-transparent via-transparent to-black h-full w-full top-0">
                    <div class="mt-auto flex p-2">
                        <button class="p-2 bg-white rounded ml-auto">Change</button>
                    </div>
                </div>
            </div> --}}
            {{-- END img --}}
            {{-- <div x-data="{
                all: {{ $property->occupancyStats['occupied'] }}

            }">
            
            </div>
            <span>{{ $property->occupancyStats['occupied'] }}
            <span>{{ $property->occupancyStats['pending'] }}
            <span>{{ $property->occupancyStats['confirmed'] }}
            <span>{{ $property->occupancyStats['available'] }}
            <span>{{ $property->occupancyStats['all'] }} --}}

        </div>
        <div class="mt-8 bg-white rounded p-4 border w-full">
            <h2 class="text-xl "><span>Units</span></h2>
            <ul class="space-y-2 flex flex-col" x-data="propertyUnitsIndex({{ $property->id }})">
                <template x-for="(unit, index) in units">
                    <li :class="'border-'+unit.status_color+'-500'" class="relative border rounded p-4 w-full bg-white flex flex-col">
                        <header class="mb-2"><a :href="'/unit/'+unit.id" class=""><span class="hover:text-gray-700 text-lg" x-text="unit.unit_name"></span></a></header>
                        <small :class="'text-'+unit.status_color+'-500'" class="p-2 absolute top-0 right-0" x-text="unit.status_name"></small>
                        <div class="space-y-2">
                            <div x-show="unit.current_tenants.length > 0" class="pl-4 w-1/3 border-l-4 border-blue-500">
                                <span>Tenants</span>
                                <div class="flex">
                                    <template x-for="(tenant, index) in unit.current_tenants">
                                        <div class=" flex flex-col">
                                            <small class="relative" x-data="{ show: false }">
                                                <span x-show="index != 0">, </span>
                                                <a x-on:mouseover="show = true" x-on:mouseover.away="show = false" :href="'/tenant/'+tenant.id">
                                                    <span class="text-gray-500 hover:text-blue-500" x-text="tenant.name"></span>
                                                    <div x-show="show" class="rounded bg-white absolute border p-2 z-50">
                                                        <div class="flex">
                                                            <span class="pr-2">Phone: </span>
                                                            <span x-text="tenant.person.home_phone"></span>
                                                        </div>
                                                        <div class="flex">
                                                            <span class="pr-2">Mobile: </span>
                                                            <span x-text="tenant.person.mobile_phone"></span>
                                                        </div>
                                                        <div class="flex">
                                                            <span class="pr-2">Email: </span>
                                                            <span x-text="tenant.person.email"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </small>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <div x-show="unit.current_tasks.length > 0" class="pl-4 w-1/3 border-l-4 border-blue-500">
                                <span>Tasks</span>
                                <ul>
                                    <template x-for="(task, index) in unit.current_tasks">
                                        <li class=" flex flex-col">
                                            <small class="relative" x-data="{ show: false }">
                                                <span x-show="index != 0">, </span>
                                                <a x-on:mouseover="show = true" x-on:mouseover.away="show = false" :href="'/task/'+task.id">
                                                    <span :class="'text-'+task.color+'-500'"><i class="fas fa-circle fa-sm pr-2"></i><span class="text-gray-500 hover:text-blue-500" x-text="task.title"></span></span>
                                                    <div x-show="show" class="rounded bg-white absolute border p-2 z-50">
                                                        <div class="flex">
                                                            <span x-text="task.description"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </small>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                            <div x-show="unit.current_keys.length > 0" class="pl-4 w-1/3 border-l-4 border-blue-500">
                                <span>Keys</span>
                                <div class="flex">
                                    <template x-for="(key, index) in unit.current_keys">
                                        <div class=" flex flex-col">
                                            <small class="relative" x-data="{ show: false }">
                                                <span x-show="index != 0">, </span>
                                                <a x-on:mouseover="show = true" x-on:mouseover.away="show = false" :href="'/key/'+key.id">
                                                    <span :class="'text-'+task.color+'-500 hover:text-'+task.color+'-700'" x-text="key.reference"></span>
                                                    <div x-show="show" class="rounded bg-white absolute border p-2 z-50">
                                                        <div class="flex">
                                                            <span x-text="key.assigned_to"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </small>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        <div>
                    </li>
                </template>
                <x-modal-basic x-show="show">
                    <button x-on:click="">Sure?</button>
                </x-modal-basic>
            </ul>
        </div>
    </section>
</x-layout>