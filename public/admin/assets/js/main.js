$(document).ready(function(){
    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
    })

    $('.btn-delete').click(function(){
        let confirmation = confirm('you sure want to delete this');
        if(confirmation){
            $(this).siblings('.form-delete').submit();
        }
    })
    // delete picture when edit project of portfolio
    $('.picture .close').click(function(){
        $(this).parent('.picture').remove();
    })
})