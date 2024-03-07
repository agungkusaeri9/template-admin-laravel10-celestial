@push('scripts')
    @if (session('success'))
        <script>
            $(function() {
                toastr.success('{{ session('success') }}', 'Berhasil!')
            })
        </script>
    @elseif(session('error'))
        <script>
            $(function() {
                toastr.error('{{ session('error') }}', 'Gagal!')
            })
        </script>
    @endif
    <script>
        $(function() {
            $('body').on('click', '.btnDelete', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let action = $(this).data('action');
                        $('#formDelete').attr('action', action);
                        $('#formDelete').submit();
                    }
                })
            })
        })
    </script>
@endpush
