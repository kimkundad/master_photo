/* JavaScript autocomplete widget, version 1.6.2. For details, see http://createwebapp.com  */
//(function(){var ua = navigator.userAgent.toLowerCase(); var webkit = /webkit/.test(ua), webkit4 = /webkit\/4/.test(ua), gecko = !webkit && /gecko/.test(ua), ff2 = !webkit && /firefox\/2/.test(ua), ff3 = !webkit && /firefox\/3/.test(ua), msie = /msie/.test(ua), msie6 = /msie 6/.test(ua), msie7 = /msie 7/.test(ua), msie8 = /msie 8/.test(ua), backCompat = document.compatMode == "BackCompat", loaded = 0, sw = 0, sn, $$ = 0, PX = "px", Event = new Object(), g_bw = 1; var empty = function(){}, getStyle = function(e){if (!webkit && document.defaultView && document.defaultView.getComputedStyle){return document.defaultView.getComputedStyle(e, null)} else{return e.currentStyle || e.style}}, Estyle = function(e, s){e = $(e); var v = e.style[s]; if ((!v) && (document.defaultView)){var css = document.defaultView.getComputedStyle(e, null); v = css?css[s]:null}return v == "auto"?null:v}, $ = function(e){if (typeof e == "string"){e = document.getElementById(e)}return e}, $A = function(itr){if (!itr){return[]}var rs = []; for (var i = 0, length = itr.length; i < length; i++){rs.push(itr[i])}return rs}, toInt = function(s){return isNaN(parseInt(s))?0:parseInt(s)}, has_class = function(e, n){return new RegExp("(^|\\s)" + n + "(\\s|$)").test(e.className)}, rm_class = function(e, n){if (!e){return}e.className = e.className.replace(new RegExp(n, "g"), "")}, cumulativeOffset = function(e){var T = 0, L = 0; do{T += e.offsetTop || 0; L += e.offsetLeft || 0; e = e.offsetParent}while (e); return[L, T]}, getOffsetParent = function(e){if (e.offsetParent){return e.offsetParent}if (e == document.body){return e}while ((e = e.parentNode) && e != document.body){if (Estyle(e, "position") != "static"){return e}}return document.body}, viewportOffset = function(t){var T = 0, L = 0, e = t; do{T += e.offsetTop || 0; L += e.offsetLeft || 0; if (e.offsetParent == document.body && e.style.position == "relative !important"){break}}while (e = e.offsetParent); e = t; do{if (!window.opera || e.tagName == "BODY"){T -= e.scrollTop || 0; L -= e.scrollLeft || 0}}while (e = e.parentNode); return[L, T]}, fixMSIE = function(e){var d = [0, 0]; if (e == document.body){d[0] += document.body.offsetLeft; d[1] += document.body.offsetTop} else{if ((msie6 || msie7) && e.style){d[0] += toInt(getStyle(e).marginLeft); d[1] += toInt(getStyle(e).marginTop)}}return d}; var Try = {these:function(){var returnValue; for (var i = 0, length = arguments.length; i < length; i++){var lambda = arguments[i]; try{returnValue = lambda(); break} catch (e){}}return returnValue}}; Object.extend = function(d, s){for (var p in s){d[p] = s[p]}return d}; Object.extend(Object, {keys:function(o){var keys = []; for (var p in o){keys.push(p)}return keys}, clone:function(o){return Object.extend({}, o)}}); var Class = {create:function(){var parent = null, ps = $A(arguments); function klass(){this.initialize.apply(this, arguments)}Object.extend(klass, Class.Methods); klass.superclass = parent; klass.subclasses = []; for (var i = 0; i < ps.length; i++){klass.addMethods(ps[i])}if (!klass.prototype.initialize){klass.prototype.initialize = function(){}}klass.prototype.constructor = klass; return klass}}; Class.Methods = {addMethods:function(s){var ps = Object.keys(s); if (!Object.keys({toString:true}).length){ps.push("toString", "valueOf")}for (var i = 0, length = ps.length; i < length; i++){var property = ps[i], value = s[property]; this.prototype[property] = value}return this}}; Object.extend(Function.prototype, {bind:function(){if (arguments.length < 2 && typeof arguments[0] == "undefined"){return this}var __method = this, args = $A(arguments), object = args.shift(); return function(){return __method.apply(object, args.concat($A(arguments)))}}, bindAsEventListener:function(){var __method = this, args = $A(arguments), object = args.shift(); return function(event){return __method.apply(object, [event || window.event].concat(args))}}, curry:function(){if (!arguments.length){return this}var __method = this, args = $A(arguments); return function(){return __method.apply(this, args.concat($A(arguments)))}}, delay:function(){var __method = this, args = $A(arguments), timeout = args.shift() * 1000; return window.setTimeout(function(){return __method.apply(__method, args)}, timeout)}}); Function.prototype.defer = Function.prototype.delay.curry(0.01); Object.extend(Event, {element:function(e){return $(e.target || e.srcElement)}, stop:function(e){if (e.preventDefault){e.preventDefault(); e.stopPropagation()} else{e.returnValue = false; e.cancelBubble = true}}, observers:false, _observeAndCache:function(e, n, observer, useCapture){if (!this.observers){this.observers = []}if (e.addEventListener){this.observers.push([e, n, observer, useCapture]); e.addEventListener(n, observer, useCapture)} else{if (e.attachEvent){this.observers.push([e, n, observer, useCapture]); e.attachEvent("on" + n, observer)}}}, unloadCache:function(){if (!Event.observers){return}for (var i = 0, length = Event.observers.length; i < length; i++){Event.stopObserving.apply(this, Event.observers[i]); Event.observers[i][0] = null}Event.observers = false}, observe:function(e, n, observer, useCapture){e = $(e); useCapture = useCapture || false; if (n == "keypress" && (webkit || e.attachEvent)){n = "keydown"}Event._observeAndCache(e, n, observer, useCapture)}, stopObserving:function(e, n, observer, useCapture){e = $(e); useCapture = useCapture || false; if (n == "keypress" && (webkit || e.attachEvent)){n = "keydown"}if (e.removeEventListener){e.removeEventListener(n, observer, useCapture)} else{if (e.detachEvent){try{e.detachEvent("on" + n, observer)} catch (ex){}}}}}); if (msie){Event.observe(window, "unload", Event.unloadCache, false)}var Ajax = {getTransport:function(){return Try.these(function(){return new XMLHttpRequest()}, function(){return new ActiveXObject("Msxml2.XMLHTTP")}, function(){return new ActiveXObject("Microsoft.XMLHTTP")}) || false}}; Ajax.Updater = Class.create({_complete:false, initialize:function(options){this.options = {contentType:"application/x-www-form-urlencoded", encoding:"UTF-8"}; Object.extend(this.options, options || {}); this.transport = Ajax.getTransport()}, request:function(url){this.url = url; var params = Object.clone(this.options.parameters); this.parameters = params; try{var response = new Ajax.Response(this); this.transport.open("GET", this.url, true); if (true){this.respondToReadyState.bind(this).defer(1)}this.transport.onreadystatechange = this.onStateChange.bind(this); this.setRequestHeaders(); this.transport.send(null)} catch (e){}}, onStateChange:function(){var readyState = this.transport.readyState; if (readyState > 1 && !((readyState == 4) && this._complete)){this.respondToReadyState(this.transport.readyState)}}, setRequestHeaders:function(){var headers = {"X-Requested-With":"XMLHttpRequest", Accept:"text/javascript, text/html, application/xml, text/xml, */*"}; if (this.method == "post"){headers["Content-type"] = this.options.contentType + (this.options.encoding?"; charset=" + this.options.encoding:""); if (this.transport.overrideMimeType && (navigator.userAgent.match(/Gecko\/(\d{4})/) || [0, 2005])[1] < 2005){headers.Connection = "close"}}for (var n in headers){this.transport.setRequestHeader(n, headers[n])}}, success:function(){var status = this.getStatus(); return !status || (status >= 200 && status < 300)}, getStatus:function(){try{return this.transport.status || 0} catch (e){return 0}}, respondToReadyState:function(readyState){var state = Ajax.Updater.Events[readyState], response = new Ajax.Response(this); if (state == "Complete"){try{this._complete = true; (this.options["on" + response.status] || this.options["on" + (this.success()?"Success":"Failure")] || empty)(response)} catch (e){this.dispatchException(e)}}try{(this.options["on" + state] || empty)(response)} catch (e){this.dispatchException(e)}if (state == "Complete"){this.transport.onreadystatechange = empty}}, dispatchException:function(ex){}}); Ajax.Updater.Events = ["Uninitialized", "Loading", "Loaded", "Interactive", "Complete"]; Ajax.Response = Class.create({initialize:function(request){this.request = request; var transport = this.transport = request.transport, readyState = this.readyState = transport.readyState; if ((readyState > 2 && !msie) || readyState == 4){this.status = this.getStatus(); this.responseText = transport.responseText == null?"":String(transport.responseText)}}, status:0, getStatus:Ajax.Updater.prototype.getStatus}); var g = 9999999999999; var cwa = {b:function(t){return t.substring(t.indexOf("{") + 1, t.lastIndexOf("}"))}, focus:function(t){t.focus(); var l = t.value.length; if (msie){var r = t.createTextRange(); r.moveStart("character", l); r.moveEnd("character", l); r.select()} else{t.setSelectionRange(l, l)}}}; var ac = function(){this.initialize.apply(this, arguments)}; (function(){var t; function _domloaded(z){if (loaded){return}if (t){window.clearInterval(t)}loaded = 1; if (!$$){var e = document.createElement("div"); var es = e.style; es.position = "absolute"; es.right = es.top = "0px"; es.backgroundColor = "#feea3d"; es.cursor = "pointer"; es.padding = ".5em"; var days = Math.floor((g - new Date().getTime() / 1000) / 86400); if (days < 15){if (days < 0){days = 0}e.innerHTML = "The autocomplete trial has " + days + (days > 1?" days":" day") + " left. <a href='http://createwebapp.com/buy.html'></a>"; document.body.appendChild(e)}}}if (document.addEventListener){if (webkit){t = window.setInterval(function(){if (/loaded|complete/.test(document.readyState)){_domloaded()}}, 0); Event.observe(window, "load", _domloaded)} else{document.addEventListener("DOMContentLoaded", _domloaded, false)}} else{document.write("<script id=_onDOMContentLoaded defer src=//:><\/script>"); $("_onDOMContentLoaded").onreadystatechange = function(){if (this.readyState == "complete"){this.onreadystatechange = null; _domloaded()}}}})(); Object.extend(ac, {unlock:function(n){if (n.indexOf("C") > - 1 && n.indexOf("G") > - 1 && n.indexOf("N") > - 1){$$ = 1}}, I:function(e){var v; if (e.nodeType == 1){v = e.getAttribute("onselect")}return v}, C:function(v){var e = Event.element(v); for (var i = 0; i < ac.inst.length; i++){var a = ac.inst[i]; if (a.text != e && a.L.e != e && a.image.e != e){a.L.hide()}}}, L:function(){if (msie){sn = self.name}var x = "autocomplete_x1"; if (loaded){var e = document.createElement("div"); e.id = x; document.body.appendChild(e)} else{document.write("<div id='" + x + "'></div>")}var e = $(x); var es = e.style; es.position = "absolute"; es.left = es.top = "-800px"; es.overflow = "scroll"; es.width = "40px"; e.innerHTML = "<div style='width:80px;height:80px' class='autocomplete_icon'></div>"; sw = e.offsetWidth - e.clientWidth}, inst:new Array(), name:"", key:"", updateViews:function(){for (var i = 0; i < ac.inst.length; i++){ac.inst[i].image.position()}}}); var NSImage = Class.create({initialize:function(o){var id = "_image_" + NSImage.count++; document.write("<i id='" + id + "' class='autocomplete_icon' style='padding:0; margin:0; height:12px; width:12px; position:absolute; left:-99px; top:-99px; font-size:0px'></i>"); this.e = $(id); this.o = o; this.e.onclick = function(){if (this.isReset()){o.setText(""); this.ready(); o.makeURI(); o.stop()} else{if (this.isReady()){o.isON = 1; o.isNotClick = 0; o.custom_uri = ""; o.request()}}o.text.focus()}.bind(this, o)}, finished:function(){if (this.o.text.value.length){this.reset()} else{this.ready()}}, position:function(){var t = this.o.text; var p = viewportOffset(t); var parent = getOffsetParent(this.e); var d = viewportOffset(parent); this.e.style.left = (p[0] - d[0] - fixMSIE(parent)[0] + t.offsetWidth - 16) + "px"; this.e.style.top = (p[1] - d[1] - fixMSIE(parent)[1] + Math.round((t.offsetHeight - 12) / 2) + (webkit?1:0)) + "px"}, ready:function(){this._set("0 0")}, go:function(){this._set("0 12px")}, reset:function(){this._set("0 24px")}, isReady:function(){return !(this.isGo() || this.isReset())}, isGo:function(){return this._get().indexOf("12") > - 1}, isReset:function(){return this._get().indexOf("24") > - 1}, _get:function(){return this.e.style.backgroundPosition}, _set:function(v){this.e.style.backgroundPosition = v}}); Object.extend(NSImage, {count:0}); var NSList = Class.create({initialize:function(object, withFrame){NSList.count++; var id = "_list_" + NSList.count; var x = "autocomplete_list"; if (loaded){var e = document.createElement("ol"); e.id = id; var es = e.style; es.position = "absolute"; es.left = es.top = "-8000px"; e.className = x; document.body.appendChild(e)} else{document.write("<ol id='" + id + "' style='position:absolute;left:-8000;top:-8000px' class='" + x + "'></ol>")}this.e = $(id); this.o = object; if (msie6 && withFrame){if (loaded){var e = document.createElement("iframe"); e.id = "_iframe_" + NSList.count; var es = e.style; es.position = "absolute"; es.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity = 0)"; e.src = "javascript:false;"; document.body.appendChild(e)} else{document.write("<iframe id='_iframe_" + NSList.count + "' style='position:absolute;filter:progid:DXImageTransform.Microsoft.Alpha(opacity = 0)' src='javascript:false;'></iframe>")}this.F = $("_iframe_" + NSList.count); this.F.style.display = "none"}}, isVisible:function(){var s = this.e.style; return(s.display != "none") && (toInt(s.left) >= 0) && (toInt(s.top) >= 0)}, setContent:function(t){this.e.innerHTML = t}, content:function(t){return this.e.innerHTML}, hide:function(){if (this.isVisible()){this.e.style.left = "-8000px"}if (this.F){this.F.style.display = "none"}}, display:function(w, h, sf){var t = this.o.text; var p = viewportOffset(t); var parent = getOffsetParent(this.e); var delta = viewportOffset(parent); var l = p[0], d = t.offsetWidth - w, a = this.o.options.align, ls = this.e.style; if ((a == "auto") && (document.body.offsetWidth - l - w > 14)){d = 0}if (a == "left"){d = 0}if (a == "center"){d /= 2}ls.width = w + "px"; ls.height = h; if (sf){this.o.D()}var F = this.F; var e = this.e; setTimeout(function(){ls.top = p[1] + t.offsetHeight - delta[1] - fixMSIE(parent)[1] + "px"; ls.left = l - delta[0] - fixMSIE(parent)[0] + d + (msie?t.scrollLeft:0) + "px"; ls.display = ""; if (F){self.name = sn; var es = F.style; es.top = ls.top; es.left = ls.left; es.width = ls.width; es.height = e.clientHeight; es.display = ""}}, 100)}, autoWidth:function(){var i = 500; if (!!window.opera){this.e.style.width = i + PX}var oh = this.e.offsetHeight; if (webkit || ff3 || msie8){w = this.e.offsetWidth} else{var step = 50; var l = 100, h = i, ow; do{i = Math.ceil((l + h) / 2); this.e.style.width = i + PX; ow = this.e.offsetWidth; if (gecko || document.compatMode == "CSS1Compat"){ow -= g_bw * 2}if ((this.e.offsetHeight > oh) || (ow > i)){l = i + step} else{h = i}}while ((h - l) / step > 0.9); w = h; this.e.style.width = w + "px"}return w}, autoHeight:function(){var s = this.o.options.size; var A = $A(this.e.getElementsByTagName("li")); var l = A.length; var m = A[(l > s?s:l) - 1]; var h = m.offsetTop + m.offsetHeight; if (msie6 || msie7){h -= toInt(getStyle(m).paddingTop)}if (msie8){h -= g_bw}h -= g_bw; return h + "px"}, parseItems:function(){var items = new Array(), ls = this.e.childNodes; for (var j = 0; j < ls.length; j++){var x = ls[j]; if (x.nodeType == 1 && x.getAttribute("onselect")){var i = items.length; x.onmouseover = function(i){this.focus(i)}.bind(this.o, i); x.onclick = function(i){this.i = i; this.z()}.bind(this.o, i); items.push(x)}}if (items.length > this.o.options.size){this.e.style.overflow = "auto"}return items}, prepare:function(){this.e.style.width = this.e.style.height = "auto"; var ls = this.e.childNodes, i = 0, lt; for (var j = 0; j < ls.length; j++){var x = ls[j]; if (ac.I(x)){lt = x; if (msie && (i++ < this.o.options.size) && !x.getElementsByTagName("span").length){x.innerHTML = "<span style='padding:0'></span>" + x.innerHTML}}}if (lt){lt.className = "last_item"}return ls.length}}); Object.extend(NSList, {count:0}); ac.prototype = {$c:0, init:0, T:0, i: - 1, d:1, custom_uri:"", initialize:function(t, f, options){this.text = $(t)?$(t):document.getElementsByName(t)[0]; if ((this.text == null) || (f == null) || (typeof f != "function")){return}this.text.setAttribute("autocomplete", "off"); this.setOptions(options); this.f = f; this.makeURI = function(){this.value = encodeURIComponent(this.text.value); if (this.bR()){return this.f()}}.bind(this); var x = this.text.getAttribute("autocomplete_id"); if (x != null){return}var sid = "no_" + ac.inst.length; this.text.setAttribute("autocomplete_id", sid); this.onchange = this.text.onchange; this.text.onchange = function(){}; this.L = new NSList(this, 1); this.L2 = new NSList(this); ac.inst.push(this); if (ac.L){ac.L(); ac.L = null}this.image = new NSImage(this); this.fpi(); this.r()}, fpi:function(){for (var i = 1; i <= 4 * 10; i++){setTimeout(this.image.position.bind(this.image), i * 50)}}, setOptions:function(options){this.options = {width:"auto", delay:0.4, delimChars:",", size:10, select_first:1, align:"auto"}; Object.extend(this.options, options || {})}, r:function(){this._k = this.k.bindAsEventListener(this); this.$r = this.request.bind(this); var t = this.text; t.className += " autocomplete_text"; if (/mac/.test(ua)){t._ac = this; t.onkeypress = function(e){return !this._ac.$s}}var O = Event.observe; if (msie){O(t, "keydown", this._k)} else{O(t, "keypress", this._k)}O(t, "keyup", function(e){if (e.keyCode == 27){this.image.finished()}}.bind(this)); O(t, "blur", this.blur.bind(this)); if (ac.inst.length == 1){O(document, "click", ac.C)}O(window, "resize", this.image.position.bind(this.image)); var e = t; while (e = e.parentNode){if (e.style && (e.style.overflow == "scroll" || e.style.overflow == "auto")){this.scrollable = this.scrollable?this.scrollable:e; O(e, "scroll", this.onScroll.bind(this))}}}, setText:function(v){this.text.value = v; return this}, onScroll:function(){var s = this.scrollable; if (s){var p = this.t(); var o = cumulativeOffset(s); if (p[1] >= o[1] && p[1] < o[1] + s.offsetHeight && p[0] >= o[0] && p[0] < o[0] + s.offsetWidth && this.L.isVisible()){this.s()} else{this.L.hide()}}}, t:function(){var p = viewportOffset(this.text); return[p[0] + (msie?this.text.scrollLeft:0) + (document.documentElement.scrollLeft || document.body.scrollLeft), p[1] + (document.documentElement.scrollTop || document.body.scrollTop)]}, iolv:function(){var d = this.options.delimChars, v = encodeURIComponent(this.text.value), i, j, k = 0; for (i = v.length - 1; i >= 0; i--){for (j = 0; j < d.length; j++){if (v.charAt(i) == d.charAt(j)){k = i + 1; break}}if (k){break}}return k}, page:function(n){var s = this.options.size, i = this.i, l = this.items.length; if (n == "page_up"){if (i >= s){this.focus(i - s)} else{this.focus(0)}}if (n == "page_down"){if (i + s < l){this.focus(i + s)} else{this.focus(l - 1)}}}, blur:function(){if (!this.L.isVisible() && !this.image.isGo()){this.isON = 0; setTimeout(function(){if (!this.isON){this.stop()}}.bind(this), 4)}}, stop:function(){this.c(); this.image.finished(); this.L.hide()}, c:function(){if ((this.latest) && (this.latest.transport.readyState != 4)){this.latest.transport.abort()}}, k:function(e){if (!$$ && Math.floor((g - new Date().getTime() / 1000) / 86400) < 0){return}this.isON = 1; this.$s = false; var c = e.keyCode; var delay = this.options.delay; this.isModified = 1; this.isNotClick = 1; if (c == 13 || c == 9){if (c == 13){Event.stop(e)}if (this.L.isVisible()){if ((this.$c) && (this.i > - 1)){this.$s = true}this.z(); return}delay = 0.005; this.isModified = 0}if (c == 27){this.stop(); if (webkit){this.text.blur(); this.text.focus()}}var pupd = 0, ud = 0; if (c == 33 || c == 34 || c == 63276 || c == 63277){pupd = 1; if (this.$c){(c == 33) || (c == 63276)?this.page("page_up"):this.page("page_down")}}if (c == 38 || c == 40 || c == 63232 || c == 63233){ud = 1; if (this.$c){(c == 38) || (c == 63232)?this.U():this.D()}}if ((pupd || ud || c == 13) && this.$c){Event.stop(e); return}if (delay > 60 || c == 9 || c == 27 || c == 37 || c == 39 || c == 35 || c == 36 || c == 45 || c == 16 || c == 17 || c == 18 || c == 91){return}this.custom_uri = ""; clearTimeout(this.T); this.c(); setTimeout(function(){this.T = setTimeout(this.$r, delay * 1000)}.bind(this, delay), 5)}, z:function(){var m = this.G(); if (m){this.stop(); var isP = 0; try{var s = m.getAttribute("onselect").replace("this.request(", "this.request(1"); isP = s.indexOf("this.request(") > - 1; eval(s)} catch (e){}cwa.focus(this.text); if (!isP){this.image.finished()}if (this.onchange){setTimeout(function(){this.onchange.bind(this.text)()}.bind(this), 4)}}}, G:function(){return this.items?this.items[this.i]:null}, focus:function(i, pass){if ((this.i == i) || (!this.$c)){return}this.L.e.style.display = ""; rm_class(this.G(), "current_item"); this.i = i; var m = this.G(); if (!m){return}m.className += " current_item"; var u = this.L.e, h = this.options.size * m.offsetHeight, mt = m.offsetTop; if (ff2){mt += g_bw}if (msie8){mt -= g_bw}var moveUp = (mt <= u.scrollTop) || (i == 0); var moveDown = mt + m.offsetHeight - u.scrollTop > h; if (moveUp){if (msie6 || msie7){mt -= toInt(getStyle(m).paddingTop)}u.scrollTop = mt}if (moveDown){if (msie6 || msie7){mt -= toInt(getStyle(m).paddingBottom)}u.scrollTop = mt + m.offsetHeight - h}try{var z = m.getAttribute("onfocus"); if (msie){z = cwa.b(z.toString())}eval(z)} catch (e){}}, U:function(){if (this.i > - 1){this.focus(this.i - 1)}}, D:function(){if (this.i < this.items.length - 1){this.focus(this.i + 1)}}, bR:function(){if (!this.init){this.init = true; this.L.onscroll = function(){cwa.focus(this.text)}.bind(this)}return true}, request:function(u){var z = typeof u != "string"; if (u == 1){u = this.url; this.isON = 1} else{if (z){u = this.makeURI()}}if (this.isON){this.url = u; if (u == undefined){this.stop(); return}this.$c = 0; this.i = - 1; this.image.go(); this.latest = new Ajax.Updater({onComplete:this.d.bind(this)}); this.latest.request(u + this.custom_uri)} else{this.stop()}}, d:function(response){var l = this.latest; var tx = l.transport; if (this.isON && (tx == response.transport) && (this.latest.url == this.url + this.custom_uri)){this.L2.setContent(response.responseText); this.$c = 1; try{if ((typeof tx.status != "unknown") && l.success()){} else{this.L2.setContent("<li onselect=';'>An error occured. <br/>HTTP error code:" + tx.status + "</li>")}this.$c = 1; if (this.L2.prepare()){this.s(this.options.select_first)} else{this.stop()}} catch (e){}}}, offset:function(e){var o = 0; if (gecko || webkit || (msie && !backCompat)){var pl = "padding-left", pr = "padding-right"; var f = function(e, p){return toInt(Estyle(e, p))}; o = g_bw * 2 + f(e, pl) + f(e, pr)}return o}, s:function(ft){this.isON = 1; var w = this.L2.autoWidth(), h = "auto"; this.i = - 1; this.L.setContent(this.L2.content()); this.items = this.L.parseItems(); if (this.items.length > this.options.size){w = parseInt(w) + sw; h = this.L2.autoHeight()}if (w < this.text.offsetWidth){w = this.text.offsetWidth}if (this.items.length){this.L.display(w, h, ft)}if (msie){setTimeout(function(){for (var j = 0; j < this.items.length; j++){var x = this.items[j]; if (!x.getElementsByTagName("span").length){x.innerHTML = "<span style='padding:0'></span>" + x.innerHTML}}}.bind(this), 0)}this.image.finished()}}; window.AutoComplete = window.Autocomplete = ac})();


/* JavaScript autocomplete widget, version 1.6.2. For details, see http://createwebapp.com  */
(function() {
    var ua = navigator.userAgent.toLowerCase();
    var webkit = /webkit/.test(ua),
        webkit4 = /webkit\/4/.test(ua),
        gecko = !webkit && /gecko/.test(ua),
        ff2 = !webkit && /firefox\/2/.test(ua),
        ff3 = !webkit && /firefox\/3/.test(ua),
        msie = /msie/.test(ua),
        msie6 = /msie 6/.test(ua),
        msie7 = /msie 7/.test(ua),
        msie8 = /msie 8/.test(ua),
        backCompat = document.compatMode == "BackCompat",
        loaded = 0,
        sw = 0,
        sn, $$ = 0,
        PX = "px",
        Event = new Object(),
        g_bw = 1;
    var empty = function() {},
        getStyle = function(e) {
            if (!webkit && document.defaultView && document.defaultView.getComputedStyle) {
                return document.defaultView.getComputedStyle(e, null)
            } else {
                return e.currentStyle || e.style
            }
        },
        Estyle = function(e, s) {
            e = $(e);
            var v = e.style[s];
            if ((!v) && (document.defaultView)) {
                var css = document.defaultView.getComputedStyle(e, null);
                v = css ? css[s] : null
            }
            return v == "auto" ? null : v
        },
        $ = function(e) {
            if (typeof e == "string") {
                e = document.getElementById(e)
            }
            return e
        },
        $A = function(itr) {
            if (!itr) {
                return []
            }
            var rs = [];
            for (var i = 0, length = itr.length; i < length; i++) {
                rs.push(itr[i])
            }
            return rs
        },
        toInt = function(s) {
            return isNaN(parseInt(s)) ? 0 : parseInt(s)
        },
        has_class = function(e, n) {
            return new RegExp("(^|\\s)" + n + "(\\s|$)").test(e.className)
        },
        rm_class = function(e, n) {
            if (!e) {
                return
            }
            e.className = e.className.replace(new RegExp(n, "g"), "")
        },
        cumulativeOffset = function(e) {
            var T = 0,
                L = 0;
            do {
                T += e.offsetTop || 0;
                L += e.offsetLeft || 0;
                e = e.offsetParent
            } while (e);
            return [L, T]
        },
        getOffsetParent = function(e) {
            if (e.offsetParent) {
                return e.offsetParent
            }
            if (e == document.body) {
                return e
            }
            while ((e = e.parentNode) && e != document.body) {
                if (Estyle(e, "position") != "static") {
                    return e
                }
            }
            return document.body
        },
        viewportOffset = function(t) {
            var T = 0,
                L = 0,
                e = t;
            do {
                T += e.offsetTop || 0;
                L += e.offsetLeft || 0;
                if (e.offsetParent == document.body && e.style.position == "relative !important") {
                    break
                }
            } while (e = e.offsetParent);
            e = t;
            do {
                if (!window.opera || e.tagName == "BODY") {
                    T -= e.scrollTop || 0;
                    L -= e.scrollLeft || 0
                }
            } while (e = e.parentNode);
            return [L, T]
        },
        fixMSIE = function(e) {
            var d = [0, 0];
            if (e == document.body) {
                d[0] += document.body.offsetLeft;
                d[1] += document.body.offsetTop
            } else {
                if ((msie6 || msie7) && e.style) {
                    d[0] += toInt(getStyle(e).marginLeft);
                    d[1] += toInt(getStyle(e).marginTop)
                }
            }
            return d
        };
    var Try = {
        these: function() {
            var returnValue;
            for (var i = 0, length = arguments.length; i < length; i++) {
                var lambda = arguments[i];
                try {
                    returnValue = lambda();
                    break
                } catch (e) {}
            }
            return returnValue
        }
    };
    Object.extend = function(d, s) {
        for (var p in s) {
            d[p] = s[p]
        }
        return d
    };
    Object.extend(Object, {
        keys: function(o) {
            var keys = [];
            for (var p in o) {
                keys.push(p)
            }
            return keys
        },
        clone: function(o) {
            return Object.extend({}, o)
        }
    });
    var Class = {
        create: function() {
            var parent = null,
                ps = $A(arguments);

            function klass() {
                this.initialize.apply(this, arguments)
            }
            Object.extend(klass, Class.Methods);
            klass.superclass = parent;
            klass.subclasses = [];
            for (var i = 0; i < ps.length; i++) {
                klass.addMethods(ps[i])
            }
            if (!klass.prototype.initialize) {
                klass.prototype.initialize = function() {}
            }
            klass.prototype.constructor = klass;
            return klass
        }
    };
    Class.Methods = {
        addMethods: function(s) {
            var ps = Object.keys(s);
            if (!Object.keys({
                    toString: true
                }).length) {
                ps.push("toString", "valueOf")
            }
            for (var i = 0, length = ps.length; i < length; i++) {
                var property = ps[i],
                    value = s[property];
                this.prototype[property] = value
            }
            return this
        }
    };
    Object.extend(Function.prototype, {
        bind: function() {
            if (arguments.length < 2 && typeof arguments[0] == "undefined") {
                return this
            }
            var __method = this,
                args = $A(arguments),
                object = args.shift();
            return function() {
                return __method.apply(object, args.concat($A(arguments)))
            }
        },
        bindAsEventListener: function() {
            var __method = this,
                args = $A(arguments),
                object = args.shift();
            return function(event) {
                return __method.apply(object, [event || window.event].concat(args))
            }
        },
        curry: function() {
            if (!arguments.length) {
                return this
            }
            var __method = this,
                args = $A(arguments);
            return function() {
                return __method.apply(this, args.concat($A(arguments)))
            }
        },
        delay: function() {
            var __method = this,
                args = $A(arguments),
                timeout = args.shift() * 1000;
            return window.setTimeout(function() {
                return __method.apply(__method, args)
            }, timeout)
        }
    });
    Function.prototype.defer = Function.prototype.delay.curry(0.01);
    Object.extend(Event, {
        element: function(e) {
            return $(e.target || e.srcElement)
        },
        stop: function(e) {
            if (e.preventDefault) {
                e.preventDefault();
                e.stopPropagation()
            } else {
                e.returnValue = false;
                e.cancelBubble = true
            }
        },
        observers: false,
        _observeAndCache: function(e, n, observer, useCapture) {
            if (!this.observers) {
                this.observers = []
            }
            if (e.addEventListener) {
                this.observers.push([e, n, observer, useCapture]);
                e.addEventListener(n, observer, useCapture)
            } else {
                if (e.attachEvent) {
                    this.observers.push([e, n, observer, useCapture]);
                    e.attachEvent("on" + n, observer)
                }
            }
        },
        unloadCache: function() {
            if (!Event.observers) {
                return
            }
            for (var i = 0, length = Event.observers.length; i < length; i++) {
                Event.stopObserving.apply(this, Event.observers[i]);
                Event.observers[i][0] = null
            }
            Event.observers = false
        },
        observe: function(e, n, observer, useCapture) {
            e = $(e);
            useCapture = useCapture || false;
            if (n == "keypress" && (webkit || e.attachEvent)) {
                n = "keydown"
            }
            Event._observeAndCache(e, n, observer, useCapture)
        },
        stopObserving: function(e, n, observer, useCapture) {
            e = $(e);
            useCapture = useCapture || false;
            if (n == "keypress" && (webkit || e.attachEvent)) {
                n = "keydown"
            }
            if (e.removeEventListener) {
                e.removeEventListener(n, observer, useCapture)
            } else {
                if (e.detachEvent) {
                    try {
                        e.detachEvent("on" + n, observer)
                    } catch (ex) {}
                }
            }
        }
    });
    if (msie) {
        Event.observe(window, "unload", Event.unloadCache, false)
    }
    var Ajax = {
        getTransport: function() {
            return Try.these(function() {
                return new XMLHttpRequest()
            }, function() {
                return new ActiveXObject("Msxml2.XMLHTTP")
            }, function() {
                return new ActiveXObject("Microsoft.XMLHTTP")
            }) || false
        }
    };
    Ajax.Updater = Class.create({
        _complete: false,
        initialize: function(options) {
            this.options = {
                contentType: "application/x-www-form-urlencoded",
                encoding: "UTF-8"
            };
            Object.extend(this.options, options || {});
            this.transport = Ajax.getTransport()
        },
        request: function(url) {
            this.url = url;
            var params = Object.clone(this.options.parameters);
            this.parameters = params;
            try {
                var response = new Ajax.Response(this);
                this.transport.open("GET", this.url, true);
                if (true) {
                    this.respondToReadyState.bind(this).defer(1)
                }
                this.transport.onreadystatechange = this.onStateChange.bind(this);
                this.setRequestHeaders();
                this.transport.send(null)
            } catch (e) {}
        },
        onStateChange: function() {
            var readyState = this.transport.readyState;
            if (readyState > 1 && !((readyState == 4) && this._complete)) {
                this.respondToReadyState(this.transport.readyState)
            }
        },
        setRequestHeaders: function() {
            var headers = {
                "X-Requested-With": "XMLHttpRequest",
                Accept: "text/javascript, text/html, application/xml, text/xml, */*"
            };
            if (this.method == "post") {
                headers["Content-type"] = this.options.contentType + (this.options.encoding ? "; charset=" + this.options.encoding : "");
                if (this.transport.overrideMimeType && (navigator.userAgent.match(/Gecko\/(\d{4})/) || [0, 2005])[1] < 2005) {
                    headers.Connection = "close"
                }
            }
            for (var n in headers) {
                this.transport.setRequestHeader(n, headers[n])
            }
        },
        success: function() {
            var status = this.getStatus();
            return !status || (status >= 200 && status < 300)
        },
        getStatus: function() {
            try {
                return this.transport.status || 0
            } catch (e) {
                return 0
            }
        },
        respondToReadyState: function(readyState) {
            var state = Ajax.Updater.Events[readyState],
                response = new Ajax.Response(this);
            if (state == "Complete") {
                try {
                    this._complete = true;
                    (this.options["on" + response.status] || this.options["on" + (this.success() ? "Success" : "Failure")] || empty)(response)
                } catch (e) {
                    this.dispatchException(e)
                }
            }
            try {
                (this.options["on" + state] || empty)(response)
            } catch (e) {
                this.dispatchException(e)
            }
            if (state == "Complete") {
                this.transport.onreadystatechange = empty
            }
        },
        dispatchException: function(ex) {}
    });
    Ajax.Updater.Events = ["Uninitialized", "Loading", "Loaded", "Interactive", "Complete"];
    Ajax.Response = Class.create({
        initialize: function(request) {
            this.request = request;
            var transport = this.transport = request.transport,
                readyState = this.readyState = transport.readyState;
            if ((readyState > 2 && !msie) || readyState == 4) {
                this.status = this.getStatus();
                this.responseText = transport.responseText == null ? "" : String(transport.responseText)
            }
        },
        status: 0,
        getStatus: Ajax.Updater.prototype.getStatus
    });
    var g = 9999999999999;
    var cwa = {
        b: function(t) {
            return t.substring(t.indexOf("{") + 1, t.lastIndexOf("}"))
        },
        focus: function(t) {
            t.focus();
            var l = t.value.length;
            if (msie) {
                var r = t.createTextRange();
                r.moveStart("character", l);
                r.moveEnd("character", l);
                r.select()
            } else {
                t.setSelectionRange(l, l)
            }
        }
    };
    var ac = function() {
        this.initialize.apply(this, arguments)
    };
    (function() {
        var t;

        function _domloaded(z) {
            if (loaded) {
                return
            }
            if (t) {
                window.clearInterval(t)
            }
            loaded = 1;
            if (!$$) {
                var e = document.createElement("div");
                var es = e.style;
                es.position = "absolute";
                es.right = es.top = "0px";
                es.backgroundColor = "#feea3d";
                es.cursor = "pointer";
                es.padding = ".5em";
                var days = Math.floor((g - new Date().getTime() / 1000) / 86400);
                if (days < 15) {
                    if (days < 0) {
                        days = 0
                    }
                    e.innerHTML = "The autocomplete trial has " + days + (days > 1 ? " days" : " day") + " left. <a href='http://createwebapp.com/buy.html'></a>";
                    document.body.appendChild(e)
                }
            }
        }
        if (document.addEventListener) {
            if (webkit) {
                t = window.setInterval(function() {
                    if (/loaded|complete/.test(document.readyState)) {
                        _domloaded()
                    }
                }, 0);
                Event.observe(window, "load", _domloaded)
            } else {
                document.addEventListener("DOMContentLoaded", _domloaded, false)
            }
        } else {
            document.write("<script id=_onDOMContentLoaded defer src=//:><\/script>");
            $("_onDOMContentLoaded").onreadystatechange = function() {
                if (this.readyState == "complete") {
                    this.onreadystatechange = null;
                    _domloaded()
                }
            }
        }
    })();
    Object.extend(ac, {
        unlock: function(n) {
            if (n.indexOf("C") > -1 && n.indexOf("G") > -1 && n.indexOf("N") > -1) {
                $$ = 1
            }
        },
        I: function(e) {
            var v;
            if (e.nodeType == 1) {
                v = e.getAttribute("onselect")
            }
            return v
        },
        C: function(v) {
            var e = Event.element(v);
            for (var i = 0; i < ac.inst.length; i++) {
                var a = ac.inst[i];
                if (a.text != e && a.L.e != e) {
                    a.L.hide()
                }
            }
        },
        L: function() {
            if (msie) {
                sn = self.name
            }
            var x = "autocomplete_x1";
            if (loaded) {
                var e = document.createElement("div");
                e.id = x;
                document.body.appendChild(e)
            } else {
                document.write("<div id='" + x + "'></div>")
            }
            var e = $(x);
            var es = e.style;
            es.position = "absolute";
            es.left = es.top = "-800px";
            es.overflow = "scroll";
            es.width = "40px";
            e.innerHTML = "<div style='width:80px;height:80px' class='autocomplete_icon'></div>";
            sw = e.offsetWidth - e.clientWidth
        },
        inst: new Array(),
        name: "",
        key: "",
        updateViews: function() {
            for (var i = 0; i < ac.inst.length; i++) {
                ac.inst[i].image.position()
            }
        }
    });
    var NSList = Class.create({
        initialize: function(object, withFrame) {
            NSList.count++;
            var id = "_list_" + NSList.count;
            var x = "autocomplete_list";
            if (loaded) {
                var e = document.createElement("ol");
                e.id = id;
                var es = e.style;
                es.position = "absolute";
                es.left = es.top = "-8000px";
                e.className = x;
                document.body.appendChild(e)
            } else {
                document.write("<ol id='" + id + "' style='position:absolute;left:-8000;top:-8000px' class='" + x + "'></ol>")
            }
            this.e = $(id);
            this.o = object;
            if (msie6 && withFrame) {
                if (loaded) {
                    var e = document.createElement("iframe");
                    e.id = "_iframe_" + NSList.count;
                    var es = e.style;
                    es.position = "absolute";
                    es.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity = 0)";
                    e.src = "javascript:false;";
                    document.body.appendChild(e)
                } else {
                    document.write("<iframe id='_iframe_" + NSList.count + "' style='position:absolute;filter:progid:DXImageTransform.Microsoft.Alpha(opacity = 0)' src='javascript:false;'></iframe>")
                }
                this.F = $("_iframe_" + NSList.count);
                this.F.style.display = "none"
            }
        },
        isVisible: function() {
            var s = this.e.style;
            return (s.display != "none") && (toInt(s.left) >= 0) && (toInt(s.top) >= 0)
        },
        setContent: function(t) {
            this.e.innerHTML = t
        },
        content: function(t) {
            return this.e.innerHTML
        },
        hide: function() {
            if (this.isVisible()) {
                this.e.style.left = "-8000px"
            }
            if (this.F) {
                this.F.style.display = "none"
            }
        },
        display: function(w, h, sf) {
            var t = this.o.text;
            var p = viewportOffset(t);
            var parent = getOffsetParent(this.e);
            var delta = viewportOffset(parent);
            var l = p[0],
                d = t.offsetWidth - w,
                a = this.o.options.align,
                ls = this.e.style;
            if ((a == "auto") && (document.body.offsetWidth - l - w > 14)) {
                d = 0
            }
            if (a == "left") {
                d = 0
            }
            if (a == "center") {
                d /= 2
            }
            ls.width = w + "px";
            ls.height = h;
            if (sf) {
                this.o.D()
            }
            var F = this.F;
            var e = this.e;
            setTimeout(function() {
                ls.top = p[1] + t.offsetHeight - delta[1] - fixMSIE(parent)[1] + "px";
                ls.left = l - delta[0] - fixMSIE(parent)[0] + d + (msie ? t.scrollLeft : 0) + "px";
                ls.display = "";
                if (F) {
                    self.name = sn;
                    var es = F.style;
                    es.top = ls.top;
                    es.left = ls.left;
                    es.width = ls.width;
                    es.height = e.clientHeight;
                    es.display = ""
                }
            }, 100)
        },
        autoWidth: function() {
            var i = 500;
            if (!!window.opera) {
                this.e.style.width = i + PX
            }
            var oh = this.e.offsetHeight;
            if (webkit || ff3 || msie8) {
                w = this.e.offsetWidth
            } else {
                var step = 50;
                var l = 100,
                    h = i,
                    ow;
                do {
                    i = Math.ceil((l + h) / 2);
                    this.e.style.width = i + PX;
                    ow = this.e.offsetWidth;
                    if (gecko || document.compatMode == "CSS1Compat") {
                        ow -= g_bw * 2
                    }
                    if ((this.e.offsetHeight > oh) || (ow > i)) {
                        l = i + step
                    } else {
                        h = i
                    }
                } while ((h - l) / step > 0.9);
                w = h;
                this.e.style.width = w + "px"
            }
            return w
        },
        autoHeight: function() {
            var s = this.o.options.size;
            var A = $A(this.e.getElementsByTagName("li"));
            var l = A.length;
            var m = A[(l > s ? s : l) - 1];
            var h = m.offsetTop + m.offsetHeight;
            if (msie6 || msie7) {
                h -= toInt(getStyle(m).paddingTop)
            }
            if (msie8) {
                h -= g_bw
            }
            h -= g_bw;
            return h + "px"
        },
        parseItems: function() {
            var items = new Array(),
                ls = this.e.childNodes;
            for (var j = 0; j < ls.length; j++) {
                var x = ls[j];
                if (x.nodeType == 1 && x.getAttribute("onselect")) {
                    var i = items.length;
                    x.onmouseover = function(i) {
                        this.focus(i)
                    }.bind(this.o, i);
                    x.onclick = function(i) {
                        this.i = i;
                        this.z()
                    }.bind(this.o, i);
                    items.push(x)
                }
            }
            if (items.length > this.o.options.size) {
                this.e.style.overflow = "auto"
            }
            return items
        },
        prepare: function() {
            this.e.style.width = this.e.style.height = "auto";
            var ls = this.e.childNodes,
                i = 0,
                lt;
            for (var j = 0; j < ls.length; j++) {
                var x = ls[j];
                if (ac.I(x)) {
                    lt = x;
                    if (msie && (i++ < this.o.options.size) && !x.getElementsByTagName("span").length) {
                        x.innerHTML = "<span style='padding:0'></span>" + x.innerHTML
                    }
                }
            }
            if (lt) {
                lt.className = "last_item"
            }
            return ls.length
        }
    });
    Object.extend(NSList, {
        count: 0
    });
    ac.prototype = {
        $c: 0,
        init: 0,
        T: 0,
        i: -1,
        d: 1,
        custom_uri: "",
        initialize: function(t, f, options) {
            this.text = $(t) ? $(t) : document.getElementsByName(t)[0];
            if ((this.text == null) || (f == null) || (typeof f != "function")) {
                return
            }
            this.text.setAttribute("autocomplete", "off");
            this.setOptions(options);
            this.f = f;
            this.makeURI = function() {
                this.value = encodeURIComponent(this.text.value);
                if (this.bR()) {
                    return this.f()
                }
            }.bind(this);
            var x = this.text.getAttribute("autocomplete_id");
            if (x != null) {
                return
            }
            var sid = "no_" + ac.inst.length;
            this.text.setAttribute("autocomplete_id", sid);
            this.onchange = this.text.onchange;
            this.text.onchange = function() {};
            this.L = new NSList(this, 1);
            this.L2 = new NSList(this);
            ac.inst.push(this);
            if (ac.L) {
                ac.L();
                ac.L = null
            }
            this.r()
        },
        setOptions: function(options) {
            this.options = {
                width: "auto",
                delay: 0.4,
                delimChars: ",",
                size: 10,
                select_first: 1,
                align: "auto"
            };
            Object.extend(this.options, options || {})
        },
        r: function() {
            this._k = this.k.bindAsEventListener(this);
            this.$r = this.request.bind(this);
            var t = this.text;
            t.className += " autocomplete_text";
            if (/mac/.test(ua)) {
                t._ac = this;
                t.onkeypress = function(e) {
                    return !this._ac.$s
                }
            }
            var O = Event.observe;
            if (msie) {
                O(t, "keydown", this._k)
            } else {
                O(t, "keypress", this._k)
            }
            O(t, "keyup", function(e) {
                if (e.keyCode == 27) {
                    this.image.finished()
                }
            }.bind(this));
            O(t, "blur", this.blur.bind(this));
            if (ac.inst.length == 1) {
                O(document, "click", ac.C)
            }
            var e = t;
            while (e = e.parentNode) {
                if (e.style && (e.style.overflow == "scroll" || e.style.overflow == "auto")) {
                    this.scrollable = this.scrollable ? this.scrollable : e;
                    O(e, "scroll", this.onScroll.bind(this))
                }
            }
        },
        setText: function(v) {
            this.text.value = v;
            return this
        },
        onScroll: function() {
            var s = this.scrollable;
            if (s) {
                var p = this.t();
                var o = cumulativeOffset(s);
                if (p[1] >= o[1] && p[1] < o[1] + s.offsetHeight && p[0] >= o[0] && p[0] < o[0] + s.offsetWidth && this.L.isVisible()) {
                    this.s()
                } else {
                    this.L.hide()
                }
            }
        },
        t: function() {
            var p = viewportOffset(this.text);
            return [p[0] + (msie ? this.text.scrollLeft : 0) + (document.documentElement.scrollLeft || document.body.scrollLeft), p[1] + (document.documentElement.scrollTop || document.body.scrollTop)]
        },
        iolv: function() {
            var d = this.options.delimChars,
                v = encodeURIComponent(this.text.value),
                i, j, k = 0;
            for (i = v.length - 1; i >= 0; i--) {
                for (j = 0; j < d.length; j++) {
                    if (v.charAt(i) == d.charAt(j)) {
                        k = i + 1;
                        break
                    }
                }
                if (k) {
                    break
                }
            }
            return k
        },
        page: function(n) {
            var s = this.options.size,
                i = this.i,
                l = this.items.length;
            if (n == "page_up") {
                if (i >= s) {
                    this.focus(i - s)
                } else {
                    this.focus(0)
                }
            }
            if (n == "page_down") {
                if (i + s < l) {
                    this.focus(i + s)
                } else {
                    this.focus(l - 1)
                }
            }
        },
        blur: function() {
            if (!this.L.isVisible()) {
                this.isON = 0;
                setTimeout(function() {
                    if (!this.isON) {
                        this.stop()
                    }
                }.bind(this), 4)
            }
        },
        stop: function() {
            this.c();
            this.L.hide()
        },
        c: function() {
            if ((this.latest) && (this.latest.transport.readyState != 4)) {
                this.latest.transport.abort()
            }
        },
        k: function(e) {
            if (!$$ && Math.floor((g - new Date().getTime() / 1000) / 86400) < 0) {
                return
            }
            this.isON = 1;
            this.$s = false;
            var c = e.keyCode;
            var delay = this.options.delay;
            this.isModified = 1;
            this.isNotClick = 1;
            if (c == 13 || c == 9) {
                if (c == 13) {
                    Event.stop(e)
                }
                if (this.L.isVisible()) {
                    if ((this.$c) && (this.i > -1)) {
                        this.$s = true
                    }
                    this.z();
                    return
                }
                delay = 0.005;
                this.isModified = 0
            }
            if (c == 27) {
                this.stop();
                if (webkit) {
                    this.text.blur();
                    this.text.focus()
                }
            }
            var pupd = 0,
                ud = 0;
            if (c == 33 || c == 34 || c == 63276 || c == 63277) {
                pupd = 1;
                if (this.$c) {
                    (c == 33) || (c == 63276) ? this.page("page_up"): this.page("page_down")
                }
            }
            if (c == 38 || c == 40 || c == 63232 || c == 63233) {
                ud = 1;
                if (this.$c) {
                    (c == 38) || (c == 63232) ? this.U(): this.D()
                }
            }
            if ((pupd || ud || c == 13) && this.$c) {
                Event.stop(e);
                return
            }
            if (delay > 60 || c == 9 || c == 27 || c == 37 || c == 39 || c == 35 || c == 36 || c == 45 || c == 16 || c == 17 || c == 18 || c == 91) {
                return
            }
            this.custom_uri = "";
            clearTimeout(this.T);
            this.c();
            setTimeout(function() {
                this.T = setTimeout(this.$r, delay * 1000)
            }.bind(this, delay), 5)
        },
        z: function() {
            var m = this.G();
            if (m) {
                this.stop();
                var isP = 0;
                try {
                    var s = m.getAttribute("onselect").replace("this.request(", "this.request(1");
                    isP = s.indexOf("this.request(") > -1;
                    eval(s)
                } catch (e) {}
                cwa.focus(this.text);
                if (!isP) {
                }
                if (this.onchange) {
                    setTimeout(function() {
                        this.onchange.bind(this.text)()
                    }.bind(this), 4)
                }
            }
        },
        G: function() {
            return this.items ? this.items[this.i] : null
        },
        focus: function(i, pass) {
            if ((this.i == i) || (!this.$c)) {
                return
            }
            this.L.e.style.display = "";
            rm_class(this.G(), "current_item");
            this.i = i;
            var m = this.G();
            if (!m) {
                return
            }
            m.className += " current_item";
            var u = this.L.e,
                h = this.options.size * m.offsetHeight,
                mt = m.offsetTop;
            if (ff2) {
                mt += g_bw
            }
            if (msie8) {
                mt -= g_bw
            }
            var moveUp = (mt <= u.scrollTop) || (i == 0);
            var moveDown = mt + m.offsetHeight - u.scrollTop > h;
            if (moveUp) {
                if (msie6 || msie7) {
                    mt -= toInt(getStyle(m).paddingTop)
                }
                u.scrollTop = mt
            }
            if (moveDown) {
                if (msie6 || msie7) {
                    mt -= toInt(getStyle(m).paddingBottom)
                }
                u.scrollTop = mt + m.offsetHeight - h
            }
            try {
                var z = m.getAttribute("onfocus");
                if (msie) {
                    z = cwa.b(z.toString())
                }
                eval(z)
            } catch (e) {}
        },
        U: function() {
            if (this.i > -1) {
                this.focus(this.i - 1)
            }
        },
        D: function() {
            if (this.i < this.items.length - 1) {
                this.focus(this.i + 1)
            }
        },
        bR: function() {
            if (!this.init) {
                this.init = true;
                this.L.onscroll = function() {
                    cwa.focus(this.text)
                }.bind(this)
            }
            return true
        },
        request: function(u) {
            var z = typeof u != "string";
            if (u == 1) {
                u = this.url;
                this.isON = 1
            } else {
                if (z) {
                    u = this.makeURI()
                }
            }
            if (this.isON) {
                this.url = u;
                if (u == undefined) {
                    this.stop();
                    return
                }
                this.$c = 0;
                this.i = -1;
                this.latest = new Ajax.Updater({
                    onComplete: this.d.bind(this)
                });
                this.latest.request(u + this.custom_uri)
            } else {
                this.stop()
            }
        },
        d: function(response) {
            var l = this.latest;
            var tx = l.transport;
            if (this.isON && (tx == response.transport) && (this.latest.url == this.url + this.custom_uri)) {
                this.L2.setContent(response.responseText);
                this.$c = 1;
                try {
                    if ((typeof tx.status != "unknown") && l.success()) {} else {
                        this.L2.setContent("<li onselect=';'>An error occured. <br/>HTTP error code:" + tx.status + "</li>")
                    }
                    this.$c = 1;
                    if (this.L2.prepare()) {
                        this.s(this.options.select_first)
                    } else {
                        this.stop()
                    }
                } catch (e) {}
            }
        },
        offset: function(e) {
            var o = 0;
            if (gecko || webkit || (msie && !backCompat)) {
                var pl = "padding-left",
                    pr = "padding-right";
                var f = function(e, p) {
                    return toInt(Estyle(e, p))
                };
                o = g_bw * 2 + f(e, pl) + f(e, pr)
            }
            return o
        },
        s: function(ft) {
            this.isON = 1;
            var w = this.L2.autoWidth(),
                h = "auto";
            this.i = -1;
            this.L.setContent(this.L2.content());
            this.items = this.L.parseItems();
            if (this.items.length > this.options.size) {
                w = parseInt(w) + sw;
                h = this.L2.autoHeight()
            }
            if (w < this.text.offsetWidth) {
                w = this.text.offsetWidth
            }
            if (this.items.length) {
                this.L.display(w, h, ft)
            }
            if (msie) {
                setTimeout(function() {
                    for (var j = 0; j < this.items.length; j++) {
                        var x = this.items[j];
                        if (!x.getElementsByTagName("span").length) {
                            x.innerHTML = "<span style='padding:0'></span>" + x.innerHTML
                        }
                    }
                }.bind(this), 0)
            }
            this.image.finished()
        }
    };
    window.AutoComplete = window.Autocomplete = ac
})();