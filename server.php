<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "inventory");

$prodname = "";
$prodcategory= "";
$prodID = 0;
$update= false;

if (isset($_POST['save'])) {
    $prodID= $_POST['prodID'];
    $prodname= $_POST['prodname'];
    $prodcategory= $_POST['prodcategory'];

    mysqli_query($db,"INSERT INTO product (prodID, prodname, prodcategory) VALUES ('$prodID', '$prodname', '$prodcategory')");
    $_SESSION['message'] = "new product item saved";
    header('location: index.php');
 }
 if (isset($_POST['update'])) {
    $prodID= $_POST['prodID'];
    $prodname= $_POST['prodname'];
    $prodcategory= $_POST['prodcategory'];

    mysqli_query($db,"UPDATE product SET  prodname='$prodname', prodcategory='$prodcategory' WHERE prodID=$prodID");
    $_SESSION['message'] = "product record updated";
    header('location: index.php');
 }
 if (isset($_GET['del'])) {
    $prodID= $_GET['del'];
    mysqli_query($db,"DELETE FROM product WHERE prodID = $prodID");
    $_SESSION['message'] = "product record deleted";
    header('location: index.php');
 }
 ?>