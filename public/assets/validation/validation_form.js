function check_form(var_modal, data, myForm = "#myForm1") {
    var data_field = JSON.parse(data)
    for (let index = 0; index < data_field.length; index++) {
        var field = data_field[index];
        if(!$(myForm+` [name="`+field+`"]`).val()){
            if($(myForm+` [name="`+field+`"]`).attr("data-alert-validation"))
                alert($(myForm+` [name="`+field+`"]`).attr("data-alert-validation")+" harus di isi")
            else
                alert($(myForm+` [name="`+field+`"]`).attr("placeholder")+" must be fill")
            return false
        }
    }
    return true
}

$("#button_validation_1").on("click",function (e) {
    e.preventDefault();
    var check = check_form("#modal_form_validation_1", $("#field_validation_1").val())
    if(check)
        $("#myForm1").submit()
})