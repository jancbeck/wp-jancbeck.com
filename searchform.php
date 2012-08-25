<form class="navbar-search pull-right" method="get" action="<?php echo home_url(); ?>">
	<input type="text" id="s" name="s" autocomplete="off" class="search-query span3" placeholder="Suche">
</form>

<script type="text/javascript" >
jQuery(document).ready(function($) {    
    
    // use bootstraps typeahead feature for search input
    $( '.search-query' ).typeahead({

    	// the source is the result of an ajax request
	    source: function( query, process ) {
		    
		    // data to send to server
		    var data = {
		        action: 'query_title',
		        query: query,
		        _ajax_nonce: '<?php echo wp_create_nonce( 'my_ajax_nonce' ); ?>'
		    };
		    // get server response as JSON
		    $.getJSON( '<?php echo admin_url( 'admin-ajax.php' ) ?>', data, function( response ) {
		    	// fetch response as source
		        process( response );
		    });
	    }
    })
});
</script>