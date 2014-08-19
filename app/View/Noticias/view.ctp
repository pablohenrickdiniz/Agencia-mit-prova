<?php
echo $this->Html->script('comentarios');
echo $this->Html->css('noticias');
$id = $noticia['Noticia']['id'];
?>
<div class="noticia">
    <div class="form-group text-left">
        <h3><?php echo $noticia['Noticia']['titulo'] ?></h3>
    </div>
    <div class="form-group text-left">
        <p><?php echo $noticia['Noticia']['texto'] ?></p>
    </div>
    <div class="form-group text-left">
            <p>
                fonte:
                <?php
                  echo $this->Html->link($noticia['Noticia']['fonte'],$noticia['Noticia']['fonte']);
                ?>
            </p>
    </div>
    <?php
        if($AuthUser['role'] === 'ROLE_ADMIN'){

    ?>
    <div class="form-group">
        <?php
            echo $this->Form->create('Noticia',array('url' => array('action' => 'deletar',$noticia['Noticia']['id'])));
        ?>
        <div class="form-group">
            <?php echo $this->Form->submit('apagar',array('class' => 'btn btn-sm btn-warning')); ?>
        </div>
        <?php
            echo $this->Form->end();
        ?>
    </div>
    <?php

        }
    ?>
    <div class="form-group textarea <?php echo $id; ?>">
        <?php echo $this->Form->create('Comentario', array('class' => 'form-horizontal col-md-12', 'role' => 'form', 'url' => array('controller' => 'comentarios', 'action' => 'cadastrar', $id)));
        ?>
        <div class="form-group">
            <?php echo $this->Form->textarea('Comentario.comentario', array('class' => 'form-control textarea')) ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit('comentar', array('class' => 'btn btn-success')); ?>
        </div>
        <?php echo $this->form->end() ?>
    </div>
</div>
<div class="container">
    <table class="table table-bordered">
    <?php
    foreach ($comentarios as $comentario) {?>
        <tr>
            <td>
               <div class="col-md-6">
                   <text class="text-center text-info">
                         <?php echo $comentario['Comentario']['created'] ?>
                   </text>
                   <h3>
                         <?php echo $comentario['User']['username'] ?>
                   </h3>
                   <div class="form-group">
                          <p>
                             <?php echo $comentario['Comentario']['comentario'] ?>
                          </p>
                   </div>
                   <?php
                        if($AuthUser['id'] ==  $comentario['Comentario']['user_id']){
                   ?>
                   <div class="form-group">
                        <input id="<?php echo $comentario['Comentario']['id']; ?>" class="btn btn-sm btn-warning apg-btn" type="submit" value="apagar"/>
                   </div>
                   <?php }?>
               </div>
            </td>
        </tr>
    <?php } ?>
    </table>
</div>
