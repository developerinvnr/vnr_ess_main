(function(){var e,i,j,f,n,o,p,q,c,g,s,B,t,l,r,u,h,v,k,w,x,C;var D=Array.prototype.indexOf||function(a){for(var b=0,m=this.length;b<m;b++){if(this[b]===a)return b}return-1};i='production';j='ewuut';B=this;c=document;g=c.head||c.getElementsByTagName("head")[0];f="readyState";n="onreadystatechange";o="DOMContentLoaded";p="addEventListener";q=setTimeout;c=document;r=null;e=null;C=false;k={development:{cdn:'//d16dur1ve73st5.cloudfront.net/',url:'//maxdev.com/',tracker:'//maxdev.com/hb',jquery:'https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js'},stage:{cdn:'//d5mpbrtk7h476.cloudfront.net/',url:'//stage.api.bit-accelerator.com/',tracker:'//stage.api.bit-accelerator.com/hb',jquery:'https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js'},production:{cdn:'//d29f1hnftf5u9z.cloudfront.net/',url:'//api.bit-accelerator.com/',tracker:'//api.bit-accelerator.com/hb',jquery:'https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js'}};window.tool_src=k[i];window.tool_error=track_error=function(a){e('body').append("<img src='"+window.tool_src.url+"log/default/"+l+"?msg="+encodeURI(a)+"' width='1' height='1'/>")};w=function(){return e('body').append("<img src='"+k[i].tracker+"/"+j+"?g="+l+"' width='1' height='1'/>")};h=function(){if(x){return false}return r.script(window.tool_src.url+'update/'+j+'/'+l+'/'+window.location.hostname).wait(function(){x=true})};isready=function(){if(window.site_has_jq){if(window.site_loaded&&window.tjq_loaded){window.setTimeout(function(){return h()},125)}else{window.setTimeout(function(){isready()},125)}}else{if(window.tjq_loaded){window.setTimeout(function(){return h()},125)}else{window.setTimeout(function(){isready()},125)}}};t=function(){var b=e('#delivery_script').attr('src');var m=b.split('/');if(m.length<5){window.campaign=j='mn34p'}else{window.campaign=j=m[3]}window.guid=l=b.substring(b.indexOf('?')+1);w();var y,z,A;window.site_loaded=y=false;window.site_has_jq=z=false;window.tjq_loaded=A=false;if(window.$old_jq){window.site_has_jq=z=true}e(document).ready(function(a){window.tjq_loaded=A=true;if(!window.site_has_jq){window.setTimeout(function(){return h()},125)}else{if(window.site_loaded){window.setTimeout(function(){return h()},125)}else{window.setTimeout(function(){isready()},125)}}});var E=window.$old_jq;E(document).ready(function(a){window.site_loaded=y=true;if(window.tjq_loaded){window.setTimeout(function(){return h()},50)}else{window.setTimeout(function(){isready()},50)}});return true};s=function(){var a,b;if(typeof window.jQuery!=="undefined"){a=window.jQuery}if(typeof $!=="undefined"){b=$}return r=$LAB.script(k[i].jquery).wait(function(){try{e=jQuery.noConflict(true);window.$tjq=e;if(typeof b!=="undefined"){$=b}if(typeof a!=="undefined"){window.$old_jq=a;window.jQuery=jQuery=a}}catch(err){}return t()})};u=function(){if(document.getElementsByTagName('body')[0].getAttribute('tool_block')==='1')return false;var a,b;if(D.call(g,"item")>=0){if(!g[0]){q(arguments.callee,50);return}g=g[0]}a=c.createElement("script");b=false;a.onload=a[n]=function(){if((a[f]&&a[f]!=="complete"&&a[f]!=="loaded")||b){return false}a.onload=a[n]=null;b=true;return s()};a.src=k[i].cdn+'LAB.min.js';return g.insertBefore(a,g.firstChild)};q(u,50);v=function(){c.removeEventListener(o,d,false);return c[f]="complete"};if(c[f]===null&&c[p]){c[f]="loading";c[p](o,v,false)}}).call(this);