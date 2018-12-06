<!-- Modal -->
<div class="modal fade" id="addMerit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Add New Merit</h4>
        </div>
        <div class="modal-body">
           <form method="post" action="teacher_studList.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merit Code</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="mCode" class="form-control col-md-7 col-xs-12" required>
                 </div>
              </div>
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merit Name</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="mName" class="form-control col-md-7 col-xs-12" required>
                 </div>
              </div>
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Merit Point</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="mPoint" class="form-control col-md-7 col-xs-12" required>
                 </div>
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary" name="addMerit">Add New Merit</button>
              </div>
           </form>
        </div>
     </div>
  </div>
</div>