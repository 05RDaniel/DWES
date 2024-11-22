<?php
class moto extends vehiculo
{
    private $sidecar;
    public function __construct($mar, $mod, $pre, $sid)
    {
        parent::__construct($mar, $mod, $pre);
        $this->sidecar = $sid;
    }

    function calcularImpuesto()
    {
        $extra = 0;
        if ($this->sidecar) {
            $extra = 50;
        }
        return ($this->precio * 21) / 100 + $extra;
    }
    
function mostrarDetalles(){
    return ("
    <p>Detalles del Coche</p>".parent::mostrarDetalles()."<p>
    Tiene sidecar:".$this->sidecar."
    </p>");
}
}
