<?php

class ClearPar {

    public function __construct() {
        
    }

    public function build($cadena) {

        $valores_finales = array();
		$cadena_final="";;
		$contador_pares=0;
		$tmp="";
        for ($i = 0; $i < strlen($cadena); $i++) {
			
			if(isset($cadena[$i+1])){
			
            if($cadena[$i]=="(" and $cadena[$i+1]==")"  ){
			$contador_pares++;
			}
			}
        }
		 for ($j = 0; $j <$contador_pares; $j++) {
			$cadena_final .= "()";
		
        }
		
		
		
        return $cadena_final;
        
    }

}

$miObjeto = new ClearPar();

echo "entrada:()())() Salida:  ";
$string= "()())()";
echo $miObjeto->build($string);
echo "<br>";

echo "entrada:()(() Salida:  ";
$string= "()(()";
echo $miObjeto->build($string);
echo "<br>";

echo "entrada:)( Salida:  ";
$string= ")(";
echo $miObjeto->build($string);
echo "<br>";

echo "entrada:((() Salida:  ";
$string= "((()";
echo $miObjeto->build($string);
echo "<br>";
















?>	