<div>
    {{-- Do your work, then step back. --}}
    <div class="relative overflow-x-auto">
        <div class="flex flex-row gap-4 items-center px-2">
            <input type="text" wire:model.live="search"
                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar...">
            <select id="countries" wire:model.live="paginado"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-auto dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="5"> 5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="25">50</option>
            </select>
            <div class="grow"></div>
            <button type="button"
                wire:click.prevent="crear()" class=" text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuevo</button>
            @if ($modal)
                @include('forms.user-form')
            @endif
            
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 my-2">
            @if (count($data) >= 1)
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Habilitado
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
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->email }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status == 1)
                                    <button type="submit" wire:click="change({{ $item->id }})"><img src="{{ asset('icons/bxs-check-circle.svg')}}" alt=""></button>
                                @else
                                    <button type="submit" wire:click="change({{ $item->id }})"><img src="{{ asset('icons/bxs-x-circle.svg')}}" alt=""></button>
                                @endif
                            </td>
                            
                            <td class="px-6 py-4">
                                <button type="button" wire:click="delete({{ $item->id }})" class="focus:outline-none text-red-600 hover:text-red-700 font-bold">Eliminar</button>
                                
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

</div>
