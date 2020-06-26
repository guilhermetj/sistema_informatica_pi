<?php
class Permissao
{
    private $id;
    private $id_controle;
    private $id_cargo;
    private $ler;
    private $editar;
    private $cadastrar;
    private $deletar;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdControle()
    {
        return $this->id_controle;
    }

    /**
     * @param mixed $id_controle
     *
     * @return self
     */
    public function setIdControle($id_controle)
    {
        $this->id_controle = $id_controle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCargo()
    {
        return $this->id_cargo;
    }

    /**
     * @param mixed $id_cargo
     *
     * @return self
     */
    public function setIdCargo($id_cargo)
    {
        $this->id_cargo = $id_cargo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLer()
    {
        return $this->ler;
    }

    /**
     * @param mixed $ler
     *
     * @return self
     */
    public function setLer($ler)
    {
        $this->ler = $ler;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEditar()
    {
        return $this->editar;
    }

    /**
     * @param mixed $editar
     *
     * @return self
     */
    public function setEditar($editar)
    {
        $this->editar = $editar;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCadastrar()
    {
        return $this->cadastrar;
    }

    /**
     * @param mixed $cadastrar
     *
     * @return self
     */
    public function setCadastrar($cadastrar)
    {
        $this->cadastrar = $cadastrar;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeletar()
    {
        return $this->deletar;
    }

    /**
     * @param mixed $deletar
     *
     * @return self
     */
    public function setDeletar($deletar)
    {
        $this->deletar = $deletar;

        return $this;
    }
}