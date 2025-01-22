<?php
    $title = 'Contacto';
    $cssPage = "<link rel='stylesheet' href='" .  URL . "/assets/css/crud.css'>";
    require_once 'header.php';
?>
        <ul class="options">
            <li class="option active">Notices</li>
            <li class="option">Create</li>
            <li class="option">Search</li>
        </ul>

        <section>
            <h1>Notices</h1>
            
            <button id="btn-notices">Mostrar todas</button>

            <div id="div-notices"></div>
        </section>
        <section>
            <h1>Create</h1>

            <div id="div-create"></div>

            <form action="" method="post" id="form-setter">
                <label for="title">Titulo</label><br>
                <input type="text" name="title" id="title" placeholder="Seu nome"><br>

                <label for="category">Escolha a categoria</label><br>
                <select name="category" id="category">
                    <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category->idCat ?>"><?php echo $category->category ?></option>
                    <?php endforeach ?>
                </select><br>

                <label for="image">Carregar imagem</label><br>
                <input type="file" name="image" id="image"><br><br>

                <label for="content">Conteúdo</label><br>
                <textarea name="content" id="" cols="30" rows="10" placeholder="Escreva aqui o conteúdo da notícia..."></textarea><br>

                <label for="state">
                    <input type="checkbox" name="state" id="state"> visibilidade
                </label><br><br>

                <button>Enviar</button>
            </form>
        </section>
        <section>
            <h1>Pesquisar</h1>

            <form action="" method="post" id="form-search">
                <input type="text" name="phrase" id="phrase" placeholder="Pesquisar..." required>
                <button>Pesquisar</button>

                <br>

                <div id="div-search"></div>
            </form>
        </section>

        <script src="<?php echo URL ?>/assets/js/notice.js"></script>

        <script src="<?php echo URL ?>/assets/js/ctrl.js"></script>

<?php require_once 'footer.php'; ?>
