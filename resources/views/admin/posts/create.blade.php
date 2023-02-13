<x-layout>
    <section class="px-6 py-8 w-3/4">
        <h2 class="font-bold text-2xl">
            Admin Panel to create a Post
        </h2>
        <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
            <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-6">
                    <input type="text" name="title"
                        class="form-control block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleInput7" placeholder="Title" />
                </div>

                <div class="form-group mb-6">
                    <label name="thumbnail" class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                        file</label>
                    <input
                        class="p-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
                        name="thumbnail" id="file_input" type="file">
                </div>

                <div class="form-group mb-6">
                    <input type="text" name="slug"
                        class="form-control block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="slug" placeholder="Slug" />
                </div>


                <div class="form-group mb-6">
                    <textarea
                        class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      "
                        id="exampleFormControlTextarea13" rows="3" placeholder="Excerpt" name="excerpt"></textarea>
                </div>
                <div class="form-group mb-6">
                    <textarea
                        class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      "
                        id="exampleFormControlTextarea13" rows="3" placeholder="Body" name="body"></textarea>
                </div>

                <div class="form-group form-check text-center mb-6 flex items-center justify-center flex-col space-y-4">
                    <label class="form-check-label inline-block text-gray-800" for="category_id">Category</label>
                    <select
                        class="form-select appearance-none
                                block
                                w-1/2
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example" name="category_id">
                        @foreach (App\Models\Category::all() as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group form-check text-center mb-6">
                    <input type="checkbox"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                        id="exampleCheck87" checked />
                    <label class="form-check-label inline-block text-gray-800" for="exampleCheck87">Send me the link of
                        the post
                        this message</label>
                </div>
                <button type="submit"
                    class="
                    w-full
                    px-6
                    py-2.5
                    bg-blue-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">
                    Send</button>
            </form>
        </div>
    </section>
</x-layout>
