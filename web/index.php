<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>หน้าแรก</title>
    
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/themes.css">

</head>

<body>

    <div class="container" style="padding-top:130px;">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col">
                                <img src="./img/log.png" alt="Paris" class="center">
                            </div>
                        </div>
                        <h2 style="text-align: center; padding-bottom: 10px;">Welcome to UP Win !</h2>
                        <h2 style="text-align: center; padding-bottom: 10px;">มพ.ชนะ ยินดีต้อนรับ</h2>
                        <form class="form-signin" id="logins" name="logins" method="POST" novalidate>
                            <div class="form-group row">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <button type="button" name="btn_submit" id="btn_submit" value="1" class="btn btn-light btn-block text-light" onclick="window.location.href='login.php'">เข้าสู่ระบบ</button>
                                    <button type="button" name="btn_submit" id="btn_submit" value="1" class="btn btn-light btn-block text-light" onclick="window.location.href='registers.php'">ลงทะเบียนเพื่อรับสิทธิ์การใช้งาน</button>
                                </div>
                                <div class="col">
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

</body>

</html>
