<form id="searchform-resource" class="resource-search" method="post">
	<input type="text" class="search-field" name="s" placeholder="Search" value="<?php the_search_query(); ?>">
	<input type="hidden" name="post_type" value="resource">
	<button type="submit" value="Search"><i class="fas fa-search"></i></button>
</form>