<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>


    </title>
    <?php
    echo $this->Html->css('bootstrap.min.css');
    echo $this->Html->script('Jquery.js');
    echo $this->Html->script('bootstrap.min.js');
    ?>
</head>
<body>
<div id="container">
    <div class="jumbotron">
        <ul class="nav nav-pills">
            <li>
                <h1><?php echo $this->Html->link('Mit-Blogger', array('controller' => 'users', 'action' => 'login')); ?></h1>
            </li>
        </ul>
    </div>
    <div id="content">
        <?php if ($AuthUser['logged']) { ?>
            <ul class="nav nav-tabs" role="tablist">
                <li <?php if ($this->action === 'index') {
                    echo 'class="active"';
                } ?>>
                    <?php
                    echo $this->Html->link('Notícias', array('controller' => 'noticias', 'action' => 'index'));
                    ?>
                </li>
                <?php if ($AuthUser['role'] === 'ROLE_ADMIN') { ?>
                    <li  <?php if ($this->action === 'listarTodos' && $this->params['controller'] === 'comentarios'){echo 'class="active"';} ?>>
                        <?php
                        echo $this->Html->link('Moderação', array('controller' => 'comentarios', 'action' => 'listarTodos'));
                        ?>
                    </li>
                    <li <?php if ($this->action === 'listarTodos' && $this->params['controller'] === 'users') {echo 'class="active"';} ?>>
                       <?php echo $this->Html->link('Usuários', array('controller' => 'users', 'action' => 'listarTodos'));?>
                    </li>
                <?php } ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Opções <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <?php
                            echo $this->Html->link('Sair', array('controller' => 'users', 'action' => 'logout'));
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link('Editar usuario', array('controller' => 'users', 'action' => 'edit',$AuthUser['id']));
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        <?php
        }
        ?>
        <div class="container">
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
    <div id="footer">

    </div>
</div>
</body>
</html>
