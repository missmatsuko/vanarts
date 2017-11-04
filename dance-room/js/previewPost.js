var dateInput = document.getElementsByName('date')[0];
var timeInput = document.getElementsByName('time')[0]
var titleInput = document.getElementsByName('title')[0];
var textInput = document.getElementsByName('text')[0];

function previewReload() {
    document.getElementById('preview').innerHTML =
            dateInput.value + "<br>" +
            timeInput.value + "<br><br>" +
            titleInput.value + "<br><br>" +
            textInput.value
    ;
           
}

dateInput.addEventListener("change", function () {
    previewReload();
});
timeInput.addEventListener("change", function () {
    previewReload();
});
titleInput.addEventListener("keyup", function () {
    previewReload();
});

ckeditor.on("change",function(){
    textInput.value = ckeditor.getData();
    previewReload();
})

previewReload();