<div class="users form">
    <?php echo $this->Session->flash('auth');?>
    <?php echo $this->Form->create('User');?>
        <fieldset>
            <legend><?php echo __('Por favor, digite o usuário e senha');?></legend>
            <?php echo $this->Form->input('username'); ?>
            <?php echo $this->Form->input('password'); ?>
        </fieldset>
    <?php echo $this->Form->end(__('login'));?>
</div>