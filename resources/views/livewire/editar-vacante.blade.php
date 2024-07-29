<form class="md:w-1/2 space-y-5" wire:submit.prevent="editarVacante">
    <div>
        <x-input-label for="titulo" :value="__('Título Vacante')" class="uppercase" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Título vacante" />
        @error('titulo')

        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" class="uppercase mb-1" />
        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            wire:model="salario" id="salario">

            <option value="">-- Selecciona un salario --</option>
            @foreach ($salarios as $salario )
            <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach


        </select>
        @error('salario')

        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoría')" class="uppercase mb-1" />
        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            wire:model="categoria" id="categoria">

            <option value="">-- Selecciona una categoría --</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach


        </select>
        @error('categoria')

        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" class="uppercase" />
        <x-text-input id="text" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa" />
        @error('empresa')

        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('último dia para inscribirse')" class="uppercase" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
            :value="old('ultimo_dia')" />
        @error('ultimo_dia')

        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="descripción" :value="__('Descripción Puesto')" class="uppercase mb-1" />
        <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
            wire:model="descripcion" id="descripcion">

        </textarea>
        @error('descripcion')

        <livewire:mostrar-alerta :message="$message" />
        @enderror
        </select>
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*" />
    </div>

    <div class="my-5 w-1/2 ">
        <x-input-label :value="__('Imagen actual')" />
        <img src="{{asset('storage/vacantes/'. $imagen)}}" alt="{{'Imagen vacante ' . $titulo}}">
    </div>



    {{-- <div class="my-5 w-1/2 ">

        @if($imagen)

        <img src="{{ $imagen->temporaryUrl() }}">
        @endif
    </div> --}}

    @error(' imagen_nueva')
    <livewire:mostrar-alerta :message="$message" />
    @enderror
    </select>

    <div>
        <x-primary-button>Editar Vacante</x-primary-button>
    </div>
</form>