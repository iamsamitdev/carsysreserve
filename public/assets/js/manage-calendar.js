$(function(){

    var defaultEvents = [
        {
            title: 'Leanring Laravel',
            start:'2018-06-20',
            end: '2018-06-25',
            className: 'bg-info'
        },
        {
            title: 'Leanring Angular JS',
            start:'2018-06-28',
            end: '2018-06-30',
            className: 'bg-success'
        }
    ];

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
        events: defaultEvents
    });
});