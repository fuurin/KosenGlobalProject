//phpに送信
$( function() {
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
                                        console.log("success!");
                                        //document.location = "top.html";
                                }
                        },
                        error: function (response) {
                        	var res = JSON.parse(response);
                                alert(res);
                        },
                        timeout: 10000,
                });

                return false;
        });
});
