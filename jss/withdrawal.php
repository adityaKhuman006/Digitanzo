<?php
    session_start();
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "db_calc";
    $user_name = $_SESSION['username']??null;
    $temp = array();
    include "common/config.php";

    if (isset($_REQUEST["register"])) {
        $cur_bal = isset($_REQUEST["cur_bal"])?$_REQUEST["cur_bal"]:0;
        if($cur_bal == 0)
            return;
        if($user_name == "")
            return;
        $av_bal = isset($_REQUEST["av_bal"])?$_REQUEST["av_bal"]:0;
        $wd_date = isset($_REQUEST["wd_date"])?$_REQUEST["wd_date"]:0;
        $wd_count = isset($_REQUEST["wd_count"])?$_REQUEST["wd_count"]:0;
        $sql = "UPDATE tb_wd SET state = 0  WHERE state = 1 and admin_permission <> 0 and username = '".$user_name."'";
        $result = mysqli_query($db, $sql);
        $sql = "SELECT count(*) count FROM tb_wd WHERE state = 1 AND admin_permission = 0 and username = '".$user_name."' GROUP BY id";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
        if($row["count"] > 0)
            echo "FAILED";
        else {
            $sql = "INSERT INTO tb_wd(username, cur_val, real_val, wd_count, date, state, admin_permission) 
                VALUES('".$user_name."', '".$cur_bal."', '".$av_bal."', '".$wd_count."', '".$wd_date."', 1, 0)"; 
            $result = mysqli_query($db, $sql);
            
            echo "SUCCESS";
        }
        
    }
    if(isset($_REQUEST["resetstate"]))
    {
         $sql = "UPDATE tb_wd SET state = 0  WHERE state = 1 and admin_permission <> 0";
        $result = mysqli_query($db, $sql);
    }
    if (isset($_REQUEST["getNoty"])) {
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
                
                //$sql = "UPDATE tb_wd SET state = 0 WHERE state = 1";
                //$result = mysqli_query($db, $sql);
            }
        }
    }
   
    if(isset($_REQUEST["getDadta"]))
    {
        $count = 0;
        $total = "";
        $date = "";
        $payed = "";
        $state = "";
        $adminPermission = 0;
        $sql = "SELECT id from tb_wd where username = '".$user_name."' and admin_permission = 1";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
        if ($row["id"] == null) {
            $sql = "SELECT user_money from tb_user where user_name = '".$user_name."'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result);
            $temp[] = array('yes' => "no", 'total'=>$row["user_money"]);
            echo json_encode($temp);
        }
        else
        {
            $sql = "SELECT wd1.cur_val, wd1.date, wd2.user_money, wd1.state, wd1.admin_permission FROM tb_wd as wd1, tb_user as wd2 WHERE wd1.username = '".$user_name."' AND wd2.user_name = wd1.username AND  admin_permission = 1  GROUP BY wd1.id";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result))
            {
                $count ++;
                $total = $row["user_money"];
                $date = $row["date"];
                $payed = $row["cur_val"];
                $state = $row["state"];
                $adminPermission = $row["admin_permission"];
                $temp[] = array('yes'=>'yes', 'count' => $count, 'total' => $total, 'date' => $date, 'payed' => $payed, 'state' => $state, 'permission' => $adminPermission);
            }
               echo json_encode($temp);
               //$sql = "UPDATE tb_wd SET state = 0  WHERE state = 1";
               //$result = mysqli_query($db, $sql);
        }
        
           
    }
    if(isset($_REQUEST["getDeclinewd"]))
    {
        $count = 0;
        $total = "";
        $date = "";
        $payed = "";
        $state = "";
        $adminPermission = 0;
        $sql = "SELECT id from tb_wd where username = '".$user_name."'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
        if ($row["id"] == null) {
            $sql = "SELECT user_money from tb_user where user_name = '".$user_name."'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result);
            $temp[] = array('yes' => "no", 'total'=>$row["user_money"]);
            echo json_encode($temp);
        }
        else
        {
            $sql = "SELECT wd1.cur_val, wd1.date, wd2.user_money, wd1.state, wd1.admin_permission FROM tb_wd as wd1, tb_user as wd2 WHERE wd1.username = '".$user_name."' AND wd2.user_name = wd1.username AND  admin_permission = 2  GROUP BY wd1.id";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result))
            {
                $count ++;
                $total = $row["user_money"];
                $date = $row["date"];
                $payed = $row["cur_val"];
                $state = $row["state"];
                $adminPermission = $row["admin_permission"];
                $temp[] = array('yes'=>'yes', 'count' => $count, 'total' => $total, 'date' => $date, 'payed' => $payed, 'state' => $state, 'permission' => $adminPermission);
            }
               echo json_encode($temp);
               //$sql = "UPDATE tb_wd SET state = 0  WHERE state = 1";
               //$result = mysqli_query($db, $sql);
        }
        
           
    }
    if(isset($_REQUEST["`getwaitingwd`"]))
    {
        $count = 0;
        $total = "";
        $date = "";
        $payed = "";
        $state = "";
        $adminPermission = 0;
        $sql = "SELECT id from tb_wd where username = '".$user_name."'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
        if ($row["id"] == null) {
            $sql = "SELECT user_money from tb_user where user_name = '".$user_name."'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result);
            $temp[] = array('yes' => "no", 'total'=>$row["user_money"]);
            echo json_encode($temp);
        }
        else
        {
            $sql = "SELECT wd1.cur_val, wd1.date, wd2.user_money, wd1.state, wd1.admin_permission FROM tb_wd as wd1, tb_user as wd2 WHERE wd1.username = '".$user_name."' AND wd2.user_name = wd1.username AND  admin_permission = 0  GROUP BY wd1.id";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result))
            {
                $count ++;
                $total = $row["user_money"];
                $date = $row["date"];
                $payed = $row["cur_val"];
                $state = $row["state"];
                $adminPermission = $row["admin_permission"];
                $temp[] = array('yes'=>'yes', 'count' => $count, 'total' => $total, 'date' => $date, 'payed' => $payed, 'state' => $state, 'permission' => $adminPermission);
            }
               echo json_encode($temp);
               //$sql = "UPDATE tb_wd SET state = 0  WHERE state = 1";
               //$result = mysqli_query($db, $sql);
        }
        
           
    }
    
    if(isset($_REQUEST["getHistory"]))
    {
        $count = 0;
        $av_Val = "";
        $total = "";
        $date = "";
        $payed = "";
        $userNm = "";
        $per = "";
        $sql = "SELECT id from tb_wd";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
        if ($row["id"] == null) {
            $temp[] = array('yes' => "no");
            echo json_encode($temp);
        }
        else
        {
            $sql = "SELECT wd1.admin_permission, wd1.id, wd1.real_val, wd1.cur_val, wd1.date, wd2.user_money, wd1.username FROM tb_wd as wd1, tb_user as wd2 
                    WHERE wd1.username =  wd2.user_name AND admin_permission <> 0 GROUP BY wd1.id";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result))
            {
                $count ++;
                $av_Val = $row["real_val"];
                $total = $row["user_money"];
                $date = $row["date"];
                $payed = $row["cur_val"];
                $userNm = $row["username"];
                $per = $row["admin_permission"];
                $temp[] = array('yes' => "yes", 'count' => $count, 'total' => $total, 'date' => $date, 'payed' => $payed, 'userNm' => $userNm, 'real' => $av_Val, 'per' => $per);
            }
            
           echo json_encode($temp);           
        }
    }
    if (isset($_REQUEST["getCountNotification"])) {
        if ($user_name == 'admin') {
            $sql = "SELECT count(*) count from tb_wd where state = 1 and admin_permission = 0";
            $result = mysqli_query($db, $sql);
        
        
        
        $row = mysqli_fetch_array($result);
        if($row["count"] == null)
            echo 0;
        else
            echo $row["count"];
        } else
        echo 0;
        
    }
    if (isset($_REQUEST["updateUser"])) {
        $tmpUserState = $_REQUEST["tmpState"];
        $tmpUserId = $_REQUEST["userID"];
        $tmpCur_val = $_REQUEST["curVal"];
        if ($tmpUserState == "y") {
            $sql = "UPDATE tb_wd SET admin_permission = 1  WHERE id = ".$tmpUserId;
            $secSQL = "UPDATE tb_user SET user_money = user_money - ".$tmpCur_val." WHERE user_name = ( SELECT username FROM tb_wd WHERE id = ".$tmpUserId.")";
            $result = mysqli_query($db, $secSQL);
        }
        else{
            $sql = "UPDATE tb_wd SET admin_permission = 2  WHERE id = ".$tmpUserId;
        }
        $result = mysqli_query($db, $sql);
    }
?>