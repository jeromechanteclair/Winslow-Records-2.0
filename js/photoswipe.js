/*
 PhotoSwipe - v4.1.1 - 2015-12-24
 http://photoswipe.com
 Copyright (c) 2015 Dmitry Semenov; */
(function(m,sa){"function"===typeof define&&define.amd?define(sa):"object"===typeof exports?module.exports=sa():m.PhotoSwipe=sa()})(this,function(){return function(m,sa,rc,sc){var f={features:null,bind:function(a,b,c,e){e=(e?"remove":"add")+"EventListener";b=b.split(" ");for(var d=0;d<b.length;d++)if(b[d])a[e](b[d],c,!1)},isArray:function(a){return a instanceof Array},createEl:function(a,b){var c=document.createElement(b||"div");a&&(c.className=a);return c},getScrollY:function(){var a=window.pageYOffset;
return void 0!==a?a:document.documentElement.scrollTop},unbind:function(a,b,c){f.bind(a,b,c,!0)},removeClass:function(a,b){a.className=a.className.replace(new RegExp("(\\s|^)"+b+"(\\s|$)")," ").replace(/^\s\s*/,"").replace(/\s\s*$/,"")},addClass:function(a,b){f.hasClass(a,b)||(a.className+=(a.className?" ":"")+b)},hasClass:function(a,b){return a.className&&(new RegExp("(^|\\s)"+b+"(\\s|$)")).test(a.className)},getChildByClass:function(a,b){for(var c=a.firstChild;c;){if(f.hasClass(c,b))return c;c=
c.nextSibling}},arraySearch:function(a,b,c){for(var e=a.length;e--;)if(a[e][c]===b)return e;return-1},extend:function(a,b,c){for(var e in b)!b.hasOwnProperty(e)||c&&a.hasOwnProperty(e)||(a[e]=b[e])},easing:{sine:{out:function(a){return Math.sin(Math.PI/2*a)},inOut:function(a){return-(Math.cos(Math.PI*a)-1)/2}},cubic:{out:function(a){return--a*a*a+1}}},detectFeatures:function(){if(f.features)return f.features;var a=f.createEl().style,b="",c={};c.oldIE=document.all&&!document.addEventListener;c.touch=
"ontouchstart"in window;window.requestAnimationFrame&&(c.raf=window.requestAnimationFrame,c.caf=window.cancelAnimationFrame);c.pointerEvent=navigator.pointerEnabled||navigator.msPointerEnabled;if(!c.pointerEvent){b=navigator.userAgent;if(/iP(hone|od)/.test(navigator.platform)){var e=navigator.appVersion.match(/OS (\d+)_(\d+)_?(\d+)?/);e&&0<e.length&&(e=parseInt(e[1],10),1<=e&&8>e&&(c.isOldIOSPhone=!0))}e=(e=b.match(/Android\s([0-9\.]*)/))?e[1]:0;e=parseFloat(e);1<=e&&(4.4>e&&(c.isOldAndroid=!0),c.androidVersion=
e);c.isMobileOpera=/opera mini|opera mobi/i.test(b)}e=["transform","perspective","animationName"];for(var d=["","webkit","Moz","ms","O"],r,h,g=0;4>g;g++){b=d[g];for(var l=0;3>l;l++)r=e[l],h=b+(b?r.charAt(0).toUpperCase()+r.slice(1):r),!c[r]&&h in a&&(c[r]=h);b&&!c.raf&&(b=b.toLowerCase(),c.raf=window[b+"RequestAnimationFrame"],c.raf&&(c.caf=window[b+"CancelAnimationFrame"]||window[b+"CancelRequestAnimationFrame"]))}if(!c.raf){var k=0;c.raf=function(a){var b=(new Date).getTime(),c=Math.max(0,16-(b-
k)),e=window.setTimeout(function(){a(b+c)},c);k=b+c;return e};c.caf=function(a){clearTimeout(a)}}c.svg=!!document.createElementNS&&!!document.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect;return f.features=c}};f.detectFeatures();f.features.oldIE&&(f.bind=function(a,b,c,e){b=b.split(" ");for(var d=(e?"detach":"attach")+"Event",f,h=function(){c.handleEvent.call(c)},g=0;g<b.length;g++)if(f=b[g])if("object"===typeof c&&c.handleEvent){if(!e)c["oldIE"+f]=h;else if(!c["oldIE"+f])return!1;
a[d]("on"+f,c["oldIE"+f])}else a[d]("on"+f,c)});var d=this,g={allowPanToNext:!0,spacing:.12,bgOpacity:1,mouseUsed:!1,loop:!0,pinchToClose:!0,closeOnScroll:!0,closeOnVerticalDrag:!0,verticalDragRange:.75,hideAnimationDuration:333,showAnimationDuration:333,showHideOpacity:!1,focus:!0,escKey:!0,arrowKeys:!0,mainScrollEndFriction:.35,panEndFriction:.35,isClickableElement:function(a){return"A"===a.tagName},getDoubleTapZoom:function(a,b){return a?1:.7>b.initialZoomLevel?1:1.33},maxSpreadZoom:1.33,modal:!0,
scaleMode:"fit"};f.extend(g,sc);var W=function(){return{x:0,y:0}},ta,Qb,ob,l,Rb,P,K=W(),ua=W(),h=W(),Fa,Wa,z,A={},q,ea,pb,qb,rb,Xa,X=0,va={},E=W(),u,Sb,L=0,Ya,Za,Ga,$a,wa,fa,ab=!0,Q,sb=[],bb,tb,Tb,Ub,ub,ha,p,Ha={},ia=!1,Ia=function(a,b){f.extend(d,b.publicMethods);sb.push(a)},cb=function(a){var b=F();return a>b-1?a-b:0>a?b+a:a},Ja={},t=function(a,b){Ja[a]||(Ja[a]=[]);return Ja[a].push(b)},n=function(a){var b=Ja[a];if(b){var c=Array.prototype.slice.call(arguments);c.shift();for(var e=0;e<b.length;e++)b[e].apply(d,
c)}},M=function(){return(new Date).getTime()},R=function(a){db=a;d.bg.style.opacity=a*g.bgOpacity},Vb=function(a,b,c,e,f){if(!ia||f&&f!==d.currItem)e/=f?f.fitRatio:d.currItem.fitRatio;a[wa]=pb+b+"px, "+c+"px"+qb+" scale("+e+")"},v=function(a){S&&(a&&(q>d.currItem.fitRatio?ia||(ja(d.currItem,!1,!0),ia=!0):ia&&(ja(d.currItem),ia=!1)),Vb(S,h.x,h.y,q))},Ka=function(a){a.container&&Vb(a.container.style,a.initialPosition.x,a.initialPosition.y,a.initialZoomLevel,a)},xa=function(a,b){b[wa]=pb+a+"px, 0px"+
qb},eb=function(a,b){if(!g.loop&&b){var c=l+(E.x*X-a)/E.x,e=Math.round(a-T.x);if(0>c&&0<e||c>=F()-1&&0>e)a=T.x+e*g.mainScrollEndFriction}T.x=a;xa(a,Rb)},vb=function(a,b){var c=La[a]-va[a];return ua[a]+K[a]+c-b/ea*c},B=function(a,b){a.x=b.x;a.y=b.y;b.id&&(a.id=b.id)},Wb=function(a){a.x=Math.round(a.x);a.y=Math.round(a.y)},wb=null,xb=function(){wb&&(f.unbind(document,"mousemove",xb),f.addClass(m,"pswp--has_mouse"),g.mouseUsed=!0,n("mouseUsed"));wb=setTimeout(function(){wb=null},100)},yb=function(a,
b){var c=Ma(d.currItem,A,a);b&&(k=c);return c},Xb=function(a){a||(a=d.currItem);return a.initialZoomLevel},Yb=function(a){a||(a=d.currItem);return 0<a.w?g.maxSpreadZoom:1},Zb=function(a,b,c,e){if(e===d.currItem.initialZoomLevel)return c[a]=d.currItem.initialPosition[a],!0;c[a]=vb(a,e);return c[a]>b.min[a]?(c[a]=b.min[a],!0):c[a]<b.max[a]?(c[a]=b.max[a],!0):!1},tc=function(){wa?(pb="translate"+(p.perspective&&!Q?"3d(":"("),qb=p.perspective?", 0px)":")"):(wa="left",f.addClass(m,"pswp--ie"),xa=function(a,
b){b.left=a+"px"},Ka=function(a){var b=1<a.fitRatio?1:a.fitRatio,c=a.container.style,e=b*a.h;c.width=b*a.w+"px";c.height=e+"px";c.left=a.initialPosition.x+"px";c.top=a.initialPosition.y+"px"},v=function(){if(S){var a=S,b=d.currItem,c=1<b.fitRatio?1:b.fitRatio,e=c*b.h;a.width=c*b.w+"px";a.height=e+"px";a.left=h.x+"px";a.top=h.y+"px"}})},uc=function(a){var b="";g.escKey&&27===a.keyCode?b="close":g.arrowKeys&&(37===a.keyCode?b="prev":39===a.keyCode&&(b="next"));!b||a.ctrlKey||a.altKey||a.shiftKey||a.metaKey||
(a.preventDefault?a.preventDefault():a.returnValue=!1,d[b]())},vc=function(a){a&&(ya||ka||C||Na)&&(a.preventDefault(),a.stopPropagation())},$b=function(){d.setScrollOffset(0,f.getScrollY())},G={},za=0,Oa=function(a){G[a]&&(G[a].raf&&tb(G[a].raf),za--,delete G[a])},zb=function(a){G[a]&&Oa(a);G[a]||(za++,G[a]={})},Pa=function(){for(var a in G)G.hasOwnProperty(a)&&Oa(a)},Qa=function(a,b,c,e,d,f,h){var g=M(),r;zb(a);var V=function(){G[a]&&(r=M()-g,r>=e?(Oa(a),f(c),h&&h()):(f((c-b)*d(r/e)+b),G[a].raf=
bb(V)))};V()},wc={shout:n,listen:t,viewportSize:A,options:g,isMainScrollAnimating:function(){return C},getZoomLevel:function(){return q},getCurrentIndex:function(){return l},isDragging:function(){return N},isZooming:function(){return U},setScrollOffset:function(a,b){va.x=a;ha=va.y=b;n("updateScrollOffset",va)},applyZoomPan:function(a,b,c,e){h.x=b;h.y=c;q=a;v(e)},init:function(){if(!ta&&!Qb){d.framework=f;d.template=m;d.bg=f.getChildByClass(m,"pswp__bg");Tb=m.className;ta=!0;p=f.detectFeatures();bb=
p.raf;tb=p.caf;wa=p.transform;ub=p.oldIE;d.scrollWrap=f.getChildByClass(m,"pswp__scroll-wrap");d.container=f.getChildByClass(d.scrollWrap,"pswp__container");Rb=d.container.style;d.itemHolders=u=[{el:d.container.children[0],wrap:0,index:-1},{el:d.container.children[1],wrap:0,index:-1},{el:d.container.children[2],wrap:0,index:-1}];u[0].el.style.display=u[2].el.style.display="none";tc();z={resize:d.updateSize,scroll:$b,keydown:uc,click:vc};var a=p.isOldIOSPhone||p.isOldAndroid||p.isMobileOpera;p.animationName&&
p.transform&&!a||(g.showAnimationDuration=g.hideAnimationDuration=0);for(a=0;a<sb.length;a++)d["init"+sb[a]]();sa&&(d.ui=new sa(d,f)).init();n("firstUpdate");l=l||g.index||0;if(isNaN(l)||0>l||l>=F())l=0;d.currItem=Y(l);if(p.isOldIOSPhone||p.isOldAndroid)ab=!1;m.setAttribute("aria-hidden","false");g.modal&&(ab?m.style.position="fixed":(m.style.position="absolute",m.style.top=f.getScrollY()+"px"));void 0===ha&&(n("initialLayout"),ha=Ub=f.getScrollY());a="pswp--open ";g.mainClass&&(a+=g.mainClass+" ");
g.showHideOpacity&&(a+="pswp--animate_opacity ");a+=Q?"pswp--touch":"pswp--notouch";a+=p.animationName?" pswp--css_animation":"";a+=p.svg?" pswp--svg":"";f.addClass(m,a);d.updateSize();P=-1;L=null;for(a=0;3>a;a++)xa((a+P)*E.x,u[a].el.style);ub||f.bind(d.scrollWrap,Wa,d);t("initialZoomInEnd",function(){d.setContent(u[0],l-1);d.setContent(u[2],l+1);u[0].el.style.display=u[2].el.style.display="block";g.focus&&m.focus();f.bind(document,"keydown",d);p.transform&&f.bind(d.scrollWrap,"click",d);g.mouseUsed||
f.bind(document,"mousemove",xb);f.bind(window,"resize scroll",d);n("bindEvents")});d.setContent(u[1],l);d.updateCurrItem();n("afterInit");ab||(rb=setInterval(function(){za||N||U||q!==d.currItem.initialZoomLevel||d.updateSize()},1E3));f.addClass(m,"pswp--visible")}},close:function(){ta&&(ta=!1,Qb=!0,n("close"),f.unbind(window,"resize",d),f.unbind(window,"scroll",z.scroll),f.unbind(document,"keydown",d),f.unbind(document,"mousemove",xb),p.transform&&f.unbind(d.scrollWrap,"click",d),N&&f.unbind(window,
Fa,d),n("unbindEvents"),ac(d.currItem,null,!0,d.destroy))},destroy:function(){n("destroy");la&&clearTimeout(la);m.setAttribute("aria-hidden","true");m.className=Tb;rb&&clearInterval(rb);f.unbind(d.scrollWrap,Wa,d);f.unbind(window,"scroll",d);Ab();Pa();Ja=null},panTo:function(a,b,c){c||(a>k.min.x?a=k.min.x:a<k.max.x&&(a=k.max.x),b>k.min.y?b=k.min.y:b<k.max.y&&(b=k.max.y));h.x=a;h.y=b;v()},handleEvent:function(a){a=a||window.event;if(z[a.type])z[a.type](a)},goTo:function(a){a=cb(a);var b=a-l;L=b;l=
a;d.currItem=Y(l);X-=b;eb(E.x*X);Pa();C=!1;d.updateCurrItem()},next:function(){d.goTo(l+1)},prev:function(){d.goTo(l-1)},updateCurrZoomItem:function(a){a&&n("beforeChange",0);if(u[1].el.children.length){var b=u[1].el.children[0];S=f.hasClass(b,"pswp__zoom-wrap")?b.style:null}else S=null;k=d.currItem.bounds;ea=q=d.currItem.initialZoomLevel;h.x=k.center.x;h.y=k.center.y;a&&n("afterChange")},invalidateCurrItems:function(){Xa=!0;for(var a=0;3>a;a++)u[a].item&&(u[a].item.needsUpdate=!0)},updateCurrItem:function(a){if(0!==
L){var b=Math.abs(L);if(!(a&&2>b)){d.currItem=Y(l);ia=!1;n("beforeChange",L);3<=b&&(P+=L+(0<L?-3:3),b=3);for(var c=0;c<b;c++)0<L?(a=u.shift(),u[2]=a,P++,xa((P+2)*E.x,a.el.style),d.setContent(a,l-b+c+1+1)):(a=u.pop(),u.unshift(a),P--,xa(P*E.x,a.el.style),d.setContent(a,l+b-c-1-1));S&&1===Math.abs(L)&&(b=Y(Sb),b.initialZoomLevel!==q&&(Ma(b,A),ja(b),Ka(b)));L=0;d.updateCurrZoomItem();Sb=l;n("afterChange")}}},updateSize:function(a){if(!ab&&g.modal){var b=f.getScrollY();ha!==b&&(m.style.top=b+"px",ha=
b);if(!a&&Ha.x===window.innerWidth&&Ha.y===window.innerHeight)return;Ha.x=window.innerWidth;Ha.y=window.innerHeight;m.style.height=Ha.y+"px"}A.x=d.scrollWrap.clientWidth;A.y=d.scrollWrap.clientHeight;$b();E.x=A.x+Math.round(A.x*g.spacing);E.y=A.y;eb(E.x*X);n("beforeResize");if(void 0!==P){for(var c,e=0;3>e;e++)a=u[e],xa((e+P)*E.x,a.el.style),c=l+e-1,g.loop&&2<F()&&(c=cb(c)),(b=Y(c))&&(Xa||b.needsUpdate||!b.bounds)?(d.cleanSlide(b),d.setContent(a,c),1===e&&(d.currItem=b,d.updateCurrZoomItem(!0)),b.needsUpdate=
!1):-1===a.index&&0<=c&&d.setContent(a,c),b&&b.container&&(Ma(b,A),ja(b),Ka(b));Xa=!1}ea=q=d.currItem.initialZoomLevel;if(k=d.currItem.bounds)h.x=k.center.x,h.y=k.center.y,v(!0);n("resize")},zoomTo:function(a,b,c,e,d){b&&(ea=q,La.x=Math.abs(b.x)-h.x,La.y=Math.abs(b.y)-h.y,B(ua,h));b=yb(a,!1);var g={};Zb("x",b,g,a);Zb("y",b,g,a);var V=q,l=h.x,k=h.y;Wb(g);b=function(b){1===b?(q=a,h.x=g.x,h.y=g.y):(q=(a-V)*b+V,h.x=(g.x-l)*b+l,h.y=(g.y-k)*b+k);d&&d(b);v(1===b)};c?Qa("customZoomTo",0,1,c,e||f.easing.sine.inOut,
b):b(1)}},bc,fb,w={},O={},x={},D={},Aa={},Z=[],ma={},Ra,na=[],Bb,Cb,Db,Na,Sa,gb=0,Ta=W(),Eb=0,N,Fb,ka,ya,hb,oa,H,U,cc,k,T=W(),S,C,La=W(),pa=W(),aa,Gb,ib,db,jb,dc=function(a,b){Bb=Math.abs(a.x-b.x);Cb=Math.abs(a.y-b.y);return Math.sqrt(Bb*Bb+Cb*Cb)},Ab=function(){hb&&(tb(hb),hb=null)},ec=function(){if(N&&(hb=bb(ec),H)){var a=H.length;if(0!==a)if(B(w,H[0]),x.x=w.x-D.x,x.y=w.y-D.y,U&&1<a){D.x=w.x;D.y=w.y;if(a=!x.x&&!x.y)a=H[1],a=a.x===O.x&&a.y===O.y;if(!a){B(O,H[1]);ka||(ka=!0,n("zoomGestureStarted"));
a=dc(w,O);a=1/cc*a*ea;a>d.currItem.initialZoomLevel+d.currItem.initialZoomLevel/15&&(jb=!0);var b=Xb(),c=Yb();a<b?g.pinchToClose&&!jb&&ea<=d.currItem.initialZoomLevel?(b=1-(b-a)/(b/1.2),R(b),n("onPinchClose",b),ib=!0):(a=(b-a)/b,1<a&&(a=1),a=b-b/3*a):a>c&&(a=(a-c)/(6*b),1<a&&(a=1),a=c+a*b);Ta.x=.5*(w.x+O.x);Ta.y=.5*(w.y+O.y);K.x+=Ta.x-pa.x;K.y+=Ta.y-pa.y;B(pa,Ta);h.x=vb("x",a);h.y=vb("y",a);Db=a>q;q=a;v()}}else if(aa&&(Gb&&(Gb=!1,10<=Math.abs(x.x)&&(x.x-=H[0].x-Aa.x),10<=Math.abs(x.y)&&(x.y-=H[0].y-
Aa.y)),D.x=w.x,D.y=w.y,0!==x.x||0!==x.y))if("v"===aa&&g.closeOnVerticalDrag&&"fit"===g.scaleMode&&q===d.currItem.initialZoomLevel)K.y+=x.y,h.y+=x.y,a=fc(),Na=!0,n("onVerticalDrag",a),R(a),v();else{a=M();b=w.x;c=w.y;if(50<a-fb){var e=2<na.length?na.shift():{};e.x=b;e.y=c;na.push(e);fb=a}ya=!0;k=d.currItem.bounds;gc("x",x)||(gc("y",x),Wb(h),v())}}},hc=function(a,b){return!a||a===document||a.getAttribute("class")&&-1<a.getAttribute("class").indexOf("pswp__scroll-wrap")?!1:b(a)?a:hc(a.parentNode,b)},
Hb={},ic=function(a,b){Hb.prevent=!hc(a.target,g.isClickableElement);n("preventDragEvent",a,b,Hb);return Hb.prevent},jc=function(a,b){b.x=a.pageX;b.y=a.pageY;b.id=a.identifier;return b},fc=function(){return 1-Math.abs((h.y-d.currItem.initialPosition.y)/(A.y/2))},Ua={},xc={},ba=[],kb,Ib=function(a){for(;0<ba.length;)ba.pop();fa?(kb=0,Z.forEach(function(a){0===kb?ba[0]=a:1===kb&&(ba[1]=a);kb++})):-1<a.type.indexOf("touch")?a.touches&&0<a.touches.length&&(ba[0]=jc(a.touches[0],Ua),1<a.touches.length&&
(ba[1]=jc(a.touches[1],xc))):(Ua.x=a.pageX,Ua.y=a.pageY,Ua.id="",ba[0]=Ua);return ba},gc=function(a,b){var c=h[a]+b[a],e=0<b[a],f=T.x+b.x,r=T.x-ma.x,l;var n=c>k.min[a]||c<k.max[a]?g.panEndFriction:1;c=h[a]+b[a]*n;if(g.allowPanToNext||q===d.currItem.initialZoomLevel){if(!S)var m=f;else if("h"===aa&&"x"===a&&!ka)if(e){if(c>k.min[a]){n=g.panEndFriction;var p=k.min[a]-ua[a]}(0>=p||0>r)&&1<F()?(m=f,0>r&&f>ma.x&&(m=ma.x)):k.min.x!==k.max.x&&(l=c)}else c<k.max[a]&&(n=g.panEndFriction,p=ua[a]-k.max[a]),(0>=
p||0<r)&&1<F()?(m=f,0<r&&f<ma.x&&(m=ma.x)):k.min.x!==k.max.x&&(l=c);if("x"===a)return void 0!==m&&(eb(m,!0),oa=m===ma.x?!1:!0),k.min.x!==k.max.x&&(void 0!==l?h.x=l:oa||(h.x+=b.x*n)),void 0!==m}C||oa||q>d.currItem.fitRatio&&(h[a]+=b[a]*n)},yc=function(a){if(!("mousedown"===a.type&&0<a.button))if(Ba)a.preventDefault();else if(!Sa||"mousedown"!==a.type){ic(a,!0)&&a.preventDefault();n("pointerDown");if(fa){var b=f.arraySearch(Z,a.pointerId,"id");0>b&&(b=Z.length);Z[b]={x:a.pageX,y:a.pageY,id:a.pointerId}}a=
Ib(a);b=a.length;H=null;Pa();N&&1!==b||(N=Gb=!0,f.bind(window,Fa,d),Db=jb=ib=Na=oa=ya=Fb=ka=!1,aa=null,n("firstTouchStart",a),B(ua,h),K.x=K.y=0,B(D,a[0]),B(Aa,D),ma.x=E.x*X,na=[{x:D.x,y:D.y}],fb=bc=M(),yb(q,!0),Ab(),ec());!U&&1<b&&!C&&!oa&&(ea=q,ka=!1,U=Fb=!0,K.y=K.x=0,B(ua,h),B(w,a[0]),B(O,a[1]),pa.x=.5*(w.x+O.x),pa.y=.5*(w.y+O.y),La.x=Math.abs(pa.x)-h.x,La.y=Math.abs(pa.y)-h.y,cc=dc(w,O))}},zc=function(a){a.preventDefault();if(fa){var b=f.arraySearch(Z,a.pointerId,"id");-1<b&&(b=Z[b],b.x=a.pageX,
b.y=a.pageY)}N&&(a=Ib(a),aa||ya||U?H=a:T.x!==E.x*X?aa="h":(b=Math.abs(a[0].x-D.x)-Math.abs(a[0].y-D.y),10<=Math.abs(b)&&(aa=0<b?"h":"v",H=a)))},Ec=function(a){if(p.isOldAndroid){if(Sa&&"mouseup"===a.type)return;-1<a.type.indexOf("touch")&&(clearTimeout(Sa),Sa=setTimeout(function(){Sa=0},600))}n("pointerUp");ic(a,!1)&&a.preventDefault();if(fa){var b=f.arraySearch(Z,a.pointerId,"id");if(-1<b){var c=Z.splice(b,1)[0];navigator.pointerEnabled?c.type=a.pointerType||"mouse":(c.type={4:"mouse",2:"touch",
3:"pen"}[a.pointerType],c.type||(c.type=a.pointerType||"mouse"))}}var e=Ib(a);b=e.length;"mouseup"===a.type&&(b=0);if(2===b)return H=null,!0;1===b&&B(Aa,e[0]);0!==b||aa||C||(c||("mouseup"===a.type?c={x:a.pageX,y:a.pageY,type:"mouse"}:a.changedTouches&&a.changedTouches[0]&&(c={x:a.changedTouches[0].pageX,y:a.changedTouches[0].pageY,type:"touch"})),n("touchRelease",a,c));a=-1;0===b&&(N=!1,f.unbind(window,Fa,d),Ab(),U?a=0:-1!==Eb&&(a=M()-Eb));Eb=1===b?M():-1;a=-1!==a&&150>a?"zoom":"swipe";U&&2>b&&(U=
!1,1===b&&(a="zoomPointerUp"),n("zoomGestureEnded"));H=null;if(ya||ka||C||Na)if(Pa(),Ra||(Ra=Ac()),Ra.calculateSwipeSpeed("x"),Na)if(fc()<g.verticalDragRange)d.close();else{var l=h.y,r=db;Qa("verticalDrag",0,1,300,f.easing.cubic.out,function(a){h.y=(d.currItem.initialPosition.y-l)*a+l;R((1-r)*a+r);v()});n("onVerticalDrag",1)}else{if((oa||C)&&0===b){if(Bc(a,Ra))return;a="zoomPointerUp"}C||("swipe"!==a?Cc():!oa&&q>d.currItem.fitRatio&&Dc(Ra))}},Ac=function(){var a,b,c={lastFlickOffset:{},lastFlickDist:{},
lastFlickSpeed:{},slowDownRatio:{},slowDownRatioReverse:{},speedDecelerationRatio:{},speedDecelerationRatioAbs:{},distanceOffset:{},backAnimDestination:{},backAnimStarted:{},calculateSwipeSpeed:function(e){1<na.length?(a=M()-fb+50,b=na[na.length-2][e]):(a=M()-bc,b=Aa[e]);c.lastFlickOffset[e]=D[e]-b;c.lastFlickDist[e]=Math.abs(c.lastFlickOffset[e]);c.lastFlickSpeed[e]=20<c.lastFlickDist[e]?c.lastFlickOffset[e]/a:0;.1>Math.abs(c.lastFlickSpeed[e])&&(c.lastFlickSpeed[e]=0);c.slowDownRatio[e]=.95;c.slowDownRatioReverse[e]=
1-c.slowDownRatio[e];c.speedDecelerationRatio[e]=1},calculateOverBoundsAnimOffset:function(a,b){c.backAnimStarted[a]||(h[a]>k.min[a]?c.backAnimDestination[a]=k.min[a]:h[a]<k.max[a]&&(c.backAnimDestination[a]=k.max[a]),void 0!==c.backAnimDestination[a]&&(c.slowDownRatio[a]=.7,c.slowDownRatioReverse[a]=1-c.slowDownRatio[a],.05>c.speedDecelerationRatioAbs[a]&&(c.lastFlickSpeed[a]=0,c.backAnimStarted[a]=!0,Qa("bounceZoomPan"+a,h[a],c.backAnimDestination[a],b||300,f.easing.sine.out,function(b){h[a]=b;
v()}))))},calculateAnimOffset:function(a){c.backAnimStarted[a]||(c.speedDecelerationRatio[a]*=c.slowDownRatio[a]+c.slowDownRatioReverse[a]-c.slowDownRatioReverse[a]*c.timeDiff/10,c.speedDecelerationRatioAbs[a]=Math.abs(c.lastFlickSpeed[a]*c.speedDecelerationRatio[a]),c.distanceOffset[a]=c.lastFlickSpeed[a]*c.speedDecelerationRatio[a]*c.timeDiff,h[a]+=c.distanceOffset[a])},panAnimLoop:function(){G.zoomPan&&(G.zoomPan.raf=bb(c.panAnimLoop),c.now=M(),c.timeDiff=c.now-c.lastNow,c.lastNow=c.now,c.calculateAnimOffset("x"),
c.calculateAnimOffset("y"),v(),c.calculateOverBoundsAnimOffset("x"),c.calculateOverBoundsAnimOffset("y"),.05>c.speedDecelerationRatioAbs.x&&.05>c.speedDecelerationRatioAbs.y&&(h.x=Math.round(h.x),h.y=Math.round(h.y),v(),Oa("zoomPan")))}};return c},Dc=function(a){a.calculateSwipeSpeed("y");k=d.currItem.bounds;a.backAnimDestination={};a.backAnimStarted={};if(.05>=Math.abs(a.lastFlickSpeed.x)&&.05>=Math.abs(a.lastFlickSpeed.y))return a.speedDecelerationRatioAbs.x=a.speedDecelerationRatioAbs.y=0,a.calculateOverBoundsAnimOffset("x"),
a.calculateOverBoundsAnimOffset("y"),!0;zb("zoomPan");a.lastNow=M();a.panAnimLoop()},Bc=function(a,b){C||(gb=l);var c;if("swipe"===a){var e=D.x-Aa.x,h=10>b.lastFlickDist.x;30<e&&(h||20<b.lastFlickOffset.x)?c=-1:-30>e&&(h||-20>b.lastFlickOffset.x)&&(c=1)}if(c){l+=c;if(0>l){l=g.loop?F()-1:0;var r=!0}else l>=F()&&(l=g.loop?0:F()-1,r=!0);if(!r||g.loop){L+=c;X-=c;var m=!0}}c=E.x*X;e=Math.abs(c-T.x);m||c>T.x===0<b.lastFlickSpeed.x?(e=0<Math.abs(b.lastFlickSpeed.x)?e/Math.abs(b.lastFlickSpeed.x):333,e=Math.min(e,
400),e=Math.max(e,250)):e=333;gb===l&&(m=!1);C=!0;n("mainScrollAnimStart");Qa("mainScroll",T.x,c,e,f.easing.cubic.out,eb,function(){Pa();C=!1;gb=-1;(m||gb!==l)&&d.updateCurrItem();n("mainScrollAnimComplete")});m&&d.updateCurrItem(!0);return m},Cc=function(){var a=q,b=Xb(),c=Yb();q<b?a=b:q>c&&(a=c);var e,g=db;if(ib&&!Db&&!jb&&q<b)return d.close(),!0;ib&&(e=function(a){R((1-g)*a+g)});d.zoomTo(a,0,200,f.easing.cubic.out,e);return!0};Ia("Gestures",{publicMethods:{initGestures:function(){var a=function(a,
c,e,d,f){Ya=a+c;Za=a+e;Ga=a+d;$a=f?a+f:""};(fa=p.pointerEvent)&&p.touch&&(p.touch=!1);fa?navigator.pointerEnabled?a("pointer","down","move","up","cancel"):a("MSPointer","Down","Move","Up","Cancel"):p.touch?(a("touch","start","move","end","cancel"),Q=!0):a("mouse","down","move","up");Fa=Za+" "+Ga+" "+$a;Wa=Ya;fa&&!Q&&(Q=1<navigator.maxTouchPoints||1<navigator.msMaxTouchPoints);d.likelyTouchDevice=Q;z[Ya]=yc;z[Za]=zc;z[Ga]=Ec;$a&&(z[$a]=z[Ga]);p.touch&&(Wa+=" mousedown",Fa+=" mousemove mouseup",z.mousedown=
z[Ya],z.mousemove=z[Za],z.mouseup=z[Ga]);Q||(g.allowPanToNext=!1)}}});var la,ac=function(a,b,c,e){la&&clearTimeout(la);Jb=Ba=!0;if(a.initialLayout){var k=a.initialLayout;a.initialLayout=null}else k=g.getThumbBoundsFn&&g.getThumbBoundsFn(l);var r=c?g.hideAnimationDuration:g.showAnimationDuration,p=function(){Oa("initialZoom");c?(d.template.removeAttribute("style"),d.bg.removeAttribute("style")):(R(1),b&&(b.style.display="block"),f.addClass(m,"pswp--animated-in"),n("initialZoom"+(c?"OutEnd":"InEnd")));
e&&e();Ba=!1};r&&k&&void 0!==k.x?function(){var b=ob,e=!d.currItem.src||d.currItem.loadError||g.showHideOpacity;a.miniImg&&(a.miniImg.style.webkitBackfaceVisibility="hidden");c||(q=k.w/a.w,h.x=k.x,h.y=k.y-Ub,d[e?"template":"bg"].style.opacity=.001,v());zb("initialZoom");c&&!b&&f.removeClass(m,"pswp--animated-in");if(e)if(c)f[(b?"remove":"add")+"Class"](m,"pswp--animate_opacity");else setTimeout(function(){f.addClass(m,"pswp--animate_opacity")},30);la=setTimeout(function(){n("initialZoom"+(c?"Out":
"In"));if(c){var d=k.w/a.w,g=h.x,l=h.y,t=q,V=db,u=function(a){1===a?(q=d,h.x=k.x,h.y=k.y-ha):(q=(d-t)*a+t,h.x=(k.x-g)*a+g,h.y=(k.y-ha-l)*a+l);v();e?m.style.opacity=1-a:R(V-a*V)};b?Qa("initialZoom",0,1,r,f.easing.cubic.out,u,p):(u(1),la=setTimeout(p,r+20))}else q=a.initialZoomLevel,B(h,a.initialPosition),v(),R(1),e?m.style.opacity=1:R(1),la=setTimeout(p,r+20)},c?25:90)}():(n("initialZoom"+(c?"Out":"In")),q=a.initialZoomLevel,B(h,a.initialPosition),v(),m.style.opacity=c?0:1,R(1),r?setTimeout(function(){p()},
r):p())},ca,Ca,Da,qa=[],Jb,Ba,Fc={index:0,errorMsg:'<div class="pswp__error-msg"><a href="%url%" target="_blank">The image</a> could not be loaded.</div>',forceProgressiveLoading:!1,preload:[1,1],getNumItemsFn:function(){return ca.length}},Y,F,kc=function(){return{center:{x:0,y:0},max:{x:0,y:0},min:{x:0,y:0}}},Ma=function(a,b,c){if(a.src&&!a.loadError){var e=!c;e&&(a.vGap||(a.vGap={top:0,bottom:0}),n("parseVerticalMargin",a));Ca=b.x;Da=b.y-a.vGap.top-a.vGap.bottom;if(e){b=Ca/a.w;var d=Da/a.h;a.fitRatio=
b<d?b:d;b=g.scaleMode;"orig"===b?c=1:"fit"===b&&(c=a.fitRatio);1<c&&(c=1);a.initialZoomLevel=c;a.bounds||(a.bounds=kc())}if(!c)return;b=a.w*c;d=a.h*c;var f=a.bounds;f.center.x=Math.round((Ca-b)/2);f.center.y=Math.round((Da-d)/2)+a.vGap.top;f.max.x=b>Ca?Math.round(Ca-b):f.center.x;f.max.y=d>Da?Math.round(Da-d)+a.vGap.top:f.center.y;f.min.x=b>Ca?0:f.center.x;f.min.y=d>Da?a.vGap.top:f.center.y;e&&c===a.initialZoomLevel&&(a.initialPosition=a.bounds.center)}else a.w=a.h=0,a.initialZoomLevel=a.fitRatio=
1,a.bounds=kc(),a.initialPosition=a.bounds.center;return a.bounds},lb=function(a,b,c,e,f,g){!b.loadError&&e&&(b.imageAppended=!0,ja(b,e,b===d.currItem&&ia),c.appendChild(e),g&&setTimeout(function(){b&&b.loaded&&b.placeholder&&(b.placeholder.style.display="none",b.placeholder=null)},500))},lc=function(a){a.loading=!0;a.loaded=!1;var b=a.img=f.createEl("pswp__img","img"),c=function(){a.loading=!1;a.loaded=!0;a.loadComplete?a.loadComplete(a):a.img=null;b=b.onload=b.onerror=null};b.onload=c;b.onerror=
function(){a.loadError=!0;c()};b.src=a.src;return b},mc=function(a,b){if(a.src&&a.loadError&&a.container)return b&&(a.container.innerHTML=""),a.container.innerHTML=g.errorMsg.replace("%url%",a.src),!0},ja=function(a,b,c){if(a.src){b||(b=a.container.lastChild);var d=c?a.w:Math.round(a.w*a.fitRatio);c=c?a.h:Math.round(a.h*a.fitRatio);a.placeholder&&!a.loaded&&(a.placeholder.style.width=d+"px",a.placeholder.style.height=c+"px");b.style.width=d+"px";b.style.height=c+"px"}},nc=function(){if(qa.length){for(var a,
b=0;b<qa.length;b++)a=qa[b],a.holder.index===a.index&&lb(a.index,a.item,a.baseDiv,a.img,!1,a.clearPlaceholder);qa=[]}};Ia("Controller",{publicMethods:{lazyLoadItem:function(a){a=cb(a);var b=Y(a);b&&(!b.loaded&&!b.loading||Xa)&&(n("gettingData",a,b),b.src&&lc(b))},initController:function(){f.extend(g,Fc,!0);d.items=ca=rc;Y=d.getItemAt;F=g.getNumItemsFn;3>F()&&(g.loop=!1);t("beforeChange",function(a){var b=g.preload;a=null===a?!0:0<=a;var c=Math.min(b[0],F());b=Math.min(b[1],F());var e;for(e=1;e<=(a?
b:c);e++)d.lazyLoadItem(l+e);for(e=1;e<=(a?c:b);e++)d.lazyLoadItem(l-e)});t("initialLayout",function(){d.currItem.initialLayout=g.getThumbBoundsFn&&g.getThumbBoundsFn(l)});t("mainScrollAnimComplete",nc);t("initialZoomInEnd",nc);t("destroy",function(){for(var a,b=0;b<ca.length;b++)a=ca[b],a.container&&(a.container=null),a.placeholder&&(a.placeholder=null),a.img&&(a.img=null),a.preloader&&(a.preloader=null),a.loadError&&(a.loaded=a.loadError=!1);qa=null})},getItemAt:function(a){return 0<=a?void 0!==
ca[a]?ca[a]:!1:!1},allowProgressiveImg:function(){return g.forceProgressiveLoading||!Q||g.mouseUsed||1200<screen.width},setContent:function(a,b){g.loop&&(b=cb(b));var c=d.getItemAt(a.index);c&&(c.container=null);c=d.getItemAt(b);if(c){n("gettingData",b,c);a.index=b;a.item=c;var e=c.container=f.createEl("pswp__zoom-wrap");!c.src&&c.html&&(c.html.tagName?e.appendChild(c.html):e.innerHTML=c.html);mc(c);Ma(c,A);if(c.src&&!c.loadError&&!c.loaded){c.loadComplete=function(c){if(ta){if(a&&a.index===b){if(mc(c,
!0)){c.loadComplete=c.img=null;Ma(c,A);Ka(c);a.index===l&&d.updateCurrZoomItem();return}c.imageAppended?!Ba&&c.placeholder&&(c.placeholder.style.display="none",c.placeholder=null):p.transform&&(C||Ba)?qa.push({item:c,baseDiv:e,img:c.img,index:b,holder:a,clearPlaceholder:!0}):lb(b,c,e,c.img,C||Ba,!0)}c.loadComplete=null;c.img=null;n("imageLoadComplete",b,c)}};if(f.features.transform){var h=f.createEl("pswp__img pswp__img--placeholder"+(c.msrc?"":" pswp__img--placeholder--blank"),c.msrc?"img":"");c.msrc&&
(h.src=c.msrc);ja(c,h);e.appendChild(h);c.placeholder=h}c.loading||lc(c);d.allowProgressiveImg()&&(!Jb&&p.transform?qa.push({item:c,baseDiv:e,img:c.img,index:b,holder:a}):lb(b,c,e,c.img,!0,!0))}else if(c.src&&!c.loadError){var k=f.createEl("pswp__img","img");k.style.opacity=1;k.src=c.src;ja(c,k);lb(b,c,e,k,!0)}Jb||b!==l?Ka(c):(S=e.style,ac(c,k||c.img));a.el.innerHTML="";a.el.appendChild(e)}else a.el.innerHTML=""},cleanSlide:function(a){a.img&&(a.img.onload=a.img.onerror=null);a.loaded=a.loading=a.img=
a.imageAppended=!1}}});var da,mb={},Kb=function(a,b,c){var d=document.createEvent("CustomEvent");d.initCustomEvent("pswpTap",!0,!0,{origEvent:a,target:a.target,releasePoint:b,pointerType:c||"touch"});a.target.dispatchEvent(d)};Ia("Tap",{publicMethods:{initTap:function(){t("firstTouchStart",d.onTapStart);t("touchRelease",d.onTapRelease);t("destroy",function(){mb={};da=null})},onTapStart:function(a){1<a.length&&(clearTimeout(da),da=null)},onTapRelease:function(a,b){if(b&&!ya&&!Fb&&!za){if(da&&(clearTimeout(da),
da=null,25>Math.abs(b.x-mb.x)&&25>Math.abs(b.y-mb.y))){n("doubleTap",b);return}"mouse"===b.type?Kb(a,b,"mouse"):"BUTTON"===a.target.tagName.toUpperCase()||f.hasClass(a.target,"pswp__single-tap")?Kb(a,b):(B(mb,b),da=setTimeout(function(){Kb(a,b);da=null},300))}}}});var I;Ia("DesktopZoom",{publicMethods:{initDesktopZoom:function(){ub||(Q?t("mouseUsed",function(){d.setupDesktopZoom()}):d.setupDesktopZoom(!0))},setupDesktopZoom:function(a){I={};t("bindEvents",function(){f.bind(m,"wheel mousewheel DOMMouseScroll",
d.handleMouseWheel)});t("unbindEvents",function(){I&&f.unbind(m,"wheel mousewheel DOMMouseScroll",d.handleMouseWheel)});d.mouseZoomedIn=!1;var b,c=function(){d.mouseZoomedIn&&(f.removeClass(m,"pswp--zoomed-in"),d.mouseZoomedIn=!1);1>q?f.addClass(m,"pswp--zoom-allowed"):f.removeClass(m,"pswp--zoom-allowed");e()},e=function(){b&&(f.removeClass(m,"pswp--dragging"),b=!1)};t("resize",c);t("afterChange",c);t("pointerDown",function(){d.mouseZoomedIn&&(b=!0,f.addClass(m,"pswp--dragging"))});t("pointerUp",
e);a||c()},handleMouseWheel:function(a){if(q<=d.currItem.fitRatio)return g.modal&&(!g.closeOnScroll||za||N?a.preventDefault():wa&&2<Math.abs(a.deltaY)&&(ob=!0,d.close())),!0;a.stopPropagation();I.x=0;if("deltaX"in a)1===a.deltaMode?(I.x=18*a.deltaX,I.y=18*a.deltaY):(I.x=a.deltaX,I.y=a.deltaY);else if("wheelDelta"in a)a.wheelDeltaX&&(I.x=-.16*a.wheelDeltaX),I.y=a.wheelDeltaY?-.16*a.wheelDeltaY:-.16*a.wheelDelta;else if("detail"in a)I.y=a.detail;else return;yb(q,!0);var b=h.x-I.x,c=h.y-I.y;(g.modal||
b<=k.min.x&&b>=k.max.x&&c<=k.min.y&&c>=k.max.y)&&a.preventDefault();d.panTo(b,c)},toggleDesktopZoom:function(a){a=a||{x:A.x/2+va.x,y:A.y/2+va.y};var b=g.getDoubleTapZoom(!0,d.currItem),c=q===b;d.mouseZoomedIn=!c;d.zoomTo(c?d.currItem.initialZoomLevel:b,a,333);f[(c?"remove":"add")+"Class"](m,"pswp--zoomed-in")}}});var Gc={history:!0,galleryUID:1},Va,oc,ra,nb,Lb,pc,y,Ea,Mb,Nb,J,Ob,qc=function(){var a=J.hash.substring(1),b={};if(5>a.length)return b;var c=a.split("&");for(a=0;a<c.length;a++)if(c[a]){var d=
c[a].split("=");2>d.length||(b[d[0]]=d[1])}if(g.galleryPIDs)for(c=b.pid,a=b.pid=0;a<ca.length;a++){if(ca[a].pid===c){b.pid=a;break}}else b.pid=parseInt(b.pid,10)-1;0>b.pid&&(b.pid=0);return b},Pb=function(){ra&&clearTimeout(ra);if(za||N)ra=setTimeout(Pb,500);else{nb?clearTimeout(oc):nb=!0;var a=l+1,b=Y(l);b.hasOwnProperty("pid")&&(a=b.pid);a=y+"&gid="+g.galleryUID+"&pid="+a;Ea||-1===J.hash.indexOf(a)&&(Nb=!0);b=J.href.split("#")[0]+"#"+a;if(Ob){if("#"+a!==window.location.hash)history[Ea?"replaceState":
"pushState"]("",document.title,b)}else Ea?J.replace(b):J.hash=a;Ea=!0;oc=setTimeout(function(){nb=!1},60)}};Ia("History",{publicMethods:{initHistory:function(){f.extend(g,Gc,!0);if(g.history){J=window.location;Ea=Mb=Nb=!1;y=J.hash.substring(1);Ob="pushState"in history;-1<y.indexOf("gid=")&&(y=y.split("&gid=")[0],y=y.split("?gid=")[0]);t("afterChange",d.updateURL);t("unbindEvents",function(){f.unbind(window,"hashchange",d.onHashChange)});var a=function(){pc=!0;Mb||(Nb?history.back():y?J.hash=y:Ob?
history.pushState("",document.title,J.pathname+J.search):J.hash="");Va&&clearTimeout(Va);ra&&clearTimeout(ra)};t("unbindEvents",function(){ob&&a()});t("destroy",function(){pc||a()});t("firstUpdate",function(){l=qc().pid});var b=y.indexOf("pid=");-1<b&&(y=y.substring(0,b),"&"===y.slice(-1)&&(y=y.slice(0,-1)));setTimeout(function(){ta&&f.bind(window,"hashchange",d.onHashChange)},40)}},onHashChange:function(){J.hash.substring(1)===y?(Mb=!0,d.close()):nb||(Lb=!0,d.goTo(qc().pid),Lb=!1)},updateURL:function(){Va&&
clearTimeout(Va);ra&&clearTimeout(ra);Lb||(Ea?Va=setTimeout(Pb,800):Pb())}}});f.extend(d,wc)}});