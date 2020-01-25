function findDuplicates(input) {
  var result = [];
  var RGEX = /^[a-zA-Z!@#$%^&*()_,.]+$/g;
  var kalimat = input.split(' ').join('');
  if (RGEX.test(kalimat)==true) {
      const strArr = kalimat.toLowerCase().split("").sort().join("").match(/(.)\1+/g);
      if (strArr == null) {
        result = "Tidak ada karakter yang berulang!";
      }else{
        for (var i=0; i<strArr.length;i++) {
            var character1 = strArr[i].charAt()+':'+strArr[i].length;
            result.push(character1);
        }
      }
  }else{
    result = "Inputan Harus String!";
  }
  return result;
};

console.log(findDuplicates('adobe'));
