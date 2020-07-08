/* Require Jquery API */ 
const ShowDiv = (div) => {
    return $(div).css("display","grid");
}
const Form = (show = true) => {
    if(!true){
        return $("#form").hide();
    }
    else{
       return $("#form").show();
        
    }
}
const Confirm = (idname) => {
   alertify.confirm('Exclusão','Tem certeza ?',() => {
    const id = $(".Cid").val();
    window.location.href = `?${idname}=${id}&act=del`;    
   }, () => {
    window.location.href = '?act=del';
   })
}