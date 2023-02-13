<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-300 p-6 rounded shadow">
            <h1 class="text-center font-bold text-3xl">Register</h1>
            <form action="/register" method="POST" class="">
                @csrf
                <x-utils.form.input name='name'></x-utils.form.input>
                <x-utils.form.input name='email'></x-utils.form.input>
                <x-utils.form.input name='username'></x-utils.form.input>
                <x-utils.form.input name='password' type='password'></x-utils.form.input>
                <div class="mb-4">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        type="submit">Submit</button>
                </div>
            </form>
        </main>
    </section>

</x-layout>
