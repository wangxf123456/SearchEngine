{* Smarty *}
{extends 'base.tpl'}
{block name='body'}

<body>

  <div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">

        <h3>Type in your Username, then we will send new password to your mailbox</h3>

        <form role="form" action="/rgrnke/pa2/forget" method="post">
             <input type="text" class="form-control" name="username" placeholder="Enter Your Username">
             <button type="submit" class="btn btn-default">Submit</button>
        </form>

        </div>

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item">Back to Home</a>
          </div>
        </div><!--/span-->
    </div><!--/row-->
 
  </div> <!-- /container -->

</body>


{/block}
