<?php
/**
 * Created by PhpStorm.
 * User: Pablo Henrick Diniz
 * Date: 17/08/14
 * Time: 15:54
 */

class ComentariosController extends AppController{
    public $helpers = array('Html','Form');
    public $name = 'Comentarios';

    public function listarTodos(){
        $this->set('comentarios', $this->Comentario->find('all'));
    }

    public function cadastrar(){
        $this->__add();
    }

    private function _add(){
        if(!$this->request->is('post')){
            $this->Comentario->create();
            if($this->Comentario->save($this->request->data)){
                $this->Session->setFlash(__('O Comentário foi salvo'));
            }
            else{
                $this->Session->setFlash(__('Erro ao salvar o comentário'));
            }
        }
    }

    public function deletar($id=null){
        if(!$this->request->is('post')){
            throw new MethodNotAllowedException();
        }
        $this->Comentario->id = $id;
        if(!$this->Comentario->exists()){
            throw new NotFoundException(__('comen´tario inválido'));
        }
        if($this->Comentario->delete()){
            $this->Session->setFlash(__('Comentário apagado com sucesso'));
            $this->redirect(array('controller' => 'noticias', 'action' => 'view'));
        }
        $this->Session->setFlash(__('O comentário não pode ser apagado'));
        $this->redirect(array('action' => listarTodos));
    }
} 