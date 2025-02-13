document.addEventListener("DOMContentLoaded", function() {
    function initializeCKEditors() {
        document.querySelectorAll('.ckeditor').forEach((element, index) => {
            // Assign unique ID dynamically
            if (!element.id) {
                element.id = `ckeditor-${index}`;
            }

            // Prevent multiple initializations
            if (!element.hasAttribute('data-ckeditor-initialized')) {
                ClassicEditor.create(element)
                    .then(editor => {
                        element.ckeditorInstance = editor;
                        element.setAttribute('data-ckeditor-initialized',
                            'true'); // Mark as initialized
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    }

    // Initialize CKEditor on page load
    initializeCKEditors();

    // Ensure CKEditor content is saved before form submission
    document.querySelector('form').addEventListener('submit', function() {
        document.querySelectorAll('.ckeditor').forEach(function(element) {
            if (element.ckeditorInstance) {
                element.value = element.ckeditorInstance.getData();
            }
        });
    });

    // Handle dynamically added repeater items
    $('.repeater').repeater({
        initEmpty: false,
        defaultValues: {
            'textarea-input': '',
            'text-input': ''
        },
        show: function() {
            $(this).slideDown();
            setTimeout(() => {
                // Reassign unique IDs to CKEditors
                document.querySelectorAll('.ckeditor').forEach((element, index) => {
                    element.id = `ckeditor-${index}`;
                });
                initializeCKEditors();
            }, 500); // Delay ensures elements are rendered
        },
        hide: function(deleteElement) {
            if (confirm('Are you sure you want to delete this item?')) {
                $(this).slideUp(deleteElement);
            }
        },
        isFirstItemUndeletable: true
    });
});