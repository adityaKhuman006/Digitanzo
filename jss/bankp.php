 <?php
     if(isset($_POST['add']))
     {
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '""';
   $dbname = "db_calc";
   $conn = mysql_connect($dbhost, $dbuser,$dbpass, $dbname);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   $acName = $_POST['ac_name'];
   
   $sql = 'INSERT INTO tb_bank ( ac_name, ba_name, ac_num, branch) 
                          VALUES('$acName','$baname', '$phonenum','$branch')"
      
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Entered data successfully\n";
   
   mysql_close($conn);
?>