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
        <p>You are viewing pictures from Album: {$title}.</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa2/album?id={$albumid}">Return to Album &raquo;</a></p>
      </div>
    </div>

    <div class="container">
    <p>Caption: {$caption}</p>
    </div>

    <div class="center">
      {if $prev}
        <a class="btn btn-primary btn-lg" href="/rgrnke/pa2/pic?id={$prev}" role="button" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
      {/if}

      <img src="{$url}">

      {if $next}
        <a class="btn btn-primary btn-lg" href="/rgrnke/pa2/pic?id={$next}" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      {/if}
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
<h1>You have not logged in or you do not have access to this picture.<br> Click <a href="/rgrnke/pa2/login?url=_rgrnke_pa2_pic?id={$picid}">here</a> to go to login</h1>
{/if}
{/block}
