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

/*
 * This handles all ajax requests for navigation
 * Uses HTML history api
 */
 $(function(){

    // Used to detect initial (useless) popstate.
    // If history.state exists, pushState() has created the current entry so we can
    // assume browser isn't going to fire initial popstate
    var popped = ('state' in window.history && window.history.state !== null), initialURL = location.href;

    var ajaxLoadPage = function (url) {
      $('body').load(url);
    };

    // Handle click event of all links in header
    $('header a').on('click', function(e){

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


$('.delete').click(function(){
  // get resource id to use for deleting
  var del_id = $(this).attr('data-resource-id');
  // get parent 
  var parent = $(this).parent().parent();
  var transitionEnd = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend';

  $.post('/includes/delete-resource.php', {id:del_id},function(data){
      parent.addClass('remove-resource').one(transitionEnd, function(){
      parent.remove();
    }); // end addClass
  }); // end post
}); // end function


$('.favorite').click(function(){
  // get resource id to use for deleting
  var update_id = $(this).attr('data-resource-id');
  // get parent 
  var parent = $(this).parent().parent();
  var recommendedParent = $(this).parent().siblings('.resource__link');
  var recommended = recommendedParent.find('.resource__recommended');
  var recommendHtml = '<div class="resource__recommended">RECOMMENDED</div>';
  $.post('/includes/recommend-resource.php', {id:update_id},function(data){
      if (recommended.length ) {
       recommended.remove();
      } else {
       recommendedParent.append(recommendHtml);
      }
  }); // end post
}); // end function



$('#search-icon').on('click',function(){
  
  $('.search-bar-cont').css({
    'position': 'absolute',
    'left': 0,
    'opacity': 1,
    'width': '100%',
    'height': 150,
    'z-index': 1000
  });  
  $('.search-bar').css({
    'display': 'inline',
    'width': '90%',
    'opacity': 1,
    'z-index': 1000
  });

  $('.search-bar').focus();

  $('.search-bar-cont').addClass('resource--article');
});
