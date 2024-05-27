<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @if (count($vacantes) > 0)
            @foreach ($vacantes as $vacante)
                <div class="p-6 text-gray-900 border-b border-gray-200 md:flex md:justify-between md:items-center">
                    <div class="space-y-3">
                        <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-semibold">{{$vacante->titulo}}</a>
                        <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
                        <p class="text-sm text-gray-600 font-bold">{{$vacante->salario->salario}}</p>
                        <p class="text-sm text-gray-500">Ultimo dia: {{ $vacante->ultimo_dia->format('d-m-Y') }}</p>
                    </div>
                    <div class="flex gap-2 items-center mt-4 md:mt-0">
                        <a href="{{route('candidatos.index', $vacante->id)}}" class="hover:bg-gray-600 flex justify-center items-center gap-1 hover:text-white text-gray-600 py-1 px-2 rounded-lg text-xs font-bold">
                            <p class="text-sm">{{$vacante->candidatos->count()}}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </a>
                        <a href="{{route('vacantes.edit', $vacante->id)}}" class="hover:bg-blue-600 hover:text-white text-blue-600 py-1 px-2 rounded-lg text-xs font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>    
                        </a>
                        <button wire:click="$dispatch('mostrarAlerta',{{$vacante->id}})" class="hover:bg-red-600 hover:text-white text-red-600 py-1 px-2 rounded-lg text-xs font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg> 
                        </button>
                    </div>
                </div>
            @endforeach
        @else
        <p class="text-center m-3 text-sm text-gray-600">No tienes vacantes</p>
        @endif
    </div>
    <div class="pb-6 px-3 mt-5">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', (vacanteId) => {
                Swal.fire({
                    title: '¿Eliminar Vacante?',
                    text: "Una Vacante eliminada no se puede recuperar.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('eliminarVacante',vacanteId);
                        Swal.fire({
                            title: 'Se eliminó la Vacante',
                            text: 'Eliminado correctamente',
                            icon: 'success',
                            timer: 3000
                        });
                    }
                })
 
            });
        });
    </script>
@endpush


