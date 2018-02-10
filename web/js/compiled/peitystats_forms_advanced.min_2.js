$(function () {
    altair_form_adv.char_words_counter(), altair_form_adv.rangeSlider(), altair_form_adv.adv_selects(), altair_form_adv.masked_inputs(), altair_form_adv.date_range()
}), altair_form_adv = {
    char_words_counter: function () {
        var t = $(".input-count");
        t.length && (!function (t) {
            "use strict";
            t.fn.extend({
                counter: function (e) {
                    var i = {
                        type: "char",
                        count: "down",
                        goal: 140,
                        text: !0,
                        target: !1,
                        append: !0,
                        translation: "",
                        msg: "",
                        container_class: ""
                    }, n = "", a = "", r = !1, e = t.extend({}, i, e), o = {
                        init: function (i) {
                            var a = i.attr("id"), r = a + "_count";
                            o.isLimitless(), n = t("<span id=" + r + "/>");
                            var s = t("<div/>").attr("id", a + "_counter").append(n).append(" " + o.setMsg());
                            e.container_class && e.container_class.length && s.addClass(e.container_class), e.target && t(e.target).length ? e.append ? t(e.target).append(s) : t(e.target).prepend(s) : e.append ? s.insertAfter(i) : s.insertBefore(i), o.bind(i)
                        }, bind: function (t) {
                            t.bind("keypress.counter keydown.counter keyup.counter blur.counter focus.counter change.counter paste.counter", o.updateCounter), t.bind("keydown.counter", o.doStopTyping), t.trigger("keydown")
                        }, isLimitless: function () {
                            if ("sky" === e.goal)return e.count = "up", r = !0
                        }, setMsg: function () {
                            if ("" !== e.msg)return e.msg;
                            if (e.text === !1)return "";
                            if (r)return "" !== e.msg ? e.msg : "";
                            switch (this.text = e.translation || "character word left max", this.text = this.text.split(" "), this.chars = "s ( )".split(" "), this.msg = null, e.type) {
                                case"char":
                                    e.count === i.count && e.text ? this.msg = this.text[0] + this.chars[1] + this.chars[0] + this.chars[2] + " " + this.text[2] : "up" === e.count && e.text && (this.msg = this.text[0] + this.chars[0] + " " + this.chars[1] + e.goal + " " + this.text[3] + this.chars[2]);
                                    break;
                                case"word":
                                    e.count === i.count && e.text ? this.msg = this.text[1] + this.chars[1] + this.chars[0] + this.chars[2] + " " + this.text[2] : "up" === e.count && e.text && (this.msg = this.text[1] + this.chars[1] + this.chars[0] + this.chars[2] + " " + this.chars[1] + e.goal + " " + this.text[3] + this.chars[2])
                            }
                            return this.msg
                        }, getWords: function (e) {
                            return "" !== e ? t.trim(e).replace(/\s+/g, " ").split(" ").length : 0
                        }, updateCounter: function (r) {
                            var s = t(this);
                            (a < 0 || a > e.goal) && o.passedGoal(s), e.type === i.type ? e.count === i.count ? (a = e.goal - s.val().length, a <= 0 ? n.text("0") : n.text(a)) : "up" === e.count && (a = s.val().length, n.text(a)) : "word" === e.type && (e.count === i.count ? (a = o.getWords(s.val()), a <= e.goal ? (a = e.goal - a, n.text(a)) : n.text("0")) : "up" === e.count && (a = o.getWords(s.val()), n.text(a)))
                        }, doStopTyping: function (t) {
                            var n = [46, 8, 9, 35, 36, 37, 38, 39, 40, 32];
                            if (o.isGoalReached(t) && t.keyCode !== n[0] && t.keyCode !== n[1] && t.keyCode !== n[2] && t.keyCode !== n[3] && t.keyCode !== n[4] && t.keyCode !== n[5] && t.keyCode !== n[6] && t.keyCode !== n[7] && t.keyCode !== n[8])return e.type !== i.type && (t.keyCode !== n[9] && t.keyCode !== n[1] && e.type != i.type)
                        }, isGoalReached: function (t, n) {
                            return !r && (e.count === i.count ? (n = 0, a <= n) : (n = e.goal, a >= n))
                        }, wordStrip: function (e, i) {
                            var n = i.replace(/\s+/g, " ").split(" ").length;
                            return i = t.trim(i), e <= 0 || e === n ? i : (i = t.trim(i).split(" "), i.splice(e, n, ""), t.trim(i.join(" ")))
                        }, passedGoal: function (t) {
                            var i = t.val();
                            "word" === e.type && t.val(o.wordStrip(e.goal, i)), "char" === e.type && t.val(i.substring(0, e.goal)), "down" === e.type && n.val("0"), "up" === e.type && n.val(e.goal)
                        }
                    };
                    return this.each(function () {
                        o.init(t(this))
                    })
                }
            })
        }(jQuery), t.each(function () {
            var t = $(this), e = $(this).attr("maxlength") ? $(this).attr("maxlength") : 80;
            t.counter({
                container_class: "text-count-wrapper",
                msg: " / " + e,
                goal: e,
                count: "up"
            }), t.closest(".md-input-wrapper").length && t.closest(".md-input-wrapper").addClass("md-input-wrapper-count")
        }))
    }, rangeSlider: function () {
        $(".ion-slider").each(function () {
            $(this).val("").ionRangeSlider()
        }), $("#ionslider_movement_limit").ionRangeSlider({
            type: "double",
            min: 0,
            max: 100,
            from: 20,
            from_min: 10,
            from_max: 30,
            from_shadow: !0,
            to: 80,
            to_min: 70,
            to_max: 90,
            to_shadow: !0,
            grid: !0,
            grid_num: 10
        }), $("#ionslider_date").ionRangeSlider({
            min: +moment().subtract(1, "years").format("X"),
            max: +moment().format("X"),
            from: +moment().subtract(6, "months").format("X"),
            force_edges: !0,
            prettify: function (t) {
                return moment(t, "X").format("LL")
            }
        })
    }, adv_selects: function () {
        $("#selec_adv_1").selectize({
            plugins: {remove_button: {label: ""}},
            options: [{id: 1, title: "Mercury", url: "http://en.wikipedia.org/wiki/Mercury_(planet)"}, {
                id: 2,
                title: "Venus",
                url: "http://en.wikipedia.org/wiki/Venus"
            }, {id: 3, title: "Earth", url: "http://en.wikipedia.org/wiki/Earth"}, {
                id: 4,
                title: "Mars",
                url: "http://en.wikipedia.org/wiki/Mars"
            }, {id: 5, title: "Jupiter", url: "http://en.wikipedia.org/wiki/Jupiter"}, {
                id: 6,
                title: "Saturn",
                url: "http://en.wikipedia.org/wiki/Saturn"
            }, {id: 7, title: "Uranus", url: "http://en.wikipedia.org/wiki/Uranus"}, {
                id: 8,
                title: "Neptune",
                url: "http://en.wikipedia.org/wiki/Neptune"
            }],
            maxItems: null,
            valueField: "id",
            labelField: "title",
            searchField: "title",
            create: !1,
            render: {
                option: function (t, e) {
                    return '<div class="option"><span class="title">' + e(t.title) + "</span></div>"
                }, item: function (t, e) {
                    return '<div class="item"><a href="' + e(t.url) + '" target="_blank">' + e(t.title) + "</a></div>"
                }
            },
            onDropdownOpen: function (t) {
                t.hide().velocity("slideDown", {
                    begin: function () {
                        t.css({"margin-top": "0"})
                    }, duration: 200, easing: easing_swiftOut
                })
            },
            onDropdownClose: function (t) {
                t.show().velocity("slideUp", {
                    complete: function () {
                        t.css({"margin-top": ""})
                    }, duration: 200, easing: easing_swiftOut
                })
            }
        });
        var t = "([a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)";
        $("#selec_adv_2").selectize({
            plugins: {remove_button: {label: ""}},
            persist: !1,
            maxItems: null,
            valueField: "email",
            labelField: "name",
            searchField: ["name", "email"],
            options: [{email: "brian@thirdroute.com", name: "Brian Reavis"}, {
                email: "nikola@tesla.com",
                name: "Nikola Tesla"
            }, {email: "someone@gmail.com"}],
            render: {
                item: function (t, e) {
                    return "<div>" + (t.name ? '<span class="name">' + e(t.name) + "</span>" : "") + (t.email ? '<span class="email">' + e(t.email) + "</span>" : "") + "</div>"
                }, option: function (t, e) {
                    var i = t.name || t.email, n = t.name ? t.email : null;
                    return '<div><span class="label">' + e(i) + "</span>" + (n ? '<span class="caption">' + e(n) + "</span>" : "") + "</div>"
                }
            },
            createFilter: function (e) {
                var i, n;
                return n = new RegExp("^" + t + "$", "i"), (i = e.match(n)) ? !this.options.hasOwnProperty(i[0]) : (n = new RegExp("^([^<]*)<" + t + ">$", "i"), i = e.match(n), !!i && !this.options.hasOwnProperty(i[2]))
            },
            create: function (e) {
                if (new RegExp("^" + t + "$", "i").test(e))return {email: e};
                var i = e.match(new RegExp("^([^<]*)<" + t + ">$", "i"));
                return i ? {email: i[2], name: $.trim(i[1])} : (alert("Invalid email address."), !1)
            },
            onDropdownOpen: function (t) {
                t.hide().velocity("slideDown", {
                    begin: function () {
                        t.css({"margin-top": "0"})
                    }, duration: 200, easing: easing_swiftOut
                })
            },
            onDropdownClose: function (t) {
                t.show().velocity("slideUp", {
                    complete: function () {
                        t.css({"margin-top": ""})
                    }, duration: 200, easing: easing_swiftOut
                })
            }
        })
    }, masked_inputs: function () {
        $maskedInput = $(".masked_input"), $maskedInput.length && $maskedInput.inputmask()
    }, date_range: function () {
        var t = $("#uk_dp_start"), e = $("#uk_dp_end"), i = UIkit.datepicker(t, {format: "DD.MM.YYYY"}), n = UIkit.datepicker(e, {format: "DD.MM.YYYY"});
        t.on("change", function () {
            n.options.minDate = t.val(), setTimeout(function () {
                e.focus()
            }, 300)
        }), e.on("change", function () {
            i.options.maxDate = e.val()
        })
    }
};