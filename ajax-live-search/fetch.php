<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "gp");
$output = '';
$table=$_SESSION['email'];
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	
	$query = "
	SELECT * FROM ".$table."products 
	WHERE name LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM ".$table."products ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
$find=0;
	$output .= '<div class="table-responsive">';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr><option name="'.$row["Id"].'" value="'.$row["name"].'" id="m'.$find.'" class="prod" >
			</tr>
		';
$find++;
	}
$output .= '<input type="hidden" value='.$find.' id="find">';
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>