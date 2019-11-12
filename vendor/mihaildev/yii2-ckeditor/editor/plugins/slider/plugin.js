CKEDITOR.plugins.add('slider', {
  init : function(editor) {
    var command = editor.addCommand('slider', new CKEDITOR.dialogCommand('slider'));
    command.modes = {wysiwyg:1, source:1};
    command.canUndo = true;

    editor.ui.addButton('Slider', {
      label : 'Добавить слайдер',
      command : 'slider',
      toolbar: 'others'	 
    });
	   
    CKEDITOR.dialog.add('slider', this.path + 'dialogs/slider.js');
  },
  icons: 'slider'

});
