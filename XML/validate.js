name,email,branch,age,conEmail,radio,check;

function validateForm()
{
	name = document.getElementById('NameId').value;
	age = document.getElementById('AgeId').value;
	email = document.getElementById('EmailId').value;
	conEmail = document.getElementById('ConEmailId').value;
	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
	var re1 = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
	
	if(name=="")
	{
		alert("Name cannot be empty!");
		return false;
	}
	if(age=="")
	{
		alert("Age cannot be empty");
		return false;
	}
	if(isNaN(age)==true)
	{
		alert("Age must be a number!!");
		return false;
	}
	if(email=="")
	{
		alert("Email cannot be null!");
		return false;
	}
	if(!re.test(email))
	{
		alert("Enter a valid email!");
		return false;
	}
	if(!re1.test(conEmail))
	{
		alert("Confirm email is invalid!");
		return false;
	}
	if(conEmail!=email)
	{
		alert("Confirm email does not match to email!");
		return false;
	}
	
	var RadioSel = false;
	radio = document.getElementsByName('Branch');
	for(var i=0,rb;rb=radio[i];i++)
	{
		if(rb.checked)
		{
			RadioSel=true;
			break;
		}
	}
	if(!RadioSel)
	{
		alert("Please select one branch");
		return false;
	}
	
	var CheckSel = false;
	check = document.getElementsByName('Skills');
	for(var j=0,ch;ch=check[j];j++)
	{
		if(ch.checked)
		{
			CheckSel = true;
			break;
		}
	}
	if(!CheckSel)
	{
		alert("Check atleast one check box!");
		return false;
	}
	
}

function checkAll()
{
	
	document.getElementById('UnCheckAllId').checked=false;
	checkboxes = document.getElementsByName('Skills');
	for(var i=0;i<checkboxes.length;i++)
	{
		checkboxes[i].checked=true;
	}
}



function unCheckAll()
{
	
	checkboxes = document.getElementsByName('Skills');
	for(var i=0;i<checkboxes.length;i++)
	{
		checkboxes[i].checked=false;
	}
}



function change(){
	document.getElementById('SkillsId4').checked=false;
}