function deleteRegister(id, message, route) {
    Swal.fire({
        title: "Tem Certeza ?",
        icon: "question",
        text: message,
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: "Excluir",
        cancelButtonText: "Cancelar",
    }).then(function(result) {
        if (result.value) {
            location.href = route;
        }
    });
}
