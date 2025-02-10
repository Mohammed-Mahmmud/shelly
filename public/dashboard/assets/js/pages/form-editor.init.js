document.querySelectorAll('.ckeditor').forEach(function(element) {
    ClassicEditor
        .create(element)
        .catch(error => {
            console.error(error);
        });
});

// function initializeCKEditor() {
//     document.querySelectorAll('.ckeditor').forEach(function(element) {
//         if (!element.ckeditorInstance) { // Only initialize if not already initialized
//             ClassicEditor
//                 .create(element)
//                 .then(editor => {
//                     element.ckeditorInstance = editor;
//                 })
//                 .catch(error => {
//                     console.error('CKEditor failed:', error);
//                 });
//         }
//     });
// }

// // Initialize CKEditor on page load
// initializeCKEditor();

// // Detect when new fields are added
// document.addEventListener('click', function(event) {
//     if (event.target.matches('[data-repeater-create]')) {
//         setTimeout(initializeCKEditor, 500); // Delay to allow Livewire to render the new fields
//     }
// });