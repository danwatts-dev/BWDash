<section>create applicant
    {{{ $person->name }}}
    <form action="{{ route('applicant.store', ['person_id' => $person->id]) }}" method="POST">
         @csrf
        <button>Submit</button>
    </form>
</section>