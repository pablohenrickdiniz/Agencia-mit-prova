<div class="users form">
    <?php echo $this->Form->create('User',array('class' => 'form-horizontal col-md-4 col-md-offset-4', 'role' => 'form'));?>
        <fieldset>
            <div class="form-group">
                <?php
                    echo $this->Form->label('User.username','usuario');
                    echo $this->Form->input('User.username',array('class' => 'form-control','label' => false));
                ?>
            </div>
            <div class="form-group">
                 <?php
                    echo $this->Form->label('User.username', 'senha');
                    echo $this->Form->input('User.password',array('class' => 'form-control','label' => false));
                  ?>
            </div>
           <div class="form-group">
                   <?php echo $this->Form->submit('entrar', array('class' => 'btn btn-success col-md-4')); ?>
            </div>
            <div class="form-group text-center">
                     <?php
                          echo $this->Html->link('ainda não se cadastrou? cadastre-se',array('action' => 'add'));
                     ?>
             </div>
        </fieldset>
    <?php echo $this->Form->end();?>
</div>
