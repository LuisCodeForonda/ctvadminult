<div class="absolute top-0 left-0 w-full h-full z-10 flex justify-center items-center bg-slate-950/50">
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->

    
    <div class="relative bg-white p-8 rounded-md">
        <div class="absolute top-2 right-2"><button wire:click="closeModalConfimation()" class="px-2 py-2 rounded-md hover:bg-gray-300"><svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg></div>

        <h5 class="text-2xl font-medium text-center">Eliminar Confirmar</h5>
        
        <div class="text-center">
            <p>¿Estás seguro de que quieres eliminar?</p>
            <svg class="mx-auto my-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        </div>
        <div class="flex flex-row gap-2 justify-center">
            <x-secondary-button wire:click="closeModalConfimation()">{{ __('Cerrar')}}</x-secondary-button>
            <x-danger-button wire:click.prevent="delete()">{{ __('Si, eliminar')}}</x-danger-button>
        </div>
    </div>
</div> 
