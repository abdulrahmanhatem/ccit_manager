
@if(count($errors) > 0 || session('success') || session('error'))
    @foreach ($errors->all() as $error)
        <script>
            toastr["error"]("{!! $error!!}")
        </script>
    @endforeach

    @if (session('success'))
        <script>
            toastr["success"]("{{session('success')}}")
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr["error"]("{{session('error')}}")
        </script>
    @endif
    <script src="{{asset('assets/js/pages/features/miscellaneous/toastr.js')}}"></script>
@endif



