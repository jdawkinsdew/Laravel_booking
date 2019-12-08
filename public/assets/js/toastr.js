//initializing main application module
!function($) {
    "use strict";
    
    // notification examples

    $("#toastr-change").on('click', function (e) {
        $.NotificationApp.send("Success!", "Your data is successfully saved!", 'top-right', 'rgba(0,0,0,0.2)', 'success');
    });

    $("#toastr-change1").on('click', function (e) {
        $.NotificationApp.send("Success!", "Your data is successfully saved!", 'top-right', 'rgba(0,0,0,0.2)', 'success');
    });

    $("#toastr-delete").on('click', function (e) {
        $.NotificationApp.send("Success!", "Your data is successfully deleted!", 'top-right', 'rgba(0,0,0,0.2)', 'success');
    });

}(window.jQuery);