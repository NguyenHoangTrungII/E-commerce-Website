
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../public/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../public/assets/vendor/libs/popper/popper.js"></script>
  <script src="../public/assets/vendor/js/bootstrap.js"></script>
  <script src="../public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../public/assets/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../public/assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../public/assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../public/assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="../public/assets/vendor/js/sweetalert.min.js"></script>
  <script src="../public/assets/vendor/js/summernote-lite.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../public/js/select2.min.js"></script>
  <link href="../public/assets/css/select2.min.css" rel="stylesheet" />

 <!-- Main JS -->
 <script src="../public/assets/js/main.js"></script>
  <script src="../public/assets/js/tab.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>



  <!-- for product edit add -->
  <script>
   $(document).ready(function() {
      $('#summernote').summernote();
    });
  </script>



  <script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					var div_id  = $(input).attr('set-to');
					reader.onload = function (e) {
						$('#'+div_id).attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$(".Employee-img-preview").change(function(){
    		readURL(this);
			});


      var inputLocalFont = document.getElementById("product-gallery-add");
      inputLocalFont.addEventListener("change",previewImages,false);
      function previewImages(){
        var fileList = this.files;
        var anyWindow = window.URL || window.webkitURL;
          for(var i = 0; i < fileList.length; i++){
            var objectUrl = anyWindow.createObjectURL(fileList[i]);
            $('#preview-product-gallery-add').append('<img src="' + objectUrl + '" style="width: 20%;"/>');
            window.URL.revokeObjectURL(fileList[i]);
          }
      }

        
		</script>

    <!-- dùng để dùng chung silder, nhận biết đang ở slider nào để add class active -->

    <script>

      $(".menu-item.one").on("click", function(){
        
        $(".menu-item").removeClass('active');
        $(".menu-item").removeClass('open');
        localStorage.clear();
        localStorage.setItem("menu-item-one", $(this).attr('id'));
      });

      $(".menu-item").on("click", function(){
        $(".menu-item").removeClass('active');
        $(".menu-item").removeClass('open');
        $(this).addClass("active");
      });

      $(".menu-sub .menu-item").on("click", function(){
        $(".menu-item").removeClass('active');
        $(".menu-item").removeClass('open');
        $(this).addClass("active");
        if(localStorage.getItem("menu-item-one")!= null)
          localStorage.clear();
        localStorage.setItem("menu-item", $(this).attr("id"))
      });


    $(document).ready(function() {
      SetClass();
      SetClassOne() 
    });

    function SetClass() {
      var item = localStorage.getItem("menu-item");
      $("#" + item).addClass("active")
      $("#" + item).parent().parent().addClass("active open")

    }

    function SetClassOne() {
      if(localStorage.getItem("menu-item-one") != "")
      {
        var item = localStorage.getItem("menu-item-one");
        $("#" + item).addClass("active")
      }

    }
    </script>


</body>

</html>