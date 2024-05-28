/*  ---------------------------------------------------
    Template Name: Ogani
    Description:  Ogani eCommerce  HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';


$(document).ready(function(){
    $("#live_search").keyup(function(event){
        event.preventDefault();
        var input = $(this).val();
        //alert(input);
        if(input != ""){
            $.ajax({
                url:"app/view/v_searchAjax.php",
                method:"POST",
                data:{input:input},
                success:function(data){
                    $("#searchresult").html(data);
                    $("#searchresult").css("display", "flex");
                }
            });
        }else{
            $("#searchresult").css("display", "none")
        }
    });
});



(function ($) {

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

})(jQuery);