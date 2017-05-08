<?php

class ChangeString {

    public function __construct() {
        
    }

    public function build($cadena) {


        $valores_minusculas = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $valores_mayusculas = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $cadena_final = "";
        for ($i = 0; $i < strlen($cadena); $i++) {

            if (in_array($cadena[$i], $valores_minusculas)) {

                if (27 == (array_search($cadena[$i], $valores_minusculas) + 1)) {
                    $cadena_final .= $valores_minusculas[0];
                } else {
                    $cadena_final .= $valores_minusculas[array_search($cadena[$i], $valores_minusculas) + 1];
                }
            }
            if (in_array($cadena[$i], $valores_mayusculas)) {

                if (27 == (array_search($cadena[$i], $valores_mayusculas) + 1)) {
                    $cadena_final .= $valores_mayusculas[0];
                } else {
                    $cadena_final .= $valores_mayusculas[array_search($cadena[$i], $valores_mayusculas) + 1];
                }
            }

            if (!in_array($cadena[$i], $valores_minusculas) and ! in_array($cadena[$i], $valores_mayusculas)) {
                $cadena_final .=$cadena[$i];
            }
        }




        return $cadena_final;
    }

}

$miObjeto = new ChangeString();
$string = "123 abcd*3";
echo "RESULTADO: " . $miObjeto->build($string) . "<br>";

$string = "**Casa 52";
echo "RESULTADO: " . $miObjeto->build($string) . "<br>";

$string = "**Casa 52Z";
echo "RESULTADO: " . $miObjeto->build($string) . "<br>";
?>	