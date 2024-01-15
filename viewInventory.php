<!DOCTYPE html>
<html lang="en">

<!-----------------------------Main Navigation Header------------------------------>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./style.css">
  <title>Dream Team Auto View Inventory </title>
</head>
    <header class="main-header">
      <div class="logo-container">
          <img class="logoImage" src="images/logo.PNG" alt="Logo"> <!-- IF IMAGE DOES NOT LOAD, EITHER ADD OR REMOVE SLASH FROM images-->
      </div>
      <nav class="nav-menu">
          <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="product.php">Products</a></li>
              <li><a href="login.php">Sign in</a></li>
          </ul>
      </nav>
    </header>
<!-----------------------------Workstation Navigation Header------------------------------>
<div class="workstationNav">
<ul>
  <li class="workstationDrop">
    <a href="warehouse.php" class="workstationButton">Warehouse</a>
      <div class="workDropContent">
	<a href="printPacking.php">Print Packing List</a>
        <a href="printInvoice.php">Print Invoice</a>
        <a href="printShipping.php">Print Shipping Labels</a>
	<a href="updateOrderStatus.php">Update Order Status</a>
      </div>
     </li>
  <li class="workstationDrop">
    <a href="admin-login.html" class="workstationButton">Administrative</a>
      <div class="workDropContent">
        <a href="admin-login.html">Sign In</a>
      </div>
  </li>
  <li class="workstationDrop">
    <a href="receiving.php" class="workstationButton">Receiving</a>
    <div class="workDropContent">
      <a href="viewInventory.php">View Inventory</a>
      <a href="addInventory.php">Add Inventory</a>
    </div>
  </li>
</ul>
</div>

<!----------------- IMPLEMENTING THE VIEW INVENTORY CODE HERE --------------------------->
 <body> 
 <?php
          include 'secrets.php';
	  $sql = "SELECT inventory.PartNumber, inventory.Name, inventory.QuantityOnHand, inventory.Description FROM Inventory";
	  $result = $pdo->prepare($sql);
	  $result->execute();
	  $inventoryTableInfo = $result->fetchAll(PDO::FETCH_ASSOC);
	  drawTable($inventoryTableInfo);

	 function drawTable($rows)
	{
	  
 		echo '<table border=3px solid black, style="background-color:white; border-color:black;">';
		 echo "<tr>";
		//print headers
		echo '<th style="background-color:black; color:white;">Part Number</th>';
 		echo '<th style="background-color:black; color:white;">Name</th>';
 		echo '<th style="background-color:black; color:white;">Quantity</th>';
 		echo '<th style="background-color:black; color:white;">Description</th>';
		//print cell details
 		echo "</tr>";
 		foreach($rows as $row) 
 		{
       			echo "<tr>";
        		foreach($row as $column)
        		{
        	 	  echo "<td style='color:black;'> $column</td>";
        		}
        	        echo "</tr>";
 		}
	    echo "</table>";
	}
 ?>
</body>
</html>