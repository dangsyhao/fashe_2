<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>


<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <input type="search"  class="search-field" placeholder="Search-Product" value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit">
        <span class="screen-reader-text">Search</span>
    </button>
</form>
