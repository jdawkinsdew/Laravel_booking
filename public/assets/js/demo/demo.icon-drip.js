"use strict";
// [ icon list ] start
(function() {

    var iconarray = [
        'dripicons-alarm', 'dripicons-align-center', 'dripicons-align-justify', 'dripicons-align-left', 'dripicons-align-right', 'dripicons-anchor', 'dripicons-archive', 'dripicons-arrow-down', 'dripicons-arrow-left', 'dripicons-arrow-right',
        'dripicons-arrow-thin-down', 'dripicons-arrow-thin-left', 'dripicons-arrow-thin-right', 'dripicons-arrow-thin-up', 'dripicons-arrow-up', 'dripicons-article', 'dripicons-backspace', 'dripicons-basket', 'dripicons-basketball',
        'dripicons-battery-empty', 'dripicons-battery-full', 'dripicons-battery-low', 'dripicons-battery-medium', 'dripicons-bell', 'dripicons-blog', 'dripicons-bluetooth', 'dripicons-bold', 'dripicons-bookmark', 'dripicons-bookmarks',
        'dripicons-box', 'dripicons-briefcase', 'dripicons-brightness-low', 'dripicons-brightness-max', 'dripicons-brightness-medium', 'dripicons-broadcast', 'dripicons-browser', 'dripicons-browser-upload', 'dripicons-brush',
        'dripicons-calendar',
        'dripicons-camcorder', 'dripicons-camera', 'dripicons-card', 'dripicons-cart', 'dripicons-checklist', 'dripicons-checkmark', 'dripicons-chevron-down', 'dripicons-chevron-left', 'dripicons-chevron-right', 'dripicons-chevron-up',
        'dripicons-clipboard', 'dripicons-clock', 'dripicons-clockwise', 'dripicons-cloud', 'dripicons-cloud-download', 'dripicons-cloud-upload', 'dripicons-code', 'dripicons-contract', 'dripicons-contract-2', 'dripicons-conversation',
        'dripicons-copy', 'dripicons-crop', 'dripicons-cross', 'dripicons-crosshair', 'dripicons-cutlery', 'dripicons-device-desktop', 'dripicons-device-mobile', 'dripicons-device-tablet', 'dripicons-direction', 'dripicons-disc',
        'dripicons-document', 'dripicons-document-delete', 'dripicons-document-edit', 'dripicons-document-new', 'dripicons-document-remove', 'dripicons-dot', 'dripicons-dots-2', 'dripicons-dots-3', 'dripicons-download', 'dripicons-duplicate',
        'dripicons-enter', 'dripicons-exit', 'dripicons-expand', 'dripicons-expand-2', 'dripicons-experiment', 'dripicons-export', 'dripicons-feed', 'dripicons-flag', 'dripicons-flashlight', 'dripicons-folder', 'dripicons-folder-open',
        'dripicons-forward', 'dripicons-gaming', 'dripicons-gear', 'dripicons-graduation', 'dripicons-graph-bar', 'dripicons-graph-line', 'dripicons-graph-pie', 'dripicons-headset', 'dripicons-heart',
        'dripicons-help', 'dripicons-home', 'dripicons-hourglass', 'dripicons-inbox', 'dripicons-information', 'dripicons-italic', 'dripicons-jewel', 'dripicons-lifting', 'dripicons-lightbulb', 'dripicons-link', 'dripicons-link-broken',
        'dripicons-list', 'dripicons-loading', 'dripicons-location', 'dripicons-lock', 'dripicons-lock-open', 'dripicons-mail', 'dripicons-map', 'dripicons-media-loop', 'dripicons-media-next',
        'dripicons-media-pause', 'dripicons-media-play', 'dripicons-media-previous', 'dripicons-media-record', 'dripicons-media-shuffle', 'dripicons-media-stop', 'dripicons-medical', 'dripicons-menu', 'dripicons-message', 'dripicons-meter',
        'dripicons-microphone', 'dripicons-minus', 'dripicons-monitor', 'dripicons-move', 'dripicons-music', 'dripicons-network-1', 'dripicons-network-2', 'dripicons-network-3', 'dripicons-network-4', 'dripicons-network-5',
        'dripicons-pamphlet', 'dripicons-paperclip', 'dripicons-pencil', 'dripicons-phone', 'dripicons-photo', 'dripicons-photo-group', 'dripicons-pill', 'dripicons-pin', 'dripicons-plus', 'dripicons-power', 'dripicons-preview',
        'dripicons-print', 'dripicons-pulse', 'dripicons-question', 'dripicons-reply', 'dripicons-reply-all', 'dripicons-return', 'dripicons-retweet', 'dripicons-rocket', 'dripicons-scale',
        'dripicons-search', 'dripicons-shopping-bag', 'dripicons-skip', 'dripicons-stack', 'dripicons-star', 'dripicons-stopwatch', 'dripicons-store', 'dripicons-suitcase', 'dripicons-swap', 'dripicons-tag', 'dripicons-tag-delete',
        'dripicons-tags', 'dripicons-thumbs-down', 'dripicons-thumbs-up', 'dripicons-ticket', 'dripicons-time-reverse', 'dripicons-to-do', 'dripicons-toggles', 'dripicons-trash', 'dripicons-trophy',
        'dripicons-upload', 'dripicons-user', 'dripicons-user-group', 'dripicons-user-id', 'dripicons-vibrate', 'dripicons-view-apps', 'dripicons-view-list', 'dripicons-view-list-large', 'dripicons-view-thumb', 'dripicons-volume-full',
        'dripicons-volume-low', 'dripicons-volume-medium', 'dripicons-volume-off', 'dripicons-wallet', 'dripicons-warning', 'dripicons-web', 'dripicons-weight', 'dripicons-wifi', 'dripicons-wrong', 'dripicons-zoom-in', 'dripicons-zoom-out'
    ];

    for (var i = 0, l = iconarray.length; i < l; i++) {
        $('#icon-wrapper').append(
            '<div class="icon-detl" data-filter="' + iconarray[i] + '">' +
            '<i class="' + iconarray[i] + '"></i> <small>' + iconarray[i] + '</small>' +
            '</div>');
    }
    $(window).on('load', function() {
        $("#find-icon").on("keyup", function() {
            var g = $(this).val().toLowerCase();
            $(".i-main >div").each(function() {
                var t = $(this).attr('data-filter');
                if (t) {
                    var s = t.toLowerCase();
                }
                if (s) {
                    var n = s.indexOf(g);
                    if (n !== -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                }
            });
        });
    });
})();
// [ icon list ] end
