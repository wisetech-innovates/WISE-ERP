<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body table-responsive">
                    <div class="row panel-body">
                        <!-- PART A -->
                        <div class="col-sm-6">
                            <div class="alert alert-success">
                                Admission Form - PART A
                            </div>
                            <?php echo form_open(base_url() . 'admin/new_student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type='file' name="userfile" onChange="readURL(this);" style="color:red">
                                    <img id="blah" src="<?php echo base_url();?>uploads/default_avatar.jpg" alt="your image" height="150" width="150" style="border:1px dotted red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="roll_no">Roll No*</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="roll_no" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="name">Full Name*</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="father_name">Father's Name*</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="father_name" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="father_cnic">Father's CNIC*</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="father_cnic" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="mother_name">Mother's Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="mother_name" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="birthday">Birthday*</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="birthday" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="age">Age</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="age" id="age" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="sex">Gender</label>
                                <div class="col-sm-12">
                                    <select name="sex" class="form-control select2" style="width:100%">
                                        <option value="">Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="religion">Religion</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="religion">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="phone">Phone*</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="address">Address*</label>
                                <div class="col-sm-12">
                                    <textarea rows="5" class="form-control" name="address" required></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- PART B -->
                        <div class="col-sm-6">
                            <div class="alert alert-success">
                                Admission Form - PART B
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="class_id">Class*</label>
                                <div class="col-sm-12">
                                    <select name="class_id" class="form-control select2" style="width:100%" id="class_id" data-message-required="<?php echo get_phrase('value_required');?>" onchange="return get_class_sections(this.value)">
                                        <option value="">Select</option>
                                        <?php 
                                            $classes = $this->db->get('class')->result_array();
                                            foreach($classes as $row):
                                        ?>
                                            <option value="<?php echo $row['class_id'];?>">
                                                <?php echo $row['name'];?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <a href="<?php echo base_url();?>admin/classes/">
                                        <button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="section_id">Section*</label>
                                <div class="col-sm-12">
                                    <select name="section_id" class="form-control select2" style="width:100%" id="section_selector_holder">
                                        <option value="">Select Class First</option>
                                    </select>
                                    <a href="<?php echo base_url();?>admin/section/">
                                        <button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-plus"></i></button>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-9"
                                    for="example-text"><?php echo get_phrase('admission_date');?></label>
                                <div class="col-sm-12">
                                    <input type="date" value="2011-08-19" id="example-date-input"
                                        class="form-control datepicker" name="am_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="email">Email*</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="password">Password*</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" name="password" onkeyup="CheckPasswordStrength(this.value)" required>
                                    <strong id="password_strength"></strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="annualCharges">Annual Charges</label>
                                <div class="col-sm-12">
                                    <input type="number" id="annualCharges" class="form-control" name="annualCharges" oninput="updateRemainingFee()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="actualFee">Actual Fee*</label>
                                <div class="col-sm-12">
                                    <input type="number" id="actualFee" class="form-control" name="actualFee" oninput="updateRemainingFee()" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="previousPendingCharges">Previous Pending Charges</label>
                                <div class="col-sm-12">
                                    <input type="number" id="previousPendingCharges" class="form-control" name="previousPendingCharges" oninput="updateRemainingFee()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="remainingFee">Remaining Fee</label>
                                <div class="col-sm-12">
                                    <input type="number" id="remainingFee" class="form-control" name="remainingFee" readonly required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="tran_cert">Transfer Certificate</label>
                                <div class="col-sm-12">
                                    <select name="tran_cert" class="form-control select2" style="width:100%">
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="dob_cert">Birth Certificate</label>
                                <div class="col-sm-12">
                                    <select name="dob_cert" class="form-control select2" style="width:100%">
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-9"
                                    for="example-text"><?php echo get_phrase('physical_handicap');?></label>
                                <div class="col-sm-12">
                                    <select name="physical_h" class="form-control select2" style="width:100%">
                                        <option value=""><?php echo get_phrase('select');?></option>

                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="account_opening_balance" value="0">
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm">
                                    <i class="fa fa-plus"></i>&nbsp;Add Student
                                </button>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<script type="text/javascript">
function get_class_sections(class_id) {

    $.ajax({
        url: '<?php echo base_url();?>admin/get_class_section/' + class_id,
        success: function(response) {
            jQuery('#section_selector_holder').html(response);
        }
    });

}
</script>


<script type="text/javascript">
function CheckPasswordStrength(password) {
    var password_strength = document.getElementById("password_strength");

    //TextBox left blank.
    if (password.length == 0) {
        password_strength.innerHTML = "";
        return;
    }

    //Regular Expressions.
    var regex = new Array();
    regex.push("[A-Z]"); //Uppercase Alphabet.
    regex.push("[a-z]"); //Lowercase Alphabet.
    regex.push("[0-9]"); //Digit.
    regex.push("[$@$!%*#?&]"); //Special Character.

    var passed = 0;

    //Validate for each Regular Expression.
    for (var i = 0; i < regex.length; i++) {
        if (new RegExp(regex[i]).test(password)) {
            passed++;
        }
    }

    //Display status.
    var color = "";
    var strength = "";
    switch (passed) {
        case 0:
        case 1:
        case 2:
            strength = "Weak";
            color = "red";
            break;
        case 3:
            strength = "Medium";
            color = "orange";
            break;
        case 4:
            strength = "Strong";
            color = "green";
            break;

    }
    password_strength.innerHTML = strength;
    password_strength.style.color = color;

    if (passed <= 2) {
        document.getElementById('show').disabled = true;
    } else {
        document.getElementById('show').disabled = false;
    }

}
</script>

<script type="text/javascript">
$(function() {
    $('input[name="birthday"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        },
        function(start, end, label) {
            var years = moment().diff(start, 'years');
            // alert("You are " + years + " years old.");
            $("#age").val(years);
        });
});
function updateRemainingFee() {
            var actualFee = parseFloat(document.getElementById('actualFee').value) || 0;
            var annualCharges = parseFloat(document.getElementById('annualCharges').value) || 0;
            var previousPendingCharges = parseFloat(document.getElementById('previousPendingCharges').value) || 0;
            var remainingFee = actualFee + annualCharges + previousPendingCharges;
            document.getElementById('remainingFee').value = remainingFee;
        }
</script>