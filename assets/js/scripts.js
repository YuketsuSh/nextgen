$( window ).on( 'load', function(){

	/**
	 *-------------------------- MENU -------------------------
	*/
	$( '.nav-btn' ).on( 'click', function(){
		$( '.nav-menu' ).toggleClass( 'active' );
		$( this ).toggleClass( 'active' );
		$( 'body' ).toggleClass( 'no-scroll' );

		return false;
	});

	$( window ).on( 'resize.myTemplate', function(){
		$( 'body' )[ ( $(this).width() <= 991 ) ? 'addClass' : 'removeClass' ]( 'isMobile' )
	}).trigger( 'resize.myTemplate' );

	$( '.nav-menu' ).on( 'click', '.dropdown>a, .dropdown2>a', function(){
		if(! $('body.isMobile')[0] ) return;
		var menuItem = $( this );

		menuItem.parents( 'li' ).toggleClass( 'dropdown-active' );
		menuItem.parents( 'li' ).children( 'ul' ).toggle( 'slow' );

		return false;
	});

	$( '.nav-menu' ).on( 'mouseenter', '.dropdown', function( e ){
		if( $('body.isMobile')[0] ) return;
		var menuItem = $( this );

		if( menuItem[0].timeOutMenu ){
			clearTimeout( menuItem[0].timeOutMenu );
		}

		menuItem.addClass( 'active' );
	}).on( 'mouseleave', '.dropdown', function( e ){
		if( $('body.isMobile')[0] ) return;

		var menuItem = $( this );

		menuItem[0].timeOutMenu = setTimeout( function(){
			menuItem.removeClass('active');
		}, 500 );
	});

	/**
	 *---------------------- SEARCH FORM  ---------------------
	*/
	$( '.search a' ).on( 'click', function(){
		$( '.search' ).toggleClass( 'active' );
		return false;
	});

	$( document ).on( 'mouseup', function(e){
		var divSearch = $( '.search' );
		if (!divSearch.is(e.target) && divSearch.has(e.target).length === 0) {
			divSearch.removeClass( 'active' );
		}
	});

	$( '.search form button' ).on( 'click', function(){
		$( '.search' ).removeClass( 'active' );
	});

	/**
	 *---------------------- SCROLL HEADER  ---------------------
	*/
	function searchBlockPosition() {
		if ($( window ).scrollTop() > 150) {
			$( 'header' ).addClass( 'header-scroll' );
		} else {
			$( 'header' ).removeClass( 'header-scroll' );
		}
	}
	$( window ).on( 'scroll', searchBlockPosition ).trigger( 'scroll.myTemplate' );

	/**
	 *-------------------- HOME 1 MAIN SLIDER   -------------------
	*/
	if( $( '.main-slider-for' )[0] ){
		$( '.main-slider-for' ).slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			arrows: false,
			fade: true,
			speed: 900,
			infinite: true,
			cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
			touchThreshold: 100,
			asNavFor: '.main-slider-nav'
		});
	}

	if( $( '.main-slider-nav' )[0] ){
		$( '.main-slider-nav' ).slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: false,
			asNavFor: '.main-slider-for',
			cssEase: 'ease-out',
			focusOnSelect: true,
			infinite: true,
			speed: 900,
			nextArrow: '<span class="slick-arrow-next"><i class="bi bi-caret-right" aria-hidden="true"></i></span>',
			prevArrow: '<span class="slick-arrow-prev"><i class="bi bi-caret-left" aria-hidden="true"></i></span>',
			responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
					arrows: false,
				}
			}
			]
		});
	}

	/**
	 *-------------------- HOME 1 OPPORTUNITIES SLIDER   -------------------
	*/
	if( $( '.slider-opportunities' )[0] ){
		$( '.slider-opportunities' ).slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			fade: true,
			speed: 600,
			cssEase: 'ease-in-out',
			autoplay: true,
			autoplaySpeed: 4500,
			nextArrow: '<span class="slick-arrow-next"><i class="bi bi-caret-right" aria-hidden="true"></i></span>',
			prevArrow: '<span class="slick-arrow-prev"><i class="bi bi-caret-left" aria-hidden="true"></i></span>',
		});
	}

	/**
	 *-------------------- TESTIMONIALS SLIDER  -------------------
	*/
	if( $( '.slider-testimonials' )[0] ){
		$( '.slider-testimonials' ).slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			dots: true,
			arrows: false,
			speed: 600,
			cssEase: 'ease-in-out',
			autoplay: true,
			autoplaySpeed: 4500,
			responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1
				}
			}
			]
		});
	}

	/**
	 *-------------------- SLIDER VIDEO  -------------------
	*/
	if( $( '.slider-video' )[0] ){
		$( '.slider-video' ).slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			arrows: true,
			fade: true,
			speed: 1000,
			cssEase: 'ease-in-out',
			nextArrow: '<span class="slick-arrow-next"><i class="bi bi-caret-right" aria-hidden="true"></i></span>',
			prevArrow: '<span class="slick-arrow-prev"><i class="bi bi-caret-left" aria-hidden="true"></i></span>',
			responsive: [
			{
				breakpoint: 1200,
				settings: {
					arrows: false
				}
			}
			]
		});
	}

	/**
	 *-------------------- SLIDER NEW PRODUCT -------------------
	*/
	if( $( '.slider-new-product' )[0] ){
		$( '.slider-new-product' ).slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			speed: 600,
			cssEase: 'ease-in-out',
			nextArrow: '<span class="slick-arrow-next"><i class="bi bi-caret-right" aria-hidden="true"></i></span>',
			prevArrow: '<span class="slick-arrow-prev"><i class="bi bi-caret-left" aria-hidden="true"></i></span>',
			responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 1,
				}
			}
			]
		});
	}
	/**
	 *-------------------- SLIDER SINGLE PRODUCT -------------------
	*/
	if( $( '.slider-single-for' )[0] ){
		$( '.slider-single-for' ).slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			arrows: false,
			fade: true,
			speed: 600,
			cssEase: 'ease-in-out',
			asNavFor: '.slider-single-nav'
		});
		$( '.slider-single-nav' ).slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: false,
			arrows: false,
			asNavFor: '.slider-single-for',
			cssEase: 'ease-in-out',
			focusOnSelect: true,
			infinite: true,
			speed: 600,
		});
	}

	/**
	 *----------------------- MASONRY ----------------------
	*/
	if( $( '.gallery-cover' )[0] ){
		var $grid = $( '.gallery-cover' ).masonry({
			itemSelector: '.gallery-item',
			columnWidth: '.gallery-item'
		})
	}

	/**
	 *--------------------- FANCYBOX 3 --------------------
	*/
	if( $( '[data-fancybox]' )[0] ){
		$( '[data-fancybox]' ).fancybox({
			loop: true,
			infobar: false,
			transitionEffect: 'tube',
			buttons: [
			'close'
			],
		});
	}

	/**
	 *------------------------ TABS -----------------------
	*/
	if( $( '.tab-wrap' )[0] ){
		$( '.tab-wrap' )
		.on( 'click', '.tab-nav .item', switchTab )
		.find( '.tab-nav .item:first-child' ).trigger( 'click' );

		function switchTab( event ){
			var curentTab = $( this ),
			tabWrapper = $( event.delegateTarget ),
			visibleContent = $( '.' + curentTab.attr('rel') ),
			contentHeight;

			$( '.active', tabWrapper ).removeClass( 'active' );
			curentTab.addClass( 'active' );

			$( '.visible-content', tabWrapper ).removeClass( 'visible-content' );
			visibleContent.addClass( 'visible-content' );

			contentHeight = visibleContent.height();
			$( '.tabs-content', tabWrapper ).height( contentHeight );
		}

		$( window ).on( 'resize.myTemplate' , resizeTab )

		function resizeTab( event ){
			var visibleContent = $( '.tab.visible-content' );

			visibleContent.each( function() {
				var content = $( this ),
				contentHeight = content.height(),
				tabWrapper = content.parents( '.tab-wrap' );

				$( '.tabs-content', tabWrapper ).height( contentHeight );
			} );
		}
	}

	/**
	 *----------------------- TO TOP ----------------------
	*/
	$( window )
	.on( 'scroll.myTemplate', scrollWindow)
	.trigger( 'sctoll.myTemplate' );
	function scrollWindow() {
		if ($( window ).scrollTop() > 500) {
			$('.to-top').addClass('active');
		} else {
			$('.to-top').removeClass('active');
		}
	}

	/**
	 *-------------------- SCROLL SECTION -------------------
	*/
	$( '.to-top' ).on( 'click', function( event ) {
		$( 'html, body' ).stop().animate({
			scrollTop: 0
		}, 400);
	});

	/**
	 *-------------------- CONTACT FORM --------------------
	*/
	if( $( '#contactform' )[0] ){
		$( '#contactform' ).on( 'submit', function() {
			var action = $( this ).attr( 'action' ),
			message = $( '#message' ),
			submit = $( '#submit' );

			message.slideUp( 750, function() {
				message.hide();
				submit.attr( 'disabled', 'disabled' );
				$.post(
					action,
					{
						name: $( '#name' ).val(),
						email: $( '#email' ).val(),
						phone: $( '#phone' ).val(),
						subject: $( '#subject' ).val(),
						comments: $( '#comments' ).val(),
					},
					function( event ) {
						document.getElementById( 'message' ).innerHTML = event;
						message.slideDown( 'slow' );
						submit.removeAttr( 'disabled' );

						if ( null != event.match( 'success' ) ) {
							$( '#contactform' ).slideDown( 'slow' );
						}
					}
					);
			});
			return false;
		});
	}

	/**
	 *--------------------- Google map --------------------
	*/
	if( $( '.google-map' )[0] ){
		googleMapsInit();

		function googleMapsInit() {
			var mapOptions = {
				zoom: 11,
				center: new google.maps.LatLng(40.6501038, -73.9495823),
				mapTypeControl: false,
				fullscreenControl: false,
				scalecontrol: false,
				zoomControl: false,
				streetViewControl: false,
				rotateControl: false,
				styles: [{'featureType':'all','elementType':'labels.text.fill','stylers':[{'saturation':36},{'color':'#000000'},{'lightness':40}]},{'featureType':'all','elementType':'labels.text.stroke','stylers':[{'visibility':'on'},{'color':'#000000'},{'lightness':16}]},{'featureType':'all','elementType':'labels.icon','stylers':[{'visibility':'off'}]},{'featureType':'administrative','elementType':'geometry.fill','stylers':[{'color':'#000000'},{'lightness':20}]},{'featureType':'administrative','elementType':'geometry.stroke','stylers':[{'color':'#000000'},{'lightness':17},{'weight':1.2}]},{'featureType':'landscape','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':20}]},{'featureType':'poi','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':21}]},{'featureType':'road.highway','elementType':'geometry.fill','stylers':[{'color':'#000000'},{'lightness':17}]},{'featureType':'road.highway','elementType':'geometry.stroke','stylers':[{'color':'#000000'},{'lightness':29},{'weight':0.2}]},{'featureType':'road.arterial','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':18}]},{'featureType':'road.local','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':16}]},{'featureType':'transit','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':19}]},{'featureType':'water','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':17}]}]
			},
			mapElement = document.getElementById( 'map' ),
			map = new google.maps.Map( mapElement, mapOptions ),
			marker = new google.maps.Marker( {
				position: new google.maps.LatLng( 40.6401038, -73.9495823 ),
				map: map,
				icon: 'img/icon-map.png'
			});
		}
	}

	/**
	 *---------------------- LAZY  ---------------------
	*/
	if( $( '.lazy' )[0] ){
		$('.lazy').Lazy({
			effect: "fadeIn",
			effectTime: 500,
			threshold: 500
		});
	}

	/**
	 *-------------------- SECTION ANIMATION -------------------
	*/
	$( window ).on( 'scroll.myTemplate', function(){
		var winScrollTop = $( this ).scrollTop(),
		windowHeight = $( this ).height();

		$( '.s-anim' ).each( function(){
			var $this = $( this ),

			targetPos = $this.offset().top;

			if( targetPos < winScrollTop + windowHeight - 300 ){
				if( ! $this.hasClass( 's-anim-active' ) ){
					$this.addClass( 's-anim-active' );
				}
			}
		});

	}).trigger( 'scroll.myTemplate' );

	/**
	 *------------------------ CURSOR -----------------------
	*/
	$( 'body' ).append( '<span class="cursor-secondary"></span><span class="cursor-primary"><span></span></span>' );
	$( '*' ).css( 'cursor', 'none' );

	var cursor = $( '.cursor-secondary, .cursor-primary' ),
		interactiveElement = 'a, li.dropdown, a[href="#"], button, input[type="submit"], li.item, .main-slide-nav .img-cover, .slick-arrow, input[type="checkbox"]';

	$( document )
	.on( 'mousemove.myTemplate', function( event ){
		if( $('body.isMobile')[0] ) return;
		cursor.css( 'left', event.clientX + 'px' );
		cursor.css( 'top', event.clientY + 'px' );
	} )
	.on( 'mouseenter', interactiveElement, function() {
		if( $('body.isMobile')[0] ) return;
		cursor.addClass( 'animateCursor' );
	})
	.on( 'mouseleave', interactiveElement, function() {
		if( $('body.isMobile')[0] ) return;
		cursor.removeClass( 'animateCursor' );
	}).trigger( 'mousemove.myTemplate' );

	/**
	 *------------------------ PRELOADER -----------------------
	*/
	$( 'body' ).removeClass( 'preloader-active' );
});
