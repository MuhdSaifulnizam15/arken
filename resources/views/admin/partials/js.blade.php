<!-- Scripts -->
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script>
$("document").ready(function(){
    $(".alert").fadeTo(4000, 1000).slideUp(1000, function(){
        $(".alert").slideUp(1000);
    });
});
</script>

@yield('additional_js')

@stack('scripts')