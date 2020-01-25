function validate_username(input){
  var inputForm = input;
  var RGEX = /^[a-z0-9._]{8,12}$/g;

  var Result = RGEX.test(inputForm);

  if(Result == false){
    return false;
  }else{
  	return true;
  }
}

function validate_password(input){
	if (input.length <= 9) {
		if (input.match(/(\W|_)/) && input.match(/(\d)/)) {
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

console.log('Result username validation is '+validate_username("john.smith"));
console.log('Result password validation is '+validate_password("j0hn5m!th"));
