<?php
    if($_POST){
                    
    $conn = mysqli_connect('localhost','root','','test');
    mysqli_select_db($conn,"test");
				
    $fetch="SELECT date, members, items, paid, amount, per_head FROM lunch_system WHERE date ='". $_POST['date'] ."' AND members LIKE '%". $_POST['member'] ."%' ";
                
    $amount = mysqli_query($conn, $fetch);
    $data = mysqli_fetch_array($amount);
    }
?>
