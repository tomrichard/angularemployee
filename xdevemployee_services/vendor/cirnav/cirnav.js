(function(){

	var button 	= document.getElementById('cn-button'),
    wrapper 	= document.getElementById('cn-wrapper'),
    overlay 	= document.getElementById('cn-overlay'),
	logoDark 	= document.getElementById('cn-logo-dark'),
	logoLight 	= document.getElementById('cn-logo-light');

	//open and close menu when the button is clicked
	var open = false;
	button.addEventListener('click', handler, false);
	wrapper.addEventListener('click', cnhandle, false);

	function cnhandle(e){
		e.stopPropagation();
	}

	function handler(e){
		if (!e) var e = window.event;
	 	e.stopPropagation();//so that it doesn't trigger click event on document

	  	if(!open){
	    	openNav();
	  	}
	 	else{
	    	closeNav();
	  	}
	}
	function openNav(){
		open = true;
		classie.add(button,  'bg-inverse');
	    classie.add(overlay, 'on-overlay');
	    classie.add(wrapper, 'opened-nav');
		classie.add(logoDark, 		'active');
		classie.remove(logoLight, 	'active');
	}
	function closeNav(){
		open = false;
		classie.remove(button,  'bg-inverse');
		classie.remove(overlay, 'on-overlay');
		classie.remove(wrapper, 'opened-nav');
		classie.add(logoLight, 		'active');
		classie.remove(logoDark, 	'active');
	}
	document.addEventListener('click', closeNav);

})();

