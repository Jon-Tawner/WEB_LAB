function generateDate(){var e=new Date;return(e.getDate()<10?"0"+e.getDate():e.getDate())+"."+((e.getUTCMonth()<10?"0"+e.getUTCMonth():e.getUTCMonth())+1)+"."+(e.getFullYear()<10?"0"+e.getFullYear():e.getFullYear())+" "+(e.getHours()<10?"0"+e.getHours():e.getHours())+":"+(e.getMinutes()<10?"0"+e.getMinutes():e.getMinutes())+":"+(e.getSeconds()<10?"0"+e.getSeconds():e.getSeconds())}function resetTime(){$("#date123").text(generateDate()),setInterval((()=>{$("#date123").text(generateDate())}),1e3)}resetTime();