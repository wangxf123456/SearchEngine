{* Smarty *}
{extends 'base.tpl'}
{block name='body'}
  <div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-xs-12 col-sm-9">
      <form class="form-signin" role="form" action="/rgrnke/pa2/login" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input type="hidden" name="url" value={$url}>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

      </div>

      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <div class="list-group">
          <a href="/rgrnke/pa2" class="list-group-item">Back to Home</a>
        </div>
      </div><!--/span-->
    </div><!--/row-->
  </div> <!-- /container -->

{/block}
