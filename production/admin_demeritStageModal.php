<!-- Insert Modal -->
<div class="modal fade" id="stage<?php echo $userid;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Add New Demerit Stage</h4>
        </div>
        <div class="modal-body">
           <form method="post" action="admin_demeritStage.php?userid=<?php echo $userid;?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Current Point</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="cPoint" class="form-control col-md-7 col-xs-12" required>
                 </div>
              </div>
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descriptions</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="desc" class="form-control col-md-7 col-xs-12" required>
                 </div>
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary" name="add" id="add">Add New</button>
              </div>
           </form>
        </div>
     </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updatestage<?php echo $stage;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Update Demerit Stage</h4>
        </div>
        <div class="modal-body">
           <form method="post" action="admin_demeritStage.php?userid=<?php echo $userid;?>&stageid=<?php echo $stage;?>" id="demo-form2" data-parsley-validate>
              <div class="form-group">

                 <label class="control-label" for="first-name">Current Point</label>
                 <input type="text" name="currentPoint" class="form-control" value="<?php echo $cPoint;?>" required>
              </div>
              <div class="form-group">

                 <label class="control-label" for="first-name">Descriptions</label>
                    <input type="textarea" name="description" class="form-control" value="<?php echo $desc;?>" required>

              </div>
               
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary" name="update" id="update">Update</button>
              </div>
               </form>
        </div>
           
     </div>
  </div>
</div>