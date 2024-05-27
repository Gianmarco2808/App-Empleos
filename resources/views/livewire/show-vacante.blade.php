<div class="p-10">
    <div class="mb-5">
        <h3 class="font-semibold text-xl text-gray-600 my-3">
            {{$vacante->titulo}}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-8">
            <p class="font-bold text-sm text-gray-600 my-3">Empresa: <span class="normal-case font-normal">{{$vacante->empresa}}</span></p>
            <p class="font-bold text-sm text-gray-600 my-3">Ultimo dia para postular: <span class="normal-case font-normal">{{$vacante->ultimo_dia->toFormattedDateString()}}</span></p>
            <p class="font-bold text-sm text-gray-600 my-3">Categoria: <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span></p>
            <p class="font-bold text-sm text-gray-600 my-3">Salario: <span class="normal-case font-normal">{{$vacante->salario->salario}}</span></p>
        </div>
        
    </div>
    <div class="md:grid  md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/'.$vacante->imagen)}}" alt="{{$vacante->titulo}}">
        </div>
        <div class="md:col-span-4">
            <h3 class="font-semibold text-xl text-gray-600">Descripcion del puesto</h3>
            <span class="text-sm text-gray-600 normal-case font-normal">{{$vacante->descripcion}}</span>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Deseas aplicar a esta vacante? <a class="font-bold text-indigo-600" href="{{route('register')}}">Obten una cuenta</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot
    
</div>
