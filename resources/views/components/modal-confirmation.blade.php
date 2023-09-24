<div class="absolute top-0 left-0 w-full h-full z-10 flex justify-center items-center bg-slate-950/50">
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->

    
    <div class="relative bg-white p-8 rounded-md">
        <div class="absolute top-3 right-4"><button wire:click="closeModalConfimation()"><img src="{{ asset('icons/bx-x.svg')}}" alt=""></button></div>
        <h5 class="text-2xl font-medium text-center">Eliminar Confirmar</h5>
        
        <div class="text-center">
            <p>¿Estás seguro de que quieres eliminar?</p>
            <img src="{{ asset('icons/bx-trash.svg')}}" alt="basura" class="mx-auto py-4">
        </div>
        <div class="flex flex-row gap-1 justify-center">
            <x-secondary-button wire:click="closeModalConfimation()">{{ __('Cerrar')}}</x-secondary-button>
            <x-danger-button wire:click.prevent="delete()">{{ __('Si, eliminar')}}</x-danger-button>
        </div>
    </div>
    
</div>