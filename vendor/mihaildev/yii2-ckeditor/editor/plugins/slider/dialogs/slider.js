var slider_select = '<select>';
CKEDITOR.dialog.add('slider', function(editor) {
  
  	   var slider = document.getElementById('slider');
	   if(slider!=undefined){
		   var cnt = slider.options.length;		   
		   for(var i=0; i<cnt; i++){
			 slider_select += '<option value="' + slider.options[i].value + '">' + slider.options[i].text + '</option>';
		   }
	   //}else{
		// нет элементов
	   }
	   slider_select += '</select>';
  
  return {
    title : 'Добавить слайдер',
    minWidth : 400,
    minHeight : 200,
	onOk: function() {
	  var select = this.getContentElement( 'cut', 'slider_id').getInputElement().getValue();
      this._.editor.insertHtml('<iktomi-cut>{slider id=' + select + '}</iktomi-cut>');
    },
    contents : [{
      id : 'cut',
      label : 'First Tab',
      title : 'First Tab',
      elements : [{
		id: 'slider_label',
		type: 'html',
		label: 'Укажите слайдер',
        html: '<strong>Укажите слайдер</strong>'
	  },{
		id: 'slider_id',
		type: 'html',
		label: 'Укажите слайдер',
        html: slider_select
	  }]
    }]
  };
});