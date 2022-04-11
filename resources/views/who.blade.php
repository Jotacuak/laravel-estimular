<doctype html>
    <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="shortcut icon" href="https://www.youtube.com/s/desktop/12d6b690/img/favicon.ico">
    
            <title>Estimu'lar</title>
            <meta name="description" content="descripción de la web, se recomienda 90 caracteres">
            <meta name="keywords" 	 content="estimulacion cognitiva, demencia, alzheimer, parkinson">
    
            <!-- 
            <meta property="fb:app_id"        content="" /> 
            <meta property="og:url"           content="" />
            <meta property="og:type"          content="website" />
            <meta property="og:title"         content=""/>
            <meta property="og:description"   content="" /> 
            -->
    
            <!-- <link href="style/mobile-app.css" rel="stylesheet"> -->
            <link href="{{mix('front/desktop/css/app.css')}}" rel="stylesheet">
        </head>
        
        <body>
            <header>
                <div class="header-top">
                    <div class="desktop-three-columns mobile-two-columns">
                        <div class="column">
                            <div class="header-hamburger mobile-only">
                                <button type="button" id="collapse-button">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div> 
    
                            <div class="header-logo">
                                <div class="header-logo-image">
                                    <svg viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M21.33,12.91C21.42,14.46 20.71,15.95 19.44,16.86L20.21,18.35C20.44,18.8 20.47,19.33 20.27,19.8C20.08,20.27 19.69,20.64 19.21,20.8L18.42,21.05C18.25,21.11 18.06,21.14 17.88,21.14C17.37,21.14 16.89,20.91 16.56,20.5L14.44,18C13.55,17.85 12.71,17.47 12,16.9C11.5,17.05 11,17.13 10.5,17.13C9.62,17.13 8.74,16.86 8,16.34C7.47,16.5 6.93,16.57 6.38,16.56C5.59,16.57 4.81,16.41 4.08,16.11C2.65,15.47 1.7,14.07 1.65,12.5C1.57,11.78 1.69,11.05 2,10.39C1.71,9.64 1.68,8.82 1.93,8.06C2.3,7.11 3,6.32 3.87,5.82C4.45,4.13 6.08,3 7.87,3.12C9.47,1.62 11.92,1.46 13.7,2.75C14.12,2.64 14.56,2.58 15,2.58C16.36,2.55 17.65,3.15 18.5,4.22C20.54,4.75 22,6.57 22.08,8.69C22.13,9.8 21.83,10.89 21.22,11.82C21.29,12.18 21.33,12.54 21.33,12.91M16.33,11.5C16.9,11.57 17.35,12 17.35,12.57A1,1 0 0,1 16.35,13.57H15.72C15.4,14.47 14.84,15.26 14.1,15.86C14.35,15.95 14.61,16 14.87,16.07C20,16 19.4,12.87 19.4,12.82C19.34,11.39 18.14,10.27 16.71,10.33A1,1 0 0,1 15.71,9.33A1,1 0 0,1 16.71,8.33C17.94,8.36 19.12,8.82 20.04,9.63C20.09,9.34 20.12,9.04 20.12,8.74C20.06,7.5 19.5,6.42 17.25,6.21C16,3.25 12.85,4.89 12.85,5.81V5.81C12.82,6.04 13.06,6.53 13.1,6.56A1,1 0 0,1 14.1,7.56C14.1,8.11 13.65,8.56 13.1,8.56V8.56C12.57,8.54 12.07,8.34 11.67,8C11.19,8.31 10.64,8.5 10.07,8.56V8.56C9.5,8.61 9.03,8.21 9,7.66C8.92,7.1 9.33,6.61 9.88,6.56C10.04,6.54 10.82,6.42 10.82,5.79V5.79C10.82,5.13 11.07,4.5 11.5,4C10.58,3.75 9.59,4.08 8.59,5.29C6.75,5 6,5.25 5.45,7.2C4.5,7.67 4,8 3.78,9C4.86,8.78 5.97,8.87 7,9.25C7.5,9.44 7.78,10 7.59,10.54C7.4,11.06 6.82,11.32 6.3,11.13C5.57,10.81 4.75,10.79 4,11.07C3.68,11.34 3.68,11.9 3.68,12.34C3.68,13.08 4.05,13.77 4.68,14.17C5.21,14.44 5.8,14.58 6.39,14.57C6.24,14.31 6.11,14.04 6,13.76C5.81,13.22 6.1,12.63 6.64,12.44C7.18,12.25 7.77,12.54 7.96,13.08C8.36,14.22 9.38,15 10.58,15.13C11.95,15.06 13.17,14.25 13.77,13C14,11.62 15.11,11.5 16.33,11.5M18.33,18.97L17.71,17.67L17,17.83L18,19.08L18.33,18.97M13.68,10.36C13.7,9.83 13.3,9.38 12.77,9.33C12.06,9.29 11.37,9.53 10.84,10C10.27,10.58 9.97,11.38 10,12.19A1,1 0 0,0 11,13.19C11.57,13.19 12,12.74 12,12.19C12,11.92 12.07,11.65 12.23,11.43C12.35,11.33 12.5,11.28 12.66,11.28C13.21,11.31 13.68,10.9 13.68,10.36Z" />
                                    </svg>
                                </div>
    
                                <div class="header-logo-title">
                                    <h1>Estimu'lar</h1>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <nav>
                                <div class="header-menu desktop-only burguer-open">
                                    <ul>
                                        <li><a href="main.html">Inicio</a></li>
                                        <li><a href="test.html">Test</a></li>
                                        <li class="header-menu-submenu"><a href="therapy.html">Terapias</a>
                                            <!-- <ul>
                                                <li><a href="alzheimer.html">alzheimer</a></li>
                                                <li><a href="parkinson.html">parkinson</a></li>
                                            </ul> -->
                                        </li>
                                        <li><a href="rate.html">Tarifas</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="team.html">Equipo</a></li>
                                        <li><a href="contact.html">Contacto</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <div class="column">   
                            <!-- <div class="desktop-one-column">                          -->
                                <div class="header-user desktop-only burguer-open">                                
                                    <!-- <div class="column"> -->
                                        <div class="header-user-button">
                                            <button>Entrar</button>
                                        </div>
                                        <div class="header-user-button">
                                            <button class="header-button">Registrarse</button>
                                        </div>
                                    <!-- </div> -->
                                </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </header>

            <main>
                <div class="personal">
                    <div class="desktop-one-column">
                        <div class="column">
                            <div class="page-title">
                                <div class="personal-title">
                                    <h1>Job Plaza Riera</h1>
                                </div>
                                <div class="personal-subtitle">
                                    <h2>Director ejecutivo y coach</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="personal-element">
                        <div class="desktop-two-columns">
                            <div class="column">
                                <div class="personal-element-photo profile-photo">
                                    <img src="images/job-plaza.webp" alt="Job Plaza">
                                </div>
                            </div>
                            <div class="column">
                                <div class="personal-element-txt profile-txt">
                                    <div class="personal-element-txt-studies">
                                        <p>Licenciatura en psicología con la especialización de psicología clínica</p>
                                        <p>Máster en Dirección de Recursos Humanos.</p>
                                        <p>Máster en Práctica Clínica.</p>
                                        <p>Título especialista universitario en Dirección de Centros de Servicios Sociales.</p>
                                        <p>Curso Oficial Intervención Psicológica en Centros de Mayores.</p>
                                    </div>
                                    <div class="personal-element-txt-exp">
                                        <h4>Experiencia laboral</h4>
                                        <p>Psicólogo en Centro de Día reconocido especializado en enfermedades neurodegenerativas.</p>
                                        <p>2 años de experiencia como psicólogo en AFAPAM (Asociación de enfermos de Alzheimer de las Islas Baleares).</p>
                                        <p>7 años de experiencia en psicogerontología y en evaluación e intervención en enfermedades neurodegenerativas.</p>
                                    </div>
                                    <div class="personal-element-txt-about">
                                        <p>Sobre mi... </p>
                                        <p>Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders Jodete Flanders </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
    
            <footer>
                <div class="footer-top">
                    <div class="desktop-four-columns mobile-two-columns">
                        <div class="column desktop-only">
                            <div class="footer-element">
                                <ul>
                                    <li>Test</li>
                                    <li>Tarifas</li>
                                    <li>Blog</li>
                                    <li>Equipo</li>
                                    <li>Contacto</li>
                                </ul>
                            </div>
                        </div>
                        <div class="column desktop-only">
                            <div class="footer-element">
                                <ul>
                                    <li>Terapias</li>
                                    <li>Demencia</li>
                                    <li>Parkinson</li>
                                    <li>Alzheimer</li>
                                </ul>
                            </div>
                        </div>
                        <div class="column">
                            <div class="footer-element">
                                <ul>
                                    <li>FAQs</li>
                                    <li>Aviso legal</li>
                                    <li>Política de privacidad</li>
                                    <li>Terminos y condiciones</li>
                                </ul>
                            </div>
                        </div>
                        <div class="column">
                            <div class="footer-element">
                                <ul>
                                    <li>
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" />
                                        </svg>
                                        666112233
                                    </li>
                                    <li>
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12,15C12.81,15 13.5,14.7 14.11,14.11C14.7,13.5 15,12.81 15,12C15,11.19 14.7,10.5 14.11,9.89C13.5,9.3 12.81,9 12,9C11.19,9 10.5,9.3 9.89,9.89C9.3,10.5 9,11.19 9,12C9,12.81 9.3,13.5 9.89,14.11C10.5,14.7 11.19,15 12,15M12,2C14.75,2 17.1,3 19.05,4.95C21,6.9 22,9.25 22,12V13.45C22,14.45 21.65,15.3 21,16C20.3,16.67 19.5,17 18.5,17C17.3,17 16.31,16.5 15.56,15.5C14.56,16.5 13.38,17 12,17C10.63,17 9.45,16.5 8.46,15.54C7.5,14.55 7,13.38 7,12C7,10.63 7.5,9.45 8.46,8.46C9.45,7.5 10.63,7 12,7C13.38,7 14.55,7.5 15.54,8.46C16.5,9.45 17,10.63 17,12V13.45C17,13.86 17.16,14.22 17.46,14.53C17.76,14.84 18.11,15 18.5,15C18.92,15 19.27,14.84 19.57,14.53C19.87,14.22 20,13.86 20,13.45V12C20,9.81 19.23,7.93 17.65,6.35C16.07,4.77 14.19,4 12,4C9.81,4 7.93,4.77 6.35,6.35C4.77,7.93 4,9.81 4,12C4,14.19 4.77,16.07 6.35,17.65C7.93,19.23 9.81,20 12,20H17V22H12C9.25,22 6.9,21 4.95,19.05C3,17.1 2,14.75 2,12C2,9.25 3,6.9 4.95,4.95C6.9,3 9.25,2 12,2Z" />
                                        </svg>
                                        Aviso legal
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="desktop-two-columns">
                        <div class="column">
                            <div class="footer-element copyright">
                                <p>Si te encuentras en una situación de emergencia llama al 112 para ayuda inmediata.</p>
                                <p>@ Estimu'lar 2023</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="footer-element">
                                <div class="footer-element-icon">
                                    <svg viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 15 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7 8.5 7 9.71C7 10.93 7.89 12.1 8 12.27C8.14 12.44 9.76 14.94 12.25 16C12.84 16.27 13.3 16.42 13.66 16.53C14.25 16.72 14.79 16.69 15.22 16.63C15.7 16.56 16.68 16.03 16.89 15.45C17.1 14.87 17.1 14.38 17.04 14.27C16.97 14.17 16.81 14.11 16.56 14C16.31 13.86 15.09 13.26 14.87 13.18C14.64 13.1 14.5 13.06 14.31 13.3C14.15 13.55 13.67 14.11 13.53 14.27C13.38 14.44 13.24 14.46 13 14.34C12.74 14.21 11.94 13.95 11 13.11C10.26 12.45 9.77 11.64 9.62 11.39C9.5 11.15 9.61 11 9.73 10.89C9.84 10.78 10 10.6 10.1 10.45C10.23 10.31 10.27 10.2 10.35 10.04C10.43 9.87 10.39 9.73 10.33 9.61C10.27 9.5 9.77 8.26 9.56 7.77C9.36 7.29 9.16 7.35 9 7.34C8.86 7.34 8.7 7.33 8.53 7.33Z" />
                                    </svg>
                                </div>
                                <div class="footer-element-icon">
                                    <svg viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                                    </svg>
                                </div>
                                <div class="footer-element-icon">
                                    <svg viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="footer-element author">
                    <a href="https://thispersondoesnotexist.com/"><p>enlace a una web de verdad</p></a>
                </div> -->
            </footer>
                
            <script type="module" src="{{mix('front/desktop/js/app.js')}}"></script>
    
            <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    
            <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
            <script>
                WebFont.load({
                    google: {
                        families: ['Ubuntu:300,700,700i', 'Ubuntu+Condensed:400']
                    }
                });        
            </script>
    
            <!-- 
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
                
                ga('create', '', 'auto');
                ga('send', 'pageview');
            </script> 
            -->
        </body>
    </html>