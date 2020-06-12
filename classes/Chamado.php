<?php 



class Chamado 
{
	private $id;
	private $id_cliente;
    private $id_funcionario;
	private $status;
	private $descricao;
	private $abertura;
	private $encerramento;
    private $equipamento;

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

    /**
     * @return mixed
     */
    public function getEquipamento()
    {
        return $this->equipamento;
    }

    /**
     * @param mixed $equipamento
     *
     * @return self
     */
    public function setEquipamento($equipamento)
    {
        $this->equipamento = $equipamento;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getIdFuncionario()
    {
        return $this->id_funcionario;
    }

    /**
     * @param mixed $id_funcionario
     *
     * @return self
     */
    public function setIdFuncionario($id_funcionario)
    {
        $this->id_funcionario = $id_funcionario;

        return $this;
    }
}