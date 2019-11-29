let cfs = document.querySelectorAll('.confirm');
for(let btn of cfs)
    btn.onclick = function(){
        let red = this.parentElement.parentElement;
        let data = { 
          d1:red.querySelector('.d1').innerHTML, 
          d2:red.querySelector('.d2').innerHTML, 
          t:red.querySelector('.t').innerHTML, 
          d:red.querySelector('.d').innerHTML, 
          bg:red.querySelector('.bg').innerHTML, 
          p:red.querySelector('.p').innerHTML,
          rid:this.getAttribute('data-rid'),
          tip:'unesi'
        };
        let opcije = {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        }
        fetch('reserve.php', opcije)
          .then(resp=>resp.json())
          .then(json=>{
              if (json.success==true){
                  alert("Your reservation has been successeful");
                  window.location.href="zivote.php";
              }else{
                  alert(json.msg);
              }
          });
    }