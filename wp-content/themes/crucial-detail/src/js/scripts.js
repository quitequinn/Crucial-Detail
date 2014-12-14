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

		$('.hbottom').each(function( index ) {
			if ($(this).height() > $(window).height()){
				$(this).addClass('tallerthanscreen');
			}
		});
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
	// //Paralaxx
	// $('.parallax')
	// 	margin-top: 2px;


////////////////////////////////////////////////
	//check tags
	function checkTags(){
		$('.tagBackground').each(function() {
			tx = $(this).find('.p');
			h2 = $(this).find('h2');
			if (tx.height() > h2.height()) {
				tx.css('position', 'relative');
				h2.css('position', 'absolute');
			}else{
				tx.css('position', 'absolute');
				h2.css('position', 'relative');
			};
			thisheight = $(this).height();
			$(this).find('.tagIMG').css('height', thisheight + 'px');
		});
	}
	if ($('.tag').length > 0) {checkTags()};


////////////////////////////////////////////////
	//ON RESIZE
	var updateLayout = _.debounce(function(e) {
		forwidth();
		if ($('.tag').length > 0) {checkTags()};
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
		before: function(slider) {
			if ($('.hide_title').length > 0) {
				$('.product_title').addClass('invisible');
			};
		},
		after: function(slider) {

			if ($('.hide_title').length > 0) {
				if ($('.slides > li:first-of-type').hasClass('flex-active-slide')) {
					$('.product_title').removeClass('invisible');
				};
			};
		},
		start: function(slider) {
      		console.log('ready');
	    	$('.slides li img').click(function(event){
		        event.preventDefault();
		        slider.flexAnimate(slider.getTarget("next"));
		        flexColor();
	    	});
			$('.flexprev').on('click', function(event){
		        event.preventDefault();
		        slider.flexAnimate(slider.getTarget("prev"));
		        flexColor();
			});
			$('.flexnext').on('click', function(event){
		        event.preventDefault();
		        slider.flexAnimate(slider.getTarget("next"));
		        flexColor();
			});
	    }
	});

////////////////////////////////////////////////
	//FLEX SLIDER COLORS
	function getImageLightness(imageSrc,callback) {
	    var img = document.createElement("img");
	    img.src = imageSrc;
	    img.style.display = "none";
	    document.body.appendChild(img);

	    var colorSum = 0;

	    img.onload = function() {
	        // create canvas
	        var canvas = document.createElement("canvas");
	        canvas.width = this.width;
	        canvas.height = this.height;

	        var ctx = canvas.getContext("2d");
	        ctx.drawImage(this,0,0);

	        var imageData = ctx.getImageData(0,0,canvas.width,canvas.height);
	        var data = imageData.data;
	        var r,g,b,avg;

	        for(var x = 0, len = data.length; x < len; x+=4) {
	            r = data[x];
	            g = data[x+1];
	            b = data[x+2];

	            avg = Math.floor((r+g+b)/3);
	            colorSum += avg;
	        }

	        var brightness = Math.floor(colorSum / (this.width*this.height));
	        callback(brightness);
	    }
	}
	function flexColor(){
		var bg = $('.flex-active-slide .fleximg').css('background-image');
        var src = bg.replace('url(','').replace(')','');

		getImageLightness(src,function(brightness){
		    if (brightness > 155){
				$('body').removeClass('midslide');
				$('body').removeClass('darkslide');
				$('body').addClass('lightslide');
		    }else if (brightness < 155 && brightness > 100){
				$('body').removeClass('lightslide');
				$('body').removeClass('darkslide');
				$('body').addClass('midslide');
		    }else{
				$('body').removeClass('lightslide');
				$('body').removeClass('midslide');
				$('body').addClass('darkslide');
		    }
		});
	}
	if ($('.flex-active-slide .fleximg').length > 0) {flexColor()};

	function flexColorRemove(){
		if ($('.flex-active-slide .fleximg').isOnScreen()){
			flexColor();
		}else{
			$('body').removeClass('lightslide');
			$('body').removeClass('midslide');
			$('body').removeClass('darkslide');
		}
	}

////////////////////////////////////////////////
	//ON scroll
	var scroll = _.throttle(function(e) {
		flexColorRemove();
	}, 500);
	window.addEventListener("scroll", scroll, false);

});


