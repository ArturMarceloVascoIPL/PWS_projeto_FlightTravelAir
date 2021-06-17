<?php

class Voo extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('precovenda', 'message' => 'Campo de preenchimento obrigatório')
    );

    static $validades_numericality_of = array(
        array('precovenda', 'only_integer' => true, 'message' => 'Tem de ser numero!')
    );

    static $validades_size_of = array(
        array('precovenda', 'maximum' => 10, 'too_long' => 'O máximo são 10 caracteres')
    );

    static $has_many = array(
      array('escalas', 'class_name' => 'Escala', 'primary_key' => 'idescala','order' => 'ordemescala')
    );
}