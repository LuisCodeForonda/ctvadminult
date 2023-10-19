<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="relative overflow-x-auto">
        <div class="flex flex-row gap-4 items-center p-2">
            <input type="text" wire:model.live="search"
                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar...">
            <select id="countries" wire:model.live="paginado"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-auto dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="5"> 5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <div class="grow"></div>
            <x-primary-button wire:click.prevent="new()">{{ __('Nuevo')}}</x-primary-button>
            @if ($modal)
                @include('forms.programacion-form', ['title' => 'Formulario de programación', 'id' => $id])
            @endif
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 my-2">
            @if (count($data) >= 1)
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Titulo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Hora
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Horario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr wire:key="{{ $item->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->titulo }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->hora }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->horario == 'A')
                                    Lunes a viernes
                                @elseif($item->horario == 'B')
                                    Sabados
                                @else
                                    Domingos
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" wire:click="edit({{ $item->id }})" class="focus:outline-none font-bold text-blue-600 mr-2 hover:text-blue-700 hover:underline hover:underline-offset-2">Editar</button>
                                <button type="button" wire:click="deleteId({{ $item->id }})" class="focus:outline-none font-bold text-red-600 hover:text-red-700 hover:underline hover:underline-offset-2">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <p class="text-center mt-4">No tienes registros</p>
            @endif
        </table>
        <div class="">
            {{ $data->links() }}
        </div>
    </div>
    @if ($modal_confirmation)
        @include('components.modal-confirmation')
    @endif
</div>
