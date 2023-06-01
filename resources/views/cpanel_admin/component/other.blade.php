<script>
  function data_temp_func(data_temp, object, key1) {
    key2 = object.key1
    try {
      checkDataKey = data_temp.find(isData(data_temp,key1,key2))
      if(checkDataKey != undefined){
        key = getKeyByValue(data_temp, object.key1)
        data_temp[key].qty = parseInt(data_temp[key].qty) + parseInt(object.qty) 
      }else{
        data_temp.push(object)
      }
    } catch (error) {
      data_temp.push(object)
    }
    return data_temp
  }

  function delete_data_temp_func(data_temp, dataArr, cookieName){
    for (let index = 0; index < dataArr.length; index++) {
      var elementPos  = data_temp.map(function(x) {return x.id; }).indexOf(dataArr[index]);
      // var objectFound = data_temp[elementPos];
      if (elementPos > -1) {
        data_temp.splice(elementPos, 1);
      }
    }
    setCookie(cookieName, JSON.stringify(data_temp), 30)
  }
  
  function isData(data_temp,key,keyCond) {
    return data_temp.key === keyCond;
  }

  function getKeyByValue(object, value, keyCustom) {
    return Object.keys(object).find(key => object[key].keyCustom === value);
  }
</script>