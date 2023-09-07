<?php
include "lib.php";

try{
    $archivo = abrirFicheroLectura("archivo.txt");
    mostrarFichero($archivo);
}
catch(DirectorioNoExisteException $e){
    echo $e->getMessage(); 
}
catch(FicheroNoExisteException $e){
    echo $e->getMessage(); 
}
catch(AbrirFicheroException $e){
    echo $e->getMessage();
}

finally{
    if(isset($archivo) && $archivo!=null){
        fclose($archivo);
    }
}
?>
