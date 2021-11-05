 <?php
spl_autoload_register(function($className){
    $className = str_replace("\\", "/", $className);
    $className = str_replace("_", "/", $className);
     $className = "{$className}.php";
    if(file_exists($className)){
        include $className;
    }
//    echo "___".$className; 
});


//#mbne6Y3&foG

 ?>