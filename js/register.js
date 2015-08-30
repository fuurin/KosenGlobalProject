//phpに送信
$( function() {
        //入力フォーマットが正しければ通信開始
        $("#submit").on('click', function () {
                //データ生成
                var form_data = {
                        name: $("input[name=name]").val(),
                        password: $("input[name=password]").val(),
                        institute: $("input[name=institute]").val()
                };

                $.removeCookie('kgp_id')

                $.ajax({
                        url: 'php/register.php',
                        type: 'POST',
                        data: form_data,
                        success: function (res) {
                                $.cookie('kgp_id', JSON.parse(res)['id']);
                        },
                        error: function () {
                                alert("Connection failed");
                        },
                        timeout: 10000,
                });
        })
});
