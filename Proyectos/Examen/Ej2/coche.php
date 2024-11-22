<?php
class coche extends vehiculo{
    private $cilindrada;

    public function __construct($mar,$mod,$pre,$cil){
        parent::__construct($mar,$mod,$pre);
        $this->cilindrada = $cil;
    }

    function calcularImpuesto(){
        $extra = 0;
        if($this->cilindrada>2000){
            $extra = 150;
        }
        return ($this->precio*21)/100+$extra;
    }

    function mostrarDetalles(){
        return ("
        <p>Detalles del Coche</p>".parent::mostrarDetalles()."<p>
        Cilindrada:".$this->cilindrada." cc
        </p>");
    }
}
?>