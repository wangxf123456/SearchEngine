<?php /* Smarty version Smarty-3.1.14, created on 2014-10-03 03:54:21
         compiled from "/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208724572454236c3b4d6839-21085639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bf3466bec7f2de7d5ba7e78a358e6784f1f381a' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/user.tpl',
      1 => 1412308317,
      2 => 'file',
    ),
    'b9b8486bb719814d2c82ef53e2b7a643983349f6' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/base.tpl',
      1 => 1412297614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208724572454236c3b4d6839-21085639',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54236c3b5384e6_84617507',
  'variables' => 
  array (
    'title' => 0,
    'username' => 0,
    'root' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54236c3b5384e6_84617507')) {function content_54236c3b5384e6_84617507($_smarty_tpl) {?>

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
        if (add.password.value != add.password_retype.value) {
            alert("not the same");
            return false;
        } else {
            return true;
        }
    }
</script>
    <div class="jumbotron">
      <div class="container">
        <h1>Hello!</h1>
        <p>User register</p>
      </div>
    </div>

<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
        <form id="add" name="add" action="/rgrnke/pa2/user" method="post">
	
	    <p>Username: <input type="text" required name="username" pattern="[A-Za-z0-9_]{3,}"/></p>
	
	    <p>First name: <input type="text" name="firstname" /></p>
	    <p>Last name: <input type="text" name="lastname" /></p>
	    <p>Email: <input type="email" name="email" required/></p>
	
	    <p>Password: <input type="password" name="password" pattern="(?=.*\d)(?=.*[A-Za-z])[A-Za-z0-9_]{5,15}" required/></p>
	
	    <p>Retype password: <input type="password" name="password_retype" /></p>
	    <input type="submit" value="Submit" onClick="return check()"/>
	</form>
        </div>

          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item">Back to Home</a>
            <?php if ($_smarty_tpl->tpl_vars['username']->value){?>
            <a href="/rgrnke/pa2/albums?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" class="list-group-item">My Albums</a>
            <a href="/rgrnke/pa2/user/edit" class="list-group-item active">Edit Account</a>
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