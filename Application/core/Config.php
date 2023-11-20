<?php 
namespace Application\core;

class Config
{
    
    public $DRIVE = 'sqlite';
    public $DB = "pesquisa";
    public $DEVICE = "A01";

    function __construct()
    {
        $data = [
                    'DRIVE'  => $this->DRIVE,
                    'DB'     => $this->DB,
                    'DEVICE' => $this->DEVICE,
        ];
        return $data;
        
    }
    
}


