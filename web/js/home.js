$(function() {

    // faculty
    $('#qrcodes').hide();
    $("#faculty").on("submit", function() {
        var form = $(this)[0];
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            var select_faculty = $('#select_faculty').val();
            console.log("select_faculty:" + select_faculty);

            $.ajax({
                url: "./apis_system.php",
                type: "POST",
                dataType: "json",
                data: {
                    count_faculty: true,
                    select_faculty_count: select_faculty
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        document.getElementById('count_checkin').innerText = data.count_checkin;
                        document.getElementById('count_checkout').innerText = data.count_checkout;
                    } else {
                        document.getElementById('count_checkin').innerText = 0;
                        document.getElementById('count_checkout').innerText = 0;
                    }
                }
            });
        }
    });

    //  activity
    $("#activity").on("submit", function() {
        var form = $(this)[0];
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            var select_activity = $('#select_activity').val();
            console.log("select_activity:" + select_activity);

            $.ajax({
                url: "./apis_system.php",
                type: "POST",
                dataType: "json",
                data: {
                    count_activity: true,
                    select_activity_count: select_activity
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        document.getElementById('count_checkin').innerText = data.count_checkin;
                        document.getElementById('count_checkout').innerText = data.count_checkout;
                    } else {
                        document.getElementById('count_checkin').innerText = 0;
                        document.getElementById('count_checkout').innerText = 0;
                    }
                }
            });
        }
    });

    // qrcodehistory
    $("#qrcodehistory").on("submit", function() {
        var form = $(this)[0];
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            var history_id = $('#history_id').val();
            console.log("history_id:" + history_id);

            $.ajax({
                url: "./apis_system.php",
                type: "POST",
                dataType: "json",
                data: {
                    search_qr: true,
                    history_id: history_id,
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        swal({
                            title: "สวัสดี!!",
                            text: "ดึงข้อมูลเรียบร้อยแล้ว!",
                            icon: "success",
                            dangerMode: true,
                        }).then((value) => {
                            if (value) {
                                // qrcode
                                $('#qrcodes').show();

                                if (data.result.activity_name == "none") {
                                    document.getElementById('get_faculty_name').innerText = "คณะ: " + data.result.faculty_name;
                                    document.getElementById('get_activity_date_finish').innerText = "วันที่สิ้นสุด: " + data.result.date_finish;
                                } else {
                                    document.getElementById('get_activity_name').innerText = "กิจกรรม: " + data.result.activity_name;
                                    document.getElementById('get_activity_date_finish').innerText = "วันที่สิ้นสุด: " + data.result.date_finish;
                                }
                                var urls = "http://192.168.0.11/webscan/web/scan.php?faculty=" + data.result.faculty_id +
                                    "/activity_name=" + data.result.activity_name +
                                    "/activity_date_finish=" + data.result.date_finish +
                                    "/id=" + data.result.history_id;
                                $('#srcs').attr('src', "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + urls);

                            }
                        });
                    }
                }
            });
        }
    });

});