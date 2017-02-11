function firstnamecheck()
{
	var x = document.getElementById("firstName").value;
	if(!x.match(/^[A-Za-z]*$/)){
		alert("Invaild Input \n Should Be Letters");
	}
}

function lastnamecheck()
{
	var x = document.getElementById("lastName").value;
	if(!x.match(/^[A-Za-z]*$/)){
		alert("Invaild Input \n Input Should Be Letters");
	}
}

function emailcheck()
{
	var x = document.getElementById("email").value;
	if(!x.match(/^[A-Za-z0-9._%+-]*@[A-Za-z.-]*[A-Za-z]{2,4}$/)){
		alert("Invaild Input \n Input Should Be \n letters,numbers,symbols@abc.abc " );
	}
}

function phonenumbercheck()
{
	var x = document.getElementById("phoneNum").value;
	if(!x.match(/^[0-9]{3} [0-9]{3}-[0-9]{4}$/)){
		alert("Invaild Input \n Input Should Be xxx xxx-xxxx " );
	}
}
function passwordcheck()
{
	var x = document.getElementById("password").value;
	var y = document.getElementById("passwordConf").value;
	if(y!=x){
		alert("Password did not match ") 
	}
}