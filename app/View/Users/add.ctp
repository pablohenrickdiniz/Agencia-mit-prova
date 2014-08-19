<?php
    echo $this->Html->script('user_check');
    echo $this->Html->css('user_add');
?>
<div class="users-form">
    <?php echo $this->Form->create('User', array('class' => 'form-horizontal col-md-4 col-md-offset-4', 'role' => 'form'));?>
        <fieldset>
            <legend><?php echo __('Adicionar usuário'); ?></legend>
                <div class="form-group">
                    <?php
                        echo $this->Form->label('User.username','usuario');
                        echo $this->Form->input('User.username',array('placeholder'=> 'usuario', 'type' => 'text','class' => 'form-control', 'label'=>false,'id'=>'usuario','required'));
                     ?>
                     <div id="user_check" class="alert alert-warning">Esse usuario já existe</div>
                </div>
                <div class="form-group">
                     <?php
                        echo $this->Form->label('User.password','senha');
                        echo $this->Form->input('User.password',array('type' => 'password','placeholder' => 'digite sua senha','class' => 'form-control', 'label' => false, 'id' => 'senha','required'));
                      ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('User.email',array('type' => 'email','placeholder' => 'example@email.com','class' => 'form-control', 'id' => 'email'));?>
                    <div id="email_check" class="alert alert-warning">Esse email já existe</div>
                </div>
        </fieldset>
    <?php
        $options = array(
            'label' => 'cadastrar',
            'class' => 'btn btn-success col-md-4',
            'div' => array(
                'class' => 'form-group'
            )
        );
        echo $this->Form->end($options);
     ?>
</div>