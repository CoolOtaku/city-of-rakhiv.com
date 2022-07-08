let api_key = $("#api_key").val();

var id = $.cookie("news_id");

if (id) {

    let formData = new FormData();
    formData.append("api_key", api_key);
    formData.append("id", id);
    formData.append("type", "byId");

    $.ajax({
        type: "POST",
        url: 'api/getNews',
        contentType: false, processData: false, dataType: "json",
        data: formData,
        success: function (response) {
            $("#news-img").attr('src', response.img);
            $("#news-title").text(response.title);
            $("#news-text").html(response.text);
            $("#news-date").text("📅 "+response.date);
        }
    });
} else {
    $("#news-title").text("Вибачте виникла помилка 😅");
}
