<?php

namespace App;

class Comissao
{

    private $comissao;
    private $venda;

    public function calcularComissao()
    {
        
        if ($this->venda <= 5000) {
            $this->comissao = 0.1;
        } elseif ($this->venda <= 10000) {
            $this->comissao = 0.15;
        } else {
            $this->comissao = 0.2;
        }
        
        return $this->comissao;
    }
    
    public function calcular()
    {
       return $this->comissao * $this->venda;
        
    }
    
    public function setVenda($venda)
    {
        $this->venda = $venda;    
    }
    public function setComissao($comissao)
    {
        $this->comissao = $comissao;
    }
    
}