<!-- <?php
    require_once '../services/service.php';
    require_once './session.php';
    $services = new Services();

    $user_id = $_SESSION['user_session'];
    $author_session = $_SESSION['author_session'];
    $check_session = $services->USER($user_id);

    if($_SESSION['author_session'] == ""){
        $services->redirect('login.php'); // premission
    }

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search QR CODE</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/themes.css">

    <style>
        img {
            border-radius: 50%;
            width: 100px;
            margin: 10px;
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
        <h1>ค้นหา qrcode</h1>
        <br>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="./img/correct.png" alt="Avatar">
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
                                <img src="./img/quit.png" alt="Avatar">
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
        <div class="row">
            <div class="col-md-12">
                <form id="one" name="one" method="POST" novalidate>
                    <div class="form-group">
                        <div class="col">
                            <select class="custom-select" name="select_faculty" id="select_faculty"  autocomplete="off" required>
                                <option selected="true" disabled="disabled">เลือกตึกอาคาร</option>
                                <?php
                                    $result = $services->select_table_faculty();
                                    foreach ($result as $key => $value):
                                    ?>
                                        <option value="<?php echo $value->faculty_id;?>"><?php echo $value->faculty_name;?></option>
                                    <?php
                                    endforeach;
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกคณะ
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col">
                            <select class="custom-select" name="select_activity" id="select_activity"  autocomplete="off" required>
                                <option selected="true" disabled="disabled">เลือกประเภทกิจกรรม</option>
                                <?php

                                    $results = $services->select_table_activity();
                                    foreach ($results as $key => $value):
                                    ?>
                                        <option value="<?php echo $value->activity_id;?>"><?php echo $value->activity_names;?></option>
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
                            <button type="submit" name="btn_submit" id="btn_submit" value="1" class="btn  btn-block">ยืนยัน</button>
                        </div>
                    </div>
                </form>
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
        console.log(userid);
        
    </script>

    <script type="text/javascript" src="./js/manager.js"></script>

</body>

</html> -->