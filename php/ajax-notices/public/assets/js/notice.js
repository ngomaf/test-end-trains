window.onload = () => {

    console.log('AO news started...');

    var btn_notices = document.getElementById("btn-notices");
    var div_notices = document.getElementById("div-notices");
    var div_create = document.getElementById("div-create");
    var div_search = document.getElementById("div-search");

    var form_setter = document.getElementById("form-setter");
    var form_search = document.getElementById("form-search");
    var notice_item;

    function template_notices(notices) {

        let template = `<br><div class="grid1">`;

        notices.forEach(notice => {
            
            template += `<div class="notice-item">`; 

            template += `<img class="${notice.slug}" src="/assets/image/notice/${notice.image}">`; 
            template += `<div><h1 class="${notice.slug}">${notice.title}</h1>`; 
            template += `<ul><li>Data: ${notice.created_at}</li><li><a href="/crud/category/${notice.slugCat}">${notice.category}</a></li>`; 

            template += `</ul></div></div>`; 
            
        });

        template += `</div>`;

        return template;

    }

    var xhttp = new XMLHttpRequest();

    btn_notices.onclick = () => {
        
        xhttp.onreadystatechange = () => {

            if(xhttp.readyState < 4) {

                div_notices.innerHTML = `<br><p style="text-align: center;">Loading...</p>`; 

            }

            if(xhttp.readyState == 4 && xhttp.status == 200) {

                let notices = JSON.parse(xhttp.responseText);

                div_notices.innerHTML = template_notices(notices); 

                // callable to single notice 

                notice_item = document.getElementsByClassName('notice-item', div_notices);
        
                for(let i=0; i<notice_item.length; i++) {
                    notice_item[i].onclick = (event) => {
                        showNotice(event.target.className, div_notices);
                    }
                }

            } 
            
        }
        
        xhttp.open('GET', 'ajax/notice.php', true);

        xhttp.send();

    }

    form_setter.onsubmit = (event) => {

        event.preventDefault();

        let form = new FormData(form_setter);

        xhttp.onreadystatechange = () => {

            if(xhttp.readyState < 4) {

                div_create.innerHTML = `<br><p style="text-align: center;">Loading...</p>`; 

            }

            if (xhttp.readyState == 4 && xhttp.status ==  200) {
                
                $message = JSON.parse(xhttp.responseText);

                if($message['message']) 
                    div_create.innerHTML = `<p class='success'>Registo cadatrado com sucesso!</p>`;
                
                if(!$message['message']) 
                    div_create.innerHTML = `<p class='error'>Houve um erro ao cadatrar o registo!</p>`;
            }

        }

        xhttp.open('POST', 'ajax/create.php');

        xhttp.send(form);

    }

    function showNotice(slug, div) {
        
        xhttp.onreadystatechange = () => {

            if(xhttp.readyState < 4) {

                div_notices.innerHTML = `<br><p style="text-align: center;">Loading...</p>`; 

            }

            if(xhttp.readyState == 4 && xhttp.status == 200) {

                let notice = JSON.parse(xhttp.responseText);

                let template = `
                <br>
                <div class="single">
                    <figure>
                        <img src='/assets/image/notice/${notice.image}'>
                        <p>Data: ${notice.created_at}</p>
                        <p>Categoria: <a href="/crud/category/${notice.slugCat}">${notice.category}</a></p>
                    </figure>

                    <div>
                        <h1>${notice.title}</h1>
                        <p>${notice.content}</p>
                    </div>
                </div>`;

                div.innerHTML = template; 

            } 

        }


        xhttp.open('GET', 'ajax/find.php?slug=' + slug, true);

        xhttp.send();

    }

    form_search.addEventListener('submit', (event) => {

        event.preventDefault();

        let form = new FormData(form_search);

        xhttp.onreadystatechange = () => {
            

            if(xhttp.readyState < 4) {

                div_search.innerHTML = `<br><p style="text-align: center;">Loading...</p>`; 

            }

            if(xhttp.readyState == 4 && xhttp.status == 200) {

                let result = JSON.parse(xhttp.responseText);

                if(result['void']) 
                    div_search.innerHTML = `<p>Nenhuma notíca encontrada sobre o esse assunto.</p>`;
                
                if(result['error']) 
                    div_search.innerHTML = `<p class='error'>Houve um erro do sistema de pesquisa.</p>`;

                console.log(JSON.parse(xhttp.responseText));

                div_search.innerHTML = template_notices(JSON.parse(xhttp.responseText))


                // callable to single notice 

                notice_item = document.getElementsByClassName('notice-item');
        
                for(let i=0; i<notice_item.length; i++) {
                    notice_item[i].onclick = (event) => {
                        showNotice(event.target.className, div_search);
                    }
                }

            }

        } 

        xhttp.open('POST', 'ajax/search.php', true);

        xhttp.send(form);

    });


}