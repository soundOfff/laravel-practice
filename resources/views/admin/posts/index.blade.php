<x-layout>

    <h1 class="text-lg font-bold mb-8 pb-2 border-b">Manage Posts!</h1>


    <div class="flex w-full">
        <aside class="w-48">
            <h4 class="font-semibold text-md">Links</h4>
            <ul>
                <li>
                    <a href="/admin/dashboard" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All
                        posts</a>
                </li>
                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">Create
                        a post</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-table>

            </x-table>
        </main>
    </div>





</x-layout>
