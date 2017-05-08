<?php

class CompleteRange {

    public function __construct() {
        
    }

    public function build($cadena) {

        $valores_finales = array();

        for ($i = $cadena[0]; $i <= $cadena[count($cadena) - 1]; $i++) {
            $valores_finales[] = $i;
        }
        return $valores_finales;
    }

}

$miObjeto = new CompleteRange();

echo "entrada:[1, 2, 4, 5] Salida:  ";
$cadena = array('1', '2', '4', '5');
foreach ($miObjeto->build($cadena) as $valor) {
    echo $valor . ",";
}
echo "<br>";

echo "entrada:[2, 4, 9] Salida:  ";
$cadena2 = array('2', '4', '9');
foreach ($miObjeto->build($cadena2) as $valor) {
    echo $valor . ",";
}
echo "<br>";
echo "entrada:[55, 58, 60] Salida:  ";
$cadena3 = array('55', '58', '60');
foreach ($miObjeto->build($cadena3) as $valor) {
    echo $valor . ",";
}
?>	