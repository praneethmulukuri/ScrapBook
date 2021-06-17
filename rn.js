function ncky()
{
	var x=document.forms["pra"]["fname"].value;
	var y=document.forms["pra"]["lname"].value;
	var p=document.forms["pra"]["phno"].value;
	var e=document.forms["pra"]["email"].value;
	var u=document.forms["pra"]["uid"].value;
	var pa=document.forms["pra"]["pass"].value;
	var cpa=document.forms["pra"]["cpass"].value;
	var checkp=/^[0-9]{10}$/;
	var checkn=/^[a-zA-Z]+$/;
	var checku=/^([a-zA-Z0-9]+@*)+$/;
	var checkpa=/^([a-zA-Z0-9]+@*)+$/;
	var l=e.length;
	var d=".";
	var a="@";
	var la=e.indexOf(a);
	var ld=e.indexOf(d);
	if(x.length==0)
	{
		text="Please enter your FIRST NAME.";
		document.getElementById("error").innerHTML=text;
		return false; 
	}
	else if(!x.match(checkn))
	{
		text="FIRST NAME must contain alphabets only.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(y.length==0)
	{
		text="Please enter your LAST NAME.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(!y.match(checkn))
	{
		text="LAST NAME must contain alphabets only.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(p.length==0)
	{
		text="Please enter your PHONE NO.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(p.length!=10)
	{
		text="Phone no must contain exactly 10 digits.";
		document.getElementByID("error").innerHTML=text;
		return false;
	}
	else if(!p.match(checkp))
	{
		text="Invalid PHONE NO.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(e.length==0)
	{
		text="Please enter EMAIL ID.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(la==-1||ld==-1||la==l||ld==l||la==0||ld==0||e.indexOf(a,la+1)!=-1||e.indexOf(d,la+2)==-1)
	{
		text="Invalid EMAIL ID";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(u.length==0)
	{
		text="Please enter USER ID.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(!u.match(checku))
	{
		text="Invalid USER ID.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(pa.length==0)
	{
		text="Please enter PASSWORD.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(pa.length<6)
	{
		text="Password must contain atleast 6 characters.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(!pa.match(checkpa))
	{
		text="Invalid Password.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(cpa.length==0)
	{
		text="Please enter CONFIRM PASSWORD.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	else if(pa.localeCompare(cpa)!=0)
	{
		text="PASSWORD does not matches with CONFIRM PASSWORD.";
		document.getElementById("error").innerHTML=text;
		return false;
	}
	return true;
}