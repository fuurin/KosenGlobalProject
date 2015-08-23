$( function() {
	$("#change").on('click', function () {
		$.ajax({
			url:'php/word.php',
			type: 'POST',
			success: function (arr) {
				var word = JSON.parse(arr);
				console.log(word);
			}
		})
	})
});