{* Smarty *}
{extends 'base.tpl'}
{block name='body'}
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
        
       {if $username}
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form"
                action="/rgrnke/pa2/logout" method="post">
            <button type="submit" class="btn btn-primary">Log out</button>
            <input type="hidden" name="logout" value="logout"/>
          </form>
          <ul class="nav navbar-nav navbar-right">
              <li><a>Logged in as {$username}</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
        {else}
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/rgrnke/pa2/forget">Forgot Password?</a></li>
          </ul>
          <a class="navbar-form navbar-right" href="/rgrnke/pa2/user"><button class="btn btn-info">Register</button></a>
          <form class="navbar-form navbar-right" role="form" 
                action="/rgrnke/pa2" method="post">
            <div class="form-group">
              <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Log in</button>
          </form>
        </div><!--/.navbar-collapse -->
        {/if}
      </div>
    </div>

   <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            {if $username}
            <h1>Hello {$username}!</h1>
            <p> Welcome to Your Photo Master!</p>
            {else}
            <h1>Welcome to Photo Master!</h1>
            <p>This is you personal photo wall!</p>
       	    <p>You can store photos in albums and arrange them.</p>
            <p>New user: &nbsp; 
               <a type="button" class="btn btn-lg btn-info" href="/rgrnke/pa2/user">Register it today! &raquo;</a></p>
            <h2></h2>
            
            {/if}
          </div>

          {if $username}
              <h3>Albums Catagory</h3>
          {else}
              <h3>You can see public albums from users:</h3>
          {/if}
          <hr>
          
          {for $i=0 to $usernum-1}
            <div class="row">
              {if $albumnum{$i} gt 0}
                <h4>{$users{$i}}'s Album:</h4>
                <div class="row">
                <h5>
                {for $j=0 to $albumnum{$i}-1}
                  <a type="button" class="btn btn-lg btn-default" href="/rgrnke/pa2/album?id={$albumid{$i}{$j}}">{$album{$i}{$j}}</a>
                {/for}
                </h5>
                </div>
              {/if}
            </div><!--/row-->
          {/for}

        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item active">Home</a>
            {if $username}
            <a href="/rgrnke/pa2/albums?username={$username}" class="list-group-item">My Albums</a>
              <a href="/rgrnke/pa2/user/edit" class="list-group-item">Edit Account</a>
            {/if}
          </div>
        </div><!--/span-->  
      </div><!--/row-->
   </div>

     <hr>
     <footer>
     <p>Contact information:<a href="mailto:wangtxf@umich.edu">wangxf@umich.edu</a></p>
     <p>&copy; Shuo Chen | Xiaofei Wang | Qijun Jiang </p>
     </footer>

</body>

{/block}
