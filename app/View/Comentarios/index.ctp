<h1>Comentários</h1>
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Título</th>
        <th>Data de criação</th>
    </tr>
    <?php foreach ($comentarios as $comentario) { ?>
        <tr>
            <td>
                <?php echo $comentario['Comentario']['id'] ?>
            </td>
            <td>
                <?php echo $this->Html->link($comentario['Comentario']['titulo'],
                array('controller' => 'comentarios', 'action' => 'view')) ?>
            </td>
            <td>
                <?php echo $comentario['Comentario']['created'] ?>
            </td>
        </tr>
    <?php } ?>
</table>