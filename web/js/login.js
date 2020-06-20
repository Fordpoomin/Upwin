$(function() {
    $("#logins").on("submit", function() {
        var form = $(this)[0];
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            var id = $('#input_id').val();
            var phone = $('#input_phone').val();
            // var faculty = $('#select_faculty').val();

            console.log(id);
            console.log(phone);


            $.ajax({
                url: "./apis_system.php",
                type: "POST",
                dataType: "json",
                data: {
                    login: true,
                    id: id,
                    phone: phone
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        if (data.result == true) {
                            swal({
                                title: "สวัสดี",
                                text: "ยินดีต้อนรับ!",
                                icon: "success",
                                // buttons: true,
                                dangerMode: true,
                            }).then((value) => {
                                if (value) {
                                    window.location.href = "check_login.php";
                                }
                            });
                        }
                    } else {
                        swal({
                            title: "Hello",
                            text: "รหัสผ่านไม่ถูกต้อง!",
                            icon: "error",
                            // buttons: true,
                            dangerMode: true,
                        }).then((value) => {
                            if (value) {
                                window.location.href = "login.php";
                            }
                        });
                    }
                }
            });
        }
        form.classList.add('was-validated');
    });
});