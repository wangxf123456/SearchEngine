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
              <h1>Hello {$username}!<p class="important"></h1>
              <h3>You are editing Album: {$title} - <font color="brand-primary">[{$access}]</font></h3>              
              <p class="important"><a class="btn btn-primary btn-lg" role="button" href="/rgrnke/pa2/album?id={$albumid}">Return to Album &raquo;</a></p>
            </div>

      <div class="row">
      {for $i=0 to $num - 1}
      <div class="col-6 col-sm-6 col-lg-4">
      <p><a href="/rgrnke/pa2/pic?id={$picid{$i}}"><img height=200 width=200 src={$url{$i}}></a></p>
      <p>Date: {$date{$i}}</p>
      <p>Caption: {$caption{$i}}</p>
        <form action="/rgrnke/pa2/album/edit" method="post">
                <input type="submit" name="delete" value="Delete!!!">
                <input type="hidden" name="op" value="delete">
                <input type="hidden" name="albumid" value={$albumid}>
                <input type="hidden" name="picid" value={$picid{$i}}>
        </form>
      </div>
      {/for}
      </div>

    <br/>

<form action="/rgrnke/pa2/album/edit" method="post" enctype="multipart/form-data">
<label for="file">Add picture:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="add" value="Add">
<input type="hidden" name="op" value="add">
<input type="hidden" name="albumid" value={$albumid}>
</form>

     </div>

       <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item">Home</a>
            {if $username}
            <a href="/rgrnke/pa2/albums?username={$username}" class="list-group-item">My Albums</a>
            <a href="/rgrnke/pa2/user/edit" class="list-group-item">Edit Account</a>
            {/if}
          </div>

         <hr>

         <h4>Change Album Name</h4>
         <form role="form" action="/rgrnke/pa2/album/edit" method="post">
             <input type="text" class="form-control" name="name" placeholder="Enter Album Name">
             <input type="hidden" name="albumid" value={$albumid}>
             <button type="submit" class="btn btn-default" name="op" value="editname">Submit</button>
         </form>   

         <hr>

         <h4>Change Album Permission</h4>
         <form role="form" action="/rgrnke/pa2/album/edit" method="post">
             <div class="radio">
               <label>
               <input type="radio" name="access" value="private">Private</br>
               <input type="radio" name="access" value="public"> Public
               </label>
             </div>
             <input type="hidden" name="albumid" value={$albumid}>
             <button type="submit" class="btn btn-default" name="op" value="editaccess">Submit</button>
         </form>

       <hr>

       {if $access eq private}
            <h4>Users Who Can View The Album:</h4>
            <form role="form" action="/rgrnke/pa2/album/edit" method="post">
              <div class="radio">
       	      <label>
              {for $i=0 to $accessnum-1}
              <input type="radio" name="username" value="{$accessed{$i}}">{$accessed{$i}}</br>
              {/for}
              </label>
              </div>
              <input type="hidden" name="albumid" value={$albumid}>
              <button type="submit" class="btn btn-default" name="op" value="deleteuser">Delete</button>
            </form>
            <hr>
            <h4>Allow new user to view it:</h4>
            <form role="form" action="/rgrnke/pa2/album/edit" method="post">
             <input type="text" class="form-control" name="username" placeholder="Enter Username">
             <input type="hidden" name="albumid" value={$albumid}>
             <button type="submit" class="btn btn-default" name="op" value="adduser">Submit</button>
            </form>
          </div>
        </div><!--/span-->
        {/if}

      </div><!--/row-->
   </div>
{else}
<h1>You have not logged in or you do not have access to this album.<br> Click <a href="/rgrnke/pa2/login?url=_rgrnke_pa2_album_edit?id={$albumid}">here</a> to go to login</h1>
{/if}
{/block}
