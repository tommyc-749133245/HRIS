<?php
session_start();
require_once '../dbconfig.php';
$dataArray = array();

    $keyword=$_POST['keyword'];

    $sql="SELECT staff_id, staff_name, HKID, dept, position,date_joined,e_type,AL_limit,SL_limit FROM $staff_tbl 
          WHERE staff_id LIKE '%$keyword%' 
          OR staff_name LIKE '%$keyword%'
          OR HKID LIKE '%$keyword%'
          OR dept LIKE '%$keyword%'
          OR e_type LIKE '%$keyword%'
          OR position LIKE '%$keyword%'";

    $result = $conn->query($sql); 

if ($result->rowCount()> 0) {

       while($row = $result->fetch(PDO::FETCH_ASSOC))
       $dataArray[] = $row;
       $_SESSION['DATA_ARR'] = $dataArray;
       session_write_close();
       header('location:../../StaffRecord.php');
       exit();
} else {
                $errmsg_arr[] = 'No record found';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
                header('location:../../StaffRecord.php');
		exit();
}

$conn = null;
?>