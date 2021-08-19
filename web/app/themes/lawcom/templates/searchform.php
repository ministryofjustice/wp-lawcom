<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url(home_url('/')); ?>">
  <label for="searchbox" class="sr-only"><?php _e('Search for:', 'roots'); ?></label>
  <div class="input-group">
    <input id="searchbox" type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search the site', 'roots'); ?>">
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default"><?php _e('', 'roots'); ?><img src="<?php bloginfo('template_directory'); ?>/assets/img/green-search-icon.gif"></button>
    </span>
  </div>
</form>
