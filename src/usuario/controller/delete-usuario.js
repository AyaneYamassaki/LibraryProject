$(document).ready(function() {

    $('#usuario').on('click', 'button.btn-delete', function(e) {

        e.preventDefault()

        let IDUSUARIO = `IDUSUARIO=${$(this).attr('id')}`

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
                    data: IDUSUARIO,
                    url: 'src/usuario/model/delete-usuario.php',
                    success: function(dados) {
                        Swal.fire({
                            title: 'Library',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })

                        $('#usuario').DataTable().ajax.reload()
                    }
                })
            }
        }))

    })
})