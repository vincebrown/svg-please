/*
 * This function adds google ripple effect when link is clicked
 */

 $(function() {
  $('.ripple').on('click', function (event) {
      // event.preventDefault();
      
      var $div = $('<div/>'),
      btnOffset = $(this).offset(),
      xPos = event.pageX - btnOffset.left,
      yPos = event.pageY - btnOffset.top;
      $div.addClass('ripple-effect');
      var $ripple = $(".ripple-effect");
      
      $ripple.css("height", $(this).height());
      $ripple.css("width", $(this).height());
      $div
      .css({
        top: yPos - ($ripple.height()/2),
        left: xPos - ($ripple.width()/2),
        zIndex: 0,
        background: $(this).data("ripple-color")
      }) 
      .appendTo($(this));

      window.setTimeout(function(){
        $div.remove();
      }, 1250);
    });
});


 $('.main-nav a').click(function(e){
  e.preventDefault();
  var partialLink = $(this).attr("data-link-name");
  $.ajax({
    type: "GET",
    url: "includes/partial-results-" + partialLink + ".html.php",
    dataType: "html",
    success: function(response) {
      $('.inner-wrap').html(response);
     //alert(response);
    }
  });
});
