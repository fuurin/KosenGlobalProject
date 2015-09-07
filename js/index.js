//phpに送信
$( function() {
	var AUTHENTIFICATION_ERR_MSG = "ユーザ名またはパスワードが間違っています。";
	var CONNECTION_ERR_MSG = "サーバに接続できません。\nインターネットに接続されているかをご確認ください。"

	var addErrorMessage = function(selector, msg) {
		selector.before('<div id="error_msg">' + msg + '</div>');
	};

	// IDがあれば、TOPへ移動
	$.ajax({
		url: './php/checkID.php',
		error: function (res) {
			alert(res);
			return false;
		},
		timeout: 10000
	});

	//入力フォーマットが正しいかどうかの判定
	
	$("#submit").on('click', function () {
		//データ生成
		var form_data = {
			name: $("input[name=name]").val(),
			password: $("input[name=password]").val()
		};

		$.ajax({
			url: 'php/index.php',
			type: 'POST',
			data: form_data,
			success: function (response) {
				var res = JSON.parse(response);
				if(res['id'] != undefined) {
					document.location = "top.html";
				}
				else {
					addErrorMessage( $("#login_form"), AUTHENTIFICATION_ERR_MSG);
					return false;
				}
			},
			error: function (response) {	
				alert(CONNECTION_ERR_MSG);
				return false;
			},
			timeout: 10000,
		});
	});
});
