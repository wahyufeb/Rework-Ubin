//  PRODUCTS PAGE
// Sweet Add Product
let add = $('#add').data('add');
if(add == "add"){
    Swal.fire(
        'Success!',
        'Product has been added',
        'success'
        );
}
// end Sweet add Product

// Sweet Delete Product
$('.delete-product').on("click", function(e){
    let href    = $(this).attr('href');
    let namePro = $(this).data('delete'); 
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want delete   "+ namePro+"?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#07cdae',
        cancelButtonColor: 'salmon',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Deleted!',
            'Your product has been deleted.',
            'success'
            );
            setTimeout(() => {
                document.location.href = href;
            }, 2000);
        }
    });
});
// end Sweet Delete Product
// END PRODUCTS PAGE



// ACCOUNTS PAGE
// Sweet Suspend Account
$('.suspend').on("click", function(e){
    e.preventDefault(e);
    let href = $(this).attr('href');
    let name = $(this).data('name');
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want Suspend "+ name+"?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d896ff',
        cancelButtonColor: 'grey',
        confirmButtonText: 'Yes, suspend it!'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Success',
            name+' has been Suspended',
            'success'
            );
            setTimeout(() => {
                document.location.href = href;
            }, 2000);
        }
    });
});
// End Sweet Suspend Account

// Sweet Activate Account
$('.active').on("click", function(e){
    e.preventDefault(e);
    let href = $(this).attr('href');
    let name = $(this).data('name');
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want Activate "+ name+"?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d896ff',
        cancelButtonColor: 'grey',
        confirmButtonText: 'Yes, activate it!'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Success',
            name+' has been Activated',
            'success'
            );
            setTimeout(() => {
                document.location.href = href;
            }, 2000);
        }
    });
});
// End Sweet Activate Account
// END ACCOUNTS PAGE


// TESTIMONIALS PAGE
// Sweet Delete Comment
$('.delete-comment').on("click", function(e){
    let name = $(this).data('delete');
    e.preventDefault();
    let href = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want delete Comment from "+ name+"?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#07cdae',
        cancelButtonColor: 'salmon',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Deleted!',
            'Comment from '+ name +' has been deleted.',
            'success'
            );
            setTimeout(() => {
                document.location.href = href;
            }, 2000);
        }
    });
})
// End Sweet Delete Comment

// END TESTIMONIALS PAGE


// SWEET LOGOUT
$('#logout').on("click", function(e){
    e.preventDefault();
    let href = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to Logout?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'salmon',
        cancelButtonColor: 'skyblue',
        confirmButtonText: 'Yes, Logout '
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Success',
            'You has been Logged out',
            'success'
            );
            setTimeout(() => {
                document.location.href = href;
            }, 2000);
        }
    });
});
// End SWEET Logout


