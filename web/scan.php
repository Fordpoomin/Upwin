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

    <link rel="stylesheet" href="./css/themes.css">

</head>

<body>

    <div class="container">
        <h3 style="text-align: center; padding-top: 20px; padding-bottom: 20px; margin: 20px;">ข้อตกลงและความยินยอมในการนำส่งข้อมูล</h3>
        <form id="scan" name="scan" method="POST" novalidate>
            <div class="form-group">
                <textarea class="form-control" disabled rows="5" style="text-align;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ข้าพเจ้ายินยอมให้ทางมหาวิทยาลัยพะเยา เก็บรวบรวม ใช้ และเปิดเผยหมายเลขโทรศัพท์ของข้าพเจ้า สถานที่และเวลาที่ข้าพเจ้าให้ความยินยอมนี้ เพื่อประโยชน์ในการป้องกันและควบคุมการแพร่ระบาดของโรคโควิด 19 และโรคติดต่ออื่นๆ โดยยินยอมให้มีการเปิดเผยข้อมูลเฉพาะหน่วยงานที่ได้รับมอบหมายจากกระทรวงสาธราณสุขให้เป็นผู้ประมวลผลและจัดทำระบบข้อมูลดังกล่าวเท่านั้น
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ข้าพเจ้าขอรับรองว่าข้อมูลที่ข้าพเจ้าให้เป็นข้อมูลส่วนบุคคลของข้าพเจ้า ซึ่งเป็นข้อมูลที่แท้จริง ถูกต้อง และเป็นปัจจุบัน</textarea>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="accept" id="accept" required>
                <label class="form-check-label" for="accept">ข้าพเจ้าได้อ่านและเข้าใจรายละเอียดการขอความยินยอมข้างต้น</label>
                <div class="invalid-feedback">
                    กรุณากดยินยอม
                </div>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" name="btn_submit" id="btn_submit" value="1" class="btn text-light btn-block">ถัดไป</button>
            </div>
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        var userid = "<?php echo $getUser['user_id']; ?>";
        var phone = "<?php echo $getUser['phone']; ?>";        
    </script>
    
    <script type="text/javascript" src="./js/scan.js">
    
    </script>

</body>

</html>