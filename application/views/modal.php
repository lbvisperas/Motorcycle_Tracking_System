
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header blue">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-info-sign"></span> Info</h4>
        </div>
        <div class="modal-body ">
			 <div class="text-center">
			  <?php echo "<h4 style='color:green'>$alert</h4>"; ?>
			 </div>
        </div>
        <div class="modal-footer">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
         <button style="width:100%" type="submit" class="btn btn-primary" data-dismiss="modal">Okay...</button>
		</div>
		 <div class="col-sm-3"></div>
        </div>
		
      </div>
    </div>
  </div>

<script>$("#myModal").modal()</script>