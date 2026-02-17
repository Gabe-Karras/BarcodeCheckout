<?php
session_start();
?>

<html>
<body>

<h2>Add Product:</h2>
<br>
<form action="display_product.php" method="post" enctype="multipart/form-data">
	<label for="pcode">Code:</label>
	<input type="number" id="pcode" name="code" step="1"> <br>
	<label for="pname">Name:</label>
	<input type="text" id="pname" name="name"> <br>
	<label for="price">Price:</label>
	<input type="number" id="price" name="price" min="0" step="0.01"> <br>
	<label for="description">Description:</label>
	<input type="text" id="description" name="description"> <br>
	<label for="image">Image:</label>
	<input type="file" id="image" name="image" accept="image/*"> <br> <br>
	<button type="submit">Submit</button> <br> <br>
</form>

<h2>Add Member:</h2>
<br>
<form action="display_member.php" method="post">
	<label for="mcode">Code:</label>
	<input type="number" id="mcode" name="code"> <br>
	<label for="phone">Phone:</label>
	<input type="number" id="phone" name="phone"> <br>
	<label for="mname">Name:</label>
	<input type="text" id="mname" name="name"> <br> <br>
	<button type="submit">Submit</button> <br> <br>
</form>

<h2>Remove Product:</h2>
<br>
<form action="remove_product.php" method="post">
	<label for="rpcode">Code:</label>
	<input type="number" id="rpcode" name="code"> <br>
	<button type="submit">Submit</button> <br> <br>
</form>

<h2>Remove Member (Code):</h2>
<br>
<form action="remove_member.php" method="post">
	<label for="rmcode">Code:</label>
	<input type="number" id="rmcode" name="code"> <br>
	<button type="submit">Submit</button> <br> <br>
</form>

<h2>Remove Member (Phone):</h2>
<br>
<form action="remove_member.php" method="post">
	<label for="rmphone">Phone:</label>
	<input type="number" id="rmphone" name="phone"> <br>
	<button type="submit">Submit</button> <br> <br>
</form>

<h2>Generate Receipt:</h2>
<br>
<form action="generate_receipt.php" method="post">
	<label for="codes">Product Codes (separate by spaces):</label>
	<input type="text" id="codes" name="codes"> <br> <br>
	<button type="submit">Submit</button> <br> <br>
</form>

</body>
</html>