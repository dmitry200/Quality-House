$(function(){
	
	var r = new Raphael('map', 744.094, 1052.36);
	attributes = {
		fill: '#fff'
	};
	arr = new Array();
	var color = "";
	
	for (var country in paths)
	{
		var obj = r.path(paths[country].path);
		
		
		arr[obj.id] = country;
    
    /*
      less #EEEEEE
           #D6E685
           #8CC665
           #44A340
      more #1E6823
    */
    
    if (paths[country].count_rc >= 0 && paths[country].count_rc < 15) {
      color = "#EEEEEE";
    } else if (paths[country].count_rc >= 15 && paths[country].count_rc < 30) {
      color = "#D6E685";
    } else if (paths[country].count_rc >= 30 && paths[country].count_rc < 45) {
      color = "#8CC665";
    } else if (paths[country].count_rc >= 45 && paths[country].count_rc < 60) {
      color = "#44A340";
    } else if (paths[country].count_rc >= 60) {
      color = "#1E6823";
    }
    
		obj.attr({fill: color});
		
		obj.click(function(){
			document.location.hash = arr[this.id];
			var point = this.getBBox(0);
			
			$('#map').next('.point').remove();
			$('#map').after($('<div />').addClass('point'));
			
			$('.point')
			.html( '<a onclick="onAreaClick(this);" href="#' + paths[arr[this.id]].name + '">' + paths[arr[this.id]].name + '</a>')
			.prepend($('<a />').attr('href', '#').addClass('close').text('Закрыть'))
			.css({
				left: point.x+(point.width/2)-80,
				top: point.y+(point.height/2)-20
			})
			.fadeIn()
			
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
 
    
