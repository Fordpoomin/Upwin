$(function() {
    // $('#qr').hide();
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
            var faculty = $('#select_faculty').val();

            // console.log(name);
            // console.log(phone);
            // console.log(id);
            // console.log(faculty);

            $.ajax({
                url: "./apis_system.php",
                type: "POST",
                dataType: "json",
                data: {
                    register_three: true,
                    name_three: name,
                    id_three: id,
                    phone_three: phone,
                    faculty_three: faculty
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
                                window.location.href = "three-register.php";
                            }
                        });
                    }
                }
            });
        }
        form.classList.add('was-validated');
    });
});