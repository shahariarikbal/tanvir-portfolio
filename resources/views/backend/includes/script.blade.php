<!-- Bootstrap core JavaScript-->
<script src="{{ asset('/backend/assets/') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('/backend/assets/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('/backend/assets/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('/backend/assets/') }}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{ asset('/backend/assets/') }}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('/backend/assets/') }}/js/demo/chart-area-demo.js"></script>
<script src="{{ asset('/backend/assets/') }}/js/demo/chart-pie-demo.js"></script>
<script>
    // Image preview script
    function showPreview(input) {
        let image = input.files && input.files[0];
        if (image) {
            if(image['type'] === 'image/jpeg' || image['type'] === 'image/png' || image['type'] === 'image/jpg'){
                let reader = new FileReader();
                reader.onload = function (e) {
                    let output = document.getElementById('pre-avatar');
                    output.src = reader.result;
                    output.style.display = "block";
                    output.style.width = "25%";
                };
                reader.readAsDataURL(input.files[0]);
            }else {
                alert("Invalid image file selected. Please select a valid file (JPEG, PNG, JPG)");
            }
        }
    }

    function showCertificatePreview(input) {
        let image = input.files && input.files[0];
        if (image) {
            if(image['type'] === 'image/jpeg' || image['type'] === 'image/png' || image['type'] === 'image/jpg'){
                let reader = new FileReader();
                reader.onload = function (e) {
                    let output = document.getElementById('pre-certificate');
                    output.src = reader.result;
                    output.style.display = "block";
                    output.style.width = "25%";
                };
                reader.readAsDataURL(input.files[0]);
            }else {
                alert("Invalid image file selected. Please select a valid file (JPEG, PNG, JPG)");
            }
        }
    }
</script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('.summernote').summernote({
        height: 400
    });
</script>
