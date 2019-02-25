// registration sweetalert
const flashData = $(".flashdata").data("flashdata");

if (flashData == "sukses") {
  Swal.fire("Registration Successfully", "Click Ok to Continue!", "success");
}

// update profile sweetalert
const messData = $(".mess").data("flashdata");
if (messData == "success") {
  Swal.fire("Update Profile Successfully", "Click Ok to Continue!", "success");
}

// delete photo profile sweetalert
$("#delete-trash").on("click", function(e) {
  e.preventDefault();

  const href = $(this).attr("href");

  Swal.fire({
    title: "Are you sure?",
    text: "Do you want to delete photo profile",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#ffa900",
    cancelButtonColor: "#d33",
    confirmButtonText: "Delete!"
  }).then(result => {
    if (result.value) {
      Swal.fire("Success!", "Your photo has been removed", "success");
      setTimeout(() => {
        document.location.href = href;
      }, 1500);
    }
  });
});

// Clear Cart with  sweetalert
$("#clear-cart").on("click", function(e) {
  e.preventDefault();

  const href = $(this).attr("href");
  Swal.fire({
    title: "Are you sure?",
    text: "Do you want clear cart",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "red",
    cancelButtonColor: "orange",
    confirmButtonText: "Clear!"
  }).then(result => {
    if (result.value) {
      Swal.fire("Success!", "Your cart has been removed", "success");
      setTimeout(() => {
        document.location.href = href;
      }, 1500);
    }
  });
});

// Delete Product in the cart by rowid
$("#delete-product").on("click", function(e) {
  e.preventDefault();

  const href = $(this).attr("href");
  Swal.fire({
    title: "Are you sure?",
    text: "Do you want delete this product",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "red",
    cancelButtonColor: "orange",
    confirmButtonText: "Delete!"
  }).then(result => {
    if (result.value) {
      Swal.fire("Success!", "Your product has been removed", "success");
      setTimeout(() => {
        document.location.href = href;
      }, 1500);
    }
  });
});
