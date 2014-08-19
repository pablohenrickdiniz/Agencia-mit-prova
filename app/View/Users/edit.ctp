<div class="users-form">
    <?php
        echo $this->Form->create('User', array('class' => 'form-horizontal col-md-4 col-md-offset-4', 'role' => 'form', 'url' => array('action' => 'edit',$AuthUser['id'])));?>
        <fieldset>
            <legend><?php echo __('Alterar usuário'); ?></legend>
                <div class="form-group">
                    <?php
                        echo $this->Form->label('User.username','usuario');
                        echo $this->Form->input('User.username',array('placeholder'=> 'usuario', 'type' => 'text','class' => 'form-control', 'label'=>false,'readonly'));
                     ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('User.email',array('type' => 'email','placeholder' => 'example@email.com','class' => 'form-control'));?>
                </div>
        </fieldset>
    <?php
        $options = array(
            'label' => 'salvar alterações',
            'class' => 'btn btn-success col-md-4',
            'div' => array(
                'class' => 'form-group'
            )
        );
        echo $this->Form->end($options);
     ?>
</div>