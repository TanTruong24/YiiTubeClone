$(function() {
    'use strict';
    $('#videoFile').on('change', function (ev) {
        var fileName = ev.target.files && ev.target.files.length ? ev.target.files[0].name : 'No file selected';
        $('#videoFileName').text(fileName);
        var hasFile = !!(ev.target.files && ev.target.files.length);
        $('#uploadSubmitWrap').toggleClass('d-none', !hasFile);
        $('#uploadSubmitBtn').prop('disabled', !hasFile);
    });
});