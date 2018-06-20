$(function(){

    var baseAPIURL = "http://car-reserve.site/api/";
    
    /*
    var defaultEvents = [
        {
            title: 'Leanring Laravel',
            start:'2018-06-19 00:00:00',
            end: '2018-06-23 23:00:00',
            className: 'bg-info'
        },
        {
            title: 'Leanring Angular JS',
            start:'2018-06-28',
            end: '2018-06-30',
            className: 'bg-success'
        }
    ];
    */

    //defaultEvents = [{"title":"aaa","start":"2018-06-10 00:00:00","end":"2018-06-15 23:00:00"},{"title":"Seminar at Phuket","start":"2018-06-28 14:04:26","end":"2018-06-29 14:04:36"}];

    // Get event from API
   $.getJSON( baseAPIURL+"events", function(result) {
        $("#calendar").fullCalendar({
            defaultView: 'month',
            slotDuration: '00:30:00',
            minTime: '08:00:00',
            maxTime:'19:00:00',
            header:{
                left:'prev,next  today',
                center:'title',
                right: 'month,agendaWeek,agendaDay'
            },

            events:result.data,
            eventClick: function(ccalEvent, jsEvent, view) {
                $("#successModal").modal("show");
                $(".modal-title").text(ccalEvent.title);
                $(".modal-body h3").text('Resource ID: '+ccalEvent.id);
                $(".modal-body p").text('Description: '+ccalEvent.description);
            },

            displayEventTime: false,
            selectable: true,
            editable: false,
        
        });
    });
});