$(document).ready(function() {

    /**
     * клик по кнопке Просмотреть
     */
    $('#preview').click(function(){
        $('.modal').css('display', 'block');

        insertToModal();
    });

    function insertToModal(){
        var name = $('#name').val();
        var email = $('#email').val();
        var description = $('#description').val();


        $('.modal-tr td:nth-child(1)').html(name);
        $('.modal-tr td:nth-child(2)').html(email);
        $('.modal-tr td:nth-child(3)').html(description);
    }

    $('.close').click(function(){
        $('.modal').css('display', 'none');
    });


});
