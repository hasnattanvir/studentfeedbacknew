
<link href="css/jqvmap.css" rel='stylesheet' type='text/css' />
            <script src="js/jquery.vmap.js"></script>
            <script src="js/jquery.vmap.sampledata.js" type="text/javascript"></script>
            <script src="js/jquery.vmap.world.js" type="text/javascript"></script>
            <script type="text/javascript">
              jQuery(document).ready(function() {
                jQuery('#vmap').vectorMap({
                  map: 'world_en',
                  backgroundColor: '#fff',
                  color: '#696565',
                  hoverOpacity: 0.8,
                  selectedColor: '#696565',
                  enableZoom: true,
                  showTooltip: true,
                  values: sample_data,
                  scaleColors: ['#585858', '#696565'],
                  normalizeFunction: 'polynomial'
                });
              });
            </script>

 
  </div>
  <!-- Classie -->
    <script src="{{asset('admin/js/classie.js')}}"></script>
    <script>
      var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;
        
      showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
      };
      
      function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
          classie.toggle( showLeftPush, 'disabled' );
        }
      }
    </script>
  <!--scrolling js-->
  <script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
  <script src="{{asset('admin/js/sort.js')}}"></script>
  <script src="{{asset('admin/js/scripts.js')}}"></script>
  <!--//scrolling js-->
  <!-- Bootstrap Core JavaScript -->
   <script src="{{asset('admin/js/bootstrap.js')}}"> </script>
    <script type="text/javascript">
    // basic usage
    $('.tablemanager').tablemanager({
      firstSort: [[3,0],[2,0],[1,'asc']],
      disable: ["last"],
      appendFilterby: true,
      dateFormat: [[4,"mm-dd-yyyy"]],
      debug: true,
      vocabulary: {
    voc_filter_by: 'Filter By',
    voc_type_here_filter: 'Filter...',
    voc_show_rows: 'Rows Per Page'
  },
      pagination: true,
      showrows: [5,10,20,50,100],
      disableFilterBy: [1]
    });
    // $('.tablemanager').tablemanager();
  </script>
  <script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>












<!-- Footer -->
<footer class="page-footer font-small blue pt-4" style="margin-top: 100px;">

 
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2022 Copyright:
    <a href=""> Feedback Evaluation </a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

</body>
</html>