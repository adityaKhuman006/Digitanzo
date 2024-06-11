<?php
//fetch.php
if(isset($_POST["query"]))
{
 $connect = mysqli_connect("localhost", "root", "", "digitanzo");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tb_user
  WHERE user_name LIKE '%".$request."%' 
  OR gender LIKE '%".$request."%' 
  OR designation LIKE '%".$request."%'
 ";
 $result = mysqli_query($connect, $query);
 $data =array();
 $html = '';
 $html .= '
  <table class="table table-bordered table-striped">
   <tr>
    <th>Name</th>
    <th>Gender</th>
    <th>Designation</th>
   </tr>
  ';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["user_name"];
   $data[] = $row["user_money"];
   $data[] = $row["user_nic"];
   $html .= '
   <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["gender"].'</td>
    <td>'.$row["designation"].'</td>
   </tr>
   ';
  }
 }
 else
 {
  $data = 'No Data Found';
  $html .= '
   <tr>
    <td colspan="3">No Data Found</td>
   </tr>
   ';
 }
 $html .= '</table>';
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>