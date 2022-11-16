<?php
        $p_check;
        $e_check;
        if(isset($_SESSION['DATA_ARR_EDIT'])){
                      foreach ($_SESSION['DATA_ARR_EDIT'] as $row){
                       switch($row['position']){
                            case "Manager":
                                 $p_check = 1; break;
                            case "Assistant Manager":
                                 $p_check = 2; break;
                            case "Supervisor":
                                 $p_check = 3; break;
                            case "Senior Supervisor":
                                 $p_check = 4; break;
                            case "Receptionist":
                                 $p_check = 5; break;
                            case "Server":
                                 $p_check = 6; break;
                            case "Cashier":
                                 $p_check = 7; break;
                            case "FoodRunner":
                                 $p_check = 8; break;
                            case "Operation Manager":
                                 $p_check = 9; break;
                            default:
                                 $p_check = 0; break;
                        }
                        switch($row['e_type']){
                            case "Full Time":
                                 $e_check = 1; break;
                            case "Part Time":
                                 $e_check = 2; break;
                            default:
                                 $e_check = 0; break;
                        }
                      }
         }
?>