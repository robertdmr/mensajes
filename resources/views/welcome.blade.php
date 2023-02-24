<x-layouts.web>
    <div class="overflow-hidden text-center" style="background-color:#000;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
    <div class="container pt-5 text-center">
        <span class="my-3">
            <p>¿Te gustaría recibir propuestas e informaciones exclusivas de nuestra campaña en tu WhatsApp?</p>
            <p>Registrate ahora y seguí las instrucciones, es fácil y rápido:</p>
        </span>
        <a href="{{route('formulario')}}" class="btn btn-secondary">Seguir <i class="fa-regular fa-thumbs-up"></i></a>

    </div>
</x-layouts.web>
