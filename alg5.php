<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Algorithm 5</title>
</head>

<body>
    <div class="container">
        <form method="POST">

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Texto" name="text" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Subtexto" name="pattern" required>
            </div>

            <button class="btn btn-success" type="submit">Procurar</button>
        </form>
    
<?php


/**
 * KMP linear algorithm for pattern searching
 * @param string $pat pattern(substring) that will be search in the text
 * @param string $txt full text
 * @return int
 */
function searchText($pat, $txt)
{
    if(strlen($pat)> strlen($txt)){
        return 0;
    } 

    $matches = 0;

    $patSize = strlen($pat);
    $txtSize = strlen($txt);
  
    $lps = [];
    fillZeroes($lps, $patSize);

    computeLPSArray($pat, $patSize, $lps);

    $iTxt = 0; 
    $iPat = 0; 
    while ($iTxt < $txtSize) {
        if ($pat[$iPat] == $txt[$iTxt]) {
            $iPat++;
            $iTxt++;
        }
        if ($iPat == $patSize) {
            $matches++;
            $iPat = $lps[$iPat - 1];
        }
        else if ($iTxt < $txtSize && $pat[$iPat] != $txt[$iTxt]) {
  
            if ($iPat != 0)
                $iPat = $lps[$iPat - 1];
            else
                $iTxt = $iTxt + 1;
        }
    }

    return $matches;
}
function computeLPSArray($pat, $patSize, &$lps)
{
    $len = 0;
    $lps[0] = 0; 
    $i = 1;
    while ($i < $patSize) {
        if ($pat[$i] == $pat[$len]) {
            $len++;
            $lps[$i] = $len;
            $i++;
        }
        else 
        {
            if ($len != 0) {
                $len = $lps[$len - 1];
            }
            else
            {
                $lps[$i] = 0;
                $i++;
            }
        }
    }
}

//to avoid using the native function array_fill
function fillZeroes(array &$arr, $n){
    for($i=0; $i<$n; $i++){
        $arr[$i] = 0;
    }
}


if(!empty($_POST["text"]) && !empty($_POST["pattern"])){
    $count = searchText($_POST["pattern"], $_POST["text"]);

    echo "<p class='text-center'>$count ocorrências de \"{$_POST['pattern']}\" no texto</p>";
}

?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>