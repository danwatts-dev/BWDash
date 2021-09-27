<x-layout>
    Show a lead
    <section class="h-screen">
            <header class="flex items-baseline">
                <h1 class="text-3xl mr-4">{{ $lead->name }}</h1>
            </header>
            <x-element.action-button href="{{ route('applicant.create', ['person_id' => $lead->person_id]) }}">Make Application</x-element.action-button>

    </section>

</x-layout>

