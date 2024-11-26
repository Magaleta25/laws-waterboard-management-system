let form = document.querySelector(".form");
let submit = document.querySelector(".submit");
const xhr = new XMLHttpRequest();

alert(form.value);

form.addEventListener("click",()=>{
     process();
})

function process(){
    xhr.open("POST", "concernProcess.php", true);
    const formData = new FormData('form');// use this one for forms only
 xhr.send(formData);
 xhr.onload = () => {
   let data =  xhr.response;
   document.innerHTML = data;
   console.log(data);
   alert(data.value);

}
}
