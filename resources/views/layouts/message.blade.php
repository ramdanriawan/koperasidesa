@if(session()->has('success'))
    <script>
        swal({
            type: 'success',
            timer: 1000,
            icon: 'success',
            showConfirmButton: false,
            text: '{{ session()->get("success") }}'
        });
    </script>
@elseif(session()->has('error'))
    <script>
        swal({
            type: 'error',
            timer: 1000,
            icon: 'error',
            showConfirmButton: false,
            text: '{{ session()->get("error") }}'
        });
    </script>
@elseif(session()->has('errors'))
    <script>
        swal({
            type: 'error',
            timer: 1000,
            icon: 'error',
            showConfirmButton: false,
            text: 'Error!'
        });
    </script>
@endif
