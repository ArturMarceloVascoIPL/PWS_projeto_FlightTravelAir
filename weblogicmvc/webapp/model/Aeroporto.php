<?php

class Aeroporto extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('nome', 'message' => 'Campo de preenchimento obrigatório'),
        array('localizacao', 'message' => 'Campo de preenchimento obrigatório')
    );

    static $validates_size_of = array(
        array('nome', 'maximum' => 80, 'too_long' => 'O máximo são 80 caracteres'),
        array('localizacao', 'maximum' => 100, 'too_long' => 'O máximo são 100 caracteres')
    );
}
