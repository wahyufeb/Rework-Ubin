
$('#menu-side').on("click", function(){
    $('#side-menu-show').css('display', 'block');
    $('#side-menu-show').addClass("animated slideInLeft fast");
    $('.container').css('filter', 'blur(1px)');
    $('#testimonials').css('filter', 'blur(1px)');
})
$('#btn-close').on("click", function(){
    $('#side-menu-show').hide();
    $('.container').css('filter', 'blur(0)');
    $('#testimonials').css('filter', 'blur(0)');  
});
$('li#catagory').on("click", function(){
    $("#drop")
    .toggleClass("fa-caret-up")
    .toggleClass("fa-caret-down");
})

$('#catagory').on("click", function(){
    $('#catagory ul').slideToggle('swing');
});