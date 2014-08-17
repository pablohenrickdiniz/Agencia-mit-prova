<?php
/**
 * Created by PhpStorm.
 * User: Pablo Henrick Diniz
 * Date: 17/08/14
 * Time: 18:19
 */

class NoticiasController extends AppController{
    public $name = 'Noticias';

    public function index(){
        $this->set('noticias',$this->Noticia->find('all'));
    }

    public function visualizar($id=null){

    }

    public function cadastrar(){

    }

    public function editar($id=null){

    }

    public function deletar($id=null){

    }
}