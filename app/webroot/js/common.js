function toNum(elem) {
    n = elem.val()-0;
    if (isNaN(n)) {
        n = 0;
    }
    return n;
}

$(function(){
    $('input[type!="submit"][type!="button"]').keypress(function(e){
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            return false;
        }else{
            return true;
    }});
});


function camelCase(str){
  str = str.charAt(0).toLowerCase() + str.slice(1);
  return str.replace(/[-_](.)/g, function(match, group1) {
      return group1.toUpperCase();
  });
}
 
function snakeCase(str){
  var camel = camelCase(str);
  return camel.replace(/[A-Z]/g, function(s){
    return "_" + s.charAt(0).toLowerCase();
  });
}
 
function pascalCase(str){
  var camel = camelCase(str);
  return camel.charAt(0).toUpperCase() + camel.slice(1);
}
