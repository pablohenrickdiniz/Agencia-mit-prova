<?php
    echo $this->Html->script('noticias');
    echo $this->Html->css('noticias');
?>
<div class="noticias-list">
    <?php foreach ($noticias as $noticia){
        $id = $noticia['Noticia']['id'];
        $titulo =  $noticia['Noticia']['titulo'];
    ?>
           <div class="row">
                <div class="form-group">
                    <div class="form-group">
                         <h3>
                            <?php

                              echo $this->Html->link($titulo,array('action' => 'view',$id));
                           ?>
                         </h3>
                    </div>
                    <div class="form-group">
                        <p>
                           <?php echo substr($noticia['Noticia']['texto'],0,250).'...';?>
                        </p>
                    </div>

                </div>
           </div>
    <?php }
        if($AuthUser['role'] === 'ROLE_ADMIN'){
    ?>
     <div class="form-group" id="noticia-add">
        <span class="btn btn-info">adicionar noticia</span>
     </div>
     <div class="form-group textarea" id="noticia-form">
            <?php echo $this->Form->create('Noticia', array('class' => 'form-horizontal col-md-12', 'role' => 'form', 'action' => 'cadastrar'));
            ?>
            <div class="form-group">
                <?php echo $this->Form->input('Noticia.titulo', array('class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                   <?php
                        echo $this->Form->label('Noticia.fonte','Fonte');
                        echo $this->Form->input('Noticia.fonte', array('class' => 'form-control', 'label' => false));
                   ?>
             </div>
            <div class="form-group">
                <?php
                    echo $this->Form->label('Noticia.texto','Texto');
                    echo $this->Form->textarea('Noticia.texto', array('class' => 'form-control textarea'))
                 ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->submit('adicionar noticia', array('class' => 'btn btn-success')); ?>
            </div>
            <?php echo $this->form->end() ?>
        </div>
     <?php }?>
</div>
