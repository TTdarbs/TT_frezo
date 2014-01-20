
 $(document).ready(function() {
     $(".products").on("click keyup", function() {
        $total = 0;
        $(".products").each(function(i, val) {
          var products = +$(this).val();
          var dailyPrice = +$(this).closest(".product").data("daily-price");
          $total = $total + (products * dailyPrice);
        });
        $("#total").text($total.toFixed(2));
        //$total = 0;
     });
});