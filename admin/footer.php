<script src="js/jquery.min.js"/></script>
<!-- Bootstrap -->
<script src="js/bootstrap.js"/></script>
<!-- App -->
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script src="js/app.js"/></script>
<script src="js/app.plugin.js"/></script>
<script src="js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/calendar/bootstrap_calendar.js"></script>
<script type="text/javascript" language="javascript" src="advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="data-tables/DT_bootstrap.js"></script>
<script src="js/calendar/demo.js"></script>
<script src="js/bootbox.min.js"></script>
<script src="js/sortable/jquery.sortable.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/form-validation-script.js"></script>

<script type="text/javascript">
        function myFunction() {                             
        var pass1 = document.getElementById("txtNewPassword").value;
        var pass2 = document.getElementById("txtRePassword").value;
        if (pass1 != pass2 ) {
            alert("Passwords Do not match");
            return false;
        }
        else {
            if( pass1 == "" || pass2 == "")
                {
                    alert("Password Required");
                    return false;
                }
            //return true;
            else
                {
                    alert("Password has been Sucessfully Update.. ");
                    return true;
                }
        }
        return true;
    }
</script>
<script type="text/javascript">
   $(document).ready(function() {
              $('#example').dataTable( {
                  "aaSorting": [[ 4, "desc" ]]
              });
              $('#example1').dataTable( {
                  "aaSorting": [[ 4, "desc" ]]
              });			  
          });
</script>

<script type="text/javascript" charset="utf-8">
    function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

                return true;
            }
</script>
<script>
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) 
        && preg_match('/@.+\./', $email);
}
</script>

</body>
</html>
