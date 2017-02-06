$(function(){
	
	var r = new Raphael('map', 744.094, 1052.36);
	attributes = {
		fill: '#fff'
	};
	arr = new Array();
		
	
	for (var country in paths)
	{
		var obj = r.path(paths[country].path);
		
		obj.attr(attributes);
		
		arr[obj.id] = country;
		
		obj.hover(function(){
			this.animate({
				'fill': 'lightgreen'
			}, 300);
		}, function(){
			this.animate({
				fill: attributes.fill
			}, 300);
		})
		.click(function(){
			document.location.hash = arr[this.id];
			var point = this.getBBox(0);
			
			$('#map').next('.point').remove();
			$('#map').after($('<div />').addClass('point'));
			
			$('.point')
			.html(paths[arr[this.id]].name)
			.prepend($('<a />').attr('href', '#').addClass('close').text('Закрыть'))
			.css({
				left: point.x+(point.width/2)-80,
				top: point.y+(point.height/2)-20
			})
			.fadeIn();
			
		});
		
		$('.point').find('.close').live('click', function(){
			var t = $(this),
				parent = t.parent('.point');
			
			parent.fadeOut(function(){
				parent.remove();
			});
			return false;
		});
		
	}
		
			
});

