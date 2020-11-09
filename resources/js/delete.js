$(document).read(function () {
    'use strict';
    $('.deleteAsset').click(function (e) {
        e.preventDefault();
        var assetID = $(this).data('id');
        var url = $(this).data('url');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url:url,
            data:{"id":assetID},
            type:"post",
            success:function(data){
                $('#'+assetID).css('display','none');
            },
            error:function (error){
                console.log('error');
            }
        });

    });


});