<x-layout>
<header class="my-4 flex items-center justify-between max-w-4xl"><h1 class="text-2xl">Create a new lead</h1><x-element.action-button href="{{ url()->previous() }}" color="red">Cancel</x-element.action-button></header>
    <form action="{{ route('lead.store') }}" method="POST" class="max-w-4xl flex flex-col space-y-6 px-24">
    @csrf
    <x-field.input type="text" name="first_name" value="{{  old('first_name', $lead->person?->first_name) }}" placeholder="First name" errors="true"/>
    <x-field.input type="text" name="last_name" value="{{  old('last_name', $lead->person?->last_name) }}" placeholder="Last name" errors="true"/>
    <x-field.input type="text" name="home_phone" value="{{  old('home_phone', $lead->person?->home_phone) }}" placeholder="Home phone" errors="true"/>
    <x-field.input type="text" name="mobile_phone" value="{{  old('mobile_phone', $lead->person?->mobile_phone) }}" placeholder="Mobile phone" errors="true"/>
    <x-field.input type="text" name="email" value="{{  old('email', $lead->person?->email) }}" placeholder="Email" errors="true"/>
    <x-field.input type="text" name="interests" value="{{  old('interests', $lead->interests) }}" placeholder="Interests" errors="true"/>
    <x-field.input type="submit" name="submit" class="bg-green-500 text-white hover:bg-green-600 cursor-pointer"/>
    @if ($errors->any())
    <div>{{ $errors }}</div>
    @endif
</form>
</x-layout>