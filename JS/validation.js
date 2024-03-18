var canSubmit = true;

// Validar un input individual
function ValidateInput($input, schema) {
  var output = ['valid', '']
  const validations = schema.split('|');

  for (let i = 0; i < validations.length; i++) {
    const validation = validations[i];
    const value = $input.value.trim();

    if (validation == 'required' && value == '') {
      output = ['invalid', `El campo ${$input.id} es requerido`]
      break
    }

    if (validation.includes('min') && value.length < parseInt(validation.split(':')[1])) {
      output = ['invalid', `El campo ${$input.id} debe tener mínimo ${parseInt(validation.split(':')[1])} caracteres`]
      break
    }

    if (validation.includes('max') && value.length > parseInt(validation.split(':')[1])) {
      output = ['invalid', `El campo ${$input.id} no debe pasar de ${parseInt(validation.split(':')[1])} caracteres`]
      break
    }

    if (validation.includes('mail')) {
      const prev = value.split("@")[0]

      if (!/[a-zA-ZáéíóúÁÉÍÓÚüÜ0-9]/.test(prev[prev.length - 1]) || prev.length < 6) {
        output = ['invalid', `El correo debe tener un usuario asociado de mínimo 6 caracteres`]
        break
      }
      if (!value.endsWith('@gmail.com')) {
        output = ['invalid', `La institución no acepta dominios de correos que no contengan "@gmail.com"`]
        break
      }

    }

    if (validation == "picture" && value !== '') {
      if (![".jpeg", "jpg", ".gif", ".webp", ".png"].some(format => value.toLowerCase().includes(format))) {
        output = ['invalid', `Solo se permiten archivos jpeg, gif, webp, png`]
        break
      }
    }

    if (validation == "cedula") {
      cedula = value;

      // Convertir la cédula en un array de caracteres
      c = cedula.split('');

      // Definir un array con los factores de multiplicación
      v = [1, 2, 1, 2, 1, 2, 1, 2, 1, 2]

      // Inicializar el resultado de la validación
      var result = 0;

      // Variables adicionales para cálculos intermedios
      var ar;
      var up;
      var oc;

      // Iterar sobre los primeros 10 dígitos de la cédula
      for (i = 0; i < 10; i++) {
        // Multiplicar el i-ésimo dígito por el i-ésimo valor en el array de factores
        up = c[i] * v[i];
        ab = up;

        // Si el resultado es mayor o igual a 10, sumar los dígitos del resultado
        if (ab >= 10) {
          oc = ab.toString()
            .split('')
            .map(x => parseInt(x))
            .reduce((x, y) => x + y);
        } else {
          oc = ab;
        }

        // Sumar el resultado parcial al acumulador
        result = parseFloat(result) + parseFloat(oc);
      }

      // Determinar el dígito de control
      dp = result;
      ac = dp.toString().split('')[0] + '0';
      ac = parseInt(ac);
      uj = (ac / 10) * 10;
      if (uj < dp) {
        dp = (uj + 10) - dp;
      }

      // Comparar el dígito de control calculado con el último dígito de la cédula
      if (c[10] == dp) {

      } else {
        output = ['invalid', `Cédula incorrecta`]
        break
      }
    }

    if (validation == "trim" && value.includes(" ")) {
      output = ['invalid', `El campo ${$input.id} tiene espacios`]
      break
    }

    // 3
    if (validation == "conf") {
      const $contraseña = document.getElementById("contraseña")
      const $contraseñaConf = document.getElementById("confirmacion")

      if ($contraseña.value !== $contraseñaConf.value) {
        output = ['invalid', `La confirmación de la contraseña no es igual a la contraseña inicialmente introducida`]
        break
      }
    }

  }
  const $errorSpan = $input.closest('.input__container').children[1]

  if (output[0] == 'valid') {
    $input.classList.add("valid")
    UnInvalid($input)
  } else {
    $input.classList.add("invalid")
    $input.classList.remove("valid")
    $errorSpan.style.display = 'flex'
    $errorSpan.children[1].textContent = output[1]
    canSubmit = false
  }

}

// Colocar eventos
function putEvents($inputs, schema) {
  $inputs.forEach($input => {
    const validations = schema[$input.id][0];
    const type = schema[$input.id][1];
    const exceptions = schema[$input.id][2];
    const specialCases = ["Backspace", "Delete"]

    var busy = false;
    var timeout;

    // 4
    if ($input.id == "contraseña") {
       document.addEventListener("input", () => {
         ValidateInput(document.getElementById("confirmacion"), schema["confirmacion"][0])
       })
    }

    function activeValidate() {
      ValidateInput($input, validations)
      busy = false
    }

    const time = 500

    function timeValidate() {
      if (!busy) {
        timeout = setTimeout(activeValidate, time)
        busy = true
      }
      else {
        clearTimeout(timeout)
        timeout = setTimeout(activeValidate, time)
        busy = true
      }
    }

    function validateType(e, condition) {
      if (specialCases.indexOf(e.key) !== -1) {
        timeValidate()
      }
      else if (e.key.length > 1) {

      }
      else if ((condition)) {
        if (exceptions.indexOf(e.key) == -1 && exceptions[0] !== "all") {
          e.preventDefault()
        }
        else {
          timeValidate()
        }
      }
      else {
        timeValidate()
      }
    }

    switch (type) {
      case "alfabetico":
        $input.addEventListener('keydown', (e) => {
          
          const tecla = e.key;
          if (tecla === undefined) {
            UnInvalid($input)
            e.preventDefault()
            return
          }

          validateType(e, !/[a-zA-ZáéíóúÁÉÍÓÚ]/.test(tecla[tecla.length - 1]))
        })
        break;

      case "numerico":
        // $input.addEventListener('keydown', (e) => {

        //   const tecla = e.key;
        //   if (!["1","2","3","4","5","6","7","8","9","0"].some((tec) => tec == tecla)) {
        //     e.preventDefault()
        //     return
        //   }

        //   // validateType(e, isNaN(tecla[tecla.length - 1]) || tecla == ' ')
        // })

        $input.addEventListener('input', (e) => {
          if ($input.value.split('').some((num => ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"].indexOf(num) == -1))) {
            $input.value = $input.value.split('').filter(num => ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"].indexOf(num) !== -1)
          }

          timeValidate()
        })
        break;

      case "alfanumerico":
        $input.addEventListener('keydown', (e) => {

          const tecla = e.key;
          if (tecla === undefined) {
            UnInvalid($input)
            e.preventDefault()
            return
          }

          validateType(e, !/[a-zA-ZáéíóúÁÉÍÓÚüÜ0-9]/.test(tecla[tecla.length - 1]))
        })
        break;

      case "picture":
        $input.addEventListener('change', (e) => {
          timeValidate()

          const $preview = document.querySelector('.preview')
          if ([".jpeg", "jpg", ".gif", ".webp", ".png"].some(format => (e.target.value).toLowerCase().includes(format))) {
            var archivo = e.target.files[0];
            if (archivo) {
              var lector = new FileReader();
              lector.onload = function (e) {
                $preview.src = e.target.result;
              }
              lector.readAsDataURL(archivo);
            }
            $preview.style.display = "block"
          } else {
            $preview.style.display = "none"
          }


        })
        break;
    }

  })
}

// Eliminar clase invalida
function UnInvalid ($input) {
  const $errorSpan = $input.closest('.input__container').children[1]
  $input.classList.remove("invalid")
  $errorSpan.style.display = 'none'
}

// Colocar validaciones
function InitilizeValidate(formId, buttonId, schema, registro) {
  const $form = document.getElementById(formId)
  const $button = document.getElementById(buttonId)
  $inputs = $form.querySelectorAll('.input')

  putEvents($inputs, schema)

  if (registro) {
    const $input = document.getElementById('confirm');
    const $errorSpanCheck = $input.parentElement.nextElementSibling

    $input.addEventListener("change", () => {
      if ($input.checked == true) {
        $errorSpanCheck.style.display = 'none'
      } else {
        $errorSpanCheck.style.display = 'flex'
      }
    })

  }

  $button.addEventListener('click', function (event) {
    canSubmit = true
    $inputs.forEach($input => {
      ValidateInput($input, schema[$input.id][0])
    })

    if (registro) {
      const $input = document.getElementById('confirm');

      if ($input.checked == false) {
        $input.parentElement.nextElementSibling.style.display = 'flex'
        canSubmit = false
      } else {
        $input.parentElement.nextElementSibling.style.display = 'none'
      }
    }

    if (canSubmit) {
      $form.submit();
      document.querySelector(".submit_btn").classList.add("disabledButton");
    }
  });
} 
