<div class="fixed top-0 left-0 z-10 w-full h-screen p-4 overflow-y-scroll md:inset-0 bg-gray-600/50 flex justify-center items-center"">
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->

    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $title }}
                </h3>
                <div class="absolute top-2 right-2"><button wire:click="cancel()" class="px-2 py-2 rounded-md hover:bg-gray-300"><svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg></div>
        
            </div>
            <!-- Modal body -->
            <div class="p-6">

                <form wire:submit="store">
                
                    {{ $slot }}
                
                    <div class="flex items-center justify-end mt-4">
                        <x-secondary-button wire:click="cancel()" class="ml-4">
                            {{ __('Cancelar') }}
                        </x-secondary-button>
                        <x-primary-button class="ml-4">
                            @if ($id)
                                {{ __('Actualizar') }}
                            @else
                                {{ __('Registar') }}
                            @endif
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

