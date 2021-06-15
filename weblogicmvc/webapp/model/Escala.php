<?php

class Escala extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('horadestino', 'message' => 'Campo de preenchimento obrigatório'),
        array('datadestino', 'message' => 'Campo de preenchimento obrigatório'),
        array('horaorigem', 'message' => 'Campo de preenchimento obrigatório'),
        array('dataorigem', 'message' => 'Campo de preenchimento obrigatório'),
        array('distancia', 'message' => 'Campo de preenchimento obrigatório'),
        array('ordemescala', 'message' => 'Campo de preenchimento obrigatório'),
        array('precoescala', 'message' => 'Campo de preenchimento obrigatório')
    );

    static $validades_numericality_of = array(
        array('distancia', 'only_integer' => true,  'message' => 'Tem de ser numero!'),
        array('ordemescala', 'only_integer' => true, 'message' => 'Tem de ser numero!'),
        array('precoescala', 'only_integer' => true, 'message' => 'Tem de ser numero!')
    );

    static $validades_size_of = array(
        array('distancia', 'maximum' => 10, 'too_long' => 'O máximo são 10 caracteres'),
        array('ordemescala', 'maximum' => 10, 'too_long' => 'O máximo são 10 caracteres'),
        array('precoescala', 'maximum' => 10, 'too_long' => 'O máximo são 10 caracteres')
    );

    static $belongs_to = array(
        array('aeroportoorigem', 'class_name' => 'Aeroporto', 'foreign_key' => 'idaeroportoorigem'),
        array('aeroportodestino', 'class_name' => 'Aeroporto', 'foreign_key' => 'idaeroportodestino')
    );

    // Teste
    /*
    public function validate()
    {
      if ($this->idaeroportodestino == $this->idaeroportoorigem)
      {
        $this->errors->add('idaeroportodestino', "Nao pode ser igual ao Aeroporto de Origem");
        $this->errors->add('idaeroportoorigem', "Nao pode ser igual ao Aeroporto de Destinho");
      }
    }
    */
}