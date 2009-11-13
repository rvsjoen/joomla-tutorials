function submitbutton(task)
{
	if (task == '')
	{
		return false;
	}
	else
	{
		var isValid=true;
		if (task != 'helloworld.cancel' && task != 'helloworld.close')
		{
			var forms = $$('form.form-validate');
			for (var i=0;i<forms.length;i++)
			{
				if (!document.formvalidator.isValid(forms[i]))
				{
					isValid = false;
					break;
				}
			}
		}
	
		if (isValid)
		{
			submitform(task);
			return true;
		}
		else
		{
			alert(Joomla.JText._('com_helloworld_HelloWorld_Error_Some_Values_Are_Unacceptable','Some values are unacceptable'));
			return false;
		}
	}
}

