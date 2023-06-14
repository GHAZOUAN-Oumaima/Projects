<?php
    include_once "../model/model.inc.php";
    class View extends Model{
        protected $content;
        protected $title;

        public function __construct($title){
            $this->title=$title;
            $this->content='<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$title.'</title>
                <link rel="stylesheet" href="../view/formstyle.css">
                <link rel="stylesheet" href="../view/style4.css">
                <link rel="stylesheet" href="../view/style3.css">
                <link rel="stylesheet" href="../view/style.css">
                <link rel="stylesheet" href="../view/style2.css">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            </head>
            <body>
                <header class="main-head">
                    <nav>
                        <h1>'.$title.'</h1>
                        <ul>
                            <li></li>
                            <li></li>
                            <li><a href="../view/index.php" id="return">Retour</a></li>
                            
                        </ul>
                    </nav>
                </header>
                
            <section class="hero">';
        }

        public function getContent(){
            return $this->content;
        }

        public function endContent(){
            $this->content.='</section>
            <footer>
            <div class="contact-info">
              <div class="info-item">
                <div class="icon">
                  <i class="fa fa-map-marker"></i>
                </div>
                <h5>Vous allez nous trouver à</h5>
                <p>Madinat Al Irfane - Rabat<br>80000 Morocco</p>
              </div>
              <div class="info-item">
                <div class="icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <h5>Envoyez-nous un mail sur</h5>
                <p><a href="mailto:oumaghazouan@gmail.com">oumaghazouan@gmail.com</a><br>
                   <a href="mailto:oumayma070502@gmail.com">oumayma070502@gmail.com</a></p>
              </div>
              <div class="info-item">
                <div class="icon">
                  <i class="fa fa-phone"></i>
                </div>
                <h5>Appelez-nous sur</h5>
                <p class="phone-number">Phone: (+212) 13 58 99 88</p>
              </div>
            </div>
          </footer>
            <script src="../view/main.js"></script>
            
            </body>
            </html>';
        }

        public function display(){
            $this->endContent();
            echo $this->getContent();
        }
    }


?>