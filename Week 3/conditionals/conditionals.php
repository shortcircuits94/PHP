<!DOCTYPE html>
<html>
<head>
	<title>Conditionals</title>
<body> 

 
<?php
	 $quantity = $_POST['quantity'];
	 $cost = 2000; 
	 $tax = 0.13; 
	 $discount = 100;
	 $taxRate = $tax + 1; 
	
	
	echo "<h2>The PHP payment calculation conditionals program</h2>";
	echo "<h2>programmed by \"Rebecca Scott\"</h2>";
	
	if (empty($quantity)) {
		echo "There was no quantity entered. Please enter a quantity.<br>";
	}
	
	
	if ($quantity * $cost <= 5000) {
		$under = round($quantity*$cost*$taxRate);
		$underpayment = round($quantity*$cost*$taxRate/12); 
		echo "Purchase is not above 5000, no discount applied.<br>";
		echo "With the purchase of $quantity at $$cost<br>";
		echo "Including tax it will cost $$under<br>";
		echo "The cost of a monthly payment over 12 months would be $$underpayment<br>";
	}
	
	if ($quantity * $cost >= 5000) {
		$over = round($quantity*$cost*$taxRate);
		$overpayment = round($quantity*$cost*$taxRate/12);
		printf("With the purchase of $quantity at $$cost<br>");
		printf("and the discount of $$discount it will cost $$over.<br>");
		printf("The cost of a monthly payment over 12 months would be $$overpayment<br>");
	}

?>