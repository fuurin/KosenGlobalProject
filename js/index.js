//phpに送信
$( function() {
        //入力フォーマットが正しければ通信開始
        $("#login_form submit").on('click', function () {
                //データ生成
                var form_data = {
                        name: $("input[name=name]").val(),
                        password: $("input[name=password]").val()
                };

                $.removeCookie('kgp_id');

                $.ajax({
                        url: 'php/index.php',
                        type: 'POST',
                        data: form_data,
                        success: function (response) {
                        	var res = JSON.parse(response);
                                $.cookie('kgp_id', res['id']);
                                console.log($.cookie('kgp_id'));
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
