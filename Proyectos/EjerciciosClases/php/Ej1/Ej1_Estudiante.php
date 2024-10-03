<?php
class Estudiante extends Persona
{
    private $numExpediente;
    public function __construct($d, $n, $e, $nE)
    {
        parent::__construct($d, $n, $e);
        $this->numExpediente = $nE;
    }
    public function __get($s)
    {
        if ($s == 'numExpediente')
            return $this->numExpediente;
    }

    public function __set($s, $v)
    {
        if ($s == 'numExpediente')
            $this->numExpediente = $v;
    }

    public function MostrarDatos()
    {
        echo parent::MostrarDatos() . "<br>Número de expediente: " . $this->numExpediente;
    }
}
?>