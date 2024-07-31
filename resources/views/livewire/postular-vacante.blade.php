<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-cente text-2xl font-bold my-4">Inscibirse en esta vacante</h3>

    {{-- Mostramos el mensaje de la sesion cuando se ha inscrito en la vacante --}}
    @if (session()->has('mensaje'))
    <p class="uppercase border border-green-600 bg-green-100 text-grey-600 font-bold p-2 my-5 rounded">
        {{session('mensaje')}}
    </p>


    @else

    <form wire:submit.prevent='inscribirse' class="w-96 mt-5">

        <div class="mb-4 ">
            <x-input-label for="cv" :value="__('Curriculum Vitae (PDF)')" />
            <x-text-input id="cv" type="file" accept=".pdf" class="block mt-1 w-full" wire:model='cv' />
        </div>

        @error('cv')
        <livewire:mostrar-alerta :message="$message">

            @enderror


            <p>Ya te has inscriot</p>


            <x-primary-button class="my-5">
                {{__('Inscribirse')}}
            </x-primary-button>

    </form>



    @endif
</div>