<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Gastos</title>
</head>
<body>

    <!-- Practica de PHP con formulario HTML -->
    <h1>Registro de Gastos</h1>

    <!-- Formulario para ingresar un nuevo gasto -->
    <form method="post" action="">
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        <br>
        <label for="monto">Monto:</label>
        <input type="number" step="0.01" id="monto" name="monto" required>
        <br>
        <input type="submit" value="Agregar Gasto">
    </form>

    <?php
    session_start();

    // Clase que representa un gasto individual
    class Gasto {
        private $descripcion;
        private $monto;

        // Constructor que inicializa los atributos del gasto
        public function __construct($descripcion, $monto) {
            $this->descripcion = $descripcion;
            $this->monto = $monto;
        }

        // Método para obtener la descripción del gasto
        public function getDescripcion() {
            return $this->descripcion;
        }

        // Método para obtener el monto del gasto
        public function getMonto() {
            return $this->monto;
        }
    }

    // Clase que representa el registro de gastos
    class RegistroGastos {
        private $gastos;

        // Constructor que inicializa la lista de gastos vacía
        public function __construct() {
            // Verificar si ya existe una lista de gastos en la sesión
            if (isset($_SESSION['gastos'])) {
                $this->gastos = $_SESSION['gastos'];
            } else {
                $this->gastos = array();  // Inicializa el array vacío para almacenar los gastos
            }
        }

        // Método para agregar un nuevo gasto a la lista
        public function agregarGasto($descripcion, $monto) {
            $nuevoGasto = new Gasto($descripcion, $monto);  // Crea un nuevo objeto Gasto
            $this->gastos[] = $nuevoGasto;  // Agrega el nuevo gasto al array de gastos
            $_SESSION['gastos'] = $this->gastos;  // Actualiza la sesión con la nueva lista de gastos
        }

        // Método para obtener la lista de todos los gastos
        public function obtenerGastos() {
            return $this->gastos;  // Retorna el array de todos los gastos
        }

        // Método para calcular el total de los gastos ingresados
        public function obtenerTotalGastos() {
            $total = 0;
            foreach ($this->gastos as $gasto) {
                $total += $gasto->getMonto();  // Suma el monto de cada gasto al total
            }
            return $total;  // Retorna el total de los gastos
        }
    }

    // Crear una instancia del registro de gastos
    $registro = new RegistroGastos();

    // Verificar si se han enviado datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener la descripción y el monto del formulario
        $descripcion = $_POST["descripcion"];
        $monto = $_POST["monto"];

        // Agregar el nuevo gasto al registro
        $registro->agregarGasto($descripcion, $monto);
    }

    // Obtener y mostrar la lista de todos los gastos
    $gastos = $registro->obtenerGastos();
    echo "<h2>Lista de gastos:</h2>";
    if (!empty($gastos)) {
        echo "<ul>";
        foreach ($gastos as $gasto) {
            echo "<li>" . htmlspecialchars($gasto->getDescripcion()) . ": $" . number_format($gasto->getMonto(), 2) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No hay gastos registrados.</p>";
    }

    // Mostrar el total de los gastos
    $total = $registro->obtenerTotalGastos();
    echo "<h2>Total de gastos: $" . number_format($total, 2) . "</h2>";
    ?>
</body>
</html>
