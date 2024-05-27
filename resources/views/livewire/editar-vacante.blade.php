<form class="md:w-9/12 space-y-5" novalidate wire:submit.prevent="editVacante">
    <div class="flex flex-wrap -mx-2">
        <div class="w-full md:w-1/2 px-2 mb-2">
            <div class="space-y-2">
                <x-input-label for="titulo" :value="__('Titulo de la vacante')" />
                <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>
        </div>

        <div class="w-full md:w-1/2 px-2 mb-2">
            <div class="space-y-2">
                <x-input-label for="salario" :value="__('Salario mensual')" />
                <select wire:model="salario" id="salario" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    @foreach ($salarios as $salario)
                        <option value="{{$salario->id}}">{{$salario->salario}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('salario')" class="mt-2" />
            </div>
        </div>
    </div>

    <div class="flex flex-wrap -mx-2">
        <div class="w-full md:w-1/2 px-2 mb-3">
            <div class="space-y-2">
                <x-input-label for="categoria" :value="__('Categoria')" />
                <select wire:model="categoria" id="categoria" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
            </div>
        </div>

        <div class="w-full md:w-1/2 px-2 mb-2">
            <div class="space-y-2">
                <x-input-label for="empresa" :value="__('Empresa')" />
                <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
            </div>
        </div>
    </div>

    <div class="flex flex-wrap -mx-2 mb-2">
        <div class="w-full px-2">
            <div class="space-y-2">
                <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postular')" />
                <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
            </div>
        </div>
    </div>

    <div class="flex flex-wrap -mx-2 mb-2">

        <div class="w-full md:w-1/2 px-2 mb-3">
            <div class="space-y-2 ">
                <x-input-label for="imagen" :value="__('Imagen')" />
                <x-text-input id="imagen_nueva" accept="image/*" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" required autofocus autocomplete="username" />
                <div class="my-5 w-1/3">
                    <img src="{{asset('storage/vacantes/'.$imagen)}}" alt="{{$titulo}}">
                </div>
                <x-input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />
            </div>
            <div class="my-5 w-80">
                @if ($imagen_nueva)
                    <img class="" src="{{$imagen_nueva->temporaryUrl()}}" alt="">
                @endif
            </div>
        </div>

        <div class="w-full md:w-1/2 px-2">
            <div class="space-y-2">
                <x-input-label for="descripcion" :value="__('Descripcion del puesto')" />
                <textarea wire:model="descripcion" id="descripcion" cols="30" rows="7" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <x-primary-button class="">
            {{ __('Guardar cambios') }}
        </x-primary-button>
    </div>
</form>