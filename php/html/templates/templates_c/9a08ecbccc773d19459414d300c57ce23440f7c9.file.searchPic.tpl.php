<?php /* Smarty version Smarty-3.1.14, created on 2014-11-07 01:12:22
         compiled from "/var/www/html/group16/pa4_z7o0l26s9k9/php/html/templates/templates/searchPic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45000472354582a4e81c523-76928850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a08ecbccc773d19459414d300c57ce23440f7c9' => 
    array (
      0 => '/var/www/html/group16/pa4_z7o0l26s9k9/php/html/templates/templates/searchPic.tpl',
      1 => 1415322716,
      2 => 'file',
    ),
    '38d7992b50182e9b74c277338abaed77262da77b' => 
    array (
      0 => '/var/www/html/group16/pa4_z7o0l26s9k9/php/html/templates/templates/base.tpl',
      1 => 1415243258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45000472354582a4e81c523-76928850',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54582a4e8b62a1_69664952',
  'variables' => 
  array (
    'title' => 0,
    'username' => 0,
    'root' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54582a4e8b62a1_69664952')) {function content_54582a4e8b62a1_69664952($_smarty_tpl) {?>

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
        </div>

        <div class="navbar-collapse collapse">
          <a class="navbar-brand navbar-right" href="/search">EECS 485 Project 4</a>
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

    


  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
            <form class="navbar-form" role="form" action="/search" method="get">
              <div class="form-group">
                  <input type="text" name="q" class="form-control">
                  <button type="submit" class="btn btn-info">Search</button>
              </div>
            </form>
      </div>
      <div class="navbar-collapse collapse">
        <a class="navbar-brand navbar-right" href="/search">EECS 485 Project 4</a>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="center">
      <p><img src="http://eecs485-02.eecs.umich.edu:5616/static/flickr-images/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.jpg"></a></p>
      <h4><?php echo $_smarty_tpl->tpl_vars['caption']->value;?>
</h4>
    </div>
    <hr>
    <p><?php echo $_smarty_tpl->tpl_vars['num']->value;?>
 pictures are similar to it:</p>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['num']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['num']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
      <div class="col-6 col-sm-6 col-lg-2">
      <a href="/search/picture?id=<?php echo $_smarty_tpl->tpl_vars['photos'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
"><img height=180 width=180 src="http://eecs485-02.eecs.umich.edu:5616/static/flickr-images/<?php echo $_smarty_tpl->tpl_vars['photos'.($_smarty_tpl->tpl_vars['i']->value)]->value;?>
.jpg"></a>
        <p>&nbsp;</p>
      </div>
    <?php }} ?>

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

<hr>
     <footer>
     <p>Contact information:<a href="mailto:wangtxf@umich.edu">wangxf@umich.edu</a></p>
     <p>&copy; Shuo Chen | Xiaofei Wang | Qijun Jiang </p>
     </footer>
</body>

</html>
<?php }} ?>