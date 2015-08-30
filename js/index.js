//phpに送信
$( function() {
        $.removeCookie('kgp_id');
        
        //入力フォーマットが正しければ通信開始
        $("#login_form input:submit").on('click', function () {
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
                                $.cookie('kgp_id', res['id']);
                                console.log($.cookie('kgp_id'));
                        },
                        error: function (response) {
                        	var res = JSON.parse(response);
                                alert(res);
                        },
                        timeout: 10000,
                });
        });
});
