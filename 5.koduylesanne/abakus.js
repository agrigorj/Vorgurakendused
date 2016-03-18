function moveAllToOpposite(){
	var x = document.getElementsByClassName("bead");
	for (var i=0;i<x.length; i++) {
		var s = getComputedStyle(x[i], null);
		if (s.cssFloat=="left"){
			x[i].style.cssFloat="right";
		}else {x[i].style.cssFloat="left";
		
		}
	}
}

