<?php
/**
 * Created by PhpStorm.
 * User: Pablo Henrick Diniz
 * Date: 17/08/14
 * Time: 16:29
 */

class UsersController extends AppController{
    public $name = 'Users';

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('logout','add');
    }


    public function isAuthorized($user=null){
        if(parent::isAuthorized($user)){
            $role = $user['role'];
            if($role === 'ROLE_ADMIN'){
                $denied = array('login','add');
                if(!in_array($this->action, $denied)){
                    return true;
                }

            }

            if($role  === 'ROLE_COMMON'){
                $allowed = array('view','edit','success','delete');
                if(in_array($this->action,$allowed)){
                    return true;
                }
            }
        }

        return false;
    }

    public function listarTodos(){
        $this->set('usuarios',$this->User->find('all'));
    }

    public function login(){
        if($this->Auth->login()){
            $this->redirect($this->Auth->redirect());
        }
        else{
            $this->Session->setFlash('Usuário ou senha inválidos, tente novamente');
        }
    }

    public function loginExists($login){
        if($this->request->is('ajax')){
            $usuario = $this->User->find('first',array('conditions' => array('User.login =' => $login)));
            if(count($usuario) == 1){
                echo 'true';
                return true;
            }
        }
        echo 'false';
        return false;
    }

    public function logout(){
        $this->redirect($this->Auth->logout());
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
            $this->request->data['User']['role'] = 'ROLE_COMMON';
            $this->User->create();
            try{
                if($this->User->save($this->request->data)){
                    $this->redirect(array('action' => 'success'));
                }
                else{
                    $this->Session->setFlash(__('O usuário não pôde ser salvo, tente novamente'));
                }
            }
            catch(Exception $ex){

            }
        }
    }


    public function success(){}

    public function edit($id = null){
        $this->User->id = $id;
        if(!$this->User->exists()){
            throw new NotFoundException('O usuário não foi encontrado');
        }
        if($this->request->is('post') || $this->request->is('put')){
            $email = $this->request->data['User']['email'];
            try{
                if($this->User->saveField('email',$email)){
                    $this->Session->setFlash(__('Informações salvas com sucesso'));
                }
                else{
                    $this->Session->setFlash(__('O usuário não pôde ser alterado'));
                }
            }
            catch(Exception $ex){

            }

            $this->redirect(array('action' => 'edit',$id));
        }
        else{
            $this->request->data = $this->User->read(null,$id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id=null){
        if($this->request->is('ajax')){
            $this->layout = 'ajax';
            $this->User->id = $id;
            if(!$this->User->exists()){
                throw new NotFoundException('O usuário não foi encontrado');
            }
            if($this->User->delete()){
                $this->Session->setFlash(__('O usuário foi deletado com sucesso'));
            }
            $this->Session->setFlash(__('O usuário não pôde ser deletado'));
        }
    }
} 