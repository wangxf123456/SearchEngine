<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 06:45:50
         compiled from "/var/www/html/group16/admin/pa1/php/html/templates/templates/albumedit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149443466454164854b7d862-78781688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '016b3f41fa76f979151f3c3adc47243ecd040305' => 
    array (
      0 => '/var/www/html/group16/admin/pa1/php/html/templates/templates/albumedit.tpl',
      1 => 1411195533,
      2 => 'file',
    ),
    '81b67db77f80fad59182c5ed1fc6995c24f8977d' => 
    array (
      0 => '/var/www/html/group16/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1411192096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149443466454164854b7d862-78781688',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54164854c408a5_04494403',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54164854c408a5_04494403')) {function content_54164854c408a5_04494403($_smarty_tpl) {?>

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
        <p>You are editing Album: <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
.</p>
        <p class="important"><a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa1/album?id=<?php echo $_smarty_tpl->tpl_vars['albumid']->value;?>
">Return to Album &raquo;</a></p>
      </div>
    </div>

<div class="container">
<table style="width:50%">
<tr>
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['num']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
<p>
    <td><a href="/rgrnke/pa1/pic?id=<?php echo $_smarty_tpl->tpl_vars['picid'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
"><img height=150 width=150 src=<?php echo $_smarty_tpl->tpl_vars['url'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
></a></td>
    <td><form action="/rgrnke/pa1/album/edit" method="post">
		<input type="submit" name="delete" value="Delete!!!">
		<input type="hidden" name="op" value="delete">
		<input type="hidden" name="albumid" value=<?php echo $_smarty_tpl->tpl_vars['albumid']->value;?>
>
		<input type="hidden" name="picid" value=<?php echo $_smarty_tpl->tpl_vars['picid'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
>
	  </form>
    </td>
    <?php if ((1 & $_smarty_tpl->tpl_vars['i']->value)){?>
        </tr><tr>
    <?php }?>
</p>
<?php }} ?>
</tr>

</table>
</div>
<br/>

<form action="/rgrnke/pa1/album/edit" method="post"
enctype="multipart/form-data">
<label for="file">Add pictures!:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="add" value="Add">
<input type="hidden" name="op" value="add">
<input type="hidden" name="albumid" value=<?php echo $_smarty_tpl->tpl_vars['albumid']->value;?>
>
</form>


  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html>
<?php }} ?>