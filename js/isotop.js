$( document ).ready(function() {
    var $container = $('.isotope');
    // filter buttons
    $('#filters button').click(function(){
		var $this = $(this);
        // don't proceed if already selected
        if ( !$this.hasClass('is-checked') ) {
          $this.parents('#options').find('.is-checked').removeClass('is-checked');
          $this.addClass('is-checked');
        }
      var selector = $this.attr('data-filter');
      $container.isotope({  itemSelector: '.item', filter: selector });
      return false;
    });
    
});


(function($){//НАЗНАЧАЕТ $ ПЕРЕМЕННОЙ
    $(document).ready(function(){
        if( $(window).width() < 780 ) {//УСЛОВИЕ
            $('*').removeClass('revealator-slideleft revealator-slideright revealator-slideup revealator-slidedown revealator-zoomin revealator-zoomout revealator-rotateright revealator-rotateleft');//НДАЛЯЕТ КЛАСЫ
        }
    });
})(jQuery);
