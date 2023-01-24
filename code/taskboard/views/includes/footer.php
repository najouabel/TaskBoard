
<!-- Bootstrap 5 JS CDN Links -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
	   <script type="text/javascript" src="views/public/js/script.js"></script>
       <script>
        
        function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("todoshow") == -1) {
    // x.className += " todoshow";
    x.className = x.className.replace(" todohide", " todoshow");
  } else { 
    x.className = x.className.replace(" todoshow", " todohide");
  }

}
      </script> 
    </body>
    
</html>