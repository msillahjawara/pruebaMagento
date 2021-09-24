define(['jquery'], function($){
    "use strict";
    return function btnscript(btnId,ulId)
    {
        $(btnId).click(function(){
            $(ulId).slideToggle();
        });
    }
});
