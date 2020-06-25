<?php
require_once 'Model.php';
class RelatorioDAO extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function contar($table = '', $condicao = '')
    {
    	$where = '';
    	if($condicao != '') {
    		$where = "WHERE {$condicao}";
    	}
    	$sql = "SELECT count(*) as total FROM {$table} {$where};";
        /*var_dump($sql);exit;*/
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    	return $stmt->fetch(PDO::FETCH_ASSOC);	
    }
     //Para os gráficos - Pizza
    public function contarChamadoAndamento($table = 'chamado', $condicao = '')
    {
        $where = '';
        if($condicao != '') {
            $where = "WHERE {$condicao}";
        }
        $sql = "SELECT status as name, count(status) as y
                FROM chamado
                GROUP BY status
                ";
        /*var_dump($sql);exit;*/
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }
    public function contarMesCliente($table = 'cliente', $condicao = '')
    {
        $where = '';
        if($condicao != '') {
            $where = "WHERE {$condicao}";
        }
        $sql = "SELECT concat(month(created),'/',year(created)) as mes, count(id) as clientes
                FROM cliente
                GROUP BY year(created), month(created)";
                
                /*var_dump($sql);exit;*/
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Para os gráficos - Linear
    /*public function contarChamadoAndamento($table = 'cliente', $condicao = '')
    {
        $where = '';
        if($condicao != '') {
            $where = "WHERE {$condicao}";
        }
        $sql = "SELECT status as name, count(status) as y
                FROM chamado
                GROUP BY status
                ";
        //var_dump($sql);exit;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }*/

    //Para os gráficos - Pizz
}