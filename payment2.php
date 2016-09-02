<?php
    $conn = mysqli_connect('localhost','root','mysql','mysql');
            mysqli_select_db($conn,"mysql");
            
    if(!empty($_POST['select_member'])){
            
            $query1 = "SELECT Balance FROM selected_members WHERE User LIKE '%".$_POST['select_member']."%'";
            
            $result1 = mysqli_query($conn,$query1);
            $balance1 = mysqli_fetch_array($result1);
            
            if(empty($balance1['Balance'])){
            $query = "SELECT SUM(per_head) FROM lunch_system WHERE members LIKE '%".$_POST['select_member']."%'";
            
            $result = mysqli_query($conn,$query);
            $balance = mysqli_fetch_array($result);

            $balance['Balance'] = "";

            } else {
                $query = "SELECT Balance FROM selected_members WHERE User LIKE '%".$_POST['select_member']."%'";
                
                $result = mysqli_query($conn,$query);
                $balance = mysqli_fetch_array($result);
                
                $balance['SUM(per_head)'] = "";
            }                
    } else {
        $balance['SUM(per_head)'] = "";
        $balance['Balance'] = "";
    }
?>    
