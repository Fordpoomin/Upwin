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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manager</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/themes.css">

    <!-- Custom styles for this page -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

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


    <div style="margin: 50px; padding-top:50px;">
        <h3>ดู QR Code ย้อนหลัง</h3><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="dataTable" cellspacing="0" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID QR Code</th>
                            <th>ผู้เพิ่ม</th>
                            <th>คณะ</th>
                            <th>ชื่อกิจกรรม</th>
                            <th>วันที่จัด</th>
                            <th>วันที่สร้าง QR Code</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>


    <script type="text/javascript">
    var userid = <?php echo $user_id; ?>;
    console.log("user:" + userid);
    </script>

    <script type="text/javascript" src="./js/manager_history_all.js"></script>

</body>

</html>