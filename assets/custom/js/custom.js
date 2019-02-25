// recent Side
$(document).ready(function() {
  $(".recent-img").mouseenter(function() {
    $(".hover", this).css("opacity", "1");
    $(".hover", this).css("cursor", "pointer");
    $(".hover-img", this).css("opacity", ".82");
  });
  $(".recent-img").mouseleave(function() {
    $(".hover").css("opacity", "0");
    $(".hover-img", this).css("opacity", "1");
  });
});

// User Side
// $(document).ready(function() {
//   $(".menu-side a").removeAttr("href");
//   $(".menu-side a").click(function() {
//     const href = $(this).attr("href");
//     $(this).css("color", "red");
//     document.location.href = href;
//   });
// });
