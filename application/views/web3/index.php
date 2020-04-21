<!DOCTYPE html><html lang="en">
      <head>
            <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title><?php echo $headertitle; ?></title>
            <link rel="shortcut icon" href="favicon.ico">
            <link rel="shortcut icon" href="<?php echo base_url(); ?>images/icon/kz-favicon.png" type="image/png">
            <link rel="apple-touch-icon" href="<?php echo base_url(); ?>images/icon/kz-favicon-apple.png">
            <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>images/icon/kz-favicon-apple-compres.png">
      </head>
      <body>
            <style>a,abbr,acronym,address,applet,article,aside,audio,b,big,blockquote,body,canvas,caption,center,cite,code,dd,del,details,dfn,div,dl,dt,em,embed,fieldset,figcaption,figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,html,i,iframe,img,input,ins,kbd,label,legend,li,mark,main,menu,nav,object,ol,output,p,pre,q,ruby,s,samp,section,small,span,strike,strong,sub,summary,sup,table,tbody,td,tfoot,th,thead,time,tr,tt,u,ul,var,video{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;margin:0;padding:0;border:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section{display:block}nav ol,nav ul{list-style:none}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:"";content:none}table{border-spacing:0;border-collapse:collapse}button,input[type=submit]{cursor:pointer}
                  *::selection{
                  	background: #f0f0f0;
                  	color: #0f0f0f;
                  }
                  *::-moz-selection{
                  	background: #f0f0f0;
                  	color: #0f0f0f;
                  }
                  html, body{
                  	width: 100%;
                  	height: 100%;
                  	margin: 0;
                  	padding: 0;
                  }
                  body {
                  	display: block;
                  	position: relative;
                  	overflow: hidden;
                  	text-align: center;
                  }
                  .background {
                  	position: fixed;
                  	top: 0;
                  	right: 0;
                  	bottom: 0;
                  	left: 0;
                  	z-index:1;
                  }
                  .background_gradient {
                  	background: #ffa500;
                  	background: -webkit-linear-gradient(170deg, #f1c40f, #ffa500);
                  	   background: -moz-linear-gradient(170deg, #f1c40f, #ffa500);
                  		 background: -o-linear-gradient(170deg, #f1c40f, #ffa500);
                  			background: linear-gradient(170deg, #f1c40f, #ffa500);
                  	background-attachment: fixed;
                  }
                  .background_image {
                  	-webkit-background-size: cover;
                  		 -o-background-size: cover;
                  			background-size: cover;
                  	background-position: center center;
                  	background-repeat: no-repeat;
                  	background-attachment: fixed;
                  	background-image: url('<?php echo base_url(); ?>images/background/city_bg.jpg');
                  }
                  .background_blur {
                  	filter: url('data:image/svg+xml;utf8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg"><filter id="blur"><feGaussianBlur stdDeviation="5" /></filter></svg>#blur');
                  	-webkit-filter: blur(5px);
                  	filter: blur(5px);
                  	filter: progid:DXImageTransform.Microsoft.Blur(PixelRadius='5');
                  }
                  .overlay {
                  	position: fixed;
                  	top: 0;
                  	right: 0;
                  	bottom: 0;
                  	left: 0;
                  	z-index:10;
                  	overflow: auto;
                  }
                  .overlay_dark {
                  	background-color: transparent;
                  	background-color: rgba(15, 15, 15, 0.45);
                  	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#4C000000,endColorstr=#4C000000);
                  	zoom: 1;
                  	background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDoAABSCAABFVgAADqXAAAXb9daH5AAAAAZSURBVHjaYmCAAGM0GjfHGEMGAAAA//8DACm0ATMe8beGAAAAAElFTkSuQmCC");
                  	background-repeat: repeat;
                  	background-attachment: fixed;
                  	box-shadow: inset 0 3px 3px -2px #0f0f0f, inset 0 -3px 3px -2px #0f0f0f;
                  }
                  .project {
                  	-moz-box-sizing: border-box;
                  	-webkit-box-sizing: border-box;
                  	box-sizing: border-box;
                  	display: block;
                  	width: 100%;
                  	max-width: 1200px;
                  	margin: 0 auto;
                  	text-align: center;
                  }
                  .project__name {
                  	display: block;
                  	width: 100%;
                  	max-width: 100%;
                  	margin: 15% auto 4%;
                  	padding: 0 2%;
                  	font-family: 'Segoe Script', 'Century Gothic', 'Lucida Handwriting', sans-serif;
                  	font-size: 150px;
                        font-style: ;
                  	line-height: 1;
                  	color: #f0f0f0;
                  	text-align: center;
                        text-decoration: ;
                  }
                  .project__name_middle {
                  	margin-top: 20%;
                  }
                  .project__name_fit {
                  	max-width: 100%;
                  	font-size: 200px;
                  }
                  .project__name_shadow {
                  	text-shadow: 1px 1px 2px #0f0f0f;
                  }
                  .project__list{
                  	display: inline-block;
                  	list-style: none;
                  	color: #f0f0f0;
                  	text-align: center;
                  }
                  .project__item{
                  	position: relative;
                  	font-family: Gabriola, Times, "Times New Roman", serif;
                  	font-size: 50px;
                  	line-height: 1;
                  	text-align: left;
                  	color: #f0f0f0;
                  }
                  .project__item.is-checked:before{
                  	content: "\2713";
                  	position: absolute;
                  	right: 100%;
                  }
                  .project__item ul,
                  .project__item ol{
                  	margin-left: 40px;
                  	margin-bottom: 20px;
                  	list-style: none;
                  }
                  .project__link{
                  	display: inline-block;
                  	margin-bottom: 20px;
                  	color: #f0f0f0;
                  	outline: none;
                  	text-decoration: none;
                  	white-space: nowrap;
                  	/*border-bottom: 1px solid #f0f0f0;*/
                  }
                  .project__link_empty{
                  	display: block;
                  	cursor: default;
                  	border: none;
                  	color: #ccc;
                  }
                  .project__link:hover{
                  	border-color: transparent;
                        color: #808080;
                  }
            </style>
            <div class="background background_image background_blur"></div>
            <div class="overlay overlay_dark">
                  <main class="project">
                        <h1 class="project__name project__name_shadow">Mondayy</h1>
                        <ul class="project__list">
                              <li class="project__item">
                                    <a class="project__link" href="<?php echo base_url(); ?>galery/post">Welcome to our site</a>
                              </li>
                        </ul>
                  </main>
            </div>
            <script>!function(){var n=function(n,t,e){n.addEventListener?n.addEventListener(t,e,!1):n.attachEvent("on"+t,e)},t=function(n,t){for(key in t)t.hasOwnProperty(key)&&(n[key]=t[key]);return n};window.fitText=function(e,i,o){if(e.length){var a=t({minFontSize:-1/0,maxFontSize:1/0},o),r=function(t){var e=i||1,o=function(){t.style.fontSize=Math.max(Math.min(t.clientWidth/(10*e),parseFloat(a.maxFontSize)),parseFloat(a.minFontSize))+"px"};o(),n(window,"resize",o)};if(e.length)for(var f=0;f<e.length;f++)r(e[f]);else r(e);return e}}}(),function(){window.fitText(document.getElementsByClassName("project__name_fit"),1)}();
            </script>
      </body>
</html>