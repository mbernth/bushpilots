// Float animations
jQuery(function( $ ){

    $.fn.toggle2classes = function(class1, class2){
        if( !class1 || !class2 )
          return this;
      
        return this.each(function(){
          var $elm = $(this);
      
          if( $elm.hasClass(class1) || $elm.hasClass(class2) )
            $elm.toggleClass(class1 +' '+ class2);
      
          else
            $elm.addClass(class1);
        });
    };

    $( '.next' ).addClass( 'animation-float-right' );

    $(".right-icon").click(function(){
        $( '.next' ).removeClass( 'animation-float-right' );
        // $( '.price_list_float' ).toggleClass('float-open');
        $( '.next' ).toggle2classes('float-open-right', 'float-close-right');
    });

    $( '.previous' ).addClass( 'animation-float-left' );


    $(".left-icon").click(function(){
        $( '.previous' ).removeClass( 'animation-float-left' );
        // $( '.price_list_float' ).toggleClass('float-open');
        $( '.previous' ).toggle2classes('float-open-left', 'float-close-left');
    });
    
});
