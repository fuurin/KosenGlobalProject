//phpに送信
$( function() {
		$('#user_name').text($.cookie('name'));

		$("#logout")
		.on("click", function () {
			$.ajax({
				url: "./php/logout.php",
				timeout: 10000,
			});
			$.removeCookie("id");
			$.removeCookie("name");
			document.location = "index.html";
		});

		//入力フォーマットが正しければ通信開始
		$("#submit").on('click', function () {
			var myRet = confirm("本当にこの記事を投稿しますか？");
			
			if ( myRet == true ){
				//　データ生成
				// 画像データの取り扱い
				var form_data = {
						country: $("input[name=country]").val(),
						university: $("input[name=university]").val(),
						article: $("textarea[name=article]").val(),
						picture: $("input[name=picture]").val()
				};

				$.ajax({
					url: 'php/write_article.php',
					type: 'POST',
					data: form_data,
					success: function () {
						// モーダルウィンドウを表示し、TOPへ戻るボタンを設置
					},
					error: function (response) {
						alert(response);
						return false;
					},
					timeout: 10000,
				});
			}
			else {
				return false;
			}
		});
});
