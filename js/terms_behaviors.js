$(window).ready(function() {
    var a = !0;
    $("#ButtonTerms").click(function() {
        a ? (a = !1, $("#BoxTerms").slideToggle(500)) : (a = !0, $("#BoxTerms").slideToggle(500))
    }), $("#BoxTerms").hide()
});

