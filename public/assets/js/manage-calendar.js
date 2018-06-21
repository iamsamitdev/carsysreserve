$(function(){

    var baseAPIURL = "http://car-reserve.site/api/";
    /*
    var defaultEvents = [
        {
            title: 'Leanring Laravel',
            start:'2018-06-20 20:30:00',
            end: '2018-06-25 10:20:00',
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
    // JSON GET API
    $.getJSON(baseAPIURL+"events",function(result){
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
                events: result.data,
                eventClick: function(calEvent, jsEvent, view){
                    $("#detailModal").modal("show");
                    $("#detailModal .modal-title").text(calEvent.title);
                    $("#detailModal .modal-body").text(calEvent.description);
                },
                displayEventTime: true,
                selectable: true,
                editable: false,
                timeFormat: 'H(:mm)' // 24 hr.
            });
        //console.log(result.data);
        //alert(JSON.stringify(result.data));
    }); // getJSON


    // เรียกใช้ปฎิทินย่อยในฟอร์ม
    $('.mydatepicker').datetimepicker({
        format:'YYYY-MM-DD HH:mm:ss',
    });


    // เขียนการรับค่าจากฟอร์ม event ส่งไปยัง API
    $('#btn_submit').click(function(){

        $.ajax({
            url:baseAPIURL+"events",
            type:"POST",
            data:{
                title:$('#title').val(),
                description:$('#description').val(),
                start:$('#start').val(),
                end:$('#end').val(),
                className:$('#className').val(),
                status:$('#status').val()
            },
            beforeSend:function() { 
                $("button#btn_submit").attr('disabled',true); // ปิดการทำงานของปุ่ม
            },
            success: function(data){
                alert(data.message);
                // เคลียร์ค่าในฟอร์ม
                $('#addevent_form').trigger('reset');
                $("button#btn_submit").attr('disabled',false); // เปิดการทำงานของปุ่ม

                // ปิดฟอร์ม
                $('#modal-add-event').on('hide.bs.modal', function (e) {
                    window.location.href = 'calendars';
                });
            }
        });
        
    });
});