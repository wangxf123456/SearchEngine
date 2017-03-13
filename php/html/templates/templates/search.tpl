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
          <div class="col-md-3">
          </div>
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
                  <input type="text" value="{$query}" name="q" class="form-control">
                  <button type="submit" class="btn btn-info">Search</button>
              </div>
            
      </div>
      <div class="navbar-left">
         <label for=fader style="color:grey">w value</label>
	  <input type=range name="w" min=0 max=1 value={$w} id=fader step=0.01 oninput="outputUpdate(value)">
	  <output for=fader id=volume style="color:white">{$w}</output>
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
    <br>
    <p>{$num} results for "{$query}" are shown: </p>
    <hr>
    {for $i=0 to $num - 1}
      <h3><a href="https://en.wikipedia.org/wiki/{$articletitle{$i}}">{$articletitle{$i}}</a></h3>
      <p><a href="https://en.wikipedia.org/wiki/{$articletitle{$i}}">https://en.wikipedia.org/wiki/{$articletitle{$i}}</a></p>
      <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#infobox{$i}" aria-expanded="false" aria-controls="infobox{$i}">
  	show summary
      </button>

      <div id="infobox{$i}" class="collapse">
	<img src="{$imgurl{$i}}" />
        <p><br><b>Categories:</b>{$category{$i}}</p>
        <p><b>Infobox:</b></p>
        <p>{$info{$i}}</p>
	<hr>
      </div>
    {/for}
    </div>    

{/if}

{/block}
