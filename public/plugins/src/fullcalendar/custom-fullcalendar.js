document.addEventListener('DOMContentLoaded', function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Date variable
    var newDate = new Date();

    /** 
     * 
     * @getDynamicMonth() fn. is used to validate 2 digit number and act accordingly 
     * 
    */    
    function getDynamicMonth() {
        getMonthValue = newDate.getMonth();
        _getUpdatedMonthValue = getMonthValue + 1;
        if (_getUpdatedMonthValue < 10) {
            return `0${_getUpdatedMonthValue}`;
        } else {
            return `${_getUpdatedMonthValue}`;
        }
    }

    // Modal Elements
    var getModalTitleEl = document.querySelector('#event-title');
    var getModalStartDateEl = document.querySelector('#event-start-date');
    var getModalEndDateEl = document.querySelector('#event-end-date');
    var getModalAddBtnEl = document.querySelector('.btn-add-event');
    var getModalUpdateBtnEl = document.querySelector('.btn-update-event');

    var getModalDeleteBtnEl = document.querySelector('.action-delete');

    var calendarsEvents = {
        Work: 'primary',
        Personal: 'success',
        Important: 'danger',
        Travel: 'warning',
    }

    // Calendar Elements and options
    var calendarEl = document.querySelector('.calendar');

    var checkWidowWidth = function() {
        if (window.innerWidth <= 1199) {
            return true;
        } else {
            return false;
        }
    }
    
    var calendarHeaderToolbar = {
        left: 'prev next addEventButton',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    }


    // Calendar Select fn.
    var calendarSelect = function(info) {
        var mistrdate = new Date(info.startStr);
        var dd = String(mistrdate.getDate() + 1).padStart(2, '0');
        var mm = String(mistrdate.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = mistrdate.getFullYear();
        var combinestarDate = `${yyyy}-${mm}-${dd} 00:00:00`;

        var mienddate = new Date(info.endStr);
        var dd = String(mienddate.getDate() + 1).padStart(2, '0');
        var mm = String(mienddate.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = mienddate.getFullYear();
        var combineendDate = `${yyyy}-${mm}-${dd} 00:00:00`;

        getModalAddBtnEl.style.display = 'block';
        getModalUpdateBtnEl.style.display = 'none';
        getModalDeleteBtnEl.style.display = 'none';
        myModal.show()
        getModalStartDateEl.value = combinestarDate;
        getModalEndDateEl.value = combineendDate;
    }

    // Calendar AddEvent fn.
    var calendarAddEvent = function() {
        var currentDate = new Date();
        var dd = String(currentDate.getDate()).padStart(2, '0');
        var mm = String(currentDate.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = currentDate.getFullYear();
        var combineDate = `${yyyy}-${mm}-${dd} 00:00:00`;
        getModalAddBtnEl.style.display = 'block';
        getModalUpdateBtnEl.style.display = 'none';
        getModalDeleteBtnEl.style.display = 'none';
        myModal.show();
        getModalStartDateEl.value = combineDate;
    }

    // Calendar eventClick fn.
    var calendarEventClick = function(info) {
        var eventObj = info.event;
        if (eventObj.url) {
            window.open(eventObj.url);
            info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
        } else {
            var getModalEventId = eventObj._def.publicId;

            var mistrdate = new Date(eventObj.start);
            var dd = String(mistrdate.getDate()).padStart(2, '0');
            var mm = String(mistrdate.getMonth() + 1).padStart(2, '0');
            var yyyy = mistrdate.getFullYear();
            var hh =  String(mistrdate.getHours()).padStart(2, '0');
            var min =  String(mistrdate.getMinutes()).padStart(2, '0');
            var ss =  String(mistrdate.getSeconds()).padStart(2, '0');
            var combinestarDate = `${yyyy}-${mm}-${dd} ${hh}:${min}:${ss}`;
            getModalStartDateEl.value = combinestarDate;

            var mienddate = new Date(eventObj.end);
            var dd = String(mienddate.getDate()).padStart(2, '0');
            var mm = String(mienddate.getMonth() + 1).padStart(2, '0');
            var yyyy = mienddate.getFullYear();
            var hh =  String(mienddate.getHours()).padStart(2, '0');
            var min =  String(mienddate.getMinutes()).padStart(2, '0');
            var ss =  String(mienddate.getSeconds()).padStart(2, '0');
            var combineendDate = `${yyyy}-${mm}-${dd} ${hh}:${min}:${ss}`;
            getModalEndDateEl.value = combineendDate;

            var getModalEventLevel = eventObj._def.extendedProps['calendar'];
            var getModalCheckedRadioBtnEl = document.querySelector(`input[value="${getModalEventLevel}"]`);

            getModalTitleEl.value = eventObj.title;
            getModalCheckedRadioBtnEl.checked = true;
            getModalUpdateBtnEl.setAttribute('data-fc-event-public-id', getModalEventId);
            getModalDeleteBtnEl.setAttribute('data-fc-event-public-id', getModalEventId);
            getModalAddBtnEl.style.display = 'none';
            getModalUpdateBtnEl.style.display = 'block';
            getModalDeleteBtnEl.style.display = 'block';
            myModal.show();
        }
    }

    // Activate Calender    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        height: checkWidowWidth() ? 900 : 1052,
        initialView: checkWidowWidth() ? 'listWeek' : 'dayGridMonth',
        initialDate: `${newDate.getFullYear()}-${getDynamicMonth()}-07`,
        headerToolbar: calendarHeaderToolbar,
        events: baseurl+'/calendar-listevents',
        select: calendarSelect,
        unselect: function() {
            console.log('unselected')
        },
        customButtons: {
            addEventButton: {
                text: 'Add Event',
                click: calendarAddEvent
            }
        },
        eventClassNames: function ({ event: calendarEvent }) {
            const getColorValue = calendarsEvents[calendarEvent._def.extendedProps.calendar];
            return [
                // Background Color
                'event-fc-color fc-bg-' + getColorValue
            ];
        },

        eventClick: calendarEventClick,
        windowResize: function(arg) {
            if (checkWidowWidth()) {
                calendar.changeView('listWeek');
                calendar.setOption('height', 900);
            } else {
                calendar.changeView('dayGridMonth');
                calendar.setOption('height', 1052);
            }
        }

    });

    // Add Event
    getModalAddBtnEl.addEventListener('click', function() {

        var getModalCheckedRadioBtnEl = document.querySelector('input[name="event-level"]:checked');
        var getTitleValue = getModalTitleEl.value;
        var setModalStartDateValue = getModalStartDateEl.value;
        var setModalEndDateValue = getModalEndDateEl.value;
        var getModalCheckedRadioBtnValue = (getModalCheckedRadioBtnEl !== null) ? getModalCheckedRadioBtnEl.value : '';

        $.ajax({
            url: baseurl + "/calendar-ajax",
            data: {
                title: getTitleValue,
                tag: getModalCheckedRadioBtnValue,
                start: setModalStartDateValue,
                end: setModalEndDateValue,
                type: 'add'
            },
            type: "POST",
            success: function (data) {
                myModal.hide();
                location.reload();
            }
        });

    })



    // Update Event
    getModalUpdateBtnEl.addEventListener('click', function() {
        var getPublicID = this.dataset.fcEventPublicId;
        var getTitleUpdatedValue = getModalTitleEl.value;
        var setModalStartDateValue = getModalStartDateEl.value;
        var setModalEndDateValue = getModalEndDateEl.value;

        var getModalUpdatedCheckedRadioBtnEl = document.querySelector('input[name="event-level"]:checked');
        var getModalUpdatedCheckedRadioBtnValue = (getModalUpdatedCheckedRadioBtnEl !== null) ? getModalUpdatedCheckedRadioBtnEl.value : '';

        //var getEvent = calendar.getEventById(getPublicID);
        //getEvent.setProp('title', getTitleUpdatedValue);
        //getEvent.setExtendedProp('calendar', getModalUpdatedCheckedRadioBtnValue);


        $.ajax({
            url: baseurl + "/calendar-ajax",
            data: {
                id: getPublicID,
                title: getTitleUpdatedValue,
                tag: getModalUpdatedCheckedRadioBtnValue,
                start: setModalStartDateValue,
                end: setModalEndDateValue,
                type: 'update'
            },
            type: "POST",
            success: function (data) {
                myModal.hide();
                location.reload();
            }
        });

    });

    // Delete Event
    getModalDeleteBtnEl.addEventListener('click', function() {
        var getPublicID = this.dataset.fcEventPublicId;

        var eventDelete = confirm("Are you sure?");
        if(eventDelete){
            $.ajax({
                url: baseurl + "/calendar-ajax",
                data: {
                    id: getPublicID,
                    type: 'delete'
                },
                type: "POST",
                success: function (data) {
                    myModal.hide();
                    location.reload();
                }
            });
        }
    });

    // Calendar Renderation
    calendar.render();
    
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
    var modalToggle = document.querySelector('.fc-addEventButton-button ')

    document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function (event) {
        getModalTitleEl.value = '';
        getModalStartDateEl.value = '';
        getModalEndDateEl.value = '';
        var getModalIfCheckedRadioBtnEl = document.querySelector('input[name="event-level"]:checked');
        if (getModalIfCheckedRadioBtnEl !== null) { getModalIfCheckedRadioBtnEl.checked = false; }
    })
});