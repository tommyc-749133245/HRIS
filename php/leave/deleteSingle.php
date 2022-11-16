<?php
session_start();
require_once '../dbconfig.php';


    $leaveid=$_POST['leaveid'];

    if($leaveid == ''){
		$errmsg_arr[] = 'You must enter record no';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../LeaveRecord.php');
		exit();
	}
    $sql="SELECT leave_id FROM $leave_tbl WHERE leave_id LIKE '%$leaveid%'"; 
    $result = $conn->query($sql);

if ($result->rowCount()== 1) {
    $deletesql="DELETE FROM $leave_tbl WHERE leave_id ='$leaveid'";
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