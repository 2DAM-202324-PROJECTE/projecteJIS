<div class="px-4 sm:px-6 lg:px-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            {{--                    <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>--}}
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('addMarques') }}">
                <button type="button"
                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{__("translate.AFEGIR_MARCA_TXT")}}</button>
            </a>
        </div>
    </div>

    <!-- Filtres -->
    <label>
        <select wire:model="orderBy">
            @foreach($marquesColumns as $column)
                <option value="{{ $column }}">{{ ucfirst($column) }}</option>
            @endforeach
        </select>

        <div>
            <button wire:click="loadMarques">Aplicar</button>
        </div>
    </label>


    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        @foreach($marquesColumns as $column)
                            <th scope="col"
                                class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-0">
                                {{ $column }}
                            </th>

                        @endforeach
                        <th scope="col"
                            class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-0">
                            {{__("translate.ACCIONS_TXT")}}
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($marques as $marca)
                        <tr>
                            <!-- Iterem sobre les columnes seleccionades d'abans i llistem sobre elles,
                             en cas de una de les columnes ser category_id o state_id, es mostrarà de manera diferent.-->
                            @foreach($marquesColumns as $column)
                                <!-- Per a mostrar el valor relacionat de category_id i state_id -->

                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $marca->$column }}</td>
                            @endforeach

                            <!-- Botons d'edició i eliminació -->
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                <button wire:click="edit({{$marca->id}})"
                                        class="text-indigo-600 hover:text-indigo-900">
                                    {{ __("translate.EDITAR_TXT") }}
                                </button>
                                <a> | </a>
                                <button class="text-red-600 hover:text-red-900"
                                        wire:click="deleteMarca('{{ $marca->id }}')">
                                    {{ __("translate.ELIMINAR_TXT") }}
                                </button>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>



