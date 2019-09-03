$(window).ready(function() {
    // Here is 1st coupon
   $("#BoxCodeButton-1").click(function() {
        $(this).text("COPIED"), $("#BoxCodeButton-2").text("COPY COUPON"), TweenMax.to("#BoxCode-1", .2, {
            x: 20,
            delay: 0,
            ease: Quad.easeOut,
            repeat: 1,
            yoyo: !0
        }), TweenLite.to("#BoxCode-1", .2, {
            backgroundColor: "rgba(242, 236, 34, 1)",
            color: "#98000a",
            delay: 0,
            ease: Quad.easeOut,
            onComplete: function() {
                TweenLite.to("#BoxCode-1", .3, {
                    backgroundColor: "rgba(87, 16, 39, 0.55)",
                    color: "#f2ec22",
                    delay: 0,
                    ease: Quad.easeOut
                })
            }
        })
    });

    // Change coupon 1 text here
    new ClipboardJS("#BoxCodeButton-1")

});
