<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 07:28:49
         compiled from "/var/www/html/group16/admin/pa1/php/html/templates/templates/pic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191752923554159db8d06490-03650122%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5ea0df958fe429e756bd323d0bdf9d85b960a8e' => 
    array (
      0 => '/var/www/html/group16/admin/pa1/php/html/templates/templates/pic.tpl',
      1 => 1411198127,
      2 => 'file',
    ),
    '81b67db77f80fad59182c5ed1fc6995c24f8977d' => 
    array (
      0 => '/var/www/html/group16/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1411192096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191752923554159db8d06490-03650122',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54159db8d58ac0_35597497',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54159db8d58ac0_35597497')) {function content_54159db8d58ac0_35597497($_smarty_tpl) {?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EECS485-Group16-Project1">
    <meta name="author" content="Shuo Chen & Xiaofei Wang & Qijun Jiang">
    <link rel="icon" href="/static/css/Pic/favicon.ico">

    <link rel="stylesheet" href="/static/css/bootstrap-3.2.0-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/static/css/style.css" />

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name="keywords" content="photo, album, user, travel, space, football">
</head>

<body>
<div class="container">
    <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="/rgrnke/pa1"><font size="4">&emsp;Home&emsp;</font></a></li>
        </ul>
        <h3 class="text-muted">EECS 485 Project 1</h3>
      </div>
</div>

    

    <div class="jumbotron">
      <div class="container">
        <h1>Hello <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
!</h1>
        <p>You are viewing pictures from Album: <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
.</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa1/album?id=<?php echo $_smarty_tpl->tpl_vars['albumid']->value;?>
">Return to Album &raquo;</a></p>
      </div>
    </div>

    <div class="center">
      <?php if ($_smarty_tpl->tpl_vars['prev']->value){?>
        <a class="btn btn-primary btn-lg" href="/rgrnke/pa1/pic?id=<?php echo $_smarty_tpl->tpl_vars['prev']->value;?>
" role="button" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
      <?php }?>

      <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">

      <?php if ($_smarty_tpl->tpl_vars['next']->value){?>
        <a class="btn btn-primary btn-lg" href="/rgrnke/pa1/pic?id=<?php echo $_smarty_tpl->tpl_vars['next']->value;?>
" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      <?php }?>
    </div>



  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html>
<?php }} ?>