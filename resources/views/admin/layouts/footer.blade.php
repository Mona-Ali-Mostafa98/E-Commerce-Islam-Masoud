<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">Copyright
            &copy; 2022 , تم تصميم و تطوير المشروع من خلال شركة <a class="text-bold-800 grey darken-2"
                href="http://smartvision4p.com/" target="_blank">شركة سمارت فيجن لتقنية
                المعلومات .</a></span><span class="float-md-right d-none d-md-block">Made with <i
                class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->

<!-- BEGIN: Vendor JS-->
<script src="{{ url('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ url('admin/app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
<script src="{{ url('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ url('admin/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ url('admin/app-assets/vendors/js/extensions/tether.min.js') }}"></script>
<script src="{{ url('admin/app-assets/vendors/js/extensions/shepherd.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ url('admin/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ url('admin/app-assets/js/core/app.js') }}"></script>
<script src="{{ url('admin/app-assets/js/scripts/components.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ url('admin/app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
<script src="{{ url('admin/app-assets/js/scripts/forms/wizard-steps.js') }}"></script>
<!-- END: Page JS-->

<script src="{{ url('admin/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{ url('//code.jquery.com/ui/1.11.4/jquery-ui.js') }}"></script>

<script src="{{ url('admin/app-assets/js/scripts/extensions/sweet-alerts.js') }}" aria-hidden="true"></script>

{{-- start start of scripts of summernote --}}
<!-- include summernote css/js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<script type="text/javascript">
    $('.summernote').summernote({
        height: 200,
    });
</script>
{{-- end of scripts of summernote --}}

{{-- start scripts of sweetalert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {

        var form = $(this).closest("form");

        var name = $(this).data("name");

        event.preventDefault();

        swal({
                title: `هل انت متاكد من حذف هذا العنصر ؟`,
                text: "أذا قمت بحذف هذا العنصر لن تتمكن من استرجاعه مره اخرى !",
                icon: "warning",
                buttons: ['لا', 'نعم'],
                dangerMode: true,
            })

            .then((willDelete) => {

                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
{{-- end scripts of sweetalert --}}

@stack('scripts')

</body>
<!-- END: Body-->

</html>
