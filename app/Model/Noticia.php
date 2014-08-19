<?php

/**
 * Created by PhpStorm.
 * User: Pablo Henrick Diniz
 * Date: 18/08/14
 * Time: 23:12
 */
class Noticia extends AppModel
{
    public $name = 'Noticia';
    public $hasMany = array(
        'Comentario' => array(
            'className' => 'Comentario',
            'foreignKey' => 'noticia_id',
            'dependent' => true
        ));
} 