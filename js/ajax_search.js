jQuery(function(){
	//Remove existing listener from search box 
	
	//Add a div to populate with suggestions
	jQuery('.search-form').after('<div id="ajax_search_results_go_here"></div>');
	//Add a listener to the Wordpress search box
	jQuery('section.widget_search .search-field').keyup(function(){
		var search_value = jQuery('section.widget_search .search-field').val();
		var suggestions = get_suggestions(search_value);
	});
	
	//input string
	//output array
	function get_suggestions(search_value){
		var suggestions = [];
		var url = info.url + '/ajax_search/includes/ajax_search_responder.php?s=' + search_value;
		jQuery.ajax({
			url: url,
			success: function(data){
				var data = JSON.parse(data);
				var posts = [];
				for(i in data){
					
					var obj = {
						'post_title':data[i].post_title,
						'url':data[i].guid,
					};
					
					posts.push(obj);
			}
				make_suggestions(posts);
			}
		});
		
	}
	
	//receive array
	//append markup below search box
	function make_suggestions(suggestions){
		var output = '';
		output += '<ul>';
		for(var i=0;i<suggestions.length;i++){
			 output += '<a href="' + suggestions[i].url + '"><li>' + suggestions[i].post_title + '</li></a>';
		}
		output += '</ul>';
		remove_existing_list();
		jQuery('#ajax_search_results_go_here').append(output);
	}
	
	function remove_existing_list(){
		jQuery('#ajax_search_results_go_here').empty();
	}
	
});