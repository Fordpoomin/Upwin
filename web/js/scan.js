$(function() {

    var date_now = new Date().toISOString().replace('/', '-').split('T')[0].replace('/', '-');
    console.log("data_now: " + date_now);

    // get url split
    var url_local = window.location.href;
    var res_url = url_local.split("?");
    var faculty = res_url[1].split("/")[0].split("=")[1];
    var activity_name = res_url[1].split("/")[1].split("=")[1];
    var activity_date_finish = res_url[1].split("/")[2].split("=")[1];
    var history_id = res_url[1].split("/")[3].split("=")[1];


    $("#scan").on("submit", function() {
        var form = $(this)[0];
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            console.log("userid: " + userid);
            console.log("phone:" + phone);
            console.log("faculty:" + faculty);
            console.log("activity_name:" + decodeURIComponent(activity_name));
            console.log("activity_date_finish:" + activity_date_finish);
            console.log("history_id:" + history_id);

            if (date_now == activity_date_finish) {
                swal({
                    icon: "warning",
                    title: "ขออภัย!!",
                    text: "กิจกรรมจบแล้ว!",
                    dangerMode: true,
                }).then((value) => {
                    if (value) {
                        var url = window.location.href;
                        window.location.href = url;
                    }
                });
            } else {

                if ($('#accept').prop("checked") == true) {
                    console.log("checked");

                    $.ajax({
                        url: "./apis_system.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            scan_insert: true,
                            phone_insert: phone,
                            user_id_insert: userid,
                            faculty_insert: faculty,
                            activity_name_insert: decodeURIComponent(activity_name),
                            activity_date_finish_insert: activity_date_finish,
                            history_id_insert: history_id
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.status == 200) {
                                if (data.result == true) {
                                    swal({
                                        title: "สวัสดี!!",
                                        text: "ลงทะเบียนเรียบร้อยแล้ว!",
                                        icon: "success",
                                        dangerMode: true,
                                    }).then((value) => {
                                        if (value) {
                                            window.location.href = "main.php?faculty=" + faculty + "&activity_name=" + activity_name + "&activity_date_finish=" + activity_date_finish;
                                        }
                                    });
                                }
                            } else {
                                swal({
                                    title: "สวัสดี!!",
                                    text: "คุณได้ลงทะเบียนไว้ก่อนหน้านี้แล้ว สามารถเช็คอินได้เลย!",
                                    icon: "warning",
                                    dangerMode: true,
                                }).then((value) => {
                                    if (value) {
                                        window.location.href = "main.php?faculty=" + faculty + "&activity_name=" + activity_name + "&activity_date_finish=" + activity_date_finish;
                                    }
                                });
                            }
                        }
                    });
                }
            }
        }
        form.classList.add('was-validated');
    });
});