jQuery(document).ready(function ($){
	    
    $('#responsive-menu-button').sidr({
      name: 'sidr-main',
      source: '#site-navigation',
      side: 'right'
    });
        
    $('html').click(function() {
        $('.example').hide(); 
    });

    $('.form-section').click(function(event){
        event.stopPropagation();
    });
    
    $("#search-btn").click(function(){
        $(".example").slideToggle();
        return false; 
    });
    
    $( '.widget_search label' ).after('<input class="search-submit" type="submit" value="Search">');
    
    /** Variables from Customizer for Slider settings */
    var slider_auto, slider_loop, slider_pager, slider_control;
    if( halcyon_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( halcyon_data.loop == '1' ){
        slider_loop = true;
    }else{
        slider_loop = false;
    }
    
    if( halcyon_data.pager == '1' ){
        slider_pager = true;
    }else{
        slider_pager = false;
    }
    
    if( halcyon_data.control == '1' ){
        slider_control = true;
    }else{
        slider_control = false;
    }

    if( halcyon_data.animation == 'slide' ){
       var slider_animation = '';
    }else {
       var slider_animation = 'fadeOut';
    }
    
    /** Home Page Slider */
    $('#lightSlider').owlCarousel({
        items               : 1,
        margin              : 0,
        animateOut          : slider_animation,
        autoplaySpeed       : halcyon_data.speed, //ms'
        autoplay            : slider_auto,
        loop                : slider_loop,
        autoplayTimeout     : halcyon_data.pause,
        nav                 : slider_control,
        dots                : slider_pager,
        mouseDrag           : false,
    });
});