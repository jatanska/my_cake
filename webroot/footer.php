<footer class="footer">
    <div class="row">
                    <div class="column">
                        <h3>CONTACT</h3>
                        96 ISABELLA ST, LONDON SE1 8DD<br />
						TEL: 020 7928 0678
                    </div>
                    <div class="column">
						<h3>SOCIAL MEDIA</h3>
                        Facebook<br />
Twitter<br />
Instagram
                    </div>
                    <div class="column">
						<h3>OFFICE OPENING TIMES</h3>
                        MONDAY: 12pm - 11pm<br />
TUESDAY - SATURDAY: 12pm - 11pm<br />
SUNDAY: CLOSED
                    </div>
                </div>
</footer>
<script>
<!-- SEARCH -->
$("#search-close").hide();
$("#search-main-q").keydown(function(){
$("#search-close").show();
});
$("#search-close").click(function(){
$("#results-main2").fadeOut();
$("#search-close").hide();
location.reload();
});
<!-- SHOPPING BASKET -->
$(".cart-info").hide();
$(".open_toggle").hide();
$(".open_toggle").click(function(){
$(".cart-info").toggle();
});
$(".cart-action").click(function(){
$(".cart-info").toggle();
$(".open_toggle").show();
});
$(".close_basket").click(function(){
$(".cart-info").fadeOut();
$(".close_basket").hide();
location.reload();
});
</script>