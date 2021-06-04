<?php

class Aviao extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'Campo de preenchimento obrigatório'),
        array('lotacao', 'message' => 'Campo de preenchimento obrigatório'),
        array('tipoaviao', 'message' => 'Campo de preenchimento obrigatório')
    );

    static $validades_numericality_of = array(
        array('lotacao', 'only_integer' => true, 'greater_than' => 0, 'message' => 'Tem de ser um numero Maior que 0')
    );

    static $validades_size_of = array(
        array('referencia', 'maximum' => 9, 'too_long' => 'O máximo são 9 caracteres'),
        array('tipoaviao', 'maximum' => 20, 'too_long' => 'O máximo são 20 caracteres')
    );
}
