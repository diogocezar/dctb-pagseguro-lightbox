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
        },
        MyPagSeguroLightBox: function(obj){
            PagSeguroLightbox(
                {
                    code: obj.code.value
                },
                {
                    success : function(transactionCode) {
                        alert("success - " + transactionCode);
                },
                    abort : function() {
                        alert("abort");
                }
            });
        }
    };
    $(document).ready(function() {
        $.App.init();
    });
})(jQuery);