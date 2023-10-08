<x-form-layout :$title :$id>
    <div class="">
        <x-input-label for="titulo" :value="__('Titulo')" />
        <x-text-input id="titulo" wire:model="titulo" class="block mt-1 w-full" type="text" name="titulo" autofocus autocomplete="titulo" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="body" :value="__('body')" />
        {{-- <x-text-input id="body" wire:model="body" class="block mt-1 w-full" type="text" name="body" autofocus autocomplete="body" /> --}}
        <textarea id="message" wire:model="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
        <x-input-error :messages="$errors->get('body')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="fecha" :value="__('Fecha publicación')" />
        <x-text-input id="fecha" wire:model="fecha" class="block mt-1 w-full" type="date"  />
        <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
    </div>
    <div class="relative z-0 w-full mt-4 group">
        <label for="image"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
        <input type="file" wire:model="image" id="image"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="image" required>
        <div class="text-red-600">
            @error('image')
                {{ $message }}
            @enderror
        </div>
        <div class="mt-2">
            <div wire:loading wire:target="image">
                Cargando...
            </div>
            
            {{-- @if ($id)
            <div class="w-full flex justify-center">
                <img src="{{ Storage::url($image) }}"  class="w-48 h-36 object-cover"> 
            </div>
            @endif --}}

            @if ($image)
            <div class="w-full flex justify-center">
                <img src="{{ $image->temporaryUrl() }}" class="w-48 h-36 object-cover">
            </div>
            @elseif($id)
            <div class="w-full flex justify-center">
                <img src="{{ Storage::url($oldImage) }}"  class="w-48 h-36 object-cover"> 
            </div>
            @endif
        </div>
    </div>
    <div class="mt-4">
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select id="categoria" wire:model="categoria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Seleccione una categoria</option>
            @foreach ($categorias as $item)
            <option value={{ $item->id }}>{{ $item->titulo }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
    </div>
    
</x-form-layout>