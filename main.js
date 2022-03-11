const img = document.querySelector("#here");
var loadimg ;

img.addEventListener('change' , ()=>{
    const reader = new FileReader() ;
    reader.addEventListener('load' , ()=>{
    loadimg = reader.result ;
    document.querySelector("#testingimg").style.backgroundImage = `url(${loadimg})` ; 
    }) ;
    reader.readAsDataURL(this.files[0]) ;
}) 