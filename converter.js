
var jsratelist;

function phpar2jsobj(ratelist){
     jsratelist=JSON.parse(ratelist);
}

function countinput()
{   
    if(document.getElementById("input_money").value=="") //檢查輸入框是否有數值
    {   
        document.getElementById("money").innerHTML="請繼續輸入金額";
    }
    else
    {
    //匯率換算並顯示   
    var money  =parseFloat(document.getElementById("input_money").value);
    var rate1  =parseFloat(jsratelist[document.getElementById("first_rate").value]);
    var rate2  =parseFloat(jsratelist[document.getElementById("second_rate").value]);
    var final_money=(rate1/rate2)*money;
    final_money=parseFloat(final_money.toFixed(3));
    document.getElementById("money").innerHTML=final_money.toLocaleString();
    //計算匯率資訊並顯示
    
    }
}

function showrateinfo(){

    var rateinfo;
    var rate1  =parseFloat(jsratelist[document.getElementById("first_rate").value]);
    var rate2  =parseFloat(jsratelist[document.getElementById("second_rate").value]);
    var x=document.getElementById("first_rate");
    var y=document.getElementById("second_rate");
    rateinfo="1"+x.options[x.selectedIndex].text+"="+(rate1/rate2)+y.options[y.selectedIndex].text;
    document.getElementById("rateinfo").innerHTML=rateinfo;
}

function switchrate(){
    var x=document.getElementById("first_rate").selectedIndex;
    var y=document.getElementById("second_rate").selectedIndex;
    var temp=x;
    document.getElementById('first_rate').getElementsByTagName('option')[y].selected = 'selected';
    document.getElementById('second_rate').getElementsByTagName('option')[temp].selected = 'selected';
    countinput();
    showrateinfo();
}
function reset(){

    document.getElementById("input_money").value="";       
    countinput();
}


