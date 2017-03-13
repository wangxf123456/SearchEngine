<?php /* Smarty version Smarty-3.1.14, created on 2014-10-03 22:19:07
         compiled from "/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/useredit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:586628858542caa997c5168-05725890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e9bcf55b8fa83807225ef346be6a9e8f1cd45f7' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/useredit.tpl',
      1 => 1412374744,
      2 => 'file',
    ),
    'b9b8486bb719814d2c82ef53e2b7a643983349f6' => 
    array (
      0 => '/var/www/html/group16/pa2_z7o0l26s9k9/php/html/templates/templates/base.tpl',
      1 => 1412297614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '586628858542caa997c5168-05725890',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_542caa99833df9_66570373',
  'variables' => 
  array (
    'title' => 0,
    'username' => 0,
    'root' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542caa99833df9_66570373')) {function content_542caa99833df9_66570373($_smarty_tpl) {?>

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


   <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>

    <div class="jumbotron">
      <div class="container">
        <h1>Hello!</h1>
        <p>Edit user info</p>
      </div>
    </div>
<?php if ($_smarty_tpl->tpl_vars['log']->value==true){?>
<div class="container">
	<form id="edit" name="edit" action="/rgrnke/pa2/user/edit" method="post">
	    <p>User name: <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</p>
	    <p>Old first name: <?php echo $_smarty_tpl->tpl_vars['firstname']->value;?>
 <br>New first name: <input type="text" name="firstname"/></p>
	    <p>Old last name: <?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
 <br>New last name: <input type="text" name="lastname"/></p>
	    <p>Old email: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
 <br>New email: <input type="email" name="email" required/></p>
	
	    <p>New password: <input type="password" name="password" pattern="(?=.*\d)(?=.*[A-Za-z])[A-Za-z0-9_]{5,15}" required/></p>
	
	    <p>Retype password: <input type="password" name="password_retype" required/></p>
	    <input type="submit" value="Submit" onClick="return check()"/>
	</form>
	<br>
	<form id="delete" name="delete" action="/rgrnke/pa2/user/delete" method="post">
	    <input type="submit" value="Delete account"/>
	</form>	
</div>
<?php }else{ ?>
<h1>You have not logged in <br> Click <a href="/rgrnke/pa2">here</a> to go to home page</h1>
<?php }?>

</div>
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item">Home</a>
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