<?php
require_once 'Model.php';
class EstadosDAO extends Model
{   
    public function __construct() {
    	parent::__construct();
    	$this->tabela = 'estados';
    	$this->class = 'Estados';
    }
}