/* =============================================================
    Add your scripts here.
 * ============================================================= */

 $( document ).ready(function() {

////////////////////////////////////////////////
 	//ProductBar
	$( ".productBarButton" ).click(function() {
		$('body').removeClass('openInfoBar');
		$('body').toggleClass('openProductBar');
	});

////////////////////////////////////////////////
 	//InfoBar
	$( ".infoBarButton" ).click(function() {
		$('body').removeClass('openProductBar');
		$('body').toggleClass('openInfoBar');
	});

	$( ".hidder" ).click(function() {
		$('body').removeClass('openProductBar');
		$('body').removeClass('openInfoBar');
	});

////////////////////////////////////////////////
	//LAYOUT ADJ
	function forwidth(){

		var masthead = '#masthead{ width:'+ $(".emailSubscription .grid-full").width()+'px;}';
		var winH = '.winH{ height:'+ $(window).height() +'px;}'; 
		var winHalf = '.winHalf{ top:'+ ($(window).height()/2) +'px;}'; 
		var hBottom = '.hbottom{ margin-top:'+ ($(window).height() - $('.hbottomTarget').height() - 80) +'px;}'; 
		var productSquare = '.productBlock{height:'+ $(".productBlock").width() +'px;}'
		var productIndexSquare = '.productIndexBlock{height:'+ $(".productIndexBlock").width() +'px;}'
		// var stickey = '.stuck{left:'+ $('.sticky').offset().left +'px;}'

		//var styling = '<style> .progressBar{margin-top:-'+ $('.progressBar').height()/2 +'px;} .winH{ height:'+ $(window).height() +'px;}</style>'
		var styling = '<style>'+masthead+winH+winHalf+hBottom+productSquare+productIndexSquare+'</style>'
		$('.jsdump').html(styling);
	}
	forwidth();

////////////////////////////////////////////////
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
	        scrollTop: $('.'+$(this).find('a').attr('data-target')).offset().top - 50
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

////////////////////////////////////////////////
	//STICKEY
	// var distance;
	// function stickey(){
	// 	distance = ($('.sticky').offset().top - $(window).scrollTop());
	// 	if ( distance <= -14){
	// 		$('.sticky').addClass('stuck');
	// 	}
	// 	if ( distance > -14){
	// 		$('.stuck').removeClass('stuck');
	// 	}
	// }
	// stickey();

////////////////////////////////////////////////
	//FOR NAV
	if ($('.page-id-15').length > 0) {
		$('.homebutton i').parent().attr('href','#');
		$('.homebutton i').parent().addClass('curPage');
	};


////////////////////////////////////////////////
	//IF MOBILE	

	function isMobile() {
	    if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/iPhone|iPad|iPod/i) || navigator.userAgent.match(/IEMobile/i)){
	    	return true; } else { return false; }
	}
    if(isMobile()){
		$('.color').on( "vmousedown", function() { changecolor(); });		
		$('.color').on( "vmouseout", function() { clearTimeout(printstyle); });
	}
	function iphone() {
	    if(navigator.userAgent.match(/iPhone|iPad|iPod/i)){
	    	return true; } else { return false; }
	}


////////////////////////////////////////////////
	//PHP urlencode() FOR JAVASCRIPT
function urlencode(str) {
	str = (str + '')
	.toString();
	
	str = encodeURIComponent(str);

	return str;
}


////////////////////////////////////////////////
	//get vendor prefix
	var prefix = (function () {
	  	var styles = window.getComputedStyle(document.documentElement, ''),
	    	pre = (Array.prototype.slice
	      		.call(styles)
	      		.join('') 
	      		.match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o'])
	    	)[1],
	    	dom = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
	  	return {
	    	dom: dom,
	    	lowercase: pre,
	    	css: '-' + pre + '-',
	    	js: pre[0].toUpperCase() + pre.substr(1)
	  	};
	})();
	$('body').addClass(prefix.lowercase);
	if (navigator.userAgent.indexOf('Safari') != -1){
	    if (navigator.userAgent.indexOf('Chrome') == -1){
	      	$('body').addClass('safari');
	    } else {
	      	$('body').addClass('chrome');
	      	$('.scene').addClass('noshadow');
	    }
	}


////////////////////////////////////////////////
	//Iphone Changes
  	function changeLinks(){
  		if (iphone()) {
  			$(".productShare a.tshare").attr('href', "twitter://post?message=" + encodeURIComponent(document.URL));
		}
	}
	changeLinks();


////////////////////////////////////////////////
	//Fit Vids
    $(".respVideo").fitVids();







////////////////////////////////////////////////
	//ON RESIZE
	var updateLayout = _.debounce(function(e) {
		forwidth();
	}, 500);
	window.addEventListener("resize", updateLayout, false);

////////////////////////////////////////////////
	//ON scroll
	var scroll = _.throttle(function(e) {
		curSection();
	}, 500);
	window.addEventListener("scroll", scroll, false);

});

$(window).load(function() {

////////////////////////////////////////////////
	//FLEX SLIDER
	$('.flexslider').flexslider({
		prevText: "",
		nextText: "",
		slideshow: false,     
		directionNav: false,
    	contolNav: false,
		start: function(slider) {
	    	$('.slides li img').click(function(event){
		        event.preventDefault();
		        slider.flexAnimate(slider.getTarget("next"));
	    	});
			$('.flexprev').on('click', function(event){
		        event.preventDefault();
		        slider.flexAnimate(slider.getTarget("prev"));
			});
			$('.flexnext').on('click', function(event){
		        event.preventDefault();
		        slider.flexAnimate(slider.getTarget("next"));
			});
	    }
	});

});


