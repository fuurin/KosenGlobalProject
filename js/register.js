//phpに送信
$( function() {
	// フォームチェック
	var check_register_form = function () {
		return true;
	};

	// Ajax
	var send_register_form = function (url) {
		var form_data = {
			name: $("input[name=name]").val(),
			password: $("input[name=password]").val(),
			institute: $("input[name=institute]").val()
		};

		$.ajax({
			url: url,
			type: 'POST',
			data: form_data,
			error: function (response) {
				alert(res);
				return false;
			},
			timeout: 10000,
		});
	};

	$("#submit").on('click', function () {
		if( check_register_form() ) {
			send_register_form('php/register.php');
		}
	});
});
