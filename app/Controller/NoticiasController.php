<?php

/**
 * Created by PhpStorm.
 * User: Pablo Henrick Diniz
 * Date: 17/08/14
 * Time: 18:19
 */
class NoticiasController extends AppController
{
    public $name = 'Noticias';

    public function index()
    {
        $this->set('noticias', $this->Noticia->find('all'));
    }

    public function view($id = null)
    {
        $this->Noticia->id = $id;
        if (!$this->Noticia->exists()) {
            throw new NotFoundException('A notícia não existe');
        }

        $this->set('noticia', $this->Noticia->read(null, $id));
        $this->loadComments($id);
    }

    public function loadComments($id = null)
    {
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
        }
        $this->loadModel('Noticia');
        $this->Noticia->id = $id;
        if (!$this->Noticia->exists()) {
            throw new NotFoundException('A notícia não existe');
        }

        $this->loadModel('Comentario');
        $this->set(
            'comentarios',
            $this->Comentario->find(
                'all',
                array(
                    'conditions' => array(
                        'Comentario.noticia_id =' => $id,
                        'Comentario.status =' => 'A'
                    )
                )
            )
        );
    }

    public function cadastrar()
    {
        $this->_add();
    }

    public function editar($id = null)
    {
        $this->_edit($id);
    }


    public function deletar($id = null)
    {
        $this->_delete($id);
    }

    private function _delete($id = null)
    {
        $this->Noticia->id = $id;
        if (!$this->Noticia->exists()) {
            throw new NotFoundException('Essa notícia não existe');
        }
        if ($this->Noticia->delete()) {
            $this->Session->setFlash(__('A notícia foi apagada com sucesso'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('A notícia não pôde ser apagada'));
        $this->redirect(array('action' => 'index', $id));
    }

    private function _add()
    {
        if ($this->request->is('post')) {
            $this->Noticia->create();
            if ($this->Noticia->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário salvo com sucesso'));
            } else {
                $this->Session->setFlash(__('Usuário não pode ser salvo'));
            }
            $this->redirect(array('action' => 'index'));
        }
    }

    private function _edit($id = null)
    {
        $this->Noticia->id = $id;
        if (!$this->Noticia->exists()) {
            throw new NotFoundException('A notícia não foi encontrada');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Noticia->save($this->request->data)) {
                $this->Session->setFlash(__('A notícia foi atualizada com sucesso'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('A notícia não pôde ser atualizar'));
            }
        } else {
            $this->request->data = $this->Noticia->read(null, $id);
        }
    }
}