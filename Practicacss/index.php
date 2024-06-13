<?php
session_start();

// Clase Gasto
class Gasto
{
    private $descripcion;
    private $monto;

    public function __construct($descripcion, $monto)
    {
        $this->descripcion = $descripcion;
        $this->monto = $monto;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getMonto()
    {
        return $this->monto;
    }
}

// Clase RegistroGastos
class RegistroGastos
{
    //lista de gastos
    private $gastos;

    public function __construct()
    {       
        //Si no hay nada almacenado en la sesión, se crea un array vacío 
        if (!isset($_SESSION['gastos'])) {
            $_SESSION['gastos'] = array();
        }
        //Se establece la definición a la lista
        $this->gastos = $_SESSION['gastos'];
    }

    //Método para agregar datos
    public function agregarGasto($descripcion, $monto)
    {
        //Crear objeto gasto
        $gasto = new Gasto($descripcion, $monto);
        //Añadir el objeto gasto a la lista
        $this->gastos[] = $gasto;
        //Almacenar en la variable de la sesión
        $_SESSION['gastos'] = $this->gastos;
    }

    //Método para obtener los gastos
    public function obtenerGastos()
    {
        return $this->gastos;
    }

    //Método pata obtener el total de gastos
    public function obtenerTotalGastos()
    {
        $total = 0;
        //Para cada gasto en la lista, sumar los montos
        foreach ($this->gastos as $gasto) {
            $total += $gasto->getMonto();
        }
        return $total;
    }
}

// Programa principal
$registroGastos = new RegistroGastos();

// Se verifica si se ha enviado un formulario mediante el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Se verifica si la acción enviada es 'agregar'
    if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
        $descripcion = $_POST['descripcion'];
        $monto = $_POST['monto'];
        // Se agrega un nuevo gasto
        $registroGastos->agregarGasto($descripcion, $monto);
    }
    // Se verifica si la acción enviada es 'reset'
    elseif (isset($_POST['accion']) && $_POST['accion'] == 'reset') {
        // Eliminar los datos de $_SESSION['gastos']
        unset($_SESSION['gastos']);
        $_SESSION['gastos'] = array();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Gastos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1>Registro de Gastos</h1>

        <!-- Formulario para agregar un nuevo gasto -->
        <form class="mt-3 col-md-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div>
                <label class="form-label" for="descripcion">Descripción:</label>
                <input class="form-control" type="text" name="descripcion" id="descripcion" required>
            </div>
            <div class="mt-3">
                <label class="form-label"  for="monto">Monto:</label>
                <input class="form-control" type="number" name="monto" id="monto" step="0.01" required>
            </div>
            
            <input type="hidden" name="accion" value="agregar">
            <button class="btn btn-primary mt-4" type="submit">Agregar Gasto</button>
        </form>

        <hr>

        <h2>Lista de Gastos</h2>

         <!-- Formulario para resetear los gastos -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <button class="btn btn-primary my-3" type="submit" name="accion" value="reset">Reset</button>
        </form>

        <div class="row">
            <ul class="col-md-3 list-group">
                <?php
                // Se obtiene la lista de gastos
                $gastos = $registroGastos->obtenerGastos();

                // Si hay gastos, se muestran en una lista
                if (count($gastos) > 0) {
                    foreach ($gastos as $gasto) {
                        echo "<li class='list-group-item'>" . $gasto->getDescripcion() . " - $" . $gasto->getMonto() . "</li>";
                    }
                }
                // Si no hay gastos, se muestra un mensaje 
                else {
                    echo "<li class='list-group-item'>No hay gastos registrados.</li>";
                }
                ?>
            </ul>
            
            <div class="col-md-3">
                <h2>Total de Gastos</h2>
                <!-- Se muestra el total de los gastos -->
                <p>Total: $<?php echo $registroGastos->obtenerTotalGastos(); ?></p>
            </div>

        </div>
        

        
    </div>
   
</body>
</html>