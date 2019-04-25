jQuery(document).ready(function(){

  $('select').formSelect();

  let interval
$("form input").on('change',()=>{
  let userParams = {
    type: $("#type").val(),
    amplitude: $("#amplitude").val(),
    decalage: $("#decalage").val(),
    nbLampes: $("#nbLampes").val(),
    amplitudeIncl: $("#amplitudeIncl").val(),
    vitessemouv: $("#vitessemouv").val()*0.5,
    color:$("#colorId").val(),
    schema: $("#schema").val(),
    periode: $("#periode").val()
  }
  let x=0
  window.clearInterval(interval);
  $("#lightbox").html();
  interval =window.setInterval(()=>{
    x+=25
    render(x, userParams)
  },25)
})

let intensity={
  Sin(time, index, userParams){
    console.log(userParams.periode)
    return (Math.sin(time-index*Math.PI*userParams.periode/12)*0.5 +0.5)
  },
  Strobo(time, index, userParams){

    if((time%userParams.periode*0.1)<(userParams.periode*0.1/2)){
      return 1
    }else{
      return 0
    }
  },

  Chenille(time, index,userParams) {
    if(Math.trunc((userParams.periode*(time/2000)+index/10))%2==0){
    return 0
    }else{
      return 1
    }
  },
  AlternatStrobo(time, index, userParams){
    console.log("in")
    if((time%userParams.periode*0.1)<(userParams.periode*0.1/2)){
      console.log("haut")
      return index%2 ==0 ? 1 : 0
    }else{
      console.log("bas")
      return index%2 ==0 ? 0 : 1
    }
  }
}

function getIntensity(time,index, userParams) {
  switch(userParams.schema) {
    case "stroboscope":
      return intensity.Strobo(time, index,userParams)
    break;
    case "vaguelum":
      return intensity.Sin(time, index,userParams)
    break;
    case "chenille":
    return intensity.Chenille(time, index,userParams)
    break;
    case "Alternatstrobo":
      return intensity.AlternatStrobo(time, index,userParams)
    break;
    default:
    return {}
    break;
  }
};
let animations={
  Sin(time,index,userParams) {
    return userParams.amplitude*Math.sin(time*userParams.vitessemouv-index*Math.PI*userParams.decalage/12)
  },
  Incl(time, index, userParams) {
    console.log('in')
    return userParams.amplitudeIncl*index/10
  },
  Chapeau(time, index, userParams) {
    return Math.abs(userParams.amplitudeIncl*index/10-userParams.amplitudeIncl/2 + 5)
  },
  ChapeauInverse(time, index, userParams) {
    return -Math.abs(userParams.amplitudeIncl*index/10-userParams.amplitudeIncl/2 + 5)
  },
  Crois(time, index, userParams){
    return userParams.amplitude*index/10*Math.sin(time*userParams.vitessemouv-index*Math.PI*userParams.decalage/12)
  },
  Papillon(time,index,userParams){
    if(index<6){
      return userParams.amplitude*Math.sin(time*userParams.vitessemouv-index*Math.PI*userParams.decalage/12)
    }
    else{
      return (userParams.amplitude*Math.sin(time*userParams.vitessemouv+index*Math.PI*userParams.decalage/12))
    }
  },
  SinIncl(time, index,userParams){
    return (userParams.amplitude*Math.sin(time*userParams.vitessemouv-index*Math.PI*userParams.decalage/12))+(userParams.amplitudeIncl*index/10)
  }
}

function getParams(time,index, userParams) {
  switch(userParams.type){
    case "vague":
      return {
        distanceTop:animations.Sin(time, index,userParams),
        intensity:getIntensity(time,index, userParams)
      };
    break;
    case "papillon":
      return {
        distanceTop:animations.Papillon(time, index,userParams),
        intensity:getIntensity(time,index, userParams)
      };
    break;
    case "inclinaison":
      return {
        distanceTop:animations.Incl(time, index,userParams),
        intensity:getIntensity(time,index, userParams)
      };
    break;
    case "chapeau":
      return {
        distanceTop:animations.Chapeau(time, index,userParams),
        intensity:getIntensity(time,index, userParams)
      };
    break;
    case "chapeauinverse":
      return {
        distanceTop:animations.ChapeauInverse(time, index,userParams),
        intensity:getIntensity(time,index, userParams)
      };
    break;
    case "vaguecrois":
      return {
        distanceTop:animations.Crois(time, index,userParams),
        intensity:getIntensity(time,index, userParams)
      };
    break;
    case "creation1":
      return {
        distanceTop:animations.SinIncl(time, index,userParams),
        intensity:getIntensity(time,index, userParams)
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
   <div class="spot" style="top:${params.distanceTop}px;opacity:${params.intensity};background-color:${userParams.color};-webkit-box-shadow: 0px 0px 43px 5px ${userParams.color};
   -moz-box-shadow: 0px 0px 43px 5px ${userParams.color};
   box-shadow: 0px 0px 43px 5px ${userParams.color};"></div>
   </div> `
let shadow = (params.distanceTop+100)/3
   groudBoxHtml+=`<div class="groundBoxContainer">
   <div class="groundBoxItem" style="box-shadow: 0px 0px 40px ${(shadow)}px  ${userParams.color};-webkit-box-shadow: 0px 0px 40px ${(shadow)}px ${userParams.color};
-moz-box-shadow: 0px 0px 40px ${(shadow)}px  ${userParams.color};opacity:${params.intensity};background-color:${userParams.color}"></div>
   </div> `
 }


 $("#lightbox").html(html);
 $("#groundBox").html(groudBoxHtml)




}
})
