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


 $(function(){

    // Used to detect initial (useless) popstate.
    // If history.state exists, pushState() has created the current entry so we can
    // assume browser isn't going to fire initial popstate
    var popped = ('state' in window.history && window.history.state !== null), initialURL = location.href;

    var ajaxLoadPage = function (url) {
        $('body').load(url);
    };

    // Handle click event of all links with href not starting with http, https or #
    $('[^href=main-nav__link]').on('click', function(e){

        e.preventDefault();
        var href = $(this).attr('href');
        ajaxLoadPage(href);
        history.pushState({page:href}, null, href);

    });

    $(window).bind('popstate', function(event){
        // Ignore inital popstate that some browsers fire on page load
        var initialPop = !popped && location.href == initialURL;
        popped = true;
        if (initialPop) return;
        // By the time popstate has fired, location.pathname has been changed
        ajaxLoadPage(location.pathname);
    });

});