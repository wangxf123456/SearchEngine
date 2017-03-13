{* Smarty *}
{extends 'base.tpl'}
{block name='body'}

{if $flag eq 0}

<div class="container">
   <div class="jumbotron">
      <div class="container">
        <h1 class="text-center"> Search Engine </h1>
        <div class="row">
        <div class="col-md-3"></div>
          <div class="col-md-6">
            <form action="/search" method="get">
            <div class="form-group">
                <div class="col-sm-10">
              	  <input type="text" name="q" class="form-control">
		  <label for=fader>w value</label>
	 	  <input type=range name="w" min=0 max=1 value=0.5 id=fader step=0.01 oninput="outputUpdate(value)">
	  	  <output for=fader id=volume>0.5</output>
	  	  <script>
		    function outputUpdate(vol) {
			document.querySelector('#volume').value = vol;
		    }
	  	  </script>
                </div>
                <div class="col-sm-2">
              	  <button type="submit" class="btn btn-info">Search</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </div>  
</div>

{elseif $flag eq 1}
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
                  <input type="text" placeholder="{$query}" name="q" class="form-control">
                  <button type="submit" class="btn btn-info">Search</button>
              </div>
            
      </div>
      <div class="navbar-left">
         <label for=fader style="color:grey">w value</label>
	  <input type=range name="w" min=0 max=1 value=0.5 id=fader step=0.01 oninput="outputUpdate(value)">
	  <output for=fader id=volume style="color:white">0.5</output>
	  <script>
		function outputUpdate(vol) {
			document.querySelector('#volume').value = vol;
		}
	  </script>
      </div>
      </form>
      <div class="navbar-collapse collapse">
        <a class="navbar-brand navbar-right" href="/search">EECS 485 Project 6</a>
      </div>
    </div>
  </div>

  <div class="container">
    <p>{$num} pictures found for "{$query}"</p>
    <hr>
    {for $i=0 to $num - 1}
      <div class="col-6 col-sm-6 col-lg-2">
        <a href="/search/picture?id={$photos{$i}}"><img height=180 width=180 src="static/flickr-images/{$photos{$i}}.jpg"}></a>
        <p>&nbsp;</p>
      </div>
    {/for}
  </div>

{/if}

{/block}