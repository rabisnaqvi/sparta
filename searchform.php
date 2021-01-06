<form role="search" method="get" class="search-form form-group" action="<?php echo home_url( '/' ); ?>">
    <div class="form-group">
        <div class="input-group">
            <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>"> <span class="input-group-btn">
        <button role="submit" class="search-submit btn btn-primary"><i class="fa fa-search"></i></button>
    </span> </div>
    </div>
</form>