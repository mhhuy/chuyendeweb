<script>
    @section('success')
        toastr.success('session('success')',"Thông báo");
    @endsection
    @section('error')
        toastr.error('session('error')',"Báo lỗi");
    @endsection
</script>
