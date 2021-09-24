define(['jquery'], function($){
    "use strict";
    return function alertscript(btnId)
    {
        $(btnId).click(function(){
            alert('Maximum mark: '+maxMark);
        });
    }
});
