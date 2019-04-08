</body>
<!-- jquery -->
<script src="<?= base_url() ?>assets/bootstrap/js/jquery-3.3.1.min.js"></script>
<!-- <script src="<?= base_url() ?>/assets/menu/js/jquery.slimmenu.min.js"></script> -->
<script src="<?= base_url() ?>assets/custom/js/jquery.countdown.min.js"></script>
<script src="<?= base_url() ?>assets/custom/menu/script.js"></script>

<!-- bootstrap -->
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

<!-- sweetalert -->
<script src="<?= base_url() ?>assets/sweetalert/sweetalert2.min.js"></script>

<!-- custom -->
<script src="<?= base_url() ?>assets/custom/js/custom.js"></script>
<script src="<?= base_url() ?>/assets/custom/js/sweetcustom.js"></script>
<!-- <script src="<?= base_url() ?>assets/dropzone/dropzone.min.js"></script> -->
<script src="<?= base_url() ?>assets/custom/js/mycode.js"></script>
<script src="<?= base_url() ?>assets/custom/js/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>/assets/custom/js/scroll.js"></script>
<script src="<?= base_url() ?>/assets/custom/js/jquery-easing.js"></script>

<script type="text/javascript">
    $(document).ready(()=>{
        $('#search').keyup('blur', function(){
            $('#btn-search').css('display', 'none');
        });
        $('#search').autocomplete({
                source: "<?php echo site_url('Ubin/get_autocomplete/?');?>",
                select: function(event, ui){
                    $(this).val(ui.item.label);
                    $('#form-search').submit();
                }
        });
    });
</script>
<script>
    $(document).ready(()=>{

        const load_data =(page)=>{
            $.ajax({
                url:"<?php echo base_url();?>Ubin/pagination/"+ page,
                type:"GET",
                dataType:"json",
                success:(data)=>{
                    $('#products').html(data.data_products);
                    $('#pagination').html(data.pagination_link);
                },    
                error: function(data){
                    alert("fail");
                }
            });
        }
        load_data(1);
        $(document).on("click", ".pagination li a", function(e){
        e.preventDefault();
        var page = $(this).data("ci-pagination-page");
        load_data(page);
        });
    });
</script>
</html>