/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.contentsCss = '/css/fonts.css';
	config.font_names = 'Gotham Pro Medium/GothamProMedium;' + config.font_names;
	config.font_names = 'Gotham Pro Regular/GothamProRegular;' + config.font_names;
	config.font_names = 'Gotham Pro Bold/GothamProBold;' + config.font_names;
	config.font_names = 'PT Serif/PT Serif;' + config.font_names;
	config.font_names = 'PT Serif Caption Regular/PTSerifCaptionRegular;' + config.font_names;
	config.font_names = 'PT Serif Caption Italic/PTSerifCaptionItalic;' + config.font_names;
	
	//config.filebrowserBrowseUrl = '/upload.php';
	config.filebrowserUploadUrl  = '/upload.php';
	// config.extraPlugins = 'addtimestamp';
	config.height           = 300;

};

/*CKEDITOR.replace('ckeditor',{'filebrowserBrowseUrl':'/ckeditor/kcfinder/browse.php?type=files',
  'filebrowserImageBrowseUrl':'/ckeditor/kcfinder/browse.php?type=images',
  'filebrowserFlashBrowseUrl':'/ckeditor/kcfinder/browse.php?type=flash',
  'filebrowserUploadUrl':'/ckeditor/kcfinder/upload.php?type=files',
  'filebrowserImageUploadUrl':'/ckeditor/kcfinder/upload.php?type=images',
  'filebrowserFlashUploadUrl':'/ckeditor/kcfinder/upload.php?type=flash'});*/
  
