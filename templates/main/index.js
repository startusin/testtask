$(document).ready(function () {
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#cam-photo');
    
    $('.take').click(function () {
        $(this).html('Please wait...');
        Webcam.snap( function(img) {
            $.ajax({
                type: 'POST',
                url: '?route=upload',
                data: { img },
                success: function(data, textStatus, request){
                    if (!request.getResponseHeader('Image-URL')) {
                        alert('Error!');
                        return;
                    }
                    $('.result').html(request.getResponseHeader('Image-URL'));
                    $('.take').html('Take and upload photo');
                }
            });
        });
    });
});