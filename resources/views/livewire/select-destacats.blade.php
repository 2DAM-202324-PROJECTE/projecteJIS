<div class="m-10">
    @foreach ($categories as $category)
        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-4">Seleccionar productos destacados para {{ $category->name_category }}</h2>

            <form action="{{ route('updateFeaturedProducts') }}" method="POST">
                @csrf

                <input type="hidden" name="category_id" value="{{ $category->id }}">

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="featured1" class="block mb-2 text-sm font-medium text-gray-900">Destacado 1:</label>
                        <select name="featured1" id="featured1" class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Ninguno...</option>
                            @foreach ($category->products as $product)
                                <option value="{{ $product->id }}" {{ $product->featured == 1 ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="featured2" class="block mb-2 text-sm font-medium text-gray-900">Destacado 2:</label>
                        <select name="featured2" id="featured2" class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Ninguno...</option>
                            @foreach ($category->products as $product)
                                <option value="{{ $product->id }}" {{ $product->featured == 2 ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    @endforeach
</div>
