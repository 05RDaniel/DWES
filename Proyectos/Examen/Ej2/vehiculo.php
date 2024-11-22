<?php
class vehiculo{
    protected $marca;
    protected $modelo;
    protected $precio;

    public function __construct($mar, $mod, $pre){
        $this->marca = $mar;
        $this->modelo = $mod;
        $this->precio = $pre;
    }

    function calcularImpuesto(){
        return ($this->precio*21)/100;
    }

    function mostrarDetalles(){
        return ("<div>
        <p>Marca:". $this->marca ."</p>
        <p>Modelo:".$this->modelo."</p>
        <p>Precio:".$this->precio."€</p>
        <p>Impuesto:".$this->calcularImpuesto()."€</p>
        <p>Precio total:".$this->precio+$this->calcularImpuesto()."€</p>
        </div>");
    }
}
?>