<?php include('session1.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="payment.css">
    <script src="http://localhost/php/newtask/payment_validation.js"></script>
    <script src="http://localhost/php/newtask/payment_validation2.js"></script>
</head>
<body>
    <div class="header-bar">
        <div class="header-option">
            <a href="Entry.php">Home</a>
        </div>
        <div class="logout">
				<input name="logout" type="button" id="logout" value="logout" onclick="window.location='logout1.php'" >
		</div>	
    </div>

<?php
$_POST['date'] = $_POST['mpaid'] = $_POST['member'] = "";
?>    

<!------------------------------ sql quries to get amount --------------------------------------->
<?php include('payment2.php'); ?>

<!--------------------------------------Table of fetch amount---------------------------------------->
    <div class="member-detail">
        <form class="selected-member" method="POST" action="" >
            <fieldset style="height:80px;">
                <legend><h3>Member Detail</h3></legend>
                <table>
                    <tr>
<!-- Name of member to find amount -->
                        <td>Member:</td>
                        <td><select name="select_member" id="select_member" style="width:155px;">
                                <option></option>
                             <?php
                                $edit = "SELECT User FROM selected_members ";				
                                    
                                $result = mysqli_query($conn,$edit);
                                while($row = mysqli_fetch_array($result)) {
                             ?>
                                <option><?php echo $row["User"] ; } ?></option>  
                             </select></td>
                        <td style="width:50px;"><td>
<!-- Fetch total amount of selected member -->
                        <td>Amount:</td>
                        <td style="text-align:center;"><b>
                            <span><?php echo $balance['SUM(per_head)']; 
                                        echo $balance['Balance']; ?></span></b><td>
                        <td style="width:50px;"></td>     
<!-- button of fetch amount -->
                        <td><input type="submit" name="fetch_amount" value="amount" onclick="return revalidate()"></td>
                    </tr>    
                    <tr>
                        <td></td>
                        <td><span id="var_select_member" class="error"></span></td>
                    </tr>  
                </table>      
            </fieldset>
            </form>
        </div>  
<!--------------------------------- Submit amount  ----------------------------------------------->         
    <div class="payment-div">
        <form class="payment" action="" method="POST" >
            <fieldset>
                <legend><h3>Payment Screen</h3></legend>
                    <table>
                        <tr>
<!--insert date of payment-->
                            <td>Date:</td>
                            <td><input type="date" name="date" id="date"></td>
                            <td><span id="var_date" class="error"></span></td>
                        </tr>
                        <tr>
<!--insert member name of payment-->
                            <td>Member:</td>
                            <td><select name="member" id="member" style="width:145px;">
                    <option></option>
        <?php   $edit = "SELECT User FROM selected_members ";				
                        
                    $result = mysqli_query($conn,$edit);
                    while($row = mysqli_fetch_array($result)) {
        ?>
                    <option><?php echo $row["User"] ; } ?></option>  
        </select></td>
            <td><span id="var_member" class="error"></span></td>        
                        </tr>
                        <tr>
<!--insert amount -->
                            <td>Amount paid:</td>
                            <td><input type="text" name="mpaid" id="mpaid"></td>
                            <td><span id="var_mpaid" class="error"></span></td>
                        </tr>    
                        <tr>
                            <td></td>
<!--submit button of insert data-->
                            <td><input type="submit" name="submit_data" value="paid" onclick="return validate()" style="width:80px;"></td>
                        </tr>
                    </table>
            </fieldset>
<!------------------------------ sql quries to insert amount ---------------------------------------->
<?php include('payment1.php'); ?>

</form>
</div>     
</body>
</html>