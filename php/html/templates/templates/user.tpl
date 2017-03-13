{* Smarty *}
{extends 'base.tpl'}
{block name='body'}
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
	{literal}
	    <p>Username: <input type="text" required name="username" pattern="[A-Za-z0-9_]{3,}"/></p>
	{/literal}
	    <p>First name: <input type="text" name="firstname" /></p>
	    <p>Last name: <input type="text" name="lastname" /></p>
	    <p>Email: <input type="email" name="email" required/></p>
	{literal}
	    <p>Password: <input type="password" name="password" pattern="(?=.*\d)(?=.*[A-Za-z])[A-Za-z0-9_]{5,15}" required/></p>
	{/literal}
	    <p>Retype password: <input type="password" name="password_retype" /></p>
	    <input type="submit" value="Submit" onClick="return check()"/>
	</form>
        </div>

          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item">Back to Home</a>
            {if $username}
            <a href="/rgrnke/pa2/albums?username={$username}" class="list-group-item">My Albums</a>
            <a href="/rgrnke/pa2/user/edit" class="list-group-item active">Edit Account</a>
            {/if}
          </div>
        </div><!--/span-->
      </div><!--/row-->
   </div>
{/block}
