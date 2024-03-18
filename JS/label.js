function catchLabels() {
  const $inputBoxes = document.querySelectorAll('.input__box');

  $inputBoxes.forEach($inputBox => {
    const $input = $inputBox.getElementsByTagName('input')[0];
    const $label = $inputBox.getElementsByTagName('label')[0];

    $input.addEventListener('input', (e) => {
      const value = e.target.value;
      if (value.length > 0) $label.classList.add("input__label--active")
      else {
        $label.classList.remove("input__label--active")
        $input.classList.remove("valid")
        $input.classList.remove("invalid")
      }
    })

  })
}
catchLabels()