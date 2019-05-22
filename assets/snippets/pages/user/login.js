
$("#login_form").submit(function(e){
    e.preventDefault();
    var action = $(this).attr("action");

    var i = function(e, i, a) {
        var t = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
        e.find(".alert").remove(), t.prependTo(e), t.animateClass("fadeIn animated"), t.find("span").html(a);
    }
    var a = $("#m_login_signin_submit"),
    t = $(this).closest("form");
t.validate({
    rules: {
        username: {
            required: true
         },
        password: {
            required: true 
        }
    } 
}), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), $.ajax({
    type: "POST",
    url: action,
    data: new FormData(this),
    //use contentType, processData for sure.
    contentType: false,
    processData: false, 
    success: function(e) {
        setTimeout(function() {
         if(e["result"] == "Success"){
            window.location.href = e["url"];
         }else{
            a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), i(t, "danger", e["result"]);
         }
            
        }, 2e3)
    }
})) 
  });

 