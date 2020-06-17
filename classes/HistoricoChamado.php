<?php 
/**
 * 
 */
class HistoricoChamado 
{
	
	private $id;
	private $id_chamado;
	private $id_funcionario;
	private $dt_historico;
	private $descricao;
	private $solucao;
	

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
    public function getIdChamado()
    {
        return $this->id_chamado;
    }

    /**
     * @param mixed $id_chamado
     *
     * @return self
     */
    public function setIdChamado($id_chamado)
    {
        $this->id_chamado = $id_chamado;

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

    /**
     * @return mixed
     */
    public function getDtHistorico()
    {
        return $this->dt_historico;
    }

    /**
     * @param mixed $dt_historico
     *
     * @return self
     */
    public function setDtHistorico($dt_historico)
    {
        $this->dt_historico = $dt_historico;

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
    public function getSolucao()
    {
        return $this->solucao;
    }

    /**
     * @param mixed $solucao
     *
     * @return self
     */
    public function setSolucao($solucao)
    {
        $this->solucao = $solucao;

        return $this;
    }
}