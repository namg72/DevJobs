<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de correo electrónico
        haciendo clic en el
        enlace que te acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste
        durante el
        registro.') }}
    </div>
    @endif

    <div class="mt-4 flex items-center justify-between">

        <form method="POST" action="{{ route('logout') }}" novalidate>
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Cerrar sesión') }}
            </button>
        </form>
    </div>
    <form method="POST" action="{{ route('verification.send') }}" novalidate>
        @csrf

        <div>
            <x-primary-button class="mt-3 bg-indigo-600 hover:bg-indigo-800 hover:shadow-lg justify-center w-full">
                {{ __('Reenviar email de verificación') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>