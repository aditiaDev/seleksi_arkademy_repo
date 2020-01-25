function jabat_tangan(input){
	var result=0;
	for (var i = 0; i < input; i++) {
		result += i; 
	}
	return result;
}

console.log(jabat_tangan(6));
