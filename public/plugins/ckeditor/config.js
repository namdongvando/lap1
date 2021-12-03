/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */ 
CKEDITOR.editorConfig = function (config) {
    // Remove some buttons, provided by the standard plugins, which we don't
    // need to have in the Standard(s) toolbar.
//    config.removeButtons = 'Underline,Subscript,Superscript'; 
    // Se the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre'; 
    // Make dialogs simpler.
//    config.removeDialogTabs = 'image:advanced;link:advanced'; 
//    config.removeDialogTabs = 'image:advanced;link:advanced';
    config.filebrowserBrowseUrl = '/public/ckfinder/ckfinder.html?type=Images';
    config.filebrowserImageBrowseUrl = '/public/ckfinder/ckfinder.html?type=Images';
    config.filebrowserUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload';
    config.filebrowserImageUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload';
};
