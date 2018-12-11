/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'styles' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection' ] },
		{ name: 'links' },
		{ name: 'insert',      groups: [ 'table' ] },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript,Strike,SpecialChar,Cut,Copy,Paste,PasteText,PasteFromWord,Styles,Anchor,Table';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3';

	config.forcePasteAsPlainText = true;

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.extraPlugins = 'autogrow,justify,pastecode,youtube';

	config.autoGrow_onStartup = true;
	config.autoGrow_minHeight = 200;
	config.autoGrow_maxHeight = 1000;
};
