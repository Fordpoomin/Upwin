<?php

    require_once '../services/service.php';
    require_once './session.php';
    $services = new Services();

    $user_id = $_SESSION['user_session'];
    $author_session = $_SESSION['author_session'];
    $check_session = $services->USER($user_id);

    if ($_SESSION['author_session'] != "ADMIN") {
        $services->redirect('index.php'); // premission
    } 
    if($_SESSION['author_session'] == ""){
        $services->redirect('login.php'); // premission
    }

    $faculty_data = $services->select_table_faculty_All();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manager</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/themes.css">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-violet">
        <a class="navbar-brand" href="manager.php">มหาวิทยาลัยพะเยา</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <?php 
                require_once './nav.php';
             ?>
        </div>
    </nav>


    <div class="container" style="padding-top:100px;">
        <h3>สร้าง QR Code กิจกรรม</h3><br>
        <div class="row">
            <div class="col-md-6">
                <form id="faculty" name="faculty" method="POST" novalidate>
                
                    <div class="form-group">
                        <div class="col">
                            <input type="text" class="form-control" name="activity_name" id="activity_name"
                                placeholder="ชื่อกิจกรรม" autocomplete="off" value="" required>

                            <div class="invalid-feedback">
                                กรุณากรอกชื่อกิจกรรม
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col">
                            <input type="date" class="form-control" name="activity_date_finish" id="activity_date_finish"
                                autocomplete="off" value="" required>
                            <small>*กรุเลือกวันสิ้นสุดกิจกรรม</small>
                            <div class="invalid-feedback">
                                กรุณากรอกวันที่
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col">
                            <button type="submit" name="btn_submit" id="btn_submit" value="1"
                                class="btn btn-block text-light">สร้าง QR Code</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-6" id="qrcodes">
                <h4 style="text-align: center;">รับ QR Code</h4><br>
                <img style="width:150px;" src="" id="srcs" class="center"><br>
                <small style="text-align: center;">**สร้าง qrcode เรียบร้อยแล้ว</small>
                <small style="text-align: left;">** ท่านสามารถ save รูป qrcode และนำไปแปะที่ตึกของท่านได้เลย</small>
            </div>
        </div>
    </div>

    </div>
    <div class="container" style="padding-top: 20px;">

    <h3>สร้าง QR Code คณะ</h3><br>
        <div class="row">
            <div class="col-md-6">
              
                <form id="activity" name="activity" method="POST" novalidate>
                    <div class="form-group">
                        <div class="col">
                            <select class="custom-select" name="select_faculty" id="select_faculty" autocomplete="off"
                                required>
                                <option selected="true" disabled="disabled">เลือกคณะ</option>
                                <?php
                                    foreach ($faculty_data as $key => $value):
                                    ?>
                                    <option value="<?php echo $value->faculty_id;?>"><?php echo $value->faculty_name;?>
                                    </option>
                                    <?php
                                    endforeach;
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกจังหวัด
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col">
                            <button type="submit" name="btn_submit" id="btn_submit" value="1"
                                class="btn btn-block text-light">สร้าง QR Code</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-6" id="qrcodes2">
                <h4 style="text-align: center;">รับ QR Code</h4><br>
                <img style="width:150px;" src="" id="srcs2" class="center"><br>
                <small style="text-align: center;">**สร้าง qrcode เรียบร้อยแล้ว</small>
                <small style="text-align: left;">** ท่านสามารถ save รูป qrcode และนำไปแปะที่ตึกของท่านได้เลย</small>
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

    <script type="text/javascript">
    var userid = <?php echo $user_id; ?>;
    console.log("user:" + userid);
    </script>
    <script type="text/javascript" src="./js/manager_qrcode.js"></script>
</body>

</html>