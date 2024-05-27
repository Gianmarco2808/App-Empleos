<div>

    <livewire:filtrar-vacantes />

    <div class="py-12">
        <div class="max-w-7xl mx-auto ">
            <h3 class="font-extrabold text-2xl text-gray-700 mb-12">Nuevas vacantes disponibles</h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y mt-8 divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-extrabold text-gray-600">{{$vacante->titulo}}</a>
                            <p class="text-base text-gray-600 mb-1">{{$vacante->empresa}}</p>
                            <p class="text-xs text-gray-600 mb-1">{{$vacante->salario->salario}}</p>
                            <p class="text-xs text-gray-600 mb-3">Ultimo dia para postular: <span class="font-normal">{{$vacante->ultimo_dia->format('d-m-Y')}}</span></p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a href="{{route('vacantes.show', $vacante->id)}}" class="font-bold text-sm p-3 border rounded">Ver vacante</a>
                        </div>    
                    </div>
                @empty
                    <p class="text-sm p-3 text-center text-gray-600">No hay vacantes aun</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
