<?php
/**
 * Created by PhpStorm.
 * User: Pablo Henrick Diniz
 * Date: 17/08/14
 * Time: 15:45
 */

class Comentario extends AppModel{
    public $name = 'Comentario';
    public $belongsTo =
        array(
            'User'=>array(
                'className' => 'Noticia',
                'foreignKey' => 'user_id'
            ),
            'Noticia' =>array(
                'className' => 'Noticia',
                'foreignKey' => 'noticia_id'
            ));
} 