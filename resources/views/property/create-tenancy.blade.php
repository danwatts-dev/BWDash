<div x-cloak x-data="createTenancy()">
    <x-element.action-button x-on:click="open=true">Create Tenancy</x-element.action-button>
    <x-modal-basic x-show="open">
        <header class="flex flex-col mb-6">
            <span class="text-xl">Create Tenancy</span>
            <small class="text-gray-700"> for {{ $property->address_line_1 }}</small>
        </header>
        @if (!$property->is_active)
            <div class="my-12 py-1 px-2 rounded bg-red-50 border-red-400 border"><i class="text-red-500 mr-3 fas fa-times"></i> Cannot setup a tenancy for a <span class="text-red-500">disabled</span> property</div>
        @else
        <form action="{{ route('tenancy.store') }}" method="POST">
            @csrf
            <x-field.input type="hidden" name="property" value ="{{ $property->id }}" label="Property"/>
            <x-field.select name="length" label="Length of term">
                <x-field.option value="">6 months</x-field.option>
                <x-field.option value="">12 months</x-field.option>
            </x-field.select>
            <x-field.input type="date" name="start_date" label="Start date"/>
            <div class="w-80">
                <div class="flex flex-col overflow-scroll w-full" x-data="modelSearch" x-init="fetch">
                        <div>
                            <h2 class="py-2 text-lg">Tenants</h2>
                            <ul x-show="selectedOptions.length > 0" class="pb-2 flex flex-wrap space-x-2 space-y-2 -ml-2" x-data="">
                                 <template x-for="(key, index) in selectedOptions" :key="index">
                                     <li class="border border-gray-500 p-1 w-max rounded">
                                        <span  x-text="options[key].first_name+' '+options[key].last_name"></span>
                                        <button type="button" x-on:click="removeOption(key)">X</button>
                                     </li>
                                 </template>
                            </ul>
                            <div
                                x-show="!open"
                                class="p-2 border w-full"
                                x-html="selected < 0 ? `<span class='text-gray-400'>`+placeholder+`<span>` : options[selected].first_name+' '+ options[selected].last_name;"
                                x-on:click="toggleListbox"
                                x-on:click.away="closeListbox"
                                x-on:keydown.enter.stop.prevent="toggleListbox"
                            ></div>
                            <input
                                type="search"
                                x-show="open"
                                x-model="query"
                                class="p-2 border w-full"
                                x-on:keydown.debounce="search"
                                x-on:click.away="closeListbox"
                                :value="selected < 0 ? '' :  options[selected].first_name+' '+ options[selected].last_name;"
                            >
                            <ul x-show="open" x-data="" class="max-h-40">
                                <template x-for="(item, index) in options" :key="index">
                                    <li x-on:click="selectOption(index)" class="py-2 px-4 hover:bg-blue-100" :class="selectedOptions.includes(index) ? 'bg-green-200' : ''">
                                        <span x-html="item.first_name"></span>
                                        <span x-html="item.last_name"></span>
                                        {{-- <span x-html="item.first_name"></span> --}}
                                    </li>
                                </template>
                            </ul>
                        </div>
                </div>
            </div>
            <button type="submit" class="w-full mt-4 rounded py-1 px-2 bg-green-500 text-white">Submit</button>
        </form>
        @endif
    </x-modal-basic>
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('modelSearch', () => ({
            query: '',
            data: {},
            options: {},
            open: false,
            placeholder: 'Search',
            selected: -1,
            selectedOptions: [],
            closeListbox() {
                this.open = false;
            },
            async fetch() {
                fetch('/api/person/search', {
                    method: "POST",
                    headers:  {
                        "Content-Type": "application/json",
                        "Access-Control-Origin": "*",
                    },
                    body:  JSON.stringify({
                        'query': this.query,
                    })
                })
                .then(response => response.json())
                .then((data) => {
                    this.data = data;
                    this.options = data;
                })
                .catch(() => {
                    this.message = 'Ooops! Something went wrong!'
                });
            },
            removeOption(id) {
                this.selectedOptions.splice(this.selectedOptions.indexOf(id), 1);
            },
            search() {
                this.options = this.data;
                this.options = this.options.filter((key, index) => {
                    return this.options[index].first_name.toLowerCase().includes(this.query.toLowerCase()) ||
                        this.options[index].last_name.toLowerCase().includes(this.query.toLowerCase());
                })
            },
            selectOption(index) {
                this.selected = index;
                if (!this.selectedOptions.includes(index)) {
                    this.selectedOptions.push(index);
                }
                this.closeListbox();
            },
            toggleListbox() {
                this.open = !this.open
            }
        }));
    });
</script>