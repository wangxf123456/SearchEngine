<?php /* Smarty version Smarty-3.1.14, created on 2014-10-03 21:29:20
         compiled from "/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:891769997542f0f6dcc4628-54787042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4159e66ee121df799430db6a7f9fb7886e994bc1' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/login.tpl',
      1 => 1412371758,
      2 => 'file',
    ),
    'b9b8486bb719814d2c82ef53e2b7a643983349f6' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/base.tpl',
      1 => 1412297614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '891769997542f0f6dcc4628-54787042',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_542f0f6dd2b2b6_06309460',
  'variables' => 
  array (
    'title' => 0,
    'username' => 0,
    'root' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542f0f6dd2b2b6_06309460')) {function content_542f0f6dd2b2b6_06309460($_smarty_tpl) {?>

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
        <?php if ($_smarty_tpl->tpl_vars['username']->value){?>
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

    
  <div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-xs-12 col-sm-9">
      <form class="form-signin" role="form" action="/rgrnke/pa2/login" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input type="hidden" name="url" value=<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

      </div>

      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <div class="list-group">
          <a href="/rgrnke/pa2" class="list-group-item">Back to Home</a>
        </div>
      </div><!--/span-->
    </div><!--/row-->
  </div> <!-- /container -->



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