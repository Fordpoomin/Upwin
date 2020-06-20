<?php

    if ($_SESSION['author_session'] == "ADMIN") {
        ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="manager_history.php">ดูสถิติ เข้า-ออก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manager_qrcode.php">สร้าง QR Code</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manager_history_all.php">ดู QR Code ย้อนหลัง</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <span class="text-light mr-sm-4"><?php echo "สวัสดีคุณ : ".$_SESSION['name']." "; ?></span>
                <button class="btn btn-light text-light my-2 my-sm-0" type="button" onclick="window.location.href='logout.php?logout=true'">ออกจากระบบ</button>
            </form>
        <?php
    }
    else if($_SESSION['author_session'] == "USER"){
        ?>  
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <!-- <a class="nav-link" href="home_history.php">ดู สถิติ เข้า-ออก</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="home_history_all.php">ดู QR Code ย้อนหลัง</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <span class="text-light mr-sm-4"><?php echo "สวัสดีคุณ : ".$_SESSION['name']." "; ?></span>
                <button class="btn btn-light text-light my-2 my-sm-0" type="button" onclick="window.location.href='logout.php?logout=true'">ออกจากระบบ</button>
            </form>
        <?php
    }

?>