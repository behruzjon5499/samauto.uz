$('.img_preview_gallery').click(function(){
    $('#img_preview_gallery.image').click();
});
if (window.File && window.FileList && window.FileReader) {

    $('#img_preview_gallery').on('change', function(e) {
        $('.pip').remove();
        $('#delete_gallery_files').val('');
        var files = e.target.files,
            filesLength = files.length;
        img_gallery = filesLength;
        var file_id = 0;

        $(document).on('click','.remove',function(){
            //alert('delete '+$(this).parent('.pip').data('id'));
            $('#delete_gallery_files').val( $('#delete_gallery_files').val() +';'+ $(this).parent('.pip').data('id'))
            img_gallery--;
            $(this).parent('.pip').remove();
            if(img_gallery==0) $('input#img_preview_gallery').val('');
        });

        for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
                var file = e.target;
                file_id++;
                $('<span data-id=\''+file_id+'\' class=\'pip\'>' +
                    '<img class=\'imageThumb\' src=\'' + e.target.result + '\' title=\'' + file.name + '\'/>' +
                    '<br/><span class=\'remove\'>Удалить</span>' +
                    '</span>').insertAfter('#preview_gallery');
            });
            fileReader.readAsDataURL(f);
        }
    });
}