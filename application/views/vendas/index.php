<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="<?= base_url("css/bootstrap.min.css") ?>">
    </head>
    <body>
        <div class="container">

            <?php if ($this->session->flashdata("success")) : ?>
                <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
            <?php endif ?>

            <?php if ($this->session->flashdata("danger")) : ?>
                <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
            <?php endif ?>

            <h1>Minhas Vendas</h1>
            <table class="table">
                <?php foreach ($produtosVendidos as $produto) : ?>
                    <tr>
                        <td><?= $produto["nome"] ?></td>
                        <td><?= dataMysqlParaPtBr($produto["data_de_entrega"]) ?></td>
                    </tr>
                <?php endforeach ?>
            </table>            
        </div>
    </body>
</html>