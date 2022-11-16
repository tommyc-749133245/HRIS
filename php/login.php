<?php
session_start();
require_once 'dbconfig.php';

		$staffid = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($staffid == ''){
			$errmsg_arr[] = 'Username missing';
                        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		        session_write_close();
		        header('location:../index.php');
		        exit();
}
	        if($password == ''){
			$errmsg_arr[] = 'Password missing';
                        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		        session_write_close();
		        header('location:../index.php');
		        exit();
		
}	

		 if(empty($_SESSION['ERRMSG_ARR'])){
			$records = $conn->prepare('SELECT staff_id, password,staff_name FROM  staff WHERE staff_id = :staffid');
			$records->bindParam(':staffid', $staffid);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);;
			if(count($results) > 0 && $password == $results['password']){
                               $_SESSION['STAFFID'] = $results['staff_id'];
                               $_SESSION['STAFFNAME'] = $results['staff_name'];
                               header('location:../StaffRecord.php');				                         
			       exit();
			}else{
                                $errmsg_arr[] = 'Wrong Username or Password';
                                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		                session_write_close();
		                header('location:../index.php');
		                exit();
			}
		}

?>