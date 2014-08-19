<?php
    foreach($comentarios as $comentario){
?>
    <div class="form-group>
        <div class="form-group">
            <text class="text-info">
                <?php echo $comentario['Comentario']['created'] ?>
            </text>
        </div>
        <p>
            <?php echo $comentario['Comentario']['comentario'] ?>
        </p>
    </div>
<?php }?>
