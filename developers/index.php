<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
// GET route
$app->get(
    '/',
    function () {
       $jsonData= file_get_contents("employees.json");
	   $json=json_decode($jsonData,true);
	 //  var_dump($json);
	   
	  
         $template = "
<!DOCTYPE html>
    <html>
        <head>
            <meta charset=\"utf-8\"/>
            <title>Prueba</title>
            <style>
                html,body,div,span,object,iframe,
                h1,h2,h3,h4,h5,h6,p,blockquote,pre,
                abbr,address,cite,code,
                del,dfn,em,img,ins,kbd,q,samp,
                small,strong,sub,sup,var,
                b,i,
                dl,dt,dd,ol,ul,li,
                fieldset,form,label,legend,
                table,caption,tbody,tfoot,thead,tr,th,td,
                article,aside,canvas,details,figcaption,figure,
                footer,header,hgroup,menu,nav,section,summary,
                time,mark,audio,video{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent;}
                body{line-height:1;}
                article,aside,details,figcaption,figure,
                footer,header,hgroup,menu,nav,section{display:block;}
                nav ul{list-style:none;}
                blockquote,q{quotes:none;}
                blockquote:before,blockquote:after,
                q:before,q:after{content:'';content:none;}
                a{margin:0;padding:0;font-size:100%;vertical-align:baseline;background:transparent;}
                ins{background-color:#ff9;color:#000;text-decoration:none;}
                mark{background-color:#ff9;color:#000;font-style:italic;font-weight:bold;}
                del{text-decoration:line-through;}
                abbr[title],dfn[title]{border-bottom:1px dotted;cursor:help;}
                table{border-collapse:collapse;border-spacing:0;}
                hr{display:block;height:1px;border:0;border-top:1px solid #cccccc;margin:1em 0;padding:0;}
                input,select{vertical-align:middle;}
                html{ background: #EDEDED; height: 100%; }
                body{background:#FFF;margin:0 auto;min-height:100%;padding:0 30px;width:840px;color:#666;font:14px/23px Arial,Verdana,sans-serif;}
                h1,h2,h3,p,ul,ol,form,section{margin:0 0 20px 0;}
                h1{color:#333;font-size:20px;}
                h2,h3{color:#333;font-size:14px;}
                h3{margin:0;font-size:12px;font-weight:bold;}
                ul,ol{list-style-position:inside;color:#999;}
                ul{list-style-type:square;}
                code,kbd{background:#EEE;border:1px solid #DDD;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:0 4px;color:#666;font-size:12px;}
                pre{background:#EEE;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:5px 10px;color:#666;font-size:12px;}
                pre code{background:transparent;border:none;padding:0;}
                a{color:#70a23e;}
                header{padding: 30px 0;text-align:center;}
            </style>
        </head>
        <body>
            <header>
               </header>
            <h1>Proyecto</h1>
            <p>
			<form  method=\"post\" action=\"busqueda\" />
                <input type=\"text\" id=\"busqueda\" name=\"busqueda\" value=\"\"  />
				<input type=\"submit\" value =\"Buscar\" />
			</form>	 
             </p>
            <section>
				
				
				<table width=\"800\" border=\"1\">
				  <tr>
					<td>Name</td>
					<td>Email</td>
					<td>Position</td>
					<td>Salary</td>
					<td></td>
				  </tr>
				  
				";
                $i=0;
				foreach($json as $empleados)
				{ 
				$template .="<tr>
					<td>".$empleados['name']."</td>
					<td>".$empleados['email']."</td>
					<td>".$empleados['position']."</td>
					<td>".$empleados['salary']."</td>
                    
					<td><a href=\"".$i."\">"."Detalle"."</a></td>
				  </tr>	";
                  $i++;
				}
				$template .="
				  
				 
				</table>
 
            </section>
            
        </body>
    </html>
";
        echo $template;
		
		
		
    }
);



$app->get(
    '/:id',
    function ($id) {
      $jsonData= file_get_contents("employees.json");
	   $json=json_decode($jsonData,true);

        echo "ID: ".$json[$id]['id']."<br>";
        echo "SALARY: ".$json[$id]['salary']."<br>";
        echo "AGE: ".$json[$id]['age']."<br>";
        echo "POSITION: ".$json[$id]['position']."<br>";
        echo "NAME: ".$json[$id]['name']."<br>";
        echo "GENDER: ".$json[$id]['gender']."<br>";
        echo "EMAIL: ".$json[$id]['email']."<br>";
        echo "PHONE: ".$json[$id]['phone']."<br>";
        echo "ADDRESS: ".$json[$id]['address']."<br>";
//echo $json[$id]['skills'][1]['skill'];
for($j=0;$j<count($json[$id]['skills']);$j++){
   echo "<li> Skill:".$json[$id]['skills'][$j]['skill']."<br>"; 
}



		
		
    }
);





// POST route
$app->post(
    '/busqueda',
    function ()use ($app) {
      $jsonData= file_get_contents("employees.json");
       $json=json_decode($jsonData,true);

       $busqueda=  trim($app->request->post('busqueda'));
        $lista = array();
        $k=0;
        $indice = "";
        foreach($json as $empleados){ 
                        
                           $lista[] =  $empleados['email'];
                            if ($busqueda==trim($empleados['email'])) {
                                 $indice = $k;

                                }
                       $k++;
        }
     



if(strlen($indice)!=0){
    
        echo "ID: ".$json[$indice]['id']."<br>";
        echo "SALARY: ".$json[$indice]['salary']."<br>";
        echo "AGE: ".$json[$indice]['age']."<br>";
        echo "POSITION: ".$json[$indice]['position']."<br>";
        echo "NAME: ".$json[$indice]['name']."<br>";
        echo "GENDER: ".$json[$indice]['gender']."<br>";
        echo "EMAIL: ".$json[$indice]['email']."<br>";
        echo "PHONE: ".$json[$indice]['phone']."<br>";
        echo "ADDRESS: ".$json[$indice]['address']."<br>";

for($j=0;$j<count($json[$indice]['skills']);$j++){
   echo "<li> Skill:".$json[$indice]['skills'][$j]['skill']."<br>"; 
}

}else{
    
    echo "No existen coincidencias";
}




    }
);

// PUT route
$app->put(
    '/put',
    function () {
        echo 'This is a PUT route';
    }
);

// PATCH route
$app->patch('/patch', function () {
    echo 'This is a PATCH route';
});

// DELETE route
$app->delete(
    '/delete',
    function () {
        echo 'This is a DELETE route';
    }
);

$app->run();
