<?php
require_once "../db/config_db.php";
session_start();

class Services
{

    private $conn;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql)
    {
        $database = $this->conn->prepare($sql);
        return $database;
    }

    // ------------------------------------------------------------ user ----------------------------------------------------------------------------------------------------///

    //phone home check hostory
    public function select_table_stats($phone)
    {
        try
        {
            $database = $this->conn->prepare("SELECT a.stats_id,a.phone,a.activity_name,a.activity_date_finish,a.check_in,a.check_out,a.date_gen,b.faculty_name,c.name
                FROM stats a
                INNER JOIN faculty b
                ON a.faculty_id = b.faculty_id
                INNER JOIN users c
                ON a.user_id = c.user_id
                WHERE a.phone =:phone");
            $database->execute(array(":phone" => $phone));
            $userRow = $database->fetchAll(PDO::FETCH_CLASS);
            return $userRow;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    // ------------------------------------------------------------ user ----------------------------------------------------------------------------------------------------///

    // ------------------------------------------------------------ admin ----------------------------------------------------------------------------------------------------///

    // page manager
    public function select_table_faculty_All()
    {
        try
        {
            $database = $this->conn->prepare("SELECT * FROM `faculty` ORDER BY `faculty_id`");
            $database->execute();
            $row = $database->fetchAll(PDO::FETCH_CLASS);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // page manager
    public function select_table_history_qrcode_All()
    {
        try
        {
            $database = $this->conn->prepare("SELECT * FROM `history_qrcode` ORDER BY `history_id`");
            $database->execute();
            $row = $database->fetchAll(PDO::FETCH_CLASS);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //  page manager search  select faculty
    public function select_table_stats_where_faculty($select_faculty_count)
    {
        try
        {
            $database = $this->conn->prepare("SELECT * FROM `stats` WHERE `faculty_id`=:faculty_id");
            $database->execute(array(":faculty_id" => $select_faculty_count));
            $userRow = $database->fetchALL(PDO::FETCH_CLASS);
            return $userRow;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //  page manager search select activity
    public function select_table_stats_where_activity($select_activity_count)
    {
        try
        {
            $database = $this->conn->prepare("SELECT * FROM `stats` WHERE `activity_name` LIKE :activity_name");
            $database->bindValue(':activity_name', '%' . $select_activity_count . '%');
            $database->execute();
            $userRow = $database->fetchALL(PDO::FETCH_CLASS);
            return $userRow;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //  page manager search make qrcode
    public function select_table_history_qrcode_All_by_id($history_id)
    {
        try
        {
            $database = $this->conn->prepare("SELECT a.history_id,a.faculty_id,a.activity_name,a.date_finish,b.faculty_name
            FROM history_qrcode a
            INNER JOIN faculty b
            ON a.faculty_id = b.faculty_id
            WHERE `history_id`=:history_id");
            $database->execute(array(':history_id' => $history_id));
            $row = $database->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // ------------------------------------------------------------ admin ----------------------------------------------------------------------------------------------------///
    // ------------------------------------------------------------ admin manger history ----------------------------------------------------------------------------------------------------///

    public function select_table_stats_show_table()
    {
        try
        {
            $database = $this->conn->prepare("SELECT a.stats_id,a.user_id,a.phone,a.activity_name,a.activity_date_finish,a.check_in,a.check_out,a.date_gen,b.faculty_name
            FROM stats a
            INNER JOIN faculty b
            ON a.faculty_id = b.faculty_id
            ORDER BY `stats_id` DESC");
            $database->execute();
            $row = $database->fetchAll(PDO::FETCH_CLASS);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // ------------------------------------------------------------ admin manger history ----------------------------------------------------------------------------------------------------///

    // ------------------------------------------------------------ admin manger qrcode ----------------------------------------------------------------------------------------------------///

    // hisroty qrcode
    public function insert_table_history_qrcode($user_id, $faculty_id, $activity_name, $date_finish)
    {
        try
        {
            $database = $this->conn->prepare("INSERT INTO `history_qrcode`(`user_id`, `faculty_id`,`activity_name`, `date_finish`)
                    VALUES (:user_id,:faculty_id,:activity_name,:date_finish)");
            $database->bindparam(':user_id', $user_id);
            $database->bindparam(':faculty_id', $faculty_id);
            $database->bindparam(':activity_name', $activity_name);
            $database->bindparam(':date_finish', $date_finish);
            $database->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // select history by id
    public function select_table_history_qrcode_where_faculty_id($faculty_id)
    {
        try
        {
            $database = $this->conn->prepare("SELECT * FROM `history_qrcode` WHERE `faculty_id` =:faculty_id ORDER BY `history_id`");
            $database->execute(array(':faculty_id' => $faculty_id));
            $row = $database->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // ------------------------------------------------------------ admin manger qrcode ----------------------------------------------------------------------------------------------------///
    // ------------------------------------------------------------ adminall_history----------------------------------------------------------------------------------------------------///

    // select history
    public function select_table_history_qrcode_show_table()
    {
        try
        {
            $database = $this->conn->prepare("SELECT a.history_id,a.user_id,a.activity_name,a.date_finish,a.date_gen,b.name,c.faculty_name
                FROM history_qrcode a
                INNER JOIN users b
                ON a.user_id = b.user_id
                INNER JOIN faculty c
                ON a.faculty_id = c.faculty_id
                ORDER BY `history_id`");
            $database->execute();
            $row = $database->fetchAll(PDO::FETCH_CLASS);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // ------------------------------------------------------------ adminall_history----------------------------------------------------------------------------------------------------///

    // ------------------------------------------------------------ user scan ----------------------------------------------------------------------------------------------------///

    // exist phone
    public function doPhone($phone)
    {
        try
        {
            $database = $this->conn->prepare("SELECT * FROM `stats` WHERE `phone`=:phone");
            $database->execute(array(':phone' => $phone));
            $row = $database->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //scan out
    public function update_table_stats_where_faculty_and_activity_by_id($history_id, $phone, $faculty, $activity_name, $activity_date_finish_insert, $stats_id)
    {
        try
        {
            $database = $this->conn->prepare("UPDATE `stats`
                SET `history_id` = :history_id,
                `faculty_id` = :faculty_id,
                `activity_name` = :activity_name,
                `activity_date_finish` = :activity_date_finish,
                `check_in` = '',
                `check_out` = ''
                WHERE `stats_id` = :stats_id");
            $database->execute(array(
                ':history_id' => $history_id,
                ':faculty_id' => $faculty,
                ':activity_name' => $activity_name,
                ':activity_date_finish' => $activity_date_finish_insert,
                ':stats_id' => $stats_id,
            ));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // insert first scan
    public function insert_table_stats($user_id, $history_id, $phone, $faculty, $activity_name, $activity_date_finish_insert)
    {
        try
        {
            $database = $this->conn->prepare("INSERT INTO `stats`( `user_id`, `history_id`,`phone`, `faculty_id`, `activity_name`, `activity_date_finish`)
             VALUES (:user_id,:history_id,:phone,:faculty_id,:activity_name,:activity_date_finish)");
            $database->bindparam(':user_id', $user_id);
            $database->bindparam(':history_id', $history_id);
            $database->bindparam(':phone', $phone);
            $database->bindparam(':faculty_id', $faculty);
            $database->bindparam(':activity_name', $activity_name);
            $database->bindparam(':activity_date_finish', $activity_date_finish_insert);
            $database->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //scan in
    public function update_table_stats_where_check_in($stats_id, $dates_check_in)
    {
        try
        {
            $database = $this->conn->prepare("UPDATE `stats`
               SET `check_in` = :check_in,
               `check_out` = '-'
               WHERE `stats_id` = :stats_id");
            $database->execute(array(
                ':check_in' => $dates_check_in,
                ':stats_id' => $stats_id,
            ));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //scan out
    public function update_table_stats_where_check_out($stats_id, $dates_check_out)
    {
        try
        {
            $database = $this->conn->prepare("UPDATE `stats`
             SET `check_out` = :check_out
             WHERE `stats_id` = :stats_id");
            $database->execute(array(
                ':check_out' => $dates_check_out,
                ':stats_id' => $stats_id,
            ));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // use page main checkin checkout
    public function select_table_stats_where_stats_id_by_id($stats_id)
    {
        try
        {
            $database = $this->conn->prepare("SELECT a.stats_id,a.phone,a.activity_name,a.activity_date_finish,a.check_in,a.check_out,a.date_gen,b.faculty_name
                FROM stats a
                INNER JOIN faculty b
                ON a.faculty_id = b.faculty_id
                WHERE `stats_id` =:stats_id");
            $database->execute(array(":stats_id" => $stats_id));
            $userRow = $database->fetch(PDO::FETCH_ASSOC);
            return $userRow;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // ------------------------------------------------------------ user scan ----------------------------------------------------------------------------------------------------///

    // exist phone user
    public function doPhone_user($phone)
    {
        try
        {
            $database = $this->conn->prepare("SELECT * FROM `users` WHERE `phone`=:phone");
            $database->execute(array(':phone' => $phone));
            $row = $database->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // register one check [pass]
    public function doRegister_one($name, $id, $phone)
    {
        try
        {
            $database = $this->conn->prepare("INSERT INTO `users`(`faculty`,`name`,`id`,`phone`,`nisit_id`,`role`)
            VALUES ('1',:name,:id,:phone,'-','USER')");
            $database->bindparam(':name', $name);
            $database->bindparam(':phone', $phone);
            $database->bindparam(':id', $id);
            $database->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // register second check [pass]
    public function doRegister_second($name, $id, $phone, $faculty, $nisit_id)
    {
        try
        {
            $database = $this->conn->prepare("INSERT INTO `users`(`faculty`,`name`,`id`,`phone`,`nisit_id`,`role`)
            VALUES (:faculty,:name,:id,:phone,:nisit_id,'USER')");
            $database->bindparam(':faculty', $faculty);
            $database->bindparam(':name', $name);
            $database->bindparam(':id', $id);
            $database->bindparam(':phone', $phone);
            $database->bindparam(':nisit_id', $nisit_id);
            $database->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // register three check [pass]
    public function doRegister_three($name, $id, $phone, $faculty)
    {
        try
        {
            $database = $this->conn->prepare("INSERT INTO `users`(`faculty`,`name`,`id`,`phone`,`nisit_id`,`role`)
            VALUES (:faculty,:name,:id,:phone,'-','USER')");
            $database->bindparam(':faculty', $faculty);
            $database->bindparam(':name', $name);
            $database->bindparam(':id', $id);
            $database->bindparam(':phone', $phone);
            $database->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function select_table_stats_All_by_id($stats_id)
    {
        try
        {
            $database = $this->conn->prepare("SELECT * FROM `stats` WHERE  `stats_id`=:stats_id ");
            $database->execute(array(':stats_id' => $stats_id));
            $row = $database->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // look userid
    public function USER($user_id)
    {
        try
        {
            $database = $this->conn->prepare("SELECT * FROM `users` WHERE `user_id`=:user_id");
            $database->execute(array(":user_id" => $user_id));
            $userRow = $database->fetch(PDO::FETCH_ASSOC);
            return $userRow;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // login
    public function doLogin($id, $phone)
    {
        try
        {
            $database = $this->conn->prepare("SELECT * FROM `users` WHERE id = :id AND phone = :phone");
            $database->execute(array(':id' => $id, ':phone' => $phone));
            $userRow = $database->fetch(PDO::FETCH_ASSOC);
            if ($database->rowCount() == 1) {
                if ($id == $userRow['id'] && $phone == $userRow['phone']) {
                    $_SESSION['user_session'] = $userRow['user_id'];
                    if ($userRow['role'] == "ADMIN") {
                        $_SESSION['author_session'] = "ADMIN";
                        $_SESSION['user_id'] = $userRow['user_id'];
                        $_SESSION['name'] = $userRow['name'];
                        // set cookie
                        setcookie('author_session', "ADMIN", time() + (86400 * 30), "/"); // 86400 = 1 day
                        setcookie('user_id', $userRow['user_id'], time() + (86400 * 30), "/"); // 86400 = 1 day
                        setcookie('name', $userRow['name'], time() + (86400 * 30), "/"); // 86400 = 1 day
                        return true;
                    } else if ($userRow['role'] == "USER") {
                        $_SESSION['author_session'] = "USER";
                        $_SESSION['user_id'] = $userRow['user_id'];
                        $_SESSION['name'] = $userRow['name'];
                        // set cookie
                        setcookie('author_session', "USER", time() + (86400 * 30), "/"); // 86400 = 1 day
                        setcookie('user_id', $userRow['user_id'], time() + (86400 * 30), "/"); // 86400 = 1 day
                        setcookie('name', $userRow['name'], time() + (86400 * 30), "/"); // 86400 = 1 day
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin()
    {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function doLogout()
    {
        session_destroy();
        session_unset();
        unset($_SESSION['user_session']);
        unset($_SESSION['author_session']);
        unset($_SESSION['name']);
        unset($_SESSION['user_id']);
        unset($_COOKIE['author_session']);
        unset($_COOKIE['user_id']);
        unset($_COOKIE['name']);
        setcookie('author_session', null, -1, '/');
        setcookie('user_id', null, -1, '/');
        setcookie('name', null, -1, '/');
        return true;
    }
}
