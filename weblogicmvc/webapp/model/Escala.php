<?php

class Escala extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('datahoradestino', 'message' => 'Campo de preenchimento obrigatório'),
        array('datahoraorigem', 'message' => 'Campo de preenchimento obrigatório'),
        array('distancia', 'message' => 'Campo de preenchimento obrigatório'),
        array('ordermescala', 'message' => 'Campo de preenchimento obrigatório')
    );

    static $validades_numericality_of = array(
        array('distancia', 'only_integer' => true,  'message' => 'Tem de ser numero!'),
        array('ordermescala', 'only_integer' => true, 'message' => 'Tem de ser numero!')
    );

    static $validades_size_of = array(
        array('distancia', 'maximum' => 10, 'too_long' => 'O máximo são 10 caracteres'),
        array('ordermescala', 'maximum' => 10, 'too_long' => 'O máximo são 10 caracteres')
    );
}