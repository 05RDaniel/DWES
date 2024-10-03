<?php
class Persona
{
    protected $DNI;
    protected $name;
    protected $email;
    public function __construct($d, $n, $e)
    {
        $this->DNI = $d;
        $this->name = $n;
        $this->email = $e;
    }
    public function __get($s)
    {
        if ($s == 'DNI')
            return $this->DNI;
        else if ($s == 'nombre')
            return $this->name;
        else if ($s == 'email')
            return $this->email;
    }

    public function __set($s, $v)
    {
        if ($s == 'DNI')
            $this->DNI = $v;
        else if ($s == 'nombre')
            $this->name = $v;
        else if ($s == 'email')
            $this->email = $v;
    }
    public function MostrarDatos()
    {
        echo "Nombre: ", $this->name, "<br>DNI: ", $this->DNI, "<br>E-mail: ", $this->email;
    }
}
?>