<?php
    if(!empty($_POST['date'] || $_POST['member'] || $_POST['mpaid'])) {
                    
                $servername = "localhost";
                $username = "root";
                $password = "mysql";
                $dbname = "mysql";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                                                         
                    $query = "SELECT Balance FROM selected_members WHERE User LIKE '%".$_POST['member']."%'";
            
                    $result = mysqli_query($conn,$query);
                    $balance = mysqli_fetch_array($result);
                    
                    if(empty($balance['Balance'])){
                        $query = "SELECT SUM(per_head) FROM lunch_system WHERE members LIKE '%".$_POST['member']."%'";
                        
                        $result = mysqli_query($conn,$query);
                        $balance = mysqli_fetch_array($result);

                        $payment = $balance['SUM(per_head)'];
                        $sub = $balance['SUM(per_head)'] - $_POST['mpaid'] ;
                        
                        } else {
                            $payment = $balance['Balance'];
                            $sub = $balance['Balance'] - $_POST['mpaid'] ;
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