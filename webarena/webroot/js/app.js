$(document).foundation()

$(document).ready(function(){
$('#refresh-button').click(function(){
   setTimeout(location.reload(true), 1000);
});

$(window).resize(function() {
    if( $(this).width() < 458 ) {
        $('#nav-menu').addClass('menu-size');
    }
});

});
