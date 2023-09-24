<x-form-layout :$title :$id>
    <div class="">
        <x-input-label for="titulo" :value="__('Titulo')" />
        <x-text-input id="titulo" wire:model="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus autocomplete="titulo" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="hora" :value="__('Hora')" />
        <x-text-input id="hora" wire:model="hora" class="block mt-1 w-full" type="time" name="hora" :value="old('hora')" required autofocus />
        <x-input-error :messages="$errors->get('hora')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="horario" :value="__('Horario')" />
        <select id="countries" wire:model="horario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="A" selected>Lunes a Viernes</option>
            <option value="B">Sabado</option>
            <option value="C">Domingo</option>
        </select>
        <x-input-error :messages="$errors->get('horario')" class="mt-2" />
    </div>
</x-form-layout>