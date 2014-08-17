<?php
/**
 * Created by PhpStorm.
 * User: Pablo Henrick Diniz
 * Date: 17/08/14
 * Time: 16:29
 */

class UsersController extends AppController{
    public $name = 'users';

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function login(){
        if($this->Auth->login()){
            $this->redirect($this->Auth->redirect());
        }
        else{
            $this->Session->setFlash('Usuário ou senha inválidos, tente novamente');
        }
    }

    public function logout(){
        $this->redirect($this->Auth->logout());
    }

    public function index(){
        $this->User->recursive = 0;
        $this->set('users',$this->paginate());
    }

    public function view($id = null){
        $this->User->id = $id;
        if(!$this->User->exists()){
            throw new NotFoundException('O usuário não foi encontrado');
        }
        $this->set('user',$this->User->read(null,$id));
    }

    public function add(){
        if($this->request->is('post')){
            $this->User->create();
            if($this->User->save($this->request->data)){
                $this->Session->setFlash(__('O usuário foi salvo com sucesso'));
            }
            else{
                $this->Session->setFlash(__('O usuário não pôde ser salvo, tente novamente'));
            }
        }
    }

    public function edit($id = null){
        $this->User->id = $id;
        if(!$this->User->exists()){
            throw new NotFoundException('O usuário não foi encontrado');
        }
        if($this->request->is('pos') || $this->request->is('put')){
            if($this->User->save($this->request->data)){
                $this->Session->setFlash(__('O usuário foi salvo com sucesso'));
                $this->redirect(array('action' => 'index'));
            }
            else{
                $this->Session->setFlash(__('O usuário não pôde ser salvo'));
            }
        }
        else{
            $this->request->data = $this->User->read(null,$id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id=null){
        if(!$this->request->is('post')){
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if($this->User->delete()){
            $this->Session->setFlash(__('O usuário foi deletado com sucesso'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('O usuário não pôde ser deletado'));
        $this->redirect(array('action' => 'index'));
    }
} 