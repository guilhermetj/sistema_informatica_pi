<?php 

/**
 * 
 */
class Funcionario
{
	private $id;
	private $nome;
	private $cpf;
    private $rg;
    private $email;
    private $cep;
    private $cargo;
	private $telefone;
	private $tituloEleitor;
    private $historicoEscolar;
    private $ctps;
    private $sexo;
	private $senha;
    private $created;

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
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     *
     * @return self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     *
     * @return self
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param mixed $cargo
     *
     * @return self
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     *
     * @return self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTituloEleitor()
    {
        return $this->tituloEleitor;
    }

    /**
     * @param mixed $tituloEleitor
     *
     * @return self
     */
    public function setTituloEleitor($tituloEleitor)
    {
        $this->tituloEleitor = $tituloEleitor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHistoricoEscolar()
    {
        return $this->historicoEscolar;
    }

    /**
     * @param mixed $historicoEscolar
     *
     * @return self
     */
    public function setHistoricoEscolar($historicoEscolar)
    {
        $this->historicoEscolar = $historicoEscolar;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCtps()
    {
        return $this->ctps;
    }

    /**
     * @param mixed $ctps
     *
     * @return self
     */
    public function setCtps($ctps)
    {
        $this->ctps = $ctps;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     *
     * @return self
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     *
     * @return self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     *
     * @return self
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     *
     * @return self
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }
}