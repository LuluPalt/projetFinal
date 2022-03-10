var ans = [0, 0, 0, 0, 0, 0, 0, 0, 0];
var rAns = [0, 0, 0, 0, 0, 0, 0, 0, 0];

function upRAns(x){
  rAns[x] = 1;
}

function ansCheck() {
  for(var i = 0; i < 9; i++){
    if(ans[i] != rAns[i]){
      document.getElementById("messagecaptcha").innerText = "Captcha erroné, veuillez réessayer.";
      return;
    }
  }
  document.getElementById("captchacheck").value = "yup";
  document.getElementById("messagecaptcha").innerText = "Captcha correct.";
}


function captchaClick(captcha) {
  const inputName = captcha.dataset.target;
  const input = document.querySelector("input[name='" + inputName + "']");
  input.checked = !input.checked;
  captcha.classList.toggle('checked');
  if(input.checked == true){
    ans[inputName.slice(0,1)] = 1;
  }
  else{
    ans[inputName.slice(0,1)] = 0;
  }
  console.log(ans);
  console.log(rAns);
}
