$(document).ready(function() {
    $('.nav-tabs li.nav-items a.nav-link').on('click', function() {
        console.log('index ', $(this).data('index'));
    });
});
