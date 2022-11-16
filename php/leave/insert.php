<?php
session_start();
require_once '../dbconfig.php';
    $limit = 0;
    $staffid=$_POST['staffid'];
    $s_date=$_POST['s_date'];
    $e_date=$_POST['e_date'];
    $duration=$_POST['duration'];
    $leavetype=$_POST['leavetype'];

    if($s_date == ''){
		$errmsg_arr[] = 'You must enter start date';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../LeaveRecord.php');
		exit();
	}	
    if($e_date == ''){
		$errmsg_arr[] = 'You must enter end date';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../LeaveRecord.php');
		exit();
	}
    if($leavetype == 'NULL'){
		$errmsg_arr[] = 'You must enter leave type';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../LeaveRecord.php');
		exit();
	}
    if($leavetype == 'Annual Leave'){
          $sql="SELECT AL_limit FROM $staff_tbl WHERE staff_id LIKE '%$staffid%'";
          $r = $conn->query($sql);
          $q = $r ->fetch(PDO::FETCH_ASSOC);
          $limit = $q['AL_limit'];
    } else if($leavetype == 'Sick Leave'){
          $sql="SELECT SL_limit FROM $staff_tbl WHERE staff_id LIKE '%$staffid%'";
          $r = $conn->query($sql);
          $q = $r ->fetch(PDO::FETCH_ASSOC);
          $limit = $q['SL_limit'];
    }

    $sql="SELECT SUM(duration) AS value_sum FROM $leave_tbl 
          WHERE staff_id LIKE '%$staffid%' AND leave_type LIKE'%$leavetype%'";
     $result = $conn->query($sql);
     $row = $result ->fetch(PDO::FETCH_ASSOC);
     $durationSum = $row['value_sum'];
     $durationSum += $duration;

if($durationSum <= $limit){
     //insertAction
     $insertsql="INSERT INTO $leave_tbl(staff_id, start_date, end_date, duration,leave_type)VALUES('$staffid','$s_date', 
     '$e_date', '$duration', '$leavetype')";
      $conn->exec($insertsql);
      $errmsg_arr[] = 'Insert success';
      $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
      session_write_close();
      header('location:../../LeaveRecord.php');
      exit();
     }else{
                $errmsg_arr[] = 'This staff have reached the leave limit';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../LeaveRecord.php');
		exit();
      }

$conn = null;
?>