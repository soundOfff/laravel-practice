@props(['category'])

<div class="chip">
    <div class="chip-head">{{ strtoupper($category[0]) }}</div>
    <div class="chip-content">{{ $category }}</div>
</div>
