//click in input email clear msjresult
document.getElementById('email').addEventListener('click', function () {
    document.getElementById('msjresult').innerHTML = '';
});

document.getElementById('email').addEventListener('input', function () {
    // Obtén el contenido actual del campo de entrada
    var content = this.value;

    // Convierte todo a minúsculas
    content = content.toLowerCase();

    // Actualiza el contenido del campo de entrada
    this.value = content;
});

function submitForm() {
    var couponId = document.getElementById('coupon_id').value;
    var email = document.getElementById('email').value;
    var msjresult = document.getElementById('msjresult');
    // Validación simple
    if (!couponId || !email) {
        msjresult.innerHTML = '<span class="text-danger">Ingrese un email.</span>';
        document.getElementById('email').focus();
        return;
    }

    // Obtener el token CSRF
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Crear un objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open('POST', '/couponmails-storemail', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // Incluir el token CSRF en la cabecera

    // Configurar la función de devolución de llamada
    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.hasOwnProperty('success')) {
                document.getElementById('email').value = '';
                msjresult.innerHTML = '<span class="text-success">Email agregado correctamente.</span>';
                refreshTable();
            }
        } else if (xhr.status === 422) {
            handleValidationError(xhr.responseText);
        } else {
            handleError(xhr.status);
        }
    };

    // Convertir datos a formato JSON
    var data = JSON.stringify({ coupon_id: couponId, email: email });

    // Enviar la solicitud
    xhr.send(data);
}

function handleValidationError(responseText) {
    var msjresult = document.getElementById('msjresult');
    try {
        var errors = JSON.parse(responseText);
        if (errors.hasOwnProperty('error')) {
            msjresult.innerHTML = '<span class="text-danger">Error: ' + errors.error + '</span>';
        } else if (errors.hasOwnProperty('errors')) {
            var errorMessages = Object.values(errors.errors).flat().join("\n");
            alert("Error de validación:\n" + errorMessages);
        }
    } catch (error) {
        console.error('Error al analizar la respuesta de validación:', error);
        alert('Error de validación.');
    }
}

function handleError(status) {
    console.error('Error en la solicitud:', status);
}

function refreshTable() {
    var couponId = document.getElementById('coupon_id').value;
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/couponmails-listmails/' + couponId, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var table = document.getElementById('table-mails');
            table.innerHTML = '';
            response.forEach(function (mail) {
                var row = table.insertRow();
                row.insertCell().innerHTML = mail.email;
                row.insertCell().innerHTML = '<a href="javascript:;" data-emalist="'+mail.id+'" class="badge badge-light-danger text-start bs-tooltip btndelete" data-toggle="tooltip" data-placement="top" title="Eliminar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
            });

            document.addEventListener('click', deleteEmail);

        } else {
            console.error('Error en la solicitud:', xhr.status);
        }
    };

    xhr.send();
}


//open modal boostrap id masiveemailsModal click id btnmasivemails
document.getElementById('btnmasivemails').addEventListener('click', function () {
    var modal = document.getElementById('masiveemailsModal');
    //bootstrap open modal
    var myModal = new bootstrap.Modal(modal);
    myModal.show();
});

//delete email
function deleteEmail(event) {
    if (event.target.classList.contains('btndelete') || event.target.closest('.btndelete')) {
        var deleteButton = event.target.classList.contains('btndelete') ? event.target : event.target.closest('.btndelete');
        var emailId = deleteButton.getAttribute('data-emalist');
        
        // Agregar clase de bloqueo
        deleteButton.classList.add('loading');

        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', '/couponmails-destroymail/' + emailId, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onload = function () {
            // Eliminar clase de bloqueo independientemente del resultado
            deleteButton.classList.remove('loading');

            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.hasOwnProperty('success')) {
                    refreshTable();
                }
            } else {
                console.error('Error en la solicitud:', xhr.status);
            }
        };
        xhr.send();
    }
}

document.addEventListener('click', deleteEmail);


document.getElementById('btnSubmitMasive').addEventListener('click', function () {
    var form = document.getElementById('formmasivemails');
    var formData = new FormData(form);
    var msjresult = document.getElementById('msjresultmasive');
    var btnSubmitMasive = document.getElementById('btnSubmitMasive');

    // Deshabilitar el botón y mostrar indicador visual
    btnSubmitMasive.disabled = true;
    btnSubmitMasive.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Registrando...';

    var couponId = document.getElementById('masive_coupon_id').value;
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/couponmails-masivestoremail', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.hasOwnProperty('success')) {
                    msjresult.innerHTML = '<span class="text-success">' + response.success + '</span>';
                    // Accede a la lista de correos electrónicos agregados exitosamente
                    if (response.hasOwnProperty('successEmails')) {
                        console.log('Correos electrónicos agregados exitosamente:', response.successEmails);
                    }
                    refreshTable();
                    document.getElementById('mebtnsation').innerHTML = '<a href="javascript:;" class="btn btn-secondary" onclick="location.reload();">Cerrar</a>';
                    document.getElementById('btncloseemaimasive').style.display = 'none';
                }
            } catch (error) {
                console.error('Error al analizar la respuesta JSON:', error);
            }
        } else if (xhr.status === 422) {
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.hasOwnProperty('errors')) {
                    handleValidationMasiveMailsErrors(response.errors);
                    refreshTable();
                    document.getElementById('mebtnsation').innerHTML = '<a href="javascript:;" class="btn btn-secondary" onclick="location.reload();">Cerrar</a>';
                    document.getElementById('btncloseemaimasive').style.display = 'none';
                }
            } catch (error) {
                console.error('Error al analizar la respuesta JSON:', error);
            }
        } else {
            console.error('Error en la solicitud:', xhr.status);
        }
    };
    
    xhr.send(formData);
});

function handleValidationMasiveMailsErrors(errors) {
    var msjresult = document.getElementById('msjresultmasive');
    msjresult.innerHTML = '<span class="text-danger">' + errors.join('<br>') + '</span>';
}

document.getElementById('masive_emails').addEventListener('input', function (event) {
    // Obtén el contenido actual del textarea
    var content = this.value;

    // Convierte todo a minúsculas
    content = content.toLowerCase();

    // Reemplaza los espacios con saltos de línea
    content = content.replace(/\s+/g, '\n');

    // Actualiza el contenido del textarea
    this.value = content;
});

document.getElementById('masive_emails').addEventListener('paste', function (event) {
    // Previene la acción de pegar por defecto
    event.preventDefault();

    // Obtiene el texto pegado
    var pastedText = (event.clipboardData || window.clipboardData).getData('text');

    // Convierte todo a minúsculas
    pastedText = pastedText.toLowerCase();

    // Reemplaza los espacios con saltos de línea
    pastedText = pastedText.replace(/\s+/g, '\n');

    // Inserta el texto transformado en el cursor actual
    var selectionStart = this.selectionStart;
    var selectionEnd = this.selectionEnd;
    var textBefore = this.value.substring(0, selectionStart);
    var textAfter = this.value.substring(selectionEnd);
    this.value = textBefore + pastedText + textAfter;

    // Mueve el cursor al final del texto pegado
    this.setSelectionRange(selectionStart + pastedText.length, selectionStart + pastedText.length);
});

document.getElementById('masive_emails').addEventListener('keydown', function (event) {
    if (event.key === ' ' || event.code === 'Space') {
        // Si la tecla presionada es la barra espaciadora
        event.preventDefault(); // Prevenir la inserción del espacio
        var cursorPosition = this.selectionStart;
        var textBefore = this.value.substring(0, cursorPosition);
        var textAfter = this.value.substring(this.selectionEnd);
        this.value = textBefore + '\n' + textAfter;
        this.setSelectionRange(cursorPosition + 1, cursorPosition + 1);
    }
});





