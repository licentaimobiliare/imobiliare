jQuery(document).ready(function() {
//    multipleUpload();
//    changeHeaderImage();
});

function changeHeaderImage(){
    jQuery.ajax({
        url: '/ajax/imobilpictures/'+window.idi,
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
            console.log(data);
            console.log(TMSlider);
            jQuery('.slider ul.items li').remove();
            data.each(function(picture){
                jQuery('.slider ul.items').append('<li style="display:none">'+
                        '<img src="/media/images/'+window.idi+'/'+picture+'" /></li>');
                
            });
        }
    });
}

function multipleUpload() {
    //get the input and UL list
    var input = document.getElementById('filesToUpload');
    var list = document.getElementById('fileList');

//empty list for now...
    while (list.hasChildNodes()) {
        list.removeChild(ul.firstChild);
    }

//for every file...
    for (var x = 0; x < input.files.length; x++) {
        //add to list
        var li = document.createElement('li');
        li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
        list.append(li);
    }
}