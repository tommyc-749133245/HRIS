<?php
session_start();
require_once '../dbconfig.php';


    $staffid=$_POST['staffid'];

    if($staffid == ''){
		$errmsg_arr[] = 'You must enter staff id';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../LeaveRecord.php');
		exit();
	}
    $sql="SELECT staff_name FROM $staff_tbl WHERE staff_id LIKE '%$staffid%'"; 
    $result = $conn->query($sql);

if ($result->rowCount()== 1) {
    $deletesql="DELETE FROM $leave_tbl WHERE staff_id ='$staffid'";
    $conn->exec($deletesql);
    $errmsg_arr[] = 'Record deleted successfully';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../LeaveRecord.php');
		exit();
   }else {
                $errmsg_arr[] = 'No record found';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
                header('location:../../LeaveRecord.php');
		exit();
}
$conn = null;
?>