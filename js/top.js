var duration = 500;

// 名前の文字列を、引数のセレクターに表示する関数
var get_name = function (selector, url) {
	//データ生成
	var form_data = {};

	$.ajax({
			url: url,
			type: 'POST',
			dataType: "json",
			data: form_data,
			success: function (response) {
					var res = JSON.parse(response);
					$(selector).text(res['name']);
					$.cookie('name', res['name']);
			},
			error: function (response) {
					var res = JSON.parse(response);
					alert(res);
			},
			timeout: 10000,
	});
};


$(function () {
	get_name("#user_name", 'php/top.php');

	$("#logout")
		.on("click", function () {
			$.ajax({
				url: "./php/logout.php",
				timeout: 10000,
			});
		});

	$("#consult")
		.on("mouseover", function(){
			$(this).stop(true).animate({
				'background-color': '#90E010',
			}, duration);
		})
		.on("mouseout", function(){
			$(this).stop(true).animate({
				'background-color': '#ff4500',
			}, duration);
		});

	$("#go-abroad")
		.on("mouseover", function(){
			$(this).stop(true).animate({
				'width': '160px',
				'height': '50px',
				'top': '-5px',
				'font-size': '26px',
				'background-color': "#ff0000",
			}, duration);
		})
		.on("mouseout", function(){
			$(this).stop(true).animate({
				'width':'150px',
				'height': '40px',
				'top': '0px',
				'font-size': '23px',
				'background-color': "#ffaa00",
			}, duration);
		});

	$("#search-buttons .search-button button")
		.on("mouseover", function () {
			$(this).stop(true).animate({
				'opacity': 0.8
			}, duration * 0.7);
		})
		.on("mouseout", function () {
			$(this).stop(true).animate({
				'opacity': 0
			}, duration * 0.7);
		});

	$(".triangle")
		.on("mouseover", function () {

		});
});