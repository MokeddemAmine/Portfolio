$(document).ready(function(){
    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
    })

    $('.btn-delete').click(function(){
        swal.fire({
            title:'Are You Sure want to delete this',
            text:'this delete will be parmanent',
            icon:'danger',
            showDenyButton: true,
            confirmButtonText: "Delete",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
        }).then((result) => {
            if(result.isConfirmed){
                $(this).siblings('.form-delete').submit();
            }
        });
    })
    // delete picture when edit project of portfolio
    $('.picture .close').click(function(){
        $(this).parent('.picture').remove();
    })
    // active section in dashboard
    console.log()
    $('aside.app-navbar ul li').each(function(index,ele){
        if($(this).data('link') == 'dashboard' && window.location.href.endsWith('dashboard')){
            $(this).find('> a').css('color','#ff8c05');
        }else{
            if(window.location.href.includes($(this).data('link')) && $(this).data('link') != 'dashboard'){
                $(this).find('> a').css('color','#ff8c05');
            }
        }
        
    })
})