function myFunction(nama, umur){
	var json_data;
    json_data = '{"name" : "'+nama+'", "age":"'+umur+'", "address":"Ds. Kedungdowo Rt1 Rw 3, Kaliwungu, Kudus","hobbies": ["Programming","Traveling"],"is_married":false, "list_school": [{"SD":{"name":"SD 1 Kedungdowo","year_in":2000,"year_out":2006,"major":null}},{"SMP":{"name":"SMP N 1 Kaiwungu","year_in":2006,"year_out":2009,"major":null}},{"SMK":{"name":"SMK WISUDHA KARYA KUDUS","year_in":2009,"year_out":2012,"major":"Teknik Audio/Video"}},{"UNIVERSITAS":{"name":"UNIVERSITAS MURIA KUDUS","year_in":2014,"year_out":2018,"major":"Sistem Informasi"}}],"skills": [{"skill_name":"PHP Programming", "level":"advanced" },{"skill_name":"Javascript Programming", "level":"advanced" }],"interest_in_coding":true }';
	obj = JSON.parse(json_data);

	return obj
}

console.log(myFunction('ADITIA RASID',25));
