var duration = 500;

$(function () {
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

	console.log($.cookie('kgp_id'));
	$.removeCookie('kgp_id');
});

