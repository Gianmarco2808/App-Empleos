<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-xl font-semibold my-4">Postular a esta vacante</h3>
    @if (session()->has('mensaje'))
        <p class="text-green-600 font-bold p-2 my-3 text-sm">
            {{session('mensaje')}}
        </p>
    @else
        <form wire:submit.prevent="postularme" class="w-4/6 mt-2 md:flex md:justify-between">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o hoja de vida')" />
                <x-text-input id="cv" class="block mt-1 w-full" type="file" wire:model="cv" accept=".pdf" />
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>
            <div class="text-center">
                <x-primary-button class="my-5 h-9">
                    Postularme
                </x-primary-button>
            </div>
        </form>  
    @endif
</div>
