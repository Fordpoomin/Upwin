$(function() {
    $('#qr').hide();
    $("#one").on("submit", function() {
        var form = $(this)[0];
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            var select_faculty = $('#select_faculty').val();
            var select_activity = $('#select_activity').val();

            $('#qr').show();

            swal({
                title: "สวัสดี",
                text: "ลงทะเบียนเรียบร้อยแล้ว!",
                icon: "success",
                // buttons: true,
                dangerMode: true,
            }).then((value) => {
                if (value) {
                    window.location.href = "scanqrcode.php?faculty=" + select_faculty + "&activity=" + select_activity;
                }
            });

        }
        form.classList.add('was-validated');
    });
});