function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

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
    var r_color = getRandomInt(1, 5+1);
    
    switch(r_color)
    {
      case 1: color = "#EEEEEE"; break;
      case 2: color = "#D6E685"; break;
      case 3: color = "#8CC665"; break;
      case 4: color = "#44A340"; break;
      case 5: color = "#1E6823"; break;
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
 
    
