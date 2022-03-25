"use strict";
function openCloseNavigationMobile() {
  $(".nav_content").slideToggle("");
}

function openConnexionForm() {
  $(".connexion_part").css("display", "block");
  $(".nav_content").css("display", "none");
}

function closeConnexionPart() {
  $(".connexion_part").css("display", "none");
  $(".form p").text("Identifiez Vous");
}

function createAccount() {
  const EMAIL = $("#email_creation").val();
  const PASSWORD = $("#password_creation").val();

  $.ajax({
    type: "POST",
    url: "view/php/ajax/inscription.php",
    data: {
      email: EMAIL,
      password: PASSWORD,
    },
    success: function (data) {
      $(".info_message").text(data);
    },
  });
}

function connectUser() {
  const EMAIL = $("#email_connexion").val();
  const PASSWORD = $("#password_connexion").val();

  $.ajax({
    type: "POST",
    url: "view/php/ajax/connect_user.php",
    data: {
      email: EMAIL,
      password: PASSWORD,
    },
    success: function (data) {
      if (data == "connected") {
        window.location.reload();
      } else {
        $(".form p").text(data);
      }
    },
  });
}

function addMore() {
  const FIRSTPRICE = parseInt($("#updated_price").attr("data"));
  if ($(".amount").val() < 10) {
    let input = $(".amount");
    let val = parseInt(input.val(), 10);
    input.val(val + 1);
    $("#updated_price").text(FIRSTPRICE * parseInt(input.val()));
  }
}

function less() {
  const FIRSTPRICE = parseInt($("#updated_price").attr("data"));
  if ($(".amount").val() > 1) {
    let input = $(".amount");
    let val = parseInt(input.val(), 10);
    input.val(val - 1);
    $("#updated_price").text(FIRSTPRICE * parseInt(input.val()));
  }
}

function addToBookmark() {
  $(this).find("svg").toggleClass("mark");
}

function searchInput() {
  let content = $(this).val();
  $.ajax({
    type: "GET",
    url: "view/php/ajax/search.php",
    data: {
      content: content,
    },
    success: function (data) {
      if (data) {
        $(".result_search_input ul").html(data);
      } else {
        $(".result_search_input ul").html("<li>Aucun résultat</li>");
      }
      if (content == "") {
        $(".result_search_input ul").html("");
      }
    },
  });
}

$(function () {
  $(".menu_hamburger_button").on("click", openCloseNavigationMobile);
  $(".close_nav_content_button").on("click", openCloseNavigationMobile);
  $(".open_connexion_form").on("click", openConnexionForm);
  $(".close_connexion_part").on("click", closeConnexionPart);
  $("#create_account_button").on("click", createAccount);
  $("#connect_user_button").on("click", connectUser);
  $(".more").on("click", addMore);
  $(".less").on("click", less);
  $(".bookmark").on("click", addToBookmark);
  $(".search_part input").keyup(searchInput);
});
