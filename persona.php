<?php
class Persona{
    //Atributos 
    private $nombre;
    private $apellido;
    private $direccion;
    private $mail;
    private $telefono;

    //Metodo Constructor
    public function __construct($nombre,$apellido,$direccion,$mail,$telefono)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->direccion=$direccion;
        $this->mail=$mail;
        $this->telefono=$telefono;
    }

    //Metodo toString
    public function __toString()
    {
        return "Nombre: " . $this->getNombre()."\n".
        "Apellido: " . $this->getApellido()"\n".
        "Dirección: " . $this->getDireccion()"\n".
        "Mail: " . $this->getMail()"\n".
        "Telefono: " . $this->getTelefono()"\n";
       
    }

}