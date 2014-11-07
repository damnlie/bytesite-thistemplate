
jQuery(function($) {
	//var img = new Image(), imgW, imgH, newW, newH, minH;
	//img.src = $('.hero').css('background-image').replace('url(', '').replace(/'/, '').replace(')', '').replace('"','').replace('"','');
	/*function doResize() {
		imgW = img.width;
		imgH = img.height;
		if(imgW > imgH) {
			newW = $('.hero').width();
			newH = imgH / imgW * newW;
		} else {
			newH = $('.hero').height();
			newW = imgW / imgH * newH;
		}
		$('.hero').css('height', (newH)+'px');
	}

	$(window).load(function(){
		doResize();
		$(window).on('resize', doResize);
	});*/

	$(document).on("scroll", function(){
		if($(document).scrollTop() > 100){
			$("header").addClass("shrink");
			//updateSliderMargin();
		}
		else
		{
			$("header").removeClass("shrink");
			//updateSliderMargin();
		}
	});

	// toggle active state to panel-heading in accordion
	$('.panel').on('show.bs.collapse', function () {
		$(this).addClass('active');
	});

	$('.panel').on('hide.bs.collapse', function () {
		$(this).removeClass('active');
	});
	
	function toggleChevron(e) {
		$(e.target)
			.prev('.panel-heading')
			.find("i.indicator")
			.toggleClass('fa-chevron-down fa-chevron-up');
	}
	$('#accordion').on('hidden.bs.collapse', toggleChevron);
	$('#accordion').on('shown.bs.collapse', toggleChevron);
	
});
