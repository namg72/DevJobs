<div>



    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante )
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-3">
                <a href="#" class="text-xl font-bold">
                    {{$vacante->titulo}}
                </a>
                <p class="text-gray-600 font-bolt">{{$vacante->empresa}}</p>
                <p class="text-gray-500 font-bolt text-sm">Último dia: {{$vacante->ultimo_dia}}</p>
            </div>
            <div class="flex  flex-col md:flex-row items-stretch gap-3 items-center mt-5 md:mt-0">

                <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white font-bold uppercase text-center">
                    Candidatos
                </a>
                <a href="#" class="bg-blue-800 py-2 px-4 rounded-lg text-white font-bold uppercase text-center">
                    editar
                </a>
                <a href="#" class="bg-red-600 py-2 px-4 rounded-lg text-white font-bold uppercase text-center">
                    eliminar
                </a>
            </div>
        </div>



        @empty
        <p class="p-3 text-sm text-gray-600">No hay vacantes que mostrar</p>

        @endforelse
    </div>
</div>



{{-- ME DA ERROR AL FORMATEAR LA FECHA DE ESTA MANERA:
<p class=" text-gray-600 font-bolt">Último dia: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>

Y PONIENDO EN EL MODELO DE VACANTES ESTO

protected $dates = ['ultimo_dia'];
--}}