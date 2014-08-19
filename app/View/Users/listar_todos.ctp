<?php echo $this->Html->script('usuarios'); ?>
<div class="users-list">
    <h2>Lista de usuários</h2>
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>user name</th>
            <th>tipo</th>
            <th>data criação</th>
            <th>email</th>
            <th>ação</th>
        </tr>
        <?php foreach ($usuarios as $user) { ?>
            <tr>
                <td><?php echo $user['User']['id']; ?></td>
                <td><?php echo $user['User']['username'] ?></td>
                <td><?php echo $user['User']['role'] ?></td>
                <td><?php echo $user['User']['created'] ?></td>
                <td><?php echo $user['User']['email'] ?></td>
                <td>
                    <input class="btn btn-danger apagar" type="submit" value="apagar">
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

