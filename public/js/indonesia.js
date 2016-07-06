$(document).ready(function() {

    var active_page = $('input[name="active_page"]').val();

    switch(active_page) {
        case 'quotes':
            $('#quotes').addClass('active');
            break;
        case 'advices':
            $('#advices').addClass('active');
            break;
        case 'books':
            $('#books').addClass('active')
            break;
        case 'about':
            $('#about').addClass('active')
            break;
        default:
            $('#quotes').addClass('active');
            break;
    }

});

function random() {

    var url = $('input[name="url_for_json"]').val();
    console.log(url);


    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: url,
        data: "",
        success: function(data) {
            var url = $('input[name="url_for_json"]').val();
            var quote = data['quote'];
            var quote_text = quote['advice'];
            var author = quote['book'];
            var amazon_link = quote['link'];
            var quote_id = quote['advice_id'];
            var url_to_quote = 'http://stoicadvice.com/' + quote_id;


            $('.quote-background').html(

                '<h3>' +
                '<span class="blue">'+author+'</span><br><br>'+
                quote_text +
                '</h3><br>'+

                '<div class="row vertical-align">'+
                '<input type="hidden" name="url_for_json" value="'+url+'">'+
                '<div class="col-xs-4">'+
                '<div onclick="random()" class="round-refresh"><i class="fa fa-refresh" aria-hidden="true"></i></div>'+
                '</div>'+
                '<div class="col-xs-4">'+
                '<span class="contain-span st_sharethis_custom" st_url="' + url_to_quote + '" st_summary="' + quote_text + '" id="sharethis"><div class="round-share"><i class="fa fa-share-alt" aria-hidden="true"></i></div></span>'+
                '</div>'+
                '<div class="col-xs-4">'+
                '<a href="'+amazon_link+'" class="amazon" target="_blank"><div class="round-amazon"><i class="fa fa-amazon" aria-hidden="true"></i></div></a>'+
                '</div>'+
                '</div>'

            );


            var element = document.getElementById('sharethis');
            stWidget.addEntry({
                "service":"sharethis",
                "element":element,
                "url":url_to_quote,
                "summary":quote_text
            });






        }
    });

}