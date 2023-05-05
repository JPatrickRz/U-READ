$(document).ready(function() {
    // Add panel button click event
    $('#add-panel-btn').click(function() {
        // Clone the last panel form fields
        var lastPanel = $('.form-panel:last');
        var newPanel = lastPanel.clone();

        // Clear input values in the cloned panel form fields
        newPanel.find('input').val('');

        // Append the cloned panel form fields after the last panel
        lastPanel.after(newPanel);
    });

    // Delete panel button click event
    $(document).on('click', '.btn-danger-panel', function() {
        // Get the number of panel form groups
        var panelCount = $('.form-panel').length;

        // Delete the panel form group only if there are more than 1 panel form groups
        if (panelCount > 1) {
            $(this).closest('.form-panel').remove();
        }
    });

    // Append delete button to the first panel form group with custom CSS styles
    $('.form-panel:first').find('.input-group').append('<button class="btn btn-danger btn-danger-panel" type="button"><i class="bi bi-x-circle-fill" style="font-size: 20px; margin: 0;"></i></button>'); // Append to input-group div with equal spacing around the icon

    // Save form data as an array with the same publication ID
    $('#submit-form').click(function() { // Update ID of the submit button
        var publicationId = $('#publication-id').val(); // Get the publication ID from a form input field
        
        // Create an array to store panel data
        var panelsArray = [];
        $('.form-panel').each(function() {
            var panel = {
                first_name: $(this).find('.panel_first_name').val(),
                middle_initial: $(this).find('.panel_mi_middle').val(),
                last_name: $(this).find('.panel_last_name').val(),
                suffix: $(this).find('.panel_suffix').val()
            };
            panelsArray.push(panel);
        });

        // Save the array of panel data along with the publication ID to the server
        $.ajax({
            type: 'POST', // Update HTTP method if necessary
            url: '/save-panels', // Update URL to the server endpoint for saving panels
            data: { publication_id: publicationId, panels: JSON.stringify(panelsArray) }, // Pass publication ID and panels array as data
            success: function(response) {
                console.log('Panels data saved successfully:', response);
                // Handle success response
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error('Failed to save panels data:', errorThrown);
                // Handle error response
            }
        });
    });
});
