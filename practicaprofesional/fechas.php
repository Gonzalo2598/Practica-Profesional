<?php
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final  = $_POST['fecha_final'];

$con = new mysqli("localhost","root","rootroot","agenda"); // Conectar a la BD
$query = $con->query("SELECT SUM(total)AS 'Ingresos' from ventas WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_final'"); // Ejecutar la consulta SQL
$data = array(); // Array donde vamos a guardar los datos
while($r = $query->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    $data[]=$r; // Guardar los resultados en la variable $data
}

?>

<?php
include "vista/header.php";
?>

    <title>PROGRAMACION III - GRAFICOS CON PHP y MySQL</title>

<?php
include "vista/nav.php";
?>  
<div class="Centrar">
        <header>
			<div class="alert alert-info">
                <h1>Ingresos Totales entre Fechas <?php echo $fecha_inicio ?> y <?php echo $fecha_final ?></h1>
			</div>
		</header>
    
    <canvas id="chart1"  height="100"></canvas>
    <script>
            var ctx = document.getElementById("chart1");
            

            
            var data = {
                labels: [ 
                    <?php foreach($data as $d):?>
                       <?php echo $d->fecha;?>, 
                        <?php endforeach; ?>
                    ],
                datasets: [{
                    label: '$ Monto',
                        data: [
                        <?php foreach($data as $d):?>
                        <?php echo $d->Ingresos;?>, 
                        <?php endforeach; ?>
                    ],
                    backgroundColor: "#3898db",
                    borderColor: "#9b59b6",
                    borderWidth: 1
                }]
            };
            var options = {
                scales: {
                    yAxes: [{
                        ticks: {
                        beginAtZero:true
                    }
                }]
            }
        };
        var chart1 = new Chart(ctx, {
            type: 'bar', /* valores: line, bar*/
            data: data,
            options: options
            });
        
        </script>
</div>
<?php
include "vista/footer.php";
?>  