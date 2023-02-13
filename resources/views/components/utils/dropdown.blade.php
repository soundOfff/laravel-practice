@props(['categories', 'currentCategory'])

<div x-data="{ show: false }" class="">
    <button @click="show = !show">{{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}</button>
    <div x-show="show" class="category-container">
        <a class="category-item" href="/">
            All
        </a>
        @foreach ($categories as $category)
            <a class="category-item" href="/?category={{ $category->slug }}" {{-- :active="request() - > is('*', $category - > slug)" --}}>
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>
