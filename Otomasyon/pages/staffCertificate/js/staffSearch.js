$(document).ready(function() {
    $('#search').on("keyup", function() {
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".liveresult");
        if (inputVal.length) {
            $.get('process/search.php', {
                term: inputVal
            }).done(function(data) {
                $('#result').html(data);
            });
        } else {
            $('#result').empty();
        }
    });
    $('#result').on('click', 'li', function() {
        var click_text = $(this).text().split('|');
        $('#search').val($.trim(click_text[0]));
        $("#result").html('');
    });

});