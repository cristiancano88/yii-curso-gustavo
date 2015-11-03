<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<table class="table table-bordered table-condensed table-striped">
    <thead><tr><th colspan="2">Usos de CHtml/CHtml utilities</th></tr></thead>
    <tbody>
        <tr class="light">
            <td>Link simple ( array )</td>
            <td><?php echo CHtml::link("Mi link", array("usuarios/index", "id" => "2", "title" => "Mi pagina")); ?></td>
        </tr>
        <tr class="light">
            <td>Link simple ( $this->createUrl )</td>
            <td><?php echo CHtml::link("Mi link", $this->createUrl("usuarios/index", array("id" => "2", "title" => "Mi pagina"))); ?></td>
        </tr>
        <tr class="light">
            <td>Link simple ( Yii::app()->controller->createUrl )</td>
            <td><?php echo CHtml::link("Mi link", Yii::app()->controller->createUrl("usuarios/index", array("id" => "2", "title" => "Mi pagina"))); ?></td>
        </tr>
        <tr class="light">
            <td>Link simple con a</td>
            <td><a href="<?php echo $this->createUrl("usuarios/index", array("id" => "2", "title" => "Mi pagina")); ?>">MI link con a</a></td>
        </tr>
        <tr class="light">
            <td>Link absolutos email</td>
            <td><?php echo CHtml::link("Mi link absoluto", $this->createAbsoluteUrl("usuarios/index", array("id" => "2", "title" => "MI titulo"))); ?></td>
        </tr>
        <tr class="light">
            <td>Link externos</td>
            <td><?php echo CHtml::link("Mi link absoluto", "http://www.google.com"); ?></td>
        </tr>
        <tr class="light">
            <td>imagen</td>
            <td><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/004.png', 'eliminar', array('title' => 'mi title')); ?> ?></td>
        </tr>
        <tr class="light">
            <td>link con imagen</td>
            <td><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/004.png', 'eliminar', array('title' => 'mi title')), array('usuarios/index', 'id' => '2', 'title' => 'mi titulo'), array('style' => 'color:#000')); ?> ?></td>
        </tr>
        <tr class="light">
            <td>Link pdf</td>
            <td><?php echo CHtml::link("Mi link a un pdf", Yii::app()->request->baseUrl . "/upload/ejemplo.pdf"); ?></td>
        </tr>
        <tr class="light">
            <td>Link pdf( con ruta absoluta )</td>
            <td><?php echo CHtml::link("Mi link a un pdf ( con ruta absoluta )", Yii::app()->request->getBaseUrl(true) . "/upload/ejemplo.pdf"); ?></td>
        </tr>
        <tr class="light">
            <td>Link doc</td>
            <td><?php echo CHtml::link("Mi link a un doc", Yii::app()->request->baseUrl . "/upload/ejemplo.jpg", array("confirm" => "Estas seguro?")); ?></td>
        </tr>
        <tr class="dark">
            <td>Link enviar parametros POST</td>
            <td><?php
                echo CHtml::link("Parametros POST", "javascript:void(0)", array(
                    "submit" => array("usuarios/index", "id" => "12345"),
                    "params" => array("id_post" => "Je je je soy post"),
                    "confirm" => "Hey cuidado NOOOOOOOO!!!!!",
                        )
                );
                ?></td>
        </tr>

        <tr class="dark">
            <td>Link enviar parametros AJAX<div id="escribir"></div></td>
            <td><?php
                echo CHtml::link("Parametros AJAX", "#", array(
                    "ajax" => array(
                        "url" => $this->createUrl("usuarios/index", array("idget" => "je je soy geT")),
                        "type" => "post",
                        "dataType" => "html",
                        "data" => array("idpost" => "soy post"),
                        "update" => "#escribir",
                    ),
                        )
                );
                ?></td>
        </tr>

        <tr class="dark">
            <td>Link enviar parametros AJAX<div id="escribir"></div></td>
            <td><?php echo CHtml::ajaxLink("Parametros AJAX", $this->createUrl("usuarios/index", array("idget" => "je je soy geT")), array("update" => "#escribir")); ?></td>
        </tr>

        <tr class="dark">
            <td>Link para corros</td>
            <td><?php echo CHtml::mailto("Enviame a mi correo aqui", "micorreo@gmail.com"); ?></td>
        </tr>

        <tr class="dark">
            <td>CHtml::encode()</td>
            <td><?php echo CHtml::encode("<a href='www.google.com'>hola como estas</a>"); ?></td>
        </tr>

        <tr class="dark">
            <td>CHtml::tag()</td>
            <td><?php echo CHtml::tag("span", array("style" => "color:#000;"), "Holaaaaaaaaaa"); ?></td>
        </tr>

        <tr class="light">
            <td>Imagen  <?php echo Yii::app()->request->baseUrl; ?> </td>
            <td><?php // echo GHtml::image("004.png"); ?></td>
        </tr>

        <tr class="light">
            <td>Imagen  <?php echo Yii::app()->request->baseUrl; ?> </td>
            <td><?php // echo GHtml::imageAbs("004.png"); ?></td>
        </tr>

        <tr class="light">
            <td>Imagen  <?php echo Yii::app()->request->baseUrl; ?> </td>
            <td><?php // echo GHtml::imageUrl("004.png"); ?></td>
        </tr>

        <tr class="light">
            <td>Imagen  <?php echo Yii::app()->request->baseUrl; ?> </td>
            <td><?php // echo GHtml::imageAbsUrl("004.png"); ?></td>
        </tr>

    </tbody>
</table>
<?php echo $variable = CHtml::link("Mi link", array('usuarios/index', 'id' => '2', 'title' => 'mi titulo'), array('style' => 'color:#000')); ?>
<?php echo $variable = CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/004.png', 'eliminar', array('title' => 'mi title')), array('usuarios/index', 'id' => '2', 'title' => 'mi titulo'), array('style' => 'color:#000')); ?>
<?php echo $variable = CHtml::image(Yii::app()->request->baseUrl . '/images/004.png', 'eliminar', array('title' => 'mi title')); ?>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>
