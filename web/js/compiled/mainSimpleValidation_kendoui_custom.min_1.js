!function (e, t) {
    t("kendo.core", ["jquery"], e)
}(function () {
    return function (e, t, n) {
        function i() {
        }

        function r(e, t) {
            if (t)return "'" + e.split("'").join("\\'").split('\\"').join('\\\\\\"').replace(/\n/g, "\\n").replace(/\r/g, "\\r").replace(/\t/g, "\\t") + "'";
            var n = e.charAt(0), i = e.substring(1);
            return "=" === n ? "+(" + i + ")+" : ":" === n ? "+$kendoHtmlEncode(" + i + ")+" : ";" + e + ";$kendoOutput+="
        }

        function a(e, t, n) {
            return e += "", t = t || 2, n = t - e.length, n ? de[t].substring(0, n) + e : e
        }

        function o(e) {
            var t = e.css(A.support.transitions.css + "box-shadow") || e.css("box-shadow"), n = t ? t.match(U) || [0, 0, 0, 0, 0] : [0, 0, 0, 0, 0], i = L.max(+n[3], +(n[4] || 0));
            return {left: -n[1] + i, right: +n[1] + i, bottom: +n[2] + i}
        }

        function s(t, n) {
            var i, r = B.browser, a = "rtl" == t.css("direction");
            if (t.parent().hasClass("k-animation-container")) {
                var s = t.parent(".k-animation-container"), l = s[0].style;
                s.is(":hidden") && s.show(), i = N.test(l.width) || N.test(l.height), i || s.css({
                    width: t.outerWidth(),
                    height: t.outerHeight(),
                    boxSizing: "content-box",
                    mozBoxSizing: "content-box",
                    webkitBoxSizing: "content-box"
                })
            } else {
                var u = o(t), c = t[0].style.width, d = t[0].style.height, p = N.test(c), f = N.test(d);
                r.opera && (u.left = u.right = u.bottom = 5), i = p || f, !p && (!n || n && c) && (c = t.outerWidth()), !f && (!n || n && d) && (d = t.outerHeight()), t.wrap(e("<div/>").addClass("k-animation-container").css({
                    width: c,
                    height: d,
                    marginLeft: u.left * (a ? 1 : -1),
                    paddingLeft: u.left,
                    paddingRight: u.right,
                    paddingBottom: u.bottom
                })), i && t.css({
                    width: "100%",
                    height: "100%",
                    boxSizing: "border-box",
                    mozBoxSizing: "border-box",
                    webkitBoxSizing: "border-box"
                })
            }
            return r.msie && L.floor(r.version) <= 7 && (t.css({zoom: 1}), t.children(".k-menu").width(t.width())), t.parent()
        }

        function l(e) {
            var t = 1, n = arguments.length;
            for (t = 1; t < n; t++)u(e, arguments[t]);
            return e
        }

        function u(e, t) {
            var n, i, r, a, o, s = A.data.ObservableArray, l = A.data.LazyObservableArray, c = A.data.DataSource, d = A.data.HierarchicalDataSource;
            for (n in t)i = t[n], r = typeof i, a = r === $ && null !== i ? i.constructor : null, a && a !== Array && a !== s && a !== l && a !== c && a !== d ? i instanceof Date ? e[n] = new Date(i.getTime()) : te(i.clone) ? e[n] = i.clone() : (o = e[n], typeof o === $ ? e[n] = o || {} : e[n] = {}, u(e[n], i)) : r !== Q && (e[n] = i);
            return e
        }

        function c(e, t, i) {
            for (var r in t)if (t.hasOwnProperty(r) && t[r].test(e))return r;
            return i !== n ? i : e
        }

        function d(e) {
            return e.replace(/([a-z][A-Z])/g, function (e) {
                return e.charAt(0) + "-" + e.charAt(1).toLowerCase()
            })
        }

        function p(e) {
            return e.replace(/\-(\w)/g, function (e, t) {
                return t.toUpperCase()
            })
        }

        function f(t, n) {
            var i, r = {};
            return document.defaultView && document.defaultView.getComputedStyle ? (i = document.defaultView.getComputedStyle(t, ""), n && e.each(n, function (e, t) {
                r[t] = i.getPropertyValue(t)
            })) : (i = t.currentStyle, n && e.each(n, function (e, t) {
                r[t] = i[p(t)]
            })), A.size(r) || (r = i), r
        }

        function h(e) {
            if (e && e.className && "string" == typeof e.className && e.className.indexOf("k-auto-scrollable") > -1)return !0;
            var t = f(e, ["overflow"]).overflow;
            return "auto" == t || "scroll" == t
        }

        function m(t, i) {
            var r, a = B.browser.webkit, o = B.browser.mozilla, s = t instanceof e ? t[0] : t;
            if (t)return r = B.isRtl(t), i === n ? r && a ? s.scrollWidth - s.clientWidth - s.scrollLeft : Math.abs(s.scrollLeft) : void(r && a ? s.scrollLeft = s.scrollWidth - s.clientWidth - i : r && o ? s.scrollLeft = -i : s.scrollLeft = i)
        }

        function g(e) {
            var t, n = 0;
            for (t in e)e.hasOwnProperty(t) && "toJSON" != t && n++;
            return n
        }

        function v(e, n, i) {
            n || (n = "offset");
            var r = e[n]();
            if (B.mobileOS.android && (r.top -= t.scrollY, r.left -= t.scrollX), B.browser.msie && (B.pointers || B.msPointers) && !i) {
                var a = B.isRtl(e) ? 1 : -1;
                r.top -= t.pageYOffset + a * document.documentElement.scrollTop, r.left -= t.pageXOffset + a * document.documentElement.scrollLeft
            }
            return r
        }

        function _(e) {
            var t = {};
            return H("string" == typeof e ? e.split(" ") : e, function (e) {
                t[e] = this
            }), t
        }

        function w(e) {
            return new A.effects.Element(e)
        }

        function b(e, t, n, i) {
            return typeof e === G && (te(t) && (i = t, t = 400, n = !1), te(n) && (i = n, n = !1), typeof t === J && (n = t, t = 400), e = {
                effects: e,
                duration: t,
                reverse: n,
                complete: i
            }), M({
                effects: {},
                duration: 400,
                reverse: !1,
                init: V,
                teardown: V,
                hide: !1
            }, e, {completeCallback: e.complete, complete: V})
        }

        function y(t, n, i, r, a) {
            for (var o, s = 0, l = t.length; s < l; s++)o = e(t[s]), o.queue(function () {
                fe.promise(o, b(n, i, r, a))
            });
            return t
        }

        function k(e, t, n, i) {
            return t && (t = t.split(" "), H(t, function (t, n) {
                e.toggleClass(n, i)
            })), e
        }

        function x(e) {
            return ("" + e).replace(he, "&amp;").replace(me, "&lt;").replace(_e, "&gt;").replace(ge, "&quot;").replace(ve, "&#39;")
        }

        function C(e, t) {
            var i;
            return 0 === t.indexOf("data") && (t = t.substring(4), t = t.charAt(0).toLowerCase() + t.substring(1)), t = t.replace(De, "-$1"), i = e.getAttribute("data-" + A.ns + t), null === i ? i = n : "null" === i ? i = null : "true" === i ? i = !0 : "false" === i ? i = !1 : q.test(i) ? i = parseFloat(i) : Te.test(i) && !Se.test(i) && (i = new Function("return (" + i + ")")()), i
        }

        function T(t, i) {
            var r, a, o = {};
            for (r in i)a = C(t, r), a !== n && (Ce.test(r) && (a = A.template(e("#" + a).html())), o[r] = a);
            return o
        }

        function S(t, n) {
            return e.contains(t, n) ? -1 : 1
        }

        function D() {
            var t = e(this);
            return e.inArray(t.attr("data-" + A.ns + "role"), ["slider", "rangeslider"]) > -1 || t.is(":visible")
        }

        function I(e, t) {
            var n = e.nodeName.toLowerCase();
            return (/input|select|textarea|button|object/.test(n) ? !e.disabled : "a" === n ? e.href || t : t) && F(e)
        }

        function F(t) {
            return e.expr.filters.visible(t) && !e(t).parents().addBack().filter(function () {
                    return "hidden" === e.css(this, "visibility")
                }).length
        }

        function E(e, t) {
            return new E.fn.init(e, t)
        }

        var O, A = t.kendo = t.kendo || {cultures: {}}, M = e.extend, H = e.each, z = e.isArray, P = e.proxy, V = e.noop, L = Math, R = t.JSON || {}, B = {}, N = /%/, W = /\{(\d+)(:[^\}]+)?\}/g, U = /(\d+(?:\.?)\d*)px\s*(\d+(?:\.?)\d*)px\s*(\d+(?:\.?)\d*)px\s*(\d+)?/i, q = /^(\+|-?)\d+(\.?)\d*$/, j = "function", G = "string", Y = "number", $ = "object", K = "null", J = "boolean", Q = "undefined", X = {}, Z = {}, ee = [].slice;
        A.version = "2016.3.914".replace(/^\s+|\s+$/g, ""), i.extend = function (e) {
            var t, n, i = function () {
            }, r = this, a = e && e.init ? e.init : function () {
                r.apply(this, arguments)
            };
            i.prototype = r.prototype, n = a.fn = a.prototype = new i;
            for (t in e)null != e[t] && e[t].constructor === Object ? n[t] = M(!0, {}, i.prototype[t], e[t]) : n[t] = e[t];
            return n.constructor = a, a.extend = r.extend, a
        }, i.prototype._initOptions = function (e) {
            this.options = l({}, this.options, e)
        };
        var te = A.isFunction = function (e) {
            return "function" == typeof e
        }, ne = function () {
            this._defaultPrevented = !0
        }, ie = function () {
            return this._defaultPrevented === !0
        }, re = i.extend({
            init: function () {
                this._events = {}
            }, bind: function (e, t, i) {
                var r, a, o, s, l, u = this, c = typeof e === G ? [e] : e, d = typeof t === j;
                if (t === n) {
                    for (r in e)u.bind(r, e[r]);
                    return u
                }
                for (r = 0, a = c.length; r < a; r++)e = c[r], s = d ? t : t[e], s && (i && (o = s, s = function () {
                    u.unbind(e, s), o.apply(u, arguments)
                }, s.original = o), l = u._events[e] = u._events[e] || [], l.push(s));
                return u
            }, one: function (e, t) {
                return this.bind(e, t, !0)
            }, first: function (e, t) {
                var n, i, r, a, o = this, s = typeof e === G ? [e] : e, l = typeof t === j;
                for (n = 0, i = s.length; n < i; n++)e = s[n], r = l ? t : t[e], r && (a = o._events[e] = o._events[e] || [], a.unshift(r));
                return o
            }, trigger: function (e, t) {
                var n, i, r = this, a = r._events[e];
                if (a) {
                    for (t = t || {}, t.sender = r, t._defaultPrevented = !1, t.preventDefault = ne, t.isDefaultPrevented = ie, a = a.slice(), n = 0, i = a.length; n < i; n++)a[n].call(r, t);
                    return t._defaultPrevented === !0
                }
                return !1
            }, unbind: function (e, t) {
                var i, r = this, a = r._events[e];
                if (e === n)r._events = {}; else if (a)if (t)for (i = a.length - 1; i >= 0; i--)a[i] !== t && a[i].original !== t || a.splice(i, 1); else r._events[e] = [];
                return r
            }
        }), ae = /^\w+/, oe = /\$\{([^}]*)\}/g, se = /\\\}/g, le = /__CURLY__/g, ue = /\\#/g, ce = /__SHARP__/g, de = ["", "0", "00", "000", "0000"];
        O = {
            paramName: "data", useWithBlock: !0, render: function (e, t) {
                var n, i, r = "";
                for (n = 0, i = t.length; n < i; n++)r += e(t[n]);
                return r
            }, compile: function (e, t) {
                var n, i, a, o = M({}, this, t), s = o.paramName, l = s.match(ae)[0], u = o.useWithBlock, c = "var $kendoOutput, $kendoHtmlEncode = kendo.htmlEncode;";
                if (te(e))return e;
                for (c += u ? "with(" + s + "){" : "", c += "$kendoOutput=", i = e.replace(se, "__CURLY__").replace(oe, "#=$kendoHtmlEncode($1)#").replace(le, "}").replace(ue, "__SHARP__").split("#"), a = 0; a < i.length; a++)c += r(i[a], a % 2 === 0);
                c += u ? ";}" : ";", c += "return $kendoOutput;", c = c.replace(ce, "#");
                try {
                    return n = new Function(l, c), n._slotCount = Math.floor(i.length / 2), n
                } catch (d) {
                    throw new Error(A.format("Invalid template:'{0}' Generated code:'{1}'", e, c))
                }
            }
        }, function () {
            function e(e) {
                return o.lastIndex = 0, o.test(e) ? '"' + e.replace(o, function (e) {
                    var t = s[e];
                    return typeof t === G ? t : "\\u" + ("0000" + e.charCodeAt(0).toString(16)).slice(-4)
                }) + '"' : '"' + e + '"'
            }

            function t(a, o) {
                var s, u, c, d, p, f, h = n, m = o[a];
                if (m && typeof m === $ && typeof m.toJSON === j && (m = m.toJSON(a)), typeof r === j && (m = r.call(o, a, m)), f = typeof m, f === G)return e(m);
                if (f === Y)return isFinite(m) ? String(m) : K;
                if (f === J || f === K)return String(m);
                if (f === $) {
                    if (!m)return K;
                    if (n += i, p = [], "[object Array]" === l.apply(m)) {
                        for (d = m.length, s = 0; s < d; s++)p[s] = t(s, m) || K;
                        return c = 0 === p.length ? "[]" : n ? "[\n" + n + p.join(",\n" + n) + "\n" + h + "]" : "[" + p.join(",") + "]", n = h, c
                    }
                    if (r && typeof r === $)for (d = r.length, s = 0; s < d; s++)typeof r[s] === G && (u = r[s], c = t(u, m), c && p.push(e(u) + (n ? ": " : ":") + c)); else for (u in m)Object.hasOwnProperty.call(m, u) && (c = t(u, m), c && p.push(e(u) + (n ? ": " : ":") + c));
                    return c = 0 === p.length ? "{}" : n ? "{\n" + n + p.join(",\n" + n) + "\n" + h + "}" : "{" + p.join(",") + "}", n = h, c
                }
            }

            var n, i, r, o = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g, s = {
                "\b": "\\b",
                "\t": "\\t",
                "\n": "\\n",
                "\f": "\\f",
                "\r": "\\r",
                '"': '\\"',
                "\\": "\\\\"
            }, l = {}.toString;
            typeof Date.prototype.toJSON !== j && (Date.prototype.toJSON = function () {
                var e = this;
                return isFinite(e.valueOf()) ? a(e.getUTCFullYear(), 4) + "-" + a(e.getUTCMonth() + 1) + "-" + a(e.getUTCDate()) + "T" + a(e.getUTCHours()) + ":" + a(e.getUTCMinutes()) + ":" + a(e.getUTCSeconds()) + "Z" : null
            }, String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function () {
                return this.valueOf()
            }), typeof R.stringify !== j && (R.stringify = function (e, a, o) {
                var s;
                if (n = "", i = "", typeof o === Y)for (s = 0; s < o; s += 1)i += " "; else typeof o === G && (i = o);
                if (r = a, a && typeof a !== j && (typeof a !== $ || typeof a.length !== Y))throw new Error("JSON.stringify");
                return t("", {"": e})
            })
        }(), function () {
            function e(e) {
                if (e) {
                    if (e.numberFormat)return e;
                    if (typeof e === G) {
                        var t = A.cultures;
                        return t[e] || t[e.split("-")[0]] || null
                    }
                    return null
                }
                return null
            }

            function t(t) {
                return t && (t = e(t)), t || A.cultures.current
            }

            function i(e, i, r) {
                r = t(r);
                var s = r.calendars.standard, l = s.days, u = s.months;
                return i = s.patterns[i] || i, i.replace(o, function (t) {
                    var i, r, o;
                    return "d" === t ? r = e.getDate() : "dd" === t ? r = a(e.getDate()) : "ddd" === t ? r = l.namesAbbr[e.getDay()] : "dddd" === t ? r = l.names[e.getDay()] : "M" === t ? r = e.getMonth() + 1 : "MM" === t ? r = a(e.getMonth() + 1) : "MMM" === t ? r = u.namesAbbr[e.getMonth()] : "MMMM" === t ? r = u.names[e.getMonth()] : "yy" === t ? r = a(e.getFullYear() % 100) : "yyyy" === t ? r = a(e.getFullYear(), 4) : "h" === t ? r = e.getHours() % 12 || 12 : "hh" === t ? r = a(e.getHours() % 12 || 12) : "H" === t ? r = e.getHours() : "HH" === t ? r = a(e.getHours()) : "m" === t ? r = e.getMinutes() : "mm" === t ? r = a(e.getMinutes()) : "s" === t ? r = e.getSeconds() : "ss" === t ? r = a(e.getSeconds()) : "f" === t ? r = L.floor(e.getMilliseconds() / 100) : "ff" === t ? (r = e.getMilliseconds(), r > 99 && (r = L.floor(r / 10)), r = a(r)) : "fff" === t ? r = a(e.getMilliseconds(), 3) : "tt" === t ? r = e.getHours() < 12 ? s.AM[0] : s.PM[0] : "zzz" === t ? (i = e.getTimezoneOffset(), o = i < 0, r = L.abs(i / 60).toString().split(".")[0], i = L.abs(i) - 60 * r, r = (o ? "+" : "-") + a(r), r += ":" + a(i)) : "zz" !== t && "z" !== t || (r = e.getTimezoneOffset() / 60, o = r < 0, r = L.abs(r).toString().split(".")[0], r = (o ? "+" : "-") + ("zz" === t ? a(r) : r)), r !== n ? r : t.slice(1, t.length - 1)
                })
            }

            function r(e, i, r) {
                r = t(r);
                var a, o, g, v, b, y, k, x, C, T, S, D, I, F, E, O, A, M, H, z, P, V, L, R = r.numberFormat, B = R[d], N = R.decimals, W = R.pattern[0], U = [], q = e < 0, j = c, G = c, Y = -1;
                if (e === n)return c;
                if (!isFinite(e))return e;
                if (!i)return r.name.length ? e.toLocaleString() : e.toString();
                if (b = s.exec(i)) {
                    if (i = b[1].toLowerCase(), o = "c" === i, g = "p" === i, (o || g) && (R = o ? R.currency : R.percent, B = R[d], N = R.decimals, a = R.symbol, W = R.pattern[q ? 0 : 1]), v = b[2], v && (N = +v), "e" === i)return v ? e.toExponential(N) : e.toExponential();
                    if (g && (e *= 100), e = w(e, N), q = e < 0, e = e.split(d), y = e[0], k = e[1], q && (y = y.substring(1)), G = _(y, 0, y.length, R), k && (G += B + k), "n" === i && !q)return G;
                    for (e = c, T = 0, S = W.length; T < S; T++)D = W.charAt(T), e += "n" === D ? G : "$" === D || "%" === D ? a : D;
                    return e
                }
                if (q && (e = -e), (i.indexOf("'") > -1 || i.indexOf('"') > -1 || i.indexOf("\\") > -1) && (i = i.replace(l, function (e) {
                        var t = e.charAt(0).replace("\\", ""), n = e.slice(1).replace(t, "");
                        return U.push(n), m
                    })), i = i.split(";"), q && i[1])i = i[1], F = !0; else if (0 === e) {
                    if (i = i[2] || i[0], i.indexOf(f) == -1 && i.indexOf(h) == -1)return i
                } else i = i[0];
                if (z = i.indexOf("%"), P = i.indexOf("$"), g = z != -1, o = P != -1, g && (e *= 100), o && "\\" === i[P - 1] && (i = i.split("\\").join(""), o = !1), (o || g) && (R = o ? R.currency : R.percent, B = R[d], N = R.decimals, a = R.symbol), I = i.indexOf(p) > -1, I && (i = i.replace(u, c)), E = i.indexOf(d), S = i.length, E != -1 ? (k = e.toString().split("e"), k = k[1] ? w(e, Math.abs(k[1])) : k[0], k = k.split(d)[1] || c, A = i.lastIndexOf(h) - E, O = i.lastIndexOf(f) - E, M = A > -1, H = O > -1, T = k.length, M || H || (i = i.substring(0, E) + i.substring(E + 1), S = i.length, E = -1, T = 0), M && A > O ? T = A : O > A && (H && T > O ? T = O : M && T < A && (T = A)), T > -1 && (e = w(e, T))) : e = w(e), O = i.indexOf(f), V = A = i.indexOf(h), Y = O == -1 && A != -1 ? A : O != -1 && A == -1 ? O : O > A ? A : O, O = i.lastIndexOf(f), A = i.lastIndexOf(h), L = O == -1 && A != -1 ? A : O != -1 && A == -1 ? O : O > A ? O : A, Y == S && (L = Y), Y != -1) {
                    for (G = e.toString().split(d), y = G[0], k = G[1] || c, x = y.length, C = k.length, q && e * -1 >= 0 && (q = !1), e = i.substring(0, Y), q && !F && (e += "-"), T = Y; T < S; T++) {
                        if (D = i.charAt(T), E == -1) {
                            if (L - T < x) {
                                e += y;
                                break
                            }
                        } else if (A != -1 && A < T && (j = c), E - T <= x && E - T > -1 && (e += y, T = E), E === T) {
                            e += (k ? B : c) + k, T += L - E + 1;
                            continue
                        }
                        D === h ? (e += D, j = D) : D === f && (e += j)
                    }
                    if (I && (e = _(e, Y + (q ? 1 : 0), Math.max(L, x + Y), R)), L >= Y && (e += i.substring(L + 1)), o || g) {
                        for (G = c, T = 0, S = e.length; T < S; T++)D = e.charAt(T), G += "$" === D || "%" === D ? a : D;
                        e = G
                    }
                    if (S = U.length)for (T = 0; T < S; T++)e = e.replace(m, U[T])
                }
                return e
            }

            var o = /dddd|ddd|dd|d|MMMM|MMM|MM|M|yyyy|yy|HH|H|hh|h|mm|m|fff|ff|f|tt|ss|s|zzz|zz|z|"[^"]*"|'[^']*'/g, s = /^(n|c|p|e)(\d*)$/i, l = /(\\.)|(['][^']*[']?)|(["][^"]*["]?)/g, u = /\,/g, c = "", d = ".", p = ",", f = "#", h = "0", m = "??", g = "en-US", v = {}.toString;
            A.cultures["en-US"] = {
                name: g,
                numberFormat: {
                    pattern: ["-n"],
                    decimals: 2,
                    ",": ",",
                    ".": ".",
                    groupSize: [3],
                    percent: {pattern: ["-n %", "n %"], decimals: 2, ",": ",", ".": ".", groupSize: [3], symbol: "%"},
                    currency: {
                        name: "US Dollar",
                        abbr: "USD",
                        pattern: ["($n)", "$n"],
                        decimals: 2,
                        ",": ",",
                        ".": ".",
                        groupSize: [3],
                        symbol: "$"
                    }
                },
                calendars: {
                    standard: {
                        days: {
                            names: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                            namesAbbr: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                            namesShort: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
                        },
                        months: {
                            names: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                            namesAbbr: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                        },
                        AM: ["AM", "am", "AM"],
                        PM: ["PM", "pm", "PM"],
                        patterns: {
                            d: "M/d/yyyy",
                            D: "dddd, MMMM dd, yyyy",
                            F: "dddd, MMMM dd, yyyy h:mm:ss tt",
                            g: "M/d/yyyy h:mm tt",
                            G: "M/d/yyyy h:mm:ss tt",
                            m: "MMMM dd",
                            M: "MMMM dd",
                            s: "yyyy'-'MM'-'ddTHH':'mm':'ss",
                            t: "h:mm tt",
                            T: "h:mm:ss tt",
                            u: "yyyy'-'MM'-'dd HH':'mm':'ss'Z'",
                            y: "MMMM, yyyy",
                            Y: "MMMM, yyyy"
                        },
                        "/": "/",
                        ":": ":",
                        firstDay: 0,
                        twoDigitYearMax: 2029
                    }
                }
            }, A.culture = function (t) {
                var i, r = A.cultures;
                return t === n ? r.current : (i = e(t) || r[g], i.calendar = i.calendars.standard, r.current = i, void 0)
            }, A.findCulture = e, A.getCulture = t, A.culture(g);
            var _ = function (e, t, i, r) {
                var a, o, s, l, u, c, f = e.indexOf(r[d]), h = r.groupSize.slice(), m = h.shift();
                if (i = f !== -1 ? f : i + 1, a = e.substring(t, i), o = a.length, o >= m) {
                    for (s = o, l = []; s > -1;)if (u = a.substring(s - m, s), u && l.push(u), s -= m, c = h.shift(), m = c !== n ? c : m, 0 === m) {
                        l.push(a.substring(0, s));
                        break
                    }
                    a = l.reverse().join(r[p]), e = e.substring(0, t) + a + e.substring(i)
                }
                return e
            }, w = function (e, t) {
                return t = t || 0, e = e.toString().split("e"), e = Math.round(+(e[0] + "e" + (e[1] ? +e[1] + t : t))), e = e.toString().split("e"), e = +(e[0] + "e" + (e[1] ? +e[1] - t : -t)), e.toFixed(Math.min(t, 20))
            }, b = function (e, t, a) {
                if (t) {
                    if ("[object Date]" === v.call(e))return i(e, t, a);
                    if (typeof e === Y)return r(e, t, a)
                }
                return e !== n ? e : ""
            };
            A.format = function (e) {
                var t = arguments;
                return e.replace(W, function (e, n, i) {
                    var r = t[parseInt(n, 10) + 1];
                    return b(r, i ? i.substring(1) : "")
                })
            }, A._extractFormat = function (e) {
                return "{0:" === e.slice(0, 3) && (e = e.slice(3, e.length - 1)), e
            }, A._activeElement = function () {
                try {
                    return document.activeElement
                } catch (e) {
                    return document.documentElement.activeElement
                }
            }, A._round = w, A.toString = b
        }(), function () {
            function t(e, t, n) {
                return !(e >= t && e <= n)
            }

            function i(e) {
                return e.charAt(0)
            }

            function r(t) {
                return e.map(t, i)
            }

            function a(e, t) {
                t || 23 !== e.getHours() || e.setHours(e.getHours() + 2)
            }

            function o(e) {
                for (var t = 0, n = e.length, i = []; t < n; t++)i[t] = (e[t] + "").toLowerCase();
                return i
            }

            function s(e) {
                var t, n = {};
                for (t in e)n[t] = o(e[t]);
                return n
            }

            function l(e, i, o) {
                if (!e)return null;
                var l, u, c, d, p, m, g, v, _, b, y, k, x, C = function (e) {
                    for (var t = 0; i[V] === e;)t++, V++;
                    return t > 0 && (V -= 1), t
                }, T = function (t) {
                    var n = w[t] || new RegExp("^\\d{1," + t + "}"), i = e.substr(L, t).match(n);
                    return i ? (i = i[0], L += i.length, parseInt(i, 10)) : null
                }, S = function (t, n) {
                    for (var i, r, a, o = 0, s = t.length, l = 0, u = 0; o < s; o++)i = t[o], r = i.length, a = e.substr(L, r), n && (a = a.toLowerCase()), a == i && r > l && (l = r, u = o);
                    return l ? (L += l, u + 1) : null
                }, D = function () {
                    var t = !1;
                    return e.charAt(L) === i[V] && (L++, t = !0), t
                }, I = o.calendars.standard, F = null, E = null, O = null, M = null, H = null, z = null, P = null, V = 0, L = 0, R = !1, B = new Date, N = I.twoDigitYearMax || 2029, W = B.getFullYear();
                for (i || (i = "d"), d = I.patterns[i], d && (i = d), i = i.split(""), c = i.length; V < c; V++)if (l = i[V], R)"'" === l ? R = !1 : D(); else if ("d" === l) {
                    if (u = C("d"), I._lowerDays || (I._lowerDays = s(I.days)), null !== O && u > 2)continue;
                    if (O = u < 3 ? T(2) : S(I._lowerDays[3 == u ? "namesAbbr" : "names"], !0), null === O || t(O, 1, 31))return null
                } else if ("M" === l) {
                    if (u = C("M"), I._lowerMonths || (I._lowerMonths = s(I.months)), E = u < 3 ? T(2) : S(I._lowerMonths[3 == u ? "namesAbbr" : "names"], !0), null === E || t(E, 1, 12))return null;
                    E -= 1
                } else if ("y" === l) {
                    if (u = C("y"), F = T(u), null === F)return null;
                    2 == u && ("string" == typeof N && (N = W + parseInt(N, 10)), F = W - W % 100 + F, F > N && (F -= 100))
                } else if ("h" === l) {
                    if (C("h"), M = T(2), 12 == M && (M = 0), null === M || t(M, 0, 11))return null
                } else if ("H" === l) {
                    if (C("H"), M = T(2), null === M || t(M, 0, 23))return null
                } else if ("m" === l) {
                    if (C("m"), H = T(2), null === H || t(H, 0, 59))return null
                } else if ("s" === l) {
                    if (C("s"), z = T(2), null === z || t(z, 0, 59))return null
                } else if ("f" === l) {
                    if (u = C("f"), x = e.substr(L, u).match(w[3]), P = T(u), null !== P && (P = parseFloat("0." + x[0], 10), P = A._round(P, 3), P *= 1e3), null === P || t(P, 0, 999))return null
                } else if ("t" === l) {
                    if (u = C("t"), v = I.AM, _ = I.PM, 1 === u && (v = r(v), _ = r(_)), p = S(_), !p && !S(v))return null
                } else if ("z" === l) {
                    if (m = !0, u = C("z"), "Z" === e.substr(L, 1)) {
                        D();
                        continue
                    }
                    if (g = e.substr(L, 6).match(u > 2 ? h : f), !g)return null;
                    if (g = g[0].split(":"), b = g[0], y = g[1], !y && b.length > 3 && (L = b.length - 2, y = b.substring(L), b = b.substring(0, L)), b = parseInt(b, 10), t(b, -12, 13))return null;
                    if (u > 2 && (y = parseInt(y, 10), isNaN(y) || t(y, 0, 59)))return null
                } else if ("'" === l)R = !0, D(); else if (!D())return null;
                return k = null !== M || null !== H || z || null, null === F && null === E && null === O && k ? (F = W, E = B.getMonth(), O = B.getDate()) : (null === F && (F = W), null === O && (O = 1)), p && M < 12 && (M += 12), m ? (b && (M += -b), y && (H += -y), e = new Date(Date.UTC(F, E, O, M, H, z, P))) : (e = new Date(F, E, O, M, H, z, P), a(e, M)), F < 100 && e.setFullYear(F), e.getDate() !== O && m === n ? null : e
            }

            function u(e) {
                var t = "-" === e.substr(0, 1) ? -1 : 1;
                return e = e.substring(1), e = 60 * parseInt(e.substr(0, 2), 10) + parseInt(e.substring(2), 10), t * e
            }

            function c(e) {
                var t, n, i, r = L.max(v.length, _.length), a = e.calendar.patterns, o = [];
                for (i = 0; i < r; i++) {
                    for (t = v[i], n = 0; n < t.length; n++)o.push(a[t[n]]);
                    o = o.concat(_[i])
                }
                return o
            }

            var d = /\u00A0/g, p = /[eE][\-+]?[0-9]+/, f = /[+|\-]\d{1,2}/, h = /[+|\-]\d{1,2}:?\d{2}/, m = /^\/Date\((.*?)\)\/$/, g = /[+-]\d*/, v = [[], ["G", "g", "F"], ["D", "d", "y", "m", "T", "t"]], _ = [["yyyy-MM-ddTHH:mm:ss.fffffffzzz", "yyyy-MM-ddTHH:mm:ss.fffffff", "yyyy-MM-ddTHH:mm:ss.fffzzz", "yyyy-MM-ddTHH:mm:ss.fff", "ddd MMM dd yyyy HH:mm:ss", "yyyy-MM-ddTHH:mm:sszzz", "yyyy-MM-ddTHH:mmzzz", "yyyy-MM-ddTHH:mmzz", "yyyy-MM-ddTHH:mm:ss", "yyyy-MM-dd HH:mm:ss", "yyyy/MM/dd HH:mm:ss"], ["yyyy-MM-ddTHH:mm", "yyyy-MM-dd HH:mm", "yyyy/MM/dd HH:mm"], ["yyyy/MM/dd", "yyyy-MM-dd", "HH:mm:ss", "HH:mm"]], w = {
                2: /^\d{1,2}/,
                3: /^\d{1,3}/,
                4: /^\d{4}/
            }, b = {}.toString;
            A.parseDate = function (e, t, n) {
                if ("[object Date]" === b.call(e))return e;
                var i, r, a = 0, o = null;
                if (e && 0 === e.indexOf("/D") && (o = m.exec(e)))return o = o[1], r = g.exec(o.substring(1)), o = new Date(parseInt(o, 10)), r && (r = u(r[0]), o = A.timezone.apply(o, 0), o = A.timezone.convert(o, 0, -1 * r)), o;
                for (n = A.getCulture(n), t || (t = c(n)), t = z(t) ? t : [t], i = t.length; a < i; a++)if (o = l(e, t[a], n))return o;
                return o
            }, A.parseInt = function (e, t) {
                var n = A.parseFloat(e, t);
                return n && (n = 0 | n), n
            }, A.parseFloat = function (e, t, n) {
                if (!e && 0 !== e)return null;
                if (typeof e === Y)return e;
                e = e.toString(), t = A.getCulture(t);
                var i, r, a = t.numberFormat, o = a.percent, s = a.currency, l = s.symbol, u = o.symbol, c = e.indexOf("-");
                return p.test(e) ? (e = parseFloat(e.replace(a["."], ".")), isNaN(e) && (e = null), e) : c > 0 ? null : (c = c > -1, e.indexOf(l) > -1 || n && n.toLowerCase().indexOf("c") > -1 ? (a = s, i = a.pattern[0].replace("$", l).split("n"), e.indexOf(i[0]) > -1 && e.indexOf(i[1]) > -1 && (e = e.replace(i[0], "").replace(i[1], ""), c = !0)) : e.indexOf(u) > -1 && (r = !0, a = o, l = u), e = e.replace("-", "").replace(l, "").replace(d, " ").split(a[","].replace(d, " ")).join("").replace(a["."], "."), e = parseFloat(e), isNaN(e) ? e = null : c && (e *= -1), e && r && (e /= 100), e)
            }
        }(), function () {
            B._scrollbar = n, B.scrollbar = function (e) {
                if (isNaN(B._scrollbar) || e) {
                    var t, n = document.createElement("div");
                    return n.style.cssText = "overflow:scroll;overflow-x:hidden;zoom:1;clear:both;display:block", n.innerHTML = "&nbsp;", document.body.appendChild(n), B._scrollbar = t = n.offsetWidth - n.scrollWidth, document.body.removeChild(n), t
                }
                return B._scrollbar
            }, B.isRtl = function (t) {
                return e(t).closest(".k-rtl").length > 0
            };
            var i = document.createElement("table");
            try {
                i.innerHTML = "<tr><td></td></tr>", B.tbodyInnerHtml = !0
            } catch (r) {
                B.tbodyInnerHtml = !1
            }
            B.touch = "ontouchstart" in t, B.msPointers = t.MSPointerEvent, B.pointers = t.PointerEvent;
            var a = B.transitions = !1, o = B.transforms = !1, s = "HTMLElement" in t ? HTMLElement.prototype : [];
            B.hasHW3D = "WebKitCSSMatrix" in t && "m11" in new t.WebKitCSSMatrix || "MozPerspective" in document.documentElement.style || "msPerspective" in document.documentElement.style, H(["Moz", "webkit", "O", "ms"], function () {
                var e = this.toString(), t = typeof i.style[e + "Transition"] === G;
                if (t || typeof i.style[e + "Transform"] === G) {
                    var n = e.toLowerCase();
                    return o = {
                        css: "ms" != n ? "-" + n + "-" : "",
                        prefix: e,
                        event: "o" === n || "webkit" === n ? n : ""
                    }, t && (a = o, a.event = a.event ? a.event + "TransitionEnd" : "transitionend"), !1
                }
            }), i = null, B.transforms = o, B.transitions = a, B.devicePixelRatio = t.devicePixelRatio === n ? 1 : t.devicePixelRatio;
            try {
                B.screenWidth = t.outerWidth || t.screen ? t.screen.availWidth : t.innerWidth, B.screenHeight = t.outerHeight || t.screen ? t.screen.availHeight : t.innerHeight
            } catch (r) {
                B.screenWidth = t.screen.availWidth, B.screenHeight = t.screen.availHeight
            }
            B.detectOS = function (e) {
                var n, i = !1, r = [], a = !/mobile safari/i.test(e), o = {
                    wp: /(Windows Phone(?: OS)?)\s(\d+)\.(\d+(\.\d+)?)/,
                    fire: /(Silk)\/(\d+)\.(\d+(\.\d+)?)/,
                    android: /(Android|Android.*(?:Opera|Firefox).*?\/)\s*(\d+)\.(\d+(\.\d+)?)/,
                    iphone: /(iPhone|iPod).*OS\s+(\d+)[\._]([\d\._]+)/,
                    ipad: /(iPad).*OS\s+(\d+)[\._]([\d_]+)/,
                    meego: /(MeeGo).+NokiaBrowser\/(\d+)\.([\d\._]+)/,
                    webos: /(webOS)\/(\d+)\.(\d+(\.\d+)?)/,
                    blackberry: /(BlackBerry|BB10).*?Version\/(\d+)\.(\d+(\.\d+)?)/,
                    playbook: /(PlayBook).*?Tablet\s*OS\s*(\d+)\.(\d+(\.\d+)?)/,
                    windows: /(MSIE)\s+(\d+)\.(\d+(\.\d+)?)/,
                    tizen: /(tizen).*?Version\/(\d+)\.(\d+(\.\d+)?)/i,
                    sailfish: /(sailfish).*rv:(\d+)\.(\d+(\.\d+)?).*firefox/i,
                    ffos: /(Mobile).*rv:(\d+)\.(\d+(\.\d+)?).*Firefox/
                }, s = {
                    ios: /^i(phone|pad|pod)$/i,
                    android: /^android|fire$/i,
                    blackberry: /^blackberry|playbook/i,
                    windows: /windows/,
                    wp: /wp/,
                    flat: /sailfish|ffos|tizen/i,
                    meego: /meego/
                }, l = {tablet: /playbook|ipad|fire/i}, u = {
                    omini: /Opera\sMini/i,
                    omobile: /Opera\sMobi/i,
                    firefox: /Firefox|Fennec/i,
                    mobilesafari: /version\/.*safari/i,
                    ie: /MSIE|Windows\sPhone/i,
                    chrome: /chrome|crios/i,
                    webkit: /webkit/i
                };
                for (var d in o)if (o.hasOwnProperty(d) && (r = e.match(o[d]))) {
                    if ("windows" == d && "plugins" in navigator)return !1;
                    i = {}, i.device = d, i.tablet = c(d, l, !1), i.browser = c(e, u, "default"), i.name = c(d, s), i[i.name] = !0, i.majorVersion = r[2], i.minorVersion = r[3].replace("_", "."), n = i.minorVersion.replace(".", "").substr(0, 2), i.flatVersion = i.majorVersion + n + new Array(3 - (n.length < 3 ? n.length : 2)).join("0"), i.cordova = typeof t.PhoneGap !== Q || typeof t.cordova !== Q, i.appMode = t.navigator.standalone || /file|local|wmapp/.test(t.location.protocol) || i.cordova, i.android && (B.devicePixelRatio < 1.5 && i.flatVersion < 400 || a) && (B.screenWidth > 800 || B.screenHeight > 800) && (i.tablet = d);
                    break
                }
                return i
            };
            var l = B.mobileOS = B.detectOS(navigator.userAgent);
            B.wpDevicePixelRatio = l.wp ? screen.width / 320 : 0, B.kineticScrollNeeded = l && (B.touch || B.msPointers || B.pointers), B.hasNativeScrolling = !1, (l.ios || l.android && l.majorVersion > 2 || l.wp) && (B.hasNativeScrolling = l), B.delayedClick = function () {
                if (B.touch) {
                    if (l.ios)return !0;
                    if (l.android)return !B.browser.chrome || !(B.browser.version < 32) && !(e("meta[name=viewport]").attr("content") || "").match(/user-scalable=no/i)
                }
                return !1
            }, B.mouseAndTouchPresent = B.touch && !(B.mobileOS.ios || B.mobileOS.android), B.detectBrowser = function (e) {
                var t = !1, n = [], i = {
                    edge: /(edge)[ \/]([\w.]+)/i,
                    webkit: /(chrome)[ \/]([\w.]+)/i,
                    safari: /(webkit)[ \/]([\w.]+)/i,
                    opera: /(opera)(?:.*version|)[ \/]([\w.]+)/i,
                    msie: /(msie\s|trident.*? rv:)([\w.]+)/i,
                    mozilla: /(mozilla)(?:.*? rv:([\w.]+)|)/i
                };
                for (var r in i)if (i.hasOwnProperty(r) && (n = e.match(i[r]))) {
                    t = {}, t[r] = !0, t[n[1].toLowerCase().split(" ")[0].split("/")[0]] = !0, t.version = parseInt(document.documentMode || n[2], 10);
                    break
                }
                return t
            }, B.browser = B.detectBrowser(navigator.userAgent), B.detectClipboardAccess = function () {
                var e = {
                    copy: !!document.queryCommandSupported && document.queryCommandSupported("copy"),
                    cut: !!document.queryCommandSupported && document.queryCommandSupported("cut"),
                    paste: !!document.queryCommandSupported && document.queryCommandSupported("paste")
                };
                return B.browser.chrome && (e.paste = !1, B.browser.version >= 43 && (e.copy = !0, e.cut = !0)), e
            }, B.clipboard = B.detectClipboardAccess(), B.zoomLevel = function () {
                try {
                    var e = B.browser, n = 0, i = document.documentElement;
                    return e.msie && 11 == e.version && i.scrollHeight > i.clientHeight && !B.touch && (n = B.scrollbar()), B.touch ? i.clientWidth / t.innerWidth : e.msie && e.version >= 10 ? ((top || t).document.documentElement.offsetWidth + n) / (top || t).innerWidth : 1
                } catch (r) {
                    return 1
                }
            }, B.cssBorderSpacing = "undefined" != typeof document.documentElement.style.borderSpacing && !(B.browser.msie && B.browser.version < 8), function (t) {
                var n = "", i = e(document.documentElement), r = parseInt(t.version, 10);
                t.msie ? n = "ie" : t.mozilla ? n = "ff" : t.safari ? n = "safari" : t.webkit ? n = "webkit" : t.opera ? n = "opera" : t.edge && (n = "edge"), n && (n = "k-" + n + " k-" + n + r), B.mobileOS && (n += " k-mobile"), i.addClass(n)
            }(B.browser), B.eventCapture = document.documentElement.addEventListener;
            var u = document.createElement("input");
            B.placeholder = "placeholder" in u, B.propertyChangeEvent = "onpropertychange" in u, B.input = function () {
                for (var e, t = ["number", "date", "time", "month", "week", "datetime", "datetime-local"], n = t.length, i = "test", r = {}, a = 0; a < n; a++)e = t[a], u.setAttribute("type", e), u.value = i, r[e.replace("-", "")] = "text" !== u.type && u.value !== i;
                return r
            }(), u.style.cssText = "float:left;", B.cssFloat = !!u.style.cssFloat, u = null, B.stableSort = function () {
                for (var e = 513, t = [{index: 0, field: "b"}], n = 1; n < e; n++)t.push({index: n, field: "a"});
                return t.sort(function (e, t) {
                    return e.field > t.field ? 1 : e.field < t.field ? -1 : 0
                }), 1 === t[0].index
            }(), B.matchesSelector = s.webkitMatchesSelector || s.mozMatchesSelector || s.msMatchesSelector || s.oMatchesSelector || s.matchesSelector || s.matches || function (t) {
                    for (var n = document.querySelectorAll ? (this.parentNode || document).querySelectorAll(t) || [] : e(t), i = n.length; i--;)if (n[i] == this)return !0;
                    return !1
                }, B.pushState = t.history && t.history.pushState;
            var d = document.documentMode;
            B.hashChange = "onhashchange" in t && !(B.browser.msie && (!d || d <= 8)), B.customElements = "registerElement" in t.document
        }();
        var pe = {
            left: {reverse: "right"},
            right: {reverse: "left"},
            down: {reverse: "up"},
            up: {reverse: "down"},
            top: {reverse: "bottom"},
            bottom: {reverse: "top"},
            "in": {reverse: "out"},
            out: {reverse: "in"}
        }, fe = {};
        e.extend(fe, {
            enabled: !0, Element: function (t) {
                this.element = e(t)
            }, promise: function (e, t) {
                e.is(":visible") || e.css({display: e.data("olddisplay") || "block"}).css("display"), t.hide && e.data("olddisplay", e.css("display")).hide(), t.init && t.init(), t.completeCallback && t.completeCallback(e), e.dequeue()
            }, disable: function () {
                this.enabled = !1, this.promise = this.promiseShim
            }, enable: function () {
                this.enabled = !0, this.promise = this.animatedPromise
            }
        }), fe.promiseShim = fe.promise, "kendoAnimate" in e.fn || M(e.fn, {
            kendoStop: function (e, t) {
                return this.stop(e, t)
            }, kendoAnimate: function (e, t, n, i) {
                return y(this, e, t, n, i)
            }, kendoAddClass: function (e, t) {
                return A.toggleClass(this, e, t, !0)
            }, kendoRemoveClass: function (e, t) {
                return A.toggleClass(this, e, t, !1)
            }, kendoToggleClass: function (e, t, n) {
                return A.toggleClass(this, e, t, n)
            }
        });
        var he = /&/g, me = /</g, ge = /"/g, ve = /'/g, _e = />/g, we = function (e) {
            return e.target
        };
        B.touch && (we = function (e) {
            var t = "originalEvent" in e ? e.originalEvent.changedTouches : "changedTouches" in e ? e.changedTouches : null;
            return t ? document.elementFromPoint(t[0].clientX, t[0].clientY) : e.target
        }, H(["swipe", "swipeLeft", "swipeRight", "swipeUp", "swipeDown", "doubleTap", "tap"], function (t, n) {
            e.fn[n] = function (e) {
                return this.bind(n, e)
            }
        })), B.touch ? B.mobileOS ? (B.mousedown = "touchstart", B.mouseup = "touchend", B.mousemove = "touchmove", B.mousecancel = "touchcancel", B.click = "touchend", B.resize = "orientationchange") : (B.mousedown = "mousedown touchstart", B.mouseup = "mouseup touchend", B.mousemove = "mousemove touchmove", B.mousecancel = "mouseleave touchcancel", B.click = "click", B.resize = "resize") : B.pointers ? (B.mousemove = "pointermove", B.mousedown = "pointerdown", B.mouseup = "pointerup", B.mousecancel = "pointercancel", B.click = "pointerup", B.resize = "orientationchange resize") : B.msPointers ? (B.mousemove = "MSPointerMove", B.mousedown = "MSPointerDown", B.mouseup = "MSPointerUp", B.mousecancel = "MSPointerCancel", B.click = "MSPointerUp", B.resize = "orientationchange resize") : (B.mousemove = "mousemove", B.mousedown = "mousedown", B.mouseup = "mouseup", B.mousecancel = "mouseleave", B.click = "click", B.resize = "resize");
        var be = function (e, t) {
            var n, i, r, a, o = t || "d", s = 1;
            for (i = 0, r = e.length; i < r; i++)a = e[i], "" !== a && (n = a.indexOf("["), 0 !== n && (n == -1 ? a = "." + a : (s++, a = "." + a.substring(0, n) + " || {})" + a.substring(n))), s++, o += a + (i < r - 1 ? " || {})" : ")"));
            return new Array(s).join("(") + o
        }, ye = /^([a-z]+:)?\/\//i;
        M(A, {
            widgets: [],
            _widgetRegisteredCallbacks: [],
            ui: A.ui || {},
            fx: A.fx || w,
            effects: A.effects || fe,
            mobile: A.mobile || {},
            data: A.data || {},
            dataviz: A.dataviz || {},
            drawing: A.drawing || {},
            spreadsheet: {messages: {}},
            keys: {
                INSERT: 45,
                DELETE: 46,
                BACKSPACE: 8,
                TAB: 9,
                ENTER: 13,
                ESC: 27,
                LEFT: 37,
                UP: 38,
                RIGHT: 39,
                DOWN: 40,
                END: 35,
                HOME: 36,
                SPACEBAR: 32,
                PAGEUP: 33,
                PAGEDOWN: 34,
                F2: 113,
                F10: 121,
                F12: 123,
                NUMPAD_PLUS: 107,
                NUMPAD_MINUS: 109,
                NUMPAD_DOT: 110
            },
            support: A.support || B,
            animate: A.animate || y,
            ns: "",
            attr: function (e) {
                return "data-" + A.ns + e
            },
            getShadows: o,
            wrap: s,
            deepExtend: l,
            getComputedStyles: f,
            webComponents: A.webComponents || [],
            isScrollable: h,
            scrollLeft: m,
            size: g,
            toCamelCase: p,
            toHyphens: d,
            getOffset: A.getOffset || v,
            parseEffects: A.parseEffects || _,
            toggleClass: A.toggleClass || k,
            directions: A.directions || pe,
            Observable: re,
            Class: i,
            Template: O,
            template: P(O.compile, O),
            render: P(O.render, O),
            stringify: P(R.stringify, R),
            eventTarget: we,
            htmlEncode: x,
            isLocalUrl: function (e) {
                return e && !ye.test(e)
            },
            expr: function (e, t, n) {
                return e = e || "", typeof t == G && (n = t, t = !1), n = n || "d", e && "[" !== e.charAt(0) && (e = "." + e), t ? (e = e.replace(/"([^.]*)\.([^"]*)"/g, '"$1_$DOT$_$2"'), e = e.replace(/'([^.]*)\.([^']*)'/g, "'$1_$DOT$_$2'"), e = be(e.split("."), n), e = e.replace(/_\$DOT\$_/g, ".")) : e = n + e, e
            },
            getter: function (e, t) {
                var n = e + t;
                return X[n] = X[n] || new Function("d", "return " + A.expr(e, t))
            },
            setter: function (e) {
                return Z[e] = Z[e] || new Function("d,value", A.expr(e) + "=value")
            },
            accessor: function (e) {
                return {get: A.getter(e), set: A.setter(e)}
            },
            guid: function () {
                var e, t, n = "";
                for (e = 0; e < 32; e++)t = 16 * L.random() | 0, 8 != e && 12 != e && 16 != e && 20 != e || (n += "-"), n += (12 == e ? 4 : 16 == e ? 3 & t | 8 : t).toString(16);
                return n
            },
            roleSelector: function (e) {
                return e.replace(/(\S+)/g, "[" + A.attr("role") + "=$1],").slice(0, -1)
            },
            directiveSelector: function (e) {
                var t = e.split(" ");
                if (t)for (var n = 0; n < t.length; n++)"view" != t[n] && (t[n] = t[n].replace(/(\w*)(view|bar|strip|over)$/, "$1-$2"));
                return t.join(" ").replace(/(\S+)/g, "kendo-mobile-$1,").slice(0, -1)
            },
            triggeredByInput: function (e) {
                return /^(label|input|textarea|select)$/i.test(e.target.tagName)
            },
            onWidgetRegistered: function (e) {
                for (var t = 0, n = A.widgets.length; t < n; t++)e(A.widgets[t]);
                A._widgetRegisteredCallbacks.push(e)
            },
            logToConsole: function (e, n) {
                var i = t.console;
                !A.suppressLog && "undefined" != typeof i && i.log && i[n || "log"](e)
            }
        });
        var ke = re.extend({
            init: function (e, t) {
                var n = this;
                n.element = A.jQuery(e).handler(n), n.angular("init", t), re.fn.init.call(n);
                var i = t ? t.dataSource : null;
                i && (t = M({}, t, {dataSource: {}})), t = n.options = M(!0, {}, n.options, t), i && (t.dataSource = i), n.element.attr(A.attr("role")) || n.element.attr(A.attr("role"), (t.name || "").toLowerCase()),
                    n.element.data("kendo" + t.prefix + t.name, n), n.bind(n.events, t)
            }, events: [], options: {prefix: ""}, _hasBindingTarget: function () {
                return !!this.element[0].kendoBindingTarget
            }, _tabindex: function (e) {
                e = e || this.wrapper;
                var t = this.element, n = "tabindex", i = e.attr(n) || t.attr(n);
                t.removeAttr(n), e.attr(n, isNaN(i) ? 0 : i)
            }, setOptions: function (t) {
                this._setEvents(t), e.extend(this.options, t)
            }, _setEvents: function (e) {
                for (var t, n = this, i = 0, r = n.events.length; i < r; i++)t = n.events[i], n.options[t] && e[t] && n.unbind(t, n.options[t]);
                n.bind(n.events, e)
            }, resize: function (e) {
                var t = this.getSize(), n = this._size;
                (e || (t.width > 0 || t.height > 0) && (!n || t.width !== n.width || t.height !== n.height)) && (this._size = t, this._resize(t, e), this.trigger("resize", t))
            }, getSize: function () {
                return A.dimensions(this.element)
            }, size: function (e) {
                return e ? void this.setSize(e) : this.getSize()
            }, setSize: e.noop, _resize: e.noop, destroy: function () {
                var e = this;
                e.element.removeData("kendo" + e.options.prefix + e.options.name), e.element.removeData("handler"), e.unbind()
            }, _destroy: function () {
                this.destroy()
            }, angular: function () {
            }, _muteAngularRebind: function (e) {
                this._muteRebind = !0, e.call(this), this._muteRebind = !1
            }
        }), xe = ke.extend({
            dataItems: function () {
                return this.dataSource.flatView()
            }, _angularItems: function (t) {
                var n = this;
                n.angular(t, function () {
                    return {
                        elements: n.items(), data: e.map(n.dataItems(), function (e) {
                            return {dataItem: e}
                        })
                    }
                })
            }
        });
        A.dimensions = function (e, t) {
            var n = e[0];
            return t && e.css(t), {width: n.offsetWidth, height: n.offsetHeight}
        }, A.notify = V;
        var Ce = /template$/i, Te = /^\s*(?:\{(?:.|\r\n|\n)*\}|\[(?:.|\r\n|\n)*\])\s*$/, Se = /^\{(\d+)(:[^\}]+)?\}|^\[[A-Za-z_]*\]$/, De = /([A-Z])/g;
        A.initWidget = function (i, r, a) {
            var o, s, l, u, c, d, p, f, h, m;
            if (a ? a.roles && (a = a.roles) : a = A.ui.roles, i = i.nodeType ? i : i[0], d = i.getAttribute("data-" + A.ns + "role")) {
                h = d.indexOf(".") === -1, l = h ? a[d] : A.getter(d)(t);
                var g = e(i).data(), v = l ? "kendo" + l.fn.options.prefix + l.fn.options.name : "";
                m = h ? new RegExp("^kendo.*" + d + "$", "i") : new RegExp("^" + v + "$", "i");
                for (var _ in g)if (_.match(m)) {
                    if (_ !== v)return g[_];
                    o = g[_]
                }
                if (l) {
                    for (f = C(i, "dataSource"), r = e.extend({}, T(i, l.fn.options), r), f && (typeof f === G ? r.dataSource = A.getter(f)(t) : r.dataSource = f), u = 0, c = l.fn.events.length; u < c; u++)s = l.fn.events[u], p = C(i, s), p !== n && (r[s] = A.getter(p)(t));
                    return o ? e.isEmptyObject(r) || o.setOptions(r) : o = new l(i, r), o
                }
            }
        }, A.rolesFromNamespaces = function (e) {
            var t, n, i = [];
            for (e[0] || (e = [A.ui, A.dataviz.ui]), t = 0, n = e.length; t < n; t++)i[t] = e[t].roles;
            return M.apply(null, [{}].concat(i.reverse()))
        }, A.init = function (t) {
            var n = A.rolesFromNamespaces(ee.call(arguments, 1));
            e(t).find("[data-" + A.ns + "role]").addBack().each(function () {
                A.initWidget(this, {}, n)
            })
        }, A.destroy = function (t) {
            e(t).find("[data-" + A.ns + "role]").addBack().each(function () {
                var t = e(this).data();
                for (var n in t)0 === n.indexOf("kendo") && typeof t[n].destroy === j && t[n].destroy()
            })
        }, A.resize = function (t, n) {
            var i = e(t).find("[data-" + A.ns + "role]").addBack().filter(D);
            if (i.length) {
                var r = e.makeArray(i);
                r.sort(S), e.each(r, function () {
                    var t = A.widgetInstance(e(this));
                    t && t.resize(n)
                })
            }
        }, A.parseOptions = T, M(A.ui, {
            Widget: ke, DataBoundWidget: xe, roles: {}, progress: function (t, n) {
                var i, r, a, o, s = t.find(".k-loading-mask"), l = A.support, u = l.browser;
                n ? s.length || (i = l.isRtl(t), r = i ? "right" : "left", o = t.scrollLeft(), a = u.webkit && i ? t[0].scrollWidth - t.width() - 2 * o : 0, s = e("<div class='k-loading-mask'><span class='k-loading-text'>" + A.ui.progress.messages.loading + "</span><div class='k-loading-image'/><div class='k-loading-color'/></div>").width("100%").height("100%").css("top", t.scrollTop()).css(r, Math.abs(o) + a).prependTo(t)) : s && s.remove()
            }, plugin: function (t, i, r) {
                var a, o = t.fn.options.name;
                i = i || A.ui, r = r || "", i[o] = t, i.roles[o.toLowerCase()] = t, a = "getKendo" + r + o, o = "kendo" + r + o;
                var s = {name: o, widget: t, prefix: r || ""};
                A.widgets.push(s);
                for (var l = 0, u = A._widgetRegisteredCallbacks.length; l < u; l++)A._widgetRegisteredCallbacks[l](s);
                e.fn[o] = function (i) {
                    var r, a = this;
                    return typeof i === G ? (r = ee.call(arguments, 1), this.each(function () {
                        var t, s, l = e.data(this, o);
                        if (!l)throw new Error(A.format("Cannot call method '{0}' of {1} before it is initialized", i, o));
                        if (t = l[i], typeof t !== j)throw new Error(A.format("Cannot find method '{0}' of {1}", i, o));
                        if (s = t.apply(l, r), s !== n)return a = s, !1
                    })) : this.each(function () {
                        return new t(this, i)
                    }), a
                }, e.fn[o].widget = t, e.fn[a] = function () {
                    return this.data(o)
                }
            }
        }), A.ui.progress.messages = {loading: "Loading..."};
        var Ie = {
            bind: function () {
                return this
            }, nullObject: !0, options: {}
        }, Fe = ke.extend({
            init: function (e, t) {
                ke.fn.init.call(this, e, t), this.element.autoApplyNS(), this.wrapper = this.element, this.element.addClass("km-widget")
            }, destroy: function () {
                ke.fn.destroy.call(this), this.element.kendoDestroy()
            }, options: {prefix: "Mobile"}, events: [], view: function () {
                var e = this.element.closest(A.roleSelector("view splitview modalview drawer"));
                return A.widgetInstance(e, A.mobile.ui) || Ie
            }, viewHasNativeScrolling: function () {
                var e = this.view();
                return e && e.options.useNativeScrolling
            }, container: function () {
                var e = this.element.closest(A.roleSelector("view layout modalview drawer splitview"));
                return A.widgetInstance(e.eq(0), A.mobile.ui) || Ie
            }
        });
        M(A.mobile, {
            init: function (e) {
                A.init(e, A.mobile.ui, A.ui, A.dataviz.ui)
            }, appLevelNativeScrolling: function () {
                return A.mobile.application && A.mobile.application.options && A.mobile.application.options.useNativeScrolling
            }, roles: {}, ui: {
                Widget: Fe, DataBoundWidget: xe.extend(Fe.prototype), roles: {}, plugin: function (e) {
                    A.ui.plugin(e, A.mobile.ui, "Mobile")
                }
            }
        }), l(A.dataviz, {
            init: function (e) {
                A.init(e, A.dataviz.ui)
            }, ui: {
                roles: {}, themes: {}, views: [], plugin: function (e) {
                    A.ui.plugin(e, A.dataviz.ui)
                }
            }, roles: {}
        }), A.touchScroller = function (t, n) {
            return n || (n = {}), n.useNative = !0, e(t).map(function (t, i) {
                return i = e(i), !(!B.kineticScrollNeeded || !A.mobile.ui.Scroller || i.data("kendoMobileScroller")) && (i.kendoMobileScroller(n), i.data("kendoMobileScroller"))
            })[0]
        }, A.preventDefault = function (e) {
            e.preventDefault()
        }, A.widgetInstance = function (e, n) {
            var i, r, a = e.data(A.ns + "role"), o = [];
            if (a) {
                if ("content" === a && (a = "scroller"), n)if (n[0])for (i = 0, r = n.length; i < r; i++)o.push(n[i].roles[a]); else o.push(n.roles[a]); else o = [A.ui.roles[a], A.dataviz.ui.roles[a], A.mobile.ui.roles[a]];
                for (a.indexOf(".") >= 0 && (o = [A.getter(a)(t)]), i = 0, r = o.length; i < r; i++) {
                    var s = o[i];
                    if (s) {
                        var l = e.data("kendo" + s.fn.options.prefix + s.fn.options.name);
                        if (l)return l
                    }
                }
            }
        }, A.onResize = function (n) {
            var i = n;
            return B.mobileOS.android && (i = function () {
                setTimeout(n, 600)
            }), e(t).on(B.resize, i), i
        }, A.unbindResize = function (n) {
            e(t).off(B.resize, n)
        }, A.attrValue = function (e, t) {
            return e.data(A.ns + t)
        }, A.days = {
            Sunday: 0,
            Monday: 1,
            Tuesday: 2,
            Wednesday: 3,
            Thursday: 4,
            Friday: 5,
            Saturday: 6
        }, e.extend(e.expr[":"], {
            kendoFocusable: function (t) {
                var n = e.attr(t, "tabindex");
                return I(t, !isNaN(n) && n > -1)
            }
        });
        var Ee = ["mousedown", "mousemove", "mouseenter", "mouseleave", "mouseover", "mouseout", "mouseup", "click"], Oe = "label, input, [data-rel=external]", Ae = {
            setupMouseMute: function () {
                var t = 0, n = Ee.length, i = document.documentElement;
                if (!Ae.mouseTrap && B.eventCapture) {
                    Ae.mouseTrap = !0, Ae.bustClick = !1, Ae.captureMouse = !1;
                    for (var r = function (t) {
                        Ae.captureMouse && ("click" === t.type ? Ae.bustClick && !e(t.target).is(Oe) && (t.preventDefault(), t.stopPropagation()) : t.stopPropagation())
                    }; t < n; t++)i.addEventListener(Ee[t], r, !0)
                }
            }, muteMouse: function (e) {
                Ae.captureMouse = !0, e.data.bustClick && (Ae.bustClick = !0), clearTimeout(Ae.mouseTrapTimeoutID)
            }, unMuteMouse: function () {
                clearTimeout(Ae.mouseTrapTimeoutID), Ae.mouseTrapTimeoutID = setTimeout(function () {
                    Ae.captureMouse = !1, Ae.bustClick = !1
                }, 400)
            }
        }, Me = {
            down: "touchstart mousedown",
            move: "mousemove touchmove",
            up: "mouseup touchend touchcancel",
            cancel: "mouseleave touchcancel"
        };
        B.touch && (B.mobileOS.ios || B.mobileOS.android) ? Me = {
            down: "touchstart",
            move: "touchmove",
            up: "touchend touchcancel",
            cancel: "touchcancel"
        } : B.pointers ? Me = {
            down: "pointerdown",
            move: "pointermove",
            up: "pointerup",
            cancel: "pointercancel pointerleave"
        } : B.msPointers && (Me = {
            down: "MSPointerDown",
            move: "MSPointerMove",
            up: "MSPointerUp",
            cancel: "MSPointerCancel MSPointerLeave"
        }), !B.msPointers || "onmspointerenter" in t || e.each({
            MSPointerEnter: "MSPointerOver",
            MSPointerLeave: "MSPointerOut"
        }, function (t, n) {
            e.event.special[t] = {
                delegateType: n, bindType: n, handle: function (t) {
                    var i, r = this, a = t.relatedTarget, o = t.handleObj;
                    return a && (a === r || e.contains(r, a)) || (t.type = o.origType, i = o.handler.apply(this, arguments), t.type = n), i
                }
            }
        });
        var He = function (e) {
            return Me[e] || e
        }, ze = /([^ ]+)/g;
        A.applyEventMap = function (e, t) {
            return e = e.replace(ze, He), t && (e = e.replace(ze, "$1." + t)), e
        };
        var Pe = e.fn.on;
        M(!0, E, e), E.fn = E.prototype = new e, E.fn.constructor = E, E.fn.init = function (t, n) {
            return n && n instanceof e && !(n instanceof E) && (n = E(n)), e.fn.init.call(this, t, n, Ve)
        }, E.fn.init.prototype = E.fn;
        var Ve = E(document);
        M(E.fn, {
            handler: function (e) {
                return this.data("handler", e), this
            }, autoApplyNS: function (e) {
                return this.data("kendoNS", e || A.guid()), this
            }, on: function () {
                var e = this, t = e.data("kendoNS");
                if (1 === arguments.length)return Pe.call(e, arguments[0]);
                var n = e, i = ee.call(arguments);
                typeof i[i.length - 1] === Q && i.pop();
                var r = i[i.length - 1], a = A.applyEventMap(i[0], t);
                if (B.mouseAndTouchPresent && a.search(/mouse|click/) > -1 && this[0] !== document.documentElement) {
                    Ae.setupMouseMute();
                    var o = 2 === i.length ? null : i[1], s = a.indexOf("click") > -1 && a.indexOf("touchend") > -1;
                    Pe.call(this, {touchstart: Ae.muteMouse, touchend: Ae.unMuteMouse}, o, {bustClick: s})
                }
                return typeof r === G && (n = e.data("handler"), r = n[r], i[i.length - 1] = function (e) {
                    r.call(n, e)
                }), i[0] = a, Pe.apply(e, i), e
            }, kendoDestroy: function (e) {
                return e = e || this.data("kendoNS"), e && this.off("." + e), this
            }
        }), A.jQuery = E, A.eventMap = Me, A.timezone = function () {
            function e(e, t) {
                var n, i, r, a = t[3], o = t[4], s = t[5], l = t[8];
                return l || (t[8] = l = {}), l[e] ? l[e] : (isNaN(o) ? 0 === o.indexOf("last") ? (n = new Date(Date.UTC(e, c[a] + 1, 1, s[0] - 24, s[1], s[2], 0)), i = d[o.substr(4, 3)], r = n.getUTCDay(), n.setUTCDate(n.getUTCDate() + i - r - (i > r ? 7 : 0))) : o.indexOf(">=") >= 0 && (n = new Date(Date.UTC(e, c[a], o.substr(5), s[0], s[1], s[2], 0)), i = d[o.substr(0, 3)], r = n.getUTCDay(), n.setUTCDate(n.getUTCDate() + i - r + (i < r ? 7 : 0))) : n = new Date(Date.UTC(e, c[a], o, s[0], s[1], s[2], 0)), l[e] = n)
            }

            function t(t, n, i) {
                if (n = n[i], !n) {
                    var r = i.split(":"), a = 0;
                    return r.length > 1 && (a = 60 * r[0] + Number(r[1])), [-1e6, "max", "-", "Jan", 1, [0, 0, 0], a, "-"]
                }
                var o = new Date(t).getUTCFullYear();
                n = jQuery.grep(n, function (e) {
                    var t = e[0], n = e[1];
                    return t <= o && (n >= o || t == o && "only" == n || "max" == n)
                }), n.push(t), n.sort(function (t, n) {
                    return "number" != typeof t && (t = Number(e(o, t))), "number" != typeof n && (n = Number(e(o, n))), t - n
                });
                var s = n[jQuery.inArray(t, n) - 1] || n[n.length - 1];
                return isNaN(s) ? s : null
            }

            function n(e, t, n) {
                var i = t[n];
                if ("string" == typeof i && (i = t[i]), !i)throw new Error('Timezone "' + n + '" is either incorrect, or kendo.timezones.min.js is not included.');
                for (var r = i.length - 1; r >= 0; r--) {
                    var a = i[r][3];
                    if (a && e > a)break
                }
                var o = i[r + 1];
                if (!o)throw new Error('Timezone "' + n + '" not found on ' + e + ".");
                return o
            }

            function i(e, i, r, a) {
                typeof e != Y && (e = Date.UTC(e.getFullYear(), e.getMonth(), e.getDate(), e.getHours(), e.getMinutes(), e.getSeconds(), e.getMilliseconds()));
                var o = n(e, i, a);
                return {zone: o, rule: t(e, r, o[1])}
            }

            function r(e, t) {
                if ("Etc/UTC" == t || "Etc/GMT" == t)return 0;
                var n = i(e, this.zones, this.rules, t), r = n.zone, a = n.rule;
                return A.parseFloat(a ? r[0] - a[6] : r[0])
            }

            function a(e, t) {
                var n = i(e, this.zones, this.rules, t), r = n.zone, a = n.rule, o = r[2];
                return o.indexOf("/") >= 0 ? o.split("/")[a && +a[6] ? 1 : 0] : o.indexOf("%s") >= 0 ? o.replace("%s", a && "-" != a[7] ? a[7] : "") : o
            }

            function o(e, t, n) {
                typeof t == G && (t = this.offset(e, t)), typeof n == G && (n = this.offset(e, n));
                var i = e.getTimezoneOffset();
                e = new Date(e.getTime() + 6e4 * (t - n));
                var r = e.getTimezoneOffset();
                return new Date(e.getTime() + 6e4 * (r - i))
            }

            function s(e, t) {
                return this.convert(e, e.getTimezoneOffset(), t)
            }

            function l(e, t) {
                return this.convert(e, t, e.getTimezoneOffset())
            }

            function u(e) {
                return this.apply(new Date(e), "Etc/UTC")
            }

            var c = {
                Jan: 0,
                Feb: 1,
                Mar: 2,
                Apr: 3,
                May: 4,
                Jun: 5,
                Jul: 6,
                Aug: 7,
                Sep: 8,
                Oct: 9,
                Nov: 10,
                Dec: 11
            }, d = {Sun: 0, Mon: 1, Tue: 2, Wed: 3, Thu: 4, Fri: 5, Sat: 6};
            return {zones: {}, rules: {}, offset: r, convert: o, apply: s, remove: l, abbr: a, toLocalDate: u}
        }(), A.date = function () {
            function e(e, t) {
                return 0 === t && 23 === e.getHours() && (e.setHours(e.getHours() + 2), !0)
            }

            function t(t, n, i) {
                var r = t.getHours();
                i = i || 1, n = (n - t.getDay() + 7 * i) % 7, t.setDate(t.getDate() + n), e(t, r)
            }

            function n(e, n, i) {
                return e = new Date(e), t(e, n, i), e
            }

            function i(e) {
                return new Date(e.getFullYear(), e.getMonth(), 1)
            }

            function r(e) {
                var t = new Date(e.getFullYear(), e.getMonth() + 1, 0), n = i(e), r = Math.abs(t.getTimezoneOffset() - n.getTimezoneOffset());
                return r && t.setHours(n.getHours() + r / 60), t
            }

            function a(t) {
                return t = new Date(t.getFullYear(), t.getMonth(), t.getDate(), 0, 0, 0), e(t, 0), t
            }

            function o(e) {
                return Date.UTC(e.getFullYear(), e.getMonth(), e.getDate(), e.getHours(), e.getMinutes(), e.getSeconds(), e.getMilliseconds())
            }

            function s(e) {
                return e.getTime() - a(e)
            }

            function l(e, t, n) {
                var i, r = s(t), a = s(n);
                return !e || r == a || (t >= n && (n += v), i = s(e), r > i && (i += v), a < r && (a += v), i >= r && i <= a)
            }

            function u(e, t, n) {
                var i, r = t.getTime(), a = n.getTime();
                return r >= a && (a += v), i = e.getTime(), i >= r && i <= a
            }

            function c(t, n) {
                var i = t.getHours();
                return t = new Date(t), d(t, n * v), e(t, i), t
            }

            function d(e, t, n) {
                var i, r = e.getTimezoneOffset();
                e.setTime(e.getTime() + t), n || (i = e.getTimezoneOffset() - r, e.setTime(e.getTime() + i * g))
            }

            function p(t, n) {
                return t = new Date(A.date.getDate(t).getTime() + A.date.getMilliseconds(n)), e(t, n.getHours()), t
            }

            function f() {
                return a(new Date)
            }

            function h(e) {
                return a(e).getTime() == f().getTime()
            }

            function m(e) {
                var t = new Date(1980, 1, 1, 0, 0, 0);
                return e && t.setHours(e.getHours(), e.getMinutes(), e.getSeconds(), e.getMilliseconds()), t
            }

            var g = 6e4, v = 864e5;
            return {
                adjustDST: e,
                dayOfWeek: n,
                setDayOfWeek: t,
                getDate: a,
                isInDateRange: u,
                isInTimeRange: l,
                isToday: h,
                nextDay: function (e) {
                    return c(e, 1)
                },
                previousDay: function (e) {
                    return c(e, -1)
                },
                toUtcTime: o,
                MS_PER_DAY: v,
                MS_PER_HOUR: 60 * g,
                MS_PER_MINUTE: g,
                setTime: d,
                setHours: p,
                addDays: c,
                today: f,
                toInvariantTime: m,
                firstDayOfMonth: i,
                lastDayOfMonth: r,
                getMilliseconds: s
            }
        }(), A.stripWhitespace = function (e) {
            if (document.createNodeIterator)for (var t = document.createNodeIterator(e, NodeFilter.SHOW_TEXT, function (t) {
                return t.parentNode == e ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT
            }, !1); t.nextNode();)t.referenceNode && !t.referenceNode.textContent.trim() && t.referenceNode.parentNode.removeChild(t.referenceNode); else for (var n = 0; n < e.childNodes.length; n++) {
                var i = e.childNodes[n];
                3 != i.nodeType || /\S/.test(i.nodeValue) || (e.removeChild(i), n--), 1 == i.nodeType && A.stripWhitespace(i)
            }
        };
        var Le = t.requestAnimationFrame || t.webkitRequestAnimationFrame || t.mozRequestAnimationFrame || t.oRequestAnimationFrame || t.msRequestAnimationFrame || function (e) {
                setTimeout(e, 1e3 / 60)
            };
        A.animationFrame = function (e) {
            Le.call(t, e)
        };
        var Re = [];
        A.queueAnimation = function (e) {
            Re[Re.length] = e, 1 === Re.length && A.runNextAnimation()
        }, A.runNextAnimation = function () {
            A.animationFrame(function () {
                Re[0] && (Re.shift()(), Re[0] && A.runNextAnimation())
            })
        }, A.parseQueryStringParams = function (e) {
            for (var t = e.split("?")[1] || "", n = {}, i = t.split(/&|=/), r = i.length, a = 0; a < r; a += 2)"" !== i[a] && (n[decodeURIComponent(i[a])] = decodeURIComponent(i[a + 1]));
            return n
        }, A.elementUnderCursor = function (e) {
            if ("undefined" != typeof e.x.client)return document.elementFromPoint(e.x.client, e.y.client)
        }, A.wheelDeltaY = function (e) {
            var t, i = e.originalEvent, r = i.wheelDeltaY;
            return i.wheelDelta ? (r === n || r) && (t = i.wheelDelta) : i.detail && i.axis === i.VERTICAL_AXIS && (t = 10 * -i.detail), t
        }, A.throttle = function (e, t) {
            var n, i = 0;
            if (!t || t <= 0)return e;
            var r = function () {
                function r() {
                    e.apply(a, s), i = +new Date
                }

                var a = this, o = +new Date - i, s = arguments;
                return i ? (n && clearTimeout(n), void(o > t ? r() : n = setTimeout(r, t - o))) : r()
            };
            return r.cancel = function () {
                clearTimeout(n)
            }, r
        }, A.caret = function (t, i, r) {
            var a, o = i !== n;
            if (r === n && (r = i), t[0] && (t = t[0]), !o || !t.disabled) {
                try {
                    if (t.selectionStart !== n)o ? (t.focus(), t.setSelectionRange(i, r)) : i = [t.selectionStart, t.selectionEnd]; else if (document.selection)if (e(t).is(":visible") && t.focus(), a = t.createTextRange(), o)a.collapse(!0), a.moveStart("character", i), a.moveEnd("character", r - i), a.select(); else {
                        var s, l, u = a.duplicate();
                        a.moveToBookmark(document.selection.createRange().getBookmark()), u.setEndPoint("EndToStart", a), s = u.text.length, l = s + a.text.length, i = [s, l]
                    }
                } catch (c) {
                    i = []
                }
                return i
            }
        }, A.compileMobileDirective = function (e, n) {
            var i = t.angular;
            return e.attr("data-" + A.ns + "role", e[0].tagName.toLowerCase().replace("kendo-mobile-", "").replace("-", "")), i.element(e).injector().invoke(["$compile", function (t) {
                t(e)(n), /^\$(digest|apply)$/.test(n.$$phase) || n.$digest()
            }]), A.widgetInstance(e, A.mobile.ui)
        }, A.antiForgeryTokens = function () {
            var t = {}, i = e("meta[name=csrf-token],meta[name=_csrf]").attr("content"), r = e("meta[name=csrf-param],meta[name=_csrf_header]").attr("content");
            return e("input[name^='__RequestVerificationToken']").each(function () {
                t[this.name] = this.value
            }), r !== n && i !== n && (t[r] = i), t
        }, A.cycleForm = function (e) {
            function t(e) {
                var t = A.widgetInstance(e);
                t && t.focus ? t.focus() : e.focus()
            }

            var n = e.find("input, .k-widget").first(), i = e.find("button, .k-button").last();
            i.on("keydown", function (e) {
                e.keyCode != A.keys.TAB || e.shiftKey || (e.preventDefault(), t(n))
            }), n.on("keydown", function (e) {
                e.keyCode == A.keys.TAB && e.shiftKey && (e.preventDefault(), t(i))
            })
        }, function () {
            function n(t, n, i, r) {
                var a = e("<form>").attr({action: i, method: "POST", target: r}), o = A.antiForgeryTokens();
                o.fileName = n;
                var s = t.split(";base64,");
                o.contentType = s[0].replace("data:", ""), o.base64 = s[1];
                for (var l in o)o.hasOwnProperty(l) && e("<input>").attr({
                    value: o[l],
                    name: l,
                    type: "hidden"
                }).appendTo(a);
                a.appendTo("body").submit().remove()
            }

            function i(e, t) {
                var n = e;
                if ("string" == typeof e) {
                    for (var i = e.split(";base64,"), r = i[0], a = atob(i[1]), o = new Uint8Array(a.length), s = 0; s < a.length; s++)o[s] = a.charCodeAt(s);
                    n = new Blob([o.buffer], {type: r})
                }
                navigator.msSaveBlob(n, t)
            }

            function r(e, n) {
                t.Blob && e instanceof Blob && (e = URL.createObjectURL(e)), a.download = n, a.href = e;
                var i = document.createEvent("MouseEvents");
                i.initMouseEvent("click", !0, !1, t, 0, 0, 0, 0, 0, !1, !1, !1, !1, 0, null), a.dispatchEvent(i), setTimeout(function () {
                    URL.revokeObjectURL(e)
                })
            }

            var a = document.createElement("a"), o = "download" in a && !A.support.browser.edge;
            A.saveAs = function (e) {
                var t = n;
                e.forceProxy || (o ? t = r : navigator.msSaveBlob && (t = i)), t(e.dataURI, e.fileName, e.proxyURL, e.proxyTarget)
            }
        }(), A.proxyModelSetters = function (e) {
            var t = {};
            return Object.keys(e || {}).forEach(function (n) {
                Object.defineProperty(t, n, {
                    get: function () {
                        return e[n]
                    }, set: function (t) {
                        e[n] = t, e.dirty = !0
                    }
                })
            }), t
        }
    }(jQuery, window), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.color", ["kendo.core"], e)
}(function () {
    !function (e, t, n) {
        function i(e, r) {
            var a, l;
            if (null == e || "none" == e)return null;
            if (e instanceof u)return e;
            if (e = e.toLowerCase(), a = s.exec(e))return e = "transparent" == a[1] ? new c(1, 1, 1, 0) : i(o.namedColors[a[1]], r), e.match = [a[1]], e;
            if ((a = /^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})\b/i.exec(e)) ? l = new d(n(a[1], 16), n(a[2], 16), n(a[3], 16), 1) : (a = /^#?([0-9a-f])([0-9a-f])([0-9a-f])\b/i.exec(e)) ? l = new d(n(a[1] + a[1], 16), n(a[2] + a[2], 16), n(a[3] + a[3], 16), 1) : (a = /^rgb\(\s*([0-9]+)\s*,\s*([0-9]+)\s*,\s*([0-9]+)\s*\)/.exec(e)) ? l = new d(n(a[1], 10), n(a[2], 10), n(a[3], 10), 1) : (a = /^rgba\(\s*([0-9]+)\s*,\s*([0-9]+)\s*,\s*([0-9]+)\s*,\s*([0-9.]+)\s*\)/.exec(e)) ? l = new d(n(a[1], 10), n(a[2], 10), n(a[3], 10), t(a[4])) : (a = /^rgb\(\s*([0-9]*\.?[0-9]+)%\s*,\s*([0-9]*\.?[0-9]+)%\s*,\s*([0-9]*\.?[0-9]+)%\s*\)/.exec(e)) ? l = new c(t(a[1]) / 100, t(a[2]) / 100, t(a[3]) / 100, 1) : (a = /^rgba\(\s*([0-9]*\.?[0-9]+)%\s*,\s*([0-9]*\.?[0-9]+)%\s*,\s*([0-9]*\.?[0-9]+)%\s*,\s*([0-9.]+)\s*\)/.exec(e)) && (l = new c(t(a[1]) / 100, t(a[2]) / 100, t(a[3]) / 100, t(a[4]))), l)l.match = a; else if (!r)throw new Error("Cannot parse color: " + e);
            return l
        }

        function r(e, t, n) {
            for (n || (n = "0"), e = e.toString(16); t > e.length;)e = "0" + e;
            return e
        }

        function a(e, t, n) {
            return n < 0 && (n += 1), n > 1 && (n -= 1), n < 1 / 6 ? e + 6 * (t - e) * n : n < .5 ? t : n < 2 / 3 ? e + (t - e) * (2 / 3 - n) * 6 : e
        }

        var o = function (e) {
            var t, n, i, r, a, s = this, l = o.formats;
            if (1 === arguments.length)for (e = s.resolveColor(e), r = 0; r < l.length; r++)t = l[r].re, n = l[r].process, i = t.exec(e), i && (a = n(i), s.r = a[0], s.g = a[1], s.b = a[2]); else s.r = arguments[0], s.g = arguments[1], s.b = arguments[2];
            s.r = s.normalizeByte(s.r), s.g = s.normalizeByte(s.g), s.b = s.normalizeByte(s.b)
        };
        o.prototype = {
            toHex: function () {
                var e = this, t = e.padDigit, n = e.r.toString(16), i = e.g.toString(16), r = e.b.toString(16);
                return "#" + t(n) + t(i) + t(r)
            }, resolveColor: function (e) {
                return e = e || "black", "#" == e.charAt(0) && (e = e.substr(1, 6)), e = e.replace(/ /g, ""), e = e.toLowerCase(), e = o.namedColors[e] || e
            }, normalizeByte: function (e) {
                return e < 0 || isNaN(e) ? 0 : e > 255 ? 255 : e
            }, padDigit: function (e) {
                return 1 === e.length ? "0" + e : e
            }, brightness: function (e) {
                var t = this, n = Math.round;
                return t.r = n(t.normalizeByte(t.r * e)), t.g = n(t.normalizeByte(t.g * e)), t.b = n(t.normalizeByte(t.b * e)), t
            }, percBrightness: function () {
                var e = this;
                return Math.sqrt(.241 * e.r * e.r + .691 * e.g * e.g + .068 * e.b * e.b)
            }
        }, o.formats = [{
            re: /^rgb\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})\)$/, process: function (e) {
                return [n(e[1], 10), n(e[2], 10), n(e[3], 10)]
            }
        }, {
            re: /^(\w{2})(\w{2})(\w{2})$/, process: function (e) {
                return [n(e[1], 16), n(e[2], 16), n(e[3], 16)]
            }
        }, {
            re: /^(\w{1})(\w{1})(\w{1})$/, process: function (e) {
                return [n(e[1] + e[1], 16), n(e[2] + e[2], 16), n(e[3] + e[3], 16)]
            }
        }], o.namedColors = {
            aliceblue: "f0f8ff",
            antiquewhite: "faebd7",
            aqua: "00ffff",
            aquamarine: "7fffd4",
            azure: "f0ffff",
            beige: "f5f5dc",
            bisque: "ffe4c4",
            black: "000000",
            blanchedalmond: "ffebcd",
            blue: "0000ff",
            blueviolet: "8a2be2",
            brown: "a52a2a",
            burlywood: "deb887",
            cadetblue: "5f9ea0",
            chartreuse: "7fff00",
            chocolate: "d2691e",
            coral: "ff7f50",
            cornflowerblue: "6495ed",
            cornsilk: "fff8dc",
            crimson: "dc143c",
            cyan: "00ffff",
            darkblue: "00008b",
            darkcyan: "008b8b",
            darkgoldenrod: "b8860b",
            darkgray: "a9a9a9",
            darkgrey: "a9a9a9",
            darkgreen: "006400",
            darkkhaki: "bdb76b",
            darkmagenta: "8b008b",
            darkolivegreen: "556b2f",
            darkorange: "ff8c00",
            darkorchid: "9932cc",
            darkred: "8b0000",
            darksalmon: "e9967a",
            darkseagreen: "8fbc8f",
            darkslateblue: "483d8b",
            darkslategray: "2f4f4f",
            darkslategrey: "2f4f4f",
            darkturquoise: "00ced1",
            darkviolet: "9400d3",
            deeppink: "ff1493",
            deepskyblue: "00bfff",
            dimgray: "696969",
            dimgrey: "696969",
            dodgerblue: "1e90ff",
            firebrick: "b22222",
            floralwhite: "fffaf0",
            forestgreen: "228b22",
            fuchsia: "ff00ff",
            gainsboro: "dcdcdc",
            ghostwhite: "f8f8ff",
            gold: "ffd700",
            goldenrod: "daa520",
            gray: "808080",
            grey: "808080",
            green: "008000",
            greenyellow: "adff2f",
            honeydew: "f0fff0",
            hotpink: "ff69b4",
            indianred: "cd5c5c",
            indigo: "4b0082",
            ivory: "fffff0",
            khaki: "f0e68c",
            lavender: "e6e6fa",
            lavenderblush: "fff0f5",
            lawngreen: "7cfc00",
            lemonchiffon: "fffacd",
            lightblue: "add8e6",
            lightcoral: "f08080",
            lightcyan: "e0ffff",
            lightgoldenrodyellow: "fafad2",
            lightgray: "d3d3d3",
            lightgrey: "d3d3d3",
            lightgreen: "90ee90",
            lightpink: "ffb6c1",
            lightsalmon: "ffa07a",
            lightseagreen: "20b2aa",
            lightskyblue: "87cefa",
            lightslategray: "778899",
            lightslategrey: "778899",
            lightsteelblue: "b0c4de",
            lightyellow: "ffffe0",
            lime: "00ff00",
            limegreen: "32cd32",
            linen: "faf0e6",
            magenta: "ff00ff",
            maroon: "800000",
            mediumaquamarine: "66cdaa",
            mediumblue: "0000cd",
            mediumorchid: "ba55d3",
            mediumpurple: "9370d8",
            mediumseagreen: "3cb371",
            mediumslateblue: "7b68ee",
            mediumspringgreen: "00fa9a",
            mediumturquoise: "48d1cc",
            mediumvioletred: "c71585",
            midnightblue: "191970",
            mintcream: "f5fffa",
            mistyrose: "ffe4e1",
            moccasin: "ffe4b5",
            navajowhite: "ffdead",
            navy: "000080",
            oldlace: "fdf5e6",
            olive: "808000",
            olivedrab: "6b8e23",
            orange: "ffa500",
            orangered: "ff4500",
            orchid: "da70d6",
            palegoldenrod: "eee8aa",
            palegreen: "98fb98",
            paleturquoise: "afeeee",
            palevioletred: "d87093",
            papayawhip: "ffefd5",
            peachpuff: "ffdab9",
            peru: "cd853f",
            pink: "ffc0cb",
            plum: "dda0dd",
            powderblue: "b0e0e6",
            purple: "800080",
            red: "ff0000",
            rosybrown: "bc8f8f",
            royalblue: "4169e1",
            saddlebrown: "8b4513",
            salmon: "fa8072",
            sandybrown: "f4a460",
            seagreen: "2e8b57",
            seashell: "fff5ee",
            sienna: "a0522d",
            silver: "c0c0c0",
            skyblue: "87ceeb",
            slateblue: "6a5acd",
            slategray: "708090",
            slategrey: "708090",
            snow: "fffafa",
            springgreen: "00ff7f",
            steelblue: "4682b4",
            tan: "d2b48c",
            teal: "008080",
            thistle: "d8bfd8",
            tomato: "ff6347",
            turquoise: "40e0d0",
            violet: "ee82ee",
            wheat: "f5deb3",
            white: "ffffff",
            whitesmoke: "f5f5f5",
            yellow: "ffff00",
            yellowgreen: "9acd32"
        };
        var s = ["transparent"];
        for (var l in o.namedColors)o.namedColors.hasOwnProperty(l) && s.push(l);
        s = new RegExp("^(" + s.join("|") + ")(\\W|$)", "i");
        var u = kendo.Class.extend({
            toHSV: function () {
                return this
            }, toRGB: function () {
                return this
            }, toHex: function () {
                return this.toBytes().toHex()
            }, toBytes: function () {
                return this
            }, toCss: function () {
                return "#" + this.toHex()
            }, toCssRgba: function () {
                var e = this.toBytes();
                return "rgba(" + e.r + ", " + e.g + ", " + e.b + ", " + t((+this.a).toFixed(3)) + ")"
            }, toDisplay: function () {
                return kendo.support.browser.msie && kendo.support.browser.version < 9 ? this.toCss() : this.toCssRgba()
            }, equals: function (e) {
                return e === this || null !== e && this.toCssRgba() == i(e).toCssRgba()
            }, diff: function (e) {
                if (null == e)return NaN;
                var t = this.toBytes();
                return e = e.toBytes(), Math.sqrt(Math.pow(.3 * (t.r - e.r), 2) + Math.pow(.59 * (t.g - e.g), 2) + Math.pow(.11 * (t.b - e.b), 2))
            }, clone: function () {
                var e = this.toBytes();
                return e === this && (e = new d(e.r, e.g, e.b, e.a)), e
            }
        }), c = u.extend({
            init: function (e, t, n, i) {
                this.r = e, this.g = t, this.b = n, this.a = i
            }, toHSV: function () {
                var e, t, n, i, r, a, o = this.r, s = this.g, l = this.b;
                return e = Math.min(o, s, l), t = Math.max(o, s, l), a = t, n = t - e, 0 === n ? new p(0, 0, a, this.a) : (0 !== t ? (r = n / t, i = o == t ? (s - l) / n : s == t ? 2 + (l - o) / n : 4 + (o - s) / n, i *= 60, i < 0 && (i += 360)) : (r = 0, i = -1), new p(i, r, a, this.a))
            }, toHSL: function () {
                var e, t, n = this.r, i = this.g, r = this.b, a = Math.max(n, i, r), o = Math.min(n, i, r), s = (a + o) / 2;
                if (a == o)e = t = 0; else {
                    var l = a - o;
                    switch (t = s > .5 ? l / (2 - a - o) : l / (a + o), a) {
                        case n:
                            e = (i - r) / l + (i < r ? 6 : 0);
                            break;
                        case i:
                            e = (r - n) / l + 2;
                            break;
                        case r:
                            e = (n - i) / l + 4
                    }
                    e *= 60, t *= 100, s *= 100
                }
                return new f(e, t, s, this.a)
            }, toBytes: function () {
                return new d(255 * this.r, 255 * this.g, 255 * this.b, this.a)
            }
        }), d = c.extend({
            init: function (e, t, n, i) {
                this.r = Math.round(e), this.g = Math.round(t), this.b = Math.round(n), this.a = i
            }, toRGB: function () {
                return new c(this.r / 255, this.g / 255, this.b / 255, this.a)
            }, toHSV: function () {
                return this.toRGB().toHSV()
            }, toHSL: function () {
                return this.toRGB().toHSL()
            }, toHex: function () {
                return r(this.r, 2) + r(this.g, 2) + r(this.b, 2)
            }, toBytes: function () {
                return this
            }
        }), p = u.extend({
            init: function (e, t, n, i) {
                this.h = e, this.s = t, this.v = n, this.a = i
            }, toRGB: function () {
                var e, t, n, i, r, a, o, s, l = this.h, u = this.s, d = this.v;
                if (0 === u)t = n = i = d; else switch (l /= 60, e = Math.floor(l), r = l - e, a = d * (1 - u), o = d * (1 - u * r), s = d * (1 - u * (1 - r)), e) {
                    case 0:
                        t = d, n = s, i = a;
                        break;
                    case 1:
                        t = o, n = d, i = a;
                        break;
                    case 2:
                        t = a, n = d, i = s;
                        break;
                    case 3:
                        t = a, n = o, i = d;
                        break;
                    case 4:
                        t = s, n = a, i = d;
                        break;
                    default:
                        t = d, n = a, i = o
                }
                return new c(t, n, i, this.a)
            }, toHSL: function () {
                return this.toRGB().toHSL()
            }, toBytes: function () {
                return this.toRGB().toBytes()
            }
        }), f = u.extend({
            init: function (e, t, n, i) {
                this.h = e, this.s = t, this.l = n, this.a = i
            }, toRGB: function () {
                var e, t, n, i = this.h, r = this.s, o = this.l;
                if (0 === r)e = t = n = o; else {
                    i /= 360, r /= 100, o /= 100;
                    var s = o < .5 ? o * (1 + r) : o + r - o * r, l = 2 * o - s;
                    e = a(l, s, i + 1 / 3), t = a(l, s, i), n = a(l, s, i - 1 / 3)
                }
                return new c(e, t, n, this.a)
            }, toHSV: function () {
                return this.toRGB().toHSV()
            }, toBytes: function () {
                return this.toRGB().toBytes()
            }
        });
        o.fromBytes = function (e, t, n, i) {
            return new d(e, t, n, null != i ? i : 1)
        }, o.fromRGB = function (e, t, n, i) {
            return new c(e, t, n, null != i ? i : 1)
        }, o.fromHSV = function (e, t, n, i) {
            return new p(e, t, n, null != i ? i : 1)
        }, o.fromHSL = function (e, t, n, i) {
            return new f(e, t, n, null != i ? i : 1)
        }, kendo.Color = o, kendo.parseColor = i
    }(window.kendo.jQuery, parseFloat, parseInt)
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.data", ["kendo.core", "kendo.data.odata", "kendo.data.xml"], e)
}(function () {
    return function (e, t) {
        function n(e, t, n, i) {
            return function (r) {
                var a, o = {};
                for (a in r)o[a] = r[a];
                i ? o.field = n + "." + r.field : o.field = n, t == le && e._notifyChange && e._notifyChange(o), e.trigger(t, o)
            }
        }

        function i(t, n) {
            if (t === n)return !0;
            var r, a = e.type(t), o = e.type(n);
            if (a !== o)return !1;
            if ("date" === a)return t.getTime() === n.getTime();
            if ("object" !== a && "array" !== a)return !1;
            for (r in t)if (!i(t[r], n[r]))return !1;
            return !0
        }

        function r(e, t) {
            var n, i;
            for (i in e) {
                if (n = e[i], j(n) && n.field && n.field === t)return n;
                if (n === t)return n
            }
            return null
        }

        function a(e) {
            this.data = e || []
        }

        function o(e, n) {
            if (e) {
                var i = typeof e === ne ? {field: e, dir: n} : e, r = Y(i) ? i : i !== t ? [i] : [];
                return $(r, function (e) {
                    return !!e.dir
                })
            }
        }

        function s(e) {
            var t, n, i, r, a = e.filters;
            if (a)for (t = 0, n = a.length; t < n; t++)i = a[t], r = i.operator, r && typeof r === ne && (i.operator = Ne[r.toLowerCase()] || r), s(i)
        }

        function l(e) {
            if (e && !G(e))return !Y(e) && e.filters || (e = {logic: "and", filters: Y(e) ? e : [e]}), s(e), e
        }

        function u(e, t) {
            return !e.logic && !t.logic && (e.field === t.field && e.value === t.value && e.operator === t.operator)
        }

        function c(e) {
            return e = e || {}, G(e) ? {logic: "and", filters: []} : l(e)
        }

        function d(e, t) {
            return t.logic || e.field > t.field ? 1 : e.field < t.field ? -1 : 0
        }

        function p(e, t) {
            if (e = c(e), t = c(t), e.logic !== t.logic)return !1;
            var n, i, r = (e.filters || []).slice(), a = (t.filters || []).slice();
            if (r.length !== a.length)return !1;
            r = r.sort(d), a = a.sort(d);
            for (var o = 0; o < r.length; o++)if (n = r[o], i = a[o], n.logic && i.logic) {
                if (!p(n, i))return !1
            } else if (!u(n, i))return !1;
            return !0
        }

        function f(e) {
            return Y(e) ? e : [e]
        }

        function h(e, n) {
            var i = typeof e === ne ? {field: e, dir: n} : e, r = Y(i) ? i : i !== t ? [i] : [];
            return W(r, function (e) {
                return {field: e.field, dir: e.dir || "asc", aggregates: e.aggregates}
            })
        }

        function m(e, t) {
            return e && e.getTime && t && t.getTime ? e.getTime() === t.getTime() : e === t
        }

        function g(e, t, n, i, r, a) {
            t = t || [];
            var o, s, l, u = t.length;
            for (o = 0; o < u; o++) {
                s = t[o], l = s.aggregate;
                var c = s.field;
                e[c] = e[c] || {}, a[c] = a[c] || {}, a[c][l] = a[c][l] || {}, e[c][l] = We[l.toLowerCase()](e[c][l], n, X.accessor(c), i, r, a[c][l])
            }
        }

        function v(e) {
            return "number" == typeof e && !isNaN(e)
        }

        function _(e) {
            return e && e.getTime
        }

        function w(e) {
            var t, n = e.length, i = new Array(n);
            for (t = 0; t < n; t++)i[t] = e[t].toJSON();
            return i
        }

        function b(e, t, n, i, r) {
            var a, o, s, l, u, c = {};
            for (l = 0, u = e.length; l < u; l++) {
                a = e[l];
                for (o in t)s = r[o], s && s !== o && (c[s] || (c[s] = X.setter(s)), c[s](a, t[o](a)), delete a[o])
            }
        }

        function y(e, t, n, i, r) {
            var a, o, s, l, u;
            for (l = 0, u = e.length; l < u; l++) {
                a = e[l];
                for (o in t)a[o] = n._parse(o, t[o](a)), s = r[o], s && s !== o && delete a[s]
            }
        }

        function k(e, t, n, i, r) {
            var a, o, s, l;
            for (o = 0, l = e.length; o < l; o++)a = e[o], s = i[a.field], s && s != a.field && (a.field = s), a.value = n._parse(a.field, a.value), a.hasSubgroups ? k(a.items, t, n, i, r) : y(a.items, t, n, i, r)
        }

        function x(e, t, n, i, r, a) {
            return function (o) {
                return o = e(o), o && !G(i) && ("[object Array]" === De.call(o) || o instanceof Ae || (o = [o]), n(o, i, new t, r, a)), o || []
            }
        }

        function C(e, t, n, i) {
            for (var r, a, o = 0; t.length && i;) {
                r = t[o], a = r.items;
                var s = a.length;
                if (e && e.field === r.field && e.value === r.value ? (e.hasSubgroups && e.items.length ? C(e.items[e.items.length - 1], r.items, n, i) : (a = a.slice(n, n + i), e.items = e.items.concat(a)), t.splice(o--, 1)) : r.hasSubgroups && a.length ? (C(r, a, n, i), r.items.length || t.splice(o--, 1)) : (a = a.slice(n, n + i), r.items = a, r.items.length || t.splice(o--, 1)), 0 === a.length ? n -= s : (n = 0, i -= a.length), ++o >= t.length)break
            }
            o < t.length && t.splice(o, t.length - o)
        }

        function T(e) {
            var t, n, i, r, a = [];
            for (t = 0, n = e.length; t < n; t++) {
                var o = e.at(t);
                if (o.hasSubgroups)a = a.concat(T(o.items)); else for (i = o.items, r = 0; r < i.length; r++)a.push(i.at(r))
            }
            return a
        }

        function S(e, t) {
            var n, i, r;
            if (t)for (n = 0, i = e.length; n < i; n++)r = e.at(n), r.hasSubgroups ? S(r.items, t) : r.items = new Me(r.items, t)
        }

        function D(e, t) {
            for (var n = 0, i = e.length; n < i; n++)if (e[n].hasSubgroups) {
                if (D(e[n].items, t))return !0
            } else if (t(e[n].items, e[n]))return !0
        }

        function I(e, t, n, i) {
            for (var r = 0; r < e.length && e[r].data !== t && !F(e[r].data, n, i); r++);
        }

        function F(e, t, n) {
            for (var i = 0, r = e.length; i < r; i++) {
                if (e[i] && e[i].hasSubgroups)return F(e[i].items, t, n);
                if (e[i] === t || e[i] === n)return e[i] = n, !0
            }
        }

        function E(e, n, i, r, a) {
            for (var o = 0, s = e.length; o < s; o++) {
                var l = e[o];
                if (l && !(l instanceof r))if (l.hasSubgroups === t || a) {
                    for (var u = 0; u < n.length; u++)if (n[u] === l) {
                        e[o] = n.at(u), I(i, n, l, e[o]);
                        break
                    }
                } else E(l.items, n, i, r, a)
            }
        }

        function O(e, t) {
            var n, i;
            for (n = 0, i = e.length; n < i; n++) {
                var r = e.at(n);
                if (r.uid == t.uid)return e.splice(n, 1), r
            }
        }

        function A(e, t) {
            return t ? H(e, function (e) {
                return e.uid && e.uid == t.uid || e[t.idField] === t.id && t.id !== t._defaultId
            }) : -1
        }

        function M(e, t) {
            return t ? H(e, function (e) {
                return e.uid == t.uid
            }) : -1
        }

        function H(e, t) {
            var n, i;
            for (n = 0, i = e.length; n < i; n++)if (t(e[n]))return n;
            return -1
        }

        function z(e, t) {
            if (e && !G(e)) {
                var n, i = e[t];
                return n = j(i) ? i.from || i.field || t : e[t] || t, Z(n) ? t : n
            }
            return t
        }

        function P(e, t) {
            var n, i, r = {};
            for (var a in e)"filters" !== a && (r[a] = e[a]);
            if (e.filters)for (r.filters = [], n = 0, i = e.filters.length; n < i; n++)r.filters[n] = P(e.filters[n], t); else r.field = z(t.fields, r.field);
            return r
        }

        function V(e, t) {
            var n, i, r, a, o = [];
            for (n = 0, i = e.length; n < i; n++) {
                r = {}, a = e[n];
                for (var s in a)r[s] = a[s];
                r.field = z(t.fields, r.field), r.aggregates && Y(r.aggregates) && (r.aggregates = V(r.aggregates, t)), o.push(r)
            }
            return o
        }

        function L(t, n) {
            t = e(t)[0];
            var i, r, a, o, s, l, u = t.options, c = n[0], d = n[1], p = [];
            for (i = 0, r = u.length; i < r; i++)s = {}, o = u[i], a = o.parentNode, a === t && (a = null), o.disabled || a && a.disabled || (a && (s.optgroup = a.label), s[c.field] = o.text,
                l = o.attributes.value, l = l && l.specified ? o.value : o.text, s[d.field] = l, p.push(s));
            return p
        }

        function R(t, n) {
            var i, r, a, o, s, l, u, c = e(t)[0].tBodies[0], d = c ? c.rows : [], p = n.length, f = [];
            for (i = 0, r = d.length; i < r; i++) {
                for (s = {}, u = !0, o = d[i].cells, a = 0; a < p; a++)l = o[a], "th" !== l.nodeName.toLowerCase() && (u = !1, s[n[a].field] = l.innerHTML);
                u || f.push(s)
            }
            return f
        }

        function B(e) {
            return function () {
                var t = this._data, n = Ye.fn[e].apply(this, Te.call(arguments));
                return this._data != t && this._attachBubbleHandlers(), n
            }
        }

        function N(t, n) {
            function i(e, t) {
                return e.filter(t).add(e.find(t))
            }

            var r, a, o, s, l, u, c, d, p = e(t).children(), f = [], h = n[0].field, m = n[1] && n[1].field, g = n[2] && n[2].field, v = n[3] && n[3].field;
            for (r = 0, a = p.length; r < a; r++)o = {_loaded: !0}, s = p.eq(r), u = s[0].firstChild, d = s.children(), t = d.filter("ul"), d = d.filter(":not(ul)"), l = s.attr("data-id"), l && (o.id = l), u && (o[h] = 3 == u.nodeType ? u.nodeValue : d.text()), m && (o[m] = i(d, "a").attr("href")), v && (o[v] = i(d, "img").attr("src")), g && (c = i(d, ".k-sprite").prop("className"), o[g] = c && e.trim(c.replace("k-sprite", ""))), t.length && (o.items = N(t.eq(0), n)), "true" == s.attr("data-hasChildren") && (o.hasChildren = !0), f.push(o);
            return f
        }

        var W, U = e.extend, q = e.proxy, j = e.isPlainObject, G = e.isEmptyObject, Y = e.isArray, $ = e.grep, K = e.ajax, J = e.each, Q = e.noop, X = window.kendo, Z = X.isFunction, ee = X.Observable, te = X.Class, ne = "string", ie = "function", re = "create", ae = "read", oe = "update", se = "destroy", le = "change", ue = "sync", ce = "get", de = "error", pe = "requestStart", fe = "progress", he = "requestEnd", me = [re, ae, oe, se], ge = function (e) {
            return e
        }, ve = X.getter, _e = X.stringify, we = Math, be = [].push, ye = [].join, ke = [].pop, xe = [].splice, Ce = [].shift, Te = [].slice, Se = [].unshift, De = {}.toString, Ie = X.support.stableSort, Fe = /^\/Date\((.*?)\)\/$/, Ee = /(\r+|\n+)/g, Oe = /(?=['\\])/g, Ae = ee.extend({
            init: function (e, t) {
                var n = this;
                n.type = t || He, ee.fn.init.call(n), n.length = e.length, n.wrapAll(e, n)
            }, at: function (e) {
                return this[e]
            }, toJSON: function () {
                var e, t, n = this.length, i = new Array(n);
                for (e = 0; e < n; e++)t = this[e], t instanceof He && (t = t.toJSON()), i[e] = t;
                return i
            }, parent: Q, wrapAll: function (e, t) {
                var n, i, r = this, a = function () {
                    return r
                };
                for (t = t || [], n = 0, i = e.length; n < i; n++)t[n] = r.wrap(e[n], a);
                return t
            }, wrap: function (e, t) {
                var n, i = this;
                return null !== e && "[object Object]" === De.call(e) && (n = e instanceof i.type || e instanceof Ve, n || (e = e instanceof He ? e.toJSON() : e, e = new i.type(e)), e.parent = t, e.bind(le, function (e) {
                    i.trigger(le, {
                        field: e.field,
                        node: e.node,
                        index: e.index,
                        items: e.items || [this],
                        action: e.node ? e.action || "itemloaded" : "itemchange"
                    })
                })), e
            }, push: function () {
                var e, t = this.length, n = this.wrapAll(arguments);
                return e = be.apply(this, n), this.trigger(le, {action: "add", index: t, items: n}), e
            }, slice: Te, sort: [].sort, join: ye, pop: function () {
                var e = this.length, t = ke.apply(this);
                return e && this.trigger(le, {action: "remove", index: e - 1, items: [t]}), t
            }, splice: function (e, t, n) {
                var i, r, a, o = this.wrapAll(Te.call(arguments, 2));
                if (i = xe.apply(this, [e, t].concat(o)), i.length)for (this.trigger(le, {
                    action: "remove",
                    index: e,
                    items: i
                }), r = 0, a = i.length; r < a; r++)i[r] && i[r].children && i[r].unbind(le);
                return n && this.trigger(le, {action: "add", index: e, items: o}), i
            }, shift: function () {
                var e = this.length, t = Ce.apply(this);
                return e && this.trigger(le, {action: "remove", index: 0, items: [t]}), t
            }, unshift: function () {
                var e, t = this.wrapAll(arguments);
                return e = Se.apply(this, t), this.trigger(le, {action: "add", index: 0, items: t}), e
            }, indexOf: function (e) {
                var t, n, i = this;
                for (t = 0, n = i.length; t < n; t++)if (i[t] === e)return t;
                return -1
            }, forEach: function (e) {
                for (var t = 0, n = this.length; t < n; t++)e(this[t], t, this)
            }, map: function (e) {
                for (var t = 0, n = [], i = this.length; t < i; t++)n[t] = e(this[t], t, this);
                return n
            }, reduce: function (e) {
                var t, n = 0, i = this.length;
                for (2 == arguments.length ? t = arguments[1] : n < i && (t = this[n++]); n < i; n++)t = e(t, this[n], n, this);
                return t
            }, reduceRight: function (e) {
                var t, n = this.length - 1;
                for (2 == arguments.length ? t = arguments[1] : n > 0 && (t = this[n--]); n >= 0; n--)t = e(t, this[n], n, this);
                return t
            }, filter: function (e) {
                for (var t, n = 0, i = [], r = this.length; n < r; n++)t = this[n], e(t, n, this) && (i[i.length] = t);
                return i
            }, find: function (e) {
                for (var t, n = 0, i = this.length; n < i; n++)if (t = this[n], e(t, n, this))return t
            }, every: function (e) {
                for (var t, n = 0, i = this.length; n < i; n++)if (t = this[n], !e(t, n, this))return !1;
                return !0
            }, some: function (e) {
                for (var t, n = 0, i = this.length; n < i; n++)if (t = this[n], e(t, n, this))return !0;
                return !1
            }, remove: function (e) {
                var t = this.indexOf(e);
                t !== -1 && this.splice(t, 1)
            }, empty: function () {
                this.splice(0, this.length)
            }
        });
        "undefined" != typeof Symbol && Symbol.iterator && !Ae.prototype[Symbol.iterator] && (Ae.prototype[Symbol.iterator] = [][Symbol.iterator]);
        var Me = Ae.extend({
            init: function (e, t) {
                ee.fn.init.call(this), this.type = t || He;
                for (var n = 0; n < e.length; n++)this[n] = e[n];
                this.length = n, this._parent = q(function () {
                    return this
                }, this)
            }, at: function (e) {
                var t = this[e];
                return t instanceof this.type ? t.parent = this._parent : t = this[e] = this.wrap(t, this._parent), t
            }
        }), He = ee.extend({
            init: function (e) {
                var t, n, i = this, r = function () {
                    return i
                };
                ee.fn.init.call(this), this._handlers = {};
                for (n in e)t = e[n], "object" == typeof t && t && !t.getTime && "_" != n.charAt(0) && (t = i.wrap(t, n, r)), i[n] = t;
                i.uid = X.guid()
            }, shouldSerialize: function (e) {
                return this.hasOwnProperty(e) && "_handlers" !== e && "_events" !== e && typeof this[e] !== ie && "uid" !== e
            }, forEach: function (e) {
                for (var t in this)this.shouldSerialize(t) && e(this[t], t)
            }, toJSON: function () {
                var e, t, n = {};
                for (t in this)this.shouldSerialize(t) && (e = this[t], (e instanceof He || e instanceof Ae) && (e = e.toJSON()), n[t] = e);
                return n
            }, get: function (e) {
                var t, n = this;
                return n.trigger(ce, {field: e}), t = "this" === e ? n : X.getter(e, !0)(n)
            }, _set: function (e, t) {
                var n = this, i = e.indexOf(".") >= 0;
                if (i)for (var r = e.split("."), a = ""; r.length > 1;) {
                    a += r.shift();
                    var o = X.getter(a, !0)(n);
                    if (o instanceof He)return o.set(r.join("."), t), i;
                    a += "."
                }
                return X.setter(e)(n, t), i
            }, set: function (e, t) {
                var n = this, i = !1, r = e.indexOf(".") >= 0, a = X.getter(e, !0)(n);
                return a !== t && (a instanceof ee && this._handlers[e] && (this._handlers[e].get && a.unbind(ce, this._handlers[e].get), a.unbind(le, this._handlers[e].change)), i = n.trigger("set", {
                    field: e,
                    value: t
                }), i || (r || (t = n.wrap(t, e, function () {
                    return n
                })), (!n._set(e, t) || e.indexOf("(") >= 0 || e.indexOf("[") >= 0) && n.trigger(le, {field: e}))), i
            }, parent: Q, wrap: function (e, t, i) {
                var r, a, o = this, s = De.call(e);
                if (null != e && ("[object Object]" === s || "[object Array]" === s)) {
                    var l = e instanceof Ae, u = e instanceof Ye;
                    "[object Object]" !== s || u || l ? ("[object Array]" === s || l || u) && (l || u || (e = new Ae(e)), a = n(o, le, t, !1), e.bind(le, a), o._handlers[t] = {change: a}) : (e instanceof He || (e = new He(e)), r = n(o, ce, t, !0), e.bind(ce, r), a = n(o, le, t, !0), e.bind(le, a), o._handlers[t] = {
                        get: r,
                        change: a
                    }), e.parent = i
                }
                return e
            }
        }), ze = {
            number: function (e) {
                return X.parseFloat(e)
            }, date: function (e) {
                return X.parseDate(e)
            }, "boolean": function (e) {
                return typeof e === ne ? "true" === e.toLowerCase() : null != e ? !!e : e
            }, string: function (e) {
                return null != e ? e + "" : e
            }, "default": function (e) {
                return e
            }
        }, Pe = {
            string: "",
            number: 0,
            date: new Date,
            "boolean": !1,
            "default": ""
        }, Ve = He.extend({
            init: function (n) {
                var i = this;
                if ((!n || e.isEmptyObject(n)) && (n = e.extend({}, i.defaults, n), i._initializers))for (var r = 0; r < i._initializers.length; r++) {
                    var a = i._initializers[r];
                    n[a] = i.defaults[a]()
                }
                He.fn.init.call(i, n), i.dirty = !1, i.idField && (i.id = i.get(i.idField), i.id === t && (i.id = i._defaultId))
            }, shouldSerialize: function (e) {
                return He.fn.shouldSerialize.call(this, e) && "uid" !== e && !("id" !== this.idField && "id" === e) && "dirty" !== e && "_accessors" !== e
            }, _parse: function (e, t) {
                var n, i = this, a = e, o = i.fields || {};
                return e = o[e], e || (e = r(o, a)), e && (n = e.parse, !n && e.type && (n = ze[e.type.toLowerCase()])), n ? n(t) : t
            }, _notifyChange: function (e) {
                var t = e.action;
                "add" != t && "remove" != t || (this.dirty = !0)
            }, editable: function (e) {
                return e = (this.fields || {})[e], !e || e.editable !== !1
            }, set: function (e, t, n) {
                var r = this, a = r.dirty;
                r.editable(e) && (t = r._parse(e, t), i(t, r.get(e)) || (r.dirty = !0, He.fn.set.call(r, e, t, n) && !a && (r.dirty = a)))
            }, accept: function (e) {
                var t, n = this, i = function () {
                    return n
                };
                for (t in e) {
                    var r = e[t];
                    "_" != t.charAt(0) && (r = n.wrap(e[t], t, i)), n._set(t, r)
                }
                n.idField && (n.id = n.get(n.idField)), n.dirty = !1
            }, isNew: function () {
                return this.id === this._defaultId
            }
        });
        Ve.define = function (e, n) {
            n === t && (n = e, e = Ve);
            var i, r, a, o, s, l, u, c, d = U({defaults: {}}, n), p = {}, f = d.id, h = [];
            if (f && (d.idField = f), d.id && delete d.id, f && (d.defaults[f] = d._defaultId = ""), "[object Array]" === De.call(d.fields)) {
                for (l = 0, u = d.fields.length; l < u; l++)a = d.fields[l], typeof a === ne ? p[a] = {} : a.field && (p[a.field] = a);
                d.fields = p
            }
            for (r in d.fields)a = d.fields[r], o = a.type || "default", s = null, c = r, r = typeof a.field === ne ? a.field : r, a.nullable || (s = d.defaults[c !== r ? c : r] = a.defaultValue !== t ? a.defaultValue : Pe[o.toLowerCase()], "function" == typeof s && h.push(r)), n.id === r && (d._defaultId = s), d.defaults[c !== r ? c : r] = s, a.parse = a.parse || ze[o];
            return h.length > 0 && (d._initializers = h), i = e.extend(d), i.define = function (e) {
                return Ve.define(i, e)
            }, d.fields && (i.fields = d.fields, i.idField = d.idField), i
        };
        var Le = {
            selector: function (e) {
                return Z(e) ? e : ve(e)
            }, compare: function (e) {
                var t = this.selector(e);
                return function (e, n) {
                    return e = t(e), n = t(n), null == e && null == n ? 0 : null == e ? -1 : null == n ? 1 : e.localeCompare ? e.localeCompare(n) : e > n ? 1 : e < n ? -1 : 0
                }
            }, create: function (e) {
                var t = e.compare || this.compare(e.field);
                return "desc" == e.dir ? function (e, n) {
                    return t(n, e, !0)
                } : t
            }, combine: function (e) {
                return function (t, n) {
                    var i, r, a = e[0](t, n);
                    for (i = 1, r = e.length; i < r; i++)a = a || e[i](t, n);
                    return a
                }
            }
        }, Re = U({}, Le, {
            asc: function (e) {
                var t = this.selector(e);
                return function (e, n) {
                    var i = t(e), r = t(n);
                    return i && i.getTime && r && r.getTime && (i = i.getTime(), r = r.getTime()), i === r ? e.__position - n.__position : null == i ? -1 : null == r ? 1 : i.localeCompare ? i.localeCompare(r) : i > r ? 1 : -1
                }
            }, desc: function (e) {
                var t = this.selector(e);
                return function (e, n) {
                    var i = t(e), r = t(n);
                    return i && i.getTime && r && r.getTime && (i = i.getTime(), r = r.getTime()), i === r ? e.__position - n.__position : null == i ? 1 : null == r ? -1 : r.localeCompare ? r.localeCompare(i) : i < r ? 1 : -1
                }
            }, create: function (e) {
                return this[e.dir](e.field)
            }
        });
        W = function (e, t) {
            var n, i = e.length, r = new Array(i);
            for (n = 0; n < i; n++)r[n] = t(e[n], n, e);
            return r
        };
        var Be = function () {
            function e(e) {
                return e.replace(Oe, "\\").replace(Ee, "")
            }

            function t(t, n, i, r) {
                var a;
                return null != i && (typeof i === ne && (i = e(i), a = Fe.exec(i), a ? i = new Date((+a[1])) : r ? (i = "'" + i.toLowerCase() + "'", n = "((" + n + " || '')+'').toLowerCase()") : i = "'" + i + "'"), i.getTime && (n = "(" + n + "&&" + n + ".getTime?" + n + ".getTime():" + n + ")", i = i.getTime())), n + " " + t + " " + i
            }

            return {
                quote: function (t) {
                    return t && t.getTime ? "new Date(" + t.getTime() + ")" : "string" == typeof t ? "'" + e(t) + "'" : "" + t
                }, eq: function (e, n, i) {
                    return t("==", e, n, i)
                }, neq: function (e, n, i) {
                    return t("!=", e, n, i)
                }, gt: function (e, n, i) {
                    return t(">", e, n, i)
                }, gte: function (e, n, i) {
                    return t(">=", e, n, i)
                }, lt: function (e, n, i) {
                    return t("<", e, n, i)
                }, lte: function (e, n, i) {
                    return t("<=", e, n, i)
                }, startswith: function (t, n, i) {
                    return i && (t = "(" + t + " || '').toLowerCase()", n && (n = n.toLowerCase())), n && (n = e(n)), t + ".lastIndexOf('" + n + "', 0) == 0"
                }, doesnotstartwith: function (t, n, i) {
                    return i && (t = "(" + t + " || '').toLowerCase()", n && (n = n.toLowerCase())), n && (n = e(n)), t + ".lastIndexOf('" + n + "', 0) == -1"
                }, endswith: function (t, n, i) {
                    return i && (t = "(" + t + " || '').toLowerCase()", n && (n = n.toLowerCase())), n && (n = e(n)), t + ".indexOf('" + n + "', " + t + ".length - " + (n || "").length + ") >= 0"
                }, doesnotendwith: function (t, n, i) {
                    return i && (t = "(" + t + " || '').toLowerCase()", n && (n = n.toLowerCase())), n && (n = e(n)), t + ".indexOf('" + n + "', " + t + ".length - " + (n || "").length + ") < 0"
                }, contains: function (t, n, i) {
                    return i && (t = "(" + t + " || '').toLowerCase()", n && (n = n.toLowerCase())), n && (n = e(n)), t + ".indexOf('" + n + "') >= 0"
                }, doesnotcontain: function (t, n, i) {
                    return i && (t = "(" + t + " || '').toLowerCase()", n && (n = n.toLowerCase())), n && (n = e(n)), t + ".indexOf('" + n + "') == -1"
                }, isempty: function (e) {
                    return e + " === ''"
                }, isnotempty: function (e) {
                    return e + " !== ''"
                }, isnull: function (e) {
                    return "(" + e + " === null || " + e + " === undefined)"
                }, isnotnull: function (e) {
                    return "(" + e + " !== null && " + e + " !== undefined)"
                }
            }
        }();
        a.filterExpr = function (e) {
            var n, i, r, o, s, l, u = [], c = {and: " && ", or: " || "}, d = [], p = [], f = e.filters;
            for (n = 0, i = f.length; n < i; n++)r = f[n], s = r.field, l = r.operator, r.filters ? (o = a.filterExpr(r), r = o.expression.replace(/__o\[(\d+)\]/g, function (e, t) {
                return t = +t, "__o[" + (p.length + t) + "]"
            }).replace(/__f\[(\d+)\]/g, function (e, t) {
                return t = +t, "__f[" + (d.length + t) + "]"
            }), p.push.apply(p, o.operators), d.push.apply(d, o.fields)) : (typeof s === ie ? (o = "__f[" + d.length + "](d)", d.push(s)) : o = X.expr(s), typeof l === ie ? (r = "__o[" + p.length + "](" + o + ", " + Be.quote(r.value) + ")", p.push(l)) : r = Be[(l || "eq").toLowerCase()](o, r.value, r.ignoreCase === t || r.ignoreCase)), u.push(r);
            return {expression: "(" + u.join(c[e.logic]) + ")", fields: d, operators: p}
        };
        var Ne = {
            "==": "eq",
            equals: "eq",
            isequalto: "eq",
            equalto: "eq",
            equal: "eq",
            "!=": "neq",
            ne: "neq",
            notequals: "neq",
            isnotequalto: "neq",
            notequalto: "neq",
            notequal: "neq",
            "<": "lt",
            islessthan: "lt",
            lessthan: "lt",
            less: "lt",
            "<=": "lte",
            le: "lte",
            islessthanorequalto: "lte",
            lessthanequal: "lte",
            ">": "gt",
            isgreaterthan: "gt",
            greaterthan: "gt",
            greater: "gt",
            ">=": "gte",
            isgreaterthanorequalto: "gte",
            greaterthanequal: "gte",
            ge: "gte",
            notsubstringof: "doesnotcontain",
            isnull: "isnull",
            isempty: "isempty",
            isnotempty: "isnotempty"
        };
        a.normalizeFilter = l, a.compareFilters = p, a.prototype = {
            toArray: function () {
                return this.data
            }, range: function (e, t) {
                return new a(this.data.slice(e, e + t))
            }, skip: function (e) {
                return new a(this.data.slice(e))
            }, take: function (e) {
                return new a(this.data.slice(0, e))
            }, select: function (e) {
                return new a(W(this.data, e))
            }, order: function (e, t) {
                var n = {dir: t};
                return e && (e.compare ? n.compare = e.compare : n.field = e), new a(this.data.slice(0).sort(Le.create(n)))
            }, orderBy: function (e) {
                return this.order(e, "asc")
            }, orderByDescending: function (e) {
                return this.order(e, "desc")
            }, sort: function (e, t, n) {
                var i, r, a = o(e, t), s = [];
                if (n = n || Le, a.length) {
                    for (i = 0, r = a.length; i < r; i++)s.push(n.create(a[i]));
                    return this.orderBy({compare: n.combine(s)})
                }
                return this
            }, filter: function (e) {
                var t, n, i, r, o, s, u, c, d = this.data, p = [];
                if (e = l(e), !e || 0 === e.filters.length)return this;
                for (r = a.filterExpr(e), s = r.fields, u = r.operators, o = c = new Function("d, __f, __o", "return " + r.expression), (s.length || u.length) && (c = function (e) {
                    return o(e, s, u)
                }), t = 0, i = d.length; t < i; t++)n = d[t], c(n) && p.push(n);
                return new a(p)
            }, group: function (e, t) {
                e = h(e || []), t = t || this.data;
                var n, i = this, r = new a(i.data);
                return e.length > 0 && (n = e[0], r = r.groupBy(n).select(function (i) {
                    var r = new a(t).filter([{field: i.field, operator: "eq", value: i.value, ignoreCase: !1}]);
                    return {
                        field: i.field,
                        value: i.value,
                        items: e.length > 1 ? new a(i.items).group(e.slice(1), r.toArray()).toArray() : i.items,
                        hasSubgroups: e.length > 1,
                        aggregates: r.aggregate(n.aggregates)
                    }
                })), r
            }, groupBy: function (e) {
                if (G(e) || !this.data.length)return new a([]);
                var t, n, i, r, o = e.field, s = this._sortForGrouping(o, e.dir || "asc"), l = X.accessor(o), u = l.get(s[0], o), c = {
                    field: o,
                    value: u,
                    items: []
                }, d = [c];
                for (i = 0, r = s.length; i < r; i++)t = s[i], n = l.get(t, o), m(u, n) || (u = n, c = {
                    field: o,
                    value: u,
                    items: []
                }, d.push(c)), c.items.push(t);
                return new a(d)
            }, _sortForGrouping: function (e, t) {
                var n, i, r = this.data;
                if (!Ie) {
                    for (n = 0, i = r.length; n < i; n++)r[n].__position = n;
                    for (r = new a(r).sort(e, t, Re).toArray(), n = 0, i = r.length; n < i; n++)delete r[n].__position;
                    return r
                }
                return this.sort(e, t).toArray()
            }, aggregate: function (e) {
                var t, n, i = {}, r = {};
                if (e && e.length)for (t = 0, n = this.data.length; t < n; t++)g(i, e, this.data[t], t, n, r);
                return i
            }
        };
        var We = {
            sum: function (e, t, n) {
                var i = n.get(t);
                return v(e) ? v(i) && (e += i) : e = i, e
            }, count: function (e) {
                return (e || 0) + 1
            }, average: function (e, n, i, r, a, o) {
                var s = i.get(n);
                return o.count === t && (o.count = 0), v(e) ? v(s) && (e += s) : e = s, v(s) && o.count++, r == a - 1 && v(e) && (e /= o.count), e
            }, max: function (e, t, n) {
                var i = n.get(t);
                return v(e) || _(e) || (e = i), e < i && (v(i) || _(i)) && (e = i), e
            }, min: function (e, t, n) {
                var i = n.get(t);
                return v(e) || _(e) || (e = i), e > i && (v(i) || _(i)) && (e = i), e
            }
        };
        a.process = function (e, n) {
            n = n || {};
            var i, r = new a(e), s = n.group, l = h(s || []).concat(o(n.sort || [])), u = n.filterCallback, c = n.filter, d = n.skip, p = n.take;
            return c && (r = r.filter(c), u && (r = u(r)), i = r.toArray().length), l && (r = r.sort(l), s && (e = r.toArray())), d !== t && p !== t && (r = r.range(d, p)), s && (r = r.group(s, e)), {
                total: i,
                data: r.toArray()
            }
        };
        var Ue = te.extend({
            init: function (e) {
                this.data = e.data
            }, read: function (e) {
                e.success(this.data)
            }, update: function (e) {
                e.success(e.data)
            }, create: function (e) {
                e.success(e.data)
            }, destroy: function (e) {
                e.success(e.data)
            }
        }), qe = te.extend({
            init: function (e) {
                var t, n = this;
                e = n.options = U({}, n.options, e), J(me, function (t, n) {
                    typeof e[n] === ne && (e[n] = {url: e[n]})
                }), n.cache = e.cache ? je.create(e.cache) : {
                    find: Q,
                    add: Q
                }, t = e.parameterMap, Z(e.push) && (n.push = e.push), n.push || (n.push = ge), n.parameterMap = Z(t) ? t : function (e) {
                    var n = {};
                    return J(e, function (e, i) {
                        e in t && (e = t[e], j(e) && (i = e.value(i), e = e.key)), n[e] = i
                    }), n
                }
            }, options: {parameterMap: ge}, create: function (e) {
                return K(this.setup(e, re))
            }, read: function (n) {
                var i, r, a, o = this, s = o.cache;
                n = o.setup(n, ae), i = n.success || Q, r = n.error || Q, a = s.find(n.data), a !== t ? i(a) : (n.success = function (e) {
                    s.add(n.data, e), i(e)
                }, e.ajax(n))
            }, update: function (e) {
                return K(this.setup(e, oe))
            }, destroy: function (e) {
                return K(this.setup(e, se))
            }, setup: function (e, t) {
                e = e || {};
                var n, i = this, r = i.options[t], a = Z(r.data) ? r.data(e.data) : r.data;
                return e = U(!0, {}, r, e), n = U(!0, {}, a, e.data), e.data = i.parameterMap(n, t), Z(e.url) && (e.url = e.url(n)), e
            }
        }), je = te.extend({
            init: function () {
                this._store = {}
            }, add: function (e, n) {
                e !== t && (this._store[_e(e)] = n)
            }, find: function (e) {
                return this._store[_e(e)]
            }, clear: function () {
                this._store = {}
            }, remove: function (e) {
                delete this._store[_e(e)]
            }
        });
        je.create = function (e) {
            var t = {
                inmemory: function () {
                    return new je
                }
            };
            return j(e) && Z(e.find) ? e : e === !0 ? new je : t[e]()
        };
        var Ge = te.extend({
            init: function (e) {
                var t, n, i, r, a = this;
                e = e || {};
                for (t in e)n = e[t], a[t] = typeof n === ne ? ve(n) : n;
                r = e.modelBase || Ve, j(a.model) && (a.model = i = r.define(a.model));
                var o = q(a.data, a);
                if (a._dataAccessFunction = o, a.model) {
                    var s, l = q(a.groups, a), u = q(a.serialize, a), c = {}, d = {}, p = {}, f = {}, h = !1;
                    i = a.model, i.fields && (J(i.fields, function (e, t) {
                        var n;
                        s = e, j(t) && t.field ? s = t.field : typeof t === ne && (s = t), j(t) && t.from && (n = t.from), h = h || n && n !== e || s !== e, d[e] = ve(n || s), p[e] = ve(e), c[n || s] = e, f[e] = n || s
                    }), !e.serialize && h && (a.serialize = x(u, i, b, p, c, f))), a._dataAccessFunction = o, a.data = x(o, i, y, d, c, f), a.groups = x(l, i, k, d, c, f)
                }
            }, errors: function (e) {
                return e ? e.errors : null
            }, parse: ge, data: ge, total: function (e) {
                return e.length
            }, groups: ge, aggregates: function () {
                return {}
            }, serialize: function (e) {
                return e
            }
        }), Ye = ee.extend({
            init: function (e) {
                var n, i, r = this;
                if (e && (i = e.data), e = r.options = U({}, r.options, e), r._map = {}, r._prefetch = {}, r._data = [], r._pristineData = [], r._ranges = [], r._view = [], r._pristineTotal = 0, r._destroyed = [], r._pageSize = e.pageSize, r._page = e.page || (e.pageSize ? 1 : t), r._sort = o(e.sort), r._filter = l(e.filter), r._group = h(e.group), r._aggregate = e.aggregate, r._total = e.total, r._shouldDetachObservableParents = !0, ee.fn.init.call(r), r.transport = $e.create(e, i, r), Z(r.transport.push) && r.transport.push({
                        pushCreate: q(r._pushCreate, r),
                        pushUpdate: q(r._pushUpdate, r),
                        pushDestroy: q(r._pushDestroy, r)
                    }), null != e.offlineStorage)if ("string" == typeof e.offlineStorage) {
                    var a = e.offlineStorage;
                    r._storage = {
                        getItem: function () {
                            return JSON.parse(localStorage.getItem(a))
                        }, setItem: function (e) {
                            localStorage.setItem(a, _e(r.reader.serialize(e)))
                        }
                    }
                } else r._storage = e.offlineStorage;
                r.reader = new X.data.readers[e.schema.type || "json"](e.schema), n = r.reader.model || {}, r._detachObservableParents(), r._data = r._observe(r._data), r._online = !0, r.bind(["push", de, le, pe, ue, he, fe], e)
            },
            options: {
                data: null,
                schema: {modelBase: Ve},
                offlineStorage: null,
                serverSorting: !1,
                serverPaging: !1,
                serverFiltering: !1,
                serverGrouping: !1,
                serverAggregates: !1,
                batch: !1
            },
            clone: function () {
                return this
            },
            online: function (n) {
                return n !== t ? this._online != n && (this._online = n, n) ? this.sync() : e.Deferred().resolve().promise() : this._online
            },
            offlineData: function (e) {
                return null == this.options.offlineStorage ? null : e !== t ? this._storage.setItem(e) : this._storage.getItem() || []
            },
            _isServerGrouped: function () {
                var e = this.group() || [];
                return this.options.serverGrouping && e.length
            },
            _pushCreate: function (e) {
                this._push(e, "pushCreate")
            },
            _pushUpdate: function (e) {
                this._push(e, "pushUpdate")
            },
            _pushDestroy: function (e) {
                this._push(e, "pushDestroy")
            },
            _push: function (e, t) {
                var n = this._readData(e);
                n || (n = e), this[t](n)
            },
            _flatData: function (e, t) {
                if (e) {
                    if (this._isServerGrouped())return T(e);
                    if (!t)for (var n = 0; n < e.length; n++)e.at(n)
                }
                return e
            },
            parent: Q,
            get: function (e) {
                var t, n, i = this._flatData(this._data);
                for (t = 0, n = i.length; t < n; t++)if (i[t].id == e)return i[t]
            },
            getByUid: function (e) {
                var t, n, i = this._flatData(this._data);
                if (i)for (t = 0, n = i.length; t < n; t++)if (i[t].uid == e)return i[t]
            },
            indexOf: function (e) {
                return M(this._data, e)
            },
            at: function (e) {
                return this._data.at(e)
            },
            data: function (e) {
                var n = this;
                if (e === t) {
                    if (n._data)for (var i = 0; i < n._data.length; i++)n._data.at(i);
                    return n._data
                }
                n._detachObservableParents(), n._data = this._observe(e), n._pristineData = e.slice(0), n._storeData(), n._ranges = [], n.trigger("reset"), n._addRange(n._data), n._total = n._data.length, n._pristineTotal = n._total, n._process(n._data)
            },
            view: function (e) {
                return e === t ? this._view : void(this._view = this._observeView(e))
            },
            _observeView: function (e) {
                var t = this;
                E(e, t._data, t._ranges, t.reader.model || He, t._isServerGrouped());
                var n = new Me(e, t.reader.model);
                return n.parent = function () {
                    return t.parent()
                }, n
            },
            flatView: function () {
                var e = this.group() || [];
                return e.length ? T(this._view) : this._view
            },
            add: function (e) {
                return this.insert(this._data.length, e)
            },
            _createNewModel: function (e) {
                return this.reader.model ? new this.reader.model(e) : e instanceof He ? e : new He(e)
            },
            insert: function (e, t) {
                return t || (t = e, e = 0), t instanceof Ve || (t = this._createNewModel(t)), this._isServerGrouped() ? this._data.splice(e, 0, this._wrapInEmptyGroup(t)) : this._data.splice(e, 0, t), t
            },
            pushCreate: function (e) {
                Y(e) || (e = [e]);
                var t = [], n = this.options.autoSync;
                this.options.autoSync = !1;
                try {
                    for (var i = 0; i < e.length; i++) {
                        var r = e[i], a = this.add(r);
                        t.push(a);
                        var o = a.toJSON();
                        this._isServerGrouped() && (o = this._wrapInEmptyGroup(o)), this._pristineData.push(o)
                    }
                } finally {
                    this.options.autoSync = n
                }
                t.length && this.trigger("push", {type: "create", items: t})
            },
            pushUpdate: function (e) {
                Y(e) || (e = [e]);
                for (var t = [], n = 0; n < e.length; n++) {
                    var i = e[n], r = this._createNewModel(i), a = this.get(r.id);
                    a ? (t.push(a), a.accept(i), a.trigger(le), this._updatePristineForModel(a, i)) : this.pushCreate(i)
                }
                t.length && this.trigger("push", {type: "update", items: t})
            },
            pushDestroy: function (e) {
                var t = this._removeItems(e);
                t.length && this.trigger("push", {type: "destroy", items: t})
            },
            _removeItems: function (e) {
                Y(e) || (e = [e]);
                var t = [], n = this.options.autoSync;
                this.options.autoSync = !1;
                try {
                    for (var i = 0; i < e.length; i++) {
                        var r = e[i], a = this._createNewModel(r), o = !1;
                        this._eachItem(this._data, function (e) {
                            for (var n = 0; n < e.length; n++) {
                                var i = e.at(n);
                                if (i.id === a.id) {
                                    t.push(i), e.splice(n, 1), o = !0;
                                    break
                                }
                            }
                        }), o && (this._removePristineForModel(a), this._destroyed.pop())
                    }
                } finally {
                    this.options.autoSync = n
                }
                return t
            },
            remove: function (e) {
                var t, n = this, i = n._isServerGrouped();
                return this._eachItem(n._data, function (r) {
                    if (t = O(r, e), t && i)return t.isNew && t.isNew() || n._destroyed.push(t), !0
                }), this._removeModelFromRanges(e), this._updateRangesLength(), e
            },
            destroyed: function () {
                return this._destroyed
            },
            created: function () {
                var e, t, n = [], i = this._flatData(this._data);
                for (e = 0, t = i.length; e < t; e++)i[e].isNew && i[e].isNew() && n.push(i[e]);
                return n
            },
            updated: function () {
                var e, t, n = [], i = this._flatData(this._data);
                for (e = 0, t = i.length; e < t; e++)i[e].isNew && !i[e].isNew() && i[e].dirty && n.push(i[e]);
                return n
            },
            sync: function () {
                var t = this, n = [], i = [], r = t._destroyed, a = e.Deferred().resolve().promise();
                if (t.online()) {
                    if (!t.reader.model)return a;
                    n = t.created(), i = t.updated();
                    var o = [];
                    t.options.batch && t.transport.submit ? o = t._sendSubmit(n, i, r) : (o.push.apply(o, t._send("create", n)), o.push.apply(o, t._send("update", i)), o.push.apply(o, t._send("destroy", r))), a = e.when.apply(null, o).then(function () {
                        var e, n;
                        for (e = 0, n = arguments.length; e < n; e++)t._accept(arguments[e]);
                        t._storeData(!0), t._change({action: "sync"}), t.trigger(ue)
                    })
                } else t._storeData(!0), t._change({action: "sync"});
                return a
            },
            cancelChanges: function (e) {
                var t = this;
                e instanceof X.data.Model ? t._cancelModel(e) : (t._destroyed = [], t._detachObservableParents(), t._data = t._observe(t._pristineData), t.options.serverPaging && (t._total = t._pristineTotal), t._ranges = [], t._addRange(t._data), t._change(), t._markOfflineUpdatesAsDirty())
            },
            _markOfflineUpdatesAsDirty: function () {
                var e = this;
                null != e.options.offlineStorage && e._eachItem(e._data, function (e) {
                    for (var t = 0; t < e.length; t++) {
                        var n = e.at(t);
                        "update" != n.__state__ && "create" != n.__state__ || (n.dirty = !0)
                    }
                })
            },
            hasChanges: function () {
                var e, t, n = this._flatData(this._data);
                if (this._destroyed.length)return !0;
                for (e = 0, t = n.length; e < t; e++)if (n[e].isNew && n[e].isNew() || n[e].dirty)return !0;
                return !1
            },
            _accept: function (t) {
                var n, i = this, r = t.models, a = t.response, o = 0, s = i._isServerGrouped(), l = i._pristineData, u = t.type;
                if (i.trigger(he, {response: a, type: u}), a && !G(a)) {
                    if (a = i.reader.parse(a), i._handleCustomErrors(a))return;
                    a = i.reader.data(a), Y(a) || (a = [a])
                } else a = e.map(r, function (e) {
                    return e.toJSON()
                });
                for ("destroy" === u && (i._destroyed = []), o = 0, n = r.length; o < n; o++)"destroy" !== u ? (r[o].accept(a[o]), "create" === u ? l.push(s ? i._wrapInEmptyGroup(r[o]) : a[o]) : "update" === u && i._updatePristineForModel(r[o], a[o])) : i._removePristineForModel(r[o])
            },
            _updatePristineForModel: function (e, t) {
                this._executeOnPristineForModel(e, function (e, n) {
                    X.deepExtend(n[e], t)
                })
            },
            _executeOnPristineForModel: function (e, t) {
                this._eachPristineItem(function (n) {
                    var i = A(n, e);
                    if (i > -1)return t(i, n), !0
                })
            },
            _removePristineForModel: function (e) {
                this._executeOnPristineForModel(e, function (e, t) {
                    t.splice(e, 1)
                })
            },
            _readData: function (e) {
                var t = this._isServerGrouped() ? this.reader.groups : this.reader.data;
                return t.call(this.reader, e)
            },
            _eachPristineItem: function (e) {
                this._eachItem(this._pristineData, e)
            },
            _eachItem: function (e, t) {
                e && e.length && (this._isServerGrouped() ? D(e, t) : t(e))
            },
            _pristineForModel: function (e) {
                var t, n, i = function (i) {
                    if (n = A(i, e), n > -1)return t = i[n], !0
                };
                return this._eachPristineItem(i), t
            },
            _cancelModel: function (e) {
                var t = this._pristineForModel(e);
                this._eachItem(this._data, function (n) {
                    var i = M(n, e);
                    i >= 0 && (!t || e.isNew() && !t.__state__ ? n.splice(i, 1) : (n[i].accept(t), "update" == t.__state__ && (n[i].dirty = !0)))
                })
            },
            _submit: function (t, n) {
                var i = this;
                i.trigger(pe, {type: "submit"}), i.transport.submit(U({
                    success: function (n, i) {
                        var r = e.grep(t, function (e) {
                            return e.type == i
                        })[0];
                        r && r.resolve({response: n, models: r.models, type: i})
                    }, error: function (e, n, r) {
                        for (var a = 0; a < t.length; a++)t[a].reject(e);
                        i.error(e, n, r)
                    }
                }, n))
            },
            _sendSubmit: function (t, n, i) {
                var r = this, a = [];
                return r.options.batch && (t.length && a.push(e.Deferred(function (e) {
                    e.type = "create", e.models = t
                })), n.length && a.push(e.Deferred(function (e) {
                    e.type = "update", e.models = n
                })), i.length && a.push(e.Deferred(function (e) {
                    e.type = "destroy", e.models = i
                })), r._submit(a, {
                    data: {
                        created: r.reader.serialize(w(t)),
                        updated: r.reader.serialize(w(n)),
                        destroyed: r.reader.serialize(w(i))
                    }
                })), a
            },
            _promise: function (t, n, i) {
                var r = this;
                return e.Deferred(function (e) {
                    r.trigger(pe, {type: i}), r.transport[i].call(r.transport, U({
                        success: function (t) {
                            e.resolve({response: t, models: n, type: i})
                        }, error: function (t, n, i) {
                            e.reject(t), r.error(t, n, i)
                        }
                    }, t))
                }).promise()
            },
            _send: function (e, t) {
                var n, i, r = this, a = [], o = r.reader.serialize(w(t));
                if (r.options.batch)t.length && a.push(r._promise({data: {models: o}}, t, e)); else for (n = 0, i = t.length; n < i; n++)a.push(r._promise({data: o[n]}, [t[n]], e));
                return a
            },
            read: function (t) {
                var n = this, i = n._params(t), r = e.Deferred();
                return n._queueRequest(i, function () {
                    var e = n.trigger(pe, {type: "read"});
                    e ? (n._dequeueRequest(), r.resolve(e)) : (n.trigger(fe), n._ranges = [], n.trigger("reset"), n.online() ? n.transport.read({
                        data: i,
                        success: function (e) {
                            n._ranges = [], n.success(e, i), r.resolve()
                        },
                        error: function () {
                            var e = Te.call(arguments);
                            n.error.apply(n, e), r.reject.apply(r, e)
                        }
                    }) : null != n.options.offlineStorage && (n.success(n.offlineData(), i), r.resolve()))
                }), r.promise()
            },
            _readAggregates: function (e) {
                return this.reader.aggregates(e)
            },
            success: function (e) {
                var t = this, n = t.options;
                if (t.trigger(he, {response: e, type: "read"}), t.online()) {
                    if (e = t.reader.parse(e), t._handleCustomErrors(e))return void t._dequeueRequest();
                    t._total = t.reader.total(e), t._aggregate && n.serverAggregates && (t._aggregateResult = t._readAggregates(e)), e = t._readData(e), t._destroyed = []
                } else {
                    e = t._readData(e);
                    var i, r = [], a = {}, o = t.reader.model, s = o ? o.idField : "id";
                    for (i = 0; i < this._destroyed.length; i++) {
                        var l = this._destroyed[i][s];
                        a[l] = l
                    }
                    for (i = 0; i < e.length; i++) {
                        var u = e[i], c = u.__state__;
                        "destroy" == c ? a[u[s]] || this._destroyed.push(this._createNewModel(u)) : r.push(u)
                    }
                    e = r, t._total = e.length
                }
                t._pristineTotal = t._total, t._pristineData = e.slice(0), t._detachObservableParents(), t._data = t._observe(e), t._markOfflineUpdatesAsDirty(), t._storeData(), t._addRange(t._data), t._process(t._data), t._dequeueRequest()
            },
            _detachObservableParents: function () {
                if (this._data && this._shouldDetachObservableParents)for (var e = 0; e < this._data.length; e++)this._data[e].parent && (this._data[e].parent = Q)
            },
            _storeData: function (e) {
                function t(e) {
                    for (var r = [], a = 0; a < e.length; a++) {
                        var o = e.at(a), s = o.toJSON();
                        n && o.items ? s.items = t(o.items) : (s.uid = o.uid, i && (o.isNew() ? s.__state__ = "create" : o.dirty && (s.__state__ = "update"))), r.push(s)
                    }
                    return r
                }

                var n = this._isServerGrouped(), i = this.reader.model;
                if (null != this.options.offlineStorage) {
                    for (var r = t(this._data), a = [], o = 0; o < this._destroyed.length; o++) {
                        var s = this._destroyed[o].toJSON();
                        s.__state__ = "destroy", a.push(s)
                    }
                    this.offlineData(r.concat(a)), e && (this._pristineData = this._readData(r))
                }
            },
            _addRange: function (e) {
                var t = this, n = t._skip || 0, i = n + t._flatData(e, !0).length;
                t._ranges.push({
                    start: n,
                    end: i,
                    data: e,
                    timestamp: (new Date).getTime()
                }), t._ranges.sort(function (e, t) {
                    return e.start - t.start
                })
            },
            error: function (e, t, n) {
                this._dequeueRequest(), this.trigger(he, {}), this.trigger(de, {xhr: e, status: t, errorThrown: n})
            },
            _params: function (e) {
                var t = this, n = U({
                    take: t.take(),
                    skip: t.skip(),
                    page: t.page(),
                    pageSize: t.pageSize(),
                    sort: t._sort,
                    filter: t._filter,
                    group: t._group,
                    aggregate: t._aggregate
                }, e);
                return t.options.serverPaging || (delete n.take, delete n.skip, delete n.page, delete n.pageSize), t.options.serverGrouping ? t.reader.model && n.group && (n.group = V(n.group, t.reader.model)) : delete n.group, t.options.serverFiltering ? t.reader.model && n.filter && (n.filter = P(n.filter, t.reader.model)) : delete n.filter, t.options.serverSorting ? t.reader.model && n.sort && (n.sort = V(n.sort, t.reader.model)) : delete n.sort, t.options.serverAggregates ? t.reader.model && n.aggregate && (n.aggregate = V(n.aggregate, t.reader.model)) : delete n.aggregate, n
            },
            _queueRequest: function (e, n) {
                var i = this;
                i._requestInProgress ? i._pending = {
                    callback: q(n, i),
                    options: e
                } : (i._requestInProgress = !0, i._pending = t, n())
            },
            _dequeueRequest: function () {
                var e = this;
                e._requestInProgress = !1, e._pending && e._queueRequest(e._pending.options, e._pending.callback)
            },
            _handleCustomErrors: function (e) {
                if (this.reader.errors) {
                    var t = this.reader.errors(e);
                    if (t)return this.trigger(de, {
                        xhr: null,
                        status: "customerror",
                        errorThrown: "custom error",
                        errors: t
                    }), !0
                }
                return !1
            },
            _shouldWrap: function (e) {
                var t = this.reader.model;
                return !(!t || !e.length) && !(e[0] instanceof t)
            },
            _observe: function (e) {
                var t = this, n = t.reader.model;
                if (t._shouldDetachObservableParents = !0, e instanceof Ae)t._shouldDetachObservableParents = !1, t._shouldWrap(e) && (e.type = t.reader.model, e.wrapAll(e, e)); else {
                    var i = t.pageSize() && !t.options.serverPaging ? Me : Ae;
                    e = new i(e, t.reader.model), e.parent = function () {
                        return t.parent()
                    }
                }
                return t._isServerGrouped() && S(e, n), t._changeHandler && t._data && t._data instanceof Ae ? t._data.unbind(le, t._changeHandler) : t._changeHandler = q(t._change, t), e.bind(le, t._changeHandler)
            },
            _updateTotalForAction: function (e, t) {
                var n = this, i = parseInt(n._total, 10);
                v(n._total) || (i = parseInt(n._pristineTotal, 10)), "add" === e ? i += t.length : "remove" === e ? i -= t.length : "itemchange" === e || "sync" === e || n.options.serverPaging ? "sync" === e && (i = n._pristineTotal = parseInt(n._total, 10)) : i = n._pristineTotal, n._total = i
            },
            _change: function (e) {
                var t, n, i = this, r = e ? e.action : "";
                if ("remove" === r)for (t = 0, n = e.items.length; t < n; t++)e.items[t].isNew && e.items[t].isNew() || i._destroyed.push(e.items[t]);
                if (!i.options.autoSync || "add" !== r && "remove" !== r && "itemchange" !== r)i._updateTotalForAction(r, e ? e.items : []), i._process(i._data, e); else {
                    var a = function (t) {
                        "sync" === t.action && (i.unbind("change", a), i._updateTotalForAction(r, e.items))
                    };
                    i.first("change", a), i.sync()
                }
            },
            _calculateAggregates: function (e, t) {
                t = t || {};
                var n = new a(e), i = t.aggregate, r = t.filter;
                return r && (n = n.filter(r)), n.aggregate(i)
            },
            _process: function (e, n) {
                var i, r = this, a = {};
                r.options.serverPaging !== !0 && (a.skip = r._skip, a.take = r._take || r._pageSize, a.skip === t && r._page !== t && r._pageSize !== t && (a.skip = (r._page - 1) * r._pageSize)), r.options.serverSorting !== !0 && (a.sort = r._sort), r.options.serverFiltering !== !0 && (a.filter = r._filter), r.options.serverGrouping !== !0 && (a.group = r._group), r.options.serverAggregates !== !0 && (a.aggregate = r._aggregate,
                    r._aggregateResult = r._calculateAggregates(e, a)), i = r._queryProcess(e, a), r.view(i.data), i.total === t || r.options.serverFiltering || (r._total = i.total), n = n || {}, n.items = n.items || r._view, r.trigger(le, n)
            },
            _queryProcess: function (e, t) {
                return a.process(e, t)
            },
            _mergeState: function (e) {
                var n = this;
                return e !== t && (n._pageSize = e.pageSize, n._page = e.page, n._sort = e.sort, n._filter = e.filter, n._group = e.group, n._aggregate = e.aggregate, n._skip = n._currentRangeStart = e.skip, n._take = e.take, n._skip === t && (n._skip = n._currentRangeStart = n.skip(), e.skip = n.skip()), n._take === t && n._pageSize !== t && (n._take = n._pageSize, e.take = n._take), e.sort && (n._sort = e.sort = o(e.sort)), e.filter && (n._filter = e.filter = l(e.filter)), e.group && (n._group = e.group = h(e.group)), e.aggregate && (n._aggregate = e.aggregate = f(e.aggregate))), e
            },
            query: function (n) {
                var i, r = this.options.serverSorting || this.options.serverPaging || this.options.serverFiltering || this.options.serverGrouping || this.options.serverAggregates;
                if (r || (this._data === t || 0 === this._data.length) && !this._destroyed.length)return this.read(this._mergeState(n));
                var a = this.trigger(pe, {type: "read"});
                return a || (this.trigger(fe), i = this._queryProcess(this._data, this._mergeState(n)), this.options.serverFiltering || (i.total !== t ? this._total = i.total : this._total = this._data.length), this._aggregateResult = this._calculateAggregates(this._data, n), this.view(i.data), this.trigger(he, {type: "read"}), this.trigger(le, {items: i.data})), e.Deferred().resolve(a).promise()
            },
            fetch: function (e) {
                var t = this, n = function (n) {
                    n !== !0 && Z(e) && e.call(t)
                };
                return this._query().then(n)
            },
            _query: function (e) {
                var t = this;
                return t.query(U({}, {
                    page: t.page(),
                    pageSize: t.pageSize(),
                    sort: t.sort(),
                    filter: t.filter(),
                    group: t.group(),
                    aggregate: t.aggregate()
                }, e))
            },
            next: function (e) {
                var t = this, n = t.page(), i = t.total();
                if (e = e || {}, n && !(i && n + 1 > t.totalPages()))return t._skip = t._currentRangeStart = n * t.take(), n += 1, e.page = n, t._query(e), n
            },
            prev: function (e) {
                var t = this, n = t.page();
                if (e = e || {}, n && 1 !== n)return t._skip = t._currentRangeStart = t._skip - t.take(), n -= 1, e.page = n, t._query(e), n
            },
            page: function (e) {
                var n, i = this;
                return e !== t ? (e = we.max(we.min(we.max(e, 1), i.totalPages()), 1), void i._query({page: e})) : (n = i.skip(), n !== t ? we.round((n || 0) / (i.take() || 1)) + 1 : t)
            },
            pageSize: function (e) {
                var n = this;
                return e !== t ? void n._query({pageSize: e, page: 1}) : n.take()
            },
            sort: function (e) {
                var n = this;
                return e !== t ? void n._query({sort: e}) : n._sort
            },
            filter: function (e) {
                var n = this;
                return e === t ? n._filter : (n.trigger("reset"), void n._query({filter: e, page: 1}))
            },
            group: function (e) {
                var n = this;
                return e !== t ? void n._query({group: e}) : n._group
            },
            total: function () {
                return parseInt(this._total || 0, 10)
            },
            aggregate: function (e) {
                var n = this;
                return e !== t ? void n._query({aggregate: e}) : n._aggregate
            },
            aggregates: function () {
                var e = this._aggregateResult;
                return G(e) && (e = this._emptyAggregates(this.aggregate())), e
            },
            _emptyAggregates: function (e) {
                var t = {};
                if (!G(e)) {
                    var n = {};
                    Y(e) || (e = [e]);
                    for (var i = 0; i < e.length; i++)n[e[i].aggregate] = 0, t[e[i].field] = n
                }
                return t
            },
            _wrapInEmptyGroup: function (e) {
                var t, n, i, r, a = this.group();
                for (i = a.length - 1, r = 0; i >= r; i--)n = a[i], t = {
                    value: e.get(n.field),
                    field: n.field,
                    items: t ? [t] : [e],
                    hasSubgroups: !!t,
                    aggregates: this._emptyAggregates(n.aggregates)
                };
                return t
            },
            totalPages: function () {
                var e = this, t = e.pageSize() || e.total();
                return we.ceil((e.total() || 0) / t)
            },
            inRange: function (e, t) {
                var n = this, i = we.min(e + t, n.total());
                return !n.options.serverPaging && n._data.length > 0 || n._findRange(e, i).length > 0
            },
            lastRange: function () {
                var e = this._ranges;
                return e[e.length - 1] || {start: 0, end: 0, data: []}
            },
            firstItemUid: function () {
                var e = this._ranges;
                return e.length && e[0].data.length && e[0].data[0].uid
            },
            enableRequestsInProgress: function () {
                this._skipRequestsInProgress = !1
            },
            _timeStamp: function () {
                return (new Date).getTime()
            },
            range: function (e, n) {
                this._currentRequestTimeStamp = this._timeStamp(), this._skipRequestsInProgress = !0, e = we.min(e || 0, this.total());
                var i, r = this, a = we.max(we.floor(e / n), 0) * n, o = we.min(a + n, r.total());
                if (i = r._findRange(e, we.min(e + n, r.total())), i.length) {
                    r._pending = t, r._skip = e > r.skip() ? we.min(o, (r.totalPages() - 1) * r.take()) : a, r._currentRangeStart = e, r._take = n;
                    var s = r.options.serverPaging, l = r.options.serverSorting, u = r.options.serverFiltering, c = r.options.serverAggregates;
                    try {
                        r.options.serverPaging = !0, r._isServerGrouped() || r.group() && r.group().length || (r.options.serverSorting = !0), r.options.serverFiltering = !0, r.options.serverPaging = !0, r.options.serverAggregates = !0, s && (r._detachObservableParents(), r._data = i = r._observe(i)), r._process(i)
                    } finally {
                        r.options.serverPaging = s, r.options.serverSorting = l, r.options.serverFiltering = u, r.options.serverAggregates = c
                    }
                } else n !== t && (r._rangeExists(a, o) ? a < e && r.prefetch(o, n, function () {
                    r.range(e, n)
                }) : r.prefetch(a, n, function () {
                    e > a && o < r.total() && !r._rangeExists(o, we.min(o + n, r.total())) ? r.prefetch(o, n, function () {
                        r.range(e, n)
                    }) : r.range(e, n)
                }))
            },
            _findRange: function (e, n) {
                var i, r, a, s, l, u, c, d, p, f, m, g = this, v = g._ranges, _ = [], w = g.options, b = w.serverSorting || w.serverPaging || w.serverFiltering || w.serverGrouping || w.serverAggregates;
                for (r = 0, m = v.length; r < m; r++)if (i = v[r], e >= i.start && e <= i.end) {
                    for (f = 0, a = r; a < m; a++)if (i = v[a], p = g._flatData(i.data, !0), p.length && e + f >= i.start) {
                        if (u = i.data, c = i.end, !b) {
                            var y = h(g.group() || []).concat(o(g.sort() || []));
                            d = g._queryProcess(i.data, {
                                sort: y,
                                filter: g.filter()
                            }), p = u = d.data, d.total !== t && (c = d.total)
                        }
                        if (s = 0, e + f > i.start && (s = e + f - i.start), l = p.length, c > n && (l -= c - n), f += l - s, _ = g._mergeGroups(_, u, s, l), n <= i.end && f == n - e)return _
                    }
                    break
                }
                return []
            },
            _mergeGroups: function (e, t, n, i) {
                if (this._isServerGrouped()) {
                    var r, a = t.toJSON();
                    return e.length && (r = e[e.length - 1]), C(r, a, n, i), e.concat(a)
                }
                return e.concat(t.slice(n, i))
            },
            skip: function () {
                var e = this;
                return e._skip === t ? e._page !== t ? (e._page - 1) * (e.take() || 1) : t : e._skip
            },
            currentRangeStart: function () {
                return this._currentRangeStart || 0
            },
            take: function () {
                return this._take || this._pageSize
            },
            _prefetchSuccessHandler: function (e, t, n, i) {
                var r = this, a = r._timeStamp();
                return function (o) {
                    var s, l, u, c = !1, d = {start: e, end: t, data: [], timestamp: r._timeStamp()};
                    if (r._dequeueRequest(), r.trigger(he, {
                            response: o,
                            type: "read"
                        }), o = r.reader.parse(o), u = r._readData(o), u.length) {
                        for (s = 0, l = r._ranges.length; s < l; s++)if (r._ranges[s].start === e) {
                            c = !0, d = r._ranges[s];
                            break
                        }
                        c || r._ranges.push(d)
                    }
                    d.data = r._observe(u), d.end = d.start + r._flatData(d.data, !0).length, r._ranges.sort(function (e, t) {
                        return e.start - t.start
                    }), r._total = r.reader.total(o), (i || a >= r._currentRequestTimeStamp || !r._skipRequestsInProgress) && (n && u.length ? n() : r.trigger(le, {}))
                }
            },
            prefetch: function (e, t, n) {
                var i = this, r = we.min(e + t, i.total()), a = {
                    take: t,
                    skip: e,
                    page: e / t + 1,
                    pageSize: t,
                    sort: i._sort,
                    filter: i._filter,
                    group: i._group,
                    aggregate: i._aggregate
                };
                i._rangeExists(e, r) ? n && n() : (clearTimeout(i._timeout), i._timeout = setTimeout(function () {
                    i._queueRequest(a, function () {
                        i.trigger(pe, {type: "read"}) ? i._dequeueRequest() : i.transport.read({
                            data: i._params(a),
                            success: i._prefetchSuccessHandler(e, r, n),
                            error: function () {
                                var e = Te.call(arguments);
                                i.error.apply(i, e)
                            }
                        })
                    })
                }, 100))
            },
            _multiplePrefetch: function (e, t, n) {
                var i = this, r = we.min(e + t, i.total()), a = {
                    take: t,
                    skip: e,
                    page: e / t + 1,
                    pageSize: t,
                    sort: i._sort,
                    filter: i._filter,
                    group: i._group,
                    aggregate: i._aggregate
                };
                i._rangeExists(e, r) ? n && n() : i.trigger(pe, {type: "read"}) || i.transport.read({
                    data: i._params(a),
                    success: i._prefetchSuccessHandler(e, r, n, !0)
                })
            },
            _rangeExists: function (e, t) {
                var n, i, r = this, a = r._ranges;
                for (n = 0, i = a.length; n < i; n++)if (a[n].start <= e && a[n].end >= t)return !0;
                return !1
            },
            _removeModelFromRanges: function (e) {
                for (var t, n, i, r = 0, a = this._ranges.length; r < a && (i = this._ranges[r], this._eachItem(i.data, function (i) {
                    t = O(i, e), t && (n = !0)
                }), !n); r++);
            },
            _updateRangesLength: function () {
                for (var e, t, n = 0, i = 0, r = this._ranges.length; i < r; i++)e = this._ranges[i], e.start = e.start - n, t = this._flatData(e.data, !0).length, n = e.end - t, e.end = e.start + t
            }
        }), $e = {};
        $e.create = function (t, n, i) {
            var r, a = t.transport ? e.extend({}, t.transport) : null;
            return a ? (a.read = typeof a.read === ne ? {url: a.read} : a.read, "jsdo" === t.type && (a.dataSource = i), t.type && (X.data.transports = X.data.transports || {}, X.data.schemas = X.data.schemas || {}, X.data.transports[t.type] ? j(X.data.transports[t.type]) ? a = U(!0, {}, X.data.transports[t.type], a) : r = new X.data.transports[t.type](U(a, {data: n})) : X.logToConsole("Unknown DataSource transport type '" + t.type + "'.\nVerify that registration scripts for this type are included after Kendo UI on the page.", "warn"), t.schema = U(!0, {}, X.data.schemas[t.type], t.schema)), r || (r = Z(a.read) ? a : new qe(a))) : r = new Ue({data: t.data || []}), r
        }, Ye.create = function (e) {
            (Y(e) || e instanceof Ae) && (e = {data: e});
            var n, i, r, a = e || {}, o = a.data, s = a.fields, l = a.table, u = a.select, c = {};
            if (o || !s || a.transport || (l ? o = R(l, s) : u && (o = L(u, s), a.group === t && o[0] && o[0].optgroup !== t && (a.group = "optgroup"))), X.data.Model && s && (!a.schema || !a.schema.model)) {
                for (n = 0, i = s.length; n < i; n++)r = s[n], r.type && (c[r.field] = r);
                G(c) || (a.schema = U(!0, a.schema, {model: {fields: c}}))
            }
            return a.data = o, u = null, a.select = null, l = null, a.table = null, a instanceof Ye ? a : new Ye(a)
        };
        var Ke = Ve.define({
            idField: "id", init: function (e) {
                var t = this, n = t.hasChildren || e && e.hasChildren, i = "items", r = {};
                X.data.Model.fn.init.call(t, e), typeof t.children === ne && (i = t.children), r = {
                    schema: {
                        data: i,
                        model: {hasChildren: n, id: t.idField, fields: t.fields}
                    }
                }, typeof t.children !== ne && U(r, t.children), r.data = e, n || (n = r.schema.data), typeof n === ne && (n = X.getter(n)), Z(n) && (t.hasChildren = !!n.call(t, t)), t._childrenOptions = r, t.hasChildren && t._initChildren(), t._loaded = !(!e || !e._loaded)
            }, _initChildren: function () {
                var e, t, n, i = this;
                i.children instanceof Je || (e = i.children = new Je(i._childrenOptions), t = e.transport, n = t.parameterMap, t.parameterMap = function (e, t) {
                    return e[i.idField || "id"] = i.id, n && (e = n(e, t)), e
                }, e.parent = function () {
                    return i
                }, e.bind(le, function (e) {
                    e.node = e.node || i, i.trigger(le, e)
                }), e.bind(de, function (e) {
                    var t = i.parent();
                    t && (e.node = e.node || i, t.trigger(de, e))
                }), i._updateChildrenField())
            }, append: function (e) {
                this._initChildren(), this.loaded(!0), this.children.add(e)
            }, hasChildren: !1, level: function () {
                for (var e = this.parentNode(), t = 0; e && e.parentNode;)t++, e = e.parentNode ? e.parentNode() : null;
                return t
            }, _updateChildrenField: function () {
                var e = this._childrenOptions.schema.data;
                this[e || "items"] = this.children.data()
            }, _childrenLoaded: function () {
                this._loaded = !0, this._updateChildrenField()
            }, load: function () {
                var n, i, r = {}, a = "_query";
                return this.hasChildren ? (this._initChildren(), n = this.children, r[this.idField || "id"] = this.id, this._loaded || (n._data = t, a = "read"), n.one(le, q(this._childrenLoaded, this)), i = n[a](r)) : this.loaded(!0), i || e.Deferred().resolve().promise()
            }, parentNode: function () {
                var e = this.parent();
                return e.parent()
            }, loaded: function (e) {
                return e === t ? this._loaded : void(this._loaded = e)
            }, shouldSerialize: function (e) {
                return Ve.fn.shouldSerialize.call(this, e) && "children" !== e && "_loaded" !== e && "hasChildren" !== e && "_childrenOptions" !== e
            }
        }), Je = Ye.extend({
            init: function (e) {
                var t = Ke.define({children: e});
                Ye.fn.init.call(this, U(!0, {}, {schema: {modelBase: t, model: t}}, e)), this._attachBubbleHandlers()
            }, _attachBubbleHandlers: function () {
                var e = this;
                e._data.bind(de, function (t) {
                    e.trigger(de, t)
                })
            }, remove: function (e) {
                var t, n = e.parentNode(), i = this;
                return n && n._initChildren && (i = n.children), t = Ye.fn.remove.call(i, e), n && !i.data().length && (n.hasChildren = !1), t
            }, success: B("success"), data: B("data"), insert: function (e, t) {
                var n = this.parent();
                return n && n._initChildren && (n.hasChildren = !0, n._initChildren()), Ye.fn.insert.call(this, e, t)
            }, _find: function (e, t) {
                var n, i, r, a, o = this._data;
                if (o) {
                    if (r = Ye.fn[e].call(this, t))return r;
                    for (o = this._flatData(this._data), n = 0, i = o.length; n < i; n++)if (a = o[n].children, a instanceof Je && (r = a[e](t)))return r
                }
            }, get: function (e) {
                return this._find("get", e)
            }, getByUid: function (e) {
                return this._find("getByUid", e)
            }
        });
        Je.create = function (e) {
            e = e && e.push ? {data: e} : e;
            var t = e || {}, n = t.data, i = t.fields, r = t.list;
            return n && n._dataSource ? n._dataSource : (n || !i || t.transport || r && (n = N(r, i)), t.data = n, t instanceof Je ? t : new Je(t))
        };
        var Qe = X.Observable.extend({
            init: function (e, t, n) {
                X.Observable.fn.init.call(this), this._prefetching = !1, this.dataSource = e, this.prefetch = !n;
                var i = this;
                e.bind("change", function () {
                    i._change()
                }), e.bind("reset", function () {
                    i._reset()
                }), this._syncWithDataSource(), this.setViewSize(t)
            }, setViewSize: function (e) {
                this.viewSize = e, this._recalculate()
            }, at: function (e) {
                var t = this.pageSize, n = !0;
                return e >= this.total() ? (this.trigger("endreached", {index: e}), null) : this.useRanges ? this.useRanges ? ((e < this.dataOffset || e >= this.skip + t) && (n = this.range(Math.floor(e / t) * t)), e === this.prefetchThreshold && this._prefetch(), e === this.midPageThreshold ? this.range(this.nextMidRange, !0) : e === this.nextPageThreshold ? this.range(this.nextFullRange) : e === this.pullBackThreshold && (this.offset === this.skip ? this.range(this.previousMidRange) : this.range(this.previousFullRange)), n ? this.dataSource.at(e - this.dataOffset) : (this.trigger("endreached", {index: e}), null)) : void 0 : this.dataSource.view()[e]
            }, indexOf: function (e) {
                return this.dataSource.data().indexOf(e) + this.dataOffset
            }, total: function () {
                return parseInt(this.dataSource.total(), 10)
            }, next: function () {
                var e = this, t = e.pageSize, n = e.skip - e.viewSize + t, i = we.max(we.floor(n / t), 0) * t;
                this.offset = n, this.dataSource.prefetch(i, t, function () {
                    e._goToRange(n, !0)
                })
            }, range: function (e, t) {
                if (this.offset === e)return !0;
                var n = this, i = this.pageSize, r = we.max(we.floor(e / i), 0) * i, a = this.dataSource;
                return t && (r += i), a.inRange(e, i) ? (this.offset = e, this._recalculate(), this._goToRange(e), !0) : !this.prefetch || (a.prefetch(r, i, function () {
                    n.offset = e, n._recalculate(), n._goToRange(e, !0)
                }), !1)
            }, syncDataSource: function () {
                var e = this.offset;
                this.offset = null, this.range(e)
            }, destroy: function () {
                this.unbind()
            }, _prefetch: function () {
                var e = this, t = this.pageSize, n = this.skip + t, i = this.dataSource;
                i.inRange(n, t) || this._prefetching || !this.prefetch || (this._prefetching = !0, this.trigger("prefetching", {
                    skip: n,
                    take: t
                }), i.prefetch(n, t, function () {
                    e._prefetching = !1, e.trigger("prefetched", {skip: n, take: t})
                }))
            }, _goToRange: function (e, t) {
                this.offset === e && (this.dataOffset = e, this._expanding = t, this.dataSource.range(e, this.pageSize), this.dataSource.enableRequestsInProgress())
            }, _reset: function () {
                this._syncPending = !0
            }, _change: function () {
                var e = this.dataSource;
                this.length = this.useRanges ? e.lastRange().end : e.view().length, this._syncPending && (this._syncWithDataSource(), this._recalculate(), this._syncPending = !1, this.trigger("reset", {offset: this.offset})), this.trigger("resize"), this._expanding && this.trigger("expand"), delete this._expanding
            }, _syncWithDataSource: function () {
                var e = this.dataSource;
                this._firstItemUid = e.firstItemUid(), this.dataOffset = this.offset = e.skip() || 0, this.pageSize = e.pageSize(), this.useRanges = e.options.serverPaging
            }, _recalculate: function () {
                var e = this.pageSize, t = this.offset, n = this.viewSize, i = Math.ceil(t / e) * e;
                this.skip = i, this.midPageThreshold = i + e - 1, this.nextPageThreshold = i + n - 1, this.prefetchThreshold = i + Math.floor(e / 3 * 2), this.pullBackThreshold = this.offset - 1, this.nextMidRange = i + e - n, this.nextFullRange = i, this.previousMidRange = t - n, this.previousFullRange = i - e
            }
        }), Xe = X.Observable.extend({
            init: function (e, t) {
                var n = this;
                X.Observable.fn.init.call(n), this.dataSource = e, this.batchSize = t, this._total = 0, this.buffer = new Qe(e, 3 * t), this.buffer.bind({
                    endreached: function (e) {
                        n.trigger("endreached", {index: e.index})
                    }, prefetching: function (e) {
                        n.trigger("prefetching", {skip: e.skip, take: e.take})
                    }, prefetched: function (e) {
                        n.trigger("prefetched", {skip: e.skip, take: e.take})
                    }, reset: function () {
                        n._total = 0, n.trigger("reset")
                    }, resize: function () {
                        n._total = Math.ceil(this.length / n.batchSize), n.trigger("resize", {
                            total: n.total(),
                            offset: this.offset
                        })
                    }
                })
            }, syncDataSource: function () {
                this.buffer.syncDataSource()
            }, at: function (e) {
                var t, n = this.buffer, i = e * this.batchSize, r = this.batchSize, a = [];
                n.offset > i && n.at(n.offset - 1);
                for (var o = 0; o < r && (t = n.at(i + o), null !== t); o++)a.push(t);
                return a
            }, total: function () {
                return this._total
            }, destroy: function () {
                this.buffer.destroy(), this.unbind()
            }
        });
        U(!0, X.data, {
            readers: {json: Ge},
            Query: a,
            DataSource: Ye,
            HierarchicalDataSource: Je,
            Node: Ke,
            ObservableObject: He,
            ObservableArray: Ae,
            LazyObservableArray: Me,
            LocalTransport: Ue,
            RemoteTransport: qe,
            Cache: je,
            DataReader: Ge,
            Model: Ve,
            Buffer: Qe,
            BatchBuffer: Xe
        })
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.calendar", ["kendo.core"], e)
}(function () {
    return function (e, t) {
        function n(e, t, n, i) {
            var r, a = e.getFullYear(), o = t.getFullYear(), s = n.getFullYear();
            return a -= a % i, r = a + (i - 1), a < o && (a = o), r > s && (r = s), a + "-" + r
        }

        function i(e) {
            for (var t, n = 0, i = e.min, r = e.max, a = e.start, o = e.setter, l = e.build, u = e.cells || 12, c = e.perRow || 4, d = e.content || H, p = e.empty || z, f = e.html || '<table tabindex="0" role="grid" class="k-content k-meta-view" cellspacing="0"><tbody><tr role="row">'; n < u; n++)n > 0 && n % c === 0 && (f += '</tr><tr role="row">'), a = new ve(a.getFullYear(), a.getMonth(), a.getDate(), 0, 0, 0), I(a, 0), t = l(a, n, e.disableDates), f += s(a, i, r) ? d(t) : p(t), o(a, 1);
            return f + "</tr></tbody></table>"
        }

        function r(e, t, n) {
            var i = e.getFullYear(), r = t.getFullYear(), a = r, o = 0;
            return n && (r -= r % n, a = r - r % n + n - 1), i > a ? o = 1 : i < r && (o = -1), o
        }

        function a() {
            var e = new ve;
            return new ve(e.getFullYear(), e.getMonth(), e.getDate())
        }

        function o(e, t, n) {
            var i = a();
            return e && (i = new ve((+e))), t > i ? i = new ve((+t)) : n < i && (i = new ve((+n))), i
        }

        function s(e, t, n) {
            return +e >= +t && +e <= +n
        }

        function l(e, t) {
            return e.slice(t).concat(e.slice(0, t))
        }

        function u(e, t, n) {
            t = t instanceof ve ? t.getFullYear() : e.getFullYear() + n * t, e.setFullYear(t)
        }

        function c(t) {
            var n = e(this).hasClass("k-state-disabled");
            n || e(this).toggleClass(J, oe.indexOf(t.type) > -1 || t.type == re)
        }

        function d(e) {
            e.preventDefault()
        }

        function p(e) {
            return O(e).calendars.standard
        }

        function f(e) {
            var n = _e[e.start], i = _e[e.depth], r = O(e.culture);
            e.format = F(e.format || r.calendars.standard.patterns.d), isNaN(n) && (n = 0, e.start = j), (i === t || i > n) && (e.depth = j), null === e.dates && (e.dates = [])
        }

        function h(e) {
            V && e.find("*").attr("unselectable", "on")
        }

        function m(e, t) {
            for (var n = 0, i = t.length; n < i; n++)if (e === +t[n])return !0;
            return !1
        }

        function g(e, t) {
            return !!e && (e.getFullYear() === t.getFullYear() && e.getMonth() === t.getMonth() && e.getDate() === t.getDate())
        }

        function v(e, t) {
            return !!e && (e.getFullYear() === t.getFullYear() && e.getMonth() === t.getMonth())
        }

        function _(t) {
            return k.isFunction(t) ? t : e.isArray(t) ? b(t) : e.noop
        }

        function w(e) {
            for (var t = [], n = 0; n < e.length; n++)t.push(e[n].setHours(0, 0, 0, 0));
            return t
        }

        function b(t) {
            var n, i, r = [], a = ["su", "mo", "tu", "we", "th", "fr", "sa"], o = "if (found) { return true } else {return false}";
            if (t[0] instanceof ve)r = w(t), n = "var found = date && $.inArray(date.setHours(0, 0, 0, 0),[" + r + "]) > -1;" + o; else {
                for (var s = 0; s < t.length; s++) {
                    var l = t[s].slice(0, 2).toLowerCase(), u = e.inArray(l, a);
                    u > -1 && r.push(u)
                }
                n = "var found = date && $.inArray(date.getDay(),[" + r + "]) > -1;" + o
            }
            return i = new Function("date", n)
        }

        function y(e, t) {
            return e instanceof Date && t instanceof Date && (e = e.getTime(), t = t.getTime()), e === t
        }

        var k = window.kendo, x = k.support, C = k.ui, T = C.Widget, S = k.keys, D = k.parseDate, I = k.date.adjustDST, F = k._extractFormat, E = k.template, O = k.getCulture, A = k.support.transitions, M = A ? A.css + "transform-origin" : "", H = E('<td#=data.cssClass# role="gridcell"><a tabindex="-1" class="k-link" href="\\#" data-#=data.ns#value="#=data.dateString#">#=data.value#</a></td>', {useWithBlock: !1}), z = E('<td role="gridcell">&nbsp;</td>', {useWithBlock: !1}), P = k.support.browser, V = P.msie && P.version < 9, L = ".kendoCalendar", R = "click" + L, B = "keydown" + L, N = "id", W = "min", U = "left", q = "slideIn", j = "month", G = "century", Y = "change", $ = "navigate", K = "value", J = "k-state-hover", Q = "k-state-disabled", X = "k-state-focused", Z = "k-other-month", ee = ' class="' + Z + '"', te = "k-nav-today", ne = "td:has(.k-link)", ie = "blur" + L, re = "focus", ae = re + L, oe = x.touch ? "touchstart" : "mouseenter", se = x.touch ? "touchstart" + L : "mouseenter" + L, le = x.touch ? "touchend" + L + " touchmove" + L : "mouseleave" + L, ue = 6e4, ce = 864e5, de = "_prevArrow", pe = "_nextArrow", fe = "aria-disabled", he = "aria-selected", me = e.proxy, ge = e.extend, ve = Date, _e = {
            month: 0,
            year: 1,
            decade: 2,
            century: 3
        }, we = T.extend({
            init: function (t, n) {
                var i, r, s = this;
                T.fn.init.call(s, t, n), t = s.wrapper = s.element, n = s.options, n.url = window.unescape(n.url), s.options.disableDates = _(s.options.disableDates), s._templates(), s._header(), s._footer(s.footer), r = t.addClass("k-widget k-calendar").on(se + " " + le, ne, c).on(B, "table.k-content", me(s._move, s)).on(R, ne, function (t) {
                    var n = t.currentTarget.firstChild, i = s._toDateObject(n);
                    n.href.indexOf("#") != -1 && t.preventDefault(), s.options.disableDates(i) && "month" == s._view.name || s._click(e(n))
                }).on("mouseup" + L, "table.k-content, .k-footer", function () {
                    s._focusView(s.options.focusOnNav !== !1)
                }).attr(N), r && (s._cellID = r + "_cell_selected"), f(n), i = D(n.value, n.format, n.culture), s._index = _e[n.start], s._current = new ve((+o(i, n.min, n.max))), s._addClassProxy = function () {
                    if (s._active = !0, s._cell.hasClass(Q)) {
                        var e = s._view.toDateString(a());
                        s._cell = s._cellByDate(e)
                    }
                    s._cell.addClass(X)
                }, s._removeClassProxy = function () {
                    s._active = !1, s._cell.removeClass(X)
                }, s.value(i), k.notify(s)
            },
            options: {
                name: "Calendar",
                value: null,
                min: new ve(1900, 0, 1),
                max: new ve(2099, 11, 31),
                dates: [],
                url: "",
                culture: "",
                footer: "",
                format: "",
                month: {},
                start: j,
                depth: j,
                animation: {
                    horizontal: {effects: q, reverse: !0, duration: 500, divisor: 2},
                    vertical: {effects: "zoomIn", duration: 400}
                }
            },
            events: [Y, $],
            setOptions: function (e) {
                var t = this;
                f(e), e.disableDates = _(e.disableDates), T.fn.setOptions.call(t, e), t._templates(), t._footer(t.footer), t._index = _e[t.options.start], t.navigate()
            },
            destroy: function () {
                var e = this, t = e._today;
                e.element.off(L), e._title.off(L), e[de].off(L), e[pe].off(L), k.destroy(e._table), t && k.destroy(t.off(L)), T.fn.destroy.call(e)
            },
            current: function () {
                return this._current
            },
            view: function () {
                return this._view
            },
            focus: function (e) {
                e = e || this._table, this._bindTable(e), e.focus()
            },
            min: function (e) {
                return this._option(W, e)
            },
            max: function (e) {
                return this._option("max", e)
            },
            navigateToPast: function () {
                this._navigate(de, -1)
            },
            navigateToFuture: function () {
                this._navigate(pe, 1)
            },
            navigateUp: function () {
                var e = this, t = e._index;
                e._title.hasClass(Q) || e.navigate(e._current, ++t)
            },
            navigateDown: function (e) {
                var t = this, n = t._index, i = t.options.depth;
                if (e)return n === _e[i] ? void(y(t._value, t._current) && y(t._value, e) || (t.value(e), t.trigger(Y))) : void t.navigate(e, --n)
            },
            navigate: function (n, i) {
                i = isNaN(i) ? _e[i] : i;
                var r, a, s, l, u = this, c = u.options, d = c.culture, p = c.min, f = c.max, m = u._title, g = u._table, v = u._oldTable, _ = u._value, w = u._current, b = n && +n > +w, y = i !== t && i !== u._index;
                if (n || (n = w), u._current = n = new ve((+o(n, p, f))), i === t ? i = u._index : u._index = i, u._view = a = be.views[i], s = a.compare, l = i === _e[G], m.toggleClass(Q, l).attr(fe, l), l = s(n, p) < 1, u[de].toggleClass(Q, l).attr(fe, l), l = s(n, f) > -1, u[pe].toggleClass(Q, l).attr(fe, l), g && v && v.data("animating") && (v.kendoStop(!0, !0), g.kendoStop(!0, !0)), u._oldTable = g, !g || u._changeView) {
                    m.html(a.title(n, p, f, d)), u._table = r = e(a.content(ge({
                        min: p,
                        max: f,
                        date: n,
                        url: c.url,
                        dates: c.dates,
                        format: c.format,
                        culture: d,
                        disableDates: c.disableDates
                    }, u[a.name]))), h(r);
                    var k = g && g.data("start") === r.data("start");
                    u._animate({from: g, to: r, vertical: y, future: b, replace: k}), u.trigger($), u._focus(n)
                }
                i === _e[c.depth] && _ && !u.options.disableDates(_) && u._class("k-state-selected", _), u._class(X, n), !g && u._cell && u._cell.removeClass(X), u._changeView = !0
            },
            value: function (e) {
                var n = this, i = n._view, r = n.options, a = n._view, o = r.min, l = r.max;
                return e === t ? n._value : (null === e && (n._current = new Date(n._current.getFullYear(), n._current.getMonth(), n._current.getDate())), e = D(e, r.format, r.culture), null !== e && (e = new ve((+e)), s(e, o, l) || (e = null)), null !== e && n.options.disableDates(e) ? n._value === t && (n._value = null) : n._value = e, void(a && null === e && n._cell ? n._cell.removeClass("k-state-selected") : (n._changeView = !e || i && 0 !== i.compare(e, n._current), n.navigate(e))))
            },
            _move: function (t) {
                var n, i, r, a, l = this, u = l.options, c = t.keyCode, d = l._view, p = l._index, f = l.options.min, h = l.options.max, m = new ve((+l._current)), g = k.support.isRtl(l.wrapper), v = l.options.disableDates;
                return t.target === l._table[0] && (l._active = !0), t.ctrlKey ? c == S.RIGHT && !g || c == S.LEFT && g ? (l.navigateToFuture(), i = !0) : c == S.LEFT && !g || c == S.RIGHT && g ? (l.navigateToPast(), i = !0) : c == S.UP ? (l.navigateUp(), i = !0) : c == S.DOWN && (l._click(e(l._cell[0].firstChild)), i = !0) : (c == S.RIGHT && !g || c == S.LEFT && g ? (n = 1, i = !0) : c == S.LEFT && !g || c == S.RIGHT && g ? (n = -1, i = !0) : c == S.UP ? (n = 0 === p ? -7 : -4, i = !0) : c == S.DOWN ? (n = 0 === p ? 7 : 4, i = !0) : c == S.ENTER ? (l._click(e(l._cell[0].firstChild)), i = !0) : c == S.HOME || c == S.END ? (r = c == S.HOME ? "first" : "last", a = d[r](m), m = new ve(a.getFullYear(), a.getMonth(), a.getDate(), m.getHours(), m.getMinutes(), m.getSeconds(), m.getMilliseconds()), i = !0) : c == S.PAGEUP ? (i = !0, l.navigateToPast()) : c == S.PAGEDOWN && (i = !0, l.navigateToFuture()), (n || r) && (r || d.setDate(m, n), v(m) && (m = l._nextNavigatable(m, n)), s(m, f, h) && l._focus(o(m, u.min, u.max)))), i && t.preventDefault(), l._current
            },
            _nextNavigatable: function (e, t) {
                var n = this, i = !0, r = n._view, a = n.options.min, o = n.options.max, l = n.options.disableDates, u = new Date(e.getTime());
                for (r.setDate(u, -t); i;) {
                    if (r.setDate(e, t), !s(e, a, o)) {
                        e = u;
                        break
                    }
                    i = l(e)
                }
                return e
            },
            _animate: function (e) {
                var t = this, n = e.from, i = e.to, r = t._active;
                n ? n.parent().data("animating") ? (n.off(L), n.parent().kendoStop(!0, !0).remove(), n.remove(), i.insertAfter(t.element[0].firstChild), t._focusView(r)) : !n.is(":visible") || t.options.animation === !1 || e.replace ? (i.insertAfter(n), n.off(L).remove(), t._focusView(r)) : t[e.vertical ? "_vertical" : "_horizontal"](n, i, e.future) : (i.insertAfter(t.element[0].firstChild), t._bindTable(i))
            },
            _horizontal: function (e, t, n) {
                var i = this, r = i._active, a = i.options.animation.horizontal, o = a.effects, s = e.outerWidth();
                o && o.indexOf(q) != -1 && (e.add(t).css({width: s}), e.wrap("<div/>"), i._focusView(r, e), e.parent().css({
                    position: "relative",
                    width: 2 * s,
                    "float": U,
                    "margin-left": n ? 0 : -s
                }), t[n ? "insertAfter" : "insertBefore"](e), ge(a, {
                    effects: q + ":" + (n ? "right" : U),
                    complete: function () {
                        e.off(L).remove(), i._oldTable = null, t.unwrap(), i._focusView(r)
                    }
                }), e.parent().kendoStop(!0, !0).kendoAnimate(a))
            },
            _vertical: function (e, t) {
                var n, i, r = this, a = r.options.animation.vertical, o = a.effects, s = r._active;
                o && o.indexOf("zoom") != -1 && (t.css({
                    position: "absolute",
                    top: e.prev().outerHeight(),
                    left: 0
                }).insertBefore(e), M && (n = r._cellByDate(r._view.toDateString(r._current)), i = n.position(), i = i.left + parseInt(n.width() / 2, 10) + "px " + (i.top + parseInt(n.height() / 2, 10) + "px"), t.css(M, i)), e.kendoStop(!0, !0).kendoAnimate({
                    effects: "fadeOut",
                    duration: 600,
                    complete: function () {
                        e.off(L).remove(), r._oldTable = null, t.css({
                            position: "static",
                            top: 0,
                            left: 0
                        }), r._focusView(s)
                    }
                }), t.kendoStop(!0, !0).kendoAnimate(a))
            },
            _cellByDate: function (t) {
                return this._table.find("td:not(." + Z + ")").filter(function () {
                    return e(this.firstChild).attr(k.attr(K)) === t
                })
            },
            _class: function (t, n) {
                var i, r = this, a = r._cellID, o = r._cell, s = r._view.toDateString(n);
                o && o.removeAttr(he).removeAttr("aria-label").removeAttr(N), n && (i = r.options.disableDates(n)), o = r._table.find("td:not(." + Z + ")").removeClass(t).filter(function () {
                    return e(this.firstChild).attr(k.attr(K)) === s
                }).attr(he, !0), (t === X && !r._active && r.options.focusOnNav !== !1 || i) && (t = ""), o.addClass(t), o[0] && (r._cell = o), a && (o.attr(N, a), r._table.removeAttr("aria-activedescendant").attr("aria-activedescendant", a))
            },
            _bindTable: function (e) {
                e.on(ae, this._addClassProxy).on(ie, this._removeClassProxy)
            },
            _click: function (e) {
                var t = this, n = t.options, i = new Date((+t._current)), r = t._toDateObject(e);
                I(r, 0), t.options.disableDates(r) && "month" == t._view.name && (r = t._value), t._view.setDate(i, r), t.navigateDown(o(i, n.min, n.max))
            },
            _focus: function (e) {
                var t = this, n = t._view;
                0 !== n.compare(e, t._current) ? t.navigate(e) : (t._current = e, t._class(X, e))
            },
            _focusView: function (e, t) {
                e && this.focus(t)
            },
            _footer: function (t) {
                var n = this, i = a(), r = n.element, o = r.find(".k-footer");
                return t ? (o[0] || (o = e('<div class="k-footer"><a href="#" class="k-link k-nav-today"></a></div>').appendTo(r)), n._today = o.show().find(".k-link").html(t(i)).attr("title", k.toString(i, "D", n.options.culture)), void n._toggle()) : (n._toggle(!1), void o.hide())
            },
            _header: function () {
                var e, t = this, n = t.element;
                n.find(".k-header")[0] || n.html('<div class="k-header"><a href="#" role="button" class="k-link k-nav-prev"><span class="k-icon k-i-arrow-w"></span></a><a href="#" role="button" aria-live="assertive" aria-atomic="true" class="k-link k-nav-fast"></a><a href="#" role="button" class="k-link k-nav-next"><span class="k-icon k-i-arrow-e"></span></a></div>'), e = n.find(".k-link").on(se + " " + le + " " + ae + " " + ie, c).click(!1), t._title = e.eq(1).on(R, function () {
                    t._active = t.options.focusOnNav !== !1, t.navigateUp()
                }), t[de] = e.eq(0).on(R, function () {
                    t._active = t.options.focusOnNav !== !1, t.navigateToPast()
                }), t[pe] = e.eq(2).on(R, function () {
                    t._active = t.options.focusOnNav !== !1, t.navigateToFuture()
                })
            },
            _navigate: function (e, t) {
                var n = this, i = n._index + 1, r = new ve((+n._current));
                e = n[e], e.hasClass(Q) || (i > 3 ? r.setFullYear(r.getFullYear() + 100 * t) : be.views[i].setDate(r, t), n.navigate(r))
            },
            _option: function (e, n) {
                var i, r = this, a = r.options, o = r._value || r._current;
                return n === t ? a[e] : (n = D(n, a.format, a.culture), void(n && (a[e] = new ve((+n)), i = e === W ? n > o : o > n, (i || v(o, n)) && (i && (r._value = null), r._changeView = !0), r._changeView || (r._changeView = !(!a.month.content && !a.month.empty)), r.navigate(r._value), r._toggle())))
            },
            _toggle: function (e) {
                var n = this, i = n.options, r = n.options.disableDates(a()), o = n._today;
                e === t && (e = s(a(), i.min, i.max)), o && (o.off(R), e && !r ? o.addClass(te).removeClass(Q).on(R, me(n._todayClick, n)) : o.removeClass(te).addClass(Q).on(R, d))
            },
            _todayClick: function (e) {
                var t = this, n = _e[t.options.depth], i = t.options.disableDates, r = a();
                e.preventDefault(), i(r) || (0 === t._view.compare(t._current, r) && t._index == n && (t._changeView = !1), t._value = r, t.navigate(r, n), t.trigger(Y))
            },
            _toDateObject: function (t) {
                var n = e(t).attr(k.attr(K)).split("/");
                return n = new ve(n[0], n[1], n[2])
            },
            _templates: function () {
                var e = this, t = e.options, n = t.footer, i = t.month, r = i.content, a = i.empty;
                e.month = {
                    content: E('<td#=data.cssClass# role="gridcell"><a tabindex="-1" class="k-link#=data.linkClass#" href="#=data.url#" ' + k.attr("value") + '="#=data.dateString#" title="#=data.title#">' + (r || "#=data.value#") + "</a></td>", {useWithBlock: !!r}),
                    empty: E('<td role="gridcell">' + (a || "&nbsp;") + "</td>", {useWithBlock: !!a})
                }, e.footer = n !== !1 ? E(n || '#= kendo.toString(data,"D","' + t.culture + '") #', {useWithBlock: !1}) : null
            }
        });
        C.plugin(we);
        var be = {
            firstDayOfMonth: function (e) {
                return new ve(e.getFullYear(), e.getMonth(), 1)
            }, firstVisibleDay: function (e, t) {
                t = t || k.culture().calendar;
                for (var n = t.firstDay, i = new ve(e.getFullYear(), e.getMonth(), 0, e.getHours(), e.getMinutes(), e.getSeconds(), e.getMilliseconds()); i.getDay() != n;)be.setTime(i, -1 * ce);
                return i
            }, setTime: function (e, t) {
                var n = e.getTimezoneOffset(), i = new ve(e.getTime() + t), r = i.getTimezoneOffset() - n;
                e.setTime(i.getTime() + r * ue)
            }, views: [{
                name: j, title: function (e, t, n, i) {
                    return p(i).months.names[e.getMonth()] + " " + e.getFullYear()
                }, content: function (e) {
                    for (var t = this, n = 0, r = e.min, a = e.max, o = e.date, s = e.dates, u = e.format, c = e.culture, d = e.url, f = d && s[0], h = p(c), g = h.firstDay, v = h.days, _ = l(v.names, g), w = l(v.namesShort, g), b = be.firstVisibleDay(o, h), y = t.first(o), x = t.last(o), C = t.toDateString, T = new ve, S = '<table tabindex="0" role="grid" class="k-content" cellspacing="0" data-start="' + C(b) + '"><thead><tr role="row">'; n < 7; n++)S += '<th scope="col" title="' + _[n] + '">' + w[n] + "</th>";
                    return T = new ve(T.getFullYear(), T.getMonth(), T.getDate()), I(T, 0), T = +T, i({
                        cells: 42,
                        perRow: 7,
                        html: S += '</tr></thead><tbody><tr role="row">',
                        start: b,
                        min: new ve(r.getFullYear(), r.getMonth(), r.getDate()),
                        max: new ve(a.getFullYear(), a.getMonth(), a.getDate()),
                        content: e.content,
                        empty: e.empty,
                        setter: t.setDate,
                        disableDates: e.disableDates,
                        build: function (e, t, n) {
                            var i = [], r = e.getDay(), a = "", o = "#";
                            return (e < y || e > x) && i.push(Z), n(e) && i.push(Q), +e === T && i.push("k-today"), 0 !== r && 6 !== r || i.push("k-weekend"), f && m(+e, s) && (o = d.replace("{0}", k.toString(e, u, c)), a = " k-action-link"), {
                                date: e,
                                dates: s,
                                ns: k.ns,
                                title: k.toString(e, "D", c),
                                value: e.getDate(),
                                dateString: C(e),
                                cssClass: i[0] ? ' class="' + i.join(" ") + '"' : "",
                                linkClass: a,
                                url: o
                            }
                        }
                    })
                }, first: function (e) {
                    return be.firstDayOfMonth(e)
                }, last: function (e) {
                    var t = new ve(e.getFullYear(), e.getMonth() + 1, 0), n = be.firstDayOfMonth(e), i = Math.abs(t.getTimezoneOffset() - n.getTimezoneOffset());
                    return i && t.setHours(n.getHours() + i / 60), t
                }, compare: function (e, t) {
                    var n, i = e.getMonth(), r = e.getFullYear(), a = t.getMonth(), o = t.getFullYear();
                    return n = r > o ? 1 : r < o ? -1 : i == a ? 0 : i > a ? 1 : -1
                }, setDate: function (e, t) {
                    var n = e.getHours();
                    t instanceof ve ? e.setFullYear(t.getFullYear(), t.getMonth(), t.getDate()) : be.setTime(e, t * ce), I(e, n)
                }, toDateString: function (e) {
                    return e.getFullYear() + "/" + e.getMonth() + "/" + e.getDate()
                }
            }, {
                name: "year", title: function (e) {
                    return e.getFullYear()
                }, content: function (e) {
                    var t = p(e.culture).months.namesAbbr, n = this.toDateString, r = e.min, a = e.max;
                    return i({
                        min: new ve(r.getFullYear(), r.getMonth(), 1),
                        max: new ve(a.getFullYear(), a.getMonth(), 1),
                        start: new ve(e.date.getFullYear(), 0, 1),
                        setter: this.setDate,
                        build: function (e) {
                            return {value: t[e.getMonth()], ns: k.ns, dateString: n(e), cssClass: ""}
                        }
                    })
                }, first: function (e) {
                    return new ve(e.getFullYear(), 0, e.getDate())
                }, last: function (e) {
                    return new ve(e.getFullYear(), 11, e.getDate())
                }, compare: function (e, t) {
                    return r(e, t)
                }, setDate: function (e, t) {
                    var n, i = e.getHours();
                    t instanceof ve ? (n = t.getMonth(), e.setFullYear(t.getFullYear(), n, e.getDate()), n !== e.getMonth() && e.setDate(0)) : (n = e.getMonth() + t, e.setMonth(n), n > 11 && (n -= 12), n > 0 && e.getMonth() != n && e.setDate(0)), I(e, i)
                }, toDateString: function (e) {
                    return e.getFullYear() + "/" + e.getMonth() + "/1"
                }
            }, {
                name: "decade", title: function (e, t, i) {
                    return n(e, t, i, 10)
                }, content: function (e) {
                    var t = e.date.getFullYear(), n = this.toDateString;
                    return i({
                        start: new ve(t - t % 10 - 1, 0, 1),
                        min: new ve(e.min.getFullYear(), 0, 1),
                        max: new ve(e.max.getFullYear(), 0, 1),
                        setter: this.setDate,
                        build: function (e, t) {
                            return {
                                value: e.getFullYear(),
                                ns: k.ns,
                                dateString: n(e),
                                cssClass: 0 === t || 11 == t ? ee : ""
                            }
                        }
                    })
                }, first: function (e) {
                    var t = e.getFullYear();
                    return new ve(t - t % 10, e.getMonth(), e.getDate())
                }, last: function (e) {
                    var t = e.getFullYear();
                    return new ve(t - t % 10 + 9, e.getMonth(), e.getDate())
                }, compare: function (e, t) {
                    return r(e, t, 10)
                }, setDate: function (e, t) {
                    u(e, t, 1)
                }, toDateString: function (e) {
                    return e.getFullYear() + "/0/1"
                }
            }, {
                name: G, title: function (e, t, i) {
                    return n(e, t, i, 100)
                }, content: function (e) {
                    var t = e.date.getFullYear(), n = e.min.getFullYear(), r = e.max.getFullYear(), a = this.toDateString, o = n, s = r;
                    return o -= o % 10, s -= s % 10, s - o < 10 && (s = o + 9), i({
                        start: new ve(t - t % 100 - 10, 0, 1),
                        min: new ve(o, 0, 1),
                        max: new ve(s, 0, 1),
                        setter: this.setDate,
                        build: function (e, t) {
                            var i = e.getFullYear(), o = i + 9;
                            return i < n && (i = n), o > r && (o = r), {
                                ns: k.ns,
                                value: i + " - " + o,
                                dateString: a(e),
                                cssClass: 0 === t || 11 == t ? ee : ""
                            }
                        }
                    })
                }, first: function (e) {
                    var t = e.getFullYear();
                    return new ve(t - t % 100, e.getMonth(), e.getDate())
                }, last: function (e) {
                    var t = e.getFullYear();
                    return new ve(t - t % 100 + 99, e.getMonth(), e.getDate())
                }, compare: function (e, t) {
                    return r(e, t, 100)
                }, setDate: function (e, t) {
                    u(e, t, 10)
                }, toDateString: function (e) {
                    var t = e.getFullYear();
                    return t - t % 10 + "/0/1"
                }
            }]
        };
        be.isEqualDatePart = g, be.isEqualDate = y, be.makeUnselectable = h, be.restrictValue = o, be.isInRange = s, be.normalize = f, be.viewsEnum = _e, be.disabled = _, k.calendar = be
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.popup", ["kendo.core"], e)
}(function () {
    return function (e, t) {
        function n(t, n) {
            return !(!t || !n) && (t === n || e.contains(t, n))
        }

        var i = window.kendo, r = i.ui, a = r.Widget, o = i.support, s = i.getOffset, l = "open", u = "close", c = "deactivate", d = "activate", p = "center", f = "left", h = "right", m = "top", g = "bottom", v = "absolute", _ = "hidden", w = "body", b = "location", y = "position", k = "visible", x = "effects", C = "k-state-active", T = "k-state-border", S = /k-state-border-(\w+)/, D = ".k-picker-wrap, .k-dropdown-wrap, .k-link", I = "down", F = e(document.documentElement), E = e(window), O = "scroll", A = o.transitions.css, M = A + "transform", H = e.extend, z = ".kendoPopup", P = ["font-size", "font-family", "font-stretch", "font-style", "font-weight", "line-height"], V = a.extend({
            init: function (t, n) {
                var r, s = this;
                n = n || {}, n.isRtl && (n.origin = n.origin || g + " " + h, n.position = n.position || m + " " + h), a.fn.init.call(s, t, n), t = s.element, n = s.options, s.collisions = n.collision ? n.collision.split(" ") : [], s.downEvent = i.applyEventMap(I, i.guid()), 1 === s.collisions.length && s.collisions.push(s.collisions[0]), r = e(s.options.anchor).closest(".k-popup,.k-group").filter(":not([class^=km-])"), n.appendTo = e(e(n.appendTo)[0] || r[0] || w), s.element.hide().addClass("k-popup k-group k-reset").toggleClass("k-rtl", !!n.isRtl).css({position: v}).appendTo(n.appendTo).on("mouseenter" + z, function () {
                    s._hovered = !0
                }).on("mouseleave" + z, function () {
                    s._hovered = !1
                }), s.wrapper = e(), n.animation === !1 && (n.animation = {
                    open: {effects: {}},
                    close: {hide: !0, effects: {}}
                }), H(n.animation.open, {
                    complete: function () {
                        s.wrapper.css({overflow: k}), s._activated = !0, s._trigger(d)
                    }
                }), H(n.animation.close, {
                    complete: function () {
                        s._animationClose()
                    }
                }), s._mousedownProxy = function (e) {
                    s._mousedown(e)
                }, o.mobileOS.android ? s._resizeProxy = function (e) {
                    setTimeout(function () {
                        s._resize(e)
                    }, 600)
                } : s._resizeProxy = function (e) {
                    s._resize(e)
                }, n.toggleTarget && e(n.toggleTarget).on(n.toggleEvent + z, e.proxy(s.toggle, s))
            },
            events: [l, d, u, c],
            options: {
                name: "Popup",
                toggleEvent: "click",
                origin: g + " " + f,
                position: m + " " + f,
                anchor: w,
                appendTo: null,
                collision: "flip fit",
                viewport: window,
                copyAnchorStyles: !0,
                autosize: !1,
                modal: !1,
                adjustSize: {width: 0, height: 0},
                animation: {
                    open: {effects: "slideIn:down", transition: !0, duration: 200},
                    close: {duration: 100, hide: !0}
                }
            },
            _animationClose: function () {
                var e = this, t = e.wrapper.data(b);
                e.wrapper.hide(), t && e.wrapper.css(t), e.options.anchor != w && e._hideDirClass(), e._closing = !1, e._trigger(c)
            },
            destroy: function () {
                var t, n = this, r = n.options, o = n.element.off(z);
                a.fn.destroy.call(n), r.toggleTarget && e(r.toggleTarget).off(z), r.modal || (F.unbind(n.downEvent, n._mousedownProxy), n._toggleResize(!1)), i.destroy(n.element.children()), o.removeData(), r.appendTo[0] === document.body && (t = o.parent(".k-animation-container"), t[0] ? t.remove() : o.remove())
            },
            open: function (t, n) {
                var r, a, s = this, u = {
                    isFixed: !isNaN(parseInt(n, 10)),
                    x: t,
                    y: n
                }, c = s.element, d = s.options, p = e(d.anchor), f = c[0] && c.hasClass("km-widget");
                if (!s.visible()) {
                    if (d.copyAnchorStyles && (f && "font-size" == P[0] && P.shift(), c.css(i.getComputedStyles(p[0], P))), c.data("animating") || s._trigger(l))return;
                    s._activated = !1, d.modal || (F.unbind(s.downEvent, s._mousedownProxy).bind(s.downEvent, s._mousedownProxy), s._toggleResize(!1), s._toggleResize(!0)), s.wrapper = a = i.wrap(c, d.autosize).css({
                        overflow: _,
                        display: "block",
                        position: v
                    }), o.mobileOS.android && a.css(M, "translatez(0)"), a.css(y), e(d.appendTo)[0] == document.body && a.css(m, "-10000px"), s.flipped = s._position(u), r = s._openAnimation(), d.anchor != w && s._showDirClass(r), c.data(x, r.effects).kendoStop(!0).kendoAnimate(r)
                }
            },
            _openAnimation: function () {
                var e = H(!0, {}, this.options.animation.open);
                return e.effects = i.parseEffects(e.effects, this.flipped), e
            },
            _hideDirClass: function () {
                var t = e(this.options.anchor), n = ((t.attr("class") || "").match(S) || ["", "down"])[1], r = T + "-" + n;
                t.removeClass(r).children(D).removeClass(C).removeClass(r), this.element.removeClass(T + "-" + i.directions[n].reverse)
            },
            _showDirClass: function (t) {
                var n = t.effects.slideIn ? t.effects.slideIn.direction : "down", r = T + "-" + n;
                e(this.options.anchor).addClass(r).children(D).addClass(C).addClass(r), this.element.addClass(T + "-" + i.directions[n].reverse)
            },
            position: function () {
                this.visible() && (this.flipped = this._position())
            },
            toggle: function () {
                var e = this;
                e[e.visible() ? u : l]()
            },
            visible: function () {
                return this.element.is(":" + k)
            },
            close: function (t) {
                var n, r, a, o, s = this, l = s.options;
                if (s.visible()) {
                    if (n = s.wrapper[0] ? s.wrapper : i.wrap(s.element).hide(), s._toggleResize(!1), s._closing || s._trigger(u))return void s._toggleResize(!0);
                    s.element.find(".k-popup").each(function () {
                        var n = e(this), i = n.data("kendoPopup");
                        i && i.close(t)
                    }), F.unbind(s.downEvent, s._mousedownProxy), t ? r = {
                        hide: !0,
                        effects: {}
                    } : (r = H(!0, {}, l.animation.close), a = s.element.data(x), o = r.effects, !o && !i.size(o) && a && i.size(a) && (r.effects = a, r.reverse = !0), s._closing = !0), s.element.kendoStop(!0), n.css({overflow: _}), s.element.kendoAnimate(r), t && s._animationClose()
                }
            },
            _trigger: function (e) {
                return this.trigger(e, {type: e})
            },
            _resize: function (e) {
                var t = this;
                o.resize.indexOf(e.type) !== -1 ? (clearTimeout(t._resizeTimeout), t._resizeTimeout = setTimeout(function () {
                    t._position(), t._resizeTimeout = null
                }, 50)) : (!t._hovered || t._activated && t.element.hasClass("k-list-container")) && t.close()
            },
            _toggleResize: function (e) {
                var t = e ? "on" : "off", n = o.resize;
                o.mobileOS.ios || o.mobileOS.android || (n += " " + O), this._scrollableParents()[t](O, this._resizeProxy), E[t](n, this._resizeProxy)
            },
            _mousedown: function (t) {
                var r = this, a = r.element[0], o = r.options, s = e(o.anchor)[0], l = o.toggleTarget, u = i.eventTarget(t), c = e(u).closest(".k-popup"), d = c.parent().parent(".km-shim").length;
                c = c[0], !d && c && c !== r.element[0] || "popover" !== e(t.target).closest("a").data("rel") && (n(a, u) || n(s, u) || l && n(e(l)[0], u) || r.close())
            },
            _fit: function (e, t, n) {
                var i = 0;
                return e + t > n && (i = n - (e + t)), e < 0 && (i = -e), i
            },
            _flip: function (e, t, n, i, r, a, o) {
                var s = 0;
                return o = o || t, a !== r && a !== p && r !== p && (e + o > i && (s += -(n + t)), e + s < 0 && (s += n + t)), s
            },
            _scrollableParents: function () {
                return e(this.options.anchor).parentsUntil("body").filter(function (e, t) {
                    return i.isScrollable(t)
                })
            },
            _position: function (t) {
                var n, r, a, l, u, c, d, p = this, f = p.element, h = p.wrapper, m = p.options, g = e(m.viewport), _ = o.zoomLevel(), w = !!(g[0] == window && window.innerWidth && _ <= 1.02), k = e(m.anchor), x = m.origin.toLowerCase().split(" "), C = m.position.toLowerCase().split(" "), T = p.collisions, S = 10002, D = 0, I = document.documentElement;
                if (u = m.viewport === window ? {
                        top: window.pageYOffset || document.documentElement.scrollTop || 0,
                        left: window.pageXOffset || document.documentElement.scrollLeft || 0
                    } : g.offset(), w ? (c = window.innerWidth, d = window.innerHeight) : (c = g.width(), d = g.height()), w && I.scrollHeight - I.clientHeight > 0 && (c -= i.support.scrollbar()), n = k.parents().filter(h.siblings()), n[0])if (a = Math.max(Number(n.css("zIndex")), 0))S = a + 10; else for (r = k.parentsUntil(n), l = r.length; D < l; D++)a = Number(e(r[D]).css("zIndex")), a && S < a && (S = a + 10);
                h.css("zIndex", S), t && t.isFixed ? h.css({left: t.x, top: t.y}) : h.css(p._align(x, C));
                var F = s(h, y, k[0] === h.offsetParent()[0]), E = s(h), O = k.offsetParent().parent(".k-animation-container,.k-popup,.k-group");
                O.length && (F = s(h, y, !0), E = s(h)), E.top -= u.top, E.left -= u.left, p.wrapper.data(b) || h.data(b, H({}, F));
                var A = H({}, E), M = H({}, F), z = m.adjustSize;
                "fit" === T[0] && (M.top += p._fit(A.top, h.outerHeight() + z.height, d / _)), "fit" === T[1] && (M.left += p._fit(A.left, h.outerWidth() + z.width, c / _));
                var P = H({}, M), V = f.outerHeight(), L = h.outerHeight();
                return !h.height() && V && (L += V), "flip" === T[0] && (M.top += p._flip(A.top, V, k.outerHeight(), d / _, x[0], C[0], L)), "flip" === T[1] && (M.left += p._flip(A.left, f.outerWidth(), k.outerWidth(), c / _, x[1], C[1], h.outerWidth())), f.css(y, v), h.css(M), M.left != P.left || M.top != P.top
            },
            _align: function (t, n) {
                var i, r = this, a = r.wrapper, o = e(r.options.anchor), l = t[0], u = t[1], c = n[0], d = n[1], f = s(o), m = e(r.options.appendTo), v = a.outerWidth(), _ = a.outerHeight(), w = o.outerWidth(), b = o.outerHeight(), y = f.top, k = f.left, x = Math.round;
                return m[0] != document.body && (i = s(m), y -= i.top, k -= i.left), l === g && (y += b), l === p && (y += x(b / 2)), c === g && (y -= _), c === p && (y -= x(_ / 2)), u === h && (k += w), u === p && (k += x(w / 2)), d === h && (k -= v), d === p && (k -= x(v / 2)), {
                    top: y,
                    left: k
                }
            }
        });
        r.plugin(V)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.datepicker", ["kendo.calendar", "kendo.popup"], e)
}(function () {
    return function (e, t) {
        function n(t) {
            var n = t.parseFormats, i = t.format;
            H.normalize(t), n = e.isArray(n) ? n : [n], n.length || n.push("yyyy-MM-dd"), e.inArray(i, n) === -1 && n.splice(0, 0, t.format), t.parseFormats = n
        }

        function i(e) {
            e.preventDefault()
        }

        var r = window.kendo, a = r.ui, o = a.Widget, s = r.parseDate, l = r.keys, u = r.template, c = r._activeElement, d = "<div />", p = "<span />", f = ".kendoDatePicker", h = "click" + f, m = "open", g = "close", v = "change", _ = "disabled", w = "readonly", b = "k-state-default", y = "k-state-focused", k = "k-state-selected", x = "k-state-disabled", C = "k-state-hover", T = "mouseenter" + f + " mouseleave" + f, S = "mousedown" + f, D = "id", I = "min", F = "max", E = "month", O = "aria-disabled", A = "aria-expanded", M = "aria-hidden", H = r.calendar, z = H.isInRange, P = H.restrictValue, V = H.isEqualDatePart, L = e.extend, R = e.proxy, B = Date, N = function (t) {
            var n, i = this, o = document.body, s = e(d).attr(M, "true").addClass("k-calendar-container").appendTo(o);
            i.options = t = t || {}, n = t.id, n && (n += "_dateview", s.attr(D, n), i._dateViewID = n), i.popup = new a.Popup(s, L(t.popup, t, {
                name: "Popup",
                isRtl: r.support.isRtl(t.anchor)
            })), i.div = s, i.value(t.value)
        };
        N.prototype = {
            _calendar: function () {
                var t, n = this, o = n.calendar, s = n.options;
                o || (t = e(d).attr(D, r.guid()).appendTo(n.popup.element).on(S, i).on(h, "td:has(.k-link)", R(n._click, n)), n.calendar = o = new a.Calendar(t), n._setOptions(s), r.calendar.makeUnselectable(o.element), o.navigate(n._value || n._current, s.start), n.value(n._value))
            }, _setOptions: function (e) {
                this.calendar.setOptions({
                    focusOnNav: !1,
                    change: e.change,
                    culture: e.culture,
                    dates: e.dates,
                    depth: e.depth,
                    footer: e.footer,
                    format: e.format,
                    max: e.max,
                    min: e.min,
                    month: e.month,
                    start: e.start,
                    disableDates: e.disableDates
                })
            }, setOptions: function (e) {
                var t = this.options, n = e.disableDates;
                n && (e.disableDates = H.disabled(n)), this.options = L(t, e, {
                    change: t.change,
                    close: t.close,
                    open: t.open
                }), this.calendar && this._setOptions(this.options)
            }, destroy: function () {
                this.popup.destroy()
            }, open: function () {
                var e = this;
                e._calendar(), e.popup.open()
            }, close: function () {
                this.popup.close()
            }, min: function (e) {
                this._option(I, e)
            }, max: function (e) {
                this._option(F, e)
            }, toggle: function () {
                var e = this;
                e[e.popup.visible() ? g : m]()
            }, move: function (e) {
                var t = this, n = e.keyCode, i = t.calendar, r = e.ctrlKey && n == l.DOWN || n == l.ENTER, a = !1;
                if (e.altKey)n == l.DOWN ? (t.open(), e.preventDefault(), a = !0) : n == l.UP && (t.close(), e.preventDefault(), a = !0); else if (t.popup.visible()) {
                    if (n == l.ESC || r && i._cell.hasClass(k))return t.close(), e.preventDefault(), !0;
                    t._current = i._move(e), a = !0
                }
                return a
            }, current: function (e) {
                this._current = e, this.calendar._focus(e)
            }, value: function (e) {
                var t = this, n = t.calendar, i = t.options, r = i.disableDates;
                r && r(e) && (e = null), t._value = e, t._current = new B((+P(e, i.min, i.max))), n && n.value(e)
            }, _click: function (e) {
                e.currentTarget.className.indexOf(k) !== -1 && this.close()
            }, _option: function (e, t) {
                var n = this, i = n.calendar;
                n.options[e] = t, i && i[e](t)
            }
        }, N.normalize = n, r.DateView = N;
        var W = o.extend({
            init: function (t, i) {
                var a, l, u = this;
                o.fn.init.call(u, t, i), t = u.element, i = u.options, i.disableDates = r.calendar.disabled(i.disableDates), i.min = s(t.attr("min")) || s(i.min), i.max = s(t.attr("max")) || s(i.max), n(i), u._initialOptions = L({}, i), u._wrapper(), u.dateView = new N(L({}, i, {
                    id: t.attr(D),
                    anchor: u.wrapper,
                    change: function () {
                        u._change(this.value()), u.close()
                    },
                    close: function (e) {
                        u.trigger(g) ? e.preventDefault() : (t.attr(A, !1), l.attr(M, !0))
                    },
                    open: function (e) {
                        var n, i = u.options;
                        u.trigger(m) ? e.preventDefault() : (u.element.val() !== u._oldText && (n = s(t.val(), i.parseFormats, i.culture), u.dateView[n ? "current" : "value"](n)), t.attr(A, !0), l.attr(M, !1), u._updateARIA(n))
                    }
                })), l = u.dateView.div, u._icon();
                try {
                    t[0].setAttribute("type", "text")
                } catch (c) {
                    t[0].type = "text"
                }
                t.addClass("k-input").attr({
                    role: "combobox",
                    "aria-expanded": !1,
                    "aria-owns": u.dateView._dateViewID
                }), u._reset(), u._template(), a = t.is("[disabled]") || e(u.element).parents("fieldset").is(":disabled"), a ? u.enable(!1) : u.readonly(t.is("[readonly]")), u._old = u._update(i.value || u.element.val()), u._oldText = t.val(), r.notify(u)
            },
            events: [m, g, v],
            options: {
                name: "DatePicker",
                value: null,
                footer: "",
                format: "",
                culture: "",
                parseFormats: [],
                min: new Date(1900, 0, 1),
                max: new Date(2099, 11, 31),
                start: E,
                depth: E,
                animation: {},
                month: {},
                dates: [],
                ARIATemplate: 'Current focused date is #=kendo.toString(data.current, "D")#'
            },
            setOptions: function (e) {
                var t = this, i = t._value;
                o.fn.setOptions.call(t, e), e = t.options, e.min = s(e.min), e.max = s(e.max), n(e), t.dateView.setOptions(e), i && (t.element.val(r.toString(i, e.format, e.culture)), t._updateARIA(i))
            },
            _editable: function (e) {
                var t = this, n = t._dateIcon.off(f), r = t.element.off(f), a = t._inputWrapper.off(f), o = e.readonly, s = e.disable;
                o || s ? (a.addClass(s ? x : b).removeClass(s ? b : x), r.attr(_, s).attr(w, o).attr(O, s)) : (a.addClass(b).removeClass(x).on(T, t._toggleHover), r.removeAttr(_).removeAttr(w).attr(O, !1).on("keydown" + f, R(t._keydown, t)).on("focusout" + f, R(t._blur, t)).on("focus" + f, function () {
                    t._inputWrapper.addClass(y)
                }), n.on(h, R(t._click, t)).on(S, i))
            },
            readonly: function (e) {
                this._editable({readonly: e === t || e, disable: !1})
            },
            enable: function (e) {
                this._editable({readonly: !1, disable: !(e = e === t || e)})
            },
            destroy: function () {
                var e = this;
                o.fn.destroy.call(e), e.dateView.destroy(), e.element.off(f), e._dateIcon.off(f), e._inputWrapper.off(f), e._form && e._form.off("reset", e._resetHandler)
            },
            open: function () {
                this.dateView.open()
            },
            close: function () {
                this.dateView.close()
            },
            min: function (e) {
                return this._option(I, e)
            },
            max: function (e) {
                return this._option(F, e)
            },
            value: function (e) {
                var n = this;
                return e === t ? n._value : (n._old = n._update(e), null === n._old && n.element.val(""), void(n._oldText = n.element.val()))
            },
            _toggleHover: function (t) {
                e(t.currentTarget).toggleClass(C, "mouseenter" === t.type)
            },
            _blur: function () {
                var e = this, t = e.element.val();
                e.close(), t !== e._oldText && e._change(t), e._inputWrapper.removeClass(y)
            },
            _click: function () {
                var e = this, t = e.element;
                e.dateView.toggle(), r.support.touch || t[0] === c() || t.focus()
            },
            _change: function (e) {
                var t, n = this, i = n.element.val();
                e = n._update(e), t = !r.calendar.isEqualDate(n._old, e);
                var a = t && !n._typing, o = i !== n.element.val();
                (a || o) && n.element.trigger(v), t && (n._old = e, n._oldText = n.element.val(), n.trigger(v)), n._typing = !1
            },
            _keydown: function (e) {
                var t = this, n = t.dateView, i = t.element.val(), r = !1;
                n.popup.visible() || e.keyCode != l.ENTER || i === t._oldText ? (r = n.move(e), t._updateARIA(n._current), r || (t._typing = !0)) : t._change(i)
            },
            _icon: function () {
                var t, n = this, i = n.element;
                t = i.next("span.k-select"), t[0] || (t = e('<span unselectable="on" class="k-select" aria-label="select"><span class="k-icon k-i-calendar"></span></span>').insertAfter(i)), n._dateIcon = t.attr({
                    role: "button",
                    "aria-controls": n.dateView._dateViewID
                })
            },
            _option: function (e, n) {
                var i = this, r = i.options;
                return n === t ? r[e] : (n = s(n, r.parseFormats, r.culture), void(n && (r[e] = new B((+n)), i.dateView[e](n))))
            },
            _update: function (e) {
                var t, n = this, i = n.options, a = i.min, o = i.max, l = n._value, u = s(e, i.parseFormats, i.culture), c = null === u && null === l || u instanceof Date && l instanceof Date;
                return i.disableDates(u) && (u = null, n._old || n.element.val() || (e = null)), +u === +l && c ? (t = r.toString(u, i.format, i.culture), t !== e && n.element.val(null === u ? e : t), u) : (null !== u && V(u, a) ? u = P(u, a, o) : z(u, a, o) || (u = null), n._value = u, n.dateView.value(u), n.element.val(r.toString(u || e, i.format, i.culture)), n._updateARIA(u), u)
            },
            _wrapper: function () {
                var t, n = this, i = n.element;
                t = i.parents(".k-datepicker"), t[0] || (t = i.wrap(p).parent().addClass("k-picker-wrap k-state-default"), t = t.wrap(p).parent()), t[0].style.cssText = i[0].style.cssText, i.css({
                    width: "100%",
                    height: i[0].style.height
                }), n.wrapper = t.addClass("k-widget k-datepicker k-header").addClass(i[0].className), n._inputWrapper = e(t[0].firstChild)
            },
            _reset: function () {
                var t = this, n = t.element, i = n.attr("form"), r = i ? e("#" + i) : n.closest("form");
                r[0] && (t._resetHandler = function () {
                    t.value(n[0].defaultValue), t.max(t._initialOptions.max), t.min(t._initialOptions.min)
                }, t._form = r.on("reset", t._resetHandler))
            },
            _template: function () {
                this._ariaTemplate = u(this.options.ARIATemplate)
            },
            _updateARIA: function (e) {
                var t, n = this, i = n.dateView.calendar;
                n.element.removeAttr("aria-activedescendant"), i && (t = i._cell, t.attr("aria-label", n._ariaTemplate({current: e || i.current()})), n.element.attr("aria-activedescendant", t.attr("id")))
            }
        });
        a.plugin(W)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.timepicker", ["kendo.popup"], e)
}(function () {
    return function (e, t) {
        function n(e, t, n) {
            var i, r = e.getTimezoneOffset();
            e.setTime(e.getTime() + t), n || (i = e.getTimezoneOffset() - r, e.setTime(e.getTime() + i * O))
        }

        function i() {
            var e = new q, t = new q(e.getFullYear(), e.getMonth(), e.getDate(), 0, 0, 0), n = new q(e.getFullYear(), e.getMonth(), e.getDate(), 12, 0, 0);
            return -1 * (t.getTimezoneOffset() - n.getTimezoneOffset())
        }

        function r(e) {
            return 60 * e.getHours() * O + e.getMinutes() * O + 1e3 * e.getSeconds() + e.getMilliseconds()
        }

        function a(e, t, n) {
            var i, a = r(t), o = r(n);
            return !e || a == o || (i = r(e), a > i && (i += A), o < a && (o += A), i >= a && i <= o)
        }

        function o(e) {
            var t = e.parseFormats;
            e.format = p(e.format || l.getCulture(e.culture).calendars.standard.patterns.t), t = N(t) ? t : [t], t.splice(0, 0, e.format), e.parseFormats = t
        }

        function s(e) {
            e.preventDefault()
        }

        var l = window.kendo, u = l.keys, c = l.parseDate, d = l._activeElement, p = l._extractFormat, f = l.support, h = f.browser, m = l.ui, g = m.Widget, v = "open", _ = "close", w = "change", b = ".kendoTimePicker", y = "click" + b, k = "k-state-default", x = "disabled", C = "readonly", T = "li", S = "<span/>", D = "k-state-focused", I = "k-state-hover", F = "mouseenter" + b + " mouseleave" + b, E = "mousedown" + b, O = 6e4, A = 864e5, M = "k-state-selected", H = "k-state-disabled", z = "aria-selected", P = "aria-expanded", V = "aria-hidden", L = "aria-disabled", R = "aria-activedescendant", B = "id", N = e.isArray, W = e.extend, U = e.proxy, q = Date, j = new q;
        j = new q(j.getFullYear(), j.getMonth(), j.getDate(), 0, 0, 0);
        var G = function (t) {
            var n = this, i = t.id;
            n.options = t, n._dates = [], n.ul = e('<ul tabindex="-1" role="listbox" aria-hidden="true" unselectable="on" class="k-list k-reset"/>').css({overflow: f.kineticScrollNeeded ? "" : "auto"}).on(y, T, U(n._click, n)).on("mouseenter" + b, T, function () {
                e(this).addClass(I)
            }).on("mouseleave" + b, T, function () {
                e(this).removeClass(I)
            }), n.list = e("<div class='k-list-container k-list-scroller' unselectable='on'/>").append(n.ul).on(E, s), i && (n._timeViewID = i + "_timeview", n._optionID = i + "_option_selected", n.ul.attr(B, n._timeViewID)), n._popup(), n._heightHandler = U(n._height, n), n.template = l.template('<li tabindex="-1" role="option" class="k-item" unselectable="on">#=data#</li>', {useWithBlock: !1})
        };
        G.prototype = {
            current: function (n) {
                var i = this, r = i.options.active;
                return n === t ? i._current : (i._current && i._current.removeClass(M).removeAttr(z).removeAttr(B), n && (n = e(n).addClass(M).attr(B, i._optionID).attr(z, !0), i.scroll(n[0])), i._current = n, r && r(n), void 0)
            }, close: function () {
                this.popup.close()
            }, destroy: function () {
                var e = this;
                e.ul.off(b), e.list.off(b), e.popup.destroy()
            }, open: function () {
                var e = this;
                e.ul[0].firstChild || e.bind(), e.popup.open(), e._current && e.scroll(e._current[0])
            }, dataBind: function (e) {
                for (var t, n = this, i = n.options, r = i.format, o = l.toString, s = n.template, u = e.length, c = 0, d = ""; c < u; c++)t = e[c], a(t, i.min, i.max) && (d += s(o(t, r, i.culture)));
                n._html(d)
            }, refresh: function () {
                var e, t, a, o = this, s = o.options, u = s.format, c = i(), d = c < 0, p = s.min, f = s.max, h = r(p), m = r(f), g = s.interval * O, v = l.toString, _ = o.template, w = new q((+p)), b = w.getDate(), y = 0, k = "";
                for (a = d ? (A + c * O) / g : A / g, h != m && (h > m && (m += A), a = (m - h) / g + 1), t = parseInt(a, 10); y < a; y++)y && n(w, g, d), m && t == y && (e = r(w), b < w.getDate() && (e += A), e > m && (w = new q((+f)))), o._dates.push(r(w)), k += _(v(w, u, s.culture));
                o._html(k)
            }, bind: function () {
                var e = this, t = e.options.dates;
                t && t[0] ? e.dataBind(t) : e.refresh()
            }, _html: function (e) {
                var t = this;
                t.ul[0].innerHTML = e, t.popup.unbind(v, t._heightHandler), t.popup.one(v, t._heightHandler), t.current(null), t.select(t._value)
            }, scroll: function (e) {
                if (e) {
                    var t = this.list[0], n = e.offsetTop, i = e.offsetHeight, r = t.scrollTop, a = t.clientHeight, o = n + i;
                    r > n ? r = n : o > r + a && (r = o - a), t.scrollTop = r
                }
            }, select: function (t) {
                var n, i = this, r = i.options, a = i._current;
                t instanceof Date && (t = l.toString(t, r.format, r.culture)), "string" == typeof t && (a && a.text() === t ? t = a : (t = e.grep(i.ul[0].childNodes, function (e) {
                    return (e.textContent || e.innerText) == t
                }), t = t[0] ? t : null)), n = i._distinctSelection(t), i.current(n)
            }, _distinctSelection: function (t) {
                var n, i, a = this;
                return t && t.length > 1 && (n = r(a._value), i = e.inArray(n, a._dates), t = a.ul.children()[i]), t
            }, setOptions: function (e) {
                var t = this.options;
                e.min = c(e.min), e.max = c(e.max), this.options = W(t, e, {
                    active: t.active,
                    change: t.change,
                    close: t.close,
                    open: t.open
                }), this.bind()
            }, toggle: function () {
                var e = this;
                e.popup.visible() ? e.close() : e.open()
            }, value: function (e) {
                var t = this;
                t._value = e, t.ul[0].firstChild && t.select(e)
            }, _click: function (t) {
                var n = this, i = e(t.currentTarget), r = i.text(), a = n.options.dates;
                a && a.length > 0 && (r = a[i.index()]), t.isDefaultPrevented() || (n.select(i), n.options.change(r, !0), n.close())
            }, _height: function () {
                var e = this, t = e.list, n = t.parent(".k-animation-container"), i = e.options.height;
                e.ul[0].children.length && t.add(n).show().height(e.ul[0].scrollHeight > i ? i : "auto").hide()
            }, _parse: function (e) {
                var t = this, n = t.options, i = t._value || j;
                return e instanceof q ? e : (e = c(e, n.parseFormats, n.culture), e && (e = new q(i.getFullYear(), i.getMonth(), i.getDate(), e.getHours(), e.getMinutes(), e.getSeconds(), e.getMilliseconds())), e)
            }, _adjustListWidth: function () {
                var e, t, n = this.list, i = n[0].style.width, r = this.options.anchor;
                !n.data("width") && i || (e = window.getComputedStyle ? window.getComputedStyle(r[0], null) : 0, t = e ? parseFloat(e.width) : r.outerWidth(), e && (h.mozilla || h.msie) && (t += parseFloat(e.paddingLeft) + parseFloat(e.paddingRight) + parseFloat(e.borderLeftWidth) + parseFloat(e.borderRightWidth)), i = t - (n.outerWidth() - n.width()), n.css({
                    fontFamily: r.css("font-family"),
                    width: i
                }).data("width", i))
            }, _popup: function () {
                var e = this, t = e.list, n = e.options, i = n.anchor;
                e.popup = new m.Popup(t, W(n.popup, {
                    anchor: i,
                    open: n.open,
                    close: n.close,
                    animation: n.animation,
                    isRtl: f.isRtl(n.anchor)
                }))
            }, move: function (e) {
                var t = this, n = e.keyCode, i = t.ul[0], r = t._current, a = n === u.DOWN;
                if (n === u.UP || a) {
                    if (e.altKey)return void t.toggle(a);
                    r = a ? r ? r[0].nextSibling : i.firstChild : r ? r[0].previousSibling : i.lastChild, r && t.select(r), t.options.change(t._current.text()), e.preventDefault()
                } else n !== u.ENTER && n !== u.TAB && n !== u.ESC || (e.preventDefault(), r && t.options.change(r.text(), !0), t.close())
            }
        }, G.getMilliseconds = r, l.TimeView = G;
        var Y = g.extend({
            init: function (t, n) {
                var i, r, a, s = this;
                g.fn.init.call(s, t, n), t = s.element, n = s.options, n.min = c(t.attr("min")) || c(n.min), n.max = c(t.attr("max")) || c(n.max), o(n), s._initialOptions = W({}, n), s._wrapper(), s.timeView = r = new G(W({}, n, {
                    id: t.attr(B),
                    anchor: s.wrapper,
                    format: n.format,
                    change: function (e, n) {
                        n ? s._change(e) : t.val(e)
                    },
                    open: function (e) {
                        s.timeView._adjustListWidth(), s.trigger(v) ? e.preventDefault() : (t.attr(P, !0), i.attr(V, !1))
                    },
                    close: function (e) {
                        s.trigger(_) ? e.preventDefault() : (t.attr(P, !1), i.attr(V, !0))
                    },
                    active: function (e) {
                        t.removeAttr(R), e && t.attr(R, r._optionID)
                    }
                })), i = r.ul, s._icon(), s._reset();
                try {
                    t[0].setAttribute("type", "text")
                } catch (u) {
                    t[0].type = "text"
                }
                t.addClass("k-input").attr({
                    role: "combobox",
                    "aria-expanded": !1,
                    "aria-owns": r._timeViewID
                }), a = t.is("[disabled]") || e(s.element).parents("fieldset").is(":disabled"), a ? s.enable(!1) : s.readonly(t.is("[readonly]")), s._old = s._update(n.value || s.element.val()), s._oldText = t.val(), l.notify(s)
            },
            options: {
                name: "TimePicker",
                min: j,
                max: j,
                format: "",
                dates: [],
                parseFormats: [],
                value: null,
                interval: 30,
                height: 200,
                animation: {}
            },
            events: [v, _, w],
            setOptions: function (e) {
                var t = this, n = t._value;
                g.fn.setOptions.call(t, e), e = t.options, o(e), t.timeView.setOptions(e), n && t.element.val(l.toString(n, e.format, e.culture))
            },
            dataBind: function (e) {
                N(e) && this.timeView.dataBind(e)
            },
            _editable: function (e) {
                var t = this, n = e.disable, i = e.readonly, r = t._arrow.off(b), a = t.element.off(b), o = t._inputWrapper.off(b);
                i || n ? (o.addClass(n ? H : k).removeClass(n ? k : H), a.attr(x, n).attr(C, i).attr(L, n)) : (o.addClass(k).removeClass(H).on(F, t._toggleHover), a.removeAttr(x).removeAttr(C).attr(L, !1).on("keydown" + b, U(t._keydown, t)).on("focusout" + b, U(t._blur, t)).on("focus" + b, function () {
                    t._inputWrapper.addClass(D)
                }), r.on(y, U(t._click, t)).on(E, s))
            },
            readonly: function (e) {
                this._editable({readonly: e === t || e, disable: !1})
            },
            enable: function (e) {
                this._editable({readonly: !1, disable: !(e = e === t || e)})
            },
            destroy: function () {
                var e = this;
                g.fn.destroy.call(e), e.timeView.destroy(), e.element.off(b), e._arrow.off(b), e._inputWrapper.off(b), e._form && e._form.off("reset", e._resetHandler)
            },
            close: function () {
                this.timeView.close()
            },
            open: function () {
                this.timeView.open()
            },
            min: function (e) {
                return this._option("min", e)
            },
            max: function (e) {
                return this._option("max", e)
            },
            value: function (e) {
                var n = this;
                return e === t ? n._value : (n._old = n._update(e), null === n._old && n.element.val(""), void(n._oldText = n.element.val()))
            },
            _blur: function () {
                var e = this, t = e.element.val();
                e.close(), t !== e._oldText && e._change(t), e._inputWrapper.removeClass(D)
            },
            _click: function () {
                var e = this, t = e.element;
                e.timeView.toggle(), f.touch || t[0] === d() || t.focus()
            },
            _change: function (e) {
                var t = this;
                e = t._update(e), +t._old != +e && (t._old = e, t._oldText = t.element.val(), t._typing || t.element.trigger(w), t.trigger(w)), t._typing = !1
            },
            _icon: function () {
                var t, n = this, i = n.element;
                t = i.next("span.k-select"), t[0] || (t = e('<span unselectable="on" class="k-select" aria-label="select"><span class="k-icon k-i-clock"></span></span>').insertAfter(i)), n._arrow = t.attr({
                    role: "button",
                    "aria-controls": n.timeView._timeViewID
                })
            },
            _keydown: function (e) {
                var t = this, n = e.keyCode, i = t.timeView, r = t.element.val();
                i.popup.visible() || e.altKey ? i.move(e) : n === u.ENTER && r !== t._oldText ? t._change(r) : t._typing = !0
            },
            _option: function (e, n) {
                var i = this, r = i.options;
                return n === t ? r[e] : (n = i.timeView._parse(n), void(n && (n = new q((+n)), r[e] = n, i.timeView.options[e] = n, i.timeView.bind())))
            },
            _toggleHover: function (t) {
                e(t.currentTarget).toggleClass(I, "mouseenter" === t.type)
            },
            _update: function (e) {
                var t = this, n = t.options, i = t.timeView, r = i._parse(e);
                return a(r, n.min, n.max) || (r = null), t._value = r, t.element.val(l.toString(r || e, n.format, n.culture)), i.value(r), r
            },
            _wrapper: function () {
                var t, n = this, i = n.element;
                t = i.parents(".k-timepicker"), t[0] || (t = i.wrap(S).parent().addClass("k-picker-wrap k-state-default"), t = t.wrap(S).parent()), t[0].style.cssText = i[0].style.cssText, n.wrapper = t.addClass("k-widget k-timepicker k-header").addClass(i[0].className), i.css({
                    width: "100%",
                    height: i[0].style.height
                }), n._inputWrapper = e(t[0].firstChild)
            },
            _reset: function () {
                var t = this, n = t.element, i = n.attr("form"), r = i ? e("#" + i) : n.closest("form");
                r[0] && (t._resetHandler = function () {
                    t.value(n[0].defaultValue), t.max(t._initialOptions.max), t.min(t._initialOptions.min)
                }, t._form = r.on("reset", t._resetHandler))
            }
        });
        m.plugin(Y)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.datetimepicker", ["kendo.datepicker", "kendo.timepicker"], e)
}(function () {
    return function (e, t) {
        function n(e) {
            var t = new Date(2100, 0, 1);
            return t.setMinutes(-e), t
        }

        function i(e) {
            e.preventDefault()
        }

        function r(t) {
            var n, i = a.getCulture(t.culture).calendars.standard.patterns, r = !t.parseFormats.length;
            t.format = u(t.format || i.g), t.timeFormat = n = u(t.timeFormat || i.t), a.DateView.normalize(t), r && t.parseFormats.unshift("yyyy-MM-ddTHH:mm:ss"), e.inArray(n, t.parseFormats) === -1 && t.parseFormats.splice(1, 0, n)
        }

        var a = window.kendo, o = a.TimeView, s = a.parseDate, l = a._activeElement, u = a._extractFormat, c = a.calendar, d = c.isInRange, p = c.restrictValue, f = c.isEqualDatePart, h = o.getMilliseconds, m = a.ui, g = m.Widget, v = "open", _ = "close", w = "change", b = ".kendoDateTimePicker", y = "click" + b, k = "disabled", x = "readonly", C = "k-state-default", T = "k-state-focused", S = "k-state-hover", D = "k-state-disabled", I = "mouseenter" + b + " mouseleave" + b, F = "mousedown" + b, E = "month", O = "<span/>", A = "aria-activedescendant", M = "aria-expanded", H = "aria-hidden", z = "aria-owns", P = "aria-disabled", V = Date, L = new V(1800, 0, 1), R = new V(2099, 11, 31), B = {view: "date"}, N = {view: "time"}, W = e.extend, U = g.extend({
            init: function (t, n) {
                var i, o = this;
                g.fn.init.call(o, t, n), t = o.element, n = o.options, n.disableDates = a.calendar.disabled(n.disableDates), n.min = s(t.attr("min")) || s(n.min), n.max = s(t.attr("max")) || s(n.max), r(n), o._initialOptions = W({}, n), o._wrapper(), o._views(), o._icons(), o._reset(), o._template();
                try {
                    t[0].setAttribute("type", "text")
                } catch (l) {
                    t[0].type = "text"
                }
                t.addClass("k-input").attr({
                    role: "combobox",
                    "aria-expanded": !1
                }), o._midnight = o._calculateMidnight(n.min, n.max), i = t.is("[disabled]") || e(o.element).parents("fieldset").is(":disabled"), i ? o.enable(!1) : o.readonly(t.is("[readonly]")), o._old = o._update(n.value || o.element.val()), o._oldText = t.val(), a.notify(o)
            },
            options: {
                name: "DateTimePicker",
                value: null,
                format: "",
                timeFormat: "",
                culture: "",
                parseFormats: [],
                dates: [],
                min: new V(L),
                max: new V(R),
                interval: 30,
                height: 200,
                footer: "",
                start: E,
                depth: E,
                animation: {},
                month: {},
                ARIATemplate: 'Current focused date is #=kendo.toString(data.current, "d")#',
                dateButtonText: "Open the date view",
                timeButtonText: "Open the time view"
            },
            events: [v, _, w],
            setOptions: function (e) {
                var t, n, i, o = this, l = o._value;
                g.fn.setOptions.call(o, e), e = o.options, e.min = t = s(e.min), e.max = n = s(e.max), r(e), o._midnight = o._calculateMidnight(e.min, e.max), i = e.value || o._value || o.dateView._current, t && !f(t, i) && (t = new V(L)), n && !f(n, i) && (n = new V(R)), o.dateView.setOptions(e), o.timeView.setOptions(W({}, e, {
                    format: e.timeFormat,
                    min: t,
                    max: n
                })), l && (o.element.val(a.toString(l, e.format, e.culture)), o._updateARIA(l))
            },
            _editable: function (t) {
                var n = this, r = n.element.off(b), o = n._dateIcon.off(b), s = n._timeIcon.off(b), u = n._inputWrapper.off(b), c = t.readonly, d = t.disable;
                c || d ? (u.addClass(d ? D : C).removeClass(d ? C : D), r.attr(k, d).attr(x, c).attr(P, d)) : (u.addClass(C).removeClass(D).on(I, n._toggleHover), r.removeAttr(k).removeAttr(x).attr(P, !1).on("keydown" + b, e.proxy(n._keydown, n)).on("focus" + b, function () {
                    n._inputWrapper.addClass(T)
                }).on("focusout" + b, function () {
                    n._inputWrapper.removeClass(T), r.val() !== n._oldText && n._change(r.val()), n.close("date"), n.close("time")
                }), o.on(F, i).on(y, function () {
                    n.toggle("date"), a.support.touch || r[0] === l() || r.focus()
                }), s.on(F, i).on(y, function () {
                    n.toggle("time"),
                    a.support.touch || r[0] === l() || r.focus()
                }))
            },
            readonly: function (e) {
                this._editable({readonly: e === t || e, disable: !1})
            },
            enable: function (e) {
                this._editable({readonly: !1, disable: !(e = e === t || e)})
            },
            destroy: function () {
                var e = this;
                g.fn.destroy.call(e), e.dateView.destroy(), e.timeView.destroy(), e.element.off(b), e._dateIcon.off(b), e._timeIcon.off(b), e._inputWrapper.off(b), e._form && e._form.off("reset", e._resetHandler)
            },
            close: function (e) {
                "time" !== e && (e = "date"), this[e + "View"].close()
            },
            open: function (e) {
                "time" !== e && (e = "date"), this[e + "View"].open()
            },
            min: function (e) {
                return this._option("min", e)
            },
            max: function (e) {
                return this._option("max", e)
            },
            toggle: function (e) {
                var t = "timeView";
                "time" !== e ? e = "date" : t = "dateView", this[e + "View"].toggle(), this[t].close()
            },
            value: function (e) {
                var n = this;
                return e === t ? n._value : (n._old = n._update(e), null === n._old && n.element.val(""), void(n._oldText = n.element.val()))
            },
            _change: function (e) {
                var t, n = this, i = n.element.val();
                e = n._update(e), t = +n._old != +e;
                var r = t && !n._typing, a = i !== n.element.val();
                (r || a) && n.element.trigger(w), t && (n._old = e, n._oldText = n.element.val(), n.trigger(w)), n._typing = !1
            },
            _option: function (e, i) {
                var r, a, o = this, l = o.options, u = o.timeView, c = u.options, d = o._value || o._old;
                if (i === t)return l[e];
                if (i = s(i, l.parseFormats, l.culture)) {
                    if (l.min.getTime() === l.max.getTime() && (c.dates = []), l[e] = new V(i.getTime()), o.dateView[e](i), o._midnight = o._calculateMidnight(l.min, l.max), d && (r = f(l.min, d), a = f(l.max, d)), r || a) {
                        if (c[e] = i, r && !a && (c.max = n(l.interval)), a) {
                            if (o._midnight)return void u.dataBind([R]);
                            r || (c.min = L)
                        }
                    } else c.max = R, c.min = L;
                    u.bind()
                }
            },
            _toggleHover: function (t) {
                e(t.currentTarget).toggleClass(S, "mouseenter" === t.type)
            },
            _update: function (t) {
                var i, r, o, l, u, c = this, h = c.options, m = h.min, g = h.max, v = h.dates, _ = c.timeView, b = c._value, y = s(t, h.parseFormats, h.culture), k = null === y && null === b || y instanceof Date && b instanceof Date;
                return h.disableDates && h.disableDates(y) && (y = null, c._old || c.element.val() || (t = null)), +y === +b && k ? (u = a.toString(y, h.format, h.culture), u !== t && (c.element.val(null === y ? t : u), t instanceof String && c.element.trigger(w)), y) : (null !== y && f(y, m) ? y = p(y, m, g) : d(y, m, g) || (y = null), c._value = y, _.value(y), c.dateView.value(y), y && (o = c._old, r = _.options, v[0] && (v = e.grep(v, function (e) {
                    return f(y, e)
                }), v[0] && (_.dataBind(v), l = !0)), l || (f(y, m) && (r.min = m, r.max = n(h.interval), i = !0), f(y, g) && (c._midnight ? (_.dataBind([R]), l = !0) : (r.max = g, i || (r.min = L), i = !0))), !l && (!o && i || o && !f(o, y)) && (i || (r.max = R, r.min = L), _.bind())), c.element.val(a.toString(y || t, h.format, h.culture)), c._updateARIA(y), y)
            },
            _keydown: function (e) {
                var t = this, n = t.dateView, i = t.timeView, r = t.element.val(), o = n.popup.visible();
                e.altKey && e.keyCode === a.keys.DOWN ? t.toggle(o ? "time" : "date") : o ? (n.move(e), t._updateARIA(n._current)) : i.popup.visible() ? i.move(e) : e.keyCode === a.keys.ENTER && r !== t._oldText ? t._change(r) : t._typing = !0
            },
            _views: function () {
                var e, t, n, i, r, l, u = this, c = u.element, p = u.options, f = c.attr("id");
                u.dateView = e = new a.DateView(W({}, p, {
                    id: f, anchor: u.wrapper, change: function () {
                        var t, n, i = e.calendar.value(), r = +i, o = +p.min, s = +p.max;
                        r !== o && r !== s || (t = r === o ? o : s, t = new V(u._value || t), t.setFullYear(i.getFullYear(), i.getMonth(), i.getDate()), d(t, o, s) && (i = t)), u._value && (n = a.date.setHours(new Date(i), u._value), d(n, o, s) && (i = n)), u._change(i), u.close("date")
                    }, close: function (e) {
                        u.trigger(_, B) ? e.preventDefault() : (c.attr(M, !1), n.attr(H, !0), t.popup.visible() || c.removeAttr(z))
                    }, open: function (t) {
                        u.trigger(v, B) ? t.preventDefault() : (c.val() !== u._oldText && (l = s(c.val(), p.parseFormats, p.culture), u.dateView[l ? "current" : "value"](l)), n.attr(H, !1), c.attr(M, !0).attr(z, e._dateViewID), u._updateARIA(l))
                    }
                })), n = e.div, r = p.min.getTime(), u.timeView = t = new o({
                    id: f,
                    value: p.value,
                    anchor: u.wrapper,
                    animation: p.animation,
                    format: p.timeFormat,
                    culture: p.culture,
                    height: p.height,
                    interval: p.interval,
                    min: new V(L),
                    max: new V(R),
                    dates: r === p.max.getTime() ? [new Date(r)] : [],
                    parseFormats: p.parseFormats,
                    change: function (n, i) {
                        n = t._parse(n), n < p.min ? (n = new V((+p.min)), t.options.min = n) : n > p.max && (n = new V((+p.max)), t.options.max = n), i ? (u._timeSelected = !0, u._change(n)) : (c.val(a.toString(n, p.format, p.culture)), e.value(n), u._updateARIA(n))
                    },
                    close: function (t) {
                        u.trigger(_, N) ? t.preventDefault() : (i.attr(H, !0), c.attr(M, !1), e.popup.visible() || c.removeAttr(z))
                    },
                    open: function (e) {
                        t._adjustListWidth(), u.trigger(v, N) ? e.preventDefault() : (c.val() !== u._oldText && (l = s(c.val(), p.parseFormats, p.culture), u.timeView.value(l)), i.attr(H, !1), c.attr(M, !0).attr(z, t._timeViewID), t.options.active(t.current()))
                    },
                    active: function (e) {
                        c.removeAttr(A), e && c.attr(A, t._optionID)
                    }
                }), i = t.ul
            },
            _icons: function () {
                var t, n = this, i = n.element, r = n.options;
                t = i.next("span.k-select"), t[0] || (t = e('<span unselectable="on" class="k-select"><span class="k-link k-link-date" aria-label="' + r.dateButtonText + '"><span unselectable="on" class="k-icon k-i-calendar"></span></span><span class="k-link k-link-time" aria-label="' + r.timeButtonText + '"><span unselectable="on" class="k-icon k-i-clock"></span></span></span>').insertAfter(i)), t = t.children(), t = t.children(), n._dateIcon = t.eq(0).attr("aria-controls", n.dateView._dateViewID), n._timeIcon = t.eq(1).attr("aria-controls", n.timeView._timeViewID)
            },
            _wrapper: function () {
                var t, n = this, i = n.element;
                t = i.parents(".k-datetimepicker"), t[0] || (t = i.wrap(O).parent().addClass("k-picker-wrap k-state-default"), t = t.wrap(O).parent()), t[0].style.cssText = i[0].style.cssText, i.css({
                    width: "100%",
                    height: i[0].style.height
                }), n.wrapper = t.addClass("k-widget k-datetimepicker k-header").addClass(i[0].className), n._inputWrapper = e(t[0].firstChild)
            },
            _reset: function () {
                var t = this, n = t.element, i = n.attr("form"), r = i ? e("#" + i) : n.closest("form");
                r[0] && (t._resetHandler = function () {
                    t.value(n[0].defaultValue), t.max(t._initialOptions.max), t.min(t._initialOptions.min)
                }, t._form = r.on("reset", t._resetHandler))
            },
            _template: function () {
                this._ariaTemplate = a.template(this.options.ARIATemplate)
            },
            _calculateMidnight: function (e, t) {
                return h(e) + h(t) === 0
            },
            _updateARIA: function (e) {
                var t, n = this, i = n.dateView.calendar;
                n.element.removeAttr(A), i && (t = i._cell, t.attr("aria-label", n._ariaTemplate({current: e || i.current()})), n.element.attr(A, t.attr("id")))
            }
        });
        m.plugin(U)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.list", ["kendo.data", "kendo.popup"], e)
}(function () {
    return function (e, t) {
        function n(e, n) {
            return e !== t && "" !== e && null !== e && ("boolean" === n ? e = Boolean(e) : "number" === n ? e = Number(e) : "string" === n && (e = e.toString())), e
        }

        function i(e) {
            var t = e.selectedIndex;
            return t > -1 ? e.options[t] : {}
        }

        function r(e, t) {
            var n, i, r, a, o = t.length, s = e.length, l = [], u = [];
            if (s)for (r = 0; r < s; r++) {
                for (n = e[r], i = !1, a = 0; a < o; a++)if (n === t[a]) {
                    i = !0, l.push({index: r, item: n});
                    break
                }
                i || u.push(n)
            }
            return {changed: l, unchanged: u}
        }

        function a(t, n) {
            var i, r = !1;
            return t.filters && (i = e.grep(t.filters, function (e) {
                return r = a(e, n), e.filters ? e.filters.length : e.field != n
            }), r || t.filters.length === i.length || (r = !0), t.filters = i), r
        }

        var o = window.kendo, s = o.ui, l = s.Widget, u = o.keys, c = o.support, d = o.htmlEncode, p = o._activeElement, f = o.data.ObservableArray, h = "id", m = "change", g = "k-state-focused", v = "k-state-hover", _ = "k-i-loading", w = "k-loading-hidden", b = "open", y = "close", k = "cascade", x = "select", C = "selected", T = "requestStart", S = "requestEnd", D = "width", I = e.extend, F = e.proxy, E = e.isArray, O = c.browser, A = O.msie && O.version < 9, M = /"/g, H = {
            ComboBox: "DropDownList",
            DropDownList: "ComboBox"
        }, z = o.ui.DataBoundWidget.extend({
            init: function (t, n) {
                var i, r = this, a = r.ns;
                l.fn.init.call(r, t, n), t = r.element, n = r.options, r._isSelect = t.is(x), r._isSelect && r.element[0].length && (n.dataSource || (n.dataTextField = n.dataTextField || "text", n.dataValueField = n.dataValueField || "value")), r.ul = e('<ul unselectable="on" class="k-list k-reset"/>').attr({
                    tabIndex: -1,
                    "aria-hidden": !0
                }), r.list = e("<div class='k-list-container'/>").append(r.ul).on("mousedown" + a, F(r._listMousedown, r)), i = t.attr(h), i && (r.list.attr(h, i + "-list"), r.ul.attr(h, i + "_listbox")), r._header(), r._noData(), r._footer(), r._accessors(), r._initValue()
            },
            options: {valuePrimitive: !1, footerTemplate: "", headerTemplate: "", noDataTemplate: "No data found."},
            setOptions: function (e) {
                l.fn.setOptions.call(this, e), e && e.enable !== t && (e.enabled = e.enable), this._header(), this._noData(), this._footer(), this._renderFooter(), this._renderNoData()
            },
            focus: function () {
                this._focused.focus()
            },
            readonly: function (e) {
                this._editable({readonly: e === t || e, disable: !1})
            },
            enable: function (e) {
                this._editable({readonly: !1, disable: !(e = e === t || e)})
            },
            _listOptions: function (t) {
                var n = this, i = n.options, r = i.virtual, a = F(n._listBound, n);
                return r = "object" == typeof r ? r : {}, t = e.extend({
                    autoBind: !1,
                    selectable: !0,
                    dataSource: n.dataSource,
                    click: F(n._click, n),
                    change: F(n._listChange, n),
                    activate: F(n._activateItem, n),
                    deactivate: F(n._deactivateItem, n),
                    dataBinding: function () {
                        n.trigger("dataBinding")
                    },
                    dataBound: a,
                    height: i.height,
                    dataValueField: i.dataValueField,
                    dataTextField: i.dataTextField,
                    groupTemplate: i.groupTemplate,
                    fixedGroupTemplate: i.fixedGroupTemplate,
                    template: i.template
                }, t, r), t.template || (t.template = "#:" + o.expr(t.dataTextField, "data") + "#"), i.$angular && (t.$angular = i.$angular), t
            },
            _initList: function () {
                var e = this, t = e._listOptions({selectedItemChange: F(e._listChange, e)});
                e.options.virtual ? e.listView = new o.ui.VirtualList(e.ul, t) : e.listView = new o.ui.StaticList(e.ul, t), e.listView.bind("listBound", F(e._listBound, e)), e._setListValue()
            },
            _setListValue: function (e) {
                e = e || this.options.value, e !== t && this.listView.value(e).done(F(this._updateSelectionState, this))
            },
            _updateSelectionState: e.noop,
            _listMousedown: function (e) {
                this.filterInput && this.filterInput[0] === e.target || e.preventDefault()
            },
            _isFilterEnabled: function () {
                var e = this.options.filter;
                return e && "none" !== e
            },
            _hideClear: function () {
                var e = this;
                e._clear && this._clear.addClass(w)
            },
            _showClear: function () {
                var e = this;
                e._clear && this._clear.removeClass(w)
            },
            _clearValue: function () {
                this.listView.value([]), this._clearText(), this._accessor(""), this._isFilterEnabled() && this._filter({
                    word: "",
                    open: !1
                }), this._change()
            },
            _clearText: function () {
                this.text("")
            },
            _clearFilter: function () {
                this.options.virtual || this.listView.bound(!1), this._filterSource()
            },
            _filterSource: function (e, t) {
                var n = this, i = n.options, r = n.dataSource, o = I({}, r.filter() || {}), s = a(o, i.dataTextField);
                (e || s) && n.trigger("filtering", {filter: e}) || (o = {
                    filters: o.filters || [],
                    logic: "and"
                }, e && o.filters.push(e), n._cascading && this.listView.setDSFilter(o), t ? r.read(r._mergeState({filter: o})) : r.filter(o))
            },
            _angularElement: function (e, t) {
                e && this.angular(t, function () {
                    return {elements: e}
                })
            },
            _noData: function () {
                var t = e(this.noData), n = this.options.noDataTemplate;
                return this.angular("cleanup", function () {
                    return {elements: t}
                }), o.destroy(t), t.remove(), n ? (this.noData = e('<div class="k-nodata" style="display:none"><div></div></div>').appendTo(this.list), void(this.noDataTemplate = "function" != typeof n ? o.template(n) : n)) : void(this.noData = null)
            },
            _renderNoData: function () {
                var e = this.noData;
                e && (this._angularElement(e, "cleanup"), e.children(":first").html(this.noDataTemplate({instance: this})), this._angularElement(e, "compile"))
            },
            _toggleNoData: function (t) {
                e(this.noData).toggle(t)
            },
            _footer: function () {
                var t = e(this.footer), n = this.options.footerTemplate;
                return this._angularElement(t, "cleanup"), o.destroy(t), t.remove(), n ? (this.footer = e('<div class="k-footer"></div>').appendTo(this.list), void(this.footerTemplate = "function" != typeof n ? o.template(n) : n)) : void(this.footer = null)
            },
            _renderFooter: function () {
                var e = this.footer;
                e && (this._angularElement(e, "cleanup"), e.html(this.footerTemplate({instance: this})), this._angularElement(e, "compile"))
            },
            _header: function () {
                var t = e(this.header), n = this.options.headerTemplate;
                if (this._angularElement(t, "cleanup"), o.destroy(t), t.remove(), !n)return void(this.header = null);
                var i = "function" != typeof n ? o.template(n) : n;
                t = e(i({})), this.header = t[0] ? t : null, this.list.prepend(t), this._angularElement(this.header, "compile")
            },
            _allowOpening: function () {
                return this.options.noDataTemplate || this.dataSource.flatView().length
            },
            _initValue: function () {
                var e = this, t = e.options.value;
                null !== t ? e.element.val(t) : (t = e._accessor(), e.options.value = t), e._old = t
            },
            _ignoreCase: function () {
                var e, t = this, n = t.dataSource.reader.model;
                n && n.fields && (e = n.fields[t.options.dataTextField], e && e.type && "string" !== e.type && (t.options.ignoreCase = !1))
            },
            _focus: function (e) {
                return this.listView.focus(e)
            },
            _filter: function (e) {
                var t = this, n = t.options, i = n.ignoreCase, r = n.dataTextField, a = {
                    value: i ? e.word.toLowerCase() : e.word,
                    field: r,
                    operator: n.filter,
                    ignoreCase: i
                };
                t._open = e.open, t._filterSource(a)
            },
            search: function (e) {
                var t = this.options;
                e = "string" == typeof e ? e : this._inputValue(), clearTimeout(this._typingTimeout), (!t.enforceMinLength && !e.length || e.length >= t.minLength) && (this._state = "filter", this._isFilterEnabled() ? this._filter({
                    word: e,
                    open: !0
                }) : this._searchByWord(e))
            },
            current: function (e) {
                return this._focus(e)
            },
            items: function () {
                return this.ul[0].children
            },
            destroy: function () {
                var e = this, t = e.ns;
                l.fn.destroy.call(e), e._unbindDataSource(), e.listView.destroy(), e.list.off(t), e.popup.destroy(), e._form && e._form.off("reset", e._resetHandler)
            },
            dataItem: function (n) {
                var i = this;
                if (n === t)return i.listView.selectedDataItems()[0];
                if ("number" != typeof n) {
                    if (i.options.virtual)return i.dataSource.getByUid(e(n).data("uid"));
                    n = e(i.items()).index(n)
                }
                return i.dataSource.flatView()[n]
            },
            _activateItem: function () {
                var e = this.listView.focus();
                e && this._focused.add(this.filterInput).attr("aria-activedescendant", e.attr("id"))
            },
            _deactivateItem: function () {
                this._focused.add(this.filterInput).removeAttr("aria-activedescendant")
            },
            _accessors: function () {
                var e = this, t = e.element, n = e.options, i = o.getter, r = t.attr(o.attr("text-field")), a = t.attr(o.attr("value-field"));
                !n.dataTextField && r && (n.dataTextField = r), !n.dataValueField && a && (n.dataValueField = a), e._text = i(n.dataTextField), e._value = i(n.dataValueField)
            },
            _aria: function (e) {
                var n = this, i = n.options, r = n._focused.add(n.filterInput);
                i.suggest !== t && r.attr("aria-autocomplete", i.suggest ? "both" : "list"), e = e ? e + " " + n.ul[0].id : n.ul[0].id, r.attr("aria-owns", e), n.ul.attr("aria-live", n._isFilterEnabled() ? "polite" : "off")
            },
            _blur: function () {
                var e = this;
                e._change(), e.close()
            },
            _change: function () {
                var e, i = this, r = i.selectedIndex, a = i.options.value, o = i.value();
                i._isSelect && !i.listView.bound() && a && (o = a), o !== n(i._old, typeof o) ? e = !0 : r !== t && r !== i._oldIndex && (e = !0), e && (i._old = o, i._oldIndex = r, i._typing || i.element.trigger(m), i.trigger(m)), i.typing = !1
            },
            _data: function () {
                return this.dataSource.view()
            },
            _enable: function () {
                var e = this, n = e.options, i = e.element.is("[disabled]");
                n.enable !== t && (n.enabled = n.enable), !n.enabled || i ? e.enable(!1) : e.readonly(e.element.is("[readonly]"))
            },
            _dataValue: function (e) {
                var n = this._value(e);
                return n === t && (n = this._text(e)), n
            },
            _offsetHeight: function () {
                var t = 0, n = this.listView.content.prevAll(":visible");
                return n.each(function () {
                    var n = e(this);
                    t += n.hasClass("k-list-filter") ? n.children().outerHeight() : n.outerHeight()
                }), t
            },
            _height: function (t) {
                var n, i, r, a = this, o = a.list, s = a.options.height, l = a.popup.visible();
                if (t || a.options.noDataTemplate) {
                    if (i = o.add(o.parent(".k-animation-container")).show(), !o.is(":visible"))return void i.hide();
                    s = a.listView.content[0].scrollHeight > s ? s : "auto", i.height(s), "auto" !== s && (n = a._offsetHeight(), r = e(a.footer).outerHeight() || 0, s = s - n - r), a.listView.content.height(s), l || i.hide()
                }
                return s
            },
            _adjustListWidth: function () {
                var e, t, n = this.list, i = n[0].style.width, r = this.wrapper;
                if (n.data(D) || !i)return e = window.getComputedStyle ? window.getComputedStyle(r[0], null) : 0, t = parseFloat(e && e.width) || r.outerWidth(), e && O.msie && (t += parseFloat(e.paddingLeft) + parseFloat(e.paddingRight) + parseFloat(e.borderLeftWidth) + parseFloat(e.borderRightWidth)), i = "border-box" !== n.css("box-sizing") ? t - (n.outerWidth() - n.width()) : t, n.css({
                    fontFamily: r.css("font-family"),
                    width: this.options.autoWidth ? "auto" : i,
                    minWidth: i
                }).data(D, i), !0
            },
            _openHandler: function (e) {
                this._adjustListWidth(), this.trigger(b) ? e.preventDefault() : (this._focused.attr("aria-expanded", !0), this.ul.attr("aria-hidden", !1))
            },
            _closeHandler: function (e) {
                this.trigger(y) ? e.preventDefault() : (this._focused.attr("aria-expanded", !1), this.ul.attr("aria-hidden", !0))
            },
            _focusItem: function () {
                var e = this.listView, n = e.focus(), i = e.select();
                i = i[i.length - 1], i === t && this.options.highlightFirst && !n && (i = 0), i !== t ? e.focus(i) : e.scrollToIndex(0)
            },
            _calculateGroupPadding: function (e) {
                var t = this.ul.children(".k-first:first"), n = this.listView.content.prev(".k-group-header"), i = 0;
                n[0] && "none" !== n[0].style.display && ("auto" !== e && (i = o.support.scrollbar()), i += parseFloat(t.css("border-right-width"), 10) + parseFloat(t.children(".k-group").css("padding-right"), 10), n.css("padding-right", i))
            },
            _calculatePopupHeight: function (e) {
                var t = this._height(this.dataSource.flatView().length || e);
                this._calculateGroupPadding(t)
            },
            _resizePopup: function (e) {
                this.options.virtual || (this.popup.element.is(":visible") ? this._calculatePopupHeight(e) : this.popup.one("open", function (e) {
                    return F(function () {
                        this._calculatePopupHeight(e)
                    }, this)
                }.call(this, e)))
            },
            _popup: function () {
                var e = this;
                e.popup = new s.Popup(e.list, I({}, e.options.popup, {
                    anchor: e.wrapper,
                    open: F(e._openHandler, e),
                    close: F(e._closeHandler, e),
                    animation: e.options.animation,
                    isRtl: c.isRtl(e.wrapper)
                }))
            },
            _makeUnselectable: function () {
                A && this.list.find("*").not(".k-textbox").attr("unselectable", "on")
            },
            _toggleHover: function (t) {
                e(t.currentTarget).toggleClass(v, "mouseenter" === t.type)
            },
            _toggle: function (e, n) {
                var i = this, r = c.mobileOS && (c.touch || c.MSPointers || c.pointers);
                e = e !== t ? e : !i.popup.visible(), n || r || i._focused[0] === p() || (i._prevent = !0, i._focused.focus(), i._prevent = !1), i[e ? b : y]()
            },
            _triggerCascade: function () {
                var e = this;
                e._cascadeTriggered && e._old === e.value() && e._oldIndex === e.selectedIndex || (e._cascadeTriggered = !0, e.trigger(k, {userTriggered: e._userTriggered}))
            },
            _triggerChange: function () {
                this._valueBeforeCascade !== this.value() && this.trigger(m)
            },
            _unbindDataSource: function () {
                var e = this;
                e.dataSource.unbind(T, e._requestStartHandler).unbind(S, e._requestEndHandler).unbind("error", e._errorHandler)
            },
            requireValueMapper: function (e, t) {
                var n = (e.value instanceof Array ? e.value.length : e.value) || (t instanceof Array ? t.length : t);
                if (n && e.virtual && "function" != typeof e.virtual.valueMapper)throw new Error("ValueMapper is not provided while the value is being set. See http://docs.telerik.com/kendo-ui/controls/editors/combobox/virtualization#the-valuemapper-function")
            }
        });
        I(z, {
            inArray: function (e, t) {
                var n, i, r = t.children;
                if (!e || e.parentNode !== t)return -1;
                for (n = 0, i = r.length; n < i; n++)if (e === r[n])return n;
                return -1
            }, unifyType: n
        }), o.ui.List = z, s.Select = z.extend({
            init: function (e, t) {
                z.fn.init.call(this, e, t), this._initial = this.element.val()
            }, setDataSource: function (e) {
                var t, n = this;
                n.options.dataSource = e, n._dataSource(), n.listView.bound() && (n._initialIndex = null), n.listView.setDataSource(n.dataSource), n.options.autoBind && n.dataSource.fetch(), t = n._parentWidget(), t && n._cascadeSelect(t)
            }, close: function () {
                this.popup.close()
            }, select: function (e) {
                var n = this;
                return e === t ? n.selectedIndex : (n._select(e), n._old = n._accessor(), n._oldIndex = n.selectedIndex, void 0)
            }, _accessor: function (e, t) {
                return this[this._isSelect ? "_accessorSelect" : "_accessorInput"](e, t)
            }, _accessorInput: function (e) {
                var n = this.element[0];
                return e === t ? n.value : (null === e && (e = ""), void(n.value = e))
            }, _accessorSelect: function (e, n) {
                var r, a = this.element[0];
                return e === t ? i(a).value || "" : (i(a).selected = !1, n === t && (n = -1), r = null !== e && "" !== e, void(r && n == -1 ? this._custom(e) : e ? a.value = e : a.selectedIndex = n))
            }, _custom: function (t) {
                var n = this, i = n.element, r = n._customOption;
                r || (r = e("<option/>"), n._customOption = r, i.append(r)), r.text(t), r[0].selected = !0
            }, _hideBusy: function () {
                var e = this;
                clearTimeout(e._busy), e._arrow.removeClass(_), e._focused.attr("aria-busy", !1), e._busy = null, e._showClear()
            }, _showBusy: function () {
                var e = this;
                e._request = !0, e._busy || (e._busy = setTimeout(function () {
                    e._arrow && (e._focused.attr("aria-busy", !0), e._arrow.addClass(_), e._hideClear())
                }, 100))
            }, _requestEnd: function () {
                this._request = !1, this._hideBusy()
            }, _dataSource: function () {
                var t, n = this, i = n.element, r = n.options, a = r.dataSource || {};
                a = e.isArray(a) ? {data: a} : a, n._isSelect && (t = i[0].selectedIndex, t > -1 && (r.index = t), a.select = i, a.fields = [{field: r.dataTextField}, {field: r.dataValueField}]), n.dataSource ? n._unbindDataSource() : (n._requestStartHandler = F(n._showBusy, n), n._requestEndHandler = F(n._requestEnd, n), n._errorHandler = F(n._hideBusy, n)), n.dataSource = o.data.DataSource.create(a).bind(T, n._requestStartHandler).bind(S, n._requestEndHandler).bind("error", n._errorHandler)
            }, _firstItem: function () {
                this.listView.focusFirst()
            }, _lastItem: function () {
                this.listView.focusLast()
            }, _nextItem: function () {
                this.listView.focusNext()
            }, _prevItem: function () {
                this.listView.focusPrev()
            }, _move: function (e) {
                var t, n, i, r = this, a = r.listView, o = e.keyCode, s = o === u.DOWN;
                if (o === u.UP || s) {
                    if (e.altKey)r.toggle(s); else {
                        if (!a.bound())return r._fetch || (r.dataSource.one(m, function () {
                            r._fetch = !1, r._move(e)
                        }), r._fetch = !0, r._filterSource()), e.preventDefault(), !0;
                        if (i = r._focus(), r._fetch || i && !i.hasClass("k-state-selected") || (s ? (r._nextItem(), r._focus() || r._lastItem()) : (r._prevItem(), r._focus() || r._firstItem())), t = a.dataItemByIndex(a.getElementIndex(r._focus())), r.trigger(x, {
                                dataItem: t,
                                item: r._focus()
                            }))return void r._focus(i);
                        r._select(r._focus(), !0), r.popup.visible() || r._blur()
                    }
                    e.preventDefault(), n = !0
                } else if (o === u.ENTER || o === u.TAB) {
                    r.popup.visible() && e.preventDefault(), i = r._focus(), t = r.dataItem(), r.popup.visible() || t && r.text() === r._text(t) || (i = null);
                    var l = r.filterInput && r.filterInput[0] === p();
                    if (i) {
                        if (t = a.dataItemByIndex(a.getElementIndex(i)), r.trigger(x, {dataItem: t, item: i}))return;
                        r._select(i)
                    } else r.input && (r._accessor(r.input.val()), r.listView.value(r.input.val()));
                    r._focusElement && r._focusElement(r.wrapper), l && o === u.TAB ? r.wrapper.focusout() : r._blur(), r.close(), n = !0
                } else if (o === u.ESC)r.popup.visible() && e.preventDefault(), r.close(), n = !0; else if (r.popup.visible() && (o === u.PAGEDOWN || o === u.PAGEUP)) {
                    e.preventDefault();
                    var c = o === u.PAGEDOWN ? 1 : -1;
                    a.scrollWith(c * a.screenHeight()), n = !0
                }
                return n
            }, _fetchData: function () {
                var e = this, t = !!e.dataSource.view().length;
                e._request || e.options.cascadeFrom || e.listView.bound() || e._fetch || t || (e._fetch = !0, e.dataSource.fetch().done(function () {
                    e._fetch = !1
                }))
            }, _options: function (e, n, r) {
                var a, o, s, l, u = this, c = u.element, p = c[0], f = e.length, h = "", m = 0;
                for (n && (h = n); m < f; m++)a = "<option", o = e[m], s = u._text(o), l = u._value(o), l !== t && (l += "", l.indexOf('"') !== -1 && (l = l.replace(M, "&quot;")), a += ' value="' + l + '"'), a += ">", s !== t && (a += d(s)), a += "</option>", h += a;
                c.html(h), r !== t && (p.value = r, p.value && !r && (p.selectedIndex = -1)), p.selectedIndex !== -1 && (a = i(p), a && a.setAttribute(C, C))
            }, _reset: function () {
                var t = this, n = t.element, i = n.attr("form"), r = i ? e("#" + i) : n.closest("form");
                r[0] && (t._resetHandler = function () {
                    setTimeout(function () {
                        t.value(t._initial)
                    })
                }, t._form = r.on("reset", t._resetHandler))
            }, _parentWidget: function () {
                var t = this.options.name;
                if (this.options.cascadeFrom) {
                    var n = e("#" + this.options.cascadeFrom), i = n.data("kendo" + t);
                    return i || (i = n.data("kendo" + H[t])), i
                }
            }, _cascade: function () {
                var e, t = this, n = t.options, i = n.cascadeFrom;
                if (i) {
                    if (e = t._parentWidget(), t._cascadeHandlerProxy = F(t._cascadeHandler, t), !e)return;
                    n.autoBind = !1, e.bind("set", function () {
                        t.one("set", function (e) {
                            t._selectedValue = e.value
                        })
                    }), e.first(k, t._cascadeHandlerProxy), e.listView.bound() ? (t._toggleCascadeOnFocus(), t._cascadeSelect(e)) : (e.one("dataBound", function () {
                        t._toggleCascadeOnFocus()
                    }), e.value() || t.enable(!1))
                }
            }, _toggleCascadeOnFocus: function () {
                var e = this, t = e._parentWidget();
                t._focused.add(t.filterInput).bind("focus", function () {
                    t.unbind(k, e._cascadeHandlerProxy), t.first(m, e._cascadeHandlerProxy)
                }), t._focused.add(t.filterInput).bind("focusout", function () {
                    t.unbind(m, e._cascadeHandlerProxy), t.first(k, e._cascadeHandlerProxy)
                })
            }, _cascadeHandler: function (e) {
                var t = this._parentWidget(), n = this.value();
                this._userTriggered = e.userTriggered, this.listView.bound() && this._clearSelection(t, !0), this._cascadeSelect(t, n)
            }, _cascadeChange: function (e) {
                var t = this, n = t._accessor() || t._selectedValue;
                t._selectedValue = null, t._userTriggered ? t._clearSelection(e, !0) : n ? (n !== t.listView.value()[0] && t.value(n), t.dataSource.view()[0] && t.selectedIndex !== -1 || t._clearSelection(e, !0)) : t.dataSource.flatView().length && t.select(t.options.index), t.enable(), t._triggerCascade(), t._triggerChange(), t._userTriggered = !1
            }, _cascadeSelect: function (e, n) {
                var i, r = this, o = e.dataItem(), s = o ? e._value(o) : null, l = r.options.cascadeFromField || e.options.dataValueField;
                if (r._valueBeforeCascade = n !== t ? n : r.value(), s || 0 === s) {
                    i = r.dataSource.filter() || {}, a(i, l);
                    var u = function () {
                        r.unbind("dataBound", u), r._cascadeChange(e)
                    };
                    r.first("dataBound", u), r._cascading = !0, r._filterSource({
                        field: l,
                        operator: "eq",
                        value: s
                    }), r._cascading = !1
                } else r.enable(!1), r._clearSelection(e), r._triggerCascade(), r._triggerChange(), r._userTriggered = !1
            }
        });
        var P = ".StaticList", V = o.ui.DataBoundWidget.extend({
            init: function (t, n) {
                l.fn.init.call(this, t, n), this.element.attr("role", "listbox").on("click" + P, "li", F(this._click, this)).on("mouseenter" + P, "li", function () {
                    e(this).addClass(v)
                }).on("mouseleave" + P, "li", function () {
                    e(this).removeClass(v)
                }), this.content = this.element.wrap("<div class='k-list-scroller' unselectable='on'></div>").parent(), this.header = this.content.before('<div class="k-group-header" style="display:none"></div>').prev(), this.bound(!1), this._optionID = o.guid(), this._selectedIndices = [], this._view = [], this._dataItems = [], this._values = [];
                var i = this.options.value;
                i && (this._values = e.isArray(i) ? i.slice(0) : [i]), this._getter(), this._templates(), this.setDataSource(this.options.dataSource), this._onScroll = F(function () {
                    var e = this;
                    clearTimeout(e._scrollId), e._scrollId = setTimeout(function () {
                        e._renderHeader()
                    }, 50)
                }, this)
            },
            options: {
                name: "StaticList",
                dataValueField: null,
                valuePrimitive: !1,
                selectable: !0,
                template: null,
                groupTemplate: null,
                fixedGroupTemplate: null
            },
            events: ["click", m, "activate", "deactivate", "dataBinding", "dataBound", "selectedItemChange"],
            setDataSource: function (t) {
                var n, i = this, r = t || {};
                r = e.isArray(r) ? {data: r} : r, r = o.data.DataSource.create(r), i.dataSource ? (i.dataSource.unbind(m, i._refreshHandler), n = i.value(), i.value([]), i.bound(!1), i.value(n)) : i._refreshHandler = F(i.refresh, i), i.setDSFilter(r.filter()), i.dataSource = r.bind(m, i._refreshHandler), i._fixedHeader()
            },
            skip: function () {
                return this.dataSource.skip()
            },
            setOptions: function (e) {
                l.fn.setOptions.call(this, e), this._getter(), this._templates(), this._render()
            },
            destroy: function () {
                this.element.off(P), this._refreshHandler && this.dataSource.unbind(m, this._refreshHandler), clearTimeout(this._scrollId), l.fn.destroy.call(this)
            },
            dataItemByIndex: function (e) {
                return this.dataSource.flatView()[e]
            },
            screenHeight: function () {
                return this.content[0].clientHeight
            },
            scrollToIndex: function (e) {
                var t = this.element[0].children[e];
                t && this.scroll(t)
            },
            scrollWith: function (e) {
                this.content.scrollTop(this.content.scrollTop() + e)
            },
            scroll: function (e) {
                if (e) {
                    e[0] && (e = e[0]);
                    var t = this.content[0], n = e.offsetTop, i = e.offsetHeight, r = t.scrollTop, a = t.clientHeight, o = n + i;
                    r > n ? r = n : o > r + a && (r = o - a), t.scrollTop = r
                }
            },
            selectedDataItems: function (e) {
                return e === t ? this._dataItems.slice() : (this._dataItems = e, void(this._values = this._getValues(e)))
            },
            _getValues: function (t) {
                var n = this._valueGetter;
                return e.map(t, function (e) {
                    return n(e)
                })
            },
            focusNext: function () {
                var e = this.focus();
                e = e ? e.next() : 0, this.focus(e)
            },
            focusPrev: function () {
                var e = this.focus();
                e = e ? e.prev() : this.element[0].children.length - 1, this.focus(e)
            },
            focusFirst: function () {
                this.focus(this.element[0].children[0])
            },
            focusLast: function () {
                this.focus(this.element[0].children[this.element[0].children.length - 1])
            },
            focus: function (n) {
                var i, r = this, a = r._optionID;
                return n === t ? r._current : (n = r._get(n), n = n[n.length - 1], n = e(this.element[0].children[n]), r._current && (r._current.removeClass(g).removeAttr("aria-selected").removeAttr(h), r.trigger("deactivate")), i = !!n[0], i && (n.addClass(g), r.scroll(n), n.attr("id", a)), r._current = i ? n : null, void r.trigger("activate"))
            },
            focusIndex: function () {
                return this.focus() ? this.focus().index() : t
            },
            skipUpdate: function (e) {
                this._skipUpdate = e
            },
            select: function (n) {
                var i, r = this, a = r.options.selectable, o = "multiple" !== a && a !== !1, s = r._selectedIndices, l = [], u = [];
                if (n === t)return s.slice();
                n = r._get(n), 1 === n.length && n[0] === -1 && (n = []);
                var c = r.isFiltered();
                if (!c || o || !r._deselectFiltered(n)) {
                    if (o && !c && e.inArray(n[n.length - 1], s) !== -1)return void(r._dataItems.length && r._view.length && (r._dataItems = [r._view[s[0]].item]));
                    i = r._deselect(n), u = i.removed, n = i.indices, n.length && (o && (n = [n[n.length - 1]]), l = r._select(n)), (l.length || u.length) && (r._valueComparer = null, r.trigger(m, {
                        added: l,
                        removed: u
                    }))
                }
            },
            removeAt: function (e) {
                return this._selectedIndices.splice(e, 1), this._values.splice(e, 1), this._valueComparer = null, {
                    position: e,
                    dataItem: this._dataItems.splice(e, 1)[0]
                }
            },
            setValue: function (t) {
                t = e.isArray(t) || t instanceof f ? t.slice(0) : [t], this._values = t, this._valueComparer = null
            },
            value: function (n) {
                var i, r = this, a = r._valueDeferred;
                return n === t ? r._values.slice() : (r.setValue(n), a && "resolved" !== a.state() || (r._valueDeferred = a = e.Deferred()), r.bound() && (i = r._valueIndices(r._values), "multiple" === r.options.selectable && r.select(-1), r.select(i), a.resolve()), r._skipUpdate = !1, a)
            },
            items: function () {
                return this.element.children(".k-item")
            },
            _click: function (t) {
                t.isDefaultPrevented() || this.trigger("click", {item: e(t.currentTarget)}) || this.select(t.currentTarget)
            },
            _valueExpr: function (e, t) {
                var i, r, a = this, o = 0, s = [];
                if (!a._valueComparer || a._valueType !== e) {
                    for (a._valueType = e; o < t.length; o++)s.push(n(t[o], e));
                    i = "for (var idx = 0; idx < " + s.length + "; idx++) { if (current === values[idx]) {   return idx; }} return -1;", r = new Function("current", "values", i), a._valueComparer = function (e) {
                        return r(e, s)
                    }
                }
                return a._valueComparer
            },
            _dataItemPosition: function (e, t) {
                var n = this._valueGetter(e), i = this._valueExpr(typeof n, t);
                return i(n)
            },
            _getter: function () {
                this._valueGetter = o.getter(this.options.dataValueField)
            },
            _deselect: function (t) {
                var n, i, r, a = this, o = a.element[0].children, s = a.options.selectable, l = a._selectedIndices, u = a._dataItems, c = a._values, d = [], p = 0, f = 0;
                if (t = t.slice(), s !== !0 && t.length) {
                    if ("multiple" === s)for (; p < t.length; p++)if (i = t[p], e(o[i]).hasClass("k-state-selected"))for (n = 0; n < l.length; n++)if (r = l[n], r === i) {
                        e(o[r]).removeClass("k-state-selected"), d.push({
                            position: n + f,
                            dataItem: u.splice(n, 1)[0]
                        }), l.splice(n, 1), t.splice(p, 1), c.splice(n, 1), f += 1, p -= 1, n -= 1;
                        break
                    }
                } else {
                    for (; p < l.length; p++)e(o[l[p]]).removeClass("k-state-selected"), d.push({
                        position: p,
                        dataItem: u[p]
                    });
                    a._values = [], a._dataItems = [], a._selectedIndices = []
                }
                return {indices: t, removed: d}
            },
            _deselectFiltered: function (t) {
                for (var n, i, r, a = this.element[0].children, o = [], s = 0; s < t.length; s++)i = t[s], n = this._view[i].item, r = this._dataItemPosition(n, this._values), r > -1 && (o.push(this.removeAt(r)), e(a[i]).removeClass("k-state-selected"));
                return !!o.length && (this.trigger(m, {added: [], removed: o}), !0)
            },
            _select: function (t) {
                var n, i, r = this, a = r.element[0].children, o = r._view, s = [], l = 0;
                for (t[t.length - 1] !== -1 && r.focus(t); l < t.length; l++)i = t[l], n = o[i], i !== -1 && n && (n = n.item, r._selectedIndices.push(i), r._dataItems.push(n), r._values.push(r._valueGetter(n)), e(a[i]).addClass("k-state-selected").attr("aria-selected", !0), s.push({dataItem: n}));
                return s
            },
            getElementIndex: function (t) {
                return e(t).data("offset-index")
            },
            _get: function (e) {
                return "number" == typeof e ? e = [e] : E(e) || (e = this.getElementIndex(e), e = [e !== t ? e : -1]), e
            },
            _template: function () {
                var e = this, t = e.options, n = t.template;
                return n ? (n = o.template(n), n = function (e) {
                    return '<li tabindex="-1" role="option" unselectable="on" class="k-item">' + n(e) + "</li>"
                }) : n = o.template('<li tabindex="-1" role="option" unselectable="on" class="k-item">${' + o.expr(t.dataTextField, "data") + "}</li>", {useWithBlock: !1}), n
            },
            _templates: function () {
                var e, t = this.options, n = {
                    template: t.template,
                    groupTemplate: t.groupTemplate,
                    fixedGroupTemplate: t.fixedGroupTemplate
                };
                for (var i in n)e = n[i], e && "function" != typeof e && (n[i] = o.template(e));
                this.templates = n
            },
            _normalizeIndices: function (e) {
                for (var n = [], i = 0; i < e.length; i++)e[i] !== t && n.push(e[i]);
                return n
            },
            _valueIndices: function (e, t) {
                var n, i = this._view, r = 0;
                if (t = t ? t.slice() : [], !e.length)return [];
                for (; r < i.length; r++)n = this._dataItemPosition(i[r].item, e), n !== -1 && (t[n] = r);
                return this._normalizeIndices(t)
            },
            _firstVisibleItem: function () {
                for (var t = this.element[0], n = this.content[0], i = n.scrollTop, r = e(t.children[0]).height(), a = Math.floor(i / r) || 0, o = t.children[a] || t.lastChild, s = o.offsetTop < i; o;)if (s) {
                    if (o.offsetTop + r > i || !o.nextSibling)break;
                    o = o.nextSibling
                } else {
                    if (o.offsetTop <= i || !o.previousSibling)break;
                    o = o.previousSibling
                }
                return this._view[e(o).data("offset-index")];
            },
            _fixedHeader: function () {
                this.isGrouped() && this.templates.fixedGroupTemplate ? (this.header.show(), this.content.scroll(this._onScroll)) : (this.header.hide(), this.content.off("scroll", this._onScroll))
            },
            _renderHeader: function () {
                var e = this.templates.fixedGroupTemplate;
                if (e) {
                    var t = this._firstVisibleItem();
                    t && this.header.html(e(t.group))
                }
            },
            _renderItem: function (e) {
                var t = '<li tabindex="-1" role="option" unselectable="on" class="k-item', n = e.item, i = 0 !== e.index, r = e.selected;
                return i && e.newGroup && (t += " k-first"), r && (t += " k-state-selected"), t += '"' + (r ? ' aria-selected="true"' : "") + ' data-offset-index="' + e.index + '">', t += this.templates.template(n), i && e.newGroup && (t += '<div class="k-group">' + this.templates.groupTemplate(e.group) + "</div>"), t + "</li>"
            },
            _render: function () {
                var e, t, n, i, r = "", a = 0, o = 0, s = [], l = this.dataSource.view(), u = this.value(), c = this.isGrouped();
                if (c)for (a = 0; a < l.length; a++)for (t = l[a], n = !0, i = 0; i < t.items.length; i++)e = {
                    selected: this._selected(t.items[i], u),
                    item: t.items[i],
                    group: t.value,
                    newGroup: n,
                    index: o
                }, s[o] = e, o += 1, r += this._renderItem(e), n = !1; else for (a = 0; a < l.length; a++)e = {
                    selected: this._selected(l[a], u),
                    item: l[a],
                    index: a
                }, s[a] = e, r += this._renderItem(e);
                this._view = s, this.element[0].innerHTML = r, c && s.length && this._renderHeader()
            },
            _selected: function (e, t) {
                var n = !this.isFiltered() || "multiple" === this.options.selectable;
                return n && this._dataItemPosition(e, t) !== -1
            },
            setDSFilter: function (e) {
                this._lastDSFilter = I({}, e)
            },
            isFiltered: function () {
                return this._lastDSFilter || this.setDSFilter(this.dataSource.filter()), !o.data.Query.compareFilters(this.dataSource.filter(), this._lastDSFilter)
            },
            refresh: function (e) {
                var t, n = this, i = e && e.action, a = n.options.skipUpdateOnBind, o = "itemchange" === i;
                n.trigger("dataBinding"), n._angularItems("cleanup"), n._fixedHeader(), n._render(), n.bound(!0), o || "remove" === i ? (t = r(n._dataItems, e.items), t.changed.length && (o ? n.trigger("selectedItemChange", {items: t.changed}) : n.value(n._getValues(t.unchanged)))) : n.isFiltered() || n._skipUpdate ? (n.focus(0), n._skipUpdate && (n._skipUpdate = !1, n._selectedIndices = n._valueIndices(n._values, n._selectedIndices))) : a || i && "add" !== i || n.value(n._values), n._valueDeferred && n._valueDeferred.resolve(), n._angularItems("compile"), n.trigger("dataBound")
            },
            bound: function (e) {
                return e === t ? this._bound : void(this._bound = e)
            },
            isGrouped: function () {
                return (this.dataSource.group() || []).length
            }
        });
        s.plugin(V)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.fx", ["kendo.core"], e)
}(function () {
    return function (e, t) {
        function n(e) {
            return parseInt(e, 10)
        }

        function i(e, t) {
            return n(e.css(t))
        }

        function r(e) {
            var t = [];
            for (var n in e)t.push(n);
            return t
        }

        function a(e) {
            for (var t in e)E.indexOf(t) != -1 && O.indexOf(t) == -1 && delete e[t];
            return e
        }

        function o(e, t) {
            var n, i, r, a, o = [], s = {};
            for (i in t)n = i.toLowerCase(), a = w && E.indexOf(n) != -1, !v.hasHW3D && a && O.indexOf(n) == -1 ? delete t[i] : (r = t[i], a ? o.push(i + "(" + r + ")") : s[i] = r);
            return o.length && (s[K] = o.join(" ")), s
        }

        function s(e, t) {
            if (w) {
                var i = e.css(K);
                if (i == V)return "scale" == t ? 1 : 0;
                var r = i.match(new RegExp(t + "\\s*\\(([\\d\\w\\.]+)")), a = 0;
                return r ? a = n(r[1]) : (r = i.match(C) || [0, 0, 0, 0, 0], t = t.toLowerCase(), S.test(t) ? a = parseFloat(r[3] / r[2]) : "translatey" == t ? a = parseFloat(r[4] / r[2]) : "scale" == t ? a = parseFloat(r[2]) : "rotate" == t && (a = parseFloat(Math.atan2(r[2], r[1])))), a
            }
            return parseFloat(e.css(t))
        }

        function l(e) {
            return e.charAt(0).toUpperCase() + e.substring(1)
        }

        function u(e, t) {
            var n = ie.extend(t), i = n.prototype.directions;
            f[l(e)] = n, f.Element.prototype[e] = function (e, t, i, r) {
                return new n(this.element, e, t, i, r)
            }, h(i, function (t, i) {
                f.Element.prototype[e + l(i)] = function (e, t, r) {
                    return new n(this.element, i, e, t, r)
                }
            })
        }

        function c(e, t, n, i) {
            u(e, {
                directions: ae, startValue: function (e) {
                    return this._startValue = e, this
                }, endValue: function (e) {
                    return this._endValue = e, this
                }, shouldHide: function () {
                    return this._shouldHide
                }, prepare: function (e, r) {
                    var a, o, s = this, l = "out" === this._direction, u = s.element.data(t), c = !(isNaN(u) || u == n);
                    a = c ? u : "undefined" != typeof this._startValue ? this._startValue : l ? n : i, o = "undefined" != typeof this._endValue ? this._endValue : l ? i : n, this._reverse ? (e[t] = o, r[t] = a) : (e[t] = a, r[t] = o), s._shouldHide = r[t] === i
                }
            })
        }

        function d(e, t) {
            var n = p.directions[t].vertical, i = e[n ? B : R]() / 2 + "px";
            return se[t].replace("$size", i)
        }

        var p = window.kendo, f = p.effects, h = e.each, m = e.extend, g = e.proxy, v = p.support, _ = v.browser, w = v.transforms, b = v.transitions, y = {
            scale: 0,
            scalex: 0,
            scaley: 0,
            scale3d: 0
        }, k = {
            translate: 0,
            translatex: 0,
            translatey: 0,
            translate3d: 0
        }, x = "undefined" != typeof document.documentElement.style.zoom && !w, C = /matrix3?d?\s*\(.*,\s*([\d\.\-]+)\w*?,\s*([\d\.\-]+)\w*?,\s*([\d\.\-]+)\w*?,\s*([\d\.\-]+)\w*?/i, T = /^(-?[\d\.\-]+)?[\w\s]*,?\s*(-?[\d\.\-]+)?[\w\s]*/i, S = /translatex?$/i, D = /(zoom|fade|expand)(\w+)/, I = /(zoom|fade|expand)/, F = /[xy]$/i, E = ["perspective", "rotate", "rotatex", "rotatey", "rotatez", "rotate3d", "scale", "scalex", "scaley", "scalez", "scale3d", "skew", "skewx", "skewy", "translate", "translatex", "translatey", "translatez", "translate3d", "matrix", "matrix3d"], O = ["rotate", "scale", "scalex", "scaley", "skew", "skewx", "skewy", "translate", "translatex", "translatey", "matrix"], A = {
            rotate: "deg",
            scale: "",
            skew: "px",
            translate: "px"
        }, M = w.css, H = Math.round, z = "", P = "px", V = "none", L = "auto", R = "width", B = "height", N = "hidden", W = "origin", U = "abortId", q = "overflow", j = "translate", G = "position", Y = "completeCallback", $ = M + "transition", K = M + "transform", J = M + "backface-visibility", Q = M + "perspective", X = "1500px", Z = "perspective(" + X + ")", ee = {
            left: {
                reverse: "right",
                property: "left",
                transition: "translatex",
                vertical: !1,
                modifier: -1
            },
            right: {reverse: "left", property: "left", transition: "translatex", vertical: !1, modifier: 1},
            down: {reverse: "up", property: "top", transition: "translatey", vertical: !0, modifier: 1},
            up: {reverse: "down", property: "top", transition: "translatey", vertical: !0, modifier: -1},
            top: {reverse: "bottom"},
            bottom: {reverse: "top"},
            "in": {reverse: "out", modifier: -1},
            out: {reverse: "in", modifier: 1},
            vertical: {reverse: "vertical"},
            horizontal: {reverse: "horizontal"}
        };
        if (p.directions = ee, m(e.fn, {
                kendoStop: function (e, t) {
                    return b ? f.stopQueue(this, e || !1, t || !1) : this.stop(e, t)
                }
            }), w && !b) {
            h(O, function (t, n) {
                e.fn[n] = function (t) {
                    if ("undefined" == typeof t)return s(this, n);
                    var i = e(this)[0], r = n + "(" + t + A[n.replace(F, "")] + ")";
                    return i.style.cssText.indexOf(K) == -1 ? e(this).css(K, r) : i.style.cssText = i.style.cssText.replace(new RegExp(n + "\\(.*?\\)", "i"), r), this
                }, e.fx.step[n] = function (t) {
                    e(t.elem)[n](t.now)
                }
            });
            var te = e.fx.prototype.cur;
            e.fx.prototype.cur = function () {
                return O.indexOf(this.prop) != -1 ? parseFloat(e(this.elem)[this.prop]()) : te.apply(this, arguments)
            }
        }
        p.toggleClass = function (e, t, n, i) {
            return t && (t = t.split(" "), b && (n = m({
                exclusive: "all",
                duration: 400,
                ease: "ease-out"
            }, n), e.css($, n.exclusive + " " + n.duration + "ms " + n.ease), setTimeout(function () {
                e.css($, "").css(B)
            }, n.duration)), h(t, function (t, n) {
                e.toggleClass(n, i)
            })), e
        }, p.parseEffects = function (e, t) {
            var n = {};
            return "string" == typeof e ? h(e.split(" "), function (e, i) {
                var r = !I.test(i), a = i.replace(D, function (e, t, n) {
                    return t + ":" + n.toLowerCase()
                }), o = a.split(":"), s = o[1], l = {};
                o.length > 1 && (l.direction = t && r ? ee[s].reverse : s), n[o[0]] = l
            }) : h(e, function (e) {
                var i = this.direction;
                i && t && !I.test(e) && (this.direction = ee[i].reverse), n[e] = this
            }), n
        }, b && m(f, {
            transition: function (t, n, i) {
                var a, s, l = 0, u = t.data("keys") || [];
                i = m({duration: 200, ease: "ease-out", complete: null, exclusive: "all"}, i);
                var c = !1, d = function () {
                    c || (c = !0, s && (clearTimeout(s), s = null), t.removeData(U).dequeue().css($, "").css($), i.complete.call(t))
                };
                i.duration = e.fx ? e.fx.speeds[i.duration] || i.duration : i.duration, a = o(t, n), e.merge(u, r(a)), t.data("keys", e.unique(u)).height(), t.css($, i.exclusive + " " + i.duration + "ms " + i.ease).css($), t.css(a).css(K), b.event && (t.one(b.event, d), 0 !== i.duration && (l = 500)), s = setTimeout(d, i.duration + l), t.data(U, s), t.data(Y, d)
            }, stopQueue: function (e, t, n) {
                var i, r = e.data("keys"), a = !n && r, o = e.data(Y);
                return a && (i = p.getComputedStyles(e[0], r)), o && o(), a && e.css(i), e.removeData("keys").stop(t)
            }
        });
        var ne = p.Class.extend({
            init: function (e, t) {
                var n = this;
                n.element = e, n.effects = [], n.options = t, n.restore = []
            }, run: function (t) {
                var n, i, r, s, l, u, c = this, d = t.length, p = c.element, h = c.options, g = e.Deferred(), v = {}, _ = {};
                for (c.effects = t, g.then(e.proxy(c, "complete")), p.data("animating", !0), i = 0; i < d; i++)for (n = t[i], n.setReverse(h.reverse), n.setOptions(h), c.addRestoreProperties(n.restore), n.prepare(v, _), l = n.children(), r = 0, u = l.length; r < u; r++)l[r].duration(h.duration).run();
                for (var y in h.effects)m(_, h.effects[y].properties);
                for (p.is(":visible") || m(v, {display: p.data("olddisplay") || "block"}), w && !h.reset && (s = p.data("targetTransform"), s && (v = m(s, v))), v = o(p, v), w && !b && (v = a(v)), p.css(v).css(K), i = 0; i < d; i++)t[i].setup();
                return h.init && h.init(), p.data("targetTransform", _), f.animate(p, _, m({}, h, {complete: g.resolve})), g.promise()
            }, stop: function () {
                e(this.element).kendoStop(!0, !0)
            }, addRestoreProperties: function (e) {
                for (var t, n = this.element, i = 0, r = e.length; i < r; i++)t = e[i], this.restore.push(t), n.data(t) || n.data(t, n.css(t))
            }, restoreCallback: function () {
                for (var e = this.element, t = 0, n = this.restore.length; t < n; t++) {
                    var i = this.restore[t];
                    e.css(i, e.data(i))
                }
            }, complete: function () {
                var t = this, n = 0, i = t.element, r = t.options, a = t.effects, o = a.length;
                for (i.removeData("animating").dequeue(), r.hide && i.data("olddisplay", i.css("display")).hide(), this.restoreCallback(), x && !w && setTimeout(e.proxy(this, "restoreCallback"), 0); n < o; n++)a[n].teardown();
                r.completeCallback && r.completeCallback(i)
            }
        });
        f.promise = function (e, t) {
            var n, i, r = [], a = new ne(e, t), o = p.parseEffects(t.effects);
            t.effects = o;
            for (var s in o)n = f[l(s)], n && (i = new n(e, o[s].direction), r.push(i));
            r[0] ? a.run(r) : (e.is(":visible") || e.css({display: e.data("olddisplay") || "block"}).css("display"), t.init && t.init(), e.dequeue(), a.complete())
        }, m(f, {
            animate: function (n, r, o) {
                var s = o.transition !== !1;
                delete o.transition, b && "transition" in f && s ? f.transition(n, r, o) : w ? n.animate(a(r), {
                    queue: !1,
                    show: !1,
                    hide: !1,
                    duration: o.duration,
                    complete: o.complete
                }) : n.each(function () {
                    var n = e(this), a = {};
                    h(E, function (e, o) {
                        var s, l = r ? r[o] + " " : null;
                        if (l) {
                            var u = r;
                            if (o in y && r[o] !== t)s = l.match(T), w && m(u, {scale: +s[0]}); else if (o in k && r[o] !== t) {
                                var c = n.css(G), d = "absolute" == c || "fixed" == c;
                                n.data(j) || (d ? n.data(j, {
                                    top: i(n, "top") || 0,
                                    left: i(n, "left") || 0,
                                    bottom: i(n, "bottom"),
                                    right: i(n, "right")
                                }) : n.data(j, {top: i(n, "marginTop") || 0, left: i(n, "marginLeft") || 0}));
                                var p = n.data(j);
                                if (s = l.match(T)) {
                                    var f = o == j + "y" ? 0 : +s[1], h = o == j + "y" ? +s[1] : +s[2];
                                    d ? (isNaN(p.right) ? isNaN(f) || m(u, {left: p.left + f}) : isNaN(f) || m(u, {right: p.right - f}), isNaN(p.bottom) ? isNaN(h) || m(u, {top: p.top + h}) : isNaN(h) || m(u, {bottom: p.bottom - h})) : (isNaN(f) || m(u, {marginLeft: p.left + f}), isNaN(h) || m(u, {marginTop: p.top + h}))
                                }
                            }
                            !w && "scale" != o && o in u && delete u[o], u && m(a, u)
                        }
                    }), _.msie && delete a.scale, n.animate(a, {
                        queue: !1,
                        show: !1,
                        hide: !1,
                        duration: o.duration,
                        complete: o.complete
                    })
                })
            }
        }), f.animatedPromise = f.promise;
        var ie = p.Class.extend({
            init: function (e, t) {
                var n = this;
                n.element = e, n._direction = t, n.options = {}, n._additionalEffects = [], n.restore || (n.restore = [])
            },
            reverse: function () {
                return this._reverse = !0, this.run()
            },
            play: function () {
                return this._reverse = !1, this.run()
            },
            add: function (e) {
                return this._additionalEffects.push(e), this
            },
            direction: function (e) {
                return this._direction = e, this
            },
            duration: function (e) {
                return this._duration = e, this
            },
            compositeRun: function () {
                var e = this, t = new ne(e.element, {
                    reverse: e._reverse,
                    duration: e._duration
                }), n = e._additionalEffects.concat([e]);
                return t.run(n)
            },
            run: function () {
                if (this._additionalEffects && this._additionalEffects[0])return this.compositeRun();
                var t, n, i = this, r = i.element, s = 0, l = i.restore, u = l.length, c = e.Deferred(), d = {}, p = {}, h = i.children(), g = h.length;
                for (c.then(e.proxy(i, "_complete")), r.data("animating", !0), s = 0; s < u; s++)t = l[s], r.data(t) || r.data(t, r.css(t));
                for (s = 0; s < g; s++)h[s].duration(i._duration).run();
                return i.prepare(d, p), r.is(":visible") || m(d, {display: r.data("olddisplay") || "block"}), w && (n = r.data("targetTransform"), n && (d = m(n, d))), d = o(r, d), w && !b && (d = a(d)), r.css(d).css(K), i.setup(), r.data("targetTransform", p), f.animate(r, p, {
                    duration: i._duration,
                    complete: c.resolve
                }), c.promise()
            },
            stop: function () {
                var t = 0, n = this.children(), i = n.length;
                for (t = 0; t < i; t++)n[t].stop();
                return e(this.element).kendoStop(!0, !0), this
            },
            restoreCallback: function () {
                for (var e = this.element, t = 0, n = this.restore.length; t < n; t++) {
                    var i = this.restore[t];
                    e.css(i, e.data(i))
                }
            },
            _complete: function () {
                var t = this, n = t.element;
                n.removeData("animating").dequeue(), t.restoreCallback(), t.shouldHide() && n.data("olddisplay", n.css("display")).hide(), x && !w && setTimeout(e.proxy(t, "restoreCallback"), 0), t.teardown()
            },
            setOptions: function (e) {
                m(!0, this.options, e)
            },
            children: function () {
                return []
            },
            shouldHide: e.noop,
            setup: e.noop,
            prepare: e.noop,
            teardown: e.noop,
            directions: [],
            setReverse: function (e) {
                return this._reverse = e, this
            }
        }), re = ["left", "right", "up", "down"], ae = ["in", "out"];
        u("slideIn", {
            directions: re, divisor: function (e) {
                return this.options.divisor = e, this
            }, prepare: function (e, t) {
                var n, i = this, r = i.element, a = ee[i._direction], o = -a.modifier * (a.vertical ? r.outerHeight() : r.outerWidth()), s = o / (i.options && i.options.divisor || 1) + P, l = "0px";
                i._reverse && (n = e, e = t, t = n), w ? (e[a.transition] = s, t[a.transition] = l) : (e[a.property] = s, t[a.property] = l)
            }
        }), u("tile", {
            directions: re, init: function (e, t, n) {
                ie.prototype.init.call(this, e, t), this.options = {previous: n}
            }, previousDivisor: function (e) {
                return this.options.previousDivisor = e, this
            }, children: function () {
                var e = this, t = e._reverse, n = e.options.previous, i = e.options.previousDivisor || 1, r = e._direction, a = [p.fx(e.element).slideIn(r).setReverse(t)];
                return n && a.push(p.fx(n).slideIn(ee[r].reverse).divisor(i).setReverse(!t)), a
            }
        }), c("fade", "opacity", 1, 0), c("zoom", "scale", 1, .01), u("slideMargin", {
            prepare: function (e, t) {
                var n, i = this, r = i.element, a = i.options, o = r.data(W), s = a.offset, l = i._reverse;
                l || null !== o || r.data(W, parseFloat(r.css("margin-" + a.axis))), n = r.data(W) || 0, t["margin-" + a.axis] = l ? n : n + s
            }
        }), u("slideTo", {
            prepare: function (e, t) {
                var n = this, i = n.element, r = n.options, a = r.offset.split(","), o = n._reverse;
                w ? (t.translatex = o ? 0 : a[0], t.translatey = o ? 0 : a[1]) : (t.left = o ? 0 : a[0], t.top = o ? 0 : a[1]), i.css("left")
            }
        }), u("expand", {
            directions: ["horizontal", "vertical"], restore: [q], prepare: function (e, n) {
                var i = this, r = i.element, a = i.options, o = i._reverse, s = "vertical" === i._direction ? B : R, l = r[0].style[s], u = r.data(s), c = parseFloat(u || l), d = H(r.css(s, L)[s]());
                e.overflow = N, c = a && a.reset ? d || c : c || d, n[s] = (o ? 0 : c) + P, e[s] = (o ? c : 0) + P, u === t && r.data(s, l)
            }, shouldHide: function () {
                return this._reverse
            }, teardown: function () {
                var e = this, t = e.element, n = "vertical" === e._direction ? B : R, i = t.data(n);
                i != L && i !== z || setTimeout(function () {
                    t.css(n, L).css(n)
                }, 0)
            }
        });
        var oe = {position: "absolute", marginLeft: 0, marginTop: 0, scale: 1};
        u("transfer", {
            init: function (e, t) {
                this.element = e, this.options = {target: t}, this.restore = []
            }, setup: function () {
                this.element.appendTo(document.body)
            }, prepare: function (e, t) {
                var n = this, i = n.element, r = f.box(i), a = f.box(n.options.target), o = s(i, "scale"), l = f.fillScale(a, r), u = f.transformOrigin(a, r);
                m(e, oe), t.scale = 1, i.css(K, "scale(1)").css(K), i.css(K, "scale(" + o + ")"), e.top = r.top, e.left = r.left, e.transformOrigin = u.x + P + " " + u.y + P, n._reverse ? e.scale = l : t.scale = l
            }
        });
        var se = {
            top: "rect(auto auto $size auto)",
            bottom: "rect($size auto auto auto)",
            left: "rect(auto $size auto auto)",
            right: "rect(auto auto auto $size)"
        }, le = {
            top: {start: "rotatex(0deg)", end: "rotatex(180deg)"},
            bottom: {start: "rotatex(-180deg)", end: "rotatex(0deg)"},
            left: {start: "rotatey(0deg)", end: "rotatey(-180deg)"},
            right: {start: "rotatey(180deg)", end: "rotatey(0deg)"}
        };
        u("turningPage", {
            directions: re, init: function (e, t, n) {
                ie.prototype.init.call(this, e, t), this._container = n
            }, prepare: function (e, t) {
                var n = this, i = n._reverse, r = i ? ee[n._direction].reverse : n._direction, a = le[r];
                e.zIndex = 1, n._clipInHalf && (e.clip = d(n._container, p.directions[r].reverse)), e[J] = N, t[K] = Z + (i ? a.start : a.end), e[K] = Z + (i ? a.end : a.start)
            }, setup: function () {
                this._container.append(this.element)
            }, face: function (e) {
                return this._face = e, this
            }, shouldHide: function () {
                var e = this, t = e._reverse, n = e._face;
                return t && !n || !t && n
            }, clipInHalf: function (e) {
                return this._clipInHalf = e, this
            }, temporary: function () {
                return this.element.addClass("temp-page"), this
            }
        }), u("staticPage", {
            directions: re, init: function (e, t, n) {
                ie.prototype.init.call(this, e, t), this._container = n
            }, restore: ["clip"], prepare: function (e, t) {
                var n = this, i = n._reverse ? ee[n._direction].reverse : n._direction;
                e.clip = d(n._container, i), e.opacity = .999, t.opacity = 1
            }, shouldHide: function () {
                var e = this, t = e._reverse, n = e._face;
                return t && !n || !t && n
            }, face: function (e) {
                return this._face = e, this
            }
        }), u("pageturn", {
            directions: ["horizontal", "vertical"], init: function (e, t, n, i) {
                ie.prototype.init.call(this, e, t), this.options = {}, this.options.face = n, this.options.back = i
            }, children: function () {
                var e, t = this, n = t.options, i = "horizontal" === t._direction ? "left" : "top", r = p.directions[i].reverse, a = t._reverse, o = n.face.clone(!0).removeAttr("id"), s = n.back.clone(!0).removeAttr("id"), l = t.element;
                return a && (e = i, i = r, r = e), [p.fx(n.face).staticPage(i, l).face(!0).setReverse(a), p.fx(n.back).staticPage(r, l).setReverse(a), p.fx(o).turningPage(i, l).face(!0).clipInHalf(!0).temporary().setReverse(a), p.fx(s).turningPage(r, l).clipInHalf(!0).temporary().setReverse(a)]
            }, prepare: function (e, t) {
                e[Q] = X, e.transformStyle = "preserve-3d", e.opacity = .999, t.opacity = 1
            }, teardown: function () {
                this.element.find(".temp-page").remove()
            }
        }), u("flip", {
            directions: ["horizontal", "vertical"], init: function (e, t, n, i) {
                ie.prototype.init.call(this, e, t), this.options = {}, this.options.face = n, this.options.back = i
            }, children: function () {
                var e, t = this, n = t.options, i = "horizontal" === t._direction ? "left" : "top", r = p.directions[i].reverse, a = t._reverse, o = t.element;
                return a && (e = i, i = r, r = e), [p.fx(n.face).turningPage(i, o).face(!0).setReverse(a), p.fx(n.back).turningPage(r, o).setReverse(a)]
            }, prepare: function (e) {
                e[Q] = X, e.transformStyle = "preserve-3d"
            }
        });
        var ue = !v.mobileOS.android, ce = ".km-touch-scrollbar, .km-actionsheet-wrapper";
        u("replace", {
            _before: e.noop, _after: e.noop, init: function (t, n, i) {
                ie.prototype.init.call(this, t), this._previous = e(n), this._transitionClass = i
            }, duration: function () {
                throw new Error("The replace effect does not support duration setting; the effect duration may be customized through the transition class rule")
            }, beforeTransition: function (e) {
                return this._before = e, this
            }, afterTransition: function (e) {
                return this._after = e, this
            }, _both: function () {
                return e().add(this._element).add(this._previous)
            }, _containerClass: function () {
                var e = this._direction, t = "k-fx k-fx-start k-fx-" + this._transitionClass;
                return e && (t += " k-fx-" + e), this._reverse && (t += " k-fx-reverse"), t
            }, complete: function (t) {
                if (!(!this.deferred || t && e(t.target).is(ce))) {
                    var n = this.container;
                    n.removeClass("k-fx-end").removeClass(this._containerClass()).off(b.event, this.completeProxy), this._previous.hide().removeClass("k-fx-current"), this.element.removeClass("k-fx-next"), ue && n.css(q, ""), this.isAbsolute || this._both().css(G, ""), this.deferred.resolve(), delete this.deferred
                }
            }, run: function () {
                if (this._additionalEffects && this._additionalEffects[0])return this.compositeRun();
                var t, n = this, i = n.element, r = n._previous, a = i.parents().filter(r.parents()).first(), o = n._both(), s = e.Deferred(), l = i.css(G);
                return a.length || (a = i.parent()), this.container = a, this.deferred = s, this.isAbsolute = "absolute" == l, this.isAbsolute || o.css(G, "absolute"), ue && (t = a.css(q), a.css(q, "hidden")), b ? (i.addClass("k-fx-hidden"), a.addClass(this._containerClass()), this.completeProxy = e.proxy(this, "complete"), a.on(b.event, this.completeProxy), p.animationFrame(function () {
                    i.removeClass("k-fx-hidden").addClass("k-fx-next"), r.css("display", "").addClass("k-fx-current"), n._before(r, i), p.animationFrame(function () {
                        a.removeClass("k-fx-start").addClass("k-fx-end"), n._after(r, i)
                    })
                })) : this.complete(), s.promise()
            }, stop: function () {
                this.complete()
            }
        });
        var de = p.Class.extend({
            init: function () {
                var e = this;
                e._tickProxy = g(e._tick, e), e._started = !1
            }, tick: e.noop, done: e.noop, onEnd: e.noop, onCancel: e.noop, start: function () {
                this.enabled() && (this.done() ? this.onEnd() : (this._started = !0, p.animationFrame(this._tickProxy)))
            }, enabled: function () {
                return !0
            }, cancel: function () {
                this._started = !1, this.onCancel()
            }, _tick: function () {
                var e = this;
                e._started && (e.tick(), e.done() ? (e._started = !1, e.onEnd()) : p.animationFrame(e._tickProxy))
            }
        }), pe = de.extend({
            init: function (e) {
                var t = this;
                m(t, e), de.fn.init.call(t)
            }, done: function () {
                return this.timePassed() >= this.duration
            }, timePassed: function () {
                return Math.min(this.duration, new Date - this.startDate)
            }, moveTo: function (e) {
                var t = this, n = t.movable;
                t.initial = n[t.axis], t.delta = e.location - t.initial, t.duration = "number" == typeof e.duration ? e.duration : 300, t.tick = t._easeProxy(e.ease), t.startDate = new Date, t.start()
            }, _easeProxy: function (e) {
                var t = this;
                return function () {
                    t.movable.moveAxis(t.axis, e(t.timePassed(), t.initial, t.delta, t.duration))
                }
            }
        });
        m(pe, {
            easeOutExpo: function (e, t, n, i) {
                return e == i ? t + n : n * (-Math.pow(2, -10 * e / i) + 1) + t
            }, easeOutBack: function (e, t, n, i, r) {
                return r = 1.70158, n * ((e = e / i - 1) * e * ((r + 1) * e + r) + 1) + t
            }
        }), f.Animation = de, f.Transition = pe, f.createEffect = u, f.box = function (t) {
            t = e(t);
            var n = t.offset();
            return n.width = t.outerWidth(), n.height = t.outerHeight(), n
        }, f.transformOrigin = function (e, t) {
            var n = (e.left - t.left) * t.width / (t.width - e.width), i = (e.top - t.top) * t.height / (t.height - e.height);
            return {x: isNaN(n) ? 0 : n, y: isNaN(i) ? 0 : i}
        }, f.fillScale = function (e, t) {
            return Math.min(e.width / t.width, e.height / t.height)
        }, f.fitScale = function (e, t) {
            return Math.max(e.width / t.width, e.height / t.height)
        }
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.userevents", ["kendo.core"], e)
}(function () {
    return function (e, t) {
        function n(e, t) {
            var n = e.x.location, i = e.y.location, r = t.x.location, a = t.y.location, o = n - r, s = i - a;
            return {center: {x: (n + r) / 2, y: (i + a) / 2}, distance: Math.sqrt(o * o + s * s)}
        }

        function i(e) {
            var t, n, i, r = [], a = e.originalEvent, s = e.currentTarget, l = 0;
            if (e.api)r.push({
                id: 2,
                event: e,
                target: e.target,
                currentTarget: e.target,
                location: e,
                type: "api"
            }); else if (e.type.match(/touch/))for (n = a ? a.changedTouches : [], t = n.length; l < t; l++)i = n[l], r.push({
                location: i,
                event: e,
                target: i.target,
                currentTarget: s,
                id: i.identifier,
                type: "touch"
            }); else o.pointers || o.msPointers ? r.push({
                location: a,
                event: e,
                target: e.target,
                currentTarget: s,
                id: a.pointerId,
                type: "pointer"
            }) : r.push({id: 1, event: e, target: e.target, currentTarget: s, location: e, type: "mouse"});
            return r
        }

        function r(e) {
            for (var t = a.eventMap.up.split(" "), n = 0, i = t.length; n < i; n++)e(t[n])
        }

        var a = window.kendo, o = a.support, s = a.Class, l = a.Observable, u = e.now, c = e.extend, d = o.mobileOS, p = d && d.android, f = 800, h = o.browser.msie ? 5 : 0, m = "press", g = "hold", v = "select", _ = "start", w = "move", b = "end", y = "cancel", k = "tap", x = "release", C = "gesturestart", T = "gesturechange", S = "gestureend", D = "gesturetap", I = {
            api: 0,
            touch: 0,
            mouse: 9,
            pointer: 9
        }, F = !o.touch || o.mouseAndTouchPresent, E = s.extend({
            init: function (e, t) {
                var n = this;
                n.axis = e, n._updateLocationData(t), n.startLocation = n.location, n.velocity = n.delta = 0, n.timeStamp = u()
            }, move: function (e) {
                var t = this, n = e["page" + t.axis], i = u(), r = i - t.timeStamp || 1;
                !n && p || (t.delta = n - t.location, t._updateLocationData(e), t.initialDelta = n - t.startLocation, t.velocity = t.delta / r, t.timeStamp = i)
            }, _updateLocationData: function (e) {
                var t = this, n = t.axis;
                t.location = e["page" + n], t.client = e["client" + n], t.screen = e["screen" + n]
            }
        }), O = s.extend({
            init: function (e, t, n) {
                c(this, {
                    x: new E("X", n.location),
                    y: new E("Y", n.location),
                    type: n.type,
                    useClickAsTap: e.useClickAsTap,
                    threshold: e.threshold || I[n.type],
                    userEvents: e,
                    target: t,
                    currentTarget: n.currentTarget,
                    initialTouch: n.target,
                    id: n.id,
                    pressEvent: n,
                    _moved: !1,
                    _finished: !1
                })
            }, press: function () {
                this._holdTimeout = setTimeout(e.proxy(this, "_hold"), this.userEvents.minHold), this._trigger(m, this.pressEvent)
            }, _hold: function () {
                this._trigger(g, this.pressEvent)
            }, move: function (e) {
                var t = this;
                if (!t._finished) {
                    if (t.x.move(e.location), t.y.move(e.location), !t._moved) {
                        if (t._withinIgnoreThreshold())return;
                        if (A.current && A.current !== t.userEvents)return t.dispose();
                        t._start(e)
                    }
                    t._finished || t._trigger(w, e)
                }
            }, end: function (e) {
                this.endTime = u(), this._finished || (this._finished = !0, this._trigger(x, e), this._moved ? this._trigger(b, e) : this.useClickAsTap || this._trigger(k, e), clearTimeout(this._holdTimeout), this.dispose())
            }, dispose: function () {
                var t = this.userEvents, n = t.touches;
                this._finished = !0, this.pressEvent = null, clearTimeout(this._holdTimeout), n.splice(e.inArray(this, n), 1)
            }, skip: function () {
                this.dispose()
            }, cancel: function () {
                this.dispose()
            }, isMoved: function () {
                return this._moved
            }, _start: function (e) {
                clearTimeout(this._holdTimeout), this.startTime = u(), this._moved = !0, this._trigger(_, e)
            }, _trigger: function (e, t) {
                var n = this, i = t.event, r = {touch: n, x: n.x, y: n.y, target: n.target, event: i};
                n.userEvents.notify(e, r) && i.preventDefault()
            }, _withinIgnoreThreshold: function () {
                var e = this.x.initialDelta, t = this.y.initialDelta;
                return Math.sqrt(e * e + t * t) <= this.threshold
            }
        }), A = l.extend({
            init: function (t, n) {
                var i, s = this, u = a.guid();
                if (n = n || {}, i = s.filter = n.filter, s.threshold = n.threshold || h, s.minHold = n.minHold || f, s.touches = [], s._maxTouches = n.multiTouch ? 2 : 1, s.allowSelection = n.allowSelection, s.captureUpIfMoved = n.captureUpIfMoved, s.useClickAsTap = !n.fastTap && !o.delayedClick(), s.eventNS = u, t = e(t).handler(s), l.fn.init.call(s), c(s, {
                        element: t,
                        surface: e(n.global && F ? t[0].ownerDocument.documentElement : n.surface || t),
                        stopPropagation: n.stopPropagation,
                        pressed: !1
                    }), s.surface.handler(s).on(a.applyEventMap("move", u), "_move").on(a.applyEventMap("up cancel", u), "_end"), t.on(a.applyEventMap("down", u), i, "_start"), s.useClickAsTap && t.on(a.applyEventMap("click", u), i, "_click"), (o.pointers || o.msPointers) && (o.browser.version < 11 ? t.css("-ms-touch-action", "pinch-zoom double-tap-zoom") : t.css("touch-action", n.touchAction || "none")), n.preventDragEvent && t.on(a.applyEventMap("dragstart", u), a.preventDefault), t.on(a.applyEventMap("mousedown", u), i, {root: t}, "_select"), s.captureUpIfMoved && o.eventCapture) {
                    var d = s.surface[0], p = e.proxy(s.preventIfMoving, s);
                    r(function (e) {
                        d.addEventListener(e, p, !0)
                    })
                }
                s.bind([m, g, k, _, w, b, x, y, C, T, S, D, v], n)
            }, preventIfMoving: function (e) {
                this._isMoved() && e.preventDefault()
            }, destroy: function () {
                var e = this;
                if (!e._destroyed) {
                    if (e._destroyed = !0, e.captureUpIfMoved && o.eventCapture) {
                        var t = e.surface[0];
                        r(function (n) {
                            t.removeEventListener(n, e.preventIfMoving)
                        })
                    }
                    e.element.kendoDestroy(e.eventNS), e.surface.kendoDestroy(e.eventNS), e.element.removeData("handler"), e.surface.removeData("handler"), e._disposeAll(), e.unbind(), delete e.surface, delete e.element, delete e.currentTarget
                }
            }, capture: function () {
                A.current = this
            }, cancel: function () {
                this._disposeAll(), this.trigger(y)
            }, notify: function (e, t) {
                var i = this, r = i.touches;
                if (this._isMultiTouch()) {
                    switch (e) {
                        case w:
                            e = T;
                            break;
                        case b:
                            e = S;
                            break;
                        case k:
                            e = D
                    }
                    c(t, {touches: r}, n(r[0], r[1]))
                }
                return this.trigger(e, c(t, {type: e}))
            }, press: function (e, t, n) {
                this._apiCall("_start", e, t, n)
            }, move: function (e, t) {
                this._apiCall("_move", e, t)
            }, end: function (e, t) {
                this._apiCall("_end", e, t)
            }, _isMultiTouch: function () {
                return this.touches.length > 1
            }, _maxTouchesReached: function () {
                return this.touches.length >= this._maxTouches
            }, _disposeAll: function () {
                for (var e = this.touches; e.length > 0;)e.pop().dispose()
            }, _isMoved: function () {
                return e.grep(this.touches, function (e) {
                    return e.isMoved()
                }).length
            }, _select: function (e) {
                this.allowSelection && !this.trigger(v, {event: e}) || e.preventDefault()
            }, _start: function (t) {
                var n, r, a = this, o = 0, s = a.filter, l = i(t), u = l.length, c = t.which;
                if (!(c && c > 1 || a._maxTouchesReached()))for (A.current = null, a.currentTarget = t.currentTarget, a.stopPropagation && t.stopPropagation(); o < u && !a._maxTouchesReached(); o++)r = l[o], n = s ? e(r.currentTarget) : a.element, n.length && (r = new O(a, n, r), a.touches.push(r), r.press(), a._isMultiTouch() && a.notify("gesturestart", {}))
            }, _move: function (e) {
                this._eachTouch("move", e)
            }, _end: function (e) {
                this._eachTouch("end", e)
            }, _click: function (t) {
                var n = {
                    touch: {
                        initialTouch: t.target,
                        target: e(t.currentTarget),
                        endTime: u(),
                        x: {location: t.pageX, client: t.clientX},
                        y: {location: t.pageY, client: t.clientY}
                    }, x: t.pageX, y: t.pageY, target: e(t.currentTarget), event: t, type: "tap"
                };
                this.trigger("tap", n) && t.preventDefault()
            }, _eachTouch: function (e, t) {
                var n, r, a, o, s = this, l = {}, u = i(t), c = s.touches;
                for (n = 0; n < c.length; n++)r = c[n], l[r.id] = r;
                for (n = 0; n < u.length; n++)a = u[n], o = l[a.id], o && o[e](a)
            }, _apiCall: function (t, n, i, r) {
                this[t]({
                    api: !0,
                    pageX: n,
                    pageY: i,
                    clientX: n,
                    clientY: i,
                    target: e(r || this.element)[0],
                    stopPropagation: e.noop,
                    preventDefault: e.noop
                })
            }
        });
        A.defaultThreshold = function (e) {
            h = e
        }, A.minHold = function (e) {
            f = e
        }, a.getTouches = i, a.touchDelta = n, a.UserEvents = A
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.menu", ["kendo.popup"], e)
}(function () {
    return function (e, t) {
        function n(e, t) {
            return e = e.split(" ")[!t + 0] || e, e.replace("top", "up").replace("bottom", "down")
        }

        function i(e, t, n) {
            e = e.split(" ")[!t + 0] || e;
            var i = {
                origin: ["bottom", n ? "right" : "left"],
                position: ["top", n ? "right" : "left"]
            }, r = /left|right/.test(e);
            return r ? (i.origin = ["top", e], i.position[1] = l.directions[e].reverse) : (i.origin[0] = e, i.position[0] = l.directions[e].reverse), i.origin = i.origin.join(" "), i.position = i.position.join(" "), i
        }

        function r(t, n) {
            try {
                return e.contains(t, n)
            } catch (i) {
                return !1
            }
        }

        function a(t) {
            t = e(t), t.addClass("k-item").children(k).addClass(E), t.children("a").addClass(T).children(k).addClass(E), t.filter(":not([disabled])").addClass(q), t.filter(".k-separator").empty().append("&nbsp;"), t.filter("li[disabled]").addClass(Y).removeAttr("disabled").attr("aria-disabled", !0), t.filter("[role]").length || t.attr("role", "menuitem"), t.children("." + T).length || t.contents().filter(function () {
                return !(this.nodeName.match(b) || 3 == this.nodeType && !e.trim(this.nodeValue))
            }).wrapAll("<span class='" + T + "'/>"), o(t), s(t)
        }

        function o(t) {
            t = e(t), t.find("> .k-link > [class*=k-i-arrow]:not(.k-sprite)").remove(), t.filter(":has(.k-menu-group)").children(".k-link:not(:has([class*=k-i-arrow]:not(.k-sprite)))").each(function () {
                var t = e(this), n = t.parent().parent();
                t.append("<span class='k-icon " + (n.hasClass(C + "-horizontal") ? "k-i-arrow-s" : "k-i-arrow-e") + "'/>")
            })
        }

        function s(t) {
            t = e(t), t.filter(".k-first:not(:first-child)").removeClass(F), t.filter(".k-last:not(:last-child)").removeClass(S), t.filter(":first-child").addClass(F), t.filter(":last-child").addClass(S)
        }

        var l = window.kendo, u = l.ui, c = l._activeElement, d = l.support.touch && l.support.mobileOS, p = "mousedown", f = "click", h = e.extend, m = e.proxy, g = e.each, v = l.template, _ = l.keys, w = u.Widget, b = /^(ul|a|div)$/i, y = ".kendoMenu", k = "img", x = "open", C = "k-menu", T = "k-link", S = "k-last", D = "close", I = "timer", F = "k-first", E = "k-image", O = "select", A = "zIndex", M = "activate", H = "deactivate", z = "touchstart" + y + " MSPointerDown" + y + " pointerdown" + y, P = l.support.pointers, V = l.support.msPointers, L = V || P, R = P ? "pointerover" : V ? "MSPointerOver" : "mouseenter", B = P ? "pointerout" : V ? "MSPointerOut" : "mouseleave", N = d || L, W = e(document.documentElement), U = "kendoPopup", q = "k-state-default", j = "k-state-hover", G = "k-state-focused", Y = "k-state-disabled", $ = "k-state-selected", K = ".k-menu", J = ".k-menu-group", Q = J + ",.k-animation-container", X = ":not(.k-list) > .k-item", Z = ".k-item.k-state-disabled", ee = ".k-item:not(.k-state-disabled)", te = ".k-item:not(.k-state-disabled) > .k-link", ne = ":not(.k-item.k-separator)", ie = ne + ":eq(0)", re = ne + ":last", ae = "> div:not(.k-animation-container,.k-list-container)", oe = {
            2: 1,
            touch: 1
        }, se = {
            content: v("<div #= contentCssAttributes(item) # tabindex='-1'>#= content(item) #</div>"),
            group: v("<ul class='#= groupCssClass(group) #'#= groupAttributes(group) # role='menu' aria-hidden='true'>#= renderItems(data) #</ul>"),
            itemWrapper: v("<#= tag(item) # class='#= textClass(item) #'#= textAttributes(item) #>#= image(data) ##= sprite(item) ##= text(item) ##= arrow(data) #</#= tag(item) #>"),
            item: v("<li class='#= wrapperCssClass(group, item) #' #= itemCssAttributes(item) # role='menuitem'  #=item.items ? \"aria-haspopup='true'\": \"\"##=item.enabled === false ? \"aria-disabled='true'\" : ''#>#= itemWrapper(data) ## if (item.items) { ##= subGroup({ items: item.items, menu: menu, group: { expanded: item.expanded } }) ## } else if (item.content || item.contentUrl) { ##= renderContent(data) ## } #</li>"),
            image: v("<img #= imageCssAttributes(item) # alt='' src='#= item.imageUrl #' />"),
            arrow: v("<span class='#= arrowClass(item, group) #'></span>"),
            sprite: v("<span class='k-sprite #= spriteCssClass #'></span>"),
            empty: v("")
        }, le = {
            wrapperCssClass: function (e, t) {
                var n = "k-item", i = t.index;
                return n += t.enabled === !1 ? " k-state-disabled" : " k-state-default", e.firstLevel && 0 === i && (n += " k-first"), i == e.length - 1 && (n += " k-last"), t.cssClass && (n += " " + t.cssClass), t.attr && t.attr.hasOwnProperty("class") && (n += " " + t.attr["class"]),
                t.selected && (n += " " + $), n
            }, itemCssAttributes: function (e) {
                var t = "", n = e.attr || {};
                for (var i in n)n.hasOwnProperty(i) && "class" !== i && (t += i + '="' + n[i] + '" ');
                return t
            }, imageCssAttributes: function (e) {
                var t = "", n = e.imageAttr || {};
                n["class"] ? n["class"] += " " + E : n["class"] = E;
                for (var i in n)n.hasOwnProperty(i) && (t += i + '="' + n[i] + '" ');
                return t
            }, contentCssAttributes: function (e) {
                var t = "", n = e.contentAttr || {}, i = "k-content k-group k-menu-group";
                n["class"] ? n["class"] += " " + i : n["class"] = i;
                for (var r in n)n.hasOwnProperty(r) && (t += r + '="' + n[r] + '" ');
                return t
            }, textClass: function () {
                return T
            }, textAttributes: function (e) {
                return e.url ? " href='" + e.url + "'" : ""
            }, arrowClass: function (e, t) {
                var n = "k-icon";
                return n += t.horizontal ? " k-i-arrow-s" : " k-i-arrow-e"
            }, text: function (e) {
                return e.encoded === !1 ? e.text : l.htmlEncode(e.text)
            }, tag: function (e) {
                return e.url ? "a" : "span"
            }, groupAttributes: function (e) {
                return e.expanded !== !0 ? " style='display:none'" : ""
            }, groupCssClass: function () {
                return "k-group k-menu-group"
            }, content: function (e) {
                return e.content ? e.content : "&nbsp;"
            }
        }, ue = w.extend({
            init: function (t, n) {
                var i = this;
                w.fn.init.call(i, t, n), t = i.wrapper = i.element, n = i.options, i._initData(n), i._updateClasses(), i._animations(n), i.nextItemZIndex = 100, i._tabindex(), i._focusProxy = m(i._focusHandler, i), t.on(z, ee, i._focusProxy).on(f + y, Z, !1).on(f + y, ee, m(i._click, i)).on("keydown" + y, m(i._keydown, i)).on("focus" + y, m(i._focus, i)).on("focus" + y, ".k-content", m(i._focus, i)).on(z + " " + p + y, ".k-content", m(i._preventClose, i)).on("blur" + y, m(i._removeHoverItem, i)).on("blur" + y, "[tabindex]", m(i._checkActiveElement, i)).on(R + y, ee, m(i._mouseenter, i)).on(B + y, ee, m(i._mouseleave, i)).on(R + y + " " + B + y + " " + p + y + " " + f + y, te, m(i._toggleHover, i)), n.openOnClick && (i.clicked = !1, i._documentClickHandler = m(i._documentClick, i), e(document).click(i._documentClickHandler)), t.attr("role", "menubar"), t[0].id && (i._ariaId = l.format("{0}_mn_active", t[0].id)), l.notify(i)
            },
            events: [x, D, M, H, O],
            options: {
                name: "Menu",
                animation: {open: {duration: 200}, close: {duration: 100}},
                orientation: "horizontal",
                direction: "default",
                openOnClick: !1,
                closeOnClick: !0,
                hoverDelay: 100,
                popupCollision: t
            },
            _initData: function (e) {
                var t = this;
                e.dataSource && (t.angular("cleanup", function () {
                    return {elements: t.element.children()}
                }), t.element.empty(), t.append(e.dataSource, t.element), t.angular("compile", function () {
                    return {elements: t.element.children()}
                }))
            },
            setOptions: function (e) {
                var t = this.options.animation;
                this._animations(e), e.animation = h(!0, t, e.animation), "dataSource" in e && this._initData(e), this._updateClasses(), w.fn.setOptions.call(this, e)
            },
            destroy: function () {
                var t = this;
                w.fn.destroy.call(t), t.element.off(y), t._documentClickHandler && e(document).unbind("click", t._documentClickHandler), l.destroy(t.element)
            },
            enable: function (e, t) {
                return this._toggleDisabled(e, t !== !1), this
            },
            disable: function (e) {
                return this._toggleDisabled(e, !1), this
            },
            append: function (e, t) {
                t = this.element.find(t);
                var n = this._insert(e, t, t.length ? t.find("> .k-menu-group, > .k-animation-container > .k-menu-group") : null);
                return g(n.items, function () {
                    n.group.append(this), o(this)
                }), o(t), s(n.group.find(".k-first, .k-last").add(n.items)), this
            },
            insertBefore: function (e, t) {
                t = this.element.find(t);
                var n = this._insert(e, t, t.parent());
                return g(n.items, function () {
                    t.before(this), o(this), s(this)
                }), s(t), this
            },
            insertAfter: function (e, t) {
                t = this.element.find(t);
                var n = this._insert(e, t, t.parent());
                return g(n.items, function () {
                    t.after(this), o(this), s(this)
                }), s(t), this
            },
            _insert: function (t, n, i) {
                var r, o, s = this;
                n && n.length || (i = s.element);
                var l = e.isPlainObject(t), u = {
                    firstLevel: i.hasClass(C),
                    horizontal: i.hasClass(C + "-horizontal"),
                    expanded: !0,
                    length: i.children().length
                };
                return n && !i.length && (i = e(ue.renderGroup({group: u})).appendTo(n)), l || e.isArray(t) ? r = e(e.map(l ? [t] : t, function (t, n) {
                    return "string" == typeof t ? e(t).get() : e(ue.renderItem({
                        group: u,
                        item: h(t, {index: n})
                    })).get()
                })) : (r = "string" == typeof t && "<" != t.charAt(0) ? s.element.find(t) : e(t), o = r.find("> ul").addClass("k-menu-group").attr("role", "menu"), r = r.filter("li"), r.add(o.find("> li")).each(function () {
                    a(this)
                })), {items: r, group: i}
            },
            remove: function (e) {
                e = this.element.find(e);
                var t = this, n = e.parentsUntil(t.element, X), i = e.parent("ul:not(.k-menu)");
                if (e.remove(), i && !i.children(X).length) {
                    var r = i.parent(".k-animation-container");
                    r.length ? r.remove() : i.remove()
                }
                return n.length && (n = n.eq(0), o(n), s(n)), t
            },
            open: function (r) {
                var a = this, o = a.options, s = "horizontal" == o.orientation, u = o.direction, c = l.support.isRtl(a.wrapper);
                return r = a.element.find(r), /^(top|bottom|default)$/.test(u) && (u = c ? s ? (u + " left").replace("default", "bottom") : "left" : s ? (u + " right").replace("default", "bottom") : "right"), r.siblings().find(">.k-popup:visible,>.k-animation-container>.k-popup:visible").each(function () {
                    var t = e(this).data("kendoPopup");
                    t && t.close()
                }), r.each(function () {
                    var r = e(this);
                    clearTimeout(r.data(I)), r.data(I, setTimeout(function () {
                        var p, f = r.find(".k-menu-group:first:hidden");
                        if (f[0] && a._triggerEvent({item: r[0], type: x}) === !1) {
                            if (!f.find(".k-menu-group")[0] && f.children(".k-item").length > 1) {
                                var m = e(window).height(), g = function () {
                                    f.css({
                                        maxHeight: m - (f.outerHeight() - f.height()) - l.getShadows(f).bottom,
                                        overflow: "auto"
                                    })
                                };
                                l.support.browser.msie && l.support.browser.version <= 7 ? setTimeout(g, 0) : g()
                            } else f.css({maxHeight: "", overflow: ""});
                            r.data(A, r.css(A)), r.css(A, a.nextItemZIndex++), p = f.data(U);
                            var v = r.parent().hasClass(C), _ = v && s, w = i(u, v, c), b = o.animation.open.effects, y = b !== t ? b : "slideIn:" + n(u, v);
                            p ? (p = f.data(U), p.options.origin = w.origin, p.options.position = w.position, p.options.animation.open.effects = y) : p = f.kendoPopup({
                                activate: function () {
                                    a._triggerEvent({item: this.wrapper.parent(), type: M})
                                },
                                deactivate: function (e) {
                                    e.sender.element.removeData("targetTransform").css({opacity: ""}), a._triggerEvent({
                                        item: this.wrapper.parent(),
                                        type: H
                                    })
                                },
                                origin: w.origin,
                                position: w.position,
                                collision: o.popupCollision !== t ? o.popupCollision : _ ? "fit" : "fit flip",
                                anchor: r,
                                appendTo: r,
                                animation: {open: h(!0, {effects: y}, o.animation.open), close: o.animation.close},
                                close: function (e) {
                                    var t = e.sender.wrapper.parent();
                                    a._triggerEvent({
                                        item: t[0],
                                        type: D
                                    }) ? e.preventDefault() : (t.css(A, t.data(A)), t.removeData(A), d && (t.removeClass(j), a._removeHoverItem()))
                                }
                            }).data(U), f.removeAttr("aria-hidden"), p.open()
                        }
                    }, a.options.hoverDelay))
                }), a
            },
            close: function (t, n) {
                var i = this, r = i.element;
                return t = r.find(t), t.length || (t = r.find(">.k-item")), t.each(function () {
                    var t = e(this);
                    !n && i._isRootItem(t) && (i.clicked = !1), clearTimeout(t.data(I)), t.data(I, setTimeout(function () {
                        var e = t.find(".k-menu-group:not(.k-list-container):not(.k-calendar-container):first:visible").data(U);
                        e && (e.close(), e.element.attr("aria-hidden", !0))
                    }, i.options.hoverDelay))
                }), i
            },
            _toggleDisabled: function (t, n) {
                this.element.find(t).each(function () {
                    e(this).toggleClass(q, n).toggleClass(Y, !n).attr("aria-disabled", !n)
                })
            },
            _toggleHover: function (t) {
                var n = e(l.eventTarget(t) || t.target).closest(X), i = t.type == R || p.indexOf(t.type) !== -1;
                n.parents("li." + Y).length || n.toggleClass(j, i || "mousedown" == t.type || "click" == t.type), this._removeHoverItem()
            },
            _preventClose: function () {
                this.options.closeOnClick || (this._closurePrevented = !0)
            },
            _checkActiveElement: function (t) {
                var n = this, i = e(t ? t.currentTarget : this._hoverItem()), a = n._findRootParent(i)[0];
                this._closurePrevented || setTimeout(function () {
                    document.hasFocus() && (r(a, l._activeElement()) || !t || r(a, t.currentTarget)) || n.close(a)
                }, 0), this._closurePrevented = !1
            },
            _removeHoverItem: function () {
                var e = this._hoverItem();
                e && e.hasClass(G) && (e.removeClass(G), this._oldHoverItem = null)
            },
            _updateClasses: function () {
                var e, t = this.element, n = ".k-menu-init div ul";
                t.removeClass("k-menu-horizontal k-menu-vertical"), t.addClass("k-widget k-reset k-header k-menu-init " + C).addClass(C + "-" + this.options.orientation), t.find("li > ul").filter(function () {
                    return !l.support.matchesSelector.call(this, n)
                }).addClass("k-group k-menu-group").attr("role", "menu").attr("aria-hidden", t.is(":visible")).end().find("li > div").addClass("k-content").attr("tabindex", "-1"), e = t.find("> li,.k-menu-group > li"), t.removeClass("k-menu-init"), e.each(function () {
                    a(this)
                })
            },
            _mouseenter: function (t) {
                var n = this, i = e(t.currentTarget), a = i.children(".k-animation-container").length || i.children(J).length;
                t.delegateTarget == i.parents(K)[0] && (n.options.openOnClick && !n.clicked || d || (P || V) && t.originalEvent.pointerType in oe && n._isRootItem(i.closest(X)) || !r(t.currentTarget, t.relatedTarget) && a && n.open(i), (n.options.openOnClick && n.clicked || N) && i.siblings().each(m(function (e, t) {
                    n.close(t, !0)
                }, n)))
            },
            _mouseleave: function (t) {
                var n = this, i = e(t.currentTarget), a = i.children(".k-animation-container").length || i.children(J).length;
                return i.parentsUntil(".k-animation-container", ".k-list-container,.k-calendar-container")[0] ? void t.stopImmediatePropagation() : void(n.options.openOnClick || d || (P || V) && t.originalEvent.pointerType in oe || r(t.currentTarget, t.relatedTarget || t.target) || !a || r(t.currentTarget, l._activeElement()) || n.close(i))
            },
            _click: function (t) {
                var n, i, r, a = this, o = a.options, s = e(l.eventTarget(t)), u = s[0] ? s[0].nodeName.toUpperCase() : "", c = "INPUT" == u || "SELECT" == u || "BUTTON" == u || "LABEL" == u, d = s.closest("." + T), p = s.closest(X), f = d.attr("href"), h = s.attr("href"), m = e("<a href='#' />").attr("href"), g = !!f && f !== m, v = g && !!f.match(/^#/), _ = !!h && h !== m, w = o.openOnClick && r && a._isRootItem(p);
                if (!s.closest(ae, p[0]).length) {
                    if (p.hasClass(Y))return void t.preventDefault();
                    if (t.handled || !a._triggerEvent({
                            item: p[0],
                            type: O
                        }) || c || t.preventDefault(), t.handled = !0, i = p.children(Q), r = i.is(":visible"), o.closeOnClick && (!g || v) && (!i.length || w))return p.removeClass(j).css("height"), a._oldHoverItem = a._findRootParent(p), a.close(d.parentsUntil(a.element, X)), a.clicked = !1, void("MSPointerUp".indexOf(t.type) != -1 && t.preventDefault());
                    g && t.enterKey && d[0].click(), (a._isRootItem(p) && o.openOnClick || l.support.touch || (P || V) && a._isRootItem(p.closest(X))) && (g || c || _ || t.preventDefault(), a.clicked = !0, n = i.is(":visible") ? D : x, (o.closeOnClick || n != D) && a[n](p))
                }
            },
            _documentClick: function (e) {
                r(this.element[0], e.target) || (this.clicked = !1)
            },
            _focus: function (t) {
                var n = this, i = t.target, r = n._hoverItem(), a = c();
                return i == n.wrapper[0] || e(i).is(":kendoFocusable") ? void(a === t.currentTarget && (r.length ? n._moveHover([], r) : n._oldHoverItem || n._moveHover([], n.wrapper.children().first()))) : (t.stopPropagation(), e(i).closest(".k-content").closest(".k-menu-group").closest(".k-item").addClass(G), void n.wrapper.focus())
            },
            _keydown: function (e) {
                var t, n, i, r = this, a = e.keyCode, o = r._oldHoverItem, s = l.support.isRtl(r.wrapper);
                if (e.target == e.currentTarget || a == _.ESC) {
                    if (o || (o = r._oldHoverItem = r._hoverItem()), n = r._itemBelongsToVertival(o), i = r._itemHasChildren(o), a == _.RIGHT)t = r[s ? "_itemLeft" : "_itemRight"](o, n, i); else if (a == _.LEFT)t = r[s ? "_itemRight" : "_itemLeft"](o, n, i); else if (a == _.DOWN)t = r._itemDown(o, n, i); else if (a == _.UP)t = r._itemUp(o, n, i); else if (a == _.ESC)t = r._itemEsc(o, n); else if (a == _.ENTER || a == _.SPACEBAR)t = o.children(".k-link"), t.length > 0 && (r._click({
                        target: t[0],
                        preventDefault: function () {
                        },
                        enterKey: !0
                    }), r._moveHover(o, r._findRootParent(o))); else if (a == _.TAB)return t = r._findRootParent(o), r._moveHover(o, t), void r._checkActiveElement();
                    t && t[0] && (e.preventDefault(), e.stopPropagation())
                }
            },
            _hoverItem: function () {
                return this.wrapper.find(".k-item.k-state-hover,.k-item.k-state-focused").filter(":visible")
            },
            _itemBelongsToVertival: function (e) {
                var t = this.wrapper.hasClass("k-menu-vertical");
                return e.length ? e.parent().hasClass("k-menu-group") || t : t
            },
            _itemHasChildren: function (e) {
                return !!e.length && e.children("ul.k-menu-group, div.k-animation-container").length > 0
            },
            _moveHover: function (t, n) {
                var i = this, r = i._ariaId;
                t.length && n.length && t.removeClass(G), n.length && (n[0].id && (r = n[0].id), n.addClass(G), i._oldHoverItem = n, r && (i.element.removeAttr("aria-activedescendant"), e("#" + r).removeAttr("id"), n.attr("id", r), i.element.attr("aria-activedescendant", r)))
            },
            _findRootParent: function (e) {
                return this._isRootItem(e) ? e : e.parentsUntil(K, "li.k-item").last()
            },
            _isRootItem: function (e) {
                return e.parent().hasClass(C)
            },
            _itemRight: function (e, t, n) {
                var i, r, a = this;
                if (!e.hasClass(Y))return t ? n ? (a.open(e), i = e.find(".k-menu-group").children().first()) : "horizontal" == a.options.orientation && (r = a._findRootParent(e), a.close(r), i = r.nextAll(ie)) : (i = e.nextAll(ie), i.length || (i = e.prevAll(re))), i && !i.length ? i = a.wrapper.children(".k-item").first() : i || (i = []), a._moveHover(e, i), i
            },
            _itemLeft: function (e, t) {
                var n, i = this;
                return t ? (n = e.parent().closest(".k-item"), i.close(n), i._isRootItem(n) && "horizontal" == i.options.orientation && (n = n.prevAll(ie))) : (n = e.prevAll(ie), n.length || (n = e.nextAll(re))), n.length || (n = i.wrapper.children(".k-item").last()), i._moveHover(e, n), n
            },
            _itemDown: function (e, t, n) {
                var i, r = this;
                if (t)i = e.nextAll(ie); else {
                    if (!n || e.hasClass(Y))return;
                    r.open(e), i = e.find(".k-menu-group").children().first()
                }
                return !i.length && e.length ? i = e.parent().children().first() : e.length || (i = r.wrapper.children(".k-item").first()), r._moveHover(e, i), i
            },
            _itemUp: function (e, t) {
                var n, i = this;
                if (t)return n = e.prevAll(ie), !n.length && e.length ? n = e.parent().children().last() : e.length || (n = i.wrapper.children(".k-item").last()), i._moveHover(e, n), n
            },
            _itemEsc: function (e, t) {
                var n, i = this;
                return t ? (n = e.parent().closest(".k-item"), i.close(n), i._moveHover(e, n), n) : e
            },
            _triggerEvent: function (e) {
                var t = this;
                return t.trigger(e.type, {type: e.type, item: e.item})
            },
            _focusHandler: function (t) {
                var n = this, i = e(l.eventTarget(t)).closest(X);
                setTimeout(function () {
                    n._moveHover([], i), i.children(".k-content")[0] && i.parent().closest(".k-item").removeClass(G)
                }, 200)
            },
            _animations: function (e) {
                e && "animation" in e && !e.animation && (e.animation = {
                    open: {effects: {}},
                    close: {hide: !0, effects: {}}
                })
            }
        });
        h(ue, {
            renderItem: function (e) {
                e = h({menu: {}, group: {}}, e);
                var t = se.empty, n = e.item;
                return se.item(h(e, {
                    image: n.imageUrl ? se.image : t,
                    sprite: n.spriteCssClass ? se.sprite : t,
                    itemWrapper: se.itemWrapper,
                    renderContent: ue.renderContent,
                    arrow: n.items || n.content ? se.arrow : t,
                    subGroup: ue.renderGroup
                }, le))
            }, renderGroup: function (e) {
                return se.group(h({
                    renderItems: function (e) {
                        for (var t = "", n = 0, i = e.items, r = i ? i.length : 0, a = h({length: r}, e.group); n < r; n++)t += ue.renderItem(h(e, {
                            group: a,
                            item: h({index: n}, i[n])
                        }));
                        return t
                    }
                }, e, le))
            }, renderContent: function (e) {
                return se.content(h(e, le))
            }
        });
        var ce = ue.extend({
            init: function (t, n) {
                var i = this;
                ue.fn.init.call(i, t, n), i._marker = l.guid().substring(0, 8), i.target = e(i.options.target), i._popup(), i._wire()
            },
            options: {
                name: "ContextMenu",
                filter: null,
                showOn: "contextmenu",
                orientation: "vertical",
                alignToAnchor: !1,
                target: "body"
            },
            events: [x, D, M, H, O],
            setOptions: function (t) {
                var n = this;
                ue.fn.setOptions.call(n, t), n.target.off(n.showOn + y + n._marker, n._showProxy), n.userEvents && n.userEvents.destroy(), n.target = e(n.options.target), t.orientation && n.popup.wrapper[0] && n.popup.element.unwrap(), n._wire(), ue.fn.setOptions.call(this, t)
            },
            destroy: function () {
                var e = this;
                e.target.off(e.options.showOn + y + e._marker), W.off(l.support.mousedown + y + e._marker, e._closeProxy), e.userEvents && e.userEvents.destroy(), ue.fn.destroy.call(e)
            },
            open: function (n, i) {
                var a = this;
                return n = e(n)[0], r(a.element[0], e(n)[0]) ? ue.fn.open.call(a, n) : a._triggerEvent({
                    item: a.element,
                    type: x
                }) === !1 && (a.popup.visible() && a.options.filter && (a.popup.close(!0), a.popup.element.kendoStop(!0)), i !== t ? (a.popup.wrapper.hide(), a.popup.open(n, i)) : (a.popup.options.anchor = (n ? n : a.popup.anchor) || a.target, a.popup.element.kendoStop(!0), a.popup.open()), W.off(a.popup.downEvent, a.popup._mousedownProxy), W.on(l.support.mousedown + y + a._marker, a._closeProxy)), a
            },
            close: function () {
                var t = this;
                r(t.element[0], e(arguments[0])[0]) ? ue.fn.close.call(t, arguments[0]) : t.popup.visible() && t._triggerEvent({
                    item: t.element,
                    type: D
                }) === !1 && (t.popup.close(), W.off(l.support.mousedown + y, t._closeProxy), t.unbind(O, t._closeTimeoutProxy))
            },
            _showHandler: function (e) {
                var t, n = e, i = this, a = i.options;
                e.event && (n = e.event, n.pageX = e.x.location, n.pageY = e.y.location), r(i.element[0], e.relatedTarget || e.target) || (i._eventOrigin = n, n.preventDefault(), n.stopImmediatePropagation(), i.element.find("." + G).removeClass(G), (a.filter && l.support.matchesSelector.call(n.currentTarget, a.filter) || !a.filter) && (a.alignToAnchor ? (i.popup.options.anchor = n.currentTarget, i.open(n.currentTarget)) : (i.popup.options.anchor = n.currentTarget, i._targetChild ? (t = i.target.offset(), i.open(n.pageX - t.left, n.pageY - t.top)) : i.open(n.pageX, n.pageY))))
            },
            _closeHandler: function (t) {
                var n = this, i = e(t.relatedTarget || t.target), a = i.closest(n.target.selector)[0] == n.target[0], o = i.closest(ee).children(Q), s = r(n.element[0], i[0]);
                n._eventOrigin = t;
                var l = 3 !== t.which;
                n.popup.visible() && (l && a || !a) && (n.options.closeOnClick && !o[0] && s || !s) && (s ? (this.unbind(O, this._closeTimeoutProxy), n.bind(O, n._closeTimeoutProxy)) : n.close())
            },
            _wire: function () {
                var e = this, t = e.options, n = e.target;
                e._showProxy = m(e._showHandler, e), e._closeProxy = m(e._closeHandler, e), e._closeTimeoutProxy = m(e.close, e), n[0] && (l.support.mobileOS && "contextmenu" == t.showOn ? (e.userEvents = new l.UserEvents(n, {
                    filter: t.filter,
                    allowSelection: !1
                }), n.on(t.showOn + y + e._marker, !1), e.userEvents.bind("hold", e._showProxy)) : t.filter ? n.on(t.showOn + y + e._marker, t.filter, e._showProxy) : n.on(t.showOn + y + e._marker, e._showProxy))
            },
            _triggerEvent: function (n) {
                var i = this, r = e(i.popup.options.anchor)[0], a = i._eventOrigin;
                return i._eventOrigin = t, i.trigger(n.type, h({
                    type: n.type,
                    item: n.item || this.element[0],
                    target: r
                }, a ? {event: a} : {}))
            },
            _popup: function () {
                var e = this;
                e._triggerProxy = m(e._triggerEvent, e), e.popup = e.element.addClass("k-context-menu").kendoPopup({
                    anchor: e.target || "body",
                    copyAnchorStyles: e.options.copyAnchorStyles,
                    collision: e.options.popupCollision || "fit",
                    animation: e.options.animation,
                    activate: e._triggerProxy,
                    deactivate: e._triggerProxy
                }).data("kendoPopup"), e._targetChild = r(e.target[0], e.popup.element[0])
            }
        });
        u.plugin(ue), u.plugin(ce)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.draganddrop", ["kendo.core", "kendo.userevents"], e)
}(function () {
    return function (e, t) {
        function n(t, n) {
            try {
                return e.contains(t, n) || t == n
            } catch (i) {
                return !1
            }
        }

        function i(e, t) {
            return parseInt(e.css(t), 10) || 0
        }

        function r(e, t) {
            return Math.min(Math.max(e, t.min), t.max)
        }

        function a(e, t) {
            var n = C(e), r = n.left + i(e, "borderLeftWidth") + i(e, "paddingLeft"), a = n.top + i(e, "borderTopWidth") + i(e, "paddingTop"), o = r + e.width() - t.outerWidth(!0), s = a + e.height() - t.outerHeight(!0);
            return {x: {min: r, max: o}, y: {min: a, max: s}}
        }

        function o(n, i, r) {
            for (var a, o, s = 0, l = i && i.length, u = r && r.length; n && n.parentNode;) {
                for (s = 0; s < l; s++)if (a = i[s], a.element[0] === n)return {target: a, targetElement: n};
                for (s = 0; s < u; s++)if (o = r[s], e.contains(o.element[0], n) && m.matchesSelector.call(n, o.options.filter))return {
                    target: o,
                    targetElement: n
                };
                n = n.parentNode
            }
            return t
        }

        function s(e, t) {
            var n, i = t.options.group, r = e[i];
            if (w.fn.destroy.call(t), r.length > 1) {
                for (n = 0; n < r.length; n++)if (r[n] == t) {
                    r.splice(n, 1);
                    break
                }
            } else r.length = 0, delete e[i]
        }

        function l(e) {
            var t, n, i, r = u()[0];
            return e[0] === r ? (n = r.scrollTop, i = r.scrollLeft, {
                top: n,
                left: i,
                bottom: n + v.height(),
                right: i + v.width()
            }) : (t = e.offset(), t.bottom = t.top + e.height(), t.right = t.left + e.width(), t)
        }

        function u() {
            return e(h.support.browser.chrome ? g.body : g.documentElement)
        }

        function c(t) {
            var n = u();
            if (!t || t === g.body || t === g.documentElement)return n;
            for (var i = e(t)[0]; i && !h.isScrollable(i) && i !== g.body;)i = i.parentNode;
            return i === g.body ? n : e(i)
        }

        function d(e, t, n) {
            var i = {x: 0, y: 0}, r = 50;
            return e - n.left < r ? i.x = -(r - (e - n.left)) : n.right - e < r && (i.x = r - (n.right - e)), t - n.top < r ? i.y = -(r - (t - n.top)) : n.bottom - t < r && (i.y = r - (n.bottom - t)), i
        }

        var p, f, h = window.kendo, m = h.support, g = window.document, v = e(window), _ = h.Class, w = h.ui.Widget, b = h.Observable, y = h.UserEvents, k = e.proxy, x = e.extend, C = h.getOffset, T = {}, S = {}, D = {}, I = h.elementUnderCursor, F = "keyup", E = "change", O = "dragstart", A = "hold", M = "drag", H = "dragend", z = "dragcancel", P = "hintDestroyed", V = "dragenter", L = "dragleave", R = "drop", B = b.extend({
            init: function (t, n) {
                var i = this, r = t[0];
                i.capture = !1, r.addEventListener ? (e.each(h.eventMap.down.split(" "), function () {
                    r.addEventListener(this, k(i._press, i), !0)
                }), e.each(h.eventMap.up.split(" "), function () {
                    r.addEventListener(this, k(i._release, i), !0)
                })) : (e.each(h.eventMap.down.split(" "), function () {
                    r.attachEvent(this, k(i._press, i))
                }), e.each(h.eventMap.up.split(" "), function () {
                    r.attachEvent(this, k(i._release, i))
                })), b.fn.init.call(i), i.bind(["press", "release"], n || {})
            }, captureNext: function () {
                this.capture = !0
            }, cancelCapture: function () {
                this.capture = !1
            }, _press: function (e) {
                var t = this;
                t.trigger("press"), t.capture && e.preventDefault()
            }, _release: function (e) {
                var t = this;
                t.trigger("release"), t.capture && (e.preventDefault(), t.cancelCapture())
            }
        }), N = b.extend({
            init: function (t) {
                var n = this;
                b.fn.init.call(n), n.forcedEnabled = !1, e.extend(n, t), n.scale = 1, n.horizontal ? (n.measure = "offsetWidth", n.scrollSize = "scrollWidth", n.axis = "x") : (n.measure = "offsetHeight", n.scrollSize = "scrollHeight", n.axis = "y")
            }, makeVirtual: function () {
                e.extend(this, {virtual: !0, forcedEnabled: !0, _virtualMin: 0, _virtualMax: 0})
            }, virtualSize: function (e, t) {
                this._virtualMin === e && this._virtualMax === t || (this._virtualMin = e, this._virtualMax = t, this.update())
            }, outOfBounds: function (e) {
                return e > this.max || e < this.min
            }, forceEnabled: function () {
                this.forcedEnabled = !0
            }, getSize: function () {
                return this.container[0][this.measure]
            }, getTotal: function () {
                return this.element[0][this.scrollSize]
            }, rescale: function (e) {
                this.scale = e
            }, update: function (e) {
                var t = this, n = t.virtual ? t._virtualMax : t.getTotal(), i = n * t.scale, r = t.getSize();
                (0 !== n || t.forcedEnabled) && (t.max = t.virtual ? -t._virtualMin : 0, t.size = r, t.total = i, t.min = Math.min(t.max, r - i), t.minScale = r / n, t.centerOffset = (i - r) / 2, t.enabled = t.forcedEnabled || i > r, e || t.trigger(E, t))
            }
        }), W = b.extend({
            init: function (e) {
                var t = this;
                b.fn.init.call(t), t.x = new N(x({horizontal: !0}, e)), t.y = new N(x({horizontal: !1}, e)), t.container = e.container, t.forcedMinScale = e.minScale, t.maxScale = e.maxScale || 100, t.bind(E, e)
            }, rescale: function (e) {
                this.x.rescale(e), this.y.rescale(e), this.refresh()
            }, centerCoordinates: function () {
                return {x: Math.min(0, -this.x.centerOffset), y: Math.min(0, -this.y.centerOffset)}
            }, refresh: function () {
                var e = this;
                e.x.update(), e.y.update(), e.enabled = e.x.enabled || e.y.enabled, e.minScale = e.forcedMinScale || Math.min(e.x.minScale, e.y.minScale), e.fitScale = Math.max(e.x.minScale, e.y.minScale), e.trigger(E)
            }
        }), U = b.extend({
            init: function (e) {
                var t = this;
                x(t, e), b.fn.init.call(t)
            }, outOfBounds: function () {
                return this.dimension.outOfBounds(this.movable[this.axis])
            }, dragMove: function (e) {
                var t = this, n = t.dimension, i = t.axis, r = t.movable, a = r[i] + e;
                n.enabled && ((a < n.min && e < 0 || a > n.max && e > 0) && (e *= t.resistance), r.translateAxis(i, e), t.trigger(E, t))
            }
        }), q = _.extend({
            init: function (t) {
                var n, i, r, a, o = this;
                x(o, {elastic: !0}, t), r = o.elastic ? .5 : 0, a = o.movable, o.x = n = new U({
                    axis: "x",
                    dimension: o.dimensions.x,
                    resistance: r,
                    movable: a
                }), o.y = i = new U({
                    axis: "y",
                    dimension: o.dimensions.y,
                    resistance: r,
                    movable: a
                }), o.userEvents.bind(["press", "move", "end", "gesturestart", "gesturechange"], {
                    gesturestart: function (e) {
                        o.gesture = e, o.offset = o.dimensions.container.offset()
                    }, press: function (t) {
                        e(t.event.target).closest("a").is("[data-navigate-on-press=true]") && t.sender.cancel()
                    }, gesturechange: function (e) {
                        var t, r = o.gesture, s = r.center, l = e.center, u = e.distance / r.distance, c = o.dimensions.minScale, d = o.dimensions.maxScale;
                        a.scale <= c && u < 1 && (u += .8 * (1 - u)), a.scale * u >= d && (u = d / a.scale);
                        var p = a.x + o.offset.left, f = a.y + o.offset.top;
                        t = {
                            x: (p - s.x) * u + l.x - p,
                            y: (f - s.y) * u + l.y - f
                        }, a.scaleWith(u), n.dragMove(t.x), i.dragMove(t.y), o.dimensions.rescale(a.scale), o.gesture = e, e.preventDefault()
                    }, move: function (e) {
                        e.event.target.tagName.match(/textarea|input/i) || (n.dimension.enabled || i.dimension.enabled ? (n.dragMove(e.x.delta), i.dragMove(e.y.delta), e.preventDefault()) : e.touch.skip())
                    }, end: function (e) {
                        e.preventDefault()
                    }
                })
            }
        }), j = m.transitions.prefix + "Transform";
        f = m.hasHW3D ? function (e, t, n) {
            return "translate3d(" + e + "px," + t + "px,0) scale(" + n + ")"
        } : function (e, t, n) {
            return "translate(" + e + "px," + t + "px) scale(" + n + ")"
        };
        var G = b.extend({
            init: function (t) {
                var n = this;
                b.fn.init.call(n), n.element = e(t), n.element[0].style.webkitTransformOrigin = "left top", n.x = 0, n.y = 0, n.scale = 1, n._saveCoordinates(f(n.x, n.y, n.scale))
            }, translateAxis: function (e, t) {
                this[e] += t, this.refresh()
            }, scaleTo: function (e) {
                this.scale = e, this.refresh()
            }, scaleWith: function (e) {
                this.scale *= e, this.refresh()
            }, translate: function (e) {
                this.x += e.x, this.y += e.y, this.refresh()
            }, moveAxis: function (e, t) {
                this[e] = t, this.refresh()
            }, moveTo: function (e) {
                x(this, e), this.refresh()
            }, refresh: function () {
                var e, t = this, n = t.x, i = t.y;
                t.round && (n = Math.round(n), i = Math.round(i)), e = f(n, i, t.scale), e != t.coordinates && (h.support.browser.msie && h.support.browser.version < 10 ? (t.element[0].style.position = "absolute", t.element[0].style.left = t.x + "px", t.element[0].style.top = t.y + "px") : t.element[0].style[j] = e, t._saveCoordinates(e), t.trigger(E))
            }, _saveCoordinates: function (e) {
                this.coordinates = e
            }
        }), Y = w.extend({
            init: function (e, t) {
                var n = this;
                w.fn.init.call(n, e, t);
                var i = n.options.group;
                i in S ? S[i].push(n) : S[i] = [n]
            }, events: [V, L, R], options: {name: "DropTarget", group: "default"}, destroy: function () {
                s(S, this)
            }, _trigger: function (e, t) {
                var n = this, i = T[n.options.group];
                if (i)return n.trigger(e, x({}, t.event, {draggable: i, dropTarget: t.dropTarget}))
            }, _over: function (e) {
                this._trigger(V, e)
            }, _out: function (e) {
                this._trigger(L, e)
            }, _drop: function (e) {
                var t = this, n = T[t.options.group];
                n && (n.dropped = !t._trigger(R, e))
            }
        });
        Y.destroyGroup = function (e) {
            var t, n = S[e] || D[e];
            if (n) {
                for (t = 0; t < n.length; t++)w.fn.destroy.call(n[t]);
                n.length = 0, delete S[e], delete D[e]
            }
        }, Y._cache = S;
        var $ = Y.extend({
            init: function (e, t) {
                var n = this;
                w.fn.init.call(n, e, t);
                var i = n.options.group;
                i in D ? D[i].push(n) : D[i] = [n]
            }, destroy: function () {
                s(D, this)
            }, options: {name: "DropTargetArea", group: "default", filter: null}
        }), K = w.extend({
            init: function (e, t) {
                var n = this;
                w.fn.init.call(n, e, t), n._activated = !1, n.userEvents = new y(n.element, {
                    global: !0,
                    allowSelection: !0,
                    filter: n.options.filter,
                    threshold: n.options.distance,
                    start: k(n._start, n),
                    hold: k(n._hold, n),
                    move: k(n._drag, n),
                    end: k(n._end, n),
                    cancel: k(n._cancel, n),
                    select: k(n._select, n)
                }), n._afterEndHandler = k(n._afterEnd, n), n._captureEscape = k(n._captureEscape, n)
            },
            events: [A, O, M, H, z, P],
            options: {
                name: "Draggable",
                distance: h.support.touch ? 0 : 5,
                group: "default",
                cursorOffset: null,
                axis: null,
                container: null,
                filter: null,
                ignore: null,
                holdToDrag: !1,
                autoScroll: !1,
                dropped: !1
            },
            cancelHold: function () {
                this._activated = !1
            },
            _captureEscape: function (e) {
                var t = this;
                e.keyCode === h.keys.ESC && (t._trigger(z, {event: e}), t.userEvents.cancel())
            },
            _updateHint: function (t) {
                var n, i = this, a = i.options, o = i.boundaries, s = a.axis, l = i.options.cursorOffset;
                l ? n = {
                    left: t.x.location + l.left,
                    top: t.y.location + l.top
                } : (i.hintOffset.left += t.x.delta, i.hintOffset.top += t.y.delta, n = e.extend({}, i.hintOffset)), o && (n.top = r(n.top, o.y), n.left = r(n.left, o.x)), "x" === s ? delete n.top : "y" === s && delete n.left, i.hint.css(n)
            },
            _shouldIgnoreTarget: function (t) {
                var n = this.options.ignore;
                return n && e(t).is(n)
            },
            _select: function (e) {
                this._shouldIgnoreTarget(e.event.target) || e.preventDefault()
            },
            _start: function (t) {
                var n = this, i = n.options, r = i.container, o = i.hint;
                if (this._shouldIgnoreTarget(t.touch.initialTouch) || i.holdToDrag && !n._activated)return void n.userEvents.cancel();
                if (n.currentTarget = t.target, n.currentTargetOffset = C(n.currentTarget), o) {
                    n.hint && n.hint.stop(!0, !0).remove(), n.hint = h.isFunction(o) ? e(o.call(n, n.currentTarget)) : o;
                    var s = C(n.currentTarget);
                    n.hintOffset = s, n.hint.css({
                        position: "absolute",
                        zIndex: 2e4,
                        left: s.left,
                        top: s.top
                    }).appendTo(g.body), n.angular("compile", function () {
                        n.hint.removeAttr("ng-repeat");
                        for (var i = e(t.target); !i.data("$$kendoScope") && i.length;)i = i.parent();
                        return {elements: n.hint.get(), scopeFrom: i.data("$$kendoScope")}
                    })
                }
                T[i.group] = n, n.dropped = !1, r && (n.boundaries = a(r, n.hint)), e(g).on(F, n._captureEscape), n._trigger(O, t) && (n.userEvents.cancel(), n._afterEnd()), n.userEvents.capture()
            },
            _hold: function (e) {
                this.currentTarget = e.target, this._trigger(A, e) ? this.userEvents.cancel() : this._activated = !0
            },
            _drag: function (t) {
                t.preventDefault();
                var n = this._elementUnderCursor(t);
                if (this.options.autoScroll && this._cursorElement !== n && (this._scrollableParent = c(n), this._cursorElement = n), this._lastEvent = t, this._processMovement(t, n), this.options.autoScroll && this._scrollableParent[0]) {
                    var i = d(t.x.location, t.y.location, l(this._scrollableParent));
                    this._scrollCompenstation = e.extend({}, this.hintOffset), this._scrollVelocity = i, 0 === i.y && 0 === i.x ? (clearInterval(this._scrollInterval), this._scrollInterval = null) : this._scrollInterval || (this._scrollInterval = setInterval(e.proxy(this, "_autoScroll"), 50))
                }
                this.hint && this._updateHint(t)
            },
            _processMovement: function (t, n) {
                this._withDropTarget(n, function (n, i) {
                    if (!n)return void(p && (p._trigger(L, x(t, {dropTarget: e(p.targetElement)})), p = null));
                    if (p) {
                        if (i === p.targetElement)return;
                        p._trigger(L, x(t, {dropTarget: e(p.targetElement)}))
                    }
                    n._trigger(V, x(t, {dropTarget: e(i)})), p = x(n, {targetElement: i})
                }), this._trigger(M, x(t, {dropTarget: p, elementUnderCursor: n}))
            },
            _autoScroll: function () {
                var e = this._scrollableParent[0], t = this._scrollVelocity, n = this._scrollCompenstation;
                if (e) {
                    var i = this._elementUnderCursor(this._lastEvent);
                    this._processMovement(this._lastEvent, i);
                    var r, a, o = e === u()[0];
                    o ? (r = g.body.scrollHeight > v.height(), a = g.body.scrollWidth > v.width()) : (r = e.offsetHeight <= e.scrollHeight, a = e.offsetWidth <= e.scrollWidth);
                    var s = e.scrollTop + t.y, l = r && s > 0 && s < e.scrollHeight, c = e.scrollLeft + t.x, d = a && c > 0 && c < e.scrollWidth;
                    l && (e.scrollTop += t.y), d && (e.scrollLeft += t.x), o && (d || l) && (l && (n.top += t.y), d && (n.left += t.x), this.hint.css(n))
                }
            },
            _end: function (t) {
                this._withDropTarget(this._elementUnderCursor(t), function (n, i) {
                    n && (n._drop(x({}, t, {dropTarget: e(i)})), p = null)
                }), this._cancel(this._trigger(H, t))
            },
            _cancel: function (e) {
                var t = this;
                t._scrollableParent = null, this._cursorElement = null, clearInterval(this._scrollInterval), t._activated = !1, t.hint && !t.dropped ? setTimeout(function () {
                    t.hint.stop(!0, !0), e ? t._afterEndHandler() : t.hint.animate(t.currentTargetOffset, "fast", t._afterEndHandler)
                }, 0) : t._afterEnd()
            },
            _trigger: function (e, t) {
                var n = this;
                return n.trigger(e, x({}, t.event, {
                    x: t.x,
                    y: t.y,
                    currentTarget: n.currentTarget,
                    initialTarget: t.touch ? t.touch.initialTouch : null,
                    dropTarget: t.dropTarget,
                    elementUnderCursor: t.elementUnderCursor
                }))
            },
            _elementUnderCursor: function (e) {
                var t = I(e), i = this.hint;
                return i && n(i[0], t) && (i.hide(), t = I(e), t || (t = I(e)), i.show()), t
            },
            _withDropTarget: function (e, t) {
                var n, i = this.options.group, r = S[i], a = D[i];
                (r && r.length || a && a.length) && (n = o(e, r, a), n ? t(n.target, n.targetElement) : t())
            },
            destroy: function () {
                var e = this;
                w.fn.destroy.call(e), e._afterEnd(), e.userEvents.destroy(), this._scrollableParent = null, this._cursorElement = null, clearInterval(this._scrollInterval), e.currentTarget = null
            },
            _afterEnd: function () {
                var t = this;
                t.hint && t.hint.remove(), delete T[t.options.group], t.trigger("destroy"), t.trigger(P), e(g).off(F, t._captureEscape)
            }
        });
        h.ui.plugin(Y), h.ui.plugin($), h.ui.plugin(K), h.TapCapture = B, h.containerBoundaries = a, x(h.ui, {
            Pane: q,
            PaneDimensions: W,
            Movable: G
        }), h.ui.Draggable.utils = {autoScrollVelocity: d, scrollableViewPort: l, findScrollableParent: c}
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.slider", ["kendo.draganddrop"], e)
}(function () {
    return function (e, t) {
        function n(e, t, n) {
            var i = n ? " k-slider-horizontal" : " k-slider-vertical", r = e.style ? e.style : t.attr("style"), a = t.attr("class") ? " " + t.attr("class") : "", o = "";
            return "bottomRight" == e.tickPlacement ? o = " k-slider-bottomright" : "topLeft" == e.tickPlacement && (o = " k-slider-topleft"), r = r ? " style='" + r + "'" : "", "<div class='k-widget k-slider" + i + a + "'" + r + "><div class='k-slider-wrap" + (e.showButtons ? " k-slider-buttons" : "") + o + "'></div></div>"
        }

        function i(e, t, n) {
            var i = "";
            return i = "increase" == t ? n ? "k-i-arrow-e" : "k-i-arrow-n" : n ? "k-i-arrow-w" : "k-i-arrow-s", "<a class='k-button k-button-" + t + "' aria-label='" + e[t + "ButtonTitle"] + "'><span class='k-icon " + i + "'></span></a>"
        }

        function r(e, t) {
            var n, i = "<ul class='k-reset k-slider-items'>", r = k.floor(c(t / e.smallStep)) + 1;
            for (n = 0; n < r; n++)i += "<li class='k-tick' role='presentation'>&nbsp;</li>";
            return i += "</ul>"
        }

        function a(e, t) {
            var n = t.is("input") ? 1 : 2, i = 2 == n ? e.leftDragHandleTitle : e.dragHandleTitle;
            return "<div class='k-slider-track'><div class='k-slider-selection'><!-- --></div><a href='#' class='k-draghandle' title='" + i + "' role='slider' aria-valuemin='" + e.min + "' aria-valuemax='" + e.max + "' aria-valuenow='" + (n > 1 ? e.selectionStart || e.min : e.value || e.min) + "'>Drag</a>" + (n > 1 ? "<a href='#' class='k-draghandle' title='" + e.rightDragHandleTitle + "'role='slider' aria-valuemin='" + e.min + "' aria-valuemax='" + e.max + "' aria-valuenow='" + (e.selectionEnd || e.max) + "'>Drag</a>" : "") + "</div>"
        }

        function o(e) {
            return function (t) {
                return t + e
            }
        }

        function s(e) {
            return function () {
                return e
            }
        }

        function l(e) {
            return (e + "").replace(".", h.cultures.current.numberFormat["."])
        }

        function u(e) {
            var t = e.toString(), n = 0;
            return t = t.split("."), t[1] && (n = t[1].length), n = n > 10 ? 10 : n
        }

        function c(e) {
            var t, n;
            return e = parseFloat(e, 10), t = u(e), n = k.pow(10, t || 0), k.round(e * n) / n
        }

        function d(e, n) {
            var i = w(e.getAttribute(n));
            return null === i && (i = t), i
        }

        function p(e) {
            return typeof e !== Y
        }

        function f(e) {
            return 1e4 * e
        }

        var h = window.kendo, m = h.ui.Widget, g = h.ui.Draggable, v = e.extend, _ = h.format, w = h.parseFloat, b = e.proxy, y = e.isArray, k = Math, x = h.support, C = x.pointers, T = x.msPointers, S = "change", D = "slide", I = ".slider", F = "touchstart" + I + " mousedown" + I, E = C ? "pointerdown" + I : T ? "MSPointerDown" + I : F, O = "touchend" + I + " mouseup" + I, A = C ? "pointerup" : T ? "MSPointerUp" + I : O, M = "moveSelection", H = "keydown" + I, z = "click" + I, P = "mouseover" + I, V = "focus" + I, L = "blur" + I, R = ".k-draghandle", B = ".k-slider-track", N = ".k-tick", W = "k-state-selected", U = "k-state-focused", q = "k-state-default", j = "k-state-disabled", G = "disabled", Y = "undefined", $ = "tabindex", K = h.getTouches, J = m.extend({
            init: function (e, t) {
                var n = this;
                if (m.fn.init.call(n, e, t), t = n.options, n._distance = c(t.max - t.min), n._isHorizontal = "horizontal" == t.orientation, n._isRtl = n._isHorizontal && h.support.isRtl(e), n._position = n._isHorizontal ? "left" : "bottom", n._sizeFn = n._isHorizontal ? "width" : "height", n._outerSize = n._isHorizontal ? "outerWidth" : "outerHeight", t.tooltip.format = t.tooltip.enabled ? t.tooltip.format || "{0}" : "{0}", t.smallStep <= 0)throw new Error("Kendo UI Slider smallStep must be a positive number.");
                n._createHtml(), n.wrapper = n.element.closest(".k-slider"), n._trackDiv = n.wrapper.find(B), n._setTrackDivWidth(), n._maxSelection = n._trackDiv[n._sizeFn](), n._sliderItemsInit(), n._reset(), n._tabindex(n.wrapper.find(R)), n[t.enabled ? "enable" : "disable"]();
                var i = h.support.isRtl(n.wrapper) ? -1 : 1;
                n._keyMap = {
                    37: o(-1 * i * t.smallStep),
                    40: o(-t.smallStep),
                    39: o(1 * i * t.smallStep),
                    38: o(+t.smallStep),
                    35: s(t.max),
                    36: s(t.min),
                    33: o(+t.largeStep),
                    34: o(-t.largeStep)
                }, h.notify(n)
            },
            events: [S, D],
            options: {
                enabled: !0,
                min: 0,
                max: 10,
                smallStep: 1,
                largeStep: 5,
                orientation: "horizontal",
                tickPlacement: "both",
                tooltip: {enabled: !0, format: "{0}"}
            },
            _resize: function () {
                this._setTrackDivWidth(), this.wrapper.find(".k-slider-items").remove(), this._maxSelection = this._trackDiv[this._sizeFn](), this._sliderItemsInit(), this._refresh(), this.options.enabled && this.enable(!0)
            },
            _sliderItemsInit: function () {
                var e = this, t = e.options, n = e._maxSelection / ((t.max - t.min) / t.smallStep), i = e._calculateItemsWidth(k.floor(e._distance / t.smallStep));
                "none" != t.tickPlacement && n >= 2 && (e._trackDiv.before(r(t, e._distance)), e._setItemsWidth(i), e._setItemsTitle()), e._calculateSteps(i), "none" != t.tickPlacement && n >= 2 && t.largeStep >= t.smallStep && e._setItemsLargeTick()
            },
            getSize: function () {
                return h.dimensions(this.wrapper)
            },
            _setTrackDivWidth: function () {
                var e = this, t = 2 * parseFloat(e._trackDiv.css(e._isRtl ? "right" : e._position), 10);
                e._trackDiv[e._sizeFn](e.wrapper[e._sizeFn]() - 2 - t)
            },
            _setItemsWidth: function (t) {
                var n, i = this, r = i.options, a = 0, o = t.length - 1, s = i.wrapper.find(N), l = 0, u = 2, c = s.length, d = 0;
                for (n = 0; n < c - 2; n++)e(s[n + 1])[i._sizeFn](t[n]);
                if (i._isHorizontal ? (e(s[a]).addClass("k-first")[i._sizeFn](t[o - 1]), e(s[o]).addClass("k-last")[i._sizeFn](t[o])) : (e(s[o]).addClass("k-first")[i._sizeFn](t[o]), e(s[a]).addClass("k-last")[i._sizeFn](t[o - 1])), i._distance % r.smallStep !== 0 && !i._isHorizontal) {
                    for (n = 0; n < t.length; n++)d += t[n];
                    l = i._maxSelection - d, l += parseFloat(i._trackDiv.css(i._position), 10) + u, i.wrapper.find(".k-slider-items").css("padding-top", l)
                }
            },
            _setItemsTitle: function () {
                for (var t = this, n = t.options, i = t.wrapper.find(N), r = n.min, a = i.length, o = t._isHorizontal && !t._isRtl ? 0 : a - 1, s = t._isHorizontal && !t._isRtl ? a : -1, l = t._isHorizontal && !t._isRtl ? 1 : -1; o - s !== 0; o += l)e(i[o]).attr("title", _(n.tooltip.format, c(r))), r += n.smallStep
            },
            _setItemsLargeTick: function () {
                var t, n, i = this, r = i.options, a = i.wrapper.find(N), o = 0;
                if (f(r.largeStep) % f(r.smallStep) === 0 || i._distance / r.largeStep >= 3)for (i._isHorizontal || i._isRtl || (a = e.makeArray(a).reverse()), o = 0; o < a.length; o++) {
                    t = e(a[o]), n = i._values[o];
                    var s = c(f(n - this.options.min));
                    s % f(r.smallStep) === 0 && s % f(r.largeStep) === 0 && (t.addClass("k-tick-large").html("<span class='k-label'>" + t.attr("title") + "</span>"), 0 !== o && o !== a.length - 1 && t.css("line-height", t[i._sizeFn]() + "px"))
                }
            },
            _calculateItemsWidth: function (e) {
                var t, n, i, r = this, a = r.options, o = parseFloat(r._trackDiv.css(r._sizeFn)) + 1, s = o / r._distance;
                for (r._distance / a.smallStep - k.floor(r._distance / a.smallStep) > 0 && (o -= r._distance % a.smallStep * s), t = o / e, n = [], i = 0; i < e - 1; i++)n[i] = t;
                return n[e - 1] = n[e] = t / 2, r._roundWidths(n)
            },
            _roundWidths: function (e) {
                var t, n = 0, i = e.length;
                for (t = 0; t < i; t++)n += e[t] - k.floor(e[t]), e[t] = k.floor(e[t]);
                return n = k.round(n), this._addAdditionalSize(n, e)
            },
            _addAdditionalSize: function (e, t) {
                if (0 === e)return t;
                var n, i = parseFloat(t.length - 1) / parseFloat(1 == e ? e : e - 1);
                for (n = 0; n < e; n++)t[parseInt(k.round(i * n), 10)] += 1;
                return t
            },
            _calculateSteps: function (e) {
                var t, n = this, i = n.options, r = i.min, a = 0, o = k.ceil(n._distance / i.smallStep), s = 1;
                if (o += n._distance / i.smallStep % 1 === 0 ? 1 : 0, e.splice(0, 0, 2 * e[o - 2]), e.splice(o - 1, 1, 2 * e.pop()), n._pixelSteps = [a], n._values = [r], 0 !== o) {
                    for (; s < o;)a += (e[s - 1] + e[s]) / 2, n._pixelSteps[s] = a, r += i.smallStep, n._values[s] = c(r), s++;
                    t = n._distance % i.smallStep === 0 ? o - 1 : o, n._pixelSteps[t] = n._maxSelection, n._values[t] = i.max, n._isRtl && (n._pixelSteps.reverse(), n._values.reverse())
                }
            },
            _getValueFromPosition: function (e, t) {
                var n, i = this, r = i.options, a = k.max(r.smallStep * (i._maxSelection / i._distance), 0), o = 0, s = a / 2;
                if (i._isHorizontal ? (o = e - t.startPoint, i._isRtl && (o = i._maxSelection - o)) : o = t.startPoint - e, i._maxSelection - (parseInt(i._maxSelection % a, 10) - 3) / 2 < o)return r.max;
                for (n = 0; n < i._pixelSteps.length; n++)if (k.abs(i._pixelSteps[n] - o) - 1 <= s)return c(i._values[n])
            },
            _getFormattedValue: function (e, t) {
                var n, i, r, a = this, o = "", s = a.options.tooltip;
                return y(e) ? (i = e[0], r = e[1]) : t && t.type && (i = t.selectionStart, r = t.selectionEnd), t && (n = t.tooltipTemplate), !n && s.template && (n = h.template(s.template)), y(e) || t && t.type ? n ? o = n({
                    selectionStart: i,
                    selectionEnd: r
                }) : (i = _(s.format, i), r = _(s.format, r), o = i + " - " + r) : (t && (t.val = e), o = n ? n({value: e}) : _(s.format, e)), o
            },
            _getDraggableArea: function () {
                var e = this, t = h.getOffset(e._trackDiv);
                return {
                    startPoint: e._isHorizontal ? t.left : t.top + e._maxSelection,
                    endPoint: e._isHorizontal ? t.left + e._maxSelection : t.top
                }
            },
            _createHtml: function () {
                var e = this, t = e.element, r = e.options, o = t.find("input");
                2 == o.length ? (o.eq(0).prop("value", l(r.selectionStart)), o.eq(1).prop("value", l(r.selectionEnd))) : t.prop("value", l(r.value)), t.wrap(n(r, t, e._isHorizontal)).hide(), r.showButtons && t.before(i(r, "increase", e._isHorizontal)).before(i(r, "decrease", e._isHorizontal)), t.before(a(r, t))
            },
            _focus: function (t) {
                var n = this, i = t.target, r = n.value(), a = n._drag;
                a || (i == n.wrapper.find(R).eq(0)[0] ? (a = n._firstHandleDrag, n._activeHandle = 0) : (a = n._lastHandleDrag, n._activeHandle = 1), r = r[n._activeHandle]), e(i).addClass(U + " " + W), a && (n._activeHandleDrag = a, a.selectionStart = n.options.selectionStart, a.selectionEnd = n.options.selectionEnd, a._updateTooltip(r))
            },
            _focusWithMouse: function (t) {
                t = e(t);
                var n = this, i = t.is(R) ? t.index() : 0;
                window.setTimeout(function () {
                    n.wrapper.find(R)[2 == i ? 1 : 0].focus()
                }, 1), n._setTooltipTimeout()
            },
            _blur: function (t) {
                var n = this, i = n._activeHandleDrag;
                e(t.target).removeClass(U + " " + W), i && (i._removeTooltip(), delete n._activeHandleDrag, delete n._activeHandle)
            },
            _setTooltipTimeout: function () {
                var e = this;
                e._tooltipTimeout = window.setTimeout(function () {
                    var t = e._drag || e._activeHandleDrag;
                    t && t._removeTooltip()
                }, 300)
            },
            _clearTooltipTimeout: function () {
                var e = this;
                window.clearTimeout(this._tooltipTimeout);
                var t = e._drag || e._activeHandleDrag;
                t && t.tooltipDiv && t.tooltipDiv.stop(!0, !1).css("opacity", 1)
            },
            _reset: function () {
                var t = this, n = t.element, i = n.attr("form"), r = i ? e("#" + i) : n.closest("form");
                r[0] && (t._form = r.on("reset", b(t._formResetHandler, t)))
            },
            destroy: function () {
                this._form && this._form.off("reset", this._formResetHandler), m.fn.destroy.call(this)
            }
        }), Q = J.extend({
            init: function (n, i) {
                var r, a = this;
                n.type = "text", i = v({}, {
                    value: d(n, "value"),
                    min: d(n, "min"),
                    max: d(n, "max"),
                    smallStep: d(n, "step")
                }, i), n = e(n), i && i.enabled === t && (i.enabled = !n.is("[disabled]")), J.fn.init.call(a, n, i), i = a.options, p(i.value) && null !== i.value || (i.value = i.min, n.prop("value", l(i.min))), i.value = k.max(k.min(i.value, i.max), i.min), r = a.wrapper.find(R), this._selection = new Q.Selection(r, a, i), a._drag = new Q.Drag(r, "", a, i)
            },
            options: {
                name: "Slider",
                showButtons: !0,
                increaseButtonTitle: "Increase",
                decreaseButtonTitle: "Decrease",
                dragHandleTitle: "drag",
                tooltip: {format: "{0:#,#.##}"},
                value: null
            },
            enable: function (t) {
                var n, i, r = this, a = r.options;
                if (r.disable(), t !== !1) {
                    if (r.wrapper.removeClass(j).addClass(q), r.wrapper.find("input").removeAttr(G), n = function (t) {
                            var n = K(t)[0];
                            if (n) {
                                var i = r._isHorizontal ? n.location.pageX : n.location.pageY, a = r._getDraggableArea(), o = e(t.target);
                                if (o.hasClass("k-draghandle"))return void o.addClass(U + " " + W);
                                r._update(r._getValueFromPosition(i, a)), r._focusWithMouse(t.target), r._drag.dragstart(t), t.preventDefault()
                            }
                        }, r.wrapper.find(N + ", " + B).on(E, n).end().on(E, function () {
                            e(document.documentElement).one("selectstart", h.preventDefault)
                        }).on(A, function () {
                            r._drag._end()
                        }), r.wrapper.find(R).attr($, 0).on(O, function () {
                            r._setTooltipTimeout()
                        }).on(z, function (e) {
                            r._focusWithMouse(e.target), e.preventDefault()
                        }).on(V, b(r._focus, r)).on(L, b(r._blur, r)), i = b(function (e) {
                            var t = r._nextValueByIndex(r._valueIndex + 1 * e);
                            r._setValueInRange(t), r._drag._updateTooltip(t)
                        }, r), a.showButtons) {
                        var o = b(function (e, t) {
                            this._clearTooltipTimeout(), (1 === e.which || x.touch && 0 === e.which) && (i(t), this.timeout = setTimeout(b(function () {
                                this.timer = setInterval(function () {
                                    i(t)
                                }, 60)
                            }, this), 200))
                        }, r);
                        r.wrapper.find(".k-button").on(O, b(function (e) {
                            this._clearTimer(), r._focusWithMouse(e.target)
                        }, r)).on(P, function (t) {
                            e(t.currentTarget).addClass("k-state-hover")
                        }).on("mouseout" + I, b(function (t) {
                            e(t.currentTarget).removeClass("k-state-hover"), this._clearTimer()
                        }, r)).eq(0).on(F, b(function (e) {
                            o(e, 1)
                        }, r)).click(!1).end().eq(1).on(F, b(function (e) {
                            o(e, -1)
                        }, r)).click(h.preventDefault)
                    }
                    r.wrapper.find(R).off(H, !1).on(H, b(this._keydown, r)), a.enabled = !0
                }
            },
            disable: function () {
                var t = this;
                t.wrapper.removeClass(q).addClass(j), e(t.element).prop(G, G), t.wrapper.find(".k-button").off(F).on(F, h.preventDefault).off(O).on(O, h.preventDefault).off("mouseleave" + I).on("mouseleave" + I, h.preventDefault).off(P).on(P, h.preventDefault), t.wrapper.find(N + ", " + B).off(E).off(A), t.wrapper.find(R).attr($, -1).off(O).off(H).off(z).off(V).off(L), t.options.enabled = !1
            },
            _update: function (e) {
                var t = this, n = t.value() != e;
                t.value(e), n && t.trigger(S, {value: t.options.value})
            },
            value: function (e) {
                var t = this, n = t.options;
                return e = c(e), isNaN(e) ? n.value : void(e >= n.min && e <= n.max && n.value != e && (t.element.prop("value", l(e)), n.value = e, t._refreshAriaAttr(e), t._refresh()))
            },
            _refresh: function () {
                this.trigger(M, {value: this.options.value})
            },
            _refreshAriaAttr: function (e) {
                var t, n = this, i = n._drag;
                t = i && i._tooltipDiv ? i._tooltipDiv.text() : n._getFormattedValue(e, null), this.wrapper.find(R).attr("aria-valuenow", e).attr("aria-valuetext", t)
            },
            _clearTimer: function () {
                clearTimeout(this.timeout), clearInterval(this.timer)
            },
            _keydown: function (e) {
                var t = this;
                e.keyCode in t._keyMap && (t._clearTooltipTimeout(), t._setValueInRange(t._keyMap[e.keyCode](t.options.value)), t._drag._updateTooltip(t.value()), e.preventDefault())
            },
            _setValueInRange: function (e) {
                var t = this, n = t.options;
                return e = c(e), isNaN(e) ? void t._update(n.min) : (e = k.max(k.min(e, n.max), n.min), void t._update(e))
            },
            _nextValueByIndex: function (e) {
                var t = this._values.length;
                return this._isRtl && (e = t - 1 - e), this._values[k.max(0, k.min(e, t - 1))]
            },
            _formResetHandler: function () {
                var e = this, t = e.options.min;
                setTimeout(function () {
                    var n = e.element[0].value;
                    e.value("" === n || isNaN(n) ? t : n)
                })
            },
            destroy: function () {
                var e = this;
                J.fn.destroy.call(e), e.wrapper.off(I).find(".k-button").off(I).end().find(R).off(I).end().find(N + ", " + B).off(I).end(), e._drag.draggable.destroy(), e._drag._removeTooltip(!0)
            }
        });
        Q.Selection = function (e, t, n) {
            function i(i) {
                var r = i - n.min, a = t._valueIndex = k.ceil(c(r / n.smallStep)), o = parseInt(t._pixelSteps[a], 10), s = t._trackDiv.find(".k-slider-selection"), l = parseInt(e[t._outerSize]() / 2, 10), u = t._isRtl ? 2 : 0;
                s[t._sizeFn](t._isRtl ? t._maxSelection - o : o), e.css(t._position, o - l - u)
            }

            i(n.value), t.bind([S, D, M], function (e) {
                i(parseFloat(e.value, 10))
            })
        }, Q.Drag = function (e, t, n, i) {
            var r = this;
            r.owner = n, r.options = i, r.element = e, r.type = t, r.draggable = new g(e, {
                distance: 0,
                dragstart: b(r._dragstart, r),
                drag: b(r.drag, r),
                dragend: b(r.dragend, r),
                dragcancel: b(r.dragcancel, r)
            }), e.click(!1)
        }, Q.Drag.prototype = {
            dragstart: function (e) {
                this.owner._activeDragHandle = this, this.draggable.userEvents.cancel(), this._dragstart(e), this.dragend()
            }, _dragstart: function (t) {
                var n = this, i = n.owner, r = n.options;
                return r.enabled ? (this.owner._activeDragHandle = this, i.element.off(P), i.wrapper.find("." + U).removeClass(U + " " + W), n.element.addClass(U + " " + W), e(document.documentElement).css("cursor", "pointer"), n.dragableArea = i._getDraggableArea(), n.step = k.max(r.smallStep * (i._maxSelection / i._distance), 0), n.type ? (n.selectionStart = r.selectionStart, n.selectionEnd = r.selectionEnd, i._setZIndex(n.type)) : n.oldVal = n.val = r.value, n._removeTooltip(!0), void n._createTooltip()) : void t.preventDefault()
            }, _createTooltip: function () {
                var t, n, i = this, r = i.owner, a = i.options.tooltip, o = "", s = e(window);
                a.enabled && (a.template && (t = i.tooltipTemplate = h.template(a.template)), e(".k-slider-tooltip").remove(), i.tooltipDiv = e("<div class='k-widget k-tooltip k-slider-tooltip'><!-- --></div>").appendTo(document.body), o = r._getFormattedValue(i.val || r.value(), i), i.type || (n = "k-callout-" + (r._isHorizontal ? "s" : "e"), i.tooltipInnerDiv = "<div class='k-callout " + n + "'><!-- --></div>", o += i.tooltipInnerDiv), i.tooltipDiv.html(o), i._scrollOffset = {
                    top: s.scrollTop(),
                    left: s.scrollLeft()
                }, i.moveTooltip())
            }, drag: function (e) {
                var t, n = this, i = n.owner, r = e.x.location, a = e.y.location, o = n.dragableArea.startPoint, s = n.dragableArea.endPoint;
                e.preventDefault(), i._isHorizontal ? i._isRtl ? n.val = n.constrainValue(r, o, s, r < s) : n.val = n.constrainValue(r, o, s, r >= s) : n.val = n.constrainValue(a, s, o, a <= s), n.oldVal != n.val && (n.oldVal = n.val, n.type ? ("firstHandle" == n.type ? n.val < n.selectionEnd ? n.selectionStart = n.val : n.selectionStart = n.selectionEnd = n.val : n.val > n.selectionStart ? n.selectionEnd = n.val : n.selectionStart = n.selectionEnd = n.val, t = {
                    values: [n.selectionStart, n.selectionEnd],
                    value: [n.selectionStart, n.selectionEnd]
                }) : t = {value: n.val}, i.trigger(D, t)), n._updateTooltip(n.val)
            }, _updateTooltip: function (e) {
                var t = this, n = t.options, i = n.tooltip, r = "";
                i.enabled && (t.tooltipDiv || t._createTooltip(), r = t.owner._getFormattedValue(c(e), t), t.type || (r += t.tooltipInnerDiv), t.tooltipDiv.html(r), t.moveTooltip())
            }, dragcancel: function () {
                return this.owner._refresh(), e(document.documentElement).css("cursor", ""), this._end()
            }, dragend: function () {
                var t = this, n = t.owner;
                return e(document.documentElement).css("cursor", ""), t.type ? n._update(t.selectionStart, t.selectionEnd) : (n._update(t.val), t.draggable.userEvents._disposeAll()), t.draggable.userEvents.cancel(), t._end()
            }, _end: function () {
                var e = this, t = e.owner;
                return t._focusWithMouse(e.element), t.element.on(P), !1
            }, _removeTooltip: function (t) {
                var n = this, i = n.owner;
                n.tooltipDiv && i.options.tooltip.enabled && i.options.enabled && (t ? (n.tooltipDiv.remove(), n.tooltipDiv = null) : n.tooltipDiv.fadeOut("slow", function () {
                    e(this).remove(), n.tooltipDiv = null
                }))
            }, moveTooltip: function () {
                var t, n, i, r, a = this, o = a.owner, s = 0, l = 0, u = a.element, c = h.getOffset(u), d = 8, p = e(window), f = a.tooltipDiv.find(".k-callout"), m = a.tooltipDiv.outerWidth(), g = a.tooltipDiv.outerHeight();
                a.type ? (t = o.wrapper.find(R), c = h.getOffset(t.eq(0)), n = h.getOffset(t.eq(1)), o._isHorizontal ? (s = n.top, l = c.left + (n.left - c.left) / 2) : (s = c.top + (n.top - c.top) / 2, l = n.left), r = t.eq(0).outerWidth() + 2 * d) : (s = c.top, l = c.left, r = u.outerWidth() + 2 * d), o._isHorizontal ? (l -= parseInt((m - u[o._outerSize]()) / 2, 10), s -= g + f.height() + d) : (s -= parseInt((g - u[o._outerSize]()) / 2, 10), l -= m + f.width() + d), o._isHorizontal ? (i = a._flip(s, g, r, p.outerHeight() + a._scrollOffset.top), s += i, l += a._fit(l, m, p.outerWidth() + a._scrollOffset.left)) : (i = a._flip(l, m, r, p.outerWidth() + a._scrollOffset.left), s += a._fit(s, g, p.outerHeight() + a._scrollOffset.top), l += i), i > 0 && f && (f.removeClass(), f.addClass("k-callout k-callout-" + (o._isHorizontal ? "n" : "w"))), a.tooltipDiv.css({
                    top: s,
                    left: l
                })
            }, _fit: function (e, t, n) {
                var i = 0;
                return e + t > n && (i = n - (e + t)), e < 0 && (i = -e), i
            }, _flip: function (e, t, n, i) {
                var r = 0;
                return e + t > i && (r += -(n + t)), e + r < 0 && (r += n + t), r
            }, constrainValue: function (e, t, n, i) {
                var r = this, a = 0;
                return a = t < e && e < n ? r.owner._getValueFromPosition(e, r.dragableArea) : i ? r.options.max : r.options.min
            }
        }, h.ui.plugin(Q);
        var X = J.extend({
            init: function (n, i) {
                var r = this, a = e(n).find("input"), o = a.eq(0)[0], s = a.eq(1)[0];
                o.type = "text", s.type = "text", i && i.showButtons && (window.console && window.console.warn("showbuttons option is not supported for the range slider, ignoring"), i.showButtons = !1), i = v({}, {
                    selectionStart: d(o, "value"),
                    min: d(o, "min"),
                    max: d(o, "max"),
                    smallStep: d(o, "step")
                }, {
                    selectionEnd: d(s, "value"),
                    min: d(s, "min"),
                    max: d(s, "max"),
                    smallStep: d(s, "step")
                }, i), i && i.enabled === t && (i.enabled = !a.is("[disabled]")), J.fn.init.call(r, n, i), i = r.options, p(i.selectionStart) && null !== i.selectionStart || (i.selectionStart = i.min, a.eq(0).prop("value", l(i.min))), p(i.selectionEnd) && null !== i.selectionEnd || (i.selectionEnd = i.max, a.eq(1).prop("value", l(i.max)));
                var u = r.wrapper.find(R);
                this._selection = new X.Selection(u, r, i), r._firstHandleDrag = new Q.Drag(u.eq(0), "firstHandle", r, i), r._lastHandleDrag = new Q.Drag(u.eq(1), "lastHandle", r, i)
            },
            options: {
                name: "RangeSlider",
                leftDragHandleTitle: "drag",
                rightDragHandleTitle: "drag",
                tooltip: {format: "{0:#,#.##}"},
                selectionStart: null,
                selectionEnd: null
            },
            enable: function (t) {
                var n, i = this, r = i.options;
                i.disable(), t !== !1 && (i.wrapper.removeClass(j).addClass(q), i.wrapper.find("input").removeAttr(G), n = function (t) {
                    var n = K(t)[0];
                    if (n) {
                        var a, o, s, l = i._isHorizontal ? n.location.pageX : n.location.pageY, u = i._getDraggableArea(), c = i._getValueFromPosition(l, u), d = e(t.target);
                        if (d.hasClass("k-draghandle"))return i.wrapper.find("." + U).removeClass(U + " " + W), void d.addClass(U + " " + W);
                        c < r.selectionStart ? (a = c, o = r.selectionEnd, s = i._firstHandleDrag) : c > i.selectionEnd ? (a = r.selectionStart, o = c, s = i._lastHandleDrag) : c - r.selectionStart <= r.selectionEnd - c ? (a = c, o = r.selectionEnd, s = i._firstHandleDrag) : (a = r.selectionStart, o = c, s = i._lastHandleDrag), s.dragstart(t), i._setValueInRange(a, o), i._focusWithMouse(s.element)
                    }
                }, i.wrapper.find(N + ", " + B).on(E, n).end().on(E, function () {
                    e(document.documentElement).one("selectstart", h.preventDefault)
                }).on(A, function () {
                    i._activeDragHandle && i._activeDragHandle._end()
                }), i.wrapper.find(R).attr($, 0).on(O, function () {
                    i._setTooltipTimeout()
                }).on(z, function (e) {
                    i._focusWithMouse(e.target), e.preventDefault()
                }).on(V, b(i._focus, i)).on(L, b(i._blur, i)), i.wrapper.find(R).off(H, h.preventDefault).eq(0).on(H, b(function (e) {
                    this._keydown(e, "firstHandle")
                }, i)).end().eq(1).on(H, b(function (e) {
                    this._keydown(e, "lastHandle")
                }, i)), i.options.enabled = !0)
            },
            disable: function () {
                var e = this;
                e.wrapper.removeClass(q).addClass(j), e.wrapper.find("input").prop(G, G), e.wrapper.find(N + ", " + B).off(E).off(A), e.wrapper.find(R).attr($, -1).off(O).off(H).off(z).off(V).off(L), e.options.enabled = !1
            },
            _keydown: function (e, t) {
                var n, i, r, a = this, o = a.options.selectionStart, s = a.options.selectionEnd;
                e.keyCode in a._keyMap && (a._clearTooltipTimeout(), "firstHandle" == t ? (r = a._activeHandleDrag = a._firstHandleDrag, o = a._keyMap[e.keyCode](o), o > s && (s = o)) : (r = a._activeHandleDrag = a._lastHandleDrag, s = a._keyMap[e.keyCode](s), o > s && (o = s)), a._setValueInRange(c(o), c(s)), n = Math.max(o, a.options.selectionStart), i = Math.min(s, a.options.selectionEnd), r.selectionEnd = Math.max(i, a.options.selectionStart), r.selectionStart = Math.min(n, a.options.selectionEnd), r._updateTooltip(a.value()[a._activeHandle]), e.preventDefault())
            },
            _update: function (e, t) {
                var n = this, i = n.value(), r = i[0] != e || i[1] != t;
                n.value([e, t]), r && n.trigger(S, {values: [e, t], value: [e, t]})
            },
            value: function (e) {
                return e && e.length ? this._value(e[0], e[1]) : this._value()
            },
            _value: function (e, t) {
                var n = this, i = n.options, r = i.selectionStart, a = i.selectionEnd;
                return isNaN(e) && isNaN(t) ? [r, a] : (e = c(e), t = c(t), void(e >= i.min && e <= i.max && t >= i.min && t <= i.max && e <= t && (r == e && a == t || (n.element.find("input").eq(0).prop("value", l(e)).end().eq(1).prop("value", l(t)), i.selectionStart = e, i.selectionEnd = t, n._refresh(), n._refreshAriaAttr(e, t)))))
            },
            values: function (e, t) {
                return y(e) ? this._value(e[0], e[1]) : this._value(e, t)
            },
            _refresh: function () {
                var e = this, t = e.options;
                e.trigger(M, {
                    values: [t.selectionStart, t.selectionEnd],
                    value: [t.selectionStart, t.selectionEnd]
                }), t.selectionStart == t.max && t.selectionEnd == t.max && e._setZIndex("firstHandle")
            },
            _refreshAriaAttr: function (e, t) {
                var n, i = this, r = i.wrapper.find(R), a = i._activeHandleDrag;
                n = i._getFormattedValue([e, t], a), r.eq(0).attr("aria-valuenow", e), r.eq(1).attr("aria-valuenow", t), r.attr("aria-valuetext", n)
            },
            _setValueInRange: function (e, t) {
                var n = this.options;
                e = k.max(k.min(e, n.max), n.min), t = k.max(k.min(t, n.max), n.min), e == n.max && t == n.max && this._setZIndex("firstHandle"), this._update(k.min(e, t), k.max(e, t))
            },
            _setZIndex: function (t) {
                this.wrapper.find(R).each(function (n) {
                    e(this).css("z-index", "firstHandle" == t ? 1 - n : n)
                })
            },
            _formResetHandler: function () {
                var e = this, t = e.options;
                setTimeout(function () {
                    var n = e.element.find("input"), i = n[0].value, r = n[1].value;
                    e.values("" === i || isNaN(i) ? t.min : i, "" === r || isNaN(r) ? t.max : r)
                })
            },
            destroy: function () {
                var e = this;
                J.fn.destroy.call(e), e.wrapper.off(I).find(N + ", " + B).off(I).end().find(R).off(I), e._firstHandleDrag.draggable.destroy(), e._lastHandleDrag.draggable.destroy()
            }
        });
        X.Selection = function (e, t, n) {
            function i(i) {
                i = i || [];
                var a = i[0] - n.min, o = i[1] - n.min, s = k.ceil(c(a / n.smallStep)), l = k.ceil(c(o / n.smallStep)), u = t._pixelSteps[s], d = t._pixelSteps[l], p = parseInt(e.eq(0)[t._outerSize]() / 2, 10), f = t._isRtl ? 2 : 0;
                e.eq(0).css(t._position, u - p - f).end().eq(1).css(t._position, d - p - f), r(u, d)
            }

            function r(e, n) {
                var i, r, a = t._trackDiv.find(".k-slider-selection");
                i = k.abs(e - n), a[t._sizeFn](i), t._isRtl ? (r = k.max(e, n), a.css("right", t._maxSelection - r - 1)) : (r = k.min(e, n), a.css(t._position, r - 1))
            }

            i(t.value()), t.bind([S, D, M], function (e) {
                i(e.values)
            })
        }, h.ui.plugin(X)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.mobile.scroller", ["kendo.fx", "kendo.draganddrop"], e)
}(function () {
    return function (e, t) {
        var n = window.kendo, i = n.mobile, r = n.effects, a = i.ui, o = e.proxy, s = e.extend, l = a.Widget, u = n.Class, c = n.ui.Movable, d = n.ui.Pane, p = n.ui.PaneDimensions, f = r.Transition, h = r.Animation, m = Math.abs, g = 500, v = .7, _ = .96, w = 10, b = 55, y = .5, k = 5, x = "km-scroller-release", C = "km-scroller-refresh", T = "pull", S = "change", D = "resize", I = "scroll", F = 2, E = h.extend({
            init: function (e) {
                var t = this;
                h.fn.init.call(t), s(t, e), t.userEvents.bind("gestureend", o(t.start, t)), t.tapCapture.bind("press", o(t.cancel, t))
            }, enabled: function () {
                return this.movable.scale < this.dimensions.minScale
            }, done: function () {
                return this.dimensions.minScale - this.movable.scale < .01
            }, tick: function () {
                var e = this.movable;
                e.scaleWith(1.1), this.dimensions.rescale(e.scale)
            }, onEnd: function () {
                var e = this.movable;
                e.scaleTo(this.dimensions.minScale), this.dimensions.rescale(e.scale)
            }
        }), O = h.extend({
            init: function (e) {
                var t = this;
                h.fn.init.call(t), s(t, e, {
                    transition: new f({
                        axis: e.axis, movable: e.movable, onEnd: function () {
                            t._end()
                        }
                    })
                }), t.tapCapture.bind("press", function () {
                    t.cancel()
                }), t.userEvents.bind("end", o(t.start, t)), t.userEvents.bind("gestureend", o(t.start, t)), t.userEvents.bind("tap", o(t.onEnd, t))
            }, onCancel: function () {
                this.transition.cancel()
            }, freeze: function (e) {
                var t = this;
                t.cancel(), t._moveTo(e)
            }, onEnd: function () {
                var e = this;
                e.paneAxis.outOfBounds() ? e._snapBack() : e._end()
            }, done: function () {
                return m(this.velocity) < 1
            }, start: function (e) {
                var t, n = this;
                n.dimension.enabled && (n.paneAxis.outOfBounds() ? n._snapBack() : (t = e.touch.id === F ? 0 : e.touch[n.axis].velocity, n.velocity = Math.max(Math.min(t * n.velocityMultiplier, b), -b), n.tapCapture.captureNext(), h.fn.start.call(n)))
            }, tick: function () {
                var e = this, t = e.dimension, n = e.paneAxis.outOfBounds() ? y : e.friction, i = e.velocity *= n, r = e.movable[e.axis] + i;
                !e.elastic && t.outOfBounds(r) && (r = Math.max(Math.min(r, t.max), t.min), e.velocity = 0), e.movable.moveAxis(e.axis, r)
            }, _end: function () {
                this.tapCapture.cancelCapture(), this.end()
            }, _snapBack: function () {
                var e = this, t = e.dimension, n = e.movable[e.axis] > t.max ? t.max : t.min;
                e._moveTo(n)
            }, _moveTo: function (e) {
                this.transition.moveTo({location: e, duration: g, ease: f.easeOutExpo})
            }
        }), A = h.extend({
            init: function (e) {
                var t = this;
                n.effects.Animation.fn.init.call(this), s(t, e, {origin: {}, destination: {}, offset: {}})
            }, tick: function () {
                this._updateCoordinates(), this.moveTo(this.origin)
            }, done: function () {
                return m(this.offset.y) < k && m(this.offset.x) < k
            }, onEnd: function () {
                this.moveTo(this.destination), this.callback && this.callback.call()
            }, setCoordinates: function (e, t) {
                this.offset = {}, this.origin = e, this.destination = t
            }, setCallback: function (e) {
                e && n.isFunction(e) ? this.callback = e : e = t
            }, _updateCoordinates: function () {
                this.offset = {
                    x: (this.destination.x - this.origin.x) / 4,
                    y: (this.destination.y - this.origin.y) / 4
                }, this.origin = {y: this.origin.y + this.offset.y, x: this.origin.x + this.offset.x}
            }
        }), M = u.extend({
            init: function (t) {
                var n = this, i = "x" === t.axis, r = e('<div class="km-touch-scrollbar km-' + (i ? "horizontal" : "vertical") + '-scrollbar" />');
                s(n, t, {
                    element: r,
                    elementSize: 0,
                    movable: new c(r),
                    scrollMovable: t.movable,
                    alwaysVisible: t.alwaysVisible,
                    size: i ? "width" : "height"
                }), n.scrollMovable.bind(S, o(n.refresh, n)), n.container.append(r), t.alwaysVisible && n.show()
            }, refresh: function () {
                var e = this, t = e.axis, n = e.dimension, i = n.size, r = e.scrollMovable, a = i / n.total, o = Math.round(-r[t] * a), s = Math.round(i * a);
                a >= 1 ? this.element.css("display", "none") : this.element.css("display", ""), o + s > i ? s = i - o : o < 0 && (s += o, o = 0), e.elementSize != s && (e.element.css(e.size, s + "px"), e.elementSize = s), e.movable.moveAxis(t, o)
            }, show: function () {
                this.element.css({opacity: v, visibility: "visible"})
            }, hide: function () {
                this.alwaysVisible || this.element.css({opacity: 0})
            }
        }), H = l.extend({
            init: function (t, i) {
                var r = this;
                if (l.fn.init.call(r, t, i), t = r.element, r._native = r.options.useNative && n.support.hasNativeScrolling, r._native)return t.addClass("km-native-scroller").prepend('<div class="km-scroll-header"/>'), void s(r, {
                    scrollElement: t,
                    fixedContainer: t.children().first()
                });
                t.css("overflow", "hidden").addClass("km-scroll-wrapper").wrapInner('<div class="km-scroll-container"/>').prepend('<div class="km-scroll-header"/>');
                var a = t.children().eq(1), u = new n.TapCapture(t), f = new c(a), h = new p({
                    element: a,
                    container: t,
                    forcedEnabled: r.options.zoom
                }), g = this.options.avoidScrolling, v = new n.UserEvents(t, {
                    touchAction: "pan-y",
                    fastTap: !0,
                    allowSelection: !0,
                    preventDragEvent: !0,
                    captureUpIfMoved: !0,
                    multiTouch: r.options.zoom,
                    start: function (t) {
                        h.refresh();
                        var n = m(t.x.velocity), i = m(t.y.velocity), a = 2 * n >= i, o = e.contains(r.fixedContainer[0], t.event.target), s = 2 * i >= n;
                        !o && !g(t) && r.enabled && (h.x.enabled && a || h.y.enabled && s) ? v.capture() : v.cancel()
                    }
                }), _ = new d({
                    movable: f,
                    dimensions: h,
                    userEvents: v,
                    elastic: r.options.elastic
                }), w = new E({movable: f, dimensions: h, userEvents: v, tapCapture: u}), b = new A({
                    moveTo: function (e) {
                        r.scrollTo(e.x, e.y)
                    }
                });
                f.bind(S, function () {
                    r.scrollTop = -f.y, r.scrollLeft = -f.x, r.trigger(I, {
                        scrollTop: r.scrollTop,
                        scrollLeft: r.scrollLeft
                    })
                }), r.options.mousewheelScrolling && t.on("DOMMouseScroll mousewheel", o(this, "_wheelScroll")), s(r, {
                    movable: f,
                    dimensions: h,
                    zoomSnapBack: w,
                    animatedScroller: b,
                    userEvents: v,
                    pane: _,
                    tapCapture: u,
                    pulled: !1,
                    enabled: !0,
                    scrollElement: a,
                    scrollTop: 0,
                    scrollLeft: 0,
                    fixedContainer: t.children().first()
                }), r._initAxis("x"), r._initAxis("y"), r._wheelEnd = function () {
                    r._wheel = !1, r.userEvents.end(0, r._wheelY)
                }, h.refresh(), r.options.pullToRefresh && r._initPullToRefresh()
            },
            _wheelScroll: function (e) {
                this._wheel || (this._wheel = !0, this._wheelY = 0, this.userEvents.press(0, this._wheelY)), clearTimeout(this._wheelTimeout), this._wheelTimeout = setTimeout(this._wheelEnd, 50);
                var t = n.wheelDeltaY(e);
                t && (this._wheelY += t, this.userEvents.move(0, this._wheelY)), e.preventDefault()
            },
            makeVirtual: function () {
                this.dimensions.y.makeVirtual()
            },
            virtualSize: function (e, t) {
                this.dimensions.y.virtualSize(e, t)
            },
            height: function () {
                return this.dimensions.y.size
            },
            scrollHeight: function () {
                return this.scrollElement[0].scrollHeight
            },
            scrollWidth: function () {
                return this.scrollElement[0].scrollWidth
            },
            options: {
                name: "Scroller",
                zoom: !1,
                pullOffset: 140,
                visibleScrollHints: !1,
                elastic: !0,
                useNative: !1,
                mousewheelScrolling: !0,
                avoidScrolling: function () {
                    return !1
                },
                pullToRefresh: !1,
                messages: {
                    pullTemplate: "Pull to refresh",
                    releaseTemplate: "Release to refresh",
                    refreshTemplate: "Refreshing"
                }
            },
            events: [T, I, D],
            _resize: function () {
                this._native || this.contentResized()
            },
            setOptions: function (e) {
                var t = this;
                l.fn.setOptions.call(t, e), e.pullToRefresh && t._initPullToRefresh()
            },
            reset: function () {
                this._native ? this.scrollElement.scrollTop(0) : (this.movable.moveTo({x: 0, y: 0}), this._scale(1))
            },
            contentResized: function () {
                this.dimensions.refresh(), this.pane.x.outOfBounds() && this.movable.moveAxis("x", this.dimensions.x.min), this.pane.y.outOfBounds() && this.movable.moveAxis("y", this.dimensions.y.min)
            },
            zoomOut: function () {
                var e = this.dimensions;
                e.refresh(), this._scale(e.fitScale), this.movable.moveTo(e.centerCoordinates())
            },
            enable: function () {
                this.enabled = !0
            },
            disable: function () {
                this.enabled = !1
            },
            scrollTo: function (e, t) {
                this._native ? (this.scrollElement.scrollLeft(m(e)), this.scrollElement.scrollTop(m(t))) : (this.dimensions.refresh(), this.movable.moveTo({
                    x: e,
                    y: t
                }))
            },
            animatedScrollTo: function (e, t, n) {
                var i, r;
                this._native ? this.scrollTo(e, t) : (i = {x: this.movable.x, y: this.movable.y}, r = {
                    x: e,
                    y: t
                }, this.animatedScroller.setCoordinates(i, r), this.animatedScroller.setCallback(n), this.animatedScroller.start())
            },
            pullHandled: function () {
                var e = this;
                e.refreshHint.removeClass(C), e.hintContainer.html(e.pullTemplate({})), e.yinertia.onEnd(), e.xinertia.onEnd(), e.userEvents.cancel()
            },
            destroy: function () {
                l.fn.destroy.call(this), this.userEvents && this.userEvents.destroy()
            },
            _scale: function (e) {
                this.dimensions.rescale(e), this.movable.scaleTo(e)
            },
            _initPullToRefresh: function () {
                var e = this;
                e.dimensions.y.forceEnabled(), e.pullTemplate = n.template(e.options.messages.pullTemplate), e.releaseTemplate = n.template(e.options.messages.releaseTemplate), e.refreshTemplate = n.template(e.options.messages.refreshTemplate), e.scrollElement.prepend('<span class="km-scroller-pull"><span class="km-icon"></span><span class="km-loading-left"></span><span class="km-loading-right"></span><span class="km-template">' + e.pullTemplate({}) + "</span></span>"), e.refreshHint = e.scrollElement.children().first(), e.hintContainer = e.refreshHint.children(".km-template"), e.pane.y.bind("change", o(e._paneChange, e)), e.userEvents.bind("end", o(e._dragEnd, e))
            },
            _dragEnd: function () {
                var e = this;
                e.pulled && (e.pulled = !1, e.refreshHint.removeClass(x).addClass(C), e.hintContainer.html(e.refreshTemplate({})), e.yinertia.freeze(e.options.pullOffset / 2), e.trigger("pull"))
            },
            _paneChange: function () {
                var e = this;
                e.movable.y / y > e.options.pullOffset ? e.pulled || (e.pulled = !0, e.refreshHint.removeClass(C).addClass(x), e.hintContainer.html(e.releaseTemplate({}))) : e.pulled && (e.pulled = !1, e.refreshHint.removeClass(x), e.hintContainer.html(e.pullTemplate({})))
            },
            _initAxis: function (e) {
                var t = this, n = t.movable, i = t.dimensions[e], r = t.tapCapture, a = t.pane[e], o = new M({
                    axis: e,
                    movable: n,
                    dimension: i,
                    container: t.element,
                    alwaysVisible: t.options.visibleScrollHints
                });
                i.bind(S, function () {
                    o.refresh()
                }), a.bind(S, function () {
                    o.show()
                }), t[e + "inertia"] = new O({
                    axis: e,
                    paneAxis: a,
                    movable: n,
                    tapCapture: r,
                    userEvents: t.userEvents,
                    dimension: i,
                    elastic: t.options.elastic,
                    friction: t.options.friction || _,
                    velocityMultiplier: t.options.velocityMultiplier || w,
                    end: function () {
                        o.hide(), t.trigger("scrollEnd", {axis: e, scrollTop: t.scrollTop, scrollLeft: t.scrollLeft})
                    }
                })
            }
        });
        a.plugin(H)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.autocomplete", ["kendo.list", "kendo.mobile.scroller"], e)
}(function () {
    return function (e, t) {
        function n(e, t, n) {
            return n ? t.substring(0, e).split(n).length - 1 : 0
        }

        function i(e, t, i) {
            return t.split(i)[n(e, t, i)]
        }

        function r(e, t, i, r, a) {
            var o = t.split(r);
            return o.splice(n(e, t, r), 1, i), r && "" !== o[o.length - 1] && o.push(""), o.join(a)
        }

        var a = window.kendo, o = a.support, s = a.caret, l = a._activeElement, u = o.placeholder, c = a.ui, d = c.List, p = a.keys, f = a.data.DataSource, h = "aria-disabled", m = "aria-readonly", g = "change", v = "k-state-default", _ = "disabled", w = "readonly", b = "k-state-focused", y = "k-state-selected", k = "k-state-disabled", x = "k-state-hover", C = ".kendoAutoComplete", T = "mouseenter" + C + " mouseleave" + C, S = e.proxy, D = d.extend({
            init: function (t, n) {
                var i, r, o = this;
                o.ns = C, n = e.isArray(n) ? {dataSource: n} : n, d.fn.init.call(o, t, n), t = o.element, n = o.options, n.placeholder = n.placeholder || t.attr("placeholder"), u && t.attr("placeholder", n.placeholder), o._wrapper(), o._loader(), o._clearButton(), o._dataSource(), o._ignoreCase(), t[0].type = "text", i = o.wrapper, o._popup(), t.addClass("k-input").on("keydown" + C, S(o._keydown, o)).on("keypress" + C, S(o._keypress, o)).on("paste" + C, S(o._search, o)).on("focus" + C, function () {
                    o._prev = o._accessor(), o._oldText = o._prev, o._placeholder(!1), i.addClass(b)
                }).on("focusout" + C, function () {
                    o._change(), o._placeholder(), i.removeClass(b)
                }).attr({
                    autocomplete: "off",
                    role: "textbox",
                    "aria-haspopup": !0
                }), o._clear.on("click" + C, S(o._clearValue, o)), o._enable(), o._old = o._accessor(), t[0].id && t.attr("aria-owns", o.ul[0].id), o._aria(), o._placeholder(), o._initList(), r = e(o.element).parents("fieldset").is(":disabled"), r && o.enable(!1), o.listView.bind("click", function (e) {
                    e.preventDefault()
                }), o._resetFocusItemHandler = e.proxy(o._resetFocusItem, o), a.notify(o)
            },
            options: {
                name: "AutoComplete",
                enabled: !0,
                suggest: !1,
                template: "",
                groupTemplate: "#:data#",
                fixedGroupTemplate: "#:data#",
                dataTextField: "",
                minLength: 1,
                enforceMinLength: !1,
                delay: 200,
                height: 200,
                filter: "startswith",
                ignoreCase: !0,
                highlightFirst: !1,
                separator: null,
                placeholder: "",
                animation: {},
                virtual: !1,
                value: null,
                clearButton: !0
            },
            _dataSource: function () {
                var e = this;
                e.dataSource && e._refreshHandler ? e._unbindDataSource() : (e._progressHandler = S(e._showBusy, e), e._errorHandler = S(e._hideBusy, e)), e.dataSource = f.create(e.options.dataSource).bind("progress", e._progressHandler).bind("error", e._errorHandler)
            },
            setDataSource: function (e) {
                this.options.dataSource = e, this._dataSource(), this.listView.setDataSource(this.dataSource)
            },
            events: ["open", "close", g, "select", "filtering", "dataBinding", "dataBound"],
            setOptions: function (e) {
                var t = this._listOptions(e);
                d.fn.setOptions.call(this, e), this.listView.setOptions(t), this._accessors(), this._aria()
            },
            _listOptions: function (t) {
                var n = d.fn._listOptions.call(this, e.extend(t, {skipUpdateOnBind: !0}));
                return n.dataValueField = n.dataTextField, n.selectedItemChange = null, n
            },
            _editable: function (e) {
                var t = this, n = t.element, i = t.wrapper.off(C), r = e.readonly, a = e.disable;
                r || a ? (i.addClass(a ? k : v).removeClass(a ? v : k), n.attr(_, a).attr(w, r).attr(h, a).attr(m, r)) : (i.addClass(v).removeClass(k).on(T, t._toggleHover), n.removeAttr(_).removeAttr(w).attr(h, !1).attr(m, !1))
            },
            close: function () {
                var e = this, t = e.listView.focus();
                t && t.removeClass(y), e.popup.close()
            },
            destroy: function () {
                var e = this;
                e.element.off(C), e._clear.off(C), e.wrapper.off(C), d.fn.destroy.call(e)
            },
            refresh: function () {
                this.listView.refresh()
            },
            select: function (e) {
                this._select(e)
            },
            search: function (t) {
                var n, r = this, a = r.options, o = a.ignoreCase, l = r._separator();
                t = t || r._accessor(), clearTimeout(r._typingTimeout), l && (t = i(s(r.element)[0], t, l)), n = t.length, (!a.enforceMinLength && !n || n >= a.minLength) && (r._open = !0, r._mute(function () {
                    this.listView.value([])
                }), r._filterSource({
                    value: o ? t.toLowerCase() : t,
                    operator: a.filter,
                    field: a.dataTextField,
                    ignoreCase: o
                }), r.one("close", e.proxy(r._unifySeparators, r)))
            },
            suggest: function (e) {
                var i, r = this, a = r._last, o = r._accessor(), u = r.element[0], c = s(u)[0], f = r._separator(), h = o.split(f), m = n(c, o, f), g = c;
                return a == p.BACKSPACE || a == p.DELETE ? void(r._last = t) : (e = e || "", "string" != typeof e && (e[0] && (e = r.dataSource.view()[d.inArray(e[0], r.ul[0])]), e = e ? r._text(e) : ""), c <= 0 && (c = o.toLowerCase().indexOf(e.toLowerCase()) + 1), i = o.substring(0, c).lastIndexOf(f), i = i > -1 ? c - (i + f.length) : c, o = h[m].substring(0, i), e && (e = e.toString(), i = e.toLowerCase().indexOf(o.toLowerCase()), i > -1 && (e = e.substring(i + o.length), g = c + e.length, o += e), f && "" !== h[h.length - 1] && h.push("")), h[m] = o, r._accessor(h.join(f || "")), void(u === l() && s(u, c, g)))
            },
            value: function (e) {
                return e === t ? this._accessor() : (this.listView.value(e), this._accessor(e), this._old = this._accessor(), this._oldText = this._accessor(), void 0)
            },
            _click: function (e) {
                var t = e.item, n = this.element, i = this.listView.dataItemByIndex(this.listView.getElementIndex(t));
                return e.preventDefault(), this._active = !0, this.trigger("select", {
                    dataItem: i,
                    item: t
                }) ? void this.close() : (this._oldText = n.val(), this._select(t), this._blur(), void s(n, n.val().length))
            },
            _clearText: e.noop,
            _resetFocusItem: function () {
                var e = this.options.highlightFirst ? 0 : -1;
                this.options.virtual && this.listView.scrollTo(0), this.listView.focus(e)
            },
            _listBound: function () {
                var e, n = this, i = n.popup, r = n.options, a = n.dataSource.flatView(), o = a.length, s = n.element[0] === l();
                n._renderFooter(), n._renderNoData(), n._toggleNoData(!a.length), n._resizePopup(), i.position(), o && r.suggest && s && n.suggest(a[0]), n._open && (n._open = !1, e = n._allowOpening() ? "open" : "close", n._typingTimeout && !s && (e = "close"), o && (n._resetFocusItem(), r.virtual && n.popup.unbind("activate", n._resetFocusItemHandler).one("activate", n._resetFocusItemHandler)), i[e](), n._typingTimeout = t), n._touchScroller && n._touchScroller.reset(), n._hideBusy(), n._makeUnselectable(), n.trigger("dataBound")
            },
            _mute: function (e) {
                this._muted = !0, e.call(this), this._muted = !1
            },
            _listChange: function () {
                var e = this._active || this.element[0] === l();
                e && !this._muted && this._selectValue(this.listView.selectedDataItems()[0])
            },
            _selectValue: function (e) {
                var t = this._separator(), n = "";
                e && (n = this._text(e)), null === n && (n = ""), t && (n = r(s(this.element)[0], this._accessor(), n, t, this._defaultSeparator())), this._prev = n, this._accessor(n), this._placeholder()
            },
            _unifySeparators: function () {
                return this._accessor(this.value().split(this._separator()).join(this._defaultSeparator())), this
            },
            _change: function () {
                var e = this, t = e._unifySeparators().value(), n = t !== d.unifyType(e._old, typeof t), i = n && !e._typing, r = e._oldText !== t;
                e._old = t, e._oldText = t, (i || r) && e.element.trigger(g), n && e.trigger(g), e.typing = !1
            },
            _accessor: function (e) {
                var n = this, i = n.element[0];
                return e === t ? (e = i.value, i.className.indexOf("k-readonly") > -1 && e === n.options.placeholder ? "" : e) : (i.value = null === e ? "" : e, void n._placeholder())
            },
            _keydown: function (e) {
                var t = this, n = e.keyCode, i = t.listView, r = t.popup.visible(), a = i.focus();
                if (t._last = n, n === p.DOWN)r && this._move(a ? "focusNext" : "focusFirst"), e.preventDefault(); else if (n === p.UP)r && this._move(a ? "focusPrev" : "focusLast"), e.preventDefault(); else if (n === p.ENTER || n === p.TAB) {
                    if (n === p.ENTER && r && e.preventDefault(), r && a) {
                        var o = i.dataItemByIndex(i.getElementIndex(a));
                        if (t.trigger("select", {dataItem: o, item: a}))return;
                        this._select(a)
                    }
                    this._blur()
                } else if (n === p.ESC)r && e.preventDefault(), t.close(); else if (!t.popup.visible() || n !== p.PAGEDOWN && n !== p.PAGEUP)t._search(); else {
                    e.preventDefault();
                    var s = n === p.PAGEDOWN ? 1 : -1;
                    i.scrollWith(s * i.screenHeight())
                }
            },
            _keypress: function () {
                this._oldText = this.element.val(), this._typing = !0
            },
            _move: function (e) {
                this.listView[e](), this.options.suggest && this.suggest(this.listView.focus())
            },
            _hideBusy: function () {
                var e = this;
                clearTimeout(e._busy), e._loading.hide(), e.element.attr("aria-busy", !1), e._busy = null, e._showClear()
            },
            _showBusy: function () {
                var e = this;
                e._busy || (e._busy = setTimeout(function () {
                    e.element.attr("aria-busy", !0), e._loading.show(), e._hideClear()
                }, 100))
            },
            _placeholder: function (e) {
                if (!u) {
                    var n, i = this, r = i.element, a = i.options.placeholder;
                    if (a) {
                        if (n = r.val(), e === t && (e = !n), e || (a = n !== a ? n : ""), n === i._old && !e)return;
                        r.toggleClass("k-readonly", e).val(a), a || r[0] !== document.activeElement || s(r[0], 0, 0)
                    }
                }
            },
            _separator: function () {
                var e = this.options.separator;
                return e instanceof Array ? new RegExp(e.join("|"), "gi") : e
            },
            _defaultSeparator: function () {
                var e = this.options.separator;
                return e instanceof Array ? e[0] : e
            },
            _inputValue: function () {
                return this.element.val()
            },
            _search: function () {
                var e = this;
                clearTimeout(e._typingTimeout), e._typingTimeout = setTimeout(function () {
                    e._prev !== e._accessor() && (e._prev = e._accessor(), e.search())
                }, e.options.delay)
            },
            _select: function (e) {
                this._active = !0, this.listView.select(e), this._active = !1
            },
            _loader: function () {
                this._loading = e('<span class="k-icon k-i-loading" style="display:none"></span>').insertAfter(this.element)
            },
            _clearButton: function () {
                this._clear = e('<span unselectable="on" class="k-icon k-i-close" title="clear"></span>').attr({
                    role: "button",
                    tabIndex: -1
                }), this.options.clearButton && this._clear.insertAfter(this.element)
            },
            _toggleHover: function (t) {
                e(t.currentTarget).toggleClass(x, "mouseenter" === t.type)
            },
            _wrapper: function () {
                var e, t = this, n = t.element, i = n[0];
                e = n.parent(), e.is("span.k-widget") || (e = n.wrap("<span />").parent()), e.attr("tabindex", -1), e.attr("role", "presentation"), e[0].style.cssText = i.style.cssText, n.css({
                    width: "100%",
                    height: i.style.height
                }), t._focused = t.element, t.wrapper = e.addClass("k-widget k-autocomplete k-header").addClass(i.className)
            }
        });
        c.plugin(D)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.combobox", ["kendo.list", "kendo.mobile.scroller"], e)
}(function () {
    return function (e, t) {
        var n = window.kendo, i = n.ui, r = i.List, a = i.Select, o = n.caret, s = n.support, l = s.placeholder, u = n._activeElement, c = n.keys, d = ".kendoComboBox", p = "click" + d, f = "mousedown" + d, h = "disabled", m = "readonly", g = "change", v = "k-state-default", _ = "k-state-focused", w = "k-state-disabled", b = "aria-disabled", y = "filter", k = "accept", x = "rebind", C = "mouseenter" + d + " mouseleave" + d, T = e.proxy, S = a.extend({
            init: function (t, i) {
                var r, o, s = this;
                s.ns = d, i = e.isArray(i) ? {dataSource: i} : i, a.fn.init.call(s, t, i), i = s.options, t = s.element.on("focus" + d, T(s._focusHandler, s)), i.placeholder = i.placeholder || t.attr("placeholder"), s._reset(), s._wrapper(), s._input(), s._clearButton(), s._tabindex(s.input), s._popup(), s._dataSource(), s._ignoreCase(), s._enable(), s._oldIndex = s.selectedIndex = -1, s._aria(), s._initialIndex = i.index, s.requireValueMapper(s.options), s._initList(), s._cascade(), i.autoBind ? s._filterSource() : (r = i.text, !r && s._isSelect && (r = t.children(":selected").text()), r && s._setText(r)), r || s._placeholder(), o = e(s.element).parents("fieldset").is(":disabled"), o && s.enable(!1), n.notify(s)
            },
            options: {
                name: "ComboBox",
                enabled: !0,
                index: -1,
                text: null,
                value: null,
                autoBind: !0,
                delay: 200,
                dataTextField: "",
                dataValueField: "",
                minLength: 1,
                enforceMinLength: !1,
                height: 200,
                highlightFirst: !0,
                filter: "none",
                placeholder: "",
                suggest: !1,
                cascadeFrom: "",
                cascadeFromField: "",
                ignoreCase: !0,
                animation: {},
                virtual: !1,
                template: null,
                groupTemplate: "#:data#",
                fixedGroupTemplate: "#:data#",
                clearButton: !0
            },
            events: ["open", "close", g, "select", "filtering", "dataBinding", "dataBound", "cascade", "set"],
            setOptions: function (e) {
                a.fn.setOptions.call(this, e), this.listView.setOptions(e), this._accessors(), this._aria()
            },
            destroy: function () {
                var e = this;
                e.input.off(d), e.element.off(d), e._inputWrapper.off(d), clearTimeout(e._pasteTimeout), e._arrow.off(p + " " + f), e._clear.off(p + " " + f), a.fn.destroy.call(e)
            },
            _focusHandler: function () {
                this.input.focus()
            },
            _arrowClick: function () {
                this._toggle()
            },
            _inputFocus: function () {
                this._inputWrapper.addClass(_), this._placeholder(!1)
            },
            _inputFocusout: function () {
                var e = this, t = e.value();
                e._inputWrapper.removeClass(_), clearTimeout(e._typingTimeout), e._typingTimeout = null, e.text(e.text());
                var n = e._focus(), i = this.listView.dataItemByIndex(this.listView.getElementIndex(n));
                return t !== e.value() && e.trigger("select", {
                    dataItem: i,
                    item: n
                }) ? void e.value(t) : (e._placeholder(), e._blur(), void e.element.blur())
            },
            _inputPaste: function () {
                var e = this;
                clearTimeout(e._pasteTimeout), e._pasteTimeout = null, e._pasteTimeout = setTimeout(function () {
                    e.search()
                })
            },
            _editable: function (e) {
                var t = this, n = e.disable, i = e.readonly, r = t._inputWrapper.off(d), a = t.element.add(t.input.off(d)), o = t._arrow.off(p + " " + f), s = t._clear;
                i || n ? (r.addClass(n ? w : v).removeClass(n ? v : w), a.attr(h, n).attr(m, i).attr(b, n)) : (r.addClass(v).removeClass(w).on(C, t._toggleHover), a.removeAttr(h).removeAttr(m).attr(b, !1), o.on(p, T(t._arrowClick, t)).on(f, function (e) {
                    e.preventDefault()
                }), s.on(p, T(t._clearValue, t)).on(f, function (e) {
                    e.preventDefault()
                }), t.input.on("keydown" + d, T(t._keydown, t)).on("focus" + d, T(t._inputFocus, t)).on("focusout" + d, T(t._inputFocusout, t)).on("paste" + d, T(t._inputPaste, t)))
            },
            open: function () {
                var e = this, t = e._state;
                e.popup.visible() || (!e.listView.bound() && t !== y || t === k ? (e._open = !0, e._state = x, 1 !== e.options.minLength ? (e.refresh(), e.popup.open()) : e._filterSource()) : e._allowOpening() && (e.popup.open(), e._focusItem()))
            },
            _updateSelectionState: function () {
                var e = this, n = e.options.text, i = e.options.value;
                e.listView.isFiltered() || (e.selectedIndex === -1 ? (n !== t && null !== n || (n = i), e._accessor(i), e.input.val(n || e.input.val()), e._placeholder()) : e._oldIndex === -1 && (e._oldIndex = e.selectedIndex))
            },
            _buildOptions: function (e) {
                var n = this;
                if (n._isSelect) {
                    var i = n._customOption;
                    n._state === x && (n._state = ""), n._customOption = t, n._options(e, "", n.value()), i && i[0].selected && n._custom(i.val())
                }
            },
            _updateSelection: function () {
                var t = this, n = t.listView, i = t._initialIndex, r = null !== i && i > -1, a = t._state === y;
                if (a)return void e(n.focus()).removeClass("k-state-selected");
                if (!t._fetch) {
                    n.value().length || (r ? t.select(i) : t._accessor() && n.value(t._accessor())), t._initialIndex = null;
                    var o = n.selectedDataItems()[0];
                    o && (t._value(o) !== t.value() && t._custom(t._value(o)), t.text() && t.text() !== t._text(o) && t._selectValue(o))
                }
            },
            _updateItemFocus: function () {
                var e = this.listView;
                this.options.highlightFirst ? e.focus() || e.focusIndex() || e.focus(0) : e.focus(-1)
            },
            _listBound: function () {
                var e = this, n = e.input[0] === u(), i = e.dataSource.flatView(), r = e.listView.skip(), a = r === t || 0 === r;
                e._presetValue = !1, e._renderFooter(), e._renderNoData(), e._toggleNoData(!i.length), e._resizePopup(), e.popup.position(), e._buildOptions(i), e._makeUnselectable(), e._updateSelection(), i.length && a && (e._updateItemFocus(), e.options.suggest && n && e.input.val() && e.suggest(i[0])), e._open && (e._open = !1, e._typingTimeout && !n ? e.popup.close() : e.toggle(e._allowOpening()), e._typingTimeout = null), e._hideBusy(), e.trigger("dataBound")
            },
            _listChange: function () {
                this._selectValue(this.listView.selectedDataItems()[0]), this._presetValue && (this._oldIndex = this.selectedIndex)
            },
            _get: function (e) {
                var t, n, i;
                if ("function" == typeof e) {
                    for (t = this.dataSource.flatView(), i = 0; i < t.length; i++)if (e(t[i])) {
                        e = i, n = !0;
                        break
                    }
                    n || (e = -1)
                }
                return e
            },
            _select: function (e, t) {
                e = this._get(e), e === -1 && (this.input[0].value = "", this._accessor("")), this.listView.select(e), t || this._state !== y || (this._state = k)
            },
            _selectValue: function (e) {
                var n = this.listView.select(), i = "", r = "";
                n = n[n.length - 1], n === t && (n = -1), this.selectedIndex = n, n !== -1 || e ? (e && (i = this._dataValue(e), r = this._text(e)), null === i && (i = "")) : (i = r = this.input[0].value, this.listView.focus(-1)), this._prev = this.input[0].value = r, this._accessor(i !== t ? i : r, n), this._placeholder(), this._triggerCascade()
            },
            refresh: function () {
                this.listView.refresh()
            },
            suggest: function (e) {
                var n, i = this, a = i.input[0], s = i.text(), l = o(a)[0], d = i._last;
                return d == c.BACKSPACE || d == c.DELETE ? void(i._last = t) : (e = e || "", "string" != typeof e && (e[0] && (e = i.dataSource.view()[r.inArray(e[0], i.ul[0])]), e = e ? i._text(e) : ""), l <= 0 && (l = s.toLowerCase().indexOf(e.toLowerCase()) + 1), e ? (e = e.toString(), n = e.toLowerCase().indexOf(s.toLowerCase()), n > -1 && (s += e.substring(n + s.length))) : s = s.substring(0, l), void(s.length === l && e || (a.value = s, a === u() && o(a, l, s.length))))
            },
            text: function (e) {
                e = null === e ? "" : e;
                var n, i, a = this, o = a.input[0], s = a.options.ignoreCase, l = e;
                return e === t ? o.value : a.options.autoBind !== !1 || a.listView.bound() ? (n = a.dataItem(), n && a._text(n) === e && (i = a._value(n), i === r.unifyType(a._old, typeof i)) ? void a._triggerCascade() : (s && (l = l.toLowerCase()), a._select(function (e) {
                    return e = a._text(e), s && (e = (e + "").toLowerCase()), e === l
                }), a.selectedIndex < 0 && (a._accessor(e), o.value = e, a._triggerCascade()), void(a._prev = o.value))) : void a._setText(e)
            },
            toggle: function (e) {
                this._toggle(e, !0)
            },
            value: function (e) {
                var n = this, i = n.options, r = n.listView;
                return e === t ? (e = n._accessor() || n.listView.value()[0], e === t || null === e ? "" : e) : (n.requireValueMapper(n.options, e), n.trigger("set", {value: e}), void(e === i.value && n.input.val() === i.text || (n._accessor(e), n._isFilterEnabled() && r.bound() && r.isFiltered() ? n._clearFilter() : n._fetchData(), r.value(e).done(function () {
                    n.selectedIndex === -1 && (n._accessor(e), n.input.val(e), n._placeholder(!0)), n._old = n._accessor(), n._oldIndex = n.selectedIndex, n._prev = n.input.val(), n._state === y && (n._state = k)
                }))))
            },
            _click: function (e) {
                var t = e.item, n = this.listView.dataItemByIndex(this.listView.getElementIndex(t));
                return e.preventDefault(), this.trigger("select", {
                    dataItem: n,
                    item: t
                }) ? void this.close() : (this._userTriggered = !0, this._select(t), void this._blur())
            },
            _inputValue: function () {
                return this.text()
            },
            _searchByWord: function (e) {
                var n = this, i = n.options, r = n.dataSource, a = i.ignoreCase, o = function (i) {
                    var r = n._text(i);
                    if (r !== t)return r += "", ("" === r || "" !== e) && (a && (r = r.toLowerCase()), 0 === r.indexOf(e))
                };
                if (a && (e = e.toLowerCase()), !n.ul[0].firstChild)return void r.one(g, function () {
                    r.view()[0] && n.search(e)
                }).fetch();
                this.listView.focus(this._get(o));
                var s = this.listView.focus();
                s && (i.suggest && n.suggest(s), this.open()), this.options.highlightFirst && !e && this.listView.focusFirst()
            },
            _input: function () {
                var t, n, i = this, r = i.element.removeClass("k-input")[0], a = r.accessKey, o = i.wrapper, s = "input.k-input", u = r.name || "";
                u && (u = 'name="' + u + '_input" '), t = o.find(s), t[0] || (o.append('<span tabindex="-1" unselectable="on" class="k-dropdown-wrap k-state-default"><input ' + u + 'class="k-input" type="text" autocomplete="off"/><span unselectable="on" class="k-select" aria-label="select"><span class="k-icon k-i-arrow-s"></span></span></span>').append(i.element), t = o.find(s)), t[0].style.cssText = r.style.cssText, t[0].title = r.title, n = parseInt(this.element.prop("maxlength") || this.element.attr("maxlength"), 10), n > -1 && (t[0].maxLength = n), t.addClass(r.className).css({
                    width: "100%",
                    height: r.style.height
                }).attr({
                    role: "combobox",
                    "aria-expanded": !1
                }).show(), l && t.attr("placeholder", i.options.placeholder), a && (r.accessKey = "", t[0].accessKey = a), i._focused = i.input = t, i._inputWrapper = e(o[0].firstChild), i._arrow = o.find(".k-select").attr({
                    role: "button",
                    tabIndex: -1
                }), r.id && i._arrow.attr("aria-controls", i.ul[0].id)
            },
            _clearButton: function () {
                this._clear = e('<span unselectable="on" class="k-icon k-i-close" title="clear"></span>').attr({
                    role: "button",
                    tabIndex: -1
                }), this.options.clearButton && this._clear.insertAfter(this.input)
            },
            _keydown: function (e) {
                var t = this, n = e.keyCode;
                t._last = n, clearTimeout(t._typingTimeout), t._typingTimeout = null, n == c.TAB || t._move(e) || t._search()
            },
            _placeholder: function (e) {
                if (!l) {
                    var n, i = this, r = i.input, a = i.options.placeholder;
                    if (a) {
                        if (n = i.value(), e === t && (e = !n), r.toggleClass("k-readonly", e), !e) {
                            if (n)return;
                            a = ""
                        }
                        r.val(a), a || r[0] !== u() || o(r[0], 0, 0)
                    }
                }
            },
            _search: function () {
                var e = this;
                e._typingTimeout = setTimeout(function () {
                    var t = e.text();
                    e._prev !== t && (e._prev = t, "none" === e.options.filter && e.listView.select(-1), e.search(t)), e._typingTimeout = null
                }, e.options.delay)
            },
            _setText: function (e) {
                this.input.val(e), this._prev = e
            },
            _wrapper: function () {
                var e = this, t = e.element, n = t.parent();
                n.is("span.k-widget") || (n = t.hide().wrap("<span />").parent(), n[0].style.cssText = t[0].style.cssText), e.wrapper = n.addClass("k-widget k-combobox k-header").addClass(t[0].className).css("display", "")
            },
            _clearSelection: function (e, t) {
                var n = this, i = e.value(), r = i && e.selectedIndex === -1;
                this.selectedIndex == -1 && this.value() || (t || !i || r) && (n.options.value = "", n.value(""))
            },
            _preselect: function (e, t) {
                this.input.val(t), this._accessor(e), this._old = this._accessor(), this._oldIndex = this.selectedIndex, this.listView.setValue(e), this._placeholder(), this._initialIndex = null, this._presetValue = !0
            }
        });
        i.plugin(S)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.dropdownlist", ["kendo.list", "kendo.mobile.scroller"], e)
}(function () {
    return function (e, t) {
        function n(e, t, n) {
            for (var i, r = 0, a = t.length - 1; r < a; ++r)i = t[r], i in e || (e[i] = {}), e = e[i];
            e[t[a]] = n
        }

        function i(e, t) {
            return e >= t && (e -= t), e
        }

        function r(e, t) {
            for (var n = 0; n < e.length; n++)if (e.charAt(n) !== t)return !1;
            return !0
        }

        var a = window.kendo, o = a.ui, s = o.List, l = o.Select, u = a.support, c = a._activeElement, d = a.data.ObservableObject, p = a.keys, f = ".kendoDropDownList", h = "disabled", m = "readonly", g = "change", v = "k-state-focused", _ = "k-state-default", w = "k-state-disabled", b = "aria-disabled", y = "mouseenter" + f + " mouseleave" + f, k = "tabindex", x = "filter", C = "accept", T = "The `optionLabel` option is not valid due to missing fields. Define a custom optionLabel as shown here http://docs.telerik.com/kendo-ui/api/javascript/ui/dropdownlist#configuration-optionLabel", S = e.proxy, D = l.extend({
            init: function (n, i) {
                var r, o, s, u = this, c = i && i.index;
                u.ns = f, i = e.isArray(i) ? {dataSource: i} : i, l.fn.init.call(u, n, i), i = u.options, n = u.element.on("focus" + f, S(u._focusHandler, u)), u._focusInputHandler = e.proxy(u._focusInput, u), u.optionLabel = e(), u._optionLabel(), u._inputTemplate(), u._reset(), u._prev = "", u._word = "", u._wrapper(), u._tabindex(), u.wrapper.data(k, u.wrapper.attr(k)), u._span(), u._popup(), u._mobile(), u._dataSource(), u._ignoreCase(), u._filterHeader(), u._aria(), u._enable(), u._oldIndex = u.selectedIndex = -1, c !== t && (i.index = c), u._initialIndex = i.index, u.requireValueMapper(u.options), u._initList(), u._cascade(), i.autoBind ? u.dataSource.fetch() : u.selectedIndex === -1 && (o = i.text || "", o || (r = i.optionLabel, r && 0 === i.index ? o = r : u._isSelect && (o = n.children(":selected").text())), u._textAccessor(o)), s = e(u.element).parents("fieldset").is(":disabled"), s && u.enable(!1), u.listView.bind("click", function (e) {
                    e.preventDefault()
                }), a.notify(u)
            },
            options: {
                name: "DropDownList",
                enabled: !0,
                autoBind: !0,
                index: 0,
                text: null,
                value: null,
                delay: 500,
                height: 200,
                dataTextField: "",
                dataValueField: "",
                optionLabel: "",
                cascadeFrom: "",
                cascadeFromField: "",
                ignoreCase: !0,
                animation: {},
                filter: "none",
                minLength: 1,
                enforceMinLength: !1,
                virtual: !1,
                template: null,
                valueTemplate: null,
                optionLabelTemplate: null,
                groupTemplate: "#:data#",
                fixedGroupTemplate: "#:data#"
            },
            events: ["open", "close", g, "select", "filtering", "dataBinding", "dataBound", "cascade", "set"],
            setOptions: function (e) {
                l.fn.setOptions.call(this, e), this.listView.setOptions(this._listOptions(e)), this._optionLabel(), this._inputTemplate(), this._accessors(), this._filterHeader(), this._enable(), this._aria(), !this.value() && this.hasOptionLabel() && this.select(0)
            },
            destroy: function () {
                var e = this;
                l.fn.destroy.call(e), e.wrapper.off(f), e.element.off(f), e._inputWrapper.off(f), e._arrow.off(), e._arrow = null, e.optionLabel.off()
            },
            open: function () {
                var e = this;
                e.popup.visible() || (e.listView.bound() && e._state !== C ? e._allowOpening() && (e.popup.one("activate", e._focusInputHandler), e.popup.open(), e.filterInput && e._resizeFilterInput(), e._focusItem()) : (e._open = !0, e._state = "rebind", e.filterInput && (e.filterInput.val(""), e._prev = ""), e.filterInput && 1 !== e.options.minLength ? (e.refresh(), e.popup.one("activate", e._focusInputHandler), e.popup.open(), e.filterInput && e._resizeFilterInput()) : e._filterSource()))
            },
            _focusInput: function () {
                this._focusElement(this.filterInput)
            },
            _resizeFilterInput: function () {
                this.filterInput.css("display", "none"), this.filterInput.css("width", this.popup.element.css("width")), this.filterInput.css("display", "inline-block")
            },
            _allowOpening: function () {
                return this.hasOptionLabel() || this.filterInput || l.fn._allowOpening.call(this)
            },
            toggle: function (e) {
                this._toggle(e, !0)
            },
            current: function (e) {
                var n;
                return e === t ? (n = this.listView.focus(), !n && 0 === this.selectedIndex && this.hasOptionLabel() ? this.optionLabel : n) : void this._focus(e)
            },
            dataItem: function (n) {
                var i = this, r = null;
                if (null === n)return n;
                if (n === t)r = i.listView.selectedDataItems()[0]; else {
                    if ("number" != typeof n) {
                        if (i.options.virtual)return i.dataSource.getByUid(e(n).data("uid"));
                        n = n.hasClass("k-list-optionlabel") ? -1 : e(i.items()).index(n)
                    } else i.hasOptionLabel() && (n -= 1);
                    r = i.dataSource.flatView()[n]
                }
                return r || (r = i._optionLabelDataItem()), r
            },
            refresh: function () {
                this.listView.refresh()
            },
            text: function (e) {
                var n, i, r = this, a = r.options.ignoreCase;
                return e = null === e ? "" : e, e === t ? r._textAccessor() : ("string" == typeof e && (i = a ? e.toLowerCase() : e, r._select(function (e) {
                    return e = r._text(e), a && (e = (e + "").toLowerCase()), e === i
                }), n = r.dataItem(), n && (e = n)), void r._textAccessor(e))
            },
            _clearFilter: function () {
                e(this.filterInput).val(""), l.fn._clearFilter.call(this)
            },
            value: function (e) {
                var n = this, i = n.listView, r = n.dataSource;
                return e === t ? (e = n._accessor() || n.listView.value()[0], e === t || null === e ? "" : e) : (n.requireValueMapper(n.options, e), !e && n.hasOptionLabel() || (n._initialIndex = null), this.trigger("set", {value: e}), n._request && n.options.cascadeFrom && n.listView.bound() ? (n._valueSetter && r.unbind(g, n._valueSetter), n._valueSetter = S(function () {
                    n.value(e)
                }, n), void r.one(g, n._valueSetter)) : (n._isFilterEnabled() && i.bound() && i.isFiltered() ? n._clearFilter() : n._fetchData(), void i.value(e).done(function () {
                    n.selectedIndex === -1 && n.text() && (n.text(""), n._accessor("", -1)), n._old = n._accessor(), n._oldIndex = n.selectedIndex
                })))
            },
            hasOptionLabel: function () {
                return this.optionLabel && !!this.optionLabel[0]
            },
            _optionLabel: function () {
                var t = this, n = t.options, i = n.optionLabel, r = n.optionLabelTemplate;
                return i ? (r || (r = "#:", r += "string" == typeof i ? "data" : a.expr(n.dataTextField, "data"), r += "#"), "function" != typeof r && (r = a.template(r)), t.optionLabelTemplate = r, t.hasOptionLabel() || (t.optionLabel = e('<div class="k-list-optionlabel"></div>').prependTo(t.list)), t.optionLabel.html(r(i)).off().click(S(t._click, t)).on(y, t._toggleHover), void t.angular("compile", function () {
                    return {elements: t.optionLabel, data: [{dataItem: t._optionLabelDataItem()}]}
                })) : (t.optionLabel.off().remove(), void(t.optionLabel = e()))
            },
            _optionLabelText: function () {
                var e = this.options.optionLabel;
                return "string" == typeof e ? e : this._text(e)
            },
            _optionLabelDataItem: function () {
                var t = this, n = t.options.optionLabel;
                return t.hasOptionLabel() ? e.isPlainObject(n) ? new d(n) : t._assignInstance(t._optionLabelText(), "") : null
            },
            _buildOptions: function (e) {
                var n = this;
                if (n._isSelect) {
                    var i = n.listView.value()[0], r = n._optionLabelDataItem(), a = r && n._value(r);
                    i !== t && null !== i || (i = ""), r && (a !== t && null !== a || (a = ""), r = '<option value="' + a + '">' + n._text(r) + "</option>"), n._options(e, r, i), i !== s.unifyType(n._accessor(), typeof i) && (n._customOption = null, n._custom(i))
                }
            },
            _listBound: function () {
                var e, t = this, n = t._initialIndex, i = t._state === x, r = t.dataSource.flatView();
                t._presetValue = !1, t._renderFooter(), t._renderNoData(), t._toggleNoData(!r.length), t._resizePopup(!0), t.popup.position(), t._buildOptions(r), t._makeUnselectable(), i || (t._open && t.toggle(t._allowOpening()), t._open = !1, t._fetch || (r.length ? (!t.listView.value().length && n > -1 && null !== n && t.select(n), t._initialIndex = null, e = t.listView.selectedDataItems()[0], e && t.text() !== t._text(e) && t._selectValue(e)) : t._textAccessor() !== t._optionLabelText() && (t.listView.value(""), t._selectValue(null), t._oldIndex = t.selectedIndex))), t._hideBusy(), t.trigger("dataBound")
            },
            _listChange: function () {
                this._selectValue(this.listView.selectedDataItems()[0]), (this._presetValue || this._old && this._oldIndex === -1) && (this._oldIndex = this.selectedIndex)
            },
            _filterPaste: function () {
                this._search()
            },
            _focusHandler: function () {
                this.wrapper.focus()
            },
            _focusinHandler: function () {
                this._inputWrapper.addClass(v), this._prevent = !1
            },
            _focusoutHandler: function () {
                var e = this, t = e._state === x, n = window.self !== window.top, i = e._focus(), r = e._getElementDataItem(i);
                e._prevent || (clearTimeout(e._typingTimeout), t || !i || e.trigger("select", {
                    dataItem: r,
                    item: i
                }) || e._select(i, !e.dataSource.view().length), u.mobileOS.ios && n ? e._change() : e._blur(), e._inputWrapper.removeClass(v), e._prevent = !0, e._open = !1, e.element.blur())
            },
            _wrapperMousedown: function () {
                this._prevent = !!this.filterInput
            },
            _wrapperClick: function (e) {
                e.preventDefault(), this.popup.unbind("activate", this._focusInputHandler), this._focused = this.wrapper, this._toggle()
            },
            _editable: function (e) {
                var t = this, n = t.element, i = e.disable, r = e.readonly, a = t.wrapper.add(t.filterInput).off(f), o = t._inputWrapper.off(y);
                r || i ? i ? (a.removeAttr(k), o.addClass(w).removeClass(_)) : (o.addClass(_).removeClass(w), a.on("focusin" + f, S(t._focusinHandler, t)).on("focusout" + f, S(t._focusoutHandler, t))) : (n.removeAttr(h).removeAttr(m), o.addClass(_).removeClass(w).on(y, t._toggleHover), a.attr(k, a.data(k)).attr(b, !1).on("keydown" + f, S(t._keydown, t)).on("focusin" + f, S(t._focusinHandler, t)).on("focusout" + f, S(t._focusoutHandler, t)).on("mousedown" + f, S(t._wrapperMousedown, t)).on("paste" + f, S(t._filterPaste, t)), t.wrapper.on("click" + f, S(t._wrapperClick, t)), t.filterInput || a.on("keypress" + f, S(t._keypress, t))), n.attr(h, i).attr(m, r), a.attr(b, i)
            },
            _keydown: function (e) {
                var t, n, i = this, r = e.keyCode, a = e.altKey, o = i.popup.visible();
                if (i.filterInput && (t = i.filterInput[0] === c()), r === p.LEFT ? (r = p.UP, n = !0) : r === p.RIGHT && (r = p.DOWN, n = !0), !n || !t) {
                    if (e.keyCode = r, (a && r === p.UP || r === p.ESC) && i._focusElement(i.wrapper), i._state === x && r === p.ESC && i._clearFilter(), r === p.ENTER && i._typingTimeout && i.filterInput && o)return void e.preventDefault();
                    if (n = i._move(e), !n) {
                        if (!o || !i.filterInput) {
                            var s = i._focus();
                            if (r === p.HOME ? (n = !0, i._firstItem()) : r === p.END && (n = !0, i._lastItem()), n) {
                                if (i.trigger("select", {
                                        dataItem: i._getElementDataItem(i._focus()),
                                        item: i._focus()
                                    }))return void i._focus(s);
                                i._select(i._focus(), !0), o || i._blur()
                            }
                        }
                        a || n || !i.filterInput || i._search()
                    }
                }
            },
            _matchText: function (e, n) {
                var i = this.options.ignoreCase;
                return e !== t && null !== e && (e += "", i && (e = e.toLowerCase()), 0 === e.indexOf(n))
            },
            _shuffleData: function (e, t) {
                var n = this._optionLabelDataItem();
                return n && (e = [n].concat(e)), e.slice(t).concat(e.slice(0, t))
            },
            _selectNext: function () {
                var e, t, n = this, a = n.dataSource.flatView(), o = a.length + (n.hasOptionLabel() ? 1 : 0), s = r(n._word, n._last), l = n.selectedIndex;
                l === -1 ? l = 0 : (l += s ? 1 : 0, l = i(l, o)), a = a.toJSON ? a.toJSON() : a.slice(), a = n._shuffleData(a, l);
                for (var u = 0; u < o && (t = n._text(a[u]), !s || !n._matchText(t, n._last)) && !n._matchText(t, n._word); u++);
                u !== o && (e = n._focus(), n._select(i(l + u, o)), n.trigger("select", {
                    dataItem: n._getElementDataItem(n._focus()),
                    item: n._focus()
                }) && n._select(e), n.popup.visible() || n._change())
            },
            _keypress: function (e) {
                var t = this;
                if (0 !== e.which && e.keyCode !== a.keys.ENTER) {
                    var n = String.fromCharCode(e.charCode || e.keyCode);
                    t.options.ignoreCase && (n = n.toLowerCase()), " " === n && e.preventDefault(), t._word += n, t._last = n, t._search()
                }
            },
            _popupOpen: function () {
                var e = this.popup;
                e.wrapper = a.wrap(e.element), e.element.closest(".km-root")[0] && (e.wrapper.addClass("km-popup km-widget"), this.wrapper.addClass("km-widget"))
            },
            _popup: function () {
                l.fn._popup.call(this), this.popup.one("open", S(this._popupOpen, this))
            },
            _getElementDataItem: function (e) {
                return e && e[0] ? e[0] === this.optionLabel[0] ? this._optionLabelDataItem() : this.listView.dataItemByIndex(this.listView.getElementIndex(e)) : null
            },
            _click: function (t) {
                var n = t.item || e(t.currentTarget);
                return t.preventDefault(), this.trigger("select", {
                    dataItem: this._getElementDataItem(n),
                    item: n
                }) ? void this.close() : (this._userTriggered = !0, this._select(n), this._focusElement(this.wrapper), void this._blur())
            },
            _focusElement: function (e) {
                var t = c(), n = this.wrapper, i = this.filterInput, r = e === i ? n : i, a = u.mobileOS && (u.touch || u.MSPointers || u.pointers);
                i && i[0] === e[0] && a || i && r[0] === t && (this._prevent = !0, this._focused = e.focus())
            },
            _searchByWord: function (e) {
                if (e) {
                    var t = this, n = t.options.ignoreCase;
                    n && (e = e.toLowerCase()), t._select(function (n) {
                        return t._matchText(t._text(n), e)
                    })
                }
            },
            _inputValue: function () {
                return this.text()
            },
            _search: function () {
                var e = this, t = e.dataSource;
                if (clearTimeout(e._typingTimeout), e._isFilterEnabled())e._typingTimeout = setTimeout(function () {
                    var t = e.filterInput.val();
                    e._prev !== t && (e._prev = t, e.search(t), e._resizeFilterInput()), e._typingTimeout = null
                }, e.options.delay); else {
                    if (e._typingTimeout = setTimeout(function () {
                            e._word = ""
                        }, e.options.delay), !e.listView.bound())return void t.fetch().done(function () {
                        e._selectNext()
                    });
                    e._selectNext()
                }
            },
            _get: function (t) {
                var n, i, r, a = "function" == typeof t, o = a ? e() : e(t);
                if (this.hasOptionLabel() && ("number" == typeof t ? t > -1 && (t -= 1) : o.hasClass("k-list-optionlabel") && (t = -1)), a) {
                    for (n = this.dataSource.flatView(), r = 0; r < n.length; r++)if (t(n[r])) {
                        t = r, i = !0;
                        break
                    }
                    i || (t = -1)
                }
                return t
            },
            _firstItem: function () {
                this.hasOptionLabel() ? this._focus(this.optionLabel) : this.listView.focusFirst()
            },
            _lastItem: function () {
                this._resetOptionLabel(), this.listView.focusLast()
            },
            _nextItem: function () {
                this.optionLabel.hasClass("k-state-focused") ? (this._resetOptionLabel(), this.listView.focusFirst()) : this.listView.focusNext()
            },
            _prevItem: function () {
                this.optionLabel.hasClass("k-state-focused") || (this.listView.focusPrev(), this.listView.focus() || this._focus(this.optionLabel))
            },
            _focusItem: function () {
                var e = this.listView, n = e.focus(), i = e.select();
                i = i[i.length - 1], i === t && this.options.highlightFirst && !n && (i = 0), i !== t ? e.focus(i) : this.options.optionLabel ? (this._focus(this.optionLabel), this._select(this.optionLabel)) : e.scrollToIndex(0)
            },
            _resetOptionLabel: function (e) {
                this.optionLabel.removeClass("k-state-focused" + (e || "")).removeAttr("id");
            },
            _focus: function (e) {
                var n = this.listView, i = this.optionLabel;
                return e === t ? (e = n.focus(), !e && i.hasClass("k-state-focused") && (e = i), e) : (this._resetOptionLabel(), e = this._get(e), n.focus(e), void(e === -1 && (i.addClass("k-state-focused").attr("id", n._optionID), this._focused.add(this.filterInput).removeAttr("aria-activedescendant").attr("aria-activedescendant", n._optionID))))
            },
            _select: function (e, t) {
                var n = this;
                e = n._get(e), n.listView.select(e), t || n._state !== x || (n._state = C), e === -1 && n._selectValue(null)
            },
            _selectValue: function (e) {
                var n = this, i = n.options.optionLabel, r = n.listView.select(), a = "", o = "";
                r = r[r.length - 1], r === t && (r = -1), this._resetOptionLabel(" k-state-selected"), e ? (o = e, a = n._dataValue(e), i && (r += 1)) : i && (n._focus(n.optionLabel.addClass("k-state-selected")), o = n._optionLabelText(), a = "string" == typeof i ? "" : n._value(i), r = 0), n.selectedIndex = r, null === a && (a = ""), n._textAccessor(o), n._accessor(a, r), n._triggerCascade()
            },
            _mobile: function () {
                var e = this, t = e.popup, n = u.mobileOS, i = t.element.parents(".km-root").eq(0);
                i.length && n && (t.options.animation.open.effects = n.android || n.meego ? "fadeIn" : n.ios || n.wp ? "slideIn:up" : t.options.animation.open.effects)
            },
            _filterHeader: function () {
                var t;
                this.filterInput && (this.filterInput.off(f).parent().remove(), this.filterInput = null), this._isFilterEnabled() && (t = '<span class="k-icon k-i-search"></span>', this.filterInput = e('<input class="k-textbox"/>').attr({
                    placeholder: this.element.attr("placeholder"),
                    title: this.element.attr("title"),
                    role: "listbox",
                    "aria-haspopup": !0,
                    "aria-expanded": !1
                }), this.list.prepend(e('<span class="k-list-filter" />').append(this.filterInput.add(t))))
            },
            _span: function () {
                var t, n = this, i = n.wrapper, r = "span.k-input";
                t = i.find(r), t[0] || (i.append('<span unselectable="on" class="k-dropdown-wrap k-state-default"><span unselectable="on" class="k-input">&nbsp;</span><span unselectable="on" class="k-select" aria-label="select"><span class="k-icon k-i-arrow-s"></span></span></span>').append(n.element), t = i.find(r)), n.span = t, n._inputWrapper = e(i[0].firstChild), n._arrow = i.find(".k-icon")
            },
            _wrapper: function () {
                var e, t = this, n = t.element, i = n[0];
                e = n.parent(), e.is("span.k-widget") || (e = n.wrap("<span />").parent(), e[0].style.cssText = i.style.cssText, e[0].title = i.title), t._focused = t.wrapper = e.addClass("k-widget k-dropdown k-header").addClass(i.className).css("display", "").attr({
                    accesskey: n.attr("accesskey"),
                    unselectable: "on",
                    role: "listbox",
                    "aria-haspopup": !0,
                    "aria-expanded": !1
                }), n.hide().removeAttr("accesskey")
            },
            _clearSelection: function (e) {
                this.select(e.value() ? 0 : -1)
            },
            _inputTemplate: function () {
                var t = this, n = t.options.valueTemplate;
                if (n = n ? a.template(n) : e.proxy(a.template("#:this._text(data)#", {useWithBlock: !1}), t), t.valueTemplate = n, t.hasOptionLabel() && !t.options.optionLabelTemplate)try {
                    t.valueTemplate(t._optionLabelDataItem())
                } catch (i) {
                    throw new Error(T)
                }
            },
            _textAccessor: function (n) {
                var i = null, r = this.valueTemplate, a = this._optionLabelText(), o = this.span;
                if (n === t)return o.text();
                e.isPlainObject(n) || n instanceof d ? i = n : a && a === n && (i = this.options.optionLabel), i || (i = this._assignInstance(n, this._accessor())), this.hasOptionLabel() && (i !== a && this._text(i) !== a || (r = this.optionLabelTemplate, "string" != typeof this.options.optionLabel || this.options.optionLabelTemplate || (i = a)));
                var s = function () {
                    return {elements: o.get(), data: [{dataItem: i}]}
                };
                this.angular("cleanup", s);
                try {
                    o.html(r(i))
                } catch (l) {
                    o.html("")
                }
                this.angular("compile", s)
            },
            _preselect: function (e, t) {
                e || t || (t = this._optionLabelText()), this._accessor(e), this._textAccessor(t), this._old = this._accessor(), this._oldIndex = this.selectedIndex, this.listView.setValue(e), this._initialIndex = null, this._presetValue = !0
            },
            _assignInstance: function (e, t) {
                var i = this.options.dataTextField, r = {};
                return i ? (n(r, i.split("."), e), n(r, this.options.dataValueField.split("."), t), r = new d(r)) : r = e, r
            }
        });
        o.plugin(D)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.colorpicker", ["kendo.core", "kendo.color", "kendo.popup", "kendo.slider", "kendo.userevents"], e)
}(function () {
    return function (e, t, n) {
        function i(e, t, n) {
            n = c(n), n && !n.equals(e.color()) && ("change" == t && (e._value = n), n = 1 != n.a ? n.toCssRgba() : n.toCss(), e.trigger(t, {value: n}))
        }

        function r(e, t, n) {
            e = Array.prototype.slice.call(e);
            var i = e.length, r = e.indexOf(t);
            return r < 0 ? n < 0 ? e[i - 1] : e[0] : (r += n, r < 0 ? r += i : r %= i, e[r])
        }

        function a(e) {
            e.preventDefault()
        }

        function o(e, t) {
            return function () {
                return e.apply(t, arguments)
            }
        }

        var s = window.kendo, l = s.ui, u = l.Widget, c = s.parseColor, d = s.Color, p = s.keys, f = "background-color", h = "k-state-selected", m = "000000,7f7f7f,880015,ed1c24,ff7f27,fff200,22b14c,00a2e8,3f48cc,a349a4,ffffff,c3c3c3,b97a57,ffaec9,ffc90e,efe4b0,b5e61d,99d9ea,7092be,c8bfe7", g = "FFFFFF,FFCCFF,FF99FF,FF66FF,FF33FF,FF00FF,CCFFFF,CCCCFF,CC99FF,CC66FF,CC33FF,CC00FF,99FFFF,99CCFF,9999FF,9966FF,9933FF,9900FF,FFFFCC,FFCCCC,FF99CC,FF66CC,FF33CC,FF00CC,CCFFCC,CCCCCC,CC99CC,CC66CC,CC33CC,CC00CC,99FFCC,99CCCC,9999CC,9966CC,9933CC,9900CC,FFFF99,FFCC99,FF9999,FF6699,FF3399,FF0099,CCFF99,CCCC99,CC9999,CC6699,CC3399,CC0099,99FF99,99CC99,999999,996699,993399,990099,FFFF66,FFCC66,FF9966,FF6666,FF3366,FF0066,CCFF66,CCCC66,CC9966,CC6666,CC3366,CC0066,99FF66,99CC66,999966,996666,993366,990066,FFFF33,FFCC33,FF9933,FF6633,FF3333,FF0033,CCFF33,CCCC33,CC9933,CC6633,CC3333,CC0033,99FF33,99CC33,999933,996633,993333,990033,FFFF00,FFCC00,FF9900,FF6600,FF3300,FF0000,CCFF00,CCCC00,CC9900,CC6600,CC3300,CC0000,99FF00,99CC00,999900,996600,993300,990000,66FFFF,66CCFF,6699FF,6666FF,6633FF,6600FF,33FFFF,33CCFF,3399FF,3366FF,3333FF,3300FF,00FFFF,00CCFF,0099FF,0066FF,0033FF,0000FF,66FFCC,66CCCC,6699CC,6666CC,6633CC,6600CC,33FFCC,33CCCC,3399CC,3366CC,3333CC,3300CC,00FFCC,00CCCC,0099CC,0066CC,0033CC,0000CC,66FF99,66CC99,669999,666699,663399,660099,33FF99,33CC99,339999,336699,333399,330099,00FF99,00CC99,009999,006699,003399,000099,66FF66,66CC66,669966,666666,663366,660066,33FF66,33CC66,339966,336666,333366,330066,00FF66,00CC66,009966,006666,003366,000066,66FF33,66CC33,669933,666633,663333,660033,33FF33,33CC33,339933,336633,333333,330033,00FF33,00CC33,009933,006633,003333,000033,66FF00,66CC00,669900,666600,663300,660000,33FF00,33CC00,339900,336600,333300,330000,00FF00,00CC00,009900,006600,003300,000000", v = {
            apply: "Apply",
            cancel: "Cancel"
        }, _ = ".kendoColorTools", w = "click" + _, b = "keydown" + _, y = s.support.browser, k = y.msie && y.version < 9, x = u.extend({
            init: function (e, t) {
                var n, i = this;
                u.fn.init.call(i, e, t), e = i.element, t = i.options, i._value = t.value = c(t.value), i._tabIndex = e.attr("tabIndex") || 0, n = i._ariaId = t.ariaId, n && e.attr("aria-labelledby", n), t._standalone && (i._triggerSelect = i._triggerChange)
            },
            options: {name: "ColorSelector", value: null, _standalone: !0},
            events: ["change", "select", "cancel"],
            color: function (e) {
                return e !== n && (this._value = c(e), this._updateUI(this._value)), this._value
            },
            value: function (e) {
                return e = this.color(e), e && (e = this.options.opacity ? e.toCssRgba() : e.toCss()), e || null
            },
            enable: function (t) {
                0 === arguments.length && (t = !0), e(".k-disabled-overlay", this.wrapper).remove(), t || this.wrapper.append("<div class='k-disabled-overlay'></div>"), this._onEnable(t)
            },
            _select: function (e, t) {
                var n = this._value;
                e = this.color(e), t || (this.element.trigger("change"), e.equals(n) ? this._standalone || this.trigger("cancel") : this.trigger("change", {value: this.value()}))
            },
            _triggerSelect: function (e) {
                i(this, "select", e)
            },
            _triggerChange: function (e) {
                i(this, "change", e)
            },
            destroy: function () {
                this.element && this.element.off(_), this.wrapper && this.wrapper.off(_).find("*").off(_), this.wrapper = null, u.fn.destroy.call(this)
            },
            _updateUI: e.noop,
            _selectOnHide: function () {
                return null
            },
            _cancel: function () {
                this.trigger("cancel")
            }
        }), C = x.extend({
            init: function (t, n) {
                var i = this;
                x.fn.init.call(i, t, n), t = i.wrapper = i.element, n = i.options;
                var r = n.palette;
                "websafe" == r ? (r = g, n.columns = 18) : "basic" == r && (r = m), "string" == typeof r && (r = r.split(",")), e.isArray(r) && (r = e.map(r, function (e) {
                    return c(e)
                })), i._selectedID = (n.ariaId || s.guid()) + "_selected", t.addClass("k-widget k-colorpalette").attr("role", "grid").attr("aria-readonly", "true").append(e(i._template({
                    colors: r,
                    columns: n.columns,
                    tileSize: n.tileSize,
                    value: i._value,
                    id: n.ariaId
                }))).on(w, ".k-item", function (t) {
                    i._select(e(t.currentTarget).css(f))
                }).attr("tabIndex", i._tabIndex).on(b, o(i._keydown, i));
                var a, l, u = n.tileSize;
                if (u) {
                    if (/number|string/.test(typeof u))a = l = parseFloat(u); else {
                        if ("object" != typeof u)throw new Error("Unsupported value for the 'tileSize' argument");
                        a = parseFloat(u.width), l = parseFloat(u.height)
                    }
                    t.find(".k-item").css({width: a, height: l})
                }
            },
            focus: function () {
                this.wrapper.focus()
            },
            options: {name: "ColorPalette", columns: 10, tileSize: null, palette: "basic"},
            _onEnable: function (e) {
                e ? this.wrapper.attr("tabIndex", this._tabIndex) : this.wrapper.removeAttr("tabIndex")
            },
            _keydown: function (t) {
                var n, i = this.wrapper, o = i.find(".k-item"), s = o.filter("." + h).get(0), l = t.keyCode;
                if (l == p.LEFT ? n = r(o, s, -1) : l == p.RIGHT ? n = r(o, s, 1) : l == p.DOWN ? n = r(o, s, this.options.columns) : l == p.UP ? n = r(o, s, -this.options.columns) : l == p.ENTER ? (a(t), s && this._select(e(s).css(f))) : l == p.ESC && this._cancel(), n) {
                    a(t), this._current(n);
                    try {
                        var u = c(n.css(f));
                        this._triggerSelect(u)
                    } catch (d) {
                    }
                }
            },
            _current: function (t) {
                this.wrapper.find("." + h).removeClass(h).attr("aria-selected", !1).removeAttr("id"), e(t).addClass(h).attr("aria-selected", !0).attr("id", this._selectedID), this.element.removeAttr("aria-activedescendant").attr("aria-activedescendant", this._selectedID)
            },
            _updateUI: function (t) {
                var n = null;
                this.wrapper.find(".k-item").each(function () {
                    var i = c(e(this).css(f));
                    if (i && i.equals(t))return n = this, !1
                }), this._current(n)
            },
            _template: s.template('<table class="k-palette k-reset" role="presentation"><tr role="row"># for (var i = 0; i < colors.length; ++i) { ## var selected = colors[i].equals(value); ## if (i && i % columns == 0) { # </tr><tr role="row"> # } #<td role="gridcell" unselectable="on" style="background-color:#= colors[i].toCss() #"#= selected ? " aria-selected=true" : "" # #=(id && i === 0) ? "id=\\""+id+"\\" " : "" # class="k-item#= selected ? " ' + h + '" : "" #" aria-label="#= colors[i].toCss() #"></td># } #</tr></table>')
        }), T = x.extend({
            init: function (t, n) {
                var i = this;
                x.fn.init.call(i, t, n), n = i.options, t = i.element, i.wrapper = t.addClass("k-widget k-flatcolorpicker").append(i._template(n)), i._hueElements = e(".k-hsv-rectangle, .k-transparency-slider .k-slider-track", t), i._selectedColor = e(".k-selected-color-display", t), i._colorAsText = e("input.k-color-value", t), i._sliders(), i._hsvArea(), i._updateUI(i._value || c("#f00")), t.find("input.k-color-value").on(b, function (t) {
                    var n = this;
                    if (t.keyCode == p.ENTER)try {
                        var r = c(n.value), a = i.color();
                        i._select(r, r.equals(a))
                    } catch (o) {
                        e(n).addClass("k-state-error")
                    } else i.options.autoupdate && setTimeout(function () {
                        var e = c(n.value, !0);
                        e && i._updateUI(e, !0)
                    }, 10)
                }).end().on(w, ".k-controls button.apply", function () {
                    i._select(i._getHSV())
                }).on(w, ".k-controls button.cancel", function () {
                    i._updateUI(i.color()), i._cancel()
                }), k && i._applyIEFilter()
            },
            destroy: function () {
                this._hueSlider.destroy(), this._opacitySlider && this._opacitySlider.destroy(), this._hueSlider = this._opacitySlider = this._hsvRect = this._hsvHandle = this._hueElements = this._selectedColor = this._colorAsText = null, x.fn.destroy.call(this)
            },
            options: {
                name: "FlatColorPicker",
                opacity: !1,
                buttons: !1,
                input: !0,
                preview: !0,
                autoupdate: !0,
                messages: v
            },
            _applyIEFilter: function () {
                var e = this.element.find(".k-hue-slider .k-slider-track")[0], t = e.currentStyle.backgroundImage;
                t = t.replace(/^url\([\'\"]?|[\'\"]?\)$/g, ""), e.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + t + "', sizingMethod='scale')"
            },
            _sliders: function () {
                function e(e) {
                    n._updateUI(n._getHSV(e.value, null, null, null))
                }

                function t(e) {
                    n._updateUI(n._getHSV(null, null, null, e.value / 100))
                }

                var n = this, i = n.element;
                n._hueSlider = i.find(".k-hue-slider").kendoSlider({
                    min: 0,
                    max: 360,
                    tickPlacement: "none",
                    showButtons: !1,
                    slide: e,
                    change: e
                }).data("kendoSlider"), n._opacitySlider = i.find(".k-transparency-slider").kendoSlider({
                    min: 0,
                    max: 100,
                    tickPlacement: "none",
                    showButtons: !1,
                    slide: t,
                    change: t
                }).data("kendoSlider")
            },
            _hsvArea: function () {
                function e(e, n) {
                    var i = this.offset, r = e - i.left, a = n - i.top, o = this.width, s = this.height;
                    r = r < 0 ? 0 : r > o ? o : r, a = a < 0 ? 0 : a > s ? s : a, t._svChange(r / o, 1 - a / s)
                }

                var t = this, n = t.element, i = n.find(".k-hsv-rectangle"), r = i.find(".k-draghandle").attr("tabIndex", 0).on(b, o(t._keydown, t));
                t._hsvEvents = new s.UserEvents(i, {
                    global: !0, press: function (t) {
                        this.offset = s.getOffset(i), this.width = i.width(), this.height = i.height(), r.focus(), e.call(this, t.x.location, t.y.location)
                    }, start: function () {
                        i.addClass("k-dragging"), r.focus()
                    }, move: function (t) {
                        t.preventDefault(), e.call(this, t.x.location, t.y.location)
                    }, end: function () {
                        i.removeClass("k-dragging")
                    }
                }), t._hsvRect = i, t._hsvHandle = r
            },
            _onEnable: function (e) {
                this._hueSlider.enable(e), this._opacitySlider && this._opacitySlider.enable(e), this.wrapper.find("input").attr("disabled", !e);
                var t = this._hsvRect.find(".k-draghandle");
                e ? t.attr("tabIndex", this._tabIndex) : t.removeAttr("tabIndex")
            },
            _keydown: function (e) {
                function t(t, n) {
                    var r = i._getHSV();
                    r[t] += n * (e.shiftKey ? .01 : .05), r[t] < 0 && (r[t] = 0), r[t] > 1 && (r[t] = 1), i._updateUI(r), a(e)
                }

                function n(t) {
                    var n = i._getHSV();
                    n.h += t * (e.shiftKey ? 1 : 5), n.h < 0 && (n.h = 0), n.h > 359 && (n.h = 359), i._updateUI(n), a(e)
                }

                var i = this;
                switch (e.keyCode) {
                    case p.LEFT:
                        e.ctrlKey ? n(-1) : t("s", -1);
                        break;
                    case p.RIGHT:
                        e.ctrlKey ? n(1) : t("s", 1);
                        break;
                    case p.UP:
                        t(e.ctrlKey && i._opacitySlider ? "a" : "v", 1);
                        break;
                    case p.DOWN:
                        t(e.ctrlKey && i._opacitySlider ? "a" : "v", -1);
                        break;
                    case p.ENTER:
                        i._select(i._getHSV());
                        break;
                    case p.F2:
                        i.wrapper.find("input.k-color-value").focus().select();
                        break;
                    case p.ESC:
                        i._cancel()
                }
            },
            focus: function () {
                this._hsvHandle.focus()
            },
            _getHSV: function (e, t, n, i) {
                var r = this._hsvRect, a = r.width(), o = r.height(), s = this._hsvHandle.position();
                return null == e && (e = this._hueSlider.value()), null == t && (t = s.left / a), null == n && (n = 1 - s.top / o), null == i && (i = this._opacitySlider ? this._opacitySlider.value() / 100 : 1), d.fromHSV(e, t, n, i)
            },
            _svChange: function (e, t) {
                var n = this._getHSV(null, e, t, null);
                this._updateUI(n)
            },
            _updateUI: function (e, t) {
                var n = this, i = n._hsvRect;
                e && (this._colorAsText.removeClass("k-state-error"), n._selectedColor.css(f, e.toDisplay()), t || n._colorAsText.val(n._opacitySlider ? e.toCssRgba() : e.toCss()), n._triggerSelect(e), e = e.toHSV(), n._hsvHandle.css({
                    left: e.s * i.width() + "px",
                    top: (1 - e.v) * i.height() + "px"
                }), n._hueElements.css(f, d.fromHSV(e.h, 1, 1, 1).toCss()), n._hueSlider.value(e.h), n._opacitySlider && n._opacitySlider.value(100 * e.a))
            },
            _selectOnHide: function () {
                return this.options.buttons ? null : this._getHSV()
            },
            _template: s.template('# if (preview) { #<div class="k-selected-color"><div class="k-selected-color-display"><input class="k-color-value" #= !data.input ? \'style="visibility: hidden;"\' : "" #></div></div># } #<div class="k-hsv-rectangle"><div class="k-hsv-gradient"></div><div class="k-draghandle"></div></div><input class="k-hue-slider" /># if (opacity) { #<input class="k-transparency-slider" /># } ## if (buttons) { #<div unselectable="on" class="k-controls"><button class="k-button k-primary apply">#: messages.apply #</button> <button class="k-button cancel">#: messages.cancel #</button></div># } #')
        }), S = u.extend({
            init: function (t, n) {
                var i = this;
                u.fn.init.call(i, t, n), n = i.options, t = i.element;
                var r = t.attr("value") || t.val();
                r = r ? c(r, !0) : c(n.value, !0), i._value = n.value = r;
                var a = i.wrapper = e(i._template(n));
                if (t.hide().after(a), t.is("input")) {
                    t.appendTo(a);
                    var o = t.closest("label"), s = t.attr("id");
                    s && (o = o.add('label[for="' + s + '"]')), o.click(function (e) {
                        i.open(), e.preventDefault()
                    })
                }
                i._tabIndex = t.attr("tabIndex") || 0, i.enable(!t.attr("disabled"));
                var l = t.attr("accesskey");
                l && (t.attr("accesskey", null), a.attr("accesskey", l)), i.bind("activate", function (e) {
                    e.isDefaultPrevented() || i.toggle()
                }), i._updateUI(r)
            },
            destroy: function () {
                this.wrapper.off(_).find("*").off(_), this._popup && (this._selector.destroy(), this._popup.destroy()), this._selector = this._popup = this.wrapper = null, u.fn.destroy.call(this)
            },
            enable: function (e) {
                var t = this, n = t.wrapper, i = n.children(".k-picker-wrap"), r = i.find(".k-select");
                0 === arguments.length && (e = !0), t.element.attr("disabled", !e), n.attr("aria-disabled", !e), r.off(_).on("mousedown" + _, a), n.addClass("k-state-disabled").removeAttr("tabIndex").add("*", n).off(_), e ? n.removeClass("k-state-disabled").attr("tabIndex", t._tabIndex).on("mouseenter" + _, function () {
                    i.addClass("k-state-hover")
                }).on("mouseleave" + _, function () {
                    i.removeClass("k-state-hover")
                }).on("focus" + _, function () {
                    i.addClass("k-state-focused")
                }).on("blur" + _, function () {
                    i.removeClass("k-state-focused")
                }).on(b, o(t._keydown, t)).on(w, ".k-select", o(t.toggle, t)).on(w, t.options.toolIcon ? ".k-tool-icon" : ".k-selected-color", function () {
                    t.trigger("activate")
                }) : t.close()
            },
            _template: s.template('<span role="textbox" aria-haspopup="true" class="k-widget k-colorpicker k-header"><span class="k-picker-wrap k-state-default"># if (toolIcon) { #<span class="k-tool-icon #= toolIcon #"><span class="k-selected-color"></span></span># } else { #<span class="k-selected-color"></span># } #<span class="k-select" unselectable="on" aria-label="select"><span class="k-icon k-i-arrow-s"></span></span></span></span>'),
            options: {
                name: "ColorPicker",
                palette: null,
                columns: 10,
                toolIcon: null,
                value: null,
                messages: v,
                opacity: !1,
                buttons: !0,
                preview: !0,
                ARIATemplate: 'Current selected color is #=data || ""#'
            },
            events: ["activate", "change", "select", "open", "close"],
            open: function () {
                this.element.prop("disabled") || this._getPopup().open()
            },
            close: function () {
                this._getPopup().close()
            },
            toggle: function () {
                this.element.prop("disabled") || this._getPopup().toggle()
            },
            color: x.fn.color,
            value: x.fn.value,
            _select: x.fn._select,
            _triggerSelect: x.fn._triggerSelect,
            _isInputTypeColor: function () {
                var e = this.element[0];
                return /^input$/i.test(e.tagName) && /^color$/i.test(e.type)
            },
            _updateUI: function (e) {
                var t = "";
                e && (t = this._isInputTypeColor() || 1 == e.a ? e.toCss() : e.toCssRgba(), this.element.val(t)), this._ariaTemplate || (this._ariaTemplate = s.template(this.options.ARIATemplate)), this.wrapper.attr("aria-label", this._ariaTemplate(t)), this._triggerSelect(e), this.wrapper.find(".k-selected-color").css(f, e ? e.toDisplay() : "transparent")
            },
            _keydown: function (e) {
                var t = e.keyCode;
                this._getPopup().visible() ? (t == p.ESC ? this._selector._cancel() : this._selector._keydown(e), a(e)) : t != p.ENTER && t != p.DOWN || (this.open(), a(e))
            },
            _getPopup: function () {
                var t = this, n = t._popup;
                if (!n) {
                    var i, r = t.options;
                    i = r.palette ? C : T, r._standalone = !1, delete r.select, delete r.change, delete r.cancel;
                    var a = s.guid(), o = t._selector = new i(e('<div id="' + a + '"/>').appendTo(document.body), r);
                    t.wrapper.attr("aria-owns", a), t._popup = n = o.wrapper.kendoPopup({
                        anchor: t.wrapper,
                        adjustSize: {width: 5, height: 0}
                    }).data("kendoPopup"), o.bind({
                        select: function (e) {
                            t._updateUI(c(e.value))
                        }, change: function () {
                            t._select(o.color()), t.close()
                        }, cancel: function () {
                            t.close()
                        }
                    }), n.bind({
                        close: function (e) {
                            if (t.trigger("close"))return void e.preventDefault();
                            t.wrapper.children(".k-picker-wrap").removeClass("k-state-focused");
                            var n = o._selectOnHide();
                            n ? t._select(n) : (setTimeout(function () {
                                t.wrapper && t.wrapper.focus()
                            }), t._updateUI(t.color()))
                        }, open: function (e) {
                            t.trigger("open") ? e.preventDefault() : t.wrapper.children(".k-picker-wrap").addClass("k-state-focused")
                        }, activate: function () {
                            o._select(t.color(), !0), o.focus(), t.wrapper.children(".k-picker-wrap").addClass("k-state-focused")
                        }
                    })
                }
                return n
            }
        });
        l.plugin(C), l.plugin(T), l.plugin(S)
    }(jQuery, parseInt), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.maskedtextbox", ["kendo.core"], e)
}(function () {
    return function (e, t) {
        var n = window.kendo, i = n.caret, r = n.keys, a = n.ui, o = a.Widget, s = ".kendoMaskedTextBox", l = e.proxy, u = (n.support.propertyChangeEvent ? "propertychange" : "input") + s, c = "k-state-disabled", d = "disabled", p = "readonly", f = "change", h = o.extend({
            init: function (t, r) {
                var a, l = this;
                o.fn.init.call(l, t, r), l._rules = e.extend({}, l.rules, l.options.rules), t = l.element, a = t[0], l.wrapper = t, l._tokenize(), l._form(), l.element.addClass("k-textbox").attr("autocomplete", "off").on("focus" + s, function () {
                    var e = a.value;
                    e ? l._togglePrompt(!0) : a.value = l._old = l._emptyMask, l._oldValue = e, l._timeoutId = setTimeout(function () {
                        i(t, 0, e ? l._maskLength : 0)
                    })
                }).on("focusout" + s, function () {
                    var e = t.val();
                    clearTimeout(l._timeoutId), a.value = l._old = "", e !== l._emptyMask && (a.value = l._old = e), l._change(), l._togglePrompt()
                });
                var u = t.is("[disabled]") || e(l.element).parents("fieldset").is(":disabled");
                u ? l.enable(!1) : l.readonly(t.is("[readonly]")), l.value(l.options.value || t.val()), n.notify(l)
            },
            options: {
                name: "MaskedTextBox",
                clearPromptChar: !1,
                unmaskOnPost: !1,
                promptChar: "_",
                culture: "",
                rules: {},
                value: "",
                mask: ""
            },
            events: [f],
            rules: {
                0: /\d/,
                9: /\d|\s/,
                "#": /\d|\s|\+|\-/,
                L: /[a-zA-Z]/,
                "?": /[a-zA-Z]|\s/,
                "&": /\S/,
                C: /./,
                A: /[a-zA-Z0-9]/,
                a: /[a-zA-Z0-9]|\s/
            },
            setOptions: function (t) {
                var n = this;
                o.fn.setOptions.call(n, t), n._rules = e.extend({}, n.rules, n.options.rules), n._tokenize(), this._unbindInput(), this._bindInput(), n.value(n.element.val())
            },
            destroy: function () {
                var e = this;
                e.element.off(s), e._formElement && (e._formElement.off("reset", e._resetHandler), e._formElement.off("submit", e._submitHandler)), o.fn.destroy.call(e)
            },
            raw: function () {
                var e = this._unmask(this.element.val(), 0);
                return e.replace(new RegExp(this.options.promptChar, "g"), "")
            },
            value: function (e) {
                var i = this.element, r = this._emptyMask;
                return e === t ? this.element.val() : (null === e && (e = ""), r ? (e = this._unmask(e + ""), i.val(e ? r : ""), this._mask(0, this._maskLength, e), e = i.val(), this._oldValue = e, void(n._activeElement() !== i && (e === r ? i.val("") : this._togglePrompt()))) : void i.val(e))
            },
            _togglePrompt: function (e) {
                var t = this.element[0], n = t.value;
                this.options.clearPromptChar && (n = e ? this._oldValue : n.replace(new RegExp(this.options.promptChar, "g"), " "), t.value = this._old = n)
            },
            readonly: function (e) {
                this._editable({readonly: e === t || e, disable: !1})
            },
            enable: function (e) {
                this._editable({readonly: !1, disable: !(e = e === t || e)})
            },
            _bindInput: function () {
                var e = this;
                e._maskLength && e.element.on("keydown" + s, l(e._keydown, e)).on("keypress" + s, l(e._keypress, e)).on("paste" + s, l(e._paste, e)).on(u, l(e._propertyChange, e))
            },
            _unbindInput: function () {
                this.element.off("keydown" + s).off("keypress" + s).off("paste" + s).off(u)
            },
            _editable: function (e) {
                var t = this, n = t.element, i = e.disable, r = e.readonly;
                t._unbindInput(), r || i ? n.attr(d, i).attr(p, r).toggleClass(c, i) : (n.removeAttr(d).removeAttr(p).removeClass(c), t._bindInput())
            },
            _change: function () {
                var e = this, t = e.value();
                t !== e._oldValue && (e._oldValue = t, e.trigger(f), e.element.trigger(f))
            },
            _propertyChange: function () {
                var e, t, r = this, a = r.element[0], o = a.value;
                n._activeElement() === a && (o === r._old || r._pasting || (t = i(a)[0], e = r._unmask(o.substring(t), t), a.value = r._old = o.substring(0, t) + r._emptyMask.substring(t), r._mask(t, t, e), i(a, t)))
            },
            _paste: function (e) {
                var t = this, n = e.target, r = i(n), a = r[0], o = r[1], s = t._unmask(n.value.substring(o), o);
                t._pasting = !0, setTimeout(function () {
                    var e = n.value, r = e.substring(a, i(n)[0]);
                    n.value = t._old = e.substring(0, a) + t._emptyMask.substring(a), t._mask(a, a, r), a = i(n)[0], t._mask(a, a, s), i(n, a), t._pasting = !1
                })
            },
            _form: function () {
                var t = this, n = t.element, i = n.attr("form"), r = i ? e("#" + i) : n.closest("form");
                r[0] && (t._resetHandler = function () {
                    setTimeout(function () {
                        t.value(n[0].value)
                    })
                }, t._submitHandler = function () {
                    t.element[0].value = t._old = t.raw()
                }, t.options.unmaskOnPost && r.on("submit", t._submitHandler), t._formElement = r.on("reset", t._resetHandler))
            },
            _keydown: function (e) {
                var n, a = e.keyCode, o = this.element[0], s = i(o), l = s[0], u = s[1], c = a === r.BACKSPACE;
                c || a === r.DELETE ? (l === u && (c ? l -= 1 : u += 1, n = this._find(l, c)), n !== t && n !== l ? (c && (n += 1), i(o, n)) : l > -1 && this._mask(l, u, "", c), e.preventDefault()) : a === r.ENTER && this._change()
            },
            _keypress: function (e) {
                if (0 !== e.which && !e.metaKey && !e.ctrlKey && e.keyCode !== r.ENTER) {
                    var t = String.fromCharCode(e.which), n = i(this.element);
                    this._mask(n[0], n[1], t), (e.keyCode === r.BACKSPACE || t) && e.preventDefault()
                }
            },
            _find: function (e, t) {
                var n = this.element.val() || this._emptyMask, i = 1;
                for (t === !0 && (i = -1); e > -1 || e <= this._maskLength;) {
                    if (n.charAt(e) !== this.tokens[e])return e;
                    e += i
                }
                return -1
            },
            _mask: function (e, r, a, o) {
                var s, l, u, c, d = this.element[0], p = d.value || this._emptyMask, f = this.options.promptChar, h = 0;
                for (e = this._find(e, o), e > r && (r = e), l = this._unmask(p.substring(r), r), a = this._unmask(a, e), s = a.length, a && (l = l.replace(new RegExp("^_{0," + s + "}"), "")), a += l, p = p.split(""), u = a.charAt(h); e < this._maskLength;)p[e] = u || f, u = a.charAt(++h), c === t && h > s && (c = e), e = this._find(e + 1);
                d.value = this._old = p.join(""), n._activeElement() === d && (c === t && (c = this._maskLength), i(d, c))
            },
            _unmask: function (t, n) {
                if (!t)return "";
                t = (t + "").split("");
                for (var i, r, a = 0, o = n || 0, s = this.options.promptChar, l = t.length, u = this.tokens.length, c = ""; o < u && (i = t[a], r = this.tokens[o], i === r || i === s ? (c += i === s ? s : "", a += 1, o += 1) : "string" != typeof r ? ((r.test && r.test(i) || e.isFunction(r) && r(i)) && (c += i, o += 1), a += 1) : o += 1, !(a >= l)););
                return c
            },
            _tokenize: function () {
                for (var e, t, i = [], r = 0, a = this.options.mask || "", o = a.split(""), s = o.length, l = 0, u = "", c = this.options.promptChar, d = n.getCulture(this.options.culture).numberFormat, p = this._rules; l < s; l++)if (e = o[l], t = p[e])i[r] = t, u += c, r += 1; else {
                    "." === e || "," === e ? e = d[e] : "$" === e ? e = d.currency.symbol : "\\" === e && (l += 1, e = o[l]), e = e.split("");
                    for (var f = 0, h = e.length; f < h; f++)i[r] = e[f], u += e[f], r += 1
                }
                this.tokens = i, this._emptyMask = u, this._maskLength = u.length
            }
        });
        a.plugin(h)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.multiselect", ["kendo.list", "kendo.mobile.scroller"], e)
}(function () {
    return function (e, t) {
        function n(e, t) {
            var n;
            if (null === e && null !== t || null !== e && null === t)return !1;
            if (n = e.length, n !== t.length)return !1;
            for (; n--;)if (e[n] !== t[n])return !1;
            return !0
        }

        var i = window.kendo, r = i.ui, a = r.List, o = i.keys, s = i._activeElement, l = i.data.ObservableArray, u = e.proxy, c = "id", d = "li", p = "accept", f = "filter", h = "rebind", m = "open", g = "close", v = "change", _ = "progress", w = "select", b = "deselect", y = "aria-disabled", k = "k-state-focused", x = "k-loading-hidden", C = "k-state-hover", T = "k-state-disabled", S = "disabled", D = "readonly", I = ".kendoMultiSelect", F = "click" + I, E = "keydown" + I, O = "mouseenter" + I, A = "mouseleave" + I, M = O + " " + A, H = /"/g, z = e.isArray, P = ["font-family", "font-size", "font-stretch", "font-style", "font-weight", "letter-spacing", "text-transform", "line-height"], V = a.extend({
            init: function (t, n) {
                var r, o, s = this;
                s.ns = I, a.fn.init.call(s, t, n), s._optionsMap = {}, s._customOptions = {}, s._wrapper(), s._tagList(), s._input(), s._textContainer(), s._loader(), s._clearButton(), s._tabindex(s.input), t = s.element.attr("multiple", "multiple").hide(), n = s.options, n.placeholder || (n.placeholder = t.data("placeholder")), r = t.attr(c), r && (s._tagID = r + "_tag_active", r += "_taglist", s.tagList.attr(c, r)), s._aria(r), s._dataSource(), s._ignoreCase(), s._popup(), s._tagTemplate(), s.requireValueMapper(s.options), s._initList(), s._reset(), s._enable(), s._placeholder(), n.autoBind ? s.dataSource.fetch() : n.value && s._preselect(n.value), o = e(s.element).parents("fieldset").is(":disabled"), o && s.enable(!1), i.notify(s)
            },
            options: {
                name: "MultiSelect",
                tagMode: "multiple",
                enabled: !0,
                autoBind: !0,
                autoClose: !0,
                highlightFirst: !0,
                dataTextField: "",
                dataValueField: "",
                filter: "startswith",
                ignoreCase: !0,
                minLength: 1,
                enforceMinLength: !1,
                delay: 100,
                value: null,
                maxSelectedItems: null,
                placeholder: "",
                height: 200,
                animation: {},
                virtual: !1,
                itemTemplate: "",
                tagTemplate: "",
                groupTemplate: "#:data#",
                fixedGroupTemplate: "#:data#",
                clearButton: !0
            },
            events: [m, g, v, w, b, "filtering", "dataBinding", "dataBound"],
            setDataSource: function (e) {
                this.options.dataSource = e, this._state = "", this._dataSource(), this.listView.setDataSource(this.dataSource), this.options.autoBind && this.dataSource.fetch()
            },
            setOptions: function (e) {
                var t = this._listOptions(e);
                a.fn.setOptions.call(this, e), this.listView.setOptions(t), this._accessors(), this._aria(this.tagList.attr(c)), this._tagTemplate()
            },
            currentTag: function (e) {
                var n = this;
                return e === t ? n._currentTag : (n._currentTag && (n._currentTag.removeClass(k).removeAttr(c), n.input.removeAttr("aria-activedescendant")), e && (e.addClass(k).attr(c, n._tagID), n.input.attr("aria-activedescendant", n._tagID)), n._currentTag = e, void 0)
            },
            dataItems: function () {
                return this.listView.selectedDataItems()
            },
            destroy: function () {
                var e = this, t = e.ns;
                clearTimeout(e._busy), clearTimeout(e._typingTimeout), e.wrapper.off(t), e.tagList.off(t), e.input.off(t), e._clear.off(t), a.fn.destroy.call(e)
            },
            _activateItem: function () {
                a.fn._activateItem.call(this), this.currentTag(null)
            },
            _listOptions: function (t) {
                var n = this, r = a.fn._listOptions.call(n, e.extend(t, {
                    selectedItemChange: u(n._selectedItemChange, n),
                    selectable: "multiple"
                })), o = this.options.itemTemplate || this.options.template, s = r.itemTemplate || o || r.template;
                return s || (s = "#:" + i.expr(r.dataTextField, "data") + "#"), r.template = s, r
            },
            _setListValue: function () {
                a.fn._setListValue.call(this, this._initialValues.slice(0))
            },
            _listChange: function (e) {
                var n = this.dataSource.flatView(), i = this._optionsMap, r = this._value;
                this._state === h && (this._state = "");
                for (var a = 0; a < e.added.length; a++)if (i[r(e.added[a].dataItem)] === t) {
                    this._render(n);
                    break
                }
                this._selectValue(e.added, e.removed)
            },
            _selectedItemChange: function (e) {
                var t, n, i = e.items;
                for (n = 0; n < i.length; n++)t = i[n], this.tagList.children().eq(t.index).children("span:first").html(this.tagTextTemplate(t.item))
            },
            _wrapperMousedown: function (t) {
                var n = this, r = "input" !== t.target.nodeName.toLowerCase(), a = e(t.target), o = a.hasClass("k-select") || a.hasClass("k-icon");
                o && (o = !a.closest(".k-select").children(".k-i-arrow-s").length), !r || o && i.support.mobileOS || t.preventDefault(), o || (n.input[0] !== s() && r && n.input.focus(), 1 === n.options.minLength && n.open())
            },
            _inputFocus: function () {
                this._placeholder(!1), this.wrapper.addClass(k)
            },
            _inputFocusout: function () {
                var e = this;
                clearTimeout(e._typingTimeout), e.wrapper.removeClass(k), e._placeholder(!e.listView.selectedDataItems()[0], !0), e.close(), e._state === f && (e._state = p, e.listView.skipUpdate(!0)), e.element.blur()
            },
            _removeTag: function (e) {
                var n, i = this, r = i._state, a = e.index(), o = i.listView, s = o.value()[a], l = i.listView.selectedDataItems()[a], u = i._customOptions[s];
                return i.trigger(b, {
                    dataItem: l,
                    item: e
                }) ? void i._close() : (u !== t || r !== p && r !== f || (u = i._optionsMap[s]), u !== t ? (n = i.element[0].children[u], n.selected = !1, o.removeAt(a), e.remove()) : o.select(o.select()[a]), i.currentTag(null), i._change(), void i._close())
            },
            _tagListClick: function (t) {
                var n = e(t.currentTarget);
                n.children(".k-i-arrow-s").length || this._removeTag(n.closest(d))
            },
            _clearClick: function () {
                this.value(null), this.trigger("change")
            },
            _editable: function (t) {
                var n = this, i = t.disable, r = t.readonly, a = n.wrapper.off(I), o = n.tagList.off(I), s = n.element.add(n.input.off(I));
                r || i ? (i ? a.addClass(T) : a.removeClass(T), s.attr(S, i).attr(D, r).attr(y, i)) : (a.removeClass(T).on(M, n._toggleHover).on("mousedown" + I + " touchend" + I, u(n._wrapperMousedown, n)), n.input.on(E, u(n._keydown, n)).on("paste" + I, u(n._search, n)).on("focus" + I, u(n._inputFocus, n)).on("focusout" + I, u(n._inputFocusout, n)), n._clear.on("click" + I, u(n._clearClick, n)), s.removeAttr(S).removeAttr(D).attr(y, !1), o.on(O, d, function () {
                    e(this).addClass(C)
                }).on(A, d, function () {
                    e(this).removeClass(C)
                }).on(F, "li.k-button .k-select", u(n._tagListClick, n)))
            },
            _close: function () {
                var e = this;
                e.options.autoClose ? e.close() : e.popup.position()
            },
            _filterSource: function (e, t) {
                t || (t = this._retrieveData), this._retrieveData = !1, a.fn._filterSource.call(this, e, t)
            },
            close: function () {
                this.popup.close()
            },
            open: function () {
                var e = this;
                e._request && (e._retrieveData = !1), e._retrieveData || !e.listView.bound() || e._state === p ? (e._open = !0, e._state = h, e.listView.skipUpdate(!0), e._filterSource()) : e._allowOpening() && (e.popup.open(), e._focusItem())
            },
            toggle: function (e) {
                e = e !== t ? e : !this.popup.visible(), this[e ? m : g]()
            },
            refresh: function () {
                this.listView.refresh()
            },
            _listBound: function () {
                var e = this, n = e.dataSource.flatView(), i = e.listView.skip();
                e._render(n), e._renderFooter(), e._renderNoData(), e._toggleNoData(!n.length), e._resizePopup(), e._open && (e._open = !1, e.toggle(e._allowOpening())), e.popup.position(), !e.options.highlightFirst || i !== t && 0 !== i || e.listView.focusFirst(), e._touchScroller && e._touchScroller.reset(), e._hideBusy(), e._makeUnselectable(), e.trigger("dataBound")
            },
            _inputValue: function () {
                var e = this, t = e.input.val();
                return e.options.placeholder === t && (t = ""), t
            },
            value: function (e) {
                var n = this, i = n.listView, r = i.value().slice(), a = n.options.maxSelectedItems, o = i.bound() && i.isFiltered();
                return e === t ? r : (n.requireValueMapper(n.options, e), e = n._normalizeValues(e), null !== a && e.length > a && (e = e.slice(0, a)), o && n._clearFilter(), i.value(e), n._old = i.value(), void(o || n._fetchData()))
            },
            _preselect: function (t, n) {
                var r = this;
                z(t) || t instanceof i.data.ObservableArray || (t = [t]),
                (e.isPlainObject(t[0]) || t[0] instanceof i.data.ObservableObject || !r.options.dataValueField) && (r.dataSource.data(t), r.value(n || r._initialValues), r._retrieveData = !0)
            },
            _setOption: function (e, t) {
                var n = this.element[0].children[this._optionsMap[e]];
                n && (n.selected = t)
            },
            _fetchData: function () {
                var e = this, t = !!e.dataSource.view().length, n = 0 === e.listView.value().length;
                n || e._request || (e._retrieveData || !e._fetch && !t) && (e._fetch = !0, e._retrieveData = !1, e.dataSource.read().done(function () {
                    e._fetch = !1
                }))
            },
            _isBound: function () {
                return this.listView.bound() && !this._retrieveData
            },
            _dataSource: function () {
                var e = this, t = e.element, n = e.options, r = n.dataSource || {};
                r = z(r) ? {data: r} : r, r.select = t, r.fields = [{field: n.dataTextField}, {field: n.dataValueField}], e.dataSource && e._refreshHandler ? e._unbindDataSource() : (e._progressHandler = u(e._showBusy, e), e._errorHandler = u(e._hideBusy, e)), e.dataSource = i.data.DataSource.create(r).bind(_, e._progressHandler).bind("error", e._errorHandler)
            },
            _reset: function () {
                var t = this, n = t.element, i = n.attr("form"), r = i ? e("#" + i) : n.closest("form");
                r[0] && (t._resetHandler = function () {
                    setTimeout(function () {
                        t.value(t._initialValues), t._placeholder()
                    })
                }, t._form = r.on("reset", t._resetHandler))
            },
            _initValue: function () {
                var e = this.options.value || this.element.val();
                this._old = this._initialValues = this._normalizeValues(e)
            },
            _normalizeValues: function (t) {
                var n = this;
                return null === t ? t = [] : t && e.isPlainObject(t) ? t = [n._value(t)] : t && e.isPlainObject(t[0]) ? t = e.map(t, function (e) {
                    return n._value(e)
                }) : z(t) || t instanceof l ? z(t) && (t = t.slice()) : t = [t], t
            },
            _change: function () {
                var e = this, t = e.value();
                n(t, e._old) || (e._old = t.slice(), e.trigger(v), e.element.trigger(v))
            },
            _click: function (e) {
                var t = e.item;
                e.preventDefault(), this._select(t), this._change(), this._close()
            },
            _keydown: function (t) {
                var n = this, r = t.keyCode, a = n._currentTag, s = n.listView, l = s.focus(), u = n.input.val(), c = i.support.isRtl(n.wrapper), d = n.popup.visible();
                if (r === o.DOWN) {
                    if (t.preventDefault(), !d)return n.open(), void(l || s.focusFirst());
                    l ? (s.focusNext(), s.focus() || s.focusLast()) : s.focusFirst()
                } else if (r === o.UP)d && (l && s.focusPrev(), s.focus() || n.close()), t.preventDefault(); else if (r === o.LEFT && !c || r === o.RIGHT && c)u || (a = a ? a.prev() : e(n.tagList[0].lastChild), a[0] && n.currentTag(a)); else if (r === o.RIGHT && !c || r === o.LEFT && c)!u && a && (a = a.next(), n.currentTag(a[0] ? a : null)); else if (r === o.ENTER && d)n._select(l), n._change(), n._close(), t.preventDefault(); else if (r === o.ESC)d ? t.preventDefault() : n.currentTag(null), n.close(); else if (r === o.HOME)d ? s.focusFirst() : u || (a = n.tagList[0].firstChild, a && n.currentTag(e(a))); else if (r === o.END)d ? s.focusLast() : u || (a = n.tagList[0].lastChild, a && n.currentTag(e(a))); else if (r !== o.DELETE && r !== o.BACKSPACE || u)if (!n.popup.visible() || r !== o.PAGEDOWN && r !== o.PAGEUP)clearTimeout(n._typingTimeout), setTimeout(function () {
                    n._scale()
                }), n._search(); else {
                    t.preventDefault();
                    var p = r === o.PAGEDOWN ? 1 : -1;
                    s.scrollWith(p * s.screenHeight())
                } else {
                    if ("single" === n.options.tagMode)return s.value([]), n._change(), void n._close();
                    r !== o.BACKSPACE || a || (a = e(n.tagList[0].lastChild)), a && a[0] && n._removeTag(a)
                }
            },
            _hideBusy: function () {
                var e = this;
                clearTimeout(e._busy), e.input.attr("aria-busy", !1), e._loading.addClass(x), e._request = !1, e._busy = null, e._showClear()
            },
            _showBusyHandler: function () {
                this.input.attr("aria-busy", !0), this._loading.removeClass(x), this._hideClear()
            },
            _showBusy: function () {
                var e = this;
                e._request = !0, e._busy || (e._busy = setTimeout(u(e._showBusyHandler, e), 100))
            },
            _placeholder: function (e, n) {
                var r = this, a = r.input, o = s(), l = r.options.placeholder, u = a.val(), c = a[0] === o, d = u.length;
                c && !r.options.autoClose && u !== l || (d = 0, u = ""), e === t && (e = !1, a[0] !== o && (e = !r.listView.selectedDataItems()[0])), r._prev = u, a.toggleClass("k-readonly", e).val(e ? l : u), c && !n && i.caret(a[0], d, d), r._scale()
            },
            _scale: function () {
                var e, t = this, n = t.wrapper, i = n.width(), r = t._span.text(t.input.val());
                n.is(":visible") ? e = r.width() + 25 : (r.appendTo(document.documentElement), i = e = r.width() + 25, r.appendTo(n)), t.input.width(e > i ? i : e)
            },
            _option: function (e, n, r) {
                var a = "<option";
                return e !== t && (e += "", e.indexOf('"') !== -1 && (e = e.replace(H, "&quot;")), a += ' value="' + e + '"'), r && (a += " selected"), a += ">", n !== t && (a += i.htmlEncode(n)), a += "</option>"
            },
            _render: function (e) {
                var t, n, i, r, a = this.listView.selectedDataItems(), o = this.listView.value(), s = e.length, l = "";
                o.length !== a.length && (a = this._buildSelectedItems(o));
                var u = {}, c = {};
                for (r = 0; r < s; r++)n = e[r], i = this._value(n), t = this._selectedItemIndex(i, a), t !== -1 && a.splice(t, 1), c[i] = r, l += this._option(i, this._text(n), t !== -1);
                if (a.length)for (r = 0; r < a.length; r++)n = a[r], i = this._value(n), u[i] = s, c[i] = s, s += 1, l += this._option(i, this._text(n), !0);
                this._customOptions = u, this._optionsMap = c, this.element.html(l)
            },
            _buildSelectedItems: function (e) {
                for (var t, n = this.options.dataValueField, i = this.options.dataTextField, r = [], a = 0; a < e.length; a++)t = {}, t[n] = e[a], t[i] = e[a], r.push(t);
                return r
            },
            _selectedItemIndex: function (e, t) {
                for (var n = this._value, i = 0; i < t.length; i++)if (e === n(t[i]))return i;
                return -1
            },
            _search: function () {
                var e = this;
                e._typingTimeout = setTimeout(function () {
                    var t = e.input.val();
                    e._prev !== t && (e._prev = t, e.search(t))
                }, e.options.delay)
            },
            _allowOpening: function () {
                return this._allowSelection() && a.fn._allowOpening.call(this)
            },
            _allowSelection: function () {
                var e = this.options.maxSelectedItems;
                return null === e || e > this.listView.value().length
            },
            _angularTagItems: function (t) {
                var n = this;
                n.angular(t, function () {
                    return {
                        elements: n.tagList[0].children, data: e.map(n.dataItems(), function (e) {
                            return {dataItem: e}
                        })
                    }
                })
            },
            _selectValue: function (e, t) {
                var n, i, r, a = this, o = a.value(), s = a.dataSource.total(), l = a.tagList, u = a._value;
                if (a._angularTagItems("cleanup"), "multiple" === a.options.tagMode) {
                    for (r = t.length - 1; r > -1; r--)n = t[r], l[0].removeChild(l[0].children[n.position]), a._setOption(u(n.dataItem), !1);
                    for (r = 0; r < e.length; r++)i = e[r], l.append(a.tagTemplate(i.dataItem)), a._setOption(u(i.dataItem), !0)
                } else {
                    for ((!a._maxTotal || a._maxTotal < s) && (a._maxTotal = s), l.html(""), o.length && l.append(a.tagTemplate({
                        values: o,
                        dataItems: a.dataItems(),
                        maxTotal: a._maxTotal,
                        currentTotal: s
                    })), r = t.length - 1; r > -1; r--)a._setOption(u(t[r].dataItem), !1);
                    for (r = 0; r < e.length; r++)a._setOption(u(e[r].dataItem), !0)
                }
                a._angularTagItems("compile"), a._placeholder()
            },
            _select: function (e) {
                if (e) {
                    var t = this, n = t.listView, i = n.dataItemByIndex(n.getElementIndex(e)), r = e.hasClass("k-state-selected");
                    if (t._state === h && (t._state = ""), t._allowSelection()) {
                        if (t.trigger(r ? b : w, {dataItem: i, item: e}))return void t._close();
                        n.select(e), t._placeholder(), t._state === f && (t._state = p, n.skipUpdate(!0))
                    }
                }
            },
            _input: function () {
                var t = this, n = t.element, i = n[0].accessKey, r = t._innerWrapper.children("input.k-input");
                r[0] || (r = e('<input class="k-input" style="width: 25px" />').appendTo(t._innerWrapper)), n.removeAttr("accesskey"), t._focused = t.input = r.attr({
                    accesskey: i,
                    autocomplete: "off",
                    role: "listbox",
                    title: n[0].title,
                    "aria-expanded": !1
                })
            },
            _tagList: function () {
                var t = this, n = t._innerWrapper.children("ul");
                n[0] || (n = e('<ul role="listbox" deselectable="on" class="k-reset"/>').appendTo(t._innerWrapper)), t.tagList = n
            },
            _tagTemplate: function () {
                var e, t = this, n = t.options, r = n.tagTemplate, a = n.dataSource, o = "multiple" === n.tagMode;
                t.element[0].length && !a && (n.dataTextField = n.dataTextField || "text", n.dataValueField = n.dataValueField || "value"), e = o ? i.template("#:" + i.expr(n.dataTextField, "data") + "#", {useWithBlock: !1}) : i.template("#:values.length# item(s) selected"), t.tagTextTemplate = r = r ? i.template(r) : e, t.tagTemplate = function (e) {
                    return '<li class="k-button" deselectable="on"><span deselectable="on">' + r(e) + '</span><span unselectable="on" aria-label="' + (o ? "delete" : "open") + '" class="k-select"><span class="k-icon ' + (o ? "k-i-close" : "k-i-arrow-s") + '"></span></span></li>'
                }
            },
            _loader: function () {
                this._loading = e('<span class="k-icon k-i-loading ' + x + '"></span>').insertAfter(this.input)
            },
            _clearButton: function () {
                this._clear = e('<span deselectable="on" class="k-icon k-i-close" title="clear"></span>').attr({
                    role: "button",
                    tabIndex: -1
                }), this.options.clearButton && this._clear.insertAfter(this.input)
            },
            _textContainer: function () {
                var t = i.getComputedStyles(this.input[0], P);
                t.position = "absolute", t.visibility = "hidden", t.top = -3333, t.left = -3333, this._span = e("<span/>").css(t).appendTo(this.wrapper)
            },
            _wrapper: function () {
                var t = this, n = t.element, i = n.parent("span.k-multiselect");
                i[0] || (i = n.wrap('<div class="k-widget k-multiselect k-header" deselectable="on" />').parent(), i[0].style.cssText = n[0].style.cssText, i[0].title = n[0].title, e('<div class="k-multiselect-wrap k-floatwrap" deselectable="on" />').insertBefore(n)), t.wrapper = i.addClass(n[0].className).css("display", ""), t._innerWrapper = e(i[0].firstChild)
            }
        });
        r.plugin(V)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.numerictextbox", ["kendo.core", "kendo.userevents"], e)
}(function () {
    return function (e, t) {
        function n(e, t) {
            var n = "k-i-arrow-" + ("increase" === e ? "n" : "s");
            return '<span unselectable="on" class="k-link k-link-' + e + '" aria-label="' + t + '"><span unselectable="on" class="k-icon ' + n + '"></span></span>'
        }

        function i(e, t) {
            var n = parseFloat(e, 10).toString().split(D);
            return n[1] && (n[1] = n[1].substring(0, t)), n.join(D)
        }

        var r = window.kendo, a = r.caret, o = r.keys, s = r.ui, l = s.Widget, u = r._activeElement, c = r._extractFormat, d = r.parseFloat, p = r.support.placeholder, f = r.getCulture, h = "change", m = "disabled", g = "readonly", v = "k-input", _ = "spin", w = ".kendoNumericTextBox", b = "touchend", y = "mouseleave" + w, k = "mouseenter" + w + " " + y, x = "k-state-default", C = "k-state-focused", T = "k-state-hover", S = "focus", D = ".", I = "k-state-selected", F = "k-state-disabled", E = "aria-disabled", O = "aria-readonly", A = /^(-)?(\d*)$/, M = null, H = e.proxy, z = e.extend, P = l.extend({
            init: function (n, i) {
                var a, o, s, u, d, p = this, f = i && i.step !== t;
                l.fn.init.call(p, n, i), i = p.options, n = p.element.on("focusout" + w, H(p._focusout, p)).attr("role", "spinbutton"), i.placeholder = i.placeholder || n.attr("placeholder"), p._initialOptions = z({}, i), a = p.min(n.attr("min")), o = p.max(n.attr("max")), s = p._parse(n.attr("step")), i.min === M && a !== M && (i.min = a), i.max === M && o !== M && (i.max = o), f || s === M || (i.step = s), p._reset(), p._wrapper(), p._arrows(), p._input(), r.support.mobileOS ? p._text.on(b + w + " " + S + w, function () {
                    r.support.browser.edge ? p._text.one(S + w, function () {
                        p._toggleText(!1), n.focus()
                    }) : (p._toggleText(!1), n.focus())
                }) : p._text.on(S + w, H(p._click, p)), n.attr("aria-valuemin", i.min).attr("aria-valuemax", i.max), i.format = c(i.format), u = i.value, p.value(u !== M ? u : n.val()), d = n.is("[disabled]") || e(p.element).parents("fieldset").is(":disabled"), d ? p.enable(!1) : p.readonly(n.is("[readonly]")), r.notify(p)
            },
            options: {
                name: "NumericTextBox",
                decimals: M,
                restrictDecimals: !1,
                min: M,
                max: M,
                value: M,
                step: 1,
                round: !0,
                culture: "",
                format: "n",
                spinners: !0,
                placeholder: "",
                upArrowText: "Increase value",
                downArrowText: "Decrease value"
            },
            events: [h, _],
            _editable: function (e) {
                var t = this, n = t.element, i = e.disable, r = e.readonly, a = t._text.add(n), o = t._inputWrapper.off(k);
                t._toggleText(!0), t._upArrowEventHandler.unbind("press"), t._downArrowEventHandler.unbind("press"), n.off("keydown" + w).off("keypress" + w).off("paste" + w), r || i ? (o.addClass(i ? F : x).removeClass(i ? x : F), a.attr(m, i).attr(g, r).attr(E, i).attr(O, r)) : (o.addClass(x).removeClass(F).on(k, t._toggleHover), a.removeAttr(m).removeAttr(g).attr(E, !1).attr(O, !1), t._upArrowEventHandler.bind("press", function (e) {
                    e.preventDefault(), t._spin(1), t._upArrow.addClass(I)
                }), t._downArrowEventHandler.bind("press", function (e) {
                    e.preventDefault(), t._spin(-1), t._downArrow.addClass(I)
                }), t.element.on("keydown" + w, H(t._keydown, t)).on("keypress" + w, H(t._keypress, t)).on("paste" + w, H(t._paste, t)))
            },
            readonly: function (e) {
                this._editable({readonly: e === t || e, disable: !1})
            },
            enable: function (e) {
                this._editable({readonly: !1, disable: !(e = e === t || e)})
            },
            destroy: function () {
                var e = this;
                e.element.add(e._text).add(e._upArrow).add(e._downArrow).add(e._inputWrapper).off(w), e._upArrowEventHandler.destroy(), e._downArrowEventHandler.destroy(), e._form && e._form.off("reset", e._resetHandler), l.fn.destroy.call(e)
            },
            min: function (e) {
                return this._option("min", e)
            },
            max: function (e) {
                return this._option("max", e)
            },
            step: function (e) {
                return this._option("step", e)
            },
            value: function (e) {
                var n, i = this;
                return e === t ? i._value : (e = i._parse(e), n = i._adjust(e), void(e === n && (i._update(e), i._old = i._value)))
            },
            focus: function () {
                this._focusin()
            },
            _adjust: function (e) {
                var t = this, n = t.options, i = n.min, r = n.max;
                return e === M ? e : (i !== M && e < i ? e = i : r !== M && e > r && (e = r), e)
            },
            _arrows: function () {
                var t, i = this, a = function () {
                    clearTimeout(i._spinning), t.removeClass(I)
                }, o = i.options, s = o.spinners, l = i.element;
                t = l.siblings(".k-icon"), t[0] || (t = e(n("increase", o.upArrowText) + n("decrease", o.downArrowText)).insertAfter(l), t.wrapAll('<span class="k-select"/>')), s || (t.parent().toggle(s), i._inputWrapper.addClass("k-expand-padding")), i._upArrow = t.eq(0), i._upArrowEventHandler = new r.UserEvents(i._upArrow, {release: a}), i._downArrow = t.eq(1), i._downArrowEventHandler = new r.UserEvents(i._downArrow, {release: a})
            },
            _blur: function () {
                var e = this;
                e._toggleText(!0), e._change(e.element.val())
            },
            _click: function (e) {
                var t = this;
                clearTimeout(t._focusing), t._focusing = setTimeout(function () {
                    var n, i, r, o = e.target, s = a(o)[0], l = o.value.substring(0, s), u = t._format(t.options.format), c = u[","], d = 0;
                    c && (i = new RegExp("\\" + c, "g"), r = new RegExp("([\\d\\" + c + "]+)(\\" + u[D] + ")?(\\d+)?")), r && (n = r.exec(l)), n && (d = n[0].replace(i, "").length, l.indexOf("(") != -1 && t._value < 0 && d++), t._focusin(), a(t.element[0], d)
                })
            },
            _change: function (e) {
                var t = this;
                t._update(e), e = t._value, t._old != e && (t._old = e, t._typing || t.element.trigger(h), t.trigger(h)), t._typing = !1
            },
            _culture: function (e) {
                return e || f(this.options.culture)
            },
            _focusin: function () {
                var e = this;
                e._inputWrapper.addClass(C), e._toggleText(!1), e.element[0].focus()
            },
            _focusout: function () {
                var e = this;
                clearTimeout(e._focusing), e._inputWrapper.removeClass(C).removeClass(T), e._blur()
            },
            _format: function (e, t) {
                var n = this._culture(t).numberFormat;
                return e = e.toLowerCase(), e.indexOf("c") > -1 ? n = n.currency : e.indexOf("p") > -1 && (n = n.percent), n
            },
            _input: function () {
                var t, n = this, i = n.options, r = "k-formatted-value", a = n.element.addClass(v).show()[0], o = a.accessKey, s = n.wrapper;
                t = s.find(D + r), t[0] || (t = e('<input type="text"/>').insertBefore(a).addClass(r));
                try {
                    a.setAttribute("type", "text")
                } catch (l) {
                    a.type = "text"
                }
                t[0].tabIndex = a.tabIndex, t[0].style.cssText = a.style.cssText, t[0].title = a.title, t.prop("placeholder", i.placeholder), o && (t.attr("accesskey", o), a.accessKey = ""), n._text = t.addClass(a.className).attr({
                    role: "spinbutton",
                    "aria-valuemin": i.min,
                    "aria-valuemax": i.max
                })
            },
            _keydown: function (e) {
                var t = this, n = e.keyCode;
                t._key = n, n == o.DOWN ? t._step(-1) : n == o.UP ? t._step(1) : n == o.ENTER ? t._change(t.element.val()) : t._typing = !0
            },
            _keypress: function (e) {
                if (0 !== e.which && !e.metaKey && !e.ctrlKey && e.keyCode !== o.BACKSPACE && e.keyCode !== o.ENTER) {
                    var t, n = this, i = n.options.min, r = n.element, s = a(r), l = s[0], u = s[1], c = String.fromCharCode(e.which), d = n._format(n.options.format), p = n._key === o.NUMPAD_DOT, f = r.val();
                    p && (c = d[D]), f = f.substring(0, l) + c + f.substring(u), t = n._numericRegex(d).test(f), t && p ? (r.val(f), a(r, l + c.length), e.preventDefault()) : (null !== i && i >= 0 && "-" === f.charAt(0) || !t) && e.preventDefault(), n._key = 0
                }
            },
            _numericRegex: function (e) {
                var t = this, n = e[D], i = t.options.decimals, r = "*";
                return n === D && (n = "\\" + n), i === M && (i = e.decimals), 0 === i ? A : (t.options.restrictDecimals && (r = "{0," + i + "}"), t._separator !== n && (t._separator = n, t._floatRegExp = new RegExp("^(-)?(((\\d+(" + n + "\\d" + r + ")?)|(" + n + "\\d" + r + ")))?$")), t._floatRegExp)
            },
            _paste: function (e) {
                var t = this, n = e.target, i = n.value, r = t._format(t.options.format);
                setTimeout(function () {
                    var e = t._parse(n.value), a = t._numericRegex(r).test(n.value);
                    e !== M && t._adjust(e) === e && a || t._update(i)
                })
            },
            _option: function (e, n) {
                var i = this, r = i.element, a = i.options;
                return n === t ? a[e] : (n = i._parse(n), void((n || "step" !== e) && (a[e] = n, r.add(i._text).attr("aria-value" + e, n), r.attr(e, n))))
            },
            _spin: function (e, t) {
                var n = this;
                t = t || 500, clearTimeout(n._spinning), n._spinning = setTimeout(function () {
                    n._spin(e, 50)
                }, t), n._step(e)
            },
            _step: function (e) {
                var t = this, n = t.element, i = t._parse(n.val()) || 0;
                u() != n[0] && t._focusin(), i += t.options.step * e, t._update(t._adjust(i)), t._typing = !1, t.trigger(_)
            },
            _toggleHover: function (t) {
                e(t.currentTarget).toggleClass(T, "mouseenter" === t.type)
            },
            _toggleText: function (e) {
                var t = this;
                t._text.toggle(e), t.element.toggle(!e)
            },
            _parse: function (e, t) {
                return d(e, this._culture(t), this.options.format)
            },
            _round: function (e, t) {
                var n = this.options.round ? r._round : i;
                return n(e, t)
            },
            _update: function (e) {
                var t, n = this, i = n.options, a = i.format, o = i.decimals, s = n._culture(), l = n._format(a, s);
                o === M && (o = l.decimals), e = n._parse(e, s), t = e !== M, t && (e = parseFloat(n._round(e, o), 10)), n._value = e = n._adjust(e), n._placeholder(r.toString(e, a, s)), t ? (e = e.toString(), e.indexOf("e") !== -1 && (e = n._round(+e, o)), e = e.replace(D, l[D])) : e = "", n.element.val(e), n.element.add(n._text).attr("aria-valuenow", e)
            },
            _placeholder: function (e) {
                var t = this._text;
                t.val(e), p || e || t.val(this.options.placeholder), t.attr("title", t.attr("title") || t.val()), t.attr("aria-title", t.attr("title") || t.val())
            },
            _wrapper: function () {
                var t, n = this, i = n.element, r = i[0];
                t = i.parents(".k-numerictextbox"), t.is("span.k-numerictextbox") || (t = i.hide().wrap('<span class="k-numeric-wrap k-state-default" />').parent(), t = t.wrap("<span/>").parent()), t[0].style.cssText = r.style.cssText, r.style.width = "", n.wrapper = t.addClass("k-widget k-numerictextbox").addClass(r.className).css("display", ""), n._inputWrapper = e(t[0].firstChild)
            },
            _reset: function () {
                var t = this, n = t.element, i = n.attr("form"), r = i ? e("#" + i) : n.closest("form");
                r[0] && (t._resetHandler = function () {
                    setTimeout(function () {
                        t.value(n[0].value), t.max(t._initialOptions.max), t.min(t._initialOptions.min)
                    })
                }, t._form = r.on("reset", t._resetHandler))
            }
        });
        s.plugin(P)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.toolbar", ["kendo.core", "kendo.userevents", "kendo.popup"], e)
}(function () {
    return function (e, t) {
        function n() {
            var e, t = this.options.anchor, n = t.outerWidth();
            s.wrap(this.element).addClass("k-split-wrapper"), e = "border-box" !== this.element.css("box-sizing") ? n - (this.element.outerWidth() - this.element.width()) : n, this.element.css({
                fontFamily: t.css("font-family"),
                "min-width": e
            })
        }

        function i(e) {
            e.target.is(".k-toggle-button") || e.target.toggleClass(k, "press" == e.type)
        }

        function r(t) {
            return t = e(t), t.hasClass("km-actionsheet") ? t.closest(".km-popup-wrapper") : t.addClass("km-widget km-actionsheet").wrap('<div class="km-actionsheet-wrapper km-actionsheet-tablet km-widget km-popup"></div>').parent().wrap('<div class="km-popup-wrapper k-popup"></div>').parent()
        }

        function a(e) {
            e.preventDefault()
        }

        function o(t, n) {
            var i = "next" === n ? e.fn.next : e.fn.prev, r = "next" === n ? e.fn.first : e.fn.last, a = i.call(t);
            return a.is(":kendoFocusable") || !a.length ? a : a.find(":kendoFocusable").length ? r.call(a.find(":kendoFocusable")) : o(a, n)
        }

        var s = window.kendo, l = s.Class, u = s.ui.Widget, c = e.proxy, d = s.isFunction, p = s.keys, f = "k-toolbar", h = "k-button", m = "k-overflow-button", g = "k-toggle-button", v = "k-button-group", _ = "k-split-button", w = "k-separator", b = "k-popup", y = "k-toolbar-resizable", k = "k-state-active", x = "k-state-disabled", C = "k-state-hidden", T = "k-group-start", S = "k-group-end", D = "k-primary", I = "k-icon", F = "k-i-", E = "k-button-icon", O = "k-button-icontext", A = "k-list-container k-split-container", M = "k-split-button-arrow", H = "k-overflow-anchor", z = "k-overflow-container", P = "k-toolbar-first-visible", V = "k-toolbar-last-visible", L = "click", R = "toggle", B = "open", N = "close", W = "overflowOpen", U = "overflowClose", q = "never", j = "auto", G = "always", Y = "k-overflow-hidden", $ = s.attr("uid");
        s.toolbar = {};
        var K = {
            overflowAnchor: '<div tabindex="0" class="k-overflow-anchor"></div>',
            overflowContainer: '<ul class="k-overflow-container k-list-container"></ul>'
        };
        s.toolbar.registerComponent = function (e, t, n) {
            K[e] = {toolbar: t, overflow: n}
        };
        var J = s.Class.extend({
            addOverflowAttr: function () {
                this.element.attr(s.attr("overflow"), this.options.overflow || j)
            }, addUidAttr: function () {
                this.element.attr($, this.options.uid)
            }, addIdAttr: function () {
                this.options.id && this.element.attr("id", this.options.id)
            }, addOverflowIdAttr: function () {
                this.options.id && this.element.attr("id", this.options.id + "_overflow")
            }, attributes: function () {
                this.options.attributes && this.element.attr(this.options.attributes)
            }, show: function () {
                this.element.removeClass(C).show(), this.options.hidden = !1
            }, hide: function () {
                this.element.addClass(C).hide(), this.options.hidden = !0
            }, remove: function () {
                this.element.remove()
            }, enable: function (e) {
                e === t && (e = !0), this.element.toggleClass(x, !e), this.options.enable = e
            }, twin: function () {
                var e = this.element.attr($);
                return this.overflow ? this.toolbar.element.find("[" + $ + "='" + e + "']").data(this.options.type) : this.toolbar.options.resizable ? this.toolbar.popup.element.find("[" + $ + "='" + e + "']").data(this.options.type) : void 0
            }
        });
        s.toolbar.Item = J;
        var Q = J.extend({
            init: function (n, i) {
                var r = e(n.useButtonTag ? '<button tabindex="0"></button>' : '<a href tabindex="0"></a>');
                this.element = r, this.options = n, this.toolbar = i, this.attributes(), n.primary && r.addClass(D), n.togglable && (r.addClass(g), this.toggle(n.selected)), n.url === t || n.useButtonTag || (r.attr("href", n.url), n.mobile && r.attr(s.attr("role"), "button")), n.group && (r.attr(s.attr("group"), n.group), this.group = this.toolbar.addToGroup(this, n.group)), !n.togglable && n.click && d(n.click) && (this.clickHandler = n.click), n.togglable && n.toggle && d(n.toggle) && (this.toggleHandler = n.toggle)
            }, toggle: function (e, t) {
                e = !!e, this.group && e ? this.group.select(this) : this.group || this.select(e), t && this.twin() && this.twin().toggle(e)
            }, getParentGroup: function () {
                if (this.options.isChild)return this.element.closest("." + v).data("buttonGroup")
            }, _addGraphics: function () {
                var t, n, i, r = this.element, a = this.options.icon, o = this.options.spriteCssClass, s = this.options.imageUrl;
                (o || s || a) && (t = !0, r.contents().not("span.k-sprite,span." + I + ",img.k-image").each(function (n, i) {
                    (1 == i.nodeType || 3 == i.nodeType && e.trim(i.nodeValue).length > 0) && (t = !1)
                }), t ? r.addClass(E) : r.addClass(O)), a ? (n = r.children("span." + I).first(), n[0] || (n = e('<span class="' + I + '"></span>').prependTo(r)), n.addClass(F + a)) : o ? (n = r.children("span.k-sprite").first(), n[0] || (n = e('<span class="k-sprite"></span>').prependTo(r)), n.addClass(o)) : s && (i = r.children("img.k-image").first(), i[0] || (i = e('<img alt="icon" class="k-image" />').prependTo(r)), i.attr("src", s))
            }
        });
        s.toolbar.Button = Q;
        var X = Q.extend({
            init: function (e, t) {
                Q.fn.init.call(this, e, t);
                var n = this.element;
                n.addClass(h), this.addIdAttr(), e.align && n.addClass("k-align-" + e.align), "overflow" != e.showText && e.text && (e.mobile ? n.html('<span class="km-text">' + e.text + "</span>") : n.html(e.text)), e.hasIcon = "overflow" != e.showIcon && (e.icon || e.spriteCssClass || e.imageUrl), e.hasIcon && this._addGraphics(), this.addUidAttr(), this.addOverflowAttr(), this.enable(e.enable), e.hidden && this.hide(), this.element.data({
                    type: "button",
                    button: this
                })
            }, select: function (e) {
                e === t && (e = !1), this.element.toggleClass(k, e), this.options.selected = e
            }
        });
        s.toolbar.ToolBarButton = X;
        var Z = Q.extend({
            init: function (e, t) {
                this.overflow = !0, Q.fn.init.call(this, e, t);
                var n = this.element;
                "toolbar" != e.showText && e.text && (e.mobile ? n.html('<span class="km-text">' + e.text + "</span>") : n.html('<span class="k-text">' + e.text + "</span>")), e.hasIcon = "toolbar" != e.showIcon && (e.icon || e.spriteCssClass || e.imageUrl), e.hasIcon && this._addGraphics(), e.isChild || this._wrap(), this.addOverflowIdAttr(), this.attributes(), this.addUidAttr(), this.addOverflowAttr(), this.enable(e.enable), n.addClass(m + " " + h), e.hidden && this.hide(), this.element.data({
                    type: "button",
                    button: this
                })
            }, _wrap: function () {
                this.element = this.element.wrap("<li></li>").parent()
            }, overflowHidden: function () {
                this.element.addClass(Y)
            }, select: function (e) {
                e === t && (e = !1), this.options.isChild ? this.element.toggleClass(k, e) : this.element.find(".k-button").toggleClass(k, e), this.options.selected = e
            }
        });
        s.toolbar.OverflowButton = Z, s.toolbar.registerComponent("button", X, Z);
        var ee = J.extend({
            createButtons: function (t) {
                for (var n, i = this.options, r = i.buttons || [], a = 0; a < r.length; a++)r[a].uid || (r[a].uid = s.guid()), n = new t(e.extend({
                    mobile: i.mobile,
                    isChild: !0,
                    type: "button"
                }, r[a]), this.toolbar), n.element.appendTo(this.element)
            }, refresh: function () {
                this.element.children().filter(":not('." + C + "'):first").addClass(T), this.element.children().filter(":not('." + C + "'):last").addClass(S)
            }
        });
        s.toolbar.ButtonGroup = ee;
        var te = ee.extend({
            init: function (t, n) {
                var i = this.element = e("<div></div>");
                this.options = t, this.toolbar = n, this.addIdAttr(), t.align && i.addClass("k-align-" + t.align), this.createButtons(X), this.attributes(), this.addUidAttr(), this.addOverflowAttr(), this.refresh(), i.addClass(v), this.element.data({
                    type: "buttonGroup",
                    buttonGroup: this
                })
            }
        });
        s.toolbar.ToolBarButtonGroup = te;
        var ne = ee.extend({
            init: function (t, n) {
                var i = this.element = e("<li></li>");
                this.options = t, this.toolbar = n, this.overflow = !0, this.addOverflowIdAttr(), this.createButtons(Z), this.attributes(), this.addUidAttr(), this.addOverflowAttr(), this.refresh(), i.addClass((t.mobile ? "" : v) + " k-overflow-group"), this.element.data({
                    type: "buttonGroup",
                    buttonGroup: this
                })
            }, overflowHidden: function () {
                this.element.addClass(Y)
            }
        });
        s.toolbar.OverflowButtonGroup = ne, s.toolbar.registerComponent("buttonGroup", te, ne);
        var ie = J.extend({
            init: function (t, n) {
                var i = this.element = e('<div class="' + _ + '" tabindex="0"></div>');
                this.options = t, this.toolbar = n, this.mainButton = new X(e.extend({}, t, {hidden: !1}), n), this.arrowButton = e('<a class="' + h + " " + M + '"><span class="' + (t.mobile ? "km-icon km-arrowdown" : "k-icon k-i-arrow-s") + '"></span></a>'), this.popupElement = e('<ul class="' + A + '"></ul>'), this.mainButton.element.removeAttr("href tabindex").appendTo(i), this.arrowButton.appendTo(i), this.popupElement.appendTo(i), t.align && i.addClass("k-align-" + t.align), t.id || (t.id = t.uid), i.attr("id", t.id + "_wrapper"), this.addOverflowAttr(), this.addUidAttr(), this.createMenuButtons(), this.createPopup(), this._navigatable(), this.mainButton.main = !0, this.enable(t.enable), t.hidden && this.hide(), i.data({
                    type: "splitButton",
                    splitButton: this,
                    kendoPopup: this.popup
                })
            }, _navigatable: function () {
                var t = this;
                t.popupElement.on("keydown", "." + h, function (n) {
                    var i = e(n.target).parent();
                    n.preventDefault(), n.keyCode === p.ESC || n.keyCode === p.TAB || n.altKey && n.keyCode === p.UP ? (t.toggle(), t.focus()) : n.keyCode === p.DOWN ? o(i, "next").focus() : n.keyCode === p.UP ? o(i, "prev").focus() : n.keyCode !== p.SPACEBAR && n.keyCode !== p.ENTER || t.toolbar.userEvents.trigger("tap", {target: e(n.target)})
                })
            }, createMenuButtons: function () {
                for (var t, n = this.options, i = n.menuButtons, r = 0; r < i.length; r++)t = new X(e.extend({
                    mobile: n.mobile,
                    type: "button",
                    click: n.click
                }, i[r]), this.toolbar), t.element.wrap("<li></li>").parent().appendTo(this.popupElement)
            }, createPopup: function () {
                var t = this.options, i = this.element;
                this.popupElement.attr("id", t.id + "_optionlist").attr($, t.rootUid), t.mobile && (this.popupElement = r(this.popupElement)), this.popup = this.popupElement.kendoPopup({
                    appendTo: t.mobile ? e(t.mobile).children(".km-pane") : null,
                    anchor: i,
                    isRtl: this.toolbar._isRtl,
                    copyAnchorStyles: !1,
                    animation: t.animation,
                    open: n,
                    activate: function () {
                        this.element.find(":kendoFocusable").first().focus()
                    },
                    close: function () {
                        i.focus()
                    }
                }).data("kendoPopup"), this.popup.element.on(L, "a.k-button", a)
            }, remove: function () {
                this.popup.element.off(L, "a.k-button"), this.popup.destroy(), this.element.remove()
            }, toggle: function () {
                this.popup.toggle()
            }, enable: function (e) {
                e === t && (e = !0), this.mainButton.enable(e), this.options.enable = e
            }, focus: function () {
                this.element.focus()
            }, hide: function () {
                this.popup && this.popup.close(), this.element.addClass(C).hide(), this.options.hidden = !0
            }, show: function () {
                this.element.removeClass(C).hide(), this.options.hidden = !1
            }
        });
        s.toolbar.ToolBarSplitButton = ie;
        var re = J.extend({
            init: function (t, n) {
                var i, r = this.element = e('<li class="' + _ + '"></li>'), a = t.menuButtons;
                this.options = t, this.toolbar = n, this.overflow = !0, this.mainButton = new Z(e.extend({isChild: !0}, t)), this.mainButton.element.appendTo(r);
                for (var o = 0; o < a.length; o++)i = new Z(e.extend({
                    mobile: t.mobile,
                    isChild: !0
                }, a[o]), this.toolbar), i.element.appendTo(r);
                this.addUidAttr(), this.addOverflowAttr(), this.mainButton.main = !0, r.data({
                    type: "splitButton",
                    splitButton: this
                })
            }, overflowHidden: function () {
                this.element.addClass(Y)
            }
        });
        s.toolbar.OverflowSplitButton = re, s.toolbar.registerComponent("splitButton", ie, re);
        var ae = J.extend({
            init: function (t, n) {
                var i = this.element = e("<div>&nbsp;</div>");
                this.element = i, this.options = t, this.toolbar = n, this.attributes(), this.addIdAttr(), this.addUidAttr(), this.addOverflowAttr(), i.addClass(w), i.data({
                    type: "separator",
                    separator: this
                })
            }
        }), oe = J.extend({
            init: function (t, n) {
                var i = this.element = e("<li>&nbsp;</li>");
                this.element = i, this.options = t, this.toolbar = n, this.overflow = !0, this.attributes(), this.addUidAttr(), this.addOverflowIdAttr(), i.addClass(w), i.data({
                    type: "separator",
                    separator: this
                })
            }, overflowHidden: function () {
                this.element.addClass(Y)
            }
        });
        s.toolbar.registerComponent("separator", ae, oe);
        var se = J.extend({
            init: function (t, n, i) {
                var r = d(t) ? t(n) : t;
                r = r instanceof jQuery ? r.wrap("<div></div>").parent() : e("<div></div>").html(r), this.element = r, this.options = n, this.options.type = "template", this.toolbar = i, this.attributes(), this.addUidAttr(), this.addIdAttr(), this.addOverflowAttr(), r.data({
                    type: "template",
                    template: this
                })
            }
        });
        s.toolbar.TemplateItem = se;
        var le = J.extend({
            init: function (t, n, i) {
                var r = e(d(t) ? t(n) : t);
                r = r instanceof jQuery ? r.wrap("<li></li>").parent() : e("<li></li>").html(r), this.element = r, this.options = n, this.options.type = "template", this.toolbar = i, this.overflow = !0, this.attributes(), this.addUidAttr(), this.addOverflowIdAttr(), this.addOverflowAttr(), r.data({
                    type: "template",
                    template: this
                })
            }, overflowHidden: function () {
                this.element.addClass(Y)
            }
        });
        s.toolbar.OverflowTemplateItem = le;
        var ue = l.extend({
            init: function (e) {
                this.name = e, this.buttons = []
            }, add: function (e) {
                this.buttons[this.buttons.length] = e
            }, remove: function (t) {
                var n = e.inArray(t, this.buttons);
                this.buttons.splice(n, 1)
            }, select: function (e) {
                for (var t, n = 0; n < this.buttons.length; n++)t = this.buttons[n], t.select(!1);
                e.select(!0), e.twin() && e.twin().select(!0)
            }
        }), ce = u.extend({
            init: function (t, n) {
                var r = this;
                if (u.fn.init.call(r, t, n), n = r.options, t = r.wrapper = r.element, t.addClass(f + " k-widget"), this.uid = s.guid(), this._isRtl = s.support.isRtl(t), this._groups = {}, t.attr($, this.uid), r.isMobile = "boolean" == typeof n.mobile ? n.mobile : r.element.closest(".km-root")[0], r.animation = r.isMobile ? {open: {effects: "fade"}} : {}, r.isMobile && (t.addClass("km-widget"), I = "km-icon", F = "km-", h = "km-button", v = "km-buttongroup km-widget", k = "km-state-active", x = "km-state-disabled"), n.resizable ? (r._renderOverflow(), t.addClass(y), r.overflowUserEvents = new s.UserEvents(r.element, {
                        threshold: 5,
                        allowSelection: !0,
                        filter: "." + H,
                        tap: c(r._toggleOverflow, r)
                    }), r._resizeHandler = s.onResize(function () {
                        r.resize()
                    })) : r.popup = {element: e([])}, n.items && n.items.length)for (var o = 0; o < n.items.length; o++)r.add(n.items[o]);
                r.userEvents = new s.UserEvents(document, {
                    threshold: 5,
                    allowSelection: !0,
                    filter: "[" + $ + "=" + this.uid + "] a." + h + ", [" + $ + "=" + this.uid + "] ." + m,
                    tap: c(r._buttonClick, r),
                    press: i,
                    release: i
                }), r.element.on(L, "a.k-button", a), r._navigatable(), n.resizable && r.popup.element.on(L, NaN, a), n.resizable && this._toggleOverflowAnchor(), s.notify(r)
            },
            events: [L, R, B, N, W, U],
            options: {name: "ToolBar", items: [], resizable: !0, mobile: null},
            addToGroup: function (e, t) {
                var n;
                return n = this._groups[t] ? this._groups[t] : this._groups[t] = new ue, n.add(e), n
            },
            destroy: function () {
                var t = this;
                t.element.find("." + _).each(function (t, n) {
                    e(n).data("kendoPopup").destroy()
                }), t.element.off(L, "a.k-button"), t.userEvents.destroy(), t.options.resizable && (s.unbindResize(t._resizeHandler), t.overflowUserEvents.destroy(), t.popup.element.off(L, "a.k-button"), t.popup.destroy()), u.fn.destroy.call(t)
            },
            add: function (t) {
                var n, i, r = K[t.type], a = t.template, o = this, l = o.isMobile ? "" : "k-item k-state-default", u = t.overflowTemplate;
                if (e.extend(t, {
                        uid: s.guid(),
                        animation: o.animation,
                        mobile: o.isMobile,
                        rootUid: o.uid
                    }), t.menuButtons)for (var c = 0; c < t.menuButtons.length; c++)e.extend(t.menuButtons[c], {uid: s.guid()});
                a && !u ? t.overflow = q : t.overflow || (t.overflow = j), t.overflow !== q && o.options.resizable && (u ? i = new le(u, t, o) : r && (i = new r.overflow(t, o), i.element.addClass(l)), i && (t.overflow === j && i.overflowHidden(), i.element.appendTo(o.popup.container), o.angular("compile", function () {
                    return {elements: i.element.get()}
                }))), t.overflow !== G && (a ? n = new se(a, t, o) : r && (n = new r.toolbar(t, o)), n && (o.options.resizable ? (n.element.appendTo(o.element).css("visibility", "hidden"), o._shrink(o.element.innerWidth()), n.element.css("visibility", "visible")) : n.element.appendTo(o.element), o.angular("compile", function () {
                    return {elements: n.element.get()}
                })));
            },
            _getItem: function (t) {
                var n, i, r, a, o = this.options.resizable;
                return n = this.element.find(t), n.length || (n = e(".k-split-container[data-uid=" + this.uid + "]").find(t)), a = n.length ? n.data("type") : "", i = n.data(a), i ? (i.main && (n = n.parent("." + _), a = "splitButton", i = n.data(a)), o && (r = i.twin())) : o && (n = this.popup.element.find(t), a = n.length ? n.data("type") : "", r = n.data(a), r && r.main && (n = n.parent("." + _), a = "splitButton", r = n.data(a))), {
                    type: a,
                    toolbar: i,
                    overflow: r
                }
            },
            remove: function (e) {
                var t = this._getItem(e);
                t.toolbar && t.toolbar.remove(), t.overflow && t.overflow.remove(), this.resize(!0)
            },
            hide: function (e) {
                var t = this._getItem(e);
                t.toolbar && ("button" === t.toolbar.options.type && t.toolbar.options.isChild ? (t.toolbar.hide(), t.toolbar.getParentGroup().refresh()) : t.toolbar.options.hidden || t.toolbar.hide()), t.overflow && ("button" === t.overflow.options.type && t.overflow.options.isChild ? (t.overflow.hide(), t.overflow.getParentGroup().refresh()) : t.overflow.options.hidden || t.overflow.hide()), this.resize(!0)
            },
            show: function (e) {
                var t = this._getItem(e);
                t.toolbar && ("button" === t.toolbar.options.type && t.toolbar.options.isChild ? (t.toolbar.show(), t.toolbar.getParentGroup().refresh()) : t.toolbar.options.hidden && t.toolbar.show()), t.overflow && ("button" === t.overflow.options.type && t.overflow.options.isChild ? (t.toolbar.show(), t.overflow.getParentGroup().refresh()) : t.overflow.options.hidden && t.overflow.show()), this.resize(!0)
            },
            enable: function (e, t) {
                var n = this._getItem(e);
                "undefined" == typeof t && (t = !0), n.toolbar && n.toolbar.enable(t), n.overflow && n.overflow.enable(t)
            },
            getSelectedFromGroup: function (e) {
                return this.element.find("." + g + "[data-group='" + e + "']").filter("." + k)
            },
            toggle: function (n, i) {
                var r = e(n), a = r.data("button");
                a.options.togglable && (i === t && (i = !0), a.toggle(i, !0))
            },
            _renderOverflow: function () {
                var t = this, n = K.overflowContainer, i = t._isRtl, a = i ? "left" : "right";
                t.overflowAnchor = e(K.overflowAnchor).addClass(h), t.element.append(t.overflowAnchor), t.isMobile ? (t.overflowAnchor.append('<span class="km-icon km-more"></span>'), n = r(n)) : t.overflowAnchor.append('<span class="k-icon k-i-arrow-s"></span>'), t.popup = new s.ui.Popup(n, {
                    origin: "bottom " + a,
                    position: "top " + a,
                    anchor: t.overflowAnchor,
                    isRtl: i,
                    animation: t.animation,
                    appendTo: t.isMobile ? e(t.isMobile).children(".km-pane") : null,
                    copyAnchorStyles: !1,
                    open: function (n) {
                        var r = s.wrap(t.popup.element).addClass("k-overflow-wrapper");
                        t.isMobile ? t.popup.container.css("max-height", parseFloat(e(".km-content:visible").innerHeight()) - 15 + "px") : r.css("margin-left", (i ? -1 : 1) * ((r.outerWidth() - r.width()) / 2 + 1)), t.trigger(W) && n.preventDefault()
                    },
                    activate: function () {
                        this.element.find(":kendoFocusable").first().focus()
                    },
                    close: function (e) {
                        t.trigger(U) && e.preventDefault(), this.element.focus()
                    }
                }), t.popup.element.on("keydown", "." + h, function (n) {
                    var i, r = e(n.target), a = r.parent(), s = a.is("." + v) || a.is("." + _);
                    n.preventDefault(), n.keyCode === p.ESC || n.keyCode === p.TAB || n.altKey && n.keyCode === p.UP ? (t._toggleOverflow(), t.overflowAnchor.focus()) : n.keyCode === p.DOWN ? (i = !s || s && r.is(":last-child") ? a : r, o(i, "next").focus()) : n.keyCode === p.UP ? (i = !s || s && r.is(":first-child") ? a : r, o(i, "prev").focus()) : n.keyCode !== p.SPACEBAR && n.keyCode !== p.ENTER || t.userEvents.trigger("tap", {target: e(n.target)})
                }), t.isMobile ? t.popup.container = t.popup.element.find("." + z) : t.popup.container = t.popup.element, t.popup.container.attr($, this.uid)
            },
            _toggleOverflowAnchor: function () {
                var e = !1;
                e = this.options.mobile ? this.popup.element.find("." + z).children(":not(." + Y + ", ." + b + ")").length > 0 : this.popup.element.children(":not(." + Y + ", ." + b + ")").length > 0, e ? this.overflowAnchor.css({
                    visibility: "visible",
                    width: ""
                }) : this.overflowAnchor.css({visibility: "hidden", width: "1px"})
            },
            _buttonClick: function (t) {
                var n, i, r, a, o, s, l, u = this, c = t.target.closest("." + M).length;
                return t.preventDefault(), c ? void u._toggle(t) : (i = e(t.target).closest("." + h, u.element), void(i.hasClass(H) || (r = i.data("button"), !r && u.popup && (i = e(t.target).closest("." + m, u.popup.container), r = i.parent("li").data("button")), r && r.options.enable && (r.options.togglable ? (o = d(r.toggleHandler) ? r.toggleHandler : null, r.toggle(!r.options.selected, !0), s = {
                    target: i,
                    group: r.options.group,
                    checked: r.options.selected,
                    id: r.options.id
                }, o && o.call(u, s), u.trigger(R, s)) : (o = d(r.clickHandler) ? r.clickHandler : null, s = {
                    sender: u,
                    target: i,
                    id: r.options.id
                }, o && o.call(u, s), u.trigger(L, s)), r.options.url && (r.options.attributes && r.options.attributes.target && (l = r.options.attributes.target), window.open(r.options.url, l || "_self")), i.hasClass(m) && u.popup.close(), a = i.closest(".k-split-container"), a[0] && (n = a.data("kendoPopup"), (n ? n : a.parents(".km-popup-wrapper").data("kendoPopup")).close())))))
            },
            _navigatable: function () {
                var t = this;
                t.element.attr("tabindex", 0).focus(function () {
                    var t = e(this).find(":kendoFocusable:first");
                    t.is("." + H) && (t = o(t, "next")), t[0].focus()
                }).on("keydown", c(t._keydown, t))
            },
            _keydown: function (t) {
                var n = e(t.target), i = t.keyCode, r = this.element.children(":not(.k-separator):visible");
                if (i === p.TAB) {
                    var a = n.parentsUntil(this.element).last(), o = !1, s = !1;
                    a.length || (a = n), a.is("." + H) && (t.shiftKey && t.preventDefault(), r.last().is(":kendoFocusable") ? r.last().focus() : r.last().find(":kendoFocusable").last().focus()), t.shiftKey || r.index(a) !== r.length - 1 || (o = !a.is("." + v) || n.is(":last-child")), t.shiftKey && 1 === r.index(a) && (s = !a.is("." + v) || n.is(":first-child")), o && this.overflowAnchor && "hidden" !== this.overflowAnchor.css("visibility") && (t.preventDefault(), this.overflowAnchor.focus()), s && (t.preventDefault(), this.wrapper.prev(":kendoFocusable").focus())
                }
                if (t.altKey && i === p.DOWN) {
                    var l = e(document.activeElement).data("splitButton"), u = e(document.activeElement).is("." + H);
                    return void(l ? l.toggle() : u && this._toggleOverflow())
                }
                if ((i === p.SPACEBAR || i === p.ENTER) && !n.is("input, checkbox"))return t.preventDefault(), n.is("." + _) && (n = n.children().first()), void this.userEvents.trigger("tap", {target: n})
            },
            _toggle: function (t) {
                var n, i = e(t.target).closest("." + _).data("splitButton");
                t.preventDefault(), i.options.enable && (n = i.popup.element.is(":visible") ? this.trigger(N, {target: i.element}) : this.trigger(B, {target: i.element}), n || i.toggle())
            },
            _toggleOverflow: function () {
                this.popup.toggle()
            },
            _resize: function (e) {
                var t = e.width;
                this.options.resizable && (this.popup.close(), this._shrink(t), this._stretch(t), this._markVisibles(), this._toggleOverflowAnchor())
            },
            _childrenWidth: function () {
                var t = 0;
                return this.element.children(":visible:not('." + C + "')").each(function () {
                    t += e(this).outerWidth(!0)
                }), Math.ceil(t)
            },
            _shrink: function (e) {
                var t, n;
                if (e < this._childrenWidth()) {
                    n = this.element.children(":visible:not([data-overflow='never'], ." + H + ")");
                    for (var i = n.length - 1; i >= 0 && (t = n.eq(i), !(e > this._childrenWidth())); i--)this._hideItem(t)
                }
            },
            _stretch: function (e) {
                var t, n;
                if (e > this._childrenWidth()) {
                    n = this.element.children(":hidden:not('." + C + "')");
                    for (var i = 0; i < n.length && (t = n.eq(i), !(e < this._childrenWidth()) && this._showItem(t, e)); i++);
                }
            },
            _hideItem: function (e) {
                e.hide(), this.popup && this.popup.container.find(">li[data-uid='" + e.data("uid") + "']").removeClass(Y)
            },
            _showItem: function (e, t) {
                return !!(e.length && t > this._childrenWidth() + e.outerWidth(!0)) && (e.show(), this.popup && this.popup.container.find(">li[data-uid='" + e.data("uid") + "']").addClass(Y), !0)
            },
            _markVisibles: function () {
                var e = this.popup.container.children(), t = this.element.children(":not(.k-overflow-anchor)"), n = e.filter(":not(.k-overflow-hidden)"), i = t.filter(":visible");
                e.add(t).removeClass(P + " " + V), n.first().add(i.first()).addClass(P), n.last().add(i.last()).addClass(V)
            }
        });
        s.ui.plugin(ce)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.panelbar", ["kendo.core"], e)
}(function () {
    return function (e, t) {
        function n(t) {
            t = e(t), t.children(v).children(".k-icon").remove(), t.filter(":has(.k-panel),:has(.k-content)").children(".k-link:not(:has([class*=k-i-arrow]))").each(function () {
                var t = e(this), n = t.parent();
                t.append("<span class='k-icon " + (n.hasClass(A) ? "k-i-arrow-n k-panelbar-collapse" : "k-i-arrow-s k-panelbar-expand") + "'/>")
            })
        }

        function i(t) {
            t = e(t), t.filter(".k-first:not(:first-child)").removeClass(x), t.filter(".k-last:not(:last-child)").removeClass(m), t.filter(":first-child").addClass(x), t.filter(":last-child").addClass(m)
        }

        var r = window.kendo, a = r.ui, o = r.keys, s = e.extend, l = e.each, u = r.template, c = a.Widget, d = /^(ul|a|div)$/i, p = ".kendoPanelBar", f = "img", h = "href", m = "k-last", g = "k-link", v = "." + g, _ = "error", w = ".k-item", b = ".k-group", y = b + ":visible", k = "k-image", x = "k-first", C = "expand", T = "select", S = "k-content", D = "activate", I = "collapse", F = "mouseenter", E = "mouseleave", O = "contentLoad", A = "k-state-active", M = "> .k-panel", H = "> .k-content", z = "k-state-focused", P = "k-state-disabled", V = "k-state-selected", L = "." + V, R = "k-state-highlight", B = w + ":not(.k-state-disabled)", N = "> " + B + " > " + v + ", .k-panel > " + B + " > " + v, W = w + ".k-state-disabled > .k-link", U = "> li > " + L + ", .k-panel > li > " + L, q = "k-state-default", j = "aria-disabled", G = "aria-expanded", Y = "aria-hidden", $ = "aria-selected", K = ":visible", J = ":empty", Q = "single", X = {
            content: u("<div role='region' class='k-content'#= contentAttributes(data) #>#= content(item) #</div>"),
            group: u("<ul role='group' aria-hidden='true' class='#= groupCssClass(group) #'#= groupAttributes(group) #>#= renderItems(data) #</ul>"),
            itemWrapper: u("<#= tag(item) # class='#= textClass(item, group) #' #= contentUrl(item) ##= textAttributes(item) #>#= image(item) ##= sprite(item) ##= text(item) ##= arrow(data) #</#= tag(item) #>"),
            item: u("<li role='menuitem' #=aria(item)#class='#= wrapperCssClass(group, item) #'>#= itemWrapper(data) ## if (item.items) { ##= subGroup({ items: item.items, panelBar: panelBar, group: { expanded: item.expanded } }) ## } else if (item.content || item.contentUrl) { ##= renderContent(data) ## } #</li>"),
            image: u("<img class='k-image' alt='' src='#= imageUrl #' />"),
            arrow: u("<span class='#= arrowClass(item) #'></span>"),
            sprite: u("<span class='k-sprite #= spriteCssClass #'></span>"),
            empty: u("")
        }, Z = {
            aria: function (e) {
                var t = "";
                return (e.items || e.content || e.contentUrl) && (t += G + "='" + (e.expanded ? "true" : "false") + "' "), e.enabled === !1 && (t += j + "='true'"), t
            }, wrapperCssClass: function (e, t) {
                var n = "k-item", i = t.index;
                return n += t.enabled === !1 ? " " + P : t.expanded === !0 ? " " + A : " k-state-default", 0 === i && (n += " k-first"), i == e.length - 1 && (n += " k-last"), t.cssClass && (n += " " + t.cssClass), n
            }, textClass: function (e, t) {
                var n = g;
                return t.firstLevel && (n += " k-header"), n
            }, textAttributes: function (e) {
                return e.url ? " href='" + e.url + "'" : ""
            }, arrowClass: function (e) {
                var t = "k-icon";
                return t += e.expanded ? " k-i-arrow-n k-panelbar-collapse" : " k-i-arrow-s k-panelbar-expand"
            }, text: function (e) {
                return e.encoded === !1 ? e.text : r.htmlEncode(e.text)
            }, tag: function (e) {
                return e.url || e.contentUrl ? "a" : "span"
            }, groupAttributes: function (e) {
                return e.expanded !== !0 ? " style='display:none'" : ""
            }, groupCssClass: function () {
                return "k-group k-panel"
            }, contentAttributes: function (e) {
                return e.item.expanded !== !0 ? " style='display:none'" : ""
            }, content: function (e) {
                return e.content ? e.content : e.contentUrl ? "" : "&nbsp;"
            }, contentUrl: function (e) {
                return e.contentUrl ? 'href="' + e.contentUrl + '"' : ""
            }
        }, ee = c.extend({
            init: function (t, n) {
                var i, a = this;
                c.fn.init.call(a, t, n), t = a.wrapper = a.element.addClass("k-widget k-reset k-header k-panelbar"), n = a.options, t[0].id && (a._itemId = t[0].id + "_pb_active"), a._tabindex(), a._initData(n), a._updateClasses(), a._animations(n), t.on("click" + p, N, function (t) {
                    a._click(e(t.currentTarget)) && t.preventDefault()
                }).on(F + p + " " + E + p, N, a._toggleHover).on("click" + p, W, !1).on("keydown" + p, e.proxy(a._keydown, a)).on("focus" + p, function () {
                    var e = a.select();
                    a._current(e[0] ? e : a._first())
                }).on("blur" + p, function () {
                    a._current(null)
                }).attr("role", "menu"), i = t.find("li." + A + " > ." + S), i[0] && a.expand(i.parent(), !1), n.dataSource && a._angularCompile(), r.notify(a)
            },
            events: [C, I, T, D, _, O],
            options: {
                name: "PanelBar",
                animation: {expand: {effects: "expand:vertical", duration: 200}, collapse: {duration: 200}},
                expandMode: "multiple"
            },
            _angularCompile: function () {
                var e = this;
                e.angular("compile", function () {
                    return {elements: e.element.children("li"), data: [{dataItem: e.options.$angular}]}
                })
            },
            _angularCleanup: function () {
                var e = this;
                e.angular("cleanup", function () {
                    return {elements: e.element.children("li")}
                })
            },
            destroy: function () {
                c.fn.destroy.call(this), this.element.off(p), this._angularCleanup(), r.destroy(this.element)
            },
            _initData: function (e) {
                var t = this;
                e.dataSource && (t.element.empty(), t.append(e.dataSource, t.element))
            },
            setOptions: function (e) {
                var t = this.options.animation;
                this._animations(e), e.animation = s(!0, t, e.animation), "dataSource" in e && this._initData(e), c.fn.setOptions.call(this, e)
            },
            expand: function (t, n) {
                var i = this, r = {};
                return t = this.element.find(t), i._animating && t.find("ul").is(":visible") ? void i.one("complete", function () {
                    setTimeout(function () {
                        i.expand(t)
                    })
                }) : (i._animating = !0, n = n !== !1, t.each(function (a, o) {
                    o = e(o);
                    var s = o.find(M).add(o.find(H));
                    if (!o.hasClass(P) && s.length > 0) {
                        if (i.options.expandMode == Q && i._collapseAllExpanded(o))return i;
                        t.find("." + R).removeClass(R), o.addClass(R), n || (r = i.options.animation, i.options.animation = {
                            expand: {effects: {}},
                            collapse: {hide: !0, effects: {}}
                        }), i._triggerEvent(C, o) || i._toggleItem(o, !1), n || (i.options.animation = r)
                    }
                }), i)
            },
            collapse: function (t, n) {
                var i = this, r = {};
                return i._animating = !0, n = n !== !1, t = i.element.find(t), t.each(function (t, a) {
                    a = e(a);
                    var o = a.find(M).add(a.find(H));
                    !a.hasClass(P) && o.is(K) && (a.removeClass(R), n || (r = i.options.animation, i.options.animation = {
                        expand: {effects: {}},
                        collapse: {hide: !0, effects: {}}
                    }), i._triggerEvent(I, a) || i._toggleItem(a, !0), n || (i.options.animation = r))
                }), i
            },
            _toggleDisabled: function (e, t) {
                e = this.element.find(e), e.toggleClass(q, t).toggleClass(P, !t).attr(j, !t)
            },
            select: function (n) {
                var i = this;
                return n === t ? i.element.find(U).parent() : (n = i.element.find(n), n.length ? n.each(function () {
                    var t = e(this), n = t.children(v);
                    return t.hasClass(P) ? i : void(i._triggerEvent(T, t) || i._updateSelected(n))
                }) : this._updateSelected(n), i)
            },
            clearSelection: function () {
                this.select(e())
            },
            enable: function (e, t) {
                return this._toggleDisabled(e, t !== !1), this
            },
            disable: function (e) {
                return this._toggleDisabled(e, !1), this
            },
            append: function (e, t) {
                t = this.element.find(t);
                var r = this._insert(e, t, t.length ? t.find(M) : null);
                return l(r.items, function () {
                    r.group.append(this), i(this)
                }), n(t), i(r.group.find(".k-first, .k-last")), r.group.height("auto"), this
            },
            insertBefore: function (e, t) {
                t = this.element.find(t);
                var n = this._insert(e, t, t.parent());
                return l(n.items, function () {
                    t.before(this), i(this)
                }), i(t), n.group.height("auto"), this
            },
            insertAfter: function (e, t) {
                t = this.element.find(t);
                var n = this._insert(e, t, t.parent());
                return l(n.items, function () {
                    t.after(this), i(this)
                }), i(t), n.group.height("auto"), this
            },
            remove: function (e) {
                e = this.element.find(e);
                var t = this, r = e.parentsUntil(t.element, w), a = e.parent("ul");
                return e.remove(), !a || a.hasClass("k-panelbar") || a.children(w).length || a.remove(), r.length && (r = r.eq(0), n(r), i(r)), t
            },
            reload: function (t) {
                var n = this;
                t = n.element.find(t), t.each(function () {
                    var t = e(this);
                    n._ajaxRequest(t, t.children("." + S), !t.is(K))
                })
            },
            _first: function () {
                return this.element.children(B).first()
            },
            _last: function () {
                var e = this.element.children(B).last(), t = e.children(y);
                return t[0] ? t.children(B).last() : e
            },
            _current: function (n) {
                var i = this, r = i._focused, a = i._itemId;
                return n === t ? r : (i.element.removeAttr("aria-activedescendant"), r && r.length && (r[0].id === a && r.removeAttr("id"), r.children(v).removeClass(z)), e(n).length && (a = n[0].id || a, n.attr("id", a).children(v).addClass(z), i.element.attr("aria-activedescendant", a)), void(i._focused = n))
            },
            _keydown: function (e) {
                var t = this, n = e.keyCode, i = t._current();
                e.target == e.currentTarget && (n == o.DOWN || n == o.RIGHT ? (t._current(t._nextItem(i)), e.preventDefault()) : n == o.UP || n == o.LEFT ? (t._current(t._prevItem(i)), e.preventDefault()) : n == o.ENTER || n == o.SPACEBAR ? (t._click(i.children(v)), e.preventDefault()) : n == o.HOME ? (t._current(t._first()), e.preventDefault()) : n == o.END && (t._current(t._last()), e.preventDefault()))
            },
            _nextItem: function (e) {
                if (!e)return this._first();
                var t = e.children(y), n = e.nextAll(":visible").first();
                return t[0] && (n = t.children("." + x)), n[0] || (n = e.parent(y).parent(w).next()), n[0] || (n = this._first()), n.hasClass(P) && (n = this._nextItem(n)), n
            },
            _prevItem: function (e) {
                if (!e)return this._last();
                var t, n = e.prevAll(":visible").first();
                if (n[0])for (t = n; t[0];)t = t.children(y).children("." + m), t[0] && (n = t); else n = e.parent(y).parent(w), n[0] || (n = this._last());
                return n.hasClass(P) && (n = this._prevItem(n)), n
            },
            _insert: function (t, n, i) {
                var a, o, l = this, u = e.isPlainObject(t), c = n && n[0];
                return c || (i = l.element), o = {
                    firstLevel: i.hasClass("k-panelbar"),
                    expanded: i.parent().hasClass(A),
                    length: i.children().length
                }, c && !i.length && (i = e(ee.renderGroup({group: o})).appendTo(n)), t instanceof r.Observable && (t = t.toJSON()), u || e.isArray(t) ? (a = e.map(u ? [t] : t, function (t, n) {
                    return e("string" == typeof t ? t : ee.renderItem({group: o, item: s(t, {index: n})}))
                }), c && n.attr(G, !1)) : (a = "string" == typeof t && "<" != t.charAt(0) ? l.element.find(t) : e(t), l._updateItemsClasses(a)), {
                    items: a,
                    group: i
                }
            },
            _toggleHover: function (t) {
                var n = e(t.currentTarget);
                n.parents("li." + P).length || n.toggleClass("k-state-hover", t.type == F)
            },
            _updateClasses: function () {
                var t, r, a = this;
                t = a.element.find("li > ul").not(function () {
                    return e(this).parentsUntil(".k-panelbar", "div").length
                }).addClass("k-group k-panel").attr("role", "group"), t.parent().attr(G, !1).not("." + A).children("ul").attr(Y, !0).hide(), r = a.element.add(t).children(), a._updateItemsClasses(r), n(r), i(r)
            },
            _updateItemsClasses: function (e) {
                for (var t = e.length, n = 0; n < t; n++)this._updateItemClasses(e[n], n)
            },
            _updateItemClasses: function (t, n) {
                var i, a, o = this._selected, s = this.options.contentUrls, l = s && s[n], u = this.element[0];
                t = e(t).addClass("k-item").attr("role", "menuitem"), r.support.browser.msie && t.css("list-style-position", "inside").css("list-style-position", ""), t.children(f).addClass(k), a = t.children("a").addClass(g), a[0] && (a.attr("href", l), a.children(f).addClass(k)), t.filter(":not([disabled]):not([class*=k-state])").addClass("k-state-default"), t.filter("li[disabled]").addClass("k-state-disabled").attr(j, !0).removeAttr("disabled"), t.children("div").addClass(S).attr("role", "region").attr(Y, !0).hide().parent().attr(G, !1), a = t.children(L), a[0] && (o && o.removeAttr($).children(L).removeClass(V), a.addClass(V), this._selected = t.attr($, !0)), t.children(v)[0] || (i = "<span class='" + g + "'/>", s && s[n] && t[0].parentNode == u && (i = '<a class="k-link k-header" href="' + s[n] + '"/>'), t.contents().filter(function () {
                    return !(this.nodeName.match(d) || 3 == this.nodeType && !e.trim(this.nodeValue))
                }).wrapAll(i)), t.parent(".k-panelbar")[0] && t.children(v).addClass("k-header")
            },
            _click: function (e) {
                var t, n, i, r, a = this, o = a.element;
                if (!e.parents("li." + P).length && e.closest(".k-widget")[0] == o[0]) {
                    var s = e.closest(v), l = s.closest(w);
                    if (a._updateSelected(s), n = l.find(M).add(l.find(H)), i = s.attr(h), r = i && ("#" == i.charAt(i.length - 1) || i.indexOf("#" + a.element[0].id + "-") != -1), t = !(!r && !n.length), n.data("animating"))return t;
                    if (a._triggerEvent(T, l) && (t = !0), t !== !1) {
                        if (a.options.expandMode == Q && a._collapseAllExpanded(l))return t;
                        if (n.length) {
                            var u = n.is(K);
                            a._triggerEvent(u ? I : C, l) || (t = a._toggleItem(l, u))
                        }
                        return t
                    }
                }
            },
            _toggleItem: function (e, n) {
                var i, r, a = this, o = e.find(M), s = e.find(v), l = s.attr(h);
                return o.length ? (this._toggleGroup(o, n), i = !0) : (r = e.children("." + S), r.length && (i = !0, r.is(J) && l !== t ? a._ajaxRequest(e, r, n) : a._toggleGroup(r, n))), i
            },
            _toggleGroup: function (e, t) {
                var n = this, i = n.options.animation, r = i.expand, a = s({}, i.collapse), o = a && "effects" in a;
                return e.is(K) != t ? void(n._animating = !1) : (e.parent().attr(G, !t).attr(Y, t).toggleClass(A, !t).find("> .k-link > .k-icon").toggleClass("k-i-arrow-n", !t).toggleClass("k-panelbar-collapse", !t).toggleClass("k-i-arrow-s", t).toggleClass("k-panelbar-expand", t), t ? (r = s(o ? a : s({reverse: !0}, r), {hide: !0}), r.complete = function () {
                    n._animationCallback()
                }) : r = s({
                    complete: function (e) {
                        n._triggerEvent(D, e.closest(w)), n._animationCallback()
                    }
                }, r), void e.kendoStop(!0, !0).kendoAnimate(r))
            },
            _animationCallback: function () {
                var e = this;
                e.trigger("complete"), e._animating = !1
            },
            _collapseAllExpanded: function (t) {
                var n, i = this, r = !1, a = t.find(M).add(t.find(H));
                return a.is(K) && (r = !0), a.is(K) || 0 === a.length || (n = t.siblings(), n.find(M).add(n.find(H)).filter(function () {
                    return e(this).is(K)
                }).each(function (t, n) {
                    n = e(n), r = i._triggerEvent(I, n.closest(w)), r || i._toggleGroup(n, !0)
                })), r
            },
            _ajaxRequest: function (t, n, i) {
                var r = this, a = t.find(".k-panelbar-collapse, .k-panelbar-expand"), o = t.find(v), s = setTimeout(function () {
                    a.addClass("k-i-loading")
                }, 100), l = {}, u = o.attr(h);
                e.ajax({
                    type: "GET", cache: !1, url: u, dataType: "html", data: l, error: function (e, t) {
                        a.removeClass("k-i-loading"), r.trigger(_, {xhr: e, status: t}) && this.complete()
                    }, complete: function () {
                        clearTimeout(s), a.removeClass("k-i-loading")
                    }, success: function (e) {
                        function a() {
                            return {elements: n.get()}
                        }

                        try {
                            r.angular("cleanup", a), n.html(e), r.angular("compile", a)
                        } catch (o) {
                            var s = window.console;
                            s && s.error && s.error(o.name + ": " + o.message + " in " + u), this.error(this.xhr, "error")
                        }
                        r._toggleGroup(n, i), r.trigger(O, {item: t[0], contentElement: n[0]})
                    }
                })
            },
            _triggerEvent: function (e, t) {
                var n = this;
                return n.trigger(e, {item: t[0]})
            },
            _updateSelected: function (e) {
                var t = this, n = t.element, i = e.parent(w), r = t._selected;
                r && r.removeAttr($), t._selected = i.attr($, !0), n.find(U).removeClass(V), n.find("> ." + R + ", .k-panel > ." + R).removeClass(R), e.addClass(V), e.parentsUntil(n, w).filter(":has(.k-header)").addClass(R), t._current(i[0] ? i : null)
            },
            _animations: function (e) {
                e && "animation" in e && !e.animation && (e.animation = {
                    expand: {effects: {}},
                    collapse: {hide: !0, effects: {}}
                })
            }
        });
        s(ee, {
            renderItem: function (e) {
                e = s({panelBar: {}, group: {}}, e);
                var t = X.empty, n = e.item;
                return X.item(s(e, {
                    image: n.imageUrl ? X.image : t,
                    sprite: n.spriteCssClass ? X.sprite : t,
                    itemWrapper: X.itemWrapper,
                    renderContent: ee.renderContent,
                    arrow: n.items || n.content || n.contentUrl ? X.arrow : t,
                    subGroup: ee.renderGroup
                }, Z))
            }, renderGroup: function (e) {
                return X.group(s({
                    renderItems: function (e) {
                        for (var t = "", n = 0, i = e.items, r = i ? i.length : 0, a = s({length: r}, e.group); n < r; n++)t += ee.renderItem(s(e, {
                            group: a,
                            item: s({index: n}, i[n])
                        }));
                        return t
                    }
                }, e, Z))
            }, renderContent: function (e) {
                return X.content(s(e, Z))
            }
        }), r.ui.plugin(ee)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
}), function (e, t) {
    t("kendo.window", ["kendo.draganddrop"], e)
}(function () {
    return function (e, t) {
        function n(e) {
            return "undefined" != typeof e
        }

        function i(e, t, n) {
            return Math.max(Math.min(parseInt(e, 10), n === 1 / 0 ? n : parseInt(n, 10)), parseInt(t, 10))
        }

        function r() {
            return !this.type || this.type.toLowerCase().indexOf("script") >= 0
        }

        function a(e) {
            var t = this;
            t.owner = e, t._draggable = new c(e.wrapper, {
                filter: ">" + x,
                group: e.wrapper.id + "-resizing",
                dragstart: f(t.dragstart, t),
                drag: f(t.drag, t),
                dragend: f(t.dragend, t)
            }), t._draggable.userEvents.bind("press", f(t.addOverlay, t)), t._draggable.userEvents.bind("release", f(t.removeOverlay, t))
        }

        function o(e, t) {
            var n = this;
            n.owner = e, n._draggable = new c(e.wrapper, {
                filter: t,
                group: e.wrapper.id + "-moving",
                dragstart: f(n.dragstart, n),
                drag: f(n.drag, n),
                dragend: f(n.dragend, n),
                dragcancel: f(n.dragcancel, n)
            }), n._draggable.userEvents.stopPropagation = !1
        }

        var s, l = window.kendo, u = l.ui.Widget, c = l.ui.Draggable, d = e.isPlainObject, p = l._activeElement, f = e.proxy, h = e.extend, m = e.each, g = l.template, v = "body", _ = ".kendoWindow", w = ".k-window", b = ".k-window-title", y = b + "bar", k = ".k-window-content", x = ".k-resize-handle", C = ".k-overlay", T = "k-content-frame", S = "k-i-loading", D = "k-state-hover", I = "k-state-focused", F = "k-window-maximized", E = ":visible", O = "hidden", A = "cursor", M = "open", H = "activate", z = "deactivate", P = "close", V = "refresh", L = "minimize", R = "maximize", B = "resize", N = "resizeEnd", W = "dragstart", U = "dragend", q = "error", j = "overflow", G = "zIndex", Y = ".k-window-actions .k-i-minimize,.k-window-actions .k-i-maximize", $ = ".k-i-pin", K = ".k-i-unpin", J = $ + "," + K, Q = ".k-window-titlebar .k-window-action", X = ".k-window-titlebar .k-i-refresh", Z = l.isLocalUrl, ee = u.extend({
            init: function (i, a) {
                var o, s, c, p, h, m, g, v = this, x = {}, C = !1, T = a && a.actions && !a.actions.length;
                u.fn.init.call(v, i, a), a = v.options, p = a.position, i = v.element, h = a.content, T && (a.actions = []), v.appendTo = e(a.appendTo), h && !d(h) && (h = a.content = {url: h}), i.find("script").filter(r).remove(), i.parent().is(v.appendTo) || p.top !== t && p.left !== t || (i.is(E) ? (x = i.offset(), C = !0) : (s = i.css("visibility"), c = i.css("display"), i.css({
                    visibility: O,
                    display: ""
                }), x = i.offset(), i.css({
                    visibility: s,
                    display: c
                })), p.top === t && (p.top = x.top), p.left === t && (p.left = x.left)), n(a.visible) && null !== a.visible || (a.visible = i.is(E)), o = v.wrapper = i.closest(w), i.is(".k-content") && o[0] || (i.addClass("k-window-content k-content"), v._createWindow(i, a), o = v.wrapper = i.closest(w), v._dimensions()), v._position(), a.pinned && v.pin(!0), h && v.refresh(h), a.visible && v.toFront(), m = o.children(k), v._tabindex(m), a.visible && a.modal && v._overlay(o.is(E)).css({opacity: .5}), o.on("mouseenter" + _, Q, f(v._buttonEnter, v)).on("mouseleave" + _, Q, f(v._buttonLeave, v)).on("click" + _, "> " + Q, f(v._windowActionHandler, v)), m.on("keydown" + _, f(v._keydown, v)).on("focus" + _, f(v._focus, v)).on("blur" + _, f(v._blur, v)), this._resizable(), this._draggable(), g = i.attr("id"), g && (g += "_wnd_title", o.children(y).children(b).attr("id", g), m.attr({
                    role: "dialog",
                    "aria-labelledby": g
                })), o.add(o.children(".k-resize-handle," + y)).on("mousedown" + _, f(v.toFront, v)), v.touchScroller = l.touchScroller(i), v._resizeHandler = f(v._onDocumentResize, v), v._marker = l.guid().substring(0, 8), e(window).on("resize" + _ + v._marker, v._resizeHandler), a.visible && (v.trigger(M), v.trigger(H)), l.notify(v)
            },
            _buttonEnter: function (t) {
                e(t.currentTarget).addClass(D)
            },
            _buttonLeave: function (t) {
                e(t.currentTarget).removeClass(D)
            },
            _focus: function () {
                this.wrapper.addClass(I)
            },
            _blur: function () {
                this.wrapper.removeClass(I)
            },
            _dimensions: function () {
                var e = this.wrapper, t = this.options, n = t.width, r = t.height, a = t.maxHeight, o = ["minWidth", "minHeight", "maxWidth", "maxHeight"];
                this.title(t.title);
                for (var s = 0; s < o.length; s++) {
                    var l = t[o[s]] || "";
                    l != 1 / 0 && e.css(o[s], l)
                }
                a != 1 / 0 && this.element.css("maxHeight", a), n ? n.toString().indexOf("%") > 0 ? e.width(n) : e.width(i(n, t.minWidth, t.maxWidth)) : e.width(""), r ? r.toString().indexOf("%") > 0 ? e.height(r) : e.height(i(r, t.minHeight, t.maxHeight)) : e.height(""), t.visible || e.hide()
            },
            _position: function () {
                var e = this.wrapper, t = this.options.position;
                0 === t.top && (t.top = t.top.toString()), 0 === t.left && (t.left = t.left.toString()), e.css({
                    top: t.top || "",
                    left: t.left || ""
                })
            },
            _animationOptions: function (e) {
                var t = this.options.animation, n = {open: {effects: {}}, close: {hide: !0, effects: {}}};
                return t && t[e] || n[e]
            },
            _resize: function () {
                l.resize(this.element.children())
            },
            _resizable: function () {
                var t = this.options.resizable, n = this.wrapper;
                this.resizing && (n.off("dblclick" + _).children(x).remove(), this.resizing.destroy(), this.resizing = null), t && (n.on("dblclick" + _, y, f(function (t) {
                    e(t.target).closest(".k-window-action").length || this.toggleMaximization()
                }, this)), m("n e s w se sw ne nw".split(" "), function (e, t) {
                    n.append(s.resizeHandle(t))
                }), this.resizing = new a(this)), n = null
            },
            _draggable: function () {
                var e = this.options.draggable;
                this.dragging && (this.dragging.destroy(), this.dragging = null), e && (this.dragging = new o(this, e.dragHandle || y))
            },
            _actions: function () {
                var t = this.options.actions, n = this.wrapper.children(y), i = n.find(".k-window-actions");
                t = e.map(t, function (e) {
                    return {name: e}
                }), i.html(l.render(s.action, t))
            },
            setOptions: function (e) {
                u.fn.setOptions.call(this, e);
                var t = this.options.scrollable !== !1;
                if (this.restore(), this._dimensions(), this._position(), this._resizable(), this._draggable(), this._actions(), "undefined" != typeof e.modal) {
                    var n = this.options.visible !== !1;
                    this._overlay(e.modal && n)
                }
                this.element.css(j, t ? "" : "hidden")
            },
            events: [M, H, z, P, L, R, V, B, N, W, U, q],
            options: {
                name: "Window",
                animation: {
                    open: {effects: {zoom: {direction: "in"}, fade: {direction: "in"}}, duration: 350},
                    close: {
                        effects: {zoom: {direction: "out", properties: {scale: .7}}, fade: {direction: "out"}},
                        duration: 350,
                        hide: !0
                    }
                },
                title: "",
                actions: ["Close"],
                autoFocus: !0,
                modal: !1,
                resizable: !0,
                draggable: !0,
                minWidth: 90,
                minHeight: 50,
                maxWidth: 1 / 0,
                maxHeight: 1 / 0,
                pinned: !1,
                scrollable: !0,
                position: {},
                content: null,
                visible: null,
                height: null,
                width: null,
                appendTo: "body"
            },
            _closable: function () {
                return e.inArray("close", e.map(this.options.actions, function (e) {
                        return e.toLowerCase()
                    })) > -1
            },
            _keydown: function (e) {
                var t, n, r, a, o, s, u = this, c = u.options, d = l.keys, p = e.keyCode, f = u.wrapper, h = 10, m = u.options.isMaximized;
                e.target != e.currentTarget || u._closing || (p == d.ESC && u._closable() && u._close(!1), !c.draggable || e.ctrlKey || m || (t = l.getOffset(f), p == d.UP ? n = f.css("top", t.top - h) : p == d.DOWN ? n = f.css("top", t.top + h) : p == d.LEFT ? n = f.css("left", t.left - h) : p == d.RIGHT && (n = f.css("left", t.left + h))), c.resizable && e.ctrlKey && !m && (p == d.UP ? (n = !0, a = f.height() - h) : p == d.DOWN && (n = !0, a = f.height() + h), p == d.LEFT ? (n = !0, r = f.width() - h) : p == d.RIGHT && (n = !0, r = f.width() + h), n && (o = i(r, c.minWidth, c.maxWidth), s = i(a, c.minHeight, c.maxHeight), isNaN(o) || (f.width(o), u.options.width = o + "px"), isNaN(s) || (f.height(s), u.options.height = s + "px"), u.resize())), n && e.preventDefault())
            },
            _overlay: function (t) {
                var n = this.appendTo.children(C), i = this.wrapper;
                return n.length || (n = e("<div class='k-overlay' />")), n.insertBefore(i[0]).toggle(t).css(G, parseInt(i.css(G), 10) - 1), n
            },
            _actionForIcon: function (e) {
                var t = /\bk-i-\w+\b/.exec(e[0].className)[0];
                return {
                    "k-i-close": "_close",
                    "k-i-maximize": "maximize",
                    "k-i-minimize": "minimize",
                    "k-i-restore": "restore",
                    "k-i-refresh": "refresh",
                    "k-i-pin": "pin",
                    "k-i-unpin": "unpin"
                }[t]
            },
            _windowActionHandler: function (t) {
                if (!this._closing) {
                    var n = e(t.target).closest(".k-window-action").find(".k-icon"), i = this._actionForIcon(n);
                    return i ? (t.preventDefault(), this[i](), !1) : void 0
                }
            },
            _modals: function () {
                var t = this, n = e(w).filter(function () {
                    var n = e(this), i = t._object(n), r = i && i.options;
                    return r && r.modal && r.visible && r.appendTo === t.options.appendTo && n.is(E)
                }).sort(function (t, n) {
                    return +e(t).css("zIndex") - +e(n).css("zIndex")
                });
                return t = null, n
            },
            _object: function (e) {
                var n = e.children(k), i = l.widgetInstance(n);
                return i instanceof ee ? i : t
            },
            center: function () {
                var t, n, i = this, r = i.options.position, a = i.wrapper, o = e(window), s = 0, l = 0;
                return i.options.isMaximized ? i : (i.options.pinned || (s = o.scrollTop(), l = o.scrollLeft()), n = l + Math.max(0, (o.width() - a.width()) / 2), t = s + Math.max(0, (o.height() - a.height() - parseInt(a.css("paddingTop"), 10)) / 2), a.css({
                    left: n,
                    top: t
                }), r.top = t, r.left = n, i)
            },
            title: function (e) {
                var t, n = this, i = n.wrapper, r = n.options, a = i.children(y), o = a.children(b);
                return arguments.length ? (e === !1 ? (i.addClass("k-window-titleless"), a.remove()) : (a.length ? o.html(e) : (i.prepend(s.titlebar(r)), n._actions(), a = i.children(y)), t = a.outerHeight(), i.css("padding-top", t), a.css("margin-top", -t)), n.options.title = e, n) : o.html()
            },
            content: function (e, t) {
                var i = this.wrapper.children(k), r = i.children(".km-scroll-container");
                return i = r[0] ? r : i, n(e) ? (this.angular("cleanup", function () {
                    return {elements: i.children()}
                }), l.destroy(this.element.children()), i.empty().html(e), this.angular("compile", function () {
                    for (var e = [], n = i.length; --n >= 0;)e.push({dataItem: t});
                    return {elements: i.children(), data: e}
                }), this) : i.html()
            },
            open: function () {
                var t, n, i = this, r = i.wrapper, a = i.options, o = this._animationOptions("open"), s = r.children(k), u = e(document);
                if (!i.trigger(M)) {
                    if (i._closing && r.kendoStop(!0, !0), i._closing = !1, i.toFront(), a.autoFocus && i.element.focus(), a.visible = !0, a.modal) {
                        if (n = !!i._modals().length, t = i._overlay(n), t.kendoStop(!0, !0), o.duration && l.effects.Fade && !n) {
                            var c = l.fx(t).fadeIn();
                            c.duration(o.duration || 0), c.endValue(.5), c.play()
                        } else t.css("opacity", .5);
                        t.show()
                    }
                    r.is(E) || (s.css(j, O), r.show().kendoStop().kendoAnimate({
                        effects: o.effects,
                        duration: o.duration,
                        complete: f(this._activate, this)
                    }))
                }
                return a.isMaximized && (i._documentScrollTop = u.scrollTop(), i._documentScrollLeft = u.scrollLeft(), e("html, body").css(j, O)), i
            },
            _activate: function () {
                var e = this.options.scrollable !== !1;
                this.options.autoFocus && this.element.focus(), this.element.css(j, e ? "" : "hidden"), l.resize(this.element.children()), this.trigger(H)
            },
            _removeOverlay: function (n) {
                var i = this._modals(), r = this.options, a = r.modal && !i.length, o = r.modal ? this._overlay(!0) : e(t), s = this._animationOptions("close");
                if (a)if (!n && s.duration && l.effects.Fade) {
                    var u = l.fx(o).fadeOut();
                    u.duration(s.duration || 0), u.startValue(.5), u.play()
                } else this._overlay(!1).remove(); else i.length && this._object(i.last())._overlay(!0)
            },
            _close: function (t) {
                var n = this, i = n.wrapper, r = n.options, a = this._animationOptions("open"), o = this._animationOptions("close"), s = e(document);
                if (i.is(E) && !n.trigger(P, {userTriggered: !t})) {
                    if (n._closing)return;
                    n._closing = !0, r.visible = !1, e(w).each(function (t, n) {
                        var r = e(n).children(k);
                        n != i && r.find("> ." + T).length > 0 && r.children(C).remove()
                    }), this._removeOverlay(),
                        i.kendoStop().kendoAnimate({
                            effects: o.effects || a.effects,
                            reverse: o.reverse === !0,
                            duration: o.duration,
                            complete: f(this._deactivate, this)
                        })
                }
                n.options.isMaximized && (e("html, body").css(j, ""), n._documentScrollTop && n._documentScrollTop > 0 && s.scrollTop(n._documentScrollTop), n._documentScrollLeft && n._documentScrollLeft > 0 && s.scrollLeft(n._documentScrollLeft))
            },
            _deactivate: function () {
                var e = this;
                if (e.wrapper.hide().css("opacity", ""), e.trigger(z), e.options.modal) {
                    var t = e._object(e._modals().last());
                    t && t.toFront()
                }
            },
            close: function () {
                return this._close(!0), this
            },
            _actionable: function (t) {
                return e(t).is(Q + "," + Q + " .k-icon,:input,a")
            },
            _shouldFocus: function (t) {
                var n = p(), i = this.element;
                return this.options.autoFocus && !e(n).is(i) && !this._actionable(t) && (!i.find(n).length || !i.find(t).length)
            },
            toFront: function (t) {
                var n = this, i = n.wrapper, r = i[0], a = +i.css(G), o = a, l = t && t.target || null;
                if (e(w).each(function (t, n) {
                        var i = e(n), o = i.css(G), l = i.children(k);
                        isNaN(o) || (a = Math.max(+o, a)), n != r && l.find("> ." + T).length > 0 && l.append(s.overlay)
                    }), (!i[0].style.zIndex || o < a) && i.css(G, a + 2), n.element.find("> .k-overlay").remove(), n._shouldFocus(l)) {
                    n.element.focus();
                    var u = e(window).scrollTop(), c = parseInt(i.position().top, 10);
                    c > 0 && c < u && (u > 0 ? e(window).scrollTop(c) : i.css("top", u))
                }
                return i = null, n
            },
            toggleMaximization: function () {
                return this._closing ? this : this[this.options.isMaximized ? "restore" : "maximize"]()
            },
            restore: function () {
                var t = this, n = t.options, i = n.minHeight, r = t.restoreOptions, a = e(document);
                return n.isMaximized || n.isMinimized ? (i && i != 1 / 0 && t.wrapper.css("min-height", i), t.wrapper.css({
                    position: n.pinned ? "fixed" : "absolute",
                    left: r.left,
                    top: r.top,
                    width: r.width,
                    height: r.height
                }).removeClass(F).find(".k-window-content,.k-resize-handle").show().end().find(".k-window-titlebar .k-i-restore").parent().remove().end().end().find(Y).parent().show().end().end().find(J).parent().show(), t.options.width = r.width, t.options.height = r.height, e("html, body").css(j, ""), this._documentScrollTop && this._documentScrollTop > 0 && a.scrollTop(this._documentScrollTop), this._documentScrollLeft && this._documentScrollLeft > 0 && a.scrollLeft(this._documentScrollLeft), n.isMaximized = n.isMinimized = !1, t.resize(), t) : t
            },
            _sizingAction: function (e, t) {
                var n = this, i = n.wrapper, r = i[0].style, a = n.options;
                return a.isMaximized || a.isMinimized ? n : (n.restoreOptions = {
                    width: r.width,
                    height: r.height
                }, i.children(x).hide().end().children(y).find(Y).parent().hide().eq(0).before(s.action({name: "Restore"})), t.call(n), n.wrapper.children(y).find(J).parent().toggle("maximize" !== e), n.trigger(e), n)
            },
            maximize: function () {
                return this._sizingAction("maximize", function () {
                    var t = this, n = t.wrapper, i = n.position(), r = e(document);
                    h(t.restoreOptions, {left: i.left, top: i.top}), n.css({
                        left: 0,
                        top: 0,
                        position: "fixed"
                    }).addClass(F), this._documentScrollTop = r.scrollTop(), this._documentScrollLeft = r.scrollLeft(), e("html, body").css(j, O), t.options.isMaximized = !0, t._onDocumentResize()
                }), this
            },
            minimize: function () {
                return this._sizingAction("minimize", function () {
                    var e = this;
                    e.wrapper.css({height: "", minHeight: ""}), e.element.hide(), e.options.isMinimized = !0
                }), this
            },
            pin: function (t) {
                var n = this, i = e(window), r = n.wrapper, a = parseInt(r.css("top"), 10), o = parseInt(r.css("left"), 10);
                (t || !n.options.pinned && !n.options.isMaximized) && (r.css({
                    position: "fixed",
                    top: a - i.scrollTop(),
                    left: o - i.scrollLeft()
                }), r.children(y).find($).addClass("k-i-unpin").removeClass("k-i-pin"), n.options.pinned = !0)
            },
            unpin: function () {
                var t = this, n = e(window), i = t.wrapper, r = parseInt(i.css("top"), 10), a = parseInt(i.css("left"), 10);
                t.options.pinned && !t.options.isMaximized && (i.css({
                    position: "",
                    top: r + n.scrollTop(),
                    left: a + n.scrollLeft()
                }), i.children(y).find(K).addClass("k-i-pin").removeClass("k-i-unpin"), t.options.pinned = !1)
            },
            _onDocumentResize: function () {
                var t, n, i = this, r = i.wrapper, a = e(window), o = l.support.zoomLevel();
                i.options.isMaximized && (t = a.width() / o, n = a.height() / o - parseInt(r.css("padding-top"), 10), r.css({
                    width: t,
                    height: n
                }), i.options.width = t, i.options.height = n, i.resize())
            },
            refresh: function (t) {
                var i, r, a, o = this, l = o.options, u = e(o.element);
                return d(t) || (t = {url: t}), t = h({}, l.content, t), r = n(l.iframe) ? l.iframe : t.iframe, a = t.url, a ? (n(r) || (r = !Z(a)), r ? (i = u.find("." + T)[0], i ? i.src = a || i.src : u.html(s.contentFrame(h({}, l, {content: t}))), u.find("." + T).unbind("load" + _).on("load" + _, f(this._triggerRefresh, this))) : o._ajaxRequest(t)) : (t.template && o.content(g(t.template)({})), o.trigger(V)), u.toggleClass("k-window-iframecontent", !!r), o
            },
            _triggerRefresh: function () {
                this.trigger(V)
            },
            _ajaxComplete: function () {
                clearTimeout(this._loadingIconTimeout), this.wrapper.find(X).removeClass(S)
            },
            _ajaxError: function (e, t) {
                this.trigger(q, {status: t, xhr: e})
            },
            _ajaxSuccess: function (e) {
                return function (t) {
                    var n = t;
                    e && (n = g(e)(t || {})), this.content(n, t), this.element.prop("scrollTop", 0), this.trigger(V)
                }
            },
            _showLoading: function () {
                this.wrapper.find(X).addClass(S)
            },
            _ajaxRequest: function (t) {
                this._loadingIconTimeout = setTimeout(f(this._showLoading, this), 100), e.ajax(h({
                    type: "GET",
                    dataType: "html",
                    cache: !1,
                    error: f(this._ajaxError, this),
                    complete: f(this._ajaxComplete, this),
                    success: f(this._ajaxSuccess(t.template), this)
                }, t))
            },
            _destroy: function () {
                this.resizing && this.resizing.destroy(), this.dragging && this.dragging.destroy(), this.wrapper.off(_).children(k).off(_).end().find(".k-resize-handle,.k-window-titlebar").off(_), e(window).off("resize" + _ + this._marker), clearTimeout(this._loadingIconTimeout), u.fn.destroy.call(this), this.unbind(t), l.destroy(this.wrapper), this._removeOverlay(!0)
            },
            destroy: function () {
                this._destroy(), this.wrapper.empty().remove(), this.wrapper = this.appendTo = this.element = e()
            },
            _createWindow: function () {
                var t, n, i = this.element, r = this.options, a = l.support.isRtl(i);
                r.scrollable === !1 && i.css("overflow", "hidden"), n = e(s.wrapper(r)), t = i.find("iframe:not(.k-content)").map(function () {
                    var e = this.getAttribute("src");
                    return this.src = "", e
                }), n.toggleClass("k-rtl", a).appendTo(this.appendTo).append(i).find("iframe:not(.k-content)").each(function (e) {
                    this.src = t[e]
                }), n.find(".k-window-title").css(a ? "left" : "right", n.find(".k-window-actions").outerWidth() + 10), i.css("visibility", "").show(), i.find("[data-role=editor]").each(function () {
                    var t = e(this).data("kendoEditor");
                    t && t.refresh()
                }), n = i = null
            }
        });
        s = {
            wrapper: g("<div class='k-widget k-window' />"),
            action: g("<a role='button' href='\\#' class='k-window-action k-link' aria-label='#= name #'><span class='k-icon k-i-#= name.toLowerCase() #'></span></a>"),
            titlebar: g("<div class='k-window-titlebar k-header'>&nbsp;<span class='k-window-title'>#= title #</span><div class='k-window-actions' /></div>"),
            overlay: "<div class='k-overlay' />",
            contentFrame: g("<iframe frameborder='0' title='#= title #' class='" + T + "' src='#= content.url #'>This page requires frames in order to show content</iframe>"),
            resizeHandle: g("<div class='k-resize-handle k-resize-#= data #'></div>")
        }, a.prototype = {
            addOverlay: function () {
                this.owner.wrapper.append(s.overlay)
            }, removeOverlay: function () {
                this.owner.wrapper.find(C).remove()
            }, dragstart: function (t) {
                var n = this, i = n.owner, r = i.wrapper;
                n.elementPadding = parseInt(r.css("padding-top"), 10), n.initialPosition = l.getOffset(r, "position"), n.resizeDirection = t.currentTarget.prop("className").replace("k-resize-handle k-resize-", ""), n.initialSize = {
                    width: r.width(),
                    height: r.height()
                }, n.containerOffset = l.getOffset(i.appendTo, "position"), r.children(x).not(t.currentTarget).hide(), e(v).css(A, t.currentTarget.css(A))
            }, drag: function (e) {
                var t, n, r, a, o = this, s = o.owner, l = s.wrapper, u = s.options, c = o.resizeDirection, d = o.containerOffset, p = o.initialPosition, f = o.initialSize, h = Math.max(e.x.location, 0), m = Math.max(e.y.location, 0);
                c.indexOf("e") >= 0 ? (t = h - p.left - d.left, l.width(i(t, u.minWidth, u.maxWidth))) : c.indexOf("w") >= 0 && (a = p.left + f.width + d.left, t = i(a - h, u.minWidth, u.maxWidth), l.css({
                    left: a - t - d.left,
                    width: t
                })), c.indexOf("s") >= 0 ? (n = m - p.top - o.elementPadding - d.top, l.height(i(n, u.minHeight, u.maxHeight))) : c.indexOf("n") >= 0 && (r = p.top + f.height + d.top, n = i(r - m, u.minHeight, u.maxHeight), l.css({
                    top: r - n - d.top,
                    height: n
                })), t && (s.options.width = t + "px"), n && (s.options.height = n + "px"), s.resize()
            }, dragend: function (t) {
                var n = this, i = n.owner, r = i.wrapper;
                return r.children(x).not(t.currentTarget).show(), e(v).css(A, ""), i.touchScroller && i.touchScroller.reset(), 27 == t.keyCode && r.css(n.initialPosition).css(n.initialSize), i.trigger(N), !1
            }, destroy: function () {
                this._draggable && this._draggable.destroy(), this._draggable = this.owner = null
            }
        }, o.prototype = {
            dragstart: function (t) {
                var n = this.owner, i = n.element, r = i.find(".k-window-actions"), a = l.getOffset(n.appendTo);
                n.trigger(W), n.initialWindowPosition = l.getOffset(n.wrapper, "position"), n.initialPointerPosition = {
                    left: t.x.client,
                    top: t.y.client
                }, n.startPosition = {
                    left: t.x.client - n.initialWindowPosition.left,
                    top: t.y.client - n.initialWindowPosition.top
                }, r.length > 0 ? n.minLeftPosition = r.outerWidth() + parseInt(r.css("right"), 10) - i.outerWidth() : n.minLeftPosition = 20 - i.outerWidth(), n.minLeftPosition -= a.left, n.minTopPosition = -a.top, n.wrapper.append(s.overlay).children(x).hide(), e(v).css(A, t.currentTarget.css(A))
            }, drag: function (t) {
                var n = this.owner, i = n.options.position;
                i.top = Math.max(t.y.client - n.startPosition.top, n.minTopPosition), i.left = Math.max(t.x.client - n.startPosition.left, n.minLeftPosition), l.support.transforms ? e(n.wrapper).css("transform", "translate(" + (t.x.client - n.initialPointerPosition.left) + "px, " + (t.y.client - n.initialPointerPosition.top) + "px)") : e(n.wrapper).css(i)
            }, _finishDrag: function () {
                var t = this.owner;
                t.wrapper.children(x).toggle(!t.options.isMinimized).end().find(C).remove(), e(v).css(A, "")
            }, dragcancel: function (e) {
                this._finishDrag(), e.currentTarget.closest(w).css(this.owner.initialWindowPosition)
            }, dragend: function () {
                return e(this.owner.wrapper).css(this.owner.options.position).css("transform", ""), this._finishDrag(), this.owner.trigger(U), !1
            }, destroy: function () {
                this._draggable && this._draggable.destroy(), this._draggable = this.owner = null
            }
        }, l.ui.plugin(ee)
    }(window.kendo.jQuery), window.kendo
}, "function" == typeof define && define.amd ? define : function (e, t, n) {
    (n || t)()
});