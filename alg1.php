<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Algorithm 1</title>
</head>

<body>
    <div class="container">
        <form method="POST">

            <div class="mb-3">
                <label for="sides" class="form-label">Digite o array separado por vírgulas</label>
                <input type="text" id="sides" class="form-control" placeholder="Ex: 1,2,3,4,5,6" name="array" required>
            </div>
            <div class="mb-3">
                <label for="sides" class="form-label">Número de rotações (n>0 esquerda | n&lt0 direita)</label>
                <input type="text" id="sides" class="form-control" name="rotations" required>
            </div>

            <button class="btn btn-success" type="submit">Rotacionar</button>
        </form>
<?php
/**
 * Array rotation by reversal algorithm
 * @param array $arr Array to be rotated
 * @param int $k times rotated $k>0 left | $k<0 right
 */
function rotateArray(array &$arr, int $k)
{
    if ($k == 0 ||  abs($k) % count($arr) == 0) {
        return $arr;
    }
    $k = $k % count($arr);
    $arrSize = count($arr);
    $left = $k > 0;
    reverseArray($arr, 0, $left ? $k - 1 : $arrSize - 1 - abs($k));
    reverseArray($arr, $left ? $k : $arrSize - abs($k), $arrSize - 1);
    reverseArray($arr, 0, $arrSize - 1);
}


function reverseArray(array &$arr, int $start, int $end)
{
    while ($start < $end) {
        $temp = $arr[$start];
        $arr[$start] = $arr[$end];
        $arr[$end] = $temp;
        $start++;
        $end--;
    }
}


if(!empty($_POST)){
    $arr = explode("," , $_POST["array"]);
    $r = $_POST["rotations"];

    rotateArray($arr,  $r);
    printArray($arr);

}

function printArray($arr){

    echo "Array rotacionado: [";
    for($i=0; $i<count($arr); $i++){
        echo $arr[$i];
        if($i != count($arr)-1){
            echo ",";
        }
    }
    echo "]";
}


?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>
