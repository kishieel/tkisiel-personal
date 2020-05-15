function animateLeft($src, $tgt){
    var $parent = $src.parent();
    var width = $parent.width();
    var srcWidth = $src.width();

    $src.css({position: 'relative'});
    $tgt.hide().css({left: width, position: 'relative'});

    $src.animate({left : -width}, 500, function(){
        $src.hide();
        $src.css({left: null, position: null});
    });
    $tgt.show().animate({left: 0}, 500, function(){
        $tgt.css({left: null, position: null});
    });
}

let projectsInterval = null;
let currentPro = $('.ps-section .projects').children().eq(0);
let nextPro = $('.ps-section .projects').children().eq(1);

function startProjectsAnimate() {
	projectsInterval = setInterval(() => {
	    if($('.ps-section .projects').children().length>1) animateLeft(currentPro, nextPro);

		currentPro = nextPro;
	    let pid = currentPro.index();
	    let mct = $('.ps-section .projects').children().length;
	    pid++;
	    if(pid >= mct) pid = 0;
			nextPro = $('.ps-section .projects').children().eq(pid);

	}, 2000);
}

function endProjectsAnimate() {
	clearInterval(projectsInterval);
	projectsInterval = null;
}

$(document).ready(() => {
	(function(){
		{
			let wh = $(window).height(),
			   	ws = $(window).scrollTop();
   			let ht1 = $(".about .holder").eq(0).offset().top,
   			    hh1 = $(".about .holder").eq(0).outerHeight(),
   			    ht2 = $(".about .holder").eq(1).offset().top,
   			    hh2 = $(".about .holder").eq(1).outerHeight();

		    if(ws > ( ht1 - wh + 100) && ws < ht2 + hh2 - 200) {
	   			$(".about .holder").removeClass("un-animation");
				$(".about .holder").addClass("animation");
	   		} else {
	   			$(".about .holder").addClass("un-animation");
	   			$(".about .holder").removeClass("animation");
	   		}
   		}
   		{
   			$(".menu").on("click", function() {
                if($(this).hasClass('op1')) {
                	$('html, body').animate({
            			scrollTop: $("#home").offset().top - 20
                 	}, 1000);
                } else if($(this).hasClass('op2')) {
                	$('html, body').animate({
            			scrollTop: $("#about").offset().top - 20
                 	}, 1000);
                } else if($(this).hasClass('op3')) {
                	$('html, body').animate({
            			scrollTop: $("#projects").offset().top - 20
                 	}, 1000);
                } else if($(this).hasClass('op4')) {
                	$('html, body').animate({
            			scrollTop: $("#skills").offset().top - 20
                 	}, 1000);
                } else if($(this).hasClass('op5')) {
                	$('html, body').animate({
            			scrollTop: $("#contact").offset().top
                 	}, 1000);
                }
            });
   		}
	})();

	let yMousePos = 0,
		lastScrolledTop = 0;

	$(window).scroll((e) => {
		let wh = $(window).height(),
		   	ws = $(window).scrollTop();

		{
			if(lastScrolledTop != $(document).scrollTop()){
	            yMousePos -= lastScrolledTop;
	            lastScrolledTop = $(document).scrollTop();
	            yMousePos += lastScrolledTop;
	        }
			let moveHelloY = yMousePos * 0.01,
				moveNameY = yMousePos * 0.02,
				moveProSkY = yMousePos * 0.02;
	  		$('.hn-span .hello').css({top: -moveHelloY});
	  		$('.hn-span .name').css({top: -moveNameY});
	  		$('.ps-span .projects').css({top: -moveProSkY});
	  		$('.ps-span .skills').css({top: -moveProSkY});
		}
   		{
   			let ht1 = $(".about .holder").eq(0).offset().top,
   			    hh1 = $(".about .holder").eq(0).outerHeight(),
   			    ht2 = $(".about .holder").eq(1).offset().top,
   			    hh2 = $(".about .holder").eq(1).outerHeight();

		    if(ws > ( ht1 - wh + 100) && ws < ht2 + hh2 - 200) {
	   			$(".about .holder").removeClass("un-animation");
				$(".about .holder").addClass("animation");
	   		} else {
	   			$(".about .holder").addClass("un-animation");
	   			$(".about .holder").removeClass("animation");
	   		}
   		}

   		$(".text-underline").each((e)=> {
   			let ht = $(".text-underline").eq(e).offset().top,
	   			hh = $(".text-underline").eq(e).outerHeight();

	   		if(ws > ( ht - wh)) {
				$(".text-underline").eq(e).addClass("animation");
	   		} else {
	   			$(".text-underline").eq(e).removeClass("animation");
	   		}
   		});

	}).mousemove((e) => {
    	yMousePos = e.pageY;
		let moveHelloX = e.pageX * 0.02,
			moveHelloY = e.pageY * 0.01,
			moveNameX = e.pageX * 0.04,
			moveNameY = e.pageY * 0.02,
			moveProSkX = e.pageX * 0.04,
			moveProSkY = e.pageY * 0.02;
  		$('.hn-span .hello').css({top: -moveHelloY, left: -moveHelloX});
  		$('.hn-span .name').css({top: -moveNameY, left: -moveNameX});
  		$('.ps-span .projects').css({top: -moveProSkY, left: -moveProSkX});
  		$('.ps-span .skills').css({top: -moveProSkY, left: -moveProSkX});
	});

	$(".text-holder").on('input', function() {
	  	$(this).outerHeight(34).innerHeight(this.scrollHeight);
	});

	{
		setTimeout(() => {
			$('<img/>').attr('src', 'img/photo1.jpg').on('load', function() {
				$(this).remove();
			   	$('.home').addClass('load');
			   	$('.home').removeClass('preload');
			});
			$('<img/>').attr('src', 'img/photo2.jpg').on('load', function() {
				$(this).remove();
			   	$('.ps-logo').addClass('load');
			   	$('.ps-logo').removeClass('preload');
			});
		}, 50);
	}

});
