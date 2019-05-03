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
  $("#top-arrow")
    .toggleClass("fa-caret-down")
    .toggleClass("fa-caret-up");

  $("#menu-user").slideToggle("swing");
});

// tombol dropdown nav
$("#login_user").on("click", function() {
  $("#login-menu").css("marginLeft", "0px");
  $("#login-menu").css("backgroundColor", "#333");
  $("#login-menu").css("line-height", "40px");
  $("#login-menu").css("position", "absolute");
  $("#login-menu").slideToggle("swing");

  $("#arrow-menu")
    .toggleClass("fa-caret-down")
    .toggleClass("fa-caret-up");
});

const date    = $("#clock").data("clock");
const cancel  = $("#cancel");
const href    = cancel.attr("href");
const base    = "http://localhost/rework/";

// id user
let id = $('#exp').data('exp');
$("#clock").countdown(date, function(event) {
  $(this).html(event.strftime("%D days %H:%M:%S"));
  let exp = event.strftime("%D days %H:%M:%S");
  if(exp =="00 days 00:00:00"){
    $.ajax({
      url:base+'Order/expired',
      type:'POST',
      data:'id='+id,
      success:function(){
        Swal.fire({
          type: 'error',
          title: 'Oops, Expired...',
          text: 'Sorry Your Orders has been expired, please pay for the order on time '
        });
      }
    });
  }else{
    $(this).html(event.strftime("%D days %H:%M:%S")); 
  }
});

cancel.click(e => {
  e.preventDefault();
  $("#clock").remove();
  document.location.href = href;
});
