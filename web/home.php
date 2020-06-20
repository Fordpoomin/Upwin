<?php
    require_once '../services/service.php';
    require_once './session.php';
    $services = new Services();

    $user_id = $_SESSION['user_session'];
    $author_session = $_SESSION['author_session'];
    $check_session = $services->USER($user_id);

    if ($_SESSION['author_session'] != "USER") {
        $services->redirect('manager.php'); // premission
    } 
    if($_SESSION['author_session'] == ""){
        $services->redirect('login.php'); // premission
    }
    
  
    // faculty
    $facultys_data = $services->select_table_faculty_All();

    // history makeqrcode 
    $history_data = $services->select_table_history_qrcode_All();
   
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการ</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/themes.css">

    <style>
    .Avatar {
        border-radius: 50%;
        width: 100px;
        margin: 10px;
    }

    img {
        width: 150px;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-violet">
        <a class="navbar-brand" href="home.php">มหาวิทยาลัยพะเยา</a>
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

    <div class="container" style="padding-top: 100px;">
        <h1>ตรวจสอบจำนวนคน</h1>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="Avatar" src="./img/correct.png" alt="Avatar">
                            </div>
                            <div class="col-md-8">
                                <h3 style="text-align:center;">จำนวนเช็คอิน</h3>
                                <h1 style="text-align:center;" id="count_checkin">0</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="Avatar" src="./img/quit.png" alt="Avatar">
                            </div>
                            <div class="col-md-8">
                                <h3 style="text-align:center;">จำนวนเช็คเอ้าท์</h3>
                                <h1 style="text-align:center;" id="count_checkout">0</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h5 style="text-align:center;">ค้นหาจำนวนคนจากคณะหรือตึกอาคาร</h5><br>
                <form id="faculty" name="faculty" method="POST" novalidate>
                    <div class="form-group">
                        <div class="col">
                            <select class="custom-select" name="select_faculty" id="select_faculty" autocomplete="off"
                                required>
                                <option selected="true" disabled="disabled">เลือกตึกอาคาร</option>
                                <?php
                                    foreach ($facultys_data as $key => $value):
                                        // if($value->faculty_id != 99){
                                        ?>
                                        <option value="<?php echo $value->faculty_id;?>"><?php echo $value->faculty_name;?>
                                        </option>
                                        <?php
                                        // }
                                    endforeach;
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกคณะ
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col">
                            <button type="submit" name="btn_submit" id="btn_submit" value="1"
                                class="btn  btn-block text-light">ยืนยัน</button>
                        </div>
                    </div>
                </form>
                <h5 style="text-align:center;">ค้นหาจำนวนคนจากกิจกรรม</h5><br>
                <form id="activity" name="activity" method="POST" novalidate>
                    <div class="form-group">
                        <div class="col">
                            <select class="custom-select" name="select_activity" id="select_activity" autocomplete="off"
                                required>
                                <option selected="true" disabled="disabled">เลือกกิจกรรม</option>
                                <?php
                                    foreach ($history_data as $key => $value):
                                    ?>
                                <option value="<?php echo $value->activity_name;?>"><?php echo $value->activity_name;?>
                                </option>
                                <?php
                                    endforeach;
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกกิจกรรม
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col">
                            <button type="submit" name="btn_submit" id="btn_submit" value="1"
                                class="btn  btn-block text-light">ยืนยัน</button>
                        </div>
                    </div>
                </form>
                <br>
                <!-- <h5 style="text-align:center;">ค้นหา QR Code จาก ID QR code</h5><br>
                <h6 style="text-align:center;">(**ตรวจสอบข้อมูลแต่ละ ID กดที่แถบเมนู "ดู QR CODE ย้อนหลัง"**)</h6><br>
                <form id="qrcodehistory" name="qrcodehistory" method="POST" novalidate>
                    <div class="form-group">
                        <div class="col">
                            <select class="custom-select" name="history_id" id="history_id" autocomplete="off" required>
                                <option selected="true" disabled="disabled">เลือก</option>
                                <?php
                                    foreach ($history_data as $key => $value):
                                    ?>
                                <option value="<?php echo $value->history_id;?>"><?php echo $value->history_id;?></option>
                                <?php
                                    endforeach;
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือก
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col">
                            <button type="submit" name="btn_submit" id="btn_submit" value="1"
                                class="btn  btn-block text-light">ยืนยัน</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6" id="qrcodes">
                <h4 style="text-align: center;">รับ QR CODE</h4>
                <img style="width:150px;" src="" id="srcs" class="center">
                <p style="text-align: left;" id="get_activity_name">-</p>
                <p style="text-align: left;" id="get_faculty_name">-</p>
                <p style="text-align: left;" id="get_activity_date_finish">-</p>
                <small style="text-align: left;">** ท่านสามารถ save รูป qrcode และนำไปแปะที่ตึกของท่านได้เลย</small>
            </div> -->
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

    <script type="text/javascript" src="./js/home.js"></script>

</body>

</html>