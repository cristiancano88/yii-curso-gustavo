<?php $x = 0; ?>
<?php if ($model !== null) { ?>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>identificacion</th>
        </tr>
        <?php foreach ($model as $user) { ?>
            <tr <?php echo ($x++ % 2 == 0) ? 'style="background-color: #ccc;"' : ''; ?>>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->nombre; ?></td>
                <td><?php echo $user->identificacion; ?></td>
            </tr>  
        <?php } ?>
    </table>    
<?php } ?>