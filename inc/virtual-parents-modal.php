<?php 
// Sire
$sireArr_VP = getAllSire();
$sireJSON_VP = json_encode($sireArr_VP);
// Dam
$damArr_VP = getAllDam();
$damJSON_VP = json_encode($damArr_VP);

 ?>

<!-- Modal -->
<div class="modal fade " id="virtual-parents-modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Virtual parents</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="one-line-border-form"  action="<?php echo get_permalink(124) ?>" method="get">
           <!-- Sire -->
          <div class="form-group mb-4">
              <label for="sire">Sire</label>
              <input type="text" name="sire"  class="form-control" id="sire" placeholder="Search for sire" required>
          </div>
          <!-- Dam -->
          <div class="form-group mb-4">
              <label for="dam">Dam</label>
              <input type="text" name="dam" class="form-control" id="dam" placeholder="Search for dam" required>
          </div>
          <div>
            <input type="submit" name="show_virtual_parent" value="Show" class=" btn-gold text-white btn-main-sn">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function($) {
       // Sire autocomplete
      var sireListVP = <?php echo $sireJSON_VP; ?>;
      $( "#sire" ).autocomplete({
         source: sireListVP
      });

      // Dam autocomplete
      var damListVP = <?php echo $damJSON_VP; ?>;
      $( "#dam" ).autocomplete({
         source: damListVP
      });
  })
</script>