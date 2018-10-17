<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Print</title>

      <script>
          function printContent(el){
              var restorepage = document.body.innerHTML;
              var printcontent = document.getElementById(el).innerHTML;
              document.body.innerHTML = printcontent; 
              window.print();
              document.body.innerHTML = restorepage;
          }
      </script>
  </head>
  <body>
      <div class="" id="printable-1">

      </div>


      <div class="print-btn">
          <button onclick="printContent('printable-1')" class="btn btn-primary boxed-btn">Print</button>
      </div>
  </body>
</html>



