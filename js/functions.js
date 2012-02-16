// usage: log('inside coolFunc',this,arguments);
// http://paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
	
	log.history = log.history || [];   // store logs to an array for reference
	log.history.push(arguments);
	
	if(this.console){
		console.log( Array.prototype.slice.call(arguments) );
	}
};

// checks for Number
// http://stackoverflow.com/questions/1303646/check-variable-whether-is-number-or-string-in-javascript

function isNumber (o) {
	return ! isNaN (o-0);
}


// Allows to execute arbitrary script during a single chain
// http://paulirish.com/2008/jquery-doonce-plugin-for-chaining-addicts/
jQuery.fn.doOnce = function(func){ 
    this.length && func.apply(this); 
    return this; 
}