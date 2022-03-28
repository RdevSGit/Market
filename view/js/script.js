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
  $(this).css({ color: "hsla(33, 100%, 53%, 1)", transition: "all 0.1" });
  setTimeout(function () {
    $(".more").css({
      transition: "all .1s",
      color: "#000",
    });
  }, 200);
  const FIRSTPRICE = parseInt($("#updated_price").attr("data"));

  if ($(".amount").val() < 10) {
    let input = $(".amount");
    let val = parseInt(input.val(), 10);
    input.val(val + 1);
    $("#updated_price").text(FIRSTPRICE * parseInt(input.val()));
  }
}

function less() {
  $(this).css({ color: "hsla(33, 100%, 53%, 1)", transition: "all 0.1" });
  setTimeout(function () {
    $(".less").css({
      transition: "all .1s",
      color: "#000",
    });
  }, 200);
  const FIRSTPRICE = parseInt($("#updated_price").attr("data"));
  if ($(".amount").val() > 1) {
    let input = $(".amount");
    let val = parseInt(input.val(), 10);
    input.val(val - 1);
    $("#updated_price").text(FIRSTPRICE * parseInt(input.val()));
  }
}

function addToBookmark() {
  let user_id = $(this).attr("data-user");
  let product_id = $(this).attr("data-product");

  $(this).find("svg").toggleClass("mark");

  $.ajax({
    type: "POST",
    url: "view/php/ajax/add_to_bookmark.php",
    data: {
      user_id: user_id,
      product_id: product_id,
    },
  });
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

function addToCard() {
  $(this).css({
    transition: "all .2s",
    transform: "rotate(-20deg)",
    stroke : "hsla(33, 100%, 53%, 1)"
  });
  setTimeout(function () {
    $(".card").css({
      transition: "all .2s",
      transform: "rotate(0deg)",
      stroke : "#000",
    });
  }, 200);
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
  $(".card").on("click", addToCard);
});
