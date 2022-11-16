<?php
session_start();
require_once '../dbconfig.php';
$dataArray = array();

    $keyword=$_POST['keyword'];

    $sql="SELECT * FROM $staff_tbl 
          WHERE staff_id LIKE '%$keyword%'"; 

    $result = $conn->query($sql); 

if ($result->rowCount()== 1) {

       while($row = $result->fetch(PDO::FETCH_ASSOC))
       $dataArray[] = $row;
       $_SESSION['DATA_ARR_ADD'] = $dataArray;
       session_write_close();
       header('location:../../LeaveRecord.php');
       exit();
} else {
                $errmsg_arr[] = 'No Staff record found';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
                header('location:../../LeaveRecord.php');
		exit();
}

$conn = null;
?>