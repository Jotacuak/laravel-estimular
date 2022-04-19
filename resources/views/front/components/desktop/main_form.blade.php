<div class="form">
    <div class="column">
        <form enctype="multipart/form-data" class="front-form" id="contact-form" name="sql_file">
            <div id="errors-container"></div>
            <div class="desktop-two-columns">   
                <div class="column">
                    <div class="contact-form-element">
                        <div class="contact-form-element-label">
                            <label for="fname">Nombre</label>
                        </div>
                        <div class="contact-form-element-input">
                            <input class="required" type="text" id="name" name="name">
                        </div>
                    </div>
                    <div class="contact-form-element">
                        <div class="contact-form-element-label">
                            <label for="lname">Apellidos</label>
                        </div>
                        <div class="contact-form-element-input">
                            <input class="required" type="text" id="surname" name="surname">
                        </div>
                    </div>                                                                                                                                    
                </div>
                <div class="column">
                    <div class="contact-form-element">
                        <div class="contact-form-element-label">
                            <label for="telf">Teléfono</label>
                        </div>
                        <div class="contact-form-element-input">
                            <input class="required" type="text" id="mobile_phone" name="mobile_phone">
                        </div>
                    </div>   
                    <div class="contact-form-element">
                        <div class="contact-form-element-label">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="contact-form-element-input">
                            <input class="required" type="text" id="email" name="email">
                        </div>
                    </div>      
                </div>
            </div>
            <div class="column">
                <div class="contact-form-element">
                    <div class="contact-form-element-label">
                        <label for="comment">¿Por qué lloras?</label>
                    </div>
                    <div class="contact-form-element-input">
                        <textarea class="required ckeditor" name="content" id="editor"></textarea>
                    </div>                           
                </div>                                                                                             
            </div>
            <div class="column">
                <div class="contact-form-element-button">
                    <button  class="submit-button" type="submit">Enviar</button>
                </div>                                    
            </div>
        </form>
    </div>
</div>  