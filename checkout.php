<!DOCTYPE html>
<html>
<head>
    <title>Checkout | TFPS</title>
</head>
<body>
                    <h2>CONFIRM THE PRODUCT</h2>
                    <br>
                    <a href="index.html"><button type="submit">Back</button></a>
                    <?php
                    $prodid = $_POST[noijazah];
                    $konek = mysqli_connect("localhost", "root", "toorkgp12", "tfpsqr");
                    $sql=mysqli_query($konek, "SELECT * FROM equipments WHERE id='$_POST[noijazah]'");
                    $d=mysqli_fetch_array($sql);
                    

                    if(mysqli_num_rows($sql) < 1){
                        ?>
                            echo "<h2>NO EQUIPMENT FOUND!</h2>";
                        <?php
                    }else{
                    ?>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Equipment Id</th>
                            <th>Equipment Name</th>
                            <th>currently With</th>
                        </tr>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['name']; ?></td>
                            <td><?php echo $d['owner2']; ?></td>
                        </tr>
                    </table>
                    <?php } ?>

                <form method="POST" action="login.php"> 
                    <div class="input">
                        <input type="hidden" name="prodid1" value="<?php echo $prodid; ?>">
                     </div>
                    <div class="input">
                          <button type="submit" class="btn" name="login_btn">PROCEED</button>
                    </div>
                </form>
                    
</body>
</html>