<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .contact_form {
            /* display: none; */
            position: fixed;
            right: 0;
            bottom: 4rem;
            width: 270px;
            overflow: hidden;
            padding: 10px;
            z-index: -2;
            transition: all 0.3s ease;
            transform: translateX(100%);

        
             /* Initially move it off-screen to the left */
        }
    
        #hover:hover + .contact_form,
        .contact_form:hover {
         
            transform: translateX(0);
             /* Move it back to its original position */
        }
    
        form{
            display: flex;
            
            flex-direction: column;
        }
        .contact_container {
            position: fixed;
            bottom: 150px;
            right: 0px;
            display: flex;
            flex-direction: column;
        }
    
        #hover {
            width: 45px;
            height: 45px;
            z-index: 1;
            position: fixed;
            right: 0;
            bottom: 10rem;
            background-color: #ec1e24;
            color: #FFF;
            border: none;
    
            font-size: 22px;
    
            cursor: pointer;
            transition: transform 0.3s ease;
        }
    
    
        .whatsapp_button {
            position: fixed;
            right: 0;
            bottom: 5rem;
            width: 45px;
            z-index: 1;

            height: 45px;
            margin-bottom: 32px;
            background-color: #30ce10;
            color: #FFF;
            border: none;
            font-size: 22px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
    
    </style>
    
</head>
<body>
    <nav>
        <a href="/login">
        <button class="btn btn-primary">Login</button>
        </a>
        <a href="/show">
            <button class="btn btn-primary">Show Table</button>
        </a>
    </nav>
    
    
            
        <div class="contact_container">
            <div>
                <button id="hover" class="contact_button">
                    <i class="fa fa-envelope"></i>
                </button>
                
                <div class="contact_form">

                    <form action="contact_form" method="POST" name="theform" id="enq" autocomplete="off" enctype="multipart/form-data">
                        
                        <div class="row">
                
                            <div class="col-lg-12">
                                
                                <div class="form_box mb-15">
                                    
                                    <input type="text" name="name" id="name" value='' onkeyup="vald_name()" placeholder="Name">
                                    
                                    <span class="error" id="namerr"></span>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="col-lg-12">
                                
                                <div class="form_box mb-15">
                                    
                                    <input type="text" name="mobile" id="num" value='' onkeyup="vald_num()" placeholder="Mobile Number">
                                    
                                    <span class="error" id="numerr"></span>
                
                                </div>
                
                            </div>
                
                            <div class="col-lg-12">
                
                                <div class="form_box mb-15">
                                    
                                    <input type="email" name="email" id="mail" value='' onblur="vald_email()" placeholder="Email Address">
                                    
                                    <span class="error" id="emailerr"></span>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="col-lg-12">
                                
                                <div class="form_box mb-15">
                                    
                                    <input type="text" name="subject" id="subj" value='' onkeyup="vald_subj()" placeholder="Subject">
                                    
                                    <span class="error" id="suberr"></span>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="col-lg-12">
                                
                                <div class="form_box mb-15">
                
                                    <textarea name="message" id="message" value='' onkeyup="vald_msge()" placeholder="Write a Message"></textarea>
                
                                    <span class="error" id="msgerr"></span>
                
                                </div>
                
                                <span class="error" id="msgerr"></span>
                                
                                <div class="quote_btn">
                                    
                                    <input type="button" class="btn btn-primary" value="Send Message" onclick="validate()">
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </form>
                </div>
                
                
            </div>
            
            <a href="#" class="whatsapp_button" ><button class="whatsapp_button">
                <i class="fab fa-whatsapp"></i>
            </button></a>
            
            
        </div>
        <script>
            //  contact us validations
        
            let errorName = document.getElementById('namerr');
        
            let errorEmail = document.getElementById('emailerr');
        
            let errorNum = document.getElementById('numerr');
        
            let errorSub = document.getElementById('suberr');
        
            let errorMsge = document.getElementById('msgerr');
        
        
        
            function vald_name() {
        
                let name = document.getElementById('name').value;
        
        
        
                if (String(name).length == 0) {
        
                    errorName.innerHTML = "Name required";
        
                    return false;
        
                } else if (String(name).length < 2) {
        
                    errorName.innerHTML = "Enter your name";
        
                    return false;
        
                } else {
        
                    errorName.innerHTML = "";
        
                    return true;
        
                }
        
            }
        
        
        
            function vald_email() {
        
                let email = document.getElementById('mail').value;
        
                // alert(email);
        
                if (email == '') {
        
                    errorEmail.innerHTML = "Email required";
        
                    return false;
        
                } else if (!email.match(/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/)) {
        
                    errorEmail.innerHTML = "Email format invalid";
        
                    return false;
        
                } else {
        
                    errorEmail.innerHTML = "";
        
                    return true;
        
                }
        
            }
        
        
        
            function vald_num() {
        
                let num = document.getElementById('num').value;
        
        
        
                if (num.length == 0) {
        
                    errorNum.innerHTML = "Number required";
        
                    return false;
        
                } else if (num.length > 10) {
        
                    errorNum.innerHTML = "Number format invalid";
        
                    return false;
        
                } else {
        
                    errorNum.innerHTML = "";
        
                    return true;
        
                }
        
            }
        
        
        
            function vald_subj() {
        
                let subbject = document.getElementById('subj').value;
        
        
        
                if (subbject.length == 0) {
        
                    errorSub.innerHTML = "required";
        
                    return false;
        
                } else {
        
                    errorSub.innerHTML = "";
        
                    return true;
        
                }
        
            }
        
        
        
        
        
            function vald_msge() {
        
                let service = document.getElementById('message').value;
        
        
        
                if (service.length == 0) {
        
                    errorMsge.innerHTML = "required";
        
                    return false;
        
                } else {
        
                    errorMsge.innerHTML = "";
        
                    return true;
        
                }
        
            }
        
        
        
            function validate() {
        
                if (
        
                    vald_name()
        
                    &&
                    vald_email()
        
                    &&
                    vald_num()
        
                    &&
                    vald_subj()
        
                    &&
                    vald_msge()
        
                ) {
        
                    swal('Message Sent! ');
        
                    $("#enq").submit();
        
                    return true;
        
        
        
                } else {
        
                    // swal('Please fill all the fields');
        
                    return false;
        
                }
        
            }
        </script>
</body>
</html>