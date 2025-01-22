<?php
    $title = 'Home';
    require_once 'header.php';
?>

        <h2>DEAD ME</h2>
        <p>Aplição de teste requições assicronas na web com ajax usando java script puro.</p>

        <section>
            <p>Olá sou o Ngoma Fortuna, Engº.</p>

            <p>Estive estudando esse assunto e resolvi criar um este projectinho que inclui:</p>
            <ul>
                <li>- OOP</li>
                <li>- MVC</li>
                <li>- Composer (gestao de dependências)</li>
                <li>- PRS4 (padrão)</li>
                <li>- como dependências usei apenas <i>symfony/var-dumper</i> (por causa da beleza do <i>dd()</i> e <i>damp()</i>)</li>
                <li>- sistema de rotas <i>resources/libraries/Route.php</i> (este não liga muito é um impirismo meu)</li>
                <li>- Validação de dados <i>resources/libraries/Validate.php</i> (os dados vindo de formulários)</li>
                <li>- banco de dados /aonews.sql</li>
            </ul>

            <br>

            <p>Deixei para mim umas tarefas em <i>doc/tasks.md</i></p>

            <br>
            <p>veja a mágica do ajax funcinando <a href="/crud">aqui</a>.</p>
            <br>
        </section>

        <br><br>

        <section class="articles">
            <article>
                <h1>OOP</h1>
                <ul>
                    <li>Orientad Object Progration</li>
                </ul>
                <p>
                    Em uso no app se poderes não exite em das uma olhada como foi implementado no projecto. <i>sources/livraries/ e src/</i>
                </p>
            </article>  
            <article>
                <h1>MVC</h1>
                <ul>
                    <li>Model View Controller</li>
                </ul>
                <p>
                    Em uso no app se poderes não exite em das uma olhada como foi implementado no projecto. <i>public/, sources/views e src/</i>
                </p>
            </article>
            <article>
                <h1>Composer</h1>
                <ul>
                    <li>Gerenciador de dependências do PHP</li>
                </ul>
                <p>
                    Em uso no app se poderes não exite em das uma olhada como foi implementado no projecto. <i>vendor/</i>
                </p>
            </article>
            
            <!--  -->

            <article>
                <h1>PRS 4</h1>
                <ul>
                    <li>Pradão de desenvolvimento que trata do uso autoload</li>
                </ul>
                <p>
                    Em uso no app se poderes não exite em das uma olhada como foi implementado no projecto. <i>/composer.json</i>
                </p>
            </article>
            <article>
                <h1>dumper</h1>
                <ul>
                    <li>Dependência ou biblioteca do symfony para depuração</li>
                </ul>
                <p>
                    Em uso no app se poderes não exite em das uma olhada como foi implementado no projecto. <i>vendor/symfony/var-dumper</i>
                </p>
            </article>
            <article>
                <h1>Resoureces</h1>
                <ul>
                    <li>Recursos de app como, libraries e views</li>
                </ul>
                <p>
                    Em uso no app se poderes não exite em das uma olhada como foi implementado no projecto. <i>resources/</i>
                </p>
            </article>
        </section>

<?php require_once 'footer.php'; ?>