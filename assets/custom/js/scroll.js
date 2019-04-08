$('.scroll').on("click", function(e){
    e.preventDefault();
    let href = $(this).attr('href');
    let target = $(href);

    if(href == "#big-discounts"){
        $('html, body').animate({
            scrollTop: target.offset().top - 100
        }, 500, 'easeInExpo');
    }else{
        $('html, body').animate({
            scrollTop: target.offset().top - 100
        }, 800, 'easeInExpo');
    }
})
