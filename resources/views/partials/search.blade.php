<form method="POST" action="{{ $searchRoute }}" id="search-form">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="query" placeholder="Search..." id="searchInput" autocomplete="off">
    </div>
</form>
<div class="search-results"></div>
