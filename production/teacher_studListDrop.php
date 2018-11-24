<!--<?php 
/*include('test.php'); */
?>-->

<!-- ModalMerit -->
<div class="modal fade" id="exampleModalMerit<?php echo $studid;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Merit Page</h4>
        </div>
<!--        <div class="modal-body" style="height:340px; max-height:340px; width:830px; max-width:830px;">-->
        <div class="modal-body">
           <form method="post" action="teacher_studList.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control"  value="<?php echo $studid;?>" readonly="readonly">
                 </div>
              </div>
              <div class="form-group">
                 <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="groups" name="groups" class="form-control">
                        <option>Select Category</option>
<!--                        <?php
/*                            include 'test.php';
                            $result = loadCategory();
                            foreach ($result as $groups){
                                echo "<option id='".$groups['categoryCode']."' value='".$groups['categoryCode']."'>".$groups['categoryType']."</option>";
                            }*/
                        ?>-->
                    </select>
                 </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Merit</label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                     <select id="groups" name="groups" class="form-control">
                       <option data-group='SHOW' value="">--- Select Merit ---</option>

                     </select>
                 </div>
              </div>
              <div class="form-group">
                 <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class='input-group date' id='myDatepicker'>
                       <input type='text' class="form-control" />
                       <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                       </span>
                    </div>
                 </div>
              </div>
              <div class="form-group">
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Save</button>
              </div>
           </form>
        </div>
     </div>
  </div>
</div>
<!--EndModalMerit -->

