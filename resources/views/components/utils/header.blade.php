<nav
    class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white shadow sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0">
        <a href="/" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark">LogoHome</a>
    </div>
    <div>
        @auth
            <a href="#" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Welcome,
                {{ auth()->user()->name }}</a>

            <a href="#" class=" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2"">
                <form action="/logout" method="post" class="text-sm font-semibold text-blue-500 ml-6">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
            </a>
        @else
            <a href="/login" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Login</a>
            <a href="/register" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Register</a>

            {{-- <a href="/admin/posts/create" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Create a
                new post
            </a>
            <a href="/admin/posts" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">
                View posts
            </a> --}}



        @endauth

    </div>
</nav>
