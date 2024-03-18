document.addEventListener("DOMContentLoaded", function () {
    const preguntas = [
        { titulo: "Nombre(s) del estudiante", nota: "Nota: Ingresa el/los nombre(s) del estudiante.", tipoInput: "text", placeholder: "Nombre(s) del estudiante" },
        { titulo: "Apellido(s) del estudiante", nota: "Nota: Ingresa el/los apellido(s) del estudiante.", tipoInput: "text", placeholder: "Apellido(s) del estudiante" },
        { titulo: "Edad del estudiante", nota: "Nota: Ingresa la edad del estudiante (entre 13 y 16 años).", tipoInput: "number", min: 13, max: 16, placeholder: "Edad del estudiante", valorDefecto: 13 },
        { titulo: "Número telefónico del estudiante", nota: "Nota: Ingresa el número telefónico del estudiante.", tipoInput: "tel", placeholder: "(***)-***-****", maxlength: 14 },
        { titulo: "Correo electrónico del estudiante", nota: "Nota: Ingresa el correo electrónico del estudiante.", tipoInput: "email", placeholder: "Correo electrónico del estudiante" },
        { titulo: "Centro Educativo de procedencia", nota: "Nota: Ingresa el centro educativo de procedencia del estudiante.", tipoInput: "text", placeholder: "Centro Educativo de procedencia" },
        { titulo: "Provincia de residencia del estudiante", nota: "Nota: Ingresa la provincia de residencia del estudiante.", tipoInput: "text", placeholder: "Provincia de residencia" },
        { titulo: "Promedio de la suma de las calificaciones de primero y segundo de secundaria", nota: "Nota: Ingresa el promedio de las calificaciones de primero y segundo de secundaria (entre 80 y 100).", tipoInput: "number", min: 80, max: 100, placeholder: "Promedio", valorDefecto: 80 },
        { titulo: "¿Has examinado materias en completivo, extraordinario o pendiente?", nota: "Nota: Selecciona 'Sí' si has examinado materias en completivo, extraordinario o pendiente, de lo contrario selecciona 'No'.", tipoInput: "radio", opciones: ["Sí", "No"] },
        { titulo: "Carga aquí tu récord de calificaciones de 1ro, 2do y las acumuladas de 3ro de secundaria (P1 y P2) firmado y sellado por el distrito y el centro educativo", nota: "Nota: Carga el récord de calificaciones firmado y sellado por el distrito y el centro educativo. Solo formatos: .jpg,.png y .jpeg.", tipoInput: "file" },
        {
            titulo: "Carrera Técnica", nota: "Nota: Selecciona la carrera técnica que te interesa.", tipoInput: "radio", opciones: [
                "Industrias Alimentarias",
                "Desarrollo y Administración de Sistemas Informáticos",
                "Comercio y Mercadeo",
                "Gestión Administrativa y Tributaria"
            ]
        }
    ]; // Aquí defines tus preguntas

    let indicePregunta = 0;
    const titulo = document.getElementById('titulo');
    const nota = document.getElementById('nota');
    const contenedorInput = document.getElementById('contenedor-input');
    const contenedorRadio = document.getElementById('contenedor-radio');
    const contenedorFile = document.getElementById('contenedor-file');
    const contenedorRadioCarrera = document.getElementById('contenedor-radio-carrera');
    const continuarBtn = document.getElementById('continuar');
    const atrasBtn = document.getElementById('atras');
    const respuestas = new Array(preguntas.length).fill(""); // Arreglo para almacenar las respuestas

    function mostrarInput(inputType) {
        contenedorInput.innerHTML = ''; // Limpiar el contenedor de input
        if (inputType === "text" || inputType === "email" || inputType === "number" || inputType === "tel") {
            const input = document.createElement('input');
            input.type = inputType;
            input.id = "input";
            input.required = true;
            input.placeholder = preguntas[indicePregunta].placeholder;

            if (inputType === "number") {
                input.min = preguntas[indicePregunta].min;
                input.max = preguntas[indicePregunta].max;

                if (preguntas[indicePregunta].valorDefecto) {
                    input.value = preguntas[indicePregunta].valorDefecto;
                }
            } else if (inputType === "tel") {
                input.addEventListener('input', function () {
                    var value = input.value.replace(/\D/g, '');
                    if (value.length === 0) {
                        input.value = '';
                    } else if (value.length <= 10) {
                        input.value = '(' + value.slice(0, 3) + ') ' + value.slice(3, 6) + '-' + value.slice(6, 10);
                    } else {
                        input.value = '(' + value.slice(0, 3) + ') ' + value.slice(3, 6) + '-' + value.slice(6, 10);
                    }
                });

                input.maxLength = preguntas[indicePregunta].maxlength;
            }

            contenedorInput.appendChild(input);

        } else if (inputType === "radio") {
            contenedorRadio.style.display = 'block';
            preguntas[indicePregunta].opciones.forEach(opcion => {
                const label = document.createElement('label');
                const radio = document.createElement('input');
                radio.type = 'radio';
                radio.id = "rd-" + opcion;
                radio.name = 'opcion';
                radio.value = opcion;
                radio.classList.add("wg-input-radio");
                label.classList.add("label");
                label.appendChild(radio);
                label.appendChild(document.createTextNode(opcion));
                contenedorRadio.appendChild(label);
            });
        } else if (inputType === "file") {
            contenedorFile.style.display = 'block';
            const inputFile = document.createElement('input');
            inputFile.type = 'file';
            inputFile.id = 'archivo';
            inputFile.required = true;
            inputFile.accept = ".jpg, .jpeg, .png"; // Aceptar solo estos tipos de archivo
            contenedorFile.appendChild(inputFile);
        }
    }

    function mostrarPregunta() {
        const preguntaActual = preguntas[indicePregunta];
        titulo.textContent = preguntaActual.titulo;
        nota.textContent = preguntaActual.nota;
        mostrarInput(preguntaActual.tipoInput);

        if (indicePregunta === 0) {
            atrasBtn.style.display = 'none';
        } else {
            atrasBtn.style.display = 'inline-block';
        }

        if (indicePregunta === preguntas.length - 1) {
            continuarBtn.textContent = 'Finalizar';
        } else {
            continuarBtn.textContent = 'Continuar';
        }

        // Mostrar respuesta almacenada si existe
        const respuestaActual = respuestas[indicePregunta];
        const input = document.getElementById('input');
        if (input && respuestaActual) {
            input.value = respuestaActual;
        } else if (preguntaActual.tipoInput === "radio" && respuestaActual) {
            document.querySelector(`input[value="${respuestaActual}"]`).checked = true;
        }
    }

    function validarInputs() {
        const input = document.getElementById('input');
        const radio = document.querySelector('input[name="opcion"]:checked');
        const file = document.getElementById('archivo');

        if (input && input.checkValidity) {
            return input.checkValidity();
        } else if (radio) {
            return true;
        } else if (file && file.checkValidity) {
            return file.checkValidity();
        }
        return false;
    }

    function siguientePregunta() {
        if (validarInputs()) {
            respuestas[indicePregunta] = document.getElementById('input') ? document.getElementById('input').value :
                document.querySelector('input[name="opcion"]:checked') ? document.querySelector('input[name="opcion"]:checked').value :
                    document.getElementById('archivo') ? document.getElementById('archivo').files[0].name : ""; // Almacenar respuesta antes de avanzar
            if (indicePregunta < preguntas.length - 1) {
                indicePregunta++;
                contenedorRadio.innerHTML = ''; // Limpiar radio buttons antes de mostrar la siguiente pregunta
                contenedorFile.innerHTML = ''; // Limpiar input file antes de mostrar la siguiente pregunta
                mostrarPregunta();

            } else {
                mostrarResultados();
            }
        } else {
            alert('Por favor, completa el campo antes de continuar.');
        }
    }

    function preguntaAnterior() {
        respuestas[indicePregunta] = document.getElementById('input') ? document.getElementById('input').value :
            document.querySelector('input[name="opcion"]:checked') ? document.querySelector('input[name="opcion"]:checked').value :
                document.getElementById('archivo') ? document.getElementById('archivo').files[0].name : ""; // Almacenar respuesta antes de retroceder

        if (indicePregunta > 0) {
            indicePregunta--;
            contenedorRadio.innerHTML = ''; // Limpiar radio buttons al retroceder a una pregunta anterior
            contenedorFile.innerHTML = ''; // Limpiar input file al retroceder a una pregunta anterior
            mostrarPregunta();
        }
    }

    function mostrarResultados() {
        // Mostrar resultados en una lista y botones para enviar o cancelar
        const resultadosDiv = document.createElement('div');
        resultadosDiv.classList.add('ListaDeResultados');
        resultadosDiv.innerHTML = "<h2>Resultados del formulario:</h2><ul>";
        respuestas.forEach((respuesta, index) => {
            resultadosDiv.innerHTML += `<li><strong>${preguntas[index].titulo}:</strong> ${respuesta}</li>`;
        });
        resultadosDiv.innerHTML += "</ul>";
        const enviarBtn = document.createElement('button');
        enviarBtn.classList.add('EnviarBtn');
        enviarBtn.textContent = 'Enviar formulario';
        enviarBtn.addEventListener('click', enviarFormulario);
        const cancelarBtn = document.createElement('button');
        cancelarBtn.classList.add('CancelarBtn');
        cancelarBtn.textContent = 'Cancelar';
        cancelarBtn.addEventListener('click', cancelarFormulario);
        resultadosDiv.appendChild(enviarBtn);
        resultadosDiv.appendChild(cancelarBtn);
        document.body.innerHTML = '';
        document.body.appendChild(resultadosDiv);

        // Ocultar botón "Atrás" al mostrar resultados
        atrasBtn.style.display = 'none';
    }

    function cancelarFormulario() {
        // Recargar la página para volver al inicio del formulario
        window.location.href = window.location.href;
    }

    function enviarFormulario() {
        var data = new FormData();
        data.append("nombre", respuestas[0]);
        data.append("apellido", respuestas[1]);
        data.append("edad", respuestas[2]);
        data.append("numero-telefonico", respuestas[3]);
        data.append("email", respuestas[4]);
        data.append("centroeducativo-procedencia", respuestas[5]);
        data.append("provincia-residencia", respuestas[6]);
        data.append("promedio", respuestas[7]);
        data.append("materias-cmp-ext-pen", respuestas[8]);
        data.append("record", respuestas[9]);
        data.append("carrera-tecnica", respuestas[10]);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'solicitud-admision.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert('Datos insertados correctamente');
                document.getElementById('formulario').reset();
                location.reload();
            } else {
                alert('Hubo un problema al insertar los datos');
            }
        };
        xhr.send(data);
    }

    continuarBtn.addEventListener('click', siguientePregunta);
    atrasBtn.addEventListener('click', preguntaAnterior);
    mostrarPregunta();
});
