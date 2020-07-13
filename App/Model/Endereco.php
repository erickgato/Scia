<?php 
/*
@author Erick Gato;
*/ 
final class Endereco{
    protected $logradouro;
    protected $bairro;
    protected $Cep;
    public function __construct( $Endereco = null, $bairro, $cep) {

        $this->Endereço = $Endereco;
        $this->bairro = $bairro;
        $this->Cep = $cep;
    }
    public function checkvality(){
        /**********************************/
        /* Ira verificar se existe o bairro no banco de dados */
        $Bairro = DATABASE::SELECT('sc_bairro',"WHERE Ba_nome = '$this->bairro'",false, null, false, true);
        $exists = $Bairro ? $Bairro[0]['Ba_cod'] : false;
        return $exists;
    }
    public function PUSH(){
        /* Insere um registro */ 
        if($this->bairro == "")
            return;
        if(DATABASE::INSERT('sc_bairro',['',$this->bairro,1])){
            $Id =  DATABASE::SELECT('sc_bairro',"WHERE Ba_nome = '$this->bairro' ");
            return $Id[0]['Ba_cod'];
        }else{
            return false;
        }
    }
    public function FETCHorPUSH(){
        $valid = $this->checkvality();
        if(!$valid){
            $result = $this->PUSH();

        }
        else{
            $result = $valid;
        }
        return $result;
    }
    public function callEnd(){
        return $this->logradouro;
    }
}