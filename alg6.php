<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<title>Algorithm 6</title>
</head>

<body>
	<div class="container">
		<h2 class="mb-3">Preencha os números da matriz 3x3</h2>
		<form method="POST">

			<div class="input-group mb-3">
				<input class="form-control" type="number" required name="n0">
				<input class="form-control" type="number" required name="n1">
				<input class="form-control" type="number" required name="n2">
			</div>
			<div class="input-group mb-3">
				<input class="form-control" type="number" required name="n3">
				<input class="form-control" type="number" required name="n4">
				<input class="form-control" type="number" required name="n5">
			</div>
			<div class="input-group mb-3">
				<input class="form-control" type="number" required name="n6">
				<input class="form-control" type="number" required name="n7">
				<input class="form-control" type="number" required name="n8">
			</div>

			<button class="btn btn-success" type="submit">Ordenar</button>
		</form>
	
<?php
/**
 * Bobble sort algorithm since it's just a 3x3 matrix (9 numbers)
 * @param array $arr of arrays (2d array) to be sorted
 */
function insertionSort(array &$arr)
{
	$r = count($arr); // number of rows since its a 2d array [ [], [], [] ]
	$c = count($arr[0]); //number of columns
	for ($i = 0; $i < $r * $c - 1; ++$i) {
		for ($j = 0; $j < $r * $c - 1 - $i; ++$j) {

			// $j / $c gets each row: 0,0,0,1,1,1... and $j % $c gets each column: 0,1,2,0,1,2...
			//basically if $arr[0][1]>$arr[0][2] and so on
			if ($arr[$j / $c][$j % $c] > $arr[($j + 1) / $c][($j + 1) % $c]) {

				//swap the values
				$temp = $arr[($j + 1) / $c][($j + 1) % $c];
				$arr[($j + 1) / $c][($j + 1) % $c] = $arr[$j / $c][$j % $c];
				$arr[$j / $c][$j % $c] = $temp;
			}
		}
	}
}

$arr = [];
for($i=0; $i<9; $i++){
	
	if(!isset($_POST["n".$i])){
		$arr = null;
		break;
	}
	$arr[$i/3][$i%3] = $_POST["n".$i];
	
	
}
if($arr != null) {
	insertionSort($arr);
	printArray($arr);

}

function printArray($arr){
	echo "<table class='table'>";
	for($i=0; $i<count($arr); $i++){
		echo "<tr>";
		for($j=0; $j<count($arr[0]); $j++){
			echo "<td>".$arr[$i][$j]."</td>";
		} 
		echo "</tr>";
	}
	echo "</table>";
}

?>

</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>