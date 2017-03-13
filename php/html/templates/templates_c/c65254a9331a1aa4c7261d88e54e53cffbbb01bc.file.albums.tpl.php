<?php /* Smarty version Smarty-3.1.14, created on 2014-10-03 21:20:23
         compiled from "/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/albums.tpl" */ ?>
<?php /*%%SmartyHeaderCode:505859064542363a6e98b36-42704034%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c65254a9331a1aa4c7261d88e54e53cffbbb01bc' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/albums.tpl',
      1 => 1412371010,
      2 => 'file',
    ),
    'b9b8486bb719814d2c82ef53e2b7a643983349f6' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/base.tpl',
      1 => 1412297614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '505859064542363a6e98b36-42704034',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_542363a6f37588_24849272',
  'variables' => 
  array (
    'title' => 0,
    'username' => 0,
    'root' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542363a6f37588_24849272')) {function content_542363a6f37588_24849272($_smarty_tpl) {?>

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
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>

    <div class="jumbotron">
      <div class="container">
        <h1>Hello <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
!</h1>
        <p>Welcome to your album list.</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa2/albums/edit?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">Edit Albums &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value/2-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['num']->value/2-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
            <h3><strong><?php echo $_smarty_tpl->tpl_vars['title'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</strong></h3>
            <p>Created By: <?php echo $_smarty_tpl->tpl_vars['users'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</p>
            <p>Created Date: <?php echo $_smarty_tpl->tpl_vars['created'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</p>
            <p>Last Updated Date: <?php echo $_smarty_tpl->tpl_vars['lastupdated'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</p>
            <p><a class="btn btn-info btn-lg" role="button" href="/rgrnke/pa2/album?id=<?php echo $_smarty_tpl->tpl_vars['albumid'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
">Go! &raquo;</a></p>
            <br>
          <?php }} ?>
        </div>

       <?php $_smarty_tpl->tpl_vars['temp'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value, null, 0);?>	

        <div class="col-lg-4">
          <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value-1+1 - ($_smarty_tpl->tpl_vars['temp']->value) : $_smarty_tpl->tpl_vars['temp']->value-($_smarty_tpl->tpl_vars['num']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['temp']->value, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
            <h3><strong><?php echo $_smarty_tpl->tpl_vars['title'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</strong></h3>
            <p>Created By: <?php echo $_smarty_tpl->tpl_vars['users'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</p>
            <p>Created Date: <?php echo $_smarty_tpl->tpl_vars['created'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</p>
            <p>Last Updated Date: <?php echo $_smarty_tpl->tpl_vars['lastupdated'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</p>
            <p><a class="btn btn-info btn-lg" role="button" href="/rgrnke/pa2/album?id=<?php echo $_smarty_tpl->tpl_vars['albumid'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
">Go! &raquo;</a></p>
            <br>
          <?php }} ?>
        </div>
      </div>
    </div>

    </div>
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item">Home</a>
            <?php if ($_smarty_tpl->tpl_vars['username']->value){?>
            <a href="/rgrnke/pa2/albums?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" class="list-group-item active">My Albums</a>
            <a href="/rgrnke/pa2/user/edit" class="list-group-item">Edit Account</a>
            <?php }?>
          </div>
        </div><!--/span-->
      </div><!--/row-->
   </div>



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