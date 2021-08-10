$(document).ready(function() {

    $('#curso').on('click', 'button.btn-delete', function(e) {

        e.preventDefault()

        let IDCURSO = `IDCURSO=${$(this).attr('id')}`

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
                    data: IDCURSO,
                    url: 'src/curso/model/delete-curso.php',
                    success: function(dados) {
                        Swal.fire({
                            title: 'Library',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })

                        $('#curso').DataTable().ajax.reload()
                    }
                })
            }
        }))

    })
})