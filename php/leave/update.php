<?php
session_start();
require_once '../dbconfig.php';
    
    $leaveid=$_POST['leaveid'];
    $s_date=$_POST['s_date_Edit'];
    $e_date=$_POST['e_date_Edit'];
    $duration=$_POST['duration_Edit'];
    $leavetype=$_POST['leavetype'];

    $sql="SELECT leave_id FROM $leave_tbl WHERE leave_id LIKE '%$leaveid%'"; 
    $result = $conn->query($sql);
    if($result->rowCount()== 1){
    $updatesql="UPDATE $leave_tbl SET start_date = '$s_date',end_date = '$e_date',
    duration= '$duration',leave_type='$leavetype' WHERE leave_id ='$leaveid'";
    $conn->exec($updatesql);
                $errmsg_arr[] = 'Update Scuess ';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../LeaveRecord.php');
		exit();
    }else{
           $errmsg_arr[] = 'Missing data';
           $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
           session_write_close();
	   header('location:../../LeaveRecord.php');
	   exit();
			}

$conn = null;
?>