<x-form-layout :$title :$id>
    <div class="">
        <x-input-label for="titulo" :value="__('Titulo')" />
        <x-text-input id="titulo" wire:model="titulo" class="block mt-1 w-full" type="text" name="titulo" autofocus autocomplete="titulo" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
</x-form-layout>