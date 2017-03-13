{* Smarty *}
{extends 'base.tpl'}
{block name='body'}
{if $log eq true}
 <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>

    <div class="jumbotron">
      <div class="container">
        <h1>Hello {$username}!</h1>
        <h3>You are in Album: {$title} - <font color="brand-primary">[{$access}]</font></h3>
        <p><a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa2/albums?username={$username}">Return to Album List &raquo;</a>
           <a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa2/album/edit?id={$albumid}">Edit This Album &raquo;</a></p>
      </div>
    </div>

    <div class="row">
      {for $i=0 to $num - 1}
      <div class="col-6 col-sm-6 col-lg-4">
      <p><a href="/rgrnke/pa2/pic?id={$picid{$i}}"><img height=200 width=200 src={$url{$i}}></a></p>
      <p>Date: {$date{$i}}</p>
      <p>Caption: {$caption{$i}}</p>
      </div>
      {/for}
    </div>
  </div>
  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item">Home</a>
            {if $username}
            <a href="/rgrnke/pa2/albums?username={$username}" class="list-group-item">My Albums</a>
            <a href="/rgrnke/pa2/user/edit" class="list-group-item">Edit Account</a>
            {/if}
          </div>
        </div><!--/span-->
      </div><!--/row-->
   </div>
{else}
<h1>You have not logged in or you do not have access to this album.<br> Click <a href="/rgrnke/pa2/login?url=_rgrnke_pa2_album?id={$albumid}">here</a> to login</h1>
{/if}
{/block}
