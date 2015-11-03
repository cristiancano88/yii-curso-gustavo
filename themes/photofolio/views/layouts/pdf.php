<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo Yii::app()->language; ?>" lang="<?php echo Yii::app()->language; ?>" dir="ltr">
    <head profile="http://gmpg.org/xfn/11">
        <title><?php echo CHtml::encode($this->pageTitle) . ' - ' . Yii::app()->params['empresa']; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset; ?>" />
        <meta http-equiv="imagetoolbar" content="no" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/layout.css" type="text/css" />
    </head>
    <body id="top">
        <div class="wrapper col1">
            <div id="header" class="clear">
                <div class="fl_left">
                    <h1><a href="index.html"><?php echo CHtml::encode(Yii::app()->name); ?></a></h1>
                    <p><?php echo Yii::app()->params['slogan']; ?></p>
                </div>
                <div style="text-align:right">
                    <?php
                    $color = array('style' => 'color:#fff');
//                    echo CHtml::link('Spanish', $this->createUrl('',array('lg'=>'es')),$color) .' | '
//                        . CHtml::link('English', $this->createUrl('',array('lg'=>'en')),$color);

                    echo CHtml::link('Ver en español', $this->createMultilanguageReturnUrl('es'), $color) . ' | '
                    . CHtml::link('Ver en ingles', $this->createMultilanguageReturnUrl('en'), $color);
                    ?>    
                    <?php
//                    $this->widget('ext.components.language.XLangMenu', array(
//                            'encodeLabel'=>false,
//                            'hideActive'=>false,
//                            'items'=>array(
//                                    'es'=>CHtml::image(Yii::app()->request->baseUrl.'/images/es.gif').' Spanish',
//                                    'en'=>CHtml::image(Yii::app()->request->baseUrl.'/images/en.png').' In English'
//                            ),
//                    ));
                    ?>
            </div>

                <div class="fl_right"><a href="#"><?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/demo/logo.png"); ?></a></div>
        </div>
        </div>
        <!-- ####################################################################################################### -->
        <div class="wrapper col1">
            <div id="topbar" class="clear">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'id' => 'topnav',
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/site/index')),
                        array('label' => 'Usuarios', 'url' => array('/usuarios/index'),
                            'items' => array(
                                array('label' => 'Nuevo', 'url' => array('/usuarios/create')),
                                array('label' => 'Listado usarios', 'url' => array('/usuarios/index')),
                                array('label' => 'Administrar', 'url' => array('/usuarios/admin')),
                            ),
                        ),
                        array('label' => 'Ciudad', 'url' => array('/ciudad/index')),
                        array('label' => 'Experiencia', 'url' => array('/experiencia/index')),
                        array('label' => 'Estudios', 'url' => array('/estudios/index')),
                        array('label' => 'Folio', 'url' => array('/folio/index')),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                ));
                ?>

                <form action="#" method="post" id="search">
                    <fieldset>
                        <legend>Site Search</legend>
                        <input type="text" value="Search Our Website&hellip;" onfocus="this.value = (this.value == 'Search Our Website&hellip;') ? '' : this.value;" />
                        <input type="image" id="go" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/search.gif" alt="Search" />
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- ####################################################################################################### -->
        <div class="wrapper col2">
            <div id="container" class="clear">
                <!-- ####################################################################################################### -->
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
                    <?php endif ?>

                <div class='info' style='text-align:left;'>
                    <?php
                    $flashMessages = Yii::app()->user->getFlashes();
                    if ($flashMessages) {
                        echo '<ul class="flashes">';
                        foreach ($flashMessages as $key => $message) {
                            echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
                <?php echo $content; ?>
                <!-- ####################################################################################################### -->
            </div>
        </div>
        <!-- ####################################################################################################### -->
        
    </body>
</html>