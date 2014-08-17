<div class="users-list">
    <table>
        <tr>
            <th>id</th>
            <th>user name</th>
            <th>tipo</th>
            <th>data criação</th>
            <th>email</th>
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $users['User']['id']; ?></td>
                <td><?php echo $users['User']['username'] ?></td>
                <td><?php echo $users['User']['role'] ?></td>
                <td><?php echo $users['User']['created'] ?></td>
                <td><?php echo $users['User']['email'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

