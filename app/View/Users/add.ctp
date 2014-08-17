<div class="users-form">
    <?php echo $this->Form->create('user')?>
        <fieldset>
            <legend><?php echo __('Adicionar usuário'); ?></legend>
            <?php
                echo $this->Form->input('username',array('placeholder'=> 'usuario', 'type' => 'text'));
                echo $this->Form->input('password',array('type' => 'password','placeholder' => '*********'));
                echo $this->Form->input('tipo',
                array('options'=>array(
                        'ROLE_COMMON' => 'comum',
                        'ROLE_ADMIN' => 'administrador'
                    ))
                );
            ?>
        </fieldset>
    <?php echo $this->Form->end('cadastrar');?>
</div>