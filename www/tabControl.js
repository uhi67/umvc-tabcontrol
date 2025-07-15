console.log('tabControl.js');
$(document).ready(function() {
    $('.tab-control .nav-tabs li.nav-item a.nav-link').on('click', function() {
        const $activeTab = $('.nav-tabs li.nav-item a.nav-link.active', $(this).closest('.tab-control'));
        $activeTab.removeClass('active');
        const activePage = $activeTab.data('target');
        if(activePage) {
            $(activePage).addClass('hidden');
        }
        const target = $(this).data('target');
        $(this).addClass('active');
        console.log(target);
        if(target) {
            $(target).removeClass('hidden');
            return false;
        }
        return true;
    });
});
