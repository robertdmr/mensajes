<x-layouts.web>
    <div class="row">
        <div class="overflow-hidden text-center" style="background-color:#000;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h2 class="text-center">Gracias por registrarte</h2>
            </div>
        </div>
    </div>

    @section('scripts')
    <script>
        $(document).ready(function () {
            setTimeout(() => {
                window.location.href = "https://api.whatsapp.com/send?phone=595971334270&text=Hola!%20Quiero%20validar%20mis%20datos%20de%20registro."
            }, 300);
        });
    </script>
    @endsection
</x-layouts.web>
