<?php  include 'server.php' ; ?>
<?php
if (isset($_GET['edit'])) {
     $prodID = $_GET['edit'];
     $update= true;
     $record = mysqli_query($db, "SELECT * FROM product WHERE prodID=$prodID");
     if (count($record)== 1){
         $n=mysqli_fetch_array($record);
         $prodname= $n['prodname'];
         $prodcategory = $n['prodcategory'];
         }
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Product Maintenance Module</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
    <div class ="msg">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif?>
<form method="post" action="server.php">
<div class= "input-group">

     <input type="hidden" name="prodID" value="<?php echo $prodID; ?>">
     <label>Product Name</label>
     <input type="text" name="prodname" value="<?php echo $prodname; ?>">
</div>
<div class= "input-group">
     <label>Product Category</label>
     <input type="text" name="prodcategory" value="<?php echo $prodcategory; ?>">

     </div>
     <div class= "input-group">
        <?php if($update == true): ?>
             <button class= "btn" type="submit" name="update" style="background: #556B2F;">update</button>
        <?php else: ?>
             <button class= "btn" type="sumbit" name="save">Save</button>
    <?php endif ?>
     </div>

<table>
<thead>
    <tr>
        <th><?php echo ("ProductID");  ?> </th>
        <th><?php echo ("ProductName");  ?> </th>
        <th><?php echo ("ProductCategory"); ?> </th>
        <th><?php echo ("Action");  ?> </th>
    </tr>
<thead>
<?php

$con = mysqli_connect("localhost", "root", "", "inventory");
$result=  mysqli_query($con,"select * from product");
while ($row = mysqli_fetch_array($result)) { ?>

    <tr>
       <td><?php echo $row["prodID"]; ?> </td>
       <td><?php echo $row["prodname"]; ?> </td>
       <td><?php echo $row["prodcategory"]; ?> </td>
     <td>
         <a href="index.php?edit=<?php echo $row['prodID'];?> "class="edit_btn">Edit</a>
     </td>
     <td>
         <a href="server.php?del=<?php echo $row['prodID'];?> "class="del_btn">Delete</a>
     </td>
     </tr>

         <?php }  ?>
</table>
</body>
</html>