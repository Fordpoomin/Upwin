$(function() {

    $('#qrcodes').hide();
    $('#qrcodes2').hide();
    // faculty
    $("#faculty").on("submit", function() {
        var form = $(this)[0];
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            var select_faculty = 99;
            var activity_name = $('#activity_name').val();
            var activity_date_finish = $('#activity_date_finish').val();

            console.log(select_faculty);
            console.log(activity_name);
            console.log(activity_date_finish);

            $.ajax({
                url: "./apis_system.php",
                type: "POST",
                dataType: "json",
                data: {
                    gen_qrcode: true,
                    user_id_genqrcode: userid,
                    select_faculty: select_faculty,
                    activity_name: activity_name,
                    activity_date_finish: activity_date_finish
                },
                success: function(data) {
                    console.log(data);

                    if (data.status == 200) {
                        if (data.result != "") {
                            $('#qr').show();
                            swal({
                                title: "สวัสดี",
                                text: "สร้าง QR Code เรียบร้อยแล้ว!",
                                icon: "success",
                                dangerMode: true,
                            }).then((value) => {
                                if (value) {
                                    $('#qrcodes').show();
                                    var urls = "http://192.168.0.11/webscan/web/scan.php?faculty=" + select_faculty +
                                        "/activity_name=" + activity_name +
                                        "/activity_date_finish=" + activity_date_finish +
                                        "/id=" + data.result;
                                    $('#srcs').attr('src', "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + urls);
                                }
                            });
                        }
                    } else {
                        swal({
                            title: "สวัสดี",
                            text: "สร้าง QR Code ไม่สำเร็จ!",
                            icon: "warning",
                            dangerMode: true,
                        }).then((value) => {
                            if (value) {
                                window.location.href = "manager_qrcode.php";
                            }
                        });
                    }
                }
            });
        }
        form.classList.add('was-validated');
    });


    // activity
    $("#activity").on("submit", function() {
        var form = $(this)[0];
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            var select_faculty = $('#select_faculty').val();
            var activity_name = "none";
            var activity_date_finish = "0000-00-00";

            console.log(select_faculty);
            console.log(activity_name);
            console.log(activity_date_finish);

            $.ajax({
                url: "./apis_system.php",
                type: "POST",
                dataType: "json",
                data: {
                    stats_check: true,
                    stats_id_check: select_faculty,
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        swal({
                            title: "สวัสดี",
                            text: "ไม่สามารถสร้าง QR code ได้ เนื่องจากมี QR code นี้อยู่แล้ว!",
                            icon: "warning",
                            dangerMode: true,
                        }).then((value) => {
                            if (value) {
                                window.location.href = "manager_qrcode.php";
                            }
                        });

                    } else {
                        $.ajax({
                            url: "./apis_system.php",
                            type: "POST",
                            dataType: "json",
                            data: {
                                gen_qrcode: true,
                                user_id_genqrcode: userid,
                                select_faculty: select_faculty,
                                activity_name: activity_name,
                                activity_date_finish: activity_date_finish
                            },
                            success: function(data) {
                                console.log(data);

                                if (data.status == 200) {
                                    if (data.result != "") {
                                        $('#qr').show();
                                        swal({
                                            title: "สวัสดี",
                                            text: "สร้าง QR Code เรียบร้อยแล้ว!",
                                            icon: "success",
                                            dangerMode: true,
                                        }).then((value) => {
                                            if (value) {

                                                // qrcode
                                                $('#qrcodes2').show();
                                                var urls = "http://192.168.0.11/webscan/web/scan.php?faculty=" + select_faculty +
                                                    "/activity_name=" + activity_name +
                                                    "/activity_date_finish=" + activity_date_finish +
                                                    "/id=" + data.result;
                                                $('#srcs2').attr('src', "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + urls);
                                            }
                                        });
                                    }
                                } else {
                                    swal({
                                        title: "สวัสดี",
                                        text: "สร้าง QR Code ไม่สำเร็จ!",
                                        icon: "warning",
                                        dangerMode: true,
                                    }).then((value) => {
                                        if (value) {
                                            window.location.href = "manager_qrcode.php";
                                        }
                                    });
                                }
                            }
                        });
                    }
                }
            });
        }
        form.classList.add('was-validated');
    });
});