function sendEmail(){
    var  params = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        message: document.getElementById("message").value,
    };

    const serviceID ="service_xhuz4kg";
    const templatesID ="template_53z2fj8";

    emailjs.send(serviceID,templatesID,params)
        .then(
            res =>{
                 document.getElementById("name").value = "";
                     document.getElementById("email").value = "";
                     document.getElementById("message").value = "";

                     console.log(res);
                     alert("Your Message was Sent Successfully !")
            }
        )
        .catch((err) => console.log(err));
}