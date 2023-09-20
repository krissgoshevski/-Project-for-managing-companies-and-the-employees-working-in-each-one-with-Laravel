


<form action="{{ route('company.search') }}" method="POST">
    @csrf
    <input type="text" name="search" placeholder="Search by company name">
    <button type="submit">Search</button>
</form>
