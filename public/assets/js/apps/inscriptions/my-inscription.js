document.addEventListener("DOMContentLoaded", function () {

    
  
    const formInscription = document.getElementById("formInscription");
    var btnSubInscription = document.getElementById("btnSubInscription");
    formInscription.addEventListener("submit", function (event) {
        btnSubInscription.disabled = true;
        // Realiza la validación personalizada aquí
        if (!validarCamposInscription()) {
            event.preventDefault(); // Detiene el envío del formulario si la validación falla
            btnSubInscription.disabled = false;
        }
    });

    function validarCamposInscription() {
        const selectCategoryRadioButtons = document.querySelector('input[name="category_inscription_id"]:checked');
        const selectedRadioCategoryInscription = document.querySelector('input[type="radio"][name="category_inscription_id"]:checked');
        const selectedRadioPaymentMethod = document.querySelector('input[type="radio"][name="payment_method"]:checked');

        // Función para validar campo de archivo de FilePond
        function validarArchivoFilePond(inputId, mensajeError) {
            const inputArchivo = document.getElementById(inputId);
            const filePondInstance = FilePond.find(inputArchivo);

            if (filePondInstance.getFiles().length === 0) {
                alert(mensajeError);
                return false;
            }

            return true;
        }

        if (selectedRadioCategoryInscription === null) {
            alert("Debe seleccionar una categoría");
            return false;
        }

        const categoriasPermitidas = ['1','2','3','4'];

        if (categoriasPermitidas.includes(selectedRadioCategoryInscription.value)) {
            if (!validarArchivoFilePond('document_file', "Debe adjuntar documento probatorio de categoría (Título, Constancia, Carnet profesional).")) {
                return false;
            }
        }

        if (selectedRadioPaymentMethod === null) {
            alert("Debe seleccionar un método de pago");
            return false;
        }

        if(selectedRadioPaymentMethod.value === 'Transferencia/Depósito') {
          const exemptCategories = ['1', '2', '3'];
          if (exemptCategories.includes(selectCategoryRadioButtons.value)) {
              // if (!validarArchivoFilePond('voucher_file', "Debe adjuntar un comprobante de transferencia o depósito")) {
              //     return false;
              // }
          }
        }

        if(selectedRadioCategoryInscription.value === '4' && document.getElementById('specialcode_verify').value === ''){
            alert('Debe validar la cuota especial');
            return false;
        }

        return true; // La validación pasa
    }


});

// Obtén todos los elementos radio y checkboxes
const categoryRadioButtons = document.querySelectorAll('input[type="radio"][name="category_inscription_id"]');
const accompanistCheckboxes = document.querySelectorAll('input[type="checkbox"][name="accompanist"]');
const paymentotalElement = document.getElementById('paymentotal');

// Función para calcular el precio total
function calculateTotalPrice() {
  let totalPrice = 0;

  // Suma los valores de los radios seleccionados
  categoryRadioButtons.forEach(radio => {
    if (radio.checked) {
      const catPrice = parseFloat(radio.getAttribute('data-catprice'));
      totalPrice += catPrice;
    }
  });

  // Suma el valor del checkbox si está marcado
  accompanistCheckboxes.forEach(checkbox => {
    const dvAccompanist = document.getElementById('dv_accompanist');
    const inputsaccomp = dvAccompanist.querySelectorAll('input');
    const selectsaccomp = dvAccompanist.querySelectorAll('select');

    // Limpiar los valores de los campos de entrada
    inputsaccomp.forEach(input => {
      input.value = ''; // Establecer el valor del campo de entrada como cadena vacía
    });

    // Restablecer los campos de selección
    selectsaccomp.forEach(select => {
      // Restablecer el campo de selección a su opción predeterminada (puede ser la primera opción en blanco o cualquier otra opción deseada)
      select.selectedIndex = 0; // Establecer el índice seleccionado al valor deseado
    });

    if (checkbox.checked) {
      const catPrice = parseFloat(checkbox.getAttribute('data-catprice'));

      //remove class d-none in dv_accompanist
      dvAccompanist.classList.remove('d-none');
      inputsaccomp.forEach(input => {
        input.setAttribute('required', 'required');
      });
      selectsaccomp.forEach(select => {
        select.setAttribute('required', 'required');
      });


    }else{
        //add class d-none in dv_accompanist
        dvAccompanist.classList.add('d-none');
        inputsaccomp.forEach(input => {
            input.removeAttribute('required');
        });
        selectsaccomp.forEach(select => {
            select.removeAttribute('required');
        });
    }
  });

  if(totalPrice == 0){

  }


  // Actualiza el elemento HTML con el precio total
  paymentotalElement.textContent = totalPrice; // Ajusta el formato según necesites
}

// Agrega un event listener para los cambios en los radios y checkboxes
categoryRadioButtons.forEach(radio => {
  radio.addEventListener('change', calculateTotalPrice);
  radio.addEventListener('change', handleCategoryRadioButtons);
});

accompanistCheckboxes.forEach(checkbox => {
  checkbox.addEventListener('change', calculateTotalPrice);
});

// Calcula el precio total inicial
calculateTotalPrice();

// Obtén los elementos del DOM
const dvDocumentFile = document.getElementById('dv_document_file');
const inputDocumentFile = document.getElementById('document_file');
const dvSpecialCode = document.getElementById('dv_specialcode');
const inputSpecialCode = document.getElementById('specialcode');
const txtPriceSpecialCode = document.getElementById('dc_price_4');
const btnValidateSpecialCode = document.getElementById('validate_specialcode');
const btnClearSpecialCode = document.getElementById('clear_specialcode');
const specialCodeVerify = document.getElementById('specialcode_verify');
const descriptionSpecialCode = document.getElementById('sms_valid_vc');
const dv_payment = document.getElementById('dv_payment');
const dv_sms_extranjero = document.getElementById('sms_extranjero');

const inputVoucherFile = document.getElementById('voucher_file');

// Función para manejar el clic categoryRadioButtons
function handleCategoryRadioButtons(){
    const selectedValueCategory = document.querySelector('input[type="radio"][name="category_inscription_id"]:checked').value;

    //Mostrar divs que se necesitan
    dvDocumentFile.classList.remove('d-none');
    dv_payment.classList.remove('d-none');

    const isCpRequiredHidden = selectedValueCategory === '10';

    const cprequired = document.getElementById('cprequired');


    if(selectedValueCategory === '1' || selectedValueCategory === '2' || selectedValueCategory === '3' || selectedValueCategory === '4' || selectedValueCategory === '5'){
      dv_payment.classList.add('d-none');
      dv_sms_extranjero.classList.remove('d-none');
    }else{
      dv_payment.classList.remove('d-none');
      dv_sms_extranjero.classList.add('d-none');
    }

    // Handle CP Required
    if(isCpRequiredHidden){
        cprequired.classList.remove('d-none');
    }else{
        cprequired.classList.add('d-none');
    }


    if(selectedValueCategory === '1' || selectedValueCategory === '2' || selectedValueCategory === '3'){

      //Document file required
      dvDocumentFile.classList.remove('d-none');
      inputDocumentFile.setAttribute('required', 'required');

      //Special code required not validation
      dvSpecialCode.classList.add('d-none');
      inputSpecialCode.value = '';
      inputSpecialCode.removeAttribute('required');
      inputSpecialCode.removeAttribute('readonly');
      txtPriceSpecialCode.textContent = '00';
      descriptionSpecialCode.textContent = '';
      specialCodeVerify.value = '';
      btnValidateSpecialCode.classList.remove('d-none');
      btnClearSpecialCode.classList.add('d-none');

    }else if(selectedValueCategory === '4'){

        cprequired.classList.add('d-none');

        //Document file required
        dvDocumentFile.classList.remove('d-none');
        inputDocumentFile.setAttribute('required', 'required');

        //Special code required validation
        dvSpecialCode.classList.remove('d-none');
        inputSpecialCode.setAttribute('required', 'required');
        inputSpecialCode.removeAttribute('readonly');
        txtPriceSpecialCode.textContent = '00';
        descriptionSpecialCode.textContent = '';
        specialCodeVerify.value = '';
        btnValidateSpecialCode.classList.remove('d-none');
        btnClearSpecialCode.classList.add('d-none');
      }else{

        //Document file not required
        dvDocumentFile.classList.add('d-none');
        inputDocumentFile.removeAttribute('required');

        //Special code required not validation
        dvSpecialCode.classList.add('d-none');
        inputSpecialCode.value = '';
        inputSpecialCode.removeAttribute('required');
        inputSpecialCode.removeAttribute('readonly');
        txtPriceSpecialCode.textContent = '00';
        descriptionSpecialCode.textContent = '';
        specialCodeVerify.value = '';
        btnValidateSpecialCode.classList.remove('d-none');
        btnClearSpecialCode.classList.add('d-none');
    }
}

//if  clic in radio invoice if value is yes add class in dv_invoice_info
const dv_invoice = document.getElementById('dv_invoice');
const dvInvoiceInfo = document.getElementById('dv_invoice_info');
const inputInvoice = document.querySelectorAll('input[type="radio"][name="invoice"]');
const inputInvoiceRuc = document.getElementById('invoice_ruc');
const inputInvoiceSocialReason = document.getElementById('invoice_social_reason');
const inputInvoiceAddress = document.getElementById('invoice_address');

inputInvoice.forEach(radio => {
    radio.addEventListener('change', handleInvoice);
});

function handleInvoice(){
    const selectedValueInvoice = document.querySelector('input[type="radio"][name="invoice"]:checked').value;
    if(selectedValueInvoice === 'si'){
        dvInvoiceInfo.classList.remove('d-none');
        inputInvoiceRuc.setAttribute('required', 'required');
        inputInvoiceSocialReason.setAttribute('required', 'required');
        inputInvoiceAddress.setAttribute('required', 'required');
    }else{
        dvInvoiceInfo.classList.add('d-none');
        inputInvoiceRuc.removeAttribute('required');
        inputInvoiceSocialReason.removeAttribute('required');
        inputInvoiceAddress.removeAttribute('required');
    }
}

//validate specialcode when click validate_specialcode button
btnValidateSpecialCode.addEventListener('click', function(){

  //valida si el campo esta vacio
  if(inputSpecialCode.value === ''){
    alert('Ingrese un código especial');
      return false;
  }

  const radioCategory = document.getElementById('category_5');
    //verifica si el existe via ajax javascript
  const url = baseurl + '/validate-specialcode';
  const code = inputSpecialCode.value;

  const xhr = new XMLHttpRequest();
  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Configura el tipo de contenido

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);

        if (response.success) {
          txtPriceSpecialCode.textContent = Math.floor(response.price);
          inputSpecialCode.setAttribute('readonly', 'readonly');
          descriptionSpecialCode.innerHTML = '<span class="text-success">'+response.message+'</span>'
          btnClearSpecialCode.classList.remove('d-none');
          btnValidateSpecialCode.classList.add('d-none');
          specialCodeVerify.value = 'valid';
          radioCategory.setAttribute('data-catprice', Math.floor(response.price));

          

          //Ocultar divs que no se necesitan
          dvDocumentFile.classList.add('d-none');
          dv_invoice.classList.add('d-none');
          dv_payment.classList.add('d-none');


        } else {
          descriptionSpecialCode.innerHTML = '<span class="text-danger">'+response.message+'</span>';
          txtPriceSpecialCode.textContent = '00';
          inputSpecialCode.removeAttribute('readonly');
          specialCodeVerify.value = '';
          radioCategory.setAttribute('data-catprice', '0.00');
        }

        calculateTotalPrice();

      } else {
        alert('Error en la solicitud.');
      }
    }
  };

  // Configura los datos a enviar en la solicitud POST
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const params = `code=${code}&_token=${token}`;

  xhr.send(params);

});

btnClearSpecialCode.addEventListener('click', function(){
    inputSpecialCode.value = '';
    txtPriceSpecialCode.textContent = '00';
    inputSpecialCode.removeAttribute('readonly');
    descriptionSpecialCode.textContent = '';
    btnClearSpecialCode.classList.add('d-none');
    btnValidateSpecialCode.classList.remove('d-none');
    specialCodeVerify.value = '';

    //Mostrar divs que se necesitan
    dvDocumentFile.classList.remove('d-none');
    dv_invoice.classList.remove('d-none');
    dv_payment.classList.remove('d-none');

    calculateTotalPrice();
});

const inputPaymentMethod = document.querySelectorAll('input[type="radio"][name="payment_method"]');
const dvTranfer = document.getElementById('dv_tranfer');

inputPaymentMethod.forEach(radio => {
    radio.addEventListener('change', handlePaymentMethod);
});

function handlePaymentMethod(){
    const selectedValuePaymentMethod = document.querySelector('input[type="radio"][name="payment_method"]:checked').value;
    if(selectedValuePaymentMethod === 'Transferencia/Depósito'){
        dvTranfer.classList.remove('d-none');
        
    }else{
        dvTranfer.classList.add('d-none');
    }
}


const locale_es = {
  labelIdle: 'Arrastra y suelta tus archivos o <span class="filepond--label-action">Selecciona</span>',
  labelFileProcessing: 'Subiendo',
  labelFileProcessingComplete: 'Subida completada',
  labelTapToCancel: 'clique para cancelar',
  labelTapToRetry: 'clique para reenviar',
  labelTapToUndo: 'clique para deshacer',
};

const inputIds = ["document_file", "voucher_file"];

inputIds.forEach((inputId) => {
  const inputElement = document.getElementById(inputId);
  FilePond.create(inputElement, {
      labelIdle: locale_es.labelIdle,
      labelFileProcessing: locale_es.labelFileProcessing,
      labelFileProcessingComplete: locale_es.labelFileProcessingComplete,
      labelTapToCancel: locale_es.labelTapToCancel,
      labelTapToRetry: locale_es.labelTapToRetry,
      labelTapToUndo: locale_es.labelTapToUndo,
      onaddfilestart: () => {
        btnSubInscription.disabled = true;
        btnSubInscription.textContent = 'Subiendo archivo... Espere por favor';
      },
      onprocessfile: () => {
        btnSubInscription.disabled = false,
        btnSubInscription.textContent = 'Inscribirme Ahora';
      }
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
