$(document).ready(function(){

	$('.show-next').click(function () {
		$(this).parent().next('.hide-n-show').slideToggle();
	});

	$('.show-search').click(function () {
		$('.hide-then-show').slideToggle('slow');
		$('a.show-search').toggle();
	});

	var clndr = {};
 
	$( function() {
	 
	  var currentMonth = moment().format('YYYY-MM');
	  var nextMonth    = moment().add('month', 1).format('YYYY-MM');
	 
	  var events = [
	    { date: currentMonth + '-' + '10', title: 'Persian Kitten Auction',  location: 'Center for Beautiful Cats'  },
	    { date: currentMonth + '-' + '19', title: 'Cat Frisbee',             location: 'Jefferson Park'             },
	    { date: currentMonth + '-' + '23', title: 'Kitten Demonstration',    location: 'Center for Beautiful Cats'  },
	    { date: nextMonth    + '-' + '07', title: 'Small Cat Photo Session', location: 'Center for Cat Photography' }
	  ];
	 
	  clndr = $('#full-clndr').clndr({
	    template: $('#full-clndr-template').html(),
	    events: events,
    	forceSixRows: true
	  });
	});

	window.onload = function() {
	stickyFooter();
	};

	//check for changes to the DOM
	function checkForDOMChange() {
		stickyFooter();
	}

	//check for resize event if not IE 9 or greater
	window.onresize = function() {
		stickyFooter();
	}

	//lets get the marginTop for the <footer>
	function getCSS(element, property) {

	  var elem = document.getElementsByTagName(element)[0];
	  var css = null;
	  
	  if (elem.currentStyle) {
	    css = elem.currentStyle[property];
	  
	  } else if (window.getComputedStyle) {
		css = document.defaultView.getComputedStyle(elem, null).
		getPropertyValue(property);
	  }
	  
	  return css;

	}

	function stickyFooter() {
		
		if (document.getElementsByTagName("footer")[0].getAttribute("style") != null) {
			document.getElementsByTagName("footer")[0].removeAttribute("style");
		}
		
		if (window.innerHeight != document.body.offsetHeight) {
			var offset = window.innerHeight - document.body.offsetHeight;
			var current = getCSS("footer", "margin-top");
			
			if (isNaN(current) == true) {
				document.getElementsByTagName("footer")[0].setAttribute("style","margin-top:0px;");
				current = 0;
			} else {
				current = parseInt(current);
			}
							
			if (current+offset > parseInt(getCSS("footer", "margin-top"))) {			
				document.getElementsByTagName("footer")[0].setAttribute("style","margin-top:"+(current+offset)+"px;");
			}
		}
	}

	/*
	! end sticky footer
	*/
		
	});
