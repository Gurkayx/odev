$(document).ready(function () {
  $("#usermail").on("input", function () {
    $(this).val($(this).val().replace(/\s/g, ""));
  });
  $("#password").on("input", function () {
    $(this).val($(this).val().replace(/\s/g, ""));
  });

  $("#cookiealert").on("click", function () {
    $(this).addClass("hidden");
  });
});

function isValidURL(url) {
  const pattern = new RegExp(
    "^(https?:\\/\\/)" + // protocol
      "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|" + // domain name
      "((\\d{1,3}\\.){3}\\d{1,3}))" + // OR ip (v4) address
      "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // port and path
      "(\\?[;&a-z\\d%_.~+=-]*)?" + // query string
      "(\\#[-a-z\\d_]*)?$",
    "i"
  ); // fragment locator
  return !!pattern.test(url);
}

$("#signform").on("submit", function (e) {
  e.preventDefault();
  let usermail = $("#usermail").val();
  let userpass = $("#password").val();
  let userpassagain = $("#passwordagain").val();

  let data = {
    usermail: usermail,
    userpass: userpass,
    userpassagain: userpassagain,
    action: "signin",
  };

  if (usermail == "" || userpass == "" || userpassagain == "") {
    $("#signerrordiv").text("Lütfen tüm alanları doldurunuz");
  } else {
    if (userpass.length < 8) {
      $("#signerrordiv").text("Şifreniz 8 karakterden kısa olamaz");
    } else if (userpass !== userpassagain) {
      $("#signerrordiv").text("Şifreler aynı olmak zorunda tekrar deneyiniz");
    } else {
      $("#signerrordiv").text("");
      $("#usermail").val("");
      $("#password").val("");
      $("#passwordagain").val("");
      $.ajax({
        url: "../api/api.php",
        type: "POST",
        data: data,
        dataType: "json",
        success: function (response) {
          if (response.type === "success") {
            $("#signerrordiv").text("");
            alertify.success(response.message);
            setTimeout(() => {
              window.location.href = "./login.php";
            }, 1000);
          } else {
            $("#signerrordiv").text(response.message);
          }
        },
        error: function (xhr, status, error) {
          $(".signerrordiv").text("Bir hata oluştu: " + error);
        },
      });
    }
  }
});

$("#loginform").on("submit", function (e) {
  e.preventDefault();
  let usermail = $("#usermail").val();
  let userpass = $("#password").val();

  let data = {
    usermail: usermail,
    userpass: userpass,
    action: "login",
  };

  if (usermail == "" || userpass == "") {
    $("#loginerrordiv").text("Lütfen tüm alanları doldurunuz");
  } else {
    if (userpass.length < 8) {
      $("#loginerrordiv").text("Şifreniz 8 karakterden kısa olamaz");
    } else {
      $("#loginerrordiv").text("");
      $("#usermail").val("");
      $("#password").val("");
      $.ajax({
        url: "../api/api.php",
        type: "POST",
        data: data,
        dataType: "json",
        success: function (response) {
          if (response.type === "success") {
            $("#loginerrordiv").text("");
            alertify.success(response.message);
            setTimeout(() => {
              window.location.href = "../index.php";
            }, 1000);
          } else {
            $("#loginerrordiv").text(response.message);
          }
        },
        error: function (xhr, status, error) {
          $(".signerrordiv").text("Bir hata oluştu: " + error);
        },
      });
    }
  }
});

$("#basiclinkform").on("submit", function (e) {
  e.preventDefault();
  let link = $("#quicklinkshortinput").val();
  if (link == "") {
    alertify.warning("Link alanı boş olamaz");
  } else if (!isValidURL(link)) {
    alertify.error("Geçerli bir URL giriniz");
  } else {
    let data = {
      action: "shorturl",
      link: link,
    };
    $.ajax({
      url: "./api/api.php",
      type: "POST",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.type === "success") {
          alertify.success("Bağlantı başarıyla kısaltıldı");
          let result = `<div class="shortresult flex items-center justify-between shadow-md ps-2">
                        <div class="text-sm font-semibold text-red-600">
                            <p id="resultlink">${response.message}</p>
                        </div>
                        <div class="copylinkbtn">
                            <button type="button" id="copylinkbtn"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700">
                                Kopyala
                            </button>
                        </div>
                    </div>`;
          $("#resultshortlink").html(result);
          $("#quicklinkshortinput").val("");
        } else {
          alertify.error(response.message);
        }
      },
      error: function (xhr, status, error) {
        alertify.success("Bir hata oldu  " + error);
      },
    });
  }
});

$(document).on("click", "#copylinkbtn", function () {
  let linktext = $("#resultlink").text();
  navigator.clipboard
    .writeText(linktext)
    .then(function () {
      alertify.success("Bağlantı panoya kopyalandı");
    })
    .catch(function (error) {
      alertify.error("Kopyalama başarısız oldu: " + error);
    });
});

$(document).on("click", "#deletelinkbtn", function () {
  let linkid = $(this).attr("linkcardid");
  $(".linkcard[linkcardid='" + linkid + "']").addClass("hidden");
  let data = {
    linkid: linkid,
    action: "deletelink",
  };
  $.ajax({
    url: "../api/api.php",
    type: "POST",
    data: data,
    dataType: "json",
    success: function (response) {
      if (response.type === "success") {
        alertify.success(response.message);
      } else {
        alertify.error(response.message);
      }
    },
    error: function (xhr, status, error) {
      alertify.error("Bir hata oluştu" + error);
    },
  });
});

$("#passwordchangeform").on("submit", function (e) {
  e.preventDefault();
  let oldpass = $("#oldpassword").val();
  let newpass = $("#newpassword").val();

  let data = {
    oldpass: oldpass,
    newpass: newpass,
    action: "changepass",
  };

  if (oldpass == "" || newpass == "") {
    alertify.error("Lütfen tüm alanları doldurun");
  } else {
    $.ajax({
      url: "../api/api.php",
      type: "POST",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.type === "success") {
          alertify.success(response.message);
          setTimeout(() => {
            window.location.href = "https://balik.xyz/exit.php";
          }, 1000);
        } else {
          alertify.error(response.message);
        }
      },
      error: function (xhr, status, error) {
        alertify.error("Bir hata oluştu" + error);
      },
    });
  }
});
