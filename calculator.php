
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Actividad 3- Calculadora</title>
 <!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="container grey-text">
    <h4 class="center">Actividad 3- Calculadora</h4>
    <form action="calculator.php">
        <input type="text" name="numero1" placeholder="1er número">
        <input type="text" name="numero2" placeholder="2do número">
        <select name="operador" class="browser-default">
            <option>Seleccionar tipo de calculo.</option>
            <option>Sumar</option>
            <option>Restar</option>
            <option>Multiplicar</option>
            <option>Dividir</option>
            <option>Par_Impar</option>
        </select>
        <br/>
        <button name="submit" value="submit" type="submit" class="btn brand">Calcular</button>
    </form>

    <p>Respuesta: 

    <?php 
        if(isset($_GET['submit'])){
            $numero1 = $_GET['numero1'];
            $numero2 = $_GET['numero2'];
            $operador = $_GET['operador'];
            switch ($operador) {
                case "Seleccionar tipo de calculo.":
                    echo "No has seleccionado un metodo para hacer el calculo.";
                    break;
                case "Sumar":
                    $resultadoSumar = $numero1 + $numero2;
                    echo "El resultado de sumar " . $numero1 . " y " . $numero2 . " es " . $resultadoSumar . "."; 
                    break;
                case "Restar":
                    $resultadoRestar = $numero1 - $numero2;
                    echo "El resultado de restar " . $numero1 . " y " . $numero2 . " es " . $resultadoRestar . "."; 
                    break;
                case "Multiplicar":
                    $resultadoMultiplicar = $numero1 * $numero2;
                    echo "El resultado de multiplicar " . $numero1 . " por " . $numero2 . " es " . $resultadoMultiplicar . "."; 
                    break;
                case "Dividir":
                    $resultadoDividir = $numero1 / $numero2;
                    echo "El resultado de dividir " . $numero1 . " entre " . $numero2 . " es " . $resultadoDividir . "."; 
                    break;
                case "Par_Impar":
                    if ($numero1 % 2) {
                        $resultadoParNum1 = "impar";
                    } else {
                        $resultadoParNum1 = "par";
                    }
                    if ($numero2 % 2) {
                        $resultadoParNum2 = "impar";
                    } else {
                        $resultadoParNum2 = "par";
                    }
                    echo "El número " . $numero1 . " es " . $resultadoParNum1 . " y el número " . $numero2 . " es " . $resultadoParNum2 . ".";
                    break;
            }
        } 
    ?>
    </div>
</body>
</html>