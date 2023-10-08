<x-form-layout :$title :$id>
    
    <div class="grid grid-cols-2 mb-4">
        <div class="">
            <p class="font-bold">Nombre</p>
            <p class="block mt-1 w-full">{{ $name }}</p>
        </div>
        <div class="">
            <p class="font-bold">Email</p>
            <p class="block mt-1 w-full">{{ $email }}</p>
        </div>
    </div>

    <p class="font-bold my-4">Lista de roles</p>
    
    @foreach($roles as $role)
        <div class="flex items-center mb-4">
            <input id="{{ $role }}" type="checkbox" wire:model="selectedRoles" value="{{ $role }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="{{ $role }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role }}</label>
        </div>
    @endforeach

</x-form-layout>