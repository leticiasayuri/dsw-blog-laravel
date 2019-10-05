var toolbarOptions = [
	['bold', 'italic', 'underline', 'strike'],        // toggled buttons
	['blockquote', 'code-block', 'image'],

	[{ 'list': 'ordered'}, { 'list': 'bullet' }],
	[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript

	[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

	[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
	[{ 'font': [] }],
	[{ 'align': [] }],

	['clean']                                         // remove formatting button
];

var historyOptions = {
	delay: 500,
	maxStack: 500,
	userOnly: false
}

var quill;

document.addEventListener('DOMContentLoaded', function() {
	setup();
});

function setup(){

	hljs.configure({   // optionally configure hljs
		languages: ['javascript', 'ruby', 'python']
	});

	var form = document.getElementById('js-post-form');

	quill = new Quill('#js-quill-container', {
		modules: {
			syntax: true,
			toolbar: toolbarOptions,
			history: historyOptions
		},
		bounds: form,
		placeholder: 'Qual a história de hoje?',
		theme: 'snow'
	});


	form.onsubmit = function() {
		var texto = document.getElementById('js-texto');
		texto.value = JSON.stringify(quill.getContents());

		if(quill.getLength() <= 1)
			document.getElementById('js-erro-nocontent').style.display = 'block';
		else
			document.getElementById('js-erro-nocontent').style.display = 'none';

		return quill.getLength() > 1;
	}
	
}