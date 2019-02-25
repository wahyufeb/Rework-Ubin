// Tombol Logout
$(".logout").on("click", function(e) {
  e.preventDefault();

  const href = $(this).attr("href");

  Swal.fire({
    title: "Are you sure?",
    text: "Do you want to logout",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#ffa900",
    cancelButtonColor: "#d33",
    confirmButtonText: "Logout!"
  }).then(result => {
    if (result.value) {
      Swal.fire("Success!", "Your Logged Out", "success");
      setTimeout(() => {
        document.location.href = href;
      }, 1500);
    }
  });
});

// tombol dropdown user
$("#dropdown").on("click", function() {
  $("#menu-user").css("z-index", "-1");
  $("#top-arrow")
    .toggleClass("fa-caret-down")
    .toggleClass("fa-caret-up");

  $("#menu-user").slideToggle("swing");
});

// tombol dropdown nav
$("#login_user").on("click", function() {
  $("#login-menu").css("marginLeft", "-50px");
  $("#login-menu").css("line-height", "40px");
  $("#login-menu").css("position", "absolute");
  $("#login-menu").slideToggle("swing");

  $("#arrow-menu")
    .toggleClass("fa-caret-down")
    .toggleClass("fa-caret-up");
});
