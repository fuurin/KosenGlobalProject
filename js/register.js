//phpに送信
$( function() {
	// フォームチェック
	var check_register_form = function () {
		return true;
	};

	// Ajax
	var send_register_form = function (url, form_data) {
		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			error: function (response) {
				alert(res);
			},
			timeout: 10000,
		});
	};

	// submitボタン押下時の動作
	$("#submit").on('click', function () {
		if( check_register_form() ) {
			var form_data = {
				name: $("input[name=name]").val(),
				password: $("input[name=password]").val(),
				institute: $("input[name=institute]").val()
			};
			send_register_form('php/register.php', form_data);
		}
	});
});
