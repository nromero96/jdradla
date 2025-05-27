const inputField = document.getElementById("inputAuthor_coauthors");

inputField.addEventListener("input", function() {
  let inputValue = inputField.value;
  const commaCount = (inputValue.match(/,/g) || []).length;

  // Remover caracteres no permitidos
  inputValue = inputValue.replace(/[;:.\-]/g, '');

  // Si hay más de 4 comas, eliminar comas extras
  if (commaCount > 4) {
    inputValue = inputValue.slice(0, inputValue.lastIndexOf(","));
  }

  // Actualizar el valor del campo de entrada
  inputField.value = inputValue;
});


const textarea = document.getElementById("inputDescription");
const charCountSpan = document.getElementById("charCount");

// Función para actualizar el contador de caracteres
function updateCharCount() {
  const maxLength = 5000;
  const currentLength = textarea.value.length;

  // Verificar si la longitud supera el límite y recortar si es necesario
  if (currentLength > maxLength) {
    textarea.value = textarea.value.substring(0, maxLength);
  }

  // Actualizar el contador de caracteres
  charCountSpan.textContent = `${textarea.value.length} / ${maxLength}`;
}

// Agregar un evento de escucha al textarea
textarea.addEventListener("input", updateCharCount);

// Llamar a la función al cargar la página
updateCharCount();


const locale_es = {
  labelIdle: 'Arrastra y suelta tus archivos o <span class="filepond--label-action">Selecciona</span>',
  labelFileProcessing: 'Subiendo',
  labelFileProcessingComplete: 'Subida completada',
  labelTapToCancel: 'clique para cancelar',
  labelTapToRetry: 'clique para reenviar',
  labelTapToUndo: 'clique para deshacer',
};

const inputIds = ["inputFile_1", "inputFile_2", "inputFile_3", "inputFile_4", "inputFile_5", "inputFile_6"];

inputIds.forEach((inputId) => {
  const inputElement = document.getElementById(inputId);
  FilePond.create(inputElement, {
    labelIdle: locale_es.labelIdle,
    labelFileProcessing: locale_es.labelFileProcessing,
    labelFileProcessingComplete: locale_es.labelFileProcessingComplete,
    labelTapToCancel: locale_es.labelTapToCancel,
    labelTapToRetry: locale_es.labelTapToRetry,
    labelTapToUndo: locale_es.labelTapToUndo,
  });
});

FilePond.setOptions({
  server: {
    url: baseurl + '/upload',
    headers: {
      'x-csrf-token': $('meta[name="csrf-token"]').attr('content'),
    },
  },
});


// Obtener todos los elementos con la clase "action-delete"
var deleteButtons = document.querySelectorAll('.action-delete');

// Agregar un evento clic a cada botón de eliminación
deleteButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        var workId = this.getAttribute('data-work-id');
        var fileNumber = this.getAttribute('data-file-col');
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', '/delete-file/' + workId + '/' + fileNumber, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

        xhr.onload = function () {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Eliminación exitosa, oculta el elemento de visualización y muestra el elemento de entrada correspondiente
                    document.getElementById('dv_fileshow_' + fileNumber).classList.add('d-none');
                    document.getElementById('dv_fileinput_' + fileNumber).classList.remove('d-none');
                } else {
                    alert('Error al eliminar el archivo.');
                }
            } else {
                alert('Error al comunicarse con el servidor.');
            }
        };

        xhr.onerror = function () {
            alert('Error de conexión al servidor.');
        };

        xhr.send();
    });
});


