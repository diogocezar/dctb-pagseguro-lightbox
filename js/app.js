(function($) {
    "use strict";
    $.App = {
        init: function () {
            $.App.setActions();
        },
        setActions: function(){
            $('#send-request').on('click', function(){
                $.post('pagseguro.php','', function(data){
                    $('#code').val(data);
                    $('#buy').submit();
                });
            });
        }
    };
    $(document).ready(function() {
        $.App.init();
    });
})(jQuery);