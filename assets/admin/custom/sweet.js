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
    let href = $(this).attr('href');
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want Delete this Product",
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

