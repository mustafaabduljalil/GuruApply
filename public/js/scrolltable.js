!function(a){function b(a,b){if(8==k){var c=p.width(),d=i.debounce(function(){var a=p.width();c!=a&&(c=a,b())},1);p.on(a,d)}else p.on(a,i.debounce(b,1))}function c(b){var c=b[0],d=c.parentElement;do{var e=window.getComputedStyle(d).getPropertyValue("overflow");if("visible"!=e)break}while(d=d.parentElement);return a(d==document.body?[]:d)}function d(a){window&&window.console&&window.console.error&&window.console.error("jQuery.floatThead: "+a)}function e(a){var b=a.getBoundingClientRect();return b.width||b.right-b.left}function f(){var b=a('<div style="width:50px;height:50px;overflow-y:scroll;position:absolute;top:-400px;left:-200px;"><div style="height:100px;width:100%"></div>');a("body").append(b);var c=b.innerWidth(),d=a("div",b).innerWidth();return b.remove(),c-d}function g(a){if(a.dataTableSettings)for(var b=0;b<a.dataTableSettings.length;b++){var c=a.dataTableSettings[b].nTable;if(a[0]==c)return!0}return!1}function h(a,b,c){var d=c?"outerWidth":"width";if(n&&a.css("max-width")){var e=0;c&&(e+=parseInt(a.css("borderLeft"),10),e+=parseInt(a.css("borderRight"),10));for(var f=0;f<b.length;f++)e+=b.get(f).offsetWidth;return e}return a[d]()}a.floatThead=a.floatThead||{},a.floatThead.defaults={headerCellSelector:"tr:visible:first>*:visible",zIndex:1001,position:"auto",top:150,bottom:0,scrollContainer:function(){return a([])},responsiveContainer:function(){return a([])},getSizingRow:function(a){return a.find("tbody tr:visible:first>*:visible")},floatTableClass:"floatThead-table",floatWrapperClass:"floatThead-wrapper",floatContainerClass:"floatThead-container",copyTableClass:!0,enableAria:!1,autoReflow:!1,debug:!1,support:{bootstrap:!0,datatables:!0,jqueryUI:!0,perfectScrollbar:!0}};var i=window._,j="undefined"!=typeof MutationObserver,k=function(){for(var a=3,b=document.createElement("b"),c=b.all||[];a=1+a,b.innerHTML="<!--[if gt IE "+a+"]><i><![endif]-->",c[0];);return a>4?a:document.documentMode}(),l=/Gecko\//.test(navigator.userAgent),m=/WebKit\//.test(navigator.userAgent);k||l||m||(k=11);var n=function(){if(m){var b=a('<div style="width:0px"><table style="max-width:100%"><tr><th><div style="min-width:100px;">X</div></th></tr></table></div>');a("body").append(b);var c=0==b.find("table").width();return b.remove(),c}return!1},o=!l&&!k,p=a(window);if(!window.matchMedia){var q=window.onbeforeprint,r=window.onafterprint;window.onbeforeprint=function(){q&&q(),p.triggerHandler("beforeprint")},window.onafterprint=function(){r&&r(),p.triggerHandler("afterprint")}}a.fn.floatThead=function(l){if(l=l||{},!i&&(i=window._||a.floatThead._,!i))throw new Error("jquery.floatThead-slim.js requires underscore. You should use the non-lite version since you do not have underscore.");if(8>k)return this;var q=null;if(i.isFunction(n)&&(n=n()),i.isString(l)){var r=l,s=this;return this.filter("table").each(function(){var b=a(this),c=b.data("floatThead-lazy");c&&b.floatThead(c);var d=b.data("floatThead-attached");if(d&&i.isFunction(d[r])){var e=d[r]();"undefined"!=typeof e&&(s=e)}}),s}var t=a.extend({},a.floatThead.defaults||{},l);if(a.each(l,function(b){b in a.floatThead.defaults||!t.debug||d("Used ["+b+"] key to init plugin, but that param is not an option for the plugin. Valid options are: "+i.keys(a.floatThead.defaults).join(", "))}),t.debug){var u=a.fn.jquery.split(".");1==parseInt(u[0],10)&&parseInt(u[1],10)<=7&&d("jQuery version "+a.fn.jquery+" detected! This plugin supports 1.8 or better, or 1.7.x with jQuery UI 1.8.24 -> http://jqueryui.com/resources/download/jquery-ui-1.8.24.zip")}return this.filter(":not(."+t.floatTableClass+")").each(function(){function l(a){return a+".fth-"+G+".floatTHead"}function n(){var b=0;if(I.children("tr:visible").each(function(){b+=a(this).outerHeight(!0)}),"collapse"==H.css("border-collapse")){var c=parseInt(H.css("border-top-width"),10),d=parseInt(H.find("thead tr:first").find(">*:first").css("border-top-width"),10);c>d&&(b-=c/2)}ib.outerHeight(b),jb.outerHeight(b)}function r(){var a=h(H,mb,!0),b=T?S:Q,c=b.width()||a,d="hidden"!=b.css("overflow-y")?c-N.vertical:c;if(fb.width(d),R){var e=100*a/d;ab.css("width",e+"%")}else ab.outerWidth(a)}function s(){K=(i.isFunction(t.top)?t.top(H):t.top)||0,L=(i.isFunction(t.bottom)?t.bottom(H):t.bottom)||0}function u(){var b,c=I.find(t.headerCellSelector);if(db?b=cb.find("col").length:(b=0,c.each(function(){b+=parseInt(a(this).attr("colspan")||1,10)})),b!=P){P=b;for(var d,e=[],f=[],g=[],h=0;b>h;h++)e.push(t.enableAria&&(d=c.eq(h).text())?'<th scope="col" class="floatThead-col">'+d+"</th>":'<th class="floatThead-col"/>'),f.push("<col/>"),g.push("<fthtd style='display:table-cell;height:0;width:auto;'/>");f=f.join(""),e=e.join(""),o&&(g=g.join(""),eb.html(g),mb=eb.find("fthtd")),ib.html(e),jb=ib.find("th"),db||cb.html(f),kb=cb.find("col"),bb.html(f),lb=bb.find("col")}return b}function v(){if(!M){if(M=!0,U){var a=h(H,mb,!0),b=$.width();a>b&&H.css("minWidth",a)}H.css(pb),ab.css(pb),ab.append(I),J.before(hb),n()}}function w(){M&&(M=!1,U&&H.width(rb),hb.detach(),H.prepend(I),H.css(qb),ab.css(qb),H.css("minWidth",sb),H.css("minWidth",h(H,mb)))}function x(a){tb!=a&&(tb=a,H.triggerHandler("floatThead",[a,fb]))}function y(a){U!=a&&(U=a,fb.css({position:U?"absolute":"fixed"}))}function z(a,b,c,d){return o?c:d?t.getSizingRow(a,b,c):b}function A(){var a,b=u();return function(){var c=fb.scrollLeft();kb=cb.find("col");var d=z(H,kb,mb,k);if(d.length==b&&b>0){if(!db)for(a=0;b>a;a++)kb.eq(a).css("width","");w();var f=[];for(a=0;b>a;a++)f[a]=e(d.get(a));for(a=0;b>a;a++)lb.eq(a).width(f[a]),kb.eq(a).width(f[a]);v()}else ab.append(I),H.css(qb),ab.css(qb),n();fb.scrollLeft(c),H.triggerHandler("reflowed",[fb])}}function B(a){var b=Q.css("border-"+a+"-width"),c=0;return b&&~b.indexOf("px")&&(c=parseInt(b,10)),c}function C(){return"auto"==S.css("overflow-x")}function D(){var a,b=Q.scrollTop(),c=0,d=W?V.outerHeight(!0):0,e=X?d:-d,f=fb.height(),g=H.offset(),h=0,i=0;if(R){var j=Q.offset();c=g.top-j.top+b,W&&X&&(c+=d),h=B("left"),i=B("top"),c-=i}else a=g.top-K-f+L+N.horizontal;var k=p.scrollTop(),l=p.scrollLeft(),n=(C()?S:Q).scrollLeft();return function(j){T=C();var o=H[0].offsetWidth<=0&&H[0].offsetHeight<=0;if(!o&&gb)return gb=!1,setTimeout(function(){H.triggerHandler("reflow")},1),null;if(o&&(gb=!0,!U))return null;if("windowScroll"==j)k=p.scrollTop(),l=p.scrollLeft();else if("containerScroll"==j)if(S.length){if(!T)return;n=S.scrollLeft()}else b=Q.scrollTop(),n=Q.scrollLeft();else"init"!=j&&(k=p.scrollTop(),l=p.scrollLeft(),b=Q.scrollTop(),n=(T?S:Q).scrollLeft());if(!m||!(0>k||0>l)){if(_)y("windowScrollDone"==j?!0:!1);else if("windowScrollDone"==j)return null;g=H.offset(),W&&X&&(g.top+=d);var q,r,s=H.outerHeight();if(R&&U){if(c>=b){var t=c-b+i;q=t>0?t:0,x(!1)}else q=Z?i:b,x(!0);r=h}else!R&&U?(k>a+s+e?q=s-f+e:g.top>=k+K?(q=0,w(),x(!1)):(q=K+k-g.top+c+(X?d:0),v(),x(!0)),r=n):R&&!U?(c>b||b-c>s?(q=g.top-k,w(),x(!1)):(q=g.top+b-k-c,v(),x(!0)),r=g.left+n-l):R||U||(k>a+s+e?q=s+K-k+a+e:g.top>k+K?(q=g.top-k,v(),x(!1)):(q=K,x(!0)),r=g.left+n-l);return{top:q,left:r}}}}function E(){var a=null,b=null,c=null;return function(d,e,f){null==d||a==d.top&&b==d.left||(fb.css({top:d.top,left:d.left}),a=d.top,b=d.left),e&&r(),f&&n();var g=(T?S:Q).scrollLeft();U&&c==g||(fb.scrollLeft(g),c=g)}}function F(){if(Q.length)if(t.support&&t.support.perfectScrollbar&&Q.data().perfectScrollbar)N={horizontal:0,vertical:0};else{if("scroll"==Q.css("overflow-x"))N.horizontal=O;else{var a=Q.width(),b=h(H,mb),c=e>d?O:0;N.horizontal=b>a-c?O:0}if("scroll"==Q.css("overflow-y"))N.vertical=O;else{var d=Q.height(),e=H.height(),f=b>a?O:0;N.vertical=e>d-f?O:0}}}var G=i.uniqueId(),H=a(this);if(H.data("floatThead-attached"))return!0;if(!H.is("table"))throw new Error('jQuery.floatThead must be run on a table element. ex: $("table").floatThead();');j=t.autoReflow&&j;var I=H.children("thead:first"),J=H.children("tbody:first");if(0==I.length||0==J.length)return H.data("floatThead-lazy",t),void H.unbind("reflow").one("reflow",function(){H.floatThead(t)});H.data("floatThead-lazy")&&H.unbind("reflow"),H.data("floatThead-lazy",!1);var K,L,M=!0,N={vertical:0,horizontal:0},O=f(),P=0;t.scrollContainer===!0&&(t.scrollContainer=c);var Q=t.scrollContainer(H)||a([]),R=Q.length>0,S=R?a([]):t.responsiveContainer(H)||a([]),T=C(),U=null;"undefined"!=typeof t.useAbsolutePositioning&&(t.position="auto",t.useAbsolutePositioning&&(t.position=t.useAbsolutePositioning?"absolute":"fixed"),d("option 'useAbsolutePositioning' has been removed in v1.3.0, use `position:'"+t.position+"'` instead. See docs for more info: http://mkoryak.github.io/floatThead/#options")),"undefined"!=typeof t.scrollingTop&&(t.top=t.scrollingTop,d("option 'scrollingTop' has been renamed to 'top' in v1.3.0. See docs for more info: http://mkoryak.github.io/floatThead/#options")),"undefined"!=typeof t.scrollingBottom&&(t.bottom=t.scrollingBottom,d("option 'scrollingBottom' has been renamed to 'bottom' in v1.3.0. See docs for more info: http://mkoryak.github.io/floatThead/#options")),"auto"==t.position?U=null:"fixed"==t.position?U=!1:"absolute"==t.position?U=!0:t.debug&&d('Invalid value given to "position" option, valid is "fixed", "absolute" and "auto". You passed: ',t.position),null==U&&(U=R);var V=H.find("caption"),W=1==V.length;if(W)var X="top"===(V.css("caption-side")||V.attr("align")||"top");var Y=a('<fthfoot style="display:table-footer-group;border-spacing:0;height:0;border-collapse:collapse;visibility:hidden"/>'),Z=!1,$=a([]),_=9>=k&&!R&&U,ab=a("<table/>"),bb=a("<colgroup/>"),cb=H.children("colgroup:first"),db=!0;0==cb.length&&(cb=a("<colgroup/>"),db=!1);var eb=a('<fthtr style="display:table-row;border-spacing:0;height:0;border-collapse:collapse"/>'),fb=a('<div style="overflow: hidden;" aria-hidden="true"></div>'),gb=!1,hb=a("<thead/>"),ib=a('<tr class="size-row"/>'),jb=a([]),kb=a([]),lb=a([]),mb=a([]);hb.append(ib),H.prepend(cb),o&&(Y.append(eb),H.append(Y)),ab.append(bb),fb.append(ab),t.copyTableClass&&ab.attr("class",H.attr("class")),ab.attr({cellpadding:H.attr("cellpadding"),cellspacing:H.attr("cellspacing"),border:H.attr("border")});var nb=H.css("display");if(ab.css({borderCollapse:H.css("borderCollapse"),border:H.css("border"),display:nb}),R||ab.css("width","auto"),"none"==nb&&(gb=!0),ab.addClass(t.floatTableClass).css({margin:0,"border-bottom-width":0}),U){var ob=function(a,b){var c=a.css("position"),d="relative"==c||"absolute"==c,e=a;if(!d||b){var f={paddingLeft:a.css("paddingLeft"),paddingRight:a.css("paddingRight")};fb.css(f),e=a.data("floatThead-containerWrap")||a.wrap("<div class='"+t.floatWrapperClass+"' style='position: relative; clear:both;'></div>").parent(),a.data("floatThead-containerWrap",e),Z=!0}return e};R?($=ob(Q,!0),$.prepend(fb)):($=ob(H),H.before(fb))}else H.before(fb);fb.css({position:U?"absolute":"fixed",marginTop:0,top:U?0:"auto",zIndex:t.zIndex}),fb.addClass(t.floatContainerClass),s();var pb={"table-layout":"fixed"},qb={"table-layout":H.css("tableLayout")||"auto"},rb=H[0].style.width||"",sb=H.css("minWidth")||"",tb=!1;F();var ub,vb=function(){(ub=A())()};vb();var wb=D(),xb=E();xb(wb("init"),!0);var yb=i.debounce(function(){xb(wb("windowScrollDone"),!1)},1),zb=function(){xb(wb("windowScroll"),!1),_&&yb()},Ab=function(){xb(wb("containerScroll"),!1)},Bb=function(){H.is(":hidden")||(s(),F(),vb(),wb=D(),(xb=E())(wb("resize"),!0,!0))},Cb=i.debounce(function(){H.is(":hidden")||(F(),s(),vb(),wb=D(),xb(wb("reflow"),!0))},1),Db=function(){H.floatThead("destroy",[!0])},Eb=function(){H.floatThead(t)},Fb=function(a){a.matches?Db():Eb()};if(window.matchMedia?window.matchMedia("print").addListener(Fb):(p.on("beforeprint",Db),p.on("afterprint",Eb)),R?U?Q.on(l("scroll"),Ab):(Q.on(l("scroll"),Ab),p.on(l("scroll"),zb)):(S.on(l("scroll"),Ab),p.on(l("scroll"),zb)),p.on(l("load"),Cb),b(l("resize"),Bb),H.on("reflow",Cb),t.support&&t.support.datatables&&g(H)&&H.on("filter",Cb).on("sort",Cb).on("page",Cb),t.support&&t.support.bootstrap&&p.on(l("shown.bs.tab"),Cb),t.support&&t.support.jqueryUI&&p.on(l("tabsactivate"),Cb),j){var Gb=null;i.isFunction(t.autoReflow)&&(Gb=t.autoReflow(H,Q)),Gb||(Gb=Q.length?Q[0]:H[0]),q=new MutationObserver(function(a){for(var b=function(a){return a&&a[0]&&("THEAD"==a[0].nodeName||"TD"==a[0].nodeName||"TH"==a[0].nodeName)},c=0;c<a.length;c++)if(!b(a[c].addedNodes)&&!b(a[c].removedNodes)){Cb();break}}),q.observe(Gb,{childList:!0,subtree:!0})}H.data("floatThead-attached",{destroy:function(a,b){var c=".fth-"+G;w(),H.css(qb),cb.remove(),o&&Y.remove(),hb.parent().length&&hb.replaceWith(I),x(!1),j&&(q.disconnect(),q=null),H.off("reflow reflowed"),Q.off(c),S.off(c),Z&&(Q.length?Q.unwrap():H.unwrap()),R?Q.data("floatThead-containerWrap",!1):H.data("floatThead-containerWrap",!1),H.css("minWidth",sb),fb.remove(),H.data("floatThead-attached",!1),p.off(c),b||(window.matchMedia&&window.matchMedia("print").removeListener(Fb),Db=Eb=function(){})},reflow:function(){Cb()},setHeaderHeight:function(){n()},getFloatContainer:function(){return fb},getRowGroups:function(){return M?fb.find(">table>thead").add(H.children("tbody,tfoot")):H.children("thead,tbody,tfoot")}})}),this}}(jQuery),function(a){a.floatThead=a.floatThead||{},a.floatThead._=window._||function(){var b={},c=Object.prototype.hasOwnProperty,d=["Arguments","Function","String","Number","Date","RegExp"];b.has=function(a,b){return c.call(a,b)},b.keys=function(a){if(a!==Object(a))throw new TypeError("Invalid object");var c=[];for(var d in a)b.has(a,d)&&c.push(d);return c};var e=0;return b.uniqueId=function(a){var b=++e+"";return a?a+b:b},a.each(d,function(){var a=this;b["is"+a]=function(b){return Object.prototype.toString.call(b)=="[object "+a+"]"}}),b.debounce=function(a,b,c){var d,e,f,g,h;return function(){f=this,e=arguments,g=new Date;var i=function(){var j=new Date-g;b>j?d=setTimeout(i,b-j):(d=null,c||(h=a.apply(f,e)))},j=c&&!d;return d||(d=setTimeout(i,b)),j&&(h=a.apply(f,e)),h}},b}()}(jQuery);