<!--///////////////UN USUARIO/////////////////////////-->
<?php if( $usuario ) { ?>
<table>
    <tr>
        <th colspan="4">Ejemplo de consultas de un solo registro</th>
    </tr>
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Identificacion</th>
        <th>email</th>
    </tr>
    <tr>
        <td><?php echo $usuario->id; ?></td>
        <td><?php echo $usuario->nombre; ?></td>
        <td><?php echo $usuario->identificacion; ?></td>
        <td><?php echo $usuario->email; ?></td>
    </tr>
</table>
<?php } else { echo 'El registro no se encontro en la BD.'; } ?>

<!--///////////////VARIOS USUARIOS/////////////////////////-->

<?php if( $usuarios ) { ?>
<table>
    <tr>
        <th colspan="4">Ejemplo de consultas de varios registros</th>
    </tr>
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Identificacion</th>
        <th>email</th>
    </tr>
    <?php foreach( $usuarios as $usu ) { ?>
    <tr>
        <td><?php echo $usu->id; ?></td>
        <td><?php echo $usu->nombre; ?></td>
        <td><?php echo $usu->identificacion; ?></td>
        <td><?php echo $usu->email; ?></td>
    </tr>
    <?php } ?>
</table>
<?php } else { echo 'Registros no encontrados en la BD.'; } ?>

<!--/////////////////CRITERIA///////////////////////-->

<?php if( $usuariosCrit ) { ?>
<table>
    <tr>
        <th colspan="4">Ejemplo de consultas con $criteria</th>
    </tr>
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Identificacion</th>
        <th>email</th>
        <th>ciudad</th>
    </tr>
    <?php
        //Este forech funciona de esta manera solo cuando la variable es inicializada asi: "$usuariosCrit = new CActiveDataProvider"
        //foreach( $usuariosCrit->getData() as $usua ) { 
    ?>
    <?php foreach( $usuariosCrit as $usua ) { ?>
    <tr>
        <td><?php echo $usua->id; ?></td>
        <td><?php echo $usua->nombre; ?></td>
        <td><?php echo $usua->identificacion; ?></td>
        <td><?php echo $usua->email; ?></td>
        <td><?php echo $usua->ciudad->nombre; //esta se utilizo cuando se trabajo con WITH ?></td>
        <td><?php // echo $usua->nombre; //esta se utilizo cuando se trabajo con JOIN ?></td>
    </tr>
    <?php } ?>
</table>
<?php } else { echo 'Registros no encontrados en la BD.'; } ?>