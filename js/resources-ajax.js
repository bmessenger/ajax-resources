jQuery(function($){

	$(document).on("change", ".resource-filter", function(e) {

		var type = $(this).children("option:selected").val();

		$.ajax({
			url: wp_ajax.ajax_url,
			data: { action: "resources", type: type},
			type: 'post',
			beforeSend: function() {
				$('.loader').show();
			},
			success: function(result) {
				$('.resources-filtered').html(result);
				$('.match').matchHeight();
			},
			complete: function(data) {
				$('.loader').hide();
			},
			error: function(result) {
				console.warn(result);
			}
		});
		
		/* Update the query string in the URL to match the current selection */
		var url = window.location.href;       
		var urlSplit = url.split( "?" );       
		var stateObj = { Title : "New title", Url: urlSplit[0] + "?type=" + type};       
		history.pushState(stateObj, stateObj.Title, stateObj.Url);
		
		/* Update the Active state on the main nav to match the current selection */
		$('#menu-main-navigation > li.current-menu-item > ul > li > a').each( function() {
			var href = $(this).attr('href');
			var hrefArray = href.split('=', 2);
			var id = hrefArray[1];
			
			if ( type == id ) {
				$('#menu-main-navigation > li.current-menu-item > ul > li').removeClass('current-menu-item', 'active');
				$(this).parent("li").addClass('current-menu-item', 'active');
			}
		});

	});

	$(document).on( 'submit', '#searchform-resource', function(e) {
		e.preventDefault();

		var $form = $(this);
		var $input = $form.find('input[name="s"]');
		var query = $input.val();

		console.log(query);

		jQuery.ajax({
			url: wp_ajax.ajax_url,
			data : { action : 'resource_search_results', query : query },
			type : 'post',
			beforeSend: function() {
				$input.prop('disabled', true);
				$('.loader').show();
			},
			success : function( result ) {
				$input.prop('disabled', false);
				$('.resources-filtered').html(result);
			},
			complete: function(data) {
				$('.loader').hide();
			},
			error: function(result) {
				console.warn(result);
			}
		});

	});

});