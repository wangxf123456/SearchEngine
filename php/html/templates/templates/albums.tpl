{* Smarty *}
{extends 'base.tpl'}
{block name='body'}

  <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>

    <div class="jumbotron">
      <div class="container">
        <h1>Hello {$username}!</h1>
        <p>Welcome to your album list.</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa2/albums/edit?username={$username}">Edit Albums &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          {for $i=0 to $num/2-1}
            <h3><strong>{$title{$i}}</strong></h3>
            <p>Created By: {$users{$i}}</p>
            <p>Created Date: {$created{$i}}</p>
            <p>Last Updated Date: {$lastupdated{$i}}</p>
            <p><a class="btn btn-info btn-lg" role="button" href="/rgrnke/pa2/album?id={$albumid{$i}}">Go! &raquo;</a></p>
            <br>
          {/for}
        </div>

       {$temp = $i}	

        <div class="col-lg-4">
          {for $i=$temp to $num-1}
            <h3><strong>{$title{$i}}</strong></h3>
            <p>Created By: {$users{$i}}</p>
            <p>Created Date: {$created{$i}}</p>
            <p>Last Updated Date: {$lastupdated{$i}}</p>
            <p><a class="btn btn-info btn-lg" role="button" href="/rgrnke/pa2/album?id={$albumid{$i}}">Go! &raquo;</a></p>
            <br>
          {/for}
        </div>
      </div>
    </div>

    </div>
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item">Home</a>
            {if $username}
            <a href="/rgrnke/pa2/albums?username={$username}" class="list-group-item active">My Albums</a>
            <a href="/rgrnke/pa2/user/edit" class="list-group-item">Edit Account</a>
            {/if}
          </div>
        </div><!--/span-->
      </div><!--/row-->
   </div>

{/block}
