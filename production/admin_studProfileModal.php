<!-- Email Modal 
<div class="modal fade" id="exampleModalEmail<?php //echo $userid;?><?php //echo $studid;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Send Email</h4>
        </div>
        <div class="modal-body">
           <form method="post" action="email/sendingemail.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="email" name="email" class="form-control col-md-7 col-xs-12" required>
                 </div>
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary" name="send">Send Email</button>
              </div>
           </form>
        </div>
     </div>
  </div>
</div>-->

<!-- Update Modal -->
<div class="modal fade" id="exampleModalEmail<?php echo $userid;?><?php echo $studid;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Send Email</h4>
        </div>
        <div class="modal-body">
           <form method="post" action="email/sendingemail.php" id="demo-form2" data-parsley-validate>
              <div class="form-group">
                 <label class="control-label" for="first-name">Student ID</label>
                 <input type="text" name="parentEmail" class="form-control" value="<?php echo $email;?>" required>
              </div>
              <div class="form-group">
                 <label class="control-label" for="first-name">Full Name</label>
                 <input type="text" name="parentEmail" class="form-control" value="<?php echo $email;?>" required>
              </div>
              <div class="form-group">
                 <label class="control-label" for="first-name">Email</label>
                 <input type="text" name="parentEmail" class="form-control" value="<?php echo $email;?>" required>
              </div>
              <div class="form-group">
                 <label class="control-label" for="first-name">Email</label>
                 <input type="text" name="parentEmail" class="form-control" value="<?php echo $email;?>" required>
              </div>
              <div class="form-group">
                 <label class="control-label" for="first-name">Descriptions</label>
                 <input type="textarea" name="description" class="form-control" value="<?php echo $desc;?>" required>
              </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary" name="update" id="update">Send Email</button>
              </div>
            </form>
        </div>
     </div>
  </div>
</div>


<!-- SMS Modal -->
<div class="modal fade" id="exampleModalsms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Send SMS</h4>
        </div>
        <div class="modal-body">
           <form method="post" action="sms/smsfunctions.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="username" class="form-control col-md-7 col-xs-12" required>
                 </div>
              </div>
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hash</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="hash" class="form-control col-md-7 col-xs-12" required>
                 </div>
              </div>
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sender</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="sender" class="form-control col-md-7 col-xs-12" required>
                 </div>
              </div>
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone No.</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="num" class="form-control col-md-7 col-xs-12" required>
                 </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Message</label>
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <textarea class="form-control" name="mess" rows="3"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary" name="abc">Send SMS</button>
              </div>
           </form>
        </div>
     </div>
  </div>
</div>