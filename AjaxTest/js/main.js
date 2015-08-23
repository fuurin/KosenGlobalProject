$( function() {
	$("#change").on('click', function () {
		$.ajax({
			url: 'php/word.php',
			dataType: 'text',
			type: 'GET',
			data:{
			       item: "checked!",
			   },
			success: function (ret) {
				console.log(ret);
			}
		})
	})
});