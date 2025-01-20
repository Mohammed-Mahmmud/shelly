var KTFormRepeater = (function() {
    // Initialize all repeaters dynamically
    var initRepeaters = function() {
        // Select all elements with the 'repeater-component' class
        $('.repeater-component').each(function() {
            // Initialize the repeater for each element
            $(this).find('.repeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'text-input': 'foo',
                },
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
            });
        });
    };

    return {
        // Public function to initialize repeaters
        init: function() {
            initRepeaters();
        },
    };
})();

// Initialize repeaters when the document is ready
jQuery(document).ready(function() {
    KTFormRepeater.init();
});