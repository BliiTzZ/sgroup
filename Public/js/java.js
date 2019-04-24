jQuery(document).ready(function(){
  let interval
$("#start").click(()=>{
  let params = {
    type: $("#type").val()
  }
  console.log("coucou");
  let x=0
  window.clearInterval(interval);
  $("#lightbox").html();
  interval =window.setInterval(()=>{
    x+=50
    render(x)
  },50)
})

});
let animations={
  animSin(time,index,amplitude,decalage) {
    return amplitude*Math.sin(time-index*Math.PI*decalage/12)
  }
}
function getParams(time,index) {
  // body..
  return {
    distanceTop:animations.animSin(time, index,40,6),
    intensity:(Math.sin(time-index*Math.PI/6)*0.5 +0.5)
  };
}


function render(time, params){
 html=""

 for (var i = 0; i < 10; i++) {
  let params= getParams(time, i)
   html+=`<div class="spot" style="top:${params.distanceTop}px;opacity:${params.intensity};background-color:red"></div> `
 }
 $("#lightbox").html(html);




}