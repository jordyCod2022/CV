<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Únete a Huancavilca - Registro de Candidatos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #003399;
            --secondary: #FFD700;
            --accent: #3DB2FF;
        }
        
        body {
            background-color: #f0f5ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .progress-container {
            width: 100%;
            height: 6px;
            background: #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .progress-bar {
            height: 6px;
            background: var(--accent);
            width: 0%;
            border-radius: 4px;
            transition: width 0.3s ease;
        }
        
        .form-step {
            display: none;
        }
        
        .form-step.active {
            display: block;
            animation: fadeIn 0.5s;
        }
        
        .input-animation {
            transition: all 0.3s ease;
        }
        
        .input-animation:focus {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 51, 153, 0.1);
        }
        
        .floating-label {
            position: relative;
        }
        
        .floating-label input:focus + label,
        .floating-label input:not(:placeholder-shown) + label {
            transform: translateY(-24px) scale(0.8);
            color: var(--primary);
        }
        
        .floating-label label {
            position: absolute;
            left: 16px;
            top: 12px;
            transition: all 0.2s ease;
            pointer-events: none;
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 51, 153, 0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), #0051cb);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 51, 153, 0.25);
        }
        
        .select2-container .select2-selection--single {
            height: 48px;
            padding-top: 12px;
            border-radius: 0.5rem;
            border-color: #e2e8f0;
        }
        
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px;
        }
        
        .loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        
        .loader-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid var(--primary);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 2s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .file-upload {
            position: relative;
            overflow: hidden;
            margin-top: 10px;
            border: 2px dashed #ccd;
            border-radius: 0.5rem;
            padding: 25px 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .file-upload:hover {
            border-color: var(--accent);
            background-color: rgba(61, 178, 255, 0.05);
        }
        
        .file-upload input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }
        
        .file-name {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #555;
            display: none;
        }
        
        .field-icon {
            color: var(--primary);
            opacity: 0.7;
        }
        
        .achievement-badge {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px 25px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            transform: translateX(200%);
            transition: transform 0.5s ease;
            z-index: 1000;
        }
        
        .achievement-badge.show {
            transform: translateX(0);
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .shake {
            animation: shake 0.5s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-10">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <div class="text-4xl font-bold text-primary mr-2 animate__animated animate__fadeIn">H</div>
                        <span class="text-primary font-semibold text-lg whitespace-nowrap animate__animated animate__fadeIn">
                            Cooperativa Huancavilca
                        </span>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-baseline space-x-4">
                        <a href="#" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-all duration-200">Inicio</a>
                        <a href="#" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-all duration-200">Nosotros</a>
                        <a href="#" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-all duration-200">Contacto</a>
                        <a href="#" class="bg-primary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-800 transition-all duration-200">Unirse</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header con imagen de fondo -->
    <header class="relative pt-24 pb-12 overflow-hidden bg-gradient-to-r from-blue-900 to-blue-700">
        <div class="absolute inset-0 opacity-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <defs>
                    <pattern id="pattern" width="40" height="40" patternUnits="userSpaceOnUse">
                        <circle cx="20" cy="20" r="2" fill="#fff" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#pattern)" />
            </svg>
        </div>
        <div class="container mx-auto px-4 text-center relative">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white animate__animated animate__fadeInDown">¡Únete a Nuestro Equipo!</h1>
            <p class="text-lg text-blue-100 mb-6 animate__animated animate__fadeIn animate__delay-1s">Forma parte de la familia Huancavilca y construye tu futuro profesional con nosotros</p>
            <div class="max-w-lg mx-auto">
                <div class="flex items-center justify-center space-x-2 text-white animate__animated animate__fadeIn animate__delay-2s">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>Excelente ambiente</span>
                    </div>
                    <div class="h-4 border-r border-blue-300"></div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>Desarrollo profesional</span>
                    </div>
                    <div class="h-4 border-r border-blue-300"></div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>Beneficios</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Formulario Mejorado -->
    <div class="container mx-auto px-4 py-8 -mt-6">
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 animate__animated animate__fadeIn" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="flex items-center"><i class="fas fa-exclamation-circle mr-2"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="bg-white shadow-lg rounded-xl p-6 md:p-8 card-hover animate__animated animate__fadeInUp">
            <!-- Barra de progreso -->
            <div class="mb-8">
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span id="progress-text">Paso 1 de 3: Información Personal</span>
                    <span id="progress-percentage">33%</span>
                </div>
                <div class="progress-container">
                    <div class="progress-bar" id="progress-bar" style="width: 33%"></div>
                </div>
            </div>

            <form id="candidate-form" action="{{ route('candidatos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Paso 1: Información Personal -->
                <div class="form-step active" id="step1">
                    <h3 class="text-2xl font-semibold text-primary border-b-2 border-secondary pb-2 mb-6 flex items-center">
                        <i class="fas fa-user-circle mr-3 text-secondary"></i>
                        Información Personal
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="floating-label">
                            <input type="text" id="nombre" name="nombre" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" placeholder=" " required maxlength="100">
                            <label for="nombre" class="text-gray-500">Nombre <span class="text-red-500">*</span></label>
                        </div>
                        <div class="floating-label">
                            <input type="text" id="apellido" name="apellido" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" placeholder=" " required maxlength="100">
                            <label for="apellido" class="text-gray-500">Apellido <span class="text-red-500">*</span></label>
                        </div>
                        <div class="floating-label">
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" placeholder=" " required maxlength="100">
                            <label for="email" class="text-gray-500">Email <span class="text-red-500">*</span></label>
                        </div>
                        <div class="floating-label">
                            <input type="tel" id="telefono" name="telefono" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" placeholder=" " required maxlength="20">
                            <label for="telefono" class="text-gray-500">Teléfono <span class="text-red-500">*</span></label>
                        </div>
                        <div>
                            <label for="fecha_nacimiento" class="block text-gray-700 font-medium mb-2">Fecha de Nacimiento <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" required>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-calendar field-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="genero" class="block text-gray-700 font-medium mb-2">Género <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="genero" name="genero" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" required>
                                    <option value="">Seleccionar</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="O">Otro</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-chevron-down field-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="estado_civil" class="block text-gray-700 font-medium mb-2">Estado Civil <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="estado_civil" name="estado_civil" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" required>
                                    <option value="">Seleccionar</option>
                                    <option value="soltero">Soltero/a</option>
                                    <option value="casado">Casado/a</option>
                                    <option value="divorciado">Divorciado/a</option>
                                    <option value="viudo">Viudo/a</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-chevron-down field-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-8">
                        <button type="button" id="next-step1" class="btn-primary text-white px-8 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center">
                            Siguiente
                            <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Paso 2: Ubicación -->
                <div class="form-step" id="step2">
                    <h3 class="text-2xl font-semibold text-primary border-b-2 border-secondary pb-2 mb-6 flex items-center">
                        <i class="fas fa-map-marker-alt mr-3 text-secondary"></i>
                        Ubicación
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="floating-label">
                            <input type="text" id="direccion" name="direccion" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" placeholder=" " required maxlength="255">
                            <label for="direccion" class="text-gray-500">Dirección <span class="text-red-500">*</span></label>
                        </div>
                        <div class="floating-label">
                            <input type="text" id="ciudad" name="ciudad" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" placeholder=" " required maxlength="100">
                            <label for="ciudad" class="text-gray-500">Ciudad <span class="text-red-500">*</span></label>
                        </div>
                        <div>
                            <label for="pais" class="block text-gray-700 font-medium mb-2">País <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="pais" name="pais" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" required>
                                    <option value="">Seleccione un país</option>
                                    @foreach($paises as $codigo => $pais)
                                        <option value="{{ $pais }}">{{ $pais }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-globe field-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="floating-label">
                            <input type="text" id="nacionalidad" name="nacionalidad" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" placeholder=" " required maxlength="100">
                            <label for="nacionalidad" class="text-gray-500">Nacionalidad <span class="text-red-500">*</span></label>
                        </div>
                    </div>

                    <div class="flex justify-between mt-8">
                        <button type="button" id="prev-step2" class="border border-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 flex items-center transition-all duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Anterior
                        </button>
                        <button type="button" id="next-step2" class="btn-primary text-white px-8 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center">
                            Siguiente
                            <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Paso 3: Perfil Profesional -->
                <div class="form-step" id="step3">
                    <h3 class="text-2xl font-semibold text-primary border-b-2 border-secondary pb-2 mb-6 flex items-center">
                        <i class="fas fa-briefcase mr-3 text-secondary"></i>
                        Perfil Profesional
                    </h3>
                    
                    <div class="grid grid-cols-1 gap-6">
                        <div class="floating-label">
                            <input type="url" id="linkedin" name="linkedin" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary input-animation" placeholder=" " maxlength="255">
                            <label for="linkedin" class="text-gray-500">LinkedIn</label>
                        </div>
                        
                        <div>
                            <label for="foto" class="block text-gray-700 font-medium mb-2">Foto de Perfil</label>
                            <div class="file-upload" id="foto-upload">
                                <i class="fas fa-cloud-upload-alt text-4xl text-primary mb-3"></i>
                                <h4 class="text-lg font-medium">Arrastra tu foto aquí</h4>
                                <p class="text-gray-500 text-sm">o haz clic para seleccionar</p>
                                <input type="file" id="foto" name="foto" accept="image/*">
                                <p class="file-name" id="foto-name"></p>
                            </div>
                        </div>
                        
                        <div>
                            <label for="curriculum" class="block text-gray-700 font-medium mb-2">Currículum (PDF) <span class="text-red-500">*</span></label>
                            <div class="file-upload" id="cv-upload">
                                <i class="fas fa-file-pdf text-4xl text-primary mb-3"></i>
                                <h4 class="text-lg font-medium">Arrastra tu CV aquí</h4>
                                <p class="text-gray-500 text-sm">o haz clic para seleccionar (formato PDF)</p>
                                <input type="file" id="curriculum" name="curriculum" accept=".pdf" required>
                                <p class="file-name" id="cv-name"></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between mt-8">
                        <button type="button" id="prev-step3" class="border border-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 flex items-center transition-all duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Anterior
                        </button>
                        <button type="submit" id="submit-form" class="btn-primary text-white px-8 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Enviar Postulación
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Loader Overlay -->
    <div class="loader-overlay" id="loader-overlay">
        <div class="loader mb-4"></div>
        <h3 class="text-2xl font-bold text-primary mb-3">Procesando tu postulación...</h3>
        <p id="loader-text" class="text-gray-600">Estamos revisando tu CV y datos personales</p>
    </div>

    <!-- Achievement Badge -->
    <div class="achievement-badge" id="achievement-badge">
        <div class="bg-green-500 text-white p-2 rounded-full mr-3">
            <i class="fas fa-check"></i>
        </div>
        <div>
            <h4 class="font-bold text-gray-800" id="achievement-title">¡Paso completado!</h4>
            <p class="text-sm text-gray-600" id="achievement-desc">Información personal guardada correctamente</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Select2 inicialización
            $('#pais').select2({
                placeholder: "Seleccione un país",
                allowClear: true,
                width: '100%'
            });
            
            // Variables para manejar los pasos
            const steps = ['step1', 'step2', 'step3'];
            let currentStep = 0;
            
            // Función para mostrar logros
            function showAchievement(title, desc) {
                $('#achievement-title').text(title);
                $('#achievement-desc').text(desc);
                $('#achievement-badge').addClass('show');
                
                setTimeout(function() {
                    $('#achievement-badge').removeClass('show');
                }, 3000);
            }
            
            // Función para actualizar la barra de progreso
            function updateProgress(step) {
                const progressPercentage = ((step + 1) / steps.length) * 100;
                $('#progress-bar').css('width', progressPercentage + '%');
                $('#progress-percentage').text(Math.round(progressPercentage) + '%');
                
                // Actualizar el texto del progreso
                let progressText = '';
                if (step === 0) {
                    progressText = 'Paso 1 de 3: Información Personal';
                } else if (step === 1) {
                    progressText = 'Paso 2 de 3: Ubicación';
                } else {
                    progressText = 'Paso 3 de 3: Perfil Profesional';
                }
                $('#progress-text').text(progressText);
            }
            
            // Función para cambiar de paso
            function goToStep(step) {
                // Ocultar todos los pasos
                $('.form-step').removeClass('active');
                
                // Mostrar el paso actual
                $('#' + steps[step]).addClass('active');
                
                // Actualizar la barra de progreso
                updateProgress(step);
                
                // Animar el desplazamiento hacia arriba
                $('html, body').animate({
                    scrollTop: $('#candidate-form').offset().top - 100
                }, 500);
            }
            
            // Manejo de eventos para los botones de navegación
            $('#next-step1').click(function() {
                // Validar campos del paso 1
                const step1Inputs = $('#step1 input[required], #step1 select[required]');
                let isValid = true;
                
                step1Inputs.each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('shake');
                        $(this).css('border-color', 'red');
                        
                        setTimeout(() => {
                            $(this).removeClass('shake');
                        }, 500);
                    } else {
                        $(this).css('border-color', '');
                    }
                });
                
                if (isValid) {
                    currentStep = 1;
                    goToStep(currentStep);
                    showAchievement('¡Paso completado!', 'Información personal guardada correctamente');
                }
            });
            
            $('#prev-step2').click(function() {
                currentStep = 0;
                goToStep(currentStep);
            });
            
            $('#next-step2').click(function() {
                // Validar campos del paso 2
                const step2Inputs = $('#step2 input[required], #step2 select[required]');
                let isValid = true;
                
                step2Inputs.each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('shake');
                        $(this).css('border-color', 'red');
                        
                        setTimeout(() => {
                            $(this).removeClass('shake');
                        }, 500);
                    } else {
                        $(this).css('border-color', '');
                    }
                });
                
                if (isValid) {
                    currentStep = 2;
                    goToStep(currentStep);
                    showAchievement('¡Localización completada!', 'Datos de ubicación guardados correctamente');
                }
            });
            
            $('#prev-step3').click(function() {
                currentStep = 1;
                goToStep(currentStep);
            });
            
            // Manejo de arrastrar y soltar para archivos
            $('.file-upload').on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass('border-primary');
            });
            
            $('.file-upload').on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('border-primary');
            });
            
            $('.file-upload').on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('border-primary');
                
                const file = e.originalEvent.dataTransfer.files[0];
                const input = $(this).find('input[type="file"]');
                const fileNameElement = $(this).find('.file-name');
                
                if (input.attr('id') === 'curriculum' && file.type !== 'application/pdf') {
                    alert('Por favor, sube un archivo PDF para tu currículum.');
                    return;
                }
                
                if (input.attr('id') === 'foto' && !file.type.startsWith('image/')) {
                    alert('Por favor, sube una imagen para tu foto de perfil.');
                    return;
                }
                
                const dt = new DataTransfer();
                dt.items.add(file);
                input[0].files = dt.files;
                
                fileNameElement.text(file.name).show();
                $(this).addClass('bg-blue-50');
            });
            
            // Manejo de cambios en los archivos
            $('input[type="file"]').change(function() {
                const fileNameElement = $(this).closest('.file-upload').find('.file-name');
                if (this.files.length > 0) {
                    fileNameElement.text(this.files[0].name).show();
                    $(this).closest('.file-upload').addClass('bg-blue-50');
                } else {
                    fileNameElement.hide();
                    $(this).closest('.file-upload').removeClass('bg-blue-50');
                }
            });
            
            // Manejo de envío del formulario
            $('#candidate-form').on('submit', function(e) {
                e.preventDefault();
                
                // Validar campos del paso 3
                const step3Required = $('#step3 input[required], #step3 select[required]');
                let isValid = true;
                
                step3Required.each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('shake');
                        $(this).css('border-color', 'red');
                        
                        setTimeout(() => {
                            $(this).removeClass('shake');
                        }, 500);
                    } else {
                        $(this).css('border-color', '');
                    }
                });
                
                if (isValid) {
                    // Mostrar loader
                    $('#loader-overlay').addClass('active');
                    
                    // Textos aleatorios para el loader
                    const loaderTexts = [
                        "Procesando tu currículum...",
                        "Analizando tu perfil profesional...",
                        "Preparando tu información...",
                        "Verificando datos...",
                        "Casi listo...",
                        "¡Gracias por tu paciencia!"
                    ];
                    
                    // Cambiar el texto del loader cada 3 segundos
                    let loaderIndex = 0;
                    const loaderInterval = setInterval(function() {
                        $('#loader-text').text(loaderTexts[loaderIndex]);
                        loaderIndex = (loaderIndex + 1) % loaderTexts.length;
                    }, 3000);
                    
                    // Simular envío del formulario (quitar para producción)
                    setTimeout(function() {
                        clearInterval(loaderInterval);
                        
                        // Enviar formulario realmente
                        e.target.submit();
                        
                        // Código de prueba - quitar para producción
                        // $('#loader-overlay').removeClass('active');
                        // showAchievement('¡Postulación completa!', 'Tus datos han sido enviados correctamente');
                    }, 3000);
                }
            });
            
            // Efecto de animación en campos cuando están en foco
            $('input, select').focus(function() {
                $(this).addClass('pulse');
            }).blur(function() {
                $(this).removeClass('pulse');
            });
            
            // Manejo de animaciones en la carga inicial
            setTimeout(function() {
                $('.card-hover').addClass('animate__animated animate__fadeInUp');
            }, 500);
        });
    </script>
</body>
</html>