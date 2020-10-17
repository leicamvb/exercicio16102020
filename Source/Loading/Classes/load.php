<?php


$usuario = new Source\Loading\Classes\Usuario();
if($usuario->setUsuario(2,'Maciel','Sobrenome','leicamvb@msn.com'))
{
    echo $usuario->getNome();
} 
else{
    echo $usuario->getError();
};
