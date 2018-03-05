/*!
 FullCalendar Scheduler v1.5.1
 Docs & License: https://fullcalendar.io/scheduler/
 (c) 2017 Adam Shaw
 */
!function (e) {
    "function" == typeof define && define.amd ? define(["jquery", "moment", "fullcalendar"], e) : "object" == typeof exports ? module.exports = e(require("jquery"), require("moment"), require("fullcalendar")) : e(jQuery, moment)
}(function (e, t) {
    var r, s, o, n, i, l, u, h, c, a, p, d, f, g, y, v, R, w, m, S, b, C, E, H, T, _, I, D, x, G, B, F, W, M, L, z, k, O, P, q, A, N, U, V, j, Y, Q, X, $, K, J, Z, ee, te, re, se, oe, ne, ie, le, ue, he, ce, ae, pe, de, fe, ge, ye, ve, Re, we, me, Se, be, Ce, Ee, He, Te, _e, Ie, De, xe, Ge, Be, Fe, We, Me, Le, ze, ke, Oe, Pe, qe, Ae, Ne, Ue, Ve, je, Ye = function (e, t) {
        function r() {
            this.constructor = e
        }

        for (var s in t)Qe.call(t, s) && (e[s] = t[s]);
        return r.prototype = t.prototype, e.prototype = new r, e.__super__ = t.prototype, e
    }, Qe = {}.hasOwnProperty, Xe = [].indexOf || function (e) {
            for (var t = 0, r = this.length; t < r; t++)if (t in this && this[t] === e)return t;
            return -1
        }, $e = [].slice;
    return d = e.fullCalendar, d.schedulerVersion = "1.5.1", 8 !== d.internalApiVersion ? void d.warn("v" + d.schedulerVersion + " of FullCalendar Scheduler is incompatible with v" + d.version + " of the core.\nPlease see http://fullcalendar.io/support/ for more information.") : (s = d.Calendar, n = d.Class, K = d.View, f = d.Grid, be = d.intersectRanges, ue = d.debounce, He = d.isInt, we = d.getScrollbarWidths, h = d.DragListener, Se = d.htmlEscape, re = d.computeIntervalUnit, Pe = d.proxy, ee = d.capitaliseFirstLetter, Z = d.applyAll, c = d.EmitterMixin, v = d.ListenerMixin, pe = d.durationHasTime, ae = d.divideRangeByDuration, ce = d.divideDurationByDuration, Ie = d.multiplyDuration, ke = d.parseFieldSpecs, te = d.compareByFieldSpecs, de = d.flexibleCompare, Ce = d.intersectRects, l = d.CoordCache, fe = d.getContentRect, ge = d.getOuterRect, ie = d.createObject, C = d.Promise, V = d.TaskQueue, ye = function (e) {
        return e.find("> td").filter(function (e, t) {
            return t.rowSpan <= 1
        })
    }, a = function (t) {
        function r() {
            r.__super__.constructor.apply(this, arguments), this.requestMovingEnd = ue(this.reportMovingEnd, 500)
        }

        var s, o;
        return Ye(r, t), r.mixin(c), r.mixin(v), r.prototype.canvas = null, r.prototype.isScrolling = !1, r.prototype.isTouching = !1, r.prototype.isMoving = !1, r.prototype.isTouchScrollEnabled = !0, r.prototype.preventTouchScrollHandler = null, r.prototype.render = function () {
            return r.__super__.render.apply(this, arguments), this.canvas && (this.canvas.render(), this.canvas.el.appendTo(this.scrollEl)), this.bindHandlers()
        }, r.prototype.destroy = function () {
            return r.__super__.destroy.apply(this, arguments), this.unbindHandlers()
        }, r.prototype.disableTouchScroll = function () {
            return this.isTouchScrollEnabled = !1, this.bindPreventTouchScroll()
        }, r.prototype.enableTouchScroll = function () {
            if (this.isTouchScrollEnabled = !0, !this.isTouching)return this.unbindPreventTouchScroll()
        }, r.prototype.bindPreventTouchScroll = function () {
            if (!this.preventTouchScrollHandler)return this.scrollEl.on("touchmove", this.preventTouchScrollHandler = d.preventDefault)
        }, r.prototype.unbindPreventTouchScroll = function () {
            if (this.preventTouchScrollHandler)return this.scrollEl.off("touchmove", this.preventTouchScrollHandler), this.preventTouchScrollHandler = null
        }, r.prototype.bindHandlers = function () {
            return this.listenTo(this.scrollEl, {
                scroll: this.reportScroll,
                touchstart: this.reportTouchStart,
                touchend: this.reportTouchEnd
            })
        }, r.prototype.unbindHandlers = function () {
            return this.stopListeningTo(this.scrollEl)
        }, r.prototype.reportScroll = function () {
            return this.isScrolling || this.reportScrollStart(), this.trigger("scroll"), this.isMoving = !0, this.requestMovingEnd()
        }, r.prototype.reportScrollStart = function () {
            if (!this.isScrolling)return this.isScrolling = !0, this.trigger("scrollStart", this.isTouching)
        }, r.prototype.requestMovingEnd = null, r.prototype.reportMovingEnd = function () {
            if (this.isMoving = !1, !this.isTouching)return this.reportScrollEnd()
        }, r.prototype.reportScrollEnd = function () {
            if (this.isScrolling)return this.trigger("scrollEnd"), this.isScrolling = !1
        }, r.prototype.reportTouchStart = function () {
            return this.isTouching = !0
        }, r.prototype.reportTouchEnd = function () {
            if (this.isTouching && (this.isTouching = !1, this.isTouchScrollEnabled && this.unbindPreventTouchScroll(), !this.isMoving))return this.reportScrollEnd()
        }, r.prototype.getScrollLeft = function () {
            var e, t, r;
            if (e = this.scrollEl.css("direction"), t = this.scrollEl[0], r = t.scrollLeft, "rtl" === e)switch (o) {
                case"positive":
                    r = r + t.clientWidth - t.scrollWidth;
                    break;
                case"reverse":
                    r = -r
            }
            return r
        }, r.prototype.setScrollLeft = function (e) {
            var t, r;
            if (t = this.scrollEl.css("direction"), r = this.scrollEl[0], "rtl" === t)switch (o) {
                case"positive":
                    e = e - r.clientWidth + r.scrollWidth;
                    break;
                case"reverse":
                    e = -e
            }
            return r.scrollLeft = e
        }, r.prototype.getScrollFromLeft = function () {
            var e, t, r;
            if (e = this.scrollEl.css("direction"), t = this.scrollEl[0], r = t.scrollLeft, "rtl" === e)switch (o) {
                case"negative":
                    r = r - t.clientWidth + t.scrollWidth;
                    break;
                case"reverse":
                    r = -r - t.clientWidth + t.scrollWidth
            }
            return r
        }, r.prototype.getNativeScrollLeft = function () {
            return this.scrollEl[0].scrollLeft
        }, r.prototype.setNativeScrollLeft = function (e) {
            return this.scrollEl[0].scrollLeft = e
        }, o = null, s = function () {
            var t, r, s;
            return t = e('<div style=" position: absolute top: -1000px; width: 1px; height: 1px; overflow: scroll; direction: rtl; font-size: 14px; ">A</div>').appendTo("body"), r = t[0], s = r.scrollLeft > 0 ? "positive" : (r.scrollLeft = 1, t.scrollLeft > 0 ? "reverse" : "negative"), t.remove(), s
        }, e(function () {
            return o = s()
        }), r
    }(d.Scroller), i = function (t) {
        function r() {
            r.__super__.constructor.apply(this, arguments), "clipped-scroll" === this.overflowX && (this.overflowX = "scroll", this.isHScrollbarsClipped = !0), "clipped-scroll" === this.overflowY && (this.overflowY = "scroll", this.isVScrollbarsClipped = !0)
        }

        return Ye(r, t), r.prototype.isHScrollbarsClipped = !1, r.prototype.isVScrollbarsClipped = !1, r.prototype.renderEl = function () {
            var t;
            return t = r.__super__.renderEl.apply(this, arguments), e('<div class="fc-scroller-clip" />').append(t)
        }, r.prototype.updateSize = function () {
            var e, t, r;
            return t = this.scrollEl, r = we(t), e = {
                marginLeft: 0,
                marginRight: 0,
                marginTop: 0,
                marginBottom: 0
            }, this.isHScrollbarsClipped && (e.marginTop = -r.top, e.marginBottom = -r.bottom), this.isVScrollbarsClipped && (e.marginLeft = -r.left, e.marginRight = -r.right), t.css(e), t.toggleClass("fc-no-scrollbars", (this.isHScrollbarsClipped || "hidden" === this.overflowX) && (this.isVScrollbarsClipped || "hidden" === this.overflowY) && !(r.top || r.bottom || r.left || r.right))
        }, r.prototype.getScrollbarWidths = function () {
            var e;
            return e = we(this.scrollEl), this.isHScrollbarsClipped && (e.top = 0, e.bottom = 0), this.isVScrollbarsClipped && (e.left = 0, e.right = 0), e
        }, r
    }(a), N = function () {
        function t() {
            this.gutters = {}
        }

        return t.prototype.el = null, t.prototype.contentEl = null, t.prototype.bgEl = null, t.prototype.gutters = null, t.prototype.width = null, t.prototype.minWidth = null, t.prototype.render = function () {
            return this.el = e('<div class="fc-scroller-canvas"> <div class="fc-content"></div> <div class="fc-bg"></div> </div>'), this.contentEl = this.el.find(".fc-content"), this.bgEl = this.el.find(".fc-bg")
        }, t.prototype.setGutters = function (t) {
            return t ? e.extend(this.gutters, t) : this.gutters = {}, this.updateSize()
        }, t.prototype.setWidth = function (e) {
            return this.width = e, this.updateSize()
        }, t.prototype.setMinWidth = function (e) {
            return this.minWidth = e, this.updateSize()
        }, t.prototype.clearWidth = function () {
            return this.width = null, this.minWidth = null, this.updateSize()
        }, t.prototype.updateSize = function () {
            var e;
            return e = this.gutters, this.el.toggleClass("fc-gutter-left", Boolean(e.left)).toggleClass("fc-gutter-right", Boolean(e.right)).toggleClass("fc-gutter-top", Boolean(e.top)).toggleClass("fc-gutter-bottom", Boolean(e.bottom)).css({
                paddingLeft: e.left || "",
                paddingRight: e.right || "",
                paddingTop: e.top || "",
                paddingBottom: e.bottom || "",
                width: null != this.width ? this.width + (e.left || 0) + (e.right || 0) : "",
                minWidth: null != this.minWidth ? this.minWidth + (e.left || 0) + (e.right || 0) : ""
            }), this.bgEl.css({left: e.left || "", right: e.right || "", top: e.top || "", bottom: e.bottom || ""})
        }, t
    }(), A = function () {
        function e(e, t) {
            var r, s, o, n;
            for (this.axis = e, this.scrollers = t, o = this.scrollers, r = 0, s = o.length; r < s; r++)n = o[r], this.initScroller(n)
        }

        return e.prototype.axis = null, e.prototype.scrollers = null, e.prototype.masterScroller = null, e.prototype.initScroller = function (e) {
            return e.scrollEl.on("wheel mousewheel DomMouseScroll MozMousePixelScroll", function (t) {
                return function () {
                    t.assignMasterScroller(e)
                }
            }(this)), e.on("scrollStart", function (t) {
                return function () {
                    if (!t.masterScroller)return t.assignMasterScroller(e)
                }
            }(this)).on("scroll", function (t) {
                return function () {
                    var r, s, o, n, i;
                    if (e === t.masterScroller) {
                        for (n = t.scrollers, i = [], r = 0, s = n.length; r < s; r++)if (o = n[r], o !== e)switch (t.axis) {
                            case"horizontal":
                                i.push(o.setNativeScrollLeft(e.getNativeScrollLeft()));
                                break;
                            case"vertical":
                                i.push(o.setScrollTop(e.getScrollTop()));
                                break;
                            default:
                                i.push(void 0)
                        } else i.push(void 0);
                        return i
                    }
                }
            }(this)).on("scrollEnd", function (t) {
                return function () {
                    if (e === t.masterScroller)return t.unassignMasterScroller()
                }
            }(this))
        }, e.prototype.assignMasterScroller = function (e) {
            var t, r, s, o;
            for (this.unassignMasterScroller(), this.masterScroller = e, o = this.scrollers, t = 0, r = o.length; t < r; t++)s = o[t], s !== e && s.disableTouchScroll()
        }, e.prototype.unassignMasterScroller = function () {
            var e, t, r, s;
            if (this.masterScroller) {
                for (s = this.scrollers, e = 0, t = s.length; e < t; e++)r = s[e], r.enableTouchScroll();
                this.masterScroller = null
            }
        }, e.prototype.update = function () {
            var e, t, r, s, o, n, i, l, u, h, c, a, p;
            for (e = function () {
                var e, t, r, s;
                for (r = this.scrollers, s = [], e = 0, t = r.length; e < t; e++)a = r[e], s.push(a.getScrollbarWidths());
                return s
            }.call(this), l = u = h = i = 0, r = 0, o = e.length; r < o; r++)p = e[r], l = Math.max(l, p.left), u = Math.max(u, p.right), h = Math.max(h, p.top), i = Math.max(i, p.bottom);
            for (c = this.scrollers, t = s = 0, n = c.length; s < n; t = ++s)a = c[t], p = e[t], a.canvas.setGutters("horizontal" === this.axis ? {
                left: l - p.left,
                right: u - p.right
            } : {top: h - p.top, bottom: i - p.bottom})
        }, e
    }(), P = function () {
        function t(e, t) {
            this.allowPointerEvents = null != t && t, this.scroller = e, this.sprites = [], e.on("scroll", function (t) {
                return function () {
                    return e.isTouching ? (t.isTouch = !0, t.isForcedRelative = !0) : (t.isTouch = !1, t.isForcedRelative = !1, t.handleScroll())
                }
            }(this)), e.on("scrollEnd", function (e) {
                return function () {
                    return e.handleScroll()
                }
            }(this))
        }

        return t.prototype.scroller = null, t.prototype.scrollbarWidths = null, t.prototype.sprites = null, t.prototype.viewportRect = null, t.prototype.contentOffset = null, t.prototype.isHFollowing = !0, t.prototype.isVFollowing = !1, t.prototype.allowPointerEvents = !1, t.prototype.containOnNaturalLeft = !1, t.prototype.containOnNaturalRight = !1, t.prototype.minTravel = 0, t.prototype.isTouch = !1, t.prototype.isForcedRelative = !1, t.prototype.setSprites = function (t) {
            var r, s, o;
            if (this.clearSprites(), t instanceof e)return this.sprites = function () {
                var r, s, n;
                for (n = [], r = 0, s = t.length; r < s; r++)o = t[r], n.push(new q(e(o), this));
                return n
            }.call(this);
            for (r = 0, s = t.length; r < s; r++)o = t[r], o.follower = this;
            return this.sprites = t
        }, t.prototype.clearSprites = function () {
            var e, t, r, s;
            for (r = this.sprites, e = 0, t = r.length; e < t; e++)s = r[e], s.clear();
            return this.sprites = []
        }, t.prototype.handleScroll = function () {
            return this.updateViewport(), this.updatePositions()
        }, t.prototype.cacheDimensions = function () {
            var e, t, r, s;
            for (this.updateViewport(), this.scrollbarWidths = this.scroller.getScrollbarWidths(), this.contentOffset = this.scroller.canvas.el.offset(), r = this.sprites, e = 0, t = r.length; e < t; e++)s = r[e], s.cacheDimensions()
        }, t.prototype.updateViewport = function () {
            var e, t, r;
            return t = this.scroller, e = t.getScrollFromLeft(), r = t.getScrollTop(), this.viewportRect = {
                left: e,
                right: e + t.getClientWidth(),
                top: r,
                bottom: r + t.getClientHeight()
            }
        }, t.prototype.forceRelative = function () {
            var e, t, r, s, o;
            if (!this.isForcedRelative) {
                for (this.isForcedRelative = !0, r = this.sprites, s = [], e = 0, t = r.length; e < t; e++)o = r[e], o.doAbsolute ? s.push(o.assignPosition()) : s.push(void 0);
                return s
            }
        }, t.prototype.clearForce = function () {
            var e, t, r, s, o;
            if (this.isForcedRelative && !this.isTouch) {
                for (this.isForcedRelative = !1, r = this.sprites, s = [], e = 0, t = r.length; e < t; e++)o = r[e], s.push(o.assignPosition());
                return s
            }
        }, t.prototype.update = function () {
            return this.cacheDimensions(), this.updatePositions()
        }, t.prototype.updatePositions = function () {
            var e, t, r, s;
            for (r = this.sprites, e = 0, t = r.length; e < t; e++)s = r[e], s.updatePosition()
        }, t.prototype.getContentRect = function (e) {
            return fe(e, this.contentOffset)
        }, t.prototype.getBoundingRect = function (e) {
            return ge(e, this.contentOffset)
        }, t
    }(), q = function () {
        function e(e, t) {
            this.el = e, this.follower = null != t ? t : null, this.isBlock = "block" === this.el.css("display"), this.el.css("position", "relative")
        }

        return e.prototype.follower = null, e.prototype.el = null, e.prototype.absoluteEl = null, e.prototype.naturalRect = null, e.prototype.parentRect = null, e.prototype.containerRect = null, e.prototype.isEnabled = !0, e.prototype.isHFollowing = !1, e.prototype.isVFollowing = !1, e.prototype.doAbsolute = !1, e.prototype.isAbsolute = !1, e.prototype.isCentered = !1, e.prototype.rect = null, e.prototype.isBlock = !1, e.prototype.naturalWidth = null, e.prototype.disable = function () {
            if (this.isEnabled)return this.isEnabled = !1, this.resetPosition(), this.unabsolutize()
        }, e.prototype.enable = function () {
            if (!this.isEnabled)return this.isEnabled = !0, this.assignPosition()
        }, e.prototype.clear = function () {
            return this.disable(), this.follower = null, this.absoluteEl = null
        }, e.prototype.cacheDimensions = function () {
            var e, t, r, s, o, n, i, l;
            return s = !1, o = !1, r = !1, this.naturalWidth = this.el.width(), this.resetPosition(), t = this.follower, i = this.naturalRect = t.getBoundingRect(this.el), l = this.el.parent(), this.parentRect = t.getBoundingRect(l), e = this.containerRect = _e(t.getContentRect(l), i), n = t.minTravel, t.containOnNaturalLeft && (e.left = i.left), t.containOnNaturalRight && (e.right = i.right), t.isHFollowing && Re(e) - Re(i) >= n && (r = "center" === this.el.css("text-align"), s = !0), t.isVFollowing && ve(e) - ve(i) >= n && (o = !0), this.isHFollowing = s, this.isVFollowing = o, this.isCentered = r
        }, e.prototype.updatePosition = function () {
            return this.computePosition(), this.assignPosition()
        }, e.prototype.resetPosition = function () {
            return this.el.css({top: "", left: ""})
        }, e.prototype.computePosition = function () {
            var e, t, r, s, o, n, i, l;
            return i = this.follower.viewportRect, r = this.parentRect, e = this.containerRect, l = Ce(i, r), s = null, t = !1, l && (s = ne(this.naturalRect), n = Ce(s, r), (this.isCentered && !Ae(i, r) || n && !Ae(i, n)) && (t = !0, this.isHFollowing && (this.isCentered ? (o = Re(s), s.left = (l.left + l.right) / 2 - o / 2, s.right = s.left + o) : me(s, i) || (t = !1), me(s, e) && (t = !1)), this.isVFollowing && (je(s, i) || (t = !1), je(s, e) && (t = !1)), Ae(i, s) || (t = !1))), this.rect = s, this.doAbsolute = t
        }, e.prototype.assignPosition = function () {
            var e, t;
            if (this.isEnabled)return this.rect ? this.doAbsolute && !this.follower.isForcedRelative ? (this.absolutize(), this.absoluteEl.css({
                top: this.rect.top - this.follower.viewportRect.top + this.follower.scrollbarWidths.top,
                left: this.rect.left - this.follower.viewportRect.left + this.follower.scrollbarWidths.left,
                width: this.isBlock ? this.naturalWidth : ""
            })) : (t = this.rect.top - this.naturalRect.top, e = this.rect.left - this.naturalRect.left, this.unabsolutize(), this.el.toggleClass("fc-following", Boolean(t || e)).css({
                top: t,
                left: e
            })) : this.unabsolutize()
        }, e.prototype.absolutize = function () {
            if (!this.isAbsolute)return this.absoluteEl || (this.absoluteEl = this.buildAbsoluteEl()), this.absoluteEl.appendTo(this.follower.scroller.el), this.el.css("visibility", "hidden"), this.isAbsolute = !0
        }, e.prototype.unabsolutize = function () {
            if (this.isAbsolute)return this.absoluteEl.detach(), this.el.css("visibility", ""), this.isAbsolute = !1
        }, e.prototype.buildAbsoluteEl = function () {
            var e;
            return e = this.el.clone().addClass("fc-following"), e.css({
                position: "absolute",
                "z-index": 1e3,
                "font-weight": this.el.css("font-weight"),
                "font-size": this.el.css("font-size"),
                "font-family": this.el.css("font-family"),
                "text-decoration": this.el.css("text-decoration"),
                color: this.el.css("color"),
                "padding-top": this.el.css("padding-top"),
                "padding-bottom": this.el.css("padding-bottom"),
                "padding-left": this.el.css("padding-left"),
                "padding-right": this.el.css("padding-right")
            }), this.follower.allowPointerEvents || e.css("pointer-events", "none"), e
        }, e
    }(), ne = function (e) {
        return {left: e.left, right: e.right, top: e.top, bottom: e.bottom}
    }, Re = function (e) {
        return e.right - e.left
    }, ve = function (e) {
        return e.bottom - e.top
    }, Ae = function (e, t) {
        return Ne(e, t) && Ue(e, t)
    }, Ne = function (e, t) {
        return t.left >= e.left && t.right <= e.right
    }, Ue = function (e, t) {
        return t.top >= e.top && t.bottom <= e.bottom
    }, me = function (e, t) {
        return e.left < t.left ? (e.right = t.left + Re(e), e.left = t.left, !0) : e.right > t.right && (e.left = t.right - Re(e), e.right = t.right, !0)
    }, je = function (e, t) {
        return e.top < t.top ? (e.bottom = t.top + ve(e), e.top = t.top, !0) : e.bottom > t.bottom && (e.top = t.bottom - ve(e), e.bottom = t.bottom, !0)
    }, _e = function (e, t) {
        return {
            left: Math.min(e.left, t.left),
            right: Math.max(e.right, t.right),
            top: Math.min(e.top, t.top),
            bottom: Math.max(e.bottom, t.bottom)
        }
    }, o = function (t) {
        function r() {
            return r.__super__.constructor.apply(this, arguments)
        }

        return Ye(r, t), r.prototype.resourceManager = null, r.prototype.initialize = function () {
            return this.resourceManager = new x(this)
        }, r.prototype.instantiateView = function (e) {
            var t, r;
            return t = this.getViewSpec(e), r = t["class"], this.options.resources && t.options.resources !== !1 && (t.queryResourceClass ? r = t.queryResourceClass(t) || r : t.resourceClass && (r = t.resourceClass)), new r(this, e, t.options, t.duration)
        }, r.prototype.getResources = function () {
            return Array.prototype.slice.call(this.resourceManager.topLevelResources)
        }, r.prototype.addResource = function (e, t) {
            var r;
            null == t && (t = !1), r = this.resourceManager.addResource(e), t && this.view.scrollToResource && r.then(function (e) {
                return function (t) {
                    return e.view.scrollToResource(t)
                }
            }(this))
        }, r.prototype.removeResource = function (e) {
            return this.resourceManager.removeResource(e)
        }, r.prototype.refetchResources = function () {
            this.resourceManager.fetchResources()
        }, r.prototype.rerenderResources = function () {
            this.resourceManager.resetCurrentResources()
        }, r.prototype.isSpanAllowed = function (e, t) {
            var s, o;
            return !("object" == typeof t && (s = this.getEventResourceIds(t), s.length && !(e.resourceId && (o = e.resourceId, Xe.call(s, o) >= 0)))) && r.__super__.isSpanAllowed.apply(this, arguments)
        }, r.prototype.mutateSeg = function (t, r, s) {
            var o, n, i, l;
            return r.resourceId && (i = (null != (l = t.resource) ? l.id : void 0) || t.resourceId, n = r.resourceId, o = this.getEventResourceIds(t.event), i !== n && (o = o.filter(function (e) {
                return e !== i && e !== n
            }), o.push(n)), r = e.extend({}, r), this.setEventResourceIds(r, o)), this.mutateEvent(t.event, r, s)
        }, r.prototype.getPeerEvents = function (e, t) {
            var s, o, n, i, l, u, h, c, a, p, d, f, g, y;
            for (f = r.__super__.getPeerEvents.apply(this, arguments), p = e.resourceId ? [e.resourceId] : t ? this.getEventResourceIds(t) : [], s = [], n = 0, u = f.length; n < u; n++) {
                if (d = f[n], o = !1, y = this.getEventResourceIds(d), y.length && p.length) {
                    for (i = 0, h = y.length; i < h; i++)for (g = y[i], l = 0, c = p.length; l < c; l++)if (a = p[l], a === g) {
                        o = !0;
                        break
                    }
                } else o = !0;
                o && s.push(d)
            }
            return s
        }, r.prototype.spanContainsSpan = function (e, t) {
            return (!e.resourceId || e.resourceId === t.resourceId) && r.__super__.spanContainsSpan.apply(this, arguments)
        }, r.prototype.getCurrentBusinessHourEvents = function (e) {
            var t, s, o, n, i, l, u, h, c, a, p, d;
            for (i = this.resourceManager.getFlatResources(), s = !1, l = 0, c = i.length; l < c; l++)d = i[l], d.businessHours && (s = !0);
            if (s) {
                for (t = [], u = 0, a = i.length; u < a; u++)for (d = i[u], n = this.computeBusinessHourEvents(e, d.businessHours || this.options.businessHours), h = 0, p = n.length; h < p; h++)o = n[h], o.resourceId = d.id, t.push(o);
                return t
            }
            return r.__super__.getCurrentBusinessHourEvents.apply(this, arguments)
        }, r.prototype.buildSelectSpan = function (e, t, s) {
            var o;
            return o = r.__super__.buildSelectSpan.apply(this, arguments), s && (o.resourceId = s), o
        }, r.prototype.getResourceById = function (e) {
            return this.resourceManager.getResourceById(e)
        }, r.prototype.normalizeEvent = function (e) {
            return r.__super__.normalizeEvent.apply(this, arguments), null == e.resourceId && (e.resourceId = null), null != e.resourceIds ? e.resourceIds : e.resourceIds = null
        }, r.prototype.getEventResourceId = function (e) {
            return this.getEventResourceIds(e)[0]
        }, r.prototype.getEventResourceIds = function (e) {
            var t, r, s, o, n, i, l, u;
            if (u = String(null != (n = null != (i = e[this.getEventResourceField()]) ? i : e.resourceId) ? n : ""))return [u];
            if (e.resourceIds) {
                for (o = [], l = e.resourceIds, t = 0, r = l.length; t < r; t++)u = l[t], s = String(null != u ? u : ""), s && o.push(s);
                return o
            }
            return []
        }, r.prototype.setEventResourceId = function (e, t) {
            return this.setEventResourceIds(e, t ? [t] : [])
        }, r.prototype.setEventResourceIds = function (e, t) {
            return e[this.getEventResourceField()] = 1 === t.length ? t[0] : null, e.resourceIds = t.length > 1 ? t : null
        }, r.prototype.getEventResourceField = function () {
            return this.options.eventResourceField || "resourceId"
        }, r.prototype.getResourceEvents = function (t) {
            var r;
            return r = "object" == typeof t ? t : this.getResourceById(t), r ? this.clientEvents(function (t) {
                return function (s) {
                    return e.inArray(r.id, t.getEventResourceIds(s)) !== -1
                }
            }(this)) : []
        }, r.prototype.getEventResource = function (e) {
            return this.getEventResources(e)[0]
        }, r.prototype.getEventResources = function (e) {
            var t, r, s, o, n, i, l;
            if (t = "object" == typeof e ? e : this.clientEvents(e)[0], l = [], t)for (o = this.getEventResourceIds(t), r = 0, s = o.length; r < s; r++)i = o[r], n = this.getResourceById(i), n && l.push(n);
            return l
        }, r
    }(s), s.prototype = o.prototype, ze = K.prototype.setElement, Le = K.prototype.removeElement, We = K.prototype.handleDate, Me = K.prototype.onDateRender, De = K.prototype.executeEventsRender, K.prototype.isResourcesBound = !1, K.prototype.isResourcesSet = !1, s.defaults.refetchResourcesOnNavigate = !1, K.prototype.setElement = function () {
        var e;
        return e = ze.apply(this, arguments), this.opt("refetchResourcesOnNavigate") || this.bindResources(), e
    }, K.prototype.removeElement = function () {
        return this.unbindResources({skipRerender: !0}), Le.apply(this, arguments)
    }, K.prototype.handleDate = function (e, t) {
        var r;
        return r = this.opt("refetchResourcesOnNavigate"), this.unbindEvents(), r && this.unbindResources({skipUnrender: !0}), this.requestDateRender(e).then(function (e) {
            return function () {
                if (e.bindEvents(), r)return e.bindResources(!0)
            }
        }(this))
    }, K.prototype.onDateRender = function () {
        return Oe(this.calendar.options.schedulerLicenseKey, this.el), Me.apply(this, arguments)
    }, K.prototype.executeEventsRender = function (e) {
        return this.whenResourcesSet().then(function (t) {
            return function () {
                return De.call(t, e)
            }
        }(this))
    }, K.prototype.bindResources = function (e) {
        var t;
        if (!this.isResourcesBound)return this.isResourcesBound = !0, this.trigger("resourcesBind"), t = e ? this.fetchResources() : this.requestResources(), this.rejectOn("resourcesUnbind", t).then(function (e) {
            return function (t) {
                return e.listenTo(e.calendar.resourceManager, {
                    set: e.setResources,
                    reset: e.setResources,
                    unset: e.unsetResources,
                    add: e.addResource,
                    remove: e.removeResource
                }), e.setResources(t)
            }
        }(this))
    }, K.prototype.unbindResources = function (e) {
        if (this.isResourcesBound)return this.isResourcesBound = !1, this.stopListeningTo(this.calendar.resourceManager), this.unsetResources(e), this.trigger("resourcesUnbind")
    }, K.prototype.setResources = function (e) {
        var t;
        return t = this.isResourcesSet, this.isResourcesSet = !0, this.handleResources(e, t), this.trigger(t ? "resourcesReset" : "resourcesSet", e)
    }, K.prototype.unsetResources = function (e) {
        if (this.isResourcesSet)return this.isResourcesSet = !1, this.handleResourcesUnset(e), this.trigger("resourcesUnset")
    }, K.prototype.whenResourcesSet = function () {
        return this.isResourcesSet ? C.resolve() : new C(function (e) {
            return function (t) {
                return e.one("resourcesSet", t)
            }
        }(this))
    }, K.prototype.addResource = function (e) {
        if (this.isResourcesSet)return this.handleResourceAdd(e), this.trigger("resourceAdd", e)
    }, K.prototype.removeResource = function (e) {
        if (this.isResourcesSet)return this.handleResourceRemove(e), this.trigger("resourceRemove", e)
    }, K.prototype.handleResources = function (e) {
        if (this.isEventsRendered)return this.requestCurrentEventsRender()
    }, K.prototype.handleResourcesUnset = function (e) {
        return null == e && (e = {}), this.requestEventsUnrender()
    }, K.prototype.handleResourceAdd = function (e) {
        if (this.isEventsRendered)return this.requestCurrentEventsRender()
    }, K.prototype.handleResourceRemove = function (e) {
        if (this.isEventsRendered)return this.requestCurrentEventsRender()
    }, K.prototype.requestResources = function () {
        return this.opt("refetchResourcesOnNavigate") ? this.calendar.resourceManager.getResources(this.start, this.end) : this.calendar.resourceManager.getResources()
    }, K.prototype.fetchResources = function () {
        return this.opt("refetchResourcesOnNavigate") ? this.calendar.resourceManager.fetchResources(this.start, this.end) : this.calendar.resourceManager.fetchResources()
    }, K.prototype.getCurrentResources = function () {
        return this.calendar.resourceManager.topLevelResources
    }, xe = f.prototype.getSegCustomClasses, Ge = f.prototype.getSegDefaultBackgroundColor, Be = f.prototype.getSegDefaultBorderColor, Fe = f.prototype.getSegDefaultTextColor, f.prototype.getSegCustomClasses = function (e) {
        var t, r, s, o, n;
        for (t = xe.apply(this, arguments), o = this.getSegResources(e), r = 0, s = o.length; r < s; r++)n = o[r], t = t.concat(n.eventClassName || []);
        return t
    }, f.prototype.getSegDefaultBackgroundColor = function (e) {
        var t, r, s, o, n;
        for (o = this.getSegResources(e), r = 0, s = o.length; r < s; r++)for (t = o[r]; t;) {
            if (n = t.eventBackgroundColor || t.eventColor)return n;
            t = t._parent
        }
        return Ge.apply(this, arguments)
    }, f.prototype.getSegDefaultBorderColor = function (e) {
        var t, r, s, o, n;
        for (o = this.getSegResources(e), r = 0, s = o.length; r < s; r++)for (t = o[r]; t;) {
            if (n = t.eventBorderColor || t.eventColor)return n;
            t = t._parent
        }
        return Be.apply(this, arguments)
    }, f.prototype.getSegDefaultTextColor = function (e) {
        var t, r, s, o, n;
        for (o = this.getSegResources(e), r = 0, s = o.length; r < s; r++)for (t = o[r]; t;) {
            if (n = t.eventTextColor)return n;
            t = t._parent
        }
        return Fe.apply(this, arguments)
    }, f.prototype.getSegResources = function (e) {
        return e.resource ? [e.resource] : this.view.calendar.getEventResources(e.event)
    }, x = function (t) {
        function r(e) {
            this.calendar = e, this.initializeCache()
        }

        return Ye(r, t), r.mixin(c), r.resourceGuid = 1, r.ajaxDefaults = {
            dataType: "json",
            cache: !1
        }, r.prototype.calendar = null, r.prototype.fetchId = 0, r.prototype.topLevelResources = null, r.prototype.resourcesById = null, r.prototype.fetching = null, r.prototype.getResources = function (e, t) {
            return this.fetching || this.fetchResources(e, t)
        }, r.prototype.fetchResources = function (e, t) {
            var r;
            return r = this.fetchId += 1, this.fetching = new C(function (s) {
                return function (o, n) {
                    return s.fetchResourceInputs(function (e) {
                        return r === s.fetchId ? (s.setResources(e), o(s.topLevelResources)) : n()
                    }, e, t)
                }
            }(this))
        }, r.prototype.fetchResourceInputs = function (t, s, o) {
            var n, i, l, u;
            switch (n = this.calendar, i = n.options, u = i.resources, "string" === e.type(u) && (u = {url: u}), e.type(u)) {
                case"function":
                    return this.calendar.pushLoading(), u(function (e) {
                        return function (r) {
                            return e.calendar.popLoading(), t(r)
                        }
                    }(this), s, o, i.timezone);
                case"object":
                    return n.pushLoading(), l = {}, s && o && (l[i.startParam] = s.format(), l[i.endParam] = o.format(), i.timezone && "local" !== i.timezone && (l[i.timezoneParam] = i.timezone)), e.ajax(e.extend({data: l}, r.ajaxDefaults, u)).then(function (e) {
                        return function (e) {
                            return n.popLoading(), t(e)
                        }
                    }(this));
                case"array":
                    return t(u);
                default:
                    return t([])
            }
        }, r.prototype.getResourceById = function (e) {
            return this.resourcesById[e]
        }, r.prototype.getFlatResources = function () {
            var e, t;
            t = [];
            for (e in this.resourcesById)t.push(this.resourcesById[e]);
            return t
        }, r.prototype.initializeCache = function () {
            return this.topLevelResources = [], this.resourcesById = {}
        }, r.prototype.setResources = function (e) {
            var t, r, s, o, n, i, l;
            for (l = Boolean(this.topLevelResources), this.initializeCache(), n = function () {
                var t, r, s;
                for (s = [], t = 0, r = e.length; t < r; t++)o = e[t], s.push(this.buildResource(o));
                return s
            }.call(this), i = function () {
                var e, t, r;
                for (r = [], e = 0, t = n.length; e < t; e++)s = n[e], this.addResourceToIndex(s) && r.push(s);
                return r
            }.call(this), t = 0, r = i.length; t < r; t++)s = i[t], this.addResourceToTree(s);
            return l ? this.trigger("reset", this.topLevelResources) : this.trigger("set", this.topLevelResources), this.calendar.publiclyTrigger("resourcesSet", null, this.topLevelResources)
        }, r.prototype.resetCurrentResources = function () {
            if (this.topLevelResources)return this.trigger("reset", this.topLevelResources)
        }, r.prototype.addResource = function (e) {
            return this.getResources().then(function (t) {
                return function () {
                    var r;
                    return r = t.buildResource(e), !!t.addResourceToIndex(r) && (t.addResourceToTree(r), t.trigger("add", r), r)
                }
            }(this))
        }, r.prototype.addResourceToIndex = function (e) {
            var t, r, s, o;
            if (this.resourcesById[e.id])return !1;
            for (this.resourcesById[e.id] = e, o = e.children, r = 0, s = o.length; r < s; r++)t = o[r], this.addResourceToIndex(t);
            return !0
        }, r.prototype.addResourceToTree = function (e) {
            var t, r, s, o;
            if (!e.parent) {
                if (r = String(null != (s = e.parentId) ? s : "")) {
                    if (t = this.resourcesById[r], !t)return !1;
                    e.parent = t, o = t.children
                } else o = this.topLevelResources;
                o.push(e)
            }
            return !0
        }, r.prototype.removeResource = function (e) {
            var t;
            return t = "object" == typeof e ? e.id : e, this.getResources().then(function (e) {
                return function () {
                    var r;
                    return r = e.removeResourceFromIndex(t), r && (e.removeResourceFromTree(r), e.trigger("remove", r)), r
                }
            }(this))
        }, r.prototype.removeResourceFromIndex = function (e) {
            var t, r, s, o, n;
            if (n = this.resourcesById[e]) {
                for (delete this.resourcesById[e], o = n.children, r = 0, s = o.length; r < s; r++)t = o[r], this.removeResourceFromIndex(t.id);
                return n
            }
            return !1
        }, r.prototype.removeResourceFromTree = function (e, t) {
            var r, s, o, n;
            for (null == t && (t = this.topLevelResources), r = s = 0, o = t.length; s < o; r = ++s) {
                if (n = t[r], n === e)return e.parent = null, t.splice(r, 1), !0;
                if (this.removeResourceFromTree(e, n.children))return !0
            }
            return !1
        }, r.prototype.buildResource = function (t) {
            var s, o, n, i, l;
            return l = e.extend({}, t), l.id = String(null != (i = t.id) ? i : "_fc" + r.resourceGuid++), n = t.eventClassName, l.eventClassName = function () {
                switch (e.type(n)) {
                    case"string":
                        return n.split(/\s+/);
                    case"array":
                        return n;
                    default:
                        return []
                }
            }(), l.children = function () {
                var e, r, n, i, u;
                for (i = null != (n = t.children) ? n : [], u = [], e = 0, r = i.length; e < r; e++)o = i[e], s = this.buildResource(o), s.parent = l, u.push(s);
                return u
            }.call(this), l
        }, r
    }(n), s.defaults.filterResourcesWithEvents = !1, L = {
        isResourcesRendered: !1,
        isResourcesDirty: !1,
        resourceRenderQueue: null,
        resourceTextFunc: null,
        canRenderSpecificResources: !1,
        setElement: function () {
            return this.resourceRenderQueue = new V, K.prototype.setElement.apply(this, arguments)
        },
        onDateRender: function () {
            return this.rejectOn("dateUnrender", this.whenResourcesRendered()).then(function (e) {
                return function () {
                    return K.prototype.onDateRender.apply(e, arguments)
                }
            }(this))
        },
        handleEvents: function (e) {
            var t, r;
            if (this.opt("filterResourcesWithEvents")) {
                if (this.isResourcesSet)return r = this.getCurrentResources(), t = this.filterResourcesWithEvents(r, e), this.requestResourcesRender(t)
            } else if (this.isResourcesRendered && !this.isResourcesDirty)return this.requestEventsRender(e)
        },
        handleResources: function (e) {
            var t, r;
            return this.opt("filterResourcesWithEvents") ? this.isEventsSet ? (t = this.getCurrentEvents(), r = this.filterResourcesWithEvents(e, t), this.requestResourcesRender(r)) : void 0 : this.requestResourcesRender(e)
        },
        handleResourcesUnset: function (e) {
            return null == e && (e = {}), e.skipUnrender ? this.isResourcesDirty = this.isResourcesRendered : this.requestResourcesUnrender(e)
        },
        handleResourceAdd: function (e) {
            var t, r;
            return this.canRenderSpecificResources ? this.opt("filterResourcesWithEvents") ? this.isEventsSet && (r = this.getCurrentEvents(), t = this.filterResourcesWithEvents([e], r), t.length) ? this.requestResourceRender(t[0]) : void 0 : this.requestResourceRender(e) : this.handleResources(this.getCurrentResources())
        },
        handleResourceRemove: function (e) {
            return this.canRenderSpecificResources ? this.requestResourceUnrender(e) : this.handleResources(this.getCurrentResources())
        },
        requestResourcesRender: function (e) {
            return this.resourceRenderQueue.add(function (t) {
                return function () {
                    return t.executeResourcesRender(e)
                }
            }(this))
        },
        requestResourcesUnrender: function (e) {
            return this.isResourcesRendered ? this.resourceRenderQueue.add(function (t) {
                return function () {
                    return t.executeResourcesUnrender(e)
                }
            }(this)) : C.resolve()
        },
        requestResourceRender: function (e) {
            return this.resourceRenderQueue.add(function (t) {
                return function () {
                    return t.executeResourceRender(e)
                }
            }(this))
        },
        requestResourceUnrender: function (e) {
            return this.resourceRenderQueue.add(function (t) {
                return function () {
                    return t.executeResourceUnrender(e)
                }
            }(this))
        },
        executeResourcesRender: function (e) {
            return this.captureScroll(), this.freezeHeight(), this.executeResourcesUnrender().then(function (t) {
                return function () {
                    return t.renderResources(e), t.thawHeight(), t.releaseScroll(), t.reportResourcesRender()
                }
            }(this))
        },
        executeResourcesUnrender: function (e) {
            return this.isResourcesRendered ? this.requestEventsUnrender().then(function (t) {
                return function () {
                    return t.captureScroll(), t.freezeHeight(), t.unrenderResources(e), t.thawHeight(), t.releaseScroll(), t.reportResourcesUnrender()
                }
            }(this)) : C.resolve()
        },
        executeResourceRender: function (e) {
            return this.isResourcesRendered ? (this.captureScroll(), this.freezeHeight(), this.renderResource(e), this.thawHeight(), this.releaseScroll()) : C.reject()
        },
        executeResourceUnrender: function (e) {
            return this.isResourcesRendered ? (this.captureScroll(),
                this.freezeHeight(), this.unrenderResource(e), this.thawHeight(), this.releaseScroll()) : C.reject()
        },
        reportResourcesRender: function () {
            this.isResourcesRendered = !0, this.trigger("resourcesRender"), this.isEventsSet && this.requestEventsRender(this.getCurrentEvents())
        },
        reportResourcesUnrender: function () {
            return this.isResourcesRendered = !1, this.isResourcesDirty = !1
        },
        whenResourcesRendered: function () {
            return this.isResourcesRendered && !this.isResourcesDirty ? C.resolve() : new C(function (e) {
                return function (t) {
                    return e.one("resourcesRender", t)
                }
            }(this))
        },
        renderResources: function (e) {
        },
        unrenderResources: function (e) {
        },
        renderResource: function (e) {
        },
        unrenderResource: function (e) {
        },
        isEventDraggable: function (e) {
            return this.isEventResourceEditable(e) || K.prototype.isEventDraggable.call(this, e)
        },
        isEventResourceEditable: function (e) {
            var t, r, s;
            return null != (t = null != (r = null != (s = e.resourceEditable) ? s : (e.source || {}).resourceEditable) ? r : this.opt("eventResourceEditable")) ? t : this.isEventGenerallyEditable(e)
        },
        getResourceText: function (e) {
            return this.getResourceTextFunc()(e)
        },
        getResourceTextFunc: function () {
            var e;
            return this.resourceTextFunc ? this.resourceTextFunc : (e = this.opt("resourceText"), "function" != typeof e && (e = function (e) {
                return e.title || e.id
            }), this.resourceTextFunc = e)
        },
        triggerDayClick: function (e, t, r) {
            var s;
            return s = this.calendar.resourceManager, this.publiclyTrigger("dayClick", t, this.calendar.applyTimezone(e.start), r, this, s.getResourceById(e.resourceId))
        },
        triggerSelect: function (e, t) {
            var r;
            return r = this.calendar.resourceManager, this.publiclyTrigger("select", null, this.calendar.applyTimezone(e.start), this.calendar.applyTimezone(e.end), t, this, r.getResourceById(e.resourceId))
        },
        triggerExternalDrop: function (e, t, r, s, o) {
            if (this.publiclyTrigger("drop", r[0], t.start, s, o, t.resourceId), e)return this.publiclyTrigger("eventReceive", null, e)
        },
        reportExternalDrop: function () {
            var e, t, r, s;
            return t = arguments[0], e = arguments[1], r = 3 <= arguments.length ? $e.call(arguments, 2) : [], e = this.normalizeDropLocation(e), (s = K.prototype.reportExternalDrop).call.apply(s, [this, t, e].concat($e.call(r)))
        },
        normalizeDropLocation: function (t) {
            var r;
            return r = e.extend({}, t), delete r.resourceId, this.calendar.setEventResourceId(r, t.resourceId), r
        },
        filterResourcesWithEvents: function (e, t) {
            var r, s, o, n, i, l, u, h;
            for (h = {}, s = 0, n = t.length; s < n; s++)for (r = t[s], l = this.calendar.getEventResourceIds(r), o = 0, i = l.length; o < i; o++)u = l[o], h[u] = !0;
            return J(e, h)
        }
    }, J = function (e, t) {
        var r, s, o, n, i, l;
        for (o = [], n = 0, i = e.length; n < i; n++)l = e[n], l.children.length ? (r = J(l.children, t), (r.length || t[l.id]) && (s = ie(l), s.children = r, o.push(s))) : t[l.id] && o.push(l);
        return o
    }, $ = e.extend({}, L, {
        executeResourcesRender: function (e) {
            return this.setResourcesOnGrids(e), this.isDateRendered ? this.requestDateRender().then(function (e) {
                return function () {
                    return e.reportResourcesRender()
                }
            }(this)) : C.resolve()
        }, executeResourcesUnrender: function (e) {
            return null == e && (e = {}), this.unsetResourcesOnGrids(), this.isDateRendered && !e.skipRerender ? this.requestDateRender().then(function (e) {
                return function () {
                    return e.reportResourcesUnrender()
                }
            }(this)) : (this.reportResourcesUnrender(), C.resolve())
        }, executeDateRender: function (e) {
            return K.prototype.executeDateRender.apply(this, arguments).then(function (e) {
                return function () {
                    if (e.isResourcesSet)return e.reportResourcesRender()
                }
            }(this))
        }, executeDateUnrender: function (e) {
            return K.prototype.executeDateUnrender.apply(this, arguments).then(function (e) {
                return function () {
                    if (e.isResourcesSet)return e.reportResourcesUnrender()
                }
            }(this))
        }, setResourcesOnGrids: function (e) {
        }, unsetResourcesOnGrids: function () {
        }
    }), D = {
        allowCrossResource: !0, eventRangeToSpans: function (t, r) {
            var s, o, n, i, l;
            if (i = this.view.calendar.getEventResourceIds(r), i.length) {
                for (l = [], s = 0, o = i.length; s < o; s++)n = i[s], l.push(e.extend({}, t, {resourceId: n}));
                return l
            }
            return d.isBgEvent(r) ? f.prototype.eventRangeToSpans.apply(this, arguments) : []
        }, fabricateHelperEvent: function (e, t) {
            var r;
            return r = f.prototype.fabricateHelperEvent.apply(this, arguments), this.view.calendar.setEventResourceId(r, e.resourceId), r
        }, computeEventDrop: function (e, t, r) {
            var s;
            return s = this.view.isEventStartEditable(r) ? f.prototype.computeEventDrop.apply(this, arguments) : d.pluckEventDateProps(r), s && (this.view.isEventResourceEditable(r) ? s.resourceId = t.resourceId : s.resourceId = e.resourceId), s
        }, computeExternalDrop: function (e, t) {
            var r;
            return r = f.prototype.computeExternalDrop.apply(this, arguments), r && (r.resourceId = e.resourceId), r
        }, computeEventResize: function (e, t, r, s) {
            var o;
            if (this.allowCrossResource || t.resourceId === r.resourceId)return o = f.prototype.computeEventResize.apply(this, arguments), o && (o.resourceId = t.resourceId), o
        }, computeSelectionSpan: function (e, t) {
            var r;
            if (this.allowCrossResource || e.resourceId === t.resourceId)return r = f.prototype.computeSelectionSpan.apply(this, arguments), r && (r.resourceId = e.resourceId), r
        }
    }, I = {
        flattenedResources: null,
        resourceCnt: 0,
        datesAboveResources: !1,
        allowCrossResource: !1,
        setResources: function (e) {
            return this.flattenedResources = this.flattenResources(e), this.resourceCnt = this.flattenedResources.length, this.updateDayTableCols()
        },
        unsetResources: function () {
            return this.flattenedResources = null, this.resourceCnt = 0, this.updateDayTableCols()
        },
        flattenResources: function (e) {
            var t, r, s, o;
            return r = this.view.opt("resourceOrder"), r ? (t = ke(r), o = function (e, r) {
                return te(e, r, t)
            }) : o = null, s = [], this.accumulateResources(e, o, s), s
        },
        accumulateResources: function (e, t, r) {
            var s, o, n, i, l;
            for (t ? (l = e.slice(0), l.sort(t)) : l = e, i = [], s = 0, o = l.length; s < o; s++)n = l[s], r.push(n), i.push(this.accumulateResources(n.children, t, r));
            return i
        },
        updateDayTableCols: function () {
            return this.datesAboveResources = this.view.opt("groupByDateAndResource"), d.DayTableMixin.updateDayTableCols.call(this)
        },
        computeColCnt: function () {
            return (this.resourceCnt || 1) * this.daysPerRow
        },
        getColDayIndex: function (e) {
            return this.isRTL && (e = this.colCnt - 1 - e), this.datesAboveResources ? Math.floor(e / (this.resourceCnt || 1)) : e % this.daysPerRow
        },
        getColResource: function (e) {
            return this.flattenedResources[this.getColResourceIndex(e)]
        },
        getColResourceIndex: function (e) {
            return this.isRTL && (e = this.colCnt - 1 - e), this.datesAboveResources ? e % (this.resourceCnt || 1) : Math.floor(e / this.daysPerRow)
        },
        indicesToCol: function (e, t) {
            var r;
            return r = this.datesAboveResources ? t * (this.resourceCnt || 1) + e : e * this.daysPerRow + t, this.isRTL && (r = this.colCnt - 1 - r), r
        },
        renderHeadTrHtml: function () {
            return this.resourceCnt ? this.daysPerRow > 1 ? this.datesAboveResources ? this.renderHeadDateAndResourceHtml() : this.renderHeadResourceAndDateHtml() : this.renderHeadResourceHtml() : d.DayTableMixin.renderHeadTrHtml.call(this)
        },
        renderHeadResourceHtml: function () {
            var e, t, r, s, o;
            for (o = [], r = this.flattenedResources, e = 0, t = r.length; e < t; e++)s = r[e], o.push(this.renderHeadResourceCellHtml(s));
            return this.wrapTr(o, "renderHeadIntroHtml")
        },
        renderHeadResourceAndDateHtml: function () {
            var e, t, r, s, o, n, i, l, u, h;
            for (h = [], t = [], i = this.flattenedResources, s = 0, n = i.length; s < n; s++)for (u = i[s], h.push(this.renderHeadResourceCellHtml(u, null, this.daysPerRow)), r = o = 0, l = this.daysPerRow; o < l; r = o += 1)e = this.dayDates[r].clone(), t.push(this.renderHeadResourceDateCellHtml(e, u));
            return this.wrapTr(h, "renderHeadIntroHtml") + this.wrapTr(t, "renderHeadIntroHtml")
        },
        renderHeadDateAndResourceHtml: function () {
            var e, t, r, s, o, n, i, l, u, h;
            for (t = [], h = [], r = s = 0, i = this.daysPerRow; s < i; r = s += 1)for (e = this.dayDates[r].clone(), t.push(this.renderHeadDateCellHtml(e, this.resourceCnt)), l = this.flattenedResources, o = 0, n = l.length; o < n; o++)u = l[o], h.push(this.renderHeadResourceCellHtml(u, e));
            return this.wrapTr(t, "renderHeadIntroHtml") + this.wrapTr(h, "renderHeadIntroHtml")
        },
        renderHeadResourceCellHtml: function (e, t, r) {
            return '<th class="fc-resource-cell" data-resource-id="' + e.id + '"' + (t ? ' data-date="' + t.format("YYYY-MM-DD") + '"' : "") + (r > 1 ? ' colspan="' + r + '"' : "") + ">" + Se(this.view.getResourceText(e)) + "</th>"
        },
        renderHeadResourceDateCellHtml: function (e, t, r) {
            return this.renderHeadDateCellHtml(e, r, 'data-resource-id="' + t.id + '"')
        },
        processHeadResourceEls: function (t) {
            return t.find(".fc-resource-cell").each(function (t) {
                return function (r, s) {
                    var o;
                    return o = t.datesAboveResources ? t.getColResource(r) : t.flattenedResources[t.isRTL ? t.flattenedResources.length - 1 - r : r], t.view.publiclyTrigger("resourceRender", o, o, e(s), e())
                }
            }(this))
        },
        renderBgCellsHtml: function (e) {
            var t, r, s, o, n, i;
            if (this.resourceCnt) {
                for (s = [], t = o = 0, n = this.colCnt; o < n; t = o += 1)r = this.getCellDate(e, t), i = this.getColResource(t), s.push(this.renderResourceBgCellHtml(r, i));
                return s.join("")
            }
            return d.DayTableMixin.renderBgCellsHtml.call(this, e)
        },
        renderResourceBgCellHtml: function (e, t) {
            return this.renderBgCellHtml(e, 'data-resource-id="' + t.id + '"')
        },
        wrapTr: function (e, t) {
            return this.isRTL ? (e.reverse(), "<tr>" + e.join("") + this[t]() + "</tr>") : "<tr>" + this[t]() + e.join("") + "</tr>"
        },
        computePerResourceBusinessHourSegs: function (e) {
            var t, r, s, o, n, i, l, u, h, c, a, p, d, f, g;
            if (this.flattenedResources) {
                for (r = !1, p = this.flattenedResources, i = 0, h = p.length; i < h; i++)f = p[i], f.businessHours && (r = !0);
                if (r) {
                    for (t = [], d = this.flattenedResources, l = 0, c = d.length; l < c; l++) {
                        for (f = d[l], s = f.businessHours || this.view.calendar.options.businessHours, n = this.buildBusinessHourEvents(e, s), u = 0, a = n.length; u < a; u++)o = n[u], o.resourceId = f.id;
                        g = this.eventsToSegs(n), t.push.apply(t, g)
                    }
                    return t
                }
            }
            return null
        }
    }, _ = function (t) {
        function r() {
            return r.__super__.constructor.apply(this, arguments)
        }

        return Ye(r, t), r.mixin(D), r.mixin(I), r.prototype.getHitSpan = function (e) {
            var t;
            return t = r.__super__.getHitSpan.apply(this, arguments), this.resourceCnt && (t.resourceId = this.getColResource(e.col).id), t
        }, r.prototype.spanToSegs = function (t) {
            var r, s, o, n, i, l, u, h, c, a, p, d, f;
            if (c = this.resourceCnt, s = this.datesAboveResources ? this.sliceRangeByDay(t) : this.sliceRangeByRow(t), c) {
                for (d = [], n = 0, u = s.length; n < u; n++)for (f = s[n], a = i = 0, h = c; i < h; a = i += 1)p = this.flattenedResources[a], t.resourceId && t.resourceId !== p.id || (r = e.extend({}, f), r.resource = p, this.isRTL ? (r.leftCol = this.indicesToCol(a, f.lastRowDayIndex), r.rightCol = this.indicesToCol(a, f.firstRowDayIndex)) : (r.leftCol = this.indicesToCol(a, f.firstRowDayIndex), r.rightCol = this.indicesToCol(a, f.lastRowDayIndex)), d.push(r));
                return d
            }
            for (o = 0, l = s.length; o < l; o++)f = s[o], this.isRTL ? (f.leftCol = f.lastRowDayIndex, f.rightCol = f.firstRowDayIndex) : (f.leftCol = f.firstRowDayIndex, f.rightCol = f.lastRowDayIndex);
            return s
        }, r.prototype.renderBusinessHours = function () {
            var e;
            return e = this.computePerResourceBusinessHourSegs(!0), e ? this.renderFill("businessHours", e, "bgevent") : r.__super__.renderBusinessHours.apply(this, arguments)
        }, r
    }(d.DayGrid), F = function (t) {
        function r() {
            return r.__super__.constructor.apply(this, arguments)
        }

        return Ye(r, t), r.mixin(D), r.mixin(I), r.prototype.getHitSpan = function (e) {
            var t;
            return t = r.__super__.getHitSpan.apply(this, arguments), this.resourceCnt && (t.resourceId = this.getColResource(e.col).id), t
        }, r.prototype.spanToSegs = function (t) {
            var r, s, o, n, i, l, u, h, c, a, p, d, f;
            if (c = this.resourceCnt, s = this.sliceRangeByTimes(t), c) {
                for (d = [], n = 0, u = s.length; n < u; n++)for (f = s[n], a = i = 0, h = c; i < h; a = i += 1)p = this.flattenedResources[a], t.resourceId && t.resourceId !== p.id || (r = e.extend({}, f), r.resource = p, r.col = this.indicesToCol(a, f.dayIndex), d.push(r));
                return d
            }
            for (o = 0, l = s.length; o < l; o++)f = s[o], f.col = f.dayIndex;
            return s
        }, r.prototype.renderBusinessHours = function () {
            var e;
            return e = this.computePerResourceBusinessHourSegs(!1), e ? this.renderBusinessSegs(e) : r.__super__.renderBusinessHours.apply(this, arguments)
        }, r
    }(d.TimeGrid), Y = function (e) {
        function r() {
            return r.__super__.constructor.apply(this, arguments)
        }

        return Ye(r, e), r.prototype.timeGrid = null, r.prototype.isScrolled = !1, r.prototype.initialize = function () {
            return this.timeGrid = this.instantiateGrid(), this.intervalDuration = this.timeGrid.duration
        }, r.prototype.instantiateGrid = function () {
            return new j(this)
        }, r.prototype.setRange = function (e) {
            return r.__super__.setRange.apply(this, arguments), this.timeGrid.setRange(e)
        }, r.prototype.renderSkeleton = function () {
            return this.el.addClass("fc-timeline"), this.opt("eventOverlap") === !1 && this.el.addClass("fc-no-overlap"), this.el.html(this.renderSkeletonHtml()), this.renderTimeGridSkeleton()
        }, r.prototype.renderSkeletonHtml = function () {
            return '<table> <thead class="fc-head"> <tr> <td class="fc-time-area ' + this.widgetHeaderClass + '"></td> </tr> </thead> <tbody class="fc-body"> <tr> <td class="fc-time-area ' + this.widgetContentClass + '"></td> </tr> </tbody> </table>'
        }, r.prototype.renderTimeGridSkeleton = function () {
            return this.timeGrid.setElement(this.el.find("tbody .fc-time-area")), this.timeGrid.headEl = this.el.find("thead .fc-time-area"), this.timeGrid.renderSkeleton(), this.isScrolled = !1, this.timeGrid.bodyScroller.on("scroll", Pe(this, "handleBodyScroll"))
        }, r.prototype.handleBodyScroll = function (e, t) {
            if (e) {
                if (!this.isScrolled)return this.isScrolled = !0, this.el.addClass("fc-scrolled")
            } else if (this.isScrolled)return this.isScrolled = !1, this.el.removeClass("fc-scrolled")
        }, r.prototype.unrenderSkeleton = function () {
            return this.timeGrid.removeElement(), this.handleBodyScroll(0), r.__super__.unrenderSkeleton.apply(this, arguments)
        }, r.prototype.renderDates = function () {
            return this.timeGrid.renderDates()
        }, r.prototype.unrenderDates = function () {
            return this.timeGrid.unrenderDates()
        }, r.prototype.renderBusinessHours = function () {
            return this.timeGrid.renderBusinessHours()
        }, r.prototype.unrenderBusinessHours = function () {
            return this.timeGrid.unrenderBusinessHours()
        }, r.prototype.getNowIndicatorUnit = function () {
            return this.timeGrid.getNowIndicatorUnit()
        }, r.prototype.renderNowIndicator = function (e) {
            return this.timeGrid.renderNowIndicator(e)
        }, r.prototype.unrenderNowIndicator = function () {
            return this.timeGrid.unrenderNowIndicator()
        }, r.prototype.hitsNeeded = function () {
            return this.timeGrid.hitsNeeded()
        }, r.prototype.hitsNotNeeded = function () {
            return this.timeGrid.hitsNotNeeded()
        }, r.prototype.prepareHits = function () {
            return this.timeGrid.prepareHits()
        }, r.prototype.releaseHits = function () {
            return this.timeGrid.releaseHits()
        }, r.prototype.queryHit = function (e, t) {
            return this.timeGrid.queryHit(e, t)
        }, r.prototype.getHitSpan = function (e) {
            return this.timeGrid.getHitSpan(e)
        }, r.prototype.getHitEl = function (e) {
            return this.timeGrid.getHitEl(e)
        }, r.prototype.updateWidth = function () {
            return this.timeGrid.updateWidth()
        }, r.prototype.setHeight = function (e, t) {
            var r;
            return r = t ? "auto" : e - this.timeGrid.headHeight() - this.queryMiscHeight(), this.timeGrid.bodyScroller.setHeight(r)
        }, r.prototype.queryMiscHeight = function () {
            return this.el.outerHeight() - this.timeGrid.headScroller.el.outerHeight() - this.timeGrid.bodyScroller.el.outerHeight()
        }, r.prototype.computeInitialScroll = function () {
            var e, r;
            return e = 0, this.timeGrid.isTimeScale && (r = this.opt("scrollTime"), r && (r = t.duration(r), e = this.timeGrid.dateToCoord(this.start.clone().time(r)))), {
                left: e,
                top: 0
            }
        }, r.prototype.queryScroll = function () {
            return {left: this.timeGrid.bodyScroller.getScrollLeft(), top: this.timeGrid.bodyScroller.getScrollTop()}
        }, r.prototype.setScroll = function (e) {
            return this.timeGrid.headScroller.setScrollLeft(e.left), this.timeGrid.bodyScroller.setScrollLeft(e.left), this.timeGrid.bodyScroller.setScrollTop(e.top)
        }, r.prototype.renderEvents = function (e) {
            return this.timeGrid.renderEvents(e), this.updateWidth()
        }, r.prototype.unrenderEvents = function () {
            return this.timeGrid.unrenderEvents(), this.updateWidth()
        }, r.prototype.renderDrag = function (e, t) {
            return this.timeGrid.renderDrag(e, t)
        }, r.prototype.unrenderDrag = function () {
            return this.timeGrid.unrenderDrag()
        }, r.prototype.getEventSegs = function () {
            return this.timeGrid.getEventSegs()
        }, r.prototype.renderSelection = function (e) {
            return this.timeGrid.renderSelection(e)
        }, r.prototype.unrenderSelection = function () {
            return this.timeGrid.unrenderSelection()
        }, r
    }(K), le = d.cssToStr, j = function (r) {
        function s() {
            var e;
            s.__super__.constructor.apply(this, arguments), this.initScaleProps(), this.minTime = t.duration(this.opt("minTime") || "00:00"), this.maxTime = t.duration(this.opt("maxTime") || "24:00"), this.timeWindowMs = this.maxTime - this.minTime, this.snapDuration = (e = this.opt("snapDuration")) ? t.duration(e) : this.slotDuration, this.minResizeDuration = this.snapDuration, this.snapsPerSlot = ce(this.slotDuration, this.snapDuration), this.slotWidth = this.opt("slotWidth")
        }

        return Ye(s, r), s.prototype.slotDates = null, s.prototype.slotCnt = null, s.prototype.snapCnt = null, s.prototype.snapsPerSlot = null, s.prototype.snapDiffToIndex = null, s.prototype.snapIndexToDiff = null, s.prototype.headEl = null, s.prototype.slatContainerEl = null, s.prototype.slatEls = null, s.prototype.containerCoordCache = null, s.prototype.slatCoordCache = null, s.prototype.slatInnerCoordCache = null, s.prototype.headScroller = null, s.prototype.bodyScroller = null, s.prototype.joiner = null, s.prototype.follower = null, s.prototype.eventTitleFollower = null, s.prototype.minTime = null, s.prototype.maxTime = null, s.prototype.timeWindowMs = null, s.prototype.slotDuration = null, s.prototype.snapDuration = null, s.prototype.duration = null, s.prototype.labelInterval = null, s.prototype.headerFormats = null, s.prototype.isTimeScale = null, s.prototype.largeUnit = null, s.prototype.emphasizeWeeks = !1, s.prototype.titleFollower = null, s.prototype.segContainerEl = null, s.prototype.segContainerHeight = null, s.prototype.bgSegContainerEl = null, s.prototype.helperEls = null, s.prototype.innerEl = null, s.prototype.opt = function (e) {
            return this.view.opt(e)
        }, s.prototype.isValidDate = function (e) {
            var t;
            return !this.view.isHiddenDay(e) && (!this.isTimeScale || (t = e.time() - this.minTime, t = (t % 864e5 + 864e5) % 864e5, t < this.timeWindowMs))
        }, s.prototype.computeDisplayEventTime = function () {
            return !this.isTimeScale
        }, s.prototype.computeDisplayEventEnd = function () {
            return !1
        }, s.prototype.computeEventTimeFormat = function () {
            return this.opt("extraSmallTimeFormat")
        }, s.prototype.normalizeGridDate = function (e) {
            var t;
            return this.isTimeScale ? (t = e.clone(), t.hasTime() || t.time(0)) : (t = e.clone().stripTime(), this.largeUnit && t.startOf(this.largeUnit)), t
        }, s.prototype.normalizeGridRange = function (e) {
            var t, r;
            return this.isTimeScale ? r = {
                start: this.normalizeGridDate(e.start),
                end: this.normalizeGridDate(e.end)
            } : (r = this.view.computeDayRange(e), this.largeUnit && (r.start.startOf(this.largeUnit), t = r.end.clone().startOf(this.largeUnit), t.isSame(r.end) && t.isAfter(r.start) || t.add(this.slotDuration), r.end = t)), r
        }, s.prototype.rangeUpdated = function () {
            var e, t;
            for (this.start = this.normalizeGridDate(this.start), this.end = this.normalizeGridDate(this.end), this.isTimeScale && (this.start.add(this.minTime), this.end.subtract(1, "day").add(this.maxTime)), t = [], e = this.start.clone(); e < this.end;)this.isValidDate(e) && t.push(e.clone()), e.add(this.slotDuration);
            return this.slotDates = t, this.updateGridDates()
        }, s.prototype.updateGridDates = function () {
            var e, t, r, s, o;
            for (s = -1, t = 0, r = [], o = [], e = this.start.clone(); e < this.end;)this.isValidDate(e) ? (s++, r.push(s), o.push(t)) : r.push(s + .5), e.add(this.snapDuration), t++;
            return this.snapDiffToIndex = r, this.snapIndexToDiff = o, this.snapCnt = s + 1, this.slotCnt = this.snapCnt / this.snapsPerSlot
        }, s.prototype.spanToSegs = function (e) {
            var t, r;
            return t = this.normalizeGridRange(e), this.computeDateSnapCoverage(e.start) < this.computeDateSnapCoverage(e.end) && (r = be(t, this)) ? (r.isStart && !this.isValidDate(r.start) && (r.isStart = !1), r.isEnd && r.end && !this.isValidDate(r.end.clone().subtract(1)) && (r.isEnd = !1), [r]) : []
        }, s.prototype.prepareHits = function () {
            return this.buildCoords()
        }, s.prototype.queryHit = function (e, t) {
            var r, s, o, n, i, l, u, h, c, a, p, d;
            if (d = this.snapsPerSlot, n = this.slatCoordCache, r = this.containerCoordCache, r.isPointInBounds(e, t) && (i = n.getHorizontalIndex(e), null != i))return h = n.getWidth(i), this.isRTL ? (u = n.getRightOffset(i), o = (u - e) / h, s = Math.floor(o * d), c = i * d + s, p = u - s / d * h, a = p - (s + 1) / d * h) : (l = n.getLeftOffset(i), o = (e - l) / h, s = Math.floor(o * d), c = i * d + s, a = l + s / d * h, p = l + (s + 1) / d * h), {
                snap: c,
                component: this,
                left: a,
                right: p,
                top: r.getTopOffset(0),
                bottom: r.getBottomOffset(0)
            }
        }, s.prototype.getHitSpan = function (e) {
            return this.getSnapRange(e.snap)
        }, s.prototype.getHitEl = function (e) {
            return this.getSnapEl(e.snap)
        }, s.prototype.getSnapRange = function (e) {
            var t, r;
            return r = this.start.clone(), r.add(Ie(this.snapDuration, this.snapIndexToDiff[e])), t = r.clone().add(this.snapDuration), {
                start: r,
                end: t
            }
        }, s.prototype.getSnapEl = function (e) {
            return this.slatEls.eq(Math.floor(e / this.snapsPerSlot))
        }, s.prototype.renderSkeleton = function () {
            return this.headScroller = new i({
                overflowX: "clipped-scroll",
                overflowY: "hidden"
            }), this.headScroller.canvas = new N, this.headScroller.render(), this.headEl.append(this.headScroller.el), this.bodyScroller = new i, this.bodyScroller.canvas = new N, this.bodyScroller.render(), this.el.append(this.bodyScroller.el), this.innerEl = this.bodyScroller.canvas.contentEl, this.slatContainerEl = e('<div class="fc-slats"/>').appendTo(this.bodyScroller.canvas.bgEl), this.segContainerEl = e('<div class="fc-event-container"/>').appendTo(this.bodyScroller.canvas.contentEl), this.bgSegContainerEl = this.bodyScroller.canvas.bgEl, this.containerCoordCache = new l({
                els: this.bodyScroller.canvas.el,
                isHorizontal: !0,
                isVertical: !0
            }), this.joiner = new A("horizontal", [this.headScroller, this.bodyScroller]), this.follower = new P(this.headScroller, (!0)), this.eventTitleFollower = new P(this.bodyScroller), this.eventTitleFollower.minTravel = 50, this.isRTL ? this.eventTitleFollower.containOnNaturalRight = !0 : this.eventTitleFollower.containOnNaturalLeft = !0, s.__super__.renderSkeleton.apply(this, arguments)
        }, s.prototype.headColEls = null, s.prototype.slatColEls = null, s.prototype.renderDates = function () {
            var e, t, r, s, o;
            for (this.headScroller.canvas.contentEl.html(this.renderHeadHtml()), this.headColEls = this.headScroller.canvas.contentEl.find("col"), this.slatContainerEl.html(this.renderSlatHtml()), this.slatColEls = this.slatContainerEl.find("col"), this.slatEls = this.slatContainerEl.find("td"), this.slatCoordCache = new l({
                els: this.slatEls,
                isHorizontal: !0
            }), this.slatInnerCoordCache = new l({
                els: this.slatEls.find("> div"),
                isHorizontal: !0,
                offsetParent: this.bodyScroller.canvas.el
            }), o = this.slotDates, t = r = 0, s = o.length; r < s; t = ++r)e = o[t], this.view.publiclyTrigger("dayRender", null, e, this.slatEls.eq(t));
            if (this.follower)return this.follower.setSprites(this.headEl.find("tr:not(:last-child) .fc-cell-text"))
        }, s.prototype.unrenderDates = function () {
            return this.follower && this.follower.clearSprites(), this.headScroller.canvas.contentEl.empty(), this.slatContainerEl.empty(), this.headScroller.canvas.clearWidth(), this.bodyScroller.canvas.clearWidth()
        }, s.prototype.renderHeadHtml = function () {
            var e, t, r, s, o, n, i, l, u, h, c, a, p, f, g, y, v, R, w, m, S, b, C, E, H, T, _, I, D, x, G, B, F, W, M, L, z, k, O;
            for (v = this.labelInterval, o = this.headerFormats, t = function () {
                var e, t, r;
                for (r = [], e = 0, t = o.length; e < t; e++)s = o[e], r.push([]);
                return r
            }(), R = null, x = null, z = this.slotDates, L = [], W = function () {
                var e, t, r;
                for (r = [], e = 0, t = o.length; e < t; e++)s = o[e], r.push(d.queryMostGranularFormatUnit(s));
                return r
            }(), f = 0, w = z.length; f < w; f++) {
                for (r = z[f], O = r.week(), p = this.emphasizeWeeks && null !== x && x !== O, B = g = 0, m = o.length; g < m; B = ++g)s = o[B], F = t[B], R = F[F.length - 1], a = o.length > 1 && B < o.length - 1, I = null, a ? (k = r.format(s), R && R.text === k ? R.colspan += 1 : I = this.buildCellObject(r, k, W[B])) : !R || He(ae(this.start, r, v)) ? (k = r.format(s), I = this.buildCellObject(r, k, W[B])) : R.colspan += 1, I && (I.weekStart = p, F.push(I));
                L.push({weekStart: p}), x = O
            }
            for (u = v > this.slotDuration, c = 1 === this.slotDuration.as("days"), i = "<table>", i += "<colgroup>", y = 0, S = z.length; y < S; y++)r = z[y], i += "<col/>";
            for (i += "</colgroup>", i += "<tbody>", l = T = 0, b = t.length; T < b; l = ++T) {
                for (F = t[l], h = l === t.length - 1, i += "<tr" + (u && h ? ' class="fc-chrono"' : "") + ">", _ = 0, C = F.length; _ < C; _++)e = F[_], n = [this.view.widgetHeaderClass], e.weekStart && n.push("fc-em-cell"), c && (n = n.concat(this.getDayClasses(e.date, !0))), i += '<th class="' + n.join(" ") + '" data-date="' + e.date.format() + '"' + (e.colspan > 1 ? ' colspan="' + e.colspan + '"' : "") + '><div class="fc-cell-content">' + e.spanHtml + "</div></th>";
                i += "</tr>"
            }
            for (i += "</tbody></table>", M = "<table>", M += "<colgroup>", D = 0, E = L.length; D < E; D++)e = L[D], M += "<col/>";
            for (M += "</colgroup>", M += "<tbody><tr>", l = G = 0, H = L.length; G < H; l = ++G)e = L[l], r = z[l], M += this.slatCellHtml(r, e.weekStart);
            return M += "</tr></tbody></table>", this._slatHtml = M, i
        }, s.prototype.buildCellObject = function (e, t, r) {
            var s;
            return e = e.clone(), s = this.view.buildGotoAnchorHtml({
                date: e,
                type: r,
                forceOff: !r
            }, {"class": "fc-cell-text"}, Se(t)), {text: t, spanHtml: s, date: e, colspan: 1}
        }, s.prototype.renderSlatHtml = function () {
            return this._slatHtml
        }, s.prototype.slatCellHtml = function (e, t) {
            var r;
            return this.isTimeScale ? (r = [], r.push(He(ae(this.start, e, this.labelInterval)) ? "fc-major" : "fc-minor")) : (r = this.getDayClasses(e), r.push("fc-day")), r.unshift(this.view.widgetContentClass), t && r.push("fc-em-cell"), '<td class="' + r.join(" ") + '" data-date="' + e.format() + '"><div /></td>'
        }, s.prototype.businessHourSegs = null, s.prototype.renderBusinessHours = function () {
            var e;
            if (!this.largeUnit)return e = this.businessHourSegs = this.buildBusinessHourSegs(!this.isTimeScale), this.renderFill("businessHours", e, "bgevent")
        }, s.prototype.unrenderBusinessHours = function () {
            return this.unrenderFill("businessHours")
        }, s.prototype.nowIndicatorEls = null, s.prototype.getNowIndicatorUnit = function () {
            if (this.isTimeScale)return re(this.slotDuration)
        }, s.prototype.renderNowIndicator = function (t) {
            var r, s, o;
            return o = [], t = this.normalizeGridDate(t), t >= this.start && t < this.end && (r = this.dateToCoord(t), s = this.isRTL ? {right: -r} : {left: r}, o.push(e("<div class='fc-now-indicator fc-now-indicator-arrow'></div>").css(s).appendTo(this.headScroller.canvas.el)[0]), o.push(e("<div class='fc-now-indicator fc-now-indicator-line'></div>").css(s).appendTo(this.bodyScroller.canvas.el)[0])), this.nowIndicatorEls = e(o)
        }, s.prototype.unrenderNowIndicator = function () {
            if (this.nowIndicatorEls)return this.nowIndicatorEls.remove(), this.nowIndicatorEls = null
        }, s.prototype.explicitSlotWidth = null, s.prototype.defaultSlotWidth = null, s.prototype.updateWidth = function () {
            var e, t, r, s, o, n;
            if (s = this.headColEls, s ? (n = Math.round(this.slotWidth || (this.slotWidth = this.computeSlotWidth())), r = n * this.slotDates.length, t = "", o = n, e = this.bodyScroller.getClientWidth(), e > r && (t = e, r = "", o = Math.floor(e / this.slotDates.length))) : (r = "", t = ""), this.headScroller.canvas.setWidth(r), this.headScroller.canvas.setMinWidth(t), this.bodyScroller.canvas.setWidth(r), this.bodyScroller.canvas.setMinWidth(t), s && this.headColEls.slice(0, -1).add(this.slatColEls.slice(0, -1)).width(o), this.headScroller.updateSize(), this.bodyScroller.updateSize(), this.joiner.update(), s && (this.buildCoords(), this.updateSegPositions(), this.view.updateNowIndicator()), this.follower && this.follower.update(), this.eventTitleFollower)return this.eventTitleFollower.update()
        }, s.prototype.computeSlotWidth = function () {
            var t, r, s, o, n, i;
            return s = 0, r = this.headEl.find("tr:last-child th .fc-cell-text"), r.each(function (t, r) {
                var o;
                return o = e(r).outerWidth(), s = Math.max(s, o)
            }), t = s + 1, i = ce(this.labelInterval, this.slotDuration), n = Math.ceil(t / i), o = this.headColEls.eq(0).css("min-width"), o && (o = parseInt(o, 10), o && (n = Math.max(n, o))), n
        }, s.prototype.buildCoords = function () {
            return this.containerCoordCache.build(), this.slatCoordCache.build(), this.slatInnerCoordCache.build()
        }, s.prototype.computeDateSnapCoverage = function (e) {
            var t, r, s;
            return r = ae(this.start, e, this.snapDuration), r < 0 ? 0 : r >= this.snapDiffToIndex.length ? this.snapCnt : (s = Math.floor(r), t = this.snapDiffToIndex[s], He(t) ? t += r - s : t = Math.ceil(t), t)
        }, s.prototype.dateToCoord = function (e) {
            var t, r, s, o, n;
            return n = this.computeDateSnapCoverage(e), s = n / this.snapsPerSlot, o = Math.floor(s), o = Math.min(o, this.slotCnt - 1), r = s - o, t = this.slatInnerCoordCache, this.isRTL ? t.getRightPosition(o) - t.getWidth(o) * r - this.containerCoordCache.getWidth(0) : t.getLeftPosition(o) + t.getWidth(o) * r
        }, s.prototype.rangeToCoords = function (e) {
            return this.isRTL ? {
                right: this.dateToCoord(e.start),
                left: this.dateToCoord(e.end)
            } : {left: this.dateToCoord(e.start), right: this.dateToCoord(e.end)}
        }, s.prototype.headHeight = function () {
            var e;
            return e = this.headScroller.canvas.contentEl.find("table"), e.height.apply(e, arguments)
        }, s.prototype.updateSegPositions = function () {
            var e, t, r, s, o;
            for (o = (this.segs || []).concat(this.businessHourSegs || []), t = 0, r = o.length; t < r; t++)s = o[t], e = this.rangeToCoords(s), s.el.css({
                left: s.left = e.left,
                right: -(s.right = e.right)
            })
        }, s.prototype.renderFgSegs = function (e) {
            return e = this.renderFgSegEls(e), this.renderFgSegsInContainers([[this, e]]), this.updateSegFollowers(e), e
        }, s.prototype.unrenderFgSegs = function () {
            return this.clearSegFollowers(), this.unrenderFgContainers([this])
        }, s.prototype.renderFgSegsInContainers = function (e) {
            var t, r, s, o, n, i, l, u, h, c, a, p, d, f, g, y, v, R, w, m, S, b, C, E, H;
            for (s = 0, i = e.length; s < i; s++)for (w = e[s], t = w[0], H = w[1], o = 0, l = H.length; o < l; o++)E = H[o], r = this.rangeToCoords(E), E.el.css({
                left: E.left = r.left,
                right: -(E.right = r.right)
            });
            for (n = 0, u = e.length; n < u; n++)for (m = e[n], t = m[0], H = m[1], f = 0, h = H.length; f < h; f++)E = H[f], E.el.appendTo(t.segContainerEl);
            for (g = 0, c = e.length; g < c; g++) {
                for (S = e[g], t = S[0], H = S[1], y = 0, a = H.length; y < a; y++)E = H[y], E.height = E.el.outerHeight(!0);
                this.buildSegLevels(H), t.segContainerHeight = oe(H)
            }
            for (C = [], v = 0, p = e.length; v < p; v++) {
                for (b = e[v], t = b[0], H = b[1], R = 0, d = H.length; R < d; R++)E = H[R], E.el.css("top", E.top);
                C.push(t.segContainerEl.height(t.segContainerHeight))
            }
            return C
        }, s.prototype.buildSegLevels = function (e) {
            var t, r, s, o, n, i, l, u, h, c, a, p, d, f;
            for (d = [], this.sortEventSegs(e), s = 0, i = e.length; s < i; s++) {
                for (f = e[s], f.above = [], h = 0; h < d.length;) {
                    for (r = !1, a = d[h], o = 0, l = a.length; o < l; o++)c = a[o], Ve(f, c) && (f.above.push(c), r = !0);
                    if (!r)break;
                    h += 1
                }
                for ((d[h] || (d[h] = [])).push(f), h += 1; h < d.length;) {
                    for (p = d[h], n = 0, u = p.length; n < u; n++)t = p[n], Ve(f, t) && t.above.push(f);
                    h += 1
                }
            }
            return d
        }, s.prototype.unrenderFgContainers = function (e) {
            var t, r, s, o;
            for (o = [], r = 0, s = e.length; r < s; r++)t = e[r], t.segContainerEl.empty(), t.segContainerEl.height(""), o.push(t.segContainerHeight = null);
            return o
        }, s.prototype.fgSegHtml = function (e, t) {
            var r, s, o, n, i, l;
            return s = e.event, o = this.view.isEventDraggable(s), i = e.isStart && this.view.isEventResizableFromStart(s), n = e.isEnd && this.view.isEventResizableFromEnd(s), r = this.getSegClasses(e, o, i || n), r.unshift("fc-timeline-event", "fc-h-event"), l = this.getEventTimeText(s), '<a class="' + r.join(" ") + '" style="' + le(this.getSegSkinCss(e)) + '"' + (s.url ? ' href="' + Se(s.url) + '"' : "") + '><div class="fc-content">' + (l ? '<span class="fc-time">' + Se(l) + "</span>" : "") + '<span class="fc-title">' + (s.title ? Se(s.title) : "&nbsp;") + '</span></div><div class="fc-bg" />' + (i ? '<div class="fc-resizer fc-start-resizer"></div>' : "") + (n ? '<div class="fc-resizer fc-end-resizer"></div>' : "") + "</a>"
        }, s.prototype.updateSegFollowers = function (e) {
            var t, r, s, o, n;
            if (this.eventTitleFollower) {
                for (o = [], t = 0, r = e.length; t < r; t++)s = e[t], n = s.el.find(".fc-title"), n.length && o.push(new q(n));
                return this.eventTitleFollower.setSprites(o)
            }
        }, s.prototype.clearSegFollowers = function () {
            if (this.eventTitleFollower)return this.eventTitleFollower.clearSprites()
        }, s.prototype.segDragStart = function () {
            if (s.__super__.segDragStart.apply(this, arguments), this.eventTitleFollower)return this.eventTitleFollower.forceRelative()
        }, s.prototype.segDragEnd = function () {
            if (s.__super__.segDragEnd.apply(this, arguments), this.eventTitleFollower)return this.eventTitleFollower.clearForce()
        }, s.prototype.segResizeStart = function () {
            if (s.__super__.segResizeStart.apply(this, arguments), this.eventTitleFollower)return this.eventTitleFollower.forceRelative()
        }, s.prototype.segResizeEnd = function () {
            if (s.__super__.segResizeEnd.apply(this, arguments), this.eventTitleFollower)return this.eventTitleFollower.clearForce()
        }, s.prototype.renderHelper = function (e, t) {
            var r;
            return r = this.eventToSegs(e), r = this.renderFgSegEls(r), this.renderHelperSegsInContainers([[this, r]], t)
        }, s.prototype.renderHelperSegsInContainers = function (t, r) {
            var s, o, n, i, l, u, h, c, a, p, d, f, g, y, v, R, w, m;
            for (i = [], w = [], l = 0, c = t.length; l < c; l++)for (g = t[l], s = g[0], m = g[1], u = 0, a = m.length; u < a; u++)R = m[u], o = this.rangeToCoords(R), R.el.css({
                left: R.left = o.left,
                right: -(R.right = o.right)
            }), r && r.resourceId === (null != (y = s.resource) ? y.id : void 0) ? R.el.css("top", r.el.css("top")) : R.el.css("top", 0);
            for (h = 0, p = t.length; h < p; h++)for (v = t[h], s = v[0], m = v[1], n = e('<div class="fc-event-container fc-helper-container"/>').appendTo(s.innerEl), i.push(n[0]), f = 0, d = m.length; f < d; f++)R = m[f], n.append(R.el), w.push(R.el[0]);
            return this.helperEls ? this.helperEls = this.helperEls.add(e(i)) : this.helperEls = e(i), e(w)
        }, s.prototype.unrenderHelper = function () {
            if (this.helperEls)return this.helperEls.remove(), this.helperEls = null
        }, s.prototype.renderEventResize = function (e, t) {
            return this.renderHighlight(this.eventToSpan(e)), this.renderEventLocationHelper(e, t)
        }, s.prototype.unrenderEventResize = function () {
            return this.unrenderHighlight(), this.unrenderHelper()
        }, s.prototype.renderFill = function (e, t, r) {
            return t = this.renderFillSegEls(e, t), this.renderFillInContainers(e, [[this, t]], r), t
        }, s.prototype.renderFillInContainers = function (e, t, r) {
            var s, o, n, i, l, u;
            for (l = [], o = 0, n = t.length; o < n; o++)i = t[o], s = i[0], u = i[1], l.push(this.renderFillInContainer(e, s, u, r));
            return l
        }, s.prototype.renderFillInContainer = function (t, r, s, o) {
            var n, i, l, u, h;
            if (s.length) {
                for (o || (o = t.toLowerCase()), n = e('<div class="fc-' + o + '-container" />').appendTo(r.bgSegContainerEl), l = 0, u = s.length; l < u; l++)h = s[l], i = this.rangeToCoords(h), h.el.css({
                    left: h.left = i.left,
                    right: -(h.right = i.right)
                }), h.el.appendTo(n);
                return this.elsByFill[t] ? this.elsByFill[t] = this.elsByFill[t].add(n) : this.elsByFill[t] = n
            }
        }, s.prototype.renderDrag = function (e, t) {
            return t ? this.renderEventLocationHelper(e, t) : (this.renderHighlight(this.eventToSpan(e)), null)
        }, s.prototype.unrenderDrag = function () {
            return this.unrenderHelper(), this.unrenderHighlight()
        }, s
    }(f), oe = function (e) {
        var t, r, s, o;
        for (s = 0, t = 0, r = e.length; t < r; t++)o = e[t], s = Math.max(s, se(o));
        return s
    }, se = function (e) {
        return null == e.top && (e.top = oe(e.above)), e.top + e.height
    }, Ve = function (e, t) {
        return e.left < t.right && e.right > t.left
    }, S = 18, w = 6,R = 200,m = 1e3,u = {months: 1},O = [{years: 1}, {months: 1}, {days: 1}, {hours: 1}, {minutes: 30}, {minutes: 15}, {minutes: 10}, {minutes: 5}, {minutes: 1}, {seconds: 30}, {seconds: 15}, {seconds: 10}, {seconds: 5}, {seconds: 1}, {milliseconds: 500}, {milliseconds: 100}, {milliseconds: 10}, {milliseconds: 1}],j.prototype.initScaleProps = function () {
        var t, r, s;
        return this.labelInterval = this.queryDurationOption("slotLabelInterval"), this.slotDuration = this.queryDurationOption("slotDuration"), this.ensureGridDuration(), this.validateLabelAndSlot(), this.ensureLabelInterval(), this.ensureSlotDuration(), t = this.opt("slotLabelFormat"), s = e.type(t), this.headerFormats = "array" === s ? t : "string" === s ? [t] : this.computeHeaderFormats(), this.isTimeScale = pe(this.slotDuration), this.largeUnit = this.isTimeScale ? void 0 : (r = re(this.slotDuration), /year|month|week/.test(r) ? r : void 0), this.emphasizeWeeks = 1 === this.slotDuration.as("days") && this.duration.as("weeks") >= 2 && !this.opt("businessHours")
    },j.prototype.queryDurationOption = function (e) {
        var r, s;
        if (s = this.opt(e), null != s && (r = t.duration(s), +r))return r
    },j.prototype.validateLabelAndSlot = function () {
        var e, t, r;
        if (this.labelInterval && (e = ce(this.duration, this.labelInterval), e > m && (d.warn("slotLabelInterval results in too many cells"), this.labelInterval = null)), this.slotDuration && (t = ce(this.duration, this.slotDuration), t > m && (d.warn("slotDuration results in too many cells"), this.slotDuration = null)), this.labelInterval && this.slotDuration && (r = ce(this.labelInterval, this.slotDuration), !He(r) || r < 1))return d.warn("slotLabelInterval must be a multiple of slotDuration"), this.slotDuration = null
    },j.prototype.ensureGridDuration = function () {
        var e, r, s, o, n;
        if (e = this.duration, !e) {
            if (e = this.view.intervalDuration, !e)if (this.labelInterval || this.slotDuration)for (n = this.ensureLabelInterval(), s = O.length - 1; s >= 0 && (r = O[s], e = t.duration(r), o = ce(e, n), !(o >= S)); s += -1); else e = t.duration(u);
            this.duration = e
        }
        return e
    },j.prototype.ensureLabelInterval = function () {
        var e, r, s, o, n, i, l, u, h;
        if (n = this.labelInterval, !n) {
            if (this.duration || this.slotDuration || this.ensureGridDuration(), this.slotDuration) {
                for (r = 0, i = O.length; r < i; r++)if (e = O[r], h = t.duration(e), u = ce(h, this.slotDuration), He(u) && u <= w) {
                    n = h;
                    break
                }
                n || (n = this.slotDuration)
            } else for (s = 0, l = O.length; s < l && (e = O[s], n = t.duration(e), o = ce(this.duration, n), !(o >= S)); s++);
            this.labelInterval = n
        }
        return n
    },j.prototype.ensureSlotDuration = function () {
        var e, r, s, o, n, i, l, u;
        if (i = this.slotDuration, !i) {
            for (s = this.ensureLabelInterval(), r = 0, o = O.length; r < o; r++)if (e = O[r], u = t.duration(e), l = ce(s, u), He(l) && l > 1 && l <= w) {
                i = u;
                break
            }
            i && this.duration && (n = ce(this.duration, i), n > R && (i = null)), i || (i = s), this.slotDuration = i
        }
        return i
    },j.prototype.computeHeaderFormats = function () {
        var e, t, r, s, o, n, i, l;
        switch (i = this.view, s = this.duration, o = this.labelInterval, n = re(o), l = this.opt("weekNumbers"), e = t = r = null, "week" !== n || l || (n = "day"), n) {
            case"year":
                e = "YYYY";
                break;
            case"month":
                s.asYears() > 1 && (e = "YYYY"), t = "MMM";
                break;
            case"week":
                s.asYears() > 1 && (e = "YYYY"), t = this.opt("shortWeekFormat");
                break;
            case"day":
                s.asYears() > 1 ? e = this.opt("monthYearFormat") : s.asMonths() > 1 && (e = "MMMM"), l && (t = this.opt("weekFormat")), r = "dd D";
                break;
            case"hour":
                l && (e = this.opt("weekFormat")), s.asDays() > 1 && (t = this.opt("dayOfMonthFormat")), r = this.opt("smallTimeFormat");
                break;
            case"minute":
                o.asMinutes() / 60 >= w ? (e = this.opt("hourFormat"), t = "[:]mm") : e = this.opt("mediumTimeFormat");
                break;
            case"second":
                o.asSeconds() / 60 >= w ? (e = "LT", t = "[:]ss") : e = "LTS";
                break;
            case"millisecond":
                e = "LTS", t = "[.]SSS"
        }
        return [].concat(e || [], t || [], r || [])
    },d.views.timeline = {"class": Y, defaults: {eventResizableFromStart: !0}},d.views.timelineDay = {
        type: "timeline",
        duration: {days: 1}
    },d.views.timelineWeek = {type: "timeline", duration: {weeks: 1}},d.views.timelineMonth = {
        type: "timeline",
        duration: {months: 1}
    },d.views.timelineYear = {type: "timeline", duration: {years: 1}},M = function (t) {
        function r() {
            return r.__super__.constructor.apply(this, arguments)
        }

        return Ye(r, t), r.mixin(L), r.prototype.canRenderSpecificResources = !0, r.prototype.resourceGrid = null, r.prototype.tbodyHash = null, r.prototype.joiner = null, r.prototype.dividerEls = null, r.prototype.superHeaderText = null, r.prototype.isVGrouping = null, r.prototype.isHGrouping = null, r.prototype.groupSpecs = null, r.prototype.colSpecs = null, r.prototype.orderSpecs = null, r.prototype.rowHierarchy = null, r.prototype.resourceRowHash = null, r.prototype.nestingCnt = 0, r.prototype.isNesting = null, r.prototype.dividerWidth = null, r.prototype.initialize = function () {
            return r.__super__.initialize.apply(this, arguments), this.processResourceOptions(), this.resourceGrid = new U(this), this.rowHierarchy = new k(this), this.resourceRowHash = {}
        }, r.prototype.instantiateGrid = function () {
            return new W(this)
        }, r.prototype.processResourceOptions = function () {
            var e, t, r, s, o, n, i, l, u, h, c, a, p, d, f, g, y, v, R, w, m, S;
            for (e = this.opt("resourceColumns") || [], f = this.opt("resourceLabelText"), s = "Resources", S = null, e.length ? S = f : e.push({
                labelText: f || s,
                text: this.getResourceTextFunc()
            }), w = [], o = [], i = [], c = !1, h = !1, a = 0, g = e.length; a < g; a++)r = e[a], r.group ? o.push(r) : w.push(r);
            for (w[0].isMain = !0, o.length ? (i = o, c = !0) : (l = this.opt("resourceGroupField"), l && (h = !0, i.push({
                field: l,
                text: this.opt("resourceGroupText"),
                render: this.opt("resourceGroupRender")
            }))), t = ke(this.opt("resourceOrder")), m = [], p = 0, y = t.length; p < y; p++) {
                for (R = t[p], u = !1, d = 0, v = i.length; d < v; d++)if (n = i[d], n.field === R.field) {
                    n.order = R.order, u = !0;
                    break
                }
                u || m.push(R)
            }
            return this.superHeaderText = S, this.isVGrouping = c, this.isHGrouping = h, this.groupSpecs = i, this.colSpecs = o.concat(w), this.orderSpecs = m
        }, r.prototype.renderSkeleton = function () {
            return r.__super__.renderSkeleton.apply(this, arguments), this.renderResourceGridSkeleton(), this.tbodyHash = {
                spreadsheet: this.resourceGrid.tbodyEl,
                event: this.timeGrid.tbodyEl
            }, this.joiner = new A("vertical", [this.resourceGrid.bodyScroller, this.timeGrid.bodyScroller]), this.initDividerMoving()
        }, r.prototype.renderSkeletonHtml = function () {
            return '<table> <thead class="fc-head"> <tr> <td class="fc-resource-area ' + this.widgetHeaderClass + '"></td> <td class="fc-divider fc-col-resizer ' + this.widgetHeaderClass + '"></td> <td class="fc-time-area ' + this.widgetHeaderClass + '"></td> </tr> </thead> <tbody class="fc-body"> <tr> <td class="fc-resource-area ' + this.widgetContentClass + '"></td> <td class="fc-divider fc-col-resizer ' + this.widgetHeaderClass + '"></td> <td class="fc-time-area ' + this.widgetContentClass + '"></td> </tr> </tbody> </table>'
        }, r.prototype.renderResourceGridSkeleton = function () {
            return this.resourceGrid.el = this.el.find("tbody .fc-resource-area"), this.resourceGrid.headEl = this.el.find("thead .fc-resource-area"), this.resourceGrid.renderSkeleton()
        }, r.prototype.initDividerMoving = function () {
            var e;
            return this.dividerEls = this.el.find(".fc-divider"), this.dividerWidth = null != (e = this.opt("resourceAreaWidth")) ? e : this.resourceGrid.tableWidth, null != this.dividerWidth && this.positionDivider(this.dividerWidth), this.dividerEls.on("mousedown", function (e) {
                return function (t) {
                    return e.dividerMousedown(t)
                }
            }(this))
        }, r.prototype.dividerMousedown = function (e) {
            var t, r, s, o, n;
            return r = this.opt("isRTL"), o = 30, s = this.el.width() - 30, n = this.getNaturalDividerWidth(), t = new h({
                dragStart: function (e) {
                    return function () {
                        return e.dividerEls.addClass("fc-active")
                    }
                }(this), drag: function (e) {
                    return function (t, i) {
                        var l;
                        return l = r ? n - t : n + t, l = Math.max(l, o), l = Math.min(l, s), e.dividerWidth = l, e.positionDivider(l), e.updateWidth()
                    }
                }(this), dragEnd: function (e) {
                    return function () {
                        return e.dividerEls.removeClass("fc-active")
                    }
                }(this)
            }), t.startInteraction(e)
        }, r.prototype.getNaturalDividerWidth = function () {
            return this.el.find(".fc-resource-area").width()
        }, r.prototype.positionDivider = function (e) {
            return this.el.find(".fc-resource-area").width(e)
        }, r.prototype.renderEvents = function (e) {
            return this.timeGrid.renderEvents(e), this.syncRowHeights(), this.updateWidth()
        }, r.prototype.unrenderEvents = function () {
            return this.timeGrid.unrenderEvents(), this.syncRowHeights(), this.updateWidth()
        }, r.prototype.updateWidth = function () {
            if (r.__super__.updateWidth.apply(this, arguments), this.resourceGrid.updateWidth(), this.joiner.update(), this.cellFollower)return this.cellFollower.update()
        }, r.prototype.updateHeight = function (e) {
            if (r.__super__.updateHeight.apply(this, arguments), e)return this.syncRowHeights()
        }, r.prototype.setHeight = function (e, t) {
            var r, s;
            return s = this.syncHeadHeights(), r = t ? "auto" : e - s - this.queryMiscHeight(), this.timeGrid.bodyScroller.setHeight(r), this.resourceGrid.bodyScroller.setHeight(r)
        }, r.prototype.queryMiscHeight = function () {
            return this.el.outerHeight() - Math.max(this.resourceGrid.headScroller.el.outerHeight(), this.timeGrid.headScroller.el.outerHeight()) - Math.max(this.resourceGrid.bodyScroller.el.outerHeight(), this.timeGrid.bodyScroller.el.outerHeight())
        }, r.prototype.syncHeadHeights = function () {
            var e;
            return this.resourceGrid.headHeight("auto"), this.timeGrid.headHeight("auto"), e = Math.max(this.resourceGrid.headHeight(), this.timeGrid.headHeight()), this.resourceGrid.headHeight(e), this.timeGrid.headHeight(e), e
        }, r.prototype.renderResources = function (e) {
            var t, r, s;
            for (this.batchRows(), t = 0, r = e.length; t < r; t++)s = e[t], this.insertResource(s);
            return this.rowHierarchy.show(), this.unbatchRows(), this.reinitializeCellFollowers()
        }, r.prototype.unrenderResources = function () {
            return this.batchRows(), this.rowHierarchy.removeChildren(), this.unbatchRows(), this.reinitializeCellFollowers()
        }, r.prototype.renderResource = function (e) {
            return this.insertResource(e), this.reinitializeCellFollowers()
        }, r.prototype.unrenderResource = function (e) {
            var t;
            if (t = this.getResourceRow(e.id))return this.batchRows(), t.remove(), this.unbatchRows(), this.reinitializeCellFollowers()
        }, r.prototype.cellFollower = null, r.prototype.reinitializeCellFollowers = function () {
            var t, r, s, o, n, i;
            for (this.cellFollower && this.cellFollower.clearSprites(), this.cellFollower = new P(this.resourceGrid.bodyScroller, (!0)), this.cellFollower.isHFollowing = !1, this.cellFollower.isVFollowing = !0, o = [], n = this.rowHierarchy.getNodes(), r = 0, s = n.length; r < s; r++)i = n[r], i instanceof X && i.groupTd && (t = i.groupTd.find(".fc-cell-content"), t.length && o.push(t[0]));
            return this.cellFollower.setSprites(e(o))
        }, r.prototype.insertResource = function (e, t) {
            var r, s, o, n, i, l, u;
            for (u = new B(this, e), null == t && (n = e.parentId, n && (t = this.getResourceRow(n))), t ? this.insertRowAsChild(u, t) : this.insertRow(u), i = e.children, l = [], s = 0, o = i.length; s < o; s++)r = i[s], l.push(this.insertResource(r, u));
            return l
        }, r.prototype.insertRow = function (e, t, r) {
            var s;
            return null == t && (t = this.rowHierarchy), null == r && (r = this.groupSpecs), r.length ? (s = this.ensureResourceGroup(e, t, r[0]), s instanceof g ? this.insertRowAsChild(e, s) : this.insertRow(e, s, r.slice(1))) : this.insertRowAsChild(e, t)
        }, r.prototype.insertRowAsChild = function (e, t) {
            return t.addChild(e, this.computeChildRowPosition(e, t))
        }, r.prototype.computeChildRowPosition = function (e, t) {
            var r, s, o, n, i, l;
            if (this.orderSpecs.length)for (i = t.children, s = o = 0, n = i.length; o < n; s = ++o)if (l = i[s], r = this.compareResources(l.resource || {}, e.resource || {}), r > 0)return s;
            return null
        }, r.prototype.compareResources = function (e, t) {
            return te(e, t, this.orderSpecs)
        }, r.prototype.ensureResourceGroup = function (e, t, r) {
            var s, o, n, i, l, u, h, c, a, p, d;
            if (n = (e.resource || {})[r.field], o = null, r.order)for (a = t.children, i = l = 0, h = a.length; l < h; i = ++l) {
                if (d = a[i], s = de(d.groupValue, n) * r.order, 0 === s) {
                    o = d;
                    break
                }
                if (s > 0)break
            } else for (p = t.children, i = u = 0, c = p.length; u < c; i = ++u)if (d = p[i], d.groupValue === n) {
                o = d;
                break
            }
            return o || (o = this.isVGrouping ? new X(this, r, n) : new g(this, r, n), t.addChild(o, i)), o
        }, r.prototype.pairSegsWithRows = function (e) {
            var t, r, s, o, n, i, l, u;
            for (o = [], n = {}, t = 0, r = e.length; t < r; t++)u = e[t], i = u.resourceId, i && (l = this.getResourceRow(i), l && (s = n[i], s || (s = [l, []], o.push(s), n[i] = s), s[1].push(u)));
            return o
        }, r.prototype.rowAdded = function (e) {
            var t, r;
            return e instanceof B && (this.resourceRowHash[e.resource.id] = e, this.timeGrid.assignRowBusinessHourSegs(e)), r = this.isNesting, t = Boolean(this.nestingCnt += e.depth ? 1 : 0), r !== t && (this.el.toggleClass("fc-nested", t), this.el.toggleClass("fc-flat", !t)), this.isNesting = t
        }, r.prototype.rowRemoved = function (e) {
            var t, r;
            return e instanceof B && (delete this.resourceRowHash[e.resource.id], this.timeGrid.destroyRowBusinessHourSegs(e)), r = this.isNesting, t = Boolean(this.nestingCnt -= e.depth ? 1 : 0), r !== t && (this.el.toggleClass("fc-nested", t), this.el.toggleClass("fc-flat", !t)), this.isNesting = t
        }, r.prototype.batchRowDepth = 0, r.prototype.shownRowBatch = null, r.prototype.hiddenRowBatch = null, r.prototype.batchRows = function () {
            if (!this.batchRowDepth++)return this.shownRowBatch = [], this.hiddenRowBatch = []
        }, r.prototype.unbatchRows = function () {
            if (!--this.batchRowDepth)return this.hiddenRowBatch.length && this.rowsHidden(this.hiddenRowBatch), this.shownRowBatch.length && this.rowsShown(this.shownRowBatch), this.hiddenRowBatch = null, this.shownRowBatch = null
        }, r.prototype.rowShown = function (e) {
            return this.shownRowBatch ? this.shownRowBatch.push(e) : this.rowsShown([e])
        }, r.prototype.rowHidden = function (e) {
            return this.hiddenRowBatch ? this.hiddenRowBatch.push(e) : this.rowsHidden([e])
        }, r.prototype.rowsShown = function (e) {
            return this.syncRowHeights(e), this.updateWidth()
        }, r.prototype.rowsHidden = function (e) {
            return this.updateWidth()
        }, r.prototype.syncRowHeights = function (e, t) {
            var r, s, o, n, i, l, u, h, c, a;
            for (null == t && (t = !1), null == e && (e = this.getVisibleRows()), l = 0, h = e.length; l < h; l++)a = e[l], a.setTrInnerHeight("");
            for (i = function () {
                var s, o, n;
                for (n = [], s = 0, o = e.length; s < o; s++)a = e[s], r = a.getMaxTrInnerHeight(), t && (r += r % 2), n.push(r);
                return n
            }(), n = u = 0, c = e.length; u < c; n = ++u)a = e[n], a.setTrInnerHeight(i[n]);
            if (!t && (s = this.resourceGrid.tbodyEl.height(), o = this.timeGrid.tbodyEl.height(), Math.abs(s - o) > 1))return this.syncRowHeights(e, !0)
        }, r.prototype.getVisibleRows = function () {
            var e, t, r, s, o;
            for (r = this.rowHierarchy.getRows(), s = [], e = 0, t = r.length; e < t; e++)o = r[e], o.isShown && s.push(o);
            return s
        }, r.prototype.getEventRows = function () {
            var e, t, r, s, o;
            for (r = this.rowHierarchy.getRows(), s = [], e = 0, t = r.length; e < t; e++)o = r[e], o instanceof p && s.push(o);
            return s
        }, r.prototype.getResourceRow = function (e) {
            return this.resourceRowHash[e]
        }, r.prototype.queryScroll = function () {
            var e, t, s, o, n, i, l, u;
            for (l = r.__super__.queryScroll.apply(this, arguments), u = this.timeGrid.bodyScroller.scrollEl.offset().top, n = this.getVisibleRows(), s = 0, o = n.length; s < o; s++)if (i = n[s], i.resource && (e = i.getTr("event"), t = e.offset().top + e.outerHeight(), t > u)) {
                l.resourceId = i.resource.id, l.bottom = t - u;
                break
            }
            return l
        }, r.prototype.setScroll = function (e) {
            var t, s, o, n;
            return e.resourceId && (n = this.getResourceRow(e.resourceId), n && (t = n.getTr("event"), t && (o = this.timeGrid.bodyScroller.canvas.el.offset().top, s = t.offset().top + t.outerHeight(), e.top = s - e.bottom - o))), r.__super__.setScroll.call(this, e), this.resourceGrid.bodyScroller.setScrollTop(e.top)
        }, r.prototype.scrollToResource = function (e) {
            var t, r, s, o;
            if (s = this.getResourceRow(e.id), s && (t = s.getTr("event")))return r = this.timeGrid.bodyScroller.canvas.el.offset().top, o = t.offset().top - r, this.timeGrid.bodyScroller.setScrollTop(o), this.resourceGrid.bodyScroller.setScrollTop(o)
        }, r
    }(Y),W = function (t) {
        function r() {
            return r.__super__.constructor.apply(this, arguments)
        }

        return Ye(r, t), r.mixin(D), r.prototype.eventRows = null, r.prototype.shownEventRows = null, r.prototype.tbodyEl = null, r.prototype.rowCoordCache = null, r.prototype.spanToSegs = function (e) {
            var t, s, o, n, i, l;
            if (l = r.__super__.spanToSegs.apply(this, arguments), t = this.view.calendar, n = e.resourceId)for (s = 0, o = l.length; s < o; s++)i = l[s], i.resource = t.getResourceById(n), i.resourceId = n;
            return l
        }, r.prototype.prepareHits = function () {
            var e, t;
            return r.__super__.prepareHits.apply(this, arguments), this.eventRows = this.view.getEventRows(), this.shownEventRows = function () {
                var t, r, s, o;
                for (s = this.eventRows, o = [], t = 0, r = s.length; t < r; t++)e = s[t], e.isShown && o.push(e);
                return o
            }.call(this), t = function () {
                var t, r, s, o;
                for (s = this.shownEventRows, o = [], t = 0, r = s.length; t < r; t++)e = s[t], o.push(e.getTr("event")[0]);
                return o
            }.call(this), this.rowCoordCache = new l({els: t, isVertical: !0}), this.rowCoordCache.build()
        }, r.prototype.releaseHits = function () {
            return r.__super__.releaseHits.apply(this, arguments), this.eventRows = null, this.shownEventRows = null, this.rowCoordCache.clear()
        }, r.prototype.queryHit = function (e, t) {
            var s, o;
            if (o = r.__super__.queryHit.apply(this, arguments), o && (s = this.rowCoordCache.getVerticalIndex(t), null != s))return {
                resourceId: this.shownEventRows[s].resource.id,
                snap: o.snap,
                component: this,
                left: o.left,
                right: o.right,
                top: this.rowCoordCache.getTopOffset(s),
                bottom: this.rowCoordCache.getBottomOffset(s)
            }
        }, r.prototype.getHitSpan = function (e) {
            var t;
            return t = this.getSnapRange(e.snap), t.resourceId = e.resourceId, t
        }, r.prototype.getHitEl = function (e) {
            return this.getSnapEl(e.snap)
        }, r.prototype.renderSkeleton = function () {
            var t;
            return r.__super__.renderSkeleton.apply(this, arguments), this.segContainerEl.remove(), this.segContainerEl = null, t = e('<div class="fc-rows"><table><tbody/></table></div>').appendTo(this.bodyScroller.canvas.contentEl), this.tbodyEl = t.find("tbody")
        }, r.prototype.renderFgSegs = function (e) {
            var t, r, s, o, n, i, l;
            for (e = this.renderFgSegEls(e), i = this.view.pairSegsWithRows(e), l = [], s = 0, o = i.length; s < o; s++)n = i[s], t = n[0], r = n[1], t.fgSegs = r, t.isShown && (t.isSegsRendered = !0, l.push(n));
            return this.renderFgSegsInContainers(l), this.updateSegFollowers(e), e
        }, r.prototype.unrenderFgSegs = function () {
            var e, t, r, s;
            for (this.clearSegFollowers(), t = this.view.getEventRows(), r = 0, s = t.length; r < s; r++)e = t[r], e.fgSegs = null, e.isSegsRendered = !1;
            return this.unrenderFgContainers(t)
        }, r.prototype.rowCntWithCustomBusinessHours = 0, r.prototype.renderBusinessHours = function () {
            return this.rowCntWithCustomBusinessHours ? this.ensureIndividualBusinessHours() : r.__super__.renderBusinessHours.apply(this, arguments)
        }, r.prototype.unrenderBusinessHours = function () {
            return this.rowCntWithCustomBusinessHours ? this.clearIndividualBusinessHours() : r.__super__.unrenderBusinessHours.apply(this, arguments)
        }, r.prototype.ensureIndividualBusinessHours = function () {
            var e, t, r, s, o;
            for (r = this.view.getEventRows(), s = [], e = 0, t = r.length; e < t; e++)o = r[e], this.view.isDateSet && !o.businessHourSegs && this.populateRowBusinessHoursSegs(o), o.isShown ? s.push(o.ensureBusinessHourSegsRendered()) : s.push(void 0);
            return s
        }, r.prototype.clearIndividualBusinessHours = function () {
            var e, t, r, s, o;
            for (r = this.view.getEventRows(), s = [], e = 0, t = r.length; e < t; e++)o = r[e], s.push(o.clearBusinessHourSegs());
            return s
        }, r.prototype.assignRowBusinessHourSegs = function (e) {
            if (e.resource.businessHours && (this.rowCntWithCustomBusinessHours || (j.prototype.unrenderBusinessHours.call(this), this.ensureIndividualBusinessHours()), this.rowCntWithCustomBusinessHours += 1), this.view.isDateSet && this.rowCntWithCustomBusinessHours)return this.populateRowBusinessHoursSegs(e)
        }, r.prototype.destroyRowBusinessHourSegs = function (e) {
            if (e.clearBusinessHourSegs(), e.resource.businessHours && (this.rowCntWithCustomBusinessHours -= 1, !this.rowCntWithCustomBusinessHours))return this.clearIndividualBusinessHours(), j.prototype.renderBusinessHours.call(this)
        }, r.prototype.populateRowBusinessHoursSegs = function (e) {
            var t, r, s;
            r = e.resource.businessHours || this.view.opt("businessHours"), s = this.view.calendar.computeBusinessHourEvents(!this.isTimeScale, r), t = this.eventsToSegs(s), t = this.renderFillSegEls("businessHours", t), e.businessHourSegs = t
        }, r.prototype.renderFill = function (e, t, r) {
            var s, o, n, i, l, u, h, c, a, p, d, f;
            for (t = this.renderFillSegEls(e, t), c = [], l = [], s = 0, n = t.length; s < n; s++)d = t[s], d.resourceId ? c.push(d) : l.push(d);
            for (h = this.view.pairSegsWithRows(c), f = [], o = 0, i = h.length; o < i; o++)u = h[o], a = u[0], p = u[1], "bgEvent" === e && (a.bgSegs = p), a.isShown && f.push(u);
            return l.length && f.unshift([this, l]), this.renderFillInContainers(e, f, r), t
        }, r.prototype.renderHelper = function (e, t) {
            var r, s;
            return s = this.eventToSegs(e), s = this.renderFgSegEls(s), r = this.view.pairSegsWithRows(s), this.renderHelperSegsInContainers(r, t)
        }, r
    }(j),r = 30,U = function () {
        function t(e) {
            var t;
            this.view = e, this.isRTL = this.view.opt("isRTL"), this.givenColWidths = this.colWidths = function () {
                var e, r, s, o;
                for (s = this.view.colSpecs, o = [], e = 0, r = s.length; e < r; e++)t = s[e], o.push(t.width);
                return o
            }.call(this)
        }

        return t.prototype.view = null, t.prototype.headEl = null, t.prototype.el = null, t.prototype.tbodyEl = null, t.prototype.headScroller = null, t.prototype.bodyScroller = null, t.prototype.joiner = null, t.prototype.colGroupHtml = "", t.prototype.headTable = null, t.prototype.headColEls = null, t.prototype.headCellEls = null, t.prototype.bodyColEls = null, t.prototype.bodyTable = null, t.prototype.renderSkeleton = function () {
            return this.headScroller = new i({
                overflowX: "clipped-scroll",
                overflowY: "hidden"
            }), this.headScroller.canvas = new N, this.headScroller.render(), this.headScroller.canvas.contentEl.html(this.renderHeadHtml()), this.headEl.append(this.headScroller.el), this.bodyScroller = new i({overflowY: "clipped-scroll"}), this.bodyScroller.canvas = new N, this.bodyScroller.render(), this.bodyScroller.canvas.contentEl.html('<div class="fc-rows"><table>' + this.colGroupHtml + "<tbody/></table></div>"), this.tbodyEl = this.bodyScroller.canvas.contentEl.find("tbody"), this.el.append(this.bodyScroller.el), this.joiner = new A("horizontal", [this.headScroller, this.bodyScroller]), this.headTable = this.headEl.find("table"), this.headColEls = this.headEl.find("col"), this.headCellEls = this.headScroller.canvas.contentEl.find("tr:last-child th"), this.bodyColEls = this.el.find("col"), this.bodyTable = this.el.find("table"), this.colMinWidths = this.computeColMinWidths(), this.applyColWidths(), this.initColResizing()
        }, t.prototype.renderHeadHtml = function () {
            var e, t, r, s, o, n, i, l, u, h, c;
            for (t = this.view.colSpecs, r = "<table>", e = "<colgroup>", i = 0, u = t.length; i < u; i++)c = t[i], e += c.isMain ? '<col class="fc-main-col"/>' : "<col/>";
            for (e += "</colgroup>", this.colGroupHtml = e, r += e, r += "<tbody>", this.view.superHeaderText && (r += '<tr class="fc-super"><th class="' + this.view.widgetHeaderClass + '" colspan="' + t.length + '"><div class="fc-cell-content"><span class="fc-cell-text">' + Se(this.view.superHeaderText) + "</span></div></th></tr>"), r += "<tr>", n = !0, s = l = 0, h = t.length; l < h; s = ++l)c = t[s], o = s === t.length - 1, r += '<th class="' + this.view.widgetHeaderClass + '"><div><div class="fc-cell-content">' + (c.isMain ? '<span class="fc-expander-space"><span class="fc-icon"></span></span>' : "") + '<span class="fc-cell-text">' + Se(c.labelText || "") + "</span></div>" + (o ? "" : '<div class="fc-col-resizer"></div>') + "</div></th>";
            return r += "</tr>", r += "</tbody></table>"
        }, t.prototype.givenColWidths = null, t.prototype.colWidths = null, t.prototype.colMinWidths = null, t.prototype.tableWidth = null, t.prototype.tableMinWidth = null, t.prototype.initColResizing = function () {
            return this.headEl.find("th .fc-col-resizer").each(function (t) {
                return function (r, s) {
                    return s = e(s), s.on("mousedown", function (e) {
                        return t.colResizeMousedown(r, e, s)
                    })
                }
            }(this))
        }, t.prototype.colResizeMousedown = function (e, t, s) {
            var o, n, i, l;
            return o = this.colWidths = this.queryColWidths(), o.pop(), o.push(null), l = o[e], i = Math.min(this.colMinWidths[e], r), n = new h({
                dragStart: function (e) {
                    return function () {
                        return s.addClass("fc-active")
                    }
                }(this), drag: function (t) {
                    return function (r, s) {
                        var n;
                        return n = l + (t.isRTL ? -r : r), n = Math.max(n, i), o[e] = n, t.applyColWidths()
                    }
                }(this), dragEnd: function (e) {
                    return function () {
                        return s.removeClass("fc-active")
                    }
                }(this)
            }), n.startInteraction(t)
        }, t.prototype.applyColWidths = function () {
            var e, t, r, s, o, n, i, l, u, h, c, a, p, d, f, g, y;
            for (r = this.colMinWidths, o = this.colWidths, e = !0, t = !1, y = 0, h = 0, p = o.length; h < p; h++)s = o[h], "number" == typeof s ? y += s : (e = !1, s && (t = !0));
            for (l = t && !this.view.isHGrouping ? "auto" : "", i = function () {
                var e, t, r;
                for (r = [], u = e = 0, t = o.length; e < t; u = ++e)s = o[u], r.push(null != s ? s : l);
                return r
            }(), g = 0, u = c = 0, d = i.length; c < d; u = ++c)n = i[u], g += "number" == typeof n ? n : r[u];
            for (u = a = 0, f = i.length; a < f; u = ++a)n = i[u], this.headColEls.eq(u).width(n), this.bodyColEls.eq(u).width(n);
            return this.headScroller.canvas.setMinWidth(g), this.bodyScroller.canvas.setMinWidth(g), this.tableMinWidth = g, this.tableWidth = e ? y : void 0
        }, t.prototype.computeColMinWidths = function () {
            var e, t, s, o, n, i;
            for (o = this.givenColWidths, n = [], e = t = 0, s = o.length; t < s; e = ++t)i = o[e], "number" == typeof i ? n.push(i) : n.push(parseInt(this.headColEls.eq(e).css("min-width")) || r);
            return n
        }, t.prototype.queryColWidths = function () {
            var t, r, s, o, n;
            for (o = this.headCellEls, n = [], t = 0, r = o.length; t < r; t++)s = o[t], n.push(e(s).outerWidth());
            return n
        }, t.prototype.updateWidth = function () {
            if (this.headScroller.updateSize(), this.bodyScroller.updateSize(), this.joiner.update(), this.follower)return this.follower.update()
        }, t.prototype.headHeight = function () {
            var e;
            return e = this.headScroller.canvas.contentEl.find("table"), e.height.apply(e, arguments)
        }, t
    }(),k = function () {
        function t(t) {
            this.view = t, this.children = [], this.trHash = {}, this.trs = e()
        }

        return t.prototype.view = null, t.prototype.parent = null, t.prototype.prevSibling = null, t.prototype.children = null, t.prototype.depth = 0, t.prototype.hasOwnRow = !1, t.prototype.trHash = null, t.prototype.trs = null, t.prototype.isRendered = !1, t.prototype.isExpanded = !0, t.prototype.isShown = !1, t.prototype.addChild = function (e, t) {
            var r, s, o, n, i;
            for (e.remove(), r = this.children, null != t ? r.splice(t, 0, e) : (t = r.length, r.push(e)), e.prevSibling = t > 0 ? r[t - 1] : null, t < r.length - 1 && (r[t + 1].prevSibling = e), e.parent = this, e.depth = this.depth + (this.hasOwnRow ? 1 : 0), i = e.getNodes(), s = 0, o = i.length; s < o; s++)n = i[s], n.added();
            if (this.isShown && this.isExpanded)return e.show()
        }, t.prototype.removeChild = function (e) {
            var t, r, s, o, n, i, l, u, h, c;
            for (t = this.children, s = !1, r = o = 0, i = t.length; o < i; r = ++o)if (c = t[r], c === e) {
                s = !0;
                break
            }
            if (s) {
                for (r < t.length - 1 && (t[r + 1].prevSibling = e.prevSibling), t.splice(r, 1), e.recursivelyUnrender(), u = e.getNodes(), n = 0, l = u.length; n < l; n++)h = u[n], h.removed();
                return e.parent = null, e.prevSibling = null, e
            }
            return !1
        }, t.prototype.removeChildren = function () {
            var e, t, r, s, o, n, i;
            for (n = this.children, t = 0, s = n.length; t < s; t++)e = n[t], e.recursivelyUnrender();
            for (i = this.getDescendants(), r = 0, o = i.length; r < o; r++)e = i[r], e.removed();
            return this.children = []
        }, t.prototype.remove = function () {
            if (this.parent)return this.parent.removeChild(this)
        }, t.prototype.getLastChild = function () {
            var e;
            return e = this.children, e[e.length - 1]
        }, t.prototype.getPrevRow = function () {
            var e, t;
            for (t = this; t;) {
                if (t.prevSibling)for (t = t.prevSibling; e = t.getLastChild();)t = e; else t = t.parent;
                if (t && t.hasOwnRow && t.isShown)return t
            }
            return null
        }, t.prototype.getLeadingRow = function () {
            return this.hasOwnRow ? this : this.isExpanded && this.children.length ? this.children[0].getLeadingRow() : void 0
        }, t.prototype.getRows = function (e) {
            var t, r, s, o;
            for (null == e && (e = []), this.hasOwnRow && e.push(this), o = this.children, r = 0, s = o.length; r < s; r++)t = o[r], t.getRows(e);
            return e
        }, t.prototype.getNodes = function (e) {
            var t, r, s, o;
            for (null == e && (e = []), e.push(this), o = this.children, r = 0, s = o.length; r < s; r++)t = o[r], t.getNodes(e);
            return e
        }, t.prototype.getDescendants = function () {
            var e, t, r, s, o;
            for (e = [], o = this.children, r = 0, s = o.length; r < s; r++)t = o[r], t.getNodes(e);
            return e
        }, t.prototype.render = function () {
            var t, r, s, o, n, i, l;
            if (this.trHash = {}, i = [], this.hasOwnRow) {
                t = this.getPrevRow(), r = this.view.tbodyHash;
                for (l in r)o = r[l], n = e("<tr/>"), this.trHash[l] = n, i.push(n[0]), s = "render" + ee(l) + "Content", this[s] && this[s](n), t ? t.trHash[l].after(n) : o.prepend(n)
            }
            return this.trs = e(i).on("click", ".fc-expander", Pe(this, "toggleExpanded")), this.isRendered = !0
        }, t.prototype.unrender = function () {
            var t, r, s, o;
            if (this.isRendered) {
                t = this.trHash;
                for (s in t)r = t[s], o = "unrender" + ee(s) + "Content", this[o] && this[o](r);
                return this.trHash = {}, this.trs.remove(), this.trs = e(), this.isRendered = !1, this.isShown = !1, this.hidden()
            }
        }, t.prototype.recursivelyUnrender = function () {
            var e, t, r, s, o;
            for (this.unrender(), s = this.children, o = [], t = 0, r = s.length; t < r; t++)e = s[t], o.push(e.recursivelyUnrender());
            return o
        }, t.prototype.getTr = function (e) {
            return this.trHash[e]
        }, t.prototype.show = function () {
            var e, t, r, s, o;
            if (!this.isShown && (this.isRendered ? this.trs.css("display", "") : this.render(), this.ensureSegsRendered && this.ensureSegsRendered(), this.isExpanded ? this.indicateExpanded() : this.indicateCollapsed(), this.isShown = !0, this.shown(), this.isExpanded)) {
                for (s = this.children, o = [], t = 0, r = s.length; t < r; t++)e = s[t], o.push(e.show());
                return o
            }
        }, t.prototype.hide = function () {
            var e, t, r, s, o;
            if (this.isShown && (this.isRendered && this.trs.hide(), this.isShown = !1, this.hidden(), this.isExpanded)) {
                for (s = this.children, o = [], t = 0, r = s.length; t < r; t++)e = s[t], o.push(e.hide());
                return o
            }
        }, t.prototype.expand = function () {
            var e, t, r, s;
            if (!this.isExpanded) {
                for (this.isExpanded = !0, this.indicateExpanded(), this.view.batchRows(), s = this.children, t = 0, r = s.length; t < r; t++)e = s[t], e.show();
                return this.view.unbatchRows(), this.animateExpand()
            }
        }, t.prototype.collapse = function () {
            var e, t, r, s;
            if (this.isExpanded) {
                for (this.isExpanded = !1, this.indicateCollapsed(), this.view.batchRows(), s = this.children, t = 0, r = s.length; t < r; t++)e = s[t], e.hide();
                return this.view.unbatchRows()
            }
        }, t.prototype.toggleExpanded = function () {
            return this.isExpanded ? this.collapse() : this.expand()
        }, t.prototype.indicateExpanded = function () {
            return this.trs.find(".fc-expander .fc-icon").removeClass(this.getCollapsedIcon()).addClass(this.getExpandedIcon())
        }, t.prototype.indicateCollapsed = function () {
            return this.trs.find(".fc-expander .fc-icon").removeClass(this.getExpandedIcon()).addClass(this.getCollapsedIcon())
        }, t.prototype.enableExpanding = function () {
            return this.trs.find(".fc-expander-space").addClass("fc-expander")
        }, t.prototype.disableExpanding = function () {
            return this.trs.find(".fc-expander-space").removeClass("fc-expander").find(".fc-icon").removeClass(this.getExpandedIcon()).removeClass(this.getCollapsedIcon())
        }, t.prototype.getExpandedIcon = function () {
            return "fc-icon-down-triangle"
        }, t.prototype.getCollapsedIcon = function () {
            var e;
            return e = this.view.isRTL ? "left" : "right", "fc-icon-" + e + "-triangle"
        }, t.prototype.animateExpand = function () {
            var e, t, r;
            if (r = null != (e = this.children[0]) && null != (t = e.getLeadingRow()) ? t.trs : void 0)return r.addClass("fc-collapsed"), setTimeout(function () {
                return r.addClass("fc-transitioning"), r.removeClass("fc-collapsed")
            }), r.one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend", function () {
                return r.removeClass("fc-transitioning")
            })
        }, t.prototype.getMaxTrInnerHeight = function () {
            var t;
            return t = 0, e.each(this.trHash, function (e) {
                return function (e, r) {
                    var s;
                    return s = ye(r).find("> div:not(.fc-cell-content):first"), t = Math.max(s.height(), t)
                }
            }(this)), t
        }, t.prototype.setTrInnerHeight = function (t) {
            return e.each(this.trHash, function (e) {
                return function (e, r) {
                    return ye(r).find("> div:not(.fc-cell-content):first").height(t)
                }
            }(this))
        }, t.prototype.shown = function () {
            if (this.hasOwnRow)return this.rowShown(this)
        }, t.prototype.hidden = function () {
            if (this.hasOwnRow)return this.rowHidden(this)
        }, t.prototype.rowShown = function (e) {
            return (this.parent || this.view).rowShown(e)
        }, t.prototype.rowHidden = function (e) {
            return (this.parent || this.view).rowHidden(e)
        }, t.prototype.added = function () {
            if (this.hasOwnRow)return this.rowAdded(this)
        }, t.prototype.removed = function () {
            if (this.hasOwnRow)return this.rowRemoved(this)
        }, t.prototype.rowAdded = function (e) {
            return (this.parent || this.view).rowAdded(e)
        }, t.prototype.rowRemoved = function (e) {
            return (this.parent || this.view).rowRemoved(e)
        }, t
    }(),z = function (t) {
        function r(e, t, s) {
            this.groupSpec = t, this.groupValue = s, r.__super__.constructor.apply(this, arguments)
        }

        return Ye(r, t), r.prototype.groupSpec = null, r.prototype.groupValue = null, r.prototype.rowRemoved = function (e) {
            if (r.__super__.rowRemoved.apply(this, arguments), e !== this && !this.children.length)return this.remove()
        }, r.prototype.renderGroupContentEl = function () {
            var t, r;
            return t = e('<div class="fc-cell-content" />').append(this.renderGroupTextEl()), r = this.groupSpec.render, "function" == typeof r && (t = r(t, this.groupValue) || t), t
        }, r.prototype.renderGroupTextEl = function () {
            var t, r;
            return r = this.groupValue || "",
                t = this.groupSpec.text, "function" == typeof t && (r = t(r) || r), e('<span class="fc-cell-text" />').text(r)
        }, r
    }(k),g = function (t) {
        function r() {
            return r.__super__.constructor.apply(this, arguments)
        }

        return Ye(r, t), r.prototype.hasOwnRow = !0, r.prototype.renderSpreadsheetContent = function (t) {
            var r;
            return r = this.renderGroupContentEl(), r.prepend('<span class="fc-expander"><span class="fc-icon"></span></span>'), e('<td class="fc-divider" />').attr("colspan", this.view.colSpecs.length).append(e("<div/>").append(r)).appendTo(t)
        }, r.prototype.renderEventContent = function (e) {
            return e.append('<td class="fc-divider"> <div/> </td>')
        }, r
    }(z),X = function (t) {
        function r() {
            return r.__super__.constructor.apply(this, arguments)
        }

        return Ye(r, t), r.prototype.rowspan = 0, r.prototype.leadingTr = null, r.prototype.groupTd = null, r.prototype.rowShown = function (e) {
            return this.rowspan += 1, this.renderRowspan(), r.__super__.rowShown.apply(this, arguments)
        }, r.prototype.rowHidden = function (e) {
            return this.rowspan -= 1, this.renderRowspan(), r.__super__.rowHidden.apply(this, arguments)
        }, r.prototype.renderRowspan = function () {
            var t;
            return this.rowspan ? (this.groupTd || (this.groupTd = e('<td class="' + this.view.widgetContentClass + '"/>').append(this.renderGroupContentEl())), this.groupTd.attr("rowspan", this.rowspan), t = this.getLeadingRow().getTr("spreadsheet"), t !== this.leadingTr ? (t && t.prepend(this.groupTd), this.leadingTr = t) : void 0) : (this.groupTd && (this.groupTd.remove(), this.groupTd = null), this.leadingTr = null)
        }, r
    }(z),p = function (e) {
        function t() {
            return t.__super__.constructor.apply(this, arguments)
        }

        return Ye(t, e), t.prototype.hasOwnRow = !0, t.prototype.segContainerEl = null, t.prototype.segContainerHeight = null, t.prototype.innerEl = null, t.prototype.bgSegContainerEl = null, t.prototype.isSegsRendered = !1, t.prototype.isBusinessHourSegsRendered = !1, t.prototype.businessHourSegs = null, t.prototype.bgSegs = null, t.prototype.fgSegs = null, t.prototype.renderEventContent = function (e) {
            return e.html('<td class="' + this.view.widgetContentClass + '"> <div> <div class="fc-event-container" /> </div> </td>'), this.segContainerEl = e.find(".fc-event-container"), this.innerEl = this.bgSegContainerEl = e.find("td > div"), this.ensureSegsRendered()
        }, t.prototype.ensureSegsRendered = function () {
            if (!this.isSegsRendered)return this.ensureBusinessHourSegsRendered(), this.bgSegs && this.view.timeGrid.renderFillInContainer("bgEvent", this, this.bgSegs), this.fgSegs && this.view.timeGrid.renderFgSegsInContainers([[this, this.fgSegs]]), this.isSegsRendered = !0
        }, t.prototype.ensureBusinessHourSegsRendered = function () {
            if (this.businessHourSegs && !this.isBusinessHourSegsRendered)return this.view.timeGrid.renderFillInContainer("businessHours", this, this.businessHourSegs, "bgevent"), this.isBusinessHourSegsRendered = !0
        }, t.prototype.unrenderEventContent = function () {
            return this.clearBusinessHourSegs(), this.bgSegs = null, this.fgSegs = null, this.isSegsRendered = !1
        }, t.prototype.clearBusinessHourSegs = function () {
            var e, t, r, s;
            if (this.businessHourSegs) {
                for (r = this.businessHourSegs, e = 0, t = r.length; e < t; e++)s = r[e], s.el && s.el.remove();
                this.businessHourSegs = null
            }
            return this.isBusinessHourSegsRendered = !1
        }, t
    }(k),B = function (t) {
        function r(e, t) {
            this.resource = t, r.__super__.constructor.apply(this, arguments)
        }

        return Ye(r, t), r.prototype.resource = null, r.prototype.rowAdded = function (e) {
            if (r.__super__.rowAdded.apply(this, arguments), e !== this && this.isRendered && 1 === this.children.length)return this.enableExpanding(), this.isExpanded ? this.indicateExpanded() : this.indicateCollapsed()
        }, r.prototype.rowRemoved = function (e) {
            if (r.__super__.rowRemoved.apply(this, arguments), e !== this && this.isRendered && !this.children.length)return this.disableExpanding()
        }, r.prototype.render = function () {
            return r.__super__.render.apply(this, arguments), this.children.length > 0 ? this.enableExpanding() : this.disableExpanding(), this.view.publiclyTrigger("resourceRender", this.resource, this.resource, this.getTr("spreadsheet").find("> td"), this.getTr("event").find("> td"))
        }, r.prototype.renderEventContent = function (e) {
            return r.__super__.renderEventContent.apply(this, arguments), e.attr("data-resource-id", this.resource.id)
        }, r.prototype.renderSpreadsheetContent = function (t) {
            var r, s, o, n, i, l, u, h, c;
            for (u = this.resource, l = this.view.colSpecs, n = 0, i = l.length; n < i; n++)r = l[n], r.group || (o = r.field ? u[r.field] || null : u, c = "function" == typeof r.text ? r.text(u, o) : o, s = e('<div class="fc-cell-content">' + (r.isMain ? this.renderGutterHtml() : "") + '<span class="fc-cell-text">' + (c ? Se(c) : "&nbsp;") + "</span></div>"), "function" == typeof r.render && (s = r.render(u, s, o) || s), h = e('<td class="' + this.view.widgetContentClass + '"/>').append(s), r.isMain && h.wrapInner("<div/>"), t.append(h));
            return t.attr("data-resource-id", u.id)
        }, r.prototype.renderGutterHtml = function () {
            var e, t, r, s;
            for (e = "", t = r = 0, s = this.depth; r < s; t = r += 1)e += '<span class="fc-icon"/>';
            return e += '<span class="fc-expander-space"><span class="fc-icon"></span></span>'
        }, r
    }(p),d.views.timeline.resourceClass = M,H = function (e) {
        function t() {
            return t.__super__.constructor.apply(this, arguments)
        }

        return Ye(t, e), t.mixin($), t.prototype.timeGridClass = F, t.prototype.dayGridClass = _, t.prototype.renderHead = function () {
            return t.__super__.renderHead.apply(this, arguments), this.timeGrid.processHeadResourceEls(this.headContainerEl)
        }, t.prototype.setResourcesOnGrids = function (e) {
            if (this.timeGrid.setResources(e), this.dayGrid)return this.dayGrid.setResources(e)
        }, t.prototype.unsetResourcesOnGrids = function () {
            if (this.timeGrid.unsetResources(), this.dayGrid)return this.dayGrid.unsetResources()
        }, t
    }(d.AgendaView),d.views.agenda.queryResourceClass = function (e) {
        var t;
        if (null != (t = e.options.groupByResource || e.options.groupByDateAndResource) ? t : 1 === e.duration.as("days"))return H
    },T = function (e) {
        function t() {
            return t.__super__.constructor.apply(this, arguments)
        }

        return Ye(t, e), t.mixin($), t.prototype.dayGridClass = _, t.prototype.renderHead = function () {
            return t.__super__.renderHead.apply(this, arguments), this.dayGrid.processHeadResourceEls(this.headContainerEl)
        }, t.prototype.setResourcesOnGrids = function (e) {
            return this.dayGrid.setResources(e)
        }, t.prototype.unsetResourcesOnGrids = function () {
            return this.dayGrid.unsetResources()
        }, t
    }(d.BasicView),G = function (e) {
        function t() {
            return t.__super__.constructor.apply(this, arguments)
        }

        return Ye(t, e), t.mixin($), t.prototype.dayGridClass = _, t.prototype.renderHead = function () {
            return t.__super__.renderHead.apply(this, arguments), this.dayGrid.processHeadResourceEls(this.headContainerEl)
        }, t.prototype.setResourcesOnGrids = function (e) {
            return this.dayGrid.setResources(e)
        }, t.prototype.unsetResourcesOnGrids = function () {
            return this.dayGrid.unsetResources()
        }, t
    }(d.MonthView),d.views.basic.queryResourceClass = function (e) {
        var t;
        if (null != (t = e.options.groupByResource || e.options.groupByDateAndResource) ? t : 1 === e.duration.as("days"))return T
    },d.views.month.queryResourceClass = function (e) {
        if (e.options.groupByResource || e.options.groupByDateAndResource)return G
    },E = "2017-02-14",Q = {
        years: 1,
        weeks: 1
    },y = "http://fullcalendar.io/scheduler/license/",b = ["GPL-My-Project-Is-Open-Source", "CC-Attribution-NonCommercial-NoDerivatives"],Oe = function (e, t) {
        if (!Ee(window.location.href) && !Te(e) && !he(t))return qe('Please use a valid license key. <a href="' + y + '">More Info</a>', t)
    },Te = function (r) {
        var s, o, n, i;
        return e.inArray(r, b) !== -1 || (o = (r || "").match(/^(\d+)\-fcs\-(\d+)$/), !!(o && 10 === o[1].length && (n = t.utc(1e3 * parseInt(o[2])), i = t.utc(d.mockSchedulerReleaseDate || E), i.isValid() && (s = i.clone().subtract(Q), n.isAfter(s)))))
    },Ee = function (e) {
        return Boolean(e.match(/\w+\:\/\/fullcalendar\.io\/|\/demos\/[\w-]+\.html$/))
    },qe = function (t, r) {
        return r.append(e('<div class="fc-license-message" />').html(t))
    },void(he = function (e) {
        return e.find(".fc-license-message").length >= 1
    }))
});