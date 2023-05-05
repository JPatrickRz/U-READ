$(document).ready(function() {
    // Add adviser button click event
    $('#add-adviser-btn').click(function() {
        // Clone the last adviser form fields
        var lastAdviser = $('.form-adviser:last');
        var newAdviser = lastAdviser.clone();

        // Clear input values in the cloned adviser form fields
        newAdviser.find('input').val('');

        // Append the cloned adviser form fields after the last adviser
        lastAdviser.after(newAdviser);
    });

    // Delete adviser button click event
    $(document).on('click', '.btn-danger-adviser', function() {
        // Get the number of adviser form groups
        var adviserCount = $('.form-adviser').length;

        // Delete the adviser form group only if there are more than 1 adviser form groups
        if (adviserCount > 1) {
            $(this).closest('.form-adviser').remove();
        }
    });

    // Append delete button to the first adviser form group with custom CSS styles
    $('.form-adviser:first').find('.input-group').append('<button class="btn btn-danger btn-danger-adviser" type="button"><i class="bi bi-x-circle-fill" style="font-size: 20px; margin: 0;"></i></button>'); // Append to input-group div with equal spacing around the icon

    // Save form data as an array with the same publication ID
    $('#submit-form').click(function() { // Update ID of the submit button
        var publicationId = $('#publication-id').val(); // Get the publication ID from a form input field
        
        // Create an array to store adviser data
        var advisersArray = [];
        $('.form-adviser').each(function() {
            var adviser = {
                first_name: $(this).find('.adviser_first_name').val(),
                middle_initial: $(this).find('.adviser_mi_middle').val(),
                last_name: $(this).find('.adviser_last_name').val(),
                suffix: $(this).find('.adviser_suffix').val()
            };
            advisersArray.push(adviser);
        });

        // Save the array of adviser data along with the publication ID to the server
        $.ajax({
            type: 'POST', // Update HTTP method if necessary
            url: '/save-advisers', // Update URL to the server endpoint for saving advisers
            data: { publication_id: publicationId, advisers: JSON.stringify(advisersArray) }, // Pass publication ID and advisers array as data
            success: function(response) {
                console.log('Advisers data saved successfully:', response);
                // Handle success response
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error('Failed to save advisers data:', errorThrown);
                // Handle error response
            }
        });
    });
});
