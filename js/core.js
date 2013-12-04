function formToJSON($form){
    var inputs = $(form).find(":input");
    var jsonForm = JSON.stringify($(inputs).serializeArray());
    return jsonForm;
}

function jsonToObject(){
    return JSON.parse(jsonForm);
}