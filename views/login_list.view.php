
    <section>
        <h2>Inicis de sessió</h2>
        <table>
            <tr>
                <th>id</th>
                <th>username</th>
                <th>password</th>

                <th>role</th>
                <th colspan="2">operacions</th>
            </tr>
            <?php foreach ($logins as $login): ?>
                <tr>
                    <td><?= $login->getId() ?></td>
                    <td>
                        <?= $login->getUsername()?>
                    </td>
                    <td><?= $login->getPassword() ?></td>
                    <td><?= $login->getRole() ?></td>
                    <td><a class="tablea" href="login_delete.php?id=<?= $login->getId();?>">Borrar</a></td>
                    <td><a class="tablea" href="login_update.php?id=<?= $login->getId();?>">Editar</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
