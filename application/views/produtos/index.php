

            <h1>Produtos</h1>
            <table class="table">
                <?php foreach ($produtos as $produto) : ?>
                    <tr>
                        <td><?= anchor("produtos_control/{$produto['id']}", $produto["nome"]) ?></td>
                        <td><?= character_limiter($produto["descricao"],10)?></td>
                        <td><?= numeroEmReais($produto["preco"]) ?></td>
                    </tr>
                <?php endforeach ?>
            </table>

            <!-- Criação de formulario usando o Helper -->
            <?php if ($this->session->userdata("usuario_logado")) : ?>
                <?= anchor('produtos_control/formulario', 'Novo Produto', array("class" => "btn btn-primary")) ?>
                <?= anchor('login_control/logout', 'Logout', array("class" => "btn btn-primary")) ?>

            <?php else : ?>

                <h1>Login</h1>
                <?php
                echo form_open("login_control/autenticar");
                echo form_label("Email", "email");
                echo form_input(array(
                    "name" => "email",
                    "id" => "email",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_label("Senha", "senha");
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_button(array(
                    "class" => "btn btn-primary",
                    "content" => "Login",
                    "type" => "submit"
                ));

                echo form_close();
                ?>

                <h1>Cadastro</h1>
                <?php
                echo form_open("usuarios_control/novo");

                echo form_label("Nome", "nome");
                echo form_input(array(
                    "name" => "nome",
                    "id" => "nome",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_label("Email", "email");
                echo form_input(array(
                    "name" => "email",
                    "id" => "email",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_label("Senha", "senha");
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_button(array(
                    "class" => "btn btn-primary",
                    "content" => "Cadastrar",
                    "type" => "submit"
                ));

                echo form_close();
                ?>

            <?php endif ?>   

        