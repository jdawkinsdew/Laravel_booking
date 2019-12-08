"use strict";
$(document).ready(function() {

    // [ widget data ] start
    $(function() {
        $('.more-user-details').popover({
            placement: 'top',
            trigger: 'hover',
            html: true,
            content: '<div><div class="media align-items-center"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle ui-w-50 mr-3" alt="Avtar image"><div class="media-body"><h4 class="mt-0 mb-1">Jacob Doe <small class="mdi mdi-checkbox-blank-circle text-success"></small><small>Active</small></h4><p class="mb-0">Jacob_Doe@example.com</p></div></div></div><div class="alert alert-warning p-2 mb-1 mt-3 rounded"><div class="media align-items-center"><h3 class="mdi mdi-bell-ring-outline alert-heading m-0"></h3><div class="media-body pl-3"><small><b class="d-block">Unpaid invoice</b></small><small>This account will be disabled starting <b>14 March 1996</b>.</small></div></div></div><div class="no-gutters text-center row pt-3"><div class="col-6"><div><i class="feather icon-pie-chart h4 text-danger"></i></div><div class="mt-2"><b class="mb-1">$9,693</b><span class="d-block">revenue</span></div></div><div class="col-6"><div><i class="feather icon-users h4 text-primary"></i></div><div class="mt-2"><b class="mb-1">2,345</b><span class="d-block">users</span></div></div></div>'
        });
    });
    // [ widget data ] end
});
