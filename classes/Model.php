<?php
require_once 'Conn.php';
class Model
{

	protected $tabela;
	protected $class;
	protected $db;
    
    public function __construct()
    {
        $conn = new Conn();
        $this->db = $conn->getConn();
    }

    public function inserir($values)
    {
    	$sql = "INSERT INTO {$this->tabela} VALUES ($values)";
        /*var_dump($sql);exit;*/
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    	return $this->db->lastInsertId();  
    }

    public function listar()
    {
    	$sql = "SELECT * FROM {$this->tabela}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
    	$stmt->execute();
    	return $stmt->fetchAll();
    }

    public function get($id)
    {
    	$sql = "SELECT * FROM {$this->tabela} WHERE id = {$id}";
    	$stmt = $this->db->prepare($sql);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
    	$stmt->execute();
    	return $stmt->fetch();
    }

    public function alterar($id, $values)
    {
    	$sql = "UPDATE {$this->tabela} SET {$values} WHERE id = {$id}";
        /*var_dump($sql);exit;*/
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    }
    public function deletar($id)
    {
    	$sql = "DELETE FROM {$this->tabela} WHERE id = {$id}";
        /*var_dump($sql);exit;*/
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    }
} 