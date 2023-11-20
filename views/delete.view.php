<section>
    <h2>¿Estas seguro de que deseas borrar esta tabla?</h2>
    <table>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>

            <th>role</th>
        </tr>
            <tr>
                <td><?php echo $login[0]->getId() ?></td>
                <td>
                    <?php echo $login[0]->getUsername()?>
                </td>
                <td><?php echo $login[0]->getPassword() ?></td>
                <td><?php echo $login[0]->getRole() ?></td>
            </tr>
    </table>

    <form action="/../login_delete_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $login[0]->getId(); ?>">
        <button type="submit">Confirmar</button>
    </form>

    <form action="/../login_list.php">
        <button type="submit">Cancelar</button>
    </form>
</section>