<?php require_once("config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");
$contributors = get_contributors();
include(ROOT_PATH . 'includes/header.php');?>

<div class="inner-wrap">
  <section class="resource-section contributors">

  </section>
</div>


<?php include(ROOT_PATH . 'includes/footer.php');?>

<script>
  // encode php array to JSON
  var arrayFromPHP = <?php echo json_encode($contributors); ?>;
  $.each(arrayFromPHP, function() {

      var username = this.gh_username;
      var requri   = 'https://api.github.com/users/'+username;
      requestJSON(requri, function(json) {
        if(json.message == "Not Found" || username === '') {
          $('.contributors').append("<h2>"+username+"</h2>");
        }
        else {
        // else we have a user and we display their info
        username   = json.login;
        var aviurl     = json.avatar_url;
        var profileurl = json.html_url;
        var outhtml ='<a href="'+profileurl+'" class="resource__link">';
        outhtml = outhtml + '<li class="resource--article">';
        outhtml = outhtml + '<div class="resource__main-info" style="background-image: url('+aviurl+'); background-size:cover;height:200px; width:auto;">';
        outhtml = outhtml + '</div>';
        outhtml = outhtml + '<div class="resource__meta">';
        outhtml = outhtml + '<p class="resource__meta-info">';
        outhtml = outhtml + '<span>Github Username:</span> @'+username+'';
        outhtml = outhtml + '</li>';
        outhtml = outhtml + '</a>';

        $('.contributors').append(outhtml);
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