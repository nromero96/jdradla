document.addEventListener('DOMContentLoaded', function () {
    const btnrequestcomprobante = document.querySelector('.btnrequestcompr');

    if(btnrequestcomprobante){
            btnrequestcomprobante.addEventListener('click', function () {
            // Bloquear el enlace y cambiar el texto
            btnrequestcomprobante.classList.add('btn-disabled');
            btnrequestcomprobante.innerHTML = 'Solicitando...';

            const inscription_id = this.getAttribute('data-inscription');
            const token = document.head.querySelector('meta[name="csrf-token"]').content;

            fetch(`/inscriptions-request-comprobante/${inscription_id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    _token: token,
                }),
            })
            .then(function (response) {
                return response.json(); // Leer la respuesta como JSON
            })
            .then(function (data) {
                // La variable "data" ahora contiene la respuesta JSON desde Laravel
                console.log(data);

                // Puedes decidir si necesitas recargar la página o realizar alguna otra acción

                // Verificar si la respuesta es 'ok'
                if (data.status === 'ok') {
                    // id actionbtncompr div para mostrar mensaje de exito
                    const actionbtncompr = document.getElementById('actionbtncompr');

                    // Mostrar mensaje de éxito actionbtncompr
                    actionbtncompr.innerHTML = `
                        <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
                            <strong>¡Solicitud enviada!</strong><br>
                            <small>El servidor de facturación está procesando su solicitud, en breve recibirá un correo electrónico.</small>
                        </div>
                    `;

                }

                // El botón seguirá bloqueado

            })
            .catch(function (error) {
                console.error('Error:', error);
                // Manejar el error si es necesario

                // Desbloquear el enlace y restaurar el texto original en caso de error
                btnrequestcomprobante.classList.remove('btn-disabled');
                btnrequestcomprobante.innerHTML = 'Texto original del botón';
            });
        });
    }


    //print ficha inscripcion with printjs and html2canvas
    document
    .querySelector(".btnprintficha")
    .addEventListener("click", function (event) {

        event.preventDefault();

        const elementToCapture = document.querySelector(".ficha-inscripcion");

        const ignoreElements = function (element) {
            // Retorna true para excluir el elemento con la clase 'actionstatus', 'btnprintficha', 'btneditinsc'
            return element.classList.contains("actionstatus") || element.classList.contains("btnprintficha") || element.classList.contains("btneditinsc");

        };

        html2canvas(elementToCapture, {
            ignoreElements: ignoreElements,
        }).then(function (canvas) {
            const image = canvas.toDataURL("image/png");

            printJS({
                printable: image,
                type: "image",
                onPrintDialogClose: function () {
                    // Aquí puedes realizar acciones adicionales después de que se cierra el diálogo de impresión
                },
            });
        });
    });



});





