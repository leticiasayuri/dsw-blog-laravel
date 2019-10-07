var toolbarOptions = [];

var quill;

document.addEventListener('DOMContentLoaded', function() {
	setup();
});

function setup(){
	console.log(POST_CONTENT);

	quill = new Quill('#js-quill-container', {
		modules: {
			syntax: true,
			toolbar: toolbarOptions,
		},
		readOnly: true,
		theme: 'snow'
	});	

	quill.setContents(POST_CONTENT.ops);
}