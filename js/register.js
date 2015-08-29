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

                $.ajax({
                        url: 'php/register.php',
                        dataType: 'text',
                        type: 'POST',
                        data: form_data,
                        success: function (kgp_id) {
                        		console.log(kgp_id);
                        		alert(kgp_id);
                                $.cookie('kgp_id', kgp_id);
                        },
                        error: function () {
                                console.log("failed");
                        },
                        timeout: 10000,
                })
        })
});
