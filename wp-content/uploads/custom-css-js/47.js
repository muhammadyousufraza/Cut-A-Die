<!-- start Simple Custom CSS and JS -->
<script>
window.onscroll = function() {stickyHeader()};

var header = document.querySelector('.mainheader'); // Main header selector
var sticky = header.offsetTop;

function stickyHeader() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky-header");
    } else {
        header.classList.remove("sticky-header");
    }
}
</script>
<!-- end Simple Custom CSS and JS -->
