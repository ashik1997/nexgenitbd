@stack('summer-note')
<script src="{{ asset('assets/panel/vertical/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/detect.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/vertical-menu.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('assets/helper.js') }}"></script>
<script>
window.NEXGEN_MEDIA = {
    libraryUrl: @json(route('media.library')),
    uploadUrl: @json(route('media.upload')),
    deleteUrl: @json(route('media.destroy')),
    csrf: @json(csrf_token())
};
</script>
<script src="{{ asset('assets/panel/vertical/js/media-manager.js') }}?v=1"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@include('sweetalert::alert')
@stack('script')

<!-- Core JS -->
<script src="{{ asset('assets/panel/vertical/js/core.js') }}"></script>
<!-- End JS -->
