<?php /* Smarty version Smarty-3.1.14, created on 2014-10-02 22:02:52
         compiled from "/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/root.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1432146414542dcb8c089218-53846969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a86d1027bfe102a012086daa19ced67e4fc6eaa1' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/root.tpl',
      1 => 1412286940,
      2 => 'file',
    ),
    'b9b8486bb719814d2c82ef53e2b7a643983349f6' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/base.tpl',
      1 => 1412286877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1432146414542dcb8c089218-53846969',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'log' => 0,
    'root' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_542dcb8c0f4082_55595430',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542dcb8c0f4082_55595430')) {function content_542dcb8c0f4082_55595430($_smarty_tpl) {?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EECS485-Group16-Project2">
    <meta name="author" content="Shuo Chen & Xiaofei Wang & Qijun Jiang">
    <link rel="icon" href="/static/css/Pic/favicon.ico">

    <link rel="stylesheet" href="/static/css/bootstrap-3.2.0-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/static/css/style.css" />

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name="keywords" content="photo, album, user, travel, space, football">
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/rgrnke/pa2">EECS 485 Project 2</a>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['log']->value==true){?>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form"
                action="/rgrnke/pa2/logout" method="post">
            <button type="submit" class="btn btn-primary">Log out</button>
            <input type="hidden" name="logout" value="logout"/>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <?php if ($_smarty_tpl->tpl_vars['root']->value==true){?>
              <li><a>Logged in as <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
[Root]</a></li>
            <?php }else{ ?>
              <li><a>Logged in as <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a></li>
            <?php }?>
          </ul>
        </div><!--/.navbar-collapse -->
        <?php }?>
      </div>
    </div>
    

<body>

    <div class="container">

        <form role="form" action="/rgrnke/pa2/root" method="post">
             <input type="text" class="form-control" name="username" placeholder="Enter Your Username">
             <button type="submit" name="op" value="add" class="btn btn-default">Add</button>
		 <button type="submit" name="op" value="delete" class="btn btn-default">Delete</button>
        </form>
 
    </div> <!-- /container -->

</body>




  <script type="text/javascript" src="/static/js/main.js"></script>
<script type="text/javascript">
(function(w, d) { var a = function() { var b = d.createElement('script'); b.type = 'text/javascript'; 
  if (undefined !== b.setAttribute) { b.setAttribute('async', 'async'); } 
  b.src = '//' + ((w.location.protocol === 'https:') ? 's3.amazonaws.com/cdx-radar/' : 
    'radar.cedexis.com/') + '01-14679-radar10.min.js'; d.body.appendChild(b); }; 
  if (w.addEventListener) { w.addEventListener('load', a, false); } 
  else if (w.attachEvent) { w.attachEvent('onload', a); } 
}(window, document)); 
</script>
</body>

</html>
<?php }} ?>