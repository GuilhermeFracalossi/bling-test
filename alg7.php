<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Algorithm 7</title>
</head>

<body>
    <div class="container">
        <form method="POST">

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Chave" name="key" required minlength="10" maxlength="10">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Número" name="number" required>
            </div>

            <button class="btn btn-success" type="submit">Cifrar</button>
        </form>
    
<?php

if (isset($_POST["key"]) && isset($_POST["number"])) {
    $output = cipher($_POST["key"], $_POST["number"]);
    if($output != null){
        echo "<p class='text-center'>A chave cifrada é: " . $output . "</p>";
    }
}

function cipher(string $key, string $number)
{

    if(strlen($key) != 10) return;
    $regex = "/[0-9]/";
    $output = "";
    for ($i = 0; $i < strlen($number); $i++) {
        
        if (!preg_match($regex, $number[$i])) {
            $output .= $number[$i];
            continue;
        }
        $output .= $key[$number[$i]];
    }
    return $output;
}

?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>