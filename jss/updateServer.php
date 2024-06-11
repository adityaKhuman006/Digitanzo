
<?php
    session_start();

    $user_name = $_SESSION['username'];

    $temp = array();
    include "common/config.php";

    if (isset($_REQUEST["updateUser"])) {
        $userid = $_REQUEST["id"];
        $rec_userNm = $_REQUEST["rec_userNm"];
        $rec_userId = $_REQUEST["rec_userId"];
        $userNm = $_REQUEST["userNm"];
        $phoneNm = $_REQUEST["p_Nm"];
        $userPss = $_REQUEST["userPss"];
        $confirmPassword = $_REQUEST["con_Pss"];
        $country = $_REQUEST["country"];
        $city = $_REQUEST["city"];
        $street = $_REQUEST["street"];

        $sql = "UPDATE tb_user SET user_name='".$userNm."' phone='".$phoneNm."' user_rec_id= '".$rec_userId."' user_rec_name= '".$rec_userNm."' password= '".$userPss."' country ='".$country."' city = '". $city."' street = '".$street."' WHERE user_no = ".$userid;

        $result = mysqli_query($db, $sql);


    }

    if (isset($_REQUEST["updDatePayMent"])) {
        if ($user_name == 'admin') {
            $user_Id;
            $tmpUser;
            $cur_val;
            $real_val;
            $date;
            $sql = "SELECT id, username, cur_val, real_val, date FROM tb_wd WHERE state = 1 AND admin_permission = 0 GROUP BY id";
            $result = mysqli_query($db, $sql);

            if ($result == false) {

                $temp[] = array('username' => 'go');
                echo json_encode($temp);
            }
            else
            {

                while ( $row = mysqli_fetch_array($result)) {
                        $user_Id = $row["id"];
                        $tmpUser = $row["username"];
                        $cur_val = $row["cur_val"];
                        $date = $row["date"];
                        $real_val = $row["real_val"];
                        $temp[] = array('id' => $user_Id, 'username' => $tmpUser, 'payed' => $cur_val, 'av_val' => $real_val, 'date' => $date);
                }
                echo json_encode($temp);
                
                $sql = "UPDATE tb_wd SET state = 0 WHERE state = 1";
                $result = mysqli_query($db, $sql);
            }
        }

    }
?>