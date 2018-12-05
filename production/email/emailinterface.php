<!--<html>
<head></head>

<body>
  <form method="post" action="sendingemail.php">

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>
    <br>

      <input type="submit" name="send" value="Send Message">
    </form>
</body>
</html>-->

<!-- Modal -->
<div class="modal fade" id="exampleModalEmail<?php echo $studid; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Add New Student</h4>
        </div>
        <div class="modal-body">
           <form method="post" action="teacher_studList.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student ID</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="studid" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                 </div>
              </div>
              <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student Name</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="studname" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                 </div>
              </div>
              <div class="form-group">
                 <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contact No.</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="contc" id="middle-name" required="required" class="form-control col-md-7 col-xs-12">
                 </div>
              </div>
              <div class="form-group">
                 <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Teacher Names</label>
                 <div class="col-md-8 col-sm-6 col-xs-12">
                    <select name="hrid" class="form-control">
                       <option>--- Teacher Names ---</option>
                       <option value="1">Nur Maisarah Bt Abdul Ghani (ASP.Net)</option>
                       <option value="2">Hazirah Bt Mohd Shabri (CakePHP)</option>
                       <option value="3">Hapsah binti Jusoh (Elixir)</option>
                       <option value="4">Mahmod bin Ali (Fortran)</option>
                       <option value="5">Azlina binti Anuar (Java)</option>
                       <option value="6">Shamsul bin Husin (Visual)</option>
                       <option value="7">Zubir bin Mohd (Json)</option>
                       <option value="8">Aminah binti Zakaria (Modula)</option>
                       <option value="9">Maimunah binti Mahadi (Perl)</option>
                       <option value="10">Syukri Yahya bin Kasim (Python)</option>
                    </select>
                 </div>
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary" name="addstudent" id="addstudent">Add New Student</button>
              </div>
           </form>
        </div>
     </div>
  </div>
</div>
