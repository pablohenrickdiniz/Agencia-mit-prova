<?php echo $this->Html->script('moderacao');?>
<h2>Moderação de comentários</h2>
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Data de criação</th>
        <th>Comentario</th>
        <th>Aprovar</th>
        <th>Desaprovar</th>
    </tr>
    <?php foreach ($comentarios as $comentario) {
        $id = $comentario['Comentario']['id'];
        $status = $comentario['Comentario']['status'];
        $criado =  $comentario['Comentario']['created'];
        $comentario = $comentario['Comentario']['comentario'];
    ?>
        <tr>
            <td>
                <?php echo $id; ?>
            </td>
            <td>
                <?php echo $criado;?>
            </td>
            <td>
               <?php echo $comentario; ?>
            </td>
            <td class="text-center">
                <input class="aprovar" type="radio" <?php if($status === 'A'){ echo 'checked';}?> name="status-<?php echo $id?>"/>
            </td>
            <td class="text-center">
                <input class="desaprovar" type="radio" <?php if($status === 'N' || $status === 'E'){ echo 'checked';}?> name="status-<?php echo $id?>"/>
            </td>
        </tr>
    <?php } ?>
</table>