$('#external-events .bee-event').each(function() {
    $(this).data('event', {
        title: $.trim($(this).text()),
        stick: true
    });
    $(this).draggable({
        zIndex: 999,
        revert: true,
        revertDuration: 0
    });
});
