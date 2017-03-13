<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 05:48:19
         compiled from "/var/www/html/group16/admin/pa1/php/html/templates/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7317715955414e5514cbaf8-82100865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2435cf102a266f7a0bfdd731c6c12d3628f78b2b' => 
    array (
      0 => '/var/www/html/group16/admin/pa1/php/html/templates/templates/index.tpl',
      1 => 1411191652,
      2 => 'file',
    ),
    '81b67db77f80fad59182c5ed1fc6995c24f8977d' => 
    array (
      0 => '/var/www/html/group16/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1411192096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7317715955414e5514cbaf8-82100865',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5414e55151a048_15796626',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5414e55151a048_15796626')) {function content_5414e55151a048_15796626($_smarty_tpl) {?>

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

    
<body>

    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to Your Photo Master!</h1>
        <p>This is you personal photo wall!</p>
        <p>You can store photos in albums and arrange them.</p>
      </div>
    </div>

    <div class="container"> 
     <h2>Please select your username:</h2>     
     <div class="row">
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['num']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
        <div class="col-md-4">
          <h2><?php echo $_smarty_tpl->tpl_vars['username'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</h2>
          <br>
          <p><a class="btn btn-primary btn-lg" href="/rgrnke/pa1/albums?username=<?php echo $_smarty_tpl->tpl_vars['username'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
" role="button">View your albums &raquo;</a></p>
        </div>
       <?php }} ?>
     </div>
     <hr>
     <footer>
     <p>Contact information:<a href="mailto:wangtxf@umich.edu">wangxf@umich.edu</a></p>
     <p>&copy; Shuo Chen | Xiaofei Wang | Qijun Jiang </p>
     </footer>
   </div>
</body>



  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html>
<?php }} ?>