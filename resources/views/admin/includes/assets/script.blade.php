<script src="{{asset('/')}}admin-assets/assets/libs/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}admin-assets/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}admin-assets/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('/')}}admin-assets/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('/')}}admin-assets/assets/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="{{asset('/')}}admin-assets/assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="{{asset('/')}}admin-assets/assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="{{asset('/')}}admin-assets/assets/js/app.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    $('#table').DataTable( {
        autoFill: true
    } );
</script>
@if(Session::has('message'))
    <script>
        toastr.success("{{ Session::get('message') }}")
    </script>
@endif
