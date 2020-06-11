<?php
include_once 'Conectar.php';
Class Crud {
    private $campos,$tab_nome,$conn;
    public function __construct($nometabela,$campos = array()) {
        $this->tab_nome = $nometabela;
        $this->campos  = $campos;
        $this->conn = new Conectar;
    }
    public function inserir(){
        $camposValues = join(",",$this->campos);
        $this->conn->ExecQuery("INSERT INTO $this->tab_nome values '$camposValues' ");

    }

}