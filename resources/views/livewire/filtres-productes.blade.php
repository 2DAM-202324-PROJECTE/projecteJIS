<!-- resources/views/livewire/product-filters.blade.php -->

<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <h2 class="font-bold mb-2">Filters</h2>
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Minimum Price</label>
        <input type="number" wire:model="minPrice" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
    </div>
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Maximum Price</label>
        <input type="number" wire:model="maxPrice" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
    </div>
    <button wire:click="applyFilters" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">Apply Filters</button>
</div>
