<?php include('config.php');
    session_start(); 

    if ($_SESSION['user']['role']!='U')
    {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout | TFPS</title>
</head>
<body>
   <h2>Confirm the Equipment</h2>            
    <?php
    $prodid = $_POST[pid];
    $sql=mysqli_query($conn, "SELECT * FROM equipment WHERE id='$_POST[pid]'");
    $d=mysqli_fetch_array($sql);
    if(mysqli_num_rows($sql) < 1){
    ?>
        <h4>No Equipment Found</h4>
    <?php
    }
    else
    {
    ?>
        <table style="border-collapse: collapse;border: 1px solid black;">
        <tr>
            <th>Equipment Name</th>
            <th>Category</th>
            <th>Borrowed From</th>
        </tr>
        <tr>
            <td><?php echo $d['name']; ?></td>
            <td><?php echo $d['categname']; ?></td>
            <td><?php echo $d['cwname']; ?></td>
        </tr>
        </table>
    <form method="POST" action="borrow.php"> 
        <input type="hidden" name="prodid" value="<?php echo $prodid; ?>">
        <input type="hidden" name="uname" value="<?php echo $_SESSION['user']['name']; ?>">
        <input type="hidden" name="uid" value="<?php echo $_SESSION['user']['id']; ?>">
        <input type="hidden" name="umob" value="<?php echo $_SESSION['user']['mobile']; ?>">
        <div class="input-group">
            <input type="text" name="remark" placeholder="Remarks (If Any)">
        </div>
        <div class="input">
        <button type="submit" class="btn" name="borrow">Borrow</button>
        </div>
    </form> 
    <?php } ?>      
    <br><br>        
    <a href="dashboard.php">Back</a> 
</body>
</html>