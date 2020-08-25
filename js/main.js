$(window).scroll(function(){

    if(window.innerWidth > 768){
        if(this.scrollY > 100){
            $('.top-area').attr('style','display:none!important;')
        }else{
            $('.top-area').attr('style','display:block!important;')
        }
    }
    
    
})

let nav_links = $('.nav-link')

nav_links.on('click', function(){
    $('#navbarSupportedContent').removeClass('show')
})

let service_links = $('.service-link')

service_links.on('click',function(){
    $(this).children('.fa-angle-down').toggle()
    $(this).children('.fa-angle-up').toggle()
})

$('.blog-lg').on('shown.bs.collapse', function (e) {
    e.target.scrollIntoView();
});