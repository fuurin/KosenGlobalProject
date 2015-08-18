var consult_duration = 500;

$(function () {
	$(".consult")
		.on("mouseover", function(){
			$(this).stop(true).animate({
				'background-color': '#90E010',
			}, consult_duration);
		})
		.on("mouseout", function(){
			$(this).stop(true).animate({
				'background-color': '#ff4500',
			}, consult_duration);
		});

	$(".go-abroad")
		.on("mouseover", function(){
			$(this).stop(true).animate({
				'width': '160px',
				'height': '50px',
				'top': '-5px',
				'font-size': '26px',
				'background-color': "#ff0000",
			}, consult_duration);
		})
		.on("mouseout", function(){
			$(this).stop(true).animate({
				'width':'150px',
				'height': '40px',
				'top': '0px',
				'font-size': '23px',
				'background-color': "#ffaa00",
			}, consult_duration);
		});

	$(".triangle")
		.on("mouseover", function () {

		});
});

