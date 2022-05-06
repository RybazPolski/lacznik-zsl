function Time(){
    var dateParagraph=document.getElementById("dateParagraph");

    var date=new Date();

    var dd1=date.getDay();
    var dd2=date.getDate();
    var mm=date.getMonth();
    var yyyy=date.getFullYear();
    var ss=date.getSeconds();
    var min=date.getMinutes();
    var hh=date.getHours();

    switch(dd1){
        case 0:
        var dd1="niedziela";
        break;
        case 1:
        var dd1="poniedziałek";
        break;
        case 2:
        var dd1="wtorek";
        break;
        case 3:
        var dd1="środa";
        break;
        case 4:
        var dd1="czwartek";
        break;
        case 5:
        var dd1="piątek";
        break;
        case 6:
        var dd1="sobota";
        break;
    }
    
    switch(mm){
        case 0:
        var mm="stycznia";
        break;
        case 1:
        var mm="lutego";
        break;
        case 2:
        var mm="marca";
        break;
        case 3:
        var mm="kwietnia";
        break;
        case 4:
        var mm="maja";
        break;
        case 5:
        var mm="czerwca";
        break;
        case 6:
        var mm="lipca";
        break;
        case 7:
        var mm="sierpnia";
        break;
        case 8:
        var mm="września";
        break;
        case 9:
        var mm="października";
        break;
        case 10:
        var mm="listopada";
        break;
        case 11:
        var mm="grudnia";
        break;
    }

    if(hh<10){
        var container=hh;
        var hh="0"+container;
    }

    if(min<10){
        var container=min;
        var min="0"+container;
    }

    if(ss<10){
        var container=ss;
        var ss="0"+container;
    }
    
    dateParagraph.innerHTML="Dzisiaj jest: "+dd1+" "+dd2+" "+mm+" "+yyyy+" roku, godzina: "+hh+":"+min+":"+ss;
}

setInterval("Time()", 1000);
setTimeout("Time()", 1);