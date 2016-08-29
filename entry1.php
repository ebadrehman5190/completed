<?php
                if($_POST){
                    
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
                        
                
                $items=implode(',',$_POST['mytext']);
                $select=implode(',',$_POST['member']);
                
                foreach ($_POST['member'] as $key => $value) {
                    $query = "SELECT Balance FROM selected_members WHERE User LIKE '%".$value."%' ";
                    
                    $result = mysqli_query($conn,$query);    
                    $balance = mysqli_fetch_array($result);
                                 
                    if(!empty($balance['Balance'])){
                        
                            $add = $balance['Balance'] + $_POST['per_head'] ;
                            $update = "UPDATE selected_members SET Balance = '".$add."'
                                    WHERE User = '".$value."' ";                               
                    
                        if ($conn->query($update) === TRUE) {
                            echo "";
                        } else {
                        echo "Error: " . $update . "<br>" . $conn->error;
                        }
                    } 
                }                                    
                    $new = "INSERT INTO Lunch_system (date, members, items, paid, amount, per_head)
                            VALUES ('".$_POST['date']."', '".$select."', '".$items."', '".$_POST['paid']."', '".$_POST['amount']."', '".$_POST['per_head']."' )";
                    
                    if ($conn->query($new) === TRUE) {
                        echo "New record created in system";
                    } else {
					echo "Error: " . $new . "<br>" . $conn->error;
				    }
                                    
            $conn->close();
            }
    ?>