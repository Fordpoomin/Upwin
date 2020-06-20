$(function() {
    $("#one").on("submit", function() {
        var form = $(this)[0];
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();
            var name = $('#input_name').val();
            var phone = $('#input_phone').val();
            var id = $('#input_id').val();

            // console.log(name);
            // console.log(phone);
            // console.log(id);


            $.ajax({
                url: "./apis_system.php",
                type: "POST",
                dataType: "json",
                data: {
                    register_one: true,
                    name_one: name,
                    phone_one: phone,
                    id_one: id,
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        if (data.result == true) {
                            swal({
                                title: "สวัสดี",
                                text: "ลงทะเบียนเรียบร้อยแล้ว!",
                                icon: "success",
                                dangerMode: true,
                            }).then((value) => {
                                if (value) {
                                    window.location.href = "registers.php";
                                }
                            });
                        }
                    } else {
                        swal({
                            title: "สวัสดี",
                            text: "เบอร์โทร หรือ เลขบัตรประชาชน ถูกใช้ไปแล้ว ลงทะเบียนไม่สำเร็จ!",
                            icon: "warning",
                            dangerMode: true,
                        }).then((value) => {
                            if (value) {
                                window.location.href = "one-register.php";
                            }
                        });
                    }
                }
            });

        }
        form.classList.add('was-validated');
    });
});