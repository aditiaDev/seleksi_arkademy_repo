function findHighestProfit(input) {
  var result = [];
  if (Array.isArray(input)) {
      var minPrice = input[0];
      var maxProfit = input[1] - input[0];
      var minIndex = 0;
      

      for (var i = 1, length = input.length; i < length; ++i) {  
        if (input[i] - minPrice > maxProfit) {
          maxProfit = input[i] - minPrice;
          
        }
       
        if (input[i] < minPrice && i !== length - 1) {
          minPrice = input[i];
          minIndex = i;
        }
      }

      if (maxProfit<=0) {
        result = "Tidak bisa mendapatkan profit pada hari-hari ini";
      }else{
        result = maxProfit;
      }

      return result;
  }else{
      result = "Input parameter must be an Array";
      return result;
  }
}

console.log(findHighestProfit([10, 2, 11, 20, 3, 5]));
