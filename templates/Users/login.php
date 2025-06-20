<style>
    .glass-card {
    background: rgba(15, 12, 41, 0.5);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
    width: 90%;
    max-width: 400px;
    padding: 2.5rem;
    margin: 2rem;
    position: relative;
    z-index: 10;
    background: linear-gradient(135deg, #0f626a 0%, #198f94 50%, #0d3f43 100%);
    /* background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%); */
}
.card_background{
        display: flex;
    justify-content: center;
}
.glass-card form label{
    color:#fff
}

    /* .login_box {
    padding: 2rem;
    border-radius: 0.4rem;
    box-shadow: 0 7px 14px 0 rgba(60, 66, 87, 0.1),
        0 3px 6px 0 rgba(0, 0, 0, 0.07);
    width: 100%;
    height: 100%;
    background-color: #1B1B1B;
    background-image: url(https://i.postimg.cc/4dnZCH03/background.png);
    background-position: bottom center;
    background-repeat: no-repeat;
    background-size: 300%;
    border-radius: 6px;
    max-width: 500px;
    margin: auto;
} */


        
        .sphere-1 {
            width: 250px;
            height: 250px;
            top: 10%;
            left: 25%;
            background: radial-gradient(circle at 30% 30%, #ff00ff 0%, #9d00ff 100%);
            animation-delay: 0s;
        }
        
        .sphere-2 {
            width: 180px;
            height: 180px;
            bottom: 15%;
            right: 15%;
            background: radial-gradient(circle at 30% 30%, #00ffcc 0%, #0099ff 100%);
            animation-delay: 3s;
        }
        
        .sphere-3 {
            width: 120px;
            height: 120px;
            top: 90%;
            left: 20%;
            background: radial-gradient(circle at 30% 30%, #ffcc00 0%, #ff6600 100%);
            animation-delay: 6s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }
        
        .input-field {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 15px 20px;
            color: white;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .input-field:focus {
            background: rgba(255, 255, 255, 0.15);
            outline: none;
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }
        
        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .btn-login {
            background: linear-gradient(45deg, #9d00ff, #ff00ff);
            color: white;
            border-radius: 50px;
            padding: 15px 0;
            transition: all 0.3s ease;
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(157, 0, 255, 0.4);
        }
        
        .social-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .social-icon:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .title {
            background: linear-gradient(90deg, #9d00ff, #00ffcc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
        }
        
        .checkbox-container input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            outline: none;
            cursor: pointer;
            position: relative;
            margin-right: 8px;
        }
        
        .checkbox-container input[type="checkbox"]:checked {
            background: linear-gradient(45deg, #9d00ff, #ff00ff);
            border-color: transparent;
        }
        
        .checkbox-container input[type="checkbox"]:checked::after {
            content: "✓";
            position: absolute;
            color: white;
            font-size: 12px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
.center-wrap h2 {
    font-size: 30px;
    text-align: center;
    color: #fff;
}
.content form {
    margin: 0;
}
.center-wrap label {
    color: #c4c3ca;
}
.center-wrap input {
    padding: 13px 20px;
    padding-left: 20px;
    height: 48px;
    width: 100%;
    font-weight: 500;
    border-radius: 4px;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.5px;
    outline: none;
    /* background-color: #242323 !important; */
    border: none;
    /* color: #c4c3ca !important; */
    margin-bottom: 20px;
}
input:-internal-autofill-selected {
    background-color: #242323 !important;
}
.center-wrap p {
    color: #fff;
    text-align: center;
    font-size: 16px;
}
.center-wrap a {
    color: #e91e63;
    text-decoration: none;
}
.themebtn {
    padding: 10px 30px;
    background-color: #0f626a;
    color: #fff;
    font-size: 16px;
    display: block;
    align-items: center;
    gap: 5px;
    border-radius: 5px;
    border: none;
    height: 44px;
    margin: 15px auto;
    cursor: pointer;
}
.themebtn:focus{
    outline: none;
    box-shadow: none;
    border: none;
}
.themebtn:hover {
    background-color: #0f626acc;
    color: #fff;
}
</style>
<div class="card_background">
<div class="glass-card">
    <?php echo $this->Flash->render() ?>
    <div class="center-wrap">
    <h2 class="">Login</h2>  
    <?php echo $this->Form->create(null, array(
            'templates' => array(
                'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
                'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}>'
            )
        ));?>
    <?php echo $this->Form->control('username')?>
    <?php echo $this->Form->control('password')?>
    <?php echo $this->Form->button('Login', array('class' => 'themebtn'))?>
    <?php echo $this->Form->end();?>
    </div>
</div>
    </div>