$(document).ready(function() {
    $('input.remove_doubles').click(function() {
    	$.ajax({
    		data: $('form#filter_form').serialize(),
    		success: function(data) {
    			$('b#removed_doubles').html(data);
    			$('b#nr_doubles').html($('b#doubles').html() - $('b#removed_doubles').html())
    		}
    	});
    });
});