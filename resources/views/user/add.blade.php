<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="p-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <x-bladewind::alert type="warning">
            Upload image is not yet supported.
        </x-bladewind::alert>
    </div>


    <div class="">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <x-bladewind::card>

                    <form method="post" action="{{ url('/add') }}" class="signup-form" enctype="multipart/form-data">
                        @csrf

                        <h1 class="my-2 text-2xl font-light text-blue-900/80">New Product</h1>
                        <p class="mt-3 mb-6 text-sm text-blue-900/80">
                            This is a form to add a new product.
                        </p>

                        <div class="p-2">
                            <x-input class="w-full p-2" name="product_name" required="true" placeholder="Product Name"
                                error_message="" />
                        </div>

                        <div class="p-2">
                            <select
                                class="w-full p-2 text-gray-500 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                name="category">
                                <option>Select Category</option>
                                <option value="meal">Meal</option>
                                <option value="drink">Drink</option>
                                <option value="snack">Snack</option>
                            </select>
                        </div>

                        <div class="flex gap-4 p-2">

                            <x-input class="w-full" name="price" required="true" placeholder="Price" numeric="true" />

                            <x-input class="w-full" name="quantity" required="true" placeholder="Quantity"
                                numeric="true" />

                        </div>

                        <div class="p-2">
                            <x-bladewind::filepicker class="w-full p-2" name="upload_image"
                                placeholder="Upload an image" accepted_file_types=".jpg, .png" />
                        </div>

                        <div class="text-center">

                            <x-bladewind::button name="btn-save" has_spinner="true" type="primary" can_submit="true"
                                class="block mx-auto" radius="small" onsubmit="alert('New product has been added.')">
                                Add to Products
                            </x-bladewind::button>

                        </div>

                    </form>

                </x-bladewind::card>
            </div>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>
