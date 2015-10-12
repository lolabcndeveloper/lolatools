
$(document).ready(function() {
	
	var week = 0;
	
	
	//resizeComments();
	checkWeek();
	
	
	$("select[name='week_id']").on('change', function() {
		$('.week').hide();
		week = $("select[name='week_id']").val();
		$('#week'+week).show();
		//loadComments()
		
	});
	
	$('.comment').on('click', function() {
		$('.comment').removeClass('selected');
		$(this).addClass('selected');
		
		var id = $(this).attr('id');
		$('input[name="comment_id"]').val(id);
	
	});
	
	
	/*
	$(window).on('resize', function() {
		resizeComments();
	});	
	
	function resizeComments() {
		var width_comments = $('#comments').width() - 22;
		//console.log("width_comments: "+width_comments);
		
		var width_comment_total = 221;
		
		var total = Math.floor(width_comments / width_comment_total);
		
		var new_width_comment = Math.floor(width_comments / total);
		
		//$('#week'+week).css('width', (total*width_comment_total)+'px');
		$('#week'+week+' .comment').width(new_width_comment - 21);
		
		var num_comments = $('#week'+week+' .comment').length + 1;
		$('#week'+week).css('width', (num_comments*new_width_comment)+'px');
		
		//alert(total);
		//console.log('total: '+Math.floor(total));
	}
	*/
	
	
	function checkWeek() {
		$('.week').hide();
		week = $("select[name='week_id']").val();
		//console.log(week);
		if (week != '') {
			$('#week'+week).show();
		}
		
		comment = $("input[name='comment_id']").val();
		console.log(comment);
		if (comment != '') {
			$('#week'+week+' #'+comment).addClass('selected');
		}
		
	}

});
	
