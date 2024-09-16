$(document).ready(function(){
    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
    })

    $('.btn-delete').click(function(){
        let confirmation = confirm('you sure want to delete this resume');
        if(confirmation){
            $(this).siblings('.form-delete').submit();
        }
    })
})