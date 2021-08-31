$('document').ready(function() {

    $('#AUTOR').keyup(function(e) {
        e.preventDefault()

        let NOME = `NOME=${$(this).val()}`

        $('#autores').empty()
        $('#listar').empty()

        if ($(this).val().length >= 3) {
            $.ajax({
                dataType: 'json',
                type: 'POST',
                assync: true,
                data: NOME,
                url: 'src/usuario/model/find-usuario.php',
                success: function(dados) {
                    for (const dado of dados) {
                        $('#autores').append(`<input type="text" name="" id="${dado.IDUSUARIO}" class="form-control selecionado" value="${dado.NOME}" disabled>`)
                    }
                    $('.selecionado').click(function(e) {
                        $('#autores').empty()
                        $('#AUTOR').empty()
                        $('#listar').append(`<input type="text" name="" id="${dado.IDUSUARIO}" class="form-control selecionado" value="${dado.NOME}">`)
                    })
                }
            })
        }

    })
})