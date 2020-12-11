<!-- this is the login card script, 
if any changes want to make should be here not somewhere else.
 -->
<?php

class LoginCard
{
    private $con;
    private $error;
    public function __construct(
        $con
    ) {
        $this->con = $con;
    }

    public function __destruct()
    {
    }
    public function setError($error)
    {
        $this->error = $error;
    }
    public function getError()
    {
        return $this->error;
    }
    public function setCon($con)
    {
        $this->con = $con;
    }
    public function getCon()
    {
        return $this->con;
    }
    public function getConnection()
    {
        return $this->con;
    }

    public function check_login($admin_nim, $admin_pass)
    {
        $query = "SELECT * FROM login WHERE admin_nim = '$admin_nim' ";
        $look_query = $this->getConnection()->select($query);

        if ($look_query == true) {
            while ($row = $look_query->fetch_assoc()) {
                $pass_check = password_verify($admin_pass, $row['admin_pass']);
                if (!$pass_check) {
                    echo  $this->setError("Wrong password Or ID");
                } else {
                    if ($row['admin_level'] != strtolower("admin")) {
                        echo  $this->setError("ID not recognized");
                    } else {
                        $_SESSION['admin_nim'] = $row['admin_nim'];
                        $_SESSION['amdin_pass'] = $row['admin_pass'];
                        $_SESSION['user_id'] = false;

                        include_once('./settings/lastonline.php');
                        AdminLastLoggedin($admin_nim);
                        header("Location: ../static/index.php");
                        exit();
                    }
                }
                // 08:31:24
                // 09:06:07
                // 16328062132605
            }
        } elseif ($look_query == true) {
            echo  $this->setError("Wrong password Or ID");
        } else {
            $s_query =  "SELECT * FROM student WHERE nim = '$admin_nim'  LIMIT 1";
            $s_look_query = $this->getConnection()->select($s_query);
            if ($s_look_query == true) {
                while ($s_row = $s_look_query->fetch_assoc()) {
                    $s_hash = password_verify($admin_pass, $s_row['password']);
                    if ($s_row['student_level'] != strtolower("student")) {
                        echo  $this->setError("ID not recognized");
                    } else {
                        if (!$s_hash) {
                            echo  $this->setError("Wrong password Or ID");
                        } else {
                            $_SESSION['admin_nim'] = $s_row['nim'];
                            $_SESSION['amdin_pass'] = $s_row['password'];
                            $_SESSION['user_id'] = true;
                            // update query time
                            include_once('./settings/lastonline.php');
                            StudentLastOnLline($admin_nim);
                            header("Location: ../student/student_account.php");
                            exit();
                        }
                    }
                }
            }
        }
    }
    // 01:29:39


    public function Show_Rows($rows)
    {
        $query = "SELECT COUNT(*) FROM $rows";
        $select_rows = $this->getConnection()->select($query);
        $row = $select_rows->fetch_array();
        echo $row[0];
    }
}
