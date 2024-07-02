$(document).ready(function () {
    $("#main_nav > li > ul").hide();
    $("#main_nav > li > a.current").parent().children("ul").show();
    $('#main_nav > li > a[href="#"]').click(function () {
        $(this).parent().siblings().children("a").removeClass("current");
        $(this).addClass("current");
        $(this).parent().siblings().children("ul").hide();
        $(this).parent().children("ul").show();
        return false
    });
    $(".jump_menu").hover(function () {
        $(".jump_menu_btn").toggleClass("active");
        $("ul.jump_menu_list").slideDown(200)
    }, function () {
        $(".jump_menu_btn").toggleClass("active");
        $(".jump_menu_list").hide()
    });
    $(".close_notification").click(function () {
        $(this).hide();
        $(this).parent().fadeTo("fast", 0, function () {
            $(this).slideUp("fast")
        });
        return false
    });
    $("#date").jCal({
        day: new Date((new Date).setMonth((new Date).getMonth() + 2)),
        days: 1,
        showMonths: 1,
        drawBack: function () {
            return false
        },
        monthSelect: false,
        sDate: new Date,
        dCheck: function (e) {
            if (e.getDay() != 6) return "day";
            else return "invday"
        },
        callback: function (e, t) {
            $("#calTwoDays").val(t);
            $("#calTwoResult").append('<div style="clear:both; font-size:7pt;">' + t + " days starting " + (e.getMonth() + 1) + "/" + e.getDate() + "/" + e.getFullYear() + "</div>");
            return true
        }
    });
    $(".expose").click(function () {
        $(this).expose({})
    });
    $("#facebox2").overlay({
        top: 260,
        mask: {
            color: "#fff",
            loadSpeed: 200,
            opacity: .8
        },
        closeOnClick: true,
        load: true
    });
    $("a[rel]").overlay({
        closeOnClick: false,
        mask: {
            color: "#fff",
            loadSpeed: 200,
            opacity: .8
        }
    });
    $("[title]").tooltip({
        opacity: .8,
        effect: "slide",
        predelay: 200,
        delay: 10,
        offset: [5, 0]
    }).dynamic({
        bottom: {
            direction: "down",
            bounce: true
        }
    });
    var e = ".expandable";
    $(e).find("tr:odd").addClass("odd");
    $(e).find("tr:not(.odd)").hide();
    $(e).find("tr:not(.odd)").addClass("grid_dropdown");
    $(e).find("tr:first-child").show();
    $("table.expandable tr.active").click(function () {
        $(this).toggleClass(".odd")
    });
    $(e).find("tr.odd").click(function () {
        $(this).toggleClass("active");
        $(this).next("tr").toggle();
        $(this).find(".toggle").toggleClass("collapse")
    });
    $("ul.sub_nav").tabs("div.panes > div", {
        effect: "slide"
    });
    $("ul.vertical_menu").tabs("div.panes_vertical > div", {
        effect: "slide"
    });
    $("ul.horizontal_nav").tabs("div.panes_horizontal > div", {
        effect: "slide"
    });
    $(".accordion").tabs(".accordion div.pane", {
        tabs: "h2",
        effect: "slide"
    })
})