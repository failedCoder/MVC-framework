/*
	Js global helper functions
*/


function alertBox(type, message) {

    var html = '';
    html += '<div class="text-center alert alert-' + type + ' fade show" role="alert">';
    html += message;
    html += '</div>';
    
    return html;

}

function log(message) {

	console.log(message);

}