<x-layout>
    <header class="flex items-baseline">
        <h1 class="text-3xl mr-4">{{ $applicant->name }}</h1>
    </header>
    <section class="p-4 rounded bg-white border mb-6">
        <div class="flex justify-between"><span class="text-lg">Checklist</span></div>
        <ul class="px-6 py-2 list-disc">
            @foreach ($applicant->steps as $step)
                <li><span class="mr-2">{{ $step['name']}}</span><i class="text-green-500 fas fa-check"></i></li>
            @endforeach
        </ul>
        <x-element.action-button>Confirm</x-element.action-button>
    </section>

</x-layout>

