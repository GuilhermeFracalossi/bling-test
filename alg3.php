<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Algorithm 3</title>
</head>

<body>
    <div class="container">
        <form method="POST">
            <h4>Insira as coordenadas dos vértices do retângulo</h4>

            <div class="mb-3 row">
                <label for="x1" class="col-sm-1 col-form-label">x1:</label>
                <div class="col-sm">
                    <input type="number" class="form-control" id="x1" name="x1" required>
                </div>
                <label for="y1" class="col-sm-1 col-form-label">y1:</label>
                <div class="col-sm">
                    <input type="number" class="form-control" id="y1" name="y1" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="x2" class="col-sm-1 col-form-label">x2:</label>
                <div class="col-sm">
                    <input type="number" class="form-control" id="x2" name="x2" required>
                </div>
                <label for="y2" class="col-sm-1 col-form-label">y2:</label>
                <div class="col-sm">
                    <input type="number" class="form-control" id="y2" name="y2" required>
                </div>
            </div>

            <h4>Insira as coordenadas do ponto</h4>
            <div class="mb-3 row">
                <label for="pX" class="col-sm-1 col-form-label">x1:</label>
                <div class="col-sm">
                    <input type="number" class="form-control" id="pX" name="pX" required>
                </div>
                <label for="pY" class="col-sm-1 col-form-label">y2:</label>
                <div class="col-sm">
                    <input type="number" class="form-control" id="pY" name="pY" required>
                </div>
            </div>


            <button class="btn btn-success" type="submit">Testar</button>
        </form>
        <?php

        /**
         * @param array $v1 vertex 1 [x1, y2]
         * @param array $v2 vertex 2 [x2, y2]
         * @param array $point [x, y]
         */
        function isInRectangle(array $v1, array $v2, array $point)
        {
            if ($v1[0] == $v2[0] || $v1[1] == $v2[1]) return;

            $topX = higherNumber($v1[0], $v2[0]);
            $botX = lowerNumber($v1[0], $v2[0]);
            $topY = higherNumber($v1[1], $v2[1]);
            $botY = lowerNumber($v1[1], $v2[1]);
            if ($point[0] <= $topX && $point[0] >= $botX && $point[1] <= $topY && $point[1] >= $botY) {
                return true;
            }
            return false;
        }

        function higherNumber(int $a, int $b)
        {
            return $a > $b ? $a : $b;
        }
        function lowerNumber(int $a, int $b)
        {
            return $a < $b ? $a : $b;
        }


        if (!empty($_POST)) {
            $v1 = [$_POST["x1"], $_POST["y1"]];
            $v2 = [$_POST["x2"], $_POST["y2"]];
            $point = [$_POST["pX"], $_POST["pY"]];

            echo "<p class='text-center fs-2'>" ;
            echo isInRectangle($v1, $v2, $point) ? "Verdadeiro" : "Falso" . "</p>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>