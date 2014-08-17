<?php
/**
 * Created by PhpStorm.
 * User: Pablo Henrick Diniz
 * Date: 17/08/14
 * Time: 16:20
 */
App::uses('AuthComponent','Controller/Component');
class User extends AppModel{
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'O nome de usuário precisa ser informado'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A senha precisa ser informada'
            )
        ),
        'role'=>array(
            'valid' => array(
                'rule' => array('inList',array('ROLE_COMMON','ROLE_ADMIN')),
                'message' => 'Entre com um role válido',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options=array()){
        if(isset($this->data[$this->alias]['password'])){
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
} 