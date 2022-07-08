let api_key = $("#api_key").val();

Start();

function Start() {
    document.addEventListener('DOMContentLoaded', function () {
        const slider = new ChiefSlider('.slider', {
            loop: false
        });
    });
}

function goToNews(id) {
    $.cookie('news_id', id);
    window.location.href = window.location.origin + "/news";
}

function login() {
    if ($.cookie('user_id')) {
        Swal.fire({
            title: $.cookie('user_full_name'),
            imageUrl: $.cookie('user_image'),
            imageWidth: 150,
            imageHeight: 150,
            imageAlt: 'Custom image',
            html:
                '<a href="#" onclick="signOut();" style="color: #337ab7;">Вийти з профілю</a><br><br>' +
                '<div id="AdminPanelButton"></div>',
        })
        formData = new FormData();
        formData.append("api_key", api_key);
        formData.append("email", $.cookie('user_email'));
        $.ajax({
            type: "POST",
            url: 'api/verifyAdmin',
            contentType: false, processData: false, dataType: "json",
            data: formData,
            success: function (response) {
                console.log(response);
                if (response.res) {
                    $("#AdminPanelButton").append(response.button)
                }
            },
            error: function (jqXhr, textStatus, errorMessage) {
                console.log(errorMessage);
            }
        });
    } else {
        window.location.href = window.location.origin + "/login";
    }
}

function signOut() {
    Swal.fire({
        title: 'Вихід з профілю',
        text: "Ви дійсно хочете вийти з профілю?",
        icon: 'question',
        showCancelButton: true,
        cancelButtonText: 'Ні',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Так'
    }).then((result) => {
        if (result.isConfirmed) {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                $.cookie('user_id', "");
                $.cookie('user_full_name', "");
                $.cookie('user_image', "");
                $.cookie('user_email', "");
                document.location.href = "/";
            });
        }
    })
}