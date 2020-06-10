$(document).ready(function(){
    checkAll('#checkAll');
    deleteAll('#deleteAllUser','checkbox[]');
});
function checkAll(idClick){
    $(idClick).click(function(){
        if($(this).is(":checked")){
            $('input[name="checkbox[]"]').each(function(){
                $(this).prop( "checked", true );
            })
        }else{
            $('input[name="checkbox[]"]').each(function(){
                $(this).prop( "checked", false );
            })
        }
    });
}

function deleteAll(idClick, inputName){
    $(idClick).click(function(){
        var url = $(this).attr('url-api');
        var data = [];
        $('input[name="' + inputName + '"]').each(function(){
            if($(this).is(":checked")){
                var value = $(this).val();
                if(value){
                    data.push(parseInt(value));
                }
            }
        });

        $.ajax({
            url: url,
            type: "post",
            data: { data : data },
            dataType:"html",
            success: function (response) {
                window.location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
               alert('Lỗi không thể xóa');
            }
        });
    });
}