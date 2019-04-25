jQuery(document).ready(function(){

  $('select').formSelect(); 

  let interval
$("form input").on('change',()=>{
  let userParams = {
    type: $("#type").val(),
    amplitude: $("#amplitude").val(),
    decalage: $("#decalage").val(),
    nbLampes: $("#nbLampes").val()
  }
  let x=0
  window.clearInterval(interval);
  $("#lightbox").html();
  interval =window.setInterval(()=>{
    x+=25
    render(x, userParams)
  },25)
})

});
let animations={
  animSin(time,index,userParams) {
    return userParams.amplitude*Math.sin(time-index*Math.PI*userParams.decalage/12)
  }
}
function getParams(time,index, userParams) {
  switch(userParams.type){
    case "vague":
      return {
        distanceTop:animations.animSin(time, index,userParams),
        intensity:(Math.sin(time/4-index*Math.PI/6)*0.5 +0.5)
      };
    break;
    default: 
    return {}
    break;
  }
 
}


function render(time, userParams){
 let html=""
 let groudBoxHtml =""
 for (var i = 0; i < userParams.nbLampes; i++) {
  let params= getParams(time, i, userParams)
   html+=`<div class="spotContainer">
   <div class="fil" style="top:${params.distanceTop}px"></div>
   <div class="spot" style="top:${params.distanceTop}px;opacity:${params.intensity};"></div>
   </div> `
let shadow = (params.distanceTop+100)/3
   groudBoxHtml+=`<div class="groundBoxContainer">
   <div class="groundBoxItem" style="box-shadow: 0px 0px 40px ${(shadow)}px  rgba(255,255,97,0.5);-webkit-box-shadow: 0px 0px 40px ${(shadow)}px rgba(255,255,97,1);
-moz-box-shadow: 0px 0px 40px ${(shadow)}px  rgba(255,255,97,1);opacity:${params.intensity};background-color:red"></div>
   </div> `
 }


 $("#lightbox").html(html);
 $("#groundBox").html(groudBoxHtml)




}