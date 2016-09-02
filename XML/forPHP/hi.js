function hi()
{
alert ("HIIIIIIII");
var fruits= new Array('fgfg','gfgffg');
console.log(fruits);
fruits.push('dffd');
var fruit = prompt("Please enter fruit to add", "Fruit");
    
    if (fruit != null) {
        document.getElementById("demo").innerHTML = fruit + " added";
    }

	
	

}/*
var a = prompt("A : ", "");
var b = prompt("B : ", "");
alert(parseInt(a) + parseInt(b));
*/
 function printPara(){
	document.getElementById("txt1").innerHTML="You double clicked on the Para";
 }
 
function table()
{
var num=prompt("Enter the num", "");
for(var i=0; i<=10; i++ )
{
document.write(num*i+'<br>');

}

}



function startTime()
{
var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
     setTimeout(startTime, 500);

}

function chancol()
{
var x= document.getElementById("mySelect").value;
document.getElementById("div1").style.backgroundColor = x;
}

