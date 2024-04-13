<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Products') }}
            </h2>
        </div>
    </x-slot>

    <!-- Notif. -->
    @if (session('success'))
        <div class="pt-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-bladewind::alert type="success">
                {{ session('success') }}
            </x-bladewind::alert>
        </div>
    @endif

    <!-- Body -->
    <div class="p-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-bladewind::tab-group name="categories">

                    <!-- Tabs -->
                    <x-slot name="headings">
                        <x-bladewind::tab-heading name="category-1" active="true" label="All" />

                        <x-bladewind::tab-heading name="category-2" label="Meals" />

                        <x-bladewind::tab-heading name="category-3" label="Drinks" />

                        <x-bladewind::tab-heading name="category-4" label="Snacks" />
                    </x-slot>

                    <!-- Tab Content -->
                    <x-bladewind::tab-body>

                        <x-bladewind::tab-content name="category-1" active="true">
                            <div
                                class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
                                @foreach ($allProducts as $product)
                                    <div class="flex items-center justify-between p-4 border rounded-md">
                                        <div>
                                            <b>{{ $product->name }}</b>
                                            <div class="text-sm">PHP {{ $product->price }}</div>
                                        </div>
                                        <div>
                                            <p class="btn-holder">
                                                <a class="px-4 py-2 text-white bg-blue-500 rounded"
                                                    href="{{ route('addItem.to.cart', $product->id) }}">
                                                    Add to Cart
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </x-bladewind::tab-content>

                        <x-bladewind::tab-content name="category-2">
                            <div
                                class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
                                @foreach ($allProducts as $product)
                                    @if (Str::contains($product->category, 'meal'))
                                        <div class="flex items-center justify-between p-4 border rounded-md">
                                            <div>
                                                <b>{{ $product->name }}</b>
                                                <div class="text-sm">PHP {{ $product->price }}</div>
                                            </div>
                                            <div>
                                                <p class="btn-holder">
                                                    <a class="px-4 py-2 text-white bg-blue-500 rounded"
                                                        href="{{ route('addItem.to.cart', $product->id) }}">
                                                        Add to Cart
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </x-bladewind::tab-content>

                        <x-bladewind::tab-content name="category-3">
                            <div
                                class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
                                @foreach ($allProducts as $product)
                                    @if (Str::contains($product->category, 'drink'))
                                        <div class="flex items-center justify-between p-4 border rounded-md">
                                            <div>
                                                <b>{{ $product->name }}</b>
                                                <div class="text-sm">PHP {{ $product->price }}</div>
                                            </div>
                                            <div>
                                                <p class="btn-holder">
                                                    <a class="px-4 py-2 text-white bg-blue-500 rounded"
                                                        href="{{ route('addItem.to.cart', $product->id) }}">
                                                        Add to Cart
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </x-bladewind::tab-content>

                        <x-bladewind::tab-content name="category-4">
                            <div
                                class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
                                @foreach ($allProducts as $product)
                                    @if (Str::contains($product->category, 'snack'))
                                        <div class="flex items-center justify-between p-4 border rounded-md">
                                            <div>
                                                <b>{{ $product->name }}</b>
                                                <div class="text-sm">PHP {{ $product->price }}</div>
                                            </div>
                                            <div>
                                                <p class="btn-holder">
                                                    <a class="px-4 py-2 text-white bg-blue-500 rounded"
                                                        href="{{ route('addItem.to.cart', $product->id) }}">
                                                        Add to Cart
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </x-bladewind::tab-content>

                    </x-bladewind::tab-body>

                </x-bladewind::tab-group>
            </div>
        </div>
    </div>

    <!-- Receipt -->
    <div class="p-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-bladewind::card title="cart details">
                    <x-bladewind::table>
                        <x-slot name="header">
                            <th>Product</th>
                            <th>Price</th>
                            <th>Total</th>
                        </x-slot>

                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <tr rowId="{{ $id }}">
                                    <td>{{ $details['name'] }}</td>

                                    <td>PHP {{ $details['price'] }}</td>

                                    <td data-th="Subtotal" class="text-center"></td>
                                    <td class="actions">
                                        <a class="btn btn-outline-danger btn-sm delete-product"><i
                                                class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-right">
                                    <button class="btn btn-danger">Checkout</button>
                                </td>
                            </tr>
                        </tfoot>
                    </x-bladewind::table>
                </x-bladewind::card>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(".edit-cart-info").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update.shopping.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId"),
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".delete-product").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
</x-app-layout>
