<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title></title>
                <script src="https://kit.fontawesome.com/5fcb685337.js" crossorigin="anonymous"></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <style>
            [x-cloak] { display: none !important; }
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-100 ">
        <x-header/>
        <x-sidebar/>
        <div class="z-0 ml-56 mt-16 p-8">{{ $slot }}</div>
    </body>
    <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('propertyUnitsIndex', (property_id) => ({
            open: false,
            show: false,
            units: {},
            data: {},
            init() {
                fetch(`/api/unit?property_id=${property_id}`, {
                })
                .then(response => response.json())
                .then((data) => {
                    this.units = data;
                })
                .catch(() => {
                    this.data = 'Ooops! Something went wrong!'
                });
            },
            deletePropertyUnit(unit_id) {
                let form = document.querySelector('#delete-property-unit');
                fetch(`/api/unit/`+unit_id, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With':'XMLHttpRequest',
                    },
                })
                .then(response => response.json())
                .then((data) => {
                })
                // reload the units
                this.init();
            },
        }))
    });

    document.addEventListener('alpine:init', () => {
        Alpine.data('addUnit', (property_id) => ({
            open: false,
            formData: {
            },
            unit: {},
            data: {},
            init() {
                fetch('/api/unit/create', {
                })
                .then(response => response.json())
                .then((data) => {
                    this.data = data;
                    this.unit.property_id = property_id;
                })
                .catch(() => {
                    this.data = 'Ooops! Something went wrong!'
                });
            },
            submit() {
                fetch('/api/unit/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With':'XMLHttpRequest',
                    },
                    body: JSON.stringify(this.unit),
                })
                 .then(response => {
                    resStatus = response.status;
                    return response.json();
                })
                .then(response => {
                    switch (resStatus) {
                        case 200:
                            this.open = false;
                            location.reload();
                            break;
                        case 422:
                            // validation fail
                                for ([id, value] of Object.entries(response.errors)) {
                                    document.querySelector(`.error-container[data-for="${id}"]`).innerHTML = value;
                                }
                            break;
                        default:
                            break;
                    }
                })
                .then((data) => {
                })
            }
        }))
    })

    document.addEventListener('alpine:init', () => {
        Alpine.data('create', () => ({
            open: false,
            propertyTypes: {},
            property: {},
            data: {},
            init() {
                fetch('/api/property/create', {
                })
                .then(response => response.json())
                .then((data) => {
                    this.propertyTypes = data.propertyTypes;
                    this.property = data.property;
                    this.data = data;
                })
                .catch(() => {
                    this.data = 'Ooops! Something went wrong!'
                });
            },
            submit() {
                console.log(JSON.stringify(this.property));
                fetch('/api/property/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                         'X-Requested-With':'XMLHttpRequest',
                    },
                    body: JSON.stringify(this.property),
                })
                .then(response => {
                    resStatus = response.status;
                    return response.json();
                })
                .then(response => {
                    switch (resStatus) {
                        case 200:
                            this.open = false;
                            location.reload();
                            break;
                        case 422:
                            // validation fail
                                for ([id, value] of Object.entries(response.errors)) {
                                    console.log(value);
                                    // document.querySelector(`.error-container[data-for="${id}"]`).innerHTML = value;
                                }
                            break;
                        default:
                            break;
                    }
                })
                .then((data) => {
                })
            }
        }))
    })

    document.addEventListener('alpine:init', () => {
        Alpine.data('edit', (id) => ({
            open: false,
            formData: {
            },
            propertyTypes: {},
            property: {},
            data: {},
            init() {
                fetch('/api/property/edit', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({id: id}),
                })
                .then(response => response.json())
                .then((data) => {
                    this.propertyTypes = data.propertyTypes;
                    this.property = data.property;
                    this.data = data;
                })
                .catch(() => {
                    this.data = 'Ooops! Something went wrong!'
                });
            },
            submit() {
                fetch('/api/property/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With':'XMLHttpRequest',
                    },
                    body: JSON.stringify(this.property),
                })
                .then(response => {
                    resStatus = response.status;
                    return response.json();
                })
                .then(response => {
                    switch (resStatus) {
                        case 200:
                            this.open = false;
                            location.reload();
                            break;
                        case 422:
                            // validation fail
                                for ([id, value] of Object.entries(response.errors)) {
                                    document.querySelector(`.error-container[data-for="${id}"]`).innerHTML = value;
                                }
                            break;
                        default:
                            break;
                    }
                })
                .then((data) => {
                })
            }
        }))
    })

    document.addEventListener('alpine:init', () => {
        Alpine.data('unique', (reference) => ({
            formData: {
                reference: reference,
            },
            matches: [],
            submit() {
                if (!this.formData.reference) {
                    this.matches = [];
                    return;
                }
                fetch('/api/property-search', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With':'XMLHttpRequest',
                    },
                    body: JSON.stringify(this.formData),
                })
                .then(response => response.json())
                .then((data) => {
                    this.matches = data;
                })
            },
        }))
    })
</script>
</html>
