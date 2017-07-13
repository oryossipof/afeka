function checkEveryThing()
{
	var x = true;
	var elements = document.getElementById("signForm").elements;
	for (var i = 0, element; element = elements[i++];) {
	    if ((element.type === "password" || element.type === "text") && element.value === ""){
	        element.style.borderColor = "red";
	        x = false;
	    }
	    
	    else
	    	{
	    	  element.style.borderColor = "inherit";
	    	}
	    
	}
	return x;

}



