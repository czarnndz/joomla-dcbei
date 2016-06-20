/* Copyright  2007 - 2011 YOOtheme GmbH, YOOtheme Proprietary Use License (http://www.yootheme.com/license) */

(function(d){var h=function(){};d.extend(h.prototype,{name:"search",options:{url:document.location.href,param:"search",method:"post",minLength:3,delay:300,match:":not(li.skip)",skipClass:"skip",loadingClass:"loading",filledClass:"filled",resultClass:"result",resultsHeaderClass:"results-header",moreResultsClass:"more-results",noResultsClass:"no-results",listClass:"results",hoverClass:"selected",msgResultsHeader:"Search Results",msgMoreResults:"More Results",msgNoResults:"No results found"},initialize:function(a,
b){this.options=d.extend({},this.options,b);var c=this;this.value=this.timer=null;this.form=a.parent("form:first");this.input=a;this.input.attr("autocomplete","off");this.input.bind({keydown:function(g){c.form[c.input.val()?"addClass":"removeClass"](c.options.filledClass);if(g&&g.which&&!g.shiftKey)switch(g.which){case 13:c.done(c.selected);g.preventDefault();break;case 38:c.pick("prev");g.preventDefault();break;case 40:c.pick("next");g.preventDefault();break;case 27:case 9:c.hide()}},keyup:function(){c.trigger()},
blur:function(g){c.hide(g)}});this.form.find("button[type=reset]").bind("click",function(){c.form.removeClass(c.options.filledClass);c.value=null;c.input.focus()});this.choices=d("<ul>").addClass(this.options.listClass).hide().insertAfter(this.input)},request:function(a){var b=this;this.form.addClass(this.options.loadingClass);d.ajax(d.extend({url:this.options.url,type:this.options.method,dataType:"json",success:function(c){b.form.removeClass(b.options.loadingClass);b.suggest(c)}},a))},pick:function(a){var b=
null;if(typeof a!=="string"&&!a.hasClass(this.options.skipClass))b=a;if(a=="next"||a=="prev")b=this.selected?this.selected[a](this.options.match):this.choices.children(this.options.match)[a=="next"?"first":"last"]();if(b!=null&&b.length){this.selected=b;this.choices.children().removeClass(this.options.hoverClass);this.selected.addClass(this.options.hoverClass)}},done:function(a){if(a){if(a.hasClass(this.options.moreResultsClass))this.input.parent("form").submit();else if(a.data("choice"))window.location=
a.data("choice").url;this.hide()}else this.input.parent("form").submit()},trigger:function(){var a=this.value,b=this;this.value=this.input.val();if(this.value.length<this.options.minLength)return this.hide();if(this.value!=a){this.timer&&window.clearTimeout(this.timer);this.timer=window.setTimeout(function(){var c={};c[b.options.param]=b.value;b.request({data:c})},this.options.delay,this)}},suggest:function(a){if(a){var b=this,c={mouseover:function(){b.pick(d(this))},click:function(){b.done(d(this))}};
if(a===false)this.hide();else{this.selected=null;this.choices.empty();d("<li>").addClass(this.options.resultsHeaderClass+" "+this.options.skipClass).html(this.options.msgResultsHeader).appendTo(this.choices).bind(c);if(a.results&&a.results.length>0){d(a.results).each(function(){d("<li>").data("choice",this).addClass(b.options.resultClass).append(d("<h3>").html(this.title)).append(d("<div>").html(this.text)).appendTo(b.choices).bind(c)});d("<li>").addClass(b.options.moreResultsClass+" "+b.options.skipClass).html(b.options.msgMoreResults).appendTo(b.choices).bind(c)}else d("<li>").addClass(this.options.resultClass+
" "+this.options.noResultsClass+" "+this.options.skipClass).html(this.options.msgNoResults).appendTo(this.choices).bind(c);this.show()}}},show:function(){if(!this.visible){this.visible=true;this.choices.fadeIn(200)}},hide:function(){if(this.visible){this.visible=false;this.choices.removeClass(this.options.hoverClass).fadeOut(200)}}});d.fn[h.prototype.name]=function(){var a=arguments,b=a[0]?a[0]:null;return this.each(function(){var c=d(this);if(h.prototype[b]&&c.data(h.prototype.name)&&b!="initialize")c.data(h.prototype.name)[b].apply(c.data(h.prototype.name),
Array.prototype.slice.call(a,1));else if(!b||d.isPlainObject(b)){var g=new h;h.prototype.initialize&&g.initialize.apply(g,d.merge([c],a));c.data(h.prototype.name,g)}else d.error("Method "+b+" does not exist on jQuery."+h.name)})}})(jQuery);
(function(d){function h(e){var f={},j=/^jQuery\d+$/;d.each(e.attributes,function(k,i){if(i.specified&&!j.test(i.name))f[i.name]=i.value});return f}function a(){var e=d(this);if(e.val()===e.attr("placeholder")&&e.hasClass("placeholder"))e.data("placeholder-password")?e.hide().next().show().focus():e.val("").removeClass("placeholder")}function b(){var e,f=d(this);if(f.val()===""||f.val()===f.attr("placeholder")){if(f.is(":password")){if(!f.data("placeholder-textinput")){try{e=f.clone().attr({type:"text"})}catch(j){e=
d("<input>").attr(d.extend(h(f[0]),{type:"text"}))}e.removeAttr("name").data("placeholder-password",true).bind("focus.placeholder",a);f.data("placeholder-textinput",e).before(e)}f=f.hide().prev().show()}f.addClass("placeholder").val(f.attr("placeholder"))}else f.removeClass("placeholder")}var c="placeholder"in document.createElement("input"),g="placeholder"in document.createElement("textarea");d.fn.placeholder=c&&g?function(){return this}:function(){return this.filter((c?"textarea":":input")+"[placeholder]").bind("focus.placeholder",
a).bind("blur.placeholder",b).trigger("blur.placeholder").end()};d(function(){d("form").bind("submit.placeholder",function(){var e=d(".placeholder",this).each(a);setTimeout(function(){e.each(b)},10)})});d(window).bind("unload.placeholder",function(){d(".placeholder").val("")})})(jQuery);
