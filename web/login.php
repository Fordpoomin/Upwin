<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/themes.css">

</head>

<body class="text-center">

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col">
                                <img src="./img/log.png" alt="Paris" class="center">
                            </div>
                        </div>
                        <h3>เข้าสู่ระบบ</h3>
                        <form class="form-signin" id="logins" name="logins" method="POST" novalidate>
                            <div class="form-group row">
                                <div class="col">
                                    <input type="text" class="form-control" name="input_id" id="input_id"
                                        placeholder="เลขบัตรประชาชน" autocomplete="off" value="" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกเลขบัตรประชาชน
                                    </div>
                            
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <input type="text" class="form-control" pattern="^0([8|9|6])([0-9]{8}$)"
                                        name="input_phone" id="input_phone" placeholder="เบอร์มือถือ" autocomplete="off"
                                        value="" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกเบอร์มือถือ 10 หลัก
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <button type="submit" name="btn_submit" id="btn_submit" value="1"
                                        class="btn btn-light btn-block text-light">เข้าสู่ระบบ</button>
                                </div>
                                <div class="col">
                                    <button type="button" name="btn_submit" id="btn_submit" value="1"
                                        class="btn btn-light btn-block text-light"
                                        onclick="window.location.href='registers.php'">ลงทะเบียน</button>
                                </div>
                               
                                <div class="col">
                                <br>
                                    <button type="button" name="btn_submit" id="btn_submit" value="1"
                                        class="btn btn-light btn-block text-light"
                                        onclick="window.location.href='index.php'">กลับสู่หน้าแรก</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script type="text/javascript" src="./js/login.js"></script>


</body>

</html>