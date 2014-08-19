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
            $this->_index();
    }

    public function isAuthorized($user = null){
        if(parent::isAuthorized($user)){
            $role = $user['role'];
            if($role === 'ROLE_COMMON'){
                $denied = array('listarTodos');
                if(in_array($this->action,$denied)){
                    return $this->redirect(array('controller' => 'noticias', 'action' => 'index'));
                }
                return true;
            }
            return true;
        }
        return false;
    }

    public function aprovar($id=null){
        if($this->request->is('ajax')){
            $this->layout = 'ajax';
            $this->Comentario->id = $id;
            if(!$this->Comentario->exists()){
                throw new NotFoundException('O comentário não existe');
            }
            $this->Comentario->saveField('status','A');
        }
    }

    public function desaprovar($id=null){
        if($this->request->is('ajax')){
            $this->layout = 'ajax';
            $this->Comentario->id = $id;
            if(!$this->Comentario->exists()){
                throw new NotFoundException('O comentário não existe');
            }
            $this->Comentario->saveField('status','N');
        }
    }

    public function cadastrar($id=null){
        if($this->request->is('post')){
            $this->Comentario->create();
            $this->request->data['Comentario']['user_id'] = $this->Auth->user('id');
            $this->request->data['Comentario']['noticia_id'] = $id;
            $this->request->data['Comentario']['status'] = 'E';

            if($this->Comentario->save($this->request->data)){
                $this->Session->setFlash(__('O Comentário foi salvo'));
            }
            else{

                $this->Session->setFlash(__('Erro ao salvar o comentário'));
            }
        }

        $this->redirect(array('controller' => 'noticias','action' => 'view',$id));
    }

    private function _index(){
        $this->set(
            'comentarios',
            $this->Comentario->find(
                'all'
            ),array(
                'conditions' => array(
                    'OR'=>array(
                        'Comentario.status ='=> 'N',
                        'Comentario.status ='=> 'E'
                    )
                )
            ));
    }

    public function deletar($id=null){
        if($this->request->is('ajax')){
            $this->layout = 'ajax';
            $this->Comentario->id = $id;
            if(!$this->Comentario->exists()){
                throw new NotFoundException(__('comentario inválido'));
            }
            $this->Comentario->delete();
        }
    }
} 