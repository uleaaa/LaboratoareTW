let result = document.getElementById("labtw");

if (document.querySelector('input[name="part1"]')) {
    document.querySelectorAll('input[name="part1"]').forEach((elem) => {
      elem.addEventListener("change", function(event) {
        var item = event.target.dataset.value;
        document.querySelector("#img1").setAttribute('src', item)
        console.log(item);
        var borderRgb = event.target.dataset.rgb
        document.querySelector('.coloana1').style.border=borderRgb
        document.querySelector('.coloana2').style.border='none'
        document.querySelector('.coloana3').style.border='none'
        
      });
    });
  }

  if (document.querySelector('input[name="part2"]')) {
    document.querySelectorAll('input[name="part2"]').forEach((elem) => {
      elem.addEventListener("change", function(event) {
        var item = event.target.dataset.value;
        document.querySelector("#img2").setAttribute('src', item)
        console.log(item);
        var borderRgb = event.target.dataset.rgb
        document.querySelector('.coloana2').style.border=borderRgb
        document.querySelector('.coloana1').style.border='none'
        document.querySelector('.coloana3').style.border='none'
      });
    });
  }

  if (document.querySelector('input[name="part3"]')) {
    document.querySelectorAll('input[name="part3"]').forEach((elem) => {
      elem.addEventListener("change", function(event) {
        var item = event.target.dataset.value;
        document.querySelector("#img3").setAttribute('src', item)
        console.log(item);
        var borderRgb = event.target.dataset.rgb
        document.querySelector('.coloana3').style.border=borderRgb
        document.querySelector('.coloana2').style.border='none'
        document.querySelector('.coloana1').style.border='none'
      });
    });
  }

    document.querySelector("#img1").addEventListener('click', function (){
    document.querySelector("#labtw").innerHTML=document.querySelector('input[name="part1"]:checked').value
  })

    document.querySelector("#img2").addEventListener('click', function (){
    document.querySelector("#labtw").innerHTML=document.querySelector('input[name="part2"]:checked').value
  })

    document.querySelector("#img3").addEventListener('click', function (){
    document.querySelector("#labtw").innerHTML=document.querySelector('input[name="part3"]:checked').value
  })

  document.querySelector('input[name="part1"]').dispatchEvent( new Event('change'))
  document.querySelector('input[name="part2"]').dispatchEvent( new Event('change'))
  document.querySelector('input[name="part3"]').dispatchEvent( new Event('change'))