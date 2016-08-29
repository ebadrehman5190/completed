<?php include('session1.php'); ?>

<!doctype html>
<html>
<head>    
    <title>Entry</title>    
    <link rel="stylesheet" href="styles.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://localhost/php/newtask/addbutton_jquery.js"></script>
    <script src="http://localhost/php/newtask/per_head.js"></script>
    <script src="http://localhost/php/newtask/entry_validation.js"></script>
</head>        
<body>         

<!---------------------------------- Header bar --------------------------------->                
<div class="menu">
    <div class="header-bar-color">
        <div class="header-bar">
            <div class="history">    
                <div class="history-tab">
                    <a href="data.php" style="margin-left:5px;">History</a>
                </div>     
                <div class="member-tab"> 
                    <a href="member_data.php" style="margin-left:5px;">Member History</a> 
                </div>
                <div class="payment-detail-tab">
                    <a href="search_by_date.php" style="margin-left:5px;">Search By Date</a> 
                </div>
                <div class="payment-tab">
                    <a href="Payment.php" style="margin-left:5px;">Payment</a>
                </div>
                <input name="logout" type="button" id="logout" value="logout" onclick="window.location='logout1.php'" >
            </div>
        </div> 
    </div>             

<?php include('entry2.php'); //php validation ?>
<?php
$dateErr=$memberErr=$mytextErr=$paidErr=$amountErr="";
$date=$member=$mytext=$paid=$amount="";
?> 
           
<form action="" method="POST" onSubmit="return revalidate()" >
    <fieldset class="field">

    <div class="main">
        
        Date:
        <div class="align">
            <input type="date" name="date" id="date">
            </div>
            <span id="var_date" style="color:red;"><?php echo $dateErr;?></span>
        <br>

        Members:
        <div class="align">
                    <select multiple="multiple" name="member[]" id="mSelect" size="3" style="width:150px;">
                            <?php
                        
                                $conn = mysqli_connect('localhost','root','','test');
                                mysqli_select_db($conn,"test");

                                $edit = "SELECT User FROM selected_members ";				
                                    
                                $result = mysqli_query($conn,$edit);
                                                                
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                        <option value="<?php echo $row["User"] ;  ?>">
                            <?php echo $row["User"] ;  ?>
                        </option>
                        <?php } ?>
                    </select>
            </div>
            <span id="var_mSelect" style="color:red;"><?php echo $memberErr;?></span>
        <br>

        Items:  
            <div class="align">
                <div class="input_fields_wrap">   
                    <div>
                        <div>
                            <input type="text" name="mytext[]" id="mytext">
                            <button class="add_field_button">Add More</button>
                        </div>  
                    </div> 
                </div>
            </div>
        <span id="var_mytext" style="color:red;"><?php echo $mytextErr;?></span>
        <br>

        Paid money:
        <div class="align">
            <select name="paid" id="paid" style="width:150px;">
                <option></option>
                <?php
                        $conn = mysqli_connect('localhost','root','','test');
                        mysqli_select_db($conn,"test");

                        $edit = "SELECT User FROM selected_members ";				
                                
                        $result = mysqli_query($conn,$edit);
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                    <option><?php echo $row["User"] ; } ?></option>  
                </select>
            </div>
        <span id="var_paid" style="color:red;"><?php echo $paidErr;?></span>
        <br>

        Total amount:
        <div class="align">
            <input type="number" name="amount" id="amount" class="countOne" onkeyup="myFunction(this.value)">
            </div>
        <span id="var_amount" style="color:red;"><?php echo $amountErr;?></span>                                
        <br>

        Perhead: 
        <div class="align">
            <input type="text" name="per_head" id="resultHere" readonly>
        </div>
                                    
        <br><br>
            <input type="submit" value="submit">    
        </div>
    </fieldset>      
                      
<?php include('entry1.php'); // sql query to insert data ?>

</form>
</div>
</body>
</html>                               