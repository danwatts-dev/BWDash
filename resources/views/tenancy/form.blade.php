<x-layout>
    <header class="my-4 flex items-center justify-between max-w-4xl"><h1 class="text-2xl">Create a new tenancy</h1><x-element.action-button href="{{ url()->previous() }}" color="red">Cancel</x-element.action-button></header>
    <form action="{{ route('tenancy.store') }}" method="POST" class="max-w-4xl flex flex-col space-y-6 px-24">
        @csrf
        <div class="flex flex-col space-y-2 mb-4 bg-white p-4 rounded">
            <x-field.select disabled="{{$applicants->isEmpty()}}" name="person_id" label="Applicant" label-position="left">
                @foreach ($applicants as $applicant)
                    <x-field.option value="{{ $applicant->person->id }}">{{ $applicant->name }}</x-field.option>
                @endforeach
            </x-field.select>
            @if ($applicants->isEmpty())
                <small class="ml-36">You need to <a href="#" class="text-blue-500">add an applicant</a> before creating a tenancy</small>
            @endif
        </div>
        <div class="flex flex-col space-y-2 mb-4 bg-white p-4 rounded">
            <x-field.select  name="unit_id" label="Unit" label-position="left">
                    <x-field.option selected value="">-</x-field.option>
                @foreach ($units as $unit)
                    <x-field.option
                        selected="{{ $unit_id == (string)$unit->id }}" value="{{ $unit->id }}">{{ $unit->property->reference.' - '.$unit->unit_name }}
                    </x-field.option>
                @endforeach
            </x-field.select>
        </div>
        <div class="flex flex-col space-y-2 mb-4 bg-white p-4 rounded">
            <x-field.select  name="term_in_months" label="Term" label-position="left">
                @foreach ($term_lengths as $term_length)
                    <x-field.option
                        value="{{ $term_length }}">
                        <span>{{ $term_length.' months' }}</span>
                    </x-field.option>
                @endforeach
            </x-field.select>
        </div>
        <x-field.input type="submit" name="submit" class="bg-green-500 text-white hover:bg-green-600 cursor-pointer"/>
        @if ($errors->any())
        <div>{{ $errors }}</div>
        @endif
    </form>
</x-layout>