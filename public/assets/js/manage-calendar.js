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
    $.ajaxSetup({
        headers : {   
          'Authorization' : 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjZlNTQ4OTQ3OTA4MjBhZWY0ZWI0YjQxZGYwMDNkYmQ3MmM1ODI3Njc1NzUwZTgzMTk3YjkyZGNmMTRhODg3NDg2ZmVkYzE3MTIzZjRjMzU1In0.eyJhdWQiOiIxIiwianRpIjoiNmU1NDg5NDc5MDgyMGFlZjRlYjRiNDFkZjAwM2RiZDcyYzU4Mjc2NzU3NTBlODMxOTdiOTJkY2YxNGE4ODc0ODZmZWRjMTcxMjNmNGMzNTUiLCJpYXQiOjE1Mjk1MTM0OTgsIm5iZiI6MTUyOTUxMzQ5OCwiZXhwIjoxNTYxMDQ5NDk4LCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.i0wR06r1I_OBXGWNpNPLxPb282bRBm5p4t8ATl9TzTogaY-yvWMD1tBPegdLqoMTBZfPxEQszQ6OSg7hNbjBIozSXIiJUiUSnMoQjWC0H-ATRaymlE3qQpbLAiQg91YGnk8qIaeDw0u_wVE9YJlwqPb2izJ5bV9qoVBjLNslMhn7LY_ocNiBLHCJ6uIOh_yvNmKTmgfDF_dRCOOgNgvwuiqQC5kUP3Dx7rzXE0QEPJ2jV_JxntiXbvbMEC2fAy9NOipO4lJvYr8I8tjm8SKnRcTv9tf9XRHsHFgSYC58Yjt-a8fQzlpwZ1MLkI8qlxc0ScY87r2WevW-c7v3QDgPWX59JRTKMkKF2JIcleS1L70_Fii8vay2C-bJQhbO5rYWVEx775cp44tmk2e29S8AWJMIQmpLSN_6YDt7LF6OSHdw-eQ3-dd13IczhhGrzIUPS6dAg264Hx1VGiU-pJYZmPMJrymLAMUPhHzBlW3kWRA6Y1xuKR9ggmRKAQrMVlTLobeMEx1A6x8xctd7XUrl8uOrdfe-q6KcTa86VlTdihZIjpld76M9z2GaTDH1XOBak3WKW-oBjH1tLErHnWtINrauNUgZZNRvRJXZtilDLiWckWktOp_L7lsUBK6G6OHEiO5plVvdeSDt04F65r5Wt81HK_I-ulEZ9AY1Bsmk1QU',
          'Accept':'application/json'
        }
    });

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
