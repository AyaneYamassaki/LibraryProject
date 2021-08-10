$(document).ready(function() {
    $('.btn-new').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()

        $('.modal-title').append('Adicionar novo usuário')

        $('.modal-body').load('src/usuario/view/form-usuario.html', function() {
            // carrega todos os tipos de usuarios existentes no bd
            $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    assync: true,
                    url: 'src/tipo-usuario/model/all-tipo.php',
                    success: function(dados) {
                        for (const dado of dados) {
                            $('#TIPO_USUARIO_IDTIPO_USUARIO').append(`<option value="${dado.IDTIPO_USUARIO}">${dado.DESCRICAO}</option>`)
                        }
                    }
                })
                // carrega todos os cursos existentes no bd
            $.ajax({
                type: 'POST',
                dataType: 'json',
                assync: true,
                url: 'src/curso/model/all-curso.php',
                success: function(dados) {
                    for (const dado of dados) {
                        $('#CURSO_IDCURSO').append(`<option value="${dado.IDCURSO}">${dado.NOME}</option>`)
                    }
                }
            })
        })

        $('.btn-save').show()

        $('.btn-save').attr('data-operation', 'insert')

        $('#modal-usuario').modal('show')
    })
})