<div>

    <livewire:filtrar-vacantes />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">

            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">
                Nuestras vacantes disponibles
            </h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">

                @forelse ($vacantes as $vacante)
                <div
                    class="md:flex md:justify-between md:items-center py-6  border-b file:p-3 shadow-sm xm:items-center ">
                    <div class="md:flex-1">
                        <a href="{{route('vacantes.show', $vacante->id)}}"
                            class="text-3xl font-extrabold text-gray-600">
                            {{$vacante->titulo}}
                        </a>
                        <p class="text-sm text-gray-600 mb-2 mt-2">{{$vacante->empresa}} </p>
                        <p class="text-sm text-gray-600"><span>Último dia para inscribirse:
                            </span>{{$vacante->ultimo_dia}} </p>
                    </div>
                    <div class="mt-5 md:mt-0 ">
                        <a href="{{route('vacantes.show', $vacante->id)}}"
                            class="border p-2 bg-indigo-500 text-sm text-white font-bold rounded-lg block text-center">Ver
                            vacante</a>
                    </div>
                </div>
                @empty
                <p class="p-3 text-center text-sm text-gray-600"> No hay vacantes disponibles</p>
                @endforelse

            </div>
        </div>
    </div>
</div>