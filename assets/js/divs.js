DEFAULTWINDOWOPTIONS="width=940,height=550,left=50,top=50,menubar,scrollbars,resizable,alwaysRaised,statusbar"

function divinit(){
	isie4=false
	isnn6=false
	isnn4=(navigator.appName=="Netscape" && navigator.appVersion.indexOf("4.")>=0)
	if(isnn4){
		alert("This page will not work properly with Netscape 4. Sorry.")
	}else{
		isie4=(!document.getElementById && document.all?true:false)
		isnn6=(!isie4 && document.getElementById?true:false)
	}
	if(isie4||isnn6)isnn4=false
	isbuggynn=(navigator.appName=="Netscape" && navigator.appVersion.indexOf("5.0")>=0)
}divinit()


function divwrite(sname,sinfo){
	var ds=divfind(sname)
	if(ds==null)return
	ds.innerHTML=sinfo
}

function divfind(sname,i){
	if(isnn6)return document.getElementById(sname)
	if(arguments.length<2)i=0
	if(isie4)return document.all[sname]
	alert(sname+" not found in divfind")
	return false
}

function divsettop(name,pos){
	var ds=divfind(name)
	if(ds==null)return
	var d=ds.style
	d.top=pos
	return d.top
}

function divsetvisibility(name,isvisible){
	var ds=divfind(name)
	if(ds==null)return
	var d=ds.style
	d.visibility=(isvisible?"visible":"hidden")
}

function writeNewWindow(s,sopt){
	if(arguments.length<2)sopt=DEFAULTWINDOWOPTIONS
	var w=createWindow("",sopt)
	w.document.open("text/html")
	w.document.write("<html>"+s+"</html>")
	w.document.close()
}

function createWindow(s,sopt){
	if(arguments.length<2)sopt=DEFAULTWINDOWOPTIONS
	var sm=""+Math.random()
	sm=sm.substring(4,10)
	return open(s,"N_"+sm,sopt)
}

function showCode(s){
	writeNewWindow("<pre>"+s.replace(/\</g,"\n&lt;")+"</pre>")
}
