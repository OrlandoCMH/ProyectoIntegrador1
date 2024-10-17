<?php
session_start();
include_once("../Servicio/conexion.php");

// Ejecución de la consulta y manejo de errores
$sql = "SELECT c.categoria, COUNT(p.id_Cat) as sum 
        FROM productos AS p 
        INNER JOIN categorias AS c 
        ON p.id_Cat = c.id_cat 
        GROUP BY p.id_Cat";

$res = $conexion->query($sql);

if (!$res) {
    die("Error en la consulta SQL: " . $conexion->error);
}
?>
<html>

<head>
    <style>
        /* Estilos para centrar el gráfico */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0; /* Fondo claro */
        }

        #chart_div {
            width: 70%;
            height: 70%;
            background-color: white; /* Fondo del gráfico */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); /* Sombra para darle estilo */
        }
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Categorias', 'Cantidad por tipo'],
            <?php
                $rows = [];
                while ($fila = $res->fetch_assoc()) {
                    $rows[] = "['" . $fila["categoria"] . "', " . $fila["sum"] . "]";
                }
                echo implode(",", $rows); 
            ?>
        ]);

        var options = {
            title: 'Productos',
            width: '100%', // Se ajusta automáticamente
            height: '100%',
            backgroundColor: '#f9f9f9', // Fondo del gráfico
            pieSliceTextStyle: {
                color: 'black',
            },
            legend: {
                position: 'right',
                textStyle: {
                    fontSize: 14
                }
            },
            titleTextStyle: {
                fontSize: 20,
                bold: true
            },
            pieHole: 0.4, // Si prefieres un gráfico de dona
            slices: {
                0: { color: '#3366cc' },
                1: { color: '#dc3912' },
                2: { color: '#ff9900' },
                3: { color: '#109618' },
                4: { color: '#990099' }
            }
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <div id="chart_div"></div>
</body>

</html>
