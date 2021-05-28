$(document).ready(function() {

    $('.nav-link').click(function(e) {
        e.preventDefault()

        // Capturar link do elemento
        let url = $(this).attr('href')

        // Limpar a div container com o id conteudo
        $('#conteudo').empty()

        // Inserir novo conteudo dentro da div id conteudo
        $('#conteudo').load(url)
    })
})