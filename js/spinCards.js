(function($) {
    $(document).ready(function() {

        $(".spinCard").on("click", function(){
          var self = this;
          rotateCard(self);          
        });

        function rotateCard(btn){
            var $card = $(btn).closest('.card-container');
            console.log($card);
            if($card.hasClass('hover')){
                $card.removeClass('hover');
            } else {
                $card.addClass('hover');
            }
        };
      });
})(jQuery);
