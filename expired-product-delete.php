<?php
  include 'config.php';

  $prodID = $_GET['id'];

  $sql = "DELETE FROM manage_product WHERE prodID=$prodID";
  $result = mysqli_query($conn, $sql);

  header("location: expired-product.php?msg=Record Deleted Successfully");
?>