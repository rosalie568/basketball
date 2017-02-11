function firstnamecheck()
{
var x = document.getElementById("firstName").value;
if(!x.match(/^[A-Za-z]*$/)){
 document.getElementById("demo").innerHTML = "Invaild Input: " + x;
}
}

function lastnamecheck()
{
var x = document.getElementById("lastName").value;
if(!x.match(/^[A-Za-z]*$/)){
 document.getElementById("demo1").innerHTML = "Invaild Input: " + x;
}
}

function emailcheck()
{
var x = document.getElementById("email").value;
if(!x.match(/^[A-Za-z0-9._%+-]*@[A-Za-z.-]*[A-Za-z]{2,4}$/)){
 document.getElementById("demo4").innerHTML = "Invaild Input: " + x;
}
}

function phonenumbercheck()
{
var x = document.getElementById("phoneNum").value;
if(!x.match(/^[0-9]{3} [0-9]{3}-[0-9]{4}$/)){
 document.getElementById("demo5").innerHTML = "Invaild Input: " + x;
}
}
function passwordcheck()
{
var x = document.getElementById("password").value;
var y = document.getElementById("passwordConf").value;
if(y!=x){
 document.getElementById("demo6").innerHTML = "Password did not match " 
}
}