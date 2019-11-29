let cfs = document.querySelectorAll('.cancel');
for(let btn of cfs)
    btn.onclick = function(){
        let red = this.parentElement.parentElement;
        let data = { 
          id:this.getAttribute('data-id'),
          tip:'obrisi'
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
                  alert("Your reservation has been deleted");
                  window.location.reload();
              }else{
                  alert(json.msg);
              }
          });
    }