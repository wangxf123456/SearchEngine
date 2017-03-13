{* Smarty *}
{extends 'base.tpl'}
{block name='body'}


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
                  <input type="text" name="q" class="form-control">
                  <button type="submit" class="btn btn-info">Search</button>
              </div>
            </form>
      </div>
      <div class="navbar-collapse collapse">
        <a class="navbar-brand navbar-right" href="/search">EECS 485 Project 4</a>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="center">
      <p><img src="http://eecs485-02.eecs.umich.edu:5616/static/flickr-images/{$id}.jpg"></a></p>
      <h4>{$caption}</h4>
    </div>
    <hr>
    <p>{$num} pictures are similar to it:</p>
    {for $i=0 to $num - 1}
      <div class="col-6 col-sm-6 col-lg-2">
      <a href="/search/picture?id={$photos{$i}}"><img height=180 width=180 src="http://eecs485-02.eecs.umich.edu:5616/static/flickr-images/{$photos{$i}}.jpg"></a>
        <p>&nbsp;</p>
      </div>
    {/for}

  </div>


{/block}