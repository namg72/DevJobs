<form class="mdw-1/2 space-y-5">
    <div>
        <x-input-label for="titulo" :value="__('Título Vacante')" class="uppercase" />
        <x-text-input id="email" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')"
            placeholder="Título vacante" />
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" class="uppercase mb-1" />
        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            name="salario" id="salario">

            <option value="">-- Selecciona un salario --</option>
            @foreach ($salarios as $salario )
            <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach


        </select>
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoría')" class="uppercase mb-1" />
        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            name="categoria" id="categoria">

            <option value="">-- Selecciona una categoría --</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach


        </select>
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" class="uppercase" />
        <x-text-input id="text" class="block mt-1 w-full" type="text" name="empresa" :value="old('empresa')"
            placeholder="Empresa" />
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('último dia para inscribirse')" class="uppercase" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" name="ultimo_dia"
            :value="old('ultimo_dia')" />
    </div>
    <div>
        <x-input-label for="descripción" :value="__('Descripción Puesto')" class="uppercase mb-1" />
        <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
            name="descripcion" id="descripcion">

        </textarea>

        </select>
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" class="uppercase" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" placeholder="Imagen" />
    </div>

</form>