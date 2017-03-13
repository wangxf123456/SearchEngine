<?php /* Smarty version Smarty-3.1.14, created on 2014-10-03 21:43:55
         compiled from "/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/albumsedit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22988226654236a97903013-84505780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48c719adaf968eeeb49cae8ef7f74f6b4dab9b5d' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/albumsedit.tpl',
      1 => 1412372629,
      2 => 'file',
    ),
    'b9b8486bb719814d2c82ef53e2b7a643983349f6' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/base.tpl',
      1 => 1412297614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22988226654236a97903013-84505780',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54236a9799b650_55022722',
  'variables' => 
  array (
    'title' => 0,
    'username' => 0,
    'root' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54236a9799b650_55022722')) {function content_54236a9799b650_55022722($_smarty_tpl) {?>

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

    
<script>
    function check() {
        if (add.title.value.length == 0) {
            alert("Album name cannot be null");
            return false;
        } else {
            return true;
        }
    }
</script>
<?php if ($_smarty_tpl->tpl_vars['log']->value==true){?>
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Hello <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
!</h1>
            <p>Welcome to Edit Your Albums.</p>
            <p><a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa2/albums?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">Return to Album List &raquo;</a></$
          </div>
        </div>


      <div class="row">
      <div class="col-3 col-sm-3 col-lg-3">
        <h3>Album Name</h3>
      </div>
      <div class="col-3 col-sm-3 col-lg-3">
       	<h3>Access</h3>
      </div>
      <div class="col-3 col-sm-3 col-lg-3">
       	<h3>Edit</h3>
      </div>
      <div class="col-3 col-sm-3 col-lg-3">
       	<h3>Delete</h3>
      </div>
      </div>
      <hr>

      <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['num']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
      <div class="row">
      <div class="col-3 col-sm-3 col-md-3 col-lg-3">
         <h4><a href="/rgrnke/pa2/album?id=<?php echo $_smarty_tpl->tpl_vars['albumid'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
"><?php echo $_smarty_tpl->tpl_vars['title'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</a></h4>
      </div>
      <div class="col-3 col-sm-3 col-md-3 col-lg-3">
         <h4><?php echo $_smarty_tpl->tpl_vars['access'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
</h4>
      </div>
      <div class="col-3 col-sm-3 col-md-3 col-lg-3">
         <h4><a href="/rgrnke/pa2/album/edit?id=<?php echo $_smarty_tpl->tpl_vars['albumid'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
">Edit</a></h4>
      </div>
      <div class="col-3 col-sm-3 col-md-3 col-lg-3">
         <form action="/rgrnke/pa2/albums/edit" method="post">
           <input type="hidden" name="op" value="delete" />
           <input type="hidden" name="albumid" value=<?php echo $_smarty_tpl->tpl_vars['albumid'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
 />
           <input type="submit" value="Delete" />
         </form>
      </div>
      </div>
      <?php }} ?>

      <hr>     
      <h4> Create New Album: </h4>

      <div class="row">
      <div class="col-3 col-sm-3 col-lg-3">
        <form id="add" role="form" name="add" action="/rgrnke/pa2/albums/edit" method="post">
          <input type="hidden" name="op" value="add" />
          <input type="hidden" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
          <p><input type="text" name="title" /></p>
      </div>
      <div class="col-3 col-sm-3 col-lg-3">
          <div class="radio">
            <input type="radio" name="access" value="private">Private</br>
            <input type="radio" name="access" value="public">Public
          </div>
      </div>
      <div class="col-3 col-sm-3 col-lg-3">
      </div>
      <div class="col-3 col-sm-3 col-lg-3">
          <input type="submit" value="Create" onClick="return check();"/>
        </form>
      </div>
      </div>

        </div>

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item">Home</a>
            <?php if ($_smarty_tpl->tpl_vars['username']->value){?>
            <a href="/rgrnke/pa2/albums?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" class="list-group-item">My Albums</a>
            <a href="/rgrnke/pa2/user/edit" class="list-group-item">Edit Account</a>
            <?php }?>
          </div>
        </div><!--/span-->
     </div><!--row-->
   </div>
<?php }else{ ?>
<h1>You have not logged in or you do not have access to this user's albums.<br> Click <a href="/rgrnke/pa2/login?url=_rgrnke_pa2_albums_edit?username=<?php echo $_smarty_tpl->tpl_vars['ownername']->value;?>
">here</a> to go to login</h1>
<?php }?>


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