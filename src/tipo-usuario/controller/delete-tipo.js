$(document).ready(function() {

    $('#tipo').on('click', 'button.btn-delete', function(e) {

        e.preventDefault()

        let IDTIPO_USUARIO = `IDTIPO_USUARIO=${$(this).attr('id')}`

        Swal.fire({
            title: 'Library',
            text: 'Deseja realmente excluir esse registro?',
            icon: 'question',
            showCancelButton: true,
            confirmButton: 'Sim',
            cancelButton: 'Não'
        }).then((result => {
            if (result.value) {

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    assync: true,
                    data: IDTIPO_USUARIO,
                    url: 'src/tipo-usuario/model/delete-tipo.php',
                    success: function(dados) {
                        Swal.fire({
                            title: 'Library',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })

                        $('#tipo').DataTable().ajax.reload()
                    }
                })
            }
        }))

    })
})