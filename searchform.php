<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
  <div class="search-inner">
    <input type="search" placeholder="Search" name="s" value="<?php echo get_search_query() ?>" required>
    <input type="submit" value="go" class="btn btn-to-search" >
  </div>
</form>