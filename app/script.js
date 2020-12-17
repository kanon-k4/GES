function set2fig(num) {
    // 桁数が1桁だったら先頭に0を加えて2桁に調整する
    var ret;
    if( num < 10 ) { ret = "0" + num; }
    else { ret = num; }
    return ret;
}

function ClockF() {
    var Time = new Date();
    var Year = Time.getFullYear();
    var Month = set2fig( Time.getMonth()+1 );
    var Day = set2fig( Time.getDate() );
    var Hour = set2fig( Time.getHours()  ); 
    var Min = set2fig( Time.getMinutes() ); 
    var Sec = set2fig( Time.getSeconds() );

    var date =  Year + "/" + Month + "/" + Day + "&nbsp;&nbsp;";
    var time =  Hour + ":" + Min + ":" + Sec;

    document.getElementById("day").innerHTML = date;
    document.getElementById("clock").innerHTML = time;

}

setInterval('ClockF()',1000);
