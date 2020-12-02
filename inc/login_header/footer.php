</body>

</html>

<script>
    setTimeout(function() {
        $('#login_message').fadeOut('slow');
    }, 1000);
   
</script>

   <script>
    history.pushState(null, document.title, location.href);
    window.addEventListener('popstate', function (event)
    {
    history.pushState(null, document.title, location.href);
    });
    
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>