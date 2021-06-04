<?php

class EscalaAviao extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('numeropassageiroscheckin', 'message' => 'Campo de preenchimento obrigatório'),
        array('numerobilhetesvendidos', 'message' => 'Campo de preenchimento obrigatório')
    );

    static $validades_numericality_of = array(
        array('numeropassageiroscheckin', 'only_integer' => true,  'message' => 'Tem de ser numero!'),
        array('numerobilhetesvendidos', 'only_integer' => true, 'message' => 'Tem de ser numero!')
    );

    static $validades_size_of = array(
        array('numeropassageiroscheckin', 'maximum' => 10, 'too_long' => 'O máximo são 10 caracteres'),
        array('numerobilhetesvendidos', 'maximum' => 10, 'too_long' => 'O máximo são 10 caracteres')
    );
}