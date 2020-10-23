<?php

$usuario = new Source\Loading\Classes\Usuario();
if($usuario->setUsuario(2,'Maciel','Souza','leicamvb@msn.com'))
{
    echo 'Usuário '.$usuario->getNome().' '.$usuario->getSobrenome().', foi cadastrado com sucesso!';
} 
else{
    echo $usuario->getError();
};
