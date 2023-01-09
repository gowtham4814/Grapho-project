<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "gp");
$output = '';

$table=$_SESSION['email'];
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);

	$query = "
	SELECT * FROM ".$table."list
	WHERE date LIKE '%".$search."%'
	";
}
else
{
$query = "
SELECT * FROM ".$table."list ORDER BY id";

}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table id="first" class="table table bordered">
						<tr class="heading">
							<th>Id</th>
							<th>Customer Name</th>
							<th>Bill No</th>
							<th>Product Name</th>
							<th>No of Products</th>
							<th>Price</th>
                            <th>Date</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["customername"].'</td>
				<td>'.$row["billno"].'</td>
				<td>'.$row["name"].'</td>
				<td>'.$row["totalproducts"].'</td>
				<td>'.$row["price"].'</td>
                <td>'.$row["date"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>