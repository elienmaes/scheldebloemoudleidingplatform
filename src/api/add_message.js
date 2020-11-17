const form = document.querySelector('.chatpage-container');
const messageInput = document.querySelector('.chatpage-box');
const message = document.querySelector('.message');


form.addEventListener('submit', e=>{
  e.preventDefault();

console.log(messageInput.value);
   const websiteUrl="http://localhost/php-website/src/index.php?q_id=5";
  const getMessage= async()=>{
   const formattedFormData = new FormData(form);
    const response = await fetch(`${websiteUrl}`, 
    {method:'POST',
  body:JSON.stringify(formattedFormData)
});
    if(!response.ok) throw new Error('niet mogelijk om bericht door te sturen');
    return await response.text();
 }
 getMessage();
});

