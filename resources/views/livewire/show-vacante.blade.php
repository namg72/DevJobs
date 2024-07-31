<div class="p-10">

    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{$vacante->titulo}}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Empresa:

                <spam class=" capitalize font-normal ">
                    {{$vacante->empresa}}
                </spam>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                último dia para inscribirse:

                <spam class=" capitalize font-normal ">
                    {{$vacante->ultimo_dia}}

                    {{-- No funciona la instancia de Carbon para formtear la fecha --}}
                    {{-- {{$vacante->ultimo_dia->toFormattedDateString()}} --}}
                </spam>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Categoria:

                <spam class=" capitalize font-normal ">
                    {{$vacante->categoria->categoria}}
                </spam>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Salario:

                <spam class=" capitalize font-normal ">
                    {{$vacante->salario->salario}}
                </spam>
            </p>
        </div>
        <div class="md:grid md:grid-cols-6 gap-4">

            <div class="md:col-span-2">
                <img src="{{asset('storage/vacantes/' . $vacante->imagen)}}" alt="">
            </div>
            <div class="md:col-span-4 ">
                <h2 class="text-2xl font-bold mb-5">Descripción del puesto
                    <p class="font-normal text-sm text-gray-800">{{$vacante->descripcion}}</p>
                </h2>

            </div>
        </div>
    </div>

    @guest

    <div class="bg-gray-100 p-4 mt-5 text-center text-gray-800">
        <p>¿Deseas inscribirte en esta vacante? <a href="{{route('register')}}" class="text-indigo-600">Registrate y
                podras hacerlo</a></p>
    </div>
    @endguest

    {{-- @can('create', App\Models\Vacante::class)
    <p>Este es un reclutador</p>

    @else

    <livewire:postular-vacante />
    @endcan --}}

    @cannot('create', App\Models\Vacante::class)

    <livewire:postular-vacante :vacante="$vacante" />

    @endcan


</div>
</div>


{{--
las columnas de categoria_ y de salario_id las referenciamo las vamos a sustituir por la referncia
a las tablas Categoria y SAlario que hemos crado en el modelo
--}}


{{-- Con can asociado al policy de create contorlamos que usuaarios pueden ver el formularios y cualrs no ses puede
hacaer con @can o con su negacion @canot--}}