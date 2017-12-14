(function()
{
	//!////
	// Shim
	
	window.requestAnimFrame = (function()
	{
		/*// 
		// Fallback shim for requestAnimFrame, allows for requestAnimFrame on cheap POS browsers
		//*/
		
		return  window.requestAnimationFrame       ||
		        window.webkitRequestAnimationFrame ||
		        window.mozRequestAnimationFrame    ||
		        function(cb){window.setTimeout(cb,1000/60)};
	})();
	
	//!///////
	// Plugins
	
	$.fn.get_pos = function()
	{
        var rect = $(this)[0].getBoundingClientRect(),
            pos = $(this).position();
        
        return {x:rect.left || rect.x || pos.left,
                y:rect.top || rect.y || pos.top,
				w:rect.width,
				h:rect.height};
	};
	
	//!///////
	// Globals
	
	var canvas = false,
		ctx = false,
		config = new Object,
		pos = false,
		waypoints = false;

	//!////
	// Init
	
	var init = function()
	{
		// New Canvas
		canvas = document.createElement('canvas');
		ctx = canvas.getContext('2d');	
		
		// Config
		config.space = 10;
		config.thickness = 1;
		config.distance = 10;
		config.color = '#343434';
		
		$('body').append(canvas);
		
		window.onresize = canvas_size;
		window.addEventListener('orientationchange',canvas_size);
		
		canvas_size();
		
		$('body').on('mousemove',mouse_move);
		
		requestAnimFrame(frame);	
	};
	
	//!//////
	// Resize
	
	var canvas_size = function()
	{
		pos = $('body').get_pos();
		
		$(canvas).css({'width':pos.w,'height':pos.h});
		
		canvas.width = pos.w*2;
		canvas.height = pos.h*2;
		
		config.cols = Math.ceil(pos.w/config.space) * 2;
		config.rows = Math.ceil(pos.h/config.distance);
		
		set_waypoints();
	};
	
	//!//////
	// Frames
	
	var frame = function()
	{		
		ctx.clearRect(0,0,pos.w*2,pos.h*2);

		ctx.lineWidth = config.thickness;
		ctx.strokeStyle = config.color;
		
		for(var i = 0; i < waypoints.length; i++)
		{
			draw_waypoints(waypoints[i]);	
		}
		
		requestAnimFrame(frame);	
	};
	
	//!//////////
	// Mouse Move
	
	var mouse_move = function(e)
	{
		var i = 0,
			n = 0,
			r = false,
			m = {'x': e.clientX * 2,
				 'y': e.clientY * 2};
				 
		config.m = m;
		
		for(i = 0; i < waypoints.length; i++)
		{
			r = waypoints[i];
			
			for(n = 1; n < r.length; n++)
			{
				check_mouse_over(r[n],m);
			}	
		}
	},
	check_mouse_over = function(p,m)
	{
		p.over = (p.x > m.x - config.space*2 && p.x < m.x + config.space*2 && p.y > m.y - config.distance/2 && p.y < m.y + config.distance/2);
	};
	
	//!/////////
	// Waypoints
	
	var set_waypoints = function()
	{
		waypoints = new Array();
	
		var i = 0,
			n = 0,
			c = false,
			p = false;
			
		while(i < config.cols)
		{
			var c = new Array();
			n = 0;
			
			while(n < config.rows)
			{
				p = new Object;
				p.x = i * config.space;
				p.y = n * config.distance;
				p.d = {'x':p.x,'y':p.y};
				
				c.push(p);
				
				n++;
			}
			
			waypoints.push(c);
			
			i++;
		}
	},
	draw_waypoints = function(rows)
	{
		var l = rows[0],
			x = 0,
			y = 0,
			d = false,
			dx = false;
					
		ctx.beginPath();		
		ctx.moveTo(l.x,l.y);
		
		for(var i = 1; i < rows.length; i++)
		{
			p = rows[i];
			
			d = p.over ? _mid(p,config.m,-0.5):_mid(p,p.d,0.3);
			l = p.over ? _mid(l,config.m,-0.1):l;
			p.over = false;
			
			p.x = d.x;
			p.y = d.y;
			
			x = (l.x + p.x) / 2;
			y = (l.y + p.y) / 2;
			
			ctx.quadraticCurveTo(l.x,l.y,x,y);
			
			l = p;
		}
		
		ctx.stroke();
	};
	
	//!/////
	// Tools
	
	function _mid(a,b,elastic)
	{
		if(elastic === undefined) elastic = 1;
		
		return {'x': a.x + (b.x - a.x) * elastic,
				'y': a.y + (b.y - a.y) * elastic};
	}
	
	init(); // Init
}());