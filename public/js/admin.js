let api_key = $("#api_key").val();

let newsList = null;

let news = {
    title: "",
    img: "",
    text: "",
    date: ""
};

let formData = new FormData();
formData.append("api_key", api_key);
formData.append("email", $.cookie('user_email'));
$.ajax({
    type: "POST",
    url: 'api/verifyAdmin',
    contentType: false, processData: false, dataType: "json",
    data: formData,
    success: function (response) {
        if (!response.res) {
            document.location.href = "/";
        }
    }
});

Start();
function Start() {
    formData = new FormData();
    formData.append("api_key", api_key);
    formData.append("type", "all");

    $.ajax({
        type: "POST",
        url: 'api/getNews',
        contentType: false, processData: false, dataType: "json",
        data: formData,
        success: function (response) {
            response.forEach((value, index) => {
                $("#List-News").append("<tr class=\"row\"><th class=\"col text-center\"><img class=\"rounded quizzes-img\" src=\"" + value.img + "\"></th><td class=\"col-md-6 text-center\"><h5>" + value.title + "</h5><span class=\"badge bg-primary rounded-pill\">Дата: " + value.date + "</span></td><td class=\"col text-center\"><a class=\"link-secondary me-3\" href=\"javascript: editNews('" + value.id + "');\"><img src=\"public/images/edit.svg\"></a><a class=\"link-secondary\" href=\"javascript: deleteNews('" + value.id + "');\"><img src=\"public/images/delete.svg\"></a></td></tr>")
            })
            newsList = response;
        }
    });

    $.ajax({
        type: "POST",
        url: 'api/getAdministrators',
        contentType: false, processData: false, dataType: "json",
        data: formData,
        success: function (response) {
            response.forEach((value, index) => {
                $("#List-Administrators").append("<li class=\"nav-item text-center bg-color2 mb-1\">"+value.email+"<p><a class=\"link-secondary\" href=\"javascript: deleteAdministrators('"+value.email+"');\"><img src=\"public/images/delete.svg\"></a></p></li>")
            })
        }
    });
}

function addNews() {
    if (news.id) {
        news = {
            title: "",
            img: "",
            text: "",
            date: ""
        };
    }
    viewNewsForm("add");
}

function newsSave() {
    news.title = $("#news-title").val();
    news.img = $("#news-img").val();
    news.text = $("#news-text").val();
    news.date = $("#news-date").val();
}

function viewNewsForm(type) {
    confirmButtonText = "Добавити";
    title = "Добавити публікацію";
    if (type == "edit") {
        confirmButtonText = "Зберегти";
        title = "Редагувати публікацію";
    }

    Swal.fire({
        title: title,
        html:
            '<p><label for="news-title">Заголовок:</label></p>' +
            '<input id="news-title" class="swal2-input" placeholder="Заголовок публікації" value="' + news.title + '">' +
            '<p><label for="news-img">Зображення:</label></p>' +
            '<input id="news-img" class="swal2-input" placeholder="Зо браження прикріплене до публікації" value="' + news.img + '">' +
            '<p><label for="news-text">Текст:</label></p>' +
            '<textarea id="news-text" class="swal2-textarea" cols="25" placeholder="Весь текст публікації">' + news.text + '</textarea>' +
            '<p><label for="news-date">Дата:</label></p>' +
            '<input id="news-date" class="swal2-input" placeholder="Дата публікації" value="' + news.date + '">',
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: confirmButtonText,
        cancelButtonText: 'Скасувати',
        preConfirm: () => {
            newsSave();
            if (!news.title || !news.text || !news.date || !news.img) {
                Swal.fire({
                    icon: 'error',
                    title: 'Помилка!',
                    text: 'Не всі поля були заповнені. Будьласка заповніт їх!',
                })
                return false;
            }
            formData = new FormData();
            formData.append("api_key", api_key);
            formData.append("news", JSON.stringify(news));

            if(type == "edit"){
                $.ajax({
                    type: "POST",
                    url: 'api/editNews',
                    contentType: false, processData: false, dataType: "json",
                    data: formData,
                    success: function (response) {
                        if (response.res) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Публікацію відредаговано!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    location.reload();
                                }
                            })
                        }
                    }
                });
            }else{
                $.ajax({
                    type: "POST",
                    url: 'api/addNews',
                    contentType: false, processData: false, dataType: "json",
                    data: formData,
                    success: function (response) {
                        if (response.res) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Публікацію добавлено!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    location.reload();
                                }
                            })
                        }
                    }
                });
            }
        }
    })
}

function editNews(id) {
    newsList.forEach((v, i) => {
        if (v.id == id) {
            news = v;
            viewNewsForm("edit");
        }
    })
}

function deleteNews(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ms-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Видалення публікації',
        text: "Ви дійсно хочете видалити дану публікацію?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Так!',
        cancelButtonText: 'Ні!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            formData = new FormData();
            formData.append("api_key", api_key);
            formData.append("id", id);
            $.ajax({
                type: "POST",
                url: 'api/deleteNews',
                contentType: false, processData: false, dataType: "json",
                data: formData,
                success: function (response) {
                    if (response.res) {
                        swalWithBootstrapButtons.fire(
                            'Публікацію видалено',
                            'Успішно видалено публікацію!',
                            'success'
                        ).then((result) => {
                            location.reload();
                        })
                    } else {
                        swalWithBootstrapButtons.fire(
                            'Сталася помилка',
                            'Новину не було видалено!',
                            'error'
                        )
                    }
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Відміна',
                'Новину не було видалено, ви її зберегли ;)',
                'error'
            )
        }
    })
}

function addAdministrators() {
    Swal.fire({
        title: 'Добавити адміністратора',
        html: '<input id="swal-administrators" class="swal2-input" placeholder="Email">',
        focusConfirm: false,
        preConfirm: () => {
            var email = $("#swal-administrators").val();
            if (!email) {
                return false;
            }
            formData = new FormData();
            formData.append("api_key", api_key);
            formData.append("email", email);
            $.ajax({
                type: "POST",
                url: 'api/addAdministrators',
                contentType: false, processData: false, dataType: "json",
                data: formData,
                success: function (response) {
                    if (response.res) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Адміністратора будо добавлено!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Адміністратора не було добавлено! Можливо такий уже присутній.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            });
        }
    })
}

function deleteAdministrators(email) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Видалення адміністратора',
        text: "Ви дійсно хочете видалити даного адміністратора?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Так!',
        cancelButtonText: 'Ні!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            formData = new FormData();
            formData.append("api_key", api_key);
            formData.append("email", email);
            $.ajax({
                type: "POST",
                url: 'api/deleteAdministrators',
                contentType: false, processData: false, dataType: "json",
                data: formData,
                success: function (response) {
                    if (response.res) {
                        swalWithBootstrapButtons.fire(
                            'Адміністратора видалено',
                            'Успішно видалено адміністратора!',
                            'success'
                        ).then((result) => {
                            location.reload();
                        })
                    } else {
                        swalWithBootstrapButtons.fire(
                            'Сталася помилка',
                            'Адміністратора не було видалено!',
                            'error'
                        )
                    }
                }
            });
        }
    })
}