<?php
$this->layout("_theme",["categories" => $categories]);
?>
<!--==================================
=            REGISTER            =
===================================-->

<section class="registration">
    <div class="container-fuild p-0">
        <div class="row">
            <div class="col-lg-6 col-md-12 p-0">
                <div class="service-block bg-service overlay-primary text-center">
                    <div class="row no-gutters">
                        <div class="col-6">
                            <!-- Service item -->
                            <div class="service-item">
                                <i class="fa fa-microphone"></i>
                                <h5>8 Speakers</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Service item -->
                            <div class="service-item">
                                <i class="fa fa-flag"></i>
                                <h5>500 + Seats</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Service item -->
                            <div class="service-item">
                                <i class="fa fa-ticket"></i>
                                <h5>300 tickets</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Service item -->
                            <div class="service-item">
                                <i class="fa fa-calendar"></i>
                                <h5>3 days event</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-0">
                <div class="registration-block bg-registration overlay-dark">
                    <div class="block">
                        <div class="title text-left">
                            <h3>Cadastro de Usuário <span class="alternate"><?= $eventName; ?></span></h3>
                            <p>Faça seu cadastro para submeter, gerenciar e acompanhar seus trabalhos.</p>
                        </div>
                        <form id="form-register" class="row" novalidate>
                            <div class="col-md-6">
                                <input type="text" name="name" value="" class="form-control main" placeholder="Seu Nome..." required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" value="" class="form-control main" placeholder="Seu Email..." required>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" value="" class="form-control main" placeholder="Sua Senha..." required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-white-md">Continuar</button>
                            </div>
                            <div class="col-12" id="message">
                                <!-- Aqui aparece a mensagem, caso ocorra erro! -->
                            </div>
                        </form>
                        <script type="text/javascript" async>
                            const form = document.querySelector("#form-register"); // id do formulário
                            const message = document.querySelector("#message"); // id da div message
                            form.addEventListener("submit", async (e) => {
                                e.preventDefault();
                                const dataUser = new FormData(form);
                                // enviar para a rota já definida
                                const data = await fetch("<?= url("cadastrar"); ?>",{
                                    method: "POST",
                                    body: dataUser,
                                });
                                const user = await data.json();
                                console.log(user);
                                // tratamento da mensagem
                                if(user) {
                                    message.innerHTML = user.message;
                                    message.classList.remove("success", "warning", "error");
                                    message.classList.add("message");
                                    message.classList.add(`${user.type}`);
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====  End of REGISTER  ====-->