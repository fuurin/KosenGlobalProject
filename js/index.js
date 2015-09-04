//phpに送信
$( function() {
	$.ajax({
		url: './php/checkID.php',
		success: function (res) {
			if (res=="true") {
				//document.location = "top.html";
				alert("id is set");
			}
			else {
				alert("failed");
			};
		},
		error: function (res) {
			alert(res);
			return false;
		},
		timeout: 10000
	});

	//入力フォーマットが正しければ通信開始
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
						return false;
					}
			},
			error: function (response) {
				var res = JSON.parse(response);
					alert(res);
					return false;
			},
			timeout: 10000,
		});
	});
});
