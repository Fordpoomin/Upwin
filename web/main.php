<?php
    require_once '../services/service.php';
    require_once './session.php';
    $services = new Services();

    $user_id = $_SESSION['user_session'];
    $author_session = $_SESSION['author_session'];
    $getUser = $services->USER($user_id);

    if ($_SESSION['author_session'] != "USER") {
        $services->redirect('index.php'); // premission
    } 
    if($_SESSION['author_session'] == ""){
        $services->redirect('login.php'); // premission
    }

    // get value
    if(isset($_GET['faculty'])){
        $faculty = $_GET['faculty'];
    }
    if(isset($_GET['activity_name'])){
        $activity_name = $_GET['activity_name'];
    }
    if(isset($_GET['activity_date_finish'])){
        $activity_date_finish = $_GET['activity_date_finish'];
    }
 
    // print_r($getUser);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>SCAN</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/themes.css">

    <style>
        .btn {
            border-radius: 20px !important;
            padding-top: 20px !important;
            padding-bottom: 20px !important;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22) !important;
            font-size: 15px !important;
        }

        .logo {
            border-radius: 50%;
            width: 100px;
        }
    </style>

</head>

<body>

    <div class="container">
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" style="text-align: center;">
                        <img class="logo" src="./img/log.png" alt="Avatar">
                    </div>
                    <div class="col-md-6" style="text-align: center;">
                        <br>
                        <h3 id="facultys">คณะวิศวกรรมศาสตร์</h3>
                        <div class="text-light" type="button" onclick="window.location.href='logout.php?logout=true'">
                            ออกจากระบบ</div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <p style="text-align: center;">กรุณาเลือกเช็คอินหรือเช็คเอ้าท์</p>
        <div class="row">
            <div class="col">
                <button type="submit" id="check_in" class="btn btn-block text-light"><i class="fa fa-location-arrow"
                        aria-hidden="false"></i> เช็คอิน</button>
            </div>
            <div class="col">
                <button type="submit" id="check_out" class="btn  btn-block text-light"><i class="fa fa-sign-out"
                        aria-hidden="false"></i> เช็คเอ้าท์</button>
            </div>
        </div>
        <br>
        <p style="text-align: center;" id="activitys">-</p>
        <p style="text-align: center;" id="check_ins">-</p>
        <p style="text-align: center;" id="faculty_names">-</p>
        <p style="text-align: center;" id="times">-</p>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script type="text/javascript">
    var phone = "<?php echo $getUser['phone']; ?>";
    var faculty = <?php echo $faculty; ?>;
    var activity_name = "<?php echo $activity_name; ?>";
    var activity_date_finish = "<?php echo $activity_date_finish; ?>";
    </script>

    <script type="text/javascript" src="./js/main.js"></script>

</body>

</html>