
$(function(){

var txt1 = "<div id='div1'><hr>";
var txt2 = "<h4 class='text-center'><b>Driver's Info:</b></h4><hr>";
var txt3 = "<div class='form-group'>";
var txt4 = "<label class='control-label col-sm-3' for='dname'>First Name:</label>";
var txt5 = "<div class='col-sm-9'>";
var txt6 = "<input type='text' class='form-control' id='dname' placeholder='Enter first name' name='dname' data-validation='required custom' data-validation-regexp='^([A-Za-z ]+)$' >";
var txt7 = "</div>";
var txt8 = "</div>";
var txt9 = "<div class='form-group'>";
var txt10 = "<label class='control-label col-sm-3' for='dmname'>Middle Name:</label>";
var txt11 = "<div class='col-sm-9'>";
var txt12 = "<input type='text' class='form-control' id='dmname' placeholder='Enter middle name' name='dmname' data-validation='required custom' data-validation-regexp='^([A-Za-z ]+)$' >";
var txt13 = "</div>";
var txt14 = "</div>";
var txt15 = "<div class='form-group'>";
var txt16 = "<label class='control-label col-sm-3' for='dlname'>Last Name:</label>";
var txt17 = "<div class='col-sm-9'>";
var txt18 = "<input type='text' class='form-control' id='dlname' placeholder='Enter last name' name='dlname' data-validation='required custom' data-validation-regexp='^([A-Za-z ]+)$'>";
var txt19 = "</div>";
var txt20 = "</div>";
var txt21 = "<div class='form-group'>";
var txt22 = "<label class='control-label col-sm-3' for='daddress'>Address:</label>";
var txt23 = "<div class='col-sm-9'>";
var txt24 = "<input type='text' class='form-control' id='daddress' placeholder='Enter address' name='daddress' data-validation='required'>";
var txt25 = "</div>";
var txt26 = "</div>";
var txt27 = "<div class='form-group'>";
var txt28 = "<label class='control-label col-sm-3' for='dcn'>Contact No:</label>";
var txt29 = "<div class='col-sm-9'>";
var txt30 = "<input type='text' class='form-control' id='dcn' maxlength='11' name='dcn' placeholder='Enter mobile number e.g. 09067114953' data-validation='required number length' data-validation-length='11'>";
var txt31 = "</div>";
var txt32 = "</div>";
var txt33 = "<div class='form-group'>";
var txt34 = "<label class='control-label col-sm-3' for='ci'>ID Picture: </label>";
var txt35 = "<div class='col-sm-9'>";
var txt36 = "<input name='driverpic' id='driverpic' data-validation='required mime size' data-validation-allowing='jpg, png' data-validation-max-size='2M' type='file'>";
var txt37 = "</div>";
var txt38 = "</div>";
var txt39 = "</div>";
var txt40 = "<script src='http://localhost/project/bootstrap/js/jquery.form-validator.min.js'></script>";
var txt41 = "<script src='http://localhost/project/bootstrap/js/jquery.form-validator-file.min.js'></script>";
var txt42 = "<script>$.validate();</script>";

var div = txt1.concat(txt2, txt3, txt4, 
txt5, txt6, txt7, txt8, txt9, txt10, txt11, txt12,
txt13, txt14, txt15, txt16, txt17, txt18, txt19, txt20,
txt21, txt22, txt23, txt24, txt25, txt26,
txt27, txt28, txt29, txt30, txt31, txt32, 
txt33, txt34,txt35,txt36,txt37,txt38,txt39,txt40,txt41,txt42);

$("#operator").click(function(){

	$("#div1").remove(); 
    $("#above").before(div);
	$("#type1").hide();
	$("#type").show();
});

$("#driver").click(function(){

	$("#div1").remove(); 
	$("#type1").show();
	$("#type").hide();
});


    $("#ckbCheckAll").click(function () {
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
    });
    
    $(".checkBoxClass").change(function(){
        if (!$(this).prop("checked")){
            $("#ckbCheckAll").prop("checked",false);
        }
    });

});
