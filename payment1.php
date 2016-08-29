<?php
    if(!empty($_POST['date'] || $_POST['member'] || $_POST['mpaid'])) {
                    
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "test";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                                                         
                    $query1 = "SELECT Balance FROM selected_members WHERE User LIKE '%".$_POST['member']."%'";
            
                    $result1 = mysqli_query($conn,$query1);
                    $balance1 = mysqli_fetch_array($result1);
                    
                    if(empty($balance1['Balance'])){
                        $query = "SELECT SUM(per_head) FROM lunch_system WHERE members LIKE '%".$_POST['member']."%'";
                        
                        $result = mysqli_query($conn,$query);
                        $balance = mysqli_fetch_array($result);

                        $balance['Balance'] = "";
                        $payment = $balance['SUM(per_head)'];
                        $sub = $balance['SUM(per_head)'] - $_POST['mpaid'] ;
                        
                        } else {
                            $query = "SELECT Balance FROM selected_members WHERE User LIKE '%".$_POST['member']."%'";
                            
                            $result = mysqli_query($conn,$query);
                            $balance = mysqli_fetch_array($result);
                            
                            $balance['SUM(per_head)'] = "";
                            $payment = $balance['Balance'];
                            $sub = $balance1['Balance'] - $_POST['mpaid'] ;
                        }                
                                
                    $insert = "INSERT INTO payment_table(date, member_name, payment, paid, balance)
                              VALUES ('".$_POST['date']."','".$_POST['member']."','".$payment."','".$_POST['mpaid']."','".$sub."')"; 
                    $fetch = "UPDATE selected_members SET Balance = '".$sub."'
                              WHERE User = '".$_POST['member']."' ";
                        
             if ($conn->query($insert) === TRUE) {    
                    echo "New record created";  
             } else {
		        echo "Error: " . $fetch . "<br>" . $conn->error;
		     }
             echo "<br>";
             if ($conn->query($fetch) === TRUE) {    
                    echo "New record updated in member's account";  
             } else {
		        echo "Error: " . $fetch . "<br>" . $conn->error;
		     }       
        $conn->close();
    }
?>