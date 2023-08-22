<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web14devsn
 */

?>

  <?php include get_template_directory().'/inc/virtual-parents-modal.php' ?>

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <div class="container">
      <div class="col-md-11 col-lg-8 mx-auto">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- Search data -->
  <?php 

  $allDogsArr = getAllDogs();
  $allDogsJSON = json_encode($allDogsArr);
  ?>



<?php wp_footer(); ?>

  <!-- Search modal -->
  <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('a[href="#search-modal-icon"]').on('click', function(event) {
            event.preventDefault();
            $('#search-modal-sn').addClass('open');
            $('#search-modal-sn > form > input[type="search"]').focus();
        });
        
        $('#search-modal-sn, #search-modal-sn button.close').on('click keyup', function(event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                $(this).removeClass('open');
            }
        });
       
        // Autocomplete - all dogs
        // Target: #search-input-sn
        var allDogsList = <?php echo $allDogsJSON; ?>;
        $( "#search-input-sn" ).autocomplete({
           source: allDogsList
        });
    })
  </script>
  <!-- Search modal end -->



</body>
</html>
