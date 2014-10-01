/* =============================================================
    Add your scripts here.
 * ============================================================= */

 $( document ).ready(function() {

 	//ProductBar
	$( ".productBarButton" ).click(function() {
		$('body').toggleClass('openProductBar');
	});

 	//InfoBar
	$( ".infoBarButton" ).click(function() {
		$('body').toggleClass('openInfoBar');
	});

	$( ".hidder" ).click(function() {
		$('body').removeClass('openProductBar');
		$('body').removeClass('openInfoBar');
	});

	//LAYOUT ADJ
	function forwidth(){

		//masthead width
		$('#masthead').css("width", $(".container").width());
		
		var winH = '.winH{ height:'+ $(window).height() +'px;}'; 
		var productSquare = '.productBlock{height:'+ $(".productBlock").width() +'px;}'
		var productIndexSquare = '.productIndexBlock{height:'+ $(".productIndexBlock").width() +'px;}'

		//var styling = '<style> .progressBar{margin-top:-'+ $('.progressBar').height()/2 +'px;} .winH{ height:'+ $(window).height() +'px;}</style>'
		var styling = '<style>'+winH+productSquare+productIndexSquare+'</style>'
		$('.jsdump').html(styling);
	}
	forwidth();

	//PROGRESS BAR
	var progNum = 0;
	//generates them
	$( ".section" ).each(function( index ) {
		progNum = progNum + 1;
		$(this).addClass('progNum'+progNum);
		$(this).attr('data-anchor', 'progNum'+progNum);
	  	$('.progressBar ul').append( '<li><a data-target="'+('progNum'+progNum)+'" href="#">'+''+'</a></li>' );
	});
	//click nav
	$(".progressBar ul li").click(function() {
	    $('html, body').animate({
	        scrollTop: $('.'+$(this).find('a').attr('data-target')).offset().top
	    }, 1000);
	    setTimeout(function(){curSection(); },1000);
	});
	//visible section?
	$.fn.isOnScreen = function(){
	    
	    var win = $(window);
	    
	    var viewport = {
	        top : win.scrollTop(),
	        left : win.scrollLeft()
	    };
	    viewport.right = viewport.left + win.width();
	    viewport.bottom = viewport.top + win.height();
	    
	    var bounds = this.offset();
	    bounds.right = bounds.left + this.outerWidth();
	    bounds.bottom = bounds.top + this.outerHeight();
	    
	    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	};
	//add current
	function curSection() {
		$(".section").each(function() {
			that = $(this);
			if ($(this).isOnScreen()) {
	            $('.progressBar').find('[data-target="'+$(that).attr('data-anchor')+'"]').parent().addClass('current');
	        }else{
	        	$('.progressBar').find('[data-target="'+$(that).attr('data-anchor')+'"]').parent().removeClass('current');
	        }
		});
	}
	curSection();




	//ON RESIZE
	var updateLayout = _.debounce(function(e) {
		forwidth();
	}, 500);
	window.addEventListener("resize", updateLayout, false);

	//ON scroll
	var scroll = _.throttle(function(e) {
		curSection();
	}, 1000);
	window.addEventListener("scroll", scroll, false);





	//FOR NAV
	if ($('.page-id-15').length > 0) {
		$('.homebutton i').parent().attr('href','#');
		$('.homebutton i').parent().addClass('curPage');
	};

});
