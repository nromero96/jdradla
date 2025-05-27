$(document).ready(function() {

  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

    //if click advancedfilter open modal filterModal
    $('#advancedfilter').click(function() {
        $('#filterModal').modal('show');
    });

    checkall('contact-check-all', 'contact-chkbox');
  
    $('#input-search').on('keyup', function() {
      var rex = new RegExp($(this).val(), 'i');
        $('.searchable-items .items:not(.items-header-section)').hide();
        $('.searchable-items .items:not(.items-header-section)').filter(function() {
            return rex.test($(this).text());
        }).show();
    });
  
    $('.view-grid').on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
  
      $(this).parents('.switch').find('.view-list').removeClass('active-view');
      $(this).addClass('active-view');
  
      $(this).parents('.searchable-container').removeClass('list');
      $(this).parents('.searchable-container').addClass('grid');
  
      $(this).parents('.searchable-container').find('.searchable-items').removeClass('list');
      $(this).parents('.searchable-container').find('.searchable-items').addClass('grid');
  
    });
  
    $('.view-list').on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
      $(this).parents('.switch').find('.view-grid').removeClass('active-view');
      $(this).addClass('active-view');
  
      $(this).parents('.searchable-container').removeClass('grid');
      $(this).parents('.searchable-container').addClass('list');
  
      $(this).parents('.searchable-container').find('.searchable-items').removeClass('grid');
      $(this).parents('.searchable-container').find('.searchable-items').addClass('list');
    });
  
    $('#btn-add-contact').on('click', function(event) {
      $('#addContactModal #btn-add').show();
      $('#addContactModal #btn-edit').hide();
      $('#addContactModal').modal('show');
    })
  
    function deleteContact() {
      $(".delete").on('click', function(event) {
        event.preventDefault();
    
        // Obtener el atributo idsup
        var idsup = $(this).attr('idsup');
    
        //confirmar con el usuario
        var confirmacion = confirm('Are you sure to delete this supplier?');

        if (confirmacion) {

          // Eliminar mediante AJAX
        $.ajax({
          url: baseurl+'/suppliers/' + idsup,
          type: 'POST',
          dataType: 'json',
          data: {
            _method: 'DELETE'
          },
          success: function(data) {
            if (data.status == 'success') {
              // Remover el elemento de la lista con el atributo idsup
              $('[idsup=' + idsup + ']').parents('.items').remove();
              
            } else {
              // Mostrar mensaje de error
              alert('Ocurrió un error al eliminar el contacto');
            }
          }
        });

        } else {
          return false;
        }
        
      });
    }
    
  
  $('#addContactModal').on('hidden.bs.modal', function (e) {
      var $_name = document.getElementById('c-name');
      var $_email = document.getElementById('c-email');
      var $_occupation = document.getElementById('c-occupation');
      var $_phone = document.getElementById('c-phone');
      var $_location = document.getElementById('c-location');
      var $_getValidationField = document.getElementsByClassName('validation-text');
  
      var $_setNameValueEmpty = $_name.value = '';
      var $_setEmailValueEmpty = $_email.value = '';
      var $_setOccupationValueEmpty = $_occupation.value = '';
      var $_setPhoneValueEmpty = $_phone.value = '';
      var $_setLocationValueEmpty = $_location.value = '';
  
      for (var i = 0; i < $_getValidationField.length; i++) {
        e.preventDefault();
        $_getValidationField[i].style.display = 'none';
      }
  })
  
  function editContact() {
    $('.edit').on('click', function(event) {
      // Obtener el atributo 'url'
      var url = $(this).attr('url');
      // Redirigir a la URL
      window.location.href = url;
    });
  }

  function showContact() {
    $('.show').on('click', function(event) {
      // Obtener el atributo 'url'
      var url = $(this).attr('url');
      // Redirigir a la URL
      window.location.href = url;
    });
  }
  
  $(".delete-multiple").on("click", function() {
      var inboxCheckboxParents = $(".contact-chkbox:checked").parents('.items');   
        inboxCheckboxParents.remove();
  });
  
  deleteContact();
  editContact();
  showContact();
  
  })
  
  
  // Validation Process
  
  var $_getValidationField = document.getElementsByClassName('validation-text');
  var reg = /^.+@[^\.].*\.[a-z]{2,}$/;
  var phoneReg = /^\d{10}$/;
  
  getNameInput = document.getElementById('c-name');
  
  getNameInput.addEventListener('input', function() {
  
    getNameInputValue = this.value;
  
    if (getNameInputValue == "") {
      $_getValidationField[0].innerHTML = 'Name Required';
      $_getValidationField[0].style.display = 'block';
    } else {
      $_getValidationField[0].style.display = 'none';
    }
  
  })
  
  
  getEmailInput = document.getElementById('c-email');
  
  getEmailInput.addEventListener('input', function() {
  
      getEmailInputValue = this.value;
  
      if (getEmailInputValue == "") {
        $_getValidationField[1].innerHTML = 'Email Required';
        $_getValidationField[1].style.display = 'block';
      } else if((reg.test(getEmailInputValue) == false)) {
        $_getValidationField[1].innerHTML = 'Invalid Email';
        $_getValidationField[1].style.display = 'block';
      } else {
        $_getValidationField[1].style.display = 'none';
      }
  
  })
  
  getPhoneInput = document.getElementById('c-phone');
  
  getPhoneInput.addEventListener('input', function() {
  
    getPhoneInputValue = this.value;
  
    if (getPhoneInputValue == "") {
      $_getValidationField[2].innerHTML = 'Phone Number Required';
      $_getValidationField[2].style.display = 'block';
    } else if((phoneReg.test(getPhoneInputValue) == false)) {
      $_getValidationField[2].innerHTML = 'Invalid (Enter 10 Digits)';
      $_getValidationField[2].style.display = 'block';
    } else {
      $_getValidationField[2].style.display = 'none';
    }
  
  })
  

  /**
* 
* Service List
*  
**/ 
var inputElm = document.querySelector('input[name=services_list]');

function tagTemplate(tagData) {
  return `
    <tag title="${tagData.servicecategory}"
            contenteditable='false'
            spellcheck='false'
            tabIndex="-1"
            class="tagify__tag ${tagData.class ? tagData.class : ""}"
            ${this.getAttributes(tagData)} >
        <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
        <div>
            <div class='tagify__tag__avatar-wrap'>
                <img onerror="this.style.visibility='hidden'" src="https://www.latinamericancargo.com/wp-content/themes/lac_tema_2023/assets/res/img/icons/icon-hand.svg">
            </div>
            <span class='tagify__tag-text'>${tagData.name}</span>
        </div>
    </tag>
  `;
}

function suggestionItemTemplate(tagData) {
  return `
    <div ${this.getAttributes(tagData)}
        class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
        tabindex="0"
        role="option">
        <div class='tagify__dropdown__item__avatar-wrap'>
            <img onerror="this.style.visibility='hidden'" src="https://www.latinamericancargo.com/wp-content/themes/lac_tema_2023/assets/res/img/icons/icon-hand.svg">
        </div>
        <strong>${tagData.name}</strong>
        <span>${tagData.servicecategory}</span>
    </div>
  `;
}

// initialize Tagify on the above input node reference
var usrList = new Tagify(inputElm, {
  tagTextProp: 'name',
  enforceWhitelist: true,
  skipInvalid: true,
  dropdown: {
    closeOnSelect: false,
    enabled: 0,
    classname: 'users-list',
    searchKeys: ['name']
  },
  templates: {
    tag: tagTemplate,
    dropdownItem: suggestionItemTemplate
  },
  whitelist: []
});

usrList.on('dropdown:show dropdown:updated', onDropdownShow);
usrList.on('dropdown:select', onSelectSuggestion);

var addAllSuggestionsElm;

function onDropdownShow(e) {
  var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

  if (usrList.suggestedListItems.length > 1) {
    addAllSuggestionsElm = getAddAllSuggestionsElm();
    dropdownContentElm.insertBefore(addAllSuggestionsElm, dropdownContentElm.firstChild);
  } else {
    dropdownContentElm.innerHTML = 'No whitelist data available.';
  }
}

function onSelectSuggestion(e) {
  if (e.detail.elm == addAllSuggestionsElm) {
    usrList.dropdown.selectAll();
  }
}

function getAddAllSuggestionsElm() {
  return usrList.parseTemplate('dropdownItem', [{
    class: "addAll",
    name: "Add all",
    servicecategory: usrList.whitelist.reduce(function(remainingSuggestions, item) {
      return usrList.isTagDuplicate(item.idservice) ? remainingSuggestions : remainingSuggestions + 1;
    }, 0) + " Services"
  }]);
}

function fetchWhitelistData(serviceCategoryId) {
  return fetch(`/getWhitelistData/${serviceCategoryId}`)
    .then(function(response) {
      return response.json();
    });
}

var selectElm = document.querySelector('select[name=servicecategory_id]');
selectElm.addEventListener('change', function() {
  var serviceCategoryId = selectElm.value;
  fetchWhitelistData(serviceCategoryId).then(function(data) {
    usrList.settings.whitelist = data;
    usrList.dropdown.hide();
  });

  //#listroutes RESET VALUES INPUT, SELECT AND TAGS
  $('#listroutes').find('input[type="text"], input[type="number"], input[type="date"], select').val('');
  $('#listroutes').find('input[type="checkbox"]').prop('checked', false);
  usrList.removeAllTags();

  if(serviceCategoryId == '4'){
    $('#btnaddroute').addClass('d-none');
    $('#btnaddlocation').removeClass('d-none');

    $('#dvcol_origen').removeClass('d-none');
    $('#dvcol_origen .form-label').addClass('d-none');
    $('#dvcol_destination').addClass('d-none');
    $('#dvcol_destination .form-label').addClass('d-none');

  }else{
    $('#btnaddroute').removeClass('d-none');
    $('#btnaddlocation').addClass('d-none');

    $('#dvcol_origen, #dvcol_origen .form-label').removeClass('d-none');
    $('#dvcol_destination, #dvcol_destination .form-label').removeClass('d-none');
  }
});

$.ajax({
  url: baseurl + '/getcrossing/' + '142',
  type: 'GET',
  success: function(data) {
      if (data.length > 0) {
          var html = '<option value="">Crossing...</option>';
          data.forEach(element => {
              html += '<option value="' + element.id + '">' + element.crossing_name + '</option>';
          });
          $('select[name="crossing"]').html(html);
      }
  }
});

//click in origin_country_id[] select add state select
$(document).on('change', 'select[name="origin_country_id"]', function() {
  var country_id = $(this).val();
  var routeitem = $(this).closest('.routeitem');
  $.ajax({
      url: baseurl + '/getstates/' + country_id,
      type: 'GET',
      success: function(data) {
          if (data.length > 0) {
              var html = '<option value="">State...</option>';
              data.forEach(element => {
                  html += '<option value="' + element.id + '">' + element.name + '</option>';
              });
              routeitem.find('select[name="origin_state_id"]').html(html);
              crossinglist_mex_cana_usa(routeitem);
          } else {
              routeitem.find('select[name="origin_state_id"]').html('<option value="">No state</option>');
          }
      }
  });
});

function crossinglist_mex_cana_usa(routeitem){

  var serviceCategoryId = $('select[name="servicecategory_id"]').val();
  var servicesList = JSON.parse($('input[name="services_list"]').val() || '[]');

  var hasValue24 = servicesList.some(function(service) {
      return service.value === '24';
  });


  var CountryOriginId = routeitem.find('select[name="origin_country_id"]').val();
  var CountryDestinationId = routeitem.find('select[name="destination_country_id"]').val();

  if(serviceCategoryId == '1'){
      
      if ((CountryOriginId === '142' && (CountryDestinationId === '38' || CountryDestinationId === '231')) || ((CountryOriginId === '38' || CountryOriginId === '231') && CountryDestinationId === '142')) {
          $.ajax({
              url: baseurl + '/getcrossing/' + '142',
              type: 'GET',
              success: function(data) {
                  if (data.length > 0) {
                      var html = '<option value="">Crossing...</option>';
                      data.forEach(element => {
                          html += '<option value="' + element.id + '">' + element.crossing_name + '</option>';
                      });
                      routeitem.find('select[name="crossing"]').html(html);
                      routeitem.find('.rowcrossing').removeClass('d-none');
                  }
              }
          });
      } else {
          html = '<option value="">Crossing...</option>';
          routeitem.find('select[name="crossing"]').html(html);
          routeitem.find('.rowcrossing').addClass('d-none');
      }
      
  }

  if(hasValue24){
      if (CountryOriginId === '142' ) {
          $.ajax({
              url: baseurl + '/getcrossing/' + '142',
              type: 'GET',
              success: function(data) {
                  if (data.length > 0) {
                      var html = '<option value="">Crossing...</option>';
                      data.forEach(element => {
                          html += '<option value="' + element.id + '">' + element.crossing_name + '</option>';
                      });
                      routeitem.find('select[name="crossing"]').html(html);
                      routeitem.find('.rowcrossing').removeClass('d-none');
                  }
              }
          });
      } else {
              html = '<option value="">Crossing...</option>';
              routeitem.find('select[name="crossing"]').html(html);
              routeitem.find('.rowcrossing').addClass('d-none');
      }
  }
}

//click in destination_country_id[] select add state select
$(document).on('change', 'select[name="destination_country_id"]', function() {
  var country_id = $(this).val();
  var routeitem = $(this).closest('.routeitem');
  $.ajax({
      url: baseurl + '/getstates/' + country_id,
      type: 'GET',
      success: function(data) {
          if (data.length > 0) {
              var html = '<option value="">State...</option>';
              data.forEach(element => {
                  html += '<option value="' + element.id + '">' + element.name + '</option>';
              });
              routeitem.find('select[name="destination_state_id"]').html(html);
              crossinglist_mex_cana_usa(routeitem);
          } else {
              routeitem.find('select[name="destination_state_id"]').html('<option value="">No state</option>');
          }
      }
  });
});

//click btn_apply_filter to apply filter
$(document).on('click', '#btn_apply_filter', function() {

  var rating_supplier = $('select[name="rating_supplier"]').val();
  var servicecategory_id = $('select[name="servicecategory_id"]').val();
  var services_list = $('input[name="services_list"]').val();
  var servicios = services_list.trim(); // Elimina los espacios en blanco al inicio y al final

  if (servicios) {
    var servicios_parsed = JSON.parse(servicios);
    var services_list = servicios_parsed.map(servicio => servicio.value).join(',');
  } else {
    var services_list = '';
  }

  var origin_country_id = $('select[name="origin_country_id"]').val();
  var origin_state_id = $('select[name="origin_state_id"]').val();
  var origin_city = $('input[name="origin_city"]').val();

  var destination_country_id = $('select[name="destination_country_id"]').val();
  var destination_state_id = $('select[name="destination_state_id"]').val();
  var destination_city = $('input[name="destination_city"]').val();

  var crossing = $('select[name="crossing"]').val();

  //validate return_route if checkbox is checked
  if($('input[name="return_route"]').is(':checked')){
    return_route = 1;
  }else{
    return_route = '';
  }


  //empaqueta datos para enviar
  var databyfilter = 'rating_supplier='+rating_supplier+'&servicecategory_id='+servicecategory_id+'&services_list='+services_list+'&origin_country_id='+origin_country_id+'&origin_state_id='+origin_state_id+'&origin_city='+origin_city+'&destination_country_id='+destination_country_id+'&destination_state_id='+destination_state_id+'&destination_city='+destination_city+'&crossing='+crossing+'&return_route='+return_route;

  //redirect url
  var url = baseurl + '/suppliers?search=sp&' + databyfilter;

  //redirect url
  window.location.href = url;
});

initializeTooltips();
function initializeTooltips() {
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
  });
}
