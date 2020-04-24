$("#_editImage").click(function () {
    console.log("ASD");
    document.getElementById("input_image").click();
})

document.getElementById("input_image").onchange = function () {
    document.getElementById("_formImage").submit();
}
$("#_saveChangesBtn").click ( function(){
    document.getElementById("_saveChanges").submit();
})

