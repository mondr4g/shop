<?php
    //Aqui se realizara la recarga de los productos, utilizando AJAX.
    include 'carrito.php';
    
    if(isset($_POST['json']) ){//Aqui recibiremos el JSON que contendra los filtros y la bandera para saber si se mostraran todos los productos o solo los de JSON
        //Aqui haremos la implementacion de las busquedas mediante cada uno de los filtros que recibamos.
        $products_to_show=null;
        //filtros
        $filters=json_decode($_POST['json'],true);

        $str_filtrado="";

        if($filters->band==true){
            
            $str_filtrado="SELECT * FROM producto WHERE";
            $b_first=true;
            $bb_first=true;
            if($filters->playera==true || $filters->pantalones==true || $filters->chamarra==true || $filters->sudadera==true || $filters->abrigo){
                if ($bb_first) {
                    $str_filtrado+=" AND";
                    $bb_first=false;
                }
                if($filters->playera==true ){//filtros para el tipo
                    if ($b_first) {
                        $str_filtrado+=" tipo LIKE '%playera%'";
                        $b_first=false;
                    }else{
                        $str_filtrado+=" OR tipo LIKE '%playera%'";
                    }
                }
                if($filters->pantalones==true){
                    if($b_first){
                        $str_filtrado+=" tipo LIKE '%pantalones%'";
                        $b_first=false;
                    }else{
                        $str_filtrado+=" OR tipo LIKE '%pantalones%'";
                    }
                }
                if($filters->calzado==true){
                    if($b_first){
                        $str_filtrado+=" tipo LIKE '%calzado%'";
                        $b_first=false;
                    }else{
                        $str_filtrado+=" OR tipo LIKE '%calzado%'";
                    }
                    
                }
                if($filters->accesorios==true){
                    if($b_first){
                        $str_filtrado+=" tipo LIKE '%accesorio%'";
                        $b_first=false;
                    }else{
                        $str_filtrado+=" OR tipo LIKE '%accesorio%'";
                    }
                    
                }
            }
            $b_first=true;
            if($filters->xs==true || $filters->s==true || $filters->m==true || $filters->l==true || $filters->xl==true){
                if ($bb_first) {
                    $str_filtrado+=" AND";
                    $bb_first=false;
                }
                if($filters->xs){
                    if($b_first){
                        //aplicar correcciones a query
                        //$str_filtrado+=" JSON_CONTAINS('stock', ";
                        $b_first=false;
                    }else{
                        $str_filtrado+=" OR talla LIKE '%xs%'";
                    }
                }
                if($filters->s){
                    if($b_first){
                        $str_filtrado+=" talla LIKE '%s%'";
                        $b_first=false;
                    }else{
                        $str_filtrado+=" OR talla LIKE '%s%'";
                    }
                }
                if($filters->m){
                    if($b_first){
                        $str_filtrado+=" talla LIKE '%m%'";
                        $b_first=false;
                    }else{
                        $str_filtrado+=" OR talla LIKE '%m%'";
                    }
                }
                if($filters->l){
                    if($b_first){
                        $str_filtrado+=" talla LIKE '%l%'";
                        $b_first=false;
                    }else{
                        $str_filtrado+=" OR tipo LIKE '%l%'";
                    }
                }
                if($filters->xl){
                    if($b_first){
                        $str_filtrado+=" talla LIKE '%xl%'";
                        $b_first=false;
                    }else{
                        $str_filtrado+=" OR tipo LIKE '%xl%'";
                    }
                }
            }

            $str_filtrado+=" AND precio BETWEN ".doubleval($filters->minPrice)." AND ".doubleval($filters->maxPrice)." ;";
            
            
        }else{
            $str_filtrado="SELECT * FROM producto WHERE status=1;";
        }


        //EJECUCION DE LA CONSULTA
        $products_to_show=$GLOBALS['conne']->query($str_filtrado);
        if ($result->num_rows > 0) {
            foreach($products_to_show as $prod){
                //$prod, en esta variable viene la info de cada producto recuperado. si se quieren visualizar todos los productos.
?>
                <!--Aqui Pones los productos-->
<?php
            }
        }else{
            //Aqui hacer algo en caso de caso de que no haya productos.
        }
        
        
    }

?>