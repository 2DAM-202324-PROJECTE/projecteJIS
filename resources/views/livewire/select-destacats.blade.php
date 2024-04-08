<div>

    @foreach ($categories as $category)
        <h2>Seleccionar productos destacados para {{ $category->name_category }}</h2>
        <form action="{{ route('updateFeaturedProducts') }}" method="POST" class="m-0">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">

                    @csrf
                    <div class="sm:col-span-3">

                    <label for="featured1" class="block text-sm font-medium leading-6 text-gray-900">Destacado 1:</label>
                        <div class="mt-2">
                        <select name="featured1" id="featured1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">Seleccione...</option>
                            @foreach ($category->products as $product)
                                <option value="{{ $product->id }}" {{ $product->featured == 1 ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select><br>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <div class="mt-2">

                    <label for="featured2"  class="block text-sm font-medium leading-6 text-gray-900">Destacado 2:</label>
                        <select name="featured2" id="featured2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">Seleccione...</option>
                            @foreach ($category->products as $product)
                                <option value="{{ $product->id }}" {{ $product->featured == 2 ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select><br>
                    </div>
                    </div>
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <input type="submit" class="text-sm font-semibold leading-6 text-gray-900" value="Guardar cambios">
                </div>

            </div>
        </form>
        <br>
    @endforeach

</div>
