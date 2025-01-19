document.querySelectorAll('.ckeditor').forEach(function(element) {
    ClassicEditor
        .create(element)
        .catch(error => {
            console.error(error);
        });
});