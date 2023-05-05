$(document).ready(function() {
    $('#search-input').on('input', function() {
        var query = $(this).val();
        if(query.length >= 1) {
            $.ajax({
                url: "{{ route('publications.search') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'search': query
                },
                success: function(response) {
                    // Update the search results on the page
                    $('#search-results').html(response);
                }
            });
        }
    });
});