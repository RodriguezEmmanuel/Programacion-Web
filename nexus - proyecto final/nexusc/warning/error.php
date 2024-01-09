
<!----Este codigo es empleado para recordar al usario los errores que contiene en su registro--->
<?php if(isset($response)): ?>
                <!--El div recibe la clase acorde a $response['status']-->
                <div class="<?php echo $response['status']; ?>">
                    <p><?php echo $response['msg']; ?></p>
                    <!--Si hay errores-->
                    <?php if(isset($response['errores'])): ?>
                        <ul>
                            <?php foreach((array)$response['errores'] as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </div>
            <?php endif ?>  