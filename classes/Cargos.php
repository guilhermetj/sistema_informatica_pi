<?php 


/**
 * 
 */
class Cargos
{
	
	private $id;
	private $nome;
    private $ler;
    private $editar;
    private $cadastrar;
    private $excluir;
	

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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

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
    public function getExcluir()
    {
        return $this->excluir;
    }

    /**
     * @param mixed $excluir
     *
     * @return self
     */
    public function setExcluir($excluir)
    {
        $this->excluir = $excluir;

        return $this;
    }
}