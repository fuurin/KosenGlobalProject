//phpに送信
$( function() {
        $.removeCookie('kgp_id');

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
                                if(res['id'] != "") {
                                        $.cookie('kgp_id', res['id']);
                                        document.location("../top.html");
                                }
                        },
                        error: function (response) {
                        	var res = JSON.parse(response);
                                alert(res);
                        },
                        timeout: 10000,
                });
        });
});
