<div class="">
    <form class="search" method="GET" action="#">
        @if (request('category'))
            <input type="hidden" class="searchTerm" name="category" placeholder="" value="{{ request('category') }}">
        @endif
        <input type="text" class="searchTerm" name="search" placeholder="What are you looking for?">
    </form>
</div>
