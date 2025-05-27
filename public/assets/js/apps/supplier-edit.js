$(document).ready(function() {


    //if click on the button add_contact add a new contact in listcontas
    $('#add_contact').click(function() {
        
                        //var $i aleatory number unique
                        var i = Math.floor(Math.random() * 1000000000);
                        //valor n is the number of contact  class contacitem
                        var n = $('.contacitem').length + 0;

                        // si es el primer contacto agregar checked
                        var checked = '';
                        if(n == 0){
                            checked = 'checked';
                        }

                        var contact_type_options = '<option value="">Type</option><option value="Home">Home</option><option value="Office">Office</option><option value="Direct">Direct</option><option value="Mobile">Mobile</option><option value="Fax">Fax</option>';
                        var html = '<div class="col-md-4 contacitem mb-3">'+
                                        '<div class="card p-1">'+
                                            //add remove button in button card float start width 20px
                                            '<button type="button" class="btn btn-danger p-0 btn-sm remove_contact">X</button>'+

                                            '<div class="card-body p-2">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="form-group row mt-1 mb-1">'+
                                                            '<label class="col-sm-4 col-form-label col-form-label-sm pe-0">Name:<span class="text-danger">*</span></label>'+
                                                            '<div class="col-sm-8">'+
                                                                '<input type="text" name="contact_name[]" class="form-control form-control-sm" placeholder="Type here">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group row  mb-1">'+
                                                            '<label class="col-sm-4 col-form-label col-form-label-sm pe-0">Position:</label>'+
                                                            '<div class="col-sm-8">'+
                                                                '<input type="text" name="contact_position[]" class="form-control form-control-sm" placeholder="Type here">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group row  mb-1">'+
                                                            '<label class="col-sm-4 col-form-label col-form-label-sm pe-0">Email:<span class="text-danger">*</span></label>'+
                                                            '<div class="col-sm-8">'+
                                                                '<input type="email" name="contact_email[]" class="form-control form-control-sm" placeholder="Type here">'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="form-group row  mb-1">'+
                                                            '<div class="col-sm-12">'+
                                                                '<div class="form-check">'+
                                                                    '<input class="form-check-input" type="radio" name="contact_main" value="'+n+'" id="contact_main'+i+'" '+checked+'>'+
                                                                    '<label class="form-check-label" for="contact_main'+i+'">'+
                                                                    'Is this a main contact?'+
                                                                    '</label>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+

                                                        '<hr class="p-0 mt-0 mb-2">'+
                                                        '<div class="form-group row  mb-1">'+
                                                            '<label class="col-sm-5 col-form-label col-form-label-sm pe-0">Telephone(s):</label>'+
                                                            '<div class="col-sm-7">'+
                                                                '<button type="button" class="btn btn-secondary mb-2 me-4 btn-sm add_contacttype">Add</button>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="listphonecontact">'+

                                                    '<div class="row itemcontact d-none">'+
                                                        '<div class="col-md-4 mb-2 pe-0">'+
                                                            '<select name="contact_typeone[]" class="form-control form-control-sm">'+
                                                                contact_type_options+
                                                            '</select>'+
                                                        '</div>'+
                                                        '<div class="col-md-6 mb-2 pe-1">'+
                                                            '<input type="text" name="contact_typeone_value[]" class="form-control form-control-sm" placeholder="Type Here">'+
                                                        '</div>'+
                                                        '<div class="col-md-2 mb-2 ps-1">'+
                                                            '<button type="button" class="btn btn-danger px-2 py-2 btn-sm d-none remove_contacttype">X</button>'+
                                                        '</div>'+
                                                    '</div>'+

                                                    '<div class="row itemcontact d-none">'+
                                                        '<div class="col-md-4 mb-2 pe-0">'+
                                                            '<select name="contact_typetwo[]" class="form-control form-control-sm">'+
                                                                contact_type_options+
                                                            '</select>'+
                                                        '</div>'+
                                                        '<div class="col-md-6 mb-2 pe-1">'+
                                                            '<input type="text" name="contact_typetwo_value[]" class="form-control form-control-sm" placeholder="Type Here">'+
                                                        '</div>'+
                                                        '<div class="col-md-2 mb-2 ps-1">'+
                                                            '<button type="button" class="btn btn-danger px-2 py-2 btn-sm d-none remove_contacttype">X</button>'+
                                                        '</div>'+
                                                    '</div>'+

                                                    '<div class="row itemcontact d-none">'+
                                                        '<div class="col-md-4 mb-2 pe-0">'+
                                                            '<select name="contact_typethree[]" class="form-control form-control-sm">'+
                                                                contact_type_options+
                                                            '</select>'+
                                                        '</div>'+
                                                        '<div class="col-md-6 mb-2 pe-1">'+
                                                            '<input type="text" name="contact_typethree_value[]" class="form-control form-control-sm" placeholder="Type Here">'+
                                                        '</div>'+
                                                        '<div class="col-md-2 mb-2 ps-1">'+
                                                            '<button type="button" class="btn btn-danger px-2 py-2 btn-sm d-none remove_contacttype">X</button>'+
                                                        '</div>'+
                                                    '</div>'+

                                                    '<div class="row itemcontact d-none">'+
                                                        '<div class="col-md-4 mb-2 pe-0">'+
                                                            '<select name="contact_typefour[]" class="form-control form-control-sm">'+
                                                                contact_type_options+
                                                            '</select>'+
                                                        '</div>'+
                                                        '<div class="col-md-6 mb-2 pe-1">'+
                                                            '<input type="text" name="contact_typefour_value[]" class="form-control form-control-sm" placeholder="Type Here">'+
                                                        '</div>'+
                                                        '<div class="col-md-2 mb-2 ps-1">'+
                                                            '<button type="button" class="btn btn-danger px-2 py-2 btn-sm d-none remove_contacttype">X</button>'+
                                                        '</div>'+
                                                    '</div>'+

                                                    '<div class="row itemcontact d-none">'+
                                                        '<div class="col-md-4 mb-2 pe-0">'+
                                                            '<select name="contact_typefive[]" class="form-control form-control-sm">'+
                                                                contact_type_options+
                                                            '</select>'+
                                                        '</div>'+
                                                        '<div class="col-md-6 mb-2 pe-1">'+
                                                            '<input type="text" name="contact_typefive_value[]" class="form-control form-control-sm" placeholder="Type Here">'+
                                                        '</div>'+
                                                        '<div class="col-md-2 mb-2 ps-1">'+
                                                            '<button type="button" class="btn btn-danger px-2 py-2 btn-sm d-none remove_contacttype">X</button>'+
                                                        '</div>'+
                                                    '</div>'+

                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';
        $('#listcontas').append(html);
    });

    //click remove_contact para eliminar col-md-4
    $(document).on('click', '.remove_contact', function() {
        $(this).parents('.col-md-4').remove();
        //chage value radio buton name contact_main
        var i = 0;
        $('input[name="contact_main"]').each(function() {
            $(this).val(i);
            i++;
        });
    });

    //if click on the button add_contacttype add a new contacttype in listphonecontact
    $(document).on('click', '.add_contacttype', function() {
        //mostrar itemcontact que esten ocultos
        $(this).parents('.card-body').find('.itemcontact:hidden').first().removeClass('d-none');

        //obtener el ultimo itemcontact visible
        var lastitemcontact = $(this).parents('.card-body').find('.itemcontact:visible').last();
        //mostrar el boton de eliminar en el ultimo itemcontact visible y ocultar en los demas
        $(this).parents('.card-body').find('.remove_contacttype').addClass('d-none');
        lastitemcontact.find('.remove_contacttype').removeClass('d-none');

        //ocultar add_contacttype si ya hay 5 itemcontact visibles
        var countitemcontact = $(this).parents('.card-body').find('.itemcontact:visible').length;
        if (countitemcontact == 5) {
            $(this).addClass('d-none');
        }else{
            $(this).removeClass('d-none');
        }

    });

    //if click on the button remove_contacttype remove the contacttype
    $(document).on('click', '.remove_contacttype', function() {
        $(this).parents('.itemcontact').addClass('d-none');

        //resetear selecy y limpiar input
        $(this).parents('.itemcontact').find('select').val('');
        $(this).parents('.itemcontact').find('input').val('');

        //obtener el ultimo itemcontact visible
        var lastitemcontact = $(this).parents('.card-body').find('.itemcontact:visible').last();
        //mostrar el boton de eliminar en el ultimo itemcontact visible y ocultar en los demas
        $(this).parents('.card-body').find('.remove_contacttype').addClass('d-none');
        lastitemcontact.find('.remove_contacttype').removeClass('d-none');

        //ocultar add_contacttype si ya hay 5 itemcontact visibles
        var countitemcontact = $(this).parents('.card-body').find('.itemcontact:visible').length;
        if (countitemcontact == 5) {
            $(this).parents('.card-body').find('.add_contacttype').addClass('d-none');
        }else{
            $(this).parents('.card-body').find('.add_contacttype').removeClass('d-none');
        }

    });


    // image previews, cropping, resizing, etc.
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation
    );
  
    // Inicializa FilePond en los campos de entrada de archivo correspondientes
    const documentOneInput = document.querySelector('.suppliers_document_one');
    const documentTwoInput = document.querySelector('.suppliers_document_two');
    const documentThreeInput = document.querySelector('.suppliers_document_three');

    FilePond.create(documentOneInput);
    FilePond.create(documentTwoInput);
    FilePond.create(documentThreeInput);

    FilePond.setOptions({
        server: {
            url: baseurl+'/upload',
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            }
        }
    });


    $('input[name="company_rating"]').change(function() {
        var selectedRating = parseInt($(this).val());

        $('input[name="company_rating"]').each(function() {
            var starLabel = $('label[for="' + $(this).attr('id') + '"]');
            var starValue = parseInt($(this).val());

            if (starValue <= selectedRating) {
                starLabel.addClass('active');
            } else {
                starLabel.removeClass('active');
            }
        });
    });


    //click country_id para mostrar estados
    $(document).on('change', 'select[name="country_id"]', function() {
        //get value country_id
        var country_id = $(this).val();
        //get states
        $.ajax({
            url: baseurl+'/getstates/'+country_id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                //console.log(response);
                var html = '<option value="">Select State...</option>';
                $.each(response, function(i, item) {
                    html += '<option value="'+item.id+'">'+item.name+'</option>';
                });
                $('select[name="state_id"]').html(html);
            }
        });
    });


});
