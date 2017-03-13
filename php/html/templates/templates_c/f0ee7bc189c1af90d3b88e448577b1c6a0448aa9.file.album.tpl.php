<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 06:37:41
         compiled from "/var/www/html/group16/admin/pa1/php/html/templates/templates/album.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15703340675414e7b686a033-57974084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0ee7bc189c1af90d3b88e448577b1c6a0448aa9' => 
    array (
      0 => '/var/www/html/group16/admin/pa1/php/html/templates/templates/album.tpl',
      1 => 1411195059,
      2 => 'file',
    ),
    '81b67db77f80fad59182c5ed1fc6995c24f8977d' => 
    array (
      0 => '/var/www/html/group16/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1411192096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15703340675414e7b686a033-57974084',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5414e7b68c9c08_44779566',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5414e7b68c9c08_44779566')) {function content_5414e7b68c9c08_44779566($_smarty_tpl) {?>

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
        <p>You are in Album: <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
.</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa1/albums?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">Return to Album List &raquo;</a>
           <a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa1/album/edit?id=<?php echo $_smarty_tpl->tpl_vars['albumid']->value;?>
">Edit This Album &raquo;</a></p>
      </div>
    </div>

<table style="width:80%">
<tr>
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['num']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
<p>
    <td><a href="/rgrnke/pa1/pic?id=<?php echo $_smarty_tpl->tpl_vars['picid'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
"><img height=150 width=150 src=<?php echo $_smarty_tpl->tpl_vars['url'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
></a></td>
    <?php if ((1 & $_smarty_tpl->tpl_vars['i']->value)){?>
        </tr><tr>
    <?php }?>
</p>
<?php }} ?>
</tr>


  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html>
<?php }} ?>