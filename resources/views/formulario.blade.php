<x-layouts.web>
    <div class="overflow-hidden text-center" style="background-color:#000;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
    <div class="container pt-5">
        <span class="my-3 text-center">
            <p>¿Te gustaría recibir propuestas e informaciones exclusivas de nuestra campaña en tu WhatsApp?</p>
            <p>Registrate ahora y seguí las instrucciones, es fácil y rápido:</p>
        </span>
        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="my-2 col-11 col-md-6">
                <form action="{{ route('whatsapp') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <select name="pais" id="pais" class="form-select" style="max-width:180px">
                            <option value="595" selected>Paraguay</option>
                            <option value="54">Argentina</option>
                            <option value="55">Brasil</option>
                            <option value="56">Chile</option>
                            <option value="591">Bolivia</option>
                            <option value="1">EEUU</option>
                        </select>
                        <input type="text" aria-label="Last name" class="form-control"
                            placeholder="Tu número sin el cero Ej: 981 123 456" id="nrotelefono" name="telefono">
                    </div>
                    <div class="collapse" id="masdatos">
                        <div class="accordion-item">
                            <div class="input-group my-2">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" aria-label="Nombre" class="form-control" placeholder="Nombre"
                                    name="nombre">
                            </div>
                            <div class="input-group my-2">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" aria-label="Apellido" class="form-control" placeholder="Apellido"
                                    name="apellido">
                            </div>
                            <div class="input-group my-2">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="cinro" aria-label="cinro" class="form-control"
                                    placeholder="N° de cédula">
                            </div>
                            <div class="input-group my-2">
                                <span class="input-group-text"><i class="fa-solid fa-genderless"></i></span>
                                <select name="sexo" id="select" class="form-control">
                                    <option value="">Selecciona tu sexo</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="otro">Prefiero no decir</option>
                                </select>
                            </div>
                            <div class="input-group my-2">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                <select name="ciudad" id="ciudad" class="form-control" name="ciudad">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 text-center">
                        <button class="btn btn-secondary" type="button" id="seguir_btn">Seguir <i
                                class="fa-regular fa-hand-point-right"></i></button>
                        <button class="btn btn-secondary hidden" type="submit" id="validar_btn">Validar <i
                                class="fa-brands fa-whatsapp"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            $(document).ready(function() {
                cargarCiudades()
            });

            function cargarCiudades() {
                var pais = $('#pais').val();
                var container_ciudad = $('#ciudad');
                $.ajax({
                    url: "{{ asset('datos/ciudades.json') }}",
                    type: "POST",
                    success: function(data) {
                        data.forEach(element => {
                            container_ciudad.append('<option value="' + element.name + '">' + element.name +
                                '</option>')
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            $("#seguir_btn").on('click',function(e) {
                if ($("#nrotelefono").val() == "") {
                    alert("Ingrese su número de teléfono")
                    const bsCollapse = new bootstrap.Collapse('#masdatos', {
                        toggle: false
                    })
                    return false
                }
                const bsCollapse = new bootstrap.Collapse('#masdatos', {
                    toggle: true
                })
                $('#seguir_btn').addClass('hidden');
                $('#validar_btn').removeClass('hidden');
            });
        </script>
    @endsection
</x-layouts.web>
