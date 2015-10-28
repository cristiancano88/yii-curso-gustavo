<?php
/* @var $this UsuariosController */
/* @var $data Usuarios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('actualizar_estado')); ?>:</b>
	<?php echo CHtml::link($data->estado==1 ? 'Desactivar' : 'Activar', array('estado', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad_id')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad->nombre); //para poder hacer esto, esta el metodo "relations()" en el model ?>
	<?php // echo CHtml::encode($data->ciudad_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jefe')); ?>:</b>
	<?php 
        foreach ($data->experiencias as $exp) {
            echo '<br>'. $exp->jefe .' ('. $exp->empresa .')';
        } ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('Cant. experiencia en trabajos')); ?>:</b>
	<?php echo CHtml::encode($data->experienciaCount); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Vacante')); ?>:</b>
	<?php 
        foreach ($data->vacante as $vacate) {
            echo $vacate->nombre;
        } ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('identificacion')); ?>:</b>
	<?php echo CHtml::encode($data->identificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genero')); ?>:</b>
	<?php echo CHtml::encode($data->genero); ?>
	<br />


</div>