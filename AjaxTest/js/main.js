$( function() {
	$("#change").on('click', function () {
		$.ajax({
			url: 'php/word.php',
			// type: 'POST',
			// dataType:'json',
			// data:{
			//        item: "change";
			//    },
			success: function (ret) {
				console.log(ret);
			}
		})
	})
});