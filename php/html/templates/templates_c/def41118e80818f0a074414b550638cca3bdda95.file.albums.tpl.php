<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 06:27:02
         compiled from "/var/www/html/group16/admin/pa1/php/html/templates/templates/albums.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4014415275415984a3c2b31-18011219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'def41118e80818f0a074414b550638cca3bdda95' => 
    array (
      0 => '/var/www/html/group16/admin/pa1/php/html/templates/templates/albums.tpl',
      1 => 1411194420,
      2 => 'file',
    ),
    '81b67db77f80fad59182c5ed1fc6995c24f8977d' => 
    array (
      0 => '/var/www/html/group16/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1411192096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4014415275415984a3c2b31-18011219',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5415984a454cc6_70856765',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5415984a454cc6_70856765')) {function content_5415984a454cc6_70856765($_smarty_tpl) {?>

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
        <p>Welcome to your album list.</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa1/albums/edit?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">Edit Albums &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <div class="row marketing">
        <div class="col-lg-6">
          <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value/2-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['num']->value/2-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
            <h4><?php echo $_smarty_tpl->tpl_vars['title'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</h4>
            <p>Created Date: <?php echo $_smarty_tpl->tpl_vars['created'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</p>
            <p>Last Updated Date: <?php echo $_smarty_tpl->tpl_vars['lastupdated'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</p>
            <p><a class="btn btn-info btn-lg" role="button" href="/rgrnke/pa1/album?id=<?php echo $_smarty_tpl->tpl_vars['albumid'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
">Go! &raquo;</a></p>
            <br>
          <?php }} ?>
        </div>

       <?php $_smarty_tpl->tpl_vars['temp'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, 0);?>	

        <div class="col-lg-6">
          <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value-1+1 - ($_smarty_tpl->tpl_vars['temp']->value) : $_smarty_tpl->tpl_vars['temp']->value-($_smarty_tpl->tpl_vars['num']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['temp']->value, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
            <h4><?php echo $_smarty_tpl->tpl_vars['title'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</h4>
            <p>Created Date: <?php echo $_smarty_tpl->tpl_vars['created'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</p>
            <p>Last Updated Date: <?php echo $_smarty_tpl->tpl_vars['lastupdated'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</p>
            <p><a class="btn btn-info btn-lg" role="button" href="/rgrnke/pa1/album?id=<?php echo $_smarty_tpl->tpl_vars['albumid'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
">Go! &raquo;</a></p>
            <br>
          <?php }} ?>
        </div>
      </div>
    </div>


  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html>
<?php }} ?>