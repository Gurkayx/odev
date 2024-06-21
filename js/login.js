$(document).ready(function () {
  $("#username").on("input", function () {
    $(this).val($(this).val().replace(/\s/g, ""));
  });
  $("#password").on("input", function () {
    $(this).val($(this).val().replace(/\s/g, ""));
  });

  /*
  $("#username").on("keyup", function () {
    let usernameinputvalue = $("#username").val();
    if (usernameinputvalue.length >= 5) {
      $.ajax({
        url: "./api/login.php",
        type: "POST",
        data: {
          username: usernameinputvalue,
          action: "checkusername",
        },
        dataType: "json",
        success: function (response) {
          if (response.type === "success") {
            $("#usernameerror").text(response.message);
          } else {
            $("#usernameerror").text(response.message);
          }
        },
        error: function (xhr, status, error) {
          $(".signerrorcontainer").text("Bir hata oluştu: " + error);
        },
      });
    } else {
      $("#usernameerror").text("");
    }
  });

  */

  $("#loginform").on("submit", function (e) {
    e.preventDefault();
    let usernameinputvalue = $("#username").val();
    let passwordinputvalue = $("#password").val();
    $.ajax({
      url: "./api/login.php",
      type: "POST",
      data: {
        username: usernameinputvalue,
        userpass: passwordinputvalue,
        action: "login",
      },
      dataType: "json",
      success: function (response) {
        if (response.type == "success") {
          alertify.success(response.message);
          setTimeout(() => {
            window.location.reload();
          }, 1000);
        } else {
          alertify.error(response.message);
        }
      },
      error: function (xhr, status, error) {
        // Hata durumu
        alertify.error("Bir hata oldu " + error);
      },
    });
  });
});
