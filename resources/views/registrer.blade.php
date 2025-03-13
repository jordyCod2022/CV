<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Únete a Huancavilca - Registro de Candidatos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 42px;
            padding-top: 8px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="flex items-center h-20">
            <div class="flex items-center space-x-4">
                <!-- <img 
                    src="https://cooperativahuancavilca.com/wp-content/uploads/2020/11/logoCOACNH-white.png" 
                    alt="Huancavilca" 
                    class="h-14 w-auto transition-transform duration-200 hover:scale-105"
                > -->
                <div class="border-l border-gray-300 h-10 mx-4"></div>
                <span class="text-[#003399] font-semibold text-lg whitespace-nowrap">
                    Cooperativa de Ahorro y Crédito Huancavilca
                </span>
            </div>
        </div>
    </div>
</nav>

    <!-- Header -->
    <header class="bg-blue-900 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Únete a Nuestro Equipo</h1>
            <p class="text-lg">Forma parte de la familia Huancavilca</p>
        </div>
    </header>

    <!-- Formulario -->
    <div class="container mx-auto px-4 py-8">
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="bg-white shadow-lg rounded-lg p-8">
        <form action="{{ route('candidatos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Información Personal -->
    <h3 class="text-2xl font-semibold text-blue-900 border-b-2 border-yellow-500 pb-2 mb-6">Información Personal</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre <span class="text-red-500">*</span></label>
            <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required maxlength="100">
        </div>
        <div>
            <label for="apellido" class="block text-gray-700 font-medium mb-2">Apellido <span class="text-red-500">*</span></label>
            <input type="text" id="apellido" name="apellido" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required maxlength="100">
        </div>
        <div>
            <label for="email" class="block text-gray-700 font-medium mb-2">Email <span class="text-red-500">*</span></label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required maxlength="100">
        </div>
        <div>
            <label for="telefono" class="block text-gray-700 font-medium mb-2">Teléfono <span class="text-red-500">*</span></label>
            <input type="tel" id="telefono" name="telefono" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required maxlength="20">
        </div>
        <div>
            <label for="fecha_nacimiento" class="block text-gray-700 font-medium mb-2">Fecha de Nacimiento <span class="text-red-500">*</span></label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div>
            <label for="genero" class="block text-gray-700 font-medium mb-2">Género <span class="text-red-500">*</span></label>
            <select id="genero" name="genero" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Seleccionar</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="O">Otro</option>
            </select>
        </div>
        <div>
            <label for="estado_civil" class="block text-gray-700 font-medium mb-2">Estado Civil <span class="text-red-500">*</span></label>
            <select id="estado_civil" name="estado_civil" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Seleccionar</option>
                <option value="soltero">Soltero/a</option>
                <option value="casado">Casado/a</option>
                <option value="divorciado">Divorciado/a</option>
                <option value="viudo">Viudo/a</option>
            </select>
        </div>
    </div>

    <!-- Ubicación -->
    <h3 class="text-2xl font-semibold text-blue-900 border-b-2 border-yellow-500 pb-2 mt-8 mb-6">Ubicación</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="direccion" class="block text-gray-700 font-medium mb-2">Dirección <span class="text-red-500">*</span></label>
            <input type="text" id="direccion" name="direccion" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required maxlength="255">
        </div>
        <div>
            <label for="ciudad" class="block text-gray-700 font-medium mb-2">Ciudad <span class="text-red-500">*</span></label>
            <input type="text" id="ciudad" name="ciudad" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required maxlength="100">
        </div>
        <div>
            <label for="pais" class="block text-gray-700 font-medium mb-2">País <span class="text-red-500">*</span></label>
            <select id="pais" name="pais" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Seleccione un país</option>
                @foreach($paises as $codigo => $pais)
                    <option value="{{ $pais }}">{{ $pais }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="nacionalidad" class="block text-gray-700 font-medium mb-2">Nacionalidad <span class="text-red-500">*</span></label>
            <input type="text" id="nacionalidad" name="nacionalidad" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required maxlength="100">
        </div>
    </div>

    <!-- Perfil Profesional -->
    <h3 class="text-2xl font-semibold text-blue-900 border-b-2 border-yellow-500 pb-2 mt-8 mb-6">Perfil Profesional</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="linkedin" class="block text-gray-700 font-medium mb-2">LinkedIn</label>
            <input type="url" id="linkedin" name="linkedin" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="255">
        </div>
        <div>
            <label for="foto" class="block text-gray-700 font-medium mb-2">Foto</label>
            <input type="file" id="foto" name="foto" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" accept="image/*">
        </div>
        <div>
            <label for="curriculum" class="block text-gray-700 font-medium mb-2">Currículum (PDF) <span class="text-red-500">*</span></label>
            <input type="file" id="curriculum" name="curriculum" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" accept=".pdf" required>
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="text-center mt-8">
        <button type="submit" class="bg-blue-900 text-white px-8 py-3 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500">Enviar Postulación</button>
    </div>
</form>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pais').select2({
                placeholder: "Seleccione un país",
                allowClear: true
            });
        });
    </script>
</body>
</html>