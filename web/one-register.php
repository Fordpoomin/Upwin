<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>บุคคลทั่วไป</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/themes.css">

</head>

<body>

    <div class="container" style="padding-top: 100px;">

        <div class="row">
            <div class="col-md-12">
                <img src="./img/woman.png" alt="Paris" class="center">
            </div>
        </div>
        <h2 style="text-align: center; padding-bottom: 10px;">ลงทะเบียน</h2>
        <h2 style="text-align: center; padding-bottom: 10px;">บุคคลทั่วไป</h2>
        
        <form id="one" name="one" method="post" enctype="multipart/form-data" novalidate>
            <div class="form-group">
                <div class="col">
                    <input type="text" class="form-control" name="input_name" id="input_name" placeholder="ชื่อ นามสกุล" autocomplete="off" value="" required>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อ นามสกุล
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col">
                    <input type="text" class="form-control" pattern="^0([8|9|6])([0-9]{8}$)" name="input_phone" id="input_phone" placeholder="เบอร์มือถือ" autocomplete="off" value="" required>
                    <div class="invalid-feedback">
                        กรุณากรอกเบอร์มือถือตัวเลข 10 หลัก
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col">
                    <input type="text" class="form-control" name="input_id" id="input_id" placeholder="*หมายเลขบัตรประชาชน" autocomplete="off" value="" required>
                    <div class="invalid-feedback">
                        กรุณากรอกเลขบัตรประชาชน
                    </div>
                </div>
            </div>
            <div class="form-group">
            </div>

            <div class="form-group">
                <div class="col">
                    <button type="submit" name="btn_submit" id="btn_submit" value="1" class="btn text-light btn-block">ส่งข้อมูล</button>
                </div>
                <br>
                <div class="col">
                    <button type="button" onclick="window.location.href='registers.php'" class="btn text-light btn-block">กลับ</button>
                </div>
            </div>
 
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" src="./js/one-register.js"></script>
</body>

</html>