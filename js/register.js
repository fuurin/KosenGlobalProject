//データ生成
var form_data = {
	name: $("input[name=name]").val(),
	password: $("input[name=password]").val(),
	institute: $("input[name=institute]").val()
};

//phpに送信
$( function() {
	//入力フォーマットが正しければ通信開始
	$("#submit").on('click', function () {
		$.ajax({
			url: 'php/register.php',
			dataType: 'text',
			type: 'POST',
			data: form_data,
			success: function (msg) {
				alart("success" + msg);
			},
		})
	})
});