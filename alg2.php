<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Algorithm 2</title>
</head>

<body>
    <div class="container">
        <form method="POST">
            <h4>Data inicial</h4>
            <div class="mb-3 row">
                <div class="col-sm">
                    <input type="number" class="form-control" placeholder="dd" required name="d1" min="1" max="31">

                </div>
                <div class="col-sm">
                    <input type="number" class="form-control" placeholder="mm" required name="m1" min="1" max="12">
                </div>
                <div class="col-sm">
                    <input type="number" class="form-control" placeholder="YYYY" required name="y1">
                </div>
            </div>
            <h4>Data final</h4>
            <div class="mb-3 row">
                <div class="col-sm">
                    <input type="number" class="form-control" placeholder="dd" required name="d2" min="1" max="31">

                </div>
                <div class="col-sm">
                    <input type="number" class="form-control" placeholder="mm" required name="m2" min="1" max="12">
                </div>
                <div class="col-sm">
                    <input type="number" class="form-control" placeholder="YYYY" required name="y2">
                </div>
            </div>

            <button class="btn btn-success" type="submit">Calcular diferença</button>
        </form>
        <?php


        /** 
         * @param string $startDate string of the starting date, like "01/01/2010"
         * @param string $endDate string of the ending date, like "01/01/2020"
         */
        function weeksBetween(array $date1, array $date2)
        {
            $julianTimeStart = integerDiv(1461 * ($date1[2] + 4800 + integerDiv($date1[1] - 14, 12)), 4) + integerDiv(367 * ($date1[1] - 2 - 12 * (integerDiv($date1[1] - 14, 12))), 12) -
                integerDiv(3 * integerDiv($date1[2] + 4900 + integerDiv($date1[1] - 14, 12), 100), 4) + $date1[0] - 32075;

            $julianTimeEnd = integerDiv(1461 * ($date2[2] + 4800 + integerDiv($date2[1] - 14, 12)), 4) + integerDiv(367 * ($date2[1] - 2 - 12 * (integerDiv($date2[1] - 14, 12))), 12) -
                integerDiv(3 * integerDiv($date2[2] + 4900 + integerDiv($date2[1] - 14, 12), 100), 4) + $date2[0] - 32075;

            $diff = $julianTimeEnd - $julianTimeStart;

            //return positive number of weeks even if the start date it's after the end date
            return absoluteValue(integerDiv($diff, 7));
        }

        //This is to avoid using the intdiv() native function in the main part of the code
        function integerDiv($a, $b)
        {
            return ($a - $a % $b) / $b;
        }
        function absoluteValue($n)
        {
            return $n > 0 ? $n : $n * -1;
        }

        if (!empty($_POST)) {
            $start = [$_POST["d1"], $_POST["m1"], $_POST["y1"]];
            $end = [$_POST["d2"], $_POST["m2"], $_POST["y2"]];
            echo "<p class='text-center fs-3'>".weeksBetween($start, $end) . " semana(s) de diferença </p>";
        }

?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>