<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Algorithm 4</title>
</head>

<body>
    <div class="container">
        <form method="POST">

            <div class="mb-3">
                <label for="sides" class="form-label">Lados: </label>
                <input type="text" id="sides" class="form-control" placeholder="Ex: 3,5,1,7,4,2" name="sides" required>
            </div>

            <button class="btn btn-success" type="submit">Relacionar</button>
        </form>
        <?php
        /**
         * @param array $sides the 6 sides [a,b,c,d,e,f]
         * @return array $triangles array with all possible triangles made with given sides [a,b,c][d,e,f]...
         */

        function getTriangles(array $sides)
        {
            $arrSize = count($sides);
            $triangles = [];
            for ($i = 0; $i < count($sides); $i++) {
                if ($sides[$i] < 0) return;
            }
            insertionSort($sides);
            for ($i = $arrSize - 1; $i >= 1; $i--) {
                $l = 0;
                $r = $i - 1;
                while ($l < $r) {
                    if ($sides[$l] + $sides[$r] > $sides[$i]) {
                        fillTrianglesArr($sides, $i, $l, $r, $triangles);
                        $r--;
                    } else {
                        $l++;
                    }
                }
            }
            return $triangles;
        }
        function fillTrianglesArr(array $sides, int $test, int $start, int $end, array &$arr)
        {
            $c = count($arr);

            for ($i = $start; $i < $end; $i++) {
                $arr[$c] = [$sides[$i], $sides[$end], $sides[$test]];
                $c++;
            }
        }
        //to avoid using the native sort()
        //insertion sort over quicksort because it will most likely not be so many sides
        function insertionSort(&$arr)
        {
            $n = count($arr);
            for ($i = 1; $i < $n; $i++) {
                $key = $arr[$i];
                $j = $i - 1;

                while ($j >= 0 && $arr[$j] > $key) {
                    $arr[$j + 1] = $arr[$j];
                    $j = $j - 1;
                }
                $arr[$j + 1] = $key;
            }
        }

        //just to print in a pretty way
        function printTriangles($sides)
        {
            $triangles = getTriangles($sides);
            if(count($triangles) == 0) {
                echo "<p class='text-center'>Nenhum triângulo formado</p>";
                return;
            }

            echo "<p class='text-center'>Os triângulos formados a partir dos lados: ";
            for ($i = 0; $i < count($sides); $i++) {
                echo $sides[$i] . ", ";
            }
            echo " são: ";
            for ($i = 0; $i <count($triangles); $i++) {
                echo "[" . $triangles[$i][0] . " " . $triangles[$i][1] . " " . $triangles[$i][2] . "] ";
            }
            echo "</p>";
        }

        
        if(!empty($_POST["sides"])){
            $sides = explode("," , $_POST["sides"]);
            for($i=0; $i<count($sides); $i++){
                $pattern = "/[0-9]/i";
                if(!preg_match($pattern, $sides[$i])){

                    echo "<p class='text-center'>Insira apenas números separados por vírgula</p>";
                    exit;
                }
            }
            printTriangles($sides);

        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>