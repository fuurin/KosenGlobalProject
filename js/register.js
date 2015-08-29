$( function() {
	// TODO:入力フォーマット判定

	$("#register_form input:submit").on('click', function () {
		
		//　データ生成
		var form_data = {
			name: $("input[name=name]").val(),
			password: $("input[name=password]").val(),
			institute: $("input[name=institute]").val()
		};

		//　通信開始
		$.ajax({
			url: 'php/register.php',
			dataType: 'text',
			type: 'POST',
			data: form_data,
			success: function (kgp_id) {
				$.cookie('kgp_id', kgp_id);
			},
			error: function () {
				alert("failed");
			},
			timeout: 10000,
		})
	})
});
