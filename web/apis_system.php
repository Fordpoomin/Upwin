<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
http_response_code(200);

require_once '../services/service.php';
// require_once './session.php';

$services = new Services();

$data = array();
$date_check = date("d-m-Y");
$dates_check_in = date("d-m-Y H:i:s");
$dates_check_out = date("d-m-Y H:i:s");

// check [pass]
if (isset($_POST['login'])) {

    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $result = $services->doLogin($id, $phone);

    if ($result) {
        $data['status'] = 200;
        $data['result'] = true;

    } else {
        $data['status'] = 404;
        $data['result'] = 'error';
    }
    echo json_encode($data);
}
// check [pass]
if (isset($_POST['register_one'])) {

    $name = $_POST['name_one'];
    $phone = $_POST['phone_one'];
    $id = $_POST['id_one'];

    $checks_phone = $services->doPhone_user($phone);
    if ($checks_phone['phone'] == $phone) {
        $data['status'] = 404;
        $data['result'] = 'exsit';
    } else if ($services->doRegister_one($name, $id, $phone)) {
        $data['status'] = 200;
        $data['result'] = true;
    } else {
        $data['status'] = 404;
        $data['result'] = 'error';
    }
    echo json_encode($data);
}
// check [pass]
if (isset($_POST['register_second'])) {

    $name = $_POST['name_second'];
    $phone = $_POST['phone_second'];
    $nisit_id = $_POST['nisit_id_second'];
    $id = $_POST['id_second'];
    $faculty = $_POST['faculty_second'];

    $checks_phone = $services->doPhone_user($phone);
    if ($checks_phone['phone'] == $phone) {
        $data['status'] = 404;
        $data['result'] = 'exsit';
    } else if ($services->doRegister_second($name, $id, $phone, $faculty, $nisit_id)) {
        $data['status'] = 200;
        $data['result'] = true;
    } else {
        $data['status'] = 404;
        $data['result'] = 'error';
    }
    echo json_encode($data);
}
// check [pass]
if (isset($_POST['register_three'])) {

    $name = $_POST['name_three'];
    $id = $_POST['id_three'];
    $phone = $_POST['phone_three'];
    $faculty = $_POST['faculty_three'];

    $checks_phone = $services->doPhone_user($phone);
    if ($checks_phone['phone'] == $phone) {
        $data['status'] = 404;
        $data['result'] = 'exsit';
    } else if ($services->doRegister_three($name, $id, $phone, $faculty)) {
        $data['status'] = 200;
        $data['result'] = true;
    } else {
        $data['status'] = 404;
        $data['result'] = 'error';
    }
    echo json_encode($data);
}

// ------------------------------------------------------------ admin  manager ----------------------------------------------------------------------------------------------------///
// page manager
if (isset($_POST['count_faculty'])) {

    $select_faculty_count = $_POST['select_faculty_count'];
    $result = $services->select_table_stats_where_faculty($select_faculty_count);

    $count_checkin = 0;
    $count_checkout = 0;
    foreach ($result as $key => $value) {

        // check in
        $res_checkin = explode(" ", $value->check_in);
        if ($date_check == $res_checkin[0]) {
            $count_checkin += 1;
        }

        // check out
        $res_checkout = explode(" ", $value->check_out);
        if ($date_check == $res_checkout[0]) {
            $count_checkout += 1;
        }
    }

    if ($result) {
        $data['status'] = 200;
        $data['result'] = $result;
        $data['count_checkin'] = $count_checkin;
        $data['count_checkout'] = $count_checkout;
    } else {
        $data['status'] = 404;
        $data['result'] = 'NULL';
    }
    echo json_encode($data);
}
// page manager
if (isset($_POST['count_activity'])) {

    $select_activity_count = $_POST['select_activity_count'];
    $result = $services->select_table_stats_where_activity($select_activity_count);

    $count_checkin = 0;
    $count_checkout = 0;

    foreach ($result as $key => $value) {
        // check in
        $res_checkin = explode(" ", $value->check_in);
        if ($date_check == $res_checkin[0]) {
            $count_checkin += 1;
        }

        // check out
        $res_checkout = explode(" ", $value->check_out);
        if ($date_check == $res_checkout[0]) {
            $count_checkout += 1;
        }
    }
    if ($result) {
        $data['status'] = 200;
        $data['result'] = $result;
        $data['count_checkin'] = $count_checkin;
        $data['count_checkout'] = $count_checkout;
    } else {
        $data['status'] = 404;
        $data['result'] = 'NULL';
    }
    echo json_encode($data);
}

// page home and page manager
if (isset($_POST['search_qr'])) {

    $history_id = $_POST['history_id'];

    $result = $services->select_table_history_qrcode_All_by_id($history_id);
    if ($result) {
        $data['status'] = 200;
        $data['result'] = $result;
    } else {
        $data['status'] = 404;
        $data['result'] = 'error';
    }
    echo json_encode($data);
}

// ------------------------------------------------------------ admin manager ----------------------------------------------------------------------------------------------------///
// ------------------------------------------------------------ admin manger history ----------------------------------------------------------------------------------------------------///

// home and manager
if (isset($_POST['stats'])) {

    $result = $services->select_table_stats_show_table();

    if ($result) {
        $data['status'] = 200;
        $data['result'] = $result;
    } else {
        $data['status'] = 404;
        $data['result'] = 'error';
    }
    echo json_encode($data);
}

// ------------------------------------------------------------ admin manger history ----------------------------------------------------------------------------------------------------///
// ------------------------------------------------------------ admin manger qrcode ----------------------------------------------------------------------------------------------------///

// gen qr code manager
if (isset($_POST['gen_qrcode'])) {

    $user_id = $_POST['user_id_genqrcode'];
    $faculty_id = $_POST['select_faculty'];
    $activity_name = $_POST['activity_name'];
    $date_finish = $_POST['activity_date_finish'];

    $result = $services->insert_table_history_qrcode($user_id, $faculty_id, $activity_name, $date_finish);

    $data = array();
    if ($result) {
        $data['status'] = 200;
        $data['result'] = $result;
    } else {
        $data['status'] = 404;
        $data['result'] = 'eror';
    }
    echo json_encode($data);
}

// stats_check
if (isset($_POST['stats_check'])) {

    $faculty_id = $_POST['stats_id_check'];
    $result = $services->select_table_history_qrcode_where_faculty_id($faculty_id);

    if ($result) {
        $data['status'] = 200;
        $data['result'] = $result;
    } else {
        $data['status'] = 404;
        $data['result'] = 'error';
    }
    echo json_encode($data);
}

// ------------------------------------------------------------ admin manger qrcode ----------------------------------------------------------------------------------------------------///
// ------------------------------------------------------------ adminall_history----------------------------------------------------------------------------------------------------///

// all history
if (isset($_POST['history_qrcode'])) {

    $result = $services->select_table_history_qrcode_show_table();

    if ($result) {
        $data['status'] = 200;
        $data['result'] = $result;
    } else {
        $data['status'] = 404;
        $data['result'] = 'error';
    }
    echo json_encode($data);
}

// ------------------------------------------------------------ admin all_history  ----------------------------------------------------------------------------------------------------///
// ------------------------------------------------------------ admin scan and main  ----------------------------------------------------------------------------------------------------///

// history home
if (isset($_POST['stats_home'])) {

    $phone = $_POST['phone_home'];
    $result = $services->select_table_stats($phone);

    if ($result) {
        $data['status'] = 200;
        $data['result'] = $result;
    } else {
        $data['status'] = 404;
        $data['result'] = 'error';
    }
    echo json_encode($data);
}

// insert scan
if (isset($_POST['scan_insert'])) {

    $phone = $_POST['phone_insert'];
    $user_id = $_POST['user_id_insert'];
    $faculty = $_POST['faculty_insert'];
    $activity_name = $_POST['activity_name_insert'];
    $activity_date_finish_insert = $_POST['activity_date_finish_insert'];
    $history_id = $_POST['history_id_insert'];

    $result = $services->doPhone($phone);

    if ($result['phone'] == $phone) {
        $data['status'] = 404;
        $data['result'] = 'exist';
        $data['phone'] = $result['phone'];
        $data['stats_id'] = $result['stats_id'];
        $data['activity_date_finish'] = $result['activity_date_finish'];
        $updates = $services->update_table_stats_where_faculty_and_activity_by_id($history_id, $phone, $faculty, $activity_name, $activity_date_finish_insert, $result['stats_id']);
        echo json_encode($data);
    } else {
        $result = $services->insert_table_stats($user_id, $history_id, $phone, $faculty, $activity_name, $activity_date_finish_insert);
        if ($result) {
            $data['status'] = 200;
            $data['result'] = $result;
        } else {
            $data['status'] = 404;
            $data['result'] = 'error';
        }
        echo json_encode($data);
    }
}

//page main when click checkin checkout check [pass]
if (isset($_POST['scan_main'])) {

    $phone = $_POST['phone_main'];
    $faculty = $_POST['faculty_main'];
    $check_in = $_POST['check_main']; // 0 or 1

    if ($check_in) {
        $checks_phone = $services->doPhone($phone);
        if ($checks_phone['phone'] == $phone) {
            $result = $services->update_table_stats_where_check_in($checks_phone['stats_id'], $dates_check_in);
            $response = $services->select_table_stats_where_stats_id_by_id($checks_phone['stats_id']);
            // print_r($response);
            if ($result == true && $response != "") {
                $data['status'] = 200;
                $data['result'] = $response;

            } else {
                $data['status'] = 404;
                $data['result'] = 'error';
            }
            echo json_encode($data);
        } else {
            $data['status'] = 404;
            $data['result'] = 'NULL';
            echo json_encode($data);
        }
    } else {
        $checks_phone = $services->doPhone($phone);
        if ($checks_phone['phone'] == $phone) {
            $result = $services->update_table_stats_where_check_out($checks_phone['stats_id'], $dates_check_out);
            $response = $services->select_table_stats_where_stats_id_by_id($checks_phone['stats_id']);
            // print_r($response);
            if ($result == true && $response != "") {
                $data['status'] = 200;
                $data['result'] = $response;
            } else {
                $data['status'] = 404;
                $data['result'] = 'error';
            }
            echo json_encode($data);
        } else {
            $data['status'] = 404;
            $data['result'] = 'NULL';
            echo json_encode($data);
        }
    }

}
// ------------------------------------------------------------ admin scan and main  ----------------------------------------------------------------------------------------------------///
