//phpに送信
$( function() {
		//入力フォーマットが正しければ通信開始
		$("#submit").on('click', function () {
			var myRet = confirm("本当にこの記事を投稿しますか？");
			
			if ( myRet == true ){
				//データ生成
				var form_data = {
						country: $("input[name=country]").val(),
						university: $("input[name=university]").val(),
						article: $("input[name=article]").val(),
						picture: $("input[name=picture]").val()
				};

				$.ajax({
					url: 'php/register.php',
					type: 'POST',
					data: form_data,
					success: function (response) {
						var res = JSON.parse(response);
						console.log("success");
					},
					error: function (response) {
						var res = JSON.parse(response);
						alert(res);
					},
					timeout: 10000,
				});
			}
		});
});
