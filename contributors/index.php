<?php require_once("../includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");
$contributors = get_contributors();
include(ROOT_PATH . 'includes/header.php');?>

<section class="resource-section contributors">
  <h2 class="section__header">Contributors</h2>
  <p class="section__summary">A big Thank You to everyone who has contributed to this site.</p>
  <ul class ="resources contributors__list">
  </ul>
</section>

<?php include(ROOT_PATH . 'includes/footer.php');?>

<script>
   // encode php array to JSON
   var arrayFromPHP = <?php echo json_encode($contributors); ?>;
   $.each(arrayFromPHP, function() {
    var username = this.gh_username;
    var requri   = 'https://api.github.com/users/'+username;
    requestJSON(requri, function(json) {
      if(json.message == "Not Found" || username === '') {
        // add non gh user outhtml

        $('.contributors__list').append("<h2>"+username+"</h2>");
      }
      else {
        // else we have a user and we display their info
        username   = json.login;
        var aviurl     = json.avatar_url;
        var profileurl = json.html_url;
        
        var outhtml = '<li class="resource--contributors">';
        outhtml = outhtml + '<a href="'+profileurl+'" class="resource__link">';
        outhtml = outhtml + '<div class="resource__main-info" style="background-image: url('+aviurl+'); background-size:cover;height:200px; width:auto;">';
        outhtml = outhtml + '</div>';
        outhtml = outhtml + '<div class="resource__meta">';
        outhtml = outhtml + '<p class="resource__meta-info">';
        outhtml = outhtml + '<span>Github Username:</span> @'+username+'';
        outhtml = outhtml + '</a>';
        outhtml = outhtml + '</li>';

        $('.contributors__list').append(outhtml);
      } // end else statement
    }); // end requestJSON Ajax call
function requestJSON(url, callback) {
  $.ajax({
    url: url,
    complete: function(xhr) {
      callback.call(null, xhr.responseJSON);
    }
  });
}
});
</script>