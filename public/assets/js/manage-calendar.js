$(function(){

    var baseAPIURL = "http://car-reserve.site/api/";
    var token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJkMmFkZjczMjE0NGYxNGIwZDNlYjQ2MTJjNDkwMTI0ZWRkNmY3ZDI4YzZlZmM2NmI2ZGFiYWQ4MjVlNGZkNTRlZjllYWI2ZTVmNmE1MDk2In0.eyJhdWQiOiIxIiwianRpIjoiMmQyYWRmNzMyMTQ0ZjE0YjBkM2ViNDYxMmM0OTAxMjRlZGQ2ZjdkMjhjNmVmYzY2YjZkYWJhZDgyNWU0ZmQ1NGVmOWVhYjZlNWY2YTUwOTYiLCJpYXQiOjE1Mjk2MzYzMjQsIm5iZiI6MTUyOTYzNjMyNCwiZXhwIjoxNTYxMTcyMzI0LCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.R_To5uZvzcbNDHF4hIDxTx6hj286fnp_FY7lWy2Ms_6E8EJktC4w2no1w02zkJ07QC7wXHTDLqhrhjKrWmho4b9QUP2Kt-utIsozXhnNrvxAJEKB-dgX1v6azqguerUsidIIapX0kh4RB3sCoXVuUdh8RBMlhSUaTNvnlIFvW3HmyJAhlRtgv7juJVYnwIgS0WY1NKnHAQIRjwD_pnnkdgPSuDaQ1FXpmCggOxYMI6yaZUuyjlyky9apamOHXEbBQPgekSLmp7Bh-AXb76TLkzT-Bj28WNzZljPpxiDxPcAgmtBVBiBfcMvbTIFkhBu23KxVwACN-GHB46kbZZi7YJVJvF0b4Tf73C9h0jTrNo83-fsC5APjet1bLdK-APVuu_hZtdxXC6OCH5YY9LUkLrbU8KMfKFdUC3r7Nt6a9qJLIIhlEGqsMRhW_f0n6QAiIr5jCZz8cTCxUmq17EyknWMpPROuXjUByvtuHRvkyQfJ77vkhdL8wusp_i_1aZknNAV8oTyoxjxhlc8WZtRGyjXLEHMoFeKQs8lRlsnxPXNgMthVOsEaS8ylvI1JZsyfi8AdVss7LppUAH5PibjVqZDvVflBRusIPvhba-Uz8jKvSmCY316tg6nj2-CdmseA4cEe3IlAywsqXLk8g-FFWq7Tjyu8ws8YpLYMgu1mhc0";
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
    // JSON GET API.
    $.ajaxSetup({
        headers :{
            'Authorization' : 'Bearer '+token,
            'Accept' : 'application/json'     
        }
    });

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