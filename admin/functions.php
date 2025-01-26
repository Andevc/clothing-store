<?php

    use Illuminate\Database\Capsule\Manager as DB;
    
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../database/db_connector.php';

    function getCount($tableName){
        return DB::table($tableName)->count();
    }

    function generateUrlForProduct($nombreProducto) {
        // Convertir el nombre del producto a minúsculas
        $nombreProducto = strtolower($nombreProducto);
        
        // Reemplazar los espacios por guiones
        $nombreProducto = str_replace(' ', '-', $nombreProducto);
        
        // Eliminar caracteres no alfanuméricos (excepto guiones)
        $nombreProducto = preg_replace('/[^a-z0-9-]/', '', $nombreProducto);
        
        return $nombreProducto;
    }

    
    function generateOptions($tableName, $value_id, $value_title){
        

        $items = DB::table($tableName)->get();

        foreach($items as $item){
        
            $value = htmlspecialchars($item->$value_id);
            $title = htmlspecialchars($item->$value_title);

            echo "<option value='$value'> $title </option>";
        
        }
        
    }