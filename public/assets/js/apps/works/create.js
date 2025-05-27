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


// Obtener el elemento select y el textarea
const selectCategory = document.getElementById("inputCategory");
const textareaDescription = document.getElementById("inputDescription");
const dv_references = document.getElementById("dv_references");
const textareaReferences = document.getElementById("references");

// Agregar un evento de cambio al select
selectCategory.addEventListener("change", function () {
    // Obtener el valor seleccionado
    const selectedCategory = selectCategory.value;

    // Cambiar el contenido del textarea según la categoría seleccionada
    switch (selectedCategory) {
        case "Dermatólogo Joven":
        case "Trabajo de Investigación Científica":
            textareaDescription.value = "FUNDAMENTOS\n\nOBJETIVO\n\nMÉTODOS\n\nRESULTADOS\n\nCONCLUSIÓN";
            textareaDescription.readOnly = false;
            dv_references.classList.remove("d-none");
            textareaReferences.value = "";
            break;
        case "Mini Caso":
            textareaDescription.value = "FUNDAMENTOS\n\nMOTIVO DE LA COMUNICACIÓN\n\nRELATO DEL CASO\n\nDISCUSIÓN";
            textareaDescription.readOnly = false;
            dv_references.classList.add("d-none");
            textareaReferences.value = "";
            break;
        default:
            textareaDescription.value = "Seleccione una categoría del trabajo para escribir aquí...";
            //readonly disabled
            textareaDescription.readOnly = true;
            textareaReferences.value = "";
            break;
    }
});


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

