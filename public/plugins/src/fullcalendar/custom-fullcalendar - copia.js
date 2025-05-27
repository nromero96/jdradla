$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var booking = baseurl+'/calendar';
    $('#calendar').fullCalendar({
        header: {
            left: 'prev, next today',
            center: 'title',
            right: 'month, agendaWeek, agendaDay',
        },
        events: booking,
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDays) {
            $('#bookingModal').modal('toggle');
            $('#saveBtn').click(function() {
                var title = $('#title').val();
                var start_date = moment(start).format('YYYY-MM-DD');
                var end_date = moment(end).format('YYYY-MM-DD');
                $.ajax({
                    url:"{{ route('calendar.store') }}",
                    type:"POST",
                    dataType:'json',
                    data:{ title, start_date, end_date  },
                    success:function(response)
                    {
                        $('#bookingModal').modal('hide')
                        $('#calendar').fullCalendar('renderEvent', {
                            'title': response.title,
                            'start' : response.start,
                            'end'  : response.end,
                            'color' : response.color
                        });
                    },
                    error:function(error)
                    {
                        if(error.responseJSON.errors) {
                            $('#titleError').html(error.responseJSON.errors.title);
                        }
                    },
                });
            });
        },
        editable: true,
        eventDrop: function(event) {
            var id = event.id;
            var start_date = moment(event.start).format('YYYY-MM-DD');
            var end_date = moment(event.end).format('YYYY-MM-DD');
            $.ajax({
                    url:"{{ route('calendar.update', '') }}" +'/'+ id,
                    type:"PATCH",
                    dataType:'json',
                    data:{ start_date, end_date  },
                    success:function(response)
                    {
                        swal("Good job!", "Event Updated!", "success");
                    },
                    error:function(error)
                    {
                        console.log(error)
                    },
                });
        },
        eventClick: function(event){
            var id = event.id;
            if(confirm('Are you sure want to remove it')){
                $.ajax({
                    url:"{{ route('calendar.destroy', '') }}" +'/'+ id,
                    type:"DELETE",
                    dataType:'json',
                    success:function(response)
                    {
                        $('#calendar').fullCalendar('removeEvents', response);
                        // swal("Good job!", "Event Deleted!", "success");
                    },
                    error:function(error)
                    {
                        console.log(error)
                    },
                });
            }
        },
        selectAllow: function(event)
        {
            return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
        },
    });
    $("#bookingModal").on("hidden.bs.modal", function () {
        $('#saveBtn').unbind();
    });
    $('.fc-event').css('font-size', '13px');
    $('.fc-event').css('width', '20px');
    $('.fc-event').css('border-radius', '50%');
});