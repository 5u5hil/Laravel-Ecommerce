<!--Core js-->

{{ HTML::script('public/theSoul/js/jquery.js'); }}
{{ HTML::script('public/theSoul/bs3/js/bootstrap.min.js'); }}

{{ HTML::script('public/theSoul/js/hover-dropdown.js'); }}

{{ HTML::script('public/theSoul/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js'); }}

{{ HTML::script('public/theSoul/js/jquery.nicescroll.js'); }}

<!--common script init for all pages-->

{{ HTML::script('public/theSoul/js/scripts.js'); }}



<script>
    $(document).ready(function() {
        $(".edit").click(function() {
            $(this).parent().submit();
        });
    });
</script>