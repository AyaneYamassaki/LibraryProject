// $(document).ready(function() {

//     $('#sidebarCollapse').on('click', function() {
//         $('#sidebar').toggleClass('active');
//     });

// });
$(document).ready(function() {
    $('#nav-menu').click(function() {
        $('ul.nav-list').addClass('open').slideToggle('200');
    });
});