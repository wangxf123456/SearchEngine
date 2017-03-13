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
{if $log eq true}
<div class="container">
	<form id="edit" name="edit" action="/rgrnke/pa2/user/edit" method="post">
	    <p>User name: {$username}</p>
	    <p>Old first name: {$firstname} <br>New first name: <input type="text" name="firstname"/></p>
	    <p>Old last name: {$lastname} <br>New last name: <input type="text" name="lastname"/></p>
	    <p>Old email: {$email} <br>New email: <input type="email" name="email" required/></p>
	{literal}
	    <p>New password: <input type="password" name="password" pattern="(?=.*\d)(?=.*[A-Za-z])[A-Za-z0-9_]{5,15}" required/></p>
	{/literal}
	    <p>Retype password: <input type="password" name="password_retype" required/></p>
	    <input type="submit" value="Submit" onClick="return check()"/>
	</form>
	<br>
	<form id="delete" name="delete" action="/rgrnke/pa2/user/delete" method="post">
	    <input type="submit" value="Delete account"/>
	</form>	
</div>
{else}
<h1>You have not logged in <br> Click <a href="/rgrnke/pa2">here</a> to go to home page</h1>
{/if}

</div>
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="/rgrnke/pa2" class="list-group-item">Home</a>
            {if $username}
            <a href="/rgrnke/pa2/albums?username={$username}" class="list-group-item">My Albums</a>
            <a href="/rgrnke/pa2/user/edit" class="list-group-item active">Edit Account</a>
            {/if}
          </div>
        </div><!--/span-->
      </div><!--/row-->
   </div>


{/block}
