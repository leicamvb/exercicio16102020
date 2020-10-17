<?php

namespace Source\Loading\Classes;

class Usuario implements \Source\Loading\Interfaces\iMetMagic
{
    private ?int $id = null;
    private ?string $nome = null;
    private ?string $sobrenome = null;
    private ?string $email = null;
    private $error;

    //Getters e Setters
    public function setUsuario($id, $nome, $sobrenome, $email)
    {
        $this->error = null;
        
        $this->setId($id);
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);

        if (!$this->setEmail($email)) {
            
            return false;
        }

        return true;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    private function setId($id)
    {
        $this->error = null;
        $this->id = filter_var($id, FILTER_SANITIZE_STRIPPED);
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    private function setNome($nome)
    {
        $this->error = null;
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRIPPED);
    }

    public function getSobrenome(): ?string
    {
        return $this->sobrenome;
    }

    private function setSobrenome($sobrenome)
    {
        $this->error = null;
        $this->sobrenome = filter_var($sobrenome, FILTER_SANITIZE_STRIPPED);
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    // Valida o e-mail do usuário em um formato válido!
    private function setEmail($email)
    {
        $this->error = null;
        
        $this->email = filter_var($email, FILTER_SANITIZE_STRIPPED);;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            return true;
        } else {
            $this->error = "O e-mail {$this->getEmail()} não é válido!";
            return false;
        }
    }
    //Fim dos Getters e Setters


    /**
     * Implementação dos métodos mágicos do PHP
     * para evitar a chamada de métodos inexistentes
     */
    public function __set($name, $value)
    {
        $this->notFound(__FUNCTION__, $name);
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        $this->notFound(__FUNCTION__, $name);
    }

    private function notFound($method, $name)
    {
        echo "<p class='trigger error'>{$method}: A propriedade {$name} não existe em " . __CLASS__ . "!</p>";
    }

    public function getError()
    {
        return $this->error;
    }
}