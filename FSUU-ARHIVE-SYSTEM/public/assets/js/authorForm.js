$(document).ready(function() {
    // Add contributor button click event
    $('#add-contributor-btn').click(function() {
        // Clone the last author form fields
        var lastAuthor = $('.form-authors:last');
        var newAuthor = lastAuthor.clone();

        // Clear input values in the cloned author form fields
        newAuthor.find('input').val('');

        // Append the cloned author form fields after the last author
        lastAuthor.after(newAuthor);
    });

    // Delete contributor button click event
    $(document).on('click', '.btn-danger', function() {
        // Get the number of author form groups
        var authorCount = $('.form-authors').length;

        // Delete the author form group only if there are more than 1 author form groups
        if (authorCount > 1) {
            $(this).closest('.form-authors').remove();
        }
    });

    // Append delete button to the first author form group with custom CSS styles
    $('.form-authors:first').find('.input-group').append('<button class="btn btn-danger delete-author-btn" type="button"><i class="bi bi-x-circle-fill" style="font-size: 20px; margin: 0;"></i></button>'); // Append to input-group div with equal spacing around the icon

    // Save form data as an array with the same publication ID
    $('#submit-form').click(function() { // Update ID of the submit button
        var publicationId = $('#publication-id').val(); // Get the publication ID from a form input field
        
        // Create an array to store author data
        var authorsArray = [];
        $('.form-authors').each(function() {
            var author = {
                first_name: $(this).find('.author_first_name').val(),
                middle_initial: $(this).find('.author_mi_middle').val(),
                last_name: $(this).find('.author_last_name').val(),
                suffix: $(this).find('.author_suffix').val()
            };
            authorsArray.push(author);
        });

        // Save the array of author data along with the publication ID to the server
        $.ajax({
            type: 'POST', // Update HTTP method if necessary
            url: '/save-authors', // Update URL to the server endpoint for saving authors
            data: { publication_id: publicationId, authors: authorsArray }, // Pass publication ID and authors array as data
            success: function(response) {
                console.log('Authors data saved successfully:', response);
                // Handle success response
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error('Failed to save authors data:', errorThrown);
                // Handle error response
            }
        });
    });
});
