<?php

class Endereco
{

    private $id;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $fk_usuario_cpf;
    private $fk_cidade_id;
    private $cidade;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of cep
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of complemento
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set the value of complemento
     *
     * @return  self
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get the value of bairro
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of fk_usuario_cpf
     */
    public function getFk_usuario_cpf()
    {
        return $this->fk_usuario_cpf;
    }

    /**
     * Set the value of fk_usuario_cpf
     *
     * @return  self
     */
    public function setFk_usuario_cpf($fk_usuario_cpf)
    {
        $this->fk_usuario_cpf = $fk_usuario_cpf;

        return $this;
    }

    /**
     * Get the value of fk_cidade_id
     */
    public function getFk_cidade_id()
    {
        return $this->fk_cidade_id;
    }

    /**
     * Set the value of fk_cidade_id
     *
     * @return  self
     */
    public function setFk_cidade_id($fk_cidade_id)
    {
        $this->fk_cidade_id = $fk_cidade_id;

        return $this;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }
}
