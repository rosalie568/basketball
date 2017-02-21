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
		alert("Password did not match ");
	}
}

function minCheck()
{
	var x = document.getElementById("Min").value;
	var y = document.getElementById("Max").value;
	if( x <= 0 || isNaN(x) ) {
		alert("Min value needs to be an interger greater than or equal to 0.");
	}
}

function maxCheck()
{
	var x = document.getElementById("Min").value;
	var y = document.getElementById("Max").value;
	if(y <= 1 || isNaN(y) ) {
		alert("Max value needs to be an interger greater than or equal to 1.");
	}

}
