(function(boots, $, undefined)
{	
	//!////////////////
	// Global Variables
	
	var scroll, resize = false; // Booleans
	
	var scroll_actions = Array(), // On scroll events
		resize_actions = Array(), // On resize events
		frame_actions  = Array(), // On animation frame events
		event_actions  = Array(); // On event events
		
	var _scroll_frame_delay = 2,  // How many frames to skip before rendering scroll events
		_resize_frame_delay = 2;  // How many frames to skip before rendering resize events
		
	boots = this;
	
	//!//////////////
	// Device Checker
	
	this.retina = window.devicePixelRatio > 1.1;
	this.mobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|mobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
	this.mobile_ie = (/windows phone|iemobile|ie mobile/i.test(navigator.userAgent.toLowerCase()));
		
	//!/////
	// Shims
	
	window.requestAnimFrame = (function()
	{
		// Fallback shim for requestAnimationFrame, allows for requestAnimationFrame on cheap POS browsers
				
		return  window.requestAnimationFrame       ||
		        window.webkitRequestAnimationFrame ||
		        window.mozRequestAnimationFrame    ||
		        function(cb){window.setTimeout(cb,1000/60)};
	})();
	
	//!////////////
	// Event Router - Routes scroll,resize and animation events to the animation frame.
	
	var _scroll = function()
	{
		if(!scroll) 
		{
			scroll = _scroll_frame_delay;
			requestAnimFrame(_scroll_actions);
		} else {
			scroll = _scroll_frame_delay;
		}
	},
	_scroll_actions = function()
	{	
		if(scroll === 0)
		{
			for(i = 0; i < scroll_actions.length; i++) scroll_actions[i](); // Scroll events	
			scroll = false;
		} else
		if(scroll !== false)
		{
			scroll -= 1;
			requestAnimFrame(_scroll_actions);
		}
	},
	_resize = function()
	{
		if(!resize) 
		{
			resize = _resize_frame_delay;
			requestAnimFrame(_resize_actions);
		} else {
			resize = _scroll_frame_delay;
		}
	},
	_resize_actions = function()
	{
		if(resize === 0)
		{
			for(i = 0; i < resize_actions.length; i++) resize_actions[i](); // Scroll events	
			resize = false;
		} else
		if(resize !== false)
		{
			resize -= 1;
			requestAnimFrame(_resize_actions);
		}
	},
	_frame = function()
	{		
		// Ties window scroll and resize events into the requestAnimationFrame to prevent multi layering events
	
		var i;
		for(i = 0; i < frame_actions.length; i++) frame_actions[i](); // Animation Frame events
		
		for(i = 0; i < event_actions.length; i++)
		{
			event_actions[i](); // Event events
			event_actions.splice(i,1); // Removes event
			
			i--;
		}
		
		requestAnimFrame(_frame);
	};
	
	window.onscroll = _scroll;
	window.onresize = _resize;
	window.addEventListener('orientationchange',_resize);
	requestAnimFrame(_frame)
	
	//!//////////////
	// Router Plugins
	
	$.fn.bb_resize = function(action)
	{	
		resize_actions.push(action);
		action();
	};
		
	$.fn.bb_scroll = function(action)
	{	
		scroll_actions.push(action);
		action();
	};
	
	$.fn.bb_frame = function(action)
	{	
		frame_actions.push(action);
		action();
	};
	
	$.fn.bb_event = function(event,action)
	{	
		$(this).on(event,function()
		{
			if($.inArray(action,event_actions) === -1) event_actions.push(action);
		});
		
		action();
	};
	
	//!/////////////
	// Custom Events
		
    $.fn.bb_swipe = function(action)
    {
	    // Custom on swipe event, supports touch and mouse
	    
        if(typeof action !== 'function') return;
        
        var area = $(this),
            swiping = false,
            direction = false,
            start_x = 0,
            start_y = 0,
            start_t = 0,
            end_x = 0,
            end_y = 0,
            end_t = 0,
            max_distance = window.innerWidth * 0.25,
            max_duration = 250;
        
        area.on('touchstart mousedown',function(e)
        {
            if(swiping || (e.type == 'touchstart' && e.touches.length > 1)) return;
            
            start_x = (e.type == 'touchstart' ? e.touches[0].clientX:e.clientX);
            start_y = (e.type == 'touchstart' ? e.touches[0].clientY:e.clientY);
            
            var pos = area.bb_pos(),
                x = start_x - pos.x,
                y = start_y - pos.y;
            
            if(!(x > pos.w * 0.25 && x < pos.w * 0.75) || !(y > pos.h * 0.25 && y < pos.h * 0.75)) return;
            
            swiping = true;
            start_t = new Date().getTime();     
            
            e.preventDefault(); 
        }).on('touchmove mousemove',function(e)
        {
            if(!swiping) return;
            
            end_x = (e.type == 'touchmove' ? e.touches[0].clientX:e.clientX);
            end_y = (e.type == 'touchmove' ? e.touches[0].clientY:e.clientY);
            end_t = new Date().getTime();
            
            var traveled_x = Math.abs(end_x - start_x),
                traveled_y = Math.abs(end_y - start_y);
                
            if(end_t - start_t <= max_duration && (traveled_x <= max_distance || traveled_y <= max_distance))
            {
                if(traveled_x > traveled_y)
                {
                    direction = end_x - start_x < 0 ? 'left':'right';
                } else {
                    direction = end_y - start_y < 0 ? 'up':'down';
                }
                
                e.preventDefault();
            } else {
                swiping = false;
            }
        });
        
        $('body').on('touchend mouseup', function(e)
        {
            if(swiping && direction)
            {       
                e.preventDefault();
                action(direction);
            }
            
            direction = false;
            swiping = false;    
        });
    };
	
	//!///////////////
	// Utility Plugins
	
	$.fn.bb_pos = function()
	{
		// Gets the width, height x and y postion of an element
		
		$(this).height();
		
        var rect = $(this)[0].getBoundingClientRect(),
            pos = $(this).position();
        
        return {x:rect.left || rect.x || pos.left,
                y:rect.top || rect.y || pos.top,
				w:rect.width,
				h:rect.height};
	};
	
	$.fn.bb_scroll_node = function() 
	{
		// Returns the first scrollable element of a child
		
		var node = $(this)[0];
				
		if(node === false || node.nodeName == ('BODY' || 'HTML')) return window;
		if($(node).css('position') != 'static' && node.scrollHeight > node.clientHeight) return node;
				
		return $(node.parentNode).bb_scroll_node();
	}
	
	$.fn.bb_scroll_y = function() 
	{
		// Returns the scroll Y postion
		
		return window.scrollY || window.scrollTop || document.getElementsByTagName('html')[0].scrollTop;
	}	
	
	$.fn.bb_scroll_x = function() 
	{
		// Returns the scroll Y postion
		
		return window.scrollX || window.scrollLeft || document.getElementsByTagName('html')[0].scrollLeft;
	}
	
	$.fn.bb_animation_end = function(a)
	{
		// Binds an animation over event to elements
		// a - function - the action to be called via the event

		var e = $(this)[0]; // Element
		
		var animations = {'animation'      :'animationend',
						  'OAnimation'     :'oAnimationEnd',
						  'MozAnimation'   :'animationend',
						  'WebkitAnimation':'webkitAnimationEnd',
						  'animation'      :'animationend'}
		
		for(animation in animations)
		{
			 if(e.style[animation] !== undefined)
			 {
				animation = animations[animation];
				break;
			}
		}
		
		$(this).on(animation,a);
		
		return this;
	};
	
	$.fn.bb_transition_end = function(a)
	{
		// Binds an transtion over event to elements
		// a - function - the action to be called via the event

		var e = $(this)[0]; // Element
		
		var transition = '',
			transitions = {'transition'      :'transitionend',
						   'OTransition'     :'oTransitionEnd',
						   'MozTransition'   :'transitionend',
						   'WebkitTransition':'webkitTransitionEnd',
						   'transition'      :'transitionend'}
		
		for(transition in transitions)
		{
			 if(e.style[transition] !== undefined)
			 {
				transition = transitions[transition];
				break;
			}
		}
		
		$(this).on(transition,a);
		
		return this;
	};
	
	$.fn.swap_src = function(src)
	{
		// Swaps an elements src for an a new source
		// Elements used must be an IMG
		// src - string - the new images src
		
		var images = this,
			img = new Image;
		
		img.onload = function()
		{	
			$(images).each(function()
			{
				if(this.nodeName == 'IMG') this.src = src;
			});	
		}
		
		img.src = src;
	};
	
	//!/////////////////
	// Utility Functions
	
	var viewport_fix = function()
	{
		// Fixes the viewport for mobile devices.
		
		var min_width = parseInt($('body').css('min-width'),10),
			device_width = window.innerWidth,
			viewport = device_width > min_width ? device_width:min_width;
		
		// IE viewpoert fix
		if(boots.mobile_ie)
		{
			if(!boots.mobile_ie_sheet)
			{
				boots.mobile_ie_sheet = document.createElement('style');
				document.head.appendChild(boots.mobile_ie_sheet);
			}
			
			boots.mobile_ie_sheet.innerHTML = '@-ms-viewport{width:'+viewport+'px'+';}';
		}
		
		// Default viewport fix
		document.querySelector('meta[name=viewport]').setAttribute('content','width='+viewport+', initial-scale=1.0');
			
		// Zoom fix and URL hider
		document.body.style.opacity = .9;
		setTimeout(function(){document.body.style.opacity = 1;},50);
	};
	
	if(this.mobile) $().bb_resize(viewport_fix); // Adds the viewport fix to the resize router if mobile is detected
	
	//!//////////////
	// Effect Plugins
		
	$.fn.dynamic_images = function()
	{
		// Allows for images to switch between diffrent versions based on the browser resoultion
		// Elements used must be an IMG
		// Element must atleast have the basic attribue on it.
		
		var src,basic,retina,mobile;
		
		$(this).each(function()
		{
			if(this.nodeName == 'IMG')
			{
				basic = this.getAttribute('basic');
				if(!basic) return;
				
				retina  = this.getAttribute('retina');
				if(!retina) retina = basic;
				
				mobile  = this.getAttribute('mobile');
				if(!mobile) mobile = basic;
				
				src = (boots.retina ? (boots.mobile ?  basic:retina):(boots.mobile ?  mobile:basic));
				
				$(this).swap_src(src);
			}
		});
	};
	
	$.fn.equalize_height = function(options)
	{ 
		// Gets the tallest elements height and sets all the other elements heights to that height
		// options - string - Class applied to elements while calcuating their size.
		// options - number - Min hieght of the elements.
		// options - object - Merges the defaults and passed options objects.
		
		var defaults = {calc: 'calc',min: 0},
			elements = this;
		
		switch(typeof options)
		{
			case 'object':
				defaults = $.extend(defaults, options);
			break;
			case 'string':
				defaults.calc = options;
			break;
			case 'number':
				defaults.min = options;
			break;
		}
		
		$().bb_resize(function()
		{
			var h = defaults.min,
				p = 0;
				
			$(elements).addClass(defaults.calc).each(function()
			{
				this.style.height = null;
				p = $(this).bb_pos();
				
				if(p.h > h) h = p.h;
			});
			
			$(elements).removeClass(defaults.calc).css('height',h);
		});
		
		return this;	
	};
	
	$.fn.sticky_postion = function(options)
	{
		// Allows for an element to be sticky postioned cross browser.
		// options - string - Class applied to elements that are sticky postioned.
		// options - bool - Check if a placeholder should be added after target elements.
		// options - object - Merges the defaults and passed options objects.
		
		var defaults = {class:'sticky',placeholder:true,level:1};
									
		switch(typeof options)
		{
			case 'object':
				defaults = $.extend(defaults, options);
			break;
			case 'string':
				defaults.class = options;
			break;
			case 'bool':
				defaults.placeholder = options;
			break;
		}
		
		$(this).each(function()
		{
			prep_sticky(this,$.extend({},defaults));
		});
	};
	
	function prep_sticky(e,o)
	{			
		if(o.placeholder)
		{
			o.placeholder = document.createElement('div');
			$(e).after(o.placeholder);
		}
		
		o.scoller = $(e).bb_scroll_node();
		
		$().bb_resize(size_sticky.bind(e,o));
		$().bb_resize(do_sticky.bind(e,o));
		
		if(!o.scoller)
		{
			$().bb_scroll(do_sticky.bind(e,o));
		} else {
			$(o.scoller).on('scroll',do_sticky.bind(e,o));
		}
	}
	
	var size_sticky = function(o)
	{
		this.style.position = null;
		this.style.top = null;
		this.style.left = null;
		this.style.margin = null;
		
		var parent = $(this),
			pos_a = parent.bb_pos(),
			pos_b = false,
			offset = (o.scoller ? (o.scoller.scrollTop || o.scoller.scrollY || 0):0);
			
		for(var i = 0; i < o.level; i++)
		{
			parent = parent.parent();
			pos_a = parent.bb_pos();			 
		}
		
		o.pos = $(this).bb_pos();
		o.offset = pos_a.y - o.pos.y;
		
		o.start = o.pos.y + offset; // Start Postion
		o.end = pos_a.y + pos_a.h - o.pos.h + offset; // End Postion
		
		if(o.placeholder) $(o.placeholder).css({'width':o.pos.w,'height':o.pos.h});
	},	
	do_sticky = function(o)
	{
		console.log('scroll');
		
		var pos = $(this).parent().bb_pos(),
			fixed = o.offset >= pos.y,
			top = fixed ? 0:o.start;	
				
		if(o.end + pos.y < 0)
		{
			fixed = false;
			top = o.end;
		
			console.log('end');
		}
		
		$(this).css({position:fixed ? 'fixed':'absolute',top:top,left:o.pos.x,margin:0});
	};
	
	$.fn.auto_fs = function(options)
	{ 
		// Sets the font size of a text element to fill parent containers width.
		// options - string - Class applied to elements while calcuating their size.
		// options - number - Max font size of the elements.
		// options - object - Merges the defaults and passed options objects.
		
		var defaults = {calc: 'calc_fs',max: false,min: false,lines: false,adjust: 9},
			elements = this;
		
		switch(typeof options)
		{
			case 'object':
				defaults = $.extend(defaults, options);
			break;
			case 'string':
				defaults.calc = options;
			break;
			case 'number':
				defaults.max = options;
			break;
		}
		
		elements.each(function(i)
		{
			$().bb_resize(do_auto_fs.bind(this,$.extend({},defaults)));
		});
		
		return this;	
	};
	
	var do_auto_fs = function(c)
	{		
		if(!c.min) c.min = parseInt($(this).css('fontSize'));
		
		$(this).addClass(c.calc).css({'font-size':c.min});
		
		var check = true,
			s = c.min,
			l = (c.lines ? c.lines:$(this).find('br').length+1),
			lh = parseInt($(this).css('line-height')) / s,
			w = $(this).parent().bb_pos().w,
			p = false;
		
		while(check)
		{
			p = $(this).bb_pos();
			
			if((c.max && s >= c.max) || (p.h > (lh * l * s) + 1) || (p.w > w))
			{
				check = false;
			} else {
				s += c.adjust;
				$(this).css({'font-size':s});
			}
		}
		
		check = false;
		s = (s - c.adjust < c.min ? c.min:s-c.adjust);
		
		while(check)
		{
			p = $(this).bb_pos();
			
			if((c.max && s >= c.max) || (p.h > (lh * l * s) + 1) || (p.w > w))
			{
				check = false;
			} else {
				s += 1;
				$(this).css({'font-size':s});
			}
		}
		
		if(s > c.min) s -= 1;		
		$(this).removeClass(c.calc).css({'font-size':s});
	}
	
	//!////////////////
	// Effect Functions
	
	$.fn.grid_transition = function(options)
	{
		// Allows for a grid to have animated transitions.
		// options - object - Merges the defaults and passed options objects.
		// options - class - string - The name of the class to be used when transitioning.
		// options - col - string - The columns selector.
		
		var defaults = {class:'transition',col:'.col'};
									
		switch(typeof options)
		{
			case 'object':
				defaults = $.extend(defaults, options);
			break;
		}
		
		$(this).each(function()
		{
			prep_grid_transition(this,$.extend({},defaults));
		});
	};
	
	function prep_grid_transition(e,o)
	{
		o.items = $(e).find(o.col);
		o.postions = Array();
		o.destinations = Array();
				
		$().bb_resize(do_grid_transition.bind(e,o));
	}
	
	var do_grid_transition = function(o)
	{
		this.style.height = null;
		
		o.items.each(function(i)
		{
			o.postions[i] = $(this).bb_pos();
			
			this.style.height = null;
			this.style.width = null;
			this.style.top = null;
			this.style.left = null;
			this.style.position = null;
			this.style.margin = null;
		});
		
		o.items.removeClass(o.class).height();
		
		var pos = $(this).bb_pos();
		
		this.style.height = pos.h + 'px';
		
		o.items.removeClass(o.class).each(function(i)
		{
			o.destinations[i] = $(this).bb_pos();
		});
		
		o.items.each(function(i)
		{
			$(this).css({'top':o.postions[i].y - pos.y,'left':o.postions[i].x - pos.x,'height':o.postions[i].h,'width':o.postions[i].w,'position':'absolute','margin':'0px'});
		});
		
		o.items.each(function(i)
		{
			$(this).addClass(o.class).height();
			$(this).css({'top':o.destinations[i].y - pos.y,'left':o.destinations[i].x - pos.x,'height':o.destinations[i].h,'width':o.destinations[i].w});
		});
	};
		
	$.fn.scroll_transition = function(options)
	{ 
		// efx_scroll - Triggers a class when element/elements are in frame
		// pass optional variable options as string, the animation class
		// pass optional variable options as object, the config for the effect
		// object values
		// class - effect class
		// offset - offset from the scroll
		// reset - when to reset the scroll effect (before,after,both,none)
		// direction - scroll direction to trigger the effect (vertical,horizontal)
		// animation - animation class
		
		var defaults = {class: 'animate',offset:0, reset:'both', direction:'vertical', animation:''};
		
		switch(typeof options)
		{
			case 'object':
				defaults = extend(defaults, options);
			break;
			case 'string':
				defaults.animation = options;
			break;
			default:
				return false;
			break;
		}
		
		$(this).addClass(defaults.class);
		
		$().bb_scroll(prep_scroll_transition.bind(this,defaults));
		
		return this;
	}
	
	var prep_scroll_transition = function(c) // Triggers page scroll effects
	{
		var w = window.innerWidth, // Window width
			h = window.innerHeight; // Window height
		
		$(this).each(function()
		{
			var add = false, // Bool to add animation class
				remove = false, // Bool to remove animation class
				pos = $(this).bb_pos(); // The x and y postion
			
			if((c.direction == 'vertical' && pos.y <= h) || (c.direction == 'horizontal' && pos.x + pos.w >= -1 && pos.x - w <= pos.w)) add = true;
						
			switch(c.reset)
			{
				case 'before':
					if((c.direction == 'vertical' && pos.y + pos.h < -1) || (c.direction == 'horizontal' && pos.x + pos.w < -1)) remove = true;	
					break;
				case 'after':
					if((c.direction == 'vertical' && pos.y > h) || (c.direction == 'horizontal' &&  pos.x > w)) remove = true;
					break;
				case 'both':
					if((c.direction == 'vertical' && (pos.y + pos.h < -1 || pos.y > h)) || (c.direction == 'horizontal' && (pos.x + pos.w < -1 || pos.x > w))) remove = true;
					break;
			}
				
			if(add && !remove) $(this).addClass(c.animation);
			if(remove) $(this).removeClass(c.animation);
		});
	};
	
}(window.boots = window.boots || {}, jQuery));