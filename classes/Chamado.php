<?php 



class Chamado 
{
	private $id;
	private $id_cliente;
	private $status;
	private $descricao;
	private $abertura;
	private $encerramento;

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
    

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     *
     * @return self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAbertura()
    {
        return $this->abertura;
    }

    /**
     * @param mixed $abertura
     *
     * @return self
     */
    public function setAbertura($abertura)
    {
        $this->abertura = $abertura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEncerramento()
    {
        return $this->encerramento;
    }

    /**
     * @param mixed $encerramento
     *
     * @return self
     */
    public function setEncerramento($encerramento)
    {
        $this->encerramento = $encerramento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     *
     * @return self
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }
}