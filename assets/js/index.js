$(window).on("load", () => {
    $(".load").hide();
    $(".all").show();
    getLocation();
})

$('#insertForm').submit(function (e) {
    $.ajax({
        url: 'insert.php',
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (xhr) {
            if (xhr === "onay") {
                $("#alert").css("display", "block").html("Kaydınız Yapılmıştır").fadeOut(2000);
                $("#insertForm").trigger("reset");
            } else {
                $("#alert").css("display", "block").html(xhr).fadeOut(2000);
                console.log(xhr);
            }
        }
    });
    e.preventDefault();
});


$('#logForm').submit(function (e) {
    $.ajax({
        url: 'update.php',
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (xhr) {
            if (xhr === "onay") {
                $("#alert").css("display", "block").html("Var olarak listeye eklendiniz").fadeOut(2000);
                $("#logForm").trigger("reset");
            } else {
                $("#alert").css("display", "block").html(xhr).fadeOut(2000);
                console.log(xhr);
            }
        }
    });
    e.preventDefault();
});


