<?php
class DirectorioNoExisteException extends Exception{}
class FicheroNoExisteException extends Exception{}
class AbrirFicheroException extends Exception{}

function comprobarDirectorio($ruta, $create = false){
    if(!is_dir($ruta)){
       if($create){
        mkdir($ruta);
       }else{
        throw new DirectorioNoExisteException("El directorio no existe");
       }
        
    }
}
function comprobarFichero($ruta, $throw = true){
        if(!file_exists($ruta)){
            if($throw){
                throw new FicheroNoExisteException("El fichero no existe");
            }
            
        }
    }
function abrirFicheroLectura($nombre, $ruta='./'){
    comprobarDirectorio($ruta);
    $arch = $ruta.$nombre;
    comprobarFichero($arch);

    if(!$archivo = fopen($arch, 'r')){
        throw new AbrirFicheroException("No se ha podido abrir el fichero");
    }
    return $archivo;
}
function mostrarFichero($archivo){
    while(!feof($archivo)){
        $c = fgetc($archivo);
        echo $c;
    }
}
?>
